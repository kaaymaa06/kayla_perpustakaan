@extends('kepala.layouts.app')

@section('content')
<div class="p-6 min-h-screen space-y-6">

    {{-- HEADER --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Kepala Perpustakaan
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Selamat datang, {{ auth()->user()->name }}
        </p>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-2xl shadow flex justify-between items-center">
            <div>
                <p class="text-gray-400 text-sm">Total Buku</p>
                <h2 class="text-3xl font-bold text-blue-600">{{ $totalBuku }}</h2>
            </div>

        </div>

        <div class="bg-white p-6 rounded-2xl shadow flex justify-between items-center">
            <div>
                <p class="text-gray-400 ">Total Anggota</p>
                <h2 class="text-3xl font-bold text-blue-600">{{ $totalAnggota }}</h2>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow flex justify-between items-center">
            <div>
                <p class="text-gray-400 ">Peminjaman Aktif</p>
                <h2 class="text-3xl font-bold text-blue-600">{{ $totalPinjam }}</h2>
            </div>
        </div>

    </div>

    {{-- RINGKASAN HARI INI --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Ringkasan Hari Ini</h3>

        <div class="grid grid-cols-3 gap-4 text-center">

            <div class="bg-gray-50 p-4 rounded-xl">
                <p class=" text-gray-500">Dipinjam Hari Ini</p>
                <p class="text-xl font-bold text-blue-600">{{ $pinjamHariIni ?? 0 }}</p>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl">
                <p class=" text-gray-500">Dikembalikan</p>
                <p class="text-xl font-bold text-blue-600">{{ $kembaliHariIni ?? 0 }}</p>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl">
                <p class=" text-gray-500">Terlambat</p>
                <p class="text-xl font-bold text-red-600">{{ $terlambat ?? 0 }}</p>
            </div>

        </div>
    </div>

    {{-- GRID DATA --}}
    <div class="grid grid-cols-2 gap-6">

        {{-- BUKU TERPOPULER --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Buku Terpopuler</h3>

            <ul class="space-y-2 ">
                @forelse($bukuPopuler ?? [] as $buku)
                    <li class="flex justify-between border-b pb-1">
                        <span>{{ $buku->judul_buku }}</span>
                        <span class="text-indigo-600 font-semibold">{{ $buku->total }}</span>
                    </li>
                @empty
                    <li class="text-gray-500">Belum ada data</li>
                @endforelse
            </ul>
        </div>

        {{-- ⏰ TERLAMBAT --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Peminjaman Terlambat</h3>

            <ul class="space-y-2 ">
                @forelse($terlambatList ?? [] as $item)
                    <li class="border-b pb-1">
                        <span class="font-semibold">{{ $item->user->name }}</span>
                        - {{ $item->buku->judul_buku }}
                    </li>
                @empty
                    <li class="text-gray-500">Tidak ada keterlambatan</li>
                @endforelse
            </ul>
        </div>

    </div>

    {{-- 🔥 MENU CEPAT --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu Cepat</h2>

        <div class="grid grid-cols-3 gap-6">

            <a href="{{ route('kepala.buku.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">
                <h3 class="font-bold text-lg mb-1 text-blue-600"> Data Buku</h3>
                <p class=" text-gray-500">Kelola semua buku</p>
            </a>

            <a href="{{ route('kepala.akun.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">
                <h3 class="font-bold text-lg mb-1 text-blue-600">Data Akun</h3>
                <p class=" text-gray-500">Kelola pengguna</p>
            </a>

            <a href="{{ route('kepala.laporan.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">
                <h3 class="font-bold text-lg mb-1 text-blue-600">Laporan</h3>
                <p class=" text-gray-500">Lihat laporan perpustakaan</p>
            </a>

        </div>
    </div>

</div>
@endsection
