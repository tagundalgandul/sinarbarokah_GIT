<?php
include 'admin1/koneksi.php';
$query = mysqli_query($con, "SELECT nama_barang,gambar,harga FROM produk");
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
							<a href="index.php"><h1><span>Sinar</span>Barokah</h1></a>
						</div>
					</div>

					<div class="navbar-collapse collapse">
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index.php">Home</a></li>
								<li role="presentation"><a href="produk.php" class="active">Produk</a></li>
								<li role="presentation"><a href="info-perusahaan.php">Info Perusahaan</a></li>
								<li role="presentation"><a href="promosi.php">Promosi</a></li>
                <li role="presentation"><a href="saran_kritik.php">Kritik Dan Saran</a></li>
								<!-- <li role="presentation"><a href="blog.php">Blog</a></li>
								<li role="presentation"><a href="contact.php">Contact</a></li> -->
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
				<li><a href="index.php">Home</a></li>
				<li>Produk</li>
			</div>
		</div>
	</div>

	<div class="aboutus">
		<div class="container">
		<h3>Produk</h3>
		<hr>
			<div class="text-center">
			 <?php
          while($data = mysqli_fetch_array($query)){
      ?>
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">

          <img src="<?php echo 'admin1/'. $data['gambar'] ?>" alt="" height="200" width="200" >
					<h4><?php echo $data['nama_barang']; ?><br>Rp.<?php echo $data['harga']; ?> </h4>
					<p></p>
				</div>
				<?php } ?>
			</div>


		</div>
	</div>

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
</html>
