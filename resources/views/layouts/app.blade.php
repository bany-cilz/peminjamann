<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMLAB-RPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 antialiased min-h-screen flex flex-col">
    <nav class="bg-indigo-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="font-bold text-xl tracking-wide">SIMLAB-RPL</a>
            <div class="space-x-4">
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('barang.index') }}" class="hover:underline">Inventaris</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-6 flex-grow w-full">
        @if(session('success'))
            <div class="mb-4 p-4 bg-emerald-100 border border-emerald-400 text-emerald-800 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>