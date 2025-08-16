<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\EkonomiKecamatan;

class EkonomiKecamatanSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['kecamatan' => 'Kedungwaru', 'pdrb_miliar' => 5200.50, 'laju_pertumbuhan' => 5.85, 'tahun' => 2025],
            ['kecamatan' => 'Tulungagung', 'pdrb_miliar' => 4800.75, 'laju_pertumbuhan' => 5.70, 'tahun' => 2025],
            ['kecamatan' => 'Ngunut', 'pdrb_miliar' => 4100.20, 'laju_pertumbuhan' => 5.65, 'tahun' => 2025],
            ['kecamatan' => 'Boyolangu', 'pdrb_miliar' => 3950.00, 'laju_pertumbuhan' => 5.50, 'tahun' => 2025],
            ['kecamatan' => 'Sumbergempol', 'pdrb_miliar' => 3800.00, 'laju_pertumbuhan' => 5.45, 'tahun' => 2025],
            ['kecamatan' => 'Kauman', 'pdrb_miliar' => 3500.80, 'laju_pertumbuhan' => 5.30, 'tahun' => 2025],
        ];
        foreach ($data as $item) {
            EkonomiKecamatan::create($item);
        }
    }
}