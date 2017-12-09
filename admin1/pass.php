<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['ses_user'])){
    header('');
}
 
$panitia=$_SESSION['ses_user'];
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
              document.location='index.php';</script>";
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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>change password | <?php $uper=strtoupper(@$_SESSION[ses_user]); echo "$uper"; ?></title>
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
    <a><b>Change password</b><br><?php $uper=strtoupper(@$_SESSION[ses_user]); echo "$uper"; ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"> </p>

    <form action="" method="post">
      <div class="form-group has-feedback">
       
        <input type="password" name="old_pass" class="form-control" placeholder="Password Lama">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="new_pass" class="form-control" placeholder="Password Baru">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="repeat" class="form-control" placeholder="Ulangi Password Baru">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div>
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="ubah" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
  

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="../admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
