<?php

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



        Route::get('/manage-aktivasi', function () {
            return view('m_aktivasi/index_aktivasi');
        });
        Route::get('/manage-grafik', function () {
            return view('m_grafik/index_grafik');
        });
        Route::get('/manage-profil', function () {
            return view('m_profil/index_profil');
        });

        Route::resource('/manage-admin', AdminsController::class)->names('admins');
        Route::resource('/manage-alumni', AlumnisController::class)->names('alumnis');
        Route::resource('/manage-tahun', TahunsController::class)->names('tahuns');
        Route::resource('aktivasis', AktivasisController::class);

        Route::post('/reset-password/{id}', [AlumnisController::class, 'reset_password'])->name('reset-password');
    }
);


