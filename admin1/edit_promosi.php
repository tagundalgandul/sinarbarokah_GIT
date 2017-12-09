<?php
include 'header.php';
$kd_promosi = $_GET['kd_promosi'];
$query = mysqli_query($con, "SELECT * FROM promosi");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit promosi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Edit promosi</li>
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
                        <label  class="col-sm-2 control-label">isi Promosi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="isi_promosi" value="<?php echo $data['isi_promosi']; ?>"  placeholder="nama kecamatan">
                        </div>
                      </td>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Tanggal Berlaku</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="tgl_berlaku" value="<?php echo $data['tgl_berlaku']; ?>"  placeholder="nama kecamatan">
                        </div>
                      </td>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Tanggal Berakhir</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="tgl_berakhir" value="<?php echo $data['tgl_berakhir']; ?>"  placeholder="nama kecamatan">
                        </div>
                      </td>       
                  </div>
                </table>
                  <center>
                 <button type="submit" class="btn-primary ">Reset</button>
                 <button type="submit" name="edit-promosi" class="btn-primary " value="submit">Save</button>
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

if(isset($_POST['edit-promosi'])) {
$isi_promosi =$_POST['isi_promosi'];
$tgl_berlaku =$_POST['tgl_berlaku'];
$tgl_berakhir =$_POST['tgl_berakhir'];
  
$query_update=mysqli_query($con, "UPDATE promosi SET isi_promosi='$isi_promosi', tgl_berlaku='$tgl_berlaku', tgl_berakhir='$tgl_berakhir'
                                  WHERE kd_promosi='$kd_promosi'" ) or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses Mengubah Data ");document.location="promosi.php"</script>';
}
?>
 }

?>
