<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuMagang extends Model
{
    //
    protected $fillable = [
        'mahasiswa_id',
        'perusahaan_id',
        'pembimbing_universitas_id',
        'pembimbing_perusahaan_id',
        'tanggalMulai',
        'tanggalSelesai',
        'durasiHari',
        'devisiTempat',
        'deskripsiTugas',
        'dokumentasi',
        'statusKegiatan',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
    public function pembimbing_universitas()
    {
        return $this->belongsTo(PembimbingUniversitas::class);
    }
    public function pembimbing_perusahaan()
    {
        return $this->belongsTo(PembimbingPerusahaan::class);
    }
}
