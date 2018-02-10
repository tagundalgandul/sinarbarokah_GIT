<?php
include '/admin1/koneksi.php';
// $query = mysqli_query($con, "SELECT nama_barang,gambar,harga FROM produk");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sinar Barokah</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />
    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="index.html"><h1><span>Com</span>pany</h1></a>
						</div>
					</div>

					<div class="navbar-collapse collapse">
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php">Home</a></li>
								<li role="presentation"><a href="Produk.php">Produk</a></li>
								<li role="presentation"><a href="info-perusahaan.php">Info Perusahaan</a></li>
								<li role="presentation"><a href="promosi.php">Promosi</a></li>
								<li role="presentation"><a href="saran_kritik.php" class="active">Kritik & Saran</a></li>
								<!-- <li role="presentation"><a href="contact.php">Contact</a></li> -->
								<li role="presentation"><a href="admin1/index.php">login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<div id="breadcrumb">
		<div class="container">
			<div class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li>Kritik & Saran</li>
			</div>
		</div>
	</div>


	<section id="contact-page">
        <div class="container">
            <div class="center">
              <br><br>
                <h2>Kritik & Saran</h2>
                <p></p>
                <br>
            </div>
            <div class="row contact-wrap">
              <div class="status alert alert-success" style="display: none"></div>
                <div class="col-md-6 col-md-offset-3">
                    <form action="proses_kritik_saran.php" method="post" onsubmit="return formValidasi() " name="kirim">
                      <div class="form-group">
                        <input type="text" class="form-control" name="no_tlp" placeholder="NO HP" id="no_tlp"/>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo date('Y-m-d')?>" name="tanggal"/>
                      </div>
                      <div class="form-group">
                        <textarea type"text" class="form-control" name="isi_kritik_saran" rows="5" placeholder="Kritik & Saran" id="isi"></textarea>
                      </div>
                        <center>
                          <button type="reset" name="submit" class="btn btn-primary btn-lg" >Reset</button>
                          <button type="submit" name="kirim" value="kirim" class="btn btn-primary btn-lg">Kirim</button>
                        </center>
                    </form>
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->

    <footer>
        <div class="footer">
            <div class="container">
                <div class="social-icon">
                    <div class="col-md-4">
                        <ul class="social-network">
                          <li><a href="www.facebook.com" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="www.Twitter.com" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="www.gmail.com" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                          <!-- <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li> -->
                        </ul>
                    </div>
                </div>

               <div class="col-md-4 col-md-offset-4">
                    <div class="copyright">
                        &copy; Sinar Barokah
                        <div class="credits">
                            <!--
                                All the links in the footer should remain intact.
                                You can delete the links only if you purchased the pro version.
                                Licensing information: https://bootstrapmade.com/license/
                                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company

                            <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
            </div>
        </div>
    </footer>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/functions.js"></script>

</body>


<script type="text/javascript">
function formValidasi(){
    var no_tlp = $('#no_tlp').val();
    var isi = $('isi_kritik_saran').val();
    var angka = /^[0-9]+$/;
    // var nohp = $('#no_tlp').val();

    if (no_tlp == ""){
       alert("Harap Masukan No Telpon Anda !!!");
       return false;
    }
    if(!no_tlp.match(angka)){
       alert("Harap Isi No Hp Dengan Angka !!!");
       return false;
    }

    if (isi == ""){
       alert("Kritik dan Saran Tidak Boleh Kosong !!!");
       return false;
    }
    return true;
}

</script>
