<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMLAB-RPL | Dashboard</title>
    <!-- Memanggil Tailwind CSS via CDN untuk mempermudah pengerjaan -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-4 md:p-8">
        <h1 class="text-2xl font-bold mb-6">Dashboard Metrik Inventaris Lab RPL</h1>
        
        <!-- Navbar Sederhana -->
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold mr-4">Dashboard</a>
            <a href="{{ route('barang.index') }}" class="text-blue-600 font-semibold">Data Barang</a>
        </div>

        <!-- Grid Responsif Sesuai Panduan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> 
            <div class="p-6 bg-white shadow rounded-lg">
                <h3 class="text-gray-500 font-bold">Total Aset (Semua Unit)</h3>
                <p class="text-3xl">{{ $totalAset }}</p>
            </div>
            <div class="p-6 bg-white shadow rounded-lg border-l-4 border-emerald-500">
                <h3 class="text-gray-500 font-bold">Unit Tersedia</h3>
                <p class="text-3xl text-emerald-600">{{ $unitTersedia }}</p>
            </div>
            <div class="p-6 bg-white shadow rounded-lg border-l-4 border-rose-500">
                <h3 class="text-gray-500 font-bold">Dipinjam / Maintenance</h3>
                <p class="text-3xl text-rose-600">{{ $unitDipinjamMaintenance }}</p>
            </div>
        </div>
    </div>

</body>
</html>