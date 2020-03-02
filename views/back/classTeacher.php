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
                    <li><a href="">Teacher In Charges</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Teacher In Charges</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Teachers Name</td>
                                <td>Total Class Children</td>
                                <td>Class Name</td>
                                <td>Age Group</td>
                                <!--<td>Last Login</td>-->
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($data as $val){ ?>
                                <tr>
                                    <td><?= str_replace(',', '<br/>', $val['TICNAME']) ?></td>
                                    <td><?= $val['totalStudents'] ?></td>
                                    <td><?= $val['className'] ?></td>
                                    <td><?= $val['ageGroup'] ?></td>
                                    <!--<td><?= date('d/M/Y H:i:s', strtotime($val['lasttime'])) ?></td>-->
                                    <td>
                                        <!--<a data-target="#sendSMS<?= $val['userId'] ?>" data-toggle="modal" href="#"><i class="fa fa-share" title="Send SMS."></i></a> -->
                                        <!--| <a data-target="#sendEmail<?= $val['userId'] ?>" data-toggle="modal" href="#"><i class="fa fa-envelope-o" title="Send Email"></i></a>-->
                                        <!--| <a data-target="#assignGroup<?= $val['userId'] ?>" data-toggle="modal" href="#"><i class="fa fa-tasks"></i></a>-->
                                        <a onclick="deleteConff('<?= site_url('admin/deleteGeneral/mempacasGroup/'.$val['userId']."/".$val['groupId']."/same") ?>')"><i class="fa fa-trash"></i></a></td>
                                    </td>
                                </tr>
                            <?php $i++; } ?>
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
<?php foreach($data as $val){ ?>
    <div class='modal fade' id='deleteConf<?= $val['groupId'] ?>' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'>
            <div class='modal-dialog modal-md' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
            <h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'>
            Are You Sure?
            </h4>
            </div>
            <div class='modal-body'>
            <form action='<?= site_url() ?>/admin/deleteTeacher/attendanceClass' method="post">
            <select class='chosen-select' name="userId" id="userId">
            <option value=''>Select Class Manager</option>
            <?php foreach($teachers as $val1){ if($val['groupId'] == $val1['groupId']){ ?>
            <option value='<?= $val1['userId'] ?>'><?= $val1['name'] ?></option>
            <?php }} ?>
            </select>
            <input type="hidden" value="<?= $val1['classId'] ?>" name="groupId">
            <br/>
            <br/>
            <button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button>
            <button type='submit' class='btn btn-danger'>Delete</button>
            </form>
            </div>
            </div>
            </div>
            </div>
<?php } ?>
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
</script>