<?php
	  include 'koneksi.php';
    $idPelanggan = $_POST['idPelanggan'];
    $kdPromosi   = $_POST['kdPromosi'];

    $queryNotlp = mysqli_query($con,"SELECT no_tlp,nama_pelanggan FROM pelanggan WHERE id_pelanggan='$idPelanggan'");
    $data = mysqli_fetch_array($queryNotlp);


    $querySMS = mysqli_query($con,"SELECT isi_sms,tgl_berlaku,tgl_berakhir FROM sms join promosi USING (kd_promosi) WHERE kd_promosi = '$kdPromosi'");
    $data1 = mysqli_fetch_array($querySMS);


		$userkey="eha9cw"; // userkey lihat di zenziva
		$passkey="nafriernanda"; // set passkey di zenziva
		$no_tlp=$data['no_tlp'];
		$isi = $data1['isi_sms'];
		$nama_pelanggan = $data['nama_pelanggan'];

		$tgl_berlaku_db = $data1['tgl_berlaku'];
		$tgl_berakhir_db = $data1['tgl_berakhir'];


	  $tgl_berlaku = date_format(date_create($tgl_berlaku_db),'d/m/Y');
		$tgl_berakhir = date_format(date_create($tgl_berakhir_db),'d/m/Y');

		$isi_tgl_berlaku = "";
		$isi_tgl_berakhir = "";
		$isi_sms = "";

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
