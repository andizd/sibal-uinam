<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/sibal.turateaberkabar.com/config/connection.php";

if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){
    header("location:index.php");
}

$pesan_error = "";

// Jika tombol login ditekan
if(isset($_POST['login'])){
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM users WHERE nim='$nim' AND password='$password'");
    
    // Hitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);

    if($cek > 0){
        $row = mysqli_fetch_assoc($data);
        
        // Simpan data user ke SESSION (Server)
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nama'] = $row['nama_lengkap'];
        $_SESSION['status'] = "login";

        header("location:index.php");
    } else {
        $pesan_error = "NIM atau Password salah!";
    }
}
?>