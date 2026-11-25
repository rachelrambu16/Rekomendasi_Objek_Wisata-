<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Wisata - Jelajah Jogja</title>

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
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="{{ route('dashboard') }}" class="text-xl font-extrabold text-[#064e49]">
                Jelajah Jogja<span class="text-teal-500">.</span>
            </a>

            <div class="flex items-center gap-6 text-sm font-semibold text-gray-600">
                <a href="{{ route('dashboard') }}" class="hover:text-teal-700">
                    Dashboard
                </a>

                <span class="text-teal-700">
                    Kelola Wisata
                </span>

                <span class="text-gray-500">
                    Admin
                </span>
            </div>

        </div>
    </nav>

    <!-- Konten -->
    <main class="max-w-7xl mx-auto px-6 py-12">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>
                <p class="text-sm font-bold uppercase tracking-widest text-teal-600">
                    Admin Panel
                </p>

                <h1 class="text-3xl font-extrabold text-gray-800 mt-2">
                    Kelola Data Wisata
                </h1>

                <p class="text-gray-500 mt-2">
                    Tambah, lihat, ubah, dan hapus data destinasi wisata.
                </p>
            </div>

            <a href="{{ route('admin.wisata.create') }}"
        class="inline-block bg-teal-700 hover:bg-teal-800 text-white px-5 py-3 rounded-lg font-semibold">
            + Tambah Wisata
        </a>

        </div>

        <!-- Ringkasan -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-8">
            <p class="text-sm text-gray-500">Total Destinasi Wisata</p>

            <h2 class="text-3xl font-extrabold text-[#064e49] mt-2">
                {{ $wisatas->count() }}
            </h2>
        </div>

        <!-- Tabel Wisata -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-800">
                    Daftar Destinasi Wisata
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Data wisata yang tersimpan dalam database.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">

                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="px-6 py-4">No</th>
                            <th class="px-6 py-4">Nama Wisata</th>
                            <th class="px-6 py-4">Lokasi</th>
                            <th class="px-6 py-4">Harga Tiket</th>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($wisatas as $wisata)

                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-800">
                                    {{ $wisata->nama_wisata }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $wisata->lokasi }}
                                </td>

                                <td class="px-6 py-4">
                                    Rp{{ number_format($wisata->harga_tiket, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4">
                                    @forelse ($wisata->kategoris as $kategori)
                                        <span class="inline-block bg-teal-50 text-teal-700 px-2 py-1 rounded-md text-xs mr-1 mb-1">
                                            {{ $kategori->nama_kategori }}
                                        </span>
                                    @empty
                                        <span class="text-gray-400">
                                            Belum ada kategori
                                        </span>
                                    @endforelse
                                </td>

                                <td class="px-6 py-4">
    <div class="flex items-center gap-2">

        <!-- Tombol Edit -->
        <a href="{{ route('admin.wisata.edit', $wisata->id) }}"
           class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg font-semibold">
            Edit
        </a>

        <!-- Tombol Hapus -->
        <form action="{{ route('admin.wisata.destroy', $wisata->id) }}"
              method="POST"
              onsubmit="return confirm('Apakah kamu yakin ingin menghapus wisata ini?')">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold">
                Hapus
            </button>

        </form>

    </div>
</td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <p class="font-semibold text-gray-700">
                                        Belum Ada Data Wisata
                                    </p>

                                    <p class="text-gray-500 text-sm mt-2">
                                        Silakan tambahkan destinasi wisata.
                                    </p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 py-6 mt-10">
        <p class="text-center text-xs text-gray-400">
            © 2026 Jelajah Jogja. Admin Panel.
        </p>
    </footer>

</body>
</html>
