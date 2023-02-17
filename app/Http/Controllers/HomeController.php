<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Notifications\SuratNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        $ktpuser = Auth::user()->no_ktp;
        $user = DB::table('users')->where('id', $id)->get();
        $surat = DB::table('surat')->get();
        $countsurat = count($surat)+1;
        // $userall = $user = Auth::user(); 
        $userpengirim = DB::table('users')->where('id', $id)->get();
        $profil = DB::table('profil')->where('user_id', $id)->get();
        $rtid = DB::table('profil')->where('user_id', $id)->pluck('rt_id')->first();
        $date = DB::table('profil')->where('user_id', $id)->pluck('tgl_lahir')->first();
        $pendidikan = DB::table('profil')->where('user_id', $id)->pluck('pendidikan')->first();
        $kewarganegaraan = DB::table('profil')->where('user_id', $id)->pluck('kewarganegaraan')->first();
        $notifications = auth()->user()->unreadNotifications;
        $waktu = Carbon::now()->locale('id')->format('Y');
        $bulan = Carbon::now();
        $monthName = $bulan->translatedFormat('F');
        $result = (string) $date;
        $getsuratktp = DB::table('surat')->where('jenis_surat', 'Surat Pengantar KTP')->get();
        $countsuratktp = count($getsuratktp)+1;
        $getsuratkk = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Kartu Keluarga')->get();
        $countsuratkk = count($getsuratkk)+1;
        $getsuratnikah = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Nikah')->get();
        $countsuratnikah = count($getsuratnikah)+1;
        $getsuratnikah = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Nikah')->get();
        $countsuratnikah = count($getsuratnikah)+1;
        $getsurattidakmampu = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Keterangan Tidak Mampu')->get();
        $countsurattidakmampu = count($getsurattidakmampu)+1;
        $getsuratkck = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Keterangan Catatan Kepolisian')->get();
        $countsuratkck = count($getsuratkck)+1;
        $getsuratdomisilisementara = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Domisili Sementara')->get();
        $countsuratdomisilisementara = count($getsuratdomisilisementara)+1;
        $getsuratdomisili = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Domisili')->get();
        $countsuratdomisili = count($getsuratdomisili)+1;
        $getsuratkematian = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Kematian')->get();
        $countsuratkematian = count($getsuratkematian)+1;
        $getsuratpindah = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Pindah')->get();
        $countsuratpindah = count($getsuratpindah)+1;
        $getsuratjalan = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Jalan')->get();
        $countsuratjalan = count($getsuratjalan)+1;
        $getsuratizinusaha = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Izin Usaha')->get();
        $countsuratizinusaha = count($getsuratizinusaha)+1;
        $getsuratperjanjian = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Pernyataan Perjanjian')->get();
        $countsuratperjanjian = count($getsuratperjanjian)+1;
        $getsuratkelahiran = DB::table('surat')->where('jenis_surat', 'Surat Pengantar Kelahiran')->get();
        $countsuratkelahiran = count($getsuratkelahiran)+1;
        $logo = DB::table('setting_tempat')->pluck('logo')->first();
        return view('home.index', [
            'tittle' => 'Dashboard',
            'nama' => $nama,
            'user' => $user,
            'profils' => $profil,
            'tahun' => $waktu,
            'bulan' => $monthName,
            'rt' => $rtid,
            'result' => $result,
            'nomorsurat'=> $countsurat,
            'userpengirims' => $userpengirim,
            'countsuratktps' => $countsuratktp,
            'kks' => $countsuratkk,
            'nikahs' => $countsuratnikah,
            'tidakmampu' => $countsurattidakmampu,
            'skck' => $countsuratkck,
            'domisilisementara' => $countsuratdomisilisementara,
            'domisili' => $countsuratdomisili,
            'kematian' => $countsuratkematian,
            'pindah' => $countsuratpindah,
            'perjanjian' => $countsuratperjanjian,
            'kelahiran' => $countsuratkelahiran,
            'userrole' => $role,
            'jalan' => $countsuratjalan,
            'pendidikan' => $pendidikan,
            'kewarganegaraan' => $kewarganegaraan,
            'notifications' =>$notifications,
            'izinusaha' => $countsuratizinusaha,
            'noktp' => $ktpuser,
            'logo'=> $logo,
            // 'active' => 'login'
        ]);
    }
    public function markNotification(Request $request)
    {
        auth()->user()
        ->unreadNotifications
        ->when($request->input('id'), function ($query) use ($request) {
            return $query->where('id', $request->input('id'));
        })
        ->markAsRead();

    return response()->noContent();
    }
}
