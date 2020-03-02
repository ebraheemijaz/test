<?php
$v = $userAdmin[0];
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
    .bio-row>p>span{
        font-weight: bold !important;
    }
    .accordion-toggle{
        font-weight:bold !important;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <aside class="profile-nav col-lg-12">
                <div class="row state-overview">

                    <div class="col-lg-4 col-sm-4">
                        <section class="panel">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?= $acceptedOffers[0]['total'] ?>
                                </h1>
                                <p>Orders Accepted</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <section class="panel">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    £ <?php
                                    $revenuea = 0;
                                    foreach($revenue as $val){
                                        $revenuea += $val['amount'];
                                    }
                                    echo $revenuea;
                                    ?>
                                </h1>
                                <p>Revenue</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <section class="panel">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-hourglass-start"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    £ <?php
                                    $revenuea = 0;
                                    foreach($upcomingrevenue as $val){
                                        $revenuea += $val['amount'];
                                    }
                                    echo $revenuea;
                                    ?>
                                </h1>
                                <p>Upcoming Revenue</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <section class="panel">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-send"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?= $sentOffers[0]['total'] ?>
                                </h1>
                                <p><a href="<?= site_url('home/view/manage_offers') ?>?type=sent">Orders Sent</a></p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <section class="panel">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-share"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?= $receivedOffers[0]['total'] ?>
                                </h1>
                                <p><a href="<?= site_url('home/view/manage_offers') ?>?type=received">Orders Received</a></p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <section class="panel">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-spinner fa-spin"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?= $unacceptedOffers[0]['total'] ?>
                                </h1>
                                <p>
                                    <a href="<?= site_url('home/view/manage_offers') ?>?type=received">Orders To Do</a>
                                </p>
                            </div>
                        </section>
                    </div>
                </div>
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <?php $image = (empty($v['image'])) ? base_url('assets_f/img/tutor.png') : base_url('assets_f/img/business')."/".$v['image']; ?>
                            <img onclick="openProfile()" src="<?= $image ?>" alt="">
                        </a>
                        <h1 style="font-weight: 900"><?= ucfirst($v['fname']) ?> <?= ucfirst($v['lname']) ?></h1>
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
            <aside class="profile-info col-lg-9 col-md-9">
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
                                        <th>Mobile :</th>
                                        <td>
                                            <?= $v['mobileNo'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td><?= $v['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Home #:</th>
                                        <td>
                                            <?= $v['homeNo'] ?>
                                        </td>
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
                                        <a href="<?= site_url('home/view/chat'); ?>#<?= $v['id'] ?>">
                                            <span class="btn btn-danger">Send Message</span>
                                        </a>
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
                                    <div id="collapseOne" class=" in">
                                        <div class="panel-body">
                                            <p>
                                                <?= $v['career'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Experience
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="">
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
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#children">
                                                Children
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="children" class="">
                                        <div class="panel-body">
                                            <?php $child = json_decode($v['child'],true); ?>
                                            <?php if(!empty($child)){ ?>
                                                <?php for($i=0;$i<count($child);$i++){ ?>
                                                    <?php foreach($child[$i] as $ckaey=>$cVal){ ?>
                                                        <div class="bio-row">
                                                            <p>
                                                                <span><?= ucfirst($ckaey) ?> </span>:
                                                                <?= $cVal ?>
                                                            </p>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="row"></div>
                                                    <hr/>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#gchildren">
                                                Grand Children
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="gchildren" class="">
                                        <div class="panel-body">
                                            <?php $child = json_decode($v['grandChild'],true); ?>
                                            <?php //var_dump($child); ?>
                                            <?php if(!empty($child)){ ?>
                                                <?php for($i=0;$i<count($child);$i++){ ?>
                                                    <?php foreach($child[$i] as $ckaey=>$cVal){ ?>
                                                        <div class="bio-row">
                                                            <p>
                                                                <span><?= ucfirst($ckaey) ?> </span>:
                                                                <?= $cVal ?>
                                                            </p>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="row"></div>
                                                    <hr/>
                                                <?php } ?>
                                            <?php } ?>
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
                                    <div id="collapseThree" class="">
                                        <div class="panel-body">
                                            <?php if(!empty($rating)){ ?>
                                                <div class="col-md-12">
                                                <?php foreach($rating as $val){ ?>
                                                    <h4><?= $val['member'][0]['fname'] ?> <?= $val['member'][0]['lname'] ?></h4>
                                                    <div class="rating">
                                                        <?php for($i=5;$i>=1;$i--){ ?>
                                                            <?php $val['rating']; ?>
                                                            <?php if($i > $val['rating']){ ?>
                                                                <span class="unfilled">☆</span>
                                                            <?php }else{ ?>
                                                                <span class="filled">☆</span>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                    <p><?= $val['review'] ?></p>
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
                    </div>
                </section>
            </aside>
            <aside class="col-lg-3 col-md-3 visible-md visible-lg">
                <div style="height:500px;background: ">
                    <section class="panel">
                        <div class="panel-body">
                            <p><a href="">Request advert</a></p>
                            <img style="width:100% !important" src="<?= base_url('assets_f') ?>/banner.gif" alt=""/>
                        </div>
                    </section>
                </div>
            </aside>
        </div>
    </section>
</section>
<script>
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