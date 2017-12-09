<?php
	session_start();
	include "koneksi.php";
		$kd_kecamatan = $_GET['kd_kecamatan'];
		$sql 	=mysqli_query($con,"DELETE FROM kecamatan where kd_kecamatan='$kd_kecamatan'") or die(mysqli_error($con));
	echo "<script language='javascript'>alert('Data Berhasil dihapus');document.location='penduduk.php';</script>";	

?>