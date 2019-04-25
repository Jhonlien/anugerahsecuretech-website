<?php
include 'config/conn.php';
$slider = mysqli_query($conn, "SELECT * FROM tb_slides WHERE active = 'Y' ");
$service = mysqli_query($conn, "SELECT * FROM tb_services");
$files = mysqli_query($conn,"SELECT * FROM tb_files WHERE category = 'COMPANY' ");
$portofolio = mysqli_query($conn,"SELECT * FROM tb_portofolio ORDER BY id DESC");
$partner = mysqli_query($conn,"SELECT * FROM tb_partner");
$client = mysqli_query($conn, "SELECT * FROM tb_client");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Anugrah Security Technology</title>
	<meta charset="UTF-8">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">  
	<link rel="stylesheet" type="text/css" href="css/icomoon.css"> 
	<link rel="stylesheet" href="css/pogo-slider.min.css">
	<link rel="stylesheet" href="css/slider.css">	
	<link rel="stylesheet" href="css/animate.css">	
    <link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&amp;subset=latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
<!-- Preloader Start-->
<div id="preloader">
	<div class="row loader">
		<div class="loader-icon"></div>
	</div>
</div>
<!-- Preloader End -->



<!-- Top-Bar START -->
<div id="top-bar" class="hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-xs-12">
				<ul class="top-bar-info">				 
					<li><i class="fa fa-phone"></i> Phone:  +62 817-182-424</li>
					<li><i class="fa fa-envelope-o"></i><a href="mailto:sales@anugerahsecuretech.com" style="color: white;">sales@anugerahsecuretech.com </a></li>
				</ul>					
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12 right-holder hidden-sm">
				<!-- <a href="#" class="top-appoinment">Get a Quote</a>
				<a href="#" class="top-appoinment">Get a Quote</a> -->							
			</div>		
		</div>
	</div>
</div>	



<!-- Navbar START -->
<header>
	<nav class="navbar navbar-default navbar-custom" data-spy="affix" data-offset-top="50">
	  <div class="container">
	  	<div class="row">
		    <div class="navbar-header navbar-header-custom">
		      <button type="button" class="navbar-toggle collapsed menu-icon" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-logo" href="index.php"><img src="img/logo.png" alt="logo"></a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right navbar-links-custom">
		        <li><a href="#overview">About</a></li>
				<li><a href="#services">Services</a></li>
				<li><a href="#projects">Portofolio</a></li>
				<li><a href="download-d.php" target="_blank">Download Center</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">After Sales Service</a>
		          <ul class="dropdown-menu dropdown-menu-left">
		            <li><a href="#">Warranty</a></li>
		            <li><a href="#">Faq</a></li>
		          </ul>
		        </li>	
				<li><a href="#footer">Contact Us</a></li>
		      </ul>
		    </div>	
	  	</div>
	  </div>
	</nav>	
</header>
<!-- Navbar END -->



<!-- Slider START -->
<div class="pogoSlider" id="js-main-slider">
	<?php
		while($s = mysqli_fetch_array($slider)){
			$img = 'img/slide/'.$s['image'];
	?>
	<div class="pogoSlider-slide" data-transition="fade" data-duration="1000" style="background-image:url(<?php echo $img?>);">
		<div class="container">
			<div class="slider-content">
			</div>
		</div>		
	</div>
	<?php } ?>
</div>

<!-- Slider END -->



<!-- Top Articles START -->
<div class="section-block" id="overview">
	<div class="container">
		<div class="section-heading center-holder">
			<h2>We are here to help you</h2>
			<p>We are specialize in Security System Integration</p>
		</div>		
		<div class="row">
		<?php while($f = mysqli_fetch_array($files)){?>		
			<div class="col-md-6 col-sm-4 col-xs-12 wow fadeInUpSm" data-wow-delay=".1s">
				<article class="service-article clearfix">
					<div class="article-icon">
						<i class="icon-text-document"></i>
					</div>
					<div class="article-text">
						<h3><?php echo $f['title'] ?></h3>
						<?php echo "<a href=\"download.php?files=$f[files]\">$f[title]</a>" ?>
					</div>					
				</article>				
			</div>	
			<?php } ?>			
		</div>
	</div>
</div>
<!-- Top Articles END -->


<!-- Top Articles START -->
<div class="section-block-grey" >
	<div class="container">
		<div class="section-heading center-holder" id="services">
			<h2>We Offer You</h2>
		</div>	
        <div class="owl-carousel owl-theme" id="articles-services">
        	<?php 
        			while($d = mysqli_fetch_array($service)){
        			// $icon = 'img/icon/'.$d['icon'];
        	?>	
			<article class="service-article clearfix" style="background-color: white;">
				<div class="article-icon">
					<?php echo "<img src=\"img/icon/$d[icon]\">"; ?> 
				</div>
				<div class="article-text">
					<h3><?php echo $d['title'];?></h3>
				</div>
			</article>	
		    <?php } ?>   			            			            
        </div> 
	</div>
</div>
<!-- Top Articles END -->



<div id="about">
	<!-- About section START -->
	<div class="section-block">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay=".4s">
					<div class="section-heading left-holder mt-20">
						<h2>About Us</h2>
						<p>Anugerah security technology adalah perusahaan pengadaan barang dan jasa dibidang sistem integritas, khususnya sistem sekuriti</p>					
					</div>			
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-1 wow fadeInUpSm" data-wow-delay=".1s">
					<img src="img/about.png" class="border-round img-shadow" alt="about-img">
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-1 wow fadeIn" data-wow-delay=".4s">
					<div class="text-content mt-30">
						<p>Dengan menciptakan design yang detail dan pengembangan produk, kami memberikan solusi terbaik untuk sistem keamanan bagi partner kami agar dapat mendukung perkembangan sistemnya.</p>
						 
					</div>	
				</div>				
			</div>
		</div>	
	</div>
	<div class="section-block-parallax" style="background-image: url(https://newevolutiondesigns.com/images/freebies/city-wallpaper-11.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInDownSm" data-wow-delay=".3s">
					<div class="countup-box">
						<h4 class="countup">230</h4>
						<h5>Complete Project</h5>
					</div>				
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInDownSm" data-wow-delay=".5s">
					<div class="countup-box">
						<h4 class="countup">210</h4>
						<h5>Happy Clients</h5>
					</div>				
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInDownSm" data-wow-delay=".7s">
					<div class="countup-box">
						<h4 class="countup">20</h4>
						<h5>Awards</h5>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>
<div class="partner-section">
	<div class="container">	
        <div class="owl-carousel owl-theme partners wow fadeInLeft" id="our-partners">
        	<?php while($part = mysqli_fetch_array($partner)){ ?>
            <div class="item">
            	<?php echo "<img src=\"img/partner/$part[logo]\" alt=\"partner-image\">"; ?>  
            </div>
        	<?php } ?>      		            			            			                      
        </div>  		     	
	</div>
</div>
<div class="section-block">
	<div class="container">
		<div class="section-heading center-holder">
			<h2>Latest Projects</h2>
		</div>	
		<div class="latest-projects">
		    <div class="row">
				<div class="isotope-grid">
					<?php while($p = mysqli_fetch_array($portofolio)){?>
			        <div class="col-md-4 col-sm-6 col-xs-12 isotope-item">
			          <?php echo "<a href=\"project-d.php?project=$p[place]\">"; ?>
			            <div class="project-item">
			              <div class="overlay-container">
			                 <?php echo "<img src=\"img/portofolio/$p[cover]\" alt=\"project-img\">"?>
			                <div class="project-item-overlay">
			                  <h4><?php echo $p['title']?></h4>
			                  <p><?php echo $p['title']?></p>
			                </div>              
			              </div>              
			            </div>  
			          </a>        
			        </div>
			    <?php } ?>
				</div>
			</div>   
		</div> 	
	</div>		
</div>
<!-- Portfolio END -->


<!-- Partners Section START -->

<!-- Partners Section END -->



<!-- Footer START -->
<footer id="footer">
	<div class="footer">
		<div class="container">
			<div class="row">
				<!-- Col 1 Start -->
				<div class="col-md-3 col-sm-12 col-xs-12">
					<div class="footer-column-1">
						<img src="img/logo.png" alt="footer-logo">
						<div class="text-content mt-25">
							<div class="white-color mt-20">								
								<p><i class="fa fa-envelope-o"></i><a href="mailto:sales@anugerahsecuretech.com" style="color: white;">sales@anugerahsecuretech.com </a> </p>
								<p><i class="fa fa-phone"></i> Phone: +62 817-182-424</p>
<!-- 								<p><i class="fa fa-clock-o"></i> Time: </p>
								<p><i class="fa fa-map-marker"></i> Map: Sheram 113</p>	 -->							
							</div>
						</div>						
					</div>
				</div>
				<!-- Col 1 End -->				
			</div>
		</div>		
	</div>
	<div class="bottom-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="bottom-icons white-color">
					<!-- 	<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>	 -->								
					</div>		
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="grey-color right-holder mt-10">
						<p>© Copyright 2019 Anugerah Security Technology. All Rights reserved</p>
					</div>
				</div>				
			</div>
		</div>
	</div>
</footer>

<a href="#" class="scroll-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>	
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>	
<script src="js/jquery.pogo-slider.min.js"></script>
<script src="js/pogo-main.js"></script>
<script src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="js/tabs.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/map.js"></script>
<script src="js/main.js"></script>
</body>
</html>