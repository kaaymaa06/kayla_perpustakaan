@extends('anggota.layouts.app')

@section('content')
<div class="p-6 min-h-screen space-y-6">

    {{-- HEADER --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Anggota</h1>
        <p class="text-sm text-gray-500 mt-1">
            Lihat informasi dan aktivitas peminjaman kamu
        </p>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-2 gap-6">

        {{-- Total Buku --}}
        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Total Buku</p>
            {{-- <h2 class="text-3xl font-bold text-indigo-600">{{ $totalBuku }}</h2> --}}
        </div>

        {{-- Buku Dipinjam --}}
        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500 text-sm">Buku Dipinjam</p>
            {{-- <h2 class="text-3xl font-bold text-green-600">{{ $totalPinjam }}</h2> --}}
        </div>

    </div>

    {{-- MENU CEPAT --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu</h2>

        <div class="grid grid-cols-2 gap-6">

            <a href="{{ route('anggota.buku.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-md hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg">Katalog Buku</h3>
                <p class="text-sm text-gray-500">Cari dan pinjam buku</p>
            </a>

            <a href="#"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-md hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg">Riwayat Peminjaman</h3>
                <p class="text-sm text-gray-500">Lihat histori pinjaman</p>
            </a>

        </div>
    </div>

</div>
@endsection
