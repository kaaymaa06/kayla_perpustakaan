<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Buku;
use Carbon\Carbon;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'jatuh_tempo',
        'tanggal_kembali',
        'status'
        
    ];



    public function getTerlambatAttribute()
    {
        if (!$this->jatuh_tempo) {
            return false;
        }

        if (!$this->tanggal_kembali) {
            return Carbon::now()->gt(Carbon::parse($this->jatuh_tempo));
        }

        return Carbon::parse($this->tanggal_kembali)
            ->gt(Carbon::parse($this->jatuh_tempo));
    }


    public function getDendaAttribute()
    {
        if (!$this->jatuh_tempo) {
            return 0;
        }

        $tanggalAkhir = $this->tanggal_kembali ?? Carbon::now();

        if (Carbon::parse($tanggalAkhir)->gt(Carbon::parse($this->jatuh_tempo))) {
            return Carbon::parse($tanggalAkhir)
                ->diffInDays(Carbon::parse($this->jatuh_tempo)) * 1000;
        }

        return 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
