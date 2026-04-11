@extends('kepala.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen items-center bg-gray-50">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-2xl shadow-lg border p-6 text-center hover:shadow-xl transition">

            <h3 class="text-xl font-bold text-gray-800 mb-6">
                Profile Kepala Perpustakaan
            </h3>

            {{-- INISIAL --}}
            <div class="w-24 h-24 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto shadow-md">
                {{ $inisial }}
            </div>

            {{-- NAMA --}}
            <h5 class="mt-5 text-lg font-semibold text-gray-800">
                {{ $kepala->user->name ?? '-' }}
            </h5>

            <p class="text-gray-500 text-sm">
                Kepala Perpustakaan
            </p>

            <hr class="my-5 border-gray-200">

            {{-- INFO --}}
            <div class="space-y-4 text-sm text-left">

                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                    <span class="text-gray-500">Email</span>
                    <span class="font-medium text-gray-800">
                        {{ $kepala->user->email ?? '-' }}
                    </span>
                </div>

                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                    <span class="text-gray-500">NIP</span>
                    <span class="font-medium text-gray-800">
                        {{ $kepala->nip_kepala ?? '-' }}
                    </span>
                </div>

            </div>

            {{-- BUTTON --}}
            <a href="{{ route('kepala.profile.edit', $kepala->id) }}"
               class="block mt-6 bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-2.5 rounded-lg font-medium hover:opacity-90 transition">
                Edit Profile
            </a>

        </div>

    </div>

</div>
@endsection
