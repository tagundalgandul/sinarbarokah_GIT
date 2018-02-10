<?php
include 'header.php';
 $id_pengguna=$_GET['id_pengguna'];
  $query = mysqli_query($con, "SELECT * FROM pengguna where id_pengguna='$_GET[id_pengguna]'");
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
              <form  method="POST" onsubmit="return formValidasi()" name="editpengguna">
                <table class="table table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Id Pengguna</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="id_pengguna" value="<?php echo $data['id_pengguna']; ?>" placeholder="Id Pengguna" readonly>
                        </div>
                      </td>
                    </tr>
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_pengguna" value="<?php echo $data['nama_pengguna'] ?>" placeholder="Nama Pengguna" id="namapenguna">
                        </div>
                      </td>
                    </tr>
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?>"  placeholder="Email" id="email">
                        </div>
                      </td>
                    </tr>
                  </div>
                  <!-- <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">password</label>
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="password" value="<?php echo $data['password'] ?>" placeholder="Password">
                        </div>
                      </td>
                    </tr>
                  </div> -->
                  <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">level</label>
                        <div class="col-sm-10">
                          <select name="level" class="textbox">
                          <option value="<?php echo $data['level'] ?>"><?php echo $data['level'] ?></option>
                          <option value=""></option>
                          <option value="admin">Admin</option>
                          <option value="pemilik">Pemilik</option>
                          <option value="penjualan">Penjualan</option>

                          </select>
                          </div>
                        </td>
                    </tr>
                  </div>
                </table>
                  <center>
                 <button type="reset" class="btn btn-primary">Reset</button>
                 <button type="submit" name="edit_pengguna" class="btn btn-primary" value="submit">Save</button>
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

    if(isset($_POST['edit_pengguna'])) {
      $nama_pengguna =$_POST['nama_pengguna'];
      $email =$_POST['email'];
      // $password = $_POST['password'];
      // $enkrip = password_hash($password,PASSWORD_DEFAULT);
      $level =$_POST['level'];

      $query_update=mysqli_query($con, "UPDATE pengguna SET nama_pengguna='$nama_pengguna', email='$email', level='$level' WHERE id_pengguna='$id_pengguna'" ) or die (mysqli_error($con));

      echo '<script language="javascript">alert("Sukses Mengubah Data pengguna");document.location="pengguna.php"</script>';
    }
?>
<script type="text/javascript">
function formValidasi(){
  var namaPenguna = $('#namapenguna').val();
  var email = $('#email').val();
  var level = document.editpengguna.level;

  if (namaPenguna == "") {
    alert ("Harap Isi Semua Bidang !!!");
    return false;
  }

  if (email == "") {
    alert ("Harap Isi Semua Bidang");
    return false;
  }

  if (level.selectedIndex < 1) {
    alert("Harap Isi Semua Bidang !!!");
    return false;
  }

  return true;
}

</script>
