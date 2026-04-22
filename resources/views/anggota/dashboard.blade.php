@extends('anggota.layouts.app')

@section('content')

{{-- container utama dashboard --}}
<div class="p-6 min-h-screen space-y-6 ">

    {{-- header sapaan user --}}
    <div class="bg-white p-6 rounded-2xl shadow text-gray-700">
        <h1 class="text-2xl font-bold">Halo, {{ auth()->user()->name }} </h1>
        <p class=" opacity-90 mt-1">
            Selamat datang di dashboard perpustakaan
        </p>
    </div>

    {{-- statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- total buku--}}
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-md transition">
            <p class="text-gray-500 ">Total Buku</p>
            <h2 class="text-3xl font-bold text-blue-600">
                {{ $totalBuku ?? 0 }}
            </h2>
        </div>

        {{-- buku dipinjam --}}
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-md transition">
            <p class="text-gray-500 ">Sedang Dipinjam</p>
            <h2 class="text-3xl font-bold text-blue-600">
                {{ $dipinjam ?? 0 }}
            </h2>
        </div>

        {{-- toal denda --}}
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-md transition">
            <p class="text-gray-500 ">Total Denda</p>
            <h2 class="text-3xl font-bold {{ $totalDenda > 0 ? 'text-red-600' : 'text-blue-600' }}">

                {{-- kalo ada denda --}}
                @if($totalDenda > 0)
                    Rp {{ number_format($totalDenda) }}
                @else
                    Tidak Ada Denda
                @endif

            </h2>

        {{-- keterangan denda --}}
        <p class="mt-1 text-gray-400">
            @if($totalDenda > 0)
                Segera lakukan pembayaran ke petugas
            @else
                Semua denda sudah lunas
            @endif
        </p>
        </div>

    </div>

    {{-- menu cepat --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu Cepat</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- katolog buku --}}
            <a href="{{ route('anggota.buku.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg text-blue-600">Katalog Buku</h3>
                <p class=" text-gray-500 mt-1">Cari & pinjam buku</p>
            </a>

            {{-- peminjaman --}}
            <a href="{{ route('anggota.peminjaman.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg text-blue-600">Peminjaman</h3>
                <p class="text-gray-500 mt-1">Lihat buku yang sedang dipinjam</p>
            </a>

            {{-- riwayat --}}
            <a href="{{ route('anggota.riwayat.index') }}"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg text-blue-600"> Riwayat</h3>
                <p class=" text-gray-500 mt-1">Lihat riwayat peminjaman</p>
            </a>

        </div>
    </div>

    {{-- info tambahan --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="font-semibold text-gray-700 mb-3">Informasi</h2>

        <ul class=" text-gray-600 space-y-2">
            <li>Lama peminjaman: 7 hari</li>
            <li>Denda keterlambatan: Rp 1.000 / hari</li>
            <li>Jika buku Rusakk: denda Rp 5.000</li>
            <li>Jika buku hilang: denda Rp 50.000</li>
        </ul>
    </div>

</div>

@endsection
