@extends('petugas.layouts.app')

@section('content')
<div class="p-6 min-h-screen space-y-8">

    {{-- header dashboard --}}
    <div class="bg-white p-6 rounded-2xl shadow-md border">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Petugas</h1>
        <p class="text-sm text-gray-500 mt-1">
            Kelola data perpustakaan dengan mudah
        </p>
    </div>

    {{-- statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Total Buku --}}
        <div class="bg-white p-5 rounded-2xl shadow border">
            <p class="text-gray-500 text-sm">Total Buku</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">
                {{ $totalBuku }}
            </h2>
        </div>

        {{-- Total Anggota --}}
        <div class="bg-white p-5 rounded-2xl shadow border">
            <p class="text-gray-500 text-sm">Total Anggota</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">
                {{ $totalAnggota }}
            </h2>
        </div>

        {{-- Peminjaman aktip --}}
        <div class="bg-white p-5 rounded-2xl shadow border">
            <p class="text-gray-500 text-sm">Peminjaman Aktif</p>
            <h2 class="text-3xl font-bold text-blue-500 mt-2">
                {{ $totalPeminjaman }}
            </h2>
        </div>

    </div>

    {{-- alert terlambat --}}
    @if($totalTerlambat > 0)
    <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-xl shadow">
        ⚠️ Ada <b>{{ $totalTerlambat }}</b> buku yang terlambat dikembalikan!
    </div>
    @endif

    {{-- peminjaman terbaru --}}
    <div class="bg-white rounded-2xl shadow border p-6">

        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Peminjaman Terbaru
        </h3>

        <div class="space-y-3">

            @forelse($peminjamanTerbaru as $p)

            {{-- item peminjaman --}}
            <div class="flex justify-between items-center border-b pb-2">

                {{-- data buku sama user --}}
                <div>
                    <p class="font-semibold text-sm">
                        {{ $p->buku->judul_buku ?? '-' }}
                    </p>
                    <p class="text-xs text-gray-500">
                        {{ $p->user->name ?? '-' }}
                    </p>
                </div>


                {{-- status --}}
                <span class="text-xs px-2 py-1 rounded
                    @if($p->status == 'dipinjam') bg-green-200 text-green-700
                    @else
                    @endif
                ">
                    {{ $p->status }}
                </span>

            </div>
            @empty
            {{-- jika data kososng --}}
                <p class="text-sm text-gray-500">Belum ada data</p>
            @endforelse

        </div>

    </div>

    {{-- menu cepat--}}
    <div>
        <h2 class="text-lg font-bold text-gray-700 mb-4">Menu Cepat</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

             {{-- menu buku --}}
            <a href="{{ route('petugas.buku.index') }}"
               class="bg-white p-6 rounded-2xl shadow border hover:shadow-xl hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg text-gray-800">Data Buku</h3>
                <p class="text-sm text-gray-500 mt-1">Kelola buku</p>
            </a>

             {{-- menu user --}}
            <a href="{{ route('petugas.akun.index') }}"
               class="bg-white p-6 rounded-2xl shadow border hover:shadow-xl hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg text-gray-800">Data Pengguna</h3>
                <p class="text-sm text-gray-500 mt-1">Kelola akun</p>
            </a>

             {{-- menu peminjaman --}}
            <a href="{{ route('petugas.peminjaman.index') }}"
               class="bg-white p-6 rounded-2xl shadow border hover:shadow-xl hover:-translate-y-1 transition block">

                <h3 class="font-semibold text-lg text-gray-800">Peminjaman</h3>
                <p class="text-sm text-gray-500 mt-1">Lihat transaksi</p>
            </a>

        </div>
    </div>

</div>
@endsection
