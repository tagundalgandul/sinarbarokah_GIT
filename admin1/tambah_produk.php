<?php
include 'header.php';

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
        
        <li class="active">Tambah Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <div class="box">
            <div class="box-header">
              <form  method="POST" action="">
                 <table class="table table-striped table-bordered table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Nama Produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_barang" placeholder="Nama Produk">
                        </div>
                      </td>
                    </tr>       
                  </div>
                 <div class="form-group">
                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="harga" placeholder="Harga">
                        </div>
                      </td>
                    </tr>       
                  </div>
                </table>
                 <label for="email_address">Gambar</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                </div> 
                 
                 <center><input type="Submit" name="tambah_produk" class="btn-btn" />
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
if (isset($_POST['tambah_produk'])) {
 $kd_barang =kd_barang();
 $nama_barang= $_POST['nama_barang'];
 $harga= $_POST['harga'];
 $gambar= $_POST['gambar'];
$query=mysqli_query($con,"INSERT INTO produk VALUES('$kd_barang', '$nama_barang', '$harga','$gambar') " ) or die(mysqli_error($con));
echo '<script language="javascript">alert("Sukses Mengubah Data produk");document.location="produk.php"</script>';
}
?>