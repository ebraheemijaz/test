<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Verification</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Page Verification<span style="float : right;">
                        <!--<a  onClick="printDiv('ajaxResponse');"><i class="fa fa-print md-icon"></i></a>-->
                        <!--<a href="<?= site_url('admin/save_notification_pdf/pageVerification') ?>" id="pdfUrl"><i class="fa fa-file-pdf-o md-icon"></i></a>-->
                        <!--<a onclick="openProfile()"><i class="md-icon material-icons" style="color: red;">add_box</i></a>-->
        </span></header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <input type="date" class="form-control col-md-4" id="fromDate" name="fromDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control col-md-4" id="toDate" name="toDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-4">
                                                <button type="button" id="search" class="btn btn-success">Search</button>
                                            </div>
                                            <!--<div class="col-md-8" id="pdfDiv" style="display: none;">-->
                                            <!--    <a href="" id="pdfUrl2"><i class="fa fa-file-pdf-o md-icon"></i></a>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div id="ajaxResponse">
                                    <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Recent Activity Date</td>
                                    <td>Member</td>
                                    <td>Business Page</td>
                                    <td>Report</td>
                                    <td>Status</td>
                                    <td>Correspondence</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x=1; foreach($page_req as $val){ ?>
                                    <tr>
                                        <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                        <td><a href="<?= site_url('admin/view/edit_member/'.$val['user_id']) ?>"><?= $val['name'] ?></a></td>
                                        <td><a href="<?= site_url('business/'.$val['user_id']) ?>" target="_blank"><span class="btn btn-info">Go To Page</span></a></td>
                                        <td><a onclick="report('<?= $val['id'] ?>')">Report</a></td>
                                        <td>
                                            <?php if($val['status'] == 'active'){ ?>
                                                <span class="btn btn-success">Active</span>
                                            <?php } ?>
                                            <?php if($val['status'] == 'suspend'){ ?>
                                                <span class="btn btn-danger">Suspend</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php $smsPage = $this->data->myquery('SELECT * FROM `smsPage` WHERE `to` = '.$val["user_id"].' ORDER BY `id` DESC');
                                                if(count($smsPage)){
                                                ?>
                                                <span><?= $smsPage[0]['msg'] ?></span><br/><small><a  data-toggle="modal" data-target="#myModal<?= $val['user_id'] ?>">View</a></small>
                                                <div id="myModal<?= $val['user_id'] ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
        
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" style="margin-top: -17px;">&times;</button>
                                                                <h4 class="modal-title"><?= $val['title'] ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="md-card-content padding-reset">
                                                                        <div class="chat_box_wrapper">
                                                                            <div class="chat_box touchscroll chat_box_colors_a" style="height: 300px" id="chat">
                                                                                <div class="chat_message_wrapper">
                                                                                    <p style="text-align:center;font-size:20px;">
                                                                                        <?php 
                                                                                            $smsPage = $this->data->myquery('SELECT * FROM `smsPage` WHERE `to` = '.$val["user_id"].' ORDER BY `id` DESC');
                                                                                            if(empty($smsPage)){
                                                                                                echo "No SMS Sent.";
                                                                                            }else{
                                                                                                foreach($smsPage as $row){
                                                                                            ?>
                                                                                                <div class="chat_message_wrapper chat_message_right">
                                                                                                    <div class="chat_user_avatar">
                                                                                                        <img class="md-user-image" src="https://demo.mmsonline.website/assets_f/img/business/avatar.jpg" alt="">
                                                                                                    </div>
                                                                                                    <ul class="chat_message">
                                                                                                        <li>
                                                                                                            <p><?= $row['msg']; ?></p>
                                                                                                            <!--<span class="chat_message_time"><?= $this->data->fetch('credentials', array('id' => $row['admin_id']))[0]['name']; ?></span>-->
                                                                                                            <span class="chat_message_time"><?= $row['createdAt']; ?></span>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            <?php
                                                                                                }
                                                                                            }
                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
        
                                                    </div>
                                                </div>
                                                <?php
                                                }else{
                                                    echo 'No SMS Send.';
                                                }
                                            ?>
                                        </td>
                                        <td><a onclick="sendSMS(<?= $val['id'] ?>)"><i class="fa fa-space-shuttle fa-2x" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php $x++; } ?>
                            </tbody>
                        </table>
                                </div>
                        </div>
                        </div>
                        <div class="row"></div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="conf"></div>
</section>
<script>
    function sendSMS(id) {
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Send customised SMS" + 
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url() ?>/admin/sendSMS/businessPage' method='post'>"+
                "<div class='row'>"+
                    "<div class='form-group'>"+
                        "<label class='col-md-4'>Compose Message</label>"+
                        "<input type='hidden' name='pageId' class='form-control col-md-6' value='"+id+"'>"+
                        "<textarea class='form-control' name='msg'></textarea>"+
                    "</div>"+
                "</div>"+
                "<div class='row'>"+
                    "<button type='submit' class='btn btn-success'><i class='fa fa-paper-plane'></i></button>"+
                "</div>"+
            "</form>"+
            // "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            // "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function report(id){
        $("#newModal"+id).modal("toggle");
    }
    
    function printDiv(divName) {
        var review = "<br/>Comment:</br>";
        review += $("textarea").val();
        $("#rev").html(review);
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    
    $('#search').click(function(){
        var toDate = $('#toDate').val();
        var fromDate = $('#fromDate').val();
        var d1 = new Date();
        var joiningDate = "";
        if(toDate >= fromDate){
            $.ajax({
                url: "<?= site_url('admin/notification') ?>/pageVerification",
                type: "POST",
                data: {toDate:toDate,fromDate:fromDate},
                success: function(e){
                    console.log(e);
                    $('#ajaxResponse').html(e);
                    newPdfUrl = "<?= site_url('admin/save_notification_pdf_basedon_date/pageVerification') ?>"+"/"+fromDate+"/"+toDate;
                    // $('#pdfUrl').attr('href', newPdfUrl);
                    // $('#pdfDiv').css('display', 'block');
                    // $('#pdfUrl2').attr('href', newPdfUrl);
                    $('#myTable').DataTable({aaSorting: [[0, "desc"]]}).Draw();
                }
            });
        }else{
            alert('To Date must be greater or equal to from date.');
        }
    });
</script>
<?php $x = 1; foreach($page_req as $val){ ?>
        <p style="word-break: break-all">
            <?php $ques =  json_decode($val['questions'],true); ?>
            <?php if(!empty($ques) AND is_array($ques)){ ?>
                <?php $i=1; foreach($ques as $vala){ ?>
                    <p style="font-weight: bold">Question # <?= $i ?></p>
                    <p><?= $vala ?></p>
                    <?php $i++; } ?>
            <?php } ?>
        </p>

<div style="" class="modal fade bs-example-modal-md in" id="newModal<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                    Reports
                </h4>
            </div>
            <div class="modal-body">
                <table  class="table table-hover">
                    <thead>
                        <th>Name</th><th>Phone</th><th>Email</th><th>Reason</th>
                    </thead>
                    <tbody>
                <?php
                    $bugReport = $this->data->fetch('bugReport', array('pageId' => $val['id']));
                    if(count($bugReport)){
                        foreach($bugReport as $bug){
                    ?>
                    <tr>
                        <td><?= $bug['name'] ?></td><td><?= $bug['phoneNo'] ?></td><td><?= $bug['email'] ?></td><td><?= $bug['reason'] ?></td>
                    </tr>
                    <?php
                        }
                    }else{
                    ?>
                    <tr>
                        <td colspan="4">No Report Found.</td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $x++; } ?>
