<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah Wisata - Jelajah Jogja</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f0f9f7] min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="/" class="text-xl font-extrabold text-[#064e49]">
                Jelajah Jogja<span class="text-teal-500">.</span>
            </a>

            <div class="flex items-center gap-6 text-sm font-semibold text-gray-600">
                <a href="/" class="hover:text-teal-700">Dashboard</a>
                <a href="{{ url('/jelajah-wisata') }}" class="text-teal-700">Jelajah Wisata</a>
                <a href="#" class="hover:text-teal-700">Rekomendasi</a>
                <a href="#" class="hover:text-teal-700">Riwayat</a>
            </div>

        </div>
    </nav>

    <!-- Header -->
    <section class="max-w-7xl mx-auto px-6 pt-12 pb-8">

        <p class="text-sm font-bold uppercase tracking-widest text-teal-600">
            Explore Yogyakarta
        </p>

        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mt-3">
            Jelajahi Wisata Yogyakarta
        </h1>

        <p class="text-gray-500 mt-3 max-w-2xl leading-relaxed">
            Temukan berbagai destinasi wisata menarik di Yogyakarta
            dan pilih tempat yang sesuai dengan keinginanmu.
        </p>

    </section>

    <!-- Daftar Wisata -->
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-800">
                Semua Destinasi Wisata
            </h2>

            <span class="text-sm text-gray-500">
                {{ $wisatas->count() }} Destinasi
            </span>
        </div>

        @if($wisatas->count() > 0)

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">

                @foreach($wisatas as $wisata)

                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">

                        <!-- Gambar Wisata -->
                        <div class="h-52 bg-gray-100 overflow-hidden">

                            @if($wisata->gambar)
                                <img
                                    src="{{ asset('storage/' . $wisata->gambar) }}"
                                    alt="{{ $wisata->nama_wisata }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    Belum ada gambar
                                </div>
                            @endif

                        </div>

                        <!-- Informasi Wisata -->
                        <div class="p-5">

                            <h3 class="text-lg font-bold text-gray-800">
                                {{ $wisata->nama_wisata }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                {{ $wisata->lokasi }}
                            </p>

                            <p class="text-sm text-gray-600 mt-3 leading-relaxed">
                                {{ Str::limit($wisata->deskripsi ?? 'Belum ada deskripsi wisata.', 100) }}
                            </p>

                            <div class="flex items-center justify-between mt-5 pt-4 border-t border-gray-100">

                                <div>
                                    <p class="text-xs text-gray-400">Harga Tiket</p>

                                    <p class="text-sm font-bold text-teal-700 mt-1">
                                        @if($wisata->harga_tiket == 0)
                                            Gratis
                                        @else
                                            Rp{{ number_format($wisata->harga_tiket, 0, ',', '.') }}
                                        @endif
                                    </p>
                                </div>

                                <a
                                    href="#"
                                    class="bg-[#064e49] hover:bg-[#08776c] text-white text-xs font-semibold px-4 py-2.5 rounded-lg transition">
                                    Lihat Detail
                                </a>

                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-2xl p-12 text-center shadow-sm">

                <h3 class="text-xl font-bold text-gray-700">
                    Belum Ada Data Wisata
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    Data destinasi wisata belum tersedia.
                </p>

            </div>

        @endif

    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 py-6">
        <p class="text-center text-xs text-gray-400">
            © 2026 Jelajah Jogja. Jelajahi keindahan Yogyakarta.
        </p>
    </footer>

</body>
</html>
