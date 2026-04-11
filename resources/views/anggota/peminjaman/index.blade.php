@extends('anggota.layouts.app')

@section('content')
<div class="p-6 min-h-screen">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Peminjaman Saya
    </h2>

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <table class="w-full border-collapse">

            {{-- HEADER --}}
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3 text-left">Kode Buku</th>
                    <th class="px-4 py-3 text-left">Judul Buku</th>
                    <th class="px-4 py-3 text-left">Tanggal Pinjam</th>
                    <th class="px-4 py-3 text-left">Jatuh Tempo</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($peminjaman as $index => $p)
                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="px-4 py-3 text-center">
                        {{ $index + 1 }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $p->buku->kode_buku ?? '-' }}
                    </td>

                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $p->buku->judul_buku ?? '-' }}
                    </td>

                    {{-- TANGGAL PINJAM --}}
                    <td class="px-4 py-3">
                        {{ $p->tanggal_pinjam ? \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- JATUH TEMPO --}}
                    <td class="px-4 py-3">
                        @if($p->status == 'menunggu')
                            <span class="text-yellow-500 text-sm">
                                Menunggu konfirmasi
                            </span>

                        @elseif($p->status == 'ditolak')
                            <span>-</span>

                        @else
                            {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}
                        @endif
                    </td>

                    {{-- STATUS --}}
                    <td class="px-4 py-3">
                        @if($p->status == 'menunggu')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                Menunggu
                            </span>
                        @elseif($p->status == 'dipinjam')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                Dipinjam
                            </span>
                        @elseif($p->status == 'ditolak')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                Ditolak
                            </span>
                        @elseif($p->status == 'selesai')
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full">
                                Selesai
                            </span>
                        @endif
                    </td>

                    {{-- AKSI --}}
                    <td class="px-4 py-3">
                        <div class="flex justify-center gap-2">

                            <a href="{{ route('anggota.peminjaman.view', $p->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                                Detail
                            </a>

                            @if($p->status == 'menunggu')
                                <form action="{{ route('anggota.peminjaman.destroy', $p->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin batalkan peminjaman?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                                        Batalkan
                                    </button>

                                </form>
                            @endif

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>
@endsection
