<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportKeuangan;
use App\Models\Keuangan;
use App\Models\KeuanganRT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanKeuanganRTController extends Controller
{
    public function index()
    {
        $authrt = Auth::user()->rt_id;
        $laporankeuangan = KeuanganRT::latest();
        $latestkeuangan = Keuangan::latest(); 
        $role = Auth::user()->role;
        if ($role != "3" && $role != "4"  && $role != "1") {
            abort(403);
        }
        
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $latestkeuangan->whereBetween('created_at',[$start_date,$end_date])->get();
        // } else {
        //     $datakeuangan = Keuangan::latest()->get();
        }  
        return view('home.keuangan_rt', [
            'userrt' => $authrt,
            'tittle' => 'Dashboard | Laporan Keuangan RT',
            'keuangans'=> $latestkeuangan->paginate(7),
            'laporankeuangans' => $laporankeuangan->paginate(7),
            // 'active' => 'login'
        ]);
    }   
    public function carilaporanrt(Request $request)
    {
        $laporankeuangan = KeuanganRT::latest();
        $latestkeuangan = Keuangan::latest(); 
        	// menangkap data pencarian
            $cari = $request->searchlaporanrt;
            // mengambil data dari table pegawai sesuai pencarian data
        $keuanganrtsearch = DB::table('keuangan_rt')->where('nama_laporan','like',"%".$cari."%")->paginate();
        $laporankeuangan =  $keuanganrtsearch;
            // mengirim data pegawai ke view index
        return view('home.keuangan_rw',[ 
            'tittle' => 'Dashboard | Laporan Keuangan RW',
            // 'active' => 'login'
            'keuangans'=> $latestkeuangan->paginate(7),
            'laporankeuangans' => $laporankeuangan,
    ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_laporan' => 'required',
            'dari' => 'required',
            'ke' => 'required',
        ]);
        $data = $request->all();
        $iuran = new KeuanganRT();
        $iuran->nama_laporan = $data['nama_laporan'];
        $iuran->dari = $data['dari'];
        $iuran->rt = $data['rt'];
        $iuran->ke = $data['ke'];
        $iuran->save();
        return redirect('/laporan_keuangan_rt')->with('success', 'Laporan Sudah Dibuat  ');
    }

    public function show($id)
    { 
        $authrt = Auth::user()->rt_id;
        $latestkeuanganrt = DB::table('keuangan')->where('rt_pembayar', $authrt)->latest();
        $keuangandari = DB::table('keuangan_rt')->where('id', $id)->where('rt', $authrt)->pluck('dari')->first();
        $keuanganke = DB::table('keuangan_rt')->where('id', $id)->where('rt', $authrt)->pluck('ke')->first();
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
        return view('laporanrt.index', [
            'id'=>$id,
            'tittle' => 'Dashboard | Laporan Keuangan RW',
            'laporans' => $latestkeuanganrt->get(),
            'totalsumnominal' => $totalsumnominals,
            'totalpemasukan' => $sumnominalpemasukan,
            'totalpengeluaran' => $sumnominalpengeluaran,
            // 'active' => 'login'
        ]);
    }
    public function exportKeuangan($id){
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        return Excel::download(new ExportKeuangan($id), 'Laporan Keuangan Tanggal ' . $waktu . '.xlsx');
    }
    public function exportKeuanganPDF($id){
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        return Excel::download(new ExportKeuangan($id), 'Laporan Keuangan Tanggal ' . $waktu . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    public function destroy($id)
    {
        KeuanganRT::destroy($id);
        return redirect('/laporan_keuangan_rt')->with('success', 'Laporan Sudah Dihapus');
    }

}
