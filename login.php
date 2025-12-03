<?php 
include 'process/login_process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBAL-UINAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Silakan Login</h1>
            <p class="text-gray-500 text-sm">Masuk untuk melapor barang.</p>
        </div>

        <?php if($pesan_error != ""): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <?= $pesan_error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" class="space-y-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">NIM</label>
                <input type="text" name="nim" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 border-gray-300">
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 border-gray-300">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2 rounded text-blue-600 focus:ring-blue-500">
                <label for="remember" class="text-sm text-gray-600">Ingat Saya</label>
            </div>

            <button type="submit" name="login" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 transition">
                Masuk Sekarang
            </button>
        </form>
        
        <p class="text-center mt-4 text-xs text-gray-400">
            Belum punya akun? <a href="register.php" class="text-blue-600 font-bold">Daftar di sini</a>
        </p>

    </div>

</body>
</html>