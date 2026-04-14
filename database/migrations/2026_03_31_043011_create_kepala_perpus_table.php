<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //membuat tabel kepala perpus
    public function up(): void
    {
        Schema::create('kepala_perpus', function (Blueprint $table) {
            $table->id(); // id kepala perpus

            //relasi ke tabel user
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('nip_kepala')->nullable(); //nip kepala perpus
            $table->timestamps(); //create sama update
        });
    }

    /**
     * Reverse the migrations.
     */

    //menghapus tabel kepala perpus
    public function down(): void
    {
        Schema::dropIfExists('kepala_perpus');
    }
};
