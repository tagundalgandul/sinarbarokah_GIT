<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM pengguna");

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
                 <!-- <p align=" center"><a  href="tambah_pengguna.php"><button class="btn-primary">Tambah pengguna</button></a></p><br> -->
                  <div class="box-body">
                 <table id="dataTables" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>id pengguna</th>
                          <th>Nama pengguna</th>
                          <th>Email</th>
                          <!-- <th>Password</th> -->
                          <th>Level</th>
                          <!-- <th>Opsi</th> -->
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
                       <!--  <td><?php echo "$data[password]"; ?></td> -->
                        <td><?php echo "$data[level]"; ?></td>
                        <!-- <td>
                          <a href="edit_pengguna.php?id_pengguna=<?php echo "$data[id_pengguna]" ?>"><i class="fa fa-pencil"></i>Edit</a>
                          
                          
                        </td> -->
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
    </script>

<?php

include 'footer.php'; 
?>
