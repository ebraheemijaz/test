<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Registered Admins</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Members</header>
                    <div class="panel-body">
                        <form class="form-inline" role="form" action="<?= site_url('demo/search_member') ?>" method="post" align="right">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="Search by member name" style="font-size: 12px!important; width:200px!important;"/>
                            </div>
                            <button type="submit" class="btn btn-info" name="submit">Search</button>
                        </form>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                        <td>Member Created Date</td>
                                        <td>Member Name</td>
                                        <td>Total Login</td>
                                        <td>Profile Picture</td>
                                        <td style="display:none;">Age</td>
                                        <td style="display:none;">Marital Status</td>
                                        <td style="display:none;">Job Status</td>
                                        <td style="display:none;">Native Country</td>
                                        <td style="display:none;">Hobbies</td>
                                        <td style="display:none;">Postal Code</td>
                                        <td>Profession</td>
                                        <td>Mempacas Group</td>
                                        <td>Date Joined</td>
                                        <td>Country Of Origin</td>
                                        <td>Total Donations</td>
                                        <td>Status</td>
                                        <td>Details</td>
                                    </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($members as $val){ ?>
                                        <tr <?php if($val['firstTimerMemberFlag']){ ?> style="background-color: #42f4bf;" <?php } ?>>
                                            <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                            <td><?= ucfirst(strtolower($val['fname']))." ".ucfirst(strtolower($val['lname'])) ?></td>
                                            <td><?= $val['count'] ?></td>
                                            <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                            <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                            <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                            <?php
                                                if ($this->agent->is_browser())
                                                {
                                                        // echo 'Desktop';
                                                        $agent = $this->agent->browser().' '.$this->agent->version();
                                                }
                                                elseif ($this->agent->is_robot())
                                                {
                                                        $agent = $this->agent->robot();
                                                }
                                                elseif ($this->agent->is_mobile())
                                                {
                                                        // echo 'Mobile';
                                                        $agent = $this->agent->mobile();
                                                }
                                                else
                                                {
                                                        $agent = 'Unidentified User Agent';
                                                }
                                            ?>
                                            <td>
                                                
                                                <?php
                                                    $exif = exif_read_data($image);
                                                    // print_r($exif['Orientation']);
                                                ?>
                                                <?php
                                                if($this->agent->is_mobile()){
                                                if($exif['Orientation'] == 6){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '6', '0');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(0deg);" /></a>
                                                <?php
                                                }else if($exif['Orientation'] == 8){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '8', '0');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-0deg);" /></a>
                                                <?php
                                                }else{
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '0', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                                <?php
                                                }
                                                }else if($this->agent->is_browser()){
                                                if($exif['Orientation'] == 6){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '6', '90');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(90deg);" /></a>
                                                <?php
                                                }else if($exif['Orientation'] == 8){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '8', '-90');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-90deg);" /></a>
                                                <?php
                                                }else{
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '0', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                                <?php
                                                }
                                                }
                                                ?>
                                            </td>
                                            <!--<td><?= ucfirst($val['gander']); ?></td>-->
                                            <td style="display : none;"><?= $val['age_group'] ?></td>
                                            <td style="display : none;"><?= $val['maritalStatus'] ?></td>
                                            <td style="display : none;"><?= $val['employement'] ?></td>
                                            <td style="display : none;"><?= $val['nativeCountry'] ?></td>
                                            <td style="display : none;"><?= $val['hobbies']; ?></td>
                                            <td style="display : none;"><?= $val['poatalCode'] ?></td>
                                            <td><?= ucfirst($val['businessGroup']) ?></td>
                                            <td><?php if($val['mempacasGroup'] != null){echo $this->data->fetch('mempacasGroup', array('id' => $val['mempacasGroup']))[0]['groupName']; }else{ ?> <a href="#" data-toggle="modal" data-target="#assignGroup<?= $val['id'] ?>" >Assign A Group</a> <?php } ?></td>
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
                                            <td><a onclick="statusChange('<?= site_url("admin/statusMember/".$val['id']."/".$status) ?>')"><?= ucfirst($val['status']) ?></a></td>
                                            <td><a data-toggle="modal" href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>">View</a>
                                                <?php if($userAdmin[0]['id'] == 3){ ?> | 
                                                <a onclick="deleteConff('<?= site_url('admin/memberDelete/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a><?php } ?>
                                                <?php if($val['firstTimerMemberFlag']){ ?>
                                                | <a onclick="makeMember('<?= site_url('admin/makeMember1/'.$val['id']) ?>')">Make Member</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                    <tr>
                                        <td colspan="17" align="right"><?= $links; ?></td>
                                    </tr>
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


<div class="conf"></div>
<script>
    function openProfile(){
        $("#newModal").modal("toggle");
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
</script>