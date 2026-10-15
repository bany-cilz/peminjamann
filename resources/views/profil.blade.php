<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Praktik 2</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f8fafc; color: #1e293b; }
        .card { background: white; padding: 20px; border-radius: 8px; border: 1px solid #cbd5e1; max-width: 400px; }
        h2 { color: #0f172a; margin-top: 0; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Profil Pengguna</h2>
        <p><strong>Nama:</strong> {{ $nama }}</p>
        <p><strong>Kelas:</strong> {{ $kelas }}</p>
    </div>
</body>
</html>