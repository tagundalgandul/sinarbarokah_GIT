<?php
include 'header.php';
$kd_penduduk = $_GET['kd_penduduk'];
$query = mysqli_query($con, "SELECT * FROM penduduk");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Kecamatan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Tambah penduduk</li>
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
                        <label  class="col-sm-2 control-label">jumlah penduduk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="jumlah_penduduk" value="<?php echo $data['jumlah_penduduk']; ?>"  placeholder="nama kecamatan">
                        </div>
                      </td>
                      <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label"> penduduk usia 20</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="penduduk_20" value="<?php echo $data['penduduk_20']; ?>"  placeholder="nama kecamatan">
                        </div>
                      </td>
                    </tr>       
                  </div>
                </table>
                  <center>
                 <button type="submit" class="btn-primary ">Reset</button>
                 <button type="submit" name="edit-penduduk" class="btn-primary " value="submit">Save</button>
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

if(isset($_POST['edit-penduduk'])) {
$jumlah_penduduk =$_POST['jumlah_penduduk'];
$penduduk_20 =$_POST['penduduk_20'];
// $no_tlp =$_POST['no_tlp'];
// $nama_kecamatan =$_POST['nama_kecamatan'];
  
$query_update=mysqli_query($con, "UPDATE penduduk SET jumlah_penduduk='$jumlah_penduduk', penduduk_20='$penduduk_20' WHERE kd_penduduk='$kd_penduduk'" ) or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses Mengubah Data penduduk");document.location="penduduk.php"</script>';
}
?>
 }

?>
