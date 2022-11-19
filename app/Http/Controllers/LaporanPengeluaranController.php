<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Exports\ExportKeuangan;
use App\Exports\ExportPengeluaran;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanPengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = DB::table('keuangan')->where('jenis', "Pengeluaran")->paginate(10);
        $nominal = DB::table('keuangan')->where('jenis', "Pengeluaran")->pluck('nominal');
        $sumnominal = 0;
        $countnominal = count($nominal);
        for ($i=0; $i < $countnominal; $i++) { 
            $nominal1 = (int)$nominal[$i]; 
            $sumnominal += $nominal1;
        }
        $username = Auth::user()->name;
        $userid = Auth::user()->id;
        $profil = DB::table('profil')->where('user_id', $userid)->pluck('rt_id')->first();  
        return view('pengeluaranrw.index',[
            'tittle' => 'Dashboard | Laporan Pengeluaran RW',
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
        $keuangan = new Pengeluaran();
        $keuangan->nama_pembayar = $data['nama_pembayar'];
        $keuangan->rt_pembayar = $data['rt_pembayar'];
        $keuangan->nama_iuran = $data['nama_iuran'];
        $keuangan->jenis = "Pengeluaran";
        $keuangan->nominal = $data['nominal'];
        $keuangan->via = $data['via'];
        $keuangan->save();
        return redirect('/pengeluaran_rw')->with('success', 'Laporan Pengeluaran Sudah Ditambah');   
    }
    public function exportPengeluaran(Request $request){
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        return Excel::download(new ExportPengeluaran, 'Laporan Pengeluaran Tanggal ' . $waktu . '.xlsx');
    }
    public function exportPengeluaranPDF(Request $request){
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        return Excel::download(new ExportPengeluaran, 'Laporan Pengeluaran Tanggal ' . $waktu . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
   

}
