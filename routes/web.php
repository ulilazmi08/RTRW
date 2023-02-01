<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IuranBulananController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\StatusPengajuanController;
use App\Http\Controllers\LaporanKeuanganRTController;
use App\Http\Controllers\LaporanKeuanganRWController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/status_pengajuan', [StatusPengajuanController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/update_password', [UpdatePasswordController::class, 'index']);
Route::get('/iuran_bulanan', [IuranBulananController::class, 'index']);
Route::get('/keuangan_rt', [LaporanKeuanganRTController::class, 'index']);
Route::get('/keuangan_rw', [LaporanKeuanganRWController::class, 'index']);
Route::get('/update_password', [UpdatePasswordController::class, 'index']);

// AUTH ROUTE
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
