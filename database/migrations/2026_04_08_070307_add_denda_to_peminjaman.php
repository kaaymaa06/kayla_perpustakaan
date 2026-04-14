<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //menambahkan kolom status pemabayran denda
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->boolean('denda_dibayar')->default(false); //false itu belum bayar
        });
    }

    /**
     * Reverse the migrations.
     */

    //menghapus kolom saat rollback
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropColumn('denda_dibayar');
        });
    }
};
