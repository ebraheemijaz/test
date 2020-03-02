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
    <title>Calendar Event Log</title>
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
                 <div class="col-md-4"><img class="uk-float-left" src="<?= base_url('assets_f') ?>/<?= $logo[0]['logo'] ?>" alt="" height="100" width="140"/><span style="text-align: center; font-size: 20px; margin-right: 20px">Membership Management System</span></div>
                 <div class="col-md-4" style="text-align: center; font-size: 20px;"></div>
             </div>
         </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <table  id="myTableUser" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Event Date</th>
                            <th>Status</th>
                            <th>Username</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Event Link</th>
                            <th>Event Image</th>
                            <th>Event Description</th>
                            <th>Remind Member</th>
                            <th>Reminder Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;if(count($calendar) > 0){ foreach($calendar as $val){ ?>
                                <tr style="<?php if($val['date'] == date('Y-m-d')){?>color:green;<?php }elseif(date('Y-m-d', strtotime($val['date'])) < date('Y-m-d')){ ?>color:red;<?php }else{ ?>color:black;<?php } ?>">
                                    <!--<td><?= $i; ?></td>-->
                                    <td style="width:200px; word-wrap: break-word;display: inline-block;"><?= ucfirst($val['desc']) ?></td>
                                    <td style="width: 20%;"><?= date('Y-m-d', strtotime($val['date'])) ?></td>
                                    <td><?= $val['status']?></td>
                                    <td><?php if($val['adminId'] == 1){echo 'Admin'; }else{echo ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['fname'])." ".ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['lname']); }?></td>
                                    <td><?= date('H:i:s', strtotime($val['start']))?></td>
                                    <td><?= date('H:i:s', strtotime($val['end']))?></td>
                                    <td style="width:100px; word-wrap: break-word;display: inline-block;"><a href="<?= $val['link'] ?>" target="_blank"><?= $val['link'] ?></a></td>
                                    <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image'])){ $image = base_url('assets_f/male.jpg'); } ?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            $ori = $exif['Orientation'];
                                        ?>
                                        <a onclick="openBig1('<?= $image; ?>')">
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/></a>
                                    </td>
                                    <td style="width:200px; word-wrap: break-word;display: inline-block;"><?= $val['eventDesc']?></td>
                                    <td><?php if($val['isReminded'] == 1){echo 'Yes';}else{echo 'No';}?></td>
                                    <td><?php if($val['reminder_event'] == 60){echo "1 Hour Before";}elseif($val['reminder_event'] == 120){echo "2 Hours Before";}elseif($val['reminder_event'] == 500){echo "5 Hours Before";}elseif($val['reminder_event'] == 1440){echo "1 Day Before";}elseif($val['reminder_event'] == 2880){echo "2 Days Before";}elseif($val['reminder_event'] == 10080){echo "1 Week Before"; }else{ echo $val['reminder_event'].' Mins Before'; }; ?></td>
                                    <!--<td><a style="cursor: pointer" onclick="deleteC('<?= site_url('home/deleteEventNew') . "/" . $val['event_id']."/same" ?>')"><i class="fa fa-trash"></i></a></td>-->
                                </tr>
                            <?php $i++; }}else{
                                ?>
                                <tr>
                                    <td colspan="11" align="center">No Record Found</td>
                                </tr>
                                <?php
                            } ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</div>
</body>
</html>
