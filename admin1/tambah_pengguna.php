<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM pengguna");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengguna
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Data Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <div class="box">
            <div class="box-header">
              <form  method="POST">
                <table class="table table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_pengguna"  placeholder="nama pengguna">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="email" class="form-control"   placeholder="Email">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password"  placeholder="password">
                        </div>
                      </td>
                    </tr>       
                  </div>
                   <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-10">
                          <select name="level" class="textbox">
                          <option value=""></option>
                          <option value="admin">admin</option>
                          <option value="Pemilik">Pemilik</option>
                          <option value="penjualan">Penjualan</option>
                          </select>
                          </div>
                        </td>
                    </tr>       
                  </div>
                </table>
                  <center>
                 <button type="submit" class="btn primary ">Reset</button>
                 <button type="submit" name="tambah_pengguna" class="btn primary " value="submit">Save</button>
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

if(isset($_POST['tambah_pengguna'])) {
 $id_pengguna =id_pengguna(); 
$nama_pengguna =$_POST['nama_pengguna'];
$email =$_POST['email'];
$password =$_POST['password'];
$enkrip = password_hash($password, PASSWORD_DEFAULT);
$level =$_POST['level'];
  
$query_update=mysqli_query($con, "insert into pengguna values ( '$id_pengguna', '$nama_pengguna', '$email', '$enkrip', '$level' )") or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses Menambah Data pengguna");document.location="pengguna.php"</script>';
}
?>
