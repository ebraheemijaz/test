<?php $check = $this->session->userdata('userAdmin'); ?>
<?php $logo = $this->data->fetch('details', array('id' => 1)); ?>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jetnetix">
    <meta name="keyword" content="Tutor Management System">
    <link rel="shortcut icon" href="<?= base_url('assets_f') ?>/logo.png">
    <title>Mempacas Data Download</title>
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
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/chosen/chosen.css">
</head>
    <body style="text-align: left !important;">
<div class="container">
    <div class="row">
            <div class="col-md-12">
                 <div class="col-md-4"></div>
                 <div class="col-md-4"><img class="uk-float-left" src="<?= base_url('assets_f') ?>/<?= $logo[0]['logo'] ?>" alt="" height="100" width="140"/><span style="text-align: center; font-size: 20px; margin-right: 20px">RCCG Victory House London</span></div>
                 <div class="col-md-4"></div>
            </div>
         </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <?php if(count($mempacasGroup) > 0){ foreach($mempacasGroup as $mempacas){ ?>
                <table border="0" class="table table-hover" style="text-align: center;background-color: transparent;">
                    <tr>
                        <td><strong style="font-size: 22px;">MEMPACAS REPORT UPDATE</strong></td>
                    </tr>
                    <tr>
                        <td style="font-size: 20px;">(DATE OF REPORT : <?= date('d-M-Y') ?>)</td>
                    </tr>
                    <tr>
                        <td style="font-size: 17px;text-align:left!important;">GROUP NAME : <?= $mempacas['groupName'] ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 17px;text-align:left!important;">Date Created: <?= $mempacas['createdAt'] ?></td>
                    </tr>
                </table>
                <table border="0" class="table table-hover" style="text-align: center; background-color: transparent;">
                    <tr>
                        <td><strong style="font-size: 22px;">General In Charge</strong></td>
                    </tr>
                    <?php $generalInCharges = explode(',', $mempacas['generalInCharge']); foreach($generalInCharges as $gic){ ?>
                    <tr>
                        <td style="font-size: 17px; text-align: left!important;"><?= $gic ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <table border="1" id="myTableUser" class="table table-hover">
                    <thead>
                                                    <tr>
                                                        <th>S/No          </th>
                                                        <th>Members Name       </th>
                                                        <th>Members Number </th>
                                                        <th data-step="3" data-intro="Click on watch to be a part of event">Last Contact Date</th>
                                                        <th data-step="2" data-intro="Status of the event">Members Response</th>
                                                        <th>Special Prayers</th>
                                                        <th>Comments</th>
                                                        <th>Senior Pastor To Follow Up</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $members = explode(',', $mempacas['membersId']); ?>
                                                    <?php $i=1; if(isset($mempacas['membersId'])){ foreach($members as $val1){ ?>
                                                        <?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $val1)); ?>
                                                        <?php if($mempacasGroupMember[0]['seniorPastorToFollowUp']){ ?>
                                                        <?php $membersDetail = $this->data->fetch('member', array('id' => $val1)); ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td><?= $membersDetail[0]['mobileNo'] ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['lastContactDate'])){ echo 'Not Yet Contacted'; }else{ echo date('d-m-Y', strtotime($mempacasGroupMember[0]['lastContactDate'])); } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['memberResponse'])){ echo 'No Response'; }else{ echo ucfirst($mempacasGroupMember[0]['memberResponse']); } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['specialPrayerRequest'])){ echo 'No Prayer Requested'; }else{ echo ucfirst($mempacasGroupMember[0]['specialPrayerRequest']); } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['comment'])){ echo 'No Comment'; }else{ echo ucfirst($mempacasGroupMember[0]['comment']); } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['seniorPastorToFollowUp']) || $mempacasGroupMember[0]['seniorPastorToFollowUp'] == 0){ echo 'No'; }else{ echo 'Yes'; } ?></td>
                                                        </tr>
                                                        <?php $i++; }}}else{ ?>
                                                        <tr>
                                                            <td colspan="9"><center>No Record Found.</center></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                </table>
                <?php }} ?>
            </section>
        </div>
    </div>
</div>
</body>
</html>
