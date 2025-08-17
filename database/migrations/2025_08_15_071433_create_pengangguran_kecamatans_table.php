<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengangguran_kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->decimal('persentase_pengangguran', 5, 2); // Persentase, misal 4.15
            $table->year('tahun');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pengangguran_kecamatans');
    }
};