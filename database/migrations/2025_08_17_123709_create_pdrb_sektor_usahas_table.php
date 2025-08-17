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
        Schema::create('pdrb_sektor_usaha', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->unique();
            $table->decimal('pertanian', 5, 2);
            $table->decimal('industri', 5, 2);
            $table->decimal('perdagangan', 5, 2);
            $table->decimal('konstruksi', 5, 2);
            $table->decimal('jasa', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdrb_sektor_usaha');
    }
};
