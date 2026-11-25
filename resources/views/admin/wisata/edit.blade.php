<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wisata - Jelajah Jogja</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <nav class="bg-white shadow-sm px-8 py-5">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-extrabold text-teal-800">
                JELAJAH JOGJA
            </h1>

            <a href="{{ route('admin.wisata.index') }}"
               class="text-gray-600 hover:text-teal-700 font-semibold">
                Kembali
            </a>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-6 py-10">

        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-800">
                Edit Data Wisata
            </h2>

            <p class="text-gray-500 mt-2">
                Perbarui informasi tempat wisata Yogyakarta.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-8">

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6">
                    <p class="font-bold mb-2">Periksa kembali data berikut:</p>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.wisata.update', $wisata->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="space-y-6">

                    <!-- Nama Wisata -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">
                            Nama Wisata
                        </label>

                        <input type="text"
                               name="nama_wisata"
                               value="{{ old('nama_wisata', $wisata->nama_wisata) }}"
                               required
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-teal-500 outline-none">
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">
                            Deskripsi Wisata
                        </label>

                        <textarea name="deskripsi"
                                  rows="5"
                                  required
                                  class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-teal-500 outline-none">{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">
                            Lokasi
                        </label>

                        <select name="lokasi"
                                required
                                class="w-full border border-gray-300 rounded-xl px-4 py-3">

                            @foreach (['Kota Yogyakarta', 'Sleman', 'Bantul', 'Gunungkidul', 'Kulon Progo'] as $lokasi)
                                <option value="{{ $lokasi }}"
                                    @selected(old('lokasi', $wisata->lokasi) == $lokasi)>
                                    {{ $lokasi }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">
                            Alamat Lengkap
                        </label>

                        <textarea name="alamat"
                                  rows="3"
                                  required
                                  class="w-full border border-gray-300 rounded-xl px-4 py-3">{{ old('alamat', $wisata->alamat) }}</textarea>
                    </div>

                    <!-- Harga -->
                     <div>
                        <label class="block font-semibold text-gray-700 mb-2">
                            Harga Tiket (Rp)
                        </label>

                        <input type="text"
                            name="harga_tiket"
                            inputmode="numeric"
                            value="{{ old('harga_tiket', number_format($wisata->harga_tiket, 0, ',', '.')) }}"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            placeholder="Contoh: 15000"
                            required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                        <p class="text-sm text-gray-500 mt-2">
                            Masukkan angka tanpa titik, contoh: 15000.
                        </p>
                    </div>

                    <!-- Suasana -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-3">
                            Suasana Wisata
                        </label>

                        @php
                            $suasanaTerpilih = old('suasana', $wisata->suasana ?? []);
                        @endphp

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                            @foreach (['Tenang', 'Ramai', 'Sejuk', 'Alam Terbuka', 'Romantis', 'Instagramable'] as $suasana)
                                <label class="flex items-center gap-2 text-gray-700">
                                    <input type="checkbox"
                                           name="suasana[]"
                                           value="{{ $suasana }}"
                                           @checked(in_array($suasana, $suasanaTerpilih))
                                           class="w-4 h-4 accent-teal-700">

                                    {{ $suasana }}
                                </label>
                            @endforeach

                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">
                            Jam Operasional
                        </label>

                        <input type="text"
                               name="jam_operasional"
                               value="{{ old('jam_operasional', $wisata->jam_operasional) }}"
                               required
                               placeholder="Contoh: 08.00 - 17.00 WIB"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3">
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">
                            Gambar Wisata
                        </label>

                        @if ($wisata->gambar)
                            <div class="mb-4">
                                <p class="text-sm text-gray-500 mb-2">
                                    Gambar saat ini:
                                </p>

                                <img src="{{ asset('storage/' . $wisata->gambar) }}"
                                     alt="{{ $wisata->nama_wisata }}"
                                     class="w-48 h-32 object-cover rounded-xl">
                            </div>
                        @endif

                        <input type="file"
                               name="gambar"
                               accept=".jpg,.jpeg,.png,.webp"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3">

                        <p class="text-sm text-gray-500 mt-2">
                            Kosongkan jika tidak ingin mengganti gambar.
                        </p>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-3">
                            Kategori Wisata
                        </label>

                        @php
                            $kategoriTerpilih = old(
                                'kategori_ids',
                                $wisata->kategoris->pluck('id')->toArray()
                            );
                        @endphp

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                            @foreach ($kategoris as $kategori)
                                <label class="flex items-center gap-2 text-gray-700">
                                    <input type="checkbox"
                                           name="kategori_ids[]"
                                           value="{{ $kategori->id }}"
                                           @checked(in_array($kategori->id, $kategoriTerpilih))
                                           class="w-4 h-4 accent-teal-700">

                                    {{ $kategori->nama_kategori }}
                                </label>
                            @endforeach

                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-5">

                        <button type="submit"
                                class="bg-teal-700 hover:bg-teal-800 text-white px-7 py-3 rounded-xl font-bold">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.wisata.index') }}"
                           class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-7 py-3 rounded-xl font-bold text-center">
                            Batal
                        </a>

                    </div>

                </div>
            </form>
        </div>
    </main>

</body>
</html>
