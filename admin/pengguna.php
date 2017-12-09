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
        
        <li class="active">Data Pengguna</li>
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
                  <div class="box-body">
                     <table class="table table-striped table-bordered table-hover" id="dataTables">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>id pengguna</th>
                          <th>Nama pengguna</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Level</th>
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
                        <td><?php echo "$data[id_pengguna] "; ?></td>
                        <td><?php echo "$data[nama_pengguna]";?></td>
                        <td><?php echo "$data[email]"; ?></td>
                        <td><?php echo "$data[password]"; ?></td>
                        <td><?php echo "$data[level]"; ?></td>
                        </tr>           
                        <?php 
                           }
                        ?>  
                      </tbody>
                    </table>
                  </div>
                <!-- /.box -->
                </div>
              <!-- /.col -->
              </div>
              </div>
            <!-- /.row -->
          </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php data_javascript() ?>
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