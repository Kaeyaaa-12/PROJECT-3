<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aps extends Model
{
    use HasFactory;

    protected $table = 'aps';

    protected $fillable = [
        'persentase_sd',
        'persentase_smp',
        'persentase_sma',
        'tahun',
    ];
}