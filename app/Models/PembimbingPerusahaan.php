<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembimbingPerusahaan extends Model
{
    protected $fillable = [
        'user_id',
        'perusahaan_id',
        'nama',
        'posisi',
        'email',
        'noTelepon',
        'bidangKeahlian',
        'tanggalDaftarSebagaiPembimbing',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function kegiatanMagang()
    {
        return $this->hasMany(KegiatanMagang::class);
    }
}
