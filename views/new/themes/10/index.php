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
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,500,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Yantramanav:100,300,400,400italic,500,700,700italic'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Noto+Serif:100,300,400,400italic,500,700,700italic'>

    <!-- CSS -->
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/css/global.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/accountant3/css/structure.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/accountant3/css/accountant3.css'>
    <link rel='stylesheet' href='<?= base_url() ?>assets/assets/themes/content/accountant3/css/custom.css'>

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/themes/plugins/rs-plugin/css/settings.css">

</head>

<body class="color-custom style-default button-default layout-full-width if-overlay if-border-hide no-content-padding header-plain minimalist-header-no sticky-header sticky-tb-color ab-hide subheader-both-center menu-link-color menuo-right footer-copy-center mobile-tb-hide mobile-side-slide mobile-mini-mr-ll tablet-sticky mobile-header-mini mobile-sticky be-reg-209">
    <div id="Wrapper">
        <div id="Header_wrapper">
            <header id="Header">
                <div class="header_placeholder"></div>
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <div class="logo">
                                    <a id="logo" href="<?= base_url('home/redirect/'.$business[0]['user_id'].'/3/'.str_replace(" ", "-", $business[0]['title'])) ?>" title="BeAccountant 3 - BeTheme" data-height="50" data-padding="5">
                                        <?php if(!empty($business[0]['logo']) || $business[0]['logo'] != NULL){ ?>
                                            <img class="logo-main scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-retina="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-height="20" alt="accountant"><img class="logo-sticky scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-retina="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-height="20" alt="accountant"><img class="logo-mobile scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-retina="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-height="20" alt="accountant"><img class="logo-mobile-sticky scale-with-grid" src="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-retina="<?= base_url('assets_f/img/business')."/".$business[0]['logo'] ?>" data-height="20" alt="accountant">
                                        <?php }else{ ?>
                                            <h1><?= $business[0]['title'] ?></h1>
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu nav navbar-nav navbar-right" class="menu menu-main">
                                            <li class="active">
                                                <a href="<?= base_url('home/redirect/'.$business[0]['user_id'].'/3/'.str_replace(" ", "-", $business[0]['title'])) ?>"><span>Home</span></a>
                                            </li>
                                            <li>
                                                <a href="#about"><span>About us</span></a>
                                            </li>
                                            <li>
                                                <a href="#services"><span>Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#gallery"><span>Gallery</span></a>
                                            </li>
                                            <li>
                                                <a href="#contact"><span>Contact us</span></a>
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
                    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px">
                        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7.2">
                            <ul>
                                <?php $bannerImg = $this->data->myquery("SELECT * FROM `bannerImages` WHERE FIND_IN_SET(id, '".$business[0]['banner']."')");?>
                                <?php for($i = 0; $i < count($bannerImg); $i++){ ?>
                                <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide"
                                    data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <img src="<?= base_url('assets_f/banners/'.$bannerImg[$i]['img']) ?>" title="home_accountant3_slider_pic1" width="1920" height="765" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                    <!--<div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="51" data-y="209" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'-->
                                    <!--    data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 60px; line-height: 64px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Noto Serif">-->
                                    <!--    Accounting services-->
                                    <!--    <br> via the Internet-->
                                    <!--</div>-->
                                    <!--<div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="50" data-y="370" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'-->
                                    <!--    data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 17px; line-height: 28px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Noto Serif">-->
                                    <!--    Aliquam erat volutpat. Pellentesque habitant morbi tristique-->
                                    <!--    <br> senectus et ultrices posuere eu, commodo ligula, quis wisi.-->
                                    <!--    <br> Mauris leo. Aenean ligula. Aliquam urna.-->
                                    <!--</div>-->
                                    <!--<div class="tp-caption rev-btn  tp-resizeme" id="slide-1-layer-3" data-x="54" data-y="497" data-width="['auto']" data-height="['auto']" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":"","speed":"300","ease":"Power2.easeInOut"}]'-->
                                    <!--    data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(81,96,128);bs:solid;bw:0 0 0 0;br:3px 3px 3px 3px;"}]'-->
                                    <!--    data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[16,16,16,16]" data-paddingright="[35,35,35,35]" data-paddingbottom="[16,16,16,16]" data-paddingleft="[35,35,35,35]" style="z-index: 7; white-space: nowrap; font-size: 17px; line-height: 17px; font-weight: 500; color: rgba(255,255,255,1); letter-spacing: px;font-family:Roboto;background-color:rgb(97,116,158);border-color:rgba(0,0,0,1);border-radius:5px 5px 5px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer">-->
                                    <!--    Read more-->
                                    <!--</div>-->
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
                                <div class="wrap mcb-wrap one  column-margin-0px valign-top clearfix" style="padding:80px 0 65px; background-color:#f7f6fa">
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
        <!--<div id="about">-->
        <!--    <div id="Content">-->
        <!--    <div class="content_wrapper clearfix">-->
        <!--        <div class="sections_group">-->
        <!--            <div class="entry-content">-->
        <!--                <div class="section mcb-section" style="padding-top:110px; padding-bottom:50px; background-image:url(content/accountant3/images/home_accountant3_slider_pic1-1.png); background-repeat:no-repeat; background-position:center top">-->
        <!--                    <div class="section_wrapper mcb-section-inner">-->
                                <!--<div class="wrap mcb-wrap two-third valign-top clearfix">-->
                                <!--    <div class="mcb-wrap-inner">-->
                                <!--        <div class="column mcb-column one column_blog ">-->
                                <!--            <div class="column_filters">-->
                                <!--                <div class="blog_wrapper isotope_wrapper clearfix">-->
                                <!--                    <div class="posts_group lm_wrapper col-2 grid">-->
                                <!--                        <div class="post-item isotope-item clearfix post type-post has-post-thumbnail hentry">-->
                                <!--                            <div class="date_label">-->
                                <!--                                March 28, 2018-->
                                <!--                            </div>-->
                                <!--                            <div class="image_frame post-photo-wrapper scale-with-grid image">-->
                                <!--                                <div class="image_wrapper">-->
                                <!--                                    <a href="content/accountant3/post.html">-->
                                <!--                                        <div class="mask"></div>-->
                                <!--                                        <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic5-960x700.jpg" class="scale-with-grid wp-post-image" />-->
                                <!--                                    </a>-->
                                <!--                                    <div class="image_links double">-->
                                <!--                                        <a href="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic5-1200x677.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a><a href="content/accountant3/post.html" class="link"><i class="icon-link"></i></a>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                                <!--                            <div class="post-desc-wrapper">-->
                                <!--                                <div class="post-desc">-->
                                <!--                                    <div class="post-head">-->
                                <!--                                        <div class="post-meta clearfix">-->
                                <!--                                            <div class="author-date">-->
                                <!--                                                <span class="vcard author post-author"><span class="label">Published by </span><i class="icon-user"></i> <span class="fn"><a href="#">admin</a></span></span><span class="date"><span class="label"> at </span>-->
                                <!--                                                <i-->
                                <!--                                                    class="icon-clock"></i> <span class="post-date updated">March 28, 2018</span></span>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="category">-->
                                <!--                                                <span class="cat-btn">Categories <i class="icon-down-dir"></i></span>-->
                                <!--                                                <div class="cat-wrapper">-->
                                <!--                                                    <ul class="post-categories">-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="content/accountant3/category.html" rel="category tag">Finances</a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="content/accountant3/category.html" rel="category tag">Tax</a>-->
                                <!--                                                        </li>-->
                                <!--                                                    </ul>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="post-title">-->
                                <!--                                        <h2 class="entry-title"><a href="content/accountant3/post.html">Class aptent taciti sociosqu</a></h2>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="post-excerpt"></div>-->
                                <!--                                    <div class="post-footer">-->
                                <!--                                        <div class="button-love">-->
                                <!--                                            <span class="love-text">Do you like it?</span><a href="#" class="mfn-love " data-id="37"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i><i class="icon-heart-fa"></i></span><span class="label">2</span></a>-->
                                <!--                                        </div>-->
                                <!--                                        <div class="post-links">-->
                                <!--                                            <i class="icon-doc-text"></i><a href="content/accountant3/post.html" class="post-more">Read more</a>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                        <div class="post-item isotope-item clearfix post type-post has-post-thumbnail hentry">-->
                                <!--                            <div class="date_label">-->
                                <!--                                March 28, 2018-->
                                <!--                            </div>-->
                                <!--                            <div class="image_frame post-photo-wrapper scale-with-grid image">-->
                                <!--                                <div class="image_wrapper">-->
                                <!--                                    <a href="content/accountant3/post.html">-->
                                <!--                                        <div class="mask"></div>-->
                                <!--                                        <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic6-960x700.jpg" class="scale-with-grid wp-post-image" />-->
                                <!--                                    </a>-->
                                <!--                                    <div class="image_links double">-->
                                <!--                                        <a href="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic6-1200x677.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a><a href="content/accountant3/post.html" class="link"><i class="icon-link"></i></a>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                                <!--                            <div class="post-desc-wrapper">-->
                                <!--                                <div class="post-desc">-->
                                <!--                                    <div class="post-head">-->
                                <!--                                        <div class="post-meta clearfix">-->
                                <!--                                            <div class="author-date">-->
                                <!--                                                <span class="vcard author post-author"><span class="label">Published by </span><i class="icon-user"></i> <span class="fn"><a href="#">admin</a></span></span><span class="date"><span class="label"> at </span>-->
                                <!--                                                <i-->
                                <!--                                                    class="icon-clock"></i> <span class="post-date updated">March 28, 2018</span></span>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="category">-->
                                <!--                                                <span class="cat-btn">Categories <i class="icon-down-dir"></i></span>-->
                                <!--                                                <div class="cat-wrapper">-->
                                <!--                                                    <ul class="post-categories">-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="content/accountant3/category.html" rel="category tag">Business</a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="content/accountant3/category.html" rel="category tag">Tax</a>-->
                                <!--                                                        </li>-->
                                <!--                                                    </ul>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="post-title">-->
                                <!--                                        <h2 class="entry-title"><a href="content/accountant3/post.html">Fusce et magna quisque augue</a></h2>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="post-excerpt"></div>-->
                                <!--                                    <div class="post-footer">-->
                                <!--                                        <div class="button-love">-->
                                <!--                                            <span class="love-text">Do you like it?</span><a href="#" class="mfn-love " data-id="35"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i><i class="icon-heart-fa"></i></span><span class="label">2</span></a>-->
                                <!--                                        </div>-->
                                <!--                                        <div class="post-links">-->
                                <!--                                            <i class="icon-doc-text"></i><a href="content/accountant3/post.html" class="post-more">Read more</a>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
        <!--                        <div class="wrap mcb-wrap one valign-top clearfix" style="padding:0 0 0 4%">-->
        <!--                            <div class="mcb-wrap-inner">-->
        <!--                                <div class="column mcb-column one column_column  column-margin-10px">-->
        <!--                                    <div class="column_attr clearfix align_left">-->
        <!--                                        <h2>About Us</h2>-->
        <!--                                        <h6></h6>-->
        <!--                                        <p>-->
        <!--                                            <?= $business[0]['services'] ?>-->
        <!--                                        </p>-->
        <!--                                    </div>-->
        <!--                                </div>-->
                                        
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="section mcb-section" style="padding-top:0px; padding-bottom:0px">-->
        <!--                    <div class="section_wrapper mcb-section-inner">-->
        <!--                        <div class="wrap mcb-wrap one  column-margin-0px valign-top clearfix" style="padding:80px 0 65px; background-color:#f7f6fa">-->
        <!--                            <div class="mcb-wrap-inner">-->
        <!--                                <div class="column mcb-column one column_column">-->
        <!--                                    <div class="column_attr clearfix align_center">-->
        <!--                                        <h2>Services</h2>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="wrap mcb-wrap one valign-top move-up clearfix" style="margin-top:-64px">-->
        <!--                            <div class="mcb-wrap-inner">-->
        <!--                                <div class="column mcb-column one-fourth column_column">-->
        <!--                                    <div class="column_attr clearfix align_center" style=" padding:0 5%">-->
        <!--                                        <div class="image_frame image_item no_link scale-with-grid alignnone no_border">-->
        <!--                                            <div class="image_wrapper">-->
        <!--                                                <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic1.png">-->
        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                        <hr class="no_line" style="margin:0 auto 20px">-->
        <!--                                        <h4>Vestibulum dapibus mauris nec</h4>-->
        <!--                                        <p>-->
        <!--                                            Curabitur et ligula. Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo vel bibendum.-->
        <!--                                        </p>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-fourth column_column">-->
        <!--                                    <div class="column_attr clearfix align_center" style=" padding:0 5%">-->
        <!--                                        <div class="image_frame image_item no_link scale-with-grid alignnone no_border">-->
        <!--                                            <div class="image_wrapper">-->
        <!--                                                <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic2.png">-->
        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                        <hr class="no_line" style="margin:0 auto 20px">-->
        <!--                                        <h4>Aliquam erat-->
        <!--                                            <br> ac ipsum</h4>-->
        <!--                                        <p>-->
        <!--                                            Curabitur et ligula. Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo vel bibendum.-->
        <!--                                        </p>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-fourth column_column">-->
        <!--                                    <div class="column_attr clearfix align_center" style=" padding:0 5%">-->
        <!--                                        <div class="image_frame image_item no_link scale-with-grid alignnone no_border">-->
        <!--                                            <div class="image_wrapper">-->
        <!--                                                <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic3.png">-->
        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                        <hr class="no_line" style="margin:0 auto 20px">-->
        <!--                                        <h4>Mauris nec-->
        <!--                                            <br> malesuada-->
        <!--                                        </h4>-->
        <!--                                        <p>-->
        <!--                                            Curabitur et ligula. Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo vel bibendum.-->
        <!--                                        </p>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-fourth column_column">-->
        <!--                                    <div class="column_attr clearfix align_center" style=" padding:0 5%">-->
        <!--                                        <div class="image_frame image_item no_link scale-with-grid alignnone no_border">-->
        <!--                                            <div class="image_wrapper">-->
        <!--                                                <img class="scale-with-grid" src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic4.png">-->
        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                        <hr class="no_line" style="margin:0 auto 20px">-->
        <!--                                        <h4>Curabutur et-->
        <!--                                            <br> ligula-->
        <!--                                        </h4>-->
        <!--                                        <p>-->
        <!--                                            Curabitur et ligula. Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo vel bibendum.-->
        <!--                                        </p>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one column_divider">-->
        <!--                                    <hr class="no_line">-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-third column_placeholder">-->
        <!--                                    <div class="placeholder">-->
        <!--                                        &nbsp;-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-third column_button">-->
        <!--                                    <a class="button button_full_width button_size_2 button_theme button_js" href="content/accountant3/services.html"><span class="button_label">Read more</span></a>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one column_divider">-->
        <!--                                    <hr class="no_line" style="margin:0 auto 40px">-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one column_column">-->
        <!--                                    <div class="column_attr clearfix">-->
        <!--                                        <div style="width: 100%; height: 3px; background: #f7f6fa"></div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="section mcb-section" style="padding-top:50px; padding-bottom:50px">-->
        <!--                    <div class="section_wrapper mcb-section-inner">-->
        <!--                        <div class="wrap mcb-wrap one valign-top clearfix">-->
        <!--                            <div class="mcb-wrap-inner">-->
        <!--                                <div class="column mcb-column one column_column">-->
        <!--                                    <div class="column_attr clearfix align_center">-->
        <!--                                        <h2>Our mission</h2>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one column_offer_thumb">-->
        <!--                                    <div class="offer_thumb bottom">-->
        <!--                                        <ul class="offer_thumb_ul">-->
        <!--                                            <li class="offer_thumb_li id_1">-->
        <!--                                                <div class="image_wrapper">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic7.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                                <div class="desc_wrapper align_left no-link">-->
        <!--                                                    <div class="desc">-->
        <!--                                                        <h6>Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.</h6>-->
        <!--                                                        <hr class="no_line" style="margin: 0 auto 10px">-->
        <!--                                                        <ul class="list_mixed">-->
        <!--                                                            <li class="list_check">-->
        <!--                                                                Suspendisse a pellentesque dui, non felis.-->
        <!--                                                            </li>-->
        <!--                                                            <li class="list_star">-->
        <!--                                                                Quisque lorem tortor fringilla sed.-->
        <!--                                                            </li>-->
        <!--                                                            <li class="list_idea">-->
        <!--                                                                Quisque cursus et, porttitor risus.-->
        <!--                                                            </li>-->
        <!--                                                            <li class="list_check">-->
        <!--                                                                Nulla ipsum dolor lacus, suscipit adipiscing.-->
        <!--                                                            </li>-->
        <!--                                                        </ul>-->
        <!--                                                        <hr class="no_line" style="margin:0 auto 10px">-->
        <!--                                                        <p>-->
        <!--                                                            Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor.-->
        <!--                                                        </p>-->
        <!--                                                    </div>-->
        <!--                                                </div>-->
        <!--                                                <div class="thumbnail" style="display:none">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic7-85x85.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                            </li>-->
        <!--                                            <li class="offer_thumb_li id_2">-->
        <!--                                                <div class="image_wrapper">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic8.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                                <div class="desc_wrapper align_left no-link">-->
        <!--                                                    <div class="desc">-->
        <!--                                                        <h6>Lorem ipsum dolor sit amet ligula. Praesent ac arcu quis ante. Vivamus faucibus orci luctus et ultrices posuere, nibh quis risus. Sed placerat eget, neque. Pellentesque at neque.</h6>-->
        <!--                                                        <div class="progress_bars">-->
        <!--                                                            <ul class="bars_list">-->
        <!--                                                                <li>-->
        <!--                                                                    <h6>Aenean fermen<span class="label">60<em>%</em></span></h6>-->
        <!--                                                                    <div class="bar">-->
        <!--                                                                        <span class="progress" style="width:60%"></span>-->
        <!--                                                                    </div>-->
        <!--                                                                </li>-->
        <!--                                                                <li>-->
        <!--                                                                    <h6>Quisque lorem<span class="label">47<em>%</em></span></h6>-->
        <!--                                                                    <div class="bar">-->
        <!--                                                                        <span class="progress" style="width:47%"></span>-->
        <!--                                                                    </div>-->
        <!--                                                                </li>-->
        <!--                                                            </ul>-->
        <!--                                                        </div>-->
        <!--                                                        <hr class="no_line" style="margin:0 auto 30px">-->
        <!--                                                        <p>-->
        <!--                                                            Fusce iaculis, turpis ut metus. Quisque adipiscing ornare. Nullam suscipit sit amet leo. Etiam aliquet, arcu erat, molestie nulla pellentesque accumsan. Vestibulum enim. Duis tempor, tortor justo ac turpis.-->
        <!--                                                        </p>-->
        <!--                                                        <p>&nbsp;-->

        <!--                                                        </p>-->
        <!--                                                    </div>-->
        <!--                                                </div>-->
        <!--                                                <div class="thumbnail" style="display:none">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic8-85x85.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                            </li>-->
        <!--                                            <li class="offer_thumb_li id_3">-->
        <!--                                                <div class="image_wrapper">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic9.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                                <div class="desc_wrapper align_left no-link">-->
        <!--                                                    <div class="desc">-->
        <!--                                                        <h6>Lorem ipsum dolor sit amet dui. Vivamus nec elit dapibus mauris nulla, vitae turpis egestas.</h6>-->
        <!--                                                        <p>-->
        <!--                                                            Vestibulum ante imperdiet quis, rhoncus nunc, fringilla ante ipsum ut quam ut quam sed massa quis venenatis quis, porttitor vel, arcu. Cras a libero at turpis eget metus. Etiam dictum lectus sit amet mi at justo.-->
        <!--                                                        </p>-->
        <!--                                                        <p>-->
        <!--                                                            Curabitur magna neque, euismod mi. Suspendisse vitae mauris. Donec dolor sit amet eleifend neque auctor auctor est, ut tortor. Morbi vel wisi. Phasellus lacinia porta. Ut wisi a lectus. Phasellus vitae odio nec nunc.-->
        <!--                                                        </p>-->
        <!--                                                        <a class="button  button_size_2 button_theme button_js" href="#" target="_blank"><span class="button_label">Read more</span></a>-->
        <!--                                                    </div>-->
        <!--                                                </div>-->
        <!--                                                <div class="thumbnail" style="display:none">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic9-85x85.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                            </li>-->
        <!--                                        </ul>-->
        <!--                                        <div class="slider_pagination"></div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="section mcb-section" style="padding-top:100px; padding-bottom:50px; background-color:#f7f6fa">-->
        <!--                    <div class="section_wrapper mcb-section-inner">-->
        <!--                        <div class="wrap mcb-wrap one valign-top clearfix">-->
        <!--                            <div class="mcb-wrap-inner">-->
        <!--                                <div class="column mcb-column one column_column">-->
        <!--                                    <div class="column_attr clearfix align_center">-->
        <!--                                        <h2>BeAccountant in numbers</h2>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-fourth column_column">-->
        <!--                                    <div class="column_attr clearfix align_center" style=" padding:0 5%">-->
        <!--                                        <div class="google_font" style="font-family:'Noto Serif';font-size:80px;line-height:80px;font-weight:400;color:#61749e">-->
        <!--                                            140-->
        <!--                                        </div>-->
        <!--                                        <h4 class="themecolor" style="font-weight: 400; margin-top: -15px;position: relative">k</h4>-->
        <!--                                        <h4>Vestibulum dapibus mauris nec</h4>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-fourth column_column">-->
        <!--                                    <div class="column_attr clearfix align_center" style=" padding:0 5%">-->
        <!--                                        <div class="google_font" style="font-family:'Noto Serif';font-size:80px;line-height:80px;font-weight:400;color:#61749e">-->
        <!--                                            13-->
        <!--                                        </div>-->
        <!--                                        <h4 class="themecolor" style="font-weight: 400; margin-top: -15px;position: relative">years</h4>-->
        <!--                                        <h4>Aliquam erat-->
        <!--                                            <br> ac ipsum</h4>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-fourth column_column">-->
        <!--                                    <div class="column_attr clearfix align_center" style=" padding:0 5%">-->
        <!--                                        <div class="google_font" style="font-family:'Noto Serif';font-size:80px;line-height:80px;font-weight:400;color:#61749e">-->
        <!--                                            174-->
        <!--                                        </div>-->
        <!--                                        <h4 class="themecolor" style="font-weight: 400; margin-top: -15px;position: relative">k</h4>-->
        <!--                                        <h4>Mauris nec-->
        <!--                                            <br> malesuada-->
        <!--                                        </h4>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="column mcb-column one-fourth column_column">-->
        <!--                                    <div class="column_attr clearfix align_center" style=" padding:0 5%">-->
        <!--                                        <div class="google_font" style="font-family:'Noto Serif';font-size:80px;line-height:80px;font-weight:400;color:#61749e">-->
        <!--                                            15-->
        <!--                                        </div>-->
        <!--                                        <h4 class="themecolor" style="font-weight: 400; margin-top: -15px;position: relative">mln</h4>-->
        <!--                                        <h4>Curabutur-->
        <!--                                            <br> et ligula</h4>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="section mcb-section" style="padding-top:100px; padding-bottom:50px">-->
        <!--                    <div class="section_wrapper mcb-section-inner">-->
        <!--                        <div class="wrap mcb-wrap one valign-top clearfix">-->
        <!--                            <div class="mcb-wrap-inner">-->
        <!--                                <div class="column mcb-column one column_testimonials ">-->
        <!--                                    <div class="testimonials_slider single-photo">-->
        <!--                                        <ul class="testimonials_slider_ul">-->
        <!--                                            <li>-->
        <!--                                                <div class="single-photo-img">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic12-85x85.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                                <div class="bq_wrapper">-->
        <!--                                                    <blockquote>-->
        <!--                                                        Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec.-->
        <!--                                                    </blockquote>-->
        <!--                                                </div>-->
        <!--                                                <div class="hr_dots">-->
        <!--                                                    <span></span><span></span><span></span>-->
        <!--                                                </div>-->
        <!--                                                <div class="author">-->
        <!--                                                    <h5>Tony Johnson</h5><span class="company"></span>-->
        <!--                                                </div>-->
        <!--                                            </li>-->
        <!--                                            <li>-->
        <!--                                                <div class="single-photo-img">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic11-85x85.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                                <div class="bq_wrapper">-->
        <!--                                                    <blockquote>-->
        <!--                                                        Ut et iaculis ante, vel scelerisque tortor. Nulla dignissim, tellus sed aliquam ullamcorper, erat sem feugiat est, vitae dictum mi enim nec lectus.-->
        <!--                                                    </blockquote>-->
        <!--                                                </div>-->
        <!--                                                <div class="hr_dots">-->
        <!--                                                    <span></span><span></span><span></span>-->
        <!--                                                </div>-->
        <!--                                                <div class="author">-->
        <!--                                                    <h5>Katarina Johnes</h5><span class="company"></span>-->
        <!--                                                </div>-->
        <!--                                            </li>-->
        <!--                                            <li>-->
        <!--                                                <div class="single-photo-img">-->
        <!--                                                    <img src="<?= base_url() ?>assets/assets/themes/content/accountant3/images/home_accountant3_pic10-85x85.jpg" class="scale-with-grid wp-post-image">-->
        <!--                                                </div>-->
        <!--                                                <div class="bq_wrapper">-->
        <!--                                                    <blockquote>-->
        <!--                                                        Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna.-->
        <!--                                                    </blockquote>-->
        <!--                                                </div>-->
        <!--                                                <div class="hr_dots">-->
        <!--                                                    <span></span><span></span><span></span>-->
        <!--                                                </div>-->
        <!--                                                <div class="author">-->
        <!--                                                    <h5>Jennifer Lee</h5><span class="company"></span>-->
        <!--                                                </div>-->
        <!--                                            </li>-->
        <!--                                        </ul>-->
        <!--                                        <div class="slider_pager slider_pagination"></div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->

        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--</div>-->
        <footer id="Footer" class="clearfix">
            <div class="footer_copy">
                <div class="container">
                    <div class="column one">
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
        <div class="extras">
            <a href="http://bit.ly/1M6lijQ" class="action_button" target="_blank">Buy now</a>
            <div class="extras-wrapper"></div>
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
							  gridwidth : 1240,
							  gridheight : 765,
							  lazyType : "none",
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