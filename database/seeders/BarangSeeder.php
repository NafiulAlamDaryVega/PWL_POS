<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'ELK001',
                'barang_nama' => 'Lampu Neon',
                'harga_beli' => 35000,
                'harga_jual' => 60000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'ELK002',
                'barang_nama' => 'Kipas Angin',
                'harga_beli' => 300000,
                'harga_jual' => 420000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'PKN001',
                'barang_nama' => 'Kemeja Flannel',
                'harga_beli' => 70000,
                'harga_jual' => 110000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'PKN002',
                'barang_nama' => 'Kaos Distro',
                'harga_beli' => 90000,
                'harga_jual' => 120000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'ART001',
                'barang_nama' => 'Sapu Jagad',
                'harga_beli' => 12000,
                'harga_jual' => 20000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'ART002',
                'barang_nama' => 'Kemoceng Bulu Ayam',
                'harga_beli' => 10000,
                'harga_jual' => 17000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'MKN001',
                'barang_nama' => 'Biskuit Roma Kelapa',
                'harga_beli' => 7000,
                'harga_jual' => 12000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'MKN002',
                'barang_nama' => 'Tango Vanilla',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'MNM001',
                'barang_nama' => 'Susu Ultra Milk',
                'harga_beli' => 15000,
                'harga_jual' => 21000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'MNM002',
                'barang_nama' => 'Sprite',
                'harga_beli' => 5000,
                'harga_jual' => 10000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
