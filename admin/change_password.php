<link rel="stylesheet" href="css/admin_area.css" type="text/css" />
<h2 class="title">Ubah Password</h2>
<div id="page_content">
<div id="menu">
    	<a class="left" href="page.php?page=admin"><img src="img/icon/home.png">Admin</a>
        <a class="right" href="logoutadmin.php"><img src="img/icon/logout.png">Log Out</a>
   	</div>

<form action='' method='post'>
<table align="center" border="2">
<tr><td>
<table align="center" border="0" bgcolor="#5F8EC2">
    <tr>
        <td align="center" colspan='3'><img src='img/icon/password.png'></td>
    </tr>
    <tr>
        <td colspan='3'><div id="first">Ubah Password Admin</div></td>
    </tr>
    <tr>
        <td colspan='3'><hr width="100%" color="#000000" style=" size:40px; margin-top:-3px;"></td>
    </tr>
    <tr>
        <th align="left">Password Sekarang</th>
        <th>:</th>
        <td><input type='password' name='old_pass'></td>
    </tr>
    <tr>
        <th align="left">Password Baru</th>
        <th>:</th>
        <td><input type='password' name='new_pass'></td>
    </tr>
    <tr>
        <th align="left">Ulangi Password Baru</th>
        <th>:</th>
        <td><input type='password' name='repeat'></td>
    </tr>
    <tr>
        <td colspan='3'><hr width="100%" color="#000000" style=" size:40px; margin-top:3px;"></td>
    </tr>
    <tr>
        <th align="center" colspan='3'><input type='submit' value='Save' name='ubah'> <input type='reset' value='Reset' name='ubah'></th>
    </tr>

<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['username'])){
    header('location: index.php');
}
 
$panitia=$_SESSION['username'];
if(isset($_POST['ubah'])){
    $old_pass=mysql_real_escape_string($_POST['old_pass']);
    $old_pass=($old_pass);
    $new_pass=mysql_real_escape_string($_POST['new_pass']);
    $repeat=mysql_real_escape_string($_POST['repeat']);
    $new=($repeat);
    $changepass=mysql_fetch_array(mysql_query("select password from panitia where username='$panitia'"));
    if($old_pass == $changepass['password']){
    	if($new_pass != '' && $repeat != ''){       
        	if($new_pass == $repeat){
            	$input=mysql_query("update panitia set password='$new' where username='$panitia'");
             	if($input){
                	echo "<script language='javascript'> alert('Password Berhasil di Ganti!');
							document.location='page.php?page=admin';</script>";
             	}else{
               		echo "<script language='javascript'> alert('Password Anda Gagal di Ganti!');</script>"; 
             	}
            }else{
             	echo "<script language='javascript'> alert('Konfirmasi Password Baru Tidak Cocok !');</script>";
            }
        }else{
            echo "<script type='text/javascript'> alert('Password Baru Tidak Boleh Kosong !');</script>";
        }
    }else{
        echo "<script type='text/javascript'> alert('Password Lama Tidak Cocok');</script>";
	}
}
?>
</table>
</td></tr>
</table>
</form>
</div>