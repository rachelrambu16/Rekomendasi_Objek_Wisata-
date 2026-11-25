<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class HomeController extends Controller
{
    // Menampilkan halaman Jelajah Wisata
    public function jelajahWisata()
    {
        $wisatas = Wisata::with('kategoris')
            ->latest()
            ->get();

        return view('jelajah', compact('wisatas'));
    }
}
