<style>
    .chosen-container {
        width: 100% !important;
    }
</style>
<?php $members = $this->data->fetch('member', array('status' => 'active')); ?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Prayers</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Prayer Requests<span style="float : right;">
                        <!--<a  onClick="printDiv('ajaxResponse');"><i class="fa fa-print md-icon"></i></a>-->
                        <a href="<?= site_url('admin/save_notification_pdf/prayerRequest') ?>" id="pdfUrl"><i class="fa fa-file-pdf-o md-icon"></i></a>
                        <!--<a onclick="openProfile()"><i class="md-icon material-icons" style="color: red;">add_box</i></a>-->
        </span></header>
                    <div class="panel-body">
                        <br/>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Enter From Date" onfocus="this.type='date'" class="form-control col-md-4" id="fromDate" name="fromDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Enter To Date" onfocus="this.type='date'" class="form-control col-md-4" id="toDate" name="toDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-4">
                                                <button type="button" id="search" class="btn btn-success">Search</button>
                                            </div>
                                            <div class="col-md-8" id="pdfDiv" style="display: none;">
                                                <a href="" id="pdfUrl2"><i class="fa fa-file-pdf-o md-icon"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ajaxResponse">
                                    <table id="myTable" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>Member</td>
                                        <td width="35%">Description</td>
                                        <td>Priority</td>
                                        <td>Correspondence</td>
                                        <td>Assign To</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach($p_request as $val){ ?>
                                        <tr>
                                            <td><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['user_id'] ?>">
                                                    <?= $val['member'] ?>
                                                </a>
                                            </td>
                                            <!--                                    <td style="word-break: break-all">--><?//= $val['desc'] ?><!--</td>-->
        
                                            <td>
                                                <?= substr(strip_tags($val['desc']),0,100); ?><a data-toggle="modal" data-target="#myReplyModal<?= $val['id'] ?>">Read More</a>
                                                <!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myReplyModal<?= $val['id'] ?>">Read More</button>-->
                                                <!-- Modal -->
                                                <div id="myReplyModal<?= $val['id'] ?>" class="modal fade" role="dialog">
                                                    <?= form_open("admin/replyPrayerRequest?id=".$val['id'],array('class'=>"form-horizontal","onSubmit"=>"document.getElementById('submit').disabled=true;")) ?>
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" style="margin-top: -17px;">&times;</button>
                                                                    <h4 class="modal-title"><?= $val['title'] ?></h4>
                                                                </div>
                                                                <div class="modal-body" style="margin-left: 25px!important;margin-right: 10px!important;">
                                                                    <p><?= $val['desc']; ?></p>
                                                                    <div class="md-card-content padding-reset">
                                                                        <div class="chat_box_wrapper">
                                                                            <div class="chat_box touchscroll chat_box_colors_a" style="height: 300px" id="chat">
                                                                                <div class="chat_message_wrapper">
                                                                                    <p style="text-align:center;font-size:20px;">
                                                                                        <?php 
                                                                                            $replyRequest = $this->data->fetch('prayerRequestReply', array('prayer_request_id' => $val['id']));
                                                                                            if(empty($replyRequest)){
                                                                                                echo "Give reply to prayer request";
                                                                                            }else{
                                                                                                foreach($replyRequest as $row){
                                                                                            ?>
                                                                                                <div class="chat_message_wrapper chat_message_right">
                                                                                                    <div class="chat_user_avatar">
                                                                                                        <img class="md-user-image" src="https://demo.mmsonline.website/assets_f/img/business/avatar.jpg" alt="">
                                                                                                    </div>
                                                                                                    <ul class="chat_message">
                                                                                                        <li>
                                                                                                            <p><?= $row['reply_text']; ?></p>
                                                                                                            <span class="chat_message_time"><?= $this->data->fetch('credentials', array('id' => $row['admin_id']))[0]['name']; ?></span>
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
                                                                            <div class="chat_submit_box" style="display:block;" id="chat_submit_box">
                                                                                <div class="uk-input-group">
                                                                                    <input type="text" class="md-input" name="reply" id="reply" placeholder="Reply To request">
                                                                                    <span id="textLe1">0</span>/500
                                                                                    <span class="uk-input-group-addon">
                                                                                        <button type="submit">
                                                                                            <i class="material-icons md-24">&#xE163;</i>
                                                                                        </button>
                                                                                    </span>
                                            
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--<textarea class="form-control" cols="85" rows="5" name="reply"></textarea>-->
                                                                    <!--<input type="text" name="reply" id="reply" />-->
                                                                    <input type="hidden" name="replyGivenBy" value="<?php echo $userAdmin[0]['id']; ?>"/>
                                                                    <input type="hidden" name="requestedBy" value="<?= $val['user_id'] ?>" />
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <!--<button type="submit" class="btn btn-info">Reply</button>-->
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
            
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <?php if($val['priority'] == 'urgent'){$style = 'red';}else{$style = 'black';}?>
                                            <td style="color: <?php echo $style; ?>"><?= ucfirst($val['priority']) ?></td>
                                            <td>
                                                <?php if(empty($val['reply'])){ echo 'No Reply Given.';}else{ echo ucfirst($val['reply']);?> <br/><small><a  data-toggle="modal" data-target="#myModal<?= $val['id'] ?>">View</a></small> <?php } ?>
                                                <div id="myModal<?= $val['id'] ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
        
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" style="margin-top: -17px;">&times;</button>
                                                                <h4 class="modal-title"><?= $val['title'] ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php $this->data->update(array('id' => $val['id']), 'p_request', array('read' => 1)); ?>
                                                                <div class="md-card-content padding-reset">
                                                                        <div class="chat_box_wrapper">
                                                                            <div class="chat_box touchscroll chat_box_colors_a" style="height: 300px" id="chat">
                                                                                <div class="chat_message_wrapper">
                                                                                    <p style="text-align:center;font-size:20px;">
                                                                                        <?php 
                                                                                            $replyRequest = $this->data->fetch('prayerRequestReply', array('prayer_request_id' => $val['id']));
                                                                                            if(empty($replyRequest)){
                                                                                                echo "Give reply to prayer request";
                                                                                            }else{
                                                                                                foreach($replyRequest as $row){
                                                                                            ?>
                                                                                                <div class="chat_message_wrapper chat_message_right">
                                                                                                    <div class="chat_user_avatar">
                                                                                                        <img class="md-user-image" src="https://demo.mmsonline.website/assets_f/img/business/avatar.jpg" alt="">
                                                                                                    </div>
                                                                                                    <ul class="chat_message">
                                                                                                        <li>
                                                                                                            <p><?= $row['reply_text']; ?></p>
                                                                                                            <span class="chat_message_time"><?= $this->data->fetch('credentials', array('id' => $row['admin_id']))[0]['name']; ?></span>
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
                                            </td>
                                            <td><?php if(!empty($val['assignedTo'])){
                                            ?>
                                            <?= $val['assignedTo'] ?><br/><small style="float: right;"><a href="#" data-target="#detailsSec<?= $val['id'] ?>" data-toggle="modal">Reassign</a></small>
                                            <?php
                                            }else{
                                            ?>
                                            <a href="#" data-target="#detailsSec<?= $val['id'] ?>" data-toggle="modal">Not Assigned</a>
                                            <?php
                                            }?></td>
                                            <td><a onclick="deleteConff('<?= site_url('admin/delete/p_request/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a> | <a onclick="sendSMS(<?= $val['user_id'] ?>)"><i class="fa fa-space-shuttle" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                                </div>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<div class="conf"></div>
<script>
    $('#search').click(function(){
        var toDate = $('#toDate').val();
        var fromDate = $('#fromDate').val();
        var d1 = new Date();
        var joiningDate = "";
        if(toDate >= fromDate){
            $.ajax({
                url: "<?= site_url('admin/notification') ?>/prayerRequest",
                type: "POST",
                data: {toDate:toDate,fromDate:fromDate},
                success: function(e){
                    // console.log(e);
                    $('#ajaxResponse').html(e);
                    newPdfUrl = "<?= site_url('admin/save_notification_pdf_basedon_date/prayerRequest') ?>"+"/"+fromDate+"/"+toDate;
                    $('#pdfUrl').attr('href', newPdfUrl);
                    $('#pdfDiv').css('display', 'block');
                    $('#pdfUrl2').attr('href', newPdfUrl);
                    $('#myTable').DataTable({aaSorting: [[0, "desc"]]}).Draw();
                }
            });
        }else{
            alert('To Date must be greater or equal to from date.');
        }
    });
    
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
    function sendMsg(){
        var sendersid = window.location.hash;
        sendersid = sendersid.replace("#","");
        var msg = $("#submit_message").val();
        if(sendersid != ""){
            $.post("<?= site_url('home/admin_chat/sendMessage'); ?>",{att:attachm,msg:msg,id: sendersid},function(a){
                $("#submit_message").val("");
                attachm = "";
            });
        }
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
            "<form action='<?= site_url() ?>/admin/sendSMS/member' method='post'>"+
                "<div class='row'>"+
                    "<div class='form-group'>"+
                        "<label class='col-md-4'>Compose Message</label>"+
                        "<input type='hidden' name='member[]' class='form-control col-md-6' value='"+id+"'>"+
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
    
    function assigned(id) {
        
    }

</script>
<script>
    $(document).ready(function(){
       $("#reply").keyup(function(){
            var a = this.value;
            $("#reply").val(a.substring(0,500));
            lenght = a.length;
            $("#textLe1").html(lenght);
        }); 
    });
    $('.chosen-toggle').each(function(index) {
        $(this).on('click', function(){
            if($(this). prop("checked") == true){
                $(this).parent().find('option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
            }else{
                clearSelected();
                $('#mem').trigger("chosen:updated");
            }
        });
    });
    function clearSelected(){
        var elements = document.getElementById("mem").options;
        console.log(elements.length);
        for(var i = 0; i < elements.length; i++){
          if(elements[i].selected)
            elements[i].selected = false;
        }
      }
</script>
<?php foreach($p_request as $val){ ?>
    <div class="modal fade in" id="detailsSec<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Assign Member
                    </h4>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('admin/updateAssigned/'.$val['id']); ?>" class="form-signin" id="actionForm" onSubmit="if(!confirm('Are you sure you want to assigned this prayer request to this member?')){return false;}" method="post">
                    <!--<input type="checkbox" checked class="chosen-toggle select form-control mem col-md-3" id="selectAll" style="margin-bottom: -20px;">-->
                    <label for="" style="margin-left: 40px;">All Members</label>
                    <select name="member[]" required multiple class="form-control chosen-select" id="mem">
                        <?php foreach($members as $val){ ?>
                            <option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <br/>
                    <input type="hidden" id="requestId" name="requestId" value="<?= $val['id'] ?>"/>
                    <button type="submit" id="modalSubmit" class="btn btn-danger">Assign Member</button>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>