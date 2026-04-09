@extends('petugas.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">

    <h2 class="text-2xl font-semibold mb-6">Konfirmasi Peminjaman</h2>

    {{-- Detail Buku --}}
    <div class="flex gap-6 mb-6">
        <div>
            <img src="{{ asset('storage/' . $peminjaman->buku->cover) }}"
                 class="w-40 h-56 object-cover rounded-lg shadow">
        </div>

        <div class="space-y-2">
            <p><strong>Kode Buku:</strong> {{ $peminjaman->buku->kode_buku }}</p>
            <p><strong>Judul:</strong> {{ $peminjaman->buku->judul }}</p>
            <p><strong>Penulis:</strong> {{ $peminjaman->buku->penulis }}</p>
            <p><strong>Tahun:</strong> {{ $peminjaman->buku->tahun_terbit }}</p>
            <p><strong>Stok:</strong> {{ $peminjaman->buku->stok }}</p>
        </div>
    </div>

    {{-- Detail Peminjaman --}}
    <div class="mb-6">
        <p><strong>Peminjam:</strong> {{ $peminjaman->user->name }}</p>
        <p><strong>Status:</strong> {{ $peminjaman->status }}</p>
    </div>

    {{-- INFO --}}
    <div class="mb-6 p-4 bg-yellow-100 text-yellow-800 rounded-lg">
        Jatuh tempo akan otomatis ditentukan selama 7 hari oleh sistem.
    </div>

    {{-- Form --}}
    <form action="{{ route('petugas.peminjaman.proses', $peminjaman->id) }}" method="POST">
        @csrf

        <div class="flex gap-4">
            <button type="submit"
                class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">
                Konfirmasi
            </button>

            <a href="{{ route('petugas.peminjaman.index') }}"
               class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection
