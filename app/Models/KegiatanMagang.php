<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanMagang extends Model
{
    //
    protected $fillable = [
        'perusahaan_id',
        'pembimbing_universitas_id',
        'pembimbing_perusahaan_id',
        'judulKegiatan',
        'tanggalMulai',
        'tanggalSelesai',
        'durasiHari',
        'divisiTempat',
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
