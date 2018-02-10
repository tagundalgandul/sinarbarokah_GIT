<?php
include 'header.php';
 $id_pelanggan=$_GET['id_pelanggan'];
  $query = mysqli_query($con, "SELECT * FROM pelanggan join kecamatan using (kd_kecamatan) where id_pelanggan='$_GET[id_pelanggan]'");
    $data = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Pelanggan

      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Edit Data Pelanggan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <form  method="POST" onsubmit="return formValidasi()" name="editpelanggan">
                <table class="table table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label class="col-sm-2 control-label">Id Pelanggan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>" placeholder="Id Pengguna" readonly="readonly">
                        </div>
                      </td>
                    </tr>
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Nama pelanggan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan'] ?>" placeholder="Nama Pelanggan" id="namapelanggan">
                        </div>
                      </td>
                    </tr>
                  </div>
                 <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <select name="jk" class="textbox">
                          <option value="<?php echo $data['jk'] ?>"><?php echo $data['jk'] ?></option>
                           <option value="L">laki-laki</option>
                           <option value="P">Perempuan</option>

                          </select>
                          </div>
                        </td>
                    </tr>
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">No HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="no_tlp" value="<?php echo $data['no_tlp'] ?>" placeholder="NO HP" id="notlp">
                        </div>
                      </td>
                    </tr>
                  </div>
                  <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Zona</label>
                        <div class="col-sm-10">
                          <select name="nama_kecamatan" class="textbox">
                          <option value="<?php echo $data['kd_kecamatan'] ?>"><?php echo $data['nama_kecamatan'] ?></option>
                           <?php
                              $sql1 = mysqli_query($con, "select * from kecamatan");
                              if(mysqli_num_rows($sql1)!=0){
                                while($data2=mysqli_fetch_array($sql1)){
                                  echo '<option value='.$data2['kd_kecamatan'].'>'.$data2['nama_kecamatan'].'</option>';
                                }
                              }
                            ?>

                          </select>
                          </div>
                        </td>
                    </tr>
                  </div>
                </table>
                  <center>
                 <button type="reset" class="btn primary ">Reset</button>
                 <button type="submit" name="edit_pelanggan" class="btn primary " value="submit">Save</button>
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

    if(isset($_POST['edit_pelanggan'])) {
    $nama_pelanggan =$_POST['nama_pelanggan'];
    $jk =$_POST['jk'];
    $no_tlp =$_POST['no_tlp'];
    $nama_kecamatan =$_POST['nama_kecamatan'];

    $query_update=mysqli_query($con, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', jk='$jk', no_tlp='$no_tlp', kd_kecamatan='$nama_kecamatan' WHERE id_pelanggan='$id_pelanggan'" ) or die (mysqli_error($con));

    echo '<script language="javascript">alert("Sukses Mengubah Data pelanggan");document.location="pelanggan.php"</script>';
    }
?>

<script type="text/javascript">
  function formValidasi(){
    var namapelanggan = $('#namapelanggan').val();
    var jeniskelamin = document.editpelanggan.jk;
    var no_tlp = $('#notlp').val();
    var kecamatan = document.editpelanggan.kecamatan;
    var angka = /^[0-9]+$/;

    if(!no_tlp.match(angka)){
       alert("No hp harus angka ");
       return false;
    }


        if (namapelanggan == ""){
           alert("Harap Isi Semua Bidang !!!");
           return false;
        }

        if (jenisKelamin.selectedIndex < 1) {
           alert("Harap Isi Semua Bidang !!!");
           return false;
        }

        if (no_tlp == "") {
           alert("Harap Isi Semua Bidang !!!");
           return false;
        }

        if (kecamatan.selectedIndex < 1) {
           alert("Harap Isi Semua Bidang !!!");
           return false;
        }

  }

</script>
