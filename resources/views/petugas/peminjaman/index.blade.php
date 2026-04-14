@extends('petugas.layouts.app')

@section('content')
<div class="p-4 min-h-screen">

    <h2 class="text-2xl font-semibold mb-6">Data Peminjaman</h2>

    {{-- TABEL KONTAINER --}}
    <div class="bg-white shadow rounded-xl overflow-x-auto">

        <table class="w-full">

            {{-- HEADER TABEL--}}
            <thead class="bg-gray-100 text-gray-700">
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

            <tbody class="divide-y">

                @foreach($peminjaman as $p)
                <tr class="hover:bg-gray-50 transition">

                    {{-- NOMOR URUT--}}
                    <td class="p-3">{{ $loop->iteration }}</td>

                    {{-- DATA USER --}}
                    <td class="p-3 font-medium text-gray-800">
                        {{ $p->user->name ?? '-' }}
                    </td>

                    {{-- DATA BUKU --}}
                    <td class="p-3">
                        {{ $p->buku->judul_buku ?? '-' }}
                    </td>

                    {{-- TANGGAL PINAJAM--}}
                    <td class="p-3">
                        {{ $p->tanggal_pinjam ? \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- JATUH TEMPO --}}
                    <td class="p-3">
                        {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}

                        @if($p->jatuh_tempo && \Carbon\Carbon::now()->gt($p->jatuh_tempo))
                            <div class="text-red-500 font-semibold mt-1">
                                Terlambat
                            </div>
                        @endif
                    </td>

                    {{-- TANGGAL KEMBALI --}}
                    <td class="p-3">
                        {{ $p->tanggal_kembali ? \Carbon\Carbon::parse($p->tanggal_kembali)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- DENDA --}}
                    <td class="p-3 font-semibold text-red-500">
                        Rp {{ number_format($p->denda ?? 0, 0, ',', '.') }}
                    </td>

                    {{-- STATUS DENDA --}}
                    <td class="p-3">
                        <span class="px-2 py-1 rounded font-semibold
                            {{ $p->status_denda == 'lunas' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                            {{ $p->status_denda ?? '-' }}
                        </span>
                    </td>

                    {{-- METODE PEMBAYARAN --}}
                    <td class="p-3">
                        {{ $p->metode_pembayaran ?? '-' }}
                    </td>

                    {{-- TANGGAL BAYAR--}}
                    <td class="p-3">
                        {{ $p->tanggal_bayar ? \Carbon\Carbon::parse($p->tanggal_bayar)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- STATUS --}}
                    <td class="p-3">
                        @if($p->status == 'menunggu')
                            <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Menunggu</span>
                        @elseif($p->status == 'dipinjam')
                            <span class="bg-green-200 text-green-800 px-2 py-1 rounded">Dipinjam</span>
                        @elseif($p->status == 'ditolak')
                            <span class="bg-red-200 text-red-800 px-2 py-1 rounded">Ditolak</span>
                        @elseif($p->status == 'selesai')
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Selesai</span>
                        @endif
                    </td>

                    {{-- KETERANGAN --}}
                    <td class="p-3 text-gray-600">
                        {{ $p->keterangan ?? '-' }}
                    </td>

                    {{-- TOMBOL AKSI --}}
                    <td class="p-3 text-center">
                        <div class="flex flex-wrap gap-2 justify-center">

                            @if($p->status == 'menunggu')

                                <a href="{{ route('petugas.peminjaman.form', $p->id) }}"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                    Konfirmasi
                                </a>

                                {{-- TOLAK (PAKAI MODAL + INPUT ALASAN) --}}
                                <button type="button"
                                    onclick="openModalTolak('{{ route('petugas.peminjaman.tolak', $p->id) }}')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Tolak
                                </button>

                            @endif

                            {{-- HAPUS --}}
                            <button type="button"
                                onclick="openModal('{{ route('petugas.peminjaman.destroy', $p->id) }}')"
                                class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded">
                                Hapus
                            </button>

                            {{-- BAYAR DENDA --}}
                            @if(($p->denda ?? 0) > 0 && $p->status_denda == 'belum bayar')
                            <form action="{{ route('petugas.peminjaman.bayar', $p->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                    Bayar
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

{{-- MODAL HAPUS --}}
<div id="modalHapus" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-80 text-center">
        <p class="mb-4 text-gray-700 font-medium">
            Yakin ingin hapus data ini?
        </p>
        <div class="flex justify-center gap-3">
            <form id="formHapus" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Ya, Hapus
                </button>
            </form>

            <button onclick="closeModal()"
                class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">
                Batal
            </button>
        </div>
    </div>
</div>

{{-- MODAL TOLAK --}}
<div id="modalTolak" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-96">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Alasan Penolakan
        </h3>

        <form id="formTolak" method="POST">
            @csrf

            <textarea name="keterangan"
                class="w-full border rounded-lg p-3 mb-4"
                placeholder="Masukkan alasan penolakan..."
                required></textarea>

            <div class="flex justify-end gap-2">
                <button type="button"
                    onclick="closeModalTolak()"
                    class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Batal
                </button>

                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Tolak
                </button>
            </div>
        </form>
    </div>
</div>

{{-- SCRIPT MODAL --}}
<script>
    function openModal(url) {
        document.getElementById('modalHapus').classList.remove('hidden');
        document.getElementById('formHapus').action = url;
    }

    function closeModal() {
        document.getElementById('modalHapus').classList.add('hidden');
    }

    function openModalTolak(url) {
        document.getElementById('modalTolak').classList.remove('hidden');
        document.getElementById('formTolak').action = url;
    }

    function closeModalTolak() {
        document.getElementById('modalTolak').classList.add('hidden');
    }
</script>

@endsection
