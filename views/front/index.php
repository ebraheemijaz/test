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
    .state-overview .value{
        padding: 10px 10px;
    }
    .panel-heading > h1{
        color:#ff9b23;
    }
    .value > p{
        cursor:pointer;
    }
    .count{
        font-size:30px;
    }
    .tpd-content{
        font-size:20px !important;
    }
    .adHelp{
        cursor:pointer;
        text-decoration:underline !important;
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
            <aside class="profile-nav col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <section class="panel">
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
                        <p style="text-align:center;font-weight: bold;font-size:18px; ">
                            <?= $msg ?>
                            <br/>
                            <span style="font-size:14px;"><a onclick="ageGrou()" style="cursor:pointer;">Click to update your age group</a></span>
                        </p>
                    <?php } ?>
                    <div style="background: #ff9b23;" class="user-heading round">
                        <a href="#" id="profilePicHelp">
                            <?php $image = (empty($v['image'])) ? base_url('assets_f/img/tutor.png') : base_url('assets_f/img/business')."/".$v['image']; ?>
                            <img onclick="openProfile()" src="<?= $image ?>" alt="">
                        </a>
                        <h1 style="font-weight: 900" ><span id="userNameHelp"><?= ucfirst($v['fname']) ?> <?= ucfirst($v['lname']) ?></span></h1>
                        <p ><span id="userEmailHelp"><?= $v['email'] ?></span></p>
                        <p>
                        <div class="rating">
                            <span id="userRatingHelp">
                            <?php for($i=5;$i>=1;$i--){ ?>
                                <?php if($i > $ratingAvg[0]['rating']){ ?>
                                    <span class="unfilled">☆</span>
                                <?php }else{ ?>
                                    <span class="filled">☆</span>
                                <?php } ?>
                            <?php } ?>
                            </span>

                        </div>
                        </p>
                    </div>
                </section>
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
                    <div class="row"></div>
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
                                <i class="fa fa-spinner <?= ($unacceptedOffers[0]['total'] > 0) ? "fa-spin":""; ?>"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?= $unacceptedOffers[0]['total'] ?>
                                </h1>
                                <p>
                                    <a href="<?= site_url('home/view/manage_offers') ?>?type=received">Orders To-Do</a>
                                </p>
                            </div>
                        </section>
                    </div>
                    <!---->
                    <div class="row"></div>
                    <div class="col-lg-4 col-sm-4">
                        <section class="panel" id="msgHelp">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?= count($messageNotif) + count($adminmessageNotif); ?>
                                </h1>
                                <p onclick="seeMsgNotif('msgNotif')">
                                    New Message
                                </p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <section class="panel" id="wordHelp">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-sticky-note"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?= count($words); ?>
                                </h1>
                                <p onclick="seeMsgNotif('wordNotif')">
                                    Words
                                </p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <section class="panel" id="reminderHelp">
                            <div style="background:#78CD51" class="symbol terques">
                                <i class="fa fa-bell-o"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?= count($remindersNotif); ?>
                                </h1>
                                <p onclick="seeMsgNotif('remNotif')">
                                    Reminders
                                </p>
                            </div>
                        </section>
                    </div>
                    <div class="row"></div>
                    <div class="notificationss"></div>
                    <div class="col-lg-12" id="msgNotif" style="display:none;">
                        <section class="panel">
                            <header class="panel-heading">
                                <h1>Message Notification</h1>
                            </header>
                            <table class="table table-hover">
                                <?php if(!empty($messageNotif) OR !empty($adminmessageNotif)){ ?>
                                    <?php foreach($messageNotif as $val){ ?>
                                        <tr>
                                            <td>You received a new message from <?= $val['member'] ?></td>
                                            <td><a href="<?= site_url("home/view/chat") ?>#<?= $val['from'] ?>">View</a></td>
                                        </tr>
                                    <?php } ?>
                                    <?php foreach($adminmessageNotif as $val){ ?>
                                        <tr>
                                            <td>You received a new message from <strong>Admin:</strong><?= $val['member'] ?></td>
                                            <td><a href="<?= site_url("home/view/chat_admin") ?>#<?= $val['from'] ?>">View</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php }else{ ?>
                                        <tr>
                                            <td>No New Message</td>
                                        </tr>
                                <?php } ?>

                            </table>
                        </section>
                    </div>
                    <div class="col-lg-12" id="wordNotif" style="display:none;">
                        <section class="panel">
                            <header class="panel-heading">
                                <h1>Word Notification</h1>
                            </header>
                            <table class="table table-hover">
                                <?php foreach($words as $val){ ?>
                                    <tr>
                                        <td>Admin Uploaded a new Word from Preacher: <strong><?= $val['preacher_name']; ?></strong> </td>
                                        <td><a href="<?= site_url('home/view/word_detailed?id='.$val['id']); ?>">View</a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </section>
                    </div>
                    <div class="col-lg-12" id="remNotif" style="display:none;">
                        <section class="panel">
                            <header class="panel-heading">
                                <h1>Reminders Notification</h1>
                            </header>
                            <a href="<?= site_url('home/view/create_reminder') ?>?date=<?= date("Y-m-d") ?>"><span style="margin-left:20px" class="btn btn-info">Create New</span></a>
                            <br/>
                            <table class="table table-hover">
                                <?php foreach($remindersNotif as $val){ ?>
                                    <tr>
                                        <td style="word-break: break-all">Today's Task <strong><?= $val['desc'] ?></strong></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </section>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3 col-md-3 visible-md visible-lg">
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
    </section>
</section>

<script>
    function helpEnabled(){
        $("#getHelp").html("<i class='fa fa-question'></i> Help Enabled");
        Tipped.create("#profilePicHelp", "Your profile picture", {
            skin: 'red',
            position: 'topleft',
            close: true,
            hideOn: false,
            onShow: function(content, element) {
                $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
                $(element).removeClass('highlight');
            }
        });
        $("#profilePicHelp").mouseover();
        Tipped.create("#userNameHelp", "Your Name", {
            skin: 'red',
            position: 'right',
            close: true,
            hideOn: false,
            onShow: function(content, element) {
                $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
                $(element).removeClass('highlight');
            }
        });
        $("#userNameHelp").mouseover();
        Tipped.create("#userEmailHelp", "Your Email", {
            skin: 'red',
            position: 'left',
            close: true,
            hideOn: false,
            onShow: function(content, element) {
                $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
                $(element).removeClass('highlight');
            }
        });
        $("#userEmailHelp").mouseover();
        Tipped.create("#userRatingHelp", "Your Rating", {
            skin: 'red',
            position: 'bottom',
            close: true,
            hideOn: false,
            onShow: function(content, element) {
                $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
                $(element).removeClass('highlight');
            }
        });
        $("#userRatingHelp").mouseover();
        //
        Tipped.create("#reminderHelp", "Click on 'Reminders'", {
            skin: 'red',
            position: 'bottom',
            close: true,
            hideOn: false,
            onShow: function(content, element) {
                $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
                $(element).removeClass('highlight');
            }
        });
        $("#reminderHelp").mouseover();
        //
        Tipped.create("#wordHelp", "Click on 'Word'", {
            skin: 'red',
            position: 'bottom',
            close: true,
            hideOn: false,
            onShow: function(content, element) {
                $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
                $(element).removeClass('highlight');
            }
        });
        $("#wordHelp").mouseover();
        //
        Tipped.create("#msgHelp", "Click on 'New Message'", {
            skin: 'red',
            position: 'bottom',
            close: true,
            hideOn: false,
            onShow: function(content, element) {
                $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
                $(element).removeClass('highlight');
            }
        });
        $("#msgHelp").mouseover();
        Tipped.create(".adHelp", "Show your brand to other members", {
            skin: 'red',
            position: 'top',
            close: true,
            hideOn: false,
            onShow: function(content, element) {
                $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
                $(element).removeClass('highlight');
            }
        });
        $(".adHelp").mouseover();
    }
    function seeMsgNotif(divv){
        $('.notificationss').prepend($('#'+divv));
        $('#'+divv).fadeToggle('slow');
    }
    function openProfile(){
        $("#newModal").modal("toggle");
    }
    function admodal(){
        $("#advertModal").modal("toggle");
    }
    function ageGrou(){
        $("#ageGroupModal").modal("toggle");
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
<div style="" class="modal fade bs-example-modal-md in" id="ageGroupModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 style="text-align: center" class="modal-title" id="mySmallModalLabel">Update Age Group</h4>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('home/editProfile/'.$v['id'],array('class'=>"form-signin")); ?>
                <p>Age Group</p>
                <select name="age_group" id="" class="form-control">
                    <option value="9"> 0 - 9 </option>
                    <option selected value="18"> 10 - 18 </option>
                    <option value="29"> 19 - 29 </option>
                    <option value="39"> 30 - 39 </option>
                    <option value="49"> 40 - 49 </option>
                    <option value="50"> Above 50 </option>
                </select>
                <br/>
                <br/>
                <button type="submit" class="btn btn-info">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("#perWeek").change(function(){
        var week = $("#perWeek").val();
        $.post("<?= site_url('home/ajax/advertCharges') ?>",{week:week},function(e){
            $("#advertquote").html(e);
        })

    });

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
</script>
