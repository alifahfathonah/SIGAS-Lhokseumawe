<?php
// koneksi database
include 'connect.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysql_query("DELETE from admin where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:p-akun-admin.php");

?>
