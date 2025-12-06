<?php
session_start();
include 'config/connection.php';
include 'process/edit_process.php';

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
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg overflow-hidden p-8">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Edit Data Barang</h2>
        </div>

        <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
            
            <input type="hidden" name="foto_lama" value="<?= $data['foto_barang']; ?>">

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                <input type="text" name="nama_barang" required value="<?= $data['nama_barang']; ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" required 
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?= $data['deskripsi']; ?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Hilang</label>
                    <input type="date" name="tgl_hilang" required value="<?= $data['tgl_hilang']; ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Lokasi Hilang</label>
                    <input type="text" name="lokasi_hilang" required value="<?= $data['lokasi_hilang']; ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Status Barang</label>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="Hilang" <?= ($data['status'] == 'Hilang') ? 'selected' : ''; ?>>Hilang</option>
                    <option value="Ditemukan" <?= ($data['status'] == 'Ditemukan') ? 'selected' : ''; ?>>Ditemukan</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Foto (Opsional)</label>
                <div class="mb-2">
                    <img src="uploads/<?= $data['foto_barang']; ?>" alt="Foto Lama" class="w-24 h-24 object-cover rounded shadow">
                    <p class="text-xs text-gray-400 mt-1">Foto saat ini</p>
                </div>
                <input type="file" name="foto" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="index.php" class="text-sm text-blue-600 hover:underline">Batal</a>
                <button type="submit" name="update" 
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</body>
</html>