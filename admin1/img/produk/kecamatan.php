<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM kecamatan ORDER BY kd_kecamatan ASC");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kecamatan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Data kecamatan</li>
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
                 <p align=" center"><a  href="tambah_kecamatan.php"><button class="btn-primary">Tambah Kecamatan</button></a></p><br>
                  <div class="box-body">
                 <table id="dataTables" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>kd_kecamatan</th>
                          <th>Nama Kecamatan</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                           <!-- <th>Level</th>  -->
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
                        <td><?php echo "$data[kd_kecamatan] "; ?></td>
                        <td><?php echo "$data[nama_kecamatan]";?></td>
                        <td><?php echo "$data[latitude]"; ?></td>
                        <td><?php echo "$data[longitude]"; ?></td>
                       
                        <td>
                           <a href="edit_kecamatan.php?kd_kecamatan=<?php echo "$data[kd_kecamatan]" ?>"><i class="fa fa-pencil"></i>Edit</a>
                            <a href="hapus-kecamatan.php?kd_kecamatan=<?php echo $data['kd_kecamatan'];?>"
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
    </script>

<?php

include 'footer.php'; 
?>