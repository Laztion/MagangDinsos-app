<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    //
    protected $fillable = [
        'kegiatan_magang_id',
        'mahasiswa_id',
        'tanggalLaporan',
        'aktivitasKegiatan',
        'hasilPekerjaan',
        'hambatanDanSolusi',
        'jamKerja',
        'statusLaporan',
    ];

    public function kegiatanMagang()
    {
        return $this->belongsTo(KegiatanMagang::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
