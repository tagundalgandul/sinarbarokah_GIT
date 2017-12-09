<?php
	include 'koneksi.php';
   $idPelanggan = $_POST['idPelanggan'];
   $kdPromosi   = $_POST['kdPromosi'];

   echo $idPelanggan," ",$kdPromosi;

   $queryNotlp = mysqli_query($con,"SELECT no_tlp FROM pelanggan WHERE id_pelanggan='$idPelanggan'");
   $data = mysqli_fetch_array($queryNotlp);
   echo $data['no_tlp'];


   $querySMS = mysqli_query($con,"SELECT isi_sms FROM sms join promosi USING (kd_promosi) WHERE kd_promosi='$kdPromosi'");
   $data1 = mysqli_fetch_array($querySMS);
   echo $data1['isi_sms'];

// ambil no tlp dan isi sms 
	
// Script http API SMS Reguler Zenziva

	$userkey="mr5oeh"; // userkey lihat di zenziva
	$passkey="aziz2"; // set passkey di zenziva
	$no_tlp=$data['no_tlp'];
	$isi_sms= $data1['isi_sms'];

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
?>
