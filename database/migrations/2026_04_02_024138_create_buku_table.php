<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //membuat tabel buku
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id(); //id buku
            $table->string('kode_buku')->unique(); //kode buku unik
            $table->string('judul_buku')->nullable(); //judul buku
            $table->string('penulis')->nullable(); // penulis
            $table->year('tahun_terbit')->nullable(); //tahun terbit
            $table->text('sinopsis')->nullable(); //sinopsis
            $table->integer('stok')->nullable(); //stok
            $table->string('cover')->nullable(); //cover
            $table->timestamps(); //create sama update
        });
    }

    /**
     * Reverse the migrations.
     */

    //menghapus tabel buku
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
