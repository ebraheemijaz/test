<link rel="stylesheet" href="<?= base_url('assets_f') ?>/chosen/chosen.css">
<style>
    .chosen-choices{
        padding: 10px !important;
        border-radius: 5px;
    }
    .chosen-container{
        width: 100% !important;
    }
    .search-field input{
        width: 100%!important;
    }
</style>
<?php $check = $this->session->userdata('userMember'); ?>
<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">View Registered Class</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-10-10" style="margin-left: -5%!important;">
                <div class="md-card uk-margin-medium-bottom" style="margin-right: -11%!important;">
                    <div class="md-card-content">
                        <?php $val = $registeredClass[0];  ?>
                        <?php $ageGroup = $this->data->fetch('ageGroup', array('id' => $val['ageGroup'])); ?>
                        <div class="uk-grid blog_article" data-uk-grid-margin>
                            <div class="uk-width-medium">
                                <div class="md-card">
                                    <div class="md-card-content large-padding">
                                        <div class="uk-article">

                                            <p style="text-align: center">
                                                <a style="float: left" <?php if($val['prev'] > 0){ ?> href="<?= site_url('home/view/viewRegisterClass/'.$val['prev']) ?>" <?php }else{ ?>onclick="alert('No Previous Class Present.');"<?php } ?>><span class="menu_icon"><i  style="font-size:40px" class="material-icons">fast_rewind</i></span></a>
                                                <a href="<?= site_url('home/view/viewRegisterClass/'.$val['id']) ?>"><span class="menu_icon" style="font-size: 20px;"><strong><?= $val['className'] ?> ( <?= $ageGroup[0]['ageGroup'] ?> )</strong></span></a>
                                                <a style="float:right" <?php if($val['next'] > 0){ ?> href="<?= site_url('home/view/viewRegisterClass/'.$val['next']) ?>" <?php }else { ?>onclick="alert('No Next Class Present.');"<?php } ?>><span class="menu_icon"><i style="font-size:40px"  class="material-icons">fast_forward</i></span></a>
                                            </p>
                                            <br/>
                                            <br/>
                                            <?php if(!empty($msg)){ ?>
                                                <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                                                <br/>
                                                <br/>
                                            <?php } ?>
                                            <div class="uk-grid">
                                                    <div class="uk-width-5-10"><strong>Class Name : </strong></div>
                                                    <div class="uk-width-5-10"><?= $val['className'] ?></div>
                                            </div><br/>
                                            <div class="uk-grid">
                                                <div class="uk-width-5-10"><strong>Date Created : </strong></div>
                                                <div class="uk-width-5-10"><?= date('d-M-Y', strtotime($val['createdAt'])) ?></div>
                                            </div><br/>
                                            <div class="uk-grid">
                                                <div class="uk-width-5-10"><strong>Teacher-In-Charge(s) : </strong></div><br/><br/>
                                                <div class="uk-width-5-10">
                                                    <?php 
                                                        $generalInCharges = explode(',', $val['teacherName']);
                                                        foreach($generalInCharges as $GIC) {
                                                        ?>
                                                        <div class="uk-grid"><div class="uk-width-10-10"><?= $GIC; ?></div></div><br/>
                                                        <?php
                                                        }
                                                    ?>
                                                </div>
                                                <div class="uk-width-10-10">
                                                    <a  style="float: right;"  href="#addMember<?= $val['id'] ?>" data-uk-modal title="edit" class="uk-button uk-button-success">Add Child</a>  
                                                </div>
                                            </div>
                                            <hr class="uk-article-divider">
                                            <p>
                                                <?php
                                                        for ($i = 0; $i < 12; $i++) {
                                                            $months[] = date("F-Y", strtotime( date( 'Y-M-01' )." -$i months"));
                                                        }
                                                    ?>
                                                    <div class="uk-grid">
                                                    <div class="uk-width-5-10">
                                                    <select class="md-input" name="genPdf" id="genPdf">
                                                        <!--<option value="">Select Month</option>-->
                                                        <?php foreach($months as $key => $mon){ ?>
                                                            <option value="<?= $mon ?>"><?= $mon ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                                <span class="uk-width-5-10">
                                                    <!--href="<?= site_url('home/save_pdf_mempacas/'.$val['id']) ?>"-->
                                                    <a id="pdfGen" href="#basicPdf<?= $val['id'] ?>" data-uk-modal title="Download PDF"><i class="md-icon material-icons">attach_file</i></a></span></div>
                                                <div class="uk-overflow-auto" id="updateMempacas">
                                                    <table id="dt_default"  data-page-length='100' class="uk-table uk-table-divider" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>S/No</th>
                                                        <th>Children Name</th>
                                                        <th>Gender</th>
                                                        <th>Attendance %</th>
                                                        <th>Behaviour %</th>
                                                        <th>Performance %</th>
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
                                                    <?php $i=1; if(isset($val['studentId'])){ foreach($members as $val1){ if($val1 != ''){?>
                                                        <?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $val1)); ?>
                                                        <?php $membersDetail = $this->data->fetch('children', array('id' => $val1)); if(count($membersDetail)){ ?>
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
                                                            <td><?php $attendanceRemark = $this->data->myquery('SELECT * FROM `markAttendance` WHERE childId = '.$membersDetail[0]['id'].' ORDER BY createdAt desc'); if(empty($attendanceRemark) || $attendanceRemark[0]['teacherRemark'] == ''){ 
                                                                        echo 'Not Remark Yet.'; 
                                                                    }else{ 
                                                                        echo ucfirst($attendanceRemark[0]['teacherRemark']); 
                                                                    } ?></td>
                                                            <td><?php $parentName = $this->data->fetch('member', array('id' => $membersDetail[0]['parent_id']))[0]; ?><?= $parentName['fname']." ".$parentName['lname'] ?></td>
                                                            <td><?= $parentName['mobileNo'] ?></td>
                                                            <td>
                                                            <!--<a href="#markAttendance<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Mark Attendance"><i class="material-icons">check_circle_outline</i></a>-->
                                                            <a <?php if(!empty($incidentReport)){ ?> href="#editComment<?= $membersDetail[0]['id'] ?>" <?php }else{ ?>onclick="alert('Please report incident to edit the content.');"<?php } ?> data-uk-modal title="edit"><i class="material-icons">edit</i></a>
                                                            | <a href="#sendSMS<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Send SMS"><i class="material-icons">inbox</i></a> 
                                                            | <a href="#sendEmail<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Send Email"><i class="material-icons">mail</i></a>
                                                            <!--| <a onclick="deleteC('<?= site_url('home/deleteMemberMempacasGroup/mempacasGroupMember/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')" title="Clear Information"><i class="material-icons">perm_device_information</i></a></td>-->
                                                            </td>
                                                        </tr>
                                                        <?php $i++; }}}}else{ ?>
                                                        <tr>
                                                            <td colspan="11"><center>No Record Found.</center></td>
                                                        </tr>
                                                        <?php } ?>
                                                        
                                                    </tbody>
                                                </table>
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
            <?php require_once('advert_h.php'); ?>
        </div>
    </div>
</div>
<div class="conf"></div>
<script>
    function basicDownload(link){
        var a = '<div id="confirmBasicDownload" class="uk-modal">'+
                '<div class="uk-modal-dialog">'+
                '<div class="uk-modal-header">'+
                '<h3>Are you sure you want to Download the full data of group?</h3>'+
                '</div>'+
                '<div class="uk-modal-footer">'+
                '<button class="md-btn md-btn-primary uk-modal-close">No</button>'+
                '<a href="'+link+'" class="md-btn md-btn-danger">Yes</a>'+
                '</div>'+
                '</div>'+
                '</div>';
        $(".conf").html(a);
        var modal = UIkit.modal("#confirmBasicDownload").show();
    }
    
    function deleteC(srcc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Do you want to delete?</h1>' +
            '</div>' +
            '<div class="uk-modal-footer">' +
            '<button class="md-btn md-btn-primary uk-modal-close">No</button>' +
            '<a href="'+srcc+'" class="md-btn md-btn-danger">Yes</a>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(".conf").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }
</script>
<?php foreach($mempacasGroup as $val5){ ?>
<?php $membersDetail = $this->data->fetch('member'); ?>
    <div class="uk-modal" id="assignGeneral<?= $val5['id'] ?>">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Add More General In Charge
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/addNewGeneral') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="hidden" name="generalInChargeIdOld" value="<?= $val5['generalInChargeId'] ?>"/>
                                    <input type="text" name="generalInChargeName" value="<?= $val5['generalInCharge'] ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>General In Charge:</strong>
                                </div>
                                <div class="col-md-7">
                                    <select name="generalInChangeId[]" class="chosen-select" multiple>
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
                            <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Add New General</button>
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
<?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $members[$i])); ?>
<?php $membersDetail = $this->data->fetch('children', array('id' => $members[$i])); ?>
    <div class="uk-modal" id="memberResponse<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Member Response of <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <p><?= $mempacasGroupMember[0]['memberResponse'] ?></p>
            </div>
        </div>
    </div>
    <div class="uk-modal" id="specialPrayer<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Special Prayer Request of <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <p><?= $mempacasGroupMember[0]['specialPrayerRequest'] ?></p>
            </div>
        </div>
    </div>
    <div class="uk-modal" id="comment<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Comment for <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <p><?= $mempacasGroupMember[0]['comment'] ?></p>
            </div>
        </div>
    </div>
    <div class="uk-modal" id="basicPdf<?= $val['id'] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Generate Monthly Class wise Pdf for Print</h4>
            <div class="uk-form-row">
                Select Month: <br/>
                <select class="md-input" name="genPdf" id="genPdfMonthlyPdf">
                    <!--<option value="">Select Month</option>-->
                    <?php foreach($months as $mon){ ?>
                        <option value="<?= $mon ?>"><?= $mon ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="uk-modal-footer">
            <button class="md-btn md-btn-primary uk-modal-close">No</button>
            <a href="<?= site_url('home/save_pdf_class/'.$val['id']) ?>" id="generatePdfHref" class="md-btn md-btn-danger">Yes</a>
            </div>
        </div>
    </div>
    <div class="uk-modal" id="markAttendance<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Mark Attendance For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <form action="<?= site_url('home/markAttendance') ?>" method="post">
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
                </form>
            </div>
        </div>
    </div>
    <?php foreach($registeredClass as $val6){ ?>
    <?php $membersDetail = $this->data->myquery("SELECT * FROM `children` WHERE NULLIF(fname, '') IS NOT NULL AND NULLIF(lname, '') IS NOT NULL AND classId IS NULL AND isAlotted = 0"); ?>
        <div class="uk-modal" id="addMember<?= $val6['id'] ?>">
            <div class="uk-modal-dialog">
                <a href="" class="uk-modal-close uk-close"></a>
                <?php $student = explode(',', $val6['studentId']); ?>
                <h4>Add More Children</h4>
                <div class="uk-form-row">
                    <form action="<?= site_url('admin/addNewChild') ?>" method="post">
                        <strong>More Children:</strong><br/><br/>
                        <select name="members[]" class="chosen-select" multiple>
                                        <?php
                                            foreach($membersDetail as $mem){
                                            ?>
                                            <option value="<?= $mem['id'] ?>"><?= $mem['fname'] ?> <?= $mem['lname'] ?>(<?= $mem['relation'] ?>)</option>
                                            <?php
                                            }
                                        ?>
                                        </select><br/><br/>
                        
                        <input type="hidden" name="membersIdOld" value="<?= $val6['studentId'] ?>"/>
                        <input type="hidden" name="membersNameOld" value="<?= $val6['studentName'] ?>"/>
                        <input type="hidden" name="studentCount" value="<?= count($student); ?>" />
                        <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                        <button type="submit" class="md-btn md-btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade in" id="addMember1<?= $val6['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
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
    <?php $membersDetail = $this->data->fetch('children', array('id' => $members[$i])); ?>
    <?php $incidentReport = $this->data->myquery('SELECT * FROM `incidentReports` WHERE `childId` = '.$members[$i].' ORDER BY createdAt desc'); ?>
    <?php $attendanceRemark = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `childId` = $members[$i] ORDER BY createdAt desc"); ?> <!-- $this->data->fetch('markAttendance', array('childId' => $membersDetail[0]['id'])); -->
    <div class="uk-modal" id="editComment<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Edit Comment For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <form action="<?= site_url('home/editChildDetail') ?>" method="post">
                    Select Month: <br/>
                    <select class="chosen-select md-input" name="genPdf" id="genPdfEdit">
                                        <!--<option value="">Select Month</option>-->
                                        <?php foreach($months as $key => $mon){ ?>
                                            <option value="<?= $mon ?>"><?= $mon ?></option>
                                        <?php } ?>
                                    </select>
                    <strong>Most Reported Incident :</strong> <br/>
                    <textarea name="incidentReport" class="md-input" value="<?= $incidentReport[0]['anyRecentIncident'] ?>" id="incidentReport" maxlength="200"><?= $incidentReport[0]['anyRecentIncident'] ?></textarea>
                    <p>
                        <span id="remainingMemRespEdit">200</span> Characters
                    </p>
                    <strong>Most Recent Remark :</strong> <br/>
                    <textarea name="mostRecentRemark" class="md-input" id="mostRecentRemark" value="<?= $attendanceRemark[0]['teacherRemark'] ?>" maxlength="500"><?= $attendanceRemark[0]['teacherRemark'] ?></textarea>
                    <p>
                        <span id="remainingSpecialEdit">200</span> Characters
                    </p>
                    
                    <input type="hidden" name="memberId" class="childIdEdit" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" name="incidentId" value="<?= $incidentReport[0]['id'] ?>"/>
                            <input type="hidden" name="attendanceId" value="<?= $attendanceRemark[0]['id'] ?>"/>
                    <button type="submit" class="md-btn md-btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
<?php }}} ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('children', array('id' => $members[$i])); ?>
<?php $parentDetail = $this->data->fetch('member', array('id' => $membersDetail[0]['parent_id'])); ?>
    <div class="uk-modal" id="sendEmail<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Send Email To <?= $parentDetail[0]['fname']." ".$parentDetail[0]['lname'] ?></h4>
            <form method="post" action="<?= site_url('home/sendChildRegisterEmail') ?>">
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1 uk-grid">
                        <label class="uk-width-1-2">Member Name : </label>
                        <div class="uk-width-1-2"><?= $parentDetail[0]['fname']." ".$parentDetail[0]['lname'] ?></div>
                    </div>
                </div>
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1">
                        <label>Email Message : </label><br/>
                        <p>"<strong>Shalom</strong> <?= $parentDetail[0]['fname'] ?>",</p>
                        <textarea id="msgEmail" name="msg" cols="30" rows="4" class="md-input" maxlength="200"></textarea>
                    </div>
                </div>
                <input type="hidden" name="memberId" value="<?= $parentDetail[0]['id'] ?>"/>
                <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/><br/><br/>
                <div class="uk-form-row">
                    <input type="submit" id="submit" class="md-btn md-btn-success"  value="Send Email"/>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('children', array('id' => $members[$i])); ?>
<?php $parentDetail = $this->data->fetch('member', array('id' => $membersDetail[0]['parent_id'])); ?>
    <div class="uk-modal" id="sendSMS<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Send SMS To <?= $parentDetail[0]['fname']." ".$parentDetail[0]['lname'] ?></h4>
            <form method="post" action="<?= site_url('home/sendChildRegisterSMS') ?>">
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1 uk-grid">
                        <label class="uk-width-1-2">Member Name : </label>
                        <div class="uk-width-1-2"><?= $parentDetail[0]['fname']." ".$parentDetail[0]['lname'] ?></div>
                    </div>
                </div>
                <!--<div class="uk-form-row">-->
                <!--    <div class="uk-width-medium-1-1 uk-grid">-->
                <!--        <label class="uk-width-1-2">Member Number : </label>-->
                <!--        <div class="uk-width-1-2"><?= $membersDetail[0]['mobileNo'] ?></div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1">
                        <label>SMS Message : </label><br/>
                        <textarea id="msg" name="msg" class="md-input" cols="30" rows="4" maxlength="200"></textarea>
                        <p>
                                        <span id="remaining">160 characters remaining</span>
                                        <span id="messages">1 message(s)</span>
                                    </p>
                    </div>
                </div>
                <input type="hidden" name="memberId" value="<?= $parentDetail[0]['id'] ?>"/>
                <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                <br/>
                <br/>
                <div class="uk-form-row">
                    <input type="submit" id="submit" class="md-btn md-btn-success"  value="Send SMS"/>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="uk-modal" id="assignGroup<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Reassign Group</h4>
            <form method="post" action="<?= site_url('home/reassignGroup') ?>">
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1 uk-grid">
                        <label class="uk-width-1-2">Member Name : </label>
                        <div class="uk-width-1-2"><?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></div>
                    </div>
                </div>
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1 uk-grid">
                        <label class="uk-width-1-2">Member Group Name : </label>
                        <div class="uk-width-1-2"><?= $val['groupName'] ?></div>
                    </div>
                </div>
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1">
                        <label>Group Name : </label><br/>
                        <select class="md-input chosen-select">
                            <?php $mempacasGroup = $this->data->fetch('mempacasGroup'); ?>
                            <option value="">Select Group</option>
                            <?php foreach($mempacasGroup as $group){ ?>
                                <option value="<?= $group['id'] ?>"><?= $group['groupName'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                <br/>
                <br/>
                <div class="uk-form-row">
                    <input type="submit" id="submit" class="md-btn md-btn-success"  value="Reassign Group"/>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="uk-modal" id="contactMember<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Contact Member</h4>
            <form method="post" action="<?= site_url('home/insertContactMembers') ?>">
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1 uk-grid">
                        <label class="uk-width-1-2">Member Name : </label>
                        <div class="uk-width-1-2"><?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></div>
                    </div>
                </div>
                <!--<div class="uk-form-row">-->
                <!--    <div class="uk-width-medium-1-1 uk-grid">-->
                <!--        <label class="uk-width-1-2">Member Mobile Number:</label>-->
                <!--        <div class="uk-width-1-2"><?= $membersDetail[0]['mobileNo'] ?></div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1">
                        <label>Members Response : </label><br/>
                        <textarea cols="30" maxlength="200" rows="4" placeholder="Members Response" required="required" maxlength="200" name="memberResponse" id="memberResponse" class="md-input"></textarea>
                        <p>
                            <span id="remainingMemResp">200</span> Characters
                        </p>
                    </div>
                </div>
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1">
                        <label>Special Prayer : </label><br/>
                        <textarea cols="30" maxlength="200" rows="4" placeholder="Special Prayer" maxlength="200" name="specialPrayerRequest" id="specialPrayerRequest" class="md-input"></textarea>
                        <p>
                            <span id="remainingSpecial">200</span> Characters
                        </p>
                    </div>
                </div>
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1">
                        <label>Comment: </label><br/>
                        <textarea cols="30" maxlength="300" rows="4" placeholder="Comment" name="comment" id="commentResp" class="md-input"></textarea>
                        <p>
                            <span id="remainingComment">300</span> Characters
                        </p>
                    </div>
                </div>
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1">
                        <label>Senior Pastor Follow Up: </label><br/>
                        <div class="uk-grid">
                            <div class="uk-width-1-2"><input type="radio" name="seniorPastorToFollowUp" value="yes" class="md-input"/> Yes</div>
                            <div class="uk-width-1-2">
                            <input type="radio" name="seniorPastorToFollowUp" value="no" class="md-input"/> No
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                <input type="hidden" name="generalId" value="<?= $check[0]['id'] ?>"/>
                <br/>
                <div class="uk-form-row">
                    <input type="submit" id="submit" class="md-btn md-btn-success"  value="Save"/>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
<script>
    <?php if(isset($_GET['received'])){ ?>
    setTimeout(function(){
        UIkit.notify({
            message : 'Mempacas Member Detail cleared Successfully.',
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });
    },1000);
    <?php } ?>
</script>
<script>
    var $remaining = $('#remaining'),
        $messages = $remaining.next();
    $('#msg').keyup(function(){
        // alert('hello');
        var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
    });
    
    var $remainingMemResp = $('#remainingMemResp');
    $('#memberResponse').keyup(function() {
        var chars = this.value.length,
        messages = Math.ceil(chars / 200),
        remaining  = messages * 200 - (chars % (messages * 200) || messages * 200);
        $remainingMemResp.text(remaining );
    });
    
    var $remainingMemRespEdit = $('#remainingMemRespEdit');
    $('#memberResponseEdit').keyup(function() {
        var charsEdit = this.value.length,
        messagesMemEdit = Math.ceil(charsEdit / 200);
        remainingMemRespEdit = messagesMemEdit * 200 - (charsEdit % (messagesMemEdit * 200) || messagesMemEdit * 200);
        $remainingMemRespEdit.text(remainingMemRespEdit);
    });
    
    var $remainingSpecial = $('#remainingSpecial');
    $('#specialPrayerRequest').keyup(function(){
        var charsSpecial = this.value.length,
        messageSpecial = Math.ceil(charsSpecial/200),
        remainingSpecial = messageSpecial * 200 - (charsSpecial % (messageSpecial * 200) || messageSpecial * 200);
        $remainingSpecial.text(remainingSpecial);
    });
    
    var $remainingSpecialEdit = $('#remainingSpecialEdit');
    $('#specialPrayerRequestEdit').keyup(function(){
        charsSpecialEdit = this.value.length,
        messageSpecialEdit = Math.ceil(charsSpecialEdit/200),
        remainingSpecialEdit = messageSpecialEdit * 200 - (charsSpecialEdit % (messageSpecialEdit * 200) || messageSpecialEdit * 200);
        $remainingSpecialEdit.text(remainingSpecialEdit);
    });
    
    var $remainingComment = $('#remainingComment');
    $('#commentEdit').keyup(function(){
        var charsCommentEdit = this.value.length;
        messageCommentEdit = Math.ceil(charsCommentEdit / 300);
        remainingCommentEdit = messageCommentEdit * 300 - (charsCommentEdit % (messageCommentEdit * 300) || messageCommentEdit * 300);
        $remainingCommentEdit.text(remainingCommentEdit);
    });
    
    var $remainingCommentEdit = $('#remainingCommentEdit');
    $('#commentResp').keyup(function(){
        var charsComment = this.value.length;
        messageComment = Math.ceil(charsComment / 300);
        remainingComment = messageComment * 300 - (charsComment % (messageComment * 300) || messageComment * 300);
        $remainingComment.text(remainingComment);
    });
    
    $('#droppedBy').on('change', function(){
        var droppedBy = $(this).val();
        if(droppedBy == 'others') {
            $('#dropeePara').css('display', 'block');
        }else{
            $('#dropeePara').css('display', 'none');
        }
    });
    
    $('#genPdf').on('change', function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var url = '<?= site_url('home/save_pdf_class_month/'.$val['id']) ?>'+'/'+month;
        $.post("<?= site_url('home/getChildResult'); ?>", {month: month, groupId: groupId}, function (e) {
            console.log(e);
            $('#updateMempacas').html(e);
            $('#pdfGen').attr('href', url);
            $('#dt_default').DataTable({aaSorting: [[0, "asc"]]}).Draw();
        });
    });
    $('#genPdfEdit').on('change',function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var memberId = $(this).parent().parent().find('.childIdEdit').val();
        $.post('<?= site_url('home/getMonthlyChildEditComment/'); ?>', {month: month, groupId: groupId, memberId: memberId}, function(e) {
            console.log(e);
            var parsedJson = $.parseJSON(e);
            console.log(parsedJson);
            if(parsedJson.length != 0){
                $('#incidentReport').val(parsedJson['incidentReport'][0]['anyRecentIncident']);
                $('#mostRecentRemark').val(parsedJson['mostRecentRemark'][0]['teacherRemark']);
                // $('#commentEdit').val(parsedJson[0]['comment']);
                
            }else{
                $('#incidentReport').val('');
                $('#mostRecentRemark').val('');
                // $('#commentEdit').val('');
            }
        });
    });
    $('#genPdfMonthlyPdf').on('change', function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var url = '<?= site_url('admin/save_pdf_class_month/'.$val['id']) ?>'+'/'+month;
        // alert(url);
        $('#generatePdfHref').attr('href', url);
    });
</script>
<script src="<?= base_url('assets_f') ?>/chosen/chosen.jquery.min.js" type="text/javascript"></script>
<!--<script src="<?= base_url('assets_f') ?>/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>-->
<script>
    var config = {
        // '.chosen-select'           : {placeholder:"Select Member"},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"75%"}
    }
    if ($('.chosen-container').length > 0) {
      $('.chosen-container').on('touchstart', function(e){
        e.stopPropagation(); e.preventDefault();
        // Trigger the mousedown event.
        $(this).trigger('mousedown');
      });
    }
    $(".chosen-select").chosen({
        placeholder_text_multiple: 'Enter First or Last Name of Child.',
    });
    $(document).ready(function() {
        $('.chosen-results').hide();
    });
    
    $("input:text").on("keyup", function(){
      var val=$(this).val();
      if(val == ""){
          $('.chosen-results').hide();
      }else{
          $('.chosen-results').show();
      }
    //   $("li:contains('"+val+"'))").css('background-color','#ccc');
    });
</script>