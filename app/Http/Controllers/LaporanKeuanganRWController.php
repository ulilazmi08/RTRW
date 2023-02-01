<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanKeuanganRWController extends Controller
{
    public function index()
    {
        return view('home.keuangan_rw', [
            'tittle' => 'Dashboard | Laporan Keuangan RW',
            // 'active' => 'login'
        ]);
    }
}
