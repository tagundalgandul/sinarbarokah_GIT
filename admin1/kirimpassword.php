<?php
include "header.php";
function randomPassword()
{
// function untuk membuat password random 6 digit karakter
$digit = 6;
$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";

srand((double)microtime()*1000000);
$i = 0;
$pass = "";
while ($i <= $digit-1)
{
$num = rand() % 32;
$tmp = substr($karakter,$num,1);
$pass = $pass.$tmp;
$i++;
}
return $pass;
}
$email = $_POST['email'];
@$queri = mysqli_query($con, "SELECT * FROM pengguna where email='$email'");
$ketemu=mysqli_num_rows($queri);
$r=mysqli_fetch_array($queri);
$dbemail=$r['email'];
$newpassword=randomPassword();
$enkrip = password_hash($newpassword, PASSWORD_DEFAULT);
$e = "tagundalgandul25@gmail.com";
if($ketemu > 0){	
	$title  = "New Password [SINAR BAROKAH]";
	// isi pesan email disertai password
	$pesan  = "Password Anda yang baru adalah ".$newpassword;
	// header email berisi alamat pengirim
	$header = "From: admin@crmazzam.com";
	// mengirim email
	@mail($dbemail,$title,$pesan,$header);
	// cek status pengiriman email
	if (@mail) {
	    // update password baru ke database (jika pengiriman email sukses)
	    $que = "UPDATE pengguna SET password = '$enkrip' WHERE email = '$dbemail'";
	    $hasil = mysql_query($que);
	    if ($hasil) echo "<script language='javascript'> alert('Password Berhasil Dikirim, Silakan Cek Email Anda');
							document.location='login.php';</script>";
	    }
		else echo "<script language='javascript'> alert('Pengiriman Email Gagal');
					document.location='lupa_password.php';</script>";
}
else
	{
		
		echo "<script language='javascript'> alert('Email yang dimasukan Salah');
			  document.location='lupa_password.php';</script>";
	}

?>