<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('penduduk_kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->integer('jumlah_penduduk');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('penduduk_kecamatans');
    }
};