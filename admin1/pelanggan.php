<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM pelanggan join kecamatan using (kd_kecamatan)");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pelanggan

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Data Pelanggan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              </div>
                 <!-- /.box-header -->
                 <?php
                  if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "pemilik") {
                 ?>
                  <p align=" center"><a  href="tambah_pelanggan.php"><button class="btn-primary">Tambah Pelanggan</button></a></p><br>
                <?php
                  }
                ?>
            <div class="box-body">
              <div class="table-responsive">
                <table id="dataTables" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>id pelanggan</th>
                          <th>Nama pelanggan</th>
                          <th>jenis kelamin</th>
                          <th>no HP</th>
                          <th>zona</th>
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
                        <td><?php echo "$data[id_pelanggan] "; ?></td>
                        <td><?php echo "$data[nama_pelanggan]";?></td>
                        <td><?php echo "$data[jk]"; ?></td>
                        <td><?php echo "$data[no_tlp]"; ?></td>
                        <td><?php echo "$data[nama_kecamatan]"; ?></td>
                        <?php
                          if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "pemilik") {
                        ?>
                        <td>
                          <center>
                          <a href="edit_pelanggan.php?id_pelanggan=<?php echo "$data[id_pelanggan]" ?>"><i class="fa fa-pencil"></i> Edit</a>
                          <a href="hapus-pelanggan.php?id_pelanggan=<?php echo $data['id_pelanggan'];?>"onclick="return confirm('Yakin mau di hapus?');"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                         </center>
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
