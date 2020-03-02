<?php $check = $this->session->userdata('userMember'); ?>
<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Mark Attendance</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-10-10" style="margin-left: -5%!important;">
                <div class="md-card uk-margin-medium-bottom" style="margin-right: -11%!important;">
                    <div class="md-card-content">
                        <?php $val = $registeredClass[0]; ?>
                        <?php $ageGroup = $this->data->fetch('ageGroup', array('id' => $val['ageGroup'])); ?>
                        <div class="uk-grid blog_article" data-uk-grid-margin>
                            <div class="uk-width-medium">
                                <div class="md-card">
                                    <div class="md-card-content large-padding">
                                        <div class="uk-article">

                                            <p style="text-align: center">
                                                <a style="float: left" <?php if($val['prev'] > 0){ ?> href="<?= site_url('home/view/markAttendance/'.$val['prev']) ?>" <?php }else{ ?>onclick="alert('No Previous Class Present.');"<?php } ?>><span class="menu_icon"><i  style="font-size:40px" class="material-icons">fast_rewind</i></span></a>
                                                <a href="<?= site_url('home/view/viewRegisterClass/'.$val['id']) ?>"><span class="menu_icon" style="font-size: 20px;"><strong><?= $val['className'] ?> ( <?= $ageGroup[0]['ageGroup'] ?> )</strong></span></a>
                                                <a style="float:right" <?php if($val['next'] > 0){ ?> href="<?= site_url('home/view/markAttendance/'.$val['next']) ?>" <?php }else { ?>onclick="alert('No Next Class Present.');"<?php } ?>><span class="menu_icon"><i style="font-size:40px"  class="material-icons">fast_forward</i></span></a>
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
                                                <div class="uk-width-3-10">
                                                    <!--<a onclick="deleteConff('<?= site_url('admin/deleteMempacasGroup/mempacasGroup/'.$val['id']."/same") ?>')" class="uk-button uk-button-danger">Delete Group</a>  -->
                                                    <!--<button data-target="#assignGeneral<?= $val['id'] ?>" data-toggle="modal" href="#" class="uk-button uk-button-primary">Add More</button>-->
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
                                                    <div class="uk-width-3-10">
                                                    <!--<select class="chosen-select md-input" name="genPdf" id="genPdf">-->
                                                    <!--    <option value="">Select Month</option>-->
                                                    <!--    <?php foreach($months as $key => $mon){ ?>-->
                                                    <!--        <option value="<?= $mon ?>"><?= $mon ?></option>-->
                                                    <!--    <?php } ?>-->
                                                    <!--</select>-->
                                                    </div>
                                                <span class="uk-width-3-10">
                                                    <!--href="<?= site_url('home/save_pdf_mempacas/'.$val['id']) ?>"-->
                                                    <a id="pdfGen" href="#basicPdf<?= $val['id'] ?>" data-uk-modal title="Download PDF"><i class="md-icon material-icons">attach_file</i></a></span></div>
                                                <div class="uk-overflow-auto" id="updateMempacas">
                                                    <table id="dt_default" data-page-length='100' class="uk-table uk-table-divider" cellspacing="0" width="100%">
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
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $totalClassDays = $this->data->myquery("SELECT count(distinct(date)) as totalClassDays from `markAttendance` WHERE date LIKE '".date('Y-m%')."'"); ?>
                                                        <?php $members = explode(',', $val['studentId']); ?>
                                                    <?php $i=1; if($val['studentId'] != ''){ foreach($members as $val1){ if($val1 != ''){ ?>
                                                        <?php $membersDetail = $this->data->fetch('children', array('id' => $val1)); if(count($membersDetail)){ ?>
                                                        <?php $attendanceDetail = $this->data->myquery("SELECT * FROM markAttendance WHERE childId = ".$val1." and date LIKE '".date('Y-m-d')."' order by date desc"); ?>
                                                        <tr>
                                                            <td><?php if(!empty($attendanceDetail[0]['date'])){ echo date('d-M-Y', strtotime($attendanceDetail[0]['date'])); }else{ echo date('d-M-Y'); } ?></td>
                                                            <td><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td style="text-align: center;"><?php if(!empty($attendanceDetail[0]['droppedBy'])){ echo ucfirst($attendanceDetail[0]['droppedBy']); }else{ echo 'Absent'; } ?></td>
                                                            <!--<td><?php if(!empty($attendanceDetail[0]['inTime'])){ echo date('H:i:s', strtotime($attendanceDetail[0]['inTime'])); }else{ echo '00:00:00'; } ?></td>-->
                                                            <td><?php if(!empty($attendanceDetail[0]['inTime'])){ ?><i style="<?php if(!isset($attendanceDetail[0]['inTime'])){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">check_circle_outline</i><small><?php echo date('H:i:s', strtotime($attendanceDetail[0]['inTime'])); ?></small><?php }else{ ?><a href="#markAttendance<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Mark Attendance"><i style="<?php if(!isset($attendanceDetail[0]['inTime'])){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">check_circle_outline</i></a><?php } ?></td>
                                                            <td style="text-align: center;"><?php if(!empty($attendanceDetail[0]['pickedBy'])){ echo ucfirst($attendanceDetail[0]['pickedBy']); }else{ echo 'Not Picked Yet.'; } ?></td>
                                                            <!--<td><?php if(!empty($attendanceDetail[0]['outTime'])){ echo date('H:i:s', strtotime($attendanceDetail[0]['outTime'])); }else{ echo '00:00:00'; } ?></td>-->
                                                            <td>
                                                                <?php if($attendanceDetail[0]['outTime'] == "00:00:00"){ ?>
                                                                    <a href="#markAttendanceTimeOut<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Timeout Attendance"><i style="<?php if($attendanceDetail[0]['outTime'] == "00:00:00"){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">check_circle_outline</i></a>
                                                                <?php }else if(empty($attendanceDetail[0]['outTime'])){ ?>
                                                                    <a href="#markAttendanceTimeOut<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Timeout Attendance"><i style="<?php if(empty($attendanceDetail[0]['outTime'])){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">check_circle_outline</i></a>
                                                                <?php }else{ ?>
                                                                    <i style="<?php if($attendanceDetail[0]['outTime'] == "00:00:00"){ ?>color: red;<?php }else{ ?>color: blue;<?php } ?>" class="material-icons">check_circle_outline</i><small><?php echo date('H:i:s', strtotime($attendanceDetail[0]['outTime'])); ?></small>
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php if(!empty($attendanceDetail[0]['teacherRemark'])){ echo ucfirst($attendanceDetail[0]['teacherRemark']); }else{ echo 'No Remark Yet.'; } ?></td>
                                                            <td><?php if(!empty($attendanceDetail[0]['guardianRemark'])){ echo ucfirst($attendanceDetail[0]['guardianRemark']); }else{ echo 'No Remark Yet.'; } ?></td>
                                                            <td>
                                                                <!--<a href="#markAttendance<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Mark Attendance"><i style="<?php if(!isset($attendanceDetail[0]['inTime'])){ ?>color: #1e88e5;<?php }else{ ?>color: red;<?php } ?>" <?php if(isset($attendanceDetail[0]['inTime'])){ ?>disabled<?php }else{ ?><?php } ?> class="material-icons">check_circle_outline</i></a>-->
                                                                <!--| <a href="#markAttendanceTimeOut<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Timeout Attendance"><i class="material-icons">all_out</i></a>-->
                                                                <a href="#editContent<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Edit Content"><i class="material-icons" style="margin-right: 8px;">TR</i></a>
                                                                 | <a href="#performancePopup<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Performance Marking"><i style="<?php if(!isset($attendanceDetail[0]['performance'])){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">local_parking</i></a>
                                                                <!--| <a onclick="deleteConff('<?= site_url('admin/deleteAttendance') ?>/<?= date('Y-m-d') ?>/<?= $membersDetail[0]['id'] ?>/<?= $val['id'] ?>')"><i class="fa fa-trash"></i></a>-->
                                                                | <a <?php if(!empty($attendanceDetail[0]['inTime'])){ ?> href="#reportIncidentDaily<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Report Daily Incident" <?php }else{ ?>onclick="alert('Please mark Time In attendance before incident can be reported.');"<?php } ?>><i class="material-icons" title="Report Incident">info</i></a>
                                                                </td>
                                                        </tr>
                                                        <?php $i++; }}}} ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <br/>
                                                <h3>Marked Attendance Of The Month</h3>
                                                <?php
                                                    for ($i = 0; $i < 12; $i++) {
                                                        $months[] = date("F-Y", strtotime( date( 'Y-M-01' )." -$i months"));
                                                    }
                                                ?>
                                                <div class="uk-grid">
                                                <div class="uk-width-3-10">
                                                    
                                                    </div>
                                                <span style="float : right;" class="uk-width-3-10"><a id="pdfGen" href="#basicPdfAttendance<?= $val['id'] ?>" data-uk-modal title="Download PDF"><i class="md-icon material-icons">attach_file</i></a></span></div>
                                                    <div id="markAttendance">
                                                        <table id="dt_default1" data-page-length='25' class="table table-hover table-striped" cellspacing="0" width="100%">
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
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(!empty($markAttend)){ ?>
                                                            <?php $i=1; foreach($markAttend as $val12){ if($val12['classId'] == $val['id']){  $studentRecord = $this->data->fetch('children', array('id' => $val12['childId'])); if(count($studentRecord)){ ?>
                                                                    <tr style="<?php if($val12['date'] == date('Y-m-d')){ ?>color: red;<?php } ?>">
                                                                        <td><?= date('d-m-Y', strtotime($val12['date'])); ?></td>
                                                                        <td><?php echo $studentRecord[0]['fname']." ".$studentRecord[0]['lname']; ?></td>
                                                                        <td style="text-align: center;"><?= ucfirst($val12['droppedBy']); ?></td>
                                                                        <td><?= date('H:i:s', strtotime($val12['inTime'])); ?></td>
                                                                        <td style="text-align: center;"><?= ucfirst($val12['pickedBy']); ?></td>
                                                                        <td><?= date('H:i:s', strtotime($val12['outTime'])); ?></td>
                                                                        <td><?= $val12['teacherRemark']; ?></td>
                                                                        <td><?php if(!empty($val12['guardianRemark'])){ echo $val12['guardianRemark']; }else{ echo 'No Remark Yet'; } ?></td>
                                                                        <td>
                                                                            <a href="#contactMember<?= $val12['id'] ?>" data-uk-modal title="Edit Details"><i class="md-icon material-icons" title="Contact Member" style="margin-right: 8px;">TR</i></a> 
                                                                            | <a href="#reportIncident<?= $val12['id'] ?>" data-uk-modal title="Report Incident"><i class="md-icon material-icons" title="Incident Report">info</i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php $i++; }}} ?>
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
    $(document).ready(function(){
        $('#dt_default1').DataTable().order([[0, "desc"]]).draw();
    });
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
<?php foreach($markAttend as $valMark){ ?>
    <?php $childDetail = $this->data->fetch('children', array('id' => $valMark['childId'])); ?>
    <div class="uk-modal" id="contactMember<?= $valMark['id'] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Edit Performance and Remark For <?= $childDetail[0]['fname']." ".$childDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <label class="uk-width-1-2">Member Name : </label>
                    <div class="uk-width-1-2"><?= $childDetail[0]['fname']." ".$childDetail[0]['lname'] ?></div>
                </div>
            </div>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <label class="uk-width-1-2">Performance :</label>
                    <div class="uk-width-1-2">
                        <select class="performance md-input" name="performance" id="performance">
                            <option value="">Select</option>
                                <option value="5">5 Excellent</option>
                                <option value="4">4 Good</option>
                                <option value="3">3 Average</option>
                                <option value="2">2 Below Average</option>
                                <option value="1">1 Poor</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <label class="uk-width-1-2">Behaviour : </label>
                    <div class="uk-width-1-2">
                        <select class="behaviour md-input" name="behaviour" id="behaviour">
                            <option value="">Select</option>
                                <option value="5">5 Excellent</option>
                                <option value="4">4 Good</option>
                                <option value="3">3 Average</option>
                                <option value="2">2 Below Average</option>
                                <option value="1">1 Poor</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <label class="uk-width-1-2">Most Recent Remark :</label>
                    <div class="uk-width-1-2">
                        <textarea name="mostRecentRemark" class="mostRecentRemark md-input" id="mostRecentRemark" value="<?= $valMark['teacherRemark'] ?>" maxlength="250"><?= $valMark['teacherRemark'] ?></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" class="childId" name="memberId" value="<?= $valMark['childId'] ?>"/>
            <input type="hidden" class="classId" name="groupId" value="<?= $val['id'] ?>"/>
            <input type="hidden" class="attendanceId" name="attendanceId" value="<?= $valMark['id'] ?>"/>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <div class="uk-width-1-2">
                        <button type="button" class="md-btn md-btn-primary contactMember">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-modal" id="reportIncident<?= $valMark['id'] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Edit Details</h4>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <label class="uk-width-1-2">Member Name : </label>
                    <div class="uk-width-1-2"><?= $childDetail[0]['fname']." ".$childDetail[0]['lname'] ?></div>
                </div>
            </div>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <label class="uk-width-1-2">Report Date : </label>
                    <div class="uk-width-1-2"><input type="text" class="reportDate md-input" name="date" id="date" value="<?= date('d-M-Y', strtotime($valMark['date'])) ?>" disabled/></div>
                </div>
            </div>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <label class="uk-width-1-2">Teacher Report :</label>
                    <div class="uk-width-1-2">
                        <textarea name="teacherReport" class="teacherReport md-input" id="teacherReport" maxlength="250"></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" class="childId" name="memberId" value="<?= $valMark['childId'] ?>"/>
            <input type="hidden" class="classId" name="groupId" value="<?= $val['id'] ?>"/>
            <input type="hidden" class="attendanceId" name="attendanceId" value="<?= $valMark['id'] ?>"/>
            <div class="uk-form-row">
                <div class="uk-width-medium-1-1 uk-grid">
                    <div class="uk-width-1-2">
                        <button type="button" class="md-btn md-btn-primary reportIncidentBtn">Notify Parent/Admin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $members = explode(',', $val['studentId']);?>
<?php if($val['studentId'] != ''){ for($i = 0; $i < count($members); $i++){ if($members[$i] != ''){ ?>
<?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $members[$i])); ?>
<?php $membersDetail = $this->data->fetch('children', array('id' => $members[$i])); ?>
<?php $attendanceRemark = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `childId` = $members[$i] AND date LIKE '".date('Y-m-d')."' ORDER BY createdAt desc"); ?>
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
                <select class="chosen-select md-input" name="genPdf" id="genPdfMonthlyPdf">
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
    
    <div class="uk-modal" id="basicPdfAttendance<?= $val['id'] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Generate Monthly Attendance Pdf For Print</h4>
            <div class="uk-form-row">
                Select Month: <br/>
                <select class="chosen-select md-input" name="genPdfAttendance" id="genPdfMonthlyAttendance">
                    <!--<option value="">Select Month</option>-->
                    <?php foreach($months as $mon){ ?>
                        <option value="<?= $mon ?>"><?= $mon ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="uk-modal-footer">
                <button class="md-btn md-btn-primary uk-modal-close">No</button>
                <a href="#" id="generateAttendancePdfHref" class="md-btn md-btn-danger">Yes</a>
            </div>
        </div>
    </div>
    <div class="uk-modal" id="markAttendanceTimeOut<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Mark Timeout For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                Date: <br/>
                            <input type="text" readOnly value="<?= date('d-M-Y') ?>" class="md-input attendanceOutDate" name="attendanceOutDate" id="attendanceOutDate"/>
                            <br/>
                            Picked By:<br/>
                            <select class="md-input pickedBy" name="pickedBy" id="pickedBy">
                                <option value="">Select</option>
                                <option value="self">Self</option>
                                <option value="mom">Mom</option>
                                <option value="dad">Dad</option>
                                <option value="others">Appointed Person</option>
                            </select>
                            <p class="pickedPara12" style="display: none;">
                                Picked By Name:<br/>
                                <input type="text" name="pickedName" class="md-input pickedName" id="pickedName">
                            </p>
                            <br/>
                            <br/>
                            <input type="hidden" class="md-input teacherOutId" name="teacherId" id="teacherId" value="<?= $check[0]['id'] ?>"/>
                            <input type="hidden" class="md-input classOutId" name="classId" id="classId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" class="md-input childOutId" name="childId" id="childId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <button type="button" id="markAttendanceOutBtn" value="markAttendanceBtn" class="md-btn md-btn-primary markAttendanceOutBtn">Mark</button>
            </div>
        </div>
    </div>
    <div class="uk-modal" id="editContent<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Enter Teacher Remark For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                Date : <br/>
                <input type="text" readOnly value="<?= date('d-M-Y') ?>" class="md-input attendanceDate" name="attendanceDate" id="attendanceDate"/>
                <br/>
                Teacher Remark : <br/>
                <textarea class="teacherRemark md-input" id="teacherRemark" name="teacherRemark"><?= $attendanceRemark[0]['teacherRemark'] ?></textarea>
                <br/>
                <input type="hidden" class="md-input teacherId" name="teacherId" id="teacherId" value="<?= $check[0]['id'] ?>"/>
                <input type="hidden" class="md-input classId" name="classId" id="classId" value="<?= $val['id'] ?>"/>
                <input type="hidden" class="md-input childId" name="childId" id="childId" value="<?= $membersDetail[0]['id'] ?>"/>
                <input type="hidden" class="md-input attendanceId" name="attendanceId" id="attendanceId" value="<?= $attendanceRemark[0]['id'] ?>"/>
                <button type="button" id="markAttendanceBtn" value="markAttendanceBtn" class="md-btn md-btn-primary editContentBtn">Save</button>
            </div>
        </div>
    </div>
    
    <div class="uk-modal" id="reportIncidentDaily<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Report Incident For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?> Date <?= date('d-M-Y') ?></h4>
            <div class="uk-form-row">
                Date: <br/>
                <input type="text" class="md-input reportDate" name="date" id="date" value="<?= date('d-M-Y', strtotime($valMark['date'])) ?>" disabled/>
                <br/>
                Teacher Report : <br/>
                <textarea name="teacherReport" class="md-input teacherReport1" id="teacherReport" maxlength="250"></textarea>
                <br/>
                <input type="hidden" class="md-input childId" id="memberIdEdit" name="childId" value="<?= $membersDetail[0]['id'] ?>"/>
                <input type="hidden" class="md-input classId" name="groupId" value="<?= $val['id'] ?>"/>
                <input type="hidden" class="md-input attendanceId" value="<?= $valMark['id'] ?>"/>
                <button type="button" class="md-btn md-btn-success reportIncidentDailyBtn">Notify Parent/Admin</button>
            </div>
        </div>
    </div>
    
    <div class="uk-modal" id="performancePopup<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Record Performance <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                Date : <br/>
                <input type="text" readOnly value="<?= date('d-M-Y') ?>" class="md-input attendanceDate" name="attendanceDate" id="attendanceDate"/>
                <br/>
                Performance : <br/>
                            <select class="performance md-input" id="performance" name="performance">
                                <option value="">Select</option>
                                <option value="5">5 Excellent</option>
                                <option value="4">4 Good</option>
                                <option value="3">3 Average</option>
                                <option value="2">2 Below Average</option>
                                <option value="1">1 Poor</option>
                            </select>
                            <br/>
                            Behaviour : <br/>
                            <select class="behaviour md-input" id="behaviour" name="behaviour">
                                <option value="">Select</option>
                                <option value="5">5 Excellent</option>
                                <option value="4">4 Good</option>
                                <option value="3">3 Average</option>
                                <option value="2">2 Below Average</option>
                                <option value="1">1 Poor</option>
                            </select>
                            <br/>
                            <input type="hidden" class="md-input teacherId" name="teacherId" id="teacherId" value="<?= $check[0]['id'] ?>"/>
                            <input type="hidden" class="md-input classId" name="classId" id="classId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" class="md-input childId" name="childId" id="childId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" class="md-input attendanceId" name="attendanceId" id="attendanceId" value="<?= $attendanceRemark[0]['id'] ?>"/>
                            <button type="button" id="markAttendanceBtn" value="markAttendanceBtn" class="md-btn md-btn-primary performanceBtn">Save</button>
            </div>
        </div>
    </div>
    <div class="uk-modal" id="markAttendance<?= $members[$i] ?>">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h4>Mark Attendance For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?></h4>
            <div class="uk-form-row">
                <!--<form action="<?= site_url('home/markAttendance') ?>" method="post">-->
                    Date : <br/>
                    <input type="text" readOnly value="<?= date('d-M-Y') ?>" class="md-input attendanceDate" name="attendanceDate" id="attendanceDate"/>
                    <br/>
                    Dropped By:<br/>
                    <select class="md-input droppedBy" name="droppedBy" id="droppedBy">
                        <option value="">Select</option>
                        <option value="self">Self</option>
                        <option value="mom">Mom</option>
                        <option value="dad">Dad</option>
                        <option value="guardian">Guardian</option>
                        <option value="others">Appointed Person</option>
                    </select>
                    <p class="dropeePara" style="display: none;">
                        Dropped By Name: <br/>
                        <input type="text" name="dropeeName" class="md-input dropeeName" id="dropeeName">
                    </p>
                    <br/>
                    
                    <input type="hidden" class="md-input teacherId" name="teacherId" id="teacherId" value="<?= $check[0]['id'] ?>"/>
                    <input type="hidden" class="md-input classId" name="classId" id="classId" value="<?= $val['id'] ?>"/>
                    <input type="hidden" class="md-input childId" name="childId" id="childId" value="<?= $membersDetail[0]['id'] ?>"/>
                    <button type="button" class="md-btn md-btn-primary markAttendanceBtn">Mark</button>
                <!--</form>-->
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
<?php } ?>
<script src="<?= base_url() ?>/assets/notify/bootstrap-notify.js" type="text/javascript"></script>
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
    
    $(document.body).on('change', '.droppedBy', function(){
        var droppedBy = $(this).val();
        var dropeePara = $(this).parent().find('.dropeePara');
        if(droppedBy == 'others') {
            dropeePara.css('display', 'block');
        }else{
            dropeePara.css('display', 'none');
        }
    });
    
    $(document.body).on('change', '.pickedBy', function(){
        var pickedBy = $(this).val();
        var pickedPara = $('.pickedPara12');
        console.log(pickedPara);
        if(pickedBy == 'others') {
            pickedPara.css('display', 'block');
        }else{
            pickedPara.css('display', 'none');
        }
    });
    
    $(document.body).on('click', '.editContentBtn', function() {
        var attendanceDate = $(this).parent().find('.attendanceDate').val();
        var teacherId = $(this).parent().find('.teacherId').val();
        var classId = $(this).parent().find('.classId').val();
        var childId = $(this).parent().find('.childId').val();
        var attendanceId = $(this).parent().find('.attendanceId').val();
        var teacherRemark = $(this).parent().find('.teacherRemark').val();
        $.ajax({
            url: '<?= site_url('admin/editContentChild') ?>',
            type: "POST",
            data: {attendanceDate: attendanceDate, teacherId: teacherId, classId: classId, childId: childId, attendanceId: attendanceId, teacherRemark: teacherRemark},
            success: function(e) {
                setTimeout(function(){
                    UIkit.notify({
                        message : e,
                        status  : 'danger',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                    location.reload();
                },200);
                $('#editContent'+childId).hide();
            }
        });
    });
    
    $(document.body).on('click', '.performanceBtn', function(){
        var attendanceDate = $(this).parent().find('.attendanceDate').val();
        var teacherId = $(this).parent().find('.teacherId').val();
        var classId = $(this).parent().find('.classId').val();
        var childId = $(this).parent().find('.childId').val();
        var attendanceId = $(this).parent().find('.attendanceId').val();
        var performance = $(this).parent().find('.performance').val();
        var behaviour = $(this).parent().find('.behaviour').val();
        $.ajax({
            url: '<?= site_url('admin/markPerformance') ?>',
            type: 'POST',
            data: {attendanceDate: attendanceDate, classId: classId, childId: childId, attendanceId: attendanceId, performance: performance, behaviour: behaviour},
            success: function(e) {
                setTimeout(function(){
                    UIkit.notify({
                        message : e,
                        status  : 'danger',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                    location.reload();
                },200);
                $('#performancePopup'+childId).hide();
                
            }
        });
    });
    
    $(document.body).on('click', '.markAttendanceOutBtn', function(){
        var attendanceOutDate = $(this).parent().find('.attendanceOutDate').val();
        var pickedBy = $(this).parent().find('.pickedBy').val();
        var pickedName = $(this).parent().find('.pickedName').val();
        var performance = $(this).parent().find('.performance').val();
        var behaviour = $(this).parent().find('.behaviour').val();
        var teacherOutRemark = $(this).parent().find('.teacherOutRemark').val();
        var teacherOutId = $(this).parent().find('.teacherOutId').val();
        var classOutId = $(this).parent().find('.classOutId').val();
        var childOutId = $(this).parent().find('.childOutId').val();
        $.ajax({
            url: '<?= site_url('home/markAttendanceLogout') ?>',
            type: 'POST',
            data: {attendanceDate: attendanceOutDate, pickedBy: pickedBy, pickedName: pickedName, performance: performance, behaviour: behaviour, teacherOutRemark: teacherOutRemark, teacherOutId: teacherOutId, classOutId: classOutId, childOutId: childOutId},
            success: function(e) {
                console.log(e);
                setTimeout(function(){
                    UIkit.notify({
                        message : e,
                        status  : 'danger',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                    location.reload();
                },200);
                $('#markAttendanceTimeOut'+childOutId).hide();
            }
        });
    });
    
    $(document.body).on('click', '.contactMember', function() {
        var performance = $(this).parent().parent().parent().parent().find('.performance').val();
        var behaviour = $(this).parent().parent().parent().parent().find('.behaviour').val();
        var mostRecentRemark = $(this).parent().parent().parent().parent().find('.mostRecentRemark').val();
        var childId = $(this).parent().parent().parent().parent().find('.childId').val();
        var classId = $(this).parent().parent().parent().parent().find('.classId').val();
        var attendanceId = $(this).parent().parent().parent().parent().find('.attendanceId').val();
        $.ajax({
            url: '<?= site_url('home/editChildDetailEdit') ?>',
            type: 'POST',
            data: {performance: performance, behaviour: behaviour, mostRecentRemark: mostRecentRemark, childId: childId, classId: classId, attendanceId: attendanceId},
            success: function(e) {
                setTimeout(function(){
                    UIkit.notify({
                        message: e,
                        status: 'success',
                        timeout: 2000,
                        pos: 'top-right',
                    });
                    location.reload();
                }, 200);
                $('#contactMember'+attendanceId).hide();
            }
        });
    });
    
    $(document.body).on('click', '.reportIncidentDailyBtn', function() {
        var reportDate = $(this).parent().parent().parent().parent().find('.reportDate').val();
        var teacherReport = $(this).parent().parent().parent().parent().find('.teacherReport1').val();
        var childId = $(this).parent().parent().parent().parent().find('.childId').val();
        var classId = $(this).parent().parent().parent().parent().find('.classId').val();
        var attendanceId = $(this).parent().parent().parent().parent().find('.attendanceId').val();
        // alert(teacherReport);
        if(teacherReport != '' || teacherReport != null) {
            $.ajax({
            url: '<?= site_url('home/incidentReportAjax') ?>',
            type: 'POST',
            data: {reportDate: reportDate, teacherReport: teacherReport, childId: childId, classId: classId, attendanceId: attendanceId},
            success: function(e) {
                setTimeout(function() {
                    UIkit.notify({
                        message: e,
                        status: 'success',
                        timeout: 2000,
                        pos: 'top-right',
                    });
                    location.reload();
                }, 100);
                $('#reportIncident'+attendanceId).hide();
            }
        });
        }else{
            alert('Teacher Report field is required field.');
            return false;
        }
    });
    
    $(document.body).on('click', '.reportIncidentBtn', function() {
        var reportDate = $(this).parent().parent().parent().parent().find('.reportDate').val();
        var teacherReport = $(this).parent().parent().parent().parent().find('.teacherReport').val();
        var childId = $(this).parent().parent().parent().parent().find('.childId').val();
        var classId = $(this).parent().parent().parent().parent().find('.classId').val();
        var attendanceId = $(this).parent().parent().parent().parent().find('.attendanceId').val();
        $.ajax({
            url: '<?= site_url('home/incidentReportAjax') ?>',
            type: 'POST',
            data: {reportDate: reportDate, teacherReport: teacherReport, childId: childId, classId: classId, attendanceId: attendanceId},
            success: function(e) {
                setTimeout(function() {
                    UIkit.notify({
                        message: e,
                        status: 'success',
                        timeout: 2000,
                        pos: 'top-right',
                    });
                    location.reload();
                }, 100);
                $('#reportIncident'+attendanceId).hide();
            }
        });
    });
    
    $(document.body).on('click', '.markAttendanceBtn', function(){
        var attendanceDate = $(this).parent().find('.attendanceDate').val();
        var droppedBy = $(this).parent().find('.droppedBy').val();
        var dropeeName = $(this).parent().find('.dropeeName').val();
        var teacherId = $(this).parent().find('.teacherId').val();
        var classId = $(this).parent().find('.classId').val();
        var childId = $(this).parent().find('.childId').val();
        var teacherRemark = $(this).parent().find('.teacherRemark').val();
        $.ajax({
            url: '<?= site_url('home/markAttendance') ?>',
            type: 'POST',
            data: {attendanceDate: attendanceDate, droppedBy: droppedBy, dropeeName: dropeeName, teacherId: teacherId, classId: classId, childId: childId, teacherRemark: teacherRemark},
            success: function(e) {
                setTimeout(function(){
                    UIkit.notify({
                        message : e,
                        status  : 'danger',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                    location.reload();
                },100);
                $('#markAttendance'+childId).hide();
            }
        });
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
    
    $('.droppedBy').on('change', function(){
        var droppedBy = $(this).val();
        // alert(droppedBy);
        if(droppedBy == 'others') {
            $('.dropeePara').css('display', 'block');
        }else{
            $('.dropeePara').css('display', 'none');
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
    
    $('#genPdfMonthlyAttendance').on('change', function() {
        var month = $(this).val();
        var url = '<?= site_url('admin/save_pdf_class_attendance_month/'.$val['id']) ?>'+'/'+month;
        $('#generateAttendancePdfHref').attr('href', url);
    });
</script>