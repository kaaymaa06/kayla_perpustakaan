<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //menambahkan kolom alasan di tabel peminjaman
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->text('alasan')->nullable(); // alasan
        });
    }

    /**
     * Reverse the migrations.
     */

    //menghapus peruabahan
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            //
        });
    }
};
