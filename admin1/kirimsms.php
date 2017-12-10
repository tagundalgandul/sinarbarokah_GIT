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
  $querySMS = mysqli_query($con,"SELECT isi_sms
                                 FROM sms join promosi USING (kd_promosi)
                                 WHERE kd_promosi='$kdPromosi'");

  # isi sms
  $data = mysqli_fetch_array($querySMS);
  $isi_sms = $data['isi_sms'];

  # no telp
  $no_tlp = $hasilLRFM['no_tlp'];


  # kirim sms
  $userkey="mr5oeh"; // userkey lihat di zenziva
	$passkey="aziz2"; // set passkey di zenziva

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
?>
