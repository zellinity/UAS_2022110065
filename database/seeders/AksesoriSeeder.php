<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aksesori;

class AksesoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aksesori::create([
            'nama_aksesoris' => 'Controller PS5',
            'deskripsi' => 'Controller tambahan untuk PS5',
            'harga' => 500000,
            'stok' => 10,
        ]);

        Aksesori::create([
            'nama_aksesoris' => 'Headset Gaming',
            'deskripsi' => 'Headset gaming kualitas tinggi',
            'harga' => 700000,
            'stok' => 5,
        ]);
    }
}
