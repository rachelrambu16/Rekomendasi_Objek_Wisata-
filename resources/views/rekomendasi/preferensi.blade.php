<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferensi Wisata - Jelajah Jogja</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    },
                    colors: {
                        teal: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col text-gray-800 selection:bg-teal-100 selection:text-teal-900">

    @php
        $kategoriTerpilih = old(
            'kategori_ids',
            $preferensi?->kategoris->pluck('id')->all() ?? []
        );

        $suasanaTerpilih = old(
            'suasana',
            $preferensi?->suasana ?? []
        );

        $lokasiTerpilih = old('lokasi', $preferensi?->lokasi ?? '');

        $budgetTerpilih = old(
            'budget',
            $preferensi ? (int) $preferensi->budget : 20000
        );
    @endphp

    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur-md border-b border-gray-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between h-18 py-3 gap-4">

                <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 group">
                    <div class="w-9 h-9 rounded-xl bg-teal-700 text-white flex items-center justify-center group-hover:bg-teal-800 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-extrabold text-teal-700 tracking-tight">
                        Jelajah Jogja
                    </span>
                </a>

                <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm font-semibold">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-teal-700 transition">
                        Dashboard
                    </a>
                    <a href="{{ route('wisata.index') }}" class="text-gray-600 hover:text-teal-700 transition">
                        Jelajah Wisata
                    </a>
                    <a href="{{ route('preferensi.create') }}" class="text-teal-700 border-b-2 border-teal-700 pb-0.5">
                        Ubah Preferensi
                    </a>
                    <a href="{{ route('rekomendasi.riwayat') }}" class="text-gray-600 hover:text-teal-700 transition">
                        Riwayat
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-teal-700 hover:bg-teal-800 text-white px-4 py-2 rounded-xl transition cursor-pointer">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </nav>


    <!-- Form Preferensi -->
    <main class="flex-grow max-w-3xl w-full mx-auto px-4 sm:px-6 py-12 md:py-14">

        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs p-6 sm:p-10">

            <div class="text-center max-w-xl mx-auto mb-9">
                <span class="inline-block text-xs font-bold tracking-widest text-teal-700 uppercase mb-2">
                    Personalisasi Perjalanan
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mb-2.5">
                    Temukan Wisata Favoritmu
                </h1>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Pilih kebutuhan dan preferensi wisata untuk mendapatkan rekomendasi
                    tempat wisata di Yogyakarta yang paling sesuai.
                </p>
            </div>

            <form action="{{ route('preferensi.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- 1. Kategori Wisata -->
                <div>
                    <div class="flex items-center gap-2.5 mb-3.5">
                        <span class="w-6 h-6 rounded-full bg-teal-50 text-teal-700 border border-teal-100 text-xs font-extrabold flex items-center justify-center">
                            1
                        </span>
                        <h2 class="text-base font-extrabold text-gray-900">
                            Kategori Wisata
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @forelse ($kategoris as $kategori)
                            <label class="relative flex items-center gap-3 border border-gray-200 rounded-xl p-3.5 cursor-pointer hover:border-teal-600 hover:bg-teal-50/50 transition has-[:checked]:border-teal-700 has-[:checked]:bg-teal-50/80">
                                <input
                                    type="checkbox"
                                    name="kategori_ids[]"
                                    value="{{ $kategori->id }}"
                                    class="w-4 h-4 rounded border-gray-300 text-teal-700 focus:ring-teal-600 accent-teal-700 cursor-pointer"
                                    {{ in_array($kategori->id, $kategoriTerpilih) ? 'checked' : '' }}
                                >
                                <span class="text-sm font-semibold text-gray-700">
                                    {{ $kategori->nama_kategori }}
                                </span>
                            </label>
                        @empty
                            <p class="text-sm text-gray-500 bg-gray-50 border border-gray-200 rounded-xl p-4 col-span-full text-center">
                                Belum ada kategori wisata yang tersedia.
                            </p>
                        @endforelse
                    </div>
                </div>

                <!-- 2. Lokasi -->
                <div class="pt-6 border-t border-gray-100">
                    <div class="flex items-center gap-2.5 mb-3.5">
                        <span class="w-6 h-6 rounded-full bg-teal-50 text-teal-700 border border-teal-100 text-xs font-extrabold flex items-center justify-center">
                            2
                        </span>
                        <label for="lokasi" class="text-base font-extrabold text-gray-900">
                            Lokasi Wisata
                        </label>
                    </div>

                    <select id="lokasi" name="lokasi"
                        class="w-full bg-white border border-gray-200 hover:border-gray-300 rounded-xl px-4 py-3 text-sm font-medium text-gray-700 focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-700/15 transition">
                        <option value="" {{ $lokasiTerpilih == '' ? 'selected' : '' }}>
                            Semua Lokasi
                        </option>
                        <option value="Kota Yogyakarta" {{ $lokasiTerpilih == 'Kota Yogyakarta' ? 'selected' : '' }}>
                            Kota Yogyakarta
                        </option>
                        <option value="Sleman" {{ $lokasiTerpilih == 'Sleman' ? 'selected' : '' }}>
                            Sleman
                        </option>
                        <option value="Bantul" {{ $lokasiTerpilih == 'Bantul' ? 'selected' : '' }}>
                            Bantul
                        </option>
                        <option value="Gunungkidul" {{ $lokasiTerpilih == 'Gunungkidul' ? 'selected' : '' }}>
                            Gunungkidul
                        </option>
                        <option value="Kulon Progo" {{ $lokasiTerpilih == 'Kulon Progo' ? 'selected' : '' }}>
                            Kulon Progo
                        </option>
                    </select>
                </div>

                <!-- 3. Budget -->
                <div class="pt-6 border-t border-gray-100">
                    <div class="flex items-center gap-2.5 mb-3.5">
                        <span class="w-6 h-6 rounded-full bg-teal-50 text-teal-700 border border-teal-100 text-xs font-extrabold flex items-center justify-center">
                            3
                        </span>
                        <label for="budget" class="text-base font-extrabold text-gray-900">
                            Anggaran Tiket Masuk
                        </label>
                    </div>

                    <select id="budget" name="budget"
                        class="w-full bg-white border border-gray-200 hover:border-gray-300 rounded-xl px-4 py-3 text-sm font-medium text-gray-700 focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-700/15 transition">
                        <option value="20000" {{ $budgetTerpilih == 20000 ? 'selected' : '' }}>
                            Maksimal Rp20.000
                        </option>
                        <option value="50000" {{ $budgetTerpilih == 50000 ? 'selected' : '' }}>
                            Maksimal Rp50.000
                        </option>
                        <option value="100000" {{ $budgetTerpilih == 100000 ? 'selected' : '' }}>
                            Maksimal Rp100.000
                        </option>
                        <option value="999999999" {{ $budgetTerpilih == 999999999 ? 'selected' : '' }}>
                            Di atas Rp100.000
                        </option>
                    </select>
                </div>

                <!-- 4. Suasana -->
                <div class="pt-6 border-t border-gray-100">
                    <div class="flex items-center gap-2.5 mb-3.5">
                        <span class="w-6 h-6 rounded-full bg-teal-50 text-teal-700 border border-teal-100 text-xs font-extrabold flex items-center justify-center">
                            4
                        </span>
                        <h2 class="text-base font-extrabold text-gray-900">
                            Suasana Wisata
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach ([
                            'Tenang',
                            'Ramai',
                            'Sejuk',
                            'Alam Terbuka',
                            'Romantis',
                            'Instagramable'
                        ] as $suasana)
                            <label class="relative flex items-center gap-3 border border-gray-200 rounded-xl p-3.5 cursor-pointer hover:border-teal-600 hover:bg-teal-50/50 transition has-[:checked]:border-teal-700 has-[:checked]:bg-teal-50/80">
                                <input
                                    type="checkbox"
                                    name="suasana[]"
                                    value="{{ $suasana }}"
                                    class="w-4 h-4 rounded border-gray-300 text-teal-700 focus:ring-teal-600 accent-teal-700 cursor-pointer"
                                    {{ in_array($suasana, $suasanaTerpilih) ? 'checked' : '' }}
                                >
                                <span class="text-sm font-semibold text-gray-700">{{ $suasana }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 bg-teal-700 hover:bg-teal-800 active:scale-[0.99] text-white font-bold py-3.5 px-6 rounded-xl shadow-sm transition cursor-pointer">
                        <span>Cari Rekomendasi</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>

            </form>

        </div>

    </main>


    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <h3 class="text-lg font-extrabold text-white mb-1.5">
                Jelajah Jogja
            </h3>
            <p class="text-sm text-gray-400 mb-5">
                Temukan dan jelajahi keindahan wisata Yogyakarta.
            </p>
            <div class="border-t border-gray-800 pt-5 text-xs text-gray-500">
                © {{ date('Y') }} Jelajah Jogja. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>