<?php
$row_akun=mysql_fetch_array($login);
$_SESSION['id'] = $row_akun['id'];
$_SESSION['nama'] = $row_akun['nama'];
$_SESSION['email'] = $row_akun['email'];
$_SESSION['no_hp'] = $row_akun['no_hp'];
$_SESSION['username'] = $row_akun['username'];
$_SESSION['password'] = $row_akun['password'];
$_SESSION['status'] = "login";
?>
