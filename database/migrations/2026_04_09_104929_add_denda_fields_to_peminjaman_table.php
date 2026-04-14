<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //menambahkan kolom terkait pembayaran denda
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->string('metode_pembayaran')->nullable(); //metode pembyaran
            $table->date('tanggal_bayar')->nullable(); //tanggal bayar
            $table->text('keterangan')->nullable(); //keterangan tambahan
            $table->string('status_denda')->nullable(); // status denda lunas atau belum bayar
        });
    }

    /**
     * Reverse the migrations.
     */

    //rollback belum isi
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            //
        });
    }
};
