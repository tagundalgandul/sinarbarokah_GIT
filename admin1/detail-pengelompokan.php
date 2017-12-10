<?php
include 'header.php';
$bulan = $_POST['bulan'];
$queryLRFM = "SELECT nama_pelanggan,id_pelanggan,L,R,F,M,
                     IF(L >=
                           (SELECT ROUND(AVG(L),1) AS Rerata_L
                            FROM (SELECT nama_pelanggan,
                                         MAX(tgl_transaksi) - MIN(tgl_transaksi) AS L
                                  FROM transaksi
                                  INNER JOIN pelanggan
                                  USING(id_pelanggan)
                                  WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m')='$bulan'
                                  GROUP BY nama_pelanggan)
                            AS Rerata_LRFM)
                            ,'1','0')
                     AS hasil_L,
                     IF(R >=
                           (SELECT ROUND(AVG(R),1) AS Rerata_R
                            FROM (SELECT nama_pelanggan,
                                         MAX(DATE_FORMAT(tgl_transaksi,'%d')) AS R
                                  FROM transaksi
                                  INNER JOIN pelanggan
                                  USING(id_pelanggan)
                                  WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m')='$bulan'
                                  GROUP BY nama_pelanggan)
                            AS Rerata_LRFM)
                            ,'1','0')
                     AS hasil_R,
                     IF(F >=
                           (SELECT ROUND(AVG(F),1) AS Rerata_F
                            FROM (SELECT nama_pelanggan,
                                         COUNT(id_pelanggan) AS F
                                  FROM transaksi
                                  INNER JOIN pelanggan
                                  USING(id_pelanggan)
                                  WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m')='$bulan'
                                  GROUP BY nama_pelanggan)
                            AS Rerata_LRFM)
                            ,'1','0')
                     AS hasil_F,
                     IF(M >=
                           (SELECT ROUND(AVG(M),1) AS Rerata_M
                            FROM (SELECT nama_pelanggan,
                                         SUM(total) AS M
                                  FROM transaksi
                                  INNER JOIN pelanggan
                                  USING(id_pelanggan)
                                  WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m')='$bulan'
                                  GROUP BY nama_pelanggan)
                            AS Rerata_LRFM)
                            ,'1','0')
                     AS hasil_M
        FROM (
              SELECT nama_pelanggan,id_pelanggan,
                     MAX(tgl_transaksi) - MIN(tgl_transaksi) AS L,
                     MAX(DATE_FORMAT(tgl_transaksi,'%d') ) AS R,
                     COUNT(id_pelanggan) AS F,
                     SUM(total) AS M
              FROM transaksi INNER JOIN pelanggan USING(id_pelanggan)
              WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m')='$bulan'
              GROUP BY nama_pelanggan,id_pelanggan
            ) as LRFM ";

$hasil = mysqli_query($con,$queryLRFM) or die(mysqli(error($con)));

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengelompokan Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Data Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"></div>
                 <!-- /.box-header -->
                  <div class="box-body">

                    <center>
                      <h1>Detail Pengelompokan</h1>
                      <hr>
                    </center>
                    <a class="btn btn-primary"
                       style="float: right"
                       onclick="kirimsmsall('<?php echo $bulan ?>')">
                      Kirim SMS ke Semua
                    </a><br>
                    <table class="table">
                      <tr>
                        <th>Nama Pelanggan</th>
                        <th>L</th>
                        <th>R</th>
                        <th>F</th>
                        <th>M</th>
                        <th>Kelompok Pelanggan</th>

                        <th>Promosi</th>
                        <th>Opsi</th>
                      </tr>
                   <?php
                      while ($hasilLRFM = mysqli_fetch_assoc($hasil)) {
                   ?>
                     <tr>
                       <td><?=$hasilLRFM['nama_pelanggan'];?></td>
                       <td><?php echo $hasilLRFM['L'] ?></td>
                       <td><?php echo $hasilLRFM['R'] ?></td>
                       <td><?php echo $hasilLRFM['F'] ?></td>
                       <td><?php echo $hasilLRFM['M'] ?></td>
                       <td>
                          <?php
                             echo golonganPelanggan($hasilLRFM['hasil_L'],
                                                    $hasilLRFM['hasil_R'],
                                                    $hasilLRFM['hasil_F'],
                                                    $hasilLRFM['hasil_M'])
                          ?>
                       </td>
                       <td>
                         <?php
                            echo $pesan = promosiKelompokPelanggan(golonganPelanggan($hasilLRFM['hasil_L'],
                                                   $hasilLRFM['hasil_R'],
                                                   $hasilLRFM['hasil_F'],
                                                   $hasilLRFM['hasil_M']));

                         ?>
                       </td>
                         <?php
                                 $kdPromosi = ambilKodePromosi(golonganPelanggan($hasilLRFM['hasil_L'],
                                                                                 $hasilLRFM['hasil_R'],
                                                                                 $hasilLRFM['hasil_F'],
                                                                                 $hasilLRFM['hasil_M']));
                         ?>
                       <td>
                          <a id="kirimsms" class="btn btn-primary" onclick="kirimsms('<?php echo $hasilLRFM['id_pelanggan']?>',
                                                                                     '<?php echo $kdPromosi ?>')">
                            Kirim SMS
                          </a>
                        </td>
                     </tr>
                   <?php
                      }
                   ?>

                    </table>

                  </div>
                  <?php print($bulan)?>
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
    $("#btn-tampilChart").click(function(){
        $('#tampilChart').load("tampil-chart.php");
    })
 </script>

<?php

include 'footer.php';
?>
<script type="text/javascript">
function kirimsms(idPelanggan,kdPromosi){
    $.ajax({
      method : "POST",
      url  : "kirimsms1.php",
      data : {'idPelanggan' : idPelanggan,
              'kdPromosi'   : kdPromosi},
      success : function(response){
        alert('Pesan Terkirim')
      }
    })
}

function kirimsmsall(bulan){
    $.ajax({
      method : "POST",
      url  : "kirimsms.php",
      data : {'bulan' : bulan},
      success : function(response){
        alert(response)
      }
    })
}

</script>
