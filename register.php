<?php 
include 'process/register_process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBAL-UINAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>
<body class="bg-blue-50 h-screen flex items-center justify-center gap-32">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Akun</h2>
            <p class="text-gray-500 text-sm">Daftar untuk melapor barang hilang.</p>    
        </div>
        
        <form action="" method="post" class="space-y-4">
            <div>
                <label class="block text-sm font-bold text-gray-700">NIM</label>
                <input type="text" name="nim" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700">No HP (WhatsApp)</label>
                <input type="text" name="hp" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" name="register" class="w-full bg-green-600 text-white font-bold py-2 rounded-lg hover:bg-green-700 transition">
                Daftar Sekarang
            </button>
        </form>

        <p class="text-center mt-4 text-sm text-gray-600">
            Sudah punya akun? <a href="login.php" class="text-blue-600 font-bold">Login di sini</a>
        </p>
    </div>
    <div class="flex items-center gap-4">
        <img src="assets/img/Logo.png" alt="SIBAL-UINAM Logo" class="w-20 h-20">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">SIBAL-<span class="text-green-700">UINAM</span></h1>
            <p class="text-md text-gray-500">Sistem Informasi Barang Hilang</p>
        </div>
    </div>
</body>
</hmtl>