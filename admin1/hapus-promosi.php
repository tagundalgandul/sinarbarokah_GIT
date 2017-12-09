<?php
	session_start();
	include "koneksi.php";
		$kd_promosi = $_GET['kd_promosi'];
		$sql 	=mysqli_query($con,"DELETE FROM promosi where kd_promosi='$kd_promosi'") or die(mysqli_error($con));
	echo "<script language='javascript'>alert('Data Berhasil dihapus');document.location='promosi.php';</script>";	

?>