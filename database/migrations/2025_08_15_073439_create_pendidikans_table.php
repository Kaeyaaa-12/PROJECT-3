<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('pendidikans', function (Blueprint $table) {
        $table->id();
        $table->string('kecamatan');
        $table->decimal('angka_melek_huruf', 5, 2); // Persentase, misal 98.50
        $table->year('tahun');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikans');
    }
};
