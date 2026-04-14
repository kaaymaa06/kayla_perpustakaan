<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //menambahkan kolon jatuh tempo
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->date('jatuh_tempo')->nullable(); //batas pengembalian
        });
    }

    /**
     * Reverse the migrations.
     */

    //menghapus kolom pas rollback
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropColumn('jatuh_tempo');
        });
    }
};
