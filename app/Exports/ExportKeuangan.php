<?php

namespace App\Exports;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Events\AfterSheet;


// use Maatwebsite\Excel\Concerns\FromCollection;

class ExportKeuangan implements FromView, ShouldAutoSize
{
   
    use Exportable;  
    public function __construct($id)
    {
        $this->id = $id;
        return $this;

    }
    public function view():View 
    {
        
        $latestkeuanganrw = Keuangan::latest(); 
        $keuangandari = DB::table('keuangan_rw')->where('id', $this->id)->pluck('dari')->first();
        $keuanganke = DB::table('keuangan_rw')->where('id', $this->id)->pluck('ke')->first();
        $start_date = Carbon::parse($keuangandari)->toDateTimeString();
        $end_date = Carbon::parse($keuanganke)->endOfDay()->toDateTimeString();
        $latestkeuanganrw->whereBetween('created_at', [$start_date,$end_date])->get();
        $nominalpengeluaran = DB::table('keuangan')->where('jenis', "Pengeluaran")->whereBetween('created_at', [$start_date,$end_date])->pluck('nominal');
        $nominalpemasukan = DB::table('keuangan')->where('jenis', "Pemasukan")->whereBetween('created_at', [$start_date,$end_date])->pluck('nominal');   
        $sumnominalpengeluaran = 0;
        $sumnominalpemasukan = 0;
        $countnominalpengeluaran = count($nominalpengeluaran);
        for ($i=0; $i < $countnominalpengeluaran; $i++) { 
            $nominal1 = (int)$nominalpengeluaran[$i]; 
            $sumnominalpengeluaran += $nominal1;
        }
        $countnominalpemasukan = count($nominalpemasukan);
        for ($i=0; $i < $countnominalpemasukan; $i++) { 
            $nominal1 = (int)$nominalpemasukan[$i]; 
            $sumnominalpemasukan += $nominal1;
        }
        $totalsumnominals = $sumnominalpemasukan -= $sumnominalpengeluaran;
        return view('laporanrw.table', [
            'tittle' => 'Dashboard | Laporan Keuangan RW',
            'laporans' => $latestkeuanganrw->get(),
            'totalsumnominal' => $totalsumnominals,
            'totalpemasukan' => $sumnominalpemasukan,
            'totalpengeluaran' => $sumnominalpengeluaran,
            // 'active' => 'login'
        ]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event){
                
                $event->sheet->getStyle('C8:W25')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
         ]);
            }
        ];
    }
}
