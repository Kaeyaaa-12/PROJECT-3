<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\IpmKecamatan;

class IpmKecamatanSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['kecamatan' => 'Tulungagung', 'skor_ipm' => 79.50, 'tahun' => 2025],
            ['kecamatan' => 'Kedungwaru', 'skor_ipm' => 78.80, 'tahun' => 2025],
            ['kecamatan' => 'Boyolangu', 'skor_ipm' => 76.20, 'tahun' => 2025],
            ['kecamatan' => 'Ngunut', 'skor_ipm' => 75.10, 'tahun' => 2025],
            ['kecamatan' => 'Sumbergempol', 'skor_ipm' => 74.90, 'tahun' => 2025],
            ['kecamatan' => 'Kauman', 'skor_ipm' => 74.50, 'tahun' => 2025],
        ];
        foreach ($data as $item) {
            IpmKecamatan::create($item);
        }
    }
}