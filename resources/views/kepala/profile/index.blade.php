@extends('kepala.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen items-start">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow p-6 text-center">

            <h3 class="text-xl font-semibold text-gray-800 mb-6">
                Profile Kepala Perpustakaan
            </h3>

            {{-- INISIAL --}}
            <div class="w-20 h-20 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto">
                {{ $inisial }}
            </div>

            {{-- NAMA --}}
            <h5 class="mt-4 text-lg font-semibold text-gray-800">
                {{ $kepala->user->name ?? '-' }}
            </h5>

            <p class="text-gray-500 text-sm">
                Kepala Perpustakaan
            </p>

            <hr class="my-4">

            {{-- INFO --}}
            <div class="space-y-3 text-sm">

                <div class="flex justify-between border-b pb-2">
                    <span class="text-gray-500">Email</span>
                    <span class="font-medium text-gray-800">
                        {{ $kepala->user->email ?? '-' }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">NIP</span>
                    <span class="font-medium text-gray-800">
                        {{ $kepala->nip_kepala ?? '-' }}
                    </span>
                </div>

            </div>

            {{-- BUTTON --}}
            <a href="{{ route('kepala.profile.edit', $kepala->id) }}"
               class="block mt-6 bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 transition">
                Edit Profile
            </a>

        </div>
    </div>

</div>
@endsection
