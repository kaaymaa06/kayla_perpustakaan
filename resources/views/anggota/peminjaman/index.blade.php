@extends('anggota.layouts.app')

@section('content')
<div class="p-6 min-h-screen">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Peminjaman Saya
    </h2>

    {{-- ================= ALERT ================= --}}
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ================= CEK DENDA ================= --}}
    @php
        $punyaDenda = \App\Models\Peminjaman::where('user_id', auth()->id())
            ->where('status', 'selesai')
            ->where('status_denda', 'belum bayar')
            ->exists();
    @endphp

    @if($punyaDenda)
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4 flex justify-between items-center">
            <span>
                ⚠️ Anda memiliki denda yang belum dibayar. Silakan bayar terlebih kepada Petugas sebelum meminjam buku.
            </span>

            <a href="{{ route('anggota.riwayat.index') }}"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">
                Bayar Denda
            </a>
        </div>
    @endif

    {{-- ================= TABLE ================= --}}
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
                                <button onclick="openModal({{ $p->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                                    Batalkan
                                </button>
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
<div id="modalHapus" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

    <div class="bg-white p-6 rounded-xl shadow-lg w-80 text-center animate-fadeIn">

        <p class="mb-4 text-gray-700 font-medium">
            Yakin ingin batalkan peminjaman ini?
        </p>

        <div class="flex justify-center gap-3">

            <form id="formHapus" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
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
    function openModal(id) {
        let form = document.getElementById('formHapus');
        form.action = '/anggota/peminjaman/' + id; // sesuaikan route kamu

        document.getElementById('modalHapus').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modalHapus').classList.add('hidden');
    }
</script>
@endsection
