<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMLAB-RPL — Data Barang</title>
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

    <div class="max-w-5xl mx-auto w-full flex-1 flex flex-col gap-6">
        
        <!-- Navbar -->
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
                <a href="{{ route('barang.index') }}" class="font-comic px-4 py-2 bg-yellow-400 text-black border-3 border-black font-bold text-xs rounded-md shadow-[2px_2px_0px_0px_#000]">
                    📦 Data Barang
                </a>
            </nav>
        </header>

        <!-- Snackbar Toast -->
        @if(session('success'))
            <div id="snackbar" class="fixed bottom-6 right-6 z-50 bg-emerald-300 border-3 border-black text-black font-comic font-bold text-xs px-4 py-3 rounded-md shadow-[4px_4px_0px_0px_#000] flex items-center gap-3">
                <span>🎉 {{ session('success') }}</span>
                <button onclick="document.getElementById('snackbar').remove()" class="bg-black text-white rounded-md px-2 py-0.5 text-xs font-bold">&times;</button>
            </div>
            <script>
                setTimeout(() => {
                    const el = document.getElementById('snackbar');
                    if (el) el.remove();
                }, 3000);
            </script>
        @endif

        <!-- Judul & Action Button -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="bg-white border-3 border-black px-4 py-2 rounded-md shadow-[3px_3px_0px_0px_#000]">
                <h2 class="font-comic text-xl font-bold uppercase">📋 DAFTAR INVENTARIS LAB</h2>
            </div>
            <a href="{{ route('barang.create') }}" class="font-comic bg-rose-400 hover:bg-rose-500 text-black text-xs font-bold px-4 py-2.5 rounded-md border-3 border-black shadow-[3px_3px_0px_0px_#000] active:translate-x-0.5 active:translate-y-0.5 active:shadow-none transition-all">
                + TAMBAH BARANG BARU
            </a>
        </div>

        <!-- Tabel Komik Tegas -->
        <div class="bg-white border-3 border-black rounded-lg shadow-[5px_5px_0px_0px_#000] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-yellow-300 border-b-3 border-black font-comic text-black text-xs font-bold uppercase tracking-wider">
                            <th class="py-3 px-4 border-r-2 border-black">Kode</th>
                            <th class="py-3 px-4 border-r-2 border-black">Nama Barang</th>
                            <th class="py-3 px-4 border-r-2 border-black">Kategori</th>
                            <th class="py-3 px-4 border-r-2 border-black">Stok</th>
                            <th class="py-3 px-4 border-r-2 border-black">Kondisi</th>
                            <th class="py-3 px-4 border-r-2 border-black">Status</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-black font-bold text-xs">
                        @forelse($barangs as $item)
                        <tr class="hover:bg-yellow-100/60 transition-colors">
                            <td class="py-3 px-4 border-r-2 border-black font-mono font-bold text-slate-900">
                                <span class="bg-slate-100 border-2 border-black px-2 py-0.5 rounded-md shadow-[1px_1px_0px_0px_#000]">
                                    {{ $item->kode_barang }}
                                </span>
                            </td>

                            <td class="py-3 px-4 border-r-2 border-black font-bold text-slate-900 text-xs">
                                {{ $item->nama_barang }}
                            </td>

                            <td class="py-3 px-4 border-r-2 border-black text-slate-700">
                                {{ $item->kategori->nama_kategori }}
                            </td>

                            <td class="py-3 px-4 border-r-2 border-black font-bold">
                                <span class="bg-cyan-200 border-2 border-black px-2 py-0.5 rounded-md">
                                    {{ $item->stok }} Unit
                                </span>
                            </td>

                            <td class="py-3 px-4 border-r-2 border-black">
                                {{ $item->kondisi }}
                            </td>

                            <td class="py-3 px-4 border-r-2 border-black whitespace-nowrap">
                                @if($item->status == 'Tersedia')
                                    <span class="font-comic bg-emerald-300 border-2 border-black text-black px-2.5 py-0.5 rounded-md font-bold text-[11px] shadow-[1px_1px_0px_0px_#000]">
                                        ✅ Tersedia
                                    </span>
                                @elseif($item->status == 'Dipinjam')
                                    <span class="font-comic bg-rose-300 border-2 border-black text-black px-2.5 py-0.5 rounded-md font-bold text-[11px] shadow-[1px_1px_0px_0px_#000]">
                                        📌 Dipinjam
                                    </span>
                                @else
                                    <span class="font-comic bg-amber-300 border-2 border-black text-black px-2.5 py-0.5 rounded-md font-bold text-[11px] shadow-[1px_1px_0px_0px_#000]">
                                        🛠 Maintenance
                                    </span>
                                @endif
                            </td>

                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('barang.edit', $item->id) }}" class="font-comic bg-cyan-300 hover:bg-cyan-400 text-black border-2 border-black px-2.5 py-1 rounded-md font-bold text-xs shadow-[1px_1px_0px_0px_#000] active:translate-x-0.5 active:translate-y-0.5 active:shadow-none transition-all">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus {{ $item->nama_barang }}?')" class="font-comic bg-rose-400 hover:bg-rose-500 text-black border-2 border-black px-2.5 py-1 rounded-md font-bold text-xs shadow-[1px_1px_0px_0px_#000] active:translate-x-0.5 active:translate-y-0.5 active:shadow-none transition-all">
                                            🗑 Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center bg-white font-comic text-xs font-bold text-slate-500">
                                💥 BELUM ADA DATA BARANG DI LAB!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>