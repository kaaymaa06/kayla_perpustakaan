@extends('kepala.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen">

    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Tambah Buku
            </h2>

            <form action="{{ route('kepala.buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- KODE --}}
                <div class="mb-4">
                    <label class="block mb-1">Kode Buku</label>
                    <input type="text" name="kode_buku"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- JUDUL --}}
                <div class="mb-4">
                    <label class="block mb-1">Judul Buku</label>
                    <input type="text" name="judul_buku"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- PENULIS --}}
                <div class="mb-4">
                    <label class="block mb-1">Penulis</label>
                    <input type="text" name="penulis"
                        class="w-full border rounded px-3 py-2">
                </div>

                {{-- TAHUN & STOK --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-1">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block mb-1">Stok</label>
                        <input type="number" name="stok"
                            class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                {{-- SINOPSIS --}}
                <div class="mb-4">
                    <label class="block mb-1">Sinopsis</label>
                    <textarea name="sinopsis"
                        class="w-full border rounded px-3 py-2"></textarea>
                </div>

                {{-- COVER --}}
                <div class="mb-4">
                    <label class="block mb-1">Cover</label>
                    <input type="file" name="cover"
                        class="w-full border rounded px-3 py-2 bg-white">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 mt-6">
                    <button class="bg-green-500 text-white px-5 py-2 rounded hover:bg-green-600">
                        Simpan
                    </button>

                    <a href="{{ route('kepala.buku.index') }}"
                       class="bg-gray-300 px-5 py-2 rounded hover:bg-gray-400">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
