@extends('petugas.layouts.app')

@section('content')

<div class="p-6 min-h-screen flex justify-center items-start">

    <div class="w-full max-w-3xl">
        <div class="bg-white p-6 rounded-2xl shadow-md">

            <h2 class="text-xl font-semibold mb-6 text-gray-800">
                Konfirmasi Peminjaman
            </h2>

            {{-- Detail Buku --}}
            <div class="flex flex-col md:flex-row gap-6 mb-6 items-start">

                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset('storage/' . $peminjaman->buku->cover) }}"
                         class="w-32 h-48 object-cover rounded-lg shadow border">
                </div>

                <div class="space-y-2 text-gray-700">
                    <p><strong>Kode Buku:</strong> {{ $peminjaman->buku->kode_buku }}</p>
                    <p><strong>Judul:</strong> {{ $peminjaman->buku->judul_buku}}</p>
                    <p><strong>Penulis:</strong> {{ $peminjaman->buku->penulis }}</p>
                    <p><strong>Tahun:</strong> {{ $peminjaman->buku->tahun_terbit }}</p>
                    <p><strong>Stok:</strong> {{ $peminjaman->buku->stok }}</p>
                </div>

            </div>

            {{-- Detail Peminjaman --}}
            <div class="mb-6 space-y-1 text-gray-700 border-t pt-4">
                <p><strong>Peminjam:</strong> {{ $peminjaman->user->name }}</p>
                <p><strong>Status:</strong>
                    <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 text-xs">
                        {{ $peminjaman->status }}
                    </span>
                </p>
            </div>

            {{-- INFO --}}
            <div class="mb-6 p-3 bg-yellow-50 text-yellow-700 rounded-lg border">
                Jatuh tempo akan otomatis ditentukan selama <b>7 hari</b> oleh sistem.
            </div>

            {{-- FORM KONFIRMASI --}}
            <form action="{{ route('petugas.peminjaman.proses', $peminjaman->id) }}" method="POST">
                @csrf

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-green-500 text-white px-5 py-2 rounded-lg hover:bg-green-600 transition">
                        Konfirmasi
                    </button>

                    <a href="{{ route('petugas.peminjaman.index') }}"
                       class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
