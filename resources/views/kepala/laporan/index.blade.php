@extends('kepala.layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-2xl font-semibold mb-6">Laporan Peminjaman Buku</h2>

    <div class="bg-white rounded-xl shadow overflow-x-auto">

        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Buku</th>
                    <th class="p-3 text-left">Tanggal Pinjam</th>
                    <th class="p-3 text-left">Jatuh Tempo</th>
                    <th class="p-3 text-left">Tanggal Kembali</th>
                    <th class="p-3 text-left">Denda</th>
                    <th class="p-3 text-left">Status Denda</th>
                    <th class="p-3 text-left">Metode Bayar</th>
                    <th class="p-3 text-left">Tanggal Bayar</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($laporan as $i => $p)
                <tr class="border-b">

                    <td class="p-3">{{ $i + 1 }}</td>

                    <td class="p-3">{{ $p->user->name ?? '-' }}</td>

                    <td class="p-3">{{ $p->buku->judul_buku ?? '-' }}</td>

                    <td class="p-3">
                        {{ $p->tanggal_pinjam ? \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $p->tanggal_kembali ? \Carbon\Carbon::parse($p->tanggal_kembali)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $p->denda ?? '-' }}
                    </td>

                    <td class="p-3">
                        @if($p->status_denda == 'lunas')
                            <span class="text-green-600 font-semibold">Lunas</span>
                        @elseif($p->status_denda == 'belum bayar')
                            <span class="text-red-600 font-semibold">Belum Bayar</span>
                        @else
                            -
                        @endif
                    </td>

                    <td class="p-3">
                        {{ $p->metode_pembayaran ?? '-' }}
                    </td>

                    <td class="p-3">
                        {{ $p->tanggal_bayar ? \Carbon\Carbon::parse($p->tanggal_bayar)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        @if($p->status == 'dipinjam')
                            <span class="text-blue-600">Dipinjam</span>
                        @elseif($p->status == 'selesai')
                            <span class="text-green-600">Selesai</span>
                        @elseif($p->status == 'ditolak')
                            <span class="text-red-600">Ditolak</span>
                        @else
                            {{ $p->status }}
                        @endif
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center p-4">
                        Tidak ada data laporan
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>
@endsection
