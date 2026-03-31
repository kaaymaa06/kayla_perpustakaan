<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/daftar_akun', function () {
    return view('daftar-akun');
});
