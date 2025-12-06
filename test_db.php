<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$user = "turh8536_sibal_user";
$pass = "SibalFix2025!";
$database = "turh8536_sibal_db";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn){
    die("DB ERROR: " . mysqli_connect_error());
}

echo "Database Connected Successfully!";
?>
