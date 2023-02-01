<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\PanelRtController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingRtController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\SettingRoleController;
use App\Http\Controllers\IuranBulananController;
// use App\Http\Controllers\SettingRoleRtController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\StatusPengajuanController;
use App\Http\Controllers\LaporanKeuanganRTController;
use App\Http\Controllers\LaporanKeuanganRWController;
use App\Http\Controllers\DaftarWargaController;
use App\Http\Controllers\SuratController;



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
Route::get('/update_password', [UpdatePasswordController::class, 'index']);
Route::get('/iuran_bulanan', [IuranBulananController::class, 'index']);
Route::get('/keuangan_rt', [LaporanKeuanganRTController::class, 'index']);
Route::get('/keuangan_rw', [LaporanKeuanganRWController::class, 'index']);
Route::get('/update_password', [UpdatePasswordController::class, 'index']);
//Profil route

Route::resource('profil', ProfilController::class);
Route::get('/editprofil', [ProfilController::class, 'editprofil']);
Route::post('/profilktp', [ProfilController::class, 'uploadgambar']);
Route::get('/editprofil/{id}', [ProfilController::class, 'updateprofiluser']);
Route::post('/editprofil/{id}', [ProfilController::class, 'updateprofiluser']);

Route::resource('/setting-rt', RtController::class);

Route::get('/setting-role', [SettingRoleController::class, 'index']);
// Route::get('/setting-rolert', [SettingRoleRtController::class, 'index']);

// seting ketua rt
Route::get('/setting-ketuart', [SettingRtController::class, 'index']);
Route::get('/setting-ketuart/{id}/{rt_id}',  [SettingRtController::class, 'updaterolert']);
Route::post('/setting-ketuart/{id}/{rt_id}',  [SettingRtController::class, 'updaterolert']);
// Route::get('/setting-rolert6/{id}', [SettingRoleRtController::class, 'updaterolert']);

//Route Reset Ketua RT
Route::get('/reset-ketuart/{id}/{rt_id}',  [SettingRtController::class, 'resetketua']);
Route::post('/reset-ketuart/{id}/{rt_id}',  [SettingRtController::class, 'resetketua']);
Route::get('/panelrt', [PanelRtController::class, 'index']);
Route::get('/statistik', [StatistikController::class, 'index']);
Route::get('/statistik', [StatistikController::class, 'statistik']);

// Setting Ketua RW
Route::get('/setting-role/{id}', [SettingRoleController::class, 'updaterole']);
Route::post('/setting-role/{id}', [SettingRoleController::class, 'updaterole']);
Route::get('/setting-role6/{id}', [SettingRoleController::class, 'updaterole6']);
Route::post('/setting-role6/{id}', [SettingRoleController::class, 'updaterole6']);

Route::post('/buatsurat', [SuratController::class, 'buatsurat']);
Route::get('/surat', [SuratController::class, 'index']);
// Route::get('/buatsurat', [SuratController::class, 'index']);
Route::get('/lihatsurat/{id}', [SuratController::class, 'cetaksurat']);
Route::delete('/lihatsurat/{id}', [SuratController::class, 'destroy']);

//Route List Daftar Warga
Route::get('/daftarwarga', [DaftarWargaController::class, 'index']);
Route::post('/daftarwarga', [DaftarWargaController::class, 'index']);

// AUTH ROUTE
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
