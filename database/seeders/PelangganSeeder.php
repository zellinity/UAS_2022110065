<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'nama_pelanggan' => 'Alice Johnson',
            'email' => 'alice.johnson@example.com',
            'nomor_telepon' => '082234567890',
            'alamat' => 'Jl. Sudirman No. 8',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => 'Bob Brown',
            'email' => 'bob.brown@example.com',
            'nomor_telepon' => '082234567891',
            'alamat' => 'Jl. Asia Afrika No. 7',
        ]);
    }
}
