@extends('anggota.layouts.app')

@section('content')
<div class="p-6 min-h-screen">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Riwayat Peminjaman
    </h2>

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <table class="w-full border-collapse">

            {{-- HEADER --}}
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Judul Buku</th>
                    <th class="px-4 py-3 text-left">Tanggal Pinjam</th>
                    <th class="px-4 py-3 text-left">Jatuh Tempo</th>
                    <th class="px-4 py-3 text-left">Tanggal Kembali</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Denda</th>
                    <th class="px-4 py-3 text-left">Status Denda</th>
                    <th class="px-4 py-3 text-left">Tanggal Bayar</th>
                    <th class="px-4 py-3 text-left">Keterangan</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($riwayat as $index => $item)
                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="px-4 py-3">
                        {{ $index + 1 }}
                    </td>

                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $item->buku->judul_buku ?? '-' }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $item->tanggal_pinjam ? \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $item->jatuh_tempo ? \Carbon\Carbon::parse($item->jatuh_tempo)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- STATUS --}}
                    <td class="px-4 py-3">
                        @if ($item->status == 'selesai')
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                Selesai
                            </span>
                        @elseif ($item->status == 'ditolak')
                            <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full">
                                Ditolak
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs bg-gray-200 text-gray-700 rounded-full">
                                {{ $item->status }}
                            </span>
                        @endif
                    </td>

                    {{-- DENDA --}}
                    <td class="px-4 py-3">
                        @if($item->denda > 0)
                            <span class="text-red-600 font-medium">
                                Rp {{ number_format($item->denda) }}
                            </span>
                        @else
                            -
                        @endif
                    </td>

                    {{-- STATUS DENDA --}}
                    <td class="px-4 py-3">
                        @if($item->denda > 0)
                            @if($item->status_denda == 'lunas')
                                <span class="text-green-600 font-semibold">Lunas</span>
                            @else
                                <span class="text-red-600 font-semibold">Belum Bayar</span>
                            @endif
                        @else
                            -
                        @endif
                    </td>

                    {{-- TANGGAL BAYAR --}}
                    <td class="px-4 py-3">
                        {{ $item->tanggal_bayar ? \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- KETERANGAN --}}
                    <td class="px-4 py-3 text-gray-600">
                        {{ $item->keterangan ?? '-' }}
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center py-6 text-gray-500">
                        Belum ada riwayat peminjaman
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>
@endsection
