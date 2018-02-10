<?php
   include 'header.php';

   $kd_barang=$_GET['kd_barang'];
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Gambar
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
              <form  method="POST"  enctype="multipart/form-data" action="proses_edit_gambar_produk.php">

                 <input type="hidden" class="form-control" name="kd_barang" value="<?php echo $kd_barang ?>" placeholder="nama produk">

                 <div class="form-group">
                  <label for="exampleInputFile"> Gambar</label>
                  <input type="file" name="gambar" id="exampleInputFile" >
                </div>


                <button type="submit" class="btn primary ">Reset</button>
                <button type="submit" name="edit_produk" class="btn primary " value="submit">Save</button>
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
