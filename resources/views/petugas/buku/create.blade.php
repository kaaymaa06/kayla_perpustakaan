@extends('petugas.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen">

    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-2xl shadow-md p-8">

            {{-- HEADER --}}
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Tambah Buku
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Silakan isi data buku dengan lengkap
                </p>
            </div>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
                    <ul class="text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('petugas.buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- KODE --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Kode Buku</label>
                    <input type="text" name="kode_buku"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
                </div>

                {{-- JUDUL --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Judul Buku</label>
                    <input type="text" name="judul_buku"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
                </div>

                {{-- PENULIS --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Penulis</label>
                    <input type="text" name="penulis"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
                </div>

                {{-- TAHUN & STOK --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-600">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
                    </div>

                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-600">Stok</label>
                        <input type="number" name="stok"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
                    </div>
                </div>

                {{-- SINOPSIS --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Sinopsis</label>
                    <textarea name="sinopsis"
                        class="w-full border rounded-lg px-3 py-2 h-28 resize-none focus:ring-2 focus:ring-indigo-400 outline-none"></textarea>
                </div>

                {{-- COVER --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Cover</label>
                    <input type="file" name="cover"
                        class="w-full border rounded-lg px-3 py-2 bg-white file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:bg-indigo-500 file:text-white">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 mt-6">

                    <button class="flex-1 bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">
                        Simpan
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
