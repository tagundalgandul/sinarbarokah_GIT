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
              <form  method="post" onsubmit="return formValidasi()" enctype="multipart/form-data" action="proses-tambah-produk.php">
                 <table class="table table-striped table-bordered table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Nama Produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_barang" placeholder="Nama Produk" id="namaproduk">
                        </div>
                      </td>
                    </tr>
                  </div>
                 <div class="form-group">
                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="harga" placeholder="Harga" id="harga">
                        </div>
                      </td>
                    </tr>
                  </div>
                </table>
                 <label for="email_address">Gambar</label>
                                <div class="form-group">
                                    <div class="form-line">
                                      <center>
                                        <input type="file" name="gambar" class="form-control">
                                      </center>
                                    </div>
                                </div>

                 <center><input type="Submit" name="tambah_produk" class="btn btn primary" />
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
