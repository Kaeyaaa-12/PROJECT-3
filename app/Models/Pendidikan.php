<?php

namespace App\Models; // PASTIKAN NAMESPACE-NYA SEPERTI INI

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pendidikans'; // Eksplisit mendefinisikan nama tabel

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kecamatan',
        'angka_melek_huruf',
        'tahun',
    ];
}
