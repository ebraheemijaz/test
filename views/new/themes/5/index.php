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
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Comfortaa:100,300,400,400italic,700'>

    <!-- CSS -->
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/css/global.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/architect/css/structure.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/architect/css/architect.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/architect/css/custom.css'>
    
    <!-- Revolution Slider -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/css/settings.css">

</head>

<body class="home page template-slider layout-full-width header-classic minimalist-header header-menu-right sticky-white no-content-padding">
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper">
            <!-- Header -->
            <header id="Header">

                <!-- Header -  Logo and Menu area -->
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <!-- Logo-->
                                <div class="logo">
                                    <h1><a id="logo" href="<?= base_url('home/redirect/'.$business[0]['user_id'].'/3/'.str_replace(" ", "-", $business[0]['title'])) ?>" title="BeArchitect - BeTheme"><img class="scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" alt="BeArchitect - BeTheme" /></a></h1>
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu" class="menu">
                                            <li class="current_page_item">
                                                <a href="<?= base_url('home/redirect/'.$business[0]['user_id'].'/3/'.str_replace(" ", "-", $business[0]['title'])) ?>"><span>HOME</span></a>
                                            </li>
                                            <li>
                                                <a href="#about"><span>ABOUT US</span></a>
                                            </li>
                                            <li>
                                                <a href="#services"><span>SERVICES</span></a>
                                            </li>
                                            <li>
                                                <a href="#product"><span>PRODUCTS</span></a>
                                            </li>
                                            <li>
                                                <a href="#gallery"><span>GALLERY</span></a>
                                            </li>
                                            <li>
                                                <a href="#contact"><span>CONTACT</span></a>
                                            </li>
                                        </ul>
                                    </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                                </div>
                                <!-- Header Searchform area-->
                                <div class="search_wrapper">
                                    <form method="get" action="#">
                                        <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i class="icon-cancel"></i></a>
                                        <input type="text" class="field" name="s" placeholder="Enter your search" />
                                        <input type="submit" class="submit flv_disp_none" value="" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Revolution slider area-->
                <div class="mfn-main-slider" id="mfn-rev-slider">
                    <div id="rev_slider_1_2_wrapper" class="rev_slider_wrapper fullscreen-container" style="padding:0px;">
                        <div id="rev_slider_1_2" class="rev_slider fullscreenbanner" data-version="5.0.4.1">
                            <ul>
                                <?php $bannerImg = $this->data->myquery("SELECT * FROM `bannerImages` WHERE FIND_IN_SET(id, '".$business[0]['banner']."')");?>
                                <?php for($i = 0; $i < count($bannerImg); $i++){ ?>
                                <li data-index="rs-3" data-transition="fade" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="content/architect/images/home_architect_portfolio_big3-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">
                                    <img src="<?= base_url('assets_f/banners/'.$bannerImg[$i]['img']) ?>" alt="" width="1920" height="1200" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                    <div class="tp-caption tp-resizeme" id="slide-3-layer-3" data-x="240" data-y="center" data-voffset="0" data-width="auto" data-height="auto" data-transform_idle="" data-transform_in="x:50px;opacity:0;s:800;e:Power3.easeInOut;" data-transform_out="auto:auto;s:300;" data-start="1900" data-responsive_offset="on" style="z-index: 7;"><img src="content/architect/images/home_architect_slider_line.png" alt="" width="344" height="1" data-no-retina>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                            <div class="tp-bannertimer" style="height: 5px; background-color: rgba(0, 0, 0, 0.15);"></div>
                        </div>
                    </div>
                </div>
                <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section mcb-section" style="padding-top:110px; padding-bottom:50px; background-image:url(content/accountant3/images/home_accountant3_slider_pic1-1.png); background-repeat:no-repeat; background-position:center top">
                            <div class="section_wrapper mcb-section-inner">
                                <div id="about" class="wrap mcb-wrap one valign-top clearfix" style="padding:0 0 0 4%">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column  column-margin-10px">
                                            <div class="column_attr clearfix align_left">
                                                <h2>About Us</h2>
                                                <h6></h6>
                                                <p>
                                                    <?= $business[0]['services'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="services" class="section mcb-section" style="padding-top:0px; padding-bottom:0px">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one  column-margin-0px valign-top clearfix" style="padding:80px 0 65px; background-color:transparent;">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix align_center">
                                                <h2>Services</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap one valign-top move-up clearfix" style="margin-top:-64px">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one-fourth column_column">
                                            <div class="column_attr clearfix align_center" style=" padding:0 5%">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic1.png">
                                                    </div>
                                                </div>
                                                <hr class="no_line" style="margin:0 auto 20px">
                                                <h4></h4>
                                                <p>
                                                    <?= $business[0]['about'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_column">
                                            <div class="column_attr clearfix align_center" style=" padding:0 5%">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic2.png">
                                                    </div>
                                                </div>
                                                <hr class="no_line" style="margin:0 auto 20px">
                                                
                                                <p>
                                                    <?= $business[0]['about'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_column">
                                            <div class="column_attr clearfix align_center" style=" padding:0 5%">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic3.png">
                                                    </div>
                                                </div>
                                                <hr class="no_line" style="margin:0 auto 20px">
                                                
                                                <p>
                                                    <?= $business[0]['about'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one-fourth column_column">
                                            <div class="column_attr clearfix align_center" style=" padding:0 5%">
                                                <div class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                    <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic4.png">
                                                    </div>
                                                </div>
                                                <hr class="no_line" style="margin:0 auto 20px">
                                                
                                                <p>
                                                    <?= $business[0]['about'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column mcb-column one column_divider">
                                            <hr class="no_line">
                                        </div>
                                        <div class="column mcb-column one-third column_placeholder">
                                            <div class="placeholder">
                                                &nbsp;
                                            </div>
                                        </div>
                                        
                                        <div class="column mcb-column one column_divider">
                                            <hr class="no_line" style="margin:0 auto 40px">
                                        </div>
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix">
                                                <div style="width: 100%; height: 3px; background: #f7f6fa"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="product" class="section mcb-section" style="padding-top:50px; padding-bottom:50px">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix align_center">
                                                <h2>Products</h2>
                                            </div>
                                        </div>
                                        <?php $product = $this->data->fetch('productservices', array('parent_id' => $business[0]['user_id'])); ?>
		                                <?php foreach($product as $pr){ ?>
                                            <div class="column mcb-column one-third column_offer_thumb">
                                            <div class="offer_thumb bottom">
                                                <ul class="offer_thumb_ul">
                                                    <li class="offer_thumb_li id_1">
                                                        <div class="image_wrapper">
                                                            <img src="<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>" class="scale-with-grid wp-post-image">
                                                        </div>
                                                        <div class="desc_wrapper align_left no-link">
                                                            <div class="desc">
                                                                <hr class="no_line" style="margin: 0 auto 10px">
                                                                <p>
                                                                    <?= $pr['desc'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="thumbnail" style="display:none">
                                                            <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic7-85x85.jpg" class="scale-with-grid wp-post-image">
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="slider_pagination"></div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="gallery" class="section mcb-section" style="padding-top:50px; padding-bottom:50px">
                            <div class="section_wrapper mcb-section-inner">
                                <div class="wrap mcb-wrap one valign-top clearfix">
                                    <div class="mcb-wrap-inner">
                                        <div class="column mcb-column one column_column">
                                            <div class="column_attr clearfix align_center">
                                                <h2>Gallery</h2>
                                            </div>
                                        </div>
                                        <?php $product = $this->data->fetch('businessGallery', array('parent_id' => $business[0]['user_id'])); ?>
		                                <?php foreach($product as $pr){ ?>
                                            <div class="column mcb-column one-third column_offer_thumb">
                                            <div class="offer_thumb bottom">
                                                <ul class="offer_thumb_ul">
                                                    <li class="offer_thumb_li id_1">
                                                        <div class="image_wrapper">
                                                            <img src="<?= base_url('assets_f/img/business') ?>/<?= $pr['img'] ?>" class="scale-with-grid wp-post-image">
                                                        </div>
                                                        <div class="desc_wrapper align_left no-link">
                                                            <div class="desc">
                                                                <hr class="no_line" style="margin: 0 auto 10px">
                                                                <p>
                                                                    <?= $pr['desc'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="thumbnail" style="display:none">
                                                            <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic7-85x85.jpg" class="scale-with-grid wp-post-image">
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="slider_pagination"></div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
            </header>
        </div>

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
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
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
                        },
                        arrows: {
                            style: "uranus",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "bottom",
                                h_offset: 20,
                                v_offset: 20
                            },
                            right: {
                                h_align: "right",
                                v_align: "bottom",
                                h_offset: 20,
                                v_offset: 20
                            }
                        }
                    },
                    gridwidth: 1920,
                    gridheight: 900,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "spinner3",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "#Top_bar",
                    fullScreenOffset: "",
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
    </script>

</body>

</html>