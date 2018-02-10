<?php
function kd_barang(){
include 'koneksi.php';
		$sql=mysqli_query($con,"SELECT * FROM produk order by kd_barang DESC LIMIT 0,1") or die(mysqli_error($con));;
	 	$data=mysqli_fetch_array($sql) ;
	 	$kodeawal=substr($data['kd_barang'],4,3)+1;
	 	//tambahakn id
	 	if($kodeawal<10){
	      $kode='PDK000'.$kodeawal;
	  	}else if($kodeawal<100){
	      $kode='PDK00'.$kodeawal;
	  	}else if($kodeawal<1000){
	      $kode='PDK0'.$kodeawal;
	  	}else{
	      $kode='PDK'.$kodeawal;
	  	}
	  	return $kode;
  	}

    function no_faktur(){
include 'koneksi.php';
    $sql=mysqli_query($con,"SELECT * FROM transaksi order by no_faktur DESC LIMIT 0,1") or die(mysqli_error($con));;
    $data=mysqli_fetch_array($sql) ;
    $kodeawal=substr($data['no_faktur'],4,3)+1;
    //tambahakn id
    if($kodeawal<10){
        $kode='PJL000'.$kodeawal;
      }else if($kodeawal<100){
        $kode='PJL00'.$kodeawal;
      }else if($kodeawal<1000){
        $kode='PJL0'.$kodeawal;
      }else{
        $kode='PJL'.$kodeawal;
      }
      return $kode;
    }

    function id_pengguna(){
include 'koneksi.php';
    $sql=mysqli_query($con,"SELECT * FROM pengguna order by id_pengguna DESC LIMIT 0,1") or die(mysqli_error($con));;
    $data=mysqli_fetch_array($sql) ;
    $kodeawal=substr($data['id_pengguna'],4,3)+1;
    //tambahakn id
    if($kodeawal<10){
        $kode='PGN000'.$kodeawal;
      }else if($kodeawal<100){
        $kode='PGN00'.$kodeawal;
      }else if($kodeawal<1000){
        $kode='PGN0'.$kodeawal;
      }else{
        $kode='PGN'.$kodeawal;
      }
      return $kode;
    }

 function id_pelanggan(){
include 'koneksi.php';
    $sql=mysqli_query($con,"SELECT * FROM pelanggan order by id_pelanggan DESC LIMIT 0,1") or die(mysqli_error($con));;
    $data=mysqli_fetch_array($sql) ;
    $kodeawal=substr($data['id_pelanggan'],4,3)+1;
    //tambahakn id
    if($kodeawal<10){
        $kode='PLG000'.$kodeawal;
      }else if($kodeawal<100){
        $kode='PLG00'.$kodeawal;
      }else if($kodeawal<1000){
        $kode='PLGN0'.$kodeawal;
      }else{
        $kode='PLG'.$kodeawal;
      }
      return $kode;
    }

function kd_kecamatan(){
include 'koneksi.php';
    $sql=mysqli_query($con,"SELECT * FROM kecamatan order by kd_kecamatan DESC LIMIT 0,1") or die(mysqli_error($con));;
    $data=mysqli_fetch_array($sql) ;
    $kodeawal=substr($data['kd_kecamatan'],4,3)+1;
    //tambahakn id
    if($kodeawal<10){
        $kode='KEC000'.$kodeawal;
      }else if($kodeawal<100){
        $kode='KEC00'.$kodeawal;
      }else if($kodeawal<1000){
        $kode='KEC0'.$kodeawal;
      }else{
        $kode='KEC'.$kodeawal;
      }
      return $kode;
    }

    function kd_promosi(){
include 'koneksi.php';
    $sql=mysqli_query($con,"SELECT * FROM promosi order by kd_promosi DESC LIMIT 0,1") or die(mysqli_error($con));;
    $data=mysqli_fetch_array($sql) ;
    $kodeawal=substr($data['kd_promosi'],4,3)+1;
    //tambahakn id
    if($kodeawal<10){
        $kode='PMI000'.$kodeawal;
      }else if($kodeawal<100){
        $kode='PMI00'.$kodeawal;
      }else if($kodeawal<1000){
        $kode='PMI0'.$kodeawal;
      }else{
        $kode='PMI'.$kodeawal;
      }
      return $kode;
    }

    function kd_sms(){
include 'koneksi.php';
    $sql=mysqli_query($con,"SELECT * FROM sms order by kd_sms DESC LIMIT 0,1") or die(mysqli_error($con));;
    $data=mysqli_fetch_array($sql) ;
    $kodeawal=substr($data['kd_sms'],4,3)+1;
    //tambahakn id
    if($kodeawal<10){
        $kode='SMS000'.$kodeawal;
      }else if($kodeawal<100){
        $kode='SMS00'.$kodeawal;
      }else if($kodeawal<1000){
        $kode='SMS0'.$kodeawal;
      }else{
        $kode='SMS'.$kodeawal;
      }
      return $kode;
    }
       function kd_penduduk(){
include 'koneksi.php';
    $sql=mysqli_query($con,"SELECT * FROM penduduk order by kd_penduduk DESC LIMIT 0,1") or die(mysqli_error($con));;
    $data=mysqli_fetch_array($sql) ;
    $kodeawal=substr($data['kd_penduduk'],4,3)+1;
    //tambahakn id
    if($kodeawal<10){
        $kode='PDK000'.$kodeawal;
      }else if($kodeawal<100){
        $kode='PDK00'.$kodeawal;
      }else if($kodeawal<1000){
        $kode='PDK0'.$kodeawal;
      }else{
        $kode='PDK'.$kodeawal;
      }
      return $kode;
    }

		function TanggalIndo($date){
			include 'koneksi.php';
				$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

				$tahun = substr($date, 0, 4);
				$bulan = substr($date, 5, 2);
				$tgl   = substr($date, 8, 2);

				$result = $tgl . " " . $BulanIndo[((int)$bulan-1)] . " ". $tahun;
				return($result);
			}

			function rupiah($nilai, $pecahan = 0) {
	    return 'Rp. '.number_format($nilai, $pecahan, ',', '.');
			}

		/*
		* Fungsi menentukan kelompok pelanggan
		*
		*/
		function golonganPelanggan($l,$r,$f,$m){
		    $lrfm = "$l$r$f$m";

		    if($lrfm == '1011' || $lrfm == '1010' || $lrfm == '1001' ){
		       return "Core Customers";
		    }

		    if($lrfm == '1111' || $lrfm == '1110' || $lrfm == '1101' ){
		       return "Potensial Customers";
		    }

		    if($lrfm == '0111' || $lrfm == '0110' ||
		       $lrfm == '0101' || $lrfm == '0100' ){
		       return "Lost Customer";
		    }

		    if($lrfm == '0011' || $lrfm == '0010' ||
		       $lrfm == '0001' || $lrfm == '0000' ){
		       return "New Customers";
		    }

		    if($lrfm == '1000' || $lrfm == '1100' ){
		       return "Consuming Resource Customer";
		    }
		}

		/*
		* Fungsi menentukan Promosi Untuk kelompok pelanggan
		*
		*/
		function promosiKelompokPelanggan($kelompokPelangan){

				include 'koneksi.php';

				$query = "SELECT kd_promosi,isi_promosi
				          FROM kelompok
									INNER JOIN promosi USING(kd_promosi)
									WHERE nama_kelompok = '$kelompokPelangan'";

				$run = mysqli_query($con,$query) or die(mysqli_error($con));

				$hasil = mysqli_fetch_assoc($run);

				return $hasil['isi_promosi'];

		}

    /*
    * Fungsi mendapatkan kode promosi
    * @String : kode_promosi
    *
    */
    function ambilKodePromosi($kelompokPelangan){
        include 'koneksi.php';

        $query = "SELECT kd_promosi
                  FROM kelompok
                  WHERE nama_kelompok = '$kelompokPelangan'";

        $run = mysqli_query($con,$query) or die(mysqli_error($con));

        $hasil = mysqli_fetch_assoc($run);

        return $hasil['kd_promosi'];
    }
