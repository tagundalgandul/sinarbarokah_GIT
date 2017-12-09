<?php
	ob_start();
	session_start();
	include "koneksi.php";
	$user=$_POST['email'];
	$pass=$_POST['password'];
	
	$user = stripslashes($user);
    $pass = stripslashes($pass);
    $user = $user;
    $pass = $pass;

	$query = mysqli_query($con, "select * from pengguna where email='$user' ");
    $rows = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);
    $idpengguna=$data['id_pengguna'];
    $level=$data['level'];
    $email=$data['email'];
    $password=$data['password'];
	if ($user == $email && password_verify($pass, $password)) {
        $_SESSION[ses_user]     = $data[level];
		$_SESSION[ses_pengguna] = $data[nama_pengguna];
		$_SESSION[ses_email]    = $data[email];
		$_SESSION[ses_id]       = $data[id_pengguna];
        header("location: index.php"); // Mengarahkan ke halaman profil
        } else {
         echo "<script language='javascript'>alert('email atau Password Salah'); document.location='index.php';</script>";
        }
        mysqli_close($con); // Menutup koneksi
?>