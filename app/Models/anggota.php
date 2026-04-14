<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Anggota extends Model
{
    //nama tabel
    protected $table = 'anggota';

    //kolom yang bisa diisi
    protected $fillable = [
        'user_id',
        'nis',
        'kelas',
        'alamat',
    ];

    //relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

