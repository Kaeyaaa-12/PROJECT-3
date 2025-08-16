<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\PengangguranKecamatan;

class PengangguranKecamatanSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['kecamatan' => 'Tulungagung', 'persentase_pengangguran' => 5.20, 'tahun' => 2025],
            ['kecamatan' => 'Kedungwaru', 'persentase_pengangguran' => 5.15, 'tahun' => 2025],
            ['kecamatan' => 'Boyolangu', 'persentase_pengangguran' => 4.80, 'tahun' => 2025],
            ['kecamatan' => 'Ngunut', 'persentase_pengangguran' => 4.50, 'tahun' => 2025],
            ['kecamatan' => 'Sumbergempol', 'persentase_pengangguran' => 4.30, 'tahun' => 2025],
            ['kecamatan' => 'Rejotangan', 'persentase_pengangguran' => 3.90, 'tahun' => 2025],
        ];
        foreach ($data as $item) {
            PengangguranKecamatan::create($item);
        }
    }
}