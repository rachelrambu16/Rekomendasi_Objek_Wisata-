<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable([
    'user_id',
    'preferensi_id',
    'jumlah_hasil',
])]
class RekomendasiHistory extends Model
{
    // Relasi dengan pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan preferensi
    public function preferensi(): BelongsTo
    {
        return $this->belongsTo(Preferensi::class);
    }

    // Relasi dengan tempat wisata melalui tabel perantara
    public function wisatas(): BelongsToMany
    {
        return $this->belongsToMany(
            Wisata::class,
            'rekomendasi_history_items',
            'history_id',
            'wisata_id'
        )->withTimestamps();
    }
}
