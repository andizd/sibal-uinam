<?php 
session_start();
include 'config/connection.php';
include 'process/add_process.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBAL-UINAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="assets/js/script.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg overflow-hidden p-8">
        
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Lapor Barang Hilang</h2>
            <p class="text-gray-500 text-sm">Isi detail barang yang kamu temukan atau hilangkan.</p>
        </div>

        <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                <input type="text" name="nama_barang" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                       placeholder="Contoh: Dompet Kulit Coklat">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi / Ciri-ciri</label>
                <textarea name="deskripsi" rows="3" required 
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                          placeholder="Sebutkan isi, warna, atau tanda khusus..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Hilang</label>
                    <input type="date" name="tgl_hilang" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Lokasi Terakhir</label>
                    <input type="text" name="lokasi_hilang" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Gedung / Ruangan">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Foto Barang</label>
                <div class="flex items-center justify-center w-full">
                    <label for="inputFoto" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span></p>
                        </div>
                        <input id="inputFoto" name="foto" type="file" class="hidden" accept="image/*" onchange="previewImage()" required />
                    </label>
                </div>
                <div class="mt-4 hidden" id="previewContainer">
                    <p class="text-xs text-gray-500 mb-1">Preview:</p>
                    <img id="tampilFoto" class="w-full h-48 object-cover rounded-lg shadow-sm" src="" alt="Preview Gambar">
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="index.php" class="text-sm text-blue-600 hover:underline">← Kembali ke Beranda</a>
                <button type="submit" name="simpan" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                    Simpan Laporan
                </button>
            </div>
        </form>
    </div>
</body>
</html>