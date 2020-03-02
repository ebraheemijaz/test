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
        <h4 class="heading_a uk-margin-bottom" style="margin-top: 60px; margin-left: 20%;"><strong>Mark Attendance</strong></h4>
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
                                                <a style="float: left" <?php if($val['prev'] > 0){ ?> href="<?= site_url('admin/view/markAttendance/'.$val['prev'].'/'.$val['prevCount']) ?>" <?php }else{ ?>onclick="alert('No Previous Class Present.');"<?php } ?>><span class="menu_icon"><i  style="font-size:40px" class="material-icons">fast_rewind</i></span></a>
                                                <a href="<?= site_url('admin/view/markAttendance/'.$val['id']) ?>"><span class="menu_icon" style="font-size: 20px;"><strong><?= $val['className'] ?> ( <?= $ageGroup[0]['ageGroup'] ?> )</strong></span></a>
                                                <a style="float:right" <?php if($val['next'] > 0){ ?> href="<?= site_url('admin/view/markAttendance/'.$val['next'].'/'.$val['nextCount']) ?>" <?php }else { ?>onclick="alert('No Next Class Present.');"<?php } ?>><span class="menu_icon"><i style="font-size:40px"  class="material-icons">fast_forward</i></span></a>
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
                                                <div class="col-md-3"><strong>Class Name : </strong></div>
                                                <div class="col-md-3"><?= $val['className'] ?></div>
                                                <div class="col-md-3"><strong>Date Created : </strong></div>
                                                <div class="col-md-3"><?= date('d-M-Y', strtotime($val['createdAt'])) ?></div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Teacher-In-Charge(s) : </strong>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $generalInCharges = explode(',', $val['teacherName']);
                                                        foreach($generalInCharges as $GIC) {
                                                        ?>
                                                        <div class="row"><div class="col-md-8"><?= $GIC; ?></div><div class="col-md-4"></div></div><br/>
                                                        <?php
                                                        }
                                                    ?>
                                                </div>
                                                
                                            </div>
                                            <hr class="uk-article-divider">
                                            <p>
                                                <div class="table-responsive">
                                                    <!--<span style="float : right;"><a   href="#" data-target="#basicPdf<?= $val['id'] ?>" data-toggle="modal" title="Download PDF"><i class="md-icon material-icons">attach_file</i></a> | -->
                                                    <!--<a href="#" data-target="#fullPdf" data-toggle="modal" title="Full PDF Download"><i class="md-icon fa fa-file-pdf-o"></i></a></span>-->
                                                    <div id="updateMempacas">
                                                    <table id="myTableAttend" data-page-length='25' class="table table-hover table-striped" cellspacing="0" width="100%">
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
                                                        <?php $members = explode(',', $val['studentId']);?>
                                                    <?php $i=1; if($val['studentId'] != ''){ foreach($members as $val1){ if($val1 != ''){ ?>
                                                        <?php $membersDetail = $this->data->fetch('children', array('id' => $val1)); if(count($membersDetail)){ ?>
                                                        <?php $attendanceDetail = $this->data->myquery("SELECT * FROM markAttendance WHERE childId = ".$val1." and date LIKE '".date('Y-m-d')."' order by date desc"); ?>
                                                        <tr id="tr<?= $val1 ?>">
                                                            <td class="tdDate"><?php if(!empty($attendanceDetail[0]['date'])){ echo date('d-M-Y', strtotime($attendanceDetail[0]['date'])); }else{ echo date('d-M-Y'); } ?></td>
                                                            <td class="tdChildName"><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td class="tdDroppedBy"><?php if(!empty($attendanceDetail[0]['droppedBy'])){ echo ucfirst($attendanceDetail[0]['droppedBy']); }else{ echo 'Absent'; } ?></td>
                                                            <td class="tdTimeIn"><?php if(!empty($attendanceDetail[0]['inTime'])){ ?><i style="<?php if(!isset($attendanceDetail[0]['inTime'])){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">check_circle_outline</i><small><?php echo date('H:i:s', strtotime($attendanceDetail[0]['inTime'])); ?></small><?php }else{ ?><a href="#" data-target="#markAttendance<?= $membersDetail[0]['id'] ?>" data-toggle="modal" <?php if(isset($attendanceDetail[0]['inTime'])){ ?>disabled<?php }else{ ?><?php } ?>><i style="<?php if(!isset($attendanceDetail[0]['inTime'])){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">check_circle_outline</i></a><?php } ?></td>
                                                            <td class="tdPickedBy"><?php if(!empty($attendanceDetail[0]['pickedBy'])){ echo ucfirst($attendanceDetail[0]['pickedBy']); }else{ echo 'Not Picked Yet.'; } ?></td>
                                                            <td class="tdTimeOut">
                                                                <?php if($attendanceDetail[0]['outTime'] == "00:00:00"){ ?>
                                                                    <a href="#" data-target="#markAttendanceTimeOut<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i style="<?php if($attendanceDetail[0]['outTime'] == "00:00:00"){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">check_circle_outline</i></a>
                                                                <?php }else if(empty($attendanceDetail[0]['outTime'])){ ?>
                                                                    <a href="#" data-target="#markAttendanceTimeOut<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i style="<?php if(empty($attendanceDetail[0]['outTime'])){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">check_circle_outline</i></a>
                                                                <?php }else{ ?>
                                                                    <i style="<?php if($attendanceDetail[0]['outTime'] == "00:00:00"){ ?>color: red;<?php }else{ ?>color: blue;<?php } ?>" class="material-icons">check_circle_outline</i><small><?php echo date('H:i:s', strtotime($attendanceDetail[0]['outTime'])); ?></small>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="tdTeacherRemark"><?php if(!empty($attendanceDetail[0]['teacherRemark'])){ echo ucfirst($attendanceDetail[0]['teacherRemark']); }else{ echo 'No Remark Yet.'; } ?></td>
                                                            <td><?php if(!empty($attendanceDetail[0]['guardianRemark'])){ echo ucfirst($attendanceDetail[0]['guardianRemark']); }else{ echo 'No Remark Yet.'; } ?></td>
                                                            <td>
                                                                <!--<a href="#" data-target="#markAttendance<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i style="<?php if(!isset($attendanceDetail[0]['inTime'])){ ?>color: #1e88e5;<?php }else{ ?>color: red;<?php } ?>" <?php if(isset($attendanceDetail[0]['inTime'])){ ?>disabled<?php }else{ ?><?php } ?> class="material-icons">check_circle_outline</i></a>-->
                                                                <!--| <a href="#" data-target="#markAttendanceTimeOut<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="material-icons">all_out</i></a>-->
                                                                <a href="#" data-target="#editContent<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="">TR</i></a>
                                                                | <a href="#" data-target="#performancePopup<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i style="<?php if(!isset($attendanceDetail[0]['performance'])){ ?>color: red;<?php }else{ ?>color: green;<?php } ?>" class="material-icons">local_parking</i></a>
                                                                | <a onclick="deleteConff('<?= site_url('admin/deleteAttendance') ?>/<?= date('Y-m-d') ?>/<?= $membersDetail[0]['id'] ?>/<?= $val['id'] ?>')"><i class="fa fa-trash"></i></a>
                                                                | <a href="#" data-target="#reportIncidentDaily<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-info-circle" title="Report Incident"></i></a>
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
                                                    <select class="form-control chosen-select" name="genPdf" id="genPdf">
                                                        <!--<option value="">Select Month</option>-->
                                                        <?php foreach($months as $key => $mon){ ?>
                                                            <option value="<?= $mon ?>"><?= $mon ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span style="float : right;"><a   href="#" data-target="#basicPdf<?= $val['id'] ?>" data-toggle="modal" title="Download PDF"><i class="md-icon material-icons">attach_file</i></a> | 
                                                    <a href="#" data-target="#fullPdf" data-toggle="modal" title="Full PDF Download"><i class="md-icon fa fa-file-pdf-o"></i></a></span>
                                                    <div id="markAttendance">
                                                        <table id="myTable" data-page-length='25' class="table table-hover table-striped" cellspacing="0" width="100%">
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
                                                            <?php $i=1; foreach($markAttend as $val12){ if($val12['classId'] == $val['id']){  $studentRecord = $this->data->fetch('children', array('id' => $val12['childId'])); if(count($studentRecord)){?>
                                                                    <tr style="<?php if($val12['date'] == date('Y-m-d')){ ?>color: red;<?php } ?>">
                                                                        <td><?= date('d-m-Y', strtotime($val12['date'])); ?></td>
                                                                        <td><?php echo $studentRecord[0]['fname']." ".$studentRecord[0]['lname']; ?></td>
                                                                        <td><?= $val12['droppedBy']?></td>
                                                                        <td><?= date('H:i:s', strtotime($val12['inTime'])); ?></td>
                                                                        <td><?= $val12['pickedBy'] ?></td>
                                                                        <td><?= date('H:i:s', strtotime($val12['outTime'])); ?></td>
                                                                        <td><?= $val12['teacherRemark']; ?></td>
                                                                        <td><?php if(!empty($val12['guardianRemark'])){ echo $val12['guardianRemark']; }else{ echo 'No Remark Yet'; } ?></td>
                                                                        <td>
                                                                            <a href="#" data-target="#contactMember<?= $val12['id'] ?>" data-toggle="modal"><i class="" title="Contact Member">TR</i></a> 
                                                                            | <a href="#" data-target="#reportIncident<?= $val12['id'] ?>" data-toggle="modal"><i class="fa fa-info-circle" title="Report Incident"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php $i++; }}} ?>
                                                        <?php } ?>
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
    // $(document).ready(function(){
    //     $('#myTableAttend').DataTable().order([[0, 'desc']]).draw(false);
    // });
    $('#genPdf').on('change', function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var url = '<?= site_url('home/save_pdf_mempacas_month/'.$val['id']) ?>'+'/'+month;
        $.post("<?= site_url('admin/getChildAttendance'); ?>", {month: month, id: groupId}, function (e) {
            $('#markAttendance').html(e);
            $('#pdfGen').attr('href', url);
            $('#myTable').DataTable().order([[ 0, 'asc' ]]).draw(false);
        });
    });
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
<?php foreach($markAttend as $valMark){ ?>
    <?php $childDetails = $this->data->fetch('children', array('id' => $valMark['childId'])); ?>
    <div class="modal fade in" id="reportIncident<?= $valMark['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aira-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 style="text-align: center; font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Report Incident
                    </h4>
                </div>
                <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    Date : 
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="reportDate" name="date" id="date" value="<?= date('d-M-Y', strtotime($valMark['date'])) ?>" disabled/>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    Teacher Report :
                                </div>
                                <div class="col-md-7">
                                    <textarea name="teacherReport" class="teacherReport" id="teacherReport" maxlength="250"></textarea>
                                </div>
                            </div>
                            <input type="hidden" class="md-input childId" id="memberIdEdit" name="childId" value="<?= $valMark['childId'] ?>"/>
                            <input type="hidden" class="md-input classId" name="groupId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" class="md-input attendanceId" value="<?= $valMark['id'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-success pull-right reportIncidentBtn">Notify Parent/Admin</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="contactMember<?= $valMark['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Edit Performance and Remark For <?= $childDetails[0]['fname']." ".$childDetails[0]['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <!--<form method="post" action="<?= site_url('admin/editChildDetail') ?>">-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Member Name:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $childDetails[0]['fname']." ".$childDetails[0]['lname'] ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Performance :</strong>
                                </div>
                                <div class="col-md-7">
                                    <select class="performance" name="performance" id="performance">
                                        <option value="">Select</option>
                                <option value="5">5 Excellent</option>
                                <option value="4">4 Good</option>
                                <option value="3">3 Average</option>
                                <option value="2">2 Below Average</option>
                                <option value="1">1 Poor</option>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Behaviour : </strong>
                                </div>
                                <div class="col-md-7">
                                    <select class="behaviour" name="behaviour" id="behaviour">
                                        <option value="">Select</option>
                                <option value="5">5 Excellent</option>
                                <option value="4">4 Good</option>
                                <option value="3">3 Average</option>
                                <option value="2">2 Below Average</option>
                                <option value="1">1 Poor</option>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Most Recent Remark :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="mostRecentRemark" class="mostRecentRemark" id="mostRecentRemark" value="<?= $attendanceRemark[0]['teacherRemark'] ?>" maxlength="500"><?= $attendanceRemark[0]['teacherRemark'] ?></textarea>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" class="childId" name="memberId" value="<?= $valMark['childId'] ?>"/>
                            <input type="hidden" class="classId" name="groupId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" class="attendanceId" name="attendanceId" value="<?= $valMark['id'] ?>"/>
                            <!--<input type="hidden" name="generalId" value="<?php print_r($this->session->userdata('userAdmin')[0]['id']);  ?>"/>-->
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-success pull-right contactMember">Save</button>
                                </div>
                            </div>
                        </div>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $members = explode(',', $val['studentId']);?>
<?php if($val['studentId'] != ''){ for($i = 0; $i < count($members); $i++){ if($members[$i]){ ?>
<?php $membersDetail = $this->data->fetch('children', array('id' => $members[$i])); ?>
<?php $incidentReport = $this->data->myquery('SELECT * FROM `incidentReports` WHERE `childId` = '.$members[$i].' ORDER BY createdAt desc'); ?> <!-- $this->data->fetch('markAttendance', array('childId' => $membersDetail[0]['id'])); -->
<?php $attendanceRemark = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `childId` = $members[$i] AND date LIKE '".date('Y-m-d')."' ORDER BY createdAt desc"); ?>
    <div class="modal fade in" id="markAttendanceTimeOut<?= $membersDetail[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aira-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 style="text-align: center; font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Mark Timeout Attendance <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
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
                            <p class="pickedPara" style="display: none;">
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
            </div>
        </div>
    </div>
    
    <div class="modal fade in" id="reportIncidentDaily<?= $membersDetail[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aira-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 style="text-align: center; font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Report Incident For <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?> Date <?= date('d-M-Y') ?>
                    </h4>
                </div>
                <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    Date : 
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="reportDate" name="date" id="date" value="<?= date('d-M-Y', strtotime($valMark['date'])) ?>" disabled/>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    Teacher Report :
                                </div>
                                <div class="col-md-7">
                                    <textarea name="teacherReport" class="teacherReport" id="teacherReport" maxlength="250"></textarea>
                                </div>
                            </div>
                            <input type="hidden" class="md-input childId" id="memberIdEdit" name="childId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" class="md-input classId" name="groupId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" class="md-input attendanceId" value="<?= $valMark['id'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-success pull-right reportIncidentDailyBtn">Notify Parent/Admin</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade in" id="performancePopup<?= $membersDetail[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 style="text-align: center; font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Mark Performance <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            Date : 
                            <input type="text" readOnly value="<?= date('d-M-Y') ?>" class="md-input attendanceDate" name="attendanceDate" id="attendanceDate"/>
                            <br/>
                            Performance : 
                            <select class="performance md-input" id="performance" name="performance">
                                <option value="">Select</option>
                                <option value="5">5 Excellent</option>
                                <option value="4">4 Good</option>
                                <option value="3">3 Average</option>
                                <option value="2">2 Below Average</option>
                                <option value="1">1 Poor</option>
                            </select>
                            <br/>
                            Behaviour : 
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
                            <button type="button" id="markAttendanceBtn" value="markAttendanceBtn" class="md-btn md-btn-primary performanceBtn">Edit</button>
                            <br/>
                            <small><strong>Note: 5: Excellent, 4: Good, 3: Average, 2: Below Average, 1: Poor</strong></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade in" id="editContent<?= $membersDetail[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 style="text-align: center; font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Edit Content <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            Date : 
                            <input type="text" readOnly value="<?= date('d-M-Y') ?>" class="md-input attendanceDate" name="attendanceDate" id="attendanceDate"/>
                            <br/>
                            Teacher Remark : 
                            <textarea class="teacherRemark form-control" style="width: 50%;" id="teacherRemark" name="teacherRemark"><?= $attendanceRemark[0]['teacherRemark'] ?></textarea>
                            <br/>
                            <input type="hidden" class="md-input teacherId" name="teacherId" id="teacherId" value="<?= $check[0]['id'] ?>"/>
                            <input type="hidden" class="md-input classId" name="classId" id="classId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" class="md-input childId" name="childId" id="childId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" class="md-input attendanceId" name="attendanceId" id="attendanceId" value="<?= $attendanceRemark[0]['id'] ?>"/>
                            <button type="button" id="markAttendanceBtn" value="markAttendanceBtn" class="md-btn md-btn-primary editContentBtn">Edit</button>
                        </div>
                    </div>
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
                        Mark Attendance <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <!--<form method="post" action="<?= site_url('admin/markAttendance') ?>">-->
                        <div class="container">
                            <div class="row">
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
                    <button type="button" id="markAttendanceBtn" value="markAttendanceBtn" class="md-btn md-btn-primary markAttendanceBtn">Mark</button>
                            </div>
                        </div>
                    <!--</form>-->
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
                        Generate Monthly Class wise Attendance Pdf for Print
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
                            <a href='<?= site_url('admin/save_full_pdf_class_attendance_full') ?>' id="generateFullPdfHref"><span class='btn btn-danger'>Generate PDF</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }}} ?>
<?php foreach($classes as $val6){ ?>
<?php $membersDetail = $this->data->myquery("SELECT * FROM `children` WHERE NULLIF(fname, '') IS NOT NULL AND NULLIF(lname, '') IS NOT NULL AND classId IS NULL AND isAlotted = 0"); ?>
    <div class="modal fade in" id="addMember<?= $val6['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Add More Members
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/addNewChild') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="hidden" name="membersIdOld" value="<?= $val6['studentId'] ?>"/>
                                    <input type="hidden" name="membersNameOld" value="<?= $val6['studentName'] ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>General In Charge:</strong>
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
                                    <button type="submit" class="btn btn-success pull-right">Add Member</button>
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
                                    <strong>General In Charge:</strong>
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
                                    <strong>Group Name :</strong>
                                </div>
                                <?php $mempacasGroup = $this->data->fetch('attendanceClass'); ?>
                                <div class="col-md-7">
                                    <select name="attendanceClass">
                                        <option value="">Select Group</option>
                                        <?php foreach($mempacasGroup as $group){ ?>
                                        <option value="<?= $group['id'] ?>"><?= $group['className'] ?></option>
                                        <?php } ?>
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
<div class="confirmationModalOnD"></div>
<script>
    function deleteC(srcc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Do you want to Time Out?</h1>' +
            '</div>' +
            '<div class="uk-modal-footer">' +
            '<button class="md-btn md-btn-primary uk-modal-close">No</button>' +
            '<a href="'+srcc+'" class="md-btn md-btn-danger">Yes</a>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(".confirmationModalOnD").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }
</script>
<script>
    var $remaining = $('#remaining'),
        $messages = $remaining.next();
    $('#msg').keyup(function(){
        var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
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
<script src="<?= base_url() ?>/assets/notify/bootstrap-notify.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#preloader').hide();
    });
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
        var pickedPara = $(this).parent().find('.pickedPara');
        if(pickedBy == 'others') {
            pickedPara.css('display', 'block');
        }else{
            pickedPara.css('display', 'none');
        }
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
            url: '<?= site_url('admin/markAttendanceLogout') ?>',
            type: 'POST',
            data: {attendanceDate: attendanceOutDate, pickedBy: pickedBy, pickedName: pickedName, performance: performance, behaviour: behaviour, teacherOutRemark: teacherOutRemark, teacherOutId: teacherOutId, classOutId: classOutId, childOutId: childOutId},
            success: function(e) {
                console.log(e);
                jQuery.notify({
                    message: e
                },{
                    type: "danger",
                    element: 'body',
                    position: null,
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                		from: "top",
                		align: "right"
                	},
                	offset: 20,
                	spacing: 10,
                	z_index: 1031,
                	delay: 500,
                	timer: 1000,
                });
                $('#markAttendanceTimeOut'+childOutId).hide();
                setTimeout(function(){
                    location.reload();
                }, 200);
            }
        });
    });
    
    $(document.body).on('click', '.contactMember', function(){
        var performance = $(this).parent().parent().parent().find('.performance').val();
        var behaviour = $(this).parent().parent().parent().find('.behaviour').val();
        var teacherRemark = $(this).parent().parent().parent().find('.mostRecentRemark').val();
        var childId = $(this).parent().parent().parent().find('.childId').val();
        var classId = $(this).parent().parent().parent().find('.classId').val();
        var attendanceId = $(this).parent().parent().parent().find('.attendanceId').val();
        $.ajax({
            url: '<?= site_url('admin/editChildDetail') ?>',
            type: 'POST',
            data: {performance: performance, behaviour: behaviour, teacherRemark, teacherRemark, childId: childId, classId: classId, attendanceId: attendanceId},
            success: function(e) {
                jQuery.notify({
                    message: e
                },
                {
                    type: "danger",
                    element: 'body',
                	position: null,
                	allow_dismiss: true,
                	newest_on_top: false,
                	showProgressbar: false,
                	placement: {
                		from: "top",
                		align: "right"
                	},
                	offset: 20,
                	spacing: 10,
                	z_index: 1031,
                	delay: 500,
                	timer: 1000,
                });
                $('#contactMember'+attendanceId).hide();
                setTimeout(function(){
                    location.reload();
                }, 200);
            }
        });
    });
    
    $(document.body).on('click', '.reportIncidentDailyBtn', function() {
        var reportDate = $(this).parent().parent().parent().find('.reportDate').val();
        var teacherReport = $(this).parent().parent().parent().find('.teacherReport').val();
        var childId = $(this).parent().parent().parent().find('.childId').val();
        var classId = $(this).parent().parent().parent().find('.classId').val();
        var attendanceId = $(this).parent().parent().parent().find('.attendanceId').val();
        $.ajax({
            url: '<?= site_url('admin/incidentReportDeily') ?>',
            type: 'POST',
            data: {reportDate: reportDate, teacherReport: teacherReport, childId: childId, classId: classId},
            success: function(e) {
                jQuery.notify({
                    message: e
                },
                {
                    type: "danger",
                    element: 'body',
                	position: null,
                	allow_dismiss: true,
                	newest_on_top: false,
                	showProgressbar: false,
                	placement: {
                		from: "top",
                		align: "right"
                	},
                	offset: 20,
                	spacing: 10,
                	z_index: 1031,
                	delay: 500,
                	timer: 1000,
                });
                $('#reportIncidentDaily'+attendanceId).hide();
                setTimeout(function(){
                    location.reload();
                }, 200);
            }
        });
    });
    
    $(document.body).on('click', '.reportIncidentBtn', function() {
        var reportDate = $(this).parent().parent().parent().find('.reportDate').val();
        var teacherReport = $(this).parent().parent().parent().find('.teacherReport').val();
        var childId = $(this).parent().parent().parent().find('.childId').val();
        var classId = $(this).parent().parent().parent().find('.classId').val();
        var attendanceId = $(this).parent().parent().parent().find('.attendanceId').val();
        $.ajax({
            url: '<?= site_url('admin/incidentReport') ?>',
            type: 'POST',
            data: {reportDate: reportDate, teacherReport: teacherReport, childId: childId, classId: classId},
            success: function(e) {
                jQuery.notify({
                    message: e
                },
                {
                    type: "danger",
                    element: 'body',
                	position: null,
                	allow_dismiss: true,
                	newest_on_top: false,
                	showProgressbar: false,
                	placement: {
                		from: "top",
                		align: "right"
                	},
                	offset: 20,
                	spacing: 10,
                	z_index: 1031,
                	delay: 500,
                	timer: 1000,
                });
                $('#reportIncident'+attendanceId).hide();
                setTimeout(function(){
                    location.reload();
                }, 200);
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
                jQuery.notify({
                    message: e
                },
                {
                    type: "danger",
                    element: 'body',
                	position: null,
                	allow_dismiss: true,
                	newest_on_top: false,
                	showProgressbar: false,
                	placement: {
                		from: "top",
                		align: "right"
                	},
                	offset: 20,
                	spacing: 10,
                	z_index: 1031,
                	delay: 500,
                	timer: 1000,
                });
                $('#performancePopup'+childId).hide();
                setTimeout(function(){
                    location.reload();
                }, 100);
            }
        });
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
                jQuery.notify({
                    message: e
                },
                {
                    type: "danger",
                    element: 'body',
                	position: null,
                	allow_dismiss: true,
                	newest_on_top: false,
                	showProgressbar: false,
                	placement: {
                		from: "top",
                		align: "right"
                	},
                	offset: 20,
                	spacing: 10,
                	z_index: 1031,
                	delay: 500,
                	timer: 1000,
                });
                $('#editContent'+childId).hide();
                setTimeout(function(){
                    location.reload();
                }, 100);
            }
        });
    });
    
    $(document.body).on('click', '.markAttendanceBtn' ,function(){
        // var memberId = $(this).parent().parent().find('.memberIdEdit').val();
        var attendanceDate = $(this).parent().find('.attendanceDate').val();
        var droppedBy = $(this).parent().find('.droppedBy').val();
        var dropeeName = $(this).parent().find('.dropeeName').val();
        var teacherId = $(this).parent().find('.teacherId').val();
        var classId = $(this).parent().find('.classId').val();
        var childId = $(this).parent().find('.childId').val();
        // var teacherRemark = $(this).parent().find('.teacherRemark').val();
        $.ajax({
            url: '<?= site_url('admin/markAttendance') ?>',
            type: 'POST',
            data: {attendanceDate: attendanceDate, droppedBy: droppedBy, dropeeName: dropeeName, teacherId: teacherId, classId: classId, childId: childId},
            success: function(e) {
                jQuery.notify({
                    message: e
                },
                {
                    type: "danger",
                    element: 'body',
                	position: null,
                	allow_dismiss: true,
                	newest_on_top: false,
                	showProgressbar: false,
                	placement: {
                		from: "top",
                		align: "right"
                	},
                	offset: 20,
                	spacing: 10,
                	z_index: 1031,
                	delay: 500,
                	timer: 1000,
                });
                $('#markAttendance'+childId).hide();
                setTimeout(function(){
                    location.reload();
                }, 100);
            }
        });
    });
    
    $('#genPdfMonthlyPdf').on('change', function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var url = '<?= site_url('admin/save_pdf_class_attendance_month/'.$val['id']) ?>'+'/'+month;
        // alert(url);
        $('#generatePdfHref').attr('href', url);
    });
    $('#genFullMonthlyPdf').on('change', function(){
        var month = $(this).val();
        var url = '<?= site_url('admin/save_full_pdf_class_attendance') ?>'+'/'+month;
        $('#generateFullPdfHref').attr('href', url);
    });
</script>