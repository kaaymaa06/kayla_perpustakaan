@extends('petugas.layouts.app')

@section('content')
<div class="p-6 min-h-screen flex justify-center bg-gray-50">

    <div class="w-full max-w-lg">
        <div class="bg-white rounded-2xl shadow-md p-6">

            <h2 class="text-xl font-semibold mb-6 text-gray-800">
                Form Pengembalian Buku
            </h2>

            {{-- INFO DATA --}}
            <div class="mb-6 text-gray-700 space-y-1 border-b pb-4">
                <p><b>Nama:</b> {{ $peminjaman->user->name }}</p>
                <p><b>Judul Buku:</b> {{ $peminjaman->buku->judul_buku }}</p>
                <p><b>Tanggal Pinjam:</b>
                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}
                </p>
                <p><b>Jatuh Tempo:</b>
                    {{ \Carbon\Carbon::parse($peminjaman->jatuh_tempo)->format('d-m-Y') }}
                </p>

                {{-- STATUS TERLAMBAT (TANPA HITUNG RUMIT DI BLADE) --}}
                @if(\Carbon\Carbon::now()->gt($peminjaman->jatuh_tempo))
                    <span class="inline-block mt-2 px-3 py-1 bg-red-500 text-white text-sm rounded-full">
                        Terlambat
                    </span>
                @else
                    <span class="inline-block mt-2 px-3 py-1 bg-green-500 text-white text-sm rounded-full">
                        Tepat Waktu
                    </span>
                @endif
            </div>

            {{-- FORM --}}
            <form action="{{ route('petugas.pengembalian.konfirmasi', $peminjaman->id) }}" method="POST">
                @csrf

                {{-- tanggal kembali --}}
                <input type="hidden" name="tanggal_kembali" value="{{ now() }}">

                {{-- KONDISI --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-600">
                        Kondisi Buku
                    </label>
                    <select name="kondisi"
                        class="border w-full rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                        <option value="normal">Normal</option>
                        <option value="rusak">Rusak</option>
                        <option value="hilang">Hilang</option>
                    </select>
                </div>

                {{-- KETERANGAN --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-600">
                        Keterangan
                    </label>
                    <input type="text" name="keterangan"
                        class="border w-full rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none"
                        placeholder="Contoh: halaman robek">
                </div>

                {{-- BUTTON --}}
                <div class="mt-6 flex gap-3">

                    <a href="{{ route('petugas.pengembalian.index') }}"
                        class="flex-1 text-center bg-gray-300 text-gray-800 py-2 rounded-lg hover:bg-gray-400 transition">
                        Kembali
                    </a>

                    <button type="submit"
                        class="flex-1 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
