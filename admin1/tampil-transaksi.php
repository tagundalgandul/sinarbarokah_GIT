<?php
  session_start();
  include "koneksi.php";
  include "lib_func.php";
  if($_GET['act']){
    $act = $_GET['act'];
  ?>
  <table class="table table-border">
        <thead>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Subtotal</th>
          <th>Opsi</th>
        </thead>
        <tbody>
   <?php

  $totalweh2 = 0;
   $sql = mysqli_query($con,"SELECT * FROM det_transaksi JOIN transaksi USING(no_faktur) JOIN produk USING(kd_barang) WHERE no_faktur='".$_SESSION['no_faktur']."'")or die(mysqli_error($con));
  while($data=mysqli_fetch_array($sql)){ ?>
  <tr>
    <td><?php echo $data['kd_barang'];?></td>
    <td><?php echo $data['nama_barang'];?></td>
    <td><?php echo rupiah($data['harga']);?></td>
    <td><?php echo $data['qty'];?></td>
    <td><?php echo rupiah($data['sub_total']);?></td>
    <td><a href="hapus-detail-penjualan.php?kd_barang=<?php echo $data['kd_barang'] ?>&no_faktur=<?php echo $_SESSION['no_faktur'] ?>" ><i class="glyphicon glyphicon-trash"></i></a></td>
  </tr>

<?php
    $totalweh2 = $totalweh2+$data['sub_total'];
  }
?>
                <tr>

                   <td></td>
                    <td></td>
                   <td><h4><b>Total </b></h4></td>
                   <td><h4><b> :</b></h4></td>
                   <td><h4><b><?php echo rupiah($totalweh2);
                     ?></b></h4></td>
                </tr>
    </table>

   <?php

    }
  ?>
