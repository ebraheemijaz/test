<?php $check = $this->session->userdata('userMember'); ?>
<?php $logo = $this->data->fetch('details', array('id' => 1)); ?>
<?php $memberDetails = $this->data->fetch('member', array('id' => $check[0]['id'], 'status' => 'active')); ?>
<?php //var_dump($userAdmin);die; ?>
<?php $image = (empty($memberDetails[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$memberDetails[0]['image']; ?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<html lang="en" class="app_theme_f">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?= base_url('assets_f/'.$logo[0]['logo']) ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= base_url('assets_f/'.$logo[0]['logo']) ?>" sizes="32x32">
    <title>Membership Management System</title>
    <!-- additional styles for plugins -->
        <!-- weather icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
        <script src="<?= base_url('assets_f') ?>/js/jquery.js"></script>
        <script src="<?= base_url('assets_new')?>/assets/js/fullcalendar/lib/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
        <link href="<?= base_url('assets_f') ?>/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
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
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.css" />
    <!--<link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/lightbox.min.css" />-->
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


        .js div#preloader { position: fixed; left: 0; top: 0; z-index: 23999; width: 100%; height: 100%; overflow: visible; background: #fff url('<?= base_url('loader2.gif') ?>') no-repeat center center; }
    
    </style>
    <style>
        <style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 130%;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 5%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
    </style>
    <style>
    .blink_me {
      animation: blinker 3s linear infinite;
      text-align: center;
      text-transform: uppercase;
      color: #f45942;
      animation-iteration-count: infinite;
    }
    
    @keyframes blinker {  
      50% { opacity: 0; }
    }
</style>
    <script>
        jQuery(document).ready(function($) {

// site preloader -- also uncomment the div in the header and the css style for #preloader
            $(window).load(function(){
                $('#preloader').fadeOut('slow',function(){$(this).remove();});
            });

        });
    </script>
    <link rel="manifest" href="/manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  console.log(OneSignal);
  OneSignal.push(function() {
    OneSignal.init({
      appId: "5bd64a70-48b9-456e-ac3e-aef92697dd7a"
    });
  });
</script>
<script>
            function subscribe() {
                // OneSignal.push(["registerForPushNotifications"]);
                OneSignal.push(["registerForPushNotifications"]);
                event.preventDefault();
            }
            function unsubscribe(){
                OneSignal.setSubscription(true);
            }
            var OneSignal = OneSignal || [];
            var userId = <?= $memberDetails[0]['id']?>;
            OneSignal.push(function() {
                /* These examples are all valid */
                // Occurs when the user's subscription changes to a new value.
                OneSignal.sendTag("user_id","<?= $memberDetails[0]['id']?>", function(tagsSent)
                    {
                        // Callback called when tags have finished sending
                        console.log("Tags have finished sending!");
                    });
                OneSignal.on('subscriptionChange', function (isSubscribed) {
                    console.log("The user's subscription state is now:", isSubscribed);
                    OneSignal.sendTag("user_id","<?= $memberDetails[0]['id']?>", function(tagsSent)
                    {
                        // Callback called when tags have finished sending
                        console.log("Tags have finished sending!");
                    });
                });

                var isPushSupported = OneSignal.isPushNotificationsSupported();
                if (isPushSupported)
                {
                    // Push notifications are supported
                    OneSignal.isPushNotificationsEnabled().then(function(isEnabled)
                    {
                        if (isEnabled)
                        {
                            console.log("Push notifications are enabled!");

                        } else {
                            OneSignal.showHttpPrompt();
                            console.log("Push notifications are not enabled yet.");
                        }
                    });

                } else {
                    console.log("Push notifications are not supported.");
                }
            });


        </script>
</head>

<body class=" sidebar_main_open sidebar_main_swipe js ">
<div id="preloader"></div>

    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">

                <?php if(!empty($userAdmin)){ ?>
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                    <div id="menu_top_dropdown" class="uk-float-left ">
                        <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                            <a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
                            <div class="uk-dropdown uk-dropdown-width-2 chota_uk">
                                <div class="uk-grid uk-dropdown-grid">
                                    <div class="uk-width-1-1">
                                        <div class="uk-grid uk-grid-width-medium-1-2 uk-margin-bottom uk-text-center">
                                            <a href="<?= site_url('home/view/support') ?>" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-cyan-600">mail_outline</i>
                                                <span class="uk-text-mutedw uk-display-block">Feedback</span>
                                            </a>
                                            <a href="<?= site_url('home/view/help') ?>" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-blue-600">&#xE887;</i>
                                                <span class="uk-text-mutedw uk-display-block">Help/FAQs</span>
                                            </a>
                                            <a href="<?= site_url('home/member') ?>/<?= $userAdmin[0]['id'] ?>" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
                                                <span class="uk-text-mutedw uk-display-block">My Profile</span>
                                            </a>
                                            <a href="javascript:void(0);" onclick="javascript:introJs().start();" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-purple-600">&#xE87A;</i>
                                                <span class="uk-text-mutedw uk-display-block">Tour Guide</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
                <?php $advertNotif = $this->data->fetch('advert', array('user_id' => $memberDetails[0]['id'], 'approval' => '1'));?>
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <?php if(!empty($userAdmin)){ ?>
                        <?php $reply = $this->data->myquery('SELECT * FROM `prayerRequestReply` WHERE `seen` = "0" and `member_id` = '.$userAdmin[0]['id'].' order by id desc'); ?>
                            <li><a href="#" id="main_search_btn" class="user_action_icon uk-hidden-small"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><?php if((count($offersNotif) + count($buddyNotif) + $wordCountOnNotif + count($messageNotif) + count($adminmessageNotif) + count($reminderLog) + count($adminEvent) + count($reply) + count($advertNotif) > 0)){?><span class="uk-badge" style="background-color : red;"><?= count($offersNotif) + count($buddyNotif) + $wordCountOnNotif + count($messageNotif) + count($adminmessageNotif) + count($reminderLog) + count($adminEvent) + count($reply) + count($advertNotif); ?><i class="fa fa-star"></i></span><?php } ?></a>
                                <div class="uk-dropdown uk-dropdown-xlarge">
                                    <div class="md-card-content">
                                        <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                            <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages / Buddies <?= count($buddyNotif) + count($messageNotif) + count($adminmessageNotif); ?></a></li>
                                            <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts / Reminders <span id="wordCountOnNotif"> <?= count($offersNotif) + $wordCountOnNotif + count($reminderLog) + count($adminEvent) + count($reply) + count($advertNotif); ?> </span></a></li>
                                        </ul>
                                        <ul id="header_alerts" class="uk-switcher uk-margin">
                                            <li>
                                                <ul class="md-list md-list-addon">
                                                    <?php if(!empty($messageNotif) OR !empty($adminmessageNotif) OR !empty($buddyNotif)){ ?>
                                                        <?php foreach($buddyNotif as $val){?>
                                                            <li>
                                                                <div class="md-list-addon-element">
                                                                    <?php $image = (empty($val['pic'])) ? base_url('assets_f/img/male.png') : base_url('assets_f/img/business')."/".$val['pic']; ?>
                                                                    <span class="md-user-letters md-bg-cyan">
                                                                        <!--<img src="<?/*= $image */?>" alt=""/>-->
                                                                        <?= substr($val['member'],0,1); ?>
                                                                    </span>
                                                                </div>
                                                                <div class="md-list-content">
                                                                    <span class="md-list-heading"><a href="<?= site_url("home/readBuddy")."/".$val['id'] ?>"><?= $val['member'] ." and you are buddy now enjoy."; ?></a></span>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
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
                                                                    <span class="md-list-heading"><a href="<?= site_url("home/view/chat_admin") ?>#<?= $val['from'] ?>">View Message.</a><br/><small>Admin</small></span>
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
                                                    <?php foreach($advertNotif as $val){ ?>
                                                        <li>
                                                                <div class="md-list-addon-element">
                                                                    <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                                </div>
                                                                <div class="md-list-content">
                                                                    <span class="md-list-heading"><?= "Your Advert Approved"; ?></span><span style="font-size: 10px; color: #3a3a3a;float: right;"><?= date('Y-m-d H:i:s', strtotime($val['date']));?></span>
                                                                    <span class="uk-text-small uk-text-muted uk-text-truncate"><a href="<?= site_url('home/view/advert?id='.$val['id']); ?>">View</a></span>
                                                                </div>
                                                            </li>
                                                    <?php } ?>
                                                    <?php foreach($offersNotif as $offer) { ?>
                                                            <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading">
                                                                    Offer Sent by: <?= $this->data->fetch('member', array('id' => $offer['user_id']))[0]['fname'] ?> <span style="font-size: 10px; color: #3a3a3a;float: right;"><?= date('Y-m-d H:i:s', strtotime($offer['date']));?></span>
                                                                </span>
                                                                <span class="uk-text-small uk-text-muted uk-text-truncate"><a href="<?= site_url('home/view/manage_offers?type=received'); ?>">View</a></span>
                                                            </div>
                                                        </li>
                                                        <?php } ?>
                                                    <?php foreach($reply as $rep) {?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading">
                                                                    <?= $rep['reply_text']; ?> <span style="font-size: 10px; color: #3a3a3a;float: right;"><?= date('Y-m-d H:i:s', strtotime($rep['createdAt']));?></span>
                                                                </span>
                                                                <span class="uk-text-small uk-text-muted uk-text-truncate"><a onclick="openPrayerReply('<?= $rep['id']?>', '<?= $rep['reply_text']?>', '<?= $this->data->fetch('credentials', array('id' => $rep['admin_id']))[0]['name'];?>', '<?= $this->data->fetch('p_request', array('id' => $rep['prayer_request_id']))[0]['desc'];?>')">View</a></span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                    <?php foreach($adminEvent as $val1){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading" style="<?php if($val1['adminId'] == 1){?>color: red;<?php }else{ ?>color:green;<?php } ?>"><?= $val1['desc'] ?></span>
                                                                <span class="uk-text-small uk-text-muted uk-text-truncate"><a onclick="openSwal1(<?= $val1['event_id']?>, '<?= $val1['desc'];?>', '<?= $val1['image']?>', '<?= date('d-m-Y', strtotime($val1['date'])) ?>');">View</a></span>
                                                            </div>
                                                        </li>  
                                                    <?php } ?>
                                                    <?php foreach($reminderLog as $val1){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading" style="<?php if($val1['adminId'] == 1){?>color: red;<?php }else{ ?>color:green;<?php } ?>"><?= $val1['desc'] ?></span>
                                                                <span class="uk-text-small uk-text-muted uk-text-truncate"><a onclick="openSwal(<?= $val1['event_id']?>, '<?= $val1['desc'];?>', '<?= $val1['adminId']?>');">View</a></span>
                                                            </div>
                                                        </li>  
                                                    <?php } ?>
                                                    <?php $wordCountOnNotif = 0; foreach($words as $val){ ?>
                                                        <?php  if($val['notifStatus'] == 'unread'){ ?>
                                                            <li>
                                                                <div class="md-list-addon-element">
                                                                    <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                                </div>
                                                                <div class="md-list-content">
                                                                    <span class="md-list-heading"><?= $val['preacher_name']; ?></span><span style="font-size: 10px; color: #3a3a3a;float: right;"><?= date('Y-m-d H:i:s', strtotime($val['date_created']));?></span>
                                                                    <span class="uk-text-small uk-text-muted uk-text-truncate"><a href="<?= site_url('home/view/word_detailed?id='.$val['id']); ?>">View</a></span>
                                                                </div>
                                                            </li>
                                                        <?php $wordCountOnNotif += 1; } ?>
                                                    <?php }  ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <?php $image = (empty($memberDetails[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$memberDetails[0]['image']; ?>
                                <a href="#" class="user_action_image">
                                    <?php
                                            $exif = exif_read_data($image);
                                            //print_r($exif['Orientation']);
                                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                                            <div style="
                                                background-image: url('<?= $image ?>');
                                                height: 40px;
                                                width: 40px;
                                                background-size: 100% 100%;
                                                border-radius: 100%;
                                                margin-top: 4px;
                                                background-repeat: no-repeat;
                                            " class="detectHeader"></div>
                                            <?php
                                            }else if($exif['Orientation'] == 8){
                                                // $class = "md-card-head-avatar";
                                            ?>
                                            <div style="
                                                background-image: url('<?= $image ?>');
                                                height: 40px;
                                                width: 40px;
                                                background-size: 100% 100%;
                                                border-radius: 100%;
                                                margin-top: 4px;
                                                background-repeat: no-repeat;
                                            " class="detectHeader8"></div>
                                            <?php
                                            }else{
                                            ?>
                                            <div style="
                                                background-image: url('<?= $image ?>');
                                                height: 40px;
                                                width: 40px;
                                                background-size: 100% 100%;
                                                border-radius: 100%;
                                                margin-top: 4px;
                                                background-repeat: no-repeat;
                                            "></div>
                                            <?php
                                            }
                                        ?>
                                    
                                    <!--<img class="md-user-image" src="<?/*= $image */?>" alt=""/>-->
                                </a>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav js-uk-prevent">
                                        <li><a href="<?= site_url('home/member') ?>/<?= $userAdmin[0]['id'] ?>">My profile</a></li>
<!--                                        <li><a href="--><?//= site_url('home/view/acc_settings'); ?><!--">Settings</a></li>-->
                                        <li><a href="<?= site_url('home/view/edit_profile'); ?>">General Settings</a></li>
                                        <li><a href="<?= site_url('home/view/edit_password'); ?>">Account Settings</a></li>
                                        <!--<li><a onclick="openDialog('<?= $userAdmin[0]['id']?>')">Deactivate Account</a></li>-->
                                        <li><a href="<?= site_url('home/logout2') ?>">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php }else{ ?>
                            <!--<li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">-->
                            <!--    <a href="#" class="user_action_image">-->
                            <!--        Join-->
                            <!--    </a>-->
                            <!--    <div class="uk-dropdown uk-dropdown-small">-->
                            <!--        <ul class="uk-nav js-uk-prevent">-->
                            <!--            <li><a href="<?= site_url('home/logout2') ?>">Login</a></li>-->
                            <!--            <li><a href="<?= site_url('home/register') ?>">Sign Up</a></li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</li>-->
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons "> &#xE5CD;</i>
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
                    <img class="logo_regular" src="<?= base_url('assets_new') ?>/test.png" style="width: 100px;margin-top: 22px;"/>
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
                            <i class="material-icons" style="color: #f47442!important;">&#xE871;</i>
                        </span>
                            <span class="menu_title">Dashboard</span>
                        </a>
                    </li>
                    <li title="Bible">
                        <a href="<?= site_url('home/view/bible'); ?>">
                        <span class="menu_icon">
                            <i class="material-icons" style="color: #77f441!important;">&#xE865;</i>
                        </span>
                            <span class="menu_title">Bible</span>
                        </a>
                    </li>
                    <li title="Word Log">
                        <a href="<?= site_url('home/view/view_word') ?>">
                            <span class="menu_icon"><i class="material-icons" style="color: #f44141!important;">&#xE86D;</i></span>
                            <span class="menu_title">Word Log</span>
                        </a>
                    </li>
                    <li title="Voice Note">
                        <a href="<?= site_url('home/view/audioNote'); ?>">
                            <span class="menu_icon"><i class="material-icons" style="color: #4191f4!important;">audiotrack</i></span>
                            <span class="menu_title">Voice Note</span>
                        </a>
                    </li>
                    <?php //if(!empty($live)){ ?>
                        <li title="Event Videos">
                            <a href="<?= site_url('home/view/live'); ?>">
                                <span class="menu_icon"><i class="material-icons" style="color: #4191f4!important;">&#xE04B;</i></span>
                                <span class="menu_title">Event Videos</span>
                            </a>
                        </li>
                    <?php //} ?>

                    
                    <li title="News & Bulletin">
                        <a href="<?= site_url('home/view/bulletin') ?>">
                            <span class="menu_icon"><i class="material-icons" style="color: #f47442!important;">description</i></span>
                            <span class="menu_title">News & Bulletin</span>
                        </a>
                    </li>
                    <li title="Testimony">
                        <a href="<?= site_url('home/view') ?>/testimonies">
                            <span class="menu_icon"><i class="material-icons" style="color: #77f441!important;">&#xE150;</i></span>
                            <span class="menu_title">Testimony</span>
                        </a>
                    </li>
                    <li title="Prayer Request">
                        <a href="<?= site_url('home/view') ?>/prayerRequest">
                            <span class="menu_icon"><i class="material-icons" style="color: #4191f4!important;">&#xE0E5;</i></span>
                            <span class="menu_title">Prayer Request</span>
                        </a>
                    </li>
                    <li title="Keepers' Network">
                        <a href="<?= site_url('home/view') ?>/keepersNetwork">
                            <span class="menu_icon"><i class="material-icons" style="color: #f44141!important;">&#xE8D3;</i></span>
                            <span class="menu_title">Keepers' Network</span>
                        </a>
                    </li>
                    <p hidden><? print_r($memberDetails[0]); ?></p>
                    <?php if($memberDetails[0]['isGeneralInCharge']){ ?>
                    <?php $memGroup = $this->data->myquery("SELECT * FROM `mempacasGroup` WHERE FIND_IN_SET({$memberDetails[0]['id']}, generalInChargeId)"); ?>
                    
                    <li title="mempacasGroup">
                        <a href="javascript:;">
                            <span class="menu_icon"><i class="material-icons" style="color: #f47442!important;">Mempacas</i></span>
                            <span class="menu_title">Mempacas</span>
                        </a>
                        <ul >
                            <li title="View Group"><a href="<?= site_url('home') ?>/view_mempacas_group/<?= $memGroup[0]['id'] ?>">View Group</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($memberDetails[0]['isTeacherInCharge']){ ?>
                    <?php $memGroup = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE FIND_IN_SET({$memberDetails[0]['id']}, teacherId)"); ?>
                    <li title="childRegistration">
                        <a href="javascript:;">
                            <span class="menu_icon"><i class="material-icons" style="color: #f44141!important;">accessible</i></span>
                            <span class="menu_title">Children Register</span>
                        </a>
                        <ul>
                            <!--<li title="addChild"><a href="<?= site_url('home') ?>/view/addChild">Add Child (+)</a></li>-->
                            <li title="viewClass"><a href="<?= site_url('home') ?>/view/viewRegisterClass/<?= $memGroup[0]['id'] ?>">View Class</a></li>
                            <li title="markAttendance"><a href="<?= site_url('home') ?>/view/markAttendance/<?= $memGroup[0]['id'] ?>">Mark Attendance</a></li>
                            <!--<li title="updatePerformance"><a href="<?= site_url('home') ?>/view/updatePerformance">Update Performance</a></li>-->
                            <li title="reportIncident"><a href="<?= site_url('home') ?>/view/reportIncident/<?= $memGroup[0]['id'] ?>">Incident Updates</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($memberDetails[0]['isParentAlloted']){ ?>
                    <li title="parentDashboard">
                        <a href="javascript:;">
                            <span class="menu_icon"><i class="material-icons" style="color: #4191f4!important">accessible</i></span>
                            <span class="menu_title">Parent Dashboard</span>
                        </a>
                        <?php $children = $this->data->fetch('children', array('parent_id' => $memberDetails[0]['id'], 'isAlotted' => 1)); ?>
                        <ul>
                            <?php foreach($children as $c){ ?>
                                <li><a href="<?= site_url('home/view/studentRecord')."/".$c['id'] ?>"><?= $c['fname']." ".$c['lname'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <li title="Donate">
                        <a href="<?= site_url('home/view') ?>/donate">
                            <span class="menu_icon"><i style="font-size: 24px;margin-left: 4px;color: #f47442!important;" class="uk-icon-gbp"></i></span>
                            <span class="menu_title">Donate</span>
                        </a>
                    </li>
                    <li title="Book Store">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons" style="color: #77f441!important;">&#xE02F;</i></span>
                            <span class="menu_title">Book Store</span>
                        </a>
                        <ul >
                            <li>
                                <a href="<?= site_url('home/view/bookStore') ?>">Book store</a>
                                <a href="<?= site_url('home/view/myBooks') ?>">My Books</a>
                            </li>
                        </ul>
                    </li>
                    <li title="Search">
                        <a href="<?= site_url("home/view/search"); ?>">
                            <span class="menu_icon"><i class="material-icons" style="color: #4191f4!important;">&#xE8FF;</i></span>
                            <span class="menu_title">Search</span>
                        </a>
                    </li>
                    <li title="My Buddies">
                        <a href="<?= site_url('home/view') ?>/buddies">
                            <span class="menu_icon"><i class="material-icons" style="color: #f44141!important;">&#xE8D3;</i></span>
                            <span class="menu_title">My Friends</span>
                        </a>

                    </li>
                    <li title="Chat">
                        <a href="javascript:;">
                            <span class="menu_icon"><i class="material-icons" style="color: #f47442!important;">question_answer</i></span>
                            <span class="menu_title">Chat</span>
                        </a>
                        <ul >
                            <li title="Chat Buddies"><a href="<?= site_url('home/view') ?>/chat">Chat Buddies</a></li>
                            <li title="Group Chat"><a href="<?= site_url('home/view') ?>/groupChat">Group Chat</a></li>
                            <li title="Chat Admin"><a href="<?= site_url('home/view') ?>/chat_admin">Chat Admin</a></li>
                        </ul>
                    </li>
                    <li title="Business Page">
                        <a href="<?= site_url('business') ?>/<?= $userAdmin[0]['id'] ?>">
                            <span class="menu_icon"><i class="material-icons" style="color: #77f441!important;">business</i></span>
                            <span class="menu_title">Business Page</span>
                        </a>
                    </li>
                    <li title="Manage Offers">
                        <a href="javascript:;">
                            <span class="menu_icon"><i class="material-icons" style="color: #4191f4!important;">&#xE14F;</i></span>
                            <span class="menu_title">Manage Offers</span>
                        </a>
                        <ul >
                            <li title="Sent Offers"><a href="<?= site_url('home/view/manage_offers') ?>?type=sent">Sent Offers</a></li>
                            <li title="Received Offers"><a href="<?= site_url('home/view/manage_offers') ?>?type=received">Received Offers</a></li>
                            <li title="Custom Invoice"><a href="<?= site_url('home/view/view_invoices') ?>">Custom Invoice<br/><small>(Send invoices to non-members)</small></a></li>
                        </ul>
                    </li>
                    <?php if(!empty($advert)){ ?>
                        <li title="Adverts">
                            <a href="<?= site_url('home/view/advert'); ?>">
                                <span class="menu_icon"><i class="material-icons" style="color: #f44141!important;">&#xE1BC;</i></span>
                                <span class="menu_title">Adverts</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li title="Feedback" style="margin-bottom: 30px">
                        <a href="<?= site_url('home/view/support') ?>">
                            <span class="menu_icon"><i class="material-icons" style="color: #f47442!important;">mail_outline</i></span>
                            <span class="menu_title">Feedback</span>
                        </a>
                    </li>
                <?php }else { ?>
                <li title="Join">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE02F;</i></span>
                            <span class="menu_title">Join</span>
                        </a>
                        <ul >
                            <li>
                                <a href="<?= site_url() ?>">Login</a>
                                <a href="<?= site_url('home/register') ?>">Signup</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </aside><!-- main sidebar end -->
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
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
        function openSwal(event_id,event_title,adminId){
            swal({
                      title: 'Are you sure?',
                      text: "Do you want to attend event?",
                      type: 'question',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes',
                      cancelButtonText: 'No'
                    }).then((result) => {
                      if (result.value) {
                        $.ajax({
                            url: "<?= site_url('home') ?>/setEvent",
                            type: "POST",
                            data: {event_id:event_id, event_title:event_title, adminId:adminId, eventAttending:1},
                            success: function(e){
                                swal(
                                  'Attending!',
                                  'You are attending this event.',
                                  'success'
                                )
                            }
                        });
                        window.location.reload();
                      }else{
                          $.ajax({
                            url: "<?= site_url('home') ?>/setEvent",
                            type: "POST",
                            data: {event_id:event_id, event_title:event_title, adminId:adminId, eventAttending:0},
                            success: function(e){
                                swal(
                                  'Not Attending!',
                                  'You are not attending this event.',
                                  'success'
                                )
                            }
                        });  
                          window.location.reload();
                      }
                    });
        }
        function openDialog(userId){ 
            swal({
                title: "Account Deactivation Alert!!!",
                html: "<div class='tooltip' style='position: relative;display: inline-block;border-bottom: 1px dotted black;'>Do you want to deactivate your account?<span class='tooltiptext'>Are you sure you want to deactivate your account? Deactivating your account will suspend you from gaining access to your account and there will be no correspondence from us to you anymore either via email or SMS.</span></div>",//"<a href='#' data-toggle='tooltip' title=Hooray!'>Do you want to deactivate your account?</a>",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Deactivate!",
                cancelButtonText: "No!"
            }).then((result) => {
                if(result.value){
                    window.location.href = "<?= site_url('home/statusMember');?>/<?= $userAdmin[0]['id']; ?>";
                }
            });
        }
        function openDialogDelete(userId){ 
            swal({
                title: "Account Deletion Alert!!!",
                html: "<div class='tooltip' style='position: relative;display: inline-block;border-bottom: 1px dotted black;'>Do you want to Delete your account?<span class='tooltiptext'>Are you sure you want to delete your account?                                          Deleting your account will permanently remove your data record from our application and server. Henceforth, you will no longer get any correspondence from MMS once your account is deleted.</span></div>",//"<a href='#' data-toggle='tooltip' title=Hooray!'>Do you want to deactivate your account?</a>",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Delete!",
                cancelButtonText: "No!"
            }).then((result) => {
                if(result.value){
                    window.location.href = "<?= site_url('home/permanentDelete');?>/<?= $userAdmin[0]['id']; ?>";
                }
            });
        }
        function openPrayerReply(replyId, reply_text, repliedBy, requestText){
                    $.ajax({
                        url: "<?= site_url('home') ?>/seenUpdate",
                        type: "POST",
                        data: {id:replyId},
                        success: function(e){
                            window.location.href="<?= site_url('home/view')?>/prayerRequest";
                        }
                    });
        }
        function openSwal1(event_id,event_title,adminId, eventTime){
            if(adminId){
            var img = "<?= base_url('assets_f/img/business')?>/"+adminId;
            }else{
                var img = "<?= base_url('assets_f/male.jpg')?>";
            }
            swal({
                      title: "Admin Event Details",
                      html: "<img src="+img+" width='100' height='100'><br/><br/>Event Title: "+event_title+"<br/><br/>Event Date: "+eventTime+"<br/><br/>Do you want to view attend event?", 
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes',
                      cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.value) {
                            console.log({event_id:event_id, event_title:event_title, adminId:adminId, eventAttending:1});
                        $.ajax({
                            url: "<?= site_url('home') ?>/setEvent",
                            type: "POST",
                            data: {event_id:event_id, event_title:event_title, adminId:adminId, eventAttending:1},
                            success: function(e){
                                console.log(e);
                                swal(
                                  'Attending!',
                                  'You are attending this event.',
                                  'success'
                                )
                            }
                        });
                        window.location.reload();
                      }else{
                          $.ajax({
                            url: "<?= site_url('home') ?>/setEvent",
                            type: "POST",
                            data: {event_id:event_id, event_title:event_title, adminId:adminId, eventAttending:0},
                            success: function(e){
                                console.log(e);
                                swal(
                                  'Not Attending!',
                                  'You are not attending this event.',
                                  'success'
                                )
                            }
                        });  
                          window.location.reload();
                      }
                    });
        }
    </script>