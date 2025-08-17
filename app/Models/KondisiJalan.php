<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiJalan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'baik',
        'sedang',
        'rusak_ringan',
        'rusak_berat',
    ];
}