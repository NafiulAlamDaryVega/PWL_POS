<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Nafiul',
                'penjualan_kode' => 'PJ20240307001',
                'penjualan_tanggal' => '2024-03-07 08:13:45',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Yulanda',
                'penjualan_kode' => 'PJ20240307002',
                'penjualan_tanggal' => '2024-03-07 10:56:07',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Naila',
                'penjualan_kode' => 'PJ20240307003',
                'penjualan_tanggal' => '2024-03-07 11:26:33',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Dimas',
                'penjualan_kode' => 'PJ20240307004',
                'penjualan_tanggal' => '2024-03-07 13:09:12',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Amelia',
                'penjualan_kode' => 'PJ20240307005',
                'penjualan_tanggal' => '2024-03-07 17:37:20',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Inensia',
                'penjualan_kode' => 'PJ20240308001',
                'penjualan_tanggal' => '2024-03-08 09:53:09',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Amanda',
                'penjualan_kode' => 'PJ20240308002',
                'penjualan_tanggal' => '2024-03-08 12:40:01',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Taila',
                'penjualan_kode' => 'PJ20240308003',
                'penjualan_tanggal' => '2024-03-08 14:09:57',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Nabila',
                'penjualan_kode' => 'PJ20240308004',
                'penjualan_tanggal' => '2024-03-08 15:29:14',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Sheva',
                'penjualan_kode' => 'PJ20240308005',
                'penjualan_tanggal' => '2024-03-08 17:46:05',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
