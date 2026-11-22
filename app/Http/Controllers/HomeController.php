<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class HomeController extends Controller
{
    // Menampilkan halaman daftar wisata
    public function jelajahWisata()
    {
        $wisatas = Wisata::latest()->get();

        return view('wisata.index', compact('wisatas'));
    }
}