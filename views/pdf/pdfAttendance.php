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
                <?php if(count($classDetail) > 0){ foreach($classDetail as $mempacas){ ?>
                <table border="0" class="table table-hover" style="text-align: center;background-color: transparent;">
                    <tr>
                        <td><strong style="font-size: 22px;">ATTENDANCE REPORT UPDATE</strong></td>
                    </tr>
                    <tr>
                        <td style="font-size: 20px;">(DATE OF REPORT : <?= date('d-M-Y') ?>)</td>
                    </tr>
                    <tr>
                        <td style="font-size: 17px;text-align:left!important;">CLASS NAME : <?= $mempacas['className'] ?></td><td> AGE GROUP : <?= $this->data->fetch('ageGroup', array('id' => $mempacas['ageGroup']))[0]['ageGroup'] ?> Years </td>
                    </tr>
                    <tr>
                        <td style="font-size: 17px;text-align:left!important;">Date Created: <?= $mempacas['createdAt'] ?></td>
                    </tr>
                </table>
                <table border="0" class="table table-hover" style="text-align: center; background-color: transparent;">
                    <tr>
                        <td><strong style="font-size: 22px;">Teacher(s) In Charge</strong></td>
                    </tr>
                    <?php $generalInCharges = explode(',', $mempacas['teacherName']); foreach($generalInCharges as $gic){ ?>
                    <tr>
                        <td style="font-size: 17px; text-align: center!important;"><?= $gic ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="table-responsive">
                                                    <div id="updateMempacas">
                                                    <table id="myTableAttend" class="table table-hover table-striped" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Children Name</th>
                                                        <th width="15%">Dropped By</th>
                                                        <th>Time In</th>
                                                        <th width="15%">Picked By </th>
                                                        <th>Time Out </th>
                                                        <th width="20%">Teacher Remark</th>
                                                        <th width="20%">Guardian Remark</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $totalClassDays = $this->data->myquery("SELECT count(distinct(date)) as totalClassDays from `markAttendance` WHERE date LIKE '".date('Y-m%')."'"); ?>
                                                        <?php $members = explode(',', $mempacas['studentId']); ?>
                                                    <?php $i=1; if($mempacas['studentId'] != ''){ foreach($members as $val1){ if($val1 != ''){ ?>
                                                        <?php $membersDetail = $this->data->fetch('children', array('id' => $val1)); ?>
                                                        <?php $attendanceDetail = $this->data->myquery("SELECT * FROM markAttendance WHERE childId = ".$val1." and date LIKE '".date('Y-m-d')."' order by date desc"); ?>
                                                        <tr>
                                                            <td><?php if(!empty($attendanceDetail[0]['date'])){ echo date('d-M-Y', strtotime($attendanceDetail[0]['date'])); }else{ echo date('d-M-Y'); } ?></td>
                                                            <td><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td><?php if(!empty($attendanceDetail[0]['droppedBy'])){ echo ucfirst($attendanceDetail[0]['droppedBy']); }else{ echo 'Absent'; } ?></td>
                                                            <td><?php if(!empty($attendanceDetail[0]['inTime'])){ echo date('H:i:s', strtotime($attendanceDetail[0]['inTime'])); }else{ echo '00:00:00'; } ?></td>
                                                            <td><?php if(!empty($attendanceDetail[0]['pickedBy'])){ echo ucfirst($attendanceDetail[0]['pickedBy']); }else{ echo 'Not Picked Yet.'; } ?></td>
                                                            <td><?php if(!empty($attendanceDetail[0]['outTime'])){ echo date('H:i:s', strtotime($attendanceDetail[0]['outTime'])); }else{ echo '00:00:00'; } ?></td>
                                                            <td><?php if(!empty($attendanceDetail[0]['teacherRemark'])){ echo ucfirst($attendanceDetail[0]['teacherRemark']); }else{ echo 'No Remark Yet.'; } ?></td>
                                                            <td><?php if(!empty($attendanceDetail[0]['guardianRemark'])){ echo ucfirst($attendanceDetail[0]['guardianRemark']); }else{ echo 'No Remark Yet.'; } ?></td>
                                                            
                                                        </tr>
                                                        <?php $i++; }}} ?>
                                                    </tbody>
                                                </table>
                                                    </div>
                                                    <br/>
                                                    <h3>Marked Attendance Of The Month</h3>
                                                    <div id="markAttendance">
                                                        <table id="myTable" class="table table-hover table-striped" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Children Name</th>
                                                        <th width="15%">Dropped By</th>
                                                        <th>Time In</th>
                                                        <th width="15%">Picked By </th>
                                                        <th>Time Out </th>
                                                        <th width="20%">Teacher Remark</th>
                                                        <th width="20%">Guardian Remark</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(!empty($markAttend)){ ?>
                                                            <?php $i=1; foreach($markAttend as $val12){ if($val12['classId'] == $mempacas['id']){ ?>
                                                                    <tr style="<?php if($val12['date'] == date('Y-m-d')){ ?>color: red;<?php } ?>">
                                                                        <td><?= date('d-m-Y', strtotime($val12['date'])); ?></td>
                                                                        <td><?php $studentRecord = $this->data->fetch('children', array('id' => $val12['childId']))[0]; echo $studentRecord['fname']." ".$studentRecord['lname']; ?></td>
                                                                        <td><?= $val12['droppedBy']?></td>
                                                                        <td><?= date('H:i:s', strtotime($val12['inTime'])); ?></td>
                                                                        <td><?= $val12['pickedBy'] ?></td>
                                                                        <td><?= date('H:i:s', strtotime($val12['outTime'])); ?></td>
                                                                        <td><?= $val12['teacherRemark']; ?></td>
                                                                        <td><?php if(!empty($val12['guardianRemark'])){ echo $val12['guardianRemark']; }else{ echo 'No Remark Yet'; } ?></td>
                                                                        
                                                                    </tr>
                                                                <?php $i++; }} ?>
                                                        <?php } ?>
                                                        </tbody>
                                                </table>
                                                    </div>
                                                </div>
                <?php }} ?>
            </section>
        </div>
    </div>
</div>
</body>
</html>
