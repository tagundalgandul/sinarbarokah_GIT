<?php
include 'header.php';
 $kd_barang=$_GET['kd_barang'];
  $query = mysqli_query($con, "SELECT * FROM produk where kd_barang='$_GET[kd_barang]'");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Produk
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Edit Produk</li>
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
                        <label class="col-sm-2 control-label">Nama Produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" placeholder="nama produk">
                        </div>
                      </td>
                    </tr>       
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="harga" value="<?php echo $data['harga'] ?>" placeholder="harga">
                        </div>
                      </td>
                    </tr>       
                  </div>

                </table>
                 <div class="form-group">
                  <label for="exampleInputFile"> Gambar</label>
                  <input type="file" name="gambar" id="exampleInputFile" value="<?php echo $data['gambar'];  ?>"><?php echo $data['gambar'];  ?>
                </div>
                        
                  <center>
                 <button type="submit" class="btn primary ">Reset</button>
                 <button type="submit" name="edit_produk" class="btn primary " value="submit">Save</button>
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

if(isset($_POST['edit_produk'])) {
$nama_barang =$_POST['nama_barang'];
$harga =$_POST['harga'];
$gambar =$_POST['gambar'];

  
$query_update=mysqli_query($con, "UPDATE produk SET nama_barang='$nama_barang', harga='$harga', gambar='$gambar' WHERE kd_barang='$kd_barang'" ) or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses Mengubah Data produk");document.location="produk.php"</script>';
}
?>
