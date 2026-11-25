<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Services\RecommendationService;

class AdminController extends Controller
{
    // Menampilkan Dashboard Admin dan Beranda Rekomendasi User
    public function dashboard(RecommendationService $recommendationService)
    {
        $user = auth()->user();

        // Jika pengguna adalah Admin
        if ($user->role === 'admin') {
            $jumlahWisata = Wisata::count();
            $jumlahKategori = Kategori::count();

            return view('dashboard', compact(
                'jumlahWisata',
                'jumlahKategori'
            ));
        }

        // Mengambil preferensi terakhir User
        $preferensi = $user->preferensis()
            ->with('kategoris')
            ->latest()
            ->first();

        // Jika User belum memiliki preferensi
        if (!$preferensi) {
            return redirect()->route('preferensi.create');
        }

        // Memproses rekomendasi menggunakan Knowledge-Based Filtering
        $wisatas = $recommendationService->getRecommendations($preferensi);

        return view('dashboard', compact('wisatas', 'preferensi'));
    }

    // Menampilkan daftar wisata untuk Admin
    public function kelolaWisata()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $wisatas = Wisata::with('kategoris')
            ->latest()
            ->get();

        return view('admin.wisata.index', compact('wisatas'));
    }

    // Menampilkan formulir tambah wisata
    public function tambahWisata()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $kategoris = Kategori::all();

        return view('admin.wisata.create', compact('kategoris'));
    }

    // Memproses penyimpanan wisata baru
    public function simpanWisata(Request $request)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $validated = $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'harga_tiket' => 'required|numeric|min:0',
            'suasana' => 'nullable|array',
            'suasana.*' => 'string',
            'jam_operasional' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori_ids' => 'required|array|min:1',
            'kategori_ids.*' => 'required|exists:kategoris,id',
        ]);

        // Mengunggah gambar jika tersedia
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('wisata', 'public');
        }

        // Menyimpan suasana sebagai array JSON
        $validated['suasana'] = $request->suasana ?? [];

        // Memisahkan ID kategori dari data wisata
        $kategoriIds = $validated['kategori_ids'];
        unset($validated['kategori_ids']);

        // Menyimpan data wisata
        $wisata = Wisata::create($validated);

        // Menghubungkan wisata dengan kategori
        $wisata->kategoris()->sync($kategoriIds);

        return redirect()->route('admin.wisata.index')
            ->with('success', 'Tempat wisata berhasil ditambahkan!');
    }

    // Menampilkan formulir edit wisata
    public function editWisata($id)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $wisata = Wisata::with('kategoris')->findOrFail($id);
        $kategoris = Kategori::all();

        return view('admin.wisata.edit', compact(
            'wisata',
            'kategoris'
        ));
    }

    // Memproses perubahan data wisata
    public function updateWisata(Request $request, $id)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $wisata = Wisata::findOrFail($id);

        $validated = $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'harga_tiket' => 'required|numeric|min:0',
            'suasana' => 'nullable|array',
            'suasana.*' => 'string',
            'jam_operasional' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori_ids' => 'required|array|min:1',
            'kategori_ids.*' => 'required|exists:kategoris,id',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('wisata', 'public');
        }

        $validated['suasana'] = $request->suasana ?? [];

        $kategoriIds = $validated['kategori_ids'];
        unset($validated['kategori_ids']);

        $wisata->update($validated);
        $wisata->kategoris()->sync($kategoriIds);

        return redirect()->route('admin.wisata.index')
            ->with('success', 'Data wisata berhasil diperbarui!');
    }

    // Menghapus data wisata
    public function hapusWisata($id)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $wisata = Wisata::findOrFail($id);

        $wisata->delete();

        return redirect()->route('admin.wisata.index')
            ->with('success', 'Data wisata berhasil dihapus!');
    }
}
