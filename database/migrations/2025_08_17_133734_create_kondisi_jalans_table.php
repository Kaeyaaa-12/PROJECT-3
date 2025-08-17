<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kondisi_jalans', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->unique();
            $table->decimal('baik', 5, 2);
            $table->decimal('sedang', 5, 2);
            $table->decimal('rusak_ringan', 5, 2);
            $table->decimal('rusak_berat', 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kondisi_jalans');
    }
};
