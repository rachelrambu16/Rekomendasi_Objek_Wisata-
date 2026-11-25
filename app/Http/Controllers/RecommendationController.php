<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Services\RecommendationService;
use App\Models\RekomendasiHistory;

class RecommendationController extends Controller
{
    // Menampilkan formulir preferensi wisata
  public function showPreferensi()
{
    $kategoris = Kategori::all();

    // Mengambil preferensi terakhir milik pengguna
    $preferensi = auth()->user()
        ->preferensis()
        ->with('kategoris')
        ->latest()
        ->first();

    return view('rekomendasi.preferensi', compact(
        'kategoris',
        'preferensi'
    ));
}

    // Menyimpan preferensi pengguna
   // Menyimpan preferensi dan riwayat rekomendasi
public function simpanPreferensi(
    Request $request,
    RecommendationService $recommendationService
) {
    $request->validate([
        'kategori_ids' => 'required|array|min:1',
        'kategori_ids.*' => 'required|exists:kategoris,id',
        'lokasi' => 'nullable|string',
        'budget' => 'required|numeric|min:0',
        'suasana' => 'nullable|array',
        'suasana.*' => 'string',
    ]);

    // Mengambil preferensi terakhir milik pengguna
    $preferensi = auth()->user()
        ->preferensis()
        ->latest()
        ->firstOrNew();

    // Memperbarui data preferensi
    $preferensi->lokasi = $request->lokasi;
    $preferensi->budget = $request->budget;
    $preferensi->suasana = $request->suasana ?? [];

    $preferensi->save();

    // Memperbarui kategori yang dipilih
    $preferensi->kategoris()->sync($request->kategori_ids);

    // Memproses hasil rekomendasi
    $wisatas = $recommendationService->getRecommendations($preferensi);

    // Menyimpan riwayat pencarian
    $history = auth()->user()->rekomendasiHistories()->create([
        'preferensi_id' => $preferensi->id,
        'jumlah_hasil' => $wisatas->count(),
    ]);

    // Menghubungkan riwayat dengan wisata yang direkomendasikan
    $history->wisatas()->sync($wisatas->modelKeys());

    return redirect()->route('rekomendasi.hasil')
        ->with('success', 'Preferensi berhasil disimpan dan rekomendasi berhasil diproses!');
}

    // Menampilkan hasil rekomendasi wisata
    public function hasilRekomendasi(RecommendationService $recommendationService)
    {
        // Mengambil preferensi terbaru milik pengguna
        $preferensi = auth()->user()
            ->preferensis()
            ->latest()
            ->first();

        // Jika preferensi belum tersedia
        if (!$preferensi) {
            return redirect()->route('preferensi.create');
        }

        // Memproses rekomendasi berdasarkan preferensi
        $wisatas = $recommendationService->getRecommendations($preferensi);

        // Menampilkan halaman hasil rekomendasi
        return view('rekomendasi.hasil', compact('wisatas'));
    }
    // Menampilkan riwayat rekomendasi pengguna
// Menampilkan riwayat rekomendasi pengguna
public function riwayatRekomendasi()
{
    $histories = auth()->user()
        ->rekomendasiHistories()
        ->with('wisatas')
        ->latest()
        ->get();

    return view('rekomendasi.riwayat', compact('histories'));
}

}
