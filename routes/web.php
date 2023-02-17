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
use App\Http\Controllers\ForgotPasswordController;
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
use App\Http\Controllers\SettingController;






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
Route::get('/updatewarga/{id}', [ProfilController::class, 'updateprofilwarga']);
Route::get('/updatewargaasrw/{id}', [ProfilController::class, 'updateprofilwargaasrw']);

Route::get('/showprofil/{id}', [ProfilController::class, 'show']);
Route::get('/profilwarga/{id}', [ProfilController::class, 'profilwarga']);
Route::get('/editprofilwarga/{id}', [ProfilController::class, 'editprofilwarga']);
Route::post('/simpankeluarga', [AnggotaKeluargaController::class, 'simpankeluarga']);
Route::delete('/deleteanggota/{id}', [AnggotaKeluargaController::class, 'destroy']);
Route::post('/editprofil/{id}', [ProfilController::class, 'updateprofiluser']);
Route::post('/updatewarga/{id}', [ProfilController::class, 'updateprofilwarga']);
//asrw
Route::post('/simpankeluargaasrw', [AnggotaKeluargaController::class, 'simpankeluargaasrw']);
Route::delete('/deleteanggotaasrw/{id}', [AnggotaKeluargaController::class, 'destroyasrw']);
Route::post('/updatewargaasrw/{id}', [ProfilController::class, 'updateprofilwargaasrw']);

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
Route::get('/carisurat',[SuratController::class, 'searchsurat']);
Route::get('/carisuratapproved',[SuratController::class, 'search']);


//Route List Daftar Warga
Route::get('/daftarwarga', [DaftarWargaController::class, 'index']);
Route::get('/daftarwargaadmin', [DaftarWargaController::class, 'admins']);
//Bendahara
Route::get('/updatebendahara/{id}', [DaftarWargaController::class, 'updatebendahara']);
Route::post('/updatebendahara/{id}', [DaftarWargaController::class, 'updatebendahara']);
Route::get('/updatebendahararw/{id}', [DaftarWargaController::class, 'updatebendahararw']);
Route::post('/updatebendahararw/{id}', [DaftarWargaController::class, 'updatebendahararw']);
//Sekretaris
Route::get('/updatesekretaris/{id}', [DaftarWargaController::class, 'updatesekretaris']);
Route::post('/updatesekretaris/{id}', [DaftarWargaController::class, 'updatesekretaris']);
Route::get('/updatesekretarisrw/{id}', [DaftarWargaController::class, 'updatesekretarisrw']);
Route::post('/updatesekretarisrw/{id}', [DaftarWargaController::class, 'updatesekretarisrw']);
Route::get('/jadikanwarga/{id}', [DaftarWargaController::class, 'reset']);
Route::get('/jadikanwargarw/{id}', [DaftarWargaController::class, 'resetwargarw']);
Route::delete('/deletewarga/{id}', [DaftarWargaController::class, 'destroy']);
Route::delete('/deletewargarw/{id}', [DaftarWargaController::class, 'destroyasrw']);
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
Route::delete('/hapusiuran/{id}', [IuranController::class, 'destroy']);
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
Route::get('/export-keuanganrt/{id}',[LaporanKeuanganRTController::class,'exportKeuanganRt'])->name('export-keuanganrt');
Route::get('/export-keuanganrt-pdf/{id}',[LaporanKeuanganRTController::class,'exportKeuanganRtPDF'])->name('export-keuanganrt-pdf');
Route::get('/detail_keuangan_rw/{id}',[LaporanKeuanganRWController::class, 'show']);
//RoutePengeluaran
Route::get('/pengeluaran_rw', [LaporanPengeluaranController::class, 'index']);
Route::get('/export-pengeluaran',[LaporanPengeluaranController::class,'exportPengeluaran'])->name('export-pengeluaran');
Route::get('/export-pengeluaran-pdf',[LaporanPengeluaranController::class,'exportPengeluaranPDF'])->name('export-pengeluaran-pdf');
Route::post('/simpan_pengeluaran_rw', [LaporanPengeluaranController::class, 'pengeluaran']);

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm']);
Route::post('forget-password-post', [ForgotPasswordController::class, 'submitForgetPasswordForm']); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::get('/home/markNotifications', [HomeController::class, 'markNotification'])->name('user.markNotification');
Route::post('/mark-as-read', [HomeController::class, 'markNotification'])->name('markNotification');
Route::get('/carilaporan',[LaporanKeuanganRWController::class, 'carilaporan']);
Route::get('/cariwarga',[DaftarWargaController::class, 'cariwarga']);
Route::get('/cariwargarw',[DaftarWargaController::class, 'cariwargarw']);
Route::get('/carilaporanrt',[LaporanKeuanganRTController::class, 'carilaporanrt']);
Route::post('reset-password-submit', [ForgotPasswordController::class, 'submitResetPasswordForm']);
//Setting Route
Route::get('/setting', [SettingController::class, 'index']);
Route::get('/updatetempat/{id}', [SettingController::class, 'updatetempat']);
Route::post('/simpansetting', [SettingController::class, 'simpansetting']);
Route::post('/updatetempat/{id}', [SettingController::class, 'updatetempat']);
Route::post('/uploadlogo', [SettingController::class, 'uploadlogo']);
Route::post('/uploadparaf/{id}', [RtController::class, 'uploadparaf']);