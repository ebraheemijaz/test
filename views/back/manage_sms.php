
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">History</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">SMS History</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3" style="background-color: #21c480;border-radius: 4px; box-shadow: none;border: none;margin-left: 4px; margin-right: 4px; width: 20%;">
                                            <span><small>Total Credit</small> : </br><?= $this->data->fetch('bucket')[0]['qty'] ?></span>
                                        </div>
                                        <div class="col-md-3" style="background-color: #90c421;border-radius: 4px; box-shadow: none;border: none;margin-left: 4px; margin-right: 4px; width: 20%;">
                                            <span><small>Total Credit Sent</small> : <br/><?= $this->data->myquery('SELECT 2 * SUM(`sentSMSCount`) as total FROM `sms`')[0]['total']; ?></span>
                                        </div>
                                        <div class="col-md-3" style="background-color: #231f1f; color: #fff;border-radius: 4px; box-shadow: none;border: none;margin-left: 4px; margin-right: 4px; width: 20%;">
                                            <span><small>Total Credit Left</small> : <br/><?= $this->data->fetch('bucket')[0]['qty'] - $this->data->myquery('SELECT 2 * SUM(`sentSMSCount`) as total FROM `sms`')[0]['total']; ?></span>
                                        </div>
                                        <div class="col-md-3" style="background-color: #c42121;color: #fff;border-radius: 4px; box-shadow: none;border: none;margin-left: 4px; margin-right: 4px; width: 20%;">
                                            <span><small>Total Credit deleted</small> : <br/><?= $this->data->myquery('SELECT 2 * SUM(`sentSMSCount`) as total FROM `sms` WHERE `deleted` = "1"')[0]['total']; ?></span>
                                        </div>
                                    </div>
                                </div>
                        <table id="myTableSMS" class="table table-hover">
                            <thead>
                            <tr>
                                <td width="20%">Date</td>
                                <td width="20%">Scheduled Date</td>
                                <td>Message Sent</td>
                                <td>To Whom</td>
                                <td>Total SMS Unit</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($sms as $val){ if($val['deleted'] == 0){ ?>
                                <tr <?php if($val['scheduleDate'] != '0000-00-00 00:00:00'){?> style="background-color: #42f4bf;" <?php } ?>>
                                    <td width="20%"><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                    <td width="20%"><?php if($val['scheduleDate'] == '0000-00-00 00:00:00'){ echo 'N/A'; }else{ echo date('d-M-Y', strtotime($val['scheduleDate'])); } ?></td>
                                    <td><?php if($val['msg'] == 'Child Birthday SMS.' || $val['msg'] == 'Birthday SMS.'){
                                            echo $val['msg'];
                                        }else{
                                            if(strlen($val['msg']) >= 100){
                                        ?>
                                        <?= substr(strip_tags($val['msg']),0,100); ?> <a href="#" data-target="#details<?= $val['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a> 
                                        <?php
                                            }else{
                                                echo $val['msg'];
                                            }
                                        } ?></td>
                                    <td>
                                        <?php
                                            if($val['churchGroup'] != NULL){
                                                echo $this->data->fetch('churchgroup', array('id' => $val['churchGroup']))[0]['name'];
                                            }else if($val['businessGroup'] != NULL){
                                                echo $this->data->fetch('businessgroup', array('id' => $val['businessGroup']))[0]['name'];
                                            }else if($val['to'] != NULL){
                                                $member = explode(',', $val['to']);
                                                $countMember = count($member);
                                                if($countMember <= 10 && $val['to'] != 'All Members'){
                                                    echo $val['to'];
                                                }else if($val['to'] == 'All Members'){
                                                    echo $val['sentSMSCount']; ?><br/><small><a href="#" data-target="#showMember<?= $val['id'] ?>" data-toggle="modal">View</a></small><?php
                                                }else{
                                                    echo $countMember; ?><br/><small><a href="#" data-target="#showMember<?= $val['id'] ?>" data-toggle="modal">View</a></small><?php
                                                }
                                            }else{
                                                echo 'N/A';
                                            }
                                        ?>
                                    </td>
                                    <td><?= $val['sentSMSCount'] * 2 ?></td>
                                    <td><?php if($val['systemGenerated'] == '0'){ ?><a href="<?= site_url('admin/view/edit_sms') ?>/<?= $val['id'] ?>"><i class="fa fa-refresh" title="Resend SMS"></i></a> | <?php } ?> <a onclick="deleteConff('<?= site_url('admin/deleteSMS/sms/'.$val['id']."/same") ?>')" link="<?= site_url('admin/delete/sms/'.$val['id']."/same") ?>"><i class="fa fa-trash"></i></a></td>
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
<div class="conf"></div>
<?php foreach($sms as $val){ ?>
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

<?php foreach($sms as $val){ ?>
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
                            if($val['to'] != 'All Members'){
                            $members = explode(',', $val['to']);
                            foreach($members as $mem){
                            ?>
                            <div class="col-md-3" style="border: 1px solid #000;">
                                <?= $mem; ?>
                            </div>
                            <?php
                            }
                            }else{
                                $members = explode(',', $val['toId']);
                                foreach($members as $mem){
                                    $member = $this->data->fetch('member', array('id' => $mem));
                                ?>
                                <div class="col-md-3" style="border: 1px solid #000;">
                                    <?= $member[0]['fname']; ?>
                                </div>
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

