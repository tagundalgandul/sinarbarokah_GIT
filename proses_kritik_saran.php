<?php
include '/admin1/koneksi.php';

if (isset($_POST['kirim'])){

  $no_tlp = $_POST['no_tlp'];
  $tanggal = $_POST['tanggal'];
  $isi_kritik_saran = $_POST['isi_kritik_saran'];

  $query = mysqli_query($con,"SELECT id_pelanggan,no_tlp FROM pelanggan WHERE no_tlp='$no_tlp'");
  $ketemu=mysqli_num_rows($query);
  $data=mysqli_fetch_array($query);
  $dbnohp=$data['no_tlp'];
  $id_pelanggan=$data['id_pelanggan'];

  if ($dbnohp == $no_tlp) {
    $query1 =mysqli_query($con, "INSERT INTO kritik_saran VALUES (DEFAULT ,'$isi_kritik_saran','$tanggal','$id_pelanggan')")or die (mysqli_error($con));
    echo '<script language="javascript">alert("Terimakasih Atas Kritik Dan Saran Anda");document.location="saran_kritik.php"</script>';
  } else {
      echo '<script language="javascript">alert("Anda Tidak Terdaftar Sebagai Pelanggan");document.location="saran_kritik.php"</script>';
  }
}
?>
