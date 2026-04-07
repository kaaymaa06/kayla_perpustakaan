@extends('petugas.layouts.app')

@section('content')
<div class="p-6 min-h-screen space-y-6">

    {{-- HEADER --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Petugas</h1>
        <p class="text-sm text-gray-500 mt-1">
            Kelola data perpustakaan dengan mudah
        </p>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-4 gap-6">

        {{-- Total Buku --}}
        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Total Buku</p>
            {{-- <h2 class="text-3xl font-bold text-indigo-600">{{ $totalBuku }}</h2> --}}
        </div>

        {{-- Total Anggota --}}
        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Total Anggota</p>
            {{-- <h2 class="text-3xl font-bold text-blue-600">{{ $totalAnggota }}</h2> --}}
        </div>

        {{-- Peminjaman --}}
        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Peminjaman Aktif</p>
            {{-- <h2 class="text-3xl font-bold text-yellow-500">{{ $totalPeminjaman }}</h2> --}}
        </div>

        {{-- Pengajuan --}}
        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Pengajuan</p>
            {{-- <h2 class="text-3xl font-bold text-red-500">{{ $totalPengajuan }}</h2> --}}
        </div>

    </div>

    {{-- MENU CEPAT --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu Cepat</h2>

        <div class="grid grid-cols-3 gap-6">

            <a href="{{ route('petugas.buku.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-md hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg">Data Buku</h3>
                <p class="text-sm text-gray-500">Kelola buku</p>
            </a>

            <a href="{{ route('petugas.akun.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-md hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg">Data Pengguna</h3>
                <p class="text-sm text-gray-500">Kelola akun</p>
            </a>

            <a href="#"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-md hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg">Peminjaman</h3>
                <p class="text-sm text-gray-500">Lihat transaksi</p>
            </a>

        </div>
    </div>

</div>
@endsection
