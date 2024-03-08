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
                'barang_nama' => 'Realme C53 (6/128)',
                'harga_beli' => 1899000,
                'harga_jual' => 1999000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'ELK002',
                'barang_nama' => 'Vivo Y17s (4/128)',
                'harga_beli' => 1599000,
                'harga_jual' => 1699000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'PKN001',
                'barang_nama' => 'Erigo X T-Shirt Strelitzia Black Unisex',
                'harga_beli' => 91000,
                'harga_jual' => 110000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'PKN002',
                'barang_nama' => 'JINISO Highwaist Baggy Jeans 503 GET LOW',
                'harga_beli' => 188000,
                'harga_jual' => 225000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'OTO001',
                'barang_nama' => 'Cargloss YRH Hijab Retro Helm Half Face',
                'harga_beli' => 287000,
                'harga_jual' => 305000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'OTO002',
                'barang_nama' => 'Shell Advance AX7 Scooter 10W-30 (0.8L) Oli Motor',
                'harga_beli' => 60000,
                'harga_jual' => 80000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'RMH001',
                'barang_nama' => 'PXTON Sapu Magic Korea',
                'harga_beli' => 7900,
                'harga_jual' => 13000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'RMH002',
                'barang_nama' => 'Halu Tempat Sampah Multifungsi Bentuk Persegi Kapasitas Besar',
                'harga_beli' => 19300,
                'harga_jual' => 26500,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'MKN001',
                'barang_nama' => 'Ultra Milk Susu UHT Full Cream 1L',
                'harga_beli' => 18500,
                'harga_jual' => 21400,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'MKN002',
                'barang_nama' => 'Good Time Double Choc Chocochips Cookies 72gr',
                'harga_beli' => 9600,
                'harga_jual' => 14200,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
