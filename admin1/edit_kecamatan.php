<?php
include 'header.php';
$kd_kecamatan = $_GET['kd_kecamatan'];
$query = mysqli_query($con, "SELECT * FROM kecamatan");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Kecamatan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Edit kecamatan</li>
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
                        <label  class="col-sm-2 control-label">Nama Kecamatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $data['nama_kecamatan']; ?>"  placeholder="nama kecamatan">
                        </div>
                      </td>       
                  </div>
                </table>
                  <center>
                 <button type="submit" class="btn-primary ">Reset</button>
                 <button type="submit" name="edit-kecamatan" class="btn-primary " value="submit">Save</button>
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

if(isset($_POST['edit-kecamatan'])) {
$nama_kecamatan =$_POST['nama_kecamatan'];
// $penduduk_20 =$_POST['penduduk_20'];
// $no_tlp =$_POST['no_tlp'];
// $nama_kecamatan =$_POST['nama_kecamatan'];
  
$query_update=mysqli_query($con, "UPDATE kecamatan SET nama_kecamatan='$nama_kecamatan' WHERE kd_kecamatan='$kd_kecamatan'" ) or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses Mengubah Data ");document.location="kecamatan.php"</script>';
}
?>
 }

?>
