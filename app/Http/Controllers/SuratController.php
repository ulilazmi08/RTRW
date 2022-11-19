<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PDF;

class SuratController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $rtpengurus = DB::table('profil')->where('user_id', $id)->pluck('rt_id')->first();     
        $latestsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 0)->paginate(1, ['*'], 'published');
        $latestsuratsearch = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 0)->get();
        $approvedsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 1)->paginate(1, ['*'], 'unpublished');
        $approvedsuratsearch = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 1)->get();
        // if (request('search')) {
        //     $approvedsuratsearch->where('nama_pengirim', 'like', "%" . request('search') . "%");
        //     $approvedsuratsearch = $approvedsurat;
        // }
        return view('persuratan.index', [
            'tittle' => 'Dashboard',
            // 'active' => 'login'
            'surat' => $latestsurat,
            'approvedsurats' => $approvedsurat,
        ]);
    }
    public function search(Request $request)
    {
        
        $id = Auth::user()->id;
        $rtpengurus = DB::table('profil')->where('user_id', $id)->pluck('rt_id')->first();     
        $latestsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 0)->paginate(1, ['*'], 'published');
        $latestsuratsearch = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 0)->get();
        $approvedsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 1)->paginate(1, ['*'], 'unpublished');
        	// menangkap data pencarian
            $cari = $request->search;
            // mengambil data dari table pegawai sesuai pencarian data
        $approvedsuratsearch = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 1)->where('nama_pengirim','like',"%".$cari."%")->paginate();
        $approvedsurat =  $approvedsuratsearch;
            // mengirim data pegawai ke view index
        return view('persuratan.index',[ 
            'tittle' => 'Dashboard',
            // 'active' => 'login'
            'surat' => $latestsurat,
            'approvedsurats' => $approvedsurat,
    ]);
 }

    public function buatsurat(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required',
            'tgl_lahir_pengirim' => 'required',
            'jenis_kelamin_pengirim' => 'required',
            'pekerjaan_pengirim' => 'required',
            'agama_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'jenis_surat' => 'required|max:255',
            'rt_pengirim' => 'required|max:255',
            'keperluan' => 'required',
        ]);
        $data = $request->all();
        $surat = new Surat;
        $surat->nama_pengirim = $data['nama_pengirim'];
        $surat->tgl_lahir_pengirim = $data['tgl_lahir_pengirim'];
        $surat->jenis_kelamin_pengirim = $data['jenis_kelamin_pengirim'];
        $surat->pekerjaan_pengirim = $data['pekerjaan_pengirim'];
        $surat->agama_pengirim = $data['agama_pengirim'];
        $surat->alamat_pengirim = $data['alamat_pengirim'];
        $surat->rt_pengirim = $data['rt_pengirim'];
        $surat->jenis_surat = $data['jenis_surat'];
        $surat->nomor_surat = 1;
        $surat->keperluan = $data['keperluan'];
        $surat->status = 0;
        $surat->save();

        return redirect('/home')->with('success', 'Surat Sudah Dikirim');
    }
    public function terbitsurat($id)
    {
        $suratid =  Surat::find($id);
        $suratstatus = DB::table('surat')->where('id', $suratid)->pluck('status')->first();
        if ($suratstatus == 0) {
            $suratid->status = 1;
            $suratid->save();
        }
        return redirect('/surat')->with('success', 'Surat Sudah Diterbitkan');
    }

    public function cetaksurat($id)
    {
        setlocale(LC_TIME, config('app.locale'));
        $suratid = Surat::find($id);
        $ketuart = DB::table('rt')->where('nama_rt', $suratid->rt_pengirim)->pluck('ketua_id')->first();
        $tanggallahir = DB::table('surat')->where('id', $id)->pluck('tgl_lahir_pengirim')->first();
        $waktu =  Carbon::now()->locale('id')->format('d-m-Y');
        $jenissurat = DB::table('surat')->where('id', $id)->pluck('jenis_surat')->first();
        $ktp = "";
        $kks = "";
        if ($jenissurat == "Membuat KTP Baru") {
            $ktp = "KP2.1";
        }
        if ($jenissurat == "Membuat Kartu Keluarga Baru") {
            $kks = "II";
        }

        return view('persuratan.show', [
            'tittle' => 'Surat',
            'ketuart' => $ketuart,
            'surat_pengirim' => $suratid,
            'waktu' => $waktu,
            'ktps' => $ktp,
            'kk'=> $kks,
            'tgllahir' =>$tanggallahir,

        ]);
    }

    public function exportpdf($id)
    {
        setlocale(LC_TIME, config('app.locale'));
        $suratid = Surat::find($id);
        $tanggallahir = DB::table('surat')->where('id', $id)->pluck('tgl_lahir_pengirim')->first();
        $ketuart = DB::table('rt')->where('nama_rt', $suratid->rt_pengirim)->pluck('ketua_id')->first();
        $waktu =  Carbon::now()->locale('id')->format('d-m-Y');
      
        // instantiate and use the dompdf class

        $pdf = PDF::loadView('persuratan.print',  [
            'tittle' => 'Surat',
            'ketuart' => $ketuart,
            'surat_pengirim' => $suratid,
            'waktu' => $waktu,
            'tgllahir' =>$tanggallahir,
        ]);
        return $pdf->stream('Surat.pdf');
    }

    public function destroy($id)
    {
        // $suratid = Surat::find($id);
        Surat::destroy($id);
        return redirect('/surat')->with('success', 'Surat Direject !');
    }
}
    