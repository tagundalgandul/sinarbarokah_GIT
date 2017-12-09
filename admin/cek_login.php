<?php
	ob_start();
	session_start();
	include "koneksi.php";
	$user=$_POST['email'];
	$pass=$_POST['password'];
	

	
	$sql=mysqli_query($con, "SELECT * from pengguna
		  WHERE email='$user' and password='$pass'");
	$ketemu=mysqli_num_rows($sql);
	$r=mysqli_fetch_array($sql);
	
	//username dan password ditemukan
	if($ketemu > 0){
	  
	  $_SESSION[ses_user]     = $r[level];
	  $_SESSION[ses_password] = $r[password];
	  $_SESSION[ses_pengguna]	= $r[nama_pengguna];
	  $_SESSION[ses_level]    = $r[level];
	  
	
		//Redirect to module mahasiswa
			header('location:index.php');
	}
	else
	{
		echo '<script language="javascript">alert("Username atau Password Tidak Cocok");document.location="login.php?status=Gagal";</script>';
	}
?>