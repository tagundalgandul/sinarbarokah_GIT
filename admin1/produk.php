<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM produk ");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Produk

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Data Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              </div>
              <?php
              if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "pemilik") {
              	?>
              <p align=" center"><a  href="tambah_produk.php"><button class="btn-primary">Tambah produk</button></a></p><br>
                 <!-- /.box-header -->
               <?php
                  }
               ?>
                  <div class="box-body">
                <div class="table-responsive">
                 <table id="dataTables" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Produk</th>
                          <th>Nama Produk</th>
                          <th>Harga</th>
                          <th>Gambar</th>
                          <?php
                      		if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "pemilik") {
                      	  ?>
                          <th>Opsi</th>
                          <?php
                            }
                          ?>
                        </tr>
                      </thead>
                       <tbody>
                        <?php
                          $no = 0;
                          while(@$data = mysqli_fetch_array($query)){
                          $no++;
                        ?>
                       <tr>
                        <td><?php echo "$no"; ?></td>
                        <td><?php echo "$data[kd_barang] "; ?></td>
                        <td><?php echo "$data[nama_barang]";?></td>
                        <td><?php echo rupiah($data['harga']); ?></td>
                        <td>
                            <img src="<?php echo "$data[gambar]"; ?>" alt="" width="100" height="100">
                        </td>
                      	<?php
                      		if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "pemilik") {
                      	?>
                        <td>
                          <a href="edit_produk.php?kd_barang=<?php echo "$data[kd_barang]" ?>"><i class="fa fa-pencil"></i> Edit</a>
                          <a href="hapus-produk.php?kd_barang=<?php echo $data['kd_barang'];?>"
                          onclick="return confirm('Yakin mau di hapus?');"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
                        </td>
                        <?php } ?>
                        </tr>
                        <?php
                           }
                        ?>
                      </tbody>
                    </table>
                   </div>
            </div>
          </div>
                <!-- /.box -->
        </div>
              <!-- /.col -->
      </div>

            <!-- /.row -->
      </div>
      </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
 <script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
                responsive: true
        });
    });
    </script>

<?php

include 'footer.php';
?>
