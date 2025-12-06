<?php 
$server = "localhost";
$user = "turh8536_sibal_user";
$pass = "SibalFix2025!";
$database = "turh8536_sibal_db";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>