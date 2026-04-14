<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Buku;
use Carbon\Carbon;

class Peminjaman extends Model
{
    //nama tabel
    protected $table = 'peminjaman';

    //kolom yang bisa diisi
    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jatuh_tempo',
        'status',

        'denda',
        'jenis_denda',
        'terlambat',
        'status_denda',
        'metode_pembayaran',
        'tanggal_bayar',
        'keterangan',
    ];

    //relasi ke user anggota
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
