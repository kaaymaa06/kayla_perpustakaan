@extends('kepala.layouts.app')

@section('content')
<div class="p-6  min-h-screen">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800">Daftar Pengguna</h3>

        <a href="{{ route('kepala.akun.create') }}"
           class="bg-blue-500 font-bold text-white px-3 py-2.5 rounded text-base hover:bg-blue-600 transition">
            + Tambah Akun
        </a>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">

        <table class="w-full text-base">

            <thead class="border-b bg-gray-50 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-left">Identitas</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $index => $user)
                <tr class="border-b hover:bg-gray-50">

                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3 capitalize">{{ $user->role }}</td>

                    <td class="px-4 py-3">
                        @if($user->role == 'anggota' && $user->anggota)
                            NIS: {{ $user->anggota->nis }} / {{ $user->anggota->kelas }}
                        @elseif($user->role == 'petugas' && $user->petugas)
                            NIP: {{ $user->petugas->nip_petugas ?? '-' }}
                        @elseif($user->role == 'kepala' && $user->kepala)
                            NIP: {{ $user->kepala->nip_kepala ?? '-' }}
                        @else
                            -
                        @endif
                    </td>

                    <td class="px-4 py-3 space-x-2">

                            <a href="{{ route('kepala.akun.detail', $user->id) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                Detail
                            </a>

                            <a href="{{ route('kepala.akun.edit', $user->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">
                                Edit
                            </a>

                            <form action="{{ route('kepala.akun.destroy', $user->id) }}"
                                  method="POST" class="inline">
                                @csrf @method('DELETE')
                                
                                <button type="submit"
                                    onclick="return confirm('Hapus akun ini?')"
                                    class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>

                        </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>
@endsection
