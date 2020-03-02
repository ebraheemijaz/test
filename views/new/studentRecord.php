<?php $check = $this->session->userdata('userMember'); ?>
<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Student Record</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-10-10">
                <div class="md-card uk-margin-medium-bottom" style="margin-left: -21px; margin-right: -21px;">
                    <div class="md-card-content">
                        <?php $val = $registeredClass[0];  ?>
                        <div class="uk-grid blog_article" data-uk-grid-margin>
                            <div class="uk-width-medium">
                                <div class="md-card">
                                    <div class="md-card-content large-padding">
                                        <div class="uk-article">

                                            <p style="text-align: center">
                                                <a href="<?= site_url('home/view/studentRecord/'.$val['id']) ?>"><span class="menu_icon" style="font-size: 20px;"><strong><?= $val['className'] ?></strong></span></a>
                                            </p>
                                            <br/>
                                            <br/>
                                            <?php if(!empty($msg)){ ?>
                                                <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                                                <br/>
                                                <br/>
                                            <?php } ?>
                                            <div class="uk-grid">
                                                    <div class="uk-width-5-10" style="font-weight: 800">Class Name :</div>
                                                    <div class="uk-width-5-10"><?= $val['className'] ?></div>
                                            </div><br/>
                                            <div class="uk-grid">
                                                <div class="uk-width-5-10"><strong>Date Created : </strong></div>
                                                <div class="uk-width-5-10"><?= date('d-M-Y', strtotime($val['createdAt'])) ?></div>
                                            </div><br/>
                                            <div class="uk-grid">
                                                <div class="uk-width-5-10"><strong>Teacher In Charge : </strong></div>
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
                                            </div>
                                            <?php $childName = $this->data->fetch('children', array('id' => $childId))[0]; ?>
                                            <div class="uk-grid">
                                                    <div class="uk-width-5-10" style="font-weight: 800;">
                                                        Child Name : 
                                                    </div>
                                                    <div class="uk-width-5-10">
                                                        <?= $childName['fname']." ".$childName['lname'] ?>
                                                    </div>
                                            </div>
                                            <div class="uk-grid">
                                                    <div class="uk-width-5-10" style="font-weight: 800;">
                                                        Gender : 
                                                    </div>
                                                    <div class="uk-width-5-10">
                                                        <?= $childName['gender'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid">
                                                <?php $totalClassDays = $this->data->myquery("SELECT count(distinct(date)) as totalClassDays from `markAttendance` WHERE date LIKE '".date('Y-m%')."'"); ?>
                                                    <div class="uk-width-5-10"><strong>Attendance(%) : </strong></div><div class="uk-width-5-10"> <?php $attendance = $this->data->myquery("SELECT count(*) as totalDays FROM `markAttendance` WHERE date LIKE '".date('Y-m%')."' AND childId = ".$childId); if(empty($attendance[0]['totalDays'])){ echo '0%'; }else{ echo round((($attendance[0]['totalDays'] / $totalClassDays[0]['totalClassDays']) * 100))."%";  } ?> </div>
                                                    <div class="uk-width-5-10"><strong>Behaviour : </strong></div><div class="uk-width-5-10"> <?php $attendance1 = $this->data->myquery("SELECT sum(performance) as totalPerformance, count(*) as totalCount FROM `markAttendance` WHERE date LIKE '".date('Y-m%')."' AND childId = ".$childId); if(empty($attendance1[0]['totalPerformance'])){ 
                                                                        echo '0 / 5'; 
                                                                    }else{ 
                                                                        echo round(($attendance1[0]['totalPerformance'] / $totalClassDays[0]['totalClassDays']), 2)." / 5"; 
                                                                    } ?> </div>
                                                    <div class="uk-width-5-10"><strong>Performance : </strong></div><div class="uk-width-5-10"> <?php $attendance1 = $this->data->myquery("SELECT sum(behaviour) as totalPerformance, count(*) as totalCount FROM `markAttendance` WHERE date LIKE '".date('Y-m%')."' AND childId = ".$childId); if(empty($attendance1[0]['totalPerformance'])){ 
                                                                        echo '0 / 5'; 
                                                                    }else{ 
                                                                        echo round(($attendance1[0]['totalPerformance'] / $totalClassDays[0]['totalClassDays']), 2)." / 5"; 
                                                                    } ?> </div>
                                            </div>
                                            <hr class="uk-article-divider">
                                            <p>
                                                <?php
                                                        for ($i = 0; $i < 12; $i++) {
                                                            $months[] = date("F-Y", strtotime( date( 'Y-M-01' )." -$i months"));
                                                        }
                                                    ?>
                                                    <div class="uk-grid">
                                                    <!--<div class="uk-width-3-10">-->
                                                    <!--<select class="chosen-select md-input" name="genPdf" id="genPdf">-->
                                                    <!--    <option value="">Select Month</option>-->
                                                    <!--    <?php foreach($months as $key => $mon){ ?>-->
                                                    <!--        <option value="<?= $mon ?>"><?= $mon ?></option>-->
                                                    <!--    <?php } ?>-->
                                                    <!--</select>-->
                                                    <!--</div>-->
                                                <span class="uk-width-3-10">
                                                    <!--href="<?= site_url('home/save_pdf_mempacas/'.$val['id']) ?>"-->
                                                    <!--<a id="pdfGen" href="#basicPdf<?= $val['id'] ?>" data-uk-modal title="Download PDF"><i class="md-icon material-icons">attach_file</i></a></span>-->
                                                    <!--<div class="uk-width-3-10" style="float: right;">-->
                                                    <!--    <a href="#incidentReport<?= $childId ?>" data-uk-modal class="md-btn md-btn-primary">Mark Incident</a>-->
                                                    <!--</div>-->
                                                </div>
                                                    
                                                <div class="uk-overflow-auto" id="updateMempacas">
                                                    <table id="dt_default" class="uk-table uk-table-divider" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Dropped By</th>
                                                        <th>Time In</th>
                                                        <th>Picked By</th>
                                                        <th>Time Out</th>
                                                        <th>Teacher Remark</th>
                                                        <th>Guardian Remark</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $members = explode(',', $val['studentId']); ?>
                                                    <?php $i=1; if(isset($childId)){  ?>
                                                        <?php $mempacasGroupMember = $this->data->myquery("SELECT * FROM `markAttendance` WHERE date LIKE '".date('Y-m%')."' AND childId = ".$childId); ?>
                                                        <?php foreach($mempacasGroupMember as $mem){ ?>
                                                        <tr>
                                                            <td><?= date('d-M-Y', strtotime($mem['date'])); ?></td>
                                                            <td><?= ucfirst($mem['droppedBy']); ?></td>
                                                            <td><?= date('H:i:s', strtotime($mem['inTime'])); ?></td>
                                                            <td><?= ucfirst($mem['pickedBy']); ?></td>
                                                            <td><?= date('H:i:s', strtotime($mem['outTime'])); ?></td>
                                                            <td><?= $mem['teacherRemark'] ?></td>
                                                            <td><?php if(!empty($mem['guardianRemark'])){ echo $mem['guardianRemark']; }else{ ?><a href="#editComment<?= $mem['id'] ?>" data-uk-modal title="Guardian Remark">Enter Remark</a><?php } ?></td>
                                                        </tr>
                                                        <?php $i++; }}else{ ?>
                                                        <tr>
                                                            <td colspan="11"><center>No Record Found.</center></td>
                                                        </tr>
                                                        <?php } ?>
                                                        
                                                    </tbody>
                                                </table>
                                                <h5>Incident Report</h5>
                                                <table id="dt_default_ir" class="uk-table uk-table-divider" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Child Name</th>
                                                        <th>Teacher Report</th>
                                                        <th>Guardian Comment</th>
                                                        <th>Admin Comment</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $members = explode(',', $val['studentId']); ?>
                                                    <?php $i=1; if(isset($childId)){  ?>
                                                        <?php $mempacasGroupMember = $this->data->fetch('incidentReports', array('childId' => $childId)); ?>
                                                        <?php $memberDetails = $this->data->fetch('children', array('id' => $childId)); ?>
                                                        <?php foreach($mempacasGroupMember as $mem){ ?>
                                                        <tr>
                                                            <td><?= date('d F, Y', strtotime($mem['createdAt'])); ?></td>
                                                            <td><?= ucfirst($memberDetails[0]['fname'])." ".ucfirst($memberDetails[0]['lname']) ?></td>
                                                            <td><?php if(empty($mem['teacherReports'])){ echo 'No Report'; }else{ echo ucfirst($mem['teacherReports']); } ?></td>
                                                            <td><?php if(empty($mem['parentComments'])){ echo 'No guardian Comment'; }else{ echo ucfirst($mem['parentComments']); } ?></td>
                                                            <td><?php if(empty($mem['adminComment'])){ echo 'No admin comment'; }else{ echo ucfirst($mem['adminComment']); } ?></td>
                                                            <td><?= ucfirst($mem['status']) ?></td>
                                                            <td><a href="#markComment<?= $mem['id'] ?>" data-uk-modal title="Guardian Comment">Mark Comment</a></td>
                                                        </tr>
                                                        <?php $i++; }}else{ ?>
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

<?php $mempacasGroupMember = $this->data->fetch('markAttendance', array('childId' => $childId)); ?>
<?php foreach($mempacasGroupMember as $mem){ ?>
    <div class="uk-modal" id="markRemark<?= $mem['id'] ?>">
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
            </div>
        </div>
    </div>
<?php } ?>
<?php $mempacasGroupMember = $this->data->fetch('markAttendance', array('childId' => $childId)); ?>
<?php foreach($mempacasGroupMember as $MGM){ ?>
    <div class="uk-modal" id="editComment<?= $MGM['id'] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Edit Comment For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <form action="<?= site_url('home/markGuardianRemark') ?>" method="post">
                    Guardian Remark: <br/>
                    <textarea class="md-input" maxlength="200" name="guardianRemark" id="guardianRemark" value=""></textarea>
                    <p>
                        <span id="remainingGuardianRemark">200</span> Characters
                    </p>
                    <input type="hidden" class="md-input" name="markAttendanceId" value="<?= $MGM['id'] ?>"/>
                    <button type="submit" class="md-btn md-btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<?php $reportIncident = $this->data->fetch('incidentReports', array('childId' => $childId)); ?>
<?php foreach($reportIncident as $RI){ ?>
<div class="uk-modal" id="markComment<?= $RI['id'] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Report Incident Comment For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <form action="<?= site_url('home/markIncidentComment') ?>" method="post">
                    Guadian Comment: <br/>
                    <textarea class="md-input" maxlength="200" name="guardianComment" id="guadianComment" value=""></textarea>
                    <p>
                        <span id="remainingGuardianComment">200</span> Characters
                    </p>
                    <input type="hidden" class="md-input" name="incidentReportId" value="<?= $RI['id'] ?>"/>
                    <button type="submit" class="md-btn md-btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<div class="uk-modal" id="incidentReport<?= $childId ?>">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h4>Report Incident</h4>
        <div class="uk-form-row">
            
        </div>
    </div>
</div>

<?php for($i = 0; $i < count($members); $i++){ ?>
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
            <h4>Generate Monthly Groupwise Pdf for Print</h4>
            <div class="uk-form-row">
                Select Month: <br/>
                <select class="chosen-select md-input" name="genPdf" id="genPdfMonthlyPdf">
                    <option value="">Select Month</option>
                    <?php foreach($months as $mon){ ?>
                        <option value="<?= $mon ?>"><?= $mon ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="uk-modal-footer">
            <button class="md-btn md-btn-primary uk-modal-close">No</button>
            <a href="<?= site_url('home/save_pdf_mempacas/'.$val['id']) ?>" id="generatePdfHref" class="md-btn md-btn-danger">Yes</a>
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
    <div class="uk-modal" id="markIncident<?= $mempacasGroupMember[0]['id'] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Edit Comment For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <form action="<?= site_url('home/editMempacasComment') ?>" method="post">
                    Select Month: <br/>
                    <select class="chosen-select md-input" name="genPdf" id="genPdfEdit">
                                        <option value="">Select Month</option>
                                        <?php foreach($months as $key => $mon){ ?>
                                            <option value="<?= $mon ?>"><?= $mon ?></option>
                                        <?php } ?>
                                    </select>
                    Members Response: <br/>
                    <textarea class="md-input" maxlength="300" name="memberResponse" id="memberResponseEdit" value="<?= $mempacasGroupMember[0]['memberResponse'] ?>"><?= $mempacasGroupMember[0]['memberResponse'] ?></textarea>
                    <p>
                        <span id="remainingMemRespEdit">200</span> Characters
                    </p>
                    Special Prayers: <br/>
                    <textarea class="md-input" maxlength="300" name="specialPrayerRequest" id="specialPrayerRequestEdit" value="<?= $mempacasGroupMember[0]['specialPrayerRequest'] ?>"><?= $mempacasGroupMember[0]['specialPrayerRequest'] ?></textarea>
                    <p>
                        <span id="remainingSpecialEdit">200</span> Characters
                    </p>
                    Comment: <br/>
                    <textarea class="md-input" maxlength="300" name="comment" id="commentEdit" value="<?= $mempacasGroupMember[0]['comment'] ?>"><?= $mempacasGroupMember[0]['comment'] ?></textarea>
                    <p>
                        <span id="remainingCommentEdit">200</span> Characters
                    </p>
                    <input type="hidden" class="md-input" name="mempacasId" value="<?= $mempacasGroupMember[0]['id'] ?>"/>
                    <input type="hidden" class="md-input" id="memberIdEdit" name="memberId" value="<?= $mempacasGroupMember[0]['memberId'] ?>"/>
                    <input type="hidden" class="md-input" name="generalId" value="<?= $mempacasGroupMember[0]['generalId'] ?>"/>
                    <input type="hidden" class="md-input" name="groupId" value="<?= $val['id'] ?>"/>
                    <button type="submit" class="md-btn md-btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="uk-modal" id="sendEmail<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Send Email To <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <form method="post" action="<?= site_url('home/sendMempacasEmail') ?>">
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1 uk-grid">
                        <label class="uk-width-1-2">Member Name : </label>
                        <div class="uk-width-1-2"><?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></div>
                    </div>
                </div>
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1">
                        <label>Email Message : </label><br/>
                        <p>"<strong>Shalom</strong> <?= $membersDetail[0]['fname'] ?>",</p>
                        <textarea id="msgEmail" name="msg" cols="30" rows="4" class="md-input" maxlength="200"></textarea>
                    </div>
                </div>
                <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/><br/><br/>
                <div class="uk-form-row">
                    <input type="submit" id="submit" class="md-btn md-btn-success"  value="Send Email"/>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="uk-modal" id="sendSMS<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Send SMS To <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <form method="post" action="<?= site_url('home/sendMempacasSMS') ?>">
                <div class="uk-form-row">
                    <div class="uk-width-medium-1-1 uk-grid">
                        <label class="uk-width-1-2">Member Name : </label>
                        <div class="uk-width-1-2"><?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></div>
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
                <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
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
    var $remainingGuardianRemark = $('#remainingGuardianRemark'),
        $messagesGuardianRemark = $remainingGuardianRemark.next();
        $('#guardianRemark').keyup(function() {
            var charsGuardianRemark = this.value.length,
                messagesGuardianRemark = Math.ceil(charsGuardianRemark / 200),
                remainingGuardianRemark = messagesGuardianRemark * 200 - (charsGuardianRemark % (messagesGuardianRemark * 200) || messagesGuardianRemark * 200);
            
            $remainingGuardianRemark.text(remainingGuardianRemark);
            
        });
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
    
    var $remainingGuardianComment = $('#remainingGuardianComment');
    $('#guardianComment').keyup(function() {
        var charsGuardian = this.value.length;
        messageGuardian = Math.ceil(charsGuardian / 200);
        remainingGuardianComment = messageGuardian * 200 - (charsGuardian % (messageGuardian * 200) || messageGuardian * 200);
        $remainingGuardianComment.text(remainingGuardianComment);
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
        var url = '<?= site_url('home/save_pdf_mempacas_month/'.$val['id']) ?>'+'/'+month;
        $.post("<?= site_url('home/getMempacasResult'); ?>", {month: month, groupId: groupId}, function (e) {
            $('#updateMempacas').html(e);
            $('#pdfGen').attr('href', url);
            $('#dt_default').DataTable({aaSorting: [[0, "desc"]]}).Draw();
        });
    });
    $('#genPdfEdit').on('change',function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var memberId = $('#memberIdEdit').val();
        $.post('<?= site_url('home/getMonthlyEditComment/'); ?>', {month: month, groupId: groupId, memberId: memberId}, function(e) {
            console.log(e);
            var parsedJson = $.parseJSON(e);
            console.log(parsedJson);
            if(parsedJson.length != 0){
                $('#memberResponseEdit').val(parsedJson[0]['memberResponse']);
                $('#specialPrayerRequestEdit').val(parsedJson[0]['specialPrayerRequest']);
                $('#commentEdit').val(parsedJson[0]['comment']);
                
            }else{
                $('#memberResponseEdit').val('');
                $('#specialPrayerRequestEdit').val('');
                $('#commentEdit').val('');
            }
        });
    });
    $('#genPdfMonthlyPdf').on('change', function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var url = '<?= site_url('admin/save_pdf_mempacas_month/'.$val['id']) ?>'+'/'+month;
        // alert(url);
        $('#generatePdfHref').attr('href', url);
    });
    $(document).ready(function(){
       $('#dt_default_ir').DataTable().draw(); 
    });
</script>