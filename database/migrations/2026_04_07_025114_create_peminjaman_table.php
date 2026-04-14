<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //membuat tabel peminjaman
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
        $table->id(); //id peminjama

        //relasi ke user dan buku
        $table->foreignId('user_id')->constrained();
        $table->foreignId('buku_id')->constrained('buku');

        $table->date('tanggal_pinjam'); //tanggal pinjam
        $table->date('tanggal_jatuh_tempo'); //batas pengembalian
        $table->date('tanggal_kembali')->nullable(); //tanggal kembali
        $table->integer('denda')->default(0); //jumlah denda
        $table->boolean('terlambat')->default(false); //status terlambat
        $table->string('status')->default('dipinjam',);// menunggu, dipinjam, ditolak, selesai
        $table->timestamps(); //create sama update
        });

    }

    /**
     * Reverse the migrations.
     */

    //menghapus tabel peminjaman
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
