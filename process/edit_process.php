<?php 
include '../config/connection.php';

$id = $_GET['id'];

$query_ambil = "SELECT * FROM barang WHERE id_barang = '$id'";
$result_ambil = mysqli_query($conn, $query_ambil);
$data = mysqli_fetch_assoc($result_ambil);

// Jika data tidak ditemukan (misal user iseng ganti ID di URL)
if(mysqli_num_rows($result_ambil) < 1) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='../index.php';</script>";
}

if (isset($_POST['update'])) {
    $nama_barang   = $_POST['nama_barang'];
    $deskripsi     = $_POST['deskripsi'];
    $tgl_hilang    = $_POST['tgl_hilang'];
    $lokasi_hilang = $_POST['lokasi_hilang'];
    $status        = $_POST['status']; // Tambahan input Status
    $foto_lama     = $_POST['foto_lama']; // Nama foto lama

    // Cek apakah user pilih foto baru?
    if ($_FILES['foto']['error'] === 4) {
        // Jika error = 4 artinya tidak ada file yang diupload -> Pakai Foto Lama
        $foto_barang = $foto_lama;
    } else {
        // Jika ada file baru -> Upload Foto Baru
        $foto_nama = $_FILES['foto']['name'];
        $foto_tmp  = $_FILES['foto']['tmp_name'];
        $foto_barang = time() . '_' . $foto_nama; 
        move_uploaded_file($foto_tmp, 'uploads/' . $foto_barang);
    }

    // Query UPDATE
    $query_update = "UPDATE barang SET 
                        nama_barang = '$nama_barang',
                        deskripsi = '$deskripsi',
                        tgl_hilang = '$tgl_hilang',
                        lokasi_hilang = '$lokasi_hilang',
                        status = '$status',
                        foto_barang = '$foto_barang'
                     WHERE id_barang = '$id'";
    
    $result = mysqli_query($conn, $query_update);

    if ($result) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='../index.php';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>