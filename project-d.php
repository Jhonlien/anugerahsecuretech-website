<?php
include 'config/conn.php';
$client = mysqli_query($conn, "SELECT * FROM tb_client");
$partner = mysqli_query($conn, "SELECT * FROM tb_partner");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Detail Projects | Anugrah Security Technology</title>
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
<!-- Top-Bar END -->



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
		        <li><a href="index.php#overview">About</a></li>
				<li><a href="index.php#services">Services</a></li>
				<li><a href="index.php#projects">Portofolio</a></li>
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
<?php
if(isset($_GET['project'])){
	$projects = $_GET['project'];
	$detail = mysqli_query($conn, "SELECT * FROM tb_portofolio WHERE place ='$projects' ");
	while($d = mysqli_fetch_array($detail)){
?>
<div class="page-title-section" style="background-image: url(<?php echo "img/portofolio/$d[cover]"; ?>);">
	<div class="container">
		<div class="page-title center-holder">
			<h1><?php echo $d['title']?></h1>
			<ul>
				<li><a href="index.php#projects">Home</a></li>
				<li><a href="#"><?php echo $d['place']?></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="section-block">
	<div class="container">	
		<div class="row">
			<div class="col-md-6 col-sm-4 col-xs-12">
				 <div class="p-detail-box">
					<i class="icon-map-location"></i>
					<!-- <h4>Client</h4> -->
					<p><?php echo $d['place']?></p>
				</div>
			</div>

			<div class="col-md-6 col-sm-4 col-xs-12">
				<div class="p-detail-box">
					<i class="icon-notebook-1"></i>
					<!-- <h4>Category</h4> -->
					<p><?php echo $d['title']?></p>
				</div>
			</div>					
		</div>

		<div class="p-detail-img">
			<?php echo "<img src=\"img/portofolio/$d[image1]\" class=\"border-round img-shadow mt-20\" alt=\"project-image\" width=\"1100\">" ; ?>
			<?php echo "<img src=\"img/portofolio/$d[image2]\" class=\"border-round img-shadow mt-20\" alt=\"project-image\" width=\"1100\">"; ?>
			<?php echo "<img src=\"img/portofolio/$d[image3]\" class=\"border-round img-shadow mt-20\" alt=\"project-image\" width=\"1100\">"; ?>
		</div>
	</div>
</div>
<?php } ?>
<?php } else { ?>
<div class="big-background" style=" background-image: url(http://via.placeholder.com/1520x680); ">
	<div class="container">
		<div class="block-404">
			<h1>404</h1>
			<h2>This Page Could Not Be Found!</h2>
			<h4>We couldn't find the page you were looking for.</h4>
			<div class="center-holder">
				<a href="index.html" class="button button-primary mt-30">Back to Home</a>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Partners Section START -->
<div class="partner-section" style="background-color: white;">
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
<footer id="footer">
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-12 col-xs-12">
					<div class="footer-column-1">
						<img src="img/logo.png" alt="footer-logo">
						<div class="text-content mt-25">
							<div class="white-color mt-20">								
								<p><i class="fa fa-envelope-o"></i><a href="mailto:sales@anugerahsecuretech.com" style="color: white;">sales@anugerahsecuretech.com </a> </p>
								<p><i class="fa fa-phone"></i> Phone: +62 817-182-424</p>							
							</div>
						</div>						
					</div>
				</div>			
			</div>
		</div>		
	</div>
	<div class="bottom-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="bottom-icons white-color">							
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
<script src="js/main.js"></script>
</body>
</html>