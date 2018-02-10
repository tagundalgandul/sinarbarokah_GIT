<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM transaksi join pelanggan using(id_pelanggan) ORDER BY no_faktur ASC");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active"> transaksi</li>
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
                <p align=" center"><a  href="tambah-transaksi.php"><button class="btn-primary">Tambah transaksi</button></a></p><br>
              <?php
                }
              ?>
                 <!-- /.box-header -->
                  <div class="box-body">
                    <div class="table-responsive">
                      <table id="dataTables" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>No_faktur</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total</th>
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
                            <td><?php echo "$data[no_faktur] "; ?></td>
                            <td><?php echo "$data[nama_pelanggan]";?></td>
                            <td><?php echo "$data[tgl_transaksi]";?></td>
                            <td><?php echo rupiah($data['total']); ?></td>
                            <?php
                              if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "pemilik") {
                            ?>
                            <td>
                            <a href="detail-transaksi.php?no_faktur=<?php echo "$data[no_faktur]" ?>"><i class="fa fa-pencil"></i> detail</a>
                            <a href="hapus-transaksi.php?no_faktur=<?php echo $data['no_faktur'];?>" onclick="return confirm('Yakin mau di hapus?');"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
                            </td>
                            <?php
                              }
                            ?>
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
