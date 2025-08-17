<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdrbSektorUsaha extends Model
{
    use HasFactory;

    protected $table = 'pdrb_sektor_usaha';

    protected $fillable = [
        'tahun',
        'pertanian',
        'industri',
        'perdagangan',
        'konstruksi',
        'jasa',
    ];
}