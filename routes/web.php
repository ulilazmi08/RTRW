<?php

use App\Http\Controllers\AnggotaKeluargaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PanelRtController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingRtController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\SettingRoleController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\KepalaKeluargaController;
// use App\Http\Controllers\SettingRoleRtController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\StatusPengajuanController;
use App\Http\Controllers\LaporanKeuanganRTController;
use App\Http\Controllers\LaporanKeuanganRWController;
use App\Http\Controllers\DaftarWargaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanPemasukanController;
use App\Http\Controllers\LaporanPemasukanRtController;
use App\Http\Controllers\LaporanPengeluaranRtController;
use App\Http\Controllers\LaporanPengeluaranController;
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
Route::get('/status-pengajuan', [StatusPengajuanController::class, 'index']);
Route::get('/update_password', [UpdatePasswordController::class, 'index']);
// Route::get('/iuran_bulanan', [IuranBulananController::class, 'index']);
Route::get('/laporan_rt', [LaporanController::class, 'rtview']);
Route::get('/pemasukan_rt', [LaporanPemasukanRtController::class, 'index']);
Route::post('/simpan_pemasukan_rt', [LaporanPemasukanRtController::class, 'pemasukan']);
Route::get('/export-pemasukan-rt',[LaporanPemasukanRtController::class,'exportPemasukanRt'])->name('export-pemasukan-rt');
Route::get('/export-pemasukan-rt-pdf',[LaporanPemasukanRtController::class,'exportPemasukanRtPDF'])->name('export-pemasukan-rt-pdf');
Route::get('/pengeluaran_rt', [LaporanPengeluaranRtController::class, 'index']);
Route::post('/simpan_keuangan_rt', [LaporanKeuanganRTController::class, 'store']);
Route::post('/simpan_pengeluaran_rt', [LaporanPengeluaranRtController::class, 'pengeluaran']);
Route::get('/export-pengeluaran-rt',[LaporanPengeluaranRtController::class,'exportPengeluaranRt'])->name('export-pengeluaran-rt');
Route::get('/export-pengeluaran-rt-pdf',[LaporanPengeluaranRtController::class,'exportPengeluaranRtPDF'])->name('export-pengeluaran-rt-pdf');
Route::get('/laporan_keuangan_rt', [LaporanKeuanganRTController::class, 'index']);
Route::delete('/hapus-laporan-rt/{id}', [LaporanKeuanganRTController::class, 'destroy']);
Route::get('/detail_keuangan_rt/{id}',[LaporanKeuanganRTController::class, 'show']);



Route::get('/update_password', [UpdatePasswordController::class, 'index']);
//Profil route

Route::get('/setting-kepala', [KepalaKeluargaController::class, 'index']);
Route::resource('profil', ProfilController::class);
Route::get('/editprofil', [ProfilController::class, 'editprofil']);
Route::post('/profilktp', [ProfilController::class, 'uploadgambar']);
Route::post('/profilkk', [ProfilController::class, 'uploadkk']);
Route::get('/editprofil/{id}', [ProfilController::class, 'updateprofiluser']);
Route::get('/showprofil/{id}', [ProfilController::class, 'show']);
Route::post('/simpankeluarga', [AnggotaKeluargaController::class, 'simpankeluarga']);
Route::delete('/deleteanggota/{id}', [AnggotaKeluargaController::class, 'destroy']);
Route::post('/editprofil/{id}', [ProfilController::class, 'updateprofiluser']);

Route::resource('/setting-rt', RtController::class);
Route::get('/setting-ketuarw', [SettingRoleController::class, 'index']);

// seting ketua rt
Route::get('/setting-ketuart', [SettingRtController::class, 'index']);
Route::get('/setting-ketuart/{id}/{rt_id}',  [SettingRtController::class, 'updaterolert']);
Route::post('/setting-ketuart/{id}/{rt_id}',  [SettingRtController::class, 'updaterolert']);

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
Route::get('/cetaksurat/{id}', [SuratController::class, 'exportpdf']);
Route::get('/terbitkansurat/{id}', [SuratController::class, 'terbitsurat']);
Route::post('/terbitkansurat/{id}', [SuratController::class, 'terbitsurat']);
Route::get('/carisuratapproved',[SuratController::class, 'search']);


//Route List Daftar Warga
Route::get('/daftarwarga', [DaftarWargaController::class, 'index']);
Route::get('/daftarwargaadmin', [DaftarWargaController::class, 'admins']);
//Bendahara
Route::get('/updatebendahara/{id}', [DaftarWargaController::class, 'updatebendahara']);
Route::post('/updatebendahara/{id}', [DaftarWargaController::class, 'updatebendahara']);
//Sekretaris
Route::get('/updatesekretaris/{id}', [DaftarWargaController::class, 'updatesekretaris']);
Route::post('/updatesekretaris/{id}', [DaftarWargaController::class, 'updatesekretaris']);
Route::get('/jadikanwarga/{id}', [DaftarWargaController::class, 'reset']);

// AUTH ROUTE
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
//RouteIuran
Route::get('/iuran', [IuranController::class, 'index']);
Route::get('/bayariuran/{id}', [IuranController::class, 'membayariuran']);
Route::get('/buatiuran', [IuranController::class, 'buatiuran']);
// Route::post('/bayarkan', [IuranController::class, 'bayar']);
Route::post('/createiuran', [IuranController::class, 'createiuran']);
Route::post('/bayariuran1/pembayaran/iuran', [IuranController::class, 'bayar']);
//RouteLaporanPemasukanKeuangan
Route::get('/pemasukan_rw', [LaporanPemasukanController::class, 'index']);
Route::post('/simpan_pemasukan_rw', [LaporanPemasukanController::class, 'pemasukan']);
Route::get('/export-pemasukan',[LaporanPemasukanController::class,'exportPemasukan'])->name('export-pemasukan');
Route::get('/export-pemasukan-pdf',[LaporanPemasukanController::class,'exportPemasukanPDF'])->name('export-pemasukan-pdf');
//RouteLaporanKeuangan
Route::get('/laporan_keuangan_rw', [LaporanKeuanganRWController::class, 'index']);
Route::delete('/hapus_laporan/{id}', [LaporanKeuanganRWController::class, 'destroy']);
//Laporan RW
Route::get('/laporan_rw', [LaporanController::class, 'index']);
Route::post('/simpan_keuangan_rw', [LaporanKeuanganRWController::class, 'store']);
Route::get('/export-keuangan/{id}',[LaporanKeuanganRWController::class,'exportKeuangan'])->name('export-keuangan');
Route::get('/export-keuangan-pdf/{id}',[LaporanKeuanganRWController::class,'exportKeuanganPDF'])->name('export-keuangan-pdf');
Route::get('/detail_keuangan_rw/{id}',[LaporanKeuanganRWController::class, 'show']);
//RoutePengeluaran
Route::get('/pengeluaran_rw', [LaporanPengeluaranController::class, 'index']);
Route::get('/export-pengeluaran',[LaporanPengeluaranController::class,'exportPengeluaran'])->name('export-pengeluaran');
Route::get('/export-pengeluaran-pdf',[LaporanPengeluaranController::class,'exportPengeluaranPDF'])->name('export-pengeluaran-pdf');
Route::post('/simpan_pengeluaran_rw', [LaporanPengeluaranController::class, 'pengeluaran']);


