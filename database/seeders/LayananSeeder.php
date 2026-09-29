<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_layanan'=> 'Cuci Lipat', 'harga' => 7000, 'satuan' => 'kg', 'estimasi' => 24],
            ['nama_layanan' => 'Cuci & Setrika', 'harga' => 12000, 'satuan' => 'kg', 'estimasi' => 24],
            ['nama_layanan' => 'Setrika Saja', 'harga' => 6000, 'satuan' => 'kg', 'estimasi' => 6],
            ['nama_layanan' => 'Cuci Bed Cover', 'harga' => 25000, 'satuan' => 'pcs', 'estimasi' => 48],
            ['nama_layanan' => 'Cuci Selimut & Gorden', 'harga' => 30000, 'satuan' => 'pcs', 'estimasi' => 48],
            ['nama_layanan' => 'Boneka & Tas', 'harga' => 15000, 'satuan' => 'pcs', 'estimasi' => 48],
        ];

        foreach ($data as $item) {
            Layanan::create([
                'nama_layanan' => $item['nama_layanan'],
                'harga' => $item['harga'],
                'satuan' => $item['satuan'],
                'estimasi' => $item['estimasi'],
                'keterangan' => null,
                'status' => 1,
            ]);
        }
    }
}
