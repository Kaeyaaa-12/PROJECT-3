<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Pendidikan;

class PendidikanSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['kecamatan' => 'Tulungagung', 'angka_melek_huruf' => 99.80, 'tahun' => 2025],
            ['kecamatan' => 'Kedungwaru', 'angka_melek_huruf' => 99.75, 'tahun' => 2025],
            ['kecamatan' => 'Boyolangu', 'angka_melek_huruf' => 99.60, 'tahun' => 2025],
            ['kecamatan' => 'Pagerwojo', 'angka_melek_huruf' => 98.50, 'tahun' => 2025],
            ['kecamatan' => 'Bandung', 'angka_melek_huruf' => 98.20, 'tahun' => 2025],
        ];
        foreach ($data as $item) { Pendidikan::create($item); }
    }
}