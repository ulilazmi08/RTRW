<?php

namespace App\Exports;

use App\Models\Keuangan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Events\AfterSheet;


class ExportPengeluaranRt  implements FromView, ShouldAutoSize
{    use Exportable;  
    public function view():View 
    {
        $authrt = Auth::user()->rt_id;
        $nominal = DB::table('keuangan')->where('jenis', "Pengeluaran")->where('rt_pembayar', $authrt)->pluck('nominal');
        $pengeluaran = DB::table('keuangan')->where('jenis', "Pengeluaran")->where('rt_pembayar', $authrt)->get();
        $sumnominal = 0;
        $countnominal = count($nominal);
        for ($i=0; $i < $countnominal; $i++) { 
            $nominal1 = (int)$nominal[$i]; 
            $sumnominal += $nominal1;
        }
        $username = Auth::user()->name;
        $userid = Auth::user()->id;
        $profil = DB::table('profil')->where('user_id', $userid)->pluck('rt_id')->first();  
        return view('pemasukanrt.table',[
            'tittle' => 'Dashboard | Laporan Pengeluaran RT',
            'namauser' => $username,
            'userids' => $userid,
            'rt_pembayar' => $profil,
            'sumnominal' => $sumnominal,
            'laporans'=>$pengeluaran,

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
