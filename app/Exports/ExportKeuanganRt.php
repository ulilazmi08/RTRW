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

class ExportKeuanganRt implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;  
    public function __construct($id)
    {
        $this->id = $id;
        return $this;

    }
    public function view():View 
    {
        
        $authrt = Auth::user()->rt_id;
        $latestkeuanganrt = DB::table('keuangan')->where('rt_pembayar', $authrt)->latest();
        $keuangandari = DB::table('keuangan_rt')->where('id',  $this->id)->where('rt', $authrt)->pluck('dari')->first();
        $keuanganke = DB::table('keuangan_rt')->where('id',  $this->id)->where('rt', $authrt)->pluck('ke')->first();
        $start_date = Carbon::parse($keuangandari)->toDateTimeString();
        $end_date = Carbon::parse($keuanganke)->endOfDay()->toDateTimeString();
        $latestkeuanganrt->whereBetween('created_at', [$start_date,$end_date])->get();
        $nominalpengeluaran = DB::table('keuangan')->where('rt_pembayar', $authrt)->where('jenis', "Pengeluaran")->whereBetween('created_at', [$start_date,$end_date])->pluck('nominal');
        $nominalpemasukan = DB::table('keuangan')->where('rt_pembayar', $authrt)->where('jenis', "Pemasukan")->whereBetween('created_at', [$start_date,$end_date])->pluck('nominal');   
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
        $sumnominalpemasukan1 = $sumnominalpemasukan;
        $totalsumnominals = $sumnominalpemasukan1 -= $sumnominalpengeluaran;
        return view('laporanrt.table', [
            'tittle' => 'Dashboard | Laporan Keuangan RT',
            'laporans' => $latestkeuanganrt->get(),
            'totalsumnominal' => $totalsumnominals,
            'totalpemasukan' => $sumnominalpemasukan,
            'totalpengeluaran' => $sumnominalpengeluaran,
            // 'active' => 'login'
        ]);
    }
}
