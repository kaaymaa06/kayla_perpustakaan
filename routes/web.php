<?php

use App\Http\Controllers\KepalaPerpus\AkunController;
use App\Http\Controllers\KepalaPerpus\BukuController;
use App\Http\Controllers\KepalaPerpus\KepalaPerpusController;
use App\Http\Controllers\KepalaPerpus\DashboardController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Petugas\BukuController as PetugasBukuController;
use App\Http\Controllers\Petugas\AkunController as PetugasAkunController;

use App\Http\Controllers\Anggota\AnggotaController;
use App\Http\Controllers\Anggota\DashboardController as AnggotaDashboardController;

// use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL (PILIH ROLE)
|--------------------------------------------------------------------------
*/
// Route::get('/', [RoleController::class, 'index'])->name('role');

/*
|--------------------------------------------------------------------------
| DASHBOARD ROLE
|--------------------------------------------------------------------------
*/
// Route::get('/dashboard/kepala', [RoleController::class, 'kepala'])->name('kepala.dashboard');
// Route::get('/dashboard/petugas', [RoleController::class, 'petugas'])->name('petugas.dashboard');
// Route::get('/dashboard/anggota', [RoleController::class, 'anggota'])->name('anggota.dashboard');

Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ROUTE KEPALA PERPUSTAKAAN
|--------------------------------------------------------------------------
*/
Route::prefix('kepala')->middleware('auth')->name('kepala.')->group(function () {

    /*
    |----------------------------------
    | DASHBOARD
    |----------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |----------------------------------
    | PROFILE
    |----------------------------------
    */
    Route::get('/profile', [KepalaPerpusController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [KepalaPerpusController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [KepalaPerpusController::class, 'update'])->name('update');

    /*
    |----------------------------------
    | MANAJEMEN AKUN
    |----------------------------------
    */
    Route::prefix('akun')->name('akun.')->group(function () {

        Route::get('/', [AkunController::class, 'index'])->name('index');
        Route::get('/create', [AkunController::class, 'create'])->name('create');
        Route::post('/store', [AkunController::class, 'store'])->name('store');

        Route::get('/{id}/detail', [AkunController::class, 'detail'])->name('detail');
        Route::get('/{id}/edit', [AkunController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [AkunController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [AkunController::class, 'destroy'])->name('destroy');
    });

    /*
    |----------------------------------
    | MANAJEMEN BUKU
    |----------------------------------
    */
    Route::prefix('buku')->name('buku.')->group(function () {

        Route::get('/', [BukuController::class, 'index'])->name('index');
        Route::get('/create', [BukuController::class, 'create'])->name('create');
        Route::post('/store', [BukuController::class, 'store'])->name('store');

        Route::get('/{buku}/edit', [BukuController::class, 'edit'])->name('edit');
        Route::put('/{buku}/update', [BukuController::class, 'update'])->name('update');
        Route::delete('/{buku}/delete', [BukuController::class, 'destroy'])->name('destroy');
    });

});



/*
|--------------------------------------------------------------------------
| ROUTE PETUGAS
|--------------------------------------------------------------------------
*/
Route::prefix('petugas')->middleware('auth')->name('petugas.')->group(function () {
    /*
    |----------------------------------
    | DASHBOARD
    |----------------------------------
    */
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');
     /*
    |----------------------------------
    | PROFILE
    |----------------------------------
    */
    Route::get('/profile', [PetugasController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [PetugasController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [PetugasController::class, 'update'])->name('profile.update');

    /*
    |----------------------------------
    | MANAJEMEN AKUN
    |----------------------------------
    */
    Route::prefix('akun')->name('akun.')->group(function () {

        Route::get('/', [PetugasAkunController::class, 'index'])->name('index');
        Route::get('/create', [PetugasAkunController::class, 'create'])->name('create');
        Route::post('/store', [PetugasAkunController::class, 'store'])->name('store');

        Route::get('/{id}/detail', [PetugasAkunController::class, 'detail'])->name('detail');
        Route::get('/{id}/edit', [PetugasAkunController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [PetugasAkunController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [PetugasAkunController::class, 'destroy'])->name('destroy');
    });

/*
    |----------------------------------
    | MANAJEMEN BUKU
    |----------------------------------
    */
    Route::prefix('buku')->name('buku.')->group(function () {

        Route::get('/', [PetugasBukuController::class, 'index'])->name('index');

        Route::post('/store', [PetugasBukuController::class, 'store'])->name('store');
         Route::get('/create', [PetugasBukuController::class, 'create'])->name('create');
        Route::get('/{buku}/edit', [PetugasBukuController::class, 'edit'])->name('edit');
        Route::put('/{buku}/update', [PetugasBukuController::class, 'update'])->name('update');
        Route::delete('/{buku}/delete', [PetugasBukuController::class, 'destroy'])->name('destroy');
    });

});

/*
|--------------------------------------------------------------------------
| ROUTE ANGGOTA
|--------------------------------------------------------------------------
*/
Route::prefix('anggota')->middleware('auth')->name('anggota.')->group(function () {

/*
    |----------------------------------
    | DASHBOARD
    |----------------------------------
    */
    Route::get('/dashboard', [AnggotaDashboardController::class, 'index'])->name('dashboard');
     /*
    |----------------------------------
    | PROFILE
    |----------------------------------
    */
    Route::get('/profile', [AnggotaController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [AnggotaController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [AnggotaController::class, 'update'])->name('profile.update');

});
