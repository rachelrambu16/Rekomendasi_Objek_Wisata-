<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable([
    'nama_kategori',
    'deskripsi',
])]
class Kategori extends Model
{
    // Relasi dengan tempat wisata
    public function wisatas(): BelongsToMany
    {
        return $this->belongsToMany(
            Wisata::class,
            'kategori_wisata',
            'kategori_id',
            'wisata_id'
        )->withTimestamps();
    }
}
