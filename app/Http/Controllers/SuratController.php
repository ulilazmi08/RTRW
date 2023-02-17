<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Surat;
use App\Notifications\SuratNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use PDF;

class SuratController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $rtpengurus = DB::table('profil')->where('user_id', $id)->pluck('rt_id')->first();     
        $role = Auth::user()->role;
        $latestsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 0)->paginate(5, ['*'], 'unpublished');
        $approvedsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 1)->paginate(5, ['*'], 'published');
        $settingrw = DB::table('setting_tempat')->get();
        $latestsuratrw = DB::table('surat')->where('status', 0)->paginate(5, ['*'], 'unpublished');
        $approvedsuratrw = DB::table('surat')->where('status', 1)->paginate(5, ['*'], 'published');
        if ($role != "3" && $role != "5" && $role != "2"  && $role != "1" && $role != "8") {
            abort(403);
        }
        return view('persuratan.index', [
            'tittle' => 'Dashboard',
            // 'active' => 'login'
            'surat' => $latestsurat,
            'suratrw' => $latestsuratrw,
            'role'=> $role,
            'approvedsurats' => $approvedsurat,
            'approvedsuratsrw' => $approvedsuratrw,

        ]);
    }
    //search surat approved
    public function search(Request $request)
    {
        
        $id = Auth::user()->id;
        $rtpengurus = DB::table('profil')->where('user_id', $id)->pluck('rt_id')->first();     
        $latestsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 0)->paginate(5, ['*'], 'unpublished');
        $approvedsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 1)->paginate(5, ['*'], 'published');
        // menangkap data pencarian
            $cari = $request->search;
            // mengambil data dari table pegawai sesuai pencarian data
        $approvedsuratsearch = DB::table('surat')->where('nama_pengirim','like',"%".$cari."%")->where('rt_pengirim', $rtpengurus)->where('status', 1)->paginate();
        $approvedsurat =  $approvedsuratsearch;
            // mengirim data pegawai ke view index
        return view('persuratan.index',[ 
            'tittle' => 'Dashboard',
            // 'active' => 'login'
            'surat' => $latestsurat,
            'approvedsurats' => $approvedsurat,
    ]);
    }
    //search surat latest
    public function searchsurat(Request $request)
    {
        
        $id = Auth::user()->id;
        $rtpengurus = DB::table('profil')->where('user_id', $id)->pluck('rt_id')->first();     
        $latestsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 0)->paginate(5, ['*'], 'unpublished');
        $approvedsurat = DB::table('surat')->where('rt_pengirim', $rtpengurus)->where('status', 1)->paginate(5, ['*'], 'published');
        // menangkap data pencarian
            $cari = $request->searchsurat;
            // mengambil data dari table pegawai sesuai pencarian data
            $latestsuratsearch = DB::table('surat')->where('nama_pengirim','like',"%".$cari."%")->orWhere('jenis_surat','like',"%".$cari."%")->where('rt_pengirim', $rtpengurus)->where('status', 0)->paginate();
        $latestsurat =  $latestsuratsearch;
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
            'no_ktp_pengirim'=> 'required',
            'agama_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'alamat_asal_pengirim' => 'required',
            'jenis_surat' => 'required|max:255',
            'no_rumah_pengirim' => 'required',
            'no_rumah_asal_pengirim' => 'required',
            'rt_pengirim' => 'required|max:255',
            'keperluan' => 'required',
        ]);
        $data = $request->all();
        $surat = new Surat;
        $surat->nama_pengirim = $data['nama_pengirim'];
        $surat->tgl_lahir_pengirim = $data['tgl_lahir_pengirim'];
        $surat->jenis_kelamin_pengirim = $data['jenis_kelamin_pengirim'];
        $surat->pekerjaan_pengirim = $data['pekerjaan_pengirim'];
        $surat->no_ktp_pengirim = $data['no_ktp_pengirim'];
        $surat->no_rumah_pengirim = $data['no_rumah_pengirim'];
        $surat->no_rumah_asal_pengirim = $data['no_rumah_asal_pengirim'];
        $surat->alamat_asal_pengirim = $data['alamat_asal_pengirim'];
        $surat->agama_pengirim = $data['agama_pengirim'];
        $surat->alamat_pengirim = $data['alamat_pengirim'];
        $surat->kewarganegaraan_pengirim = $data['kewarganegaraan'];
        $surat->pendidikan_pengirim = $data['pendidikan'];
        $surat->tempat_lahir_pengirim = $data['tempat_lahir'];
        $surat->no_ktp_pengirim = $data['no_ktp_pengirim'];
        $surat->rt_pengirim = $data['rt_pengirim'];
        $surat->jenis_surat = $data['jenis_surat'];
        $surat->nomor_surat = $data['nomor_surat'];
        $surat->keperluan = $data['keperluan'];
        $surat->status = 0;
        $surat->save();

        return redirect('/home')->with('success', 'Surat Sudah Dikirim');
    }
    public function terbitsurat($id)
    {
        $suratid =  Surat::find($id);
        $userpengirim = User::where('name', $suratid->nama_pengirim)->get();
        $suratstatus = DB::table('surat')->where('id', $suratid)->pluck('status')->first();
        if ($suratstatus == 0) {
            $suratid->status = 1;
            $suratid->save();
            Notification::send($userpengirim, New SuratNotification($suratid->jenis_surat) );
        }


        return redirect('/surat')->with('success', 'Surat Sudah Diterbitkan');
    }

    public function cetaksurat($id)
    {
        setlocale(LC_TIME, config('app.locale'));
        $suratid = Surat::find($id);
        $tanggallahir = DB::table('surat')->where('id', $id)->pluck('tgl_lahir_pengirim')->first();
        $ketuart = DB::table('rt')->where('nama_rt', $suratid->rt_pengirim)->pluck('ketua_id')->first();
        $waktu =  Carbon::now();
        $bulansurat = $waktu->translatedFormat('d-F-Y');
        $nomorsurat = DB::table('surat')->where('id', $id)->pluck('nomor_surat')->first();
        setlocale(LC_TIME, config('app.locale'));
        $suratid = Surat::find($id);
        $tanggallahir = DB::table('surat')->where('id', $id)->pluck('tgl_lahir_pengirim')->first();
        $ketuart = DB::table('rt')->where('nama_rt', $suratid->rt_pengirim)->pluck('ketua_id')->first();
        $ketuarw = DB::table('users')->where('role', '2')->pluck('name')->first();
        $nomorrw = DB::table('setting_tempat')->where('id',1)->pluck('rw')->first();
        $kecamatan = DB::table('setting_tempat')->where('id',1)->pluck('kecamatan')->first();
        $kelurahan = DB::table('setting_tempat')->where('id',1)->pluck('kelurahan')->first();
        $waktu =  Carbon::now();
        $bulansurat = $waktu->translatedFormat('d-F-Y');        
        $nomorsurat = DB::table('surat')->where('id', $id)->pluck('nomor_surat')->first();

        return view('persuratan.show', [
            'tittle' => 'Surat',
            'ketuart' => $ketuart,
            'surat_pengirim' => $suratid,
            'waktu' => $bulansurat,
            'nomor' =>$nomorsurat,
            'tgllahir' =>$tanggallahir,
            'ketuarw' => $ketuarw,
            'nomorrw' =>$nomorrw,
            'kecamatan' =>$kecamatan,
            'kelurahan' =>$kelurahan,
        ]);
    }

    public function exportpdf($id)
    {
        setlocale(LC_TIME, config('app.locale'));
        $suratid = Surat::find($id);
        $tanggallahir = DB::table('surat')->where('id', $id)->pluck('tgl_lahir_pengirim')->first();
        $ketuart = DB::table('rt')->where('nama_rt', $suratid->rt_pengirim)->pluck('ketua_id')->first();
        $parafrt = DB::table('rt')->where('nama_rt', $suratid->rt_pengirim)->pluck('paraf_rt')->first();
        $ketuarw = DB::table('users')->where('role', '2')->pluck('name')->first();
        $nomorrw = DB::table('setting_tempat')->where('id',1)->pluck('rw')->first();
        $kecamatan = DB::table('setting_tempat')->where('id',1)->pluck('kecamatan')->first();
        $kelurahan = DB::table('setting_tempat')->where('id',1)->pluck('kelurahan')->first();
        $waktu =  Carbon::now();
        $bulansurat = $waktu->translatedFormat('d-F-Y');        
        $nomorsurat = DB::table('surat')->where('id', $id)->pluck('nomor_surat')->first();

      
        // instantiate and use the dompdf class

        $pdf = PDF::loadView('persuratan.print',  [
            'tittle' => 'Surat',
            'ketuart' => $ketuart,
            'surat_pengirim' => $suratid,
            'waktu' => $bulansurat,
            'tgllahir' =>$tanggallahir,
            'nomor' =>$nomorsurat,
            'ketuarw' => $ketuarw,
            'nomorrw' =>$nomorrw,
            'kecamatan' =>$kecamatan,
            'kelurahan' =>$kelurahan,
            'parafrt' =>$parafrt,

        ]);
        $pdf->setPaper('A4', 'potrait');

        return $pdf->stream('tittle.pdf');
    }

    public function destroy($id)
    {
        // $suratid = Surat::find($id);
        Surat::destroy($id);
        return redirect('/surat')->with('successDelete', 'Surat Direject !');
    }
}
    