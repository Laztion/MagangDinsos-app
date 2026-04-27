<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranLaporan extends Model
{
    //
    protected $fillable = [
        'laporan_kegiatan_id',
        'namaFile',
        'tipeFile',
        'urlFile',
        'tanggalUpload',
    ];
    public function laporanKegiatan()
    {
        return $this->belongsTo(LaporanKegiatan::class);
    }
}
