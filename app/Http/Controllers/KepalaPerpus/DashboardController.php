<?php

namespace App\Http\Controllers\KepalaPerpus;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('kepala.dashboard', [
            'totalBuku' => Buku::count(),
            'totalAnggota' => User::count(),
            'totalPinjam' => 0
        ]);
    }
}
