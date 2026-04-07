@extends('kepala.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen items-start">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow p-6">

            {{-- HEADER --}}
            <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">
                Edit Profile
            </h3>

            <form action="{{ route('kepala.update', $kepala->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- NAMA --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Nama</label>
                    <input type="text" name="name"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        value="{{ old('name', $kepala->user->name) }}">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        value="{{ old('email', $kepala->user->email) }}">
                </div>

                {{-- NIP --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">NIP</label>
                    <input type="text" name="nip_kepala"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        value="{{ old('nip_kepala', $kepala->nip_kepala) }}">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-2 pt-2">
                    <button type="submit"
                        class="flex-1 bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 transition">
                        Simpan
                    </button>

                    <a href="{{ route('kepala.profile.index') }}"
                       class="flex-1 text-center bg-gray-300 text-gray-800 py-2 rounded hover:bg-gray-400 transition">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
