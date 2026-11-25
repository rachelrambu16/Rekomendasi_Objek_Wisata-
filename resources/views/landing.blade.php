
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah Jogja - Wisata Yogyakarta</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <nav class="flex items-center justify-between px-6 md:px-16 py-5 shadow-sm">
        <h1 class="text-2xl font-extrabold text-teal-700">
            Jelajah Jogja
        </h1>

        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}"
               class="px-5 py-2 text-teal-700 font-semibold hover:text-teal-900">
                Login
            </a>

            <a href="{{ route('registrasi') }}"
               class="px-5 py-2 bg-teal-700 text-white rounded-xl font-semibold hover:bg-teal-800">
                Daftar
            </a>
        </div>
    </nav>

    <!-- Hero -->
    <section class="px-6 md:px-16 py-20 md:py-28 bg-teal-50">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">

            <div>
                <span class="text-teal-700 font-bold text-sm">
                    JELAJAH WISATA YOGYAKARTA
                </span>

                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mt-4">
                    Temukan Wisata Jogja
                    <span class="text-teal-700">Sesuai Keinginanmu</span>
                </h2>

                <p class="text-gray-600 mt-6 leading-relaxed">
                    Temukan rekomendasi tempat wisata di Yogyakarta
                    berdasarkan kategori, lokasi, budget, dan suasana
                    yang kamu inginkan.
                </p>

                <a href="{{ route('login') }}"
                   class="inline-block mt-8 px-7 py-3 bg-teal-700 text-white rounded-xl font-bold hover:bg-teal-800">
                    Mulai Jelajahi
                </a>
            </div>

            <div>
                <img
                    src="https://images.unsplash.com/photo-1596402184320-417e7178b2cd?w=1000"
                    alt="Wisata Yogyakarta"
                    class="w-full h-80 object-cover rounded-3xl shadow-lg">
            </div>

        </div>
    </section>

    <!-- Fitur -->
    <section class="px-6 md:px-16 py-20">
        <div class="max-w-6xl mx-auto text-center">

            <h2 class="text-3xl font-extrabold">
                Jelajahi Wisata dengan Mudah
            </h2>

            <p class="text-gray-500 mt-3">
                Temukan tempat wisata sesuai kebutuhan dan preferensimu.
            </p>

            <div class="grid md:grid-cols-3 gap-6 mt-12 text-left">

                <div class="p-7 border rounded-2xl">
                    <h3 class="font-bold text-xl text-teal-700">
                        Rekomendasi Wisata
                    </h3>
                    <p class="text-gray-600 mt-3">
                        Dapatkan rekomendasi wisata berdasarkan preferensi
                        yang kamu pilih.
                    </p>
                </div>

                <div class="p-7 border rounded-2xl">
                    <h3 class="font-bold text-xl text-teal-700">
                        Jelajah Wisata
                    </h3>
                    <p class="text-gray-600 mt-3">
                        Lihat berbagai pilihan tempat wisata yang ada
                        di Yogyakarta.
                    </p>
                </div>

                <div class="p-7 border rounded-2xl">
                    <h3 class="font-bold text-xl text-teal-700">
                        Pencarian Wisata
                    </h3>
                    <p class="text-gray-600 mt-3">
                        Cari tempat wisata berdasarkan nama atau kata kunci.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6">
        <p class="text-sm">
            © {{ date('Y') }} Jelajah Jogja. Sistem Rekomendasi Wisata Yogyakarta.
        </p>
    </footer>

</body>
</html>
