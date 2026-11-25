<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable([
    'nama_wisata',
    'deskripsi',
    'lokasi',
    'harga_tiket',
    'suasana',
    'alamat',
    'jam_operasional',
    'gambar',
])]
class Wisata extends Model
{
    // Relasi dengan kategori wisata
    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(
            Kategori::class,
            'kategori_wisata',
            'wisata_id',
            'kategori_id'
        )->withTimestamps();
    }

    // Mengubah suasana menjadi array
    protected function casts(): array
    {
        return [
            'suasana' => 'array',
            'harga_tiket' => 'decimal:2',
        ];
    }
}
