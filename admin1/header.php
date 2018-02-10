<?php
 include "koneksi.php";
 include "lib_func.php";
 session_start();
 if(!isset($_SESSION['ses_user'])){
     header("Location:login.php");
 }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Sinar Barokah</title>
  <link rel="icon" type="image/png" href="img/logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


      <!-- jQuery 2.2.0 -->
  <script src="../admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../admin/bootstrap/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../admin/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../admin/dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../admin/dist/js/demo.js"></script>

  <!-- page script -->
  <!-- chart js  -->
  <link rel="stylesheet" href="../css/chartjs.css">
  <script src="../js/Chart.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sinar Barokah</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">

            <ul class="dropdown-menu">
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->

            <ul class="dropdown-menu">
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                  <li>

                  </li>
                </ul>
              </li>
              <li class="footer"></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">

            <ul class="dropdown-menu">

                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                </ul>
              </li>
              <li class="footer">

              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <span class="hidden-xs"> <?php $uper=strtoupper(@$_SESSION[ses_user]); echo "$uper"; ?></span>-
              <span class="hidden-xs"> <?php $uper=strtoupper(@$_SESSION[ses_pengguna]); echo "$uper"; ?></span>
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php $uper=strtoupper(@$_SESSION[ses_pengguna]); echo "$uper"; ?>
                  <small><?php $uper=strtoupper(@$_SESSION[ses_email]); echo "$uper"; ?></small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="change_password.php?id_pengguna=<?php echo $_SESSION['ses_id'];  ?>" class="btn btn-default btn-flat">cange password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>

          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"><br>
        </div>
        <div class="pull-left info">
           <?php $uper=strtoupper(@$_SESSION[ses_pengguna]); echo "$uper"; ?><br>

        </div>
      </div>
      <!-- search form -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
            </span>
          </a>
        </li>

       <?php if ($_SESSION['ses_user']=='admin' ) {?>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-briefcase"></i>
            <span>Pengolahan Data Master</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pengguna.php"><i class="fa fa-user"></i> Data Pengguna</a></li>
            <!-- <li><a href="tambah_pengguna.php"><i class="fa fa-user"></i> Tambah Pengguna</a></li> -->
            <li><a href="kecamatan.php"><i class="fa fa-file"></i> Data kecamatan</a></li>
            <li><a href="penduduk.php"><i class="fa fa-file"></i> Data Penduduk</a></li>
            <!-- <li><a href="datapenjualan.php"><i class="fa  fa-envelope"></i> data penjualan</a></li> -->
          </ul>
        </li>
        <?php
          }elseif ($_SESSION['ses_user']=='pemilik'){?>
           <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-briefcase"></i>
            <span>Pengolahan Data Master</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pengguna.php"><i class="fa fa-user"></i> Data Pengguna</a></li>
            <li><a href="pelanggan.php"><i class="fa fa-user"></i> Data Pelanggan</a></li>
             <li><a href="kelompok.php"><i class="fa fa-users"></i> kelompok</a></li>
              <li><a href="datapenjualan.php"><i class="glyphicon glyphicon-shopping-cart"></i> Data Transaksi</a></li>
              <li><a href="produk.php"><i class="glyphicon glyphicon-briefcase"></i> Data Produk</a></li>
              <li><a href="promosi.php"><i class="fa  fa-envelope"></i> Data Promosi</a></li>
              <li><a href="sms.php"><i class="fa  fa-envelope"></i> Data SMS</a></li>
              <li><a href="kritik_saran.php"><i class="fa  fa-envelope"></i> Data Kritik Dan Saran</a></li>
            <!-- <li><a href="pangsa-pasar.php"><i class="fa fa-file"></i> Hasil Pangsa Pasar</a></li> -->
            <!-- <li><a href="tambah_penjualan.php"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah transaksi</a></li> -->
          </ul>
           <li class="treeview">
          <a href="pangsa-pasar.php">
            <i class="fa fa-file"></i>
            <span>analisis pangsa pasar</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
        </li>
         <li class="treeview">
          <a href="pengelompokan.php">
            <i class="fa fa-file"></i>
            <span>Analisis Penentuan pemberian <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; promosi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
        </li>
           <?php
          }
          else{?>
           <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-briefcase"></i>
            <span>Pengolahan Data Master</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="produk.php"><i class="glyphicon glyphicon-briefcase"></i> Data Produk</a></li>
            <li><a href="promosi.php"><i class="fa  fa-envelope"></i> Data Promosi</a></li>
            <li><a href="pelanggan.php"><i class="fa fa-user"></i> Data Pelanggan</a></li>
            <li><a href="transaksi.php"><i class="glyphicon glyphicon-shopping-cart"></i> Data Transaksi</a></li>
            <!-- <li><a href="tambah_produk.php"><i class="glyphicon glyphicon-briefcase"></i> Tambah Produk</a></li> -->
          </ul>
        </li>
      </ul>
        <?php
}
        ?>
    </section>
    <!-- /.sidebar -->
  </aside>
