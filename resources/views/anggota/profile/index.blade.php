@extends('anggota.layouts.app')

@section('content')
<div class="p-6 min-h-screen flex justify-center items-center  to-gray-200">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            {{-- HEADER GRADIENT --}}
            <div class="bg-gradient-to-r from-blue-500 to-cyan-600 h-24 relative">

                {{-- AVATAR --}}
                <div class="absolute left-1/2 transform -translate-x-1/2 top-12">
                    <div class="w-24 h-24 bg-white rounded-full shadow flex items-center justify-center text-2xl font-bold text-indigo-600">
                        {{ $inisial }}
                    </div>
                </div>

            </div>

            {{-- CONTENT --}}
            <div class="pt-16 pb-6 px-6 text-center">

                {{-- NAMA --}}
                <h3 class="text-xl font-bold text-gray-800">
                    {{ $anggota->user->name ?? '-' }}
                </h3>

                <p class="text-gray-500 text-sm mb-4">
                    Anggota Perpustakaan
                </p>

                {{-- INFO BOX --}}
                <div class="space-y-3 text-sm text-left mt-4">

                    <div class="bg-gray-50 p-3 rounded-lg flex justify-between">
                        <span class="text-gray-500">Email</span>
                        <span class="font-medium text-gray-800">
                            {{ $anggota->user->email ?? '-' }}
                        </span>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg flex justify-between">
                        <span class="text-gray-500">NIS</span>
                        <span class="font-medium text-gray-800">
                            {{ $anggota->nis ?? '-' }}
                        </span>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg flex justify-between">
                        <span class="text-gray-500">Kelas</span>
                        <span class="font-medium text-gray-800">
                            {{ $anggota->kelas ?? '-' }}
                        </span>
                    </div>

                </div>

                {{-- BUTTON --}}
                <a href="{{ route('anggota.profile.edit', $anggota->id) }}"
                   class="block mt-6 bg-gradient-to-r from-blue-500 to-cyan-600 text-white py-2.5 rounded-full text-sm font-medium hover:opacity-90 transition">
                    Edit Profile
                </a>

            </div>

        </div>

    </div>

</div>
@endsection
