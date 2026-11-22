<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

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
    //
}
