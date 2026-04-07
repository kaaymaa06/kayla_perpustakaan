@extends('kepala.layouts.app')

@section('content')
<div class="p-6 min-h-screen space-y-6 ">

    {{-- 🔥 HEADER --}}
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-6 rounded-2xl shadow-lg">
        <h1 class="text-2xl font-bold">Selamat Datang!</h1>
        <p class="text-sm mt-1 opacity-90">
            Semoga harimu menyenangkan. Kelola perpustakaan dengan mudah di sini.
        </p>
    </div>

    {{-- 🔥 STATISTIK --}}
    <div class="grid grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition flex justify-between items-center">
            <div>
                <p class="text-gray-400 text-sm">Total Buku</p>
                <h2 class="text-3xl font-bold text-indigo-600">{{ $totalBuku }}</h2>
            </div>
            <div class="text-3xl">📚</div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition flex justify-between items-center">
            <div>
                <p class="text-gray-400 text-sm">Total Anggota</p>
                <h2 class="text-3xl font-bold text-blue-600">{{ $totalAnggota }}</h2>
            </div>
            <div class="text-3xl">👥</div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition flex justify-between items-center">
            <div>
                <p class="text-gray-400 text-sm">Peminjaman Aktif</p>
                <h2 class="text-3xl font-bold text-green-600">{{ $totalPinjam }}</h2>
            </div>
            <div class="text-3xl">🔄</div>
        </div>

    </div>

    {{-- 🔥 MENU CEPAT --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu Cepat</h2>

        <div class="grid grid-cols-3 gap-6">

            <a href="{{ route('kepala.buku.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition-all duration-300 block">

                <h3 class="font-bold text-lg mb-1 text-indigo-600">📚 Data Buku</h3>
                <p class="text-sm text-gray-500">Kelola semua buku</p>
            </a>

            <a href="{{ route('kepala.akun.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition-all duration-300 block">

                <h3 class="font-bold text-lg mb-1 text-blue-600">👥 Data Akun</h3>
                <p class="text-sm text-gray-500">Kelola pengguna</p>
            </a>

            <a href="#"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition-all duration-300 block">

                <h3 class="font-bold text-lg mb-1 text-green-600">🔄 Peminjaman</h3>
                <p class="text-sm text-gray-500">Lihat data peminjaman</p>
            </a>

        </div>
    </div>

</div>
@endsection
