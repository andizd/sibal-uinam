<?php 
$current_user = $_SESSION['id_user'];
$hp = $row['hp']; // nomor WA pemilik
$hp = preg_replace('/^0/', '62', $hp); // ubah 08xx → 628xx

$pesan = "Halo, saya melihat laporan barang hilang Anda di SIBAL-UINAM.%0A"
       . "Apakah barang ini masih belum ditemukan?%0A%0A"
       . "Nama Barang: " . urlencode($row['nama_barang']);
?>
