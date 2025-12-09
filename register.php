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

<body class="bg-blue-50 h-screen flex items-center justify-center p-4">

    <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-32">

        <!-- FORM REGISTER -->
        <div class="bg-white p-6 lg:p-8 rounded-xl shadow-lg w-full max-w-md">

            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Akun</h2>
                <p class="text-gray-500 text-sm">Daftar untuk melapor barang hilang.</p>    
            </div>

            <?php if(isset($pesan_error) && $pesan_error != ""): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                    <?= $pesan_error; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post" class="space-y-4">

                <div>
                    <label class="block text-sm font-bold text-gray-700">NIM</label>
                    <input 
                        type="text" 
                        name="nim" 
                        required 
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700">Nama Lengkap</label>
                    <input 
                        type="text" 
                        name="nama" 
                        required 
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700">No HP (WhatsApp)</label>
                    <input 
                        type="text" 
                        name="hp" 
                        required 
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        required 
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 border-gray-300">
                </div>

                <button 
                    type="submit" 
                    name="register" 
                    class="w-full bg-green-600 text-white font-bold py-2 rounded-lg hover:bg-green-700 transition">
                    Daftar Sekarang
                </button>

            </form>

            <p class="text-center mt-4 text-sm text-gray-600">
                Sudah punya akun? 
                <a href="login.php" class="text-blue-600 font-bold">Login di sini</a>
            </p>

        </div>

        <!-- LOGO SECTION -->
        <div class="flex flex-col items-center gap-4 lg:items-start">
            <img src="assets/img/Logo.png" alt="SIBAL-UINAM Logo" class="w-16 h-16 lg:w-20 lg:h-20">
            <div class="text-center lg:text-left">
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-800">
                    SIBAL-<span class="text-green-700">UINAM</span>
                </h1>
                <p class="text-sm lg:text-md text-gray-500">Sistem Informasi Barang Hilang</p>
            </div>
        </div>

    </div>

</body>
</html>