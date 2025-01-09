<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'unit' => 'CC',
                'layanan' => 'Indihome',
                'order' => 'MO',
                'permint' => 'config',
                'sc' => 'SC123',
                'detail' => 'Detail laporan 1',
            ],
            [
                'unit' => 'CC',
                'layanan' => 'Indibiz',
                'order' => 'MO',
                'permint' => 'config',
                'sc' => 'SC124',
                'detail' => 'Detail laporan 3',
            ],
            [
                'unit' => 'ASO',
                'layanan' => 'Indibiz',
                'order' => 'PDA',
                'permint' => 'fallout',
                'sc' => 'SC456',
                'detail' => 'Detail laporan 2',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel laporans
        DB::table('laporan')->insert($data);
    }
}
