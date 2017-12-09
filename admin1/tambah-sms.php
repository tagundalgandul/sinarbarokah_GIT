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
        
        <li class="active">Tambah promosi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <div class="box">
            <div class="box-header">
              <form  method="POST">
                <table class="table table-hover">
                  <div class="form-group">
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Isi sms</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="isi_sms"  placeholder="SMS">
                        </div>
                      </td>
                    </tr>  
                  </div>     
                  <div class="form-group">
                    <tr>
                      <td>
                        <label for="inputEmail3" class="col-sm-2 control-label">Promosi</label>
                        <div class="col-sm-10">
                          <select name="promosi">
                          <option value="promosi"></option>
                           <?php
                              $sql1 = mysqli_query($con, "SELECT * FROM promosi");
                              if(mysqli_num_rows($sql1)!=0){
                                while($data2=mysqli_fetch_array($sql1)){
                                  echo '<option value='.$data2['kd_promosi'].'>'.$data2['isi_promosi'].'</option>';
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
                 <button type="submit" class="btn-primary ">Reset</button>
                 <button type="submit" name="tambah_sms" class="btn-primary " value="submit">Save</button>
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

 if(isset($_POST['tambah_sms'])) {
    $kd_sms =kd_sms(); 
    $isi_sms =$_POST['isi_sms'];
    $kd_promosi =$_POST ['promosi'];
  
    $queryTambahSMS = "INSERT INTO sms VALUES(  '$kd_sms', '$isi_sms','$kd_promosi' )";

    $query_update = mysqli_query($con,$queryTambahSMS) or die (mysqli_error($con));
    echo '<script language="javascript">alert("Sukses Menyimpan Data SMS");document.location="sms.php";</script>';
 }

?>
