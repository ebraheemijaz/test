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

<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">View Mempacas Group</h4>
        <div class="uk-grid uk-grid-medium checkwidth" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-10-10">
                <div class="md-card uk-margin-medium-bottom" style="margin-left: -20px; margin-right: -20px;">
                    <div class="md-card-content">
                        <?php $val = $mempacasGroup[0];  ?>
                        <div class="uk-grid blog_article" data-uk-grid-margin>
                            <div class="uk-width-medium">
                                <div class="md-card" style="box-shadow: 0px 0px 0px!important;">
                                    <div class="md-card-content large-padding">
                                        <div class="uk-article">

                                            <p style="text-align: center">
                                                <a style="float: left" <?php if($val['prev'] > 0){ ?> href="<?= site_url('admin/view/urgentAttention/'.$val['prev'].'/'.$val['prevCount']) ?>" <?php }else{ ?>onclick="alert('No Previous Group Present.');"<?php } ?>><span class="menu_icon"><i  style="font-size:40px" class="material-icons">fast_rewind</i></span></a>
                                                <a href="<?= site_url('admin/view/urgentAttention/'.$val['id']) ?>"><span class="menu_icon" style="font-size: 20px;"><strong><?= $val['groupName'] ?></strong></span></a>
                                                <a style="float:right" <?php if($val['next'] > 0){ ?> href="<?= site_url('admin/view/urgentAttention/'.$val['next'].'/'.$val['nextCount']) ?>" <?php }else { ?>onclick="alert('No Next Group Present.');"<?php } ?>><span class="menu_icon"><i style="font-size:40px"  class="material-icons">fast_forward</i></span></a>
                                            </p>
                                            <p style="text-align: center">
                                               <?php $first = 1; if($val['prev'] == 0){ echo $first; $first = $first+1; }
                                                                    else if($val['next'] == 0){ echo $val['count'][0]['total']; }
                                                                    else if($val['next'] != 0 && $val['prev'] != 0){ 
                                                                            $first = $first+$val['nextCount']; 
                                                                            echo $first; } ?> of <?= $val['count'][0]['total'] ?> groups
                                            </p>
                                            <br/>
                                            <br/>
                                            <?php if(!empty($msg)){ ?>
                                                <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                                                <br/>
                                                <br/>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-6"><strong>Group Name : </strong></div>
                                                <div class="col-md-3 col-sm-6 col-xs-6"><?= $val['groupName'] ?></div>
                                                <div class="col-md-3 col-sm-6 col-xs-6"><strong>Date Created : </strong></div>
                                                <div class="col-md-3 col-sm-6 col-xs-6"><?= date('d-M-Y', strtotime($val['createdAt'])) ?></div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-6">
                                                    <strong>General-In-Charge : </strong>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-6">
                                                    <?php 
                                                        $generalInCharges = explode(',', $val['generalInCharge']);
                                                        foreach($generalInCharges as $GIC) {
                                                        ?>
                                                        <div class="row"><div class="col-md-8"><?= $GIC; ?></div><div class="col-md-4"></div></div><br/>
                                                        <?php
                                                        }
                                                    ?>
                                                </div>
                                                <div class="col-md-5 col-sm-6 col-xs-6">
                                                    <div class="col-md-4">
                                                    <a onclick="deleteConff('<?= site_url('admin/deleteMempacasGroup/mempacasGroup/'.$val['id']."/createMempacasGroup") ?>')" class="btn btn-danger">Delete Group</a>  
                                                    </div>
                                                    <div class="col-md-4">
                                                    <button data-target="#assignGeneral<?= $val['id'] ?>" data-toggle="modal" href="#" class="btn btn-primary">Add General</button>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <button data-target="#addMember<?= $val['id'] ?>" data-toggle="modal" href="#" class="btn btn-success">Add Member</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="uk-article-divider">
                                            <p>
                                                <div class="table-responsive">
                                                    <span style="float : right;"><a onclick="basicDownload('<?= site_url('home/save_pdf_urgent_mempacas/'.$val['id']) ?>', 1)" title="Download PDF"><i class="md-icon material-icons">attach_file</i></a> | 
                                                    <a onclick="basicDownload('<?= site_url('home/save_full_pdf_urgent_mempacas') ?>', 0)" title="Full PDF Download"><i class="md-icon fa fa-file-pdf-o"></i></a></span>
                                                    <table class="table table-hover table-striped" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>S/No          </th>
                                                        <th>Members Name       </th>
                                                        <th>Members Number </th>
                                                        <th data-step="3" data-intro="Click on watch to be a part of event">Last Contact Date</th>
                                                        <th data-step="2" data-intro="Status of the event">Members Response</th>
                                                        <th>Special Prayers</th>
                                                        <th>Comments</th>
                                                        <th>Senior Pastor To Follow Up</th>
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $members = explode(',', $val['membersId']); ?>
                                                    <?php $i=1; foreach($members as $val1){ ?>
                                                        <?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $val1)); ?>
                                                        <?php if($mempacasGroupMember[0]['seniorPastorToFollowUp']){ ?>
                                                        <?php $membersDetail = $this->data->fetch('member', array('id' => $val1)); ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td><?= $membersDetail[0]['mobileNo'] ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['lastContactDate'])){ 
                                                                        echo 'Not Yet Contacted'; 
                                                                    }else{ 
                                                                        echo date('d-m-Y', strtotime($mempacasGroupMember[0]['lastContactDate'])); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['memberResponse'])){ 
                                                                        echo 'No Response'; 
                                                                    }else{ 
                                                                    ?>
                                                                        <?php if(strlen($mempacasGroupMember[0]['memberResponse']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['memberResponse']),0,50), 20, "<br>\n"); ?> <a href="#" data-target="#memberResponse<?= $mempacasGroupMember[0]['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a> <?php }else{ echo wordwrap($mempacasGroupMember[0]['memberResponse'], 20, "<br/>\n"); } ?> 
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['memberResponse']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['specialPrayerRequest'])){ 
                                                                        echo 'No Prayer Requested'; 
                                                                    }else{
                                                                    ?>
                                                                    <?php if(strlen($mempacasGroupMember[0]['specialPrayerRequest']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['specialPrayerRequest']),0,50), 20, "<br>\n"); ?> <a href="#" data-target="#specialPrayer<?= $mempacasGroupMember[0]['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a><?php }else{ echo wordwrap($mempacasGroupMember[0]['specialPrayerRequest'], 20, "<br/>\n"); }?> 
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['specialPrayerRequest']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['comment'])){ 
                                                                        echo 'No Comment'; 
                                                                    }else{ 
                                                                    ?>
                                                                    <?php if(strlen($mempacasGroupMember[0]['comment']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['comment']),0,50), 20, "<br>\n"); ?> <a href="#" data-target="#comment<?= $mempacasGroupMember[0]['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a><?php }else{ echo wordwrap($mempacasGroupMember[0]['comment'], 20, "<br/>\n"); } ?> 
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['comment']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['seniorPastorToFollowUp']) || $mempacasGroupMember[0]['seniorPastorToFollowUp'] == 0){ echo 'No'; }else{ echo 'Yes'; } ?></td>
                                                            <td><a href="#" data-target="#contactMember<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-user" title="Contact Member"></i></a> 
                                                            | <a data-target="#assignGroup<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-tasks" title="Reassign Group"></i></a> 
                                                            | <a data-target="#sendSMS<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-share" title="Send SMS."></i></a> 
                                                            | <a data-target="#sendEmail<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-envelope-o" title="Send Email"></i></a>
                                                            | <a onclick="deleteConff('<?= site_url('admin/deleteMemberMempacasGroup/mempacasGroup/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php $i++; }} ?>
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
        
    function fullDownload1(link) {
        alert('hello');
        var a = '<div id="confirmFullDownload" class="uk-modal">'+
                '<div class="uk-modal-dialog">'+
                '<div class="uk-modal-header">'+
                '<h3>Are you sure you want to Download the full data of all groups?</h3>'+
                '</div>'+
                '<div class="uk-modal-footer">'+
                '<button class="md-btn md-btn-primary uk-modal-close">No</button>'+
                '<a href="'+link+'" class="md-btn md-btn-danger">Yes</a>'+
                '</div>'+
                '</div>'+
                '</div>';
        $(".conf").html(a);
        var modal = UIkit.modal("#confirmFullDownload").show();
    }
    }
</script>
<?php $members = explode(',', $val['membersId']); ?>
<?php foreach($mempacasGroup as $val6){ ?>
<?php $membersDetail = $this->data->myquery('SELECT * FROM `member` WHERE `mempacasGroup` IS NULL AND `isGeneralInCharge` = 0'); ?>
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
                    <form method="post" action="<?= site_url('admin/addNewMember') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="hidden" name="membersIdOld" value="<?= $val6['membersId'] ?>"/>
                                    <input type="hidden" name="membersNameOld" value="<?= $val6['membersName'] ?>"/>
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
<?php foreach($mempacasGroup as $val5){ ?>
<?php $membersDetail = $this->data->myquery('SELECT * FROM `member` WHERE `mempacasGroup` IS NULL'); ?>
    <div class="modal fade in" id="assignGeneral<?= $val5['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
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
                                    <input type="hidden" name="generalInChargeName" value="<?= $val5['generalInCharge'] ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>General In Charge:</strong>
                                </div>
                                <div class="col-md-8">
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
                                    <p>"Shalom <?= $membersDetail[0]['fname'] ?>",</p>
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
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i]));?>
    <div class="modal fade in" id="assignGroup<?= $members[$i] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
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
                    <form method="post" action="<?= site_url('admin/reassignGroup') ?>">
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
                                <?php $mempacasGroup = $this->data->fetch('mempacasGroup'); ?>
                                <div class="col-md-7">
                                    <select name="mempacasGroup">
                                        <option value="">Select Group</option>
                                        <?php foreach($mempacasGroup as $group){ ?>
                                        <option value="<?= $group['id'] ?>"><?= $group['groupName'] ?></option>
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

<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <div class="modal fade in" id="contactMember<?= $membersDetail[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Contact Member
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/insertContactMembers') ?>">
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
                                    <strong>Members Response :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="memberResponse" id="memberResponse" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Special Prayer :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="specialPrayerRequest" id="specialPrayerRequest" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Comment: </strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="comment" id="comment" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Senior Pastor Follow Up: </strong>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-2"><input type="radio" name="seniorPastorToFollowUp" value="yes" class="form-control"/> Yes </div>
                                    <div class="col-md-3"><input type="radio" name="seniorPastorToFollowUp" value="no" class="form-control"/> No</div>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" name="groupId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" name="generalId" value="<?php print_r($this->session->userdata('userAdmin')[0]['id']);  ?>"/>
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
<?php } ?>
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