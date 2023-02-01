<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanKeuanganRTController extends Controller
{
    public function index()
    {
        return view('home.keuangan_rt', [
            'tittle' => 'Dashboard | Keuangan RT',
            // 'active' => 'login'
        ]);
    }
}
