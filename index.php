<?php 
include 'config/connection.php';

$query = "SELECT * FROM barang ORDER BY id_barang DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBAL-UINAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-gray-50 min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">SIBAL-<span class="text-green-600">UINAM</span></h1>
                <p class="text-gray-500">Sistem Informasi Barang Hilang</p>
            </div>
            <a href="tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Lapor Barang
            </a>
        </div>

        <div class="mb-6">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="search" placeholder="Cari nama barang hilang..." class="w-full py-3 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-md">
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="w-full text-left border-collapse" id="dataTable">
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
                    // Looping data dari database
                    while ($row = mysqli_fetch_assoc($result)) { 
                    ?>
                    
                    <tr class="hover:bg-gray-50 border-b last:border-b-0 transition">
                        <td class="p-4"><?= $no++; ?></td>
                        <td class="p-4">
                            <img src="uploads/<?= $row['foto_barang']; ?>" alt="Foto" class="w-16 h-16 object-cover rounded-md border shadow-sm">
                        </td>
                        <td class="p-4 align-top">
                            <p class="font-bold text-gray-800 text-lg"><?= $row['nama_barang']; ?></p>
                            <p class="text-xs text-gray-500 mt-1 line-clamp-2"><?= $row['deskripsi']; ?></p>
                        </td>
                        <td class="p-4 align-top">
                            <div class="flex items-center gap-2 mb-1">
                                <i class="fas fa-map-marker-alt text-red-500"></i>
                                <span><?= $row['lokasi_hilang']; ?></span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-400 text-xs">
                                <i class="fas fa-calendar"></i>
                                <span><?= date('d M Y', strtotime($row['tgl_hilang'])); ?></span>
                            </div>
                        </td>
                        <td class="p-4">
                            <?php if($row['status'] == 'Hilang'): ?>
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">
                                    Hilang
                                </span>
                            <?php else: ?>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">
                                    Ditemukan
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="edit.php?id=<?= $row['id_barang']; ?>" class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-md shadow transition" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-md shadow transition" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
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
        </div>
    </div>
</body>
</html>