<?php

use Illuminate\Support\Facades\Route;

// AUTH
use App\Http\Controllers\AuthController;

// KEPALA PERPUS
use App\Http\Controllers\KepalaPerpus\AkunController;
use App\Http\Controllers\KepalaPerpus\BukuController;
use App\Http\Controllers\KepalaPerpus\KepalaPerpusController;
use App\Http\Controllers\KepalaPerpus\DashboardController;
use App\Http\Controllers\KepalaPerpus\LaporanController;

// PETUGAS
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Petugas\PeminjamanController as PetugasPeminjamanController;
use App\Http\Controllers\Petugas\BukuController as PetugasBukuController;
use App\Http\Controllers\Petugas\AkunController as PetugasAkunController;

// ANGGOTA
use App\Http\Controllers\Anggota\AnggotaController;
use App\Http\Controllers\Anggota\PeminjamanController;
use App\Http\Controllers\Anggota\RiwayatController;
use App\Http\Controllers\Anggota\BukuController as AnggotaBukuController;
use App\Http\Controllers\Anggota\DashboardController as AnggotaDashboardController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [KepalaPerpusController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [KepalaPerpusController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [KepalaPerpusController::class, 'update'])->name('update');

    Route::prefix('akun')->name('akun.')->group(function () {
        Route::get('/', [AkunController::class, 'index'])->name('index');
        Route::get('/create', [AkunController::class, 'create'])->name('create');
        Route::post('/store', [AkunController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [AkunController::class, 'detail'])->name('detail');
        Route::get('/{id}/edit', [AkunController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [AkunController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [AkunController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('buku')->name('buku.')->group(function () {
        Route::get('/', [BukuController::class, 'index'])->name('index');
        Route::get('/create', [BukuController::class, 'create'])->name('create');
        Route::post('/store', [BukuController::class, 'store'])->name('store');
        Route::get('/{buku}/edit', [BukuController::class, 'edit'])->name('edit');
        Route::put('/{buku}/update', [BukuController::class, 'update'])->name('update');
        Route::delete('/{buku}/delete', [BukuController::class, 'destroy'])->name('destroy');
    });

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

});


/*
|--------------------------------------------------------------------------
| ROUTE PETUGAS
|--------------------------------------------------------------------------
*/
Route::prefix('petugas')->middleware('auth')->name('petugas.')->group(function () {

    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [PetugasController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [PetugasController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [PetugasController::class, 'update'])->name('profile.update');

    Route::prefix('akun')->name('akun.')->group(function () {
        Route::get('/', [PetugasAkunController::class, 'index'])->name('index');
        Route::get('/create', [PetugasAkunController::class, 'create'])->name('create');
        Route::post('/store', [PetugasAkunController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [PetugasAkunController::class, 'detail'])->name('detail');
        Route::get('/{id}/edit', [PetugasAkunController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [PetugasAkunController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [PetugasAkunController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('buku')->name('buku.')->group(function () {
        Route::get('/', [PetugasBukuController::class, 'index'])->name('index');
        Route::get('/create', [PetugasBukuController::class, 'create'])->name('create');
        Route::post('/store', [PetugasBukuController::class, 'store'])->name('store');
        Route::get('/{buku}/edit', [PetugasBukuController::class, 'edit'])->name('edit');
        Route::put('/{buku}/update', [PetugasBukuController::class, 'update'])->name('update');
        Route::delete('/{buku}/delete', [PetugasBukuController::class, 'destroy'])->name('destroy');
    });

    // PEMINJAMAN
    Route::get('/peminjaman', [PetugasPeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/{id}', [PetugasPeminjamanController::class, 'view'])->name('peminjaman.view');
    Route::post('/peminjaman/{id}/tolak', [PetugasPeminjamanController::class, 'tolak'])->name('peminjaman.tolak');
    Route::delete('/peminjaman/{id}', [PetugasPeminjamanController::class, 'destroy'])->name('peminjaman.destroy');


    // KONFIRMASI PEMINJAMAN
    Route::get('/peminjaman/konfirmasi/{id}', [PetugasPeminjamanController::class, 'formKonfirmasi'])->name('peminjaman.form');
    Route::post('/peminjaman/proses/{id}', [PetugasPeminjamanController::class, 'prosesKonfirmasi'])->name('peminjaman.proses');
    Route::get('/peminjaman/{id}/view', [PeminjamanController::class, 'view'])->name('petugas.peminjaman.view');
    Route::delete('/peminjaman/{id}', [PetugasPeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    Route::post('/peminjaman/{id}/bayar', [PetugasPeminjamanController::class, 'bayarDenda'])->name('peminjaman.bayar');
    Route::post('/peminjaman/{id}/pinjam', [PeminjamanController::class, 'pinjam'])->name('peminjaman.pinjam');


    // PENGEMBALIAN (PETUGAS)
    Route::get('/pengembalian', [PetugasPeminjamanController::class, 'pengembalian'])->name('pengembalian.index');
    Route::post('/pengembalian/{id}', [PetugasPeminjamanController::class, 'konfirmasiKembali'])->name('pengembalian.konfirmasi');
    Route::get('/pengembalian/{id}/form', [PetugasPeminjamanController::class, 'formKembali'])->name('pengembalian.form');


});


/*
|--------------------------------------------------------------------------
| ROUTE ANGGOTA
|--------------------------------------------------------------------------
*/
Route::prefix('anggota')->middleware('auth')->name('anggota.')->group(function () {

    Route::get('/dashboard', [AnggotaDashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [AnggotaController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [AnggotaController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [AnggotaController::class, 'update'])->name('profile.update');

    Route::get('/buku', [AnggotaBukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/{buku}', [AnggotaBukuController::class, 'view'])->name('buku.view');

    Route::post('/pinjam/{id}', [PeminjamanController::class, 'pinjam'])->name('buku.pinjam');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'view'])->name('peminjaman.view');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/anggota/peminjaman/{id}', [RiwayatController::class, 'detail'])->name('peminjaman.detail');
    Route::post('/bayar-denda/{id}', [RiwayatController::class, 'bayarDenda'])->name('bayarDenda');
 Route::post('/anggota/peminjaman', [PeminjamanController::class, 'store'])
    ->name('peminjaman.store');
});

