<?php
$v = $members[0];
?>
<style>
    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
    }
    .rating > span {
        display: inline-block;
        position: relative;
    }
    .filled:before{
        content: "\2605";
        position: absolute;
    }
    .unfilled:before{
        /*content: "\2606";*/
        position: absolute;
    }
</style>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Member Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <aside  class="profile-nav col-lg-12">
                    <section  class="panel">
                        <?php
                        $todayMonth = date("m");
                        $todayDate= date("d");
                        if($todayDate == $v['birth_date'] && $todayMonth == $v["birth_month"]){ ?>
                            <?php if(!empty($userAdmin)){ ?>
                                <?php if($userAdmin[0]['id'] != $v['id']){
                                    $name = $v['fname']." ".$v['lname'];
                                    $msg = $name . " have their Happy Birthday Today!";
                                }else{
                                    $msg = "MMS Wish you a very Happy Birthday!";
                                }
                                ?>
                            <?php }else{ $name = $v['fname']." ".$v['lname'];$msg = "Its ".$name . "'s Happy Birthday Today!"; } ?>
                            <p style="text-align:center;font-weight: bold;font-size:18px; "><?= $msg ?></p>
                        <?php } ?>
                        <div style="background: #ff9b23 !important;" class="user-heading round">
                            <a href="#">
                                <?php $image = (empty($v['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$v['image'] ; ?>
                                <img onclick="openProfile()" src="<?= $image ?>" alt="">
                            </a>
                            <h1><?= $v['fname'] ?> <?= $v['lname'] ?></h1>
                            <p><?= $v['email'] ?></p>
                            <p>
                                <div class="rating">
                                    <?php for($i=5;$i>=1;$i--){ ?>
                                        <?php if($i > $ratingAvg[0]['rating']){ ?>
                                            <span class="unfilled">☆</span>
                                        <?php }else{ ?>
                                            <span class="filled">☆</span>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </p>
                        </div>
                    </section>
                </aside>
                <aside class="profile-info col-lg-12">
                    <section class="panel">
                        <div class="panel-body bio-graph-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <table>
                                        <tr>
                                            <th>First Name :</th>
                                            <td><?= $v['fname'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender :</th>
                                            <td><?= $v['gander'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Country of Origin :</th>
                                            <td><?= $v['nativeCountry'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Address :</th>
                                            <td>
                                                <?= $v['address'] ?>
                                                <br/>
                                                <?= $v['address2'] ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Town :</th>
                                            <td><?= $v['town'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Postal Code :</th>
                                            <td><?= $v['poatalCode'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table>
                                        <tr>
                                            <th>Last Name :</th>
                                            <td><?= $v['lname'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date Of Birth :</th>
                                            <td><?= date("d / M",strtotime("2016/".$v['birth_month']."/".$v['birth_date'])); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Hobbies :</th>
                                            <td><?= $v['hobbies'] ?></td>
                                        </tr>


                                        <tr>
                                            <th>Home #:</th>
                                            <td>
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] != $v['id']){ ?>
                                                        <a href="<?= site_url('home/member'); ?>/<?= $v['id'] ?>">
                                                            Request to show
                                                        </a>
                                                    <?php }else{ ?>
                                                        <?= $v['homeNo'] ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mobile :</th>
                                            <td>
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] != $v['id']){ ?>
                                                        <a href="<?= site_url('home/member'); ?>/<?= $v['id'] ?>">
                                                            Request to show
                                                        </a>
                                                    <?php }else{ ?>
                                                        <?= $v['mobileNo'] ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email :</th>
                                            <td><?= $v['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Joining Date :</th>
                                            <td><?= date("d-M-Y",strtotime($v['dOfJoining'])); ?></td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="row"></div>
                                <div class="bio-row">
                                    <?php if(!empty($userAdmin)){ ?>
                                        <?php if($userAdmin[0]['id'] != $v['id']){ ?>
                                            <?php if(in_array($v['id'],$friends)){ ?>
                                                <span class="btn btn-primary">Already buddies</span>
                                            <?php }else{ ?>
                                                <span onclick="addToBuddies(<?= $v['id'] ?>)" id="addtoB" class="btn btn-danger">Add to Buddies</span>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <a href="<?= site_url('home/view/edit_profile'); ?>">
                                                <span class="btn btn-info">Edit Profile</span>
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel-group m-bot20" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    Career
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <p>
                                                    <?= $v['career'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Biography
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                <?= $v['biography'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                Reviews
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if(!empty($rating)){ ?>
                                                <div class="col-md-12">
                                                    <?php foreach($rating as $val){ ?>

                                                        <div class="activity terques">
                                                            <span>
                                                                <i class="fa fa-star"></i>
                                                            </span>
                                                            <div class="activity-desk">
                                                                <div class="panel">
                                                                    <div class="panel-body">
                                                                        <div class="arrow"></div>
                                                                        <i class="fa fa-time"></i>
                                                                        <h4><?= $val['member'][0]['fname'] ?> <?= $val['member'][0]['lname'] ?></h4>
                                                                        <div class="rating" style="float:right !important;">
                                                                            <?php for($i=5;$i>=1;$i--){ ?>
                                                                                <?php $val['rating']; ?>
                                                                                <?php if($i > $val['rating']){ ?>
                                                                                    <span style="background: transparent;color:black;" class="unfilled">☆</span>
                                                                                <?php }else{ ?>
                                                                                    <span style="background: transparent;color:black;" class="filled">☆</span>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <p><?= $val['review'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                    <?php } ?>
                                                </div>
                                            <?php }else{ ?>
                                                <p>No Reviews Yet</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </section>
    </section>
<script>
    function addToBuddies(id){
        $.post("<?= site_url('home/ajax/addToBuddies') ?>",{id:id},function(e){
            if(e == "a"){
                $("#addtoB").html("Buddy");
                $("#addtoB").removeAttr("onclick");
                alertify.message("Added to buddies");
            }
        })
    }
    function openProfile(){
        $("#newModal").modal("toggle");
    }
</script>
<div class="modal fade bs-example-modal-sm" id="newModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="background: transparent">
            <div class="modal-body">
                <div class="">
                    <div class="col-sm-12">
                        <img style="width:100%;" src="<?= $image ?>" alt="">
                    </div>
                    <div class="row"></div>
                </div>

            </div>
        </div>
    </div>
</div>