<?php 
include '../config/connection.php';

$id = $_GET['id'];

$query = "DELETE FROM barang WHERE id_barang = '$id'";
mysqli_query($conn, $query);

header("location:../index.php");
?>