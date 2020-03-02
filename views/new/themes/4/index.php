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
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:100,300,400,400italic,500,700,900'>

    <!-- CSS -->
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/css/global.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/builder/css/structure.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/builder/css/builder.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/builder/css/custom.css'>

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/css/settings.css">

</head>

<body class="home template-slider layout-full-width mobile-tb-left no-content-padding header-overlay header-transparent header-fw minimalist-header sticky-header sticky-white ab-hide subheader-both-center">
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper">
            <!-- Header -->
            <header id="Header">
                <div id="Overlay">
                    <nav id="overlay-menu" class="menu-main-menu-container">
                        <ul id="menu-main-menu" class="overlay-menu">
                            <li class="current_page_item">
                                <a href="<?= base_url('home/redirect/'.$business[0]['user_id'].'/4/'.str_replace(" ", "-", $business[0]['title'])) ?>">Home</a>
                            </li>
                            <li>
                                <a href="#about">About us</a>
                            </li>
                            <li>
                                <a href="#services">Services</a>
                            </li>
                            <li>
                                <a href="#product">Product</a>
                            </li>
                            <li>
                                <a href="#gallery">Gallery</a>
                            </li>
                            <li>
                                <a href="#contact">Contact us</a>
                            </li>
                            
                        </ul>
                    </nav>
                </div><a class="overlay-menu-toggle" href="#"><i class="open icon-menu"></i><i class="close icon-cancel"></i></a>
                <!-- Header -  Logo and Menu area -->
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix loading">
                                <!-- Logo-->
                                <div class="logo">
                                    <a id="logo" href="index-builder.html" title="BeBuilder - BeTheme"> <img class="scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" alt="BeBuilder - BeTheme" />
                                    </a>
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper"></div>
                                <!-- Secondary menu area - only for certain pages -->
                                <div class="secondary_menu_wrapper"></div>
                                <!-- Banner area - only for certain pages-->
                                <div class="banner_wrapper"></div>
                                <!-- Header Searchform area-->
                                <div class="search_wrapper">
                                    <form method="get" id="searchform" action="#">
                                        <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
                                        <input type="submit" class="submit flv_disp_none" value="" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Revolution slider area-->
                <div class="mfn-main-slider" id="mfn-rev-slider">
                    <div id="rev_slider_1_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container sections_style_1">
                        <div id="rev_slider_1_2" class="rev_slider fullwidthabanner tp-overflow-hidden" data-version="5.0.4.1">
                            <ul>
                                <?php $bannerImg = $this->data->myquery("SELECT * FROM `bannerImages` WHERE FIND_IN_SET(id, '".$business[0]['banner']."')");?>
                                <?php for($i = 0; $i < count($bannerImg); $i++){ ?>
                                <li data-index="rs-1" data-transition="random" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">
                                    <img src="<?= base_url('assets_f/banners/'.$bannerImg[$i]['img']) ?>" alt="" width="1920" height="870" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-0" id="slide-1-layer-1" data-x="right" data-hoffset="30" data-y="bottom" data-voffset="20" data-width="auto" data-height="auto" data-transform_idle="" data-transform_in="opacity:0;s:300;e:Power3.easeInOut;" data-transform_out="auto:auto;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 5;"><img src="content/builder/images/home_builder_slider_button.jpg" alt="" width="506" height="89" data-no-retina>
                                    </div>
                                    <!--<div class="tp-caption mfnrsbuilderlargelight tp-resizeme rs-parallaxlevel-4" id="slide-1-layer-2" data-x="center" data-hoffset="250" data-y="center" data-voffset="0" data-width="auto" data-height="auto" data-transform_idle="" data-transform_in="opacity:0;s:300;e:Power3.easeInOut;" data-transform_out="auto:auto;s:300;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; min-width: auto; min-height: auto; white-space: nowrap; max-width: auto; max-height: auto; font-size: 60px; line-height: 70px; font-weight: 900; color: rgba(255, 255, 255, 1.00);font-family:Lato;border-color:rgba(0, 0, 0, 1.00);">-->
                                    <!--    <span class="themecolor">We are from London</span>-->
                                    <!--    <br> We are BeBuilder-->
                                    <!--    <br> We build firmly-->
                                    <!--</div>-->
                                </li>
                                <?php } ?>
                            </ul>
                            <div class="tp-bannertimer tp-bottom flv_viz_hid"></div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div  id="about" class="section" style="padding-top:100px; padding-bottom:50px; background-color:#FCFCFC">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Sixth (1/6) Column -->
                                    <div class="column one-sixth column_placeholder">
                                        <div class="placeholder">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_column ">
                                        <div class="column_attr">
                                            <h2>About Us</h2>
                                            <hr class="no_line hrmargin_b_30" />
                                            <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper"><img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/builder/images/home_builder_sep.png" alt="" width="41" height="7" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column ">
                                        <div class="column_attr">
                                            <h5 style="font-weight: 700; color: #071323;"><?= $business[0]['services'] ?></h5>
                                            <hr class="no_line hrmargin_b_30" />
                                            <!--<a class="button button_theme button_js" href="content/builder/about-us.html"><span class="button_label">See more</span></a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  id="services" class="section" style="padding-top:100px; padding-bottom:50px; background-color:#FCFCFC">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Sixth (1/6) Column -->
                                    <div class="column one-sixth column_placeholder">
                                        <div class="placeholder">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_column ">
                                        <div class="column_attr">
                                            <h2>Services</h2>
                                            <hr class="no_line hrmargin_b_30" />
                                            <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper"><img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/builder/images/home_builder_sep.png" alt="" width="41" height="7" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column ">
                                        <div class="column_attr">
                                            <h5 style="font-weight: 700; color: #071323;"><?= $business[0]['about'] ?></h5>
                                            <hr class="no_line hrmargin_b_30" />
                                            <!--<a class="button button_theme button_js" href="content/builder/about-us.html"><span class="button_label">See more</span></a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="product" style="padding-top:100px; padding-bottom:50px; background-color:#FCFCFC" class="section equal-height full-width sections_style_0">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <h2>Products</h2>
                                    <!-- One Fourth (1/4) Column -->
                                    <?php $product = $this->data->fetch('productservices', array('parent_id' => $business[0]['user_id'])); ?>
		                            <?php foreach($product as $pr){ ?>
                                        <div class="column one-third column_zoom_box ">
                                            <div class="zoom_box">
                                                    <div class="photo"><img class="scale-with-grid" src="<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>" alt="" width="448" height="546" />
                                                    </div>
                                                    <div class="desc" style="background-color:rgba(7, 19, 35, 0.8);">
                                                        <div class="desc_wrap">
                                                            <div class="desc_img"><img class="scale-with-grid" src="<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>" alt="">
                                                            </div>
                                                            <div class="desc_txt">
                                                                <?= $pr['desc'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div id="gallery" style="padding-top:100px; padding-bottom:50px; background-color:#FCFCFC" class="section equal-height full-width sections_style_0">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <h2>Gallery</h2>
                                    <!-- One Fourth (1/4) Column -->
                                    <?php $product = $this->data->fetch('businessGallery', array('parent_id' => $business[0]['user_id'])); ?>
		                            <?php foreach($product as $pr){ ?>
                                        <div class="column one-third column_zoom_box ">
                                            <div class="zoom_box">
                                                    <div class="photo"><img class="scale-with-grid" src="<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>" alt="" width="448" height="546" />
                                                    </div>
                                                    <div class="desc" style="background-color:rgba(7, 19, 35, 0.8);">
                                                        <div class="desc_wrap">
                                                            <div class="desc_img"><img class="scale-with-grid" src="<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>" alt="">
                                                            </div>
                                                            <div class="desc_txt">
                                                                <?= $pr['desc'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer id="Footer" class="clearfix">
            <!-- Footer copyright-->
            <div class="footer_copy">
                <div class="container">
                    <div class="column one">
                        <a id="back_to_top" class="button button_left button_js " href="#"><span class="button_icon"><i class="icon-up-open-big"></i></span></a>
                        <div class="copyright">
                            <p> &copy; <?= date('Y') ?> <a href="<?= base_url() ?>">Membership Management System</a> . All Rights Reserved | Design by  <a href="https://bezaleelsolutions.com"> Bezaleel Solutions Ltd.</a></p>
                        </div>
                        <!--Social info area-->
                        <ul class="social"></ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JS -->
    <script src="<?= base_url() ?>assets/assets/themes/js/jquery-2.1.4.min.js"></script>

    <script src="<?= base_url() ?>assets/assets/themes/js/mfn.menu.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/jquery.plugins.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/jquery.jplayer.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/animations/animations.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/js/scripts.js"></script>

    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>

    <script>
        var tpj = jQuery;
        tpj.noConflict();
        var revapi1;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_1_2").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_2");
            } else {
                revapi1 = tpj("#rev_slider_1_2").show().revolution({
                    sliderType: "standard",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 5000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                    },
                    gridwidth: 1920,
                    gridheight: 800,
                    lazyType: "none",
                    parallax: {
                        type: "scroll",
                        origo: "enterpoint",
                        speed: 400,
                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
                        disable_onmobile: "on"
                    },
                    shadow: 0,
                    spinner: "sipnner3",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: "off",
                    }
                });
            }
        });
        /*]]>*/
    </script>
    
    <script>
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img.logo-main");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src", "content/builder/images/retina-builder.png").width(retinaLogoW).height(retinaLogoH);
                var stickyEl = jQuery("#logo img.logo-sticky");
                var stickyLogoW = stickyEl.width();
                var stickyLogoH = stickyEl.height();
                stickyEl.attr("src", "content/builder/images/retina-builder.png").width(stickyLogoW).height(stickyLogoH);
                var mobileEl = jQuery("#logo img.logo-mobile");
                var mobileLogoW = mobileEl.width();
                var mobileLogoH = mobileEl.height();
                mobileEl.attr("src", "content/builder/images/retina-builder.png").width(mobileLogoW).height(mobileLogoH);
            }
        });
    </script>
</body>

</html>