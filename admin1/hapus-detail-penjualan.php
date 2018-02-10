<?php
include "koneksi.php";
if($_GET['kd_barang'] && $_GET['no_faktur']){
	$kd_barang = $_GET['kd_barang'];
	$no_faktur = $_GET['no_faktur'];
	$sql=mysqli_query($con, "SELECT * FROM det_transaksi WHERE no_faktur='no_faktur' AND kd_barang='$kd_barang'");
	$dt = mysqli_fetch_assoc($sql);
	$subtotal = $dt['sub_total'];
	$update=mysqli_query($con,"UPDATE transaksi SET total=total-'$subtotal' WHERE no_faktur='$no_faktur'");
	$hapus = mysqli_query($con,"DELETE FROM det_transaksi WHERE kd_barang='$kd_barang' AND no_faktur='$no_faktur'");
	if($hapus){
		echo '<script>alert("Berhasil Menghapus");document.location="tambah-transaksi.php";</script>';
	}else{
		echo '<script>alert("Gagal Menghapus");document.location="tambah-transaksi.php";</script>';
	}
}
?>
