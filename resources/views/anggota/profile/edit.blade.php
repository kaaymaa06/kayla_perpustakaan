@extends('anggota.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen items-start">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow p-6">

            {{-- HEADER --}}
            <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">
                Edit Profile
            </h3>

            <form action="{{ route('anggota.profile.update', $anggota->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- NAMA --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Nama</label>
                    <input type="text" name="name"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        value="{{ old('name', $anggota->user->name) }}">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        value="{{ old('email', $anggota->user->email) }}">
                </div>

                {{-- NIS --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">NIS</label>
                    <input type="text" name="nis"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        value="{{ old('nis', $anggota->nis) }}">
                </div>

                {{-- KELAS --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Kelas</label>
                    <input type="text" name="kelas"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        value="{{ old('kelas', $anggota->kelas) }}">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-2 pt-2">
                    <button type="submit"
                        class="flex-1 bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 transition">
                        Simpan
                    </button>

                    <a href="{{ route('anggota.profile.index') }}"
                       class="flex-1 text-center bg-gray-300 text-gray-800 py-2 rounded hover:bg-gray-400 transition">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
