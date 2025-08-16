<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\PendudukKecamatan;

class PendudukKecamatanSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['kecamatan' => 'Tulungagung', 'jumlah_penduduk' => 85000, 'tahun' => 2025],
            ['kecamatan' => 'Kedungwaru', 'jumlah_penduduk' => 95000, 'tahun' => 2025],
            ['kecamatan' => 'Boyolangu', 'jumlah_penduduk' => 78000, 'tahun' => 2025],
            ['kecamatan' => 'Ngunut', 'jumlah_penduduk' => 76000, 'tahun' => 2025],
            ['kecamatan' => 'Kauman', 'jumlah_penduduk' => 68000, 'tahun' => 2025],
            ['kecamatan' => 'Sumbergempol', 'jumlah_penduduk' => 71000, 'tahun' => 2025],
            ['kecamatan' => 'Rejotangan', 'jumlah_penduduk' => 65000, 'tahun' => 2025],
        ];
        foreach ($data as $item) {
            PendudukKecamatan::create($item);
        }
    }
}