<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM sms ");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         SMS

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Data SMS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              </div>
              <p align=" center"><a  href="tambah-sms.php"><button class="btn btn-primary">Tambah SMS</button></a></p><br>
                 <!-- /.box-header -->
                  <div class="box-body">
                    <div class="table-responsive">
                 <table id="dataTables" class="table table-bordered table-striped">
                       <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode SMS</th>
                          <th>KD Promosi</th>
                          <th>ISI SMS</th>
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
                        <td><?php echo "$data[kd_sms] "; ?></td>
                        <td><?php echo "$data[kd_promosi]"; ?></td>
                        <td><p align="justify"> <?php echo "$data[isi_sms]";?></p></td>
                        <td>
                         <a href="edit_sms.php?kd_sms=<?php echo "$data[kd_sms]" ?>"><i class="fa fa-pencil"></i> Edit</a>
                         <a href="hapus-sms.php?kd_sms=<?php echo $data['kd_sms'];?>" onclick="return confirm('Yakin mau di hapus?');"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
                        </td>
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
