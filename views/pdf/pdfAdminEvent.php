<?php $check = $this->session->userdata('userAdmin'); ?>
<?php $logo = $this->data->fetch('details', array('id' => 1)); ?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
             <div class="col-md-12">
                 <div class="col-md-4"></div>
                 <div class="col-md-4"><img class="uk-float-left" src="<?= base_url('assets_f') ?>/<?= $logo[0]['logo'] ?>" alt="" height="100" width="140"/><span style="text-align: center; font-size: 20px; margin-right: 20px">Membership Management System</span></div>
                 <div class="col-md-4" style="text-align: center; font-size: 20px;"></div>
             </div>
         </div>
        <div class="row">
            <div class="col-lg-12">
                <!--<ul class="breadcrumb">-->
                <!--    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>-->
                <!--    <li><a href="">Keepers' Network</a></li>-->
                <!--</ul>-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <!--<header class="panel-heading">Keepers' Network<span style="float : right;">-->
                    <!--<i class="md-icon material-icons" id="invoice_print" onclick="window.print();">&#xE8ad;</i>-->
                    <!--<a href="<?php echo base_url(); ?>admin/save_pdf"><i class="md-icon material-icons">get_app</i></a></span></header>-->
                    <div class="panel-body">
                        <button data-step="3" data-intro="Click here to create new keeper network" class="md-btn md-btn-success" data-uk-modal="{target:'#newModal'}"><h2>Admin Event Record</h2></button>
                        <br/>
                        <div style="width: 100%;">
                            <table class="table table-hover" style="width : 100%;text-align : center;" border="1">
                                <?php if(!empty($adminEvent)){ ?>
                                <?php $i = 1; foreach($adminEvent as $val){ ?>
                                    <tr>
                                        <th colspan="4">Record Of : <?= ucfirst($val['desc']); ?></th>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp; Event Title : &nbsp;</th>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <td style="width : 25%;">&nbsp;<?= ucfirst($val['desc']); ?> &nbsp;</td>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <th style="width : 25%;">&nbsp;Date :  &nbsp;</th>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <td style="width : 25%;">&nbsp;<?= date('d-m-Y', strtotime($val['date']));?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp;Created By :  &nbsp;</th>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <td style="width : 25%;">&nbsp;<?= 'Admin' ?>&nbsp;</td>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <th style="width : 25%;">&nbsp;Event Link : &nbsp;</th>
                                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                        <td style="width : 25%;">&nbsp;<?= $val['link'] ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp;Event Start At. : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?= date('H:i:s a', strtotime($val['start'])); ?> &nbsp;</td>
                                        <th style="width : 25%;">&nbsp;Event Ends At : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?= date('H:i:s a', strtotime($val['end'])); ?> &nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th style="width : 25%;">&nbsp;Image : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?php $image = ($val['image'] != "") ? base_url('assets_f/img')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                            <?php $image = base_url('assets_f/img')."/".$val['image']  ?>
                                            <?php if(empty($val['image'])){ $image = base_url('assets_f/male.jpg'); } ?><?php
                                                    $exif = exif_read_data($image);
                                                    //  print_r($exif['Orientation']);
                                                ?><?php if($exif['Orientation'] == 6){?><img src="<?= $image; ?>" style="height: 50px; width: 50px;transform: rotate(90deg);"><?php }elseif($exif['Orientation'] == 8){ ?><img src="<?= $image; ?>" style="height: 50px; width: 50px;transform: rotate(90deg);"><?php }?> &nbsp;</td>
                                        <th style="width : 25%;">&nbsp;Event Desc : &nbsp;</th>
                                        <td style="width : 25%;">&nbsp;<?= $val['eventDesc']?>&nbsp;</td>
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
