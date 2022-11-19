<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPemasukan;
use Carbon\Carbon;
use App\Models\Iuran;
use App\Models\BayarIuran;
use App\Models\User;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LaporanPemasukanController extends Controller
{
    public function index()
    {
        $nominal = DB::table('keuangan')->where('jenis', "Pemasukan")->pluck('nominal');
        $pengeluaran = DB::table('keuangan')->where('jenis', "Pemasukan")->paginate(10);
        $sumnominal = 0;
        $countnominal = count($nominal);
        for ($i=0; $i < $countnominal; $i++) { 
            $nominal1 = (int)$nominal[$i]; 
            $sumnominal += $nominal1;
        }
        $username = Auth::user()->name;
        $userid = Auth::user()->id;
        $profil = DB::table('profil')->where('user_id', $userid)->pluck('rt_id')->first();  
        return view('pemasukanrw.index',[
            'tittle' => 'Dashboard | Laporan Pengeluaran RW',
            'namauser' => $username,
            'userids' => $userid,
            'rt_pembayar' => $profil,
            'sumnominal' => $sumnominal,
            'laporans'=>$pengeluaran,

        ]);
    }

    public function pemasukan(Request $request)
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
        $keuangan->jenis = "Pemasukan";
        $keuangan->nominal = $data['nominal'];
        $keuangan->via = $data['via'];
        $keuangan->save();
        return redirect('/pemasukan_rw')->with('success', 'Pemasukan Sudah Ditambah');   
    }
    public function exportPemasukan(Request $request){
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        return Excel::download(new ExportPemasukan, 'Laporan Pemasukan Tanggal ' . $waktu . '.xlsx');
    }
    public function exportPemasukanPDF(Request $request){
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        return Excel::download(new ExportPemasukan, 'Laporan Pemasukan Tanggal ' . $waktu . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
