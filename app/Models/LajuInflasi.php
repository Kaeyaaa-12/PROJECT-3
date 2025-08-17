<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LajuInflasi extends Model
{
    use HasFactory;

    protected $table = 'laju_inflasi';

    protected $fillable = [
        'tahun',
        'persentase',
    ];
}
