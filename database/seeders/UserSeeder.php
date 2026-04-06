<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Petugas;
use App\Models\KepalaPerpus;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ================= ANGGOTA =================
        $anggota = User::create([
            'name' => 'Anisha ',
            'email' => 'anisha@gmail.com',
            'password' => Hash::make('333333'),
            'role' => 'anggota',
        ]);

        Anggota::create([
            'user_id' => $anggota->id,
            'nis' => '1001',
            'kelas' => 'XII RPL 1',
        ]);

        // ================= PETUGAS =================
        $petugas = User::create([
            'name' => 'Bunga',
            'email' => 'bunga@gmail.com',
            'password' => Hash::make('222222'),
            'role' => 'petugas',
        ]);

        Petugas::create([
            'user_id' => $petugas->id,
            'nip_petugas' => 'P001',
            'no_hp' => '08123456789',
        ]);

        // ================= KEPALA =================
        $kepala = User::create([
            'name' => 'Kayla',
            'email' => 'kayla@gmail.com',
            'password' => Hash::make('111111'),
            'role' => 'kepala_perpus',
        ]);

        KepalaPerpus::create([
            'user_id' => $kepala->id,
            'nip_kepala' => 'K001',
        ]);
    }
}
