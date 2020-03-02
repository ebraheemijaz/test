<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jetnetix">
    <meta name="keyword" content="Membership Management System">
    <meta property="og:image" content="<?= base_url('assets_f') ?>/logo.png" />
    <title>Membership Management System</title>
<!--    <link href="--><?//= base_url('assets_b/bootstrap') ?><!--/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="<?= base_url('assets_f') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/bootstrap-reset.css" rel="stylesheet">
<!--    <link href="--><?//= base_url('assets_f') ?><!--/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />-->
<!--    <link href="--><?//= base_url('assets_f') ?><!--/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>-->
<!--    <link rel="stylesheet" href="--><?//= base_url('assets_f') ?><!--/css/owl.carousel.css" type="text/css">-->
    <link href="<?= base_url('assets_f') ?>/css/tasks.css" rel="stylesheet">
<!--    <link rel="stylesheet" type="text/css" href="--><?//= base_url('assets_f') ?><!--/assets/fuelux/css/tree-style.css" />-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_b') ?>/font-awesome/css/font-awesome.min.css" />
    <link href="<?= base_url('assets_f') ?>/assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.css" />
    <link href="<?= base_url('assets_f') ?>/css/slidebars.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style-responsive.css" rel="stylesheet" />
    <script src="<?= base_url('assets_f') ?>/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_b') ?>/tipped/css/tipped/tipped.css"/>
    <script type="text/javascript" src="<?= base_url('assets_b') ?>/tipped/js/tipped/tipped.js"></script>

    <script src="<?= base_url('assets_f') ?>/js/bootstrap.min.js"></script>
    <!-- Include the plugin's CSS and JS: -->
    <script type="text/javascript" src="<?= base_url('assets_f') ?>/multiselect/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/multiselect/bootstrap-multiselect.css" type="text/css"/>
    <link rel="stylesheet" href="<?= base_url('assets_b') ?>/animate.css" type="text/css"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tool tips and media queries -->
    <!--[if lt IE 9]>
    <script src="<?= base_url('assets_f') ?>/js/html5shiv.js"></script>
    <script src="<?= base_url('assets_f') ?>/js/respond.min.js"></script>
    <![endif]-->

<!--    <link href="https://fonts.googleapis.com/css?family=Mirza|Source+Sans+Pro" rel="stylesheet">-->

<!--    <script src="https://use.fontawesome.com/344c075884.js"></script>-->
<!--    <script src="https://use.fontawesome.com/344c075884.js"></script>-->
    <style>
        .form-horizontal .control-label {
            color: #000;
        }
        .form-signin{
            margin-top:0px !important;
        }
        .form-signin > p {
            font-weight: bold;
            color:black;
        }
        .form-control{
            height:45px !important;
        }
        @media(min-width:992px) AND (max-width:1199px) {
            .visible-md {
                display: inline-block !important;
            }
        }
        @media(min-width:1200px){
            .visible-lg {
                display: inline-block !important;
            }
        }

    </style>
    <style>
        /*@import url('https://fonts.googleapis.com/css?family=Mirza|Source+Sans+Pro');*/
        /*font-family: 'Source Sans Pro', sans-serif;*/
        /*font-family: 'Mirza', cursive;*/
    </style>
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/oc/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/oc/dist/assets/owl.theme.default.css">
    <script src="<?= base_url('assets_f') ?>/oc/dist/owl.carousel.js"></script>

<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.5.0/alertify.core.min.css"/>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.5.0/alertify.js"></script>-->

    <script type="text/javascript">
        var idleTime = 0;
        $(document).ready(function () {
            var idleInterval = setInterval(timerIncrement, 60000);
            $(this).mousemove(function(e){
                idleTime = 0;
            });
            $(this).keypress(function(e){
                idleTime = 0;
            });

        });
        function timerIncrement() {
            idleTime = idleTime + 1;
            if (idleTime > 9) {
                window.location.href = "<?= site_url('home/logout'); ?>";
            }
        }
    </script>
</head>

<body>

<section id="container" >
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <span class="fa fa-bars tooltips" style="margin-top:-3px !important;" data-placement="right" data-original-title="Toggle Navigation">
                a
            </span>
        </div>

        <a href="<?= site_url('home') ?>" class="logo">
            <img src="<?= base_url('assets_f') ?>/logo.png" style="width:30px;" alt=""/>
            <span>M</span><cspan class="visible-lg visible-md">embership  </cspan>
            <span>M</span><cspan class="visible-lg visible-md">anagement  </cspan>
            <span>S</span><cspan class="visible-lg visible-md">YSTEM      </cspan>
        </a>
        <div class="nav notify-row" id="top_menu">

        </div>
        <div class="top-nav ">
            <ul class="nav pull-right top-menu">
                <?php if(!empty($userAdmin)){ ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?php $image = (empty($userAdmin[0]['image'])) ? base_url('assets_f/img/tutor.png') : base_url('assets_f/img/business')."/".$userAdmin[0]['image']; ?>
                            <img alt="" style="width:20px;" src="<?= $image; ?>">
                            <span class="username"><?= $userAdmin[0]['fname'] ?> <?= $userAdmin[0]['lname'] ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?= site_url('home/member') ?>/<?= $userAdmin[0]['id'] ?>"><i class="fa fa-suitcase"></i> Profile</a></li>
                            <li><a href="<?= site_url('home/view/acc_settings'); ?>"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="<?= site_url('home/visiblity') ?>/<?= $userAdmin[0]['id'] ?>"> Visiblity : <?= $userAdmin[0]['visiblity'] ?></a></li>
                            <li><a href="#" onclick="helpEnabled()" id="getHelp"><i class='fa fa-question'></i> Help</a></li>
                            <li><a href="<?= site_url('home/logout') ?>"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                <?php }else{ ?>
                    <li><a href="<?= site_url('home/login'); ?>"><i class='fa fa-key'></i> Login</a></li>
                    <li><a href="<?= site_url('home/register'); ?>"><i class='fa fa-user'></i> Join</a></li>
                <?php } ?>
            </ul>
        </div>
    </header>

    <aside>
        <div id="sidebar"  class="nav-collapse">
            <ul class="sidebar-menu" id="nav-accordion">
                <?php if(!empty($userAdmin)){ ?>
                    <li>
                        <a href="<?= site_url('home/view') ?>/index">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if(!empty($live)){ ?>
                        <li>
                            <a href="<?= site_url('home/view/live'); ?>">
                                <i class="fa fa-video-camera"></i>
                                <span>Live Event</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(!empty($advert)){ ?>
                        <li>
                            <a href="<?= site_url('home/view/advert'); ?>">
                                <i class="fa fa-list-alt"></i>
                                <span>Adverts</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="sub-menu">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Book Store</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?= site_url('home/view/bookStore') ?>">Book store</a>
                                <a href="<?= site_url('home/view/myBooks') ?>">My Books</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= site_url('home/view/bulletin') ?>">
                            <i class="fa fa-edit"></i>
                            <span>Bulletin</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('home/view') ?>/calendar">
                            <i class="fa fa-calendar"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('home/view/view_word') ?>">
                            <i class="fa fa-sticky-note"></i>
                            <span>Word Log</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('business') ?>/<?= $userAdmin[0]['id'] ?>">
                            <i class="fa fa-address-card"></i>
                            <span>Business Page</span>
                        </a>
                    </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-search"></i>
                                <span>Search</span>
                            </a>
                            <ul class="sub">
                                <li><a href="<?= site_url('home/view') ?>/members?type=name">Search by Member</a></li>
                                <li><a href="<?= site_url('home/view') ?>/members?type=church">Search by Church group</a></li>
                                <li><a href="<?= site_url('home/view') ?>/members?type=business">Search by Business Type</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-comments-o                                                                                                                                                                                                      "></i>
                                <span>Buddies</span>
                            </a>
                            <ul class="sub">
                                <li><a href="<?= site_url('home/view') ?>/buddies">Buddies</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope"></i>
                                <span>Inbox</span>
                            </a>
                            <ul class="sub">
                                <li><a href="<?= site_url('home/view') ?>/chat">Buddies</a></li>
                                <li><a href="<?= site_url('home/view') ?>/groupChat">Group Chat</a></li>
                                <li><a href="<?= site_url('home/view') ?>/chat_admin">Admin</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= site_url('home/view') ?>/prayerRequest">
                                <i class="fa fa-podcast"></i>
                                <span>Prayer Request</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('home/view') ?>/testimonies">
                                <i class="fa fa-pencil"></i>
                                <span>Testimony</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-laptop"></i>
                                <span>Manage Offers</span>
                            </a>
                            <ul class="sub">
                                <li><a href="<?= site_url('home/view/manage_offers') ?>?type=sent">View Sent Offers</a></li>
                                <li><a href="<?= site_url('home/view/manage_offers') ?>?type=received">View Received Offers</a></li>
                                <li><a href="<?= site_url('home/view/view_invoices') ?>">Invoice</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= site_url('home/view') ?>/donate">
                                <i class="fa fa-money"></i>
                                <span>Donate</span>
                            </a>
                        <li>
                        <li>
                            <a href="<?= site_url('home/view/support') ?>">
                                <i class="fa fa-envelope-open"></i>
                                <span>Support</span>
                            </a>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </aside>

