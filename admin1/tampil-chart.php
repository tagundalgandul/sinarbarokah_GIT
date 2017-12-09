<?php

 include "koneksi.php";
 include "lib_func.php";
$bulan = $_POST['bulan'];
$queryLRFM = "SELECT nama_pelanggan,id_pelanggan,
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

 $totalNewCutomer   = [];
 $totalPotensial    = [];
 $totalLostCustomer = [];
 $totalCoreCustomer = [];
 $totalConsumingCustomer = [];

 while ($row = mysqli_fetch_assoc($hasil)) {

     if(golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                          $row['hasil_F'],$row['hasil_M'])
                          == 'New Customers'){
            array_push($totalNewCutomer,golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                                 $row['hasil_F'],$row['hasil_M']));
     }

     if(golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                          $row['hasil_F'],$row['hasil_M'])
                          == 'Core Customers'){
            array_push($totalCoreCustomer,golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                                 $row['hasil_F'],$row['hasil_M']));
     }

     if(golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                          $row['hasil_F'],$row['hasil_M'])
                          == 'Potensial Customers'){
            array_push($totalPotensial,golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                                 $row['hasil_F'],$row['hasil_M']));
     }

     if(golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                          $row['hasil_F'],$row['hasil_M'])
                          == 'Lost Customer'){
            array_push($totalLostCustomer,golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                                 $row['hasil_F'],$row['hasil_M']));
     }

     if(golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                          $row['hasil_F'],$row['hasil_M'])
                          == 'Consuming Resource Customer'){
            array_push($totalConsumingCustomer,golonganPelanggan($row['hasil_L'],$row['hasil_R'],
                                 $row['hasil_F'],$row['hasil_M']));
     }
 }

?>

<hr>
<!-- Data LRFM -->
<input type="hidden" id="NewCutomer" value="<?php echo count($totalNewCutomer) ?>">
<input type="hidden" id="Potensial" value="<?php echo count($totalPotensial) ?>">
<input type="hidden" id="LostCustomer" value="<?php echo count($totalLostCustomer) ?>">
<input type="hidden" id="CoreCustomer" value="<?php echo count($totalCoreCustomer) ?>">
<input type="hidden" id="ConsumingCustomer" value="<?php echo count($totalConsumingCustomer) ?>">

<div class="chart-container">
    <canvas id="chart"></canvas>
</div>


<center>
  <form action="detail-pengelompokan.php" method="post">
    <input type="hidden" name='bulan' value="<?=$_POST['bulan']?>">
    <button type="submit" class="btn btn-lg btn-info" >
      Detail Pengelompokan
    </button>
  </form>

</center>

<script type="text/javascript">
  // Data Total Golongan pelanggan
  var NewCutomer = $('#NewCutomer').val();
  var Potensial = $('#Potensial').val();
  var LostCustomer = $('#LostCustomer').val();
  var CoreCustomer = $('#CoreCustomer').val();
  var ConsumingCustomer = $('#ConsumingCustomer').val();


  var ctx = document.getElementById("chart").getContext('2d');
  var backgroundColor = ['black','yellow','green','blue','red'];

  var labels = ['Core Customers','Potensial Customers',
                'Lost Customers','New Customers',
                'Consuming Resource Customers'];

  var data = [CoreCustomer,Potensial,
              LostCustomer,NewCutomer,
              ConsumingCustomer];


  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'pie',

      // The data for our dataset
      data: {
          labels: labels,
          datasets: [{
              label: "My First dataset",
              backgroundColor: backgroundColor,
              data: data,
          }]
      },

      // Configuration options go here
      options: {}
  });

</script>
