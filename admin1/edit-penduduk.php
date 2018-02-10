<?php
include 'header.php';
$kd_penduduk = $_GET['kd_penduduk'];
$query = mysqli_query($con, "SELECT * FROM penduduk JOIN kecamatan USING (kd_kecamatan) WHERE kd_penduduk = '$_GET[kd_penduduk]'");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Penduduk

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Tambah penduduk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <form  method="POST" onsubmit="return formValidasi()" name="editpenduduk">
                <table class="table table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Nama Kecamatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="kecamatan" value="<?php echo $data['nama_kecamatan']; ?>"  placeholder="nama kecamatan" readonly>
                        </div>
                      </td>
                      <div class="form-group">
                    <tr>
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">jumlah penduduk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="jumlah_penduduk" value="<?php echo $data['jumlah_penduduk']; ?>"  placeholder="jumlah penduduk" id="jmlpenduduk">
                        </div>
                      </td>
                      <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label"> penduduk usia 20</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="penduduk_20" value="<?php echo $data['penduduk_20']; ?>"  placeholder="Penduduk 20" id="penduduk20">
                        </div>
                      </td>
                    </tr>
                    <div class="form-group">
                      <tr>
                        <td>
                          <label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>
                          <div class="col-sm-10">
                            <select name="tahun" class="textbox">
                            <option value="<?php echo $data['tahun'] ?>"><?php echo $data['tahun'] ?></option>
                            <option value=""></option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            </select>
                            </div>
                          </td>
                      </tr>
                    </div>
                </table>
                  <center>
                 <button type="reset" class="btn btn-primary ">Reset</button>
                 <button type="submit" name="edit-penduduk" class="btn btn-primary " value="submit">Save</button>
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

if(isset($_POST['edit-penduduk'])) {
$jumlah_penduduk = $_POST['jumlah_penduduk'];
$penduduk_20 = $_POST['penduduk_20'];
$tahun = $_POST['tahun'];
// $nama_kecamatan =$_POST['nama_kecamatan'];

$query_update=mysqli_query($con, "UPDATE penduduk SET jumlah_penduduk='$jumlah_penduduk', penduduk_20='$penduduk_20', tahun='$tahun'  WHERE kd_penduduk='$kd_penduduk'" ) or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses Mengubah Data penduduk");document.location="penduduk.php"</script>';
}
?>


<script type="text/javascript">
  function formValidasi(){
    var jmlpenduduk = $('#jmlpenduduk').val();
    var penduduk20 = $('#penduduk20').val();
    var tahun = document.editpenduduk.tahun;
    var kecamatan = document.editpenduduk.kecamatan;
    var angka = /^[0-9]+$/;


    if (jmlpenduduk == ""){
       alert("Harap Isi Semua Bidang !!!");
       return false;
    }
    if(!jmlpenduduk.match(angka)){
       alert("jumlah penduduk  harus angka ");
       return false;
    }
    if (penduduk20 == ""){
       alert("Harap Isi Semua Bidang !!!");
       return false;
    }
    if(!penduduk20.match(angka)){
       alert("penduduk 20  harus angka ");
       return false;
    }
    if (tahun.selectedIndex < 1) {
       alert("Harap Isi Semua Bidang !!!");
       return false;
    }

    return true;
}
</script>
