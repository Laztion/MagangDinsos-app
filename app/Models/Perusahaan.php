<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $fillable = [
        'namaPerusahaan',
        'alamat',
        'kota',
        'provinsi',
        'email',
        'sektorIndustri',
        'namaPIC',
        'kontakPIC',
    ];

    public function pembimbing_perusahaan()
    {
        return $this->hasMany(PembimbingPerusahaan::class);
    }
}
