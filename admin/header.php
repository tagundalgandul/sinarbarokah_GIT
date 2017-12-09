<?php 

 include "lib_func.php";
 session_start();

 if((@$_SESSION['ses_user'] != "") && ($_SESSION['ses_password'] != ""))
 {
$query = mysqli_query($con, "SELECT * FROM pengguna");
$data   = mysqli_fetch_array($query);

      

?>
<!DOCTYPE html>
<html>
<head>
<?php data_css () ?>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper" >


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
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php $uper=strtoupper(@$_SESSION[ses_user]); echo "$uper"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php $uper=strtoupper(@$_SESSION[ses_pengguna]); echo "$uper"; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">cange password</a>
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
  </div>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p align="center"> <?php $uper=strtoupper(@$_SESSION[ses_pengguna]); echo "$uper"; ?></p>
         
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
                
        <li class="treeview">
          <a href="">
            <i class="fa fa-users"></i>
            <span>pengguna</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pengguna.php"><i class="fa fa-user"></i> data pengguna</a></li>
            <li><a href="tambah_pengguna.php"><i class="fa fa-user"></i> Tambah Pengguna</a></li>
          </ul>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php
}
?>