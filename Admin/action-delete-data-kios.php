<?php
// koneksi database
include 'connect.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysql_query("DELETE from pemilik where id_pemilik='$id'");
mysql_query("DELETE from kios where id_pemilik='$id'");

// mengalihkan halaman kembali ke index.php
header("location:p-data-kios-lpg.php");

?>
