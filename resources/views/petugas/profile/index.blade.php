@extends('petugas.layouts.app')

@section('content')
<div class="p-6 min-h-screen flex justify-center items-center">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            {{-- header profile --}}
            <div class="bg-gradient-to-r from-blue-500 to-cyan-600 h-24 relative">

                {{-- avatar sama inisial --}}
                <div class="absolute left-1/2 transform -translate-x-1/2 top-12">
                    <div class="w-24 h-24 bg-white rounded-full shadow flex items-center justify-center text-2xl font-bold text-blue-600">
                        {{ $inisial }}
                    </div>
                </div>

            </div>

            {{-- data profile --}}
            <div class="pt-16 pb-6 px-6 text-center">

                {{-- nama user --}}
                <h3 class="text-xl font-bold text-gray-800">
                    {{ $petugas->user->name ?? '-' }}
                </h3>

                <p class="text-gray-500 text-sm mb-4">
                    Petugas Perpustakaan
                </p>

                {{-- detail informasi --}}
                <div class="space-y-3 text-sm text-left mt-4">

                    {{-- email --}}
                    <div class="bg-gray-50 p-3 rounded-lg flex justify-between">
                        <span class="text-gray-500">Email</span>
                        <span class="font-medium text-gray-800">
                            {{ $petugas->user->email ?? '-' }}
                        </span>
                    </div>

                    {{-- nip --}}
                    <div class="bg-gray-50 p-3 rounded-lg flex justify-between">
                        <span class="text-gray-500">NIP</span>
                        <span class="font-medium text-gray-800">
                            {{ $petugas->nip_petugas ?? '-' }}
                        </span>
                    </div>

                </div>

                {{-- tombol edit profile --}}
                <a href="{{ route('petugas.profile.edit', $petugas->id) }}"
                   class="block mt-6 bg-gradient-to-r from-blue-500 to-cyan-600 text-white py-2.5 rounded-full text-sm font-medium hover:opacity-90 transition">
                    Edit Profile
                </a>

            </div>

        </div>

    </div>

</div>
@endsection
