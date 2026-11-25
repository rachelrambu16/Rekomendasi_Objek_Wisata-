<?php

namespace App\Services;

use App\Models\Wisata;
use App\Models\Preferensi;

class RecommendationService
{
    // Proses Knowledge-Based Filtering
    public function getRecommendations(Preferensi $preferensi)
    {
        // Mengambil ID kategori yang dipilih pengguna
        $kategoriIds = $preferensi->kategoris()->pluck('kategoris.id');

        // Mengambil suasana yang dipilih pengguna
        $suasanaPilihan = $preferensi->suasana ?? [];

        // Mengambil wisata sesuai kategori, lokasi, budget, dan suasana
        $wisatas = Wisata::with('kategoris')
            ->whereHas('kategoris', function ($query) use ($kategoriIds) {
                $query->whereIn('kategoris.id', $kategoriIds);
            })
            ->when($preferensi->lokasi, function ($query, $lokasi) {
                $query->where('lokasi', $lokasi);
            })
            ->where('harga_tiket', '<=', $preferensi->budget)
            ->when(!empty($suasanaPilihan), function ($query) use ($suasanaPilihan) {
                $query->where(function ($q) use ($suasanaPilihan) {
                    foreach ($suasanaPilihan as $suasana) {
                        $q->orWhereJsonContains('suasana', $suasana);
                    }
                });
            })
            ->orderBy('harga_tiket', 'asc')
            ->get();

        return $wisatas;
    }
}
