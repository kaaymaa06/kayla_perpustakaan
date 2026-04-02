<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'user_id',
        'nis',
        'kelas',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

