<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Playstation;

class PlaystationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'jenis' => 'Playstation 5',
                'Spesifikasi' => 'RAM 16GB, SSD 1TB, 4K Gaming Support',
                'TarifHarian' => 270000,
            ],
            [
                'jenis' => 'Playstation 4',
                'Spesifikasi' => 'RAM 8GB, HDD 500GB, Full HD Gaming',
                'TarifHarian' => 250000,
            ],
            [
                'jenis' => 'Playstation 3',
                'Spesifikasi' => 'RAM 2GB, HDD 320GB, 720p Gaming',
                'TarifHarian' => 150000,
            ],
            [
                'jenis' => 'Playstation 2',
                'Spesifikasi' => 'RAM 512MB, HDD 80GB, SD Gaming',
                'TarifHarian' => 100000,
            ],
            [
                'jenis' => 'Playstation 1',
                'Spesifikasi' => 'RAM 128MB, CD-ROM Support, Classic Gaming',
                'TarifHarian' => 50000,
            ],
            [
                'jenis' => 'Playstation Vita',
                'Spesifikasi' => 'OLED Screen, Portable Gaming, Exclusive Titles',
                'TarifHarian' => 40000,
            ],
            [
                'jenis' => 'PSP',
                'Spesifikasi' => 'Portable Gaming, UMD Drive, Built-in Wi-Fi',
                'TarifHarian' => 35000,
            ],
        ];

        foreach ($data as $item) {
            Playstation::create($item);
        }
    }
}
