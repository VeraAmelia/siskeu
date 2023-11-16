<?php

use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BiayaKepegawaianBopController;
use App\Http\Controllers\BiayaKepegawaianRinciController;
use App\Http\Controllers\BiayaRinciKepegawaianBopController;
use App\Http\Controllers\BiayaRinciSaprasBopController;
use App\Http\Controllers\BiayaUmumPengajuanBopController;
use App\Http\Controllers\diagramBulananController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\laporanBulananController;
use App\Http\Controllers\LaporanRinciBopController;
use App\Http\Controllers\PemasukanPengajuanBopController;
use App\Http\Controllers\PendapatanBulanannController;
use App\Http\Controllers\PengeluaranBopController;
use App\Http\Controllers\PengeluaranRinciBopController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RinciBiayaUmumBopController;
use App\Http\Controllers\SaPrasaranaBopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [LandingController::class, 'index'])->name('landing');
// Route::get('/email', [LandingController::class, 'email'])->name('email');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::post('/ganti-password', [LoginController::class, 'updatePassword'])->name('update-password');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::resource('pengajuanBOP', PemasukanPengajuanBopController::class);
    Route::get('/exportPdf', [BiayaKepegawaianBopController::class, 'exportPDF'])->name('exportPdf');
    Route::get('/cetakPertanggal', [BiayaKepegawaianBopController::class, 'cetakPertanggal'])->name('cetakPertanggal');
    Route::get('/cetakDataPertanggal/{tglawal}/{tglakhir}', [BiayaKepegawaianBopController::class, 'cetakPegawaiPertanggal'])->name('cetakPegawaiPertanggal');
    Route::get('/cetakPengajuanPertanggal/{tglpengajuanawal}/{tglpengajuanakhir}', [BiayaKepegawaianBopController::class, 'cetakPengajuanPertanggal'])->name('cetakPengajuanPertanggal');


    Route::resource('users', LoginController::class);
    Route::resource('biayaKepegawaian', BiayaKepegawaianBopController::class);
    Route::resource('biayaUmumPengajuanBop', BiayaUmumPengajuanBopController::class);
    Route::resource('saPrasaranaBop', SaPrasaranaBopController::class);
    Route::resource('biayaRinciKepegawaian', BiayaRinciKepegawaianBopController::class);
    Route::resource('biayaRinciSapras', BiayaRinciSaprasBopController::class);
    Route::resource('rinciBiayaUmumBop', RinciBiayaUmumBopController::class);
    Route::resource('diagram', diagramBulananController::class);
    Route::resource('laporanAktivitasBulanan', laporanBulananController::class);
    Route::resource('laporanRinciBop', PengeluaranRinciBopController::class);
    Route::resource('cetakLaporan', LaporanRinciBopController::class);
});
