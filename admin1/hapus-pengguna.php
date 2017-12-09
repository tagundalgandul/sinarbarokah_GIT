<?php
	session_start();
	include "koneksi.php";
		$id_pengguna = $_GET['id_pengguna'];
			$sql 	=mysqli_query($con,"DELETE FROM pengguna where id_pengguna='$id_pengguna'") or die(mysqli_error($con));
	echo "<script language='javascript'>alert('Data Berhasil dihapus');document.location='pengguna.php';</script>";	

?>