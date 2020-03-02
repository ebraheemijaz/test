<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= site_url(); ?>/admin/view/manage_users">Registered Members</a></li>
                    <li><a href="">Delete Users</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Members <span style="float : right;">
            <i class="md-icon material-icons" id="invoice_print" onclick="window.print();">&#xE8ad;</i>
            <a href="<?php echo base_url(); ?>admin/save_delete_pdf"><i class="md-icon material-icons">get_app</i></a>
        </span></header>
                    
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableUser" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Member Created Date</td>
                                <td>Member Name</td>
                                <td>Total Login</td>
                                <td>Profile Picture</td>
                                <!--<td>Gender</td>-->
                                <td style="display:none;">Age</td>
                                <td style="display:none;">Marital Status</td>
                                <td style="display:none;">Job Status</td>
                                <td style="display:none;">Native Country</td>
                                <td style="display:none;">Hobbies</td>
                                <td style="display:none;">Postal Code</td>
                                
                                <td>Profession</td>
                                <td>Date Joined</td>
                                <td>Country Of Origin</td>
                                <td>Total Donations</td>
                                <td>Status</td>
                                <td>Details</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($memberPerDelete as $val){ ?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                    <td><?= ucfirst($val['fname'])." ".ucfirst($val['lname']) ?></td>
                                    <td><?= $val['count'] ?></td>
                                    <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                                    </td>
                                    <!--<td><?= ucfirst($val['gander']); ?></td>-->
                                    <td style="display : none;"><?= $val['age_group'] ?></td>
                                    <td style="display : none;"><?= $val['maritalStatus'] ?></td>
                                    <td style="display : none;"><?= $val['employement'] ?></td>
                                    <td style="display : none;"><?= $val['nativeCountry'] ?></td>
                                    <td style="display : none;"><?= $val['hobbies']; ?></td>
                                    <td style="display : none;"><?= $val['poatalCode'] ?></td>
                                    <td><?= ucfirst($val['businessGroup']) ?></td>
                                    <td><?php 
                                    if($val['member_since_month'] == 1){
                                        echo 'Jan'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 2){
                                        echo 'Feb'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 3){
                                        echo 'Mar'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 4){
                                        echo 'Apr'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 5){
                                        echo 'May'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 6){
                                        echo 'Jun'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 7){
                                        echo 'Jul'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 8){
                                        echo 'Aug'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 9){
                                        echo 'Sept'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 10){
                                        echo 'Oct'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 11){
                                        echo 'Nov'." ".$val['member_since_year'];
                                    }
                                    elseif($val['member_since_month'] == 12){
                                        echo 'Dec'." ".$val['member_since_year'];
                                    }
                                    ?></td>
                                    <td><?= $val['nativeCountry'] ?></td>
                                    <td><?= $val['total'] ?></td>
                                    <?php $status = ($val['status'] == 'active') ? "suspend" : "active"; ?>
                                    <td><a href="<?= site_url("admin/deleteMember/".$val['id']."/".$status) ?>"><?= "Delete" ?></a></td>
                                    <td><a data-toggle="modal" href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>">View</a><?php if($userAdmin[0]['id'] == 3){ ?> | <a onclick="deleteConff('<?= site_url('admin/memberDelete/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a><?php } ?></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="row"></div>
                        <h5 style="font-weight: bold">Total Members: <?= count($members) ?></h5>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="conf"></div>
</section>
    <?php $i=1; foreach($members as $val){ ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?= $i ?>" class="modal fade">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
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