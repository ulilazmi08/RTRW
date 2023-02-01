<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public  function index()
    {
        return view('login.index', [
            'tittle' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $input = $request->all();   
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'g-recaptcha-response' => 'required|captcha',
            'password' => 'required'
        ],[
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',

        ]);
        
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->with('loginError', 'Error, Cek Kembali Email atau Password');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
