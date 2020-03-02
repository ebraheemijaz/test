<?php
$v = $members[0];
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
                                <?php if(!empty($userAdmin)){ ?>
                                    <?php if($userAdmin[0]['id'] != $v['id']){ ?>
                                        <?php if(in_array($v['id'],$friends)){ ?>
                                            <div data-step="1" data-intro="The user in your buddy list. Click to un friend" onclick="deleteFromBuddiesModalFunc('<?= $v['fname'] ?>',<?= $v['id'] ?>)" class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons">insert_emoticon</i></div>
                                            <div data-step="2" data-intro="Click Here to send a message" class="uk-display-inline-block">
                                                <a href="<?= site_url('home/view/chat#'.$v['id']); ?>"><i class="md-icon md-icon-light material-icons">chat</i></a>
                                            </div>
                                        <?php }else{ ?>
                                            <div data-step="1" data-intro="Click to add the user in your buddy list" onclick="AddToBuddiesModalFunc('<?= $v['fname'] ?>',<?= $v['id'] ?>)"  class="uk-display-inline-block addToBuddiesss"><i id="addtoB" class="md-icon md-icon-light material-icons">supervisor_account</i></div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <!--<div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>-->
                            </div>
                            <div class="user_heading_avatar">
                                <div class="thumbnail">
                                    <?php $image = (empty($v['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$v['image'] ; ?>
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
                                <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?= $v['title']." ".$v['fname']." ".$v['lname'] ?></span>
                                    <?php if(!empty($userAdmin)){ ?>
                                        <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                            <span class="sub-heading"><?= $v['email'] ?></span>
                                        <?php } ?>
                                    <?php } ?>

                                    
                                </h2>

                            </div>
                            <?php if($v['id'] == $userAdmin[0]['id']){ ?>
                                <a class="md-fab md-fab-small md-fab-accent hidden-print" href="<?= site_url('home/view/edit_profile') ?>">
                                    <i class="material-icons">&#xE150;</i>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="user_content">
                            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                                <li class="uk-active"><a href="#">Home</a></li>

                            </ul>
                            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                            <ul class="md-list md-list-addon">
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading"><?= $v['email'] ?></span>
                                                                <span class="uk-text-small uk-text-muted">Email</span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading"><?= $v['homeNo'] ?></span>
                                                                <span class="uk-text-small uk-text-muted">Phone</span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon  material-icons">&#xE8A5;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading"><?= $v['mobileNo'] ?></span>
                                                                <span class="uk-text-small uk-text-muted">Mobile</span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>



                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">&#xE63D;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $v['gander'] ?></span>
                                                        <span class="uk-text-small uk-text-muted">Gender</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">&#xE80B;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $v['nativeCountry'] ?></span>
                                                        <span class="uk-text-small uk-text-muted">Country Of Origin</span>
                                                    </div>
                                                </li>

                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon  material-icons">&#xE7E9;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading">
                                                                    <?php if($v['birth_month'] != 0){ ?>
                                                                        <?= date("d / M",strtotime("2017/".$v['birth_month']."/".$v['birth_date'])); ?>
                                                                    <?php } ?>
                                                                </span>
                                                                <span class="uk-text-small uk-text-muted">Date Of Birth</span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                                
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon  material-icons">&#xE7E9;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading">
                                                                    <?php if($v['member_since_year'] != 0){ ?>
                                                                        <?= date("M / Y", strtotime($v['member_since_year']."/".$v['member_since_month']."/1")); ?>
                                                                    <?php } ?>
                                                                </span>
                                                                <span class="uk-text-small uk-text-muted">Member Since</span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                                
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon material-icons">&#xE7E9;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading">
                                                                    <?php if($v['age_group'] == 18){ echo '13 - 18'; }else if($v['age_group'] == 29){ echo '19 - 29'; }else if($v['age_group'] == 39){ echo '30 - 39'; }elseif($v['age_group'] == 49){ echo '40 - 49'; }else if($v['age_group'] == 69){ echo '50 - 69';}else if($v['age_group'] == 70){ echo 'Above 70'; } ?>
                                                                </span>
                                                                <span class="uk-text-small uk-text-muted">Age Group</span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                                
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">hourglass_full</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">
                                                            <?= ucfirst($v['employement']); ?>
                                                        </span>
                                                        <span class="uk-text-small uk-text-muted">Employement</span>
                                                    </div>
                                                </li>
                                                
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">&#xE63D;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">
                                                            <?= ucfirst($v['maritalStatus']) ?>
                                                        </span>
                                                        <span class="uk-text-small uk-text-muted">Marital Status</span>
                                                    </div>
                                                </li>

                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <i class="md-list-addon-icon  material-icons">&#xE7F1;</i>
                                                            </div>
                                                            <div class="md-list-content">
                                                        <span class="md-list-heading">
                                                            <?= $v['address'] ?>
                                                            <br/>
                                                            <?= $v['address2'] ?>
                                                            <br/>
                                                            <?= $v['town'] ?>
                                                            <br/>
                                                            <?= $v['poatalCode'] ?>
                                                        </span>
                                                                <span class="uk-text-small uk-text-muted">Address</span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>
                                    <hr/>
                                    <h4 class="heading_c uk-margin-small-bottom">Profession</h4>
                                    <p><?= $v['career'] ?></p>
                                    <p><?= ucfirst($v['employement']); ?></p>
                                    <hr/>
                                    <h4 class="heading_c uk-margin-small-bottom">About Me</h4>
                                    <p>
                                        <?= $v['biography'] ?>
                                    </p>
                                    <hr/>
                                    <h4 class="heading_c uk-margin-small-bottom">Children</h4>
                                    <?php if(!empty($userAdmin)){ ?>
                                    <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                    <?php if(!empty($v['child'])){ ?>
                                                <?php foreach($v['child'] as $ch){ ?>
                                                    <div>
                                                        <span onclick="deleteChildsConfirmationModal('<?= site_url('home/deleteChildFromProfile/'.$ch['id']) ?>')" class="md-btn md-btn-danger" style="float: right">Delete</span>
                                                        <p><strong>Name</strong>:<?= ucfirst($ch['fname'])." ".ucfirst($ch['lname']); ?></p>
                                                        <p><strong>Email</strong>:<?= $ch['email']; ?></p>
                                                        <p><strong>Mobile</strong>:<?= $ch['mobile']; ?></p>
                                                        <p><strong>Gender</strong>:<?= ucfirst($ch['gender']); ?></p>
                                                        <p><strong>Date Of Birth</strong>:<?= date("d / M",strtotime("2016/".$ch['month']."/".$ch['day'])); ?></p>
                                                    </div>
                                                    <div class="row"></div>
                                                    <hr/>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <h4 style="text-align: center">No Child Update</h4>
                                            <?php } ?>
                                            <h4 class="heading_c uk-margin-small-bottom">Grand Children</h4>
                                            <?php if(!empty($v['grandChild'])){ ?>
                                                <?php foreach($v['grandChild'] as $ch){ ?>
                                                    <div>
                                                        <span onclick="deleteChildsConfirmationModal('<?= site_url('home/deleteChildFromProfile/'.$ch['id']) ?>')" class="md-btn md-btn-danger" style="float: right">Delete</span>
                                                        <p><strong>Name</strong>:<?= ucfirst($ch['fname'])." ".ucfirst($ch['lname']); ?></p>
                                                        <p><strong>Email</strong>:<?= $ch['email']; ?></p>
                                                        <p><strong>Mobile</strong>:<?= $ch['mobile']; ?></p>
                                                        <p><strong>Gender</strong>:<?= ucfirst($ch['gender']); ?></p>
                                                        <p><strong>Date Of Birth</strong>:<?= date("d / M",strtotime("2016/".$ch['month']."/".$ch['day'])); ?></p>
                                                    </div>

                                                    <div class="row"></div>
                                                    <hr/>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <h4 style="text-align: center">No Grand Child Update</h4>
                                            <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                </li>
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