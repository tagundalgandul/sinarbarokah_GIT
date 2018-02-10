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
        Data Transaksi

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Data Transaksi</li>
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
                 <!-- <p align=" center"><a  href="tambah_kecamatan.php"><button class="btn-primary">Tambah Kecamatan</button></a></p><br> -->
                  <div class="box-body">
                    <div class="row">
            <div class="col-lg-12">
              <form enctype="multipart/form-data" method="post" target="_self" class="form-horizontal form-label-left" onsubmit="return formValidasi()" id="lihat">
                            <div class="col-md-5">
                              <div class="control-group">
                                <center><label>Tanggal Awal</label></center>
                                <input type="date" class="form-control" name="awal" id="awal">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="control-group">
                              <center><label>Tanggal akhir</label></center>
                                <input type="date" class="form-control" name="akhir" id="akhir">
                              </div>
                            </div>
                            <div class="clearfix"></div><br/>
                            <div class="col-md-10">
                              <div class="control-group">
                                <center><input type="submit" class="btn btn-success" name="lihat" value="Lihat Data Transaksi" onclick=""></center>
                              </div>
                            </div>
                    </form>
                       <br>
                       <div class="clearfix"></div><br/>
                       <?php
                       if(isset($_POST['lihat'])){
                          $awal = $_POST['awal'];
                          $akhir = $_POST['akhir'];
                        ?>
                        <div class="x_panel">
                          <div class="x_title">
                            <center><h2>Data Transaksi Tanggal <?php echo TanggalIndo($awal).' s/d '.TanggalIndo($akhir) ?></h2></center><br>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Tanggal</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Qty</th>
                                  <th>Subtotal</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                $query=mysqli_query($con,"SELECT kd_barang,tgl_transaksi,nama_barang,sum(qty) AS 'qty',sum(sub_total) AS 'sub_total'
                                FROM det_transaksi JOIN transaksi USING(no_faktur) JOIN produk USING(kd_barang)
                                WHERE tgl_transaksi BETWEEN '$awal' AND '$akhir' GROUP BY tgl_transaksi, kd_barang, nama_barang ORDER BY tgl_transaksi");
                                $no=1;
                                $total=0;
                                $totalqty=0;
                                while(@$row=mysqli_fetch_array($query)){
                              ?>
                                <tr>
                                  <td><?php echo TanggalIndo($row['tgl_transaksi'])?></td>
                                  <td><?php echo $row['kd_barang']?></td>
                                  <td><?php echo $row['nama_barang']?></td>
                                  <td><?php echo $qt = $row['qty']?></td>
                                  <td><?php echo rupiah($tot = $row['sub_total'])?></td>
                                </tr>
                              <?php
                                  $no++;
                                  $total= $total+$tot;
                                  $totalqty = $totalqty+$qt;
                                }
                              ?>
                                <tr style="background-color: yellow">
                                  <td colspan="3" align="center">Total</td>
                                  <h4><td><?php echo $totalqty?></td>
                                  <td><?php echo rupiah($total)?></td></h4>
                                </tr>
                              </tbody>
                            </table>
                            <br>
                              <!-- <center>
                              <button class="btn btn-success" onclick="window.open('print-penjualan.php?awal=<?php echo $awal.'&akhir='.$akhir?>','','height=600,width=800')">Cetak Laporan</button>
                            </center> -->
                          </div>
                        </div>
                        <div class="clearfix"></div><br/>
                      <?php }
                      ?>

            </div>
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

    function formValidasi(){
        var longitude = $('#awal').val();
        var latitude = $('#Akhir').val();
        if (awal == ""){
           alert("Harap Isi Semua Bidang !!!");
           return false;
        }
        if (akhir == ""){
           alert("Harap Isi Semua Bidang !!!");
           return false;
        }
        return true;
    }

    </script>

<?php

include 'footer.php';
?>
