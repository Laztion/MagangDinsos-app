<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembimbingPerusahaan extends Model
{
    protected $fillable = [
        'perusahaan_id',
        'nama',
        'posisi',
        'email',
        'noTelepon',
        'bidangKeahlian',
        'tanggalDaftarSebagaiPembimbing',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

}
