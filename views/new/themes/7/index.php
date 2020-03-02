<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 "> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title><?= $business[0]['title'] ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:100,300,400,400italic,500,700,700italic'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:100,300,400,400italic,500,700,700italic'>

    <!-- CSS -->
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/css/global.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/renovate3/css/structure.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/renovate3/css/renovate3.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/renovate3/css/custom.css'>

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/css/settings.css">

</head>

<body class="template-slider color-custom style-default button-default layout-full-width no-content-padding header-classic minimalist-header sticky-header sticky-tb-color ab-hide subheader-both-left menu-link-color menuo-right menuo-no-borders mobile-tb-center mobile-side-slide mobile-mini-mr-ll be-reg-20973">
    <div id="Wrapper">
        <div id="Header_wrapper" class="bg-parallax" data-enllax-ratio="0.3">
            <header id="Header">
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <div class="logo">
                                    <a id="logo" href="index-renovate3.html" title="BeRenovate 3 - BeTheme" data-height="60" data-padding="25">
                                        <img class="logo-main scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-retina="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-height="53" alt="renovate3">
                                        <img class="logo-sticky scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-retina="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-height="53" alt="renovate3">
                                        <img class="logo-mobile scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-retina="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-height="53" alt="renovate3">
                                        <img class="logo-mobile-sticky scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-retina="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-height="53" alt="renovate3"></a>
                                </div>
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu" class="menu menu-main">
                                            <li class="current-menu-item">
                                                <a href="<?= base_url('home/redirect/'.$business[0]['user_id'].'/7/'.str_replace(" ", "-", $business[0]['title'])) ?>"><span>Home</span></a>
                                            </li>
                                            <li>
                                                <a href="#about"><span>About us</span></a>
                                            </li>
                                            <li>
                                                <a href="#services"><span>Services</span></a>
                                            </li>
                                            <li>
                                                <a href="#product"><span>Product</span></a>
                                            </li>
                                            <li>
                                                <a href="#gallery"><span>Gallery</span></a>
                                            </li>
                                            <li>
                                                <a href="#contact"><span>Contact</span></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <a class="responsive-menu-toggle" href="#"><i class="icon-menu-fine"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mfn-main-slider" id="mfn-rev-slider">
                    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8">
                            <ul>
                                <?php $bannerImg = $this->data->myquery("SELECT * FROM `bannerImages` WHERE FIND_IN_SET(id, '".$business[0]['banner']."')");?>
                                <?php for($i = 0; $i < count($bannerImg); $i++){ ?>
                                <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide"
                                    data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <img src="<?= base_url('assets_f/banners/'.$bannerImg[$i]['img']) ?>" title="home_renovate3_slider_bg" width="1920" height="1000" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="8" class="rev-slidebg" data-no-retina>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section mcb-section" style="padding-top:0px; padding-bottom:40px">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one-second valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix" style=" padding:80px 10% 45px 0;">
                                                <h4>SOME PEOPLE LOOK FOR A BEAUTIFUL PLACE. OTHERS MAKE A PLACE BEAUTIFUL.</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-second valign-top move-up clearfix" style="margin-top:-300px">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix" style=" background-color:#5932ff; background-image:url('<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic3.png'); background-repeat:no-repeat; background-position:left top; padding:80px 15% 65px;">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic1.png">
                                                    </div>
                                                </div>
                                                <hr class="no_line" style="margin:0 auto 40px">
                                                <h3 style="color:#fff">OVER 12 YEARS OF EXPERIENCE.</h3>
                                                <hr class="no_line" style="margin:0 auto 30px">
                                                <p style="background: url(content/renovate3/images/home_renovate3_pic2.png) no-repeat right center; padding-right: 70px;">
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="about" class="section mcb-section" style="padding-top:0px; padding-bottom:80px">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix">
                                                <div style="background: #5932ff; width: 50px; height: 4px;"></div>
                                                <hr class="no_line" style="margin:0 auto 40px">
                                                <h2 class="themecolor">About Us</h2>
                                                <hr class="no_line" style="margin:0 auto 20px">
                                                <h4><?= $business[0]['services'] ?></h4>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="no_line" style="margin:0 auto 40px">
                                        </div>
                                    </div>
                                </div>
                                <div id="services" class="wrap mcb-wrap one-fourth valign-top clearfix" style="padding:0 5% 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image">
                                            <div class="image_frame image_item no_link scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic4.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix">
                                                <h4 class="themecolor">CONSTRUCTION</h4>
                                                <hr class="no_line" style="margin:0 auto 15px">
                                                <p>
                                                    <?= $business[0]['about'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-fourth valign-top clearfix" style="padding:0 5% 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image">
                                            <div class="image_frame image_item no_link scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic5.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix">
                                                <h4 class="themecolor">INSTALLATION</h4>
                                                <hr class="no_line" style="margin:0 auto 15px">
                                                <p>
                                                    <?= $business[0]['about'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-fourth valign-top clearfix" style="padding:0 5% 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image">
                                            <div class="image_frame image_item no_link scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic6.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix">
                                                <h4 class="themecolor">PAINTING</h4>
                                                <hr class="no_line" style="margin:0 auto 15px">
                                                <p>
                                                    <?= $business[0]['about'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-fourth valign-top clearfix" style="padding:0 5% 0 0">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_image">
                                            <div class="image_frame image_item no_link scale-with-grid no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic7.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix">
                                                <h4 class="themecolor">FINISHING</h4>
                                                <hr class="no_line" style="margin:0 auto 15px">
                                                <p>
                                                    <?= $business[0]['about'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_divider ">
                                            <hr class="no_line" style="margin:0 auto 40px">
                                        </div>
                                        <div class="column mcb-column one-third column_placeholder">
                                            <div class="placeholder">
                                                &nbsp;
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="product" class="section mcb-section no-margin-h no-margin-v equal-height-wrap" style="padding-top:0px; padding-bottom:80px">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one-second valign-middle clearfix" style="padding:0 1%">
                                    <div class="mcb-wrap-inner">
                                        <?php $product = $this->data->fetch('productservices', array('parent_id' => $business[0]['user_id'])); ?>
		                                        <?php foreach($product as $pr){ ?>
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix" style=" background-color:#191d1e; background-image:url('<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>'); background-repeat:no-repeat; background-position:right top; padding:150px 15% 150px;">
                                                <h4 style="color:#fff">Products</h4>
                                                <hr class="no_line" style="margin:0 auto 40px">
                                                <h2 style="color:#fff">SLATE AND TILE ROOFING.</h2>
                                                <hr class="no_line" style="margin:0 auto 30px">
                                                <p style="background: url('<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>') no-repeat right center; padding-right: 70px;">
                                                    <?= $pr['desc'] ?>
                                                </p>
                                                <hr class="no_line" style="margin:0 auto 30px">
                                                <!--<a class="button button_size_2 button_theme button_js" href="content/renovate3/works.html"><span class="button_label">SEE ALL</span></a>-->
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one-second valign-middle clearfix" style="padding:0 1%">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix" style=" background-color:#5932ff; background-image:url('<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic3.png'); background-repeat:no-repeat; background-position:left top; padding:80px 15% 65px;">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic8.png">
                                                    </div>
                                                </div>
                                                <hr class="no_line" style="margin:0 auto 40px">
                                                <h3 style="color:#fff">WE ARE READY FOR NEW CHALLENGES!</h3>
                                                <hr class="no_line" style="margin:0 auto 30px">
                                                <p style="color: #bdadff;">
                                                    Duis dignissim mi ut laoreet mollis. Nunc id tellus finibus, eleifend mi vel, maximus justo. Maecenas mi tortor, pellentesque.
                                                    <v/p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix" style=" background-color:#9bd1ee; background-image:url('<?= base_url() ?>assets/assets/themes/content/renovate3/images/home_renovate3_pic10.jpg'); background-repeat:no-repeat; background-position:center bottom; padding:400px 15% 0;">
                                                <div style="background: #ff6b3d; padding: 45px 45px 30px;">
                                                    <h3><a href="content/renovate3/services.html" style="color:#fff">TEAM - EXTENDING SERVICE</a></h3>
                                                    <p style="color: #ffc4b1;">
                                                        Lorem ipsum dolor sit amet
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer id="Footer" class="clearfix">
            <div class="footer_copy">
                <div class="container">
                    <div class="column one">
                        <a id="back_to_top" class="button button_js" href="#"><i class="icon-up-open-big"></i></a>
                        <div class="copyright">
                            <p><small> &copy; <?= date('Y') ?> <a href="<?= base_url() ?>">Membership Management System</a> . All Rights Reserved | Design by  <a href="https://bezaleelsolutions.com"> Bezaleel Solutions Ltd.</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- side menu -->
    <div id="Side_slide" class="right dark" data-width="250">
        <div class="close-wrapper">
            <a href="#" class="close"><i class="icon-cancel-fine"></i></a>
        </div>
        <div class="menu_wrapper"></div>
    </div>
    <div id="body_overlay"></div>


    <!-- JS -->
    <script src="<?= base_url() ?>assets/assets/themes/js/jquery-2.1.4.min.js"></script>

    <script src="<?= base_url() ?>assets/assets/themes/js/mfn.menu.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/jquery.plugins.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/jquery.jplayer.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/animations/animations.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/translate3d.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/scripts.js"></script>


    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/jquery.themepunch.revolution.min.js"></script>

    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.video.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.parallax.min.js"></script>

    <script>
        var revapi1, tpj;
			( function() {
					if (!/loaded|interactive|complete/.test(document.readyState))
						document.addEventListener("DOMContentLoaded", onLoad);
					else
						onLoad();
					function onLoad() {
						if (tpj === undefined) {
							tpj = jQuery;
							if ("off" == "on")
								tpj.noConflict();
						}
						if (tpj("#rev_slider_1_1").revolution == undefined) {
							revslider_showDoubleJqueryError("#rev_slider_1_1");
						} else {
							revapi1 = tpj("#rev_slider_1_1").show().revolution({
								sliderType : "hero",
								sliderLayout : "auto",
								dottedOverlay : "none",
								delay : 9000,
								visibilityLevels : [1240, 1024, 778, 480],
								gridwidth : 1080,
								gridheight : 1000,
								lazyType : "none",
								parallax : {
									type : "scroll",
									origo : "enterpoint",
									speed : 400,
									speedbg : 0,
									speedls : 0,
									levels : [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
								},
								shadow : 0,
								spinner : "spinner2",
								autoHeight : "off",
								disableProgressBar : "on",
								hideThumbsOnMobile : "off",
								hideSliderAtLimit : 0,
								hideCaptionAtLimit : 0,
								hideAllCaptionAtLilmit : 0,
								debugMode : false,
								fallbacks : {
									simplifyAll : "off",
									disableFocusListener : false,
								}
							});
						};
					};
				}());
    </script>


</body>

</html>