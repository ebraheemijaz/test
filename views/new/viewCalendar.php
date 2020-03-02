<?php
$v = $members[0];
$cal = $calendar[0];
//var_dump($v);die;
?>
<style>
    .rating {
        unicode-bidi: bidi-override;
        /*direction: rtl;*/
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
    <div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-8-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_menu hidden-print">
                                <!--<div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>-->
                            </div>
                            <a href="<?= $_SERVER['HTTP_REFERER'];?>" class="uk-button uk-button-primary" style="float : right;">X</a>    
                            <div class="user_heading_avatar">
                                <div class="thumbnail">
                                    <?php $image = (empty($cal['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$cal['image'] ; ?>
                                    <a href="<?= $image ?>" data-uk-lightbox="{group:'user-photos1'}">
                                        <?php
                                            $exif = exif_read_data($image);
                                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                                            <img src="<?= $image ?>" style="width: 100%;height: 100%" alt="user avatar" class="detect"/>
                                            <?php
                                            }else if($exif['Orientation'] == 8){
                                                // $class = "md-card-head-avatar";
                                            ?>
                                            <img src="<?= $image ?>" style="width: 100%;height: 100%" alt="user avatar" class="detect8"/>
                                            <?php
                                            }else{
                                            ?>
                                            <img src="<?= $image ?>" style="width: 100%;height: 100%" alt="user avatar"/>
                                            <?php
                                            }
                                        ?>
                                    </a>
                                </div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?= $cal['desc'] ?></span>
                                </h2>
                                
                            </div>
                                <a class="md-fab md-fab-small md-fab-accent hidden-print" href="<?= site_url('home/save_event_calendar/'.$cal['event_id']) ?>">
                                    <i class="material-icons">cloud_download</i>
                                </a>
                        </div>
                        <div class="user_content">
                            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                                <li class="uk-active"><a href="#">Event Details</a></li>
                                <li class=""><a href="#">Description</a></li>
                            </ul>
                            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <h4 class="heading_c uk-margin-small-bottom">Event Details</h4>
                                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                        <div class="uk-width-large-1-1">
                                            <ul class="md-list md-list-addon">
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons">title</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading"><?= $cal['desc'] ?></span>
                                                                <span class="uk-text-small uk-text-muted">Title</span>
                                                            </div>
                                                        </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">link</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <?php
                                                            $url = parse_url($cal['link']);

                                                            if($url['scheme'] == 'https' || $url['scheme'] == 'http'){
                                                               $link = $cal['link'];
                                                            }else{
                                                                $link = "http://".$cal['link'];
                                                            }
                                                        ?>
                                                        <span class="md-list-heading"><a href="<?= $link ?>" target="__blank" style="word-wrap: break-word;"><?= $link ?></a></span>
                                                        <span class="uk-text-small uk-text-muted">Event Link</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">date_range</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $cal['date'] ?></span>
                                                        <span class="uk-text-small uk-text-muted">Start Date</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">date_range</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $cal['endDate'] ?></span>
                                                        <span class="uk-text-small uk-text-muted">End Date</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">description</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $cal['eventDesc'] ?></span>
                                                        <span class="uk-text-small uk-text-muted">Event Description</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">add_alert</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?php if($cal['isReminded']){echo 'Yes';}else{echo 'No';} ?></span>
                                                        <span class="uk-text-small uk-text-muted">Remind Members</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">access_time</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $cal['reminder_event']." mins" ?></span>
                                                        <span class="uk-text-small uk-text-muted">Reminder Time</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <h4 class="heading_c uk-margin-small-bottom">Reminder Description</h4>
                                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                        <div class="uk-width-large-1-1">
                                            <ul class="md-list md-list-addon">
                                                <?php foreach($remDesc as $rem){ ?>
                                                    <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons">date_range</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading"><?= $rem['date'] ?></span>
                                                                <!--<span class="uk-text-small uk-text-muted">Date</span>-->
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons">access_alarm</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading"><?= $rem['startTime'] ?></span>
                                                                <span class="uk-text-small uk-text-muted">Start Time</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons">access_alarm</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading"><?= $rem['endTime'] ?></span>
                                                                <span class="uk-text-small uk-text-muted">End Time</span>
                                                            </div>
                                                        </li>
                                                <?php } ?>        
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <h4 class="heading_c uk-margin-small-bottom">About Me</h4>
                                    <p>
                                        <?= $v['biography'] ?>
                                    </p>
                                </li>

                                <?php if(!empty($userAdmin)){ ?>
                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                        <!--<li>-->
                                        <!--    <?php if(!empty($v['child'])){ ?>-->
                                        <!--        <?php foreach($v['child'] as $ch){ ?>-->
                                        <!--            <div>-->
                                        <!--                <span onclick="deleteChildsConfirmationModal('<?= site_url('home/deleteChildFromProfile/'.$ch['id']) ?>')" class="md-btn md-btn-danger" style="float: right">Delete</span>-->
                                        <!--                <p><strong>Name</strong>:<?= ucfirst($ch['fname'])." ".ucfirst($ch['lname']); ?></p>-->
                                        <!--                <p><strong>Email</strong>:<?= $ch['email']; ?></p>-->
                                        <!--                <p><strong>Mobile</strong>:<?= $ch['mobile']; ?></p>-->
                                        <!--                <p><strong>Gender</strong>:<?= ucfirst($ch['gender']); ?></p>-->
                                        <!--                <p><strong>Date Of Birth</strong>:<?= date("d / M",strtotime("2016/".$ch['month']."/".$ch['day'])); ?></p>-->
                                        <!--            </div>-->
                                        <!--            <div class="row"></div>-->
                                        <!--            <hr/>-->
                                        <!--        <?php } ?>-->
                                        <!--    <?php }else{ ?>-->
                                        <!--        <h4 style="text-align: center">No Child Update</h4>-->
                                        <!--    <?php } ?>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                        <!--    <?php if(!empty($v['grandChild'])){ ?>-->
                                        <!--        <?php foreach($v['grandChild'] as $ch){ ?>-->
                                        <!--            <div>-->
                                        <!--                <span onclick="deleteChildsConfirmationModal('<?= site_url('home/deleteChildFromProfile/'.$ch['id']) ?>')" class="md-btn md-btn-danger" style="float: right">Delete</span>-->
                                        <!--                <p><strong>Name</strong>:<?= ucfirst($ch['fname'])." ".ucfirst($ch['lname']); ?></p>-->
                                        <!--                <p><strong>Email</strong>:<?= $ch['email']; ?></p>-->
                                        <!--                <p><strong>Mobile</strong>:<?= $ch['mobile']; ?></p>-->
                                        <!--                <p><strong>Gender</strong>:<?= ucfirst($ch['gender']); ?></p>-->
                                        <!--                <p><strong>Date Of Birth</strong>:<?= date("d / M",strtotime("2016/".$ch['month']."/".$ch['day'])); ?></p>-->
                                        <!--            </div>-->

                                        <!--            <div class="row"></div>-->
                                        <!--            <hr/>-->
                                        <!--        <?php } ?>-->
                                        <!--    <?php }else{ ?>-->
                                        <!--        <h4 style="text-align: center">No Grand Child Update</h4>-->
                                        <!--    <?php } ?>-->

                                        <!--</li>-->
                                        <li>
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
                                                <h4 style="text-align: center">No Reviews Yet</h4>
                                                <p></p>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                <?php } ?>



                            </ul>
                        </div>
                    </div>
                </div>
                <?php require_once('advert_v.php'); ?>

            </div>
        </div>
    </div>

<script>
    function addToBuddies(id){
        $.post("<?= site_url('home/ajax/addToBuddies') ?>",{id:id},function(e){
            console.log(e);
            //if(e == "a"){
                $("#addtoB").html("insert_emoticon");
                $(".addToBuddiesss").removeAttr("onclick");
                //alertify.message("Added to buddies");
                window.location.reload();
            //}
        })
    }
    function deleteFromBuddies(id){
        $.post("<?= site_url('home/ajax/deleteFromBuddies') ?>",{id:id},function(e){
            //console.log(e);
            //if(e == "a"){
            $("#addtoB").html("insert_emoticon");
            $(".addToBuddiesss").removeAttr("onclick");
            //alertify.message("Added to buddies");
            window.location.reload();
            //}
        })
    }
</script>