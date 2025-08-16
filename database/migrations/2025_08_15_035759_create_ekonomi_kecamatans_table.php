<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ekonomi_kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->decimal('pdrb_miliar', 8, 2); // PDRB dalam Miliar Rupiah
            $table->decimal('laju_pertumbuhan', 4, 2); // Laju Pertumbuhan dalam persen
            $table->year('tahun');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('ekonomi_kecamatans');
    }
};