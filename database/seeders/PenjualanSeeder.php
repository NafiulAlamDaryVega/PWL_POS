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
                'pembeli' => 'Nafiul Alam',
                'penjualan_kode' => 'PJL001',
                'penjualan_tanggal' => '2024-03-07 08:13:45',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Yulanda Putra',
                'penjualan_kode' => 'PJL002',
                'penjualan_tanggal' => '2024-03-07 10:56:07',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Naila Nahdia',
                'penjualan_kode' => 'PJL003',
                'penjualan_tanggal' => '2024-03-07 11:26:33',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Sindy Sevi',
                'penjualan_kode' => 'PJL004',
                'penjualan_tanggal' => '2024-03-07 13:09:12',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Amelia Belinda',
                'penjualan_kode' => 'PJL005',
                'penjualan_tanggal' => '2024-03-07 17:37:20',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Inensia Putri',
                'penjualan_kode' => 'PJL006',
                'penjualan_tanggal' => '2024-03-08 09:53:09',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 5,
                'pembeli' => 'Amanda Agresia',
                'penjualan_kode' => 'PJL007',
                'penjualan_tanggal' => '2024-03-08 12:40:01',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 5,
                'pembeli' => 'Rizky Tirta',
                'penjualan_kode' => 'PJL008',
                'penjualan_tanggal' => '2024-03-08 14:09:57',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Nabilah Alin',
                'penjualan_kode' => 'PJL009',
                'penjualan_tanggal' => '2024-03-08 15:29:14',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 5,
                'pembeli' => 'Sheva Eka',
                'penjualan_kode' => 'PJL010',
                'penjualan_tanggal' => '2024-03-08 17:46:05',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
