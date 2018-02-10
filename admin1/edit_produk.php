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
              <form  method="POST" onsubmit="return formValidasi()"  enctype="multipart/form-data" action="proses_edit_produk.php" id="editproduk">
                <table class="table table-hover">
                  <div class="form-group">

                      <input type="hidden" class="form-control" name="kd_barang" value="<?php echo $data['kd_barang']; ?>" placeholder="nama produk">

                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Nama Produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" placeholder="nama produk" id="namaproduk">
                        </div>
                      </td>
                    </tr>
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="harga" value="<?php echo $data['harga'] ?>" placeholder="harga" id="harga">
                        </div>
                      </td>
                    </tr>
                  </div>

                </table>
                 <div class="form-group">
                   <a href="form-ubah-gambar.php?kd_barang=<?php echo $data['kd_barang'];?>" class="btn btn-default"> Ubah Gambar </a>
                  <!-- <label for="exampleInputFile"> Gambar</label>
                  <input type="file" name="gambar" id="exampleInputFile" value="<?php echo $data['gambar'];  ?>"><?php echo $data['gambar'];  ?> -->
                </div>

                  <center>
                 <button type="reset" class="btn primary ">Reset</button>
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
  <script type="text/javascript">
    function formValidasi(){
      var namaproduk= $('#namaproduk').val();
      var harga = $('#harga').val();
      var angka = /^[0-9]+/;


      if (namaproduk == "") {
        alert ("Harap isi Semua Bidang");
        return false;
      }
      if (harga == "") {
        alert ("Harap isi semua bidang !!!");
        return false;
      }
      if (!harga.match(angka)) {
          alert ("harap isi harga dengan angka !!!");
          return false;
      }
      return true;
    }

  </script>
