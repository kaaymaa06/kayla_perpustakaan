@extends('petugas.layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-2xl font-semibold mb-6">Data Peminjaman</h2>

    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">No</th>
                <th class="p-3 text-left">Nama User</th>
                <th class="p-3 text-left">Judul Buku</th>
                <th class="p-3 text-left">Tanggal Pinjam</th>
                <th class="p-3 text-left">Jatuh Tempo</th>
                <th class="p-3 text-left">Tanggal Kembali</th>
                <th class="p-3 text-left">Denda</th>
                <th class="p-3 text-left">Status Denda</th>
                <th class="p-3 text-left">Pembayaran</th>
                <th class="p-3 text-left">Tanggal Bayar</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Keterangan</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($peminjaman as $p)
            <tr class="border-b">

                <td class="p-3">{{ $loop->iteration }}</td>

                <td class="p-3">{{ $p->user->name ?? '-' }}</td>

                {{-- SESUAIKAN NAMA FIELD --}}
                <td class="p-3">{{ $p->buku->judul_buku ?? '-' }}</td>

                {{-- FORMAT TANGGAL --}}
                <td class="p-3">
                    {{ $p->tanggal_pinjam ? \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') : '-' }}
                </td>

                <td class="p-3">
                    {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}

                    @if($p->jatuh_tempo && \Carbon\Carbon::now()->gt($p->jatuh_tempo))
                        <br>
                        <span class="text-red-500 text-xs">Terlambat</span>
                    @endif
                </td>

                <td class="p-3">
                    {{ $p->tanggal_kembali ? \Carbon\Carbon::parse($p->tanggal_kembali)->format('d-m-Y') : '-' }}
                </td>

                <td class="p-3">
                    {{ $p->denda ?? '-' }}
                </td>

                <td class="p-3">
                    {{ $p->status_denda ?? '-' }}
                </td>

                <td class="p-3">
                    {{ $p->metode_pembayaran ?? '-' }}
                </td>

                <td class="p-3">
                    {{ $p->tanggal_bayar ? \Carbon\Carbon::parse($p->tanggal_bayar)->format('d-m-Y') : '-' }}
                </td>


                {{-- STATUS --}}
                <td class="p-3">
                    @if($p->status == 'menunggu')
                        <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">
                            Menunggu
                        </span>

                    @elseif($p->status == 'dipinjam')
                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded">
                            Dipinjam
                        </span>

                    @elseif($p->status == 'ditolak')
                        <span class="bg-red-200 text-red-800 px-2 py-1 rounded">
                            Ditolak
                        </span>

                    @elseif($p->status == 'selesai')
                        <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">
                            Selesai
                        </span>
                    @endif
                </td>

                <td class="p-3">
                    {{ $p->keterangan ?? '-' }}
                </td>

                {{-- AKSI --}}
                <td class="p-3 text-center">
                    <div class="flex gap-2 justify-center">

                        {{-- TERIMA / TOLAK --}}
                        @if($p->status == 'menunggu')

                            <a href="{{ route('petugas.peminjaman.form', $p->id) }}"
                                class="bg-green-500 text-white px-3 py-1 rounded text-sm">
                                Konfirmasi
                            </a>

                            <form action="{{ route('petugas.peminjaman.tolak', $p->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menolak?')">
                                @csrf

                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                                    Tolak
                                </button>
                            </form>

                        @endif

                        {{-- HAPUS --}}
                        <form action="{{ route('petugas.peminjaman.destroy', $p->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin hapus data ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-gray-700 text-white px-3 py-1 rounded text-sm">
                                Hapus
                            </button>
                        </form>

                        @if($p->status_denda == 'belum bayar')
                        <form action="{{ route('petugas.peminjaman.bayar', $p->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">
                                Konfirmasi Bayar
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
@endsection
