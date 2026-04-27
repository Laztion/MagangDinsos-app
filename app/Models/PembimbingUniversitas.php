<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembimbingUniversitas extends Model
{
    //
    protected $fillable = [
        'user_id',
        'universitas_id',
        'nama',
        'nip',
        'email',
        'noTelepon',
        'departemen',
        'bidangKeahlian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function universitas()
    {
        return $this->belongsTo(Universitas::class);
    }

    public function kegiatanMagang()
    {
        return $this->hasMany(KegiatanMagang::class);
    }
    
}
