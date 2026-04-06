@extends('kepala.layouts.app')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen space-y-6">

    {{-- 🔥 HEADER --}}
    <div class="bg-gradient-to-r from-indigo-500 to-blue-500 text-black p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold">Selamat Datang!</h1>
        <p class="text-sm mt-1 opacity-90">
            Semoga harimu menyenangkan. Kelola perpustakaan dengan mudah di sini.
        </p>
    </div>

    {{-- 🔥 STATISTIK --}}
    <div class="grid grid-cols-3 gap-6">

        <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Buku</p>
                <h2 class="text-3xl font-bold text-indigo-600">{{ $totalBuku }}</h2>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Anggota</p>
                <h2 class="text-3xl font-bold text-blue-600">{{ $totalAnggota }}</h2>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Peminjaman Aktif</p>
                <h2 class="text-3xl font-bold text-green-600">{{ $totalPinjam }}</h2>
            </div>
        </div>

    </div>

    {{-- 🔥 MENU CEPAT --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu Cepat</h2>

        <div class="grid grid-cols-3 gap-6">

            <a href="{{ route('kepala.buku.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">

                <h3 class="font-bold text-lg mb-1">Data Buku</h3>
                <p class="text-sm text-gray-500">Kelola semua buku</p>
            </a>

            <a href="{{ route('kepala.akun.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">

                <h3 class="font-bold text-lg mb-1">Data Akun</h3>
                <p class="text-sm text-gray-500">Kelola pengguna</p>
            </a>

            <a href="#"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">

                <h3 class="font-bold text-lg mb-1">Peminjaman</h3>
                <p class="text-sm text-gray-500">Lihat data peminjaman</p>
            </a>

        </div>
    </div>

</div>
@endsection
