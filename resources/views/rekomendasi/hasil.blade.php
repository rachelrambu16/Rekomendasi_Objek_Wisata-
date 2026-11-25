<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi - Jelajah Jogja</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f0faf8] min-h-screen">

    <div class="max-w-7xl mx-auto px-5 py-8">

        <!-- Navbar -->
        <nav class="bg-white rounded-2xl shadow-sm border border-teal-50 px-6 py-5 flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-teal-900">
                <span class="text-teal-600">J</span>elajah Jogja
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('preferensi.create') }}"
                   class="bg-teal-50 text-teal-800 px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-teal-100 transition">
                    Ubah Preferensi
                </a>

                <a href="{{ route('dashboard') }}"
                class="bg-teal-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-teal-800 transition">
                    Dashboard
                </a>
            </div>
        </nav>

        <!-- Header -->
        <section class="mt-10 mb-8">
            <p class="text-teal-700 font-semibold text-sm tracking-widest uppercase">
                Knowledge-Based Filtering
            </p>

            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mt-3">
                Rekomendasi Wisata Untukmu
            </h1>

            <p class="text-gray-500 mt-3 leading-7">
                Berikut destinasi wisata Yogyakarta yang sesuai dengan
                preferensi yang telah kamu pilih.
            </p>

            <div class="mt-5 inline-flex items-center gap-2 bg-teal-100 text-teal-800 px-4 py-2 rounded-full text-sm font-semibold">
                ✨ {{ $wisatas->count() }} tempat wisata ditemukan
            </div>
        </section>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-200 text-green-800 p-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hasil -->
        @if ($wisatas->isEmpty())

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 text-center">
                <div class="text-6xl mb-5">🔎</div>

                <h2 class="text-2xl font-bold text-gray-800">
                    Belum Ada Wisata yang Cocok
                </h2>

                <p class="text-gray-500 mt-3 max-w-lg mx-auto leading-7">
                    Maaf, belum ditemukan tempat wisata yang sesuai dengan
                    pilihan kategori, lokasi, anggaran tiket, dan suasana kamu.
                    Coba ubah beberapa preferensi untuk mendapatkan hasil lainnya.
                </p>

                <a href="{{ route('preferensi.create') }}"
                   class="inline-block bg-teal-700 hover:bg-teal-800 text-white px-7 py-3 rounded-xl font-semibold mt-7 transition">
                    Ubah Preferensi
                </a>
            </div>

        @else

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">

                @foreach ($wisatas as $wisata)

                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-lg transition duration-300">

                        <!-- Gambar -->
                        @if ($wisata->gambar)
                            <img src="{{ asset('storage/' . $wisata->gambar) }}"
                                 alt="{{ $wisata->nama_wisata }}"
                                 class="w-full h-56 object-cover">
                        @else
                            <div class="w-full h-56 bg-teal-50 flex items-center justify-center text-teal-700">
                                <span class="text-5xl">🏞️</span>
                            </div>
                        @endif

                        <!-- Informasi -->
                        <div class="p-6">

                            <h2 class="text-xl font-bold text-gray-800">
                                {{ $wisata->nama_wisata }}
                            </h2>

                            <p class="text-sm text-gray-500 mt-2">
                                📍 {{ $wisata->lokasi }}
                            </p>

                            <div class="mt-4">
                                <p class="text-xs text-gray-400 font-semibold uppercase">
                                    Harga Tiket
                                </p>

                                <p class="text-xl font-extrabold text-teal-700 mt-1">
                                    @if ((float) $wisata->harga_tiket == 0)
                                        Gratis
                                    @else
                                        Rp{{ number_format((float) $wisata->harga_tiket, 0, ',', '.') }}
                                    @endif
                                </p>
                            </div>

                            <p class="text-gray-500 text-sm leading-7 mt-4">
                                {{ $wisata->deskripsi ?? 'Belum ada deskripsi wisata.' }}
                            </p>

                            <!-- Kategori -->
                            <div class="mt-5">
                                <p class="text-xs font-bold text-gray-700 mb-2">
                                    Kategori Wisata
                                </p>

                                <div class="flex flex-wrap gap-2">
                                    @forelse ($wisata->kategoris as $kategori)
                                        <span class="bg-teal-50 text-teal-800 px-3 py-1.5 rounded-full text-xs font-semibold">
                                            {{ $kategori->nama_kategori }}
                                        </span>
                                    @empty
                                        <span class="text-xs text-gray-400">
                                            Belum ada kategori
                                        </span>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Suasana -->
                            <div class="mt-4">
                                <p class="text-xs font-bold text-gray-700 mb-2">
                                    Suasana Wisata
                                </p>

                                <div class="flex flex-wrap gap-2">
                                    @forelse ($wisata->suasana ?? [] as $suasana)
                                        <span class="bg-amber-50 text-amber-700 px-3 py-1.5 rounded-full text-xs font-semibold">
                                            {{ $suasana }}
                                        </span>
                                    @empty
                                        <span class="text-xs text-gray-400">
                                            Belum ada informasi suasana
                                        </span>
                                    @endforelse
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

        @endif

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-400 py-10">
            © 2026 Jelajah Jogja. Jelajahi Keindahan Yogyakarta.
        </footer>

    </div>

</body>
</html>
