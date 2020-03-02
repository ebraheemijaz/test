<?php $this->data->update(array('incidentReported' => 0), 'incidentReports', array('incidentReported' => 1)); ?>
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
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Incident Reports</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Incident Reports</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <span style="float : right;"><a href="#" data-target="#fullPdf" data-toggle="modal" title="Full PDF Download"><i class="md-icon fa fa-file-pdf-o"></i></a></span>
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td width="15%">Date</td>
                                <td>Class Name</td>
                                <td>Age Group</td>
                                <td>Child Name</td>
                                <td>Gender</td>
                                <td>Parent Name</td>
                                <!--<td>Any Recent Incident</td>-->
                                <td>Teacher Reports</td>
                                <td>Guardian Comments</td>
                                <td>Admin Comment</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($incidentReports as $val){ $child = $this->data->fetch('children', array('id' => $val['childId'])); if(count($child)){ ?>
                                <tr>
                                    <td width="15%"><?= date('d-M-Y', strtotime($val['date'])) ?><br/><small><?= date('h:i a', strtotime($val['createdAt'])); ?></small></td>
                                    <td><?php $class = $this->data->fetch('attendanceClass', array('id' => $val['classId'])); echo $class[0]['className']; ?></td>
                                    <td><?= $this->data->fetch('ageGroup', array('id' => $class[0]['ageGroup']))[0]['ageGroup']; ?></td>
                                    <td><?php  echo $child[0]['fname']." ".$child[0]['lname'] ?></td>
                                    <td><?= ucfirst($child[0]['gender']) ?></td>
                                    <td><?php $parent = $this->data->fetch('member', array('id' => $child[0]['parent_id']))[0]; echo $parent['fname']." ".$parent['lname'] ?></td>
                                    <!--<td></td>-->
                                    <td><?php if(!empty($val['teacherReports'])){ echo ucfirst(substr(strip_tags($val['teacherReports']),0,100)); ?><a href="#" data-target="#detailsTeacher<?= $val['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a><?php }else{ echo 'No Teacher Report'; } ?></td>
                                    <td><?php if(!empty($val['parentComments'])){ echo ucfirst(substr(strip_tags($val['parentComments']),0,100)); ?><a href="#" data-target="#detailsParent<?= $val['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a><?php }else{ echo 'No parent Comment'; } ?></td>
                                    <td><?php if(!empty($val['adminComment'])){ echo ucfirst(substr(strip_tags($val['adminComment']),0,100)); ?><a href="#" data-target="#detailsAdmin<?= $val['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a><?php }else{ echo 'No admin comment'; } ?></td>
                                    <td><?= $val['status'] ?></td>
                                    <td>
                                        <a data-target="#adminComment<?= $val['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-comment" title="Admin Comment"></i></a> 
                                        | <a onclick="resolveIncident('<?= site_url('admin/resolveIncident/'.$val['id']."/same") ?>')" title="Resolve Incident"><i class="fa fa-unlock-alt" title="Resolve Incident"></i></a>
                                        | <a onclick="deleteConff('<?= site_url('admin/delete/incidentReports/'.$val['id']."/same") ?>')" title="Delete Incident"><i class="fa fa-trash"></i></a>
                                        <!--| <a data-target="#assignGroup<?= $val['userId'] ?>" data-toggle="modal" href="#"><i class="fa fa-tasks"></i></a>-->
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<?php foreach($data as $val5){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $val5['userId'])); ?>
    <div class="modal fade in" id="assignGroup<?= $val5['userId'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Reassign Group
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/reassignGeneral') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>General Name:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $membersDetail[0]['fname']." ".$membersDetail[0]['lname'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>General Old Group:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $this->data->fetch('mempacasGroup', array('id' => $val5['groupId']))[0]['groupName'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Group Name :</strong>
                                </div>
                                <div class="col-md-7">
                                    <select id="group" name="group" class="form-control chosen-select">
                                        <?php $mempacasGroup = $this->data->fetch('mempacasGroup'); ?>
                                        <option value="">Select Group</option>
                                        <?php foreach($mempacasGroup as $mempacas){ ?>
                                            <option value="<?= $mempacas['id'] ?>"><?= $mempacas['groupName'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val['groupId'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Assign Group</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
                                                        for ($i = 0; $i < 12; $i++) {
                                                            $months[] = date("F-Y", strtotime( date( 'Y-M-01' )." -$i months"));
                                                        }
                                                    ?>
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
                            <a href='<?= site_url('admin/save_full_incident_pdf_report') ?>' id="generateFullPdfHref"><span class='btn btn-danger'>Generate PDF</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php foreach($data as $val4){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $val4['userId'])); ?>
    <div class="modal fade in" id="sendEmail<?= $val4['userId'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
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
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Member Email:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $membersDetail[0]['email'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Send Email :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="msg" id="msgEmail"></textarea>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val['groupId'] ?>"/>
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
<?php foreach($data as $val3){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $val3['userId'])); ?>
    <div class="modal fade in" id="sendSMS<?= $val3['userId'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
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
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Member Mobile Number:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?= $membersDetail[0]['mobileNo'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Send SMS :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="msg" id="msg"></textarea>
                                    <p>
                                        <span id="remaining">160 characters remaining</span>
                                        <span id="messages">1 message(s)</span>
                                    </p>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val3['groupId'] ?>"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success pull-right">Send SMS</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <?php $i=1; foreach($data as $val){ ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?= $val['userId'] ?>" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Name</td>
                                <td><?= $val['fname']." ".$val['lname'] ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?= $val['gander'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php $i++; } ?>

<?php $incidentReports = $this->data->fetch('incidentReports'); ?>
<?php foreach($incidentReports as $IR){ ?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="adminComment<?= $IR['id'] ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aira-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/adminCommentIncidentReport') ?>">
                    Admin Comment : <br/>
                    <textarea class="form-control" name="adminComment" id="adminComment" maxlength="200"></textarea>
                    <br/>
                    <small>You can type 200 Characters only.</small>
                    <br/>
                    <small style="color: red;"><strong>Note: Any previous admin comment will be replaced.</strong></small><br/>
                    <input type="hidden" name="incidentReportsId" value="<?= $IR['id'] ?>"/>
                    <button type="submit" id="submit" >Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="conf"></div>
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
    function openProfile(){
        $("#newModal").modal("toggle");
    }
    
    function resolveIncident(link) {
        // alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> "+
                "<div class='modal-dialog modal-md' role='document'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                "<span aria-hidden='true'>x</span>"+
                "</button>"+
                "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'>"+
                "Are you sure you want to resolve?"+
                "</h4>"+
                "</div>"+
                "<div class='modal-body'>"+
                "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> "+
                "<a href='"+link+"'><span class='btn btn-danger'>Resolve</span></a>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "</div>";
                $(".conf").html(a);
                $('#deleteConf').modal('toggle');
    }
    
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
    $('#genFullMonthlyPdf').on('change', function(){
        var month = $(this).val();
        var url = '<?= site_url('admin/save_full_incident_pdf') ?>'+'/'+month;
        $('#generateFullPdfHref').attr('href', url);
    });
</script>
<div class="conf"></div>
<?php foreach($incidentReports as $val){ ?>
    <div class="modal fade in" id="detailsTeacher<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Teachers Comment Details
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $val['teacherReports']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="detailsParent<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Parent Comments Details
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $val['parentComments']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="detailsAdmin<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Admin Comments Details
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $val['adminComment']; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>