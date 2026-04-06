<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    protected $fillable = [
        'namaUniversitas',
        'alamat',
        'kota',
        'email',
        'noTelepon',
        'website',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
