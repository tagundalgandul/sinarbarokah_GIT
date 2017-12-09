<?php
include 'header.php';
$query = mysqli_query($con, "SELECT * FROM kelompok join promosi using(kd_promosi) ");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelompok
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active"> kelompok</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <div class="box">
            <div class="box-header">
              </div>
             <!--  <p align=" center"><a  href="tambah_produk.php"><button class="btn-primary">Tambah kelompok</button></a></p><br> -->
                 <!-- /.box-header -->
                  <div class="box-body">
                 <table id="dataTables" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Id Kelompok</th>
                          <th>Nama Kelompok</th>
                          <th>Promosi</th>
                          <!-- <th>Harga</th>
                          <th>Gambar</th>
                          <th>Opsi</th>  -->
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
                        <td><?php echo "$data[id_kelompok] "; ?></td>
                        <td><?php echo "$data[nama_kelompok]";?></td>
                        <td><?php echo "$data[isi_promosi]"; ?></td>
                      <!--  <td>
                         <a href="edit_produk.php?kd_barang=<?php echo "$data[kd_barang]" ?>"><i class="fa fa-pencil"></i> Edit</a>
                         <a href="hapus-produk.php?kd_barang=<?php echo $data['kd_barang'];?>" onclick="return confirm('Yakin mau di hapus?');"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
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