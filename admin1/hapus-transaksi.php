<?php
	session_start();
	include "koneksi.php";
		$no_faktur = $_GET['no_faktur'];
		$sql 	=mysqli_query($con,"DELETE FROM transaksi where no_faktur='$no_faktur'") or die(mysqli_error($con));
	echo "<script language='javascript'>alert('Data Berhasil dihapus');document.location='transaksi.php';</script>";

?>
