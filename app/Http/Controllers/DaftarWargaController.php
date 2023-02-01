<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DaftarWargaController extends Controller
{
    public function index()
    {
        $id = Auth::user('profil')->rt_id;
        $warga = DB::table('users')->get();

        return view('daftarwarga.index', [
            'tittle' => 'Daftar Warga',
            'rt' => RT::all(),
        ]);
    }
}
