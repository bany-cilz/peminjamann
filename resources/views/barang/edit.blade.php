<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMLAB-RPL — Edit Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-comic { font-family: 'Fredoka', cursive; }
    </style>
</head>
<body class="bg-[#fef08a] text-black min-h-screen flex flex-col antialiased p-4 md:p-8">

    <div class="max-w-3xl mx-auto w-full flex-1 flex flex-col gap-6">
        
        <!-- Header -->
        <header class="bg-white border-3 border-black p-4 rounded-lg shadow-[4px_4px_0px_0px_#000] flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="bg-yellow-400 border-3 border-black px-3 py-1 rounded-md font-comic text-lg font-bold shadow-[2px_2px_0px_0px_#000]">
                    ⚡ SIMLAB!
                </div>
                <div>
                    <h1 class="font-comic text-xl font-bold tracking-wide uppercase">SIMLAB-RPL</h1>
                    <p class="text-xs font-bold text-slate-700">Sistem Inventaris Lab RPL</p>
                </div>
            </div>

            <nav class="flex gap-2">
                <a href="{{ route('dashboard') }}" class="font-comic px-4 py-2 bg-white text-black border-3 border-black font-bold text-xs rounded-md shadow-[2px_2px_0px_0px_#000] hover:bg-yellow-200 transition-colors">
                    📊 Dashboard
                </a>
                <a href="{{ route('barang.index') }}" class="font-comic px-4 py-2 bg-white text-black border-3 border-black font-bold text-xs rounded-md shadow-[2px_2px_0px_0px_#000] hover:bg-yellow-200 transition-colors">
                    📦 Data Barang
                </a>
            </nav>
        </header>

        <!-- Form Card -->
        <div class="bg-white border-3 border-black p-6 rounded-lg shadow-[5px_5px_0px_0px_#000]">
            
            <div class="bg-yellow-300 border-3 border-black p-4 rounded-md shadow-[2px_2px_0px_0px_#000] mb-5">
                <h2 class="font-comic text-lg font-bold uppercase tracking-wide">🛠 UBAH DATA BARANG</h2>
                <p class="text-xs font-bold text-slate-800">Perbarui rincian informasi untuk item: <strong>{{ $barang->nama_barang }}</strong></p>
            </div>

            <form action="{{ route('barang.update', $barang->id) }}" method="POST" class="space-y-4 text-xs font-bold">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="font-comic text-xs font-bold block mb-1 uppercase">Kode Barang *</label>
                        <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" 
                               class="w-full bg-slate-50 border-3 border-black rounded-md p-2.5 font-bold focus:outline-none focus:bg-yellow-100 focus:shadow-[2px_2px_0px_0px_#000] transition-all">
                        @error('kode_barang')
                            <p class="font-comic text-[11px] text-black bg-rose-300 border-2 border-black px-2 py-0.5 rounded-md mt-1 shadow-[1px_1px_0px_0px_#000]">
                                ⚠️ {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="font-comic text-xs font-bold block mb-1 uppercase">Kategori *</label>
                        <select name="kategori_id" 
                                class="w-full bg-slate-50 border-3 border-black rounded-md p-2.5 font-bold focus:outline-none focus:bg-yellow-100 focus:shadow-[2px_2px_0px_0px_#000] transition-all">
                            @foreach($kategoris as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id', $barang->kategori_id) == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="font-comic text-[11px] text-black bg-rose-300 border-2 border-black px-2 py-0.5 rounded-md mt-1 shadow-[1px_1px_0px_0px_#000]">
                                ⚠️ {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="font-comic text-xs font-bold block mb-1 uppercase">Nama Barang *</label>
                    <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" 
                           class="w-full bg-slate-50 border-3 border-black rounded-md p-2.5 font-bold focus:outline-none focus:bg-yellow-100 focus:shadow-[2px_2px_0px_0px_#000] transition-all">
                    @error('nama_barang')
                        <p class="font-comic text-[11px] text-black bg-rose-300 border-2 border-black px-2 py-0.5 rounded-md mt-1 shadow-[1px_1px_0px_0px_#000]">
                            ⚠️ {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="font-comic text-xs font-bold block mb-1 uppercase">Spesifikasi (Opsional)</label>
                    <textarea name="spesifikasi" rows="3" 
                              class="w-full bg-slate-50 border-3 border-black rounded-md p-2.5 font-bold focus:outline-none focus:bg-yellow-100 focus:shadow-[2px_2px_0px_0px_#000] transition-all">{{ old('spesifikasi', $barang->spesifikasi) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="font-comic text-xs font-bold block mb-1 uppercase">Stok *</label>
                        <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" 
                               class="w-full bg-slate-50 border-3 border-black rounded-md p-2.5 font-bold focus:outline-none focus:bg-yellow-100 focus:shadow-[2px_2px_0px_0px_#000] transition-all">
                    </div>

                    <div>
                        <label class="font-comic text-xs font-bold block mb-1 uppercase">Kondisi *</label>
                        <select name="kondisi" class="w-full bg-slate-50 border-3 border-black rounded-md p-2.5 font-bold focus:outline-none focus:bg-yellow-100 focus:shadow-[2px_2px_0px_0px_#000] transition-all">
                            <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ old('kondisi', $barang->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('kondisi', $barang->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-comic text-xs font-bold block mb-1 uppercase">Status *</label>
                        <select name="status" class="w-full bg-slate-50 border-3 border-black rounded-md p-2.5 font-bold focus:outline-none focus:bg-yellow-100 focus:shadow-[2px_2px_0px_0px_#000] transition-all">
                            <option value="Tersedia" {{ old('status', $barang->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Dipinjam" {{ old('status', $barang->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="Maintenance" {{ old('status', $barang->status) == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-3 border-t-3 border-black">
                    <a href="{{ route('barang.index') }}" 
                       class="font-comic bg-slate-200 hover:bg-slate-300 text-black font-bold text-xs px-4 py-2 rounded-md border-3 border-black shadow-[2px_2px_0px_0px_#000] active:translate-x-0.5 active:translate-y-0.5 active:shadow-none transition-all">
                        ❌ BATAL
                    </a>
                    <button type="submit" 
                            class="font-comic bg-yellow-400 hover:bg-yellow-500 text-black font-bold text-xs px-5 py-2 rounded-md border-3 border-black shadow-[2px_2px_0px_0px_#000] active:translate-x-0.5 active:translate-y-0.5 active:shadow-none transition-all">
                        💾 SIMPAN PERUBAHAN
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>