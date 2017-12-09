<?php
include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengelompokan Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Data Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"></div>
                 <!-- /.box-header -->
                  <div class="box-body">

                    <center>
                      <form class="form"  method="post">
                          <label for="">Bulan</label>

                          <div class="row">
                            <div class="col-md-2 col-md-offset-5">
                              <input class="form-control" type="month" id="bulan" value="<?=date('Y-m')?>">
                            </div>
                          </div>

                          <br/>
                          <button type="button" id="btn-tampilChart" class="btn btn-info">
                            Pilih
                          </button>
                      </form>
                    </center>

                    <!-- Tampil chart -->
                    <div id="tampilChart">

                    </div>

                  </div>
          </div>
                <!-- /.box -->
        </div>
              <!-- /.col -->
      </div>

            <!-- /.row -->
      </div>
      </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
 <script>
    $("#btn-tampilChart").click(function(){
        var  bulan = $('#bulan').val();
        $.ajax({
           type : 'post',
           url  : 'tampil-chart.php',
           data : {'bulan' : bulan},
           success : function(data){
              $('#tampilChart').html(data)
           }
        })
    })
 </script>

<?php

include 'footer.php';
?>
