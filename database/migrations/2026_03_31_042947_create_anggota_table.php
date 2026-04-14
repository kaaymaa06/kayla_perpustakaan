<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //membuat tabel anggota
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id(); //id anggota

            //relasi ke tabel user
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('nis'); //nis anggota
            $table->string('kelas'); //kelas
            $table->string('alamat')->nullable(); //alamat
            $table->timestamps(); //create sama update
        });
    }

    /**
     * Reverse the migrations.
     */

    //menghapus tabel anggota
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
