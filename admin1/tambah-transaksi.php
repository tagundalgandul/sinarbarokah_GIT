<?php
include 'header.php';
if(empty($_SESSION['no_faktur'])){
  $_SESSION['no_faktur']=no_faktur();
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Transaksi
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

              <form method="post" id='datatransaksi'>
                <center>No Faktur : <?php echo $_SESSION['no_faktur']?></center><br><br>
                  <div class="clearfix"></div> 
                    <center><input type="hidden" name="no_faktur" value="<?php echo $_SESSION['no_faktur']?>">
                            <input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['ses_id'];?>"></input>
                      <div class="col-md-4">
                        <label>Tanggal</label>
                          <input type="date" id="tgl" value="<?php echo date('Y-m-d')?>" class="form-control" name="tanggal" placeholder="Tanggal penjualan" >
                      </div>
                      <div class="col-md-4">
                        <label>Nama Pelanggan</label>
                          <select name="pelanggan" class="form-control" >
                            <option></option>
                              <?php
                                $sql = mysqli_query($con, "SELECT * FROM pelanggan");
                                while($data=mysqli_fetch_array($sql)){
                                  echo '<option value="'.$data['id_pelanggan'].'"> '.$data['nama_pelanggan'].'</option>';
                                }
                              ?>
                          </select>   
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-4">
                        <label>Produk</label>
                          <select name="kd_barang" class="form-control" >
                            <option></option>
                              <?php
                                $sql = mysqli_query($con, "SELECT * FROM produk");
                                while($data=mysqli_fetch_array($sql)){
                                  echo '<option value="'.$data['kd_barang'].'"> '.$data['nama_barang'].'</option>';
                                }
                              ?>
                          </select>
                      </div>
                      <div class="col-md-4">
                        <label>QTY</label>
                          <input type="text"  class="form-control" name="qty" placeholder="QTY" >
                      </div>
                      <div class="clearfix"></div><br />
                        <a id="simpan" class="btn btn-primary">Simpan</a>
                        <a class="btn btn-success" href="selesai-transaksi.php">Selesai</a>
                  </center>
              </form>

               <br />
        <br />
    
        <table class="table table-hover" id="data-penjualan">
        <thead>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Subtotal</th>
          <!-- <th>Opsi</th> -->
        </thead>
        <tbody>
   <?php 
      $total = 0; 
      $sql = mysqli_query($con,"SELECT * FROM det_transaksi JOIN produk USING(kd_barang) WHERE no_faktur='".$_SESSION['no_faktur']."'")or die(mysqli_error($con));
         while($data=mysqli_fetch_array($sql)){ ?>
      <tr>
        <td><?php echo $data['kd_barang'];?></td>
        <td><?php echo $data['nama_barang'];?></td>
        <td><?php echo $data['harga'];?></td>
        <td><?php echo $data['qty'];?></td>
        <td><?php echo $data['sub_total'];?></td>
        <td><a href="hapus-detail-penjualan.php?kd_barang=<?php echo $data['kd_barang'] ?>&no_faktur=<?php echo $_SESSION['no_faktur'] ?>" ><i class="glyphicon glyphicon-trash"></i></a></td>
      </tr>

  <?php
      $total1 = $total+$data['sub_total'];
    }
  ?>
                <tr> 
                  <td></td>
                  <td></td>
                  <td><h4><b>Total </b></h4></td>
                  <td><h4><b> :</b></h4></td>
                  <td><h4><b><?php  ?></b></h4></td>
                </tr>
            </table>

  <script type="text/javascript">
  $(document).ready(function(){
    $("#simpan").click(function(){
      var data = $('#datatransaksi').serialize();
      var nama = 'oky';

      $.ajax({
         type: 'POST',
         url : 'proses-simpan-transaksi.php',
         data : data,
         success: function(data){
            console.log(data);
            $('#data-penjualan').load("tampil-transaksi.php?act=<?php echo '$no_faktur'?>");
            document.getElementById('qty').value="";
            document.getElementById('tgl').disabled="true";
         }
      })


      // $.ajax({
      //   type : 'GET',
      //   url  : "proses-simpan-transaksi.php",
      //   data : {'nama' :'uden'},
      //   success: function() {
      //     // $('#data-penjualan').load("tampil-transaksi.php?act=<?php echo $_SESSION['no_faktur']?>");
      //     $('#data-penjualan').load("proses-simpan-transaksi.php");
          
      //       // document.getElementById('qty').value="";
      //       // document.getElementById('tgl').disabled="true";
      //   }

      // });
    });
  });

  </script>
            </div>
          <!-- /.box -->
          </div>
        <!-- /.col -->           
        </div>
      <!-- /.row -->  
      </div>
    </section>
  <!-- /.content-wrapper -->
  </div> 
 
<?php
include 'footer.php'; 


?>
