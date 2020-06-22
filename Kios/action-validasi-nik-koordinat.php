<?php
include 'connect.php';
$id    		= $_SESSION['id_pemilik'];
$data     = mysql_query("SELECT * from pemilik where id_pemilik='$id'");
$row      = mysql_fetch_array($data);

if(empty($row['nik_pemilik']) || empty($row['foto_ktp'])){
	header("location:p-validasi-user.php");
//	echo '<script language="javascript">
	//		window.location="p-validasi-user.php";
		//	</script>';
}
?>
