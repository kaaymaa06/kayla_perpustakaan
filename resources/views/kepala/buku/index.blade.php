@extends('kepala.layouts.app')

@section('content')
<div class="p-6 min-h-screen space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Data Buku</h2>

        <a href="{{ route('kepala.buku.create') }}"
           class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-4 py-2 rounded-lg shadow hover:shadow-md hover:scale-105 transition">
            + Tambah Buku
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full">

                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Kode</th>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Penulis</th>
                        <th class="px-4 py-3 text-left">Tahun</th>
                        <th class="px-4 py-3 text-left">Stok</th>
                        <th class="px-4 py-3 text-left">Cover</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach($buku as $index => $b)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-4 py-3">{{ $index + 1 }}</td>

                        <td class="px-4 py-3 text-gray-600">
                            {{ $b->kode_buku }}
                        </td>

                        <td class="px-4 py-3 font-semibold text-gray-800">
                            {{ $b->judul_buku }}
                        </td>

                        <td class="px-4 py-3 text-gray-600">
                            {{ $b->penulis }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $b->tahun_terbit }}
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded text-xs font-semibold">
                                {{ $b->stok }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            @if($b->cover)
                                <img src="{{ asset('storage/'.$b->cover) }}"
                                     class="w-14 h-20 object-cover rounded-lg border shadow-sm">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>

                        <td class="px-4 py-3 flex gap-2">

                            <a href="{{ route('kepala.buku.edit', $b->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 transition">
                                Edit
                            </a>

                            {{-- GANTI BUTTON HAPUS --}}
                            <button type="button"
                                onclick="openModal('{{ route('kepala.buku.destroy', $b->id) }}')"
                                class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                Hapus
                            </button>

                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</div>

{{-- MODAL HAPUS --}}
<div id="modalHapus" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

    <div class="bg-white p-6 rounded-xl shadow-lg w-80 text-center">

        <p class="mb-4 text-gray-700 font-medium">
            Yakin ingin hapus buku ini?
        </p>

        <div class="flex justify-center gap-3">

            <form id="formHapus" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    Ya, Hapus
                </button>
            </form>

            <button onclick="closeModal()"
                class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                Batal
            </button>

        </div>

    </div>

</div>

{{-- SCRIPT --}}
<script>
    function openModal(url) {
        document.getElementById('modalHapus').classList.remove('hidden');
        document.getElementById('formHapus').action = url;
    }

    function closeModal() {
        document.getElementById('modalHapus').classList.add('hidden');
    }
</script>

@endsection
