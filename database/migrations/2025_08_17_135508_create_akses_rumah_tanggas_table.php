<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('akses_rumah_tanggas', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->unique();
            $table->decimal('persentase_akses_air_bersih_layak', 5, 2);
            $table->decimal('akses_sanitasi_layak', 5, 2);
            $table->decimal('rasio_elektrifikasi', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akses_rumah_tanggas');
    }
};
