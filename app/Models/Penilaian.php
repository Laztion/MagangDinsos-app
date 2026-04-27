<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'kegiatan_magang_id',
        'pembimbing_perusahaan_id',
        'pembimbing_universitas_id',
        'nilaiKehadiran',
        'nilaiSikap',
        'nilaiKomunikasi',
        'nilaiProaktif',
        'nilaiAkhir',
        'komentar',
        'tanggalPenilaian',
    ];

    public function kegiatanMagang()
    {
        return $this->belongsTo(KegiatanMagang::class);
    }

    public function pembimbingPerusahaan()
    {
        return $this->belongsTo(PembimbingPerusahaan::class);
    }

    public function pembimbingUniversitas()
    {
        return $this->belongsTo(PembimbingUniversitas::class);
    }
}
