<?php
include 'header.php';
$kd_sms = $_GET['kd_sms'];
$query = mysqli_query($con, "SELECT * FROM sms WHERE kd_sms = '$_GET[kd_sms]'");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit SMS

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Edit SMS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <form  method="POST" onsubmit="return formValidasi()" name="editsms">
                <table class="table table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">ISI SMS</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="isi_sms" value="<?php echo $data['isi_sms']; ?>"  placeholder="isi sms" id="isisms">
                        </div>
                      </td>
                  </div>
                </table>
                  <center>
                 <button type="reset" class="btn btn-primary ">Reset</button>
                 <button type="submit" name="edit-sms" class="btn btn-primary " value="submit">Save</button>
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

if(isset($_POST['edit-sms'])) {
$isi_sms =$_POST['isi_sms'];
// $penduduk_20 =$_POST['penduduk_20'];
// $no_tlp =$_POST['no_tlp'];
// $nama_kecamatan =$_POST['nama_kecamatan'];

$query_update=mysqli_query($con, "UPDATE sms SET isi_sms='$isi_sms' WHERE kd_sms='$kd_sms'" ) or die (mysqli_error($con));

echo '<script language="javascript">alert("Sukses Mengubah Data");document.location="sms.php"</script>';
}
?>
<script type="text/javascript">
  function formValidasi(){
    var isisms = $('#isisms').val();

    if (isisms == ""){
       alert("Harap Isi Semua Bidang !!!");
       return false;
    }

    return true;
}
</script>
