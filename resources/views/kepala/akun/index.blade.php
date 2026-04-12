@extends('kepala.layouts.app')

@section('content')
<div class="p-6 min-h-screen space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <div>
            <h3 class="text-2xl font-bold text-gray-800">Daftar Pengguna</h3>
            <p class=" text-gray-500">Kelola semua akun pengguna</p>
        </div>

        <a href="{{ route('kepala.akun.create') }}"
           class="bg-blue-500 font-semibold text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition shadow">
            + Tambah Akun
        </a>
    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full ">

                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-left">Identitas</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $index => $user)
                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="px-4 py-3">{{ $index + 1 }}</td>

                        <td class="px-4 py-3 font-semibold text-gray-800">
                            {{ $user->name }}
                        </td>

                        <td class="px-4 py-3 text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full bg-gray-200 capitalize">
                                {{ $user->role }}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-gray-600">
                            @if($user->role == 'anggota' && $user->anggota)
                                <span class="text-indigo-600 font-medium">
                                    NIS: {{ $user->anggota->nis }}
                                </span>
                                <br>
                                <span class="text-gray-500">
                                    {{ $user->anggota->kelas }}
                                </span>

                            @elseif($user->role == 'petugas' && $user->petugas)
                                <span class="text-blue-600 font-medium">
                                    NIP: {{ $user->petugas->nip_petugas ?? '-' }}
                                </span>

                            @elseif($user->role == 'kepala' && $user->kepala)
                                <span class="text-purple-600 font-medium">
                                    NIP: {{ $user->kepala->nip_kepala ?? '-' }}
                                </span>
                            @else
                                -
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-2 justify-center">

                                <a href="{{ route('kepala.akun.detail', $user->id) }}"
                                   class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                    Detail
                                </a>

                                <a href="{{ route('kepala.akun.edit', $user->id) }}"
                                   class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                                    Edit
                                </a>

                                {{-- BUTTON HAPUS (MODAL) --}}
                                <button type="button"
                                    onclick="openModal('{{ route('kepala.akun.destroy', $user->id) }}')"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    Hapus
                                </button>

                            </div>
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
            Yakin ingin hapus akun ini?
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
