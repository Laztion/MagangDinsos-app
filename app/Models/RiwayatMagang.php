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
        'diveisiTempat',
        'namaPerusahaan',
        'namaPembimbingPerusahaan',
        'statusKompetensi',
        'nilaiAkhir',
        'catatan',
        'tanggalTercatat',
    ];
}
