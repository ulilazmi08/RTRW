<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    public function index()
    {
        return view('home.update_password', [
            'tittle' => 'Password',
            // 'active' => 'login'
        ]);
    }
}
