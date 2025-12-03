<?php 
include 'config/connection.php';

if(isset($_POST['register'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $hp = $_POST['hp'];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE nim = '$nim'");
    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('NIM sudah terdaftar!'); window.location='register.php';</script>";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (nim, nama_lengkap, password, no_hp) VALUES ('$nim', '$nama', '$password', '$hp')");
        if($insert){
            echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Pendaftaran gagal! Silakan coba lagi.'); window.location='register.php';</script>";
        }
    }
}
?>