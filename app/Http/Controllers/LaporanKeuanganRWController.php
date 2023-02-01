<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportKeuangan;
// use App\Exports\ExportKeuangan::__construct;
use App\Models\Keuangan;
use App\Models\KeuanganRW;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanKeuanganRWController extends Controller
{
    public function index()
    {
        
        $laporankeuangan = KeuanganRW::latest();
        $latestkeuangan = Keuangan::latest(); 
        $role = Auth::user()->role;

        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $latestkeuangan->whereBetween('created_at',[$start_date,$end_date])->get();
        }  
        
        if ( $role != "2"  && $role != "7") {
            abort(403);
        }
        return view('home.keuangan_rw', [
            'tittle' => 'Dashboard | Laporan Keuangan RW',
            'keuangans'=> $latestkeuangan->paginate(7),
            'laporankeuangans' => $laporankeuangan->paginate(7),
            // 'active' => 'login'
        ]);
    }  
    
    public function carilaporan(Request $request)
    {
        $laporankeuangan = KeuanganRW::latest();
        $latestkeuangan = Keuangan::latest(); 
        	// menangkap data pencarian
            $cari = $request->searchlaporan;
            // mengambil data dari table pegawai sesuai pencarian data
        $keuangansearch = DB::table('keuangan_rw')->where('nama_laporan','like',"%".$cari."%")->paginate();
        $laporankeuangan =  $keuangansearch;
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
        $iuran = new KeuanganRW();
        $iuran->nama_laporan = $data['nama_laporan'];
        $iuran->dari = $data['dari'];
        $iuran->ke = $data['ke'];
        $iuran->save();
        return redirect('/laporan_keuangan_rw')->with('success', 'Laporan Sudah Dibuat');
    }

    public function show($id)
    { 
        $latestkeuanganrw = Keuangan::latest(); 
        $keuangandari = DB::table('keuangan_rw')->where('id', $id)->pluck('dari')->first();
        $keuanganke = DB::table('keuangan_rw')->where('id', $id)->pluck('ke')->first();
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
        $sumnominalpemasukan1 = $sumnominalpemasukan;
        $totalsumnominals = $sumnominalpemasukan1 -= $sumnominalpengeluaran;

        return view('laporanrw.index', [
            'id'=>$id,
            'tittle' => 'Dashboard | Laporan Keuangan RW',
            'laporans' => $latestkeuanganrw->get(),
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
        // $suratid = Surat::find($id);
        KeuanganRW::destroy($id);
        return redirect('/laporan_keuangan_rw')->with('success', 'Laporan Sudah Dihapus');
    }

    

}
