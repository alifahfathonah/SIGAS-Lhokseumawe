<?php
session_start();
error_reporting(0);

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:p-login.php");
}
?>
