<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/sibal.turateaberkabar.com/config/connection.php";

if (isset($_POST['simpan'])) {
    $id_user = $_SESSION['id_user'];
    
    $nama_barang   = $_POST['nama_barang'];
    $deskripsi     = $_POST['deskripsi'];
    $tgl_hilang    = $_POST['tgl_hilang'];
    $lokasi_hilang = $_POST['lokasi_hilang'];

    $foto_nama = $_FILES['foto']['name'];
    $foto_tmp  = $_FILES['foto']['tmp_name'];
    $nama_baru = time() . '_' . $foto_nama; 
    
    $upload_sukses = move_uploaded_file($foto_tmp, 'uploads/' . $nama_baru);

    if ($upload_sukses) {
        $query = "INSERT INTO barang (id_user, nama_barang, deskripsi, tgl_hilang, lokasi_hilang, foto_barang, status) 
                  VALUES ('$id_user', '$nama_barang', '$deskripsi', '$tgl_hilang', '$lokasi_hilang', '$nama_baru', 'Hilang')";
        
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
        } else {
            echo "Gagal menyimpan: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Gagal mengupload gambar!');</script>";
    }
}
?>