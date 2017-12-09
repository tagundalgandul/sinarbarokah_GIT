<?php
	session_start();
	include "koneksi.php";
		$kd_sms = $_GET['kd_sms'];
			$sql 	=mysqli_query($con,"DELETE FROM sms where kd_sms='$kd_sms'") or die(mysqli_error($con));
	echo "<script language='javascript'>alert('Data Berhasil dihapus');document.location='sms.php';</script>";	

?>