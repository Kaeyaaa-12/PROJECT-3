<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\KemiskinanKecamatan;

class KemiskinanKecamatanSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['kecamatan' => 'Bandung', 'persentase_kemiskinan' => 8.10, 'tahun' => 2025],
            ['kecamatan' => 'Pagerwojo', 'persentase_kemiskinan' => 7.95, 'tahun' => 2025],
            ['kecamatan' => 'Tanggunggunung', 'persentase_kemiskinan' => 7.80, 'tahun' => 2025],
            ['kecamatan' => 'Rejotangan', 'persentase_kemiskinan' => 7.50, 'tahun' => 2025],
            ['kecamatan' => 'Kalidawir', 'persentase_kemiskinan' => 7.20, 'tahun' => 2025],
            ['kecamatan' => 'Tulungagung', 'persentase_kemiskinan' => 5.50, 'tahun' => 2025],
        ];
        foreach ($data as $item) {
            KemiskinanKecamatan::create($item);
        }
    }
}