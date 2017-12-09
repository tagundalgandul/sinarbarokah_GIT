<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM pelanggan join kecamatan using (kd_kecamatan)");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Pelanggan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Tambah Pelanggan</li>
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
                        <label  class="col-sm-2 control-label">Nama Pelanggan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_pelanggan"  placeholder="nama pelanggan">
                        </div>
                      </td>
                    </tr>       
                  </div>
                   <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <select name="jk" class="textbox">
                          <option value=""></option>
                          <option value="L">Laki-laki</option>
                          <option value="P">Perempuan</option>
                          </select>
                          </div>
                        </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">No Hp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="no_tlp"  placeholder="No HP">
                        </div>
                      </td>
                    </tr>       
                  </div>
                   <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Zona</label>
                        <div class="col-sm-10">
                          <select name="kecamatan">
                          <option value="kecamatan"></option>
                           <?php
                              $sql1 = mysqli_query($con, "select * from kecamatan");
                              if(mysqli_num_rows($sql1)!=0){
                                while($data2=mysqli_fetch_array($sql1)){
                                  echo '<option value='.$data2['kd_kecamatan'].'>'.$data2['nama_kecamatan'].'</option>';
                                }
                              }
                            ?>
                          
                          </select>
                          </div>
                        </td>
                    </tr>       
                  </div>
                </table>
                  <center>
                 <button type="submit" class="btn-primary ">Reset</button>
                 <button type="submit" name="tambah_pelanggan" class="btn-primary " value="submit">Save</button>
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

if(isset($_POST['tambah_pelanggan'])) {
 $id_pelanggan =id_pelanggan(); 
$nama_pelanggan =$_POST['nama_pelanggan'];
$jk =$_POST['jk'];
$no_tlp =$_POST['no_tlp'];
$kecamatan =$_POST['kecamatan'];
  
$query_update=mysqli_query($con, "insert into pelanggan values ( '$id_pelanggan', '$nama_pelanggan', '$jk', '$no_tlp', '$kecamatan' )") or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses menambah Data pelanggan");document.location="pelanggan.php"</script>';
}
?>
