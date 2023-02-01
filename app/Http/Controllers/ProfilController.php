<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('home.profil', [
            'tittle' => 'Profil',
            // 'active' => 'login'
        ]);
    }
}
