<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kemiskinan_kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->decimal('persentase_kemiskinan', 4, 2); // Persentase, misal 6.65
            $table->year('tahun');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('kemiskinan_kecamatans');
    }
};