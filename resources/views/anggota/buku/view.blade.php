@extends('anggota.layouts.app')

@section('content')
<div class="p-6 flex justify-center">

    <div class="bg-white w-full max-w-3xl rounded-xl shadow p-6">

        <h2 class="text-2xl font-semibold mb-6">Detail Buku</h2>

        <div class="grid grid-cols-2 gap-6">

            {{-- COVER --}}
            <div>
                @if($buku->cover)
                    <img src="{{ asset('storage/'.$buku->cover) }}"
                         class="w-full w-60 rounded-lg shadow">
                @endif
            </div>

            {{-- DATA --}}
            <div class="col-span-2">

                <table class="w-full text-sm">
                    <tr class="border-b">
                        <td class="py-2 font-semibold">Kode Buku</td>
                        <td>{{ $buku->kode_buku }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 font-semibold">Judul Buku</td>
                        <td>{{ $buku->judul_buku }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 font-semibold">Penulis</td>
                        <td>{{ $buku->penulis }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 font-semibold">Tahun Terbit</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 font-semibold">Stok</td>
                        <td>{{ $buku->stok }}</td>
                    </tr>

                    <tr>
                        <td class="py-2 font-semibold">Sinopsis</td>
                        <td>{{ $buku->sinopsis }}</td>
                    </tr>
                </table>

                {{-- BUTTON --}}
                <div class="flex gap-3 mt-4">

                    @if($buku->stok > 0)
                        <button onclick="openModal()"
                            class="bg-blue-500 text-white px-4 py-2 rounded">
                            Pinjam
                        </button>
                    @else
                        <button class="bg-gray-400 px-4 py-2 rounded" disabled>
                            Stok Buku Habis
                        </button>
                    @endif

                    <a href="{{ route('anggota.buku.index') }}"
                        class="bg-gray-300 px-4 py-2 rounded">
                        Kembali
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- MODAL --}}
<div id="modalPinjam" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

    <div class="bg-white p-6 rounded-xl shadow-lg w-80 text-center">

        <p class="mb-4">Yakin mau pinjam buku ini?</p>

        <div class="flex justify-center gap-2">

            <form action="{{ route('anggota.buku.pinjam', $buku->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Ya
                </button>
            </form>

            <button onclick="closeModal()"
                class="bg-gray-300 px-4 py-2 rounded">
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
