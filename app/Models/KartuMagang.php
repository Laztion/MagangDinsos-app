<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuMagang extends Model
{
    //
    protected $fillable = [
        'mahasiswa_id',
        'kegiatan_magang_id',
        'universitas_id',
        'tanggalMulai',
        'tanggalSelesai',
        'statusKartu',
        'tanggalCetak',
        'tanggalCetakUlang',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function kegiatanMagang()
    {
        return $this->belongsTo(KegiatanMagang::class);
    }

    public function universitas()
    {
        return $this->belongsTo(Universitas::class);
    }
}
