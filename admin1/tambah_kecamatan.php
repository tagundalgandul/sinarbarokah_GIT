<?php
include 'header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Kecamatan

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Tambah kecamatan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <form  method="POST" onsubmit="return formValidasi()" id="tambahkecamatan">
                <table class="table table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Nama Kecamatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_kecamatan"  placeholder="nama kecamatan" id="namakecamatan">
                        </div>
                      </td>
                    </tr>
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Logitude</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="longitude"  placeholder="longitude" id="longitude">
                        </div>
                      </td>
                    </tr>
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">latitude</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="latitude"  placeholder="latitude" id="latitude">
                        </div>
                      </td>
                    </tr>
                  </div>
                </table>
                  <center>
                 <button type="reset" class="btn btn-primary ">Reset</button>
                 <button type="submit" name="tambah_kecamatan" class="btn btn-primary " value="submit">Save</button>
                  </center>
              </form>
            </div>
          <!-- /.box -->
          </div>
        <!-- /.col -->
        </div>
      <!-- /.row -->
      </div>
    </section>
  <!-- /.content-wrapper -->
  </div>
<?php
include 'footer.php';

 if(isset($_POST['tambah_kecamatan'])) {
 $kd_kecamatan =kd_kecamatan();
 $nama_kecamatan =$_POST['nama_kecamatan'];
 $latitude = $_POST['latitude'];
 $longitude= $_POST['longitude'];
// $jk =$_POST['jk'];
// $no_tlp =$_POST['no_tlp'];
// $kecamatan =$_POST['kecamatan'];

 $query_update=mysqli_query($con, "INSERT into kecamatan values ( '$kd_kecamatan', '$nama_kecamatan','$longitude','$latitude' )") or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses menambah Data ");document.location="kecamatan.php"</script>';
 }

?>

<script type="text/javascript">
function formValidasi(){
    var namakecamatan = $('#namakecamatan').val();
    var longitude = $('#longitude').val();
    var latitude = $('#latitude').val();
    var angka = /^[0-9]+$/;


    if (namakecamatan == ""){
       alert("Harap Isi Semua Bidang !!!");
       return false;
    }
    if (longitude == ""){
       alert("Harap Isi Semua Bidang !!!");
       return false;
    }
    if(!longitude.match(angka)){
       alert("longitude  harus angka ");
       return false;
    }
    if (latitude == ""){
       alert("Harap Isi Semua Bidang !!!");
       return false;
    }
    if(!latitude.match(angka)){
       alert("latitude  harus angka ");
       return false;
    }

    return true;
}
</script>
