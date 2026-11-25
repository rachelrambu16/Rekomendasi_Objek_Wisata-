<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            'Wisata Alam',
            'Wisata Sejarah',
            'Wisata Budaya',
            'Wisata Kuliner',
            'Wisata Religi',
            'Wisata Edukasi',
        ];

        foreach ($kategoris as $kategori) {
            Kategori::firstOrCreate([
                'nama_kategori' => $kategori,
            ]);
        }
    }
}

