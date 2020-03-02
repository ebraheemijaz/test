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
                                                <a style="float: left" <?php if($val['prev'] > 0){ ?> href="<?= site_url('admin/view/viewMempacasGroup/'.$val['prev'].'/'.$val['prevCount']) ?>" <?php }else{ ?>onclick="alert('No Previous Group Present.');"<?php } ?>><span class="menu_icon"><i  style="font-size:40px" class="material-icons">fast_rewind</i></span></a>
                                                <a href="<?= site_url('admin/view_mempacas_group/'.$val['id']) ?>"><span class="menu_icon" style="font-size: 20px;"><strong><?= $val['groupName'] ?></strong></span></a>
                                                <a style="float:right" <?php if($val['next'] > 0){ ?> href="<?= site_url('admin/view/viewMempacasGroup/'.$val['next'].'/'.$val['nextCount']) ?>" <?php }else { ?>onclick="alert('No Next Group Present.');"<?php } ?>><span class="menu_icon"><i style="font-size:40px"  class="material-icons">fast_forward</i></span></a>
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
                                                <div class="col-md-3"><strong>Group Name : </strong></div>
                                                <div class="col-md-3"><?= $val['groupName'] ?></div>
                                                <div class="col-md-3"><strong>Date Created : </strong></div>
                                                <div class="col-md-3"><?= date('d-M-Y', strtotime($val['createdAt'])) ?></div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>General-In-Charge : </strong>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $generalInCharges = explode(',', $val['generalInCharge']);
                                                        foreach($generalInCharges as $GIC) {
                                                        ?>
                                                        <div class="row"><div class="col-md-8"><?= $GIC; ?></div><div class="col-md-4"></div></div><br/>
                                                        <?php
                                                        }
                                                    ?>
                                                </div>
                                                <div class="col-md-5">
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
                                                    <?php site_url('admin/save_pdf_mempacas/'.$val['id']) ?>
                                                    <!--href='<?= site_url('admin/save_full_pdf_mempacas') ?>'-->
                                                    <span style="float : right;"><a  href="#" data-target="#basicPdf<?= $val['id'] ?>" data-toggle="modal" title="Download PDF"><i class="md-icon material-icons">attach_file</i></a> | 
                                                    <a href="#" data-target="#fullPdf" data-toggle="modal" title="Full PDF Download"><i class="md-icon fa fa-file-pdf-o"></i></a></span>
                                                    <div id="updateMempacas">
                                                    <table id="myTableMempacas" class="table table-hover table-striped" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <!--<th>S/No          </th>-->
                                                        <th>Members Name       </th>
                                                        <th>Members Number </th>
                                                        <th data-step="3" data-intro="Click on watch to be a part of event">Date Posted</th>
                                                        <th data-step="2" data-intro="Status of the event">Members Response</th>
                                                        <th>Special Prayers</th>
                                                        <th>Comments</th>
                                                        <th>Senior Pastor To Follow Up</th>
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $members = explode(',', $val['membersId']); ?>
                                                    <?php $i=1; $modifiedMonth = date('Y-m%'); foreach($members as $val1){ ?>
                                                        <?php if ($val1==''){continue;};$mempacasGroupMember = $this->data->myquery('SELECT * FROM `mempacasMemerResponse` WHERE `createdAt` like ("'.$modifiedMonth.'") and memberId = '.$val1.' ORDER BY createdAt DESC'); ?>
                                                        <?php $membersDetail = $this->data->fetch('member', array('id' => $val1)); ?>
                                                        <?php if(count($membersDetail)==0){continue;} ?>
                                                        <tr>
                                                            <!--<td><?= $i; ?></td>-->
                                                            <!--<td><?= count($membersDetail); ?></td>-->
                                                            <td><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td><?= $membersDetail[0]['mobileNo'] ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['createdAt'])){ 
                                                                        echo 'Not Yet Contacted'; 
                                                                    }else{ 
                                                                        echo date('d-m-Y', strtotime($mempacasGroupMember[0]['createdAt'])); 
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
                                                            <td><a href="#" data-target="#editComment<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                                            <!--| <a href="#" data-target="#contactMember<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-user" title="Contact Member"></i></a> -->
                                                            | <a data-target="#assignGroup<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-tasks" title="Reassign Group"></i></a> 
                                                            | <a data-target="#sendSMS<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-share" title="Send SMS."></i></a> 
                                                            | <a data-target="#sendEmail<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-envelope-o" title="Send Email"></i></a>
                                                            | <a onclick="deleteConff('<?= site_url('admin/deleteMemberMempacasGroup/mempacasGroup/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php $i++; } ?>
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
<?php $members = explode(',', $val['membersId']);?>
<?php foreach($mempacasGroup as $val6){ ?>
<?php $membersDetail = $this->data->myquery('SELECT * FROM `member` WHERE `mempacasGroup` IS NULL ORDER BY lname'); ?>
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
<?php $membersDetail = $this->data->myquery('SELECT * FROM `member` ORDER BY lname'); ?>
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
                                    <p>"<strong>Shalom</strong> <?= $membersDetail[0]['fname'] ?>",</p>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Send Email :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="msg" id="msgEmail" maxlength="200"></textarea>
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
                                    <textarea name="msg" id="msg" maxlength="200"></textarea>
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
                                    <textarea name="memberResponse" id="memberResponseAdd" maxlength="200"></textarea>
                                    <p>
                                        <span id="addMemberResponse">200</span> characters
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Special Prayer :</strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="specialPrayerRequest" id="specialPrayerRequestAdd" maxlength="200"></textarea>
                                    <p>
                                        <span id="addSpecialPrayerRequest">200</span> characters
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Comment: </strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="comment" id="commentAdd"maxlength="200"></textarea>
                                    <p>
                                        <span id="addComment">200</span> characters
                                    </p>
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
                                    <option value="">Select Month</option>
                                    <?php foreach($months as $key => $mon){ ?>
                                        <option value="<?= $mon ?>"><?= $mon ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button>
                            <a href='<?= site_url('admin/save_full_pdf_mempacas') ?>' id="generateFullPdfHref"><span class='btn btn-danger'>Generate PDF</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $members[$i])); ?>
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
                                    <option value="">Select Month</option>
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
    <div class="modal fade in" id="editComment<?= $membersDetail[0]['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Edit Comment
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('admin/editMempacasComment') ?>" id="formEditComment">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Select Month:</strong>
                                </div>
                                <div class="col-md-7">
                                    <?php
                                        // for ($i = 0; $i < 12; $i++) {
                                            // $months[] = date("Y-M", strtotime( date( 'Y-M-01' )." -$i months"));
                                        // }
                                    ?>
                                    <select class="chosen-select md-input" name="genPdf" id="genPdfEdit">
                                        <!--<option value="">Select Month</option>-->
                                        <?php foreach($months as $key => $mon){ ?>
                                            <option value="<?= $mon ?>"><?= $mon ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
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
                                    <textarea name="memberResponse" required value="<?= $mempacasGroupMember[0]['memberResponse'] ?>" id="memberResponseEdit" maxlength="200"><?= $mempacasGroupMember[0]['memberResponse'] ?></textarea>
                                    <p>
                                    <span id="remainingMemResp">200</span> Characters
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Special Prayer :</strong>
                                </div>
                                <div class="col-md-7"> 
                                    <textarea name="specialPrayerRequest" required value="<?= $mempacasGroupMember[0]['specialPrayerRequest'] ?>" id="specialPrayerRequestEdit" maxlength="200"><?= $mempacasGroupMember[0]['specialPrayerRequest'] ?></textarea>
                                    <p>
                                    <span id="remainingSpecial">200</span> Characters
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Comment: </strong>
                                </div>
                                <div class="col-md-7">
                                    <textarea name="comment" required value="<?= $mempacasGroupMember[0]['comment'] ?>" id="commentEdit" maxlength="200"><?= $mempacasGroupMember[0]['comment'] ?></textarea>
                                    <p>
                                    <span id="remainingComment">200</span> Characters
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Senior Pastor Follow Up: </strong>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-2"><input type="radio" required name="seniorPastorToFollowUp" value="yes" class="form-control"/> Yes </div>
                                    <div class="col-md-3"><input type="radio" required name="seniorPastorToFollowUp" value="no" class="form-control"/> No</div>
                                </div>
                            </div>
                            <br/>
                            <input type="hidden" id="memberIdEdit" name="memberId" value="<?= $membersDetail[0]['id'] ?>"/>
                            <input type="hidden" id="groupIdEdit" name="groupId" value="<?= $val['id'] ?>"/>
                            <input type="hidden" id="generalIdEdit" name="generalId" value="<?php print_r($this->session->userdata('userAdmin')[0]['id']);  ?>"/>
                            <input type="hidden" id="mgmId" name="mgmId" value="<?= $mempacasGroupMember[0]['id'] ?>"/>
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
    
    var $remainingMemResp = $('#remainingMemResp');
    $('#memberResponseEdit').keyup(function() {
        var chars = this.value.length,
        messages = Math.ceil(chars / 200),
        remaining  = messages * 200 - (chars % (messages * 200) || messages * 200);
        $remainingMemResp.text(remaining );
    });
    
    var $remainingSpecial = $('#remainingSpecial');
    $('#specialPrayerRequestEdit').keyup(function(){
        var charsSpecial = this.value.length,
        messageSpecial = Math.ceil(charsSpecial/200),
        remainingSpecial = messageSpecial * 200 - (charsSpecial % (messageSpecial * 200) || messageSpecial * 200);
        $remainingSpecial.text(remainingSpecial);
    });
    
    var $remainingComment = $('#remainingComment');
    $('#commentEdit').keyup(function(){
        var charsComment = this.value.length;
        messageComment = Math.ceil(charsComment / 300);
        remainingComment = messageComment * 300 - (charsComment % (messageComment * 300) || messageComment * 300);
        $remainingComment.text(remainingComment);
    });
    
    var $remainingMemResp1 = $('#addMemberResponse');
    $('#memberResponseAdd').keyup(function() {
        var chars1 = this.value.length,
        messages1 = Math.ceil(chars1 / 200),
        remaining1  = messages1 * 200 - (chars1 % (messages1 * 200) || messages1 * 200);
        $remainingMemResp1.text(remaining1 );
    });
    
    var $remainingSpecial1 = $('#addSpecialPrayerRequest');
    $('#specialPrayerRequestAdd').keyup(function(){
        var charsSpecial1 = this.value.length,
        messageSpecial1 = Math.ceil(charsSpecial1/200),
        remainingSpecial1 = messageSpecial1 * 200 - (charsSpecial1 % (messageSpecial1 * 200) || messageSpecial1 * 200);
        $remainingSpecial1.text(remainingSpecial1);
    });
    
    var $remainingComment1 = $('#addComment');
    $('#commentAdd').keyup(function(){
        var charsComment1 = this.value.length;
        messageComment1 = Math.ceil(charsComment1 / 300);
        remainingComment1 = messageComment1 * 300 - (charsComment1 % (messageComment1 * 300) || messageComment1 * 300);
        $remainingComment1.text(remainingComment1);
    });
    
    var table = $("#myMempacas").DataTable({
           "paging": false,
           "ordering": false,
           "searching": false
        });
</script>

<!-- memberResponse Modal -->
<?php $members = explode(',', $val['membersId']);?>
<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $mempacasGroupMember = $this->data->fetch('mempacasMemerResponse', array('memberId' => $members[$i])); ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
<?php foreach($mempacasGroupMember as $MGM){ ?>
    <div class="modal fade in" id="memberResponse<?= $MGM['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
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
                    <p><?= $MGM['memberResponse'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
<?php } ?>

<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $mempacasGroupMember = $this->data->fetch('mempacasMemerResponse', array('memberId' => $members[$i])); ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
    <?php foreach($mempacasGroupMember as $MGM){ ?>
    <div class="modal fade in" id="specialPrayer<?= $MGM['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
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
                    <p><?= $MGM['specialPrayerRequest'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
<?php } ?>

<?php for($i = 0; $i < count($members); $i++){ ?>
<?php $mempacasGroupMember = $this->data->fetch('mempacasMemerResponse', array('memberId' => $members[$i])); ?>
<?php $membersDetail = $this->data->fetch('member', array('id' => $members[$i])); ?>
<?php foreach($mempacasGroupMember as $MGM){ ?>
    <div class="modal fade in" id="comment<?= $MGM['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
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
                    <p><?= $MGM['comment'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php } ?>
<script>
    $('#genPdf').on('change', function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var url = '<?= site_url('home/save_pdf_mempacas_month/'.$val['id']) ?>'+'/'+month;
        $.post("<?= site_url('admin/getMempacasResult'); ?>", {month: month, groupId: groupId}, function (e) {
            $('#updateMempacas').html(e);
            $('#pdfGen').attr('href', url);
            $('#myTableMempacas').DataTable().order([[ 0, 'desc' ]]).draw(false);
        });
    });
    
    $('#genPdfEdit').on('change',function(){
        var month = $(this).val();
        var groupId = '<?= $val['id'] ?>';
        var memberId = $('#memberIdEdit').val();
        $.post('<?= site_url('admin/getMonthlyEditComment/'); ?>', {month: month, groupId: groupId, memberId: memberId}, function(e) {
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
    
    $('#genFullMonthlyPdf').on('change', function(){
        var month = $(this).val();
        var url = '<?= site_url('admin/save_full_pdf_mempacas') ?>'+'/'+month;
        $('#generateFullPdfHref').attr('href', url);
    });
</script>