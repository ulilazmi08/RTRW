<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Iuran;
use App\Models\BayarIuran;
use App\Models\User;
use App\Models\Keuangan;
use App\Models\KeuanganRW;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index ()
    {        
        $role = Auth::user()->role;
        if ($role != "2" && $role != "4"  && $role != "1"  && $role != "7") {
            abort(403);
        }
        return view('laporanrw.laporanrw', [
            'tittle' => 'Dashboard | Laporan Keuangan RW',
            
            // 'active' => 'login'
        ]);
        
    }
    public function rtview ()
    {
        $role = Auth::user()->role;

        if ($role != "3" && $role != "4"  && $role != "1") {
            abort(403);
        }
        return view('laporanrt.laporanrt', [
            'tittle' => 'Dashboard | Keuangan RT',
            // 'active' => 'login'
        ]);
        
    }
}
