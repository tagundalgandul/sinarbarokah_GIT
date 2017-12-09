<?php 
	include 'koneksi.php';
	$id_pelanggan = $_GET ['id_pelanggan'];
	$sql = mysqli_query ($con, "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'") or die (mysqli_error($con));
		echo "<script language='javascript'>alert('Data Berhasil Dihapus');document.location='pelanggan.php';</script>";

 ?>