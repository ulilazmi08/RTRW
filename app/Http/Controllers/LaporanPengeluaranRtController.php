<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPengeluaranRt;
use Carbon\Carbon;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanPengeluaranRtController extends Controller
{
    public function index()
    {
        $authrt = Auth::user()->rt_id;
        $nominal = DB::table('keuangan')->where('jenis', "Pengeluaran")->where('rt_pembayar', $authrt)->pluck('nominal');
        $pengeluaran = DB::table('keuangan')->where('jenis', "Pengeluaran")->where('rt_pembayar', $authrt)->paginate(7);
        $sumnominal = 0;
        $countnominal = count($nominal);
        for ($i=0; $i < $countnominal; $i++) { 
            $nominal1 = (int)$nominal[$i]; 
            $sumnominal += $nominal1;
        }
        $username = Auth::user()->name;
        $userid = Auth::user()->id;
        $profil = DB::table('profil')->where('user_id', $userid)->pluck('rt_id')->first();  
        return view('pengeluaranrt.index',[
            'tittle' => 'Dashboard | Laporan Pengeluaran RT',
            'namauser' => $username,
            'userids' => $userid,
            'rt_pembayar' => $profil,
            'sumnominal' => $sumnominal,
            'laporans'=>$pengeluaran,

        ]);
    }
    public function pengeluaran(Request $request)
    {
        $request->validate([
            'bukti' => 'image|mimes:jpg,png|max:2048|nullable',
            'nama_pembayar' => 'nullable|max:255',
            'nominal' => 'nullable|max:255',
            'via' => 'nullable|max:255',
            'status' => 'nullable',
        ]);
        $data = $request->all();
        $keuangan = new Keuangan();
        $keuangan->nama_pembayar = $data['nama_pembayar'];
        $keuangan->rt_pembayar = $data['rt_pembayar'];
        $keuangan->nama_iuran = $data['nama_iuran'];
        $keuangan->jenis = "Pengeluaran";
        $keuangan->nominal = $data['nominal'];
        $keuangan->via = $data['via'];
        $keuangan->save();
        return redirect('/pengeluaran_rt')->with('success', 'Pengeluaran Sudah Ditambah');   
    }
    public function exportPengeluaranRt(Request $request){
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        return Excel::download(new ExportPengeluaranRt, 'Laporan Pengeluaran RT Tanggal ' . $waktu . '.xlsx');
    }
    public function exportPengeluaranRtPDF(Request $request){
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        return Excel::download(new ExportPengeluaranRt, 'Laporan Pengeluaran RT Tanggal ' . $waktu . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
