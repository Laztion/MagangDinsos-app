<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $fillable = [
        'user_id',
        'nama',
        'nim',
        'jenisKelamin',
        'alamat',
        'tanggalLahir',
        'tempatLahir',
        'email',
        'noTelepon',
        'universitas_id',
        'fakultas',
        'programStudi',
        'kelas',
        'semester',
        'statusKeaktifan',
        'tanggalDaftar',
        'foto',
    ];

    public function universitas()
    {
        return $this->belongsTo(Universitas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kegiatanMagang()
    {
        return $this->hasMany(KegiatanMagang::class);
    }
}
