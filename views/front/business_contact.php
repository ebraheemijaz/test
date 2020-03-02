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
    .panel-body > h1{
        font-weight: bold !important;
    }
</style>
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <aside class="col-sm-12 col-xs-12 visible-sm visible-xs">
                    <div>
                        <section class="panel">
                            <div class="panel-body">
                                <p><a onclick="admodal()" class="adHelp">Request advert</a></p>
                                <div class="custom1 owl-carousel">
                                    <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/adh1.jpg" alt=""/></div>
                                    <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/adh2.jpg" alt=""/></div>
                                    <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/adh3.jpg" alt=""/></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </aside>
                <div class="row"></div>
                <aside class="profile-nav col-lg-3">
                    <section class="panel">
                        <div class="user-heading round" style="background: #ff9b23;">
                            <a href="#">
                                <?php $image = (empty($v['logo'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$v['logo'] ; ?>
                                <img onclick="openProfile()" src="<?= $image ?>" alt="">
                            </a>
                            <h1 style="font-weight: bold;"><?= ucfirst($v['title']); ?></h1>
                            <p><a style="border:none " href="<?= $v['website'] ?>" target="_blank"><?= $v['website'] ?></a></p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?= site_url() ?>/business/<?= $v['user_id'] ?>/index"> <i class="fa fa-user"></i> Who We Are </a></li>
                            <li><a href="<?= site_url() ?>/business/<?= $v['user_id'] ?>/images"> <i class="fa fa-image"></i> Product & Services </a></li>
                            <li class="active"><a href="<?= site_url() ?>/business/<?= $v['user_id'] ?>/contactUs"> <i class="fa fa-phone"></i> Contact Us! </a></li>
                            <li><a onclick="openShare();"><i class="fa fa-share"></i> Share! </a></li>
                            <?php if(!empty($userAdmin) && $userAdmin[0]['id'] == $v['user_id']){ ?>
                                <?php if($userAdmin[0]['id'] != $v['user_id']){ ?>
                                <?php }else{ ?>
                                    <li><a href="<?= site_url() ?>/business/<?= $v['user_id'] ?>/edit"> <i class="fa fa-edit"></i> Edit profile </a></li>

                                    <?php if(empty($page_req)){ ?>
                                        <li>
                                            <a onclick="openAtt();">
                                                <i class="fa fa-check"></i>
                                                Verify Business Page
                                            </a>
                                        </li>
                                        <div style="padding-right: 16px;" class="modal fade bs-example-modal-md in" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 style="text-align: center" class="modal-title" id="mySmallModalLabel">Verify your business page</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?= form_open("home/reqPageVerify",array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")); ?>
                                                        <p>What is your business category?</p>
                                                        <input type="text" name="q1" class="form-control" />
                                                        <p>Are you the sole owner of the business? If not, enter more information about other partners</p>
                                                        <input type="text" name="q2"  class="form-control" />
                                                        <p>When did you start trading?</p>
                                                        <input type="text" name="q3" class="form-control" />
                                                        <p>Do you have any criminal conviction against you? If yes please explain</p>
                                                        <input type="text" name="q4" class="form-control" />
                                                        <p>Provide best possible business contact number and email for us to reach you</p>
                                                        <input type="text" name="q5" class="form-control" />
                                                        <br/>
                                                        <button class="btn btn-info" type="submit">Send Request</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <li>
                                            <a href="javascript:void;">
                                                <i class="fa fa-check"></i>
                                                Request Status :
                                                <?= $page_req[(count($page_req) - 1)]['status'] ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </section>
                </aside>
                <aside class="profile-info col-lg-7">
                    <section class="panel">
                        <?php $image = (empty($v['banner'])) ? base_url('assets_f/img/business/adh3.jpg') : base_url('assets_f/img/business')."/".$v['banner'] ; ?>
                        <img style="width:100% !important;margin-bottom: 10px;" src="<?= $image ?>" alt=""/>
                        <div class="bio-graph-heading" style="font-weight: bold;">
                            <?= $v['slogan'] ?>
                        </div>
                        <div class="panel-body bio-graph-info">
                            <h1>Have Any Query?</h1>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form action="<?= site_url('home/contactUsBusiness'."/".$v['user_id']); ?>" class="form-horizontal">
                                        <?php $name=(isset($userAdmin)) ? $userAdmin[0]['fname']." ".$userAdmin[0]['lname'] : ""; ?>
                                        <div class="col-md-3">
                                            <label for="">Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $name ?>" placeholder="Enter Your Name" name="name"/>
                                            </div>
                                        </div>
                                        <div class="row"></div>
                                        <?php $name=(isset($userAdmin)) ? $userAdmin[0]['email']: ""; ?>
                                        <div class="col-md-3">
                                            <label for="">Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $name ?>" placeholder="Enter Your Name" name="email"/>
                                            </div>
                                        </div>
                                        <div class="row"></div>
                                        <div class="col-md-3">
                                            <label for="">Message</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <textarea name="msg" class="form-control" id="" cols="30" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="row"></div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button class="btn btn-info">Send</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </section>
                </aside>
                <aside class="col-lg-2 col-md-2 visible-md visible-lg">
                    <div style="height:500px;background: ">
                        <section class="panel">
                            <div class="panel-body">
                                <p><a onclick="admodal()" class="adHelp">Request advert</a></p>
                                <div class="custom1 owl-carousel">
                                    <div><img style="width:100% !important" src="<?= base_url('assets_f') ?>/banner.gif" alt=""/></div>
                                    <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/ad1.jpg" alt=""/></div>
                                    <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/ad2.jpg" alt=""/></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </aside>
            </div>

            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>
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

<div style="padding-right: 16px;" class="modal fade shareNow in" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 style="text-align: center" class="modal-title" id="mySmallModalLabel">Share To Audience!</h4>
            </div>
            <div class="modal-body ">
                <div id="share-buttons clearfix">
                    <!-- Email -->
                    <a href="mailto:?Subject=Membership Management System&amp;Body=%20 <?= site_url("business")."/".$v['user_id']; ?>">
                        <div class="col-xs-1" style="background-image: url('https://simplesharebuttons.com/images/somacro/email.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>
                    </a>
                    <!-- Facebook -->
                    <a href="http://www.facebook.com/sharer.php?u=<?= site_url("business")."/".$v['user_id']; ?>" target="_blank">
                        <div class="col-xs-1" style="background-image: url('https://simplesharebuttons.com/images/somacro/facebook.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>
                    </a>
                    <!-- Google+ -->
                    <a href="https://plus.google.com/share?url=<?= site_url("business")."/".$v['user_id']; ?>" target="_blank">
                        <div class="col-xs-1" style="background-image: url('https://simplesharebuttons.com/images/somacro/google.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>
                    </a>
                    <!-- LinkedIn -->
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= site_url("business")."/".$v['user_id']; ?>" target="_blank">
                        <div class="col-xs-1" style="background-image: url('https://simplesharebuttons.com/images/somacro/linkedin.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>
                    </a>
                    <!-- Reddit -->
                    <a href="http://reddit.com/submit?url=<?= site_url("business")."/".$v['user_id']; ?>&amp;title=Membership Management System" target="_blank">
                        <div class="col-xs-1" style="background-image: url('https://simplesharebuttons.com/images/somacro/reddit.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>

                    </a>
                    <!-- StumbleUpon-->
                    <a href="http://www.stumbleupon.com/submit?url=<?= site_url("business")."/".$v['user_id']; ?>&amp;title=Membership Management System" target="_blank">
                        <div class="col-xs-1" style="background-image: url('https://simplesharebuttons.com/images/somacro/stumbleupon.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>
                    </a>
                    <!-- Tumblr-->
                    <a href="http://www.tumblr.com/share/link?url=<?= site_url("business")."/".$v['user_id']; ?>&amp;title=Membership Management System" target="_blank">
                        <div class="col-xs-1" style="background-image: url('https://simplesharebuttons.com/images/somacro/tumblr.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>
                    </a>
                    <!-- Twitter -->
                    <a href="https://twitter.com/share?url=<?= site_url("business")."/".$v['user_id']; ?>&amp;text=Membership Management System&amp;hashtags=MembershipManagementSystem" target="_blank">
                        <div class="col-xs-1" style="background-image: url('https://simplesharebuttons.com/images/somacro/twitter.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>
                    </a>
                    <!--Whatsapp-->
                    <a href="whatsapp://send?text=<?= site_url("business")."/".$v['user_id']; ?>" data-action="share/whatsapp/share">
                        <div class="col-xs-1" style="background-image: url('http://diylogodesigns.com/blog/wp-content/uploads/2016/04/whatsapp-official-logo-png-download.png');height:45px;background-repeat:no-repeat;background-size: 100% 100%">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="" class="modal fade bs-example-modal-md in" id="advertModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 style="text-align: center" class="modal-title" id="mySmallModalLabel">Request An Advert</h4>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('home/insert/advert/advert',array('class'=>"form-signin")); ?>
                <p>Upload Horizontal Banner</p>
                <span>(600x160)</span>
                <input type="file" name="horizontal" class="form-control"/>
                <br/>
                <p>Upload Vertical Banner</p>
                <span>(160x600)</span>
                <input type="file" name="vertical" class="form-control"/>
                <br/>
                <p>Weeks</p>
                <select name="week" id="perWeek" class="form-control">
                    <?php for($i=1;$i<=52;$i++){ ?>
                        <option value="<?= $i ?>"><?= $i ?> Weeks</option>
                    <?php } ?>
                </select>
                <br/>
                <p>Advert Cost : £ 2.50/- per week</p>
                <p>Total Cost: £ <span id="advertquote">2.50</span>/-</p>
                <button type="submit" class="btn btn-info">Send Request</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    function admodal(){
        $("#advertModal").modal("toggle");
    }
    $("#perWeek").change(function(){
        var week = $("#perWeek").val();
        $.post("<?= site_url('home/ajax/advertCharges') ?>",{week:week},function(e){
            $("#advertquote").html(e);
        })

    });
    function openShare(){
        $(".shareNow").modal('toggle');
    }
    function openAtt(){
        $(".bs-example-modal-md").modal('toggle');
    }
    function openProfile(){
        $("#newModal").modal("toggle");
    }
    $(document).ready(function(){
        $("#main-content").css("margin-left","0px");
        $("#container").addClass("sidebar-closed");
        $('.custom1').owlCarousel({
            animateOut: 'fadeOutDown',
            animateIn: 'flipInX',
            items:1,
            margin:10,
            stagePadding:10,
            center:true,
            smartSpeed:450,
            loop:true,
            mouseDrag:true,
            touchDrag:true,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });
    });

</script>