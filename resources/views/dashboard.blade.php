<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if(auth()->check() && auth()->user()->role === 'admin')
            Dashboard Admin - Jelajah Jogja
        @else
            Beranda Rekomendasi - Jelajah Jogja
        @endif
    </title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-bg {
            background:
                linear-gradient(105deg, rgba(4, 47, 46, 0.88) 0%, rgba(17, 94, 89, 0.65) 55%, rgba(4, 47, 46, 0.35) 100%),
                url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

@if (auth()->check() && auth()->user()->role === 'admin')

<body class="bg-slate-50 text-slate-800 min-h-screen">

    <div class="min-h-screen flex flex-col lg:flex-row">

        <!-- Sidebar Admin -->
        <aside class="w-full lg:w-72 bg-teal-950 text-white flex flex-col justify-between p-6 lg:min-h-screen">

            <div>

                <!-- Brand -->
                <div class="flex items-center justify-between lg:justify-start gap-3 pb-6 border-b border-teal-800/70">

                    <a href="/" class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-teal-500/20 border border-teal-400/30 flex items-center justify-center text-teal-300 font-extrabold text-lg">
                            J
                        </div>

                        <div>
                            <span class="block text-lg font-extrabold tracking-wide leading-none">
                                Jelajah Jogja
                            </span>

                            <span class="text-xs text-teal-300 font-medium">
                                Admin Workspace
                            </span>
                        </div>

                    </a>

                </div>

                <!-- Navigation Links -->
                <nav class="mt-7 space-y-2 text-sm font-medium">

                    <a href="{{ url('/dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl bg-teal-800/80 text-white shadow-sm">

                        <svg class="w-5 h-5 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>

                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.wisata.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-teal-100/80 hover:bg-teal-900 hover:text-white transition">

                        <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                        <span>Kelola Wisata</span>
                    </a>

                    <div class="flex items-center justify-between px-4 py-3 rounded-xl text-teal-300/50 cursor-not-allowed">

                        <div class="flex items-center gap-3">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>

                            <span>Kelola Kategori</span>

                        </div>

                        <span class="text-[10px] uppercase tracking-wider bg-teal-900 px-2 py-0.5 rounded-full text-teal-300">
                            Soon
                        </span>

                    </div>

                    <a href="/"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-teal-100/80 hover:bg-teal-900 hover:text-white transition">

                        <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>

                        <span>Lihat Halaman Utama</span>

                    </a>

                </nav>

            </div>

            <!-- Admin Profile & Logout -->
            <div class="mt-8 pt-6 border-t border-teal-800/70">

                <div class="flex items-center gap-3 mb-4">

                    <div class="w-10 h-10 rounded-full bg-teal-700 flex items-center justify-center font-bold text-sm text-white">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="min-w-0">

                        <p class="text-sm font-semibold text-white truncate">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-xs text-teal-300">
                            Administrator
                        </p>

                    </div>

                </div>

                <form action="{{ url('/logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-rose-600/90 hover:bg-rose-600 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition">

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>

                        <span>Logout</span>

                    </button>
                </form>

            </div>

        </aside>

        <!-- Main Content Admin -->
        <div class="flex-1 flex flex-col justify-between">

            <main class="max-w-6xl w-full mx-auto px-6 py-8 lg:py-10">

                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm">

                    <div>

                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wider text-teal-700 bg-teal-50 px-3 py-1 rounded-full">
                            Panel Kontrol
                        </span>

                        <h1 class="text-2xl lg:text-3xl font-bold text-slate-900 mt-2">
                            Dashboard Admin
                        </h1>

                        <p class="text-slate-500 text-sm mt-1">
                            Selamat datang kembali,
                            <span class="font-semibold text-slate-700">
                                {{ auth()->user()->name }}
                            </span>.
                            Kelola data destinasi &amp; kategori Jelajah Jogja.
                        </p>

                    </div>

                    <a href="{{ route('admin.wisata.index') }}"
                       class="inline-flex items-center justify-center gap-2 bg-teal-700 hover:bg-teal-800 text-white px-5 py-3 rounded-xl text-sm font-semibold shadow-sm transition shrink-0">

                        <span>+ Kelola Wisata</span>

                    </a>

                </div>

                <!-- Stat Cards -->
                <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-7">

                    <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Jumlah Tempat Wisata
                                </p>

                                <h2 class="text-4xl font-extrabold text-slate-900 mt-2">
                                    {{ $jumlahWisata }}
                                </h2>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-teal-50 text-teal-700 flex items-center justify-center">

                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>

                        </div>

                        <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-xs">

                            <span class="text-slate-400">
                                Destinasi terdaftar di Yogyakarta
                            </span>

                            <a href="{{ route('admin.wisata.index') }}" class="font-semibold text-teal-700 hover:underline">
                                Lihat detail &rarr;
                            </a>

                        </div>

                    </div>

                    <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Jumlah Kategori Wisata
                                </p>

                                <h2 class="text-4xl font-extrabold text-slate-900 mt-2">
                                    {{ $jumlahKategori }}
                                </h2>

                            </div>

                            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">

                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2-2v-2z" />
                                </svg>

                            </div>

                        </div>

                        <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-xs">

                            <span class="text-slate-400">
                                Klasifikasi jenis destinasi
                            </span>

                            <span class="font-medium text-amber-600">
                                Aktif
                            </span>

                        </div>

                    </div>

                </section>

                <!-- Management Cards -->
                <section class="mt-8">

                    <h2 class="text-lg font-bold text-slate-800 mb-4">
                        Pengelolaan Data
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm flex flex-col justify-between">

                            <div>

                                <div class="w-11 h-11 rounded-xl bg-teal-100 text-teal-800 flex items-center justify-center font-bold mb-4">
                                    W
                                </div>

                                <h3 class="text-lg font-bold text-slate-900">
                                    Kelola Wisata
                                </h3>

                                <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                                    Tambah, perbarui informasi, foto, lokasi, maupun hapus data tempat wisata di wilayah Daerah Istimewa Yogyakarta.
                                </p>

                            </div>

                            <div class="mt-6">

                                <a href="{{ route('admin.wisata.index') }}"
                                   class="inline-flex items-center justify-center bg-teal-700 hover:bg-teal-800 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition">
                                    Kelola Data Wisata
                                </a>

                            </div>

                        </div>

                        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm flex flex-col justify-between">

                            <div>

                                <div class="w-11 h-11 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center font-bold mb-4">
                                    K
                                </div>

                                <div class="flex items-center gap-2">

                                    <h3 class="text-lg font-bold text-slate-900">
                                        Kelola Kategori
                                    </h3>

                                    <span class="text-xs font-medium bg-amber-100 text-amber-800 px-2.5 py-0.5 rounded-full">
                                        Tahap Berikutnya
                                    </span>

                                </div>

                                <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                                    Atur kategori wisata seperti wisata alam, sejarah, budaya, dan kuliner untuk mempermudah pencarian pengguna.
                                </p>

                            </div>

                            <div class="mt-6">

                                <button type="button" disabled
                                    class="inline-flex items-center justify-center bg-slate-100 text-slate-400 px-5 py-2.5 rounded-xl text-sm font-semibold cursor-not-allowed">
                                    Segera Hadir
                                </button>

                            </div>

                        </div>

                    </div>

                </section>

            </main>

            <footer class="text-center text-xs text-slate-400 py-6 border-t border-slate-200/60">
                &copy; 2026 Jelajah Jogja. Panel Administrator.
            </footer>

        </div>

    </div>

</body>

@else

<body class="bg-[#eefbf8] text-slate-800 min-h-screen flex flex-col">

    <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <!-- Hero dan Navbar -->
        <div class="hero-bg rounded-[28px] shadow-xl p-6 sm:p-10 lg:p-12 text-white">

            <!-- Navbar User -->
            <nav class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-white/20">

                <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold tracking-wide">
                    <span class="text-teal-300">J</span>elajah Jogja
                </a>

                <div class="flex flex-wrap items-center gap-4 text-sm font-medium">

                    <a href="{{ route('dashboard') }}" class="text-teal-200 font-semibold">
                        Beranda Rekomendasi
                    </a>

                    <a href="{{ url('/jelajah-wisata') }}" class="text-white/85 hover:text-teal-200 transition">
                        Jelajah Wisata
                    </a>

                    <a href="{{ route('preferensi.create') }}" class="text-white/85 hover:text-teal-200 transition">
                        Ubah Preferensi
                    </a>

                    <a href="{{ route('rekomendasi.riwayat') }}" class="text-white/85 hover:text-teal-200 transition">
                        Riwayat
                    </a>

                </div>

                @auth
                <div class="flex items-center gap-3">

                    <span class="hidden sm:inline text-sm text-teal-100">
                        Halo,
                        <strong class="font-semibold text-white">
                            {{ auth()->user()->name }}
                        </strong>
                    </span>

                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                            class="bg-white/95 hover:bg-white text-teal-950 px-4 py-2 rounded-xl text-sm font-semibold shadow-sm transition">
                            Logout
                        </button>

                    </form>

                </div>
                @endauth

            </nav>

            <!-- Hero Copy -->
            <section class="py-12 lg:py-14 max-w-3xl">

                <span class="inline-flex items-center gap-2 bg-teal-500/20 border border-teal-300/30 text-teal-200 text-xs font-semibold uppercase tracking-widest px-3.5 py-1.5 rounded-full">
                    Rekomendasi Wisata Personal
                </span>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mt-5">
                    Temukan Wisata yang
                    <span class="text-teal-300">Sesuai Denganmu</span>
                </h1>

                <p class="mt-4 text-sm sm:text-base text-teal-50/90 leading-relaxed max-w-xl">
                    Jelajahi destinasi wisata Yogyakarta yang telah dicocokkan
                    dengan kategori, lokasi, anggaran, dan suasana perjalanan pilihanmu.
                </p>

                <div class="mt-7 flex flex-wrap items-center gap-3">

                    <a href="{{ url('/jelajah-wisata') }}"
                       class="bg-teal-400 hover:bg-teal-300 text-teal-950 font-bold text-sm px-6 py-3 rounded-xl transition shadow-md">
                        Jelajahi Semua Wisata
                    </a>

                </div>

            </section>

        </div>

        <!-- Hasil Rekomendasi -->
        <section class="mt-10">

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-6">

                <div>

                    <span class="text-xs font-bold uppercase tracking-widest text-teal-700">
                        Knowledge-Based Filtering
                    </span>

                    <h2 class="text-2xl font-extrabold text-slate-900 mt-2">
                        Rekomendasi Wisata Untukmu
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Destinasi yang memenuhi kriteria preferensi pilihanmu.
                    </p>

                </div>

                <span class="bg-teal-100 text-teal-800 px-4 py-2 rounded-full text-sm font-bold">
                    {{ $wisatas->count() }} Destinasi Ditemukan
                </span>

            </div>

            @if($wisatas->count() > 0)

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($wisatas as $wisata)

                        <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-lg transition">

                            <!-- Gambar Wisata -->
                            <div class="h-52 bg-slate-100 overflow-hidden">

                                @if($wisata->gambar)

                                    <img
                                        src="{{ asset('storage/' . $wisata->gambar) }}"
                                        alt="{{ $wisata->nama_wisata }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-300">

                                @else

                                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                                        Gambar belum tersedia
                                    </div>

                                @endif

                            </div>

                            <!-- Informasi Wisata -->
                            <div class="p-5">

                                <!-- Kategori -->
                                <div class="flex flex-wrap gap-2 mb-3">

                                    @foreach($wisata->kategoris as $kategori)

                                        <span class="text-xs font-semibold bg-teal-50 text-teal-700 px-3 py-1 rounded-full">
                                            {{ $kategori->nama_kategori }}
                                        </span>

                                    @endforeach

                                </div>

                                <!-- Nama Wisata -->
                                <h3 class="text-lg font-bold text-slate-900">
                                    {{ $wisata->nama_wisata }}
                                </h3>

                                <!-- Lokasi -->
                                <p class="text-sm text-slate-500 mt-2">
                                    <span class="font-medium">Lokasi:</span>
                                    {{ $wisata->lokasi }}
                                </p>

                                <!-- Suasana -->
                                <p class="text-sm text-slate-500 mt-1">
                                    <span class="font-medium">Suasana:</span>
                                    {{ is_array($wisata->suasana) ? implode(', ', $wisata->suasana) : $wisata->suasana }}
                                </p>

                                <!-- Harga -->
                                <div class="border-t border-slate-100 mt-4 pt-4 flex items-center justify-between gap-2">

                                    <div>

                                        <p class="text-xs text-slate-400">
                                            Harga tiket
                                        </p>

                                        <p class="text-base font-extrabold text-teal-700">

                                            @if((float) $wisata->harga_tiket <= 0)

                                                Gratis

                                            @else

                                                Rp{{ number_format((float) $wisata->harga_tiket, 0, ',', '.') }}

                                            @endif

                                        </p>

                                    </div>

                                    <span class="text-xs font-semibold bg-green-50 text-green-700 px-3 py-2 rounded-lg">
                                        Sesuai Preferensi
                                    </span>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                <!-- Jika Tidak Ada Rekomendasi -->
                <div class="bg-white border border-slate-200 rounded-2xl p-10 text-center shadow-sm">

                    <div class="text-5xl mb-4">
                        🔎
                    </div>

                    <h3 class="text-xl font-bold text-slate-900">
                        Belum Ada Wisata yang Cocok
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 max-w-lg mx-auto leading-relaxed">
                        Belum ditemukan destinasi wisata yang memenuhi kriteria preferensimu.
                        Coba ubah kategori, lokasi, budget, atau suasana wisata agar mendapatkan pilihan lainnya.
                    </p>

                    <a href="{{ route('preferensi.create') }}"
                       class="inline-block mt-6 bg-teal-700 hover:bg-teal-800 text-white px-6 py-3 rounded-xl text-sm font-semibold transition">
                        Ubah Preferensi
                    </a>

                </div>

            @endif

        </section>

    </div>

    <!-- Footer User -->
    <footer class="text-center text-xs sm:text-sm text-slate-500 py-8 mt-auto">
        &copy; 2026 Jelajah Jogja. Jelajahi Keindahan Yogyakarta.
    </footer>

</body>

@endif

</html>
