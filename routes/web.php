<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnisController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\TahunsController;
use App\Http\Controllers\AktivasisController;

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
Route::post('/aktivasi-akun', [LoginController::class, 'aktivasi'])->name('aktivasi');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware(['auth:alumnis'])->group(function () {
    Route::get('/dashboards-alumni', function () {
        return view('dashboard/dashboard');
    });
    Route::get('/alumni', function () {
        return view('a_lihatAlumni.index_lihatAlumni');
    });
    Route::get('alumni-profil', function () {
        return view('a_profil.index_profil');
    });

});

Route::middleware(['auth:admin'])->group(
    function () {
        Route::get('/dashboards', function () {
            return view('dashboard/dashboard');
        });



        Route::get('/manage-grafik', function () {
            return view('m_grafik/index_grafik');
        });


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

    }
);


