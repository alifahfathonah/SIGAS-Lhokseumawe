<?php
$row_akun=mysql_fetch_array($login);
$_SESSION['id_pemilik'] = $row_akun['id_pemilik'];
$_SESSION['nama_pemilik'] = $row_akun['nama_pemilik'];
$_SESSION['nik_pemilik'] = $row_akun['nik_pemilik'];
$_SESSION['no_hp'] = $row_akun['no_hp'];
$_SESSION['username'] = $row_akun['username'];
$_SESSION['password'] = $row_akun['password'];
$_SESSION['status'] = "login";
?>
