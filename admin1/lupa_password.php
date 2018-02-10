<?php

  include'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SINAR BAROKAH</title>
  <link rel="icon" type="image/png" href="img/logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../admin/plugins/iCheck/square/blue.css">

  <!-- jQuery 2.2.0 -->
  <script src="../admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../admin/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../admin/plugins/iCheck/icheck.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>SINAR BAROKAH</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masukkan Email </p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="email" class="form-control" placeholder="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8"></div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



</body>
</html>
<?php
if (isset($_POST['submit']))
{
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
    $query = mysqli_query($con,"SELECT * FROM pengguna where email='$email'");
    $ketemu=mysqli_num_rows($query);
    $r=mysqli_fetch_array($query);
    $dbemail=$r['email'];
    $newpassword=randomPassword();
    $enkrip = password_hash($newpassword, PASSWORD_DEFAULT);

    if($ketemu > 0){

        $title  = "New Password [sinarbarokah]";

        // isi pesan email disertai password
        $pesan  = "Password Anda yang baru adalah ".$newpassword;

        // header email berisi alamat pengirim
        $header = "From: nanda@barokahsinar.com";

        // mengirim email

        @mail($dbemail,$title,$pesan,$header);


        // cek status pengiriman email
        if (@mail) {

            // update password baru ke database (jika pengiriman email sukses)
            $que = "UPDATE pengguna SET password = '$enkrip' WHERE email = '$dbemail'";
            $hasil = mysqli_query($con, $que);

            if ($hasil) echo "<script language='javascript'> alert('Password Berhasil Dikirim, Silakan Cek Email Anda');
                                document.location='index.php';</script>";
            }
            else echo "<script language='javascript'> alert('Pengiriman Email Gagal');
                                document.location='lupa_password.php';</script>";
    }
    else
        {

            echo "<script language='javascript'> alert('Email tidak Terdaftar');
                                document.location='lupa_password.php';</script>";
        }
}
?>
