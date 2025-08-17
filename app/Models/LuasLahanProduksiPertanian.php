<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuasLahanProduksiPertanian extends Model
{
    use HasFactory;

    protected $fillable = [
        'komoditas',
        'luas_lahan',
        'produksi',
        'tahun',
    ];
}