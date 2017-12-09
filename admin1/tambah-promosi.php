<?php
include 'header.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Promosi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Tambah promosi</li>
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
                        <label  class="col-sm-2 control-label">Isi Promosi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="isi_promosi"  placeholder="Promosi">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Tanggal Berlaku</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="tgl_berlaku"  placeholder="Promosi">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Tanggal Berakhir</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="tgl_berakhir"  placeholder="Promosi">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                         
                        <input type="hidden" name="id_pengguna" value="<?php $uper=strtoupper(@$_SESSION[ses_id]); echo "$uper"; ?>">
                        </div>
                      </td>
                    </tr>       
                  </div>
                </table>
                  <center>
                 <button type="submit" class="btn-primary ">Reset</button>
                 <button type="submit" name="tambah_promosi" class="btn-primary " value="submit">Save</button>
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

 if(isset($_POST['tambah_promosi'])) {
    $kd_promosi =kd_promosi(); 
    $isi_promosi =$_POST['isi_promosi'];
    $id_pengguna = $_SESSION['ses_id'];
    $tgl_berlaku =$_POST['tgl_berlaku'];
    $tgl_berakhir =$_POST['tgl_berakhir'];
// $kecamatan =$_POST['kecamatan'];
  
    $queryTambahPromosi = "INSERT INTO promosi VALUES(  '$kd_promosi', '$isi_promosi','$id_pengguna', '$tgl_berlaku','$tgl_berakhir' )";

    $query_update = mysqli_query($con,$queryTambahPromosi) or die (mysqli_error($con));
    echo '<script language="javascript">alert("Sukses Menyimpan Data Promosi");document.location="promosi.php";</script>';
 }

?>
