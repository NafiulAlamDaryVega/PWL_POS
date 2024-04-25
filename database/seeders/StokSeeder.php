<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 1,
                'barang_id' => 1,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-01 12:30:45',
                'stok_jumlah' => 21,
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-01 19:25:21',
                'stok_jumlah' => 17,
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-02 09:17:05',
                'stok_jumlah' => 34,
            ],
            [
                'stok_id' => 4,
                'barang_id' => 4,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-02 10:24:56',
                'stok_jumlah' => 41,
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-03 13:44:31',
                'stok_jumlah' => 13,
            ],
            [
                'stok_id' => 6,
                'barang_id' => 6,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-03 15:37:48',
                'stok_jumlah' => 26,
            ],
            [
                'stok_id' => 7,
                'barang_id' => 7,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-04 09:24:07',
                'stok_jumlah' => 38,
            ],
            [
                'stok_id' => 8,
                'barang_id' => 8,
                'user_id' => 4,
                'stok_tanggal' => '2024-03-04 17:42:33',
                'stok_jumlah' => 45,
            ],
            [
                'stok_id' => 9,
                'barang_id' => 9,
                'user_id' => 4,
                'stok_tanggal' => '2024-03-05 14:22:08',
                'stok_jumlah' => 49,
            ],
            [
                'stok_id' => 10,
                'barang_id' => 10,
                'user_id' => 4,
                'stok_tanggal' => '2024-03-05 16:36:37',
                'stok_jumlah' => 53,
            ],
        ];
        DB::table('t_stok')->insert($data);
    }
}
