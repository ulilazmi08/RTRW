<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StatusPengajuanController extends Controller
{
    public function index()
    {   
        $username = Auth::user()->name;
        $suratuser = DB::table('surat')->where('nama_pengirim', $username)->paginate(3);
        return view('home.status_pengajuan', [
            'tittle' => 'Dashboard | Status Pengajuan',
            'suratusers' => $suratuser,
        ]);
    }
}
