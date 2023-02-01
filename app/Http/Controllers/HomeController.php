<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        $id = Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->get();
        $profil = DB::table('profil')->where('user_id', $id)->get();
        $date = DB::table('profil')->where('user_id', $id)->pluck('tgl_lahir')->first();
        $result = (string) $date;

        // dd($result);
        return view('home.index', [
            'tittle' => 'Dashboard',
            'nama' => $nama,
            'user' => $user,
            'profils' => $profil,
            'result' => $result,
            // 'active' => 'login'
        ]);
    }
}
