@extends('petugas.layouts.app')

@section('content')
<div class="p-4 min-h-screen flex justify-center items-center">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-3xl shadow-lg p-6">

            {{-- HEADER --}}
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Edit Profile
            </h3>

            <form action="{{ route('petugas.profile.update', $petugas->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- NAMA --}}
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Nama</label>
                    <input type="text" name="name"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                        value="{{ old('name', $petugas->user->name) }}">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                        value="{{ old('email', $petugas->user->email) }}">
                </div>

                {{-- NIP --}}
                <div>
                    <label class="block text-sm text-gray-500 mb-1">NIP</label>
                    <input type="text" name="nip_petugas"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                        value="{{ old('nip_petugas', $petugas->nip_petugas) }}">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 pt-4">

                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-blue-500 to-cyan-600 text-white py-2.5 rounded-lg hover:opacity-90 transition font-medium shadow">
                        Simpan
                    </button>

                    <a href="{{ route('petugas.profile.index') }}"
                       class="flex-1 text-center bg-gray-200 text-gray-700 py-2.5 rounded-lg hover:bg-gray-300 transition font-medium">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection
