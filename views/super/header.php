<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jetnetix">
    <meta name="keyword" content="Tutor Management System">
    <link rel="shortcut icon" href="">

    <title>Tutor Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets_f') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url('assets_f') ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/css/owl.carousel.css" type="text/css">
    <link href="<?= base_url('assets_f') ?>/css/tasks.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_f') ?>/assets/fuelux/css/tree-style.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_f') ?>/assets/jquery-multi-select/css/multi-select.css" />
    <link href="<?= base_url('assets_f') ?>/assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <!--dynamic table-->
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.css" />
    <!--right slidebar-->
    <link href="<?= base_url('assets_f') ?>/css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets_f') ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?= base_url('assets_f') ?>/js/html5shiv.js"></script>
    <script src="<?= base_url('assets_f') ?>/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href="" class="logo">TUTOR MANAGEMENT / <span>SYSTEM</span></a>
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <li id="header_notification_bar">
                    <a class="dropdown-toggle" href="<?= site_url("super/view/messages") ?>">
                        <i class="fa fa-envelope"></i>
                        <span class="badge bg-warning"><?= 1; ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="top-nav ">
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="<?= base_url('assets_f') ?>/img/avatar1_small.jpg">
                        <span class="username"><?= $superAdmin[0]['username']; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="<?= site_url('super/view') ?>/settings_super_admin"><i class="fa fa-cog"></i>Settings</a></li>
                        <li><a href="<?= site_url('super/view') ?>/profile"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="<?= site_url('super/logout') ?>"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="<?= site_url('super/view') ?>/index">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="<?= site_url('super/view/create_admin_user') ?>">
                        <i class="fa fa-user"></i>
                        <span>Create Admin</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Jobs</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('super/view') ?>/create_job">Add Job</a></li>
                        <li><a href="<?= site_url('super/view') ?>/jobs">Job Record</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Tutor</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('super/view') ?>/create_tutor">Add Tutor</a></li>
                        <li><a href="<?= site_url('super/view') ?>/tutors">Tutor Record</a></li>
                        <li><a href="<?= site_url('super/view') ?>/tutors">Search Tutor</a></li>
                    </ul>
                </li>
                <li>
                    <a class="active" href="<?= site_url('super/view') ?>/create_notice">
                        <i class="fa fa-calendar"></i>
                        <span>Notice Board</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="<?= site_url("super/view") ?>/messages">
                        <i class="fa fa-envelope"></i>
                        <span>Messages</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>