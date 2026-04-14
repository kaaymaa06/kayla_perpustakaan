<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //menambahkan kolom status terlambat
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->boolean('terlambat')->default(false); //false itu tidak terlambat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            //
        });
    }
};
