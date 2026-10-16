<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMLAB-RPL — Dashboard</title>
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
                <a href="{{ route('dashboard') }}" class="font-comic px-4 py-2 bg-yellow-400 text-black border-3 border-black font-bold text-xs rounded-md shadow-[2px_2px_0px_0px_#000]">
                    📊 Dashboard
                </a>
                <a href="{{ route('barang.index') }}" class="font-comic px-4 py-2 bg-white text-black border-3 border-black font-bold text-xs rounded-md shadow-[2px_2px_0px_0px_#000] hover:bg-yellow-200 transition-colors">
                    📦 Data Barang
                </a>
            </nav>
        </header>

        <!-- Banner Judul -->
        <div class="bg-cyan-300 border-3 border-black p-5 rounded-lg shadow-[4px_4px_0px_0px_#000] flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <span class="bg-black text-yellow-300 font-comic text-[11px] px-2.5 py-0.5 rounded-md uppercase tracking-wider font-bold inline-block mb-1">STATUS REAL-TIME</span>
                <h2 class="font-comic text-2xl font-bold uppercase tracking-wide">Ringkasan Metrik Aset</h2>
                <p class="text-xs font-bold text-slate-800">Pantau ketersediaan unit dan status inventaris lab secara langsung.</p>
            </div>
            <a href="{{ route('barang.create') }}" class="font-comic bg-rose-400 hover:bg-rose-500 text-black text-xs font-bold px-4 py-2.5 rounded-md border-3 border-black shadow-[3px_3px_0px_0px_#000] active:translate-x-0.5 active:translate-y-0.5 active:shadow-none transition-all whitespace-nowrap">
                + TAMBAH BARANG
            </a>
        </div>

        <!-- Metrik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            
            <!-- Card 1: Total Aset -->
            <div class="bg-white border-3 border-black p-5 rounded-lg shadow-[4px_4px_0px_0px_#000]">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-comic text-xs font-bold uppercase bg-yellow-300 border-2 border-black px-2 py-0.5 rounded-md">Keseluruhan</span>
                    <span class="text-xl">📦</span>
                </div>
                <h3 class="font-comic text-xs font-bold text-slate-600 uppercase">TOTAL ASET</h3>
                <div class="mt-1 flex items-baseline gap-2">
                    <span class="font-comic text-4xl font-bold text-black">{{ $totalAset }}</span>
                    <span class="font-bold text-slate-600 text-xs">Unit</span>
                </div>
            </div>

            <!-- Card 2: Unit Tersedia -->
            <div class="bg-emerald-200 border-3 border-black p-5 rounded-lg shadow-[4px_4px_0px_0px_#000]">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-comic text-xs font-bold uppercase bg-emerald-400 border-2 border-black px-2 py-0.5 rounded-md text-black">Siap Pakai</span>
                    <span class="text-xl">✅</span>
                </div>
                <h3 class="font-comic text-xs font-bold text-emerald-950 uppercase">UNIT TERSEDIA</h3>
                <div class="mt-1 flex items-baseline gap-2">
                    <span class="font-comic text-4xl font-bold text-emerald-950">{{ $unitTersedia }}</span>
                    <span class="font-bold text-emerald-800 text-xs">Unit</span>
                </div>
            </div>

            <!-- Card 3: Dipinjam / Maintenance -->
            <div class="bg-rose-200 border-3 border-black p-5 rounded-lg shadow-[4px_4px_0px_0px_#000]">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-comic text-xs font-bold uppercase bg-rose-400 border-2 border-black px-2 py-0.5 rounded-md text-black">Terpakai</span>
                    <span class="text-xl">⚠️</span>
                </div>
                <h3 class="font-comic text-xs font-bold text-rose-950 uppercase">DIPINJAM / MAINTENANCE</h3>
                <div class="mt-1 flex items-baseline gap-2">
                    <span class="font-comic text-4xl font-bold text-rose-950">{{ $unitDipinjamMaintenance }}</span>
                    <span class="font-bold text-rose-800 text-xs">Unit</span>
                </div>
            </div>

        </div>

        <!-- Banner Akses Cepat -->
        <div class="bg-purple-300 border-3 border-black p-5 rounded-lg shadow-[4px_4px_0px_0px_#000] flex flex-col sm:flex-row items-center justify-between gap-4 mt-auto">
            <div>
                <h3 class="font-comic text-base font-bold uppercase">Kelola Data Inventaris Lab</h3>
                <p class="text-xs font-bold text-slate-800">Ubah status ketersediaan, edit informasi barang, atau hapus item di tabel.</p>
            </div>
            <a href="{{ route('barang.index') }}" class="font-comic bg-black text-white hover:bg-slate-800 text-xs font-bold px-4 py-2.5 rounded-md border-2 border-black shadow-[2px_2px_0px_0px_#fff] whitespace-nowrap">
                BUKA TABEL BARANG ➔
            </a>
        </div>

    </div>

</body>
</html>