<?php
include 'header.php';
if(empty($_SESSION['no_faktur'])){
  $_SESSION['no_faktur']=no_faktur();
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Transaksi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Data Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <div class="box">
            <div class="box-header">
              <form  method="POST">
               <p align="left">No Faktur : <?php echo $_SESSION['no_faktur']?><br>
                
                 <input type="hidden" name="no_faktur" value="<?php echo $_SESSION['no_faktur']?>"/>
                   <table class="table table-striped table-bordered table-hover" width="50%"> 
                   <tr>
                    <td>
                    <label  class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-md-2">
                    
                      <input type="date" id="tgl" value="<?php echo date('Y-m-d')?>" class="form-control" name="tanggal" placeholder="Tanggal penjualan">

                    </div>
                    </td>
                    </tr>
                    <tr>
                      <td>
                        <label  class="col-sm-2 control-label">Nama Pelanggan</label>
                        <div class="col-sm-10">
                           <select name="pelanggan">
                          <option value="pelanggan"></option>
                           <?php
                              $sql1 = mysqli_query($con, "SELECT * FROM pelanggan");
                              if(mysqli_num_rows($sql1)!=0){
                                while($data2=mysqli_fetch_array($sql1)){
                                  echo '<option value='.$data2['id_pelanggan'].'>'.$data2['nama_pelanggan'].'</option>';
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </td>
                    </tr>       
                  </table>
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


?>
