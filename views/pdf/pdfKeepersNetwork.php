<?php $check = $this->session->userdata('userAdmin'); ?>
<?php $logo = $this->data->fetch('details', array('id' => 1)); ?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--<ul class="breadcrumb">-->
                <!--    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>-->
                <!--    <li><a href="">Keepers' Network</a></li>-->
                <!--</ul>-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="col-md-4"></div>
                 <div class="col-md-4"><img class="uk-float-left" src="<?= base_url('assets_f') ?>/<?= $logo[0]['logo'] ?>" alt="" height="100" width="140"/><span style="text-align: center; font-size: 20px; margin-right: 20px">Membership Management System</span></div>
                 <div class="col-md-4"></div>
            </div>
         </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <!--<header class="panel-heading">Keepers' Network<span style="float : right;">-->
                    <!--<i class="md-icon material-icons" id="invoice_print" onclick="window.print();">&#xE8ad;</i>-->
                    <!--<a href="<?php echo base_url(); ?>admin/save_pdf"><i class="md-icon material-icons">get_app</i></a></span></header>-->
                    <div class="panel-body">
                        <button data-step="3" data-intro="Click here to create new keeper network" class="md-btn md-btn-success" data-uk-modal="{target:'#newModal'}">Keepers Network</button>
                        <br/>
                        <div style="width: 100%;">
                            <table class="table table-hover" style="width : 100%;text-align : center;" border="1">
                                <?php if(!empty($keepersNetwork)){ ?>
                                <?php $i = 1; foreach($keepersNetwork as $val){ ?>
                                    <tr>
                                        <th colspan="4">Record Of : <?= $val['absenteeName']; ?></th>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp; Date : &nbsp;</th>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <td style="width : 25%;">&nbsp;<?= date('d-m-Y', strtotime($val['createdAt'])); ?> &nbsp;</td>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <th style="width : 25%;">&nbsp;Sender Name :  &nbsp;</th>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <td style="width : 25%;">&nbsp;<?php $member = explode("#",$val['senderId']); if($member[0] == 'admin'){echo $this->data->fetch('credentials', array('id' => $member[1]))[0]['name'];}elseif($member[0] == 'user'){echo $this->data->fetch('member', array('id' => $member[1]))[0]['fname']." ".$this->data->fetch('member', array('id' => $member[1]))[0]['lname'];}else{echo 'Hello';} ?> &nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp;Absentee Name :  &nbsp;</th>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <td style="width : 25%;">&nbsp;<?= $val['absenteeName']; ?> &nbsp;</td>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <th style="width : 25%;">&nbsp;Absence Description : &nbsp;</th>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <td style="width : 25%;">&nbsp;<?php if($val['absenceDescription'] == 'other'){echo $val['absenceDescriptionOther']; }else{echo $val['absenceDescription']; }; ?> &nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp;Absentee Contact No. : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?= $val['absenteeContactNo']; ?> &nbsp;</td>
                                        <th style="width : 25%;">&nbsp;Absentee Email : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?= $val['absenteeEmail']; ?> &nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp;Date Last Seen(If known) : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?= date('d-m-Y', strtotime($val['dateLastSeen'])); ?> &nbsp;</td>
                                        <th style="width : 25%;">&nbsp;Comment(Optional) : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?php if(isset($val['comment']) && $val['comment'] != null){ echo $val['comment']; }else{ echo "No comment Present."; }?> &nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp;1st follow up Admin : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?php if(isset($val['firstFollowUp']) && $val['firstFollowUp'] != null){ echo $this->data->fetch('credentials', array('id' => $val['firstFollowUpAdmin']))[0]['name']; }else{ echo 'No first Follow Up done.'; }?> &nbsp;</td>
                                        <th style="width : 25%;">&nbsp;1st follow up Comment : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?php if(isset($val['firstFollowUp']) && $val['firstFollowUp'] != null){echo $val['firstFollowUp'];}else{echo 'No first follow up comment.';}?> &nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp;2nd follow up Admin : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?php if(isset($val['secondFollowUp']) && $val['secondFollowUp'] != null){ echo $this->data->fetch('credentials', array('id' => $val['secondFollowUpAdmin']))[0]['name']; }else{ echo 'No Second Follow Up done.'; }?> &nbsp;</td>
                                        <th style="width : 25%;">&nbsp;2nd follow up Comment : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?php if(isset($val['secondFollowUp']) && $val['secondFollowUp'] != null){echo $val['secondFollowUp'];}else{echo 'No Second follow up comment.';}?> &nbsp;</td>
                                    </tr>
                                <?php $i++; }} ?>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<div class="conf"></div>
<script>
    function openProfile(){
        $("#newModal").modal("toggle");
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
    function firstFollowUp(id){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Enter First Follow Up " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url('admin/updateKN'); ?>' method='post' >"+
            "<input type='hidden' name='firstFollowUpAdmin' value='<?= $check[0]['id'] ?>'/>"+
            "<input type='hidden' name='keeperId' value='"+id+"' />"+
            "<textarea name='firstFollowUp' class='form-control' style='padding-bottom : 10px;' placeholder='Enter First Follow Up Comment'></textarea>"+
            "<br/>"+
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<button type='submit' class='btn btn-success'>Submit Comment</button> " +
            "</form>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function secondFollowUp(id){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Enter Second Follow Up " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url('admin/updateKNSecond'); ?>' method='post' >"+
            "<input type='hidden' name='secondFollowUpAdmin' value='<?= $check[0]['id'] ?>'/>"+
            "<input type='hidden' name='keeperId' value='"+id+"' />"+
            "<textarea name='secondFollowUp' class='form-control' style='padding-bottom : 10px;' placeholder='Enter Second Follow Up Comment'></textarea>"+
            "<br/>"+
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<button type='submit' class='btn btn-success'>Submit Comment</button> " +
            "</form>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function otherOpen(){
        var a = document.getElementById('absenceDescription').value;
        if(a == 'other'){
            document.getElementById('otherDesc').style.display = "block";
        }else{
            document.getElementById('otherDesc').style.display = "none";
        }
    }
    // $("#absenceDescription").change(function(){
    //     alert('hello');
    //   var a = $('#absenceDescription').val();
    //   if(a == 'other'){
    //       $('#otherDesc').css('display', 'block');
    //   }else{
    //       $('#otherDesc').css('display', 'none');
    //   }
    // });
</script>
<div style="" class="modal fade bs-example-modal-md in" id="newModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                    New Update
                </h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/insert/keepersNetwork/keepersNetwork'); ?>" class="form-signin" id="actionForm" method="post">
                    <p>Sender Name:</p>
                    <select name="senderId" required class="form-control">
                        <option value="">Select Sender</option>
                        <?php
                            $member = $this->data->fetch('member');
                            if(!empty($member)){
                                foreach($member as $val){
                                ?>
                                <option value="<?= $val['id']; ?>"><?= $val['fname']." ".$val['lname'] ?></option>
                                <?php
                                }
                            }
                        ?>
                    </select>
                    <p>Absentee Name:</p>
                    <input type="text" name="absenteeName" id="absenteeName" required class="form-control"/>
                    <p>Absence Description:</p>
                    <select name="absenceDescription" id="absenceDescription" onchange="otherOpen()" required id="" class="form-control">
                        <option value="">Select</option>
                        <option value="Out Of Town">Out Of Town</option>
                        <option value="Unemployed">Unemployed</option>
                        <option value="Pressure Of Work">Pressure Of Work</option>
                        <option value="Bereaved">Bereaved</option>
                        <option value="Sick">Sick</option>
                        <option value="Discouraged">Discouraged</option>
                        <option value="In Hospital">In Hospital</option>
                        <option value="Dont Know">Don't Know</option>
                        <option value="other">Other (Please Specify)</option>
                    </select>
                    <div class="form-group" id="otherDesc" style="display : none;">
                        Other Absence Descriotion:
                        <input type="text" class="form-control" name="absenceDescriptionOther" id="absenceDescriptionOther" />
                    </div>
                    <p>Absentee Contact No. : </p>
                    <input type="text" name="absenteeContactNo" id="absenteeContactNo" required class="form-control"/>
                    <p>Absentee Contact Email:</p>
                    <input type="text" name="absenteeEmail" id="absenteeEmail" class="form-control"/>
                    <p>Date Last Seen (If Known):</p>
                    <input type="date" name="dateLastSeen" id="dateLastSeen" class="form-control"/>
                    <p>Comment (Optional) :</p>
                    <textarea id="" cols="30" rows="4" name="comment" class="form-control"></textarea>
                    <button type="submit" id="modalSubmit" class="btn btn-danger">Submit Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
