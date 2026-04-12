@extends('petugas.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen bg-gray-50">

    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-2xl shadow-lg p-8">

            {{-- HEADER --}}
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Edit Buku
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Perbarui data buku dengan lengkap dan benar
                </p>
            </div>

            <form action="{{ route('petugas.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- KODE --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold text-gray-600">Kode Buku</label>
                    <input type="text" name="kode_buku"
                        value="{{ $buku->kode_buku }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                {{-- JUDUL --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold text-gray-600">Judul Buku</label>
                    <input type="text" name="judul_buku"
                        value="{{ $buku->judul_buku }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                {{-- PENULIS --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold text-gray-600">Penulis</label>
                    <input type="text" name="penulis"
                        value="{{ $buku->penulis }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                {{-- TAHUN & STOK --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-1 text-sm font-semibold text-gray-600">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit"
                            min="1990" max="2030"
                            value="{{ $buku->tahun_terbit }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>

                    <div>
                        <label class="block mb-1 text-sm font-semibold text-gray-600">Stok</label>
                        <input type="number" name="stok"
                            value="{{ $buku->stok }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                </div>

                {{-- SINOPSIS --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold text-gray-600">Sinopsis</label>
                    <textarea name="sinopsis"
                        rows="4"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ $buku->sinopsis }}</textarea>
                </div>

                {{-- COVER --}}
                <div class="grid grid-cols-2 gap-4 mb-4 items-center">

                    {{-- COVER LAMA --}}
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-cyan-600">Cover Lama</label>
                        <div class="border rounded-lg p-2 flex justify-center bg-gray-50">
                            @if($buku->cover)
                                <img src="{{ asset('storage/'.$buku->cover) }}"
                                     class="w-24 h-auto rounded">
                            @else
                                <p class="text-sm text-gray-400">Tidak ada cover</p>
                            @endif
                        </div>
                    </div>

                    {{-- GANTI COVER --}}
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-600">Ganti Cover</label>
                        <input type="file" name="cover"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white">
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 mt-6">
                    <button class="flex-1 bg-cyan-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        Update
                    </button>

                    <a href="{{ route('petugas.buku.index') }}"
                       class="flex-1 text-center bg-gray-300 py-2 rounded-lg hover:bg-gray-400 transition">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
