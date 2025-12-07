<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php");
    exit();
}

include 'config/connection.php';

// JOIN AGAR BISA AMBIL NOMOR HP PEMILIK
$query = "SELECT barang.*, users.no_hp 
          FROM barang 
          JOIN users ON users.id_user = barang.id_user
          ORDER BY id_barang DESC";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBAL-UINAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#1e40af',
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-gray-50 min-h-screen p-4 md:p-8">

    <!-- WRAPPER -->
    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">

            <div class="flex items-center gap-4">
                <img src="assets/img/Logo.png" class="w-16 h-16">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        SIBAL-<span class="text-green-700">UINAM</span>
                    </h1>
                    <p class="text-gray-500">Sistem Informasi Barang Hilang</p>
                </div>
            </div>

            <div class="flex flex-col md:flex-row md:items-center md:gap-3 text-right">
                <a href="add.php"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition flex items-center gap-2 justify-center">
                    Lapor Barang
                </a>

                <a href="logout.php" class="text-sm text-red-600 hover:underline text-center md:text-right">← Keluar</a>
            </div>
        </div>

        <!-- SEARCH -->
        <div class="mb-6 px-1">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                    <i class="fas fa-search"></i>
                </span>

                <input 
                    type="text" 
                    id="searchInput" 
                    oninput="searchTable()" 
                    placeholder="Cari nama barang hilang..."
                    class="w-full py-3 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary shadow-md"
                >
            </div>
        </div>

        <!-- TABLE RESPONSIVE WRAPPER -->
        <div class="bg-white rounded-xl shadow-lg overflow-x-auto">

            <table class="w-full text-left border-collapse min-w-[700px]" id="dataTable">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm font-bold">
                    <tr>
                        <th class="p-4 border-b">No</th>
                        <th class="p-4 border-b">Foto</th>
                        <th class="p-4 border-b">Barang & Deskripsi</th>
                        <th class="p-4 border-b">Lokasi & Tanggal</th>
                        <th class="p-4 border-b">Status</th>
                        <th class="p-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-600 text-sm">
                <?php 
                $no = 1;
                $current_user = $_SESSION['id_user'];

                while ($row = mysqli_fetch_assoc($result)) { 
                ?>
                <tr class="hover:bg-gray-50 border-b transition">
                    <td class="p-4"><?= $no++; ?></td>

                    <!-- FOTO -->
                    <td class="p-4">
                        <img 
                            src="uploads/<?= $row['foto_barang']; ?>"
                            data-src="uploads/<?= $row['foto_barang']; ?>"
                            class="preview w-16 h-16 object-cover rounded-md border shadow-sm cursor-pointer"
                        >
                    </td>

                    <!-- BARANG -->
                    <td class="p-4">
                        <p class="font-bold text-gray-800 text-lg"><?= $row['nama_barang']; ?></p>
                        <p class="text-xs text-gray-500 mt-1"><?= $row['deskripsi']; ?></p>
                    </td>

                    <!-- LOKASI -->
                    <td class="p-4">
                        <div class="flex items-center gap-2 mb-1">
                            <i class="fas fa-map-marker-alt text-red-500"></i>
                            <span><?= $row['lokasi_hilang']; ?></span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-400 text-xs">
                            <i class="fas fa-calendar"></i>
                            <span><?= date('d M Y', strtotime($row['tgl_hilang'])); ?></span>
                        </div>
                    </td>

                    <!-- STATUS -->
                    <td class="p-4">
                        <?php if($row['status'] == 'Hilang'): ?>
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">
                                Hilang
                            </span>
                        <?php else: ?>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                Ditemukan
                            </span>
                        <?php endif; ?>
                    </td>

                    <!-- AKSI -->
                    <td class="p-4 text-center">
                        <?php 
                        $hp = preg_replace('/^0/', '62', $row['no_hp']); 
                        $pesan = urlencode(
                            "Halo, saya melihat laporan barang hilang Anda di SIBAL-UINAM.\n".
                            "Apakah barang ini masih belum ditemukan?\n\n".
                            "Nama Barang: {$row['nama_barang']}"
                        );
                        ?>

                        <div class="flex justify-center gap-2">

                        <?php if ($row['id_user'] == $current_user): ?>

                            <!-- EDIT -->
                            <a href="edit.php?id=<?= $row['id_barang']; ?>"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-md shadow">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- HAPUS -->
                            <a onclick="return confirm('Yakin ingin menghapus data ini?')"
                               href="process/delete_process.php?id=<?= $row['id_barang']; ?>"
                               class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-md shadow">
                                <i class="fas fa-trash"></i>
                            </a>

                        <?php else: ?>

                            <!-- TANGGAPI WHATSAPP -->
                            <a href="https://wa.me/<?= $hp; ?>?text=<?= $pesan; ?>"
                               target="_blank"
                               class="bg-green-600 hover:bg-green-700 text-white p-2 rounded-md shadow">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                        <?php endif; ?>

                        </div>
                    </td>
                </tr>
                <?php } ?>

                <?php if(mysqli_num_rows($result) == 0): ?>
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400">
                        Belum ada laporan barang hilang.
                    </td>
                </tr>
                <?php endif; ?>

                </tbody>
            </table>

        </div><!-- end table wrapper -->

    </div><!-- wrapper -->

    <!-- MODAL FOTO -->
    <div id="imageModal"
         class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="relative">
            <img id="modalImage" class="max-w-xl max-h-[80vh] rounded-lg shadow-lg border-4 border-white">

            <button id="btnCloseModal"
                class="absolute -top-4 -right-4 bg-white text-black rounded-full w-8 h-8 flex items-center justify-center shadow">
                ✖
            </button>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>