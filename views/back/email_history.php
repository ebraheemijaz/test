
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Email History</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Email History</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <!--<td>#</td>-->
                                <td>Date</td>
                                <td>Scheduled Date</td>
                                <td width="30%">Email Sent</td>
                                <td>To Whom</td>
                                <td width="15%">Action</td>
                                <!--<td>Business Group</td>-->
                                <!--<td>Church Group</td>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($emailHistory as $val){ ?>
                                <tr <?php if($val['scheduleDate'] != '0000-00-00 00:00:00'){?> style="background-color: #42f4bf;" <?php } ?>>
                                    <!--<td><?= $i; ?></td>-->
                                    <td><?= date("d-M-Y H:i:s",strtotime($val['createdAt'])); ?></td>
                                    <td width="20%"><?php if($val['scheduleDate'] == '0000-00-00 00:00:00'){ echo 'N/A'; }else{ echo date('d-M-Y', strtotime($val['scheduleDate'])); } ?></td>
                                    <td><?php
                                            if(strlen($val['msg']) >= 100){
                                            ?>
                                            <?= substr(strip_tags($val['msg']),0,100); ?> <a href="#" data-target="#details<?= $val['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a> 
                                            <?php
                                            }else{
                                            echo $val['msg'];
                                            }
                                        ?>
                                        </td>
                                    <td><?php
                                        $member = explode(',', $val['member']);
                                        $countMember = count($member);
                                    if($val['churchGroup'] != NULL){ 
                                        echo $this->data->fetch('churchgroup', array('id' => $val['churchGroup']))[0]['name']; 
                                    }
                                    else if($val['businessGroup'] != NULL){ 
                                        echo $this->data->fetch('businessgroup', array('id' => $val['businessGroup']))[0]['name']; 
                                    }
                                    else if($val['member'] != NULL){ 
                                        if($countMember <= 10){
                                            echo $val['member'];
                                        }else{
                                            echo $countMember; ?><br/><small><a href="#" data-target="#showMember<?= $val['id'] ?>" data-toggle="modal">View</a></small><?php
                                        }
                                        // echo $val['member']; 
                                    } ?></td>
                                    <td><?php if($val['systemGenerated'] == '0'){ ?><a href="<?= site_url('admin/view/edit_email_history') ?>/<?= $val['id'] ?>"><i class="fa fa-refresh" title="Resend Email"></i></a> | <?php } ?><a href="<?= site_url('admin/read_email/'.$val['id']) ?>"><i class="fa fa-eye"></i></a> | <a onclick="deleteConff('<?= site_url('admin/delete/email/'.$val['id']."/same") ?>')" link="<?= site_url('admin/delete/email/'.$val['id']."/same") ?>"><i class="fa fa-trash"></i></a></td>
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
</script>
<?php foreach($emailHistory as $val){ ?>
    <div class="modal fade in" id="details<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Details
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $val['msg'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php foreach($emailHistory as $val){ ?>
    <div class="modal fade in" id="showMember<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Show All Members
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php 
                                $members = explode(',', $val['members']);
                                foreach($members as $mem){
                                    $member = $this->data->fetch('member', array('id' => $mem));
                                ?>
                                <div class="col-md-3" style="border: 1px solid #000;">
                                    <?= $member[0]['fname']; ?>
                                </div>
                                <?php
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="conf"></div>