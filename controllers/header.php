<?php //var_dump($userAdmin);die; ?>
<?php $image = (empty($userAdmin[0]['image'])) ? base_url('assets_f/img/tutor.png') : base_url('assets_f/img/business')."/".$userAdmin[0]['image']; ?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?= base_url('assets_f/logo.png') ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= base_url('assets_f/logo.png') ?>" sizes="32x32">
    <title>Membership Management System</title>
    <!-- additional styles for plugins -->
        <!-- weather icons -->
        <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/chartist/dist/chartist.min.css">
    <!-- uikit -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/icons/flags/flags.min.css" media="all">
    <!-- style switcher -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/style_switcher.min.css" media="all">
    <!-- altair admin -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/main.min.css" media="all">
    <!-- themes -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/themes/themes_combined.min.css" media="all">
    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="<?= base_url('assets_new') ?>/bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="<?= base_url('assets_new') ?>/bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/ie.css" media="all">
    <![endif]-->

    <!-- common functions -->
    <script src="<?= base_url('assets_new') ?>/assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/intro/introjs.css">
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/intro/themes/introjs-modern.css">

    <style>
        img{
            image-orientation: from-image;
        }
        .md-list-outside.md-list-addon li {
            margin-left: 10px;
            margin-bottom: 10px;
        }


        .js div#preloader { position: fixed; left: 0; top: 0; z-index: 23999; width: 100%; height: 100%; overflow: visible; background: #333 url('http://files.mimoymima.com/images/loading.gif') no-repeat center center; }

    </style>
    <script>
        jQuery(document).ready(function($) {

// site preloader -- also uncomment the div in the header and the css style for #preloader
            $(window).load(function(){
                $('#preloader').fadeOut('slow',function(){$(this).remove();});
            });

        });
    </script>
</head>

<body class=" sidebar_main_open sidebar_main_swipe js">
<div id="preloader"></div>

    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">

                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>

                    <div id="menu_top_dropdown" class="uk-float-left ">
                        <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                            <a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
                            <div class="uk-dropdown uk-dropdown-width-2">
                                <div class="uk-grid uk-dropdown-grid">
                                    <div class="uk-width-1-1">
                                        <div class="uk-grid uk-grid-width-medium-1-2 uk-margin-bottom uk-text-center">
                                            <a href="<?= site_url('home/view/support') ?>" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-cyan-600">&#xE0B0;</i>
                                                <span class="uk-text-muted uk-display-block">Support</span>
                                            </a>
                                            <a href="<?= site_url('home/view/help') ?>" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-blue-600">&#xE887;</i>
                                                <span class="uk-text-muted uk-display-block">Help/FAQs</span>
                                            </a>
                                            <a href="<?= site_url('home/member') ?>/<?= $userAdmin[0]['id'] ?>" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
                                                <span class="uk-text-muted uk-display-block">My Profile</span>
                                            </a>
                                            <a href="javascript:void(0);" onclick="javascript:introJs().start();" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-purple-600">&#xE87A;</i>
                                                <span class="uk-text-muted uk-display-block">Tour Guide</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <?php if(!empty($userAdmin)){ ?>
                            <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge"><?= count($words) + count($messageNotif) + count($adminmessageNotif); ?></span></a>
                                <div class="uk-dropdown uk-dropdown-xlarge">
                                    <div class="md-card-content">
                                        <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                            <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (<?= count($messageNotif) + count($adminmessageNotif); ?>)</a></li>
                                            <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (<?= count($words); ?>)</a></li>
                                        </ul>
                                        <ul id="header_alerts" class="uk-switcher uk-margin">
                                            <li>
                                                <ul class="md-list md-list-addon">
                                                    <?php if(!empty($messageNotif) OR !empty($adminmessageNotif)){ ?>
                                                        <?php foreach($messageNotif as $key=>$val){ ?>
                                                            <li>
                                                                <div class="md-list-addon-element">
                                                                    <?php $image = (empty($val[0]['pic'])) ? base_url('assets_f/img/male.png') : base_url('assets_f/img/business')."/".$val[0]['pic']; ?>
                                                                    <span class="md-user-letters md-bg-cyan">
                                                                        <!--<img src="<?/*= $image */?>" alt=""/>-->
                                                                        <?= substr($val[0]['member'],0,1); ?>
                                                                    </span>
                                                                </div>
                                                                <div class="md-list-content">
                                                                    <span class="md-list-heading"><a href="<?= site_url("home/view/chat") ?>#<?= $key ?>"><?= $val[0]['member'] . "(" . count($messageNotif[$key]) . ")"; ?></a></span>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                        <?php foreach($adminmessageNotif as $val){ ?>
                                                            <li>
                                                                <div class="md-list-addon-element">
                                                                    <span class="md-user-letters md-bg-cyan">
                                                                        <?= substr($val['member'],0,1); ?>
                                                                    </span>
                                                                </div>
                                                                <div class="md-list-content">
                                                                    <span class="md-list-heading"><a href="<?= site_url("home/view/chat_admin") ?>#<?= $val['from'] ?>">View Message.</a></span>
                                                                </div>
                                                            </li>

                                                        <?php } ?>
                                                    <?php }else{ ?>

                                                    <?php } ?>

                                                </ul>
                                            <!--<div class="uk-text-center uk-margin-top uk-margin-small-bottom">-->
                                            <!--<a href="#" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>-->
                                            <!--</div>-->
                                            </li>
                                            <li>
                                                <ul class="md-list md-list-addon">
                                                    <?php foreach($words as $val){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading"><?= $val['preacher_name']; ?></span>
                                                                <span class="uk-text-small uk-text-muted uk-text-truncate"><a href="<?= site_url('home/view/word_detailed?id='.$val['id']); ?>">View</a></span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <?php $image = (empty($userAdmin[0]['image'])) ? base_url('assets_f/img/tutor.png') : base_url('assets_f/img/business')."/".$userAdmin[0]['image']; ?>
                                <a href="#" class="user_action_image"><img class="md-user-image" src="<?= $image ?>" alt=""/></a>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav js-uk-prevent">
                                        <li><a href="<?= site_url('home/member') ?>/<?= $userAdmin[0]['id'] ?>">My profile</a></li>
<!--                                        <li><a href="--><?//= site_url('home/view/acc_settings'); ?><!--">Settings</a></li>-->
                                        <li><a href="<?= site_url('home/view/edit_profile'); ?>">Settings</a></li>
                                        <li><a href="<?= site_url('home/logout2') ?>">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php }else{ ?>
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <a href="#" class="user_action_image">
                                    Join
                                </a>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav js-uk-prevent">
                                        <li><a href="<?= site_url('home/logout2') ?>">Login</a></li>
                                        <li><a href="<?= site_url('home/register') ?>">Sign Up</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form action="<?= site_url('home/view/search'); ?>" class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'<?= site_url('home/ajaxSearch'); ?>'}">
                <input name="q" type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                        {{~items}}
                        <li data-value="{{ $item.value }}">
                            <a href="{{ $item.url }}" class="needsclick">
                                {{ $item.value }}<br>
                                <span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>
                            </a>
                        </li>
                        {{/items}}
                    </ul>
                </script>
            </form>
        </div>
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main">

        <div class="sidebar_main_header">
            <div class="sidebar_logo" style="height:inherit !important;">
                <a href="<?= base_url(); ?>" class="sSidebar_hide sidebar_logo_large">
                    <img class="logo_regular" src="<?= base_url('assets_new') ?>/MMS.png" style="width: 100px;margin-top: 22px;"/>
                    <img class="logo_light" src="<?= base_url('assets_new') ?>/MMS.png" alt="" height="15" width="71"/>
                </a>
                <a href="<?= base_url(); ?>" class="sSidebar_show sidebar_logo_small">
                    <img class="logo_regular" src="<?= base_url('assets_new') ?>/MMS.png" alt="" height="32" width="32"/>
                    <img class="logo_light" src="<?= base_url('assets_new') ?>/MMS.png" alt="" height="32" width="32"/>
                </a>
            </div>
        </div>
        <div class="menu_section">
            <ul>
                <?php if(!empty($userAdmin)){ ?>
                    <li title="Dashboard">
                        <a href="<?= base_url(); ?>">
                        <span class="menu_icon">
                            <i class="material-icons">&#xE871;</i>
                        </span>
                            <span class="menu_title">Dashboard</span>
                        </a>
                    </li>
                    <li title="Dashboard">
                        <a href="<?= site_url('home/view/bible'); ?>">
                        <span class="menu_icon">
                            <i class="material-icons">&#xE865;</i>
                        </span>
                            <span class="menu_title">Bible</span>
                        </a>
                    </li>
                    <?php if(!empty($live)){ ?>
                        <li>
                            <a href="<?= site_url('home/view/live'); ?>">
                                <span class="menu_icon"><i class="material-icons">&#xE04B;</i></span>
                                <span class="menu_title">Live Event</span>
                            </a>
                        </li>
                    <?php } ?>

                    <li>
                        <a href="<?= site_url('home/view/view_word') ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE865;</i></span>
                            <span class="menu_title">Word Log</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('home/view/bulletin') ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE86D;</i></span>
                            <span class="menu_title">Bulletin</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('home/view') ?>/testimonies">
                            <span class="menu_icon"><i class="material-icons">&#xE150;</i></span>
                            <span class="menu_title">Testimony</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('home/view') ?>/prayerRequest">
                            <span class="menu_icon"><i class="material-icons">&#xE0E5;</i></span>
                            <span class="menu_title">Prayer Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('home/view') ?>/donate">
                            <span class="menu_icon"><i style="font-size: 24px;margin-left: 4px;" class="uk-icon-gbp"></i></span>
                            <span class="menu_title">Donate</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE02F;</i></span>
                            <span class="menu_title">Book Store</span>
                        </a>
                        <ul >
                            <li>
                                <a href="<?= site_url('home/view/bookStore') ?>">Book store</a>
                                <a href="<?= site_url('home/view/myBooks') ?>">My Books</a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="<?= site_url("home/view/search"); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE8FF;</i></span>
                            <span class="menu_title">Search</span>
                        </a>
                    <!--<ul>-->
                    <!--    <li><a href="--><?//= site_url('home/view') ?><!--/members?type=name">Search by Member</a></li>-->
                    <!--    <li><a href="--><?//= site_url('home/view') ?><!--/members?type=church">Search by Church group</a></li>-->
                    <!--    <li><a href="--><?//= site_url('home/view') ?><!--/members?type=business">Search by Business Type</a></li>-->
                    <!--</ul>-->
                    </li>
                    <li >
                        <a href="<?= site_url('home/view') ?>/buddies">
                            <span class="menu_icon"><i class="material-icons">&#xE8D3;</i></span>
                            <span class="menu_title">My Buddies</span>
                        </a>

                    </li>
                    <li >
                        <a href="javascript:;">
                            <span class="menu_icon"><i class="material-icons">&#xE156;</i></span>
                            <span class="menu_title">Inbox</span>
                        </a>
                        <ul >
                            <li><a href="<?= site_url('home/view') ?>/chat">Chat Buddies</a></li>
                            <li><a href="<?= site_url('home/view') ?>/groupChat">Group Chat</a></li>
                            <li><a href="<?= site_url('home/view') ?>/chat_admin">Admin</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= site_url('business') ?>/<?= $userAdmin[0]['id'] ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE8D1;</i></span>
                            <span class="menu_title">Business Page</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:;">
                            <span class="menu_icon"><i class="material-icons">&#xE14F;</i></span>
                            <span class="menu_title">Manage Offers</span>
                        </a>
                        <ul >
                            <li><a href="<?= site_url('home/view/manage_offers') ?>?type=sent">Sent Offers</a></li>
                            <li><a href="<?= site_url('home/view/manage_offers') ?>?type=received">Received Offers</a></li>
                            <li><a href="<?= site_url('home/view/view_invoices') ?>">Custom Invoice</a></li>
                        </ul>
                    </li>
                    <?php if(!empty($advert)){ ?>
                        <li>
                            <a href="<?= site_url('home/view/advert'); ?>">
                                <span class="menu_icon"><i class="material-icons">&#xE1BC;</i></span>
                                <span class="menu_title">Adverts</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="<?= site_url('home/view/support') ?>">

                            <span class="menu_icon"><i class="material-icons">&#xE0B0;</i></span>
                            <span class="menu_title">Support</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </aside><!-- main sidebar end -->
    <script>
        $(function() {
            var url = window.location.href;
            $(".menu_section a").each(function() {
                if(url == (this.href)) {
                    $(this).closest("li").addClass("current_section");
                    //$(this).closest(".submenu_trigger").addClass("act_section");
                }
            });
        });
    </script>