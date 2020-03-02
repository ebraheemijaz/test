<!--
author: MMS Business Page
author URL: https://rccgvhl.mmsapp.org
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php //print_r($business); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title><?= $business[0]['title'] ?></title>
		<!--/metadata -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta name="keywords" content="Corp Deal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="<?= base_url('assets/assets/themes/1') ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url('assets/assets/themes/1') ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="<?= base_url('assets/assets/themes/1') ?>/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/assets/themes/1') ?>/css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="<?= base_url('assets/assets/themes/1') ?>/css/lsb.css" rel="stylesheet" type="text/css"><!-- gallery -->

	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400,500,600,700,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<div class="header" id="home">
	<div class="agileits_top_menu" style="background: rgba(191, 63, 87, 0.5);">
		<div class="w3l_header_left">
				<ul>
					<li><i class="fa fa-phone" aria-hidden="true"></i> +<?= $business[0]['phone'] ?></li>
				</ul>
			</div>
			<div class="w3l_header_right">
				<div class="w3ls-social-icons text-left">
					<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
					<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
					<a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>
					<a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="<?= $_SERVER['HTTP_REFERER'] ?>">
							<?php if(!empty($business[0]['logo']) || $business[0]['logo'] != NULL){ ?>
							    <img src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" style="width: 40px;" alt="<?= $business[0]['title'] ?>">
							<?php }else{ ?>
							    <h1><?= $business[0]['title'] ?></h1>
							<?php } ?>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="index.html" class="effect-3 scroll">Home</a></li>
								<li><a href="#about" class="effect-3 scroll">About</a></li>
								<li><a href="#services" class="effect-3 scroll">Products</a></li>
								<li><a href="#gallery" class="effect-3 scroll">Gallery</a></li>
								<li><a href="#contact" class="effect-3 scroll">Contact</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Inspiring Business</h3>
						<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis metus mollis, sollicitudin risus at, mollis nisi</p>-->
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#myModal">Read More »</a>
						</div>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Financial Analysts</h3>
						<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis metus mollis, sollicitudin risus at, mollis nisi</p>-->
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#myModal">Read More »</a>
						</div>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Award winning Agency</h3>
						<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis metus mollis, sollicitudin risus at, mollis nisi</p>-->
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#myModal">Read More »</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
	<!--//banner -->

	<!-- welcome section -->
	<div class="w3layouts-welcome" id="about">
		<div class="container">
				<div class="wls_head_all">
					<h3>About us</h3>
				</div>
				<div class="w3ls-welcome_sec_about-grids">
				 <div class="col-md-6 w3l-welcome_info">
					  <h3>Welcome</h3>
					  
					  <h4>About Us</h4>
					  <p><?= $business[0]['services'] ?></p>
					 <!--<a href="#" class="hvr-bounce-to-bottom"  data-toggle="modal" data-target="#myModal" >Read More</a>-->
				 </div>
				 <div class="col-md-6 w3l-welcome_pic">
					 <h2>About Us</h2>
					 <img src="<?= base_url('assets/assets/themes/1') ?>/images/ab1.jpg" class="img-responsive" alt=""/>
					 <p></p>
				 </div>
				 <div class="clearfix"></div>
			  </div>
		</div>
	</div>
	<!-- //welcome section -->	

	<!-- /services -->
	<div class="w3-services" id="services">
			<div class="w3-services-grids">
				<div class="col-md-4 w3-services-left-grid wls_head_all">
					<h3>our services</h3>
					<h4>Services</h4>
					<p><?= $business[0]['about'] ?></p>
				</div>
				<div class="col-md-8 w3-services-right-grid">
				<div class="w3-icon-grid-gap1">
					<div class="col-md-3 w3-icon-grid1">
					<i class="fa fa-female" aria-hidden="true"></i>
						<h3>lorem ipsum</h3>
					</div>
					<div class="col-md-3 w3-icon-grid1">
					<i class="fa fa-thumb-tack" aria-hidden="true"></i>
					<h3>lorem ipsum</h3>
					</div>
					<div class="col-md-3 w3-icon-grid1">
					<i class="fa fa-optin-monster" aria-hidden="true"></i>
						<h3>lorem ipsum</h3>
					</div>
					<div class="col-md-3 w3-icon-grid1">
					<i class="fa fa-bolt" aria-hidden="true"></i>
					<h3>lorem ipsum</h3>
					</div>
					<div class="clearfix"></div>
					</div>
					<div class="w3-icon-grid-gap2">
					<div class="col-md-3 w3-icon-grid1">
					<i class="fa fa-modx" aria-hidden="true"></i>
					<h3>lorem ipsum</h3>
					</div>
					<div class="col-md-3 w3-icon-grid1">
					<i class="fa fa-linux" aria-hidden="true"></i>
					<h3>lorem ipsum</h3>
					</div>
					<div class="col-md-3 w3-icon-grid1">
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					<h3>lorem ipsum</h3>
					</div>
					<div class="col-md-3 w3-icon-grid1">
					<i class="fa fa-renren" aria-hidden="true"></i>
					<h3>lorem ipsum</h3>
					</div>
					<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
		</div>
	</div>

	<!-- //services -->
	<!-- Gallery -->
	<div class="inner-paddings-w3ls" id="gallery">
	   <div class="container">	
	   <div class="w3ls-welcome_sec">
				<div class="wls_head_all">
					<h3>Products</h3>
				</div>
		<ul class="portfolio_agile_info_w3ls">
		    <?php $product = $this->data->fetch('productservices', array('parent_id' => $business[0]['user_id'])); ?>
		    <?php foreach($product as $pr){ ?>
			<li>
				<div class="agile_events_top_grid">	
					<div class="w3_agileits_evets_text_img">
						<a href="<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>" class="lsb-preview" data-lsb-group="header">
							<div class="view view-eighth">
								<img src="<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>" alt=" " class="img-responsive" />
								<div class="mask">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
								</div>
							</div>
						</a>
					</div>
					<div class="agileits_w3layouts_events_text port_info_agile" style="background: rgba(191, 63, 87, 0.5);">
						<h6><?= $pr['desc'] ?></h6>
					</div>
				</div>
			</li>
			<?php } ?>
		</ul>
	</div>
	 <div class="w3ls-welcome_sec">
				<div class="wls_head_all">
					<h3>Gallery</h3>
				</div>
		<ul class="portfolio_agile_info_w3ls">
		    <?php $gallery = $this->data->fetch('businessGallery', array('parent_id' => $business[0]['user_id'])); ?>
		    <?php foreach($gallery as $ga){ ?>
			<li>
				<div class="agile_events_top_grid">	
					<div class="w3_agileits_evets_text_img">
						<a href="<?= base_url('assets_f/img/business') ?>/<?= $ga['img'] ?>" class="lsb-preview" data-lsb-group="header">
							<div class="view view-eighth">
								<img src="<?= base_url('assets_f/img/business') ?>/<?= $ga['img'] ?>" alt=" " class="img-responsive" />
								<div class="mask">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
								</div>
							</div>
						</a>
					</div>
					<div class="agileits_w3layouts_events_text port_info_agile" style="background: rgba(191, 63, 87, 0.5);">
						<h6><?= $ga['desc'] ?></h6>
					</div>
				</div>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
</div>
<!-- //Gallery -->
<!-- Stats-->
<!-- contact -->
	<div class="contact" id="contact">
		<div class="container">
			<div class="w3l-services-heading">
				<div class="wls_head_all">
					<h3>Contact</h3>
				</div>
			</div>
			<div class="agile-contact-grids">
				<div class="col-md-5 address">
					<h4>Contact Info</h4>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Visit Us</h5>
							<p><?= $business[0]['address']." ,".$business[0]['addressLine2']." ,".$business[0]['town']." ".$business[0]['country']."<br/>".$business[0]['postcode'] ?> </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Mail Us</h5>
							<p><a href="mailto:<?= $business[0]['email'] ?>"><?= $business[0]['email'] ?></a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Call Us</h5>
							<p>+<?= $business[0]['phone'] ?></p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-7 contact-form">
					<form action="#" method="post">
						<input type="text" name="First Name" placeholder="First Name" required="">
						<input class="email" name="Last Name" type="text" placeholder="Last Name" required="">
						<input type="text" name="Number" placeholder="Mobile Number" required="">
						<input class="email" name="Email" type="text" placeholder="Email" required="">
						<textarea name="Message" placeholder="Message" required=""></textarea>
						<input type="submit" value="SUBMIT">
					</form>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!-- //contact -->
	<!-- map -->
	<!--<div class="agileits-w3layouts-map">-->
	<!--	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783" class="map" allowfullscreen=""></iframe>-->
	<!--</div>-->
	<!-- //map -->
<!-- footer -->

<div class="footer-bot wow fadeInRight animated" data-wow-delay=".5s" style="background: rgba(191, 63, 87, 0.5);">
	<div class="container">
			<div class="logo2">
				<h3><a href="<?= $_SERVER['HTTP_REFERER'] ?>"><?= $business[0]['title'] ?></a></h3>
			</div>
			<div class="ftr-menu">
				 <ul>
					<li><a class="scroll" href="#home">Home </a></li>
					<li><a class="scroll" href="#about">About</a></li>
					<li><a class="scroll" href="#services">Product</a></li>
					<li><a class="scroll" href="#gallery">Gallery</a></li>
					<!--<li><a class="scroll" href="#team">Team</a></li>-->
					<li><a class="scroll" href="#contact">Contact</a></li>
				 </ul>
			</div>
			<div class="clearfix"></div>
	</div>
</div>
<div class="copy-right wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
			<p> &copy; <?= date('Y') ?> <a href="<?= base_url() ?>">Membership Management System</a> . All Rights Reserved | Design by  <a href="https://bezaleelsolutions.com"> Bezaleel Solutions Ltd.</a></p>
	</div>
</div>
<!-- //footer -->
<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Corp Deal
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="<?= base_url('assets/assets/themes/1') ?>/images/modal2.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up  --> 
<!-- bootstrap-modal-pop-up two-->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Corp Deal
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="<?= base_url('assets/assets/themes/1') ?>/images/modal1.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up two--> 

	<!-- js -->
	<script type="text/javascript" src="<?= base_url('assets/assets/themes/1') ?>/js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- flexSlider -->
					<script defer src="<?= base_url('assets/assets/themes/1') ?>/js/jquery.flexslider.js"></script>
					<script type="text/javascript">
						$(window).load(function(){
						  $('.flexslider').flexslider({
							animation: "slide",
							start: function(slider){
							  $('body').removeClass('loading');
							}
						  });
						});
					</script>
				<!-- //flexSlider -->
	<!-- gallery-pop-up -->
	<script src="<?= base_url('assets/assets/themes/1') ?>/js/lsb.min.js"></script>
	<script>
	$(window).load(function() {
		  $.fn.lightspeedBox();
		});
	</script>
<!-- //gallery-pop-up -->

<!-- Number Scroler-->
	<script src="<?= base_url('assets/assets/themes/1') ?>/js/numscroller-1.0.js"></script>
<!-- /Number Scroler-->
<!-- start-smoth-scrolling -->
				<script type="text/javascript" src="<?= base_url('assets/assets/themes/1') ?>/js/move-top.js"></script>
				<script type="text/javascript" src="<?= base_url('assets/assets/themes/1') ?>/js/easing.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
		<!-- start-smoth-scrolling -->
		<!-- smooth scrolling-bottom-to-top -->
				<script type="text/javascript">
					$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
					*/								
					$().UItoTop({ easingType: 'easeOutQuart' });
					});
				</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				<script src="<?= base_url('assets/assets/themes/1') ?>/js/SmoothScroll.min.js"></script>



<script type="text/javascript" src="<?= base_url('assets/assets/themes/1') ?>/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 



</body>

</html>