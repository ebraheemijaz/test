<style>
    .not-active {
      pointer-events: none;
      cursor: default;
      text-decoration:none;
      color:black;
    }
</style>
<?php $check = $this->session->userdata('userAdmin'); ?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Admin Events</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Admin Events<span style="float : right;">
                    <!--<i class="md-icon material-icons" id="invoice_print" onclick="window.print();">&#xE8ad;</i>-->
                    <a href="<?php echo base_url(); ?>admin/saveAdminEvent"><i class="md-icon material-icons">get_app</i></a></span></header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableKN" class="table table-hover">
                            <thead>
                            <tr>
                                <td>S. No.</td>
                                <td>Event Title</td>
                                <td>Start Date</td>
                                <td>End Date</td>
                                <td>Total Attendance</td>
                                <td style="width: 15%;">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!empty($reminders1)){ ?>
                                        <?php $i=1; foreach($reminders1 as $val){ ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td style="width:200px; word-wrap: break-word;display: inline-block;"><?= ucfirst($val['desc']); ?></td>
                                            <td><?= date('d-m-Y H:i:s', strtotime($val['date']." ".$val['start'])); ?></td>
                                            <td><?= date('d-m-Y H:i:s', strtotime($val['date']." ".$val['end'])); ?></td>
                                            <td><?= count($this->data->fetch(' eventAttendance', array('event_id' => $val['event_id'], 'eventAttending' => '1', 'adminId' => '1'))) ?></td>
                                            <td  style="width: 15%;"><a href="<?= site_url('admin/view/eventAttendee') . "/" . $val['event_id']."/same"; ?>">Attendee</a> | <a style="cursor: pointer" onclick="deleteConff('<?= site_url('home/deleteEvent') . "/" . $val['event_id']."/same" ?>')"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php $i++; } ?>
                                    <?php }
                                ?>
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
<div class="conf"></div>
<div style="" class="modal fade bs-example-modal-md in" data-toggle="modal" id="newModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden='true' id="modalclose">X</span>
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
                            $admins = $this->data->fetch('credentials');
                            if(!empty($admins)){
                                foreach($admins as $admin){
                                ?>
                                <option value="admin#<?= $admin['id']; ?>"><?= $admin['name']; ?></option>
                                <?php
                                }
                            }
                            ?>
                            <option value="">-----------------------------</option>
                            <?php
                            $member = $this->data->fetch('member');
                            if(!empty($member)){
                                foreach($member as $val){
                                ?>
                                <option value="user#<?= $val['id']; ?>"><?= $val['fname']." ".$val['lname'] ?></option>
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
                    <br/>
                    <button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button>
                    <button type="submit" id="modalSubmit" class="btn btn-danger">Submit Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // $(document).ready(function(){
    //     $('#modalclose').click(function(){
    //         $('#newModal').hide(); 
    //     });
    // });
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
            "<span aria-hidden='true'>X</span> " +
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
        var a = "<div class='modal fade' id='deleteConf1' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
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
        $("#deleteConf1").modal('toggle');
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
</script>
