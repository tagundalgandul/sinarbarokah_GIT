<?php
	session_start();
	include "koneksi.php";
		$kd_barang = $_GET['kd_barang'];
			$sql 	=mysqli_query($con,"DELETE FROM produk where kd_barang='$kd_barang'") or die(mysqli_error($con));
	echo "<script language='javascript'>alert('Data Berhasil dihapus');document.location='produk.php';</script>";	

?>