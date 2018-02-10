<?php
include 'header.php';
$query = mysqli_query($con, "SELECT nama_kecamatan,kd_penduduk,jumlah_penduduk,penduduk_20,tahun  FROM penduduk JOIN kecamatan USING (kd_kecamatan)");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penduduk

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Data Penduduk</li>
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
                 <p align=" center"><a  href="tambah-penduduk.php"><button class="btn btn-primary">Tambah penduduk</button></a></p><br>
                  <div class="box-body">
                 <table id="dataTables" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kecamatan</th>
                          <th>KD Penduduk</th>
                          <th>Jumlah Penduduk</th>
                          <th>Penduduk Usia > 20 </th>
                          <th>Tahun</th>
                          <th>Opsi</th>
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
                        <td><?php echo "$data[nama_kecamatan]"; ?></td>
                        <td><?php echo "$data[kd_penduduk] "; ?></td>
                        <td><?php echo "$data[jumlah_penduduk]";?></td>
                        <td><?php echo "$data[penduduk_20]"; ?></td>
                        <td><?php echo "$data[tahun]"; ?></td>
                        <!-- <td><?php echo "$data[level]"; ?></td> -->
                        <td>
                           <a href="edit-penduduk.php?kd_penduduk=<?php echo "$data[kd_penduduk]" ?>"><i class="fa fa-pencil"></i> Edit</a>
                           <a href="hapus-penduduk.php?kd_penduduk=<?php echo $data['kd_penduduk'];?>"
                          onclick="return confirm('Yakin mau di hapus?');"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
                        </td>
                        </tr>
                        <?php
                           }
                        ?>
                      </tbody>
                    </table>
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

    function deselect(e) {
  $('.pop').slideFadeToggle(function() {
    e.removeClass('selected');
  });
}
    </script>

<?php

include 'footer.php';
?>
