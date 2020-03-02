<?php
$v = $business[0];
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
                    <li><a href="#">Business Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <aside class="profile-nav col-lg-12">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <?php $image = (empty($v['logo'])) ? base_url('assets_f/img/tutor.png') : base_url()."/assets_f/img/business/".$v['logo']; ?>
                            <img src="<?= $image ?>" alt="">
                        </a>
                        <h1><?= $v['title'] ?></h1>
                        <p><?= $v['email'] ?></p>
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-12">
                <section class="panel">
                    <div class="panel-body bio-graph-info">
                        <div class="row">
                            <?= form_open_multipart('home/editbusiness'); ?>
                            <div class="bio-row">
                                <p>Business Title : <input class="form-control" type="text" name="title" value="<?= $v['title'] ?>"/></p>
                            </div>
                            <div class="bio-row">
                                <p>Business Email : <input class="form-control" type="text" name="email" value="<?= $v['email'] ?>"/></p>
                            </div>
                            <div class="bio-row">
                                <p>Business Phone # : <input class="form-control" type="text" name="phone" value="<?= $v['phone'] ?>"/></p>
                            </div>
                            <div class="bio-row">
                                <p>Business Website: <input class="form-control" type="text" name="website" value="<?= $v['website'] ?>"/></p>
                            </div>
                            <div class="bio-row">
                                <p>Business Logo: <input class="form-control" type="file" name="logo"/></p>
                            </div>
                            <div class="row"></div>
                            <div class="bio-row">
                                <p><span>About Us</span>:
                                    <textarea class="form-control" name="about" cols="30" rows="4"><?= $v['about'] ?></textarea>
                                </p>
                            </div>
                            <div class="row"></div>
                            <div class="bio-row">
                                <?php if(!empty($userAdmin)){ ?>
                                    <?php if($userAdmin[0]['id'] != $v['user_id']){ ?>
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

                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </section>
</section>
