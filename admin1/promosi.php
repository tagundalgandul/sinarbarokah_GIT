<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM promosi ");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Promosi

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Data Promosi</li>
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
                  if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "penjualan") {
              ?>
                <p align=" center"><a  href="tambah-promosi.php"><button class="btn-primary">Tambah Promosi</button></a></p><br>
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
                <th>KD. Promosi</th>
                <th>Promosi</th>
                <th>Tanggal Berlaku</th>
                <th>Tanggal Berakhir</th>
                <?php
                  if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "penjualan") {
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
                while($data = mysqli_fetch_array($query)){
                $no++;
            ?>
            <tr>
              <td><?php echo "$no"; ?></td>
              <td><?php echo "$data[kd_promosi]"; ?></td>
              <td><p align="justify"> <?php echo "$data[isi_promosi]"; ?></p></td>
              <td><?php echo "$data[tgl_berlaku]";  ?></td>
              <td><?php echo "$data[tgl_berakhir]"; ?></td>
             <?php
                if(isset($_SESSION['ses_user']) && $_SESSION['ses_user'] != "penjualan") {
              ?>
              <td>
              <a href="edit_promosi.php?kd_promosi=<?php echo "$data[kd_promosi]" ?>"><i class="fa fa-pencil"></i> edit</a>
              <a href="hapus-promosi.php?kd_promosi=<?php echo "$data[kd_promosi]"?>" onClick="return confirm('Hapus ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
