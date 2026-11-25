<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jelajah Jogja</title>

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

    <main class="w-full max-w-md">

        <div class="bg-white rounded-[28px] border border-teal-100 shadow-[0_15px_50px_rgba(6,78,73,0.08)] p-7 sm:p-10">

            <!-- Logo  -->
            <div class="flex items-center justify-between mb-10">

                <a href="/" class="flex items-center gap-2.5">
                    <div class="w-10 h-10 bg-[#064e49] rounded-xl flex items-center justify-center shadow-md shadow-teal-900/15">
                        <span class="text-white text-lg font-extrabold">J</span>
                    </div>

                    <span class="text-lg font-extrabold tracking-tight text-[#064e49]">
                        Jelajah Jogja<span class="text-teal-500">.</span>
                    </span>
                </a>

            </div>

            <!-- Judul Login -->
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                    Login Akun
                </h1>

                <p class="text-sm text-gray-500 mt-3 leading-relaxed">
                    Silakan masuk untuk melihat berbagai rekomendasi wisata di Yogyakarta.
                </p>
            </div>

            <!-- Notifikasi Berhasil -->
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Notifikasi Kesalahan -->
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm mb-5">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form Login -->
            <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Alamat Email
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required
                            autocomplete="email"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-12 pr-4 py-3.5 text-sm text-gray-800 outline-none focus:bg-white focus:border-teal-600 focus:ring-4 focus:ring-teal-500/10">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-12 pr-12 py-3.5 text-sm text-gray-800 outline-none focus:bg-white focus:border-teal-600 focus:ring-4 focus:ring-teal-500/10">

                        <button
                            type="button"
                            onclick="togglePassword()"
                            aria-label="Tampilkan atau sembunyikan password"
                            class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-teal-700 transition">

                            <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Tombol Login -->
                <div class="pt-2">
                    <button
                        type="submit"
                        class="w-full bg-[#064e49] hover:bg-[#08776c] text-white font-bold py-3.5 rounded-xl shadow-lg shadow-teal-900/15 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">

                        Masuk Sekarang
                    </button>
                </div>

            </form>

            <!-- Registrasi -->
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    Belum memiliki akun?
                    <a href="{{ route('registrasi') }}" class="font-bold text-[#064e49] hover:text-teal-600 transition">
                        Daftar sekarang
                    </a>
                </p>
            </div>

        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 Jelajah Jogja. Jelajahi keindahan Yogyakarta.
        </p>

    </main>

    <!-- Script Tampilkan Password -->
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.style.opacity = '0.5';
            } else {
                input.type = 'password';
                icon.style.opacity = '1';
            }
        }
    </script>

</body>
</html>
