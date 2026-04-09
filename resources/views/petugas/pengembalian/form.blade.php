@extends('petugas.layouts.app')

@section('content')
<div class="p-6 flex justify-center">

    <div class="bg-white w-full max-w-lg rounded-xl shadow p-6">

        <h2 class="text-xl font-semibold mb-4">
            Form Pengembalian Buku
        </h2>

        {{-- INFO DATA --}}
        <div class="mb-4 text-sm">
            <p><b>Nama:</b> {{ $peminjaman->user->name }}</p>
            <p><b>Judul Buku:</b> {{ $peminjaman->buku->judul_buku }}</p>
            <p><b>Tanggal Pinjam:</b>
                {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}
            </p>
            <p><b>Jatuh Tempo:</b>
                {{ \Carbon\Carbon::parse($peminjaman->jatuh_tempo)->format('d-m-Y') }}
            </p>

            @if(\Carbon\Carbon::now()->gt($peminjaman->jatuh_tempo))
                <p class="text-red-500 font-semibold">
                    Buku Terlambat Dikembalikan
                </p>
            @endif
            
        </div>

        {{-- FORM --}}
        <form action="{{ route('petugas.pengembalian.konfirmasi', $peminjaman->id) }}" method="POST">
            @csrf

            {{-- KONDISI --}}
            <label class="block mb-1 font-semibold">Kondisi Buku</label>
            <select name="kondisi" class="border p-2 w-full rounded">
                <option value="normal">Normal</option>
                <option value="rusak">Rusak</option>
                <option value="hilang">Hilang</option>
            </select>

            {{-- KETERANGAN --}}
            <label class="block mt-4 mb-1 font-semibold">Keterangan</label>
            <input type="text" name="keterangan"
                class="border p-2 w-full rounded"
                placeholder="Contoh: halaman robek">

            {{-- BUTTON --}}
            <div class="mt-6 flex justify-between">
                <a href="{{ route('petugas.pengembalian.index') }}"
                    class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                    Kembali
                </a>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>
@endsection
