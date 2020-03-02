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
                        <td><strong style="font-size: 22px;">CHILDREN REGISTER REPORT UPDATE</strong></td>
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
                <table border="0" class="table table-hover" style="background-color: transparent;">
                    <tr style="text-align: left !important;">
                        <td><strong style="font-size: 22px;">Teacher In Charge</strong></td>
                    </tr>
                    <?php $generalInCharges = explode(',', $mempacas['teacherName']); foreach($generalInCharges as $gic){ ?>
                    <tr>
                        <td style="font-size: 17px; text-align: center!important;"><?= $gic ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <table id="myTableMempacas" class="table table-hover table-striped" style="text-align:center;" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>S/No</th>
                                                        <th>Children Name</th>
                                                        <th>Gender</th>
                                                        <th>Attendance %</th>
                                                        <th>Behaviour </th>
                                                        <th>Performance </th>
                                                        <th>Most Recent Incident</th>
                                                        <th>Most Recent Remark</th>
                                                        <th>Parent Name</th>
                                                        <th>Parent No</th>
                                                        <!--<th width="20%">Action</th>-->
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $monthsss = date('Y-m%', strtotime($monthsss)); ?>
                                                        <?php $totalClassDays = $this->data->myquery("SELECT count(distinct(date)) as totalClassDays from `markAttendance` WHERE date LIKE '".date('Y-m%')."'"); ?>
                                                        <?php $members = explode(',', $mempacas['studentId']); ?>
                                                    <?php if($monthsss >= date('Y-m%', strtotime($mempacas['createdAt']))){ $i=1; foreach($members as $val1){ ?>
                                                        <?php $membersDetail = $this->data->fetch('children', array('id' => $val1)); ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td><?php if($membersDetail[0]['gender'] == 'male'){ echo 'M'; }else if($membersDetail[0]['gender'] == 'female'){ echo 'F'; } ?></td>
                                                            <td><?php $attendance = $this->data->myquery("SELECT count(*) as totalDays FROM `markAttendance` WHERE date LIKE '".date('Y-m%')."' AND childId = ".$membersDetail[0]['id']); if(empty($attendance[0]['totalDays'])){ 
                                                                        echo '0%'; 
                                                                    }else{ 
                                                                        echo round((($attendance[0]['totalDays'] / $totalClassDays[0]['totalClassDays']) * 100))."%"; 
                                                                    } ?></td>
                                                            <td><?php $attendance1 = $this->data->myquery("SELECT sum(performance) as totalPerformance, count(*) as totalCount FROM `markAttendance` WHERE date LIKE '".date('Y-m%')."' AND childId = ".$membersDetail[0]['id']); if(empty($attendance1[0]['totalPerformance'])){ 
                                                                        echo '0 / 5'; 
                                                                    }else{ 
                                                                        echo round(($attendance1[0]['totalPerformance'] / $totalClassDays[0]['totalClassDays']), 2)." / 5"; 
                                                                    } ?></td>
                                                            <td><?php $attendance1 = $this->data->myquery("SELECT sum(behaviour) as totalPerformance, count(*) as totalCount FROM `markAttendance` WHERE date LIKE '".date('Y-m%')."' AND childId = ".$membersDetail[0]['id']); if(empty($attendance1[0]['totalPerformance'])){
                                                                        echo '0 / 5'; 
                                                                    }else{ 
                                                                        echo round(($attendance1[0]['totalPerformance'] / $attendance1[0]['totalCount']),2)." / 5"; 
                                                                    } ?></td>
                                                            <td><?php $incidentReport = $this->data->myquery('SELECT * FROM incidentReports WHERE childId = '.$membersDetail[0]['id'].' AND createdAt = "'.date('Y-m%').'" ORDER BY createdAt desc'); if(empty($incidentReport)){ 
                                                                        echo 'No Recent Incident'; 
                                                                    }else{ 
                                                                        echo $incidentReport[0]['anyRecentIncident']; 
                                                                    } ?></td>
                                                            <td><?php $attendanceRemark = $this->data->myquery('SELECT * FROM `markAttendance` WHERE childId = '.$membersDetail[0]['id'].' AND createdAt = "'.date('Y-m%').'" ORDER BY createdAt desc'); if(empty($attendanceRemark)){ 
                                                                        echo 'Not Remark Yet.'; 
                                                                    }else{ 
                                                                        echo ucfirst($attendanceRemark[0]['teacherRemark']); 
                                                                    } ?></td>
                                                            <td><?php $parentName = $this->data->fetch('member', array('id' => $membersDetail[0]['parent_id']))[0]; ?><?= $parentName['fname']." ".$parentName['lname'] ?></td>
                                                            <td><?= $parentName['mobileNo'] ?></td>
                                                            <!--<td>-->
                                                            <!--    <a href="#" data-target="#markAttendance<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i style="color: #1e88e5;" class="material-icons">bookmark</i></a>-->
                                                            <!--    <a href="#" data-target="#contactMember<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-pencil" title="Contact Member"></i></a> -->
                                                            <!--| <a data-target="#assignGroup<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-tasks" title="Reassign Group"></i></a> -->
                                                            <!--| <a data-target="#sendSMS<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-share" title="Send SMS."></i></a> -->
                                                            <!--| <a data-target="#sendEmail<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-envelope-o" title="Send Email"></i></a>-->
                                                            <!--| <a onclick="deleteConff('<?= site_url('admin/deleteChildren/attendanceClass/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a></td>-->
                                                        </tr>
                                                        <?php $i++; }}else{ ?>
                                                        <tr>
                                                            <td colspan="10" style="text-align: center!important;"><center>NO CLASS CREATED THIS MONTH</center></td>
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
