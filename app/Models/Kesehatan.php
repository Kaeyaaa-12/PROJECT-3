<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;

    protected $table = 'kesehatans';

    protected $fillable = [
        'tahun',
        'jumlah_puskesmas',
        'jumlah_rumah_sakit',
        'jumlah_puskesmas_pembantu',
    ];
}