<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //membuat tabel user
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //id user
            $table->string('name'); //nama
            $table->string('email')->unique(); //email unik
            $table->string('password'); // password
            $table->string('role'); //role anggota/petugas/kepala perpus
            $table->timestamps(); //create dan update
        });
    }

    /**
     * Reverse the migrations.
     */

    //menghapus tabel user
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
