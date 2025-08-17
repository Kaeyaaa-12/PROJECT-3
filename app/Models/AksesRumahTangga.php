<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesRumahTangga extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'persentase_akses_air_bersih_layak',
        'akses_sanitasi_layak',
        'rasio_elektrifikasi',
    ];
}