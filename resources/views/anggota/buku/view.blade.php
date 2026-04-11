@extends('anggota.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen">

    <div class="bg-white w-full max-w-4xl rounded-2xl shadow-lg p-6 h-fit">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            Detail Buku
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">

            {{-- COVER --}}
            <div class="flex justify-center">
                <div class="w-full h-70 bg-gray-100 flex items-center justify-center rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/' . $buku->cover) }}"
                         class="max-h-full object-contain transition duration-300 hover:scale-105">
                </div>
            </div>

            {{-- DATA --}}
            <div class="md:col-span-2">

                <div class="w-full">

                    <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                        {{ $buku->judul_buku }}
                    </h2>

                    <div class="space-y-2 text-gray-700">
                        <p><b>Kode:</b> {{ $buku->kode_buku }}</p>
                        <p><b>Penulis:</b> {{ $buku->penulis }}</p>
                        <p><b>Tahun:</b> {{ $buku->tahun_terbit }}</p>
                        <p>
                            <b>Stok:</b>
                            <span class="{{ $buku->stok > 0 ? 'text-green-600' : 'text-red-500' }}">
                                {{ $buku->stok }}
                            </span>
                        </p>
                    </div>

                    {{-- SINOPSIS --}}
                    <div class="mt-5">
                        <p class="font-semibold mb-1 text-gray-800">Sinopsis</p>
                        <p class="text-gray-600 leading-relaxed text-justify">
                            {{ $buku->sinopsis }}
                        </p>
                    </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 mt-5">

                    @if($buku->stok > 0)
                        <button onclick="openModal()"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                            Pinjam
                        </button>
                    @else
                        <button class="bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed" disabled>
                            Stok Buku Habis
                        </button>
                    @endif

                    <a href="{{ route('anggota.buku.index') }}"
                        class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                        Kembali
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- MODAL --}}
<div id="modalPinjam" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

    <div class="bg-white p-6 rounded-xl shadow-lg w-80 text-center animate-fadeIn">

        <p class="mb-4 text-gray-700 font-medium">
            Yakin mau pinjam buku ini?
        </p>

        <div class="flex justify-center gap-3">

            <form action="{{ route('anggota.buku.pinjam', $buku->id) }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    Ya
                </button>
            </form>

            <button onclick="closeModal()"
                class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                Batal
            </button>

        </div>

    </div>

</div>

<script>
    function openModal() {
        document.getElementById('modalPinjam').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modalPinjam').classList.add('hidden');
    }
</script>

@endsection
