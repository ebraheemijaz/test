<style>
    .chosen-choices{
        padding: 10px !important;
        border-radius: 5px;
    }
    .chosen-container{
        width: 38% !important;
    }
    .checkwidth{
        margin-left: 15%;
    }
    @media only screen and (min-width: 300px) and (max-width: 600px) {
        .checkwidth{
            margin-left: -10%;
        }
    }
    .dataTables_wrapper .fg-toolbar { display: none; }
</style>

<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom" style="margin-top: 60px; margin-left: 20%;"><strong>View All Classes</strong></h4>
        <div class="uk-grid uk-grid-medium checkwidth" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-10-10">
                <div class="md-card uk-margin-medium-bottom" style="margin-left: -20px; margin-right: -20px;">
                    <div class="md-card-content">
                        <?php $val = $classes[0];  ?>
                        <?php $ageGroup = $this->data->fetch('ageGroup', array('id' => $val['ageGroup'])); ?>
                        <div class="uk-grid blog_article" data-uk-grid-margin>
                            <div class="uk-width-medium">
                                <div class="md-card" style="box-shadow: 0px 0px 0px!important;">
                                    <div class="md-card-content large-padding">
                                        <div class="uk-article">

                                            <p style="text-align: center">
                                                <a style="float: left" <?php if($val['prev'] > 0){ ?> href="<?= site_url('admin/view/viewClasses/'.$val['prev'].'/'.$val['prevCount']) ?>" <?php }else{ ?>onclick="alert('No Previous Class Present.');"<?php } ?>><span class="menu_icon"><i  style="font-size:40px" class="material-icons">fast_rewind</i></span></a>
                                                <a href="<?= site_url('admin/view/viewClasses/'.$val['id']) ?>"><span class="menu_icon" style="font-size: 20px;"><strong><?= $val['className'] ?> ( <?= $ageGroup[0]['ageGroup'] ?> )</strong></span></a>
                                                <a style="float:right" <?php if($val['next'] > 0){ ?> href="<?= site_url('admin/view/viewClasses/'.$val['next'].'/'.$val['nextCount']) ?>" <?php }else { ?>onclick="alert('No Next Class Present.');"<?php } ?>><span class="menu_icon"><i style="font-size:40px"  class="material-icons">fast_forward</i></span></a>
                                            </p>
                                            <p style="text-align: center">
                                               <?php $first = 1; if($val['prev'] == 0){ echo $first; $first = $first+1; }
                                                                    else if($val['next'] == 0){ echo $val['count'][0]['total']; }
                                                                    else if($val['next'] != 0 && $val['prev'] != 0){ 
                                                                            $first = $first+$val['nextCount']; 
                                                                            echo $first; } ?> of <?= $val['count'][0]['total'] ?> Classes
                                            </p>
                                            <br/>
                                            <br/>
                                            <?php if(!empty($msg)){ ?>
                                                <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                                                <br/>
                                                <br/>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-6"><strong>Class Name : </strong></div>
                                                <div class="col-md-3 col-sm-6 col-xs-6"><?= $val['className'] ?></div>
                                                <div class="col-md-3 col-sm-6 col-xs-6"><strong>Date Created : </strong></div>
                                                <div class="col-md-3 col-sm-6 col-xs-6"><?= date('d-M-Y', strtotime($val['createdAt'])) ?></div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-6">
                                                    <strong>Teacher-In-Charge(s) : </strong>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-6">
                                                    <?php 
                                                        $generalInCharges = explode(',', $val['teacherName']);
                                                        foreach($generalInCharges as $GIC) {
                                                        ?>
                                                        <div class="row"><div class="col-md-8"><?= $GIC; ?></div><div class="col-md-4"></div></div><br/>
                                                        <?php
                                                        }
                                                    ?>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="col-md-4">
                                                    <a onclick="deleteConff('<?= site_url('admin/deleteChildRegistrationGroup/attendanceClass/'.$val['id']."/createRegister") ?>')" class="btn btn-danger">Delete Class</a>  
                                                    </div>
                                                    <div class="col-md-4">
                                                    <button data-target="#assignGeneral<?= $val['id'] ?>" data-toggle="modal" href="#" class="btn btn-primary">Add Teacher</button>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <button data-target="#addMember<?= $val['id'] ?>" data-toggle="modal" href="#" class="btn btn-success">Add Child</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="uk-article-divider">
                                            <p>
                                                <div class="table-responsive">
                                                    <?php
                                                        for ($i = 0; $i < 12; $i++) {
                                                            $months[] = date("F-Y", strtotime( date( 'Y-M-01' )." -$i months"));
                                                        }
                                                    ?>
                                                    <select class="form-control chosen-select" name="genPdf" id="genPdf">
                                                        <!--<option value="">Select Month</option>-->
                                                        <?php foreach($months as $key => $mon){ ?>
                                                            <option value="<?= $mon ?>"><?= $mon ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span style="float : right;"><a   href="#" data-target="#basicPdf<?= $val['id'] ?>" data-toggle="modal" title="Print this class"><i class="md-icon material-icons">attach_file</i></a> | 
                                                    <a href="#" data-target="#fullPdf" data-toggle="modal" title="Print ALL classes"><i class="md-icon fa fa-file-pdf-o"></i></a></span>
                                                    <div id="updateMempacas">
                                                    <table id="myTableMempacas" class="table table-hover table-striped" cellspacing="0" width="100%">
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
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $totalClassDays = $this->data->myquery("SELECT count(distinct(date)) as totalClassDays from `markAttendance` WHERE date LIKE '".date('Y-m%')."'"); ?>
                                                        <?php $members = explode(',', $val['studentId']); ?>
                                                    <?php $i=1; if($val['studentId'] != ''){ foreach($members as $val1){ if($val1 != ''){?>
                                                        <?php $membersDetail = $this->data->fetch('children', array('id' => $val1)); ?>
                                                        <?php if(count($membersDetail)){ ?>
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
                                                                        echo round(($attendance1[0]['totalPerformance'] / $totalClassDays[0]['totalClassDays']),2)." / 5"; 
                                                                    } ?></td>
                                                            <td><?php $incidentReport = $this->data->myquery('SELECT * FROM incidentReports WHERE childId = '.$membersDetail[0]['id'].' ORDER BY createdAt desc'); if(empty($incidentReport)){ 
                                                                        echo 'No Recent Incident'; 
                                                                    }else{ 
                                                                        echo $incidentReport[0]['anyRecentIncident']; 
                                                                    } ?></td>
                                                            <td><?php $attendanceRemark = $this->data->myquery('SELECT * FROM `markAttendance` WHERE childId = '.$membersDetail[0]['id'].' ORDER BY createdAt desc'); if(empty($attendanceRemark)){ 
                                                                        echo 'Not Remark Yet.'; 
                                                                    }else{ 
                                                                        echo ucfirst($attendanceRemark[0]['teacherRemark']); 
                                                                    } ?></td>
                                                            <td><?php $parentName = $this->data->fetch('member', array('id' => $membersDetail[0]['parent_id']))[0]; ?><a href="<?= site_url('admin/view/edit_member/'.$membersDetail[0]['parent_id']) ?>"><?= $parentName['fname']." ".$parentName['lname'] ?></a></td>
                                                            <td><a href="<?= site_url('admin/view/edit_member/'.$membersDetail[0]['parent_id']) ?>"><?= $parentName['mobileNo'] ?></a></td>
                                                            <td>
                                                                <!--<a href="#" data-target="#markAttendance<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i style="color: #1e88e5;" class="material-icons">check_circle_outline</i></a>-->
                                                                <a href="#" data-target="#contactMember<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-pencil" title="Contact Member"></i></a> 
                                                            | <a data-target="#assignGroup<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-tasks" title="Reassign Group"></i></a> 
                                                            <!--| <a data-target="#sendSMS<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-share" title="Send SMS."></i></a> -->
                                                            <!--| <a data-target="#sendEmail<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-envelope-o" title="Send Email"></i></a>-->
                                                            | <a onclick="deleteConff('<?= site_url('admin/deleteChildren/attendanceClass/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php $i++; }}}} ?>
                                                    </tbody>
                                                </table>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="conf"></div>
<script>
    function deleteConff(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are you sure about this delete? " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function deleteMember(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are You Sure? " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function basicDownload(link, msg){
        if(msg){
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Do you want to download the data of this group?" +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>No</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }else{
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Do you want to download the data of ALL the groups?" +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>No</button> " +
            "<a href='"+link+"' ><span class='btn btn-danger'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function basicDownload1(link, msg){
        if(msg){
        var a = '<div id="confirmBasicDownload" class="uk-modal">'+
                '<div class="uk-modal-dialog">'+
                '<div class="uk-modal-header">'+
                '<h3>Do you want to download the data of this group?</h3>'+
                '</div>'+
                '<div class="uk-modal-footer">'+
                '<button class="md-btn md-btn-primary uk-modal-close">No</button>'+
                '<a href="'+link+'" class="md-btn md-btn-danger">Yes</a>'+
                '</div>'+
                '</div>'+
                '</div>';
        }else{
            var a = '<div id="confirmBasicDownload" class="uk-modal">'+
                '<div class="uk-modal-dialog">'+
                '<div class="uk-modal-header">'+
                '<h3>Do you want to download the data of ALL the groups?</h3>'+
                '</div>'+
                '<div class="uk-modal-footer">'+
                '<button class="md-btn md-btn-primary uk-modal-close">No</button>'+
                '<a href="'+link+'" class="md-btn md-btn-danger">Yes</a>'+
                '</div>'+
                '</div>'+
                '</div>';
        }
        $(".conf").html(a);
        var modal = UIkit.modal("#confirmBasicDownload").show();
        // var modal = UIkit.modal("#confirmBasicDownload").hide();
    }
</script>
<?php $members = explode(',', $val['studentId']);?>
<?php foreach($classes as $val6){ ?>
<?php $membersDetail = $this->data->myquery("SELECT * FROM `children` WHERE NULLIF(fname, '') IS NOT NULL AND NULLIF(lname, '') IS NOT NULL AND classId IS NULL AND isAlotted = 0"); ?>
    <div class="modal fade in" id="addMember<?= $val6['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <?php $student = explode(',', $val6['studentId']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Add More Children
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/addNewChild') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="hidden" name="membersIdOld" value="<?= $val6['studentId'] ?>"/>
                                    <input type="hidden" name="membersNameOld" value="<?= $val6['studentName'] ?>"/>
                                    <input type="hidden" name="studentCount" value="<?= count($student); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>More Children:</strong>
                                </div>
                                <div class="col-md-8">
                                    <select name="members[]" class="chosen-select" multiple>
                                    <?php
                                        foreach($membersDetail as $mem){
                                        ?>
                                        <option value="<?= $mem['id'] ?>"><?= $mem['fname'] ?> <?= $mem['lname'] ?>(<?= $mem['relation'] ?>)</option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Add Children</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php foreach($classes as $val5){ ?>
<?php $membersDetail = $this->data->myquery('SELECT * FROM `member` WHERE `isTeacherInCharge` = 0'); ?>
    <div class="modal fade in" id="assignGeneral<?= $val5['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <?php $student = explode(',', $val5['studentId']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Add More Teacher In Charge
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/addNewTeacher') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="hidden" name="teacherInChargeIdOld" value="<?= $val5['teacherId'] ?>"/>
                                    <input type="hidden" name="teacherInChargeName" value="<?= $val5['teacherName'] ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>Teacher In Charge:</strong>
                                </div>
                                <div class="col-md-8">
                                    <select name="teacherId[]" class="chosen-select" multiple>
                                    <?php
                                        foreach($membersDetail as $mem){
                                        ?>
                                        <option value="<?= $mem['id'] ?>"><?= $mem['fname'] ?> <?= $mem['lname'] ?></option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="classId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" name="studentCount" value="<?= count($student); ?>" />
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Add New Teacher</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="modal fade in" id="sendEmail<?= $members[$i] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Send Email
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/sendEmail/mempacasGroupMemberEmail') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Member Name:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                                </div>
                            </div>
                            <!--<div class="row">-->
                            <!--    <div class="col-md-3">-->
                            <!--        <strong>Member Mobile Number:</strong>-->
                            <!--    </div>-->
                            <!--    <div class="col-md-7">-->
                            <!--        <?= $membersDetail[0]['mobileNo'] ?>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="row">
                                <div class="col-md-3">
                                    
                                </div>
                                <div class="col-md-7">
                                    <p>"<strong>Shalom</strong> <?= $membersDetail[0]['fname'] ?>",</p>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Send Email :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="msg" id="msgEmail" maxlength="500"></textarea>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Send Email</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="modal fade in" id="sendSMS<?= $members[$i] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Send SMS To <?= $membersDetail['fname']." ".$membersDetail['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/sendSMS/mempacasGroupMemberSMS') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Member Name:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                                </div>
                            </div>
                            <!--<div class="row">-->
                            <!--    <div class="col-md-3">-->
                            <!--        <strong>Member Mobile Number:</strong>-->
                            <!--    </div>-->
                            <!--    <div class="col-md-7">-->
                            <!--        <?= $membersDetail[0]['mobileNo'] ?>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Send SMS :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="msg" id="msg" maxlength="500"></textarea>
                                    <p>
                                        <span id="remaining">160 characters remaining</span>
                                        <span id="messages">1 message(s)</span>
                                    </p>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Reassign</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('children', array('id' => $members[$i]));?>
    <div class="modal fade in" id="assignGroup<?= $members[$i] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Reassign Class
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/reassignClass') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Member Name:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                                </div>
                            </div>
                            <!--<div class="row">-->
                            <!--    <div class="col-md-3">-->
                            <!--        <strong>Member Mobile Number:</strong>-->
                            <!--    </div>-->
                            <!--    <div class="col-md-7">-->
                            <!--        <?= $membersDetail[0]['mobileNo'] ?>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Class Name :</strong>
                                </div>
                                <?php $mempacasGroup = $this->data->fetch('attendanceClass'); ?>
                                <div class="col-md-7">
                                    <select name="attendanceClass">
                                        <option value="">Select Class</option>
                                        <?php foreach($mempacasGroup as $group){ if($group['id'] != $val['id']){?>
                                        <option value="<?= $group['id'] ?>"><?= $group['className'] ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Reassign</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if($val['studentId'] != ''){ for($i = 0; $i < count($members); $i++){ if($members[$i] != ''){?>
<?php $membersDetail = $this->data->fetch('children', array('id' => $members[$i])); ?>
<?php $incidentReport = $this->data->myquery('SELECT * FROM `incidentReports` WHERE `childId` = '.$members[$i].' ORDER BY createdAt desc'); ?>
<?php $attendanceRemark = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `childId` = $members[$i] ORDER BY createdAt desc"); ?> <!-- $this->data->fetch('markAttendance', array('childId' => $membersDetail[0]['id'])); -->
    <div class="modal fade in" id="contactMember<?= $membersDetail[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Edit Details
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/editChildDetail') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Student / Child Name:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Teacher Reported Incident :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="incidentReport" value="<?= $incidentReport[0]['teacherReports'] ?>" id="incidentReport" maxlength="200"><?= $incidentReport[0]['teacherReports'] ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Most Recent Remark :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="mostRecentRemark" id="mostRecentRemark" value="<?= $attendanceRemark[0]['teacherRemark'] ?>" maxlength="500"><?= $attendanceRemark[0]['teacherRemark'] ?></textarea>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" name="incidentId" value="<?= $incidentReport[0]['id'] ?>"/>
                            <input type="hidden" name="attendanceId" value="<?= $attendanceRemark[0]['id'] ?>"/>
                            <!--<input type="hidden" name="generalId" value="<?php print_r($this->session->userdata('userAdmin')[0]['id']);  ?>"/>-->
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="markAttendance<?= $membersDetail[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 style="text-align: center; font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Mark Attendance
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/markAttendance') ?>">
                        <div class="container">
                            <div class="row">
                                Date : <br/>
                    <input type="text" readOnly value="<?= date('d-M-Y') ?>" class="md-input" name="attendanceDate" id="attendanceDate"/>
                    <br/>
                    Dropped By:<br/>
                    <select class="md-input" name="droppedBy" id="droppedBy">
                        <option value="">Select</option>
                        <option value="self">Self</option>
                        <option value="parent">Parent</option>
                        <option value="others">Others</option>
                    </select>
                    <p id="dropeePara" style="display: none;">
                        Dropee Name: <br/>
                        <input type="text" name="dropeeName" class="md-input" id="dropeeName">
                    </p>
                    <br/>
                    Performance:</br>
                    <select class="md-input" name="performance" id="performance">
                        <option value="">Select</option>
                        <?php for($k=5;$k >= 1;$k--){ ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    Behaviour:</br>
                    <select class="md-input" name="behaviour" id="behaviour">
                        <option value="">Select</option>
                        <?php for($p = 5;$p >= 1;$p--){ ?>
                            <option value="<?= $p ?>"><?= $p ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    Teacher Remarks:<br/>
                    <textarea id="teacherRemark" name="teacherRemark" class="md-input"></textarea>
                    <input type="hidden" class="md-input" name="teacherId" id="teacherId" value="<?= $check[0]['id'] ?>"/>
                    <input type="hidden" class="md-input" name="classId" id="classId" value="<?= $val['id'] ?>"/>
                    <input type="hidden" class="md-input" name="childId" id="childId" value="<?= $membersDetail[0]['id'] ?>"/>
                    <button type="submit" class="md-btn md-btn-primary">Mark</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="basicPdf<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 style="text-align: center; font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Generate Monthly Groupwise Pdf for Print
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Select Month: </strong>
                            </div>
                            <div class="col-md-7">
                                <select class="chosen-select md-input" name="genPdfMonthlyPdf" id="genPdfMonthlyPdf">
                                    <!--<option value="">Select Month</option>-->
                                    <?php foreach($months as $key => $mon){ ?>
                                        <option value="<?= $mon ?>"><?= $mon ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button>
                            <a href='"+link+"' id="generatePdfHref"><span class='btn btn-danger'>Generate PDF</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="fullPdf" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 style="text-align: center; font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Generate Monthly Groupwise Pdf for Print
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Select Month: </strong>
                            </div>
                            <div class="col-md-7">
                                <select class="chosen-select md-input" name="genFullMonthlyPdf" id="genFullMonthlyPdf">
                                    <!--<option value="">Select Month</option>-->
                                    <?php foreach($months as $key => $mon){ ?>
                                        <option value="<?= $mon ?>"><?= $mon ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button>
                            <a href='<?= site_url('admin/save_full_pdf_class') ?>' id="generateFullPdfHref"><span class='btn btn-danger'>Generate PDF</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }}} ?>
<script>
    $('#genPdf').on('change', function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var url = '<?= site_url('home/save_pdf_mempacas_month/'.$val['id']) ?>'+'/'+month;
        $.post("<?= site_url('admin/getChildRegisterResult'); ?>", {month: month, groupId: groupId}, function (e) {
            $('#updateMempacas').html(e);
            $('#pdfGen').attr('href', url);
            $('#myTableMempacas').DataTable().order([[ 0, 'desc' ]]).draw(false);
        });
    });
    var $remaining = $('#remaining'),
        $messages = $remaining.next();
    $('#msg').keyup(function(){
        var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
    });
    
    var table = $("#myMempacas").DataTable({
           "paging": false,
           "ordering": false,
           "searching": false
        });
</script>

<!-- memberResponse Modal -->
<?php $members = explode(',', $val['membersId']); ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $members[$i])); ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="modal fade in" id="memberResponse<?= $mempacasGroupMember[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Member Response of <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $mempacasGroupMember[0]['memberResponse'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $members[$i])); ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="modal fade in" id="specialPrayer<?= $mempacasGroupMember[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Special Prayer Request of <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $mempacasGroupMember[0]['specialPrayerRequest'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $members[$i])); ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="modal fade in" id="comment<?= $mempacasGroupMember[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Comment for <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $mempacasGroupMember[0]['comment'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    $('#genPdfMonthlyPdf').on('change', function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var url = '<?= site_url('admin/save_pdf_class_month/'.$val['id']) ?>'+'/'+month;
        // alert(url);
        $('#generatePdfHref').attr('href', url);
    });
    $('#genFullMonthlyPdf').on('change', function(){
        var month = $(this).val();
        var url = '<?= site_url('admin/save_full_pdf_class') ?>'+'/'+month;
        $('#generateFullPdfHref').attr('href', url);
    });
</script>