<?php

namespace App\Http\Controllers\KepalaPerpus;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Peminjaman::with('user','buku')->get();

        return view('kepala.laporan.index', compact('laporan'));
    }
}
