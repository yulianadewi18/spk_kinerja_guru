<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController,
};
use App\Http\Controllers\{
    MstGuruController,
    DataAlternatifController,
    DataKriteriaController,
    PenilaianAlternatifController,
    PerhitunganController,
    UsersController
};

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

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/process', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    // Admin Role
    Route::middleware('admin')->group(function () {
        Route::prefix('data-guru')->group(function () {
            Route::get('/', [MstGuruController::class, 'index'])->name('data_guru');
            Route::get('/guru', [MstGuruController::class, 'index'])->name('guru.index');
            Route::get('/tambah', [MstGuruController::class, 'create'])->name('create_guru');
        });
        Route::prefix('data-kriteria')->group(function () {
            Route::get('/', [DataKriteriaController::class, 'index'])->name('data_kriteria');
            Route::get('/tambah', [DataKriteriaController::class, 'create'])->name('create_kriteria');
            Route::post('/store', [DataKriteriaController::class, 'store'])->name('store_kriteria');
        });
        Route::prefix('data-pengguna')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('data_pengguna');
            Route::get('/tambah', [UsersController::class, 'create'])->name('create_pengguna');
            Route::post('/store', [UsersController::class, 'store'])->name('store_pengguna');
            Route::delete('/hapus/{id}', [UsersController::class, 'destroy'])->name('destroy_pengguna');
        });
    });
    // Admin & Penguji role
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::prefix('data-alternatif')->group(function () {
        Route::get('/', [DataAlternatifController::class, 'index'])->name('data_alternatif');
        Route::get('/tambah', [DataAlternatifController::class, 'create'])->name('create_alternatif');
    });
    Route::prefix('penilaian-alternatif')->group(function () {
        Route::get('/', [PenilaianAlternatifController::class, 'index'])->name('penilaian_alternatif');
        Route::get('/tambah', [PenilaianAlternatifController::class, 'create'])->name('create_penilaian');
    });
    Route::prefix('proses-saw')->group(function () {
        Route::get('/', [PerhitunganController::class, 'index'])->name('proses_saw');
    });

    Route::get('/laporan-hasil', function () {
        return view('pages.dashboard');
    })->name('laporan_hasil');
    Route::get('/hapus-hasil', function () {
        return view('pages.dashboard');
    })->name('hapus_hasil');
    
});
