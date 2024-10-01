<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Poppins;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="bg-white rounded-2xl shadow-lg w-96 p-6 text-center">
        <img src="{{ asset('images/pp.jpg') }}" alt="Profile Picture" class="w-32 h-32 rounded-full mx-auto mb-4">
        <p class="text-gray-700">NAMA: {{$nama}}</p>
        <p class="text-gray-700">NPM: {{ $npm }}</p>
        <p class="text-gray-700">KELAS: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
    </div>
</body>
</html>
