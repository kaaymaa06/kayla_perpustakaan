@extends('kepala.layouts.app')

@section('content')
<div class="p-6 min-h-screen">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Laporan Peminjaman Buku
    </h2>

    <div class="bg-white rounded-2xl shadow-lg overflow-x-auto border">

        <table class="w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Buku</th>
                    <th class="p-4 text-left">Tanggal Pinjam</th>
                    <th class="p-4 text-left">Jatuh Tempo</th>
                    <th class="p-4 text-left">Tanggal Kembali</th>
                    <th class="p-4 text-left">Denda</th>
                    <th class="p-4 text-left">Status Denda</th>
                    <th class="p-4 text-left">Metode Bayar</th>
                    <th class="p-4 text-left">Tanggal Bayar</th>
                    <th class="p-4 text-left">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($laporan as $i => $p)
                <tr class="hover:bg-gray-50 transition">

                    <td class="p-4 font-medium text-gray-700">{{ $i + 1 }}</td>

                    <td class="p-4 text-gray-600">{{ $p->user->name ?? '-' }}</td>

                    <td class="p-4 text-gray-600">{{ $p->buku->judul_buku ?? '-' }}</td>

                    <td class="p-4 text-gray-600">
                        {{ $p->tanggal_pinjam ? \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $p->tanggal_kembali ? \Carbon\Carbon::parse($p->tanggal_kembali)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-4 text-gray-700 font-medium">
                        {{ $p->denda ?? '-' }}
                    </td>

                    <td class="p-4">
                        @if($p->status_denda == 'lunas')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">
                                Lunas
                            </span>
                        @elseif($p->status_denda == 'belum bayar')
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">
                                Belum Bayar
                            </span>
                        @else
                            -
                        @endif
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $p->metode_pembayaran ?? '-' }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $p->tanggal_bayar ? \Carbon\Carbon::parse($p->tanggal_bayar)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-4">
                        @if($p->status == 'dipinjam')
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold">
                                Dipinjam
                            </span>
                        @elseif($p->status == 'selesai')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">
                                Selesai
                            </span>
                        @elseif($p->status == 'ditolak')
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">
                                Ditolak
                            </span>
                        @else
                            {{ $p->status }}
                        @endif
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center p-6 text-gray-500">
                        Tidak ada data laporan
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>
@endsection
