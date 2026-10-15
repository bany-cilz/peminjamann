<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Inventaris | SIMLAB-RPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-4 md:p-8 max-w-3xl">
        <div class="bg-white p-6 md:p-8 rounded-lg shadow">
            <h1 class="text-2xl font-bold mb-6">Tambah Barang Baru</h1>
            
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <!-- Kode Barang -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Barang *</label>
                        <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" placeholder="Contoh: LAB-RPL-001" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('kode_barang') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori *</label>
                        <select name="kategori_id" class="w-full border rounded p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Nama Barang -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Barang *</label>
                    <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Contoh: Laptop HP ProBook" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nama_barang') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Spesifikasi -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Spesifikasi (Opsional)</label>
                    <textarea name="spesifikasi" rows="3" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('spesifikasi') }}</textarea>
                    @error('spesifikasi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- Stok -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Stok *</label>
                        <input type="number" name="stok" value="{{ old('stok', 0) }}" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('stok') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Kondisi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kondisi *</label>
                        <select name="kondisi" class="w-full border rounded p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('kondisi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Status *</label>
                        <select name="status" class="w-full border rounded p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                        @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end gap-3">
                    <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>