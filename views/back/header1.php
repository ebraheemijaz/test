<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jetnetix">
    <meta name="keyword" content="Tutor Management System">
    <link rel="shortcut icon" href="<?= base_url('assets_f') ?>/logo.png">
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
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/themes/themes_combined.min.css" media="all">
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.css" />
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
        li.current_section > a > span {
            color: #ff4081
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
<!--    <link rel="stylesheet" href="--><?//= base_url('assets_f') ?><!--/chosen/docsupport/style.css">-->
<!--    <link rel="stylesheet" href="--><?//= base_url('assets_f') ?><!--/chosen/docsupport/prism.css">-->
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/chosen/chosen.css">
</head>

<body style="text-align: left !important;">

<section id="container" >
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box js-toggle-left-slidebar">
            <div class="fa fa-bars" ></div>
        </div>
        <!--logo start-->
        <a href="" style="color:grey !important;" class="logo">
            <img src="<?= base_url('assets_f') ?>/logo.png" style="width:30px;" alt=""/>
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
                        <span class="username"><i class="fa fa-bell"></i><span class="badge badge-danger" style="background-color : red;"><?= count($this->data->fetch('member', array('status' => 'suspend')));?></span></span>
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
                <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="<?= site_url('admin/view') ?>/index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/view') ?>/live">
                        <i class="fa fa-video-camera"></i>
                        <span>Live</span>
                    </a>
                </li>
                <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-pencil"></i>
                            <span>The Word</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/prepare_word"><span>Upload Word</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/view_word"><span>View Word</span></a></li>
                        </ul>
                    </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-edit"></i>
                        <span>News & Bulletin</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/create_bulletin"><span>Create Bulletin</span></a></li>
                        <li><a href="<?= site_url('admin/view') ?>/view_bulletin"><span>Manage Bulletin</span></a></li>
                    </ul>
                </li>    
                <!--<li>-->
                <!--    <a href="<?= site_url('admin/fetchCalendar') ?>">-->
                <!--        <i class="fa fa-calendar-o"></i>-->
                <!--        <span>Calendar</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-book"></i>
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

                <?php $access = ($userAdmin[0]['access'] != NULL) ? $userAdmin[0]['access'] : "admin";  ?>
                <?php if($access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-key"></i>
                            <span>Codes</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/create_code"><span>Generate Codes</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/manage_codes"><span>Manage Codes</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list-alt"></i>
                        <span>Advert</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/advert"><span>Manage Advert</span></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list"></i>
                        <span>Attendance</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/attendance"><span>Manage Attendance</span></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-check"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/view_report"><span>Generate Report</span></a></li>
                    </ul>
                </li>
                <?php if(isset($access['members']) OR $access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-group"></i>
                            <span>Member</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_users"><span>Manage Users</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/suspend_users"><span>Deactivated User</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/delete_users"><span>Delete Request</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/create_users"><span>Create Users</span></a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-group"></i>
                            <span>First Timers</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_ftimer"><span>Manage First Timers</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-group"></i>
                        <span>Christ Converts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?= site_url('admin/view') ?>/view_gave_life"><span>Christ Converts</span></a></li>
                    </ul>
                </li>

                <?php if($access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-user"></i>
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
                        <a href="javascript:;">
                            <i class="fa fa-gbp"></i>
                            <span>Collections</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_donations"><span>Donations</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/view_offerings"><span>Offering Collected</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/view_tithes"><span>Tithes Received</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if(isset($access['updates']) OR $access == 'admin'){ ?>
                    
                <?php } ?>
                <?php if(isset($access['reviews']) OR $access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-calendar"></i>
                            <span>Review</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_reviews"><span>Manage Reviews</span></a></li>
                        </ul>
                    </li>
                <?php } ?>


                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-envelope"></i>
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
                        <a href="javascript:;">
                            <i class="fa fa-group"></i>
                            <span>Group</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/manage_cGroups"><span>Manage Church Group</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/manage_bGroups"><span>Manage Business Group</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/add_group"><span>Add</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if(isset($access['pastors']) OR $access == 'admin'){ ?>
                    <!--<li>
                        <a href="<?/*= site_url('admin/view') */?>/pastors_diary">
                            <i class="fa fa-book"></i>
                            <span>Pastors Diary</span>
                        </a>
                    </li>-->
                <?php } ?>

                <?php if(isset($access['notifications']) OR $access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-bell"></i>
                            <span>Notifications</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/prayerRequest"><span>Prayer Requests</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/testimonies"><span>Testimonies</span></a></li>
                            <li><a href="<?= site_url('admin') ?>/manage_group_activity"><span>Group Activities</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/new_signups"><span>New Sign Ups</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/birthdays"><span>Birthdays</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/page_verifications"><span>Page Verifications</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/businessOffers"><span>Business Offers</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/keepersNetwork"><span>Keepers' Network</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/eventAttendace">Event Attendance</a></li>
                            <!--<li><a href="--><?//= site_url('admin/view') ?><!--/manage_invoices">Members Invoices</a></li>-->
                        </ul>
                    </li>
                <?php } ?>

                <?php if($access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-paper-plane"></i>
                            <span>Send SMS</span>
                        </a>
                        <ul class="sub">
<!--                            <li><a href="--><?//= site_url('admin/view/send_sms') ?><!--">Send By Number</a></li>-->
                            <li><a href="<?= site_url('admin/view/send_sms_member') ?>"><span>Send To Member</span></a></li>
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
                
                <?php if($access == 'admin'){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-envelope"></i>
                            <span>Send Email</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view/send_email_member'); ?>"><span>Send To Member</span></a></li>
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
                        <a href="javascript:;">
                            <i class="fa fa-wrench"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= site_url('admin/view') ?>/settings"><span>General Settings</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/msgsettings"><span>Email Settings</span></a></li>
                            <li><a href="<?= site_url('admin/view') ?>/respsettings"><span>SMS Settings</span></a></li>
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
