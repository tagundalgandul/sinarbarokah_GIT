<?php
include '/admin1/koneksi.php';
$query = mysqli_query($con, "SELECT * FROM promosi Where kd_promosi='PMI0004'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sinar Barokah</title>

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
                                <li role="presentation"><a href="produk.php">Produk</a></li>
                                <li role="presentation"><a href="info-perusahaan.php">Info Perusahaan</a></li>                              
                                <li role="presentation"><a href="promosi.php" class="active">Promosi</a></li>
                               <!--  <li role="presentation"><a href="blog.php">Blog</a></li>
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
                <li>Promosi</li>         
            </div>      
        </div>  
    </div>
    
    <div class="aboutus">
        <div class="container">
        <h3>Promosi</h3> 
        <hr>    
            <div class="text-center">
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/services/10.jpg" alt="" >
                     <?php
                          
                          while($data = mysqli_fetch_array($query)){
                         
                        ?>
                    <h4><?php echo $data['isi_promosi']; ?></h4>
                    <?php }?>
                   <!--  <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p> -->
                </div>
                <!-- <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <img src="images/services/2.jpg" alt="" >
                    <h4>John Doe</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
                </div>
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <img src="images/services/3.jpg" alt="" >
                    <h4>John Doe</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
                </div> -->
            </div>
                    
                    
        </div>
    </div>
    
    <footer>
        <div class="footer">
            <div class="container">
                <div class="social-icon">
                    <div class="col-md-4">
                        <ul class="social-network">
                            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
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