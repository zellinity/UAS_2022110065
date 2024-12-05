<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kurir;

class KurirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kurir::create([
            'nama_kurir' => 'John Doe',
            'email' => 'johndoe@example.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 5',
        ]);

        Kurir::create([
            'nama_kurir' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'nomor_telepon' => '081234567891',
            'alamat' => 'Jl. Kebon Jeruk No. 12',
        ]);
    }
}
