<?php
	session_start();
	include "koneksi.php";
		$kd_penduduk = $_GET['kd_penduduk'];
		$sql 	=mysqli_query($con,"DELETE FROM penduduk where kd_penduduk='$kd_penduduk'") or die(mysqli_error($con));
	echo "<script language='javascript'>alert('Data Berhasil dihapus');document.location='penduduk.php';</script>";	

?>