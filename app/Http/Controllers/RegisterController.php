<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public  function index()
    {
        return view('register.index', [
            'tittle' => 'Register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'no_ktp' => 'required|min:16|unique:users',
            'email' => 'required|email| unique:users',
            'password' => 'required|min:6|max:255'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Successfull please Login !');
    }
}
