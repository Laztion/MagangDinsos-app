<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembimbingUniversitas extends Model
{
    //
    protected $fillable = [
        'nama',
        'nip',
        'email',
        'noTelepon',
        'departemen',
        'bidangKeahlian',
    ];
    
}
