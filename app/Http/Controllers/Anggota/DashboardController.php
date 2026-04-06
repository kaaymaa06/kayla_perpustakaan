<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('anggota.dashboard', [
        //     'totalBuku' => Buku::count(),
        //     'totalPinjam' => Peminjaman::where('user_id', auth()->id())->count(),
        ]);
    }
}
