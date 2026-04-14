<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //membuat tabel petugas
    public function up(): void
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->id(); //id user

            //relasi ke tabel user
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('nip_petugas')->nullable(); //nip petugas
            $table->string('no_hp')->nullable(); //no hp
            $table->timestamps(); //create sama update
        });
    }

    /**
     * Reverse the migrations.
     */

    //menghapus tabel petugas
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
