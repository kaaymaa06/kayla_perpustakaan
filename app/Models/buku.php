<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //nama tabel
    protected $table = 'buku';

    //kolom yang bisa diisi
    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'penulis',
        'tahun_terbit',
        'stok',
        'sinopsis',
        'cover',
    ];

    //relasi ke kepala perpus
    public function kepala()
    {
        return $this->belongsTo(kepala_perpus::class);
    }

    //relasi ke peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }
}
