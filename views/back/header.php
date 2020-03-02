<?php
// var_dump($userAdmin[0]['access']);die;
$adminUser = $userAdmin[0];
?>
<?php $logo = $this->data->fetch('details', array('id' => 1)); $this->db->cache_on(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jetnetix">
    <meta name="keyword" content="Tutor Management System">
    <link rel="shortcut icon" href="<?= base_url('assets_f') ?>/<?= $logo[0]['logo'] ?>">
    <title>Admin @ Membership Management System- Login</title>
    <script src="<?= base_url('assets_f') ?>/js/jquery.js"></script>
    <link href="<?= base_url('assets_f') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/multiple-select.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
    <!--<link href="<?= base_url('assets_new') ?>/assets/js/fullcalendar/fullcalendar.print.css" rel="stylesheet">-->
    <script src="<?= base_url('assets_new')?>/assets/js/fullcalendar/lib/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <link href="<?= base_url('assets_f') ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/css/owl.carousel.css" type="text/css">
    <link href="<?= base_url('assets_f') ?>/css/tasks.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_f') ?>/assets/fuelux/css/tree-style.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_f') ?>/assets/jquery-multi-select/css/multi-select.css" />
    <link href="<?= base_url('assets_f') ?>/assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
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
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/themes/themes_combined.min.css" media="all">
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/intl-tel/build/css/intlTelInput.css">
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/intl-tel/build/css/demo.css">
    <link href="<?= base_url('assets_f') ?>/css/slidebars.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style-responsive.css" rel="stylesheet" />
<!--    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>-->
<!--    <script src="--><?//= base_url('assets_f') ?><!--/js/bootstrap.min.js"></script>-->
<!--    <script src="js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="<?= base_url('assets_f/wysiwyg') ?>/dist/ui/trumbowyg.css">
    <link rel="stylesheet" href="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/colors/ui/trumbowyg.colors.css">
    <!-- Include the plugin's CSS and JS: -->
    <script type="text/javascript" src="<?= base_url('assets_f') ?>/multiselect/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/multiselect/bootstrap-multiselect.css" type="text/css"/>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tool tips and media queries -->
    <!--[if lt IE 9]>
    <script src="<?= base_url('assets_f') ?>/js/html5shiv.js"></script>
    <script src="<?= base_url('assets_f') ?>/js/respond.min.js"></script>
    <![endif]-->
    <Style>
        .form-horizontal .control-label {
            color: #000;
        }
        ul.sidebar-menu li a.active i {
            color: #00BCD4 !important;
        }
        
        ul.sidebar-menu li a:hover {
            color: #41f467;
        }
        li.current_section > a > span {
            color: #ff4081;
        }
        @media print {
            body * {
                /*visibility: hidden;*/
            }
            #section-to-print, #section-to-print * {
                /*visibility: visible;*/
            }
            #section-to-print {
                /*position: absolute;*/
                /*left: 0;*/
                /*top: 0;*/
            }
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
        .panel-heading{
            font-size:20px;
            font-weight: bold;
        }
        thead>tr>td{
            font-size:16px;
            font-weight: bold;
        }
        .form-signin{
            margin-top:0px !important;
        }
        .form-signin > p{
            /*font-weight: bold;*/
            text-align:left !important;
            color:black;
        }
        .js div#preloader { position: fixed; left: 0; top: 0; z-index: 23999; width: 100%; height: 100%; overflow: visible; background: #fff url('<?= base_url('loader2.gif') ?>') no-repeat center center; }
    </Style>
    <!--<script type="text/javascript">
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
            if (idleTime > 59) {
                window.location.href = "<?/*= site_url('admin/logout'); */?>";
            }
        }
    </script>-->
    <script>
        jQuery(document).ready(function($) {

// site preloader -- also uncomment the div in the header and the css style for #preloader
            $(window).load(function(){
                $('#preloader').fadeOut('slow',function(){$(this).remove();});
            });

        });
    </script>
<!--    <link rel="stylesheet" href="--><?//= base_url('assets_f') ?><!--/chosen/docsupport/style.css">-->
<!--    <link rel="stylesheet" href="--><?//= base_url('assets_f') ?><!--/chosen/docsupport/prism.css">-->
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/chosen/chosen.css">
    <script>
        $(document).ready(function(){
            $("pre").css('display', 'none'); 
        });
    </script>
</head>

<body style="text-align: left !important;" class="js">
<div id="preloader"></div>
<section id="container" >
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box js-toggle-left-slidebar">
            <div class="fa fa-bars" ></div>
        </div>
        <!--logo start-->
        <a href="" class="logo">
            <img src="<?= base_url('assets_f') ?>/<?= $logo[0]['logo'] ?>" style="width:30px;" alt=""/>
        </a>
        <a href="" style="color:grey !important;" class="logo hidden-xs hidden-sm">
            
            M<span class="visible-lg visible-md">embership  </span>
            M<span class="visible-lg visible-md">anagement  </span>
            S<span class="visible-lg visible-md">YSTEM      </span>
        </a>
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">

            </ul>
        </div>
        <div class="top-nav ">
            <ul class="nav pull-right top-menu">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username"><i class="fa fa-comments"></i>
                            <span class="badge badge-danger" style="background-color: red;">
                                <?= count($this->data->fetch('a_a_chat', array('to' => $adminUser['id']))) + count($this->data->fetch('p_request', array('read' => 0))) + count($this->data->fetch('testimonies', array('read' => 0))) + count($this->data->fetch('contactUs', array('read' => 0))) + count($this->data->fetch('donations', array('read' => 0)))  + count($this->data->fetch('keepersNetwork', array('read' => 0))); ?>
                            </span>
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <!--<small class="pull-right">Clear All</small>-->
                        <?php
                            $adminChat = $this->data->fetch('a_a_chat', array('to' => $adminUser['id']));
                            foreach($adminChat as $val) {
                            ?>
                            <li style="background-color: white"><a href="<?= site_url('admin/view/admin_chat').'#'.$val['from'] ?>"><i class="fa fa-user"></i><?= $this->data->fetch('credentials', array('id' => $val['from']))[0]['name']; ?></a></li>
                            <?php
                            }
                        ?>
                        <?php
                            $pRequest = $this->data->fetch('p_request', array('read' => 0));
                            foreach($pRequest as $val) {
                            ?>
                            <li style="background-color: white; color: black;"><a href="<?= site_url('admin/view/prayerRequest') ?>"><?= ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['fname']). " - Prayer Request" ?> &nbsp;<div id="prayerRequestBtn" detail="<?= $val['id'] ?>">X</div></a></li>    
                            <?php
                            }
                        ?>
                        <?php
                            $testimonies = $this->data->fetch('testimonies', array('read' => 0));
                            foreach($testimonies as $val) {
                            ?>
                            <li style="background-color: white; color: black;"><a href="<?= site_url('admin/view/testimonies') ?>"><?= ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['fname']). " - Testimonies" ?> &nbsp;X</a></li>    
                            <?php
                            }
                        ?>
                        <?php
                            $contactUs = $this->data->fetch('contactUs', array('read' => 0));
                            foreach($contactUs as $contact) {
                            ?>
                            <li style="background-color: white; color: black;"><a href="<?= site_url('admin/view/contactUs') ?>"><?= ucfirst($contact['contactName']). " - Contact Us" ?> &nbsp;X</a></li>    
                            <?php
                            }
                        ?>
                        <?php
                            $contactUs = $this->data->fetch('donations', array('read' => 0));
                            foreach($contactUs as $contact) {
                            ?>
                            <li style="background-color: white; color: black;"><a href="<?= site_url('admin/view/manage_donations') ?>"><?= ucfirst($this->data->fetch('member', array('id' => $contact['user_id']))[0]['fname']). " - Donations" ?> &nbsp;X</a></li>    
                            <?php
                            }
                        ?>
                        <?php
                            $keepersNetwork = $this->data->fetch('keepersNetwork', array('read' => 0));
                            foreach($keepersNetwork as $keep) {
                                $userId = explode('#', $keep['senderId']);
                            ?>
                            <li style="background-color: white; color: black;"><a href="<?= site_url('admin/view/keepersNetwork') ?>"><?= ucfirst($this->data->fetch('member', array('id' => $userId[1]))[0]['fname']). " - Keepers` Network" ?> &nbsp;X</a></li>    
                            <?php
                            }
                        ?>
                        <li></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username"><i class="fa fa-bell"></i><span class="badge badge-danger" style="background-color : red;"><?= count($this->data->fetch('member', array('status' => 'suspend'))) + count($this->data->fetch('incidentReports', array('incidentReported' => 0)));?></span></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <?php 
                            $suspMember = $this->data->myquery("SELECT * FROM `member` WHERE STATUS = 'suspend' and permanentDelete = '0'");
                            foreach($suspMember as $val){
                            ?>
                            <li style="background-color : green;"><a href="<?= site_url('admin/view/suspend_users') ?>"><i class="fa fa-user"></i> <?= $val['fname']." ".$val['lname'] ?></a></li>
                            <?php
                            }
                            $perDelMember = $this->data->myquery("SELECT * FROM `member` WHERE STATUS = 'suspend' and permanentDelete = '1'");
                            foreach($perDelMember as $val1){
                            ?>
                            <li style="background-color : red;"><a href="<?= site_url('admin/view/delete_users') ?>"><i class="fa fa-user"></i> <?= $val1['fname']." ".$val1['lname'] ?></a></li>
                            <?php
                            }
                            $incidentReported = $this->data->myquery("SELECT * FROM `incidentReports` WHERE incidentReported = 0");
                            foreach($incidentReported as $inc) {
                                $childDetail = $this->data->fetch('attendanceClass', array('id' => $inc['classId']));
                            ?>
                            <li style="background-color : #5bc1ae;color: #fff;"><a href="<?= site_url('admin/view/incidentReports') ?>"><i class="fa fa-user"></i><strong> <?= $childDetail[0]['className'] ?> Class Incident</strong></a></li>
                            <?php
                            }
                        ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username"><?= $userAdmin[0]['name'] ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="<?= site_url('admin/view/acc_settings') ?>"><i class="fa fa-gear"></i> Account Setting</a></li>
                        <!--<li><a href="<?= site_url('admin/') ?>"><i class="fa fa-bell"></i> Notification</a></li>-->
                        <li><a href="<?= site_url('admin/logout') ?>"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <aside>
        <style>
            #sidebar{
                z-index: 99 !important;
            }
        </style>
        <div id="sidebar"  off-canvas="slidebar-1 left reveal" class="nav-collapse ">
            <?php if($userAdmin[0]['id'] != 3){ ?>
            <?php $access = ($userAdmin[0]['access'] != NULL) ? $userAdmin[0]['access'] : "admin";  ?>
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <span style="color: #FF6C60; font-size: 12px;" class="visible-sm visible-xs">Membership Management System</span>
                    </li>
                <li>
                    <a class="<?php if($this->uri->uri_string() == 'admin/view/index.php') { echo 'active'; } ?>" href="<?= site_url('admin/view') ?>/index.php">
                        <i class="fa fa-dashboard" style="color: #f47442!important;"></i>
                        <span style="color: white;">Dashboard</span>
                    </a>
                </li>
                <?php if(isset($access['live']) OR $access == 'admin'){ ?>
                <li>
                    <a class="<?php if($this->uri->uri_string() == 'admin/view/voiceNote') { echo 'active'; } ?>" href="<?= site_url('admin/view/voiceNote') ?>">
                        <i class="fa fa-file-audio-o" style="color: #4191f4!important;"></i>
                        <span style="color: white;">Voice Note</span>
                    </a>
                </li>
                <li>
                    <a class="<?php if($this->uri->uri_string() == 'admin/view/live') { echo 'active'; } ?>" href="<?= site_url('admin/view') ?>/live">
                        <i class="fa fa-video-camera" style="color: #77f441!important;"></i>
                        <span style="color: white;">Event Videos</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isset($access['wordlog']) OR $access == 'admin'){ ?>
                <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/prepare_word' || $this->uri->uri_string() == 'admin/view/view_word') { echo 'active'; } ?>">
                            <i class="fa fa-pencil" style="color: #4191f4!important;"></i>
                            <span>The Word</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/prepare_word"><span>Upload Word</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/view_word"><span>View Word</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if(isset($access['bulletin']) OR $access == 'admin'){ ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/create_bulletin' || $this->uri->uri_string() == 'admin/view/view_bulletin') { echo 'active'; } ?>">
                        <i class="fa fa-edit" style="color: #f44141!important;"></i>
                        <span>News & Bulletin</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/create_bulletin"><span>Create Bulletin</span></a></li>
                        <li><a href="<?= site_url('admin/view') ?>/view_bulletin"><span>Manage Bulletin</span></a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if(isset($access['books']) OR $access == 'admin'){ ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/bookstore' || $this->uri->uri_string() == 'admin/view/add_book') { echo 'active'; } ?>">
                        <i class="fa fa-book" style="color: #f47442!important;"></i>
                        <span>Bookstore</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="<?= site_url('admin/view') ?>/bookstore">
                                <span>Books</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/view') ?>/add_book">
                                <span>Add Book</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if($access == 'admin' OR isset($access['codes'])){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/create_code' || $this->uri->uri_string() == 'admin/view/manage_codes') { echo 'active'; } ?>">
                            <i class="fa fa-key" style="color: #77f441!important;"></i>
                            <span>Codes</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/create_code"><span>Generate Codes</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/manage_codes"><span>Manage Codes</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if($access == 'admin' OR isset($access['advert'])){ ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/advert') { echo 'active'; } ?>">
                        <i class="fa fa-list-alt" style="color: #4191f4!important;"></i>
                        <span>Adverts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/advert"><span>Manage Advert</span></a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if($access == 'admin' OR isset($access['attendance'])){?>
                <li class="sub-menu">
                    <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/attendance') { echo 'active'; } ?>">
                        <i class="fa fa-list" style="color: #f44141!important;"></i>
                        <span>Attendance</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/attendance"><span>Manage Attendance</span></a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if($access == 'admin' OR isset($access['reports'])){ ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/view_report') { echo 'active'; } ?>">
                        <i class="fa fa-check" style="color: #f47442!important;"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/view_report"><span>Generate Report</span></a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if(isset($access['members']) OR $access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/manage_users' || $this->uri->uri_string() == 'admin/view/suspend_users' || $this->uri->uri_string() == 'admin/view/delete_users' || $this->uri->uri_string() == 'admin/view/create_users') { echo 'active'; } ?>">
                            <i class="fa fa-group" style="color: #77f441!important;"></i>
                            <span>Members</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_users"><span>Manage Members</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/suspend_users"><span>Deactivated Members</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/delete_users"><span>Delete Request</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/create_users"><span>Create Member</span></a></li>
                        </ul>
                    </li>
                    
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/createHOD'
                                                || $this->uri->uri_string() == 'admin/view/viewHOD'){ echo 'active'; }?>">
                            <i class="fa fa-group" style="color: #4191f4!important;"></i>
                            <span>H.O.D. / Workers</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view/createHOD') ?>">Create New (+)</a></li>
                            <li><a href="<?= site_url('admin/view/viewHOD') ?>">View All</a></li>
                        </ul>
                    </li>
                    <?php $mempacas = $this->data->fetch('mempacasGroup'); ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/createMempacasGroup' 
                                                            || $this->uri->uri_string() == 'admin/view/viewMempacasGroup/'.$mempacas[0]['id'] 
                                                            || $this->uri->uri_string() == 'admin/view/generalsInCharge' 
                                                            || $this->uri->uri_string() == 'admin/view/urgentAttention'){ echo 'active'; } ?>">
                            <i class="fa fa-group" style="color: #f44141!important;"></i>
                            <span>Mempacas</span>
                        </a>
                    <?php $urgent = $this->data->fetch('mempacasGroup', array('isUrgent' => 1)); ?>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/createMempacasGroup"><span>Create Group (+)</span></a></li>
                            <li><a <?php if(!empty($mempacas[0]['id'])){ ?>href="<?= site_url('admin') ?>/view/viewMempacasGroup/<?= $mempacas[0]['id'] ?>"<?php }else{ ?>onclick="alert('There is no Group To View.')"<?php } ?>><span>View Group</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/generalsInCharge"><span>Generals In-Charge</span></a></li>
                            <li><a <?php if(!empty($urgent[0]['id'])){ ?>href="<?= site_url('admin') ?>/view/urgentAttention/<?= $urgent[0]['id'] ?>"<?php }else{ ?>onclick="alert('There is no urgent attention.')"<?php } ?>><span>Urgent Attention</span></a></li>
                        </ul>
                    </li>
                    <?php $attendanceClass = $this->data->fetch('attendanceClass'); ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/createRegister'
                                                            || $this->uri->uri_string() == 'admin/view/viewClasses'.$attendanceClass[0]['id']
                                                            || $this->uri->uri_string() == 'admin/view/classTeachers'
                                                            || $this->uri->uri_string() == 'admin/view/incidentReports'){ echo 'active'; }?>">
                            <i class="fa fa-group" aria-hidden="true" style="color: #f44141!important;"></i>
                            <span>Children Register</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view/createRegister') ?>"><span>Create Register (+)</span></a></li>
                            <li><a <?php if(!empty($attendanceClass[0]['id'])){ ?>href="<?= site_url('admin') ?>/view/viewClasses/<?= $attendanceClass[0]['id'] ?>"<?php }else{ ?>onclick="alert('There is no Class To View.')"<?php } ?>><span>View Class</span></a></li>
                            <li><a <?php if(!empty($attendanceClass[0]['id'])){ ?>href="<?= site_url('admin/view/markAttendance') ?>/<?= $attendanceClass[0]['id'] ?>" <?php }else{ ?>onclick="alert('There is no Class To View.')"<?php } ?>><span>Mark Attendance</span></a></li>
                            <li><a href="<?= site_url('admin/view/classTeacher') ?>"><span>Class Teachers</span></a></li>
                            <li><a href="<?= site_url('admin/view/incidentReports') ?>"><span>Incident Reports</span></a></li>
                            <!--<li class="sub-menu">-->
                            <!--    <a href="javascript:;">-->
                            <!--        <span title="Communication History">Comm. History</span>-->
                            <!--    </a>-->
                            <!--    <ul class="sub">-->
                            <!--        <li><a href=""><span>SMS</span></a></li>-->
                            <!--        <li><a href=""><span>Email</span></a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(isset($access['members']) OR $access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/manage_ftimer' || $this->uri->uri_string() == 'admin/view/monthly_ftimer') { echo 'active'; } ?>">
                            <i class="fa fa-group" style="color: #4191f4!important;"></i>
                            <span>First Timers</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_ftimer"><span>Manage First Timers</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/monthly_ftimer">Monthly First Timers</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/view_gave_life') { echo 'active'; } ?>">
                        <i class="fa fa-group" style="color: #f44141!important;"></i>
                        <span>Christ Converts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/view_gave_life"><span>New Christ Converts</span></a></li>
                    </ul>
                </li>

                <?php if($access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;"  class="<?php if($this->uri->uri_string() == 'admin/view/view_gave_life') { echo 'active'; } ?>">
                            <i class="fa fa-user" style="color: #f47442!important;"></i>
                            <span>Manage Admin</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_admin"><span>View Manager</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/create_admin"><span>Create Manager</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if(isset($access['donations']) OR $access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;"  class="<?php if($this->uri->uri_string() == 'admin/view/manage_donations' || $this->uri->uri_string() == 'admin/view/view_offerings' || $this->uri->uri_string() == 'admin/view/view_tithes') { echo 'active'; } ?>">
                            <i class="fa fa-gbp" style="color: #77f441!important;"></i>
                            <span>Collections</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_donations"><span>Donations</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/view_offerings"><span>Offering Collected</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/view_tithes"><span>Tithes Received</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

                    <li class="sub-menu">
                        <a href="javascript:;"  class="<?php if($this->uri->uri_string() == 'admin/view/chat_member' || $this->uri->uri_string() == 'admin/view/chat_admin') { echo 'active'; } ?>">
                            <i class="fa fa-envelope" style="color: #4191f4!important;"></i>
                            <span>Chat</span>
                        </a>
                        <ul class="sub">
                            <?php if(isset($access['messages']) OR $access == 'admin'){ ?>
                                <li><a href="<?= site_url('admin/view') ?>/chat_member"><span>Chat w/ Member</span></a></li>
                            <?php } ?>
                            <li><a href="<?= site_url('admin/view') ?>/chat_admin"><span>Chat w/ Admin</span></a></li>
                        </ul>
                    </li>


                <?php if(isset($access['groups']) OR $access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;"  class="<?php if($this->uri->uri_string() == 'admin/view/manage_cGroups' || $this->uri->uri_string() == 'admin/view/manage_bGroups' || $this->uri->uri_string() == 'admin/view/add_group') { echo 'active'; } ?>">
                            <i class="fa fa-group" style="color: #f44141!important;"></i>
                            <span>Group</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_cGroups"><span>Manage Church Group</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/manage_bGroups"><span>Manage Business Group</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/add_group"><span>Add</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if(isset($access['notifications']) OR $access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;"  class="<?php if($this->uri->uri_string() == 'admin/view/prayerRequest' 
                                                                || $this->uri->uri_string() == 'admin/view/testimonies' 
                                                                || $this->uri->uri_string() == 'admin/view/manage_group_activity' 
                                                                || $this->uri->uri_string() == 'admin/view/birthdays'
                                                                || $this->uri->uri_string() == 'admin/view/page_verifications'
                                                                || $this->uri->uri_string() == 'admin/view/businessOffers'
                                                                || $this->uri->uri_string() == 'admin/view/keepersNetwork'
                                                                || $this->uri->uri_string() == 'admin/view/eventAttendace'
                                                                || $this->uri->uri_string() == 'admin/view/contactUs') { echo 'active'; } ?>">
                            <i class="fa fa-bell" style="color: #f47442!important;"></i>
                            <span>Notifications</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/prayerRequest"><span>Prayer Requests</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/testimonies"><span>Testimonies</span></a></li>
                            <li><a href="<?= site_url('admin') ?>/manage_group_activity"><span>Group Activities</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/birthdays"><span>Birthdays</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/page_verifications"><span>Page Verifications</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/businessOffers"><span>Business Offers</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/keepersNetwork"><span>Keepers' Network</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/eventAttendace"><span>Event Attendance</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/contactUs"><span>Contact Us</span></a></li>
                            <!--<li><a href="--><?//= site_url('admin/view') ?><!--/manage_invoices">Members Invoices</a></li>-->
                        </ul>
                    </li>
                <?php } ?>

                <?php if($access == 'admin' OR isset($access['sendSMS'])){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/send_sms' 
                                                        || $this->uri->uri_string() == 'admin/view/send_sms_member' 
                                                        || $this->uri->uri_string() == 'admin/view/send_sms_by_gender'
                                                        || $this->uri->uri_string() == 'admin/view/send_sms_church'
                                                        || $this->uri->uri_string() == 'admin/view/send_sms_business'
                                                        || $this->uri->uri_string() == 'admin/view/manage_sms'
                                                        || $this->uri->uri_string() == 'admin/view/sms_topup'
                                                        || $this->uri->uri_string() == 'admin/view/topup_history'){ echo 'active'; }   ?>">
                            <i class="fa fa-paper-plane" style="color: #77f441!important;"></i>
                            <span>Send SMS</span>
                        </a>
                        <ul class="sub">
<!--                            <li><a href="--><?//= site_url('admin/view/send_sms') ?><!--">Send By Number</a></li>-->
                            <li><a href="<?= site_url('admin/view/send_sms_member') ?>"><span>Send To Member</span></a></li>
                            <li><a href="<?= site_url('admin/view/send_sms_by_gender') ?>"><span>Send By Gender</span></a></li>
                            <li class="sub-menu">
                                <a href="javascript:;">Send By Group</a>
                                <ul class="sub">
                                    <li><a href="<?= site_url('admin/view/send_sms_church') ?>"><span>Send By Church Group</span></a></li>
                                    <li><a href="<?= site_url('admin/view/send_sms_business') ?>"><span>Send By Business Group</span></a></li>
                                </ul>
                            </li>
                            <li><a href="<?= site_url('admin/view/manage_sms') ?>"><span>History</span></a></li>
                            <li><a href="<?= site_url('admin/view/sms_topup') ?>"><span>Top Up SMS Account</span></a></li>
                            <li><a href="<?= site_url('admin/view/topup_history'); ?>"><span>Topup History</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                
                <?php if($access == 'admin' OR isset($access['sendEmail'])){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/send_email_member'
                                                                || $this->uri->uri_string() == 'admin/view/send_email_by_gender'
                                                                || $this->uri->uri_string() == 'admin/view/send_email_church'
                                                                || $this->uri->uri_string() == 'admin/view/send_email_business'
                                                                || $this->uri->uri_string() == 'admin/view/email_history'){ echo 'active'; } ?>">
                            <i class="fa fa-envelope" style="color: #4191f4!important;"></i>
                            <span>Send Email</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view/send_email_member'); ?>"><span>Send To Member</span></a></li>
                            <li><a href="<?= site_url('admin/view/send_email_by_gender'); ?>"><span>Send By Gender</span></a></li>
                            <li class="sub-menu">
                                <a href="javascript:;">Send To Group</a>
                                <ul class="sub">
                                    <li><a href="<?= site_url('admin/view/send_email_church') ?>"><span>Send To Church Group</span></a></li>
                                    <li><a href="<?= site_url('admin/view/send_email_business') ?>"><span>Send To Business Group</span></a></li>
                                </ul>
                            </li>
                            <li><a href="<?= site_url('admin/view/email_history'); ?>"><span>Send Email History</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if(isset($access['settings']) OR $access == 'admin'){ ?>
                    <li style="margin-bottom: 40px !important;" class="sub-menu">
                        <a href="javascript:;" class="<?php if($this->uri->uri_string() == 'admin/view/settings' 
                                                                || $this->uri->uri_string() == 'admin/view/msgsettings'
                                                                || $this->uri->uri_string() == 'admin/view/othermsg'
                                                                || $this->uri->uri_string() == 'admin/view/ageGroup'
                                                                || $this->uri->uri_string() == 'admin/view/respsettings'){ echo 'active'; }?>">
                            <i class="fa fa-wrench" style="color: #f44141!important;"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/settings"><span>General Settings</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/msgsettings"><span>Registration Email</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/ageGroup">Age Group Setting</a></li>
                            <li><a href="<?= site_url('admin/view') ?>/othermsg">Other Email</a></li>
                            <li><a href="<?= site_url('admin/view') ?>/respsettings"><span>All SMS</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
            <?php }else{ ?>
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                    <a class="active" href="<?= site_url('admin/view') ?>/index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-group"></i>
                            <span>Member</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_users"><span>Manage Users</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/create_users"><span>Create Users</span></a></li>
                        </ul>
                    </li>
            </ul>
            <?php }?>
            
        </div>
    </aside>
    <script>
        $(document).ready(function(){
            $('#prayerRequestBtn').on('click', function(){
                var pId = $('#prayerRequestBtn').attr("detail");
                $.ajax({
                    url: "<?= site_url('admin/notificationNew') ?>/prayerRequest",
                    type: "POST",
                    data: {pId:pId},
                    success: function(e){
                        window.location = "<?= site_url('admin/view') ?>/prayerRequest";
                    }
                });
            }); 
        });
    </script>
<script>
        $(function() {
            var url = window.location.href;
            $("#sidebar a").each(function() {
                if(url == (this.href)) {
                    $(this).closest("li").addClass("current_section");
                    if($(this).closest("li").hasClass("current_section")){
                        if($(this).closest("li").parent('ul').hasClass('sub')){
                            $(this).closest("li").parent('ul').parent('li > a').addClass('active');
                        }
                    }
                }
            });
        });
    </script>
