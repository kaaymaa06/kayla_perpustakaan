<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\userFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    //kolom yang bisa diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */

    //kolom yang disembunyi
    protected $hidden = [
        'password',
    ];

    //relasi ke anggota
    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

    //relasi ke petugas
     public function petugas()
    {
        return $this->hasOne(Petugas::class);
    }

    //relasi ke kepala perpus
    public function kepala()
    {
        return $this->hasOne(KepalaPerpus::class);
    }

    //relasi peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


}
