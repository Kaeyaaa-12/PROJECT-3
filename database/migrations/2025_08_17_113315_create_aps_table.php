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
        Schema::create('aps', function (Blueprint $table) {
            $table->id();
            $table->decimal('persentase_sd', 5, 2);
            $table->decimal('persentase_smp', 5, 2);
            $table->decimal('persentase_sma', 5, 2);
            $table->year('tahun')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aps');
    }
};