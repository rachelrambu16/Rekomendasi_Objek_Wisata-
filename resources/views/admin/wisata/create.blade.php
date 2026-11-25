<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Wisata - Admin Jelajah Jogja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            Tambah Tempat Wisata
        </h1>

        <p class="text-gray-500 mb-6">
            Masukkan informasi tempat wisata Yogyakarta.
        </p>

        <!-- Form Tambah Wisata -->
        <form action="{{ route('admin.wisata.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-2">Nama Wisata</label>
                <input type="text" name="nama_wisata"
                    value="{{ old('nama_wisata') }}"
                    class="w-full border rounded-lg p-3"
                    placeholder="Contoh: Pantai Parangtritis">

                @error('nama_wisata')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border rounded-lg p-3"
                    placeholder="Masukkan deskripsi wisata">{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">Lokasi</label>
                <select name="lokasi" class="w-full border rounded-lg p-3">
                    <option value="">Pilih lokasi</option>
                    <option value="Kota Yogyakarta" {{ old('lokasi') == 'Kota Yogyakarta' ? 'selected' : '' }}>Kota Yogyakarta</option>
                    <option value="Sleman" {{ old('lokasi') == 'Sleman' ? 'selected' : '' }}>Sleman</option>
                    <option value="Bantul" {{ old('lokasi') == 'Bantul' ? 'selected' : '' }}>Bantul</option>
                    <option value="Gunungkidul" {{ old('lokasi') == 'Gunungkidul' ? 'selected' : '' }}>Gunungkidul</option>
                    <option value="Kulon Progo" {{ old('lokasi') == 'Kulon Progo' ? 'selected' : '' }}>Kulon Progo</option>
                </select>

                @error('lokasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">Alamat Lengkap</label>
                <textarea name="alamat" rows="2"
                    class="w-full border rounded-lg p-3"
                    placeholder="Masukkan alamat wisata">{{ old('alamat') }}</textarea>

                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
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

            <div class="mb-4">
                <label class="block font-semibold mb-2">Suasana Wisata</label>

                <div class="grid grid-cols-2 gap-3">
                    @foreach (['Tenang', 'Ramai', 'Sejuk', 'Alam Terbuka', 'Romantis', 'Instagramable'] as $suasana)
                        <label class="flex items-center gap-2">
                            <input type="checkbox"
                                name="suasana[]"
                                value="{{ $suasana }}"
                                {{ in_array($suasana, old('suasana', [])) ? 'checked' : '' }}>
                            {{ $suasana }}
                        </label>
                    @endforeach
                </div>

                @error('suasana')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">Jam Operasional</label>
                <input type="text" name="jam_operasional"
                    value="{{ old('jam_operasional') }}"
                    class="w-full border rounded-lg p-3"
                    placeholder="Contoh: 08.00 - 17.00 WIB">

                @error('jam_operasional')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">Gambar Wisata</label>
                <input type="file" name="gambar" accept="image/jpeg,image/png,image/webp"
                    class="w-full border rounded-lg p-3">

                <p class="text-gray-500 text-sm mt-1">
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </p>

                @error('gambar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-2">Kategori Wisata</label>

                <div class="grid grid-cols-2 gap-3">
                    @forelse ($kategoris as $kategori)
                        <label class="flex items-center gap-2">
                            <input type="checkbox"
                                name="kategori_ids[]"
                                value="{{ $kategori->id }}"
                                {{ in_array($kategori->id, old('kategori_ids', [])) ? 'checked' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </label>
                    @empty
                        <p class="text-red-500 col-span-2">
                            Belum ada kategori wisata. Tambahkan kategori terlebih dahulu.
                        </p>
                    @endforelse
                </div>

                @error('kategori_ids')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.wisata.index') }}"
                    class="px-5 py-3 rounded-lg bg-gray-200 text-gray-700">
                    Kembali
                </a>

                <button type="submit"
                    class="px-5 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                    Simpan Wisata
                </button>
            </div>

        </form>
    </div>

</body>
</html>
