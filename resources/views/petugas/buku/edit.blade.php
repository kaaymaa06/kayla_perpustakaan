@extends('petugas.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen ">

    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Edit Buku
            </h2>

            <form action="{{ route('petugas.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- KODE --}}
                <div class="mb-4">
                    <label class="block mb-1">Kode Buku</label>
                    <input type="text" name="kode_buku"
                        value="{{ $buku->kode_buku }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- JUDUL --}}
                <div class="mb-4">
                    <label class="block mb-1">Judul Buku</label>
                    <input type="text" name="judul_buku"
                        value="{{ $buku->judul_buku }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- PENULIS --}}
                <div class="mb-4">
                    <label class="block mb-1">Penulis</label>
                    <input type="text" name="penulis"
                        value="{{ $buku->penulis }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- TAHUN & STOK --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-1">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit"
                            min="1990" max="2030"
                            value="{{ $buku->tahun_terbit }}"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block mb-1">Stok</label>
                        <input type="number" name="stok"
                            value="{{ $buku->stok }}"
                            class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                {{-- SINOPSIS --}}
                <div class="mb-4">
                    <label class="block mb-1">Sinopsis</label>
                    <textarea name="sinopsis"
                        class="w-full border rounded px-3 py-2">{{ $buku->sinopsis }}</textarea>
                </div>

                {{-- COVER LAMA --}}
                <div class="mb-4">
                    <label class="block mb-2">Cover Lama</label>
                    @if($buku->cover)
                        <img src="{{ asset('storage/'.$buku->cover) }}"
                             class="w-20 h-auto rounded border">
                    @else
                        <p class="text-sm text-gray-500">Tidak ada cover</p>
                    @endif
                </div>

                {{-- GANTI COVER --}}
                <div class="mb-4">
                    <label class="block mb-1">Ganti Cover</label>
                    <input type="file" name="cover"
                        class="w-full border rounded px-3 py-2 bg-white">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 mt-6">
                    <button class="bg-green-500 text-white px-5 py-2 rounded hover:bg-green-600">
                        Update
                    </button>

                    <a href="{{ route('petugas.buku.index') }}"
                       class="bg-gray-300 px-5 py-2 rounded hover:bg-gray-400">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
