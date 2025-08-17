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
        Schema::create('luas_lahan_produksi_pertanians', function (Blueprint $table) {
            $table->id();
            $table->string('komoditas');
            $table->decimal('luas_lahan', 8, 2);
            $table->decimal('produksi', 8, 2);
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luas_lahan_produksi_pertanians');
    }
};
