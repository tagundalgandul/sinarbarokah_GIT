<?php
include 'header.php';
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
        
        <li class="active">Tambah Penduduk</li>
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
                        <label  class="col-sm-2 control-label">Jumlah Penduduk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="jumlah_penduduk"  placeholder="jumlah penduduk">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Penduduk usia 20 ke atas</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="penduduk_20"  placeholder="">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-10">
                          <select name="tahun">
                            <option value=""></option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                          </select>
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama Kecamatan</label>
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
                 <button type="submit" name="tambah_penduduk" class="btn-primary " value="submit">Save</button>
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

 if(isset($_POST['tambah_penduduk'])) {
 $kd_penduduk = kd_penduduk(); 
 $jumlah_penduduk = $_POST['jumlah_penduduk'];
 $penduduk_20= $_POST['penduduk_20'];
 $tahun =$_POST ['tahun'];
 $kd_kecamatan =$_POST['kecamatan'];
// $jk =$_POST['jk'];
// $no_tlp =$_POST['no_tlp'];
// $kecamatan =$_POST['kecamatan'];  
 $query_update=mysqli_query($con, "INSERT into penduduk values ( '$kd_penduduk', '$jumlah_penduduk','$penduduk_20','$tahun','$kd_kecamatan' )") or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses menambah Data ");document.location="penduduk.php"</script>';
 }

?>
