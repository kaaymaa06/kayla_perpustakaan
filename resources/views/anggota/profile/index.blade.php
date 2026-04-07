@extends('anggota.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen items-start">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow p-6">

            {{-- HEADER --}}
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                Profile Anggota
            </h3>

            {{-- INISIAL --}}
            <div class="flex justify-center mb-4">
                <div class="w-20 h-20 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full flex items-center justify-center text-2xl font-bold">
                    {{ $inisial }}
                </div>
            </div>

            {{-- NAMA --}}
            <div class="text-center mb-4">
                <h5 class="text-lg font-semibold text-gray-800">
                    {{ $anggota->user->name ?? '-' }}
                </h5>
                <p class="text-gray-500 text-sm">
                    Anggota Perpustakaan
                </p>
            </div>

            <hr class="my-4">

            {{-- DETAIL --}}
            <div class="space-y-3 text-sm">

                <div class="flex justify-between border-b pb-2">
                    <span class="text-gray-500">Email</span>
                    <span class="font-medium text-gray-800">
                        {{ $anggota->user->email ?? '-' }}
                    </span>
                </div>

                <div class="flex justify-between border-b pb-2">
                    <span class="text-gray-500">NIS</span>
                    <span class="font-medium text-gray-800">
                        {{ $anggota->nis ?? '-' }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Kelas</span>
                    <span class="font-medium text-gray-800">
                        {{ $anggota->kelas ?? '-' }}
                    </span>
                </div>

            </div>

            {{-- BUTTON --}}
            <a href="{{ route('anggota.profile.edit', $anggota->id) }}"
               class="block mt-6 bg-indigo-500 text-white py-2 rounded text-center hover:bg-indigo-600 transition">
                Edit Profile
            </a>

        </div>
    </div>

</div>
@endsection
