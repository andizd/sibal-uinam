<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/config/connection.php";

$id = $_GET['id'];

$query = "DELETE FROM barang WHERE id_barang = '$id'";
mysqli_query($conn, $query);

header("location:index.php");
?>