<?php
include 'header.php';
 $id_pengguna=$_SESSION['ses_id'];
  $query = mysqli_query($con, "SELECT * FROM pengguna where id_pengguna='$id_pengguna'");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Ubah Password
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Ubah Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <div class="box">
            <div class="box-header">
              <form name="" method="POST">
                <table class="table table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="password_lama"  placeholder="Masukan Password Lama">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="password_baru" required placeholder="Masukan Password Baru">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="konfirmasi_password"  id="inputEmail3" placeholder="Masukan Konfirmasi Password Baru">
                        </div>
                      </td>
                    </tr>       
                  </div>
                </table>
                  <center>
                 <button type="submit" name="ganti" class="btn btn-primary ">Save</button>
                  </center>
              </form>
            </div>
          <!-- /.box -->
          </div>
        <!-- /.col -->           
        </div>
      <!-- /.row -->  
      </div>
    </section>
  <!-- /.content-wrapper -->
  </div> 
<?php
include 'footer.php';
$id_pengguna=$_SESSION['ses_id'];
  if(isset($_POST['ganti'])){
    //membuat variabel untuk menyimpan data inputan yang di isikan di form
    $password_lama      = $_POST['password_lama'];
    $password_baru      = $_POST['password_baru'];
    $konfirmasi_password  = $_POST['konfirmasi_password'];
    $password_lama  = $password_lama;
    $cek      = mysqli_query($con,"SELECT password FROM pengguna WHERE id_pengguna='$id_pengguna'");
    
    if($cek->num_rows){
      if(strlen($password_baru) >= 5){
        if($password_baru == $konfirmasi_password){
          $password_baru  = password_hash($password_baru, PASSWORD_DEFAULT);
          
          $update     = mysqli_query($con,"UPDATE pengguna SET password='$password_baru' WHERE id_pengguna='$id_pengguna'");
          if($update){
            //kondisi jika proses query UPDATE berhasil
            echo '<script language="javascript">alert("Sukses Mengubah password");document.location="index.php"</script>';
          }else{
            //kondisi jika proses query gagal
           echo '<script language="javascript">alert("Gagal merubah password");document.location="change_password.php"</script>';
          }         
        }else{
          //kondisi jika password baru beda dengan konfirmasi password
          echo '<script language="javascript">alert("Konfirmasi password tidak cocok");document.location="change_password.php"</script>';
        }
      }else{
        //kondisi jika password baru yang dimasukkan kurang dari 6 karakter
       echo '<script language="javascript">alert("Minimal password baru adalah 5 karakter");document.location="change_password.php"</script>';
      }
    }else{
      //kondisi jika password lama tidak cocok dengan data yang ada di database
      echo '<script language="javascript">alert("Password lama tidak cocok");document.location="change_password.php"</script>';
    }
  }

?>