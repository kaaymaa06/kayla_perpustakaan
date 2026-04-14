@extends('kepala.layouts.app')

@section('content')

{{-- container utama halaman --}}
<div class="p-6 flex justify-center min-h-screen">

    <div class="w-full max-w-2xl">

        {{-- card form tambah buku --}}
        <div class="bg-white rounded-2xl shadow-md p-8">

            {{-- header halaman --}}
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Tambah Buku
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Silakan isi data buku dengan lengkap
                </p>
            </div>

            {{-- menampilkan eror validasi --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
                    <ul class="text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- form tambah buku --}}
            <form action="{{ route('kepala.buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- input kode buku --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Kode Buku</label>
                    <input type="text" name="kode_buku"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                {{-- inpt judul buku --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Judul Buku</label>
                    <input type="text" name="judul_buku"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                {{-- input penulis --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Penulis</label>
                    <input type="text" name="penulis"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                {{-- tahun terbit & stok --}}
                <div class="grid grid-cols-2 gap-4 mb-4">

                    {{-- tahun terbit --}}
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-600">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>

                    {{-- stok --}}
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-600">Stok</label>
                        <input type="number" name="stok"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>
                </div>

                {{-- input sinopsis --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Sinopsis</label>
                    <textarea name="sinopsis"
                        class="w-full border rounded-lg px-3 py-2 h-28 resize-none focus:ring-2 focus:ring-blue-400 outline-none"></textarea>
                </div>

                {{-- upload cover buku --}}
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-600">Cover</label>
                    <input type="file" name="cover"
                        class="w-full border rounded-lg px-3 py-2 bg-white file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:bg-cyan-500 file:text-white">
                </div>

                {{-- tombol aksi --}}
                <div class="flex gap-3 mt-6">

                    {{-- tombol simpan --}}
                    <button class="flex-1 bg-cyan-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        Simpan
                    </button>

                    {{-- tombol kembali --}}
                    <a href="{{ route('kepala.buku.index') }}"
                       class="flex-1 text-center bg-gray-300 py-2 rounded-lg hover:bg-gray-400 transition">
                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
