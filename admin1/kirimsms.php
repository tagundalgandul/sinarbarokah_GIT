<?php
  include 'koneksi.php';
  include 'lib_func.php';

  $bulan = $_POST['bulan'];
  $queryLRFM = "SELECT nama_pelanggan,id_pelanggan,L,R,F,M,no_tlp,
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
                SELECT nama_pelanggan,id_pelanggan,no_tlp,
                       MAX(tgl_transaksi) - MIN(tgl_transaksi) AS L,
                       MAX(DATE_FORMAT(tgl_transaksi,'%d') ) AS R,
                       COUNT(id_pelanggan) AS F,
                       SUM(total) AS M
                FROM transaksi INNER JOIN pelanggan USING(id_pelanggan)
                WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m')='$bulan'
                GROUP BY nama_pelanggan,id_pelanggan
              ) as LRFM ";

$hasil = mysqli_query($con,$queryLRFM) or die(mysqli(error($con)));

while ($hasilLRFM = mysqli_fetch_assoc($hasil)) {
  # kode promosi
  $kdPromosi = ambilKodePromosi(golonganPelanggan($hasilLRFM['hasil_L'],
                                                  $hasilLRFM['hasil_R'],
                                                  $hasilLRFM['hasil_F'],
                                                  $hasilLRFM['hasil_M']));

  # query ambil isi sms
  $querySMS = mysqli_query($con,"SELECT isi_sms,tgl_berlaku,tgl_berakhir
                                 FROM sms join promosi USING (kd_promosi)
                                 WHERE kd_promosi='$kdPromosi'");

  $dataSms = mysqli_fetch_assoc($querySMS);

  $no_tlp = $hasilLRFM['no_tlp'];
  $nama_pelanggan = $hasilLRFM['nama_pelanggan'];
  $tgl_berlaku_db = $dataSms['tgl_berlaku'];
  $tgl_berakhir_db = $dataSms['tgl_berlaku'];
  $isi = $dataSms['isi_sms'];


  $tgl_berlaku = date_format(date_create($tgl_berlaku_db),'d/m/Y');
  $tgl_berakhir = date_format(date_create($tgl_berakhir_db),'d/m/Y');


  if ($kdPromosi == 'PMI0001'){
      # selipkan nama pelanggan di isi sms
      $isi_tgl_berlaku = substr_replace($isi,$tgl_berlaku." ",166,0);
      $isi_tgl_berakhir = substr_replace($isi_tgl_berlaku,$tgl_berakhir." ",181,0);
      $isi_sms = substr_replace($isi_tgl_berakhir,$nama_pelanggan,90,0);
  }

  if ($kdPromosi == 'PMI0002'){
      # selipkan nama pelanggan di isi sms
      $isi_tgl_berlaku = substr_replace($isi,$tgl_berlaku." ",166,0);
      $isi_tgl_berakhir = substr_replace($isi_tgl_berlaku,$tgl_berakhir." ",181,0);
      $isi_sms = substr_replace($isi_tgl_berakhir,$nama_pelanggan,90,0);
  }

  if ($kdPromosi == 'PMI0003'){
      # selipkan nama pelanggan di isi sms
      $isi_tgl_berlaku = substr_replace($isi,$tgl_berlaku." ",165,0);
      $isi_tgl_berakhir = substr_replace($isi_tgl_berlaku,$tgl_berakhir." ",180,0);
      $isi_sms = substr_replace($isi_tgl_berakhir,$nama_pelanggan,90,0);
  }

  if ($kdPromosi == 'PMI0004'){
      # selipkan nama pelanggan di isi sms
      $isi_tgl_berlaku = substr_replace($isi,$tgl_berlaku." ",165,0);
      $isi_tgl_berakhir = substr_replace($isi_tgl_berlaku,$tgl_berakhir." ",180,0);
      $isi_sms = substr_replace($isi_tgl_berakhir,$nama_pelanggan,90,0);
  }

  if ($kdPromosi == 'PMI0005'){
      # selipkan nama pelanggan di isi sms
      $isi_tgl_berlaku = substr_replace($isi,$tgl_berlaku." ",174,0);
      $isi_tgl_berakhir = substr_replace($isi_tgl_berlaku,$tgl_berakhir." ",189,0);
      $isi_sms = substr_replace($isi_tgl_berakhir,$nama_pelanggan,90,0);
  }


  # kirim sms
  $userkey="eha9cw"; // userkey lihat di zenziva
  $passkey="nafriernanda"; // set passkey di zenziva

  $url = "https://reguler.zenziva.net/apps/smsapi.php";$curlHandle = curl_init();
  curl_setopt($curlHandle, CURLOPT_URL, $url);
  curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$no_tlp.'&pesan='.urlencode($isi_sms));
  curl_setopt($curlHandle, CURLOPT_HEADER, 0);
  curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
  curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
  curl_setopt($curlHandle, CURLOPT_POST, 1);
  $results = curl_exec($curlHandle);
  curl_close($curlHandle);

}




# query nama orang
// $qr_nama_pelanggan = mysqli_query($con,"SELECT nama_pelanggan FROM pelanggan ");
// $data_pelanggan = mysqli_fetch_array($qr_nama_pelanggan);
//

//
// # isi sms
// $data = mysqli_fetch_array($querySMS);
// $isi_sms = $data['isi_sms'];
//
// $nama_pelanggan = $data_pelanggan['nama_pelanggan'];
// echo $nama_pelanggan;
//
// # no telp
// $no_tlp = $hasilLRFM['no_tlp'];
//



?>
