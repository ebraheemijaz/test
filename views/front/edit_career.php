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
            <aside class="profile-nav col-lg-12">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <?php   $image = (empty($v['image'])) ? base_url('assets_f/img/tutor.png') : base_url().$v['profile_pic'] ; ?>
                            <img src="<?= $image ?>" alt="">
                        </a>
                        <h1><?= $v['fname'] ?> <?= $v['lname'] ?></h1>
                        <p><?= $v['email'] ?></p>
                        <p>
                        <div class="rating">
                            <span class="unfilled">☆</span>
                            <span class="unfilled">☆</span>
                            <span class="filled">☆</span>
                            <span class="filled">☆</span>
                            <span class="filled">☆</span>
                        </div>

                        </p>
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-12">
                <section class="panel">
                    <div class="panel-body bio-graph-info">
                        <div class="row">
                            <?= form_open('home/editProfile'); ?>
                            <div class="bio-row">
                                <p><span>First Name </span>: <input type="text" name="fname" value="<?= $v['fname'] ?>"/></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Last Name </span>: <input type="text" name="lname" value="<?= $v['lname'] ?>"/></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Mobile # </span>: <input type="text" name="mobileNo" value="<?= $v['mobileNo'] ?>"/></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Home # </span>: <input type="text" name="homeNo" value="<?= $v['homeNo'] ?>"/></p>
                            </div>
                            <div class="row"></div>
                            <div class="bio-row">
                                <?php if(!empty($userAdmin)){ ?>
                                    <?php if($userAdmin[0]['id'] != $v['id']){ ?>
                                    <?php }else{ ?>
                                        <button class="btn btn-success">Save</button>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <?= form_close(); ?>
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
                                            <?= form_open('home/editProfile'); ?>
                                                <textarea name="career" id="" cols="30" rows="5" class="form-control"><?= $v['career'] ?></textarea>
                                                <button class="btn btn-success">Save</button>
                                            <?= form_close(); ?>
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
                                        <?= form_open('home/editProfile'); ?>
                                            <textarea name="biography" id="" cols="30" rows="5" class="form-control"><?= $v['biography'] ?></textarea>
                                            <button class="btn btn-success">Save</button>
                                        <?= form_close(); ?>
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
