<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable([
    'user_id',
    'lokasi',
    'budget',
    'suasana',
])]
class Preferensi extends Model
{
    // Mengubah suasana JSON menjadi array
    protected function casts(): array
    {
        return [
            'suasana' => 'array',
            'budget' => 'decimal:2',
        ];
    }

    // Relasi dengan akun pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan kategori wisata
    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(
            Kategori::class,
            'preferensi_kategori',
            'preferensi_id',
            'kategori_id'
        )->withTimestamps();
    }
}
