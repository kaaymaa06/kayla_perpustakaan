<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaPerpus extends Model
{
    //nama tabel
    protected $table = 'kepala_perpus';

    //kolom yang bisa diisi
    protected $fillable = [
        'user_id',
        'nip_kepala',
    ];

    //relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
