<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profil;
use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $surat = DB::table('surat')->get();
        return view('persuratan.index', [
            'tittle' => 'Dashboard',
            // 'active' => 'login'
            'surat' => $surat
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

        return redirect('/surat')->with('success', 'Surat Sudah Dikirim');
    }

    public function cetaksurat($id)
    {
        setlocale(LC_TIME, config('app.locale'));
        $suratid = Surat::find($id);
        $ketuart = DB::table('rt')->where('nama_rt', $suratid->rt_pengirim)->pluck('ketua_id')->first();
        $waktu =  Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        // $waktuindo = Carbon::createFromFormat('D MMMM Y', $waktu, 'Asia/Jakarta');
        // $tgl_lahir_pengirim =  DB::table('surat')->where('tgl_lahir_pengirim')->pluck('tgl_lahir_pengirim')->first();
        // $jenis_kelamin_pengirim =  DB::table('surat')->where('jenis_kelamin_pengirim')->pluck('jenis_kelamin_pengirim')->first();
        // $pekerjaan_pengirim =  DB::table('surat')->where('pekerjaan_pengirim')->pluck('pekerjaan_pengirim')->first();
        // $jenis_surat =  DB::table('surat')->where('jenis_surat')->pluck('jenis_surat')->first();
        // $keperluan =  DB::table('surat')->where('keperluan')->pluck('keperluan')->first();

        return view('persuratan.show', [
            'tittle' => 'Surat',
            'ketuart' => $ketuart,
            'surat_pengirim' => $suratid,
            'waktu' => $waktu,
            // 'tgl_lahir_pengirim' => $tgl_lahir_pengirim,
            // 'jenis_kelamin_pengirim' => $jenis_kelamin_pengirim,
            // 'pekerjaan_pengirim' => $pekerjaan_pengirim,
            // 'jenis_surat' => $jenis_surat,
            // 'keperluan' => $keperluan,
            // 'active' => 'login'
        ]);
    }
    public function destroy($id)
    {
        // $suratid = Surat::find($id);
        Surat::destroy($id);
        return redirect('/surat')->with('success', 'Surat Direject !');
    }
}
