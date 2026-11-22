
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah Jogja - Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            background:
                linear-gradient(90deg, rgba(5, 49, 48, 0.75), rgba(5, 49, 48, 0.12)),
                url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-[#e9fbf8] min-h-screen">

    <div class="max-w-7xl mx-auto px-5 py-8">

        <main class="hero min-h-[580px] rounded-[28px] overflow-hidden shadow-xl px-8 md:px-16 py-8">

            <!-- Navbar -->
            <nav class="flex flex-wrap items-center justify-between gap-5 text-white">

                <a href="/" class="text-2xl font-extrabold tracking-wide">
                    <span class="text-teal-200">J</span>elajah Jogja
                </a>

                <div class="flex flex-wrap items-center gap-5 text-sm font-medium">
                    <a href="/" class="hover:text-teal-200">Dashboard</a>
                    <a href="{{ url('/jelajah-wisata') }}">Jelajah Wisata</a>
                    <a href="#" class="hover:text-teal-200">Rekomendasi</a>
                    <a href="#" class="hover:text-teal-200">Riwayat</a>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-sm">
                        Halo, {{ auth()->user()->name }}
                    </span>

                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-white text-teal-900 px-5 py-2 rounded-lg font-semibold hover:bg-teal-100">
                            Logout
                        </button>
                    </form>
                </div>

            </nav>

            <!-- Hero Content -->
            <section class="mt-24 md:mt-28 max-w-xl text-white">

                <p class="text-teal-200 font-semibold tracking-widest uppercase text-sm">
                    Explore Yogyakarta
                </p>

                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mt-4">
                    Temukan Destinasi Wisata Impianmu
                </h1>

                <p class="mt-5 text-sm md:text-base text-gray-100 leading-7">
                    Jelajahi keindahan Yogyakarta dan temukan tempat wisata
                    yang menjadi impianmu
                </p>

            </section>

            <!-- Search Preference -->
            <section class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mt-16">

                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    Temukan Rekomendasi Wisata
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Lokasi
                        </label>

                        <select class="w-full bg-gray-100 rounded-lg px-4 py-3 text-sm outline-none">
                            <option value="">Semua Lokasi</option>
                            <option>Kota Yogyakarta</option>
                            <option>Sleman</option>
                            <option>Bantul</option>
                            <option>Gunungkidul</option>
                            <option>Kulon Progo</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kategori Wisata
                        </label>

                        <select class="w-full bg-gray-100 rounded-lg px-4 py-3 text-sm outline-none">
                            <option value="">Semua Kategori</option>
                            <option>Wisata Alam</option>
                            <option>Wisata Sejarah</option>
                            <option>Wisata Budaya</option>
                            <option>Wisata Kuliner</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Suasana
                        </label>

                        <select class="w-full bg-gray-100 rounded-lg px-4 py-3 text-sm outline-none">
                            <option value="">Semua Suasana</option>
                            <option>Tenang</option>
                            <option>Sejuk</option>
                            <option>Alami</option>
                            <option>Ramai</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Anggaran Tiket
                        </label>

                        <select class="w-full bg-gray-100 rounded-lg px-4 py-3 text-sm outline-none">
                            <option value="">Semua Anggaran</option>
                            <option>Gratis</option>
                            <option>Di bawah Rp25.000</option>
                            <option>Rp25.000 - Rp50.000</option>
                            <option>Di atas Rp50.000</option>
                        </select>
                    </div>

                </div>

                <button type="button"
                    class="mt-6 w-full md:w-auto bg-[#064e49] hover:bg-[#08776c] text-white px-8 py-3 rounded-lg font-semibold transition">
                    Cari Rekomendasi Wisata
                </button>

            </section>

        </main>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500 py-6">
            © 2026 Jelajah Jogja. Jelajahi Keindahan Yogyakarta.
        </footer>

    </div>

</body>
</html>
