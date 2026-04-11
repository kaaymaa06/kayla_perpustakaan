@extends('anggota.layouts.app')

@section('content')
<div class="p-4 min-h-screen flex justify-center items-center">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-3xl shadow-lg p-6">

            {{-- HEADER --}}
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Edit Profile
            </h3>

            <form action="{{ route('anggota.profile.update', $anggota->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- NAMA --}}
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Nama</label>
                    <input type="text" name="name"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition"
                        value="{{ old('name', $anggota->user->name) }}">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition"
                        value="{{ old('email', $anggota->user->email) }}">
                </div>

                {{-- NIS --}}
                <div>
                    <label class="block text-sm text-gray-500 mb-1">NIS</label>
                    <input type="text" name="nis"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition"
                        value="{{ old('nis', $anggota->nis) }}">
                </div>

                {{-- KELAS --}}
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Kelas</label>
                    <input type="text" name="kelas"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition"
                        value="{{ old('kelas', $anggota->kelas) }}">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 pt-4">

                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-2.5 rounded-lg hover:opacity-90 transition font-medium shadow">
                        Simpan
                    </button>

                    <a href="{{ route('anggota.profile.index') }}"
                       class="flex-1 text-center bg-gray-200 text-gray-700 py-2.5 rounded-lg hover:bg-gray-300 transition font-medium">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection
