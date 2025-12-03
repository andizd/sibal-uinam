<?php 
sessieon_start();

session_destroy();
header("location:login.php");
?>