<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdmResetController;
use App\Http\Controllers\AlumniProfileController;
use App\Http\Controllers\CekStatusAktivasi;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnisController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\TahunsController;
use App\Http\Controllers\AktivasisController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\CariAlumniController;

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
Route::resource('/', LoginController::class)->names('login');
// Aktivasi Akun 
Route::post('/aktivasi-akun', [LoginController::class, 'aktivasi'])->name('aktivasi');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/cek-status', [CekStatusAktivasi::class, 'cek_status'])->name('cek_status');
Route::post('/reset-password', [AdmResetController::class, 'reset_password'])->name('reset_password');



Route::middleware(['auth:alumnis'])->group(function () {

    // Biodata
    Route::get('alumni-profil', function () {
        return view('a_profil.index_profil');
    });

    Route::get('alumni-profil', [AlumniProfileController::class, 'index'])->name('alumni-profil');



    Route::put('/update-biodata/{id}', [AlumniProfileController::class, 'update'])->name('ganti_biodata');
    Route::put('/update-password/{id}', [AlumniProfileController::class, 'ganti_password'])->name('ganti_password');
    Route::put('/update-foto/{id}', [AlumniProfileController::class, 'ganti_foto'])->name('ganti_foto');

    // Dashboard
    Route::get('/dashboards-alumni', function () {
        return view('a_dashboard/index_dashboard');
    });

    // Lihat Alumni
    Route::get('/alumni', function () {
        return view('a_lihatAlumni.index_lihatAlumni');
    });

    Route::post('/cari-alumni', [CariAlumniController::class, 'cari'])->name('cari-alumni');



});

Route::middleware(['auth:admin'])->group(
    function () {
        // Dashboard Admin
        Route::get('/dashboards', [AdminDashboardController::class, 'index'])->name('dashboard.admin');

        // Manajemen Profil Admin
        Route::resource('/setting-profil', AdminProfileController::class)->names('setting-profil');
        Route::put('/setting-profil/reset/{id}', [AdminProfileController::class, 'ganti_password'])->name('setting-profil.ganti_password');
        Route::put('/setting-profil/ganti-foto/{id}', [AdminProfileController::class, 'ganti_foto'])->name('setting-profil.ganti_foto');

        // Manajemen Admin
        Route::resource('/manage-admin', AdminsController::class)->names('admins');

        // Manajemen Alumni
        Route::resource('/manage-alumni', AlumnisController::class)->names('alumnis');
        Route::post('/reset-password/{id}', [AlumnisController::class, 'reset_password'])->name('reset-password');

        // Manajemen Tahun
        Route::resource('/manage-tahun', TahunsController::class)->names('tahuns');

        // Manajemen Aktivasi
        Route::resource('manage-aktivasi', AktivasisController::class)->names('aktivasis');


        //Grafik Admin
        Route::resource('/grafik', GrafikController::class)->names('grafik');

    }
);


