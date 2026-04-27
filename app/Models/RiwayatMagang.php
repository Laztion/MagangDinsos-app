<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatMagang extends Model
{
    //
    protected $fillable = [
        'mahasiswa_id',
        'kegiatan_magang_id',
        'tanggalMulai',
        'tanggalSelesai',
        'divisiTempat',
        'namaPerusahaan',
        'namaPembimbingPerusahaan',
        'statusKompetensi',
        'nilaiAkhir',
        'catatan',
        'tanggalTercatat',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function kegiatanMagang()
    {
        return $this->belongsTo(KegiatanMagang::class);
    }
}
