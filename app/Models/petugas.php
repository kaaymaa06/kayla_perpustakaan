<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    //nama tabel
    protected $table = 'petugas';

    //kolom yang bisa diisi
    protected $fillable = [
        'user_id',
        'nip_petugas',
        'no_hp',
    ];

    //relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
