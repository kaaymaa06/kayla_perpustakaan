@extends('anggota.layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-2xl font-semibold mb-6">Riwayat Peminjaman</h2>

    <div class="bg-white rounded-xl shadow overflow-x-auto">

        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Judul Buku</th>
                    <th class="p-3 text-left">Tanggal Pinjam</th>
                    <th class="p-3 text-left">Jatuh Tempo</th>
                    <th class="p-3 text-left">Tanggal Kembali</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Denda</th>
                    <th class="p-3 text-left">Status Denda</th>
                    <th class="p-3 text-left">Metode Pembayaran</th>
                    <th class="p-3 text-left">Tanggal Bayar</th>
                    <th class="p-3 text-left">Keterangan</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($riwayat as $index => $item)
                <tr class="border-b">
                    <td class="p-3">{{ $index + 1 }}</td>

                    <td class="p-3">
                        {{ $item->buku->judul_buku ?? '-' }}
                    </td>

                    <td class="p-3">
                        {{ $item->tanggal_pinjam ? \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $item->jatuh_tempo ? \Carbon\Carbon::parse($item->jatuh_tempo)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        @if ($item->status == 'selesai')
                            <span class="px-3 py-1 text-sm bg-green-200 text-green-700 rounded">
                                Selesai
                            </span>
                        @elseif ($item->status == 'ditolak')
                            <span class="px-3 py-1 text-sm bg-red-200 text-red-700 rounded">
                                Ditolak
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded">
                                {{ $item->status }}
                            </span>
                        @endif
                    </td>

                    {{-- DENDA --}}
                    <td class="p-3">
                        @if($item->denda > 0)
                            Rp {{ number_format($item->denda) }}
                        @else
                            -
                        @endif
                    </td>

                    <td class="p-3">
                        @if($item->denda > 0 && $item->status_denda != 'lunas')

                        @elseif($item->status_denda == 'lunas')
                            <span class="text-green-600">Lunas</span>
                        @else
                            -
                        @endif
                    </td>

                    <td class="p-3">
                        @if($item->denda > 0 && $item->status_denda != 'lunas')

                            <form action="{{ route('anggota.bayarDenda', $item->id) }}" method="POST">
                                @csrf

                                <select name="metode_pembayaran" class="border p-1 rounded mb-1">
                                    <option value="transfer">Transfer</option>
                                    <option value="cash">Cash</option>
                                </select>

                                <button class="px-3 py-1 bg-blue-500 text-white rounded block">
                                    Bayar
                                </button>
                            </form>

                        @elseif($item->status_denda == 'lunas')
                            <span class="text-green-600">Lunas</span>
                        @else
                            -
                        @endif
                    </td>

                    <td class="p-3">
                        {{ $item->tanggal_bayar ? \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $item->keterangan ?? '-' }}
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center p-4">
                        Belum ada riwayat peminjaman
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
