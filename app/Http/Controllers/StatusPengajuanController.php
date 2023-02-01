<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusPengajuanController extends Controller
{
    public function index()
    {
        return view('home.status_pengajuan', [
            'tittle' => 'Dashboard | Status Pengajuan',
            // 'active' => 'login'
        ]);
    }
}
