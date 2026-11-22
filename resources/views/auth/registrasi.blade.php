<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Jelajah Jogja</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        input {
            transition: all 0.2s ease;
        }
    </style>
</head>

<body class="min-h-screen bg-[#f0f9f7] flex items-center justify-center px-4 py-8">

    <main class="w-full max-w-5xl">

        <div class="bg-white rounded-[28px] shadow-[0_15px_50px_rgba(6,78,73,0.08)] border border-teal-100 overflow-hidden grid md:grid-cols-2">

            <!-- Bagian Gambar -->
            <div class="hidden md:block relative min-h-[700px]">

                <img
                    src="{{ asset('images/prambanan.jpg') }}"
                    alt="Candi Prambanan Yogyakarta"
                    class="absolute inset-0 w-full h-full object-cover">

                <div class="absolute inset-0 bg-gradient-to-t from-[#043f3b]/90 via-[#043f3b]/20 to-transparent"></div>

                <div class="absolute bottom-10 left-9 right-9 text-white">

                    <p class="text-teal-200 font-bold tracking-[3px] uppercase text-xs">
                        Explore Yogyakarta
                    </p>

                    <h1 class="text-4xl font-extrabold mt-4 leading-tight">
                        Mulai Petualanganmu Bersama Kami
                    </h1>

                    <p class="mt-4 text-sm leading-7 text-gray-100">
                        Temukan berbagai destinasi wisata menarik di Yogyakarta.
                    </p>

                </div>
            </div>

            <!-- Form Registrasi -->
            <div class="flex flex-col justify-center p-7 sm:p-10 md:p-12">

                <!-- Logo dan Beranda -->
                <div class="flex items-center justify-between mb-9">

                    <a href="/" class="flex items-center gap-2.5">
                        <div class="w-10 h-10 bg-[#064e49] rounded-xl flex items-center justify-center shadow-md shadow-teal-900/15">
                            <span class="text-white text-lg font-extrabold">J</span>
                        </div>

                        <span class="text-lg font-extrabold tracking-tight text-[#064e49]">
                            Jelajah Jogja<span class="text-teal-500">.</span>
                        </span>
                    </a>

                </div>

                <!-- Judul -->
                <div class="text-center mb-7">

                    <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                        Registrasi Akun
                    </h2>

                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">
                        Silakan buat akun untuk melihat berbagai rekomendasi wisata di Yogyakarta.
                    </p>

                </div>

                <!-- Pesan Kesalahan -->
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm mb-5">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ url('/registrasi') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Lengkap
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                            autocomplete="name"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-gray-800 outline-none focus:bg-white focus:border-teal-600 focus:ring-4 focus:ring-teal-500/10">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Alamat Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required
                            autocomplete="email"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-gray-800 outline-none focus:bg-white focus:border-teal-600 focus:ring-4 focus:ring-teal-500/10">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            required
                            autocomplete="new-password"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-gray-800 outline-none focus:bg-white focus:border-teal-600 focus:ring-4 focus:ring-teal-500/10">
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            Konfirmasi Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required
                            autocomplete="new-password"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-gray-800 outline-none focus:bg-white focus:border-teal-600 focus:ring-4 focus:ring-teal-500/10">
                    </div>

                    <!-- Tombol Registrasi -->
                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full bg-[#064e49] hover:bg-[#08776c] text-white font-bold py-3.5 rounded-xl shadow-lg shadow-teal-900/15 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                            Daftar Sekarang
                        </button>
                    </div>

                </form>

                <!-- Link Login -->
                <div class="mt-7 pt-6 border-t border-gray-100 text-center">

                    <p class="text-sm text-gray-500">
                        Sudah memiliki akun?
                        <a href="{{ route('login') }}" class="font-bold text-[#064e49] hover:text-teal-600 transition">
                            Login di sini
                        </a>
                    </p>

                </div>

            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 Jelajah Jogja. Jelajahi keindahan Yogyakarta.
        </p>

    </main>

</body>
</html>
