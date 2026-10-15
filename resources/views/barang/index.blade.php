<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris | SIMLAB-RPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-4 md:p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Inventaris Lab RPL</h1>
            <a href="{{ route('barang.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">+ Tambah Barang</a>
        </div>
        
        <!-- Navbar -->
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold mr-4">Dashboard</a>
            <a href="{{ route('barang.index') }}" class="text-blue-600 font-semibold">Data Barang</a>
        </div>

        <!-- Flash Alert (Snackbar Style) -->
        @if(session('success'))
            <div id="snackbar" class="fixed bottom-4 right-4 z-50 bg-emerald-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 transition-opacity duration-300 transform translate-y-0 opacity-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
                <button onclick="document.getElementById('snackbar').remove()" class="ml-auto text-emerald-200 hover:text-white focus:outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Script untuk menghilangkan snackbar otomatis setelah 3 detik -->
            <script>
                setTimeout(function() {
                    const snackbar = document.getElementById('snackbar');
                    if (snackbar) {
                        // Menambahkan class untuk efek menghilang (fade out/slide down)
                        snackbar.classList.remove('opacity-100', 'translate-y-0');
                        snackbar.classList.add('opacity-0', 'translate-y-2');
                        
                        // Menghapus elemen dari DOM setelah animasi transisi selesai
                        setTimeout(() => {
                            snackbar.remove();
                        }, 300); // 300ms sesuai dengan duration-300 di Tailwind
                    }
                }, 1500); 
            </script>
        @endif

        <!-- Tabel Responsif (Bisa Scroll Horizontal di HP) -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="p-4 text-sm font-semibold text-gray-600 uppercase">Kode</th>
                        <th class="p-4 text-sm font-semibold text-gray-600 uppercase">Nama & Kategori</th>
                        <th class="p-4 text-sm font-semibold text-gray-600 uppercase">Stok</th>
                        <th class="p-4 text-sm font-semibold text-gray-600 uppercase">Status</th>
                        <th class="p-4 text-sm font-semibold text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($barangs as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="p-4">{{ $item->kode_barang }}</td>
                        <td class="p-4">
                            <span class="font-medium text-gray-900">{{ $item->nama_barang }}</span><br>
                            <span class="text-xs text-gray-500">{{ $item->kategori->nama_kategori }}</span>
                        </td>
                        <td class="p-4">{{ $item->stok }}</td>
                        <td class="p-4">
                            <!-- Visual Status Badge Sesuai Panduan -->
                            @if($item->status == 'Tersedia')
                                <span class="px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-semibold">Tersedia</span>
                            @elseif($item->status == 'Dipinjam')
                                <span class="px-3 py-1 bg-rose-100 text-rose-800 rounded-full text-xs font-semibold">Dipinjam</span>
                            @else
                                <span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-semibold">Maintenance</span>
                            @endif
                        </td>
                        <td class="p-4 flex gap-3">
                            <a href="{{ route('barang.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus {{ $item->nama_barang }}?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500 italic">Data inventaris belum tersedia. Silakan tambah barang baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>