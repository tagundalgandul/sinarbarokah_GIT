<?php
include 'header.php';


if(isset($_POST['lihat'])){

  $tahun = $_POST['tahun'];

  $query = "SELECT tahun FROM penduduk
            WHERE tahun='$tahun' ";
  $exec = mysqli_query($con,$query);
  $tahun_penduduk = mysqli_fetch_assoc($exec);


  # Query untuk Mencari nilai Pangsa Pasar Tertinggi
  $queryPangsaPasarTertinggi = "SELECT  max(round(penduduk_20/jumlah_penduduk * 100/100,3))
                                        AS pangsaTertinggi,nama_kecamatan,latitude,longitude
                                FROM kecamatan
                                INNER JOIN penduduk USING(kd_kecamatan)
                                WHERE tahun = '$tahun'
                                GROUP BY nama_kecamatan,latitude,longitude
                                ORDER BY pangsaTertinggi DESC LIMIT 1";


  # Eksekusi Query Pangsa Pasar Tertinggi
  $hasilMax = mysqli_query($con,$queryPangsaPasarTertinggi)or die(mysqli_error($con));

  # Ambil Nilai Tertinggi
  $pangsaPasarTertinggi = mysqli_fetch_assoc($hasilMax);


  # Query untuk menghitung  Pangsa Pasar
  $queryPangsaPasar = "SELECT nama_kecamatan,jumlah_penduduk,penduduk_20,
                              round(penduduk_20/jumlah_penduduk * 100/100,3)
                              AS pangsa
                       FROM penduduk
                       INNER JOIN kecamatan USING(kd_kecamatan)
                       WHERE tahun = '$tahun' ";

  $hasil = mysqli_query($con,$queryPangsaPasar);
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ANALISIS PANGSA PASAR
        <!-- Pangsa Pasar <?php echo $tahun['tahun'] ?> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Pangsa Pasar</li>
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
                  <!-- <p align=" center"><a  href="tambah_pelanggan.php"><button class="btn-primary">Tambah Pelanggan</button></a></p><br> -->
                  <div class="box-body">
                    <form enctype="multipart/form-data" method="post" target="_self">
                      <center>
                        <label for="email_address"> Pilih Tahun </label>
                          <div class="form-group">

                            <?php
                              $now=date('Y');
                              echo "<select name='tahun'>";
                              for ($a=$now;$a>=2014;$a--)
                              {
                              echo "<option value='".$a."'>".$a."</option>";
                              }
                              echo "</select>";
                            ?>
                            <input type="submit" class="btn-primary" name="lihat" value="Lihat" />
                          </div>
                        </center>
                     </form>
                <?php


                 # Perhitungan  Pangsa Pasar
                 if (isset($_POST['lihat'])) {

                   if (count($tahun_penduduk) < 1) {
                     echo "<center><h1>Data Tidak Ada</h1></center>";
                     exit;
                   }

                ?>
                    <div class="header">
                       <h2>
                            <center>
                              ANALISIS PANGSA PASAR TAHUN <?php echo $tahun ?>

                            </center>
                       </h2>
                    </div>


                    <div class="body table-responsive">
                          <table id="" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <!-- <th> NO </th> -->
                                      <th> Kecamatan </th>
                                      <th> Jumlah Penduduk  </th>
                                      <th> Jumlah Penduduk Usia 20 Ke Atas </th>
                                      <th> Nilai</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                                while ($row = mysqli_fetch_assoc($hasil)) {
                                   if($row['pangsa'] === $pangsaPasarTertinggi['pangsaTertinggi']) {
                              ?>
                                   <tr class="info">
                              <?php
                                   }else{
                              ?>
                                   <tr>
                              <?php
                                   }
                              ?>
                                      <!-- <td>1</td> -->
                                      <td><?=$row['nama_kecamatan']?></td>
                                      <td><?=$row['jumlah_penduduk']?></td>
                                      <td><?=$row['penduduk_20']?></td>
                                      <td><?=$row['pangsa']?>%</td>
                                   </tr>
                                 <?php
                                    }
                                 ?>
                              </tbody>
                          </table>
                           <br>
                <p align="justify"><font color="red"><strong>
                  Berdasarkan hasil analisis pangsa pasar di tiap kecamatan
                  maka kecamatan <?=$pangsaPasarTertinggi['nama_kecamatan']?>
                  menjadi daerah pemasaran baru yang direkomendasikan oleh sistem
                  dengan nilai <center><?=$pangsaPasarTertinggi['pangsaTertinggi']?>%</center>
                </strong></font></p>
                <br/>
                <?php
                    $namaKecamatan = $pangsaPasarTertinggi['nama_kecamatan'];
                    $pangsaPasar = $pangsaPasarTertinggi['pangsaTertinggi'];
                ?>
                <!-- <span id="infoMarker">


                </span> -->

                <input type="hidden" id="infoMarker" name="" value="<?php print "kecamatan : $namaKecamatan " . "\n". "Pangsa Pasar : $pangsaPasar" ?>">
                <p>
                  <input type="hidden" id="latitude" value="<?=$pangsaPasarTertinggi['latitude']?>">
                  <input type="hidden" id="longitude" value="<?=$pangsaPasarTertinggi['longitude']?>">

                </p>
                  <head>
                    <style>
                      #map {
                        height: 400px;
                        width: 100%;
                       }
                    </style>
                  </head>
                  <body>
                    <center><h3>Google Maps</h3></center>
                    <div id="map"></div>
                    <script>
                      var latitude = $('#latitude').val();
                      var longitude = $('#longitude').val();
                      var infoMarker = $('#infoMarker').val();

                      var lokasi = {lat: parseFloat(latitude),lng: parseFloat(longitude)}

                      var map;
                      function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                          center: lokasi,
                          zoom: 12
                        });


                        var marker = new google.maps.Marker({
                          position: lokasi,
                          title : infoMarker,
                          map: map
                        });

                        marker.addListener('mouseup', function() {
                           infowindow.open(map, marker);
                         });

                      }



                    </script>
                    <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0dq-uNt5X0ISlXZAEW7WRkwt8I_rfsg&callback=initMap">
                    </script>

                <?php
                 }
                ?>

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

 <script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
                responsive: true
        });
    });
</script>
