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
        return view('laporanrw.laporanrw', [
            'tittle' => 'Dashboard | Laporan Keuangan RW',
            
            // 'active' => 'login'
        ]);
        
    }
}
