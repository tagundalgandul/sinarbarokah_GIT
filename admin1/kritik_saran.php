<?php
include 'header.php';
$query = mysqli_query($con, "SELECT id_kritik_saran, nama_pelanggan, no_tlp, isi_kritik_saran, tanggal FROM kritik_saran join pelanggan using (id_pelanggan) ORDER BY id_kritik_saran ASC");
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Kritik Dan Saran
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Kritik Dan Saran</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              </div>
                <div class="box-body">
                 <table id="dataTables" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>NO HP</th>
                          <th>Tanggal</th>
                          <th>Kritik Dan Saran </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while(@$data = mysqli_fetch_array($query)){
                        ?>
                       <tr>
                        <td><?php echo "$data[id_kritik_saran] "; ?></td>
                        <td><?php echo "$data[nama_pelanggan]";?></td>
                        <td><?php echo "$data[no_tlp]"; ?></td>
                        <td><?php echo "$data[tanggal]"; ?></td>
                        <td><?php echo "$data[isi_kritik_saran]"; ?></td>
                        </tr>
                        <?php
                           }
                        ?>
                      </tbody>
                    </table>
            </div>
          </div>
        </div>
      </div>
      </div>
      </section>

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
