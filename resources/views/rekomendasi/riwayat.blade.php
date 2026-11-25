<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Rekomendasi - Jelajah Jogja</title>

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
                    <a href="{{ route('preferensi.create') }}" class="text-gray-600 hover:text-teal-700 transition">
                        Ubah Preferensi
                    </a>
                    <a href="{{ route('rekomendasi.riwayat') }}" class="text-teal-700 border-b-2 border-teal-700 pb-0.5">
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


    <!-- Konten Utama -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-14">

        <!-- Header Halaman -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-9">
            <div>
                <span class="text-xs font-bold tracking-widest text-teal-700 uppercase">
                    Catatan Pencarian
                </span>
                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 mt-1.5 tracking-tight">
                    Riwayat Rekomendasi
                </h1>
                <p class="text-gray-500 text-sm mt-1">
                    Lihat kembali hasil pencarian rekomendasi wisata yang pernah kamu lakukan.
                </p>
            </div>

         
        </div>


        <!-- Daftar Riwayat -->
        <div class="space-y-8">
            @forelse ($histories as $history)

                <section class="bg-white rounded-2xl border border-gray-200/80 shadow-xs p-6 sm:p-8">

                    <!-- Header Kartu Riwayat -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-5 mb-6 border-b border-gray-100">
                        <div class="flex items-center gap-3.5">
                            <span class="w-9 h-9 rounded-xl bg-teal-50 text-teal-700 border border-teal-100 text-sm font-extrabold flex items-center justify-center shrink-0">
                                #{{ $loop->iteration }}
                            </span>
                            <div>
                                <h2 class="text-lg font-extrabold text-gray-900">
                                    Pencarian Rekomendasi #{{ $loop->iteration }}
                                </h2>
                                <p class="text-xs font-medium text-gray-500 mt-0.5 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $history->created_at->format('d M Y, H:i') }}</span>
                                </p>
                            </div>
                        </div>

                        <span class="inline-flex items-center bg-teal-50 text-teal-700 border border-teal-100 px-3.5 py-1.5 rounded-full text-xs font-bold self-start sm:self-auto">
                            {{ $history->jumlah_hasil }} Wisata Ditemukan
                        </span>
                    </div>

                    <!-- Hasil Wisata -->
                    @if ($history->wisatas->isNotEmpty())

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                            @foreach ($history->wisatas as $wisata)

                                <article class="group bg-white rounded-xl border border-gray-200/80 hover:border-teal-600/40 hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col h-full">

                                    <!-- Gambar -->
                                    <div class="relative h-44 bg-gray-100 overflow-hidden shrink-0">
                                        @if ($wisata->gambar)
                                            <img
                                                src="{{ asset('storage/' . $wisata->gambar) }}"
                                                alt="{{ $wisata->nama_wisata }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gray-50">
                                                <svg class="w-9 h-9 text-gray-300 mb-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <span class="text-xs font-medium">Tidak ada gambar</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Informasi -->
                                    <div class="p-5 flex flex-col flex-grow">
                                        <h3 class="text-base font-extrabold text-gray-900 group-hover:text-teal-700 transition-colors leading-snug mb-1.5">
                                            {{ $wisata->nama_wisata }}
                                        </h3>

                                        <p class="text-xs font-medium text-gray-500 mb-4 flex items-start gap-1.5">
                                            <svg class="w-3.5 h-3.5 text-teal-700 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="line-clamp-1">{{ $wisata->lokasi ?? 'Lokasi belum tersedia' }}</span>
                                        </p>

                                        <div class="mt-auto pt-3 border-t border-gray-100 flex items-center justify-between">
                                            <span class="text-xs text-gray-400">Harga Tiket</span>
                                            <span class="text-sm font-extrabold text-teal-700">
                                                @if ($wisata->harga_tiket == 0)
                                                    Gratis
                                                @else
                                                    Rp{{ number_format($wisata->harga_tiket, 0, ',', '.') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                </article>

                            @endforeach

                        </div>

                    @else

                        <div class="bg-gray-50 border border-gray-200/70 rounded-xl py-8 px-4 text-center">
                            <p class="text-gray-500 text-sm">
                                Tidak ada tempat wisata yang cocok dengan preferensi pada pencarian ini.
                            </p>
                        </div>

                    @endif

                </section>

            @empty

                <!-- Empty State -->
                <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs py-16 px-6 text-center max-w-xl mx-auto">
                    <div class="w-14 h-14 bg-teal-50 text-teal-700 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    <h2 class="text-xl font-extrabold text-gray-900 mb-2">
                        Belum Ada Riwayat Rekomendasi
                    </h2>

                    <p class="text-sm text-gray-500 max-w-md mx-auto leading-relaxed mb-6">
                        Kamu belum pernah melakukan pencarian rekomendasi wisata.
                        Mulai tentukan preferensimu untuk menemukan destinasi terbaik.
                    </p>

                    <a href="{{ route('preferensi.create') }}"
                       class="inline-flex items-center gap-2 bg-teal-700 hover:bg-teal-800 text-white text-sm font-bold px-6 py-3 rounded-xl transition">
                        <span>Mulai Cari Rekomendasi</span>
                        <span>→</span>
                    </a>
                </div>

            @endforelse
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