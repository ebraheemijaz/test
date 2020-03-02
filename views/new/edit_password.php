<?php
$v = $userAdmin[0];
?>
<style>
    .row {
        margin-right: -15px;
        margin-left: -15px;
    }
    .row:before,
    .row:after{
        display: table;
        content: " ";
    }
    .row:after{
        clear: both;
    }
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .switch input {display:none;}
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
</style>
    <div id="page_content">
        <div id="page_content_inner">
            <?php require_once('advert_h.php'); ?>

            <form action="<?= site_url('home/accSettings'); ?>" class="uk-form-stacked" method="post" id="user_edit_form" enctype="multipart/form-data">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-1-1">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">

                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <?php $image = $this->data->fetch('member', array('id' => $userAdmin[0]['id'])); ?>
                                        <?php $image = (empty($image[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$image[0]['image'] ; ?>
                                        <?php
                                            $exif = exif_read_data($image);
                                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                                            <img src="<?= $image ?>" alt="user avatar" class="detect"/>
                                            <?php
                                            }else if($exif['Orientation'] == 8){
                                                // $class = "md-card-head-avatar";
                                            ?>
                                            <img src="<?= $image ?>" alt="user avatar" class="detect8"/>
                                            <?php
                                            }else{
                                            ?>
                                            <img src="<?= $image ?>" alt="user avatar"/>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b">
                                        <span class="uk-text-truncate" id="user_edit_uname" style="font-weight: bold;font-size:26px"><?= $v['fname']." ".$v['lname'] ?></span>
                                    </h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                    <li class="uk-active"><a href="#">Change Password</a></li>
                                    <li class="uk"><a href="#">Deactivate Account</a></li>
                                    <li class="uk"><a href="#">Email Notification</a></li>
                                </ul>
                                <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                    <li>
                                        <div class="uk-margin-top">
                                            <?php if(!empty($msg)){ ?>
                                                <p style="text-align: center;font-size: 18px;color:red;"><span class="alert alert-warning"><?= $msg ?></span></p>
                                            <?php } ?>
                                            <h3 class="full_width_in_card heading_c">
                                                Change Password
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Current Password</label>
                                                    <input class="md-input" name="c_pwd" type="text" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">New Password</label>
                                                    <input class="md-input" type="text" name="new_pwd"/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Confirm Password</label>
                                                    <input class="md-input" type="text" name="cf_pwd"/>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <input class="md-btn md-btn-primary" value="Change" style="float: right" type="submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                Click Below Button To Deactivate Your Account.
                                            </h3>
                                            <a onclick="openDialog('<?= $userAdmin[0]['id']?>')" class="md-btn md-btn-success">Deactivate Account</a>
                                            <!--<span class="md-btn md-btn-danger" onclick="addChild()">Add +</span>-->
                                        </div>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                Click Below To Delete Your Account Permanently.
                                            </h3>
                                            <a onclick="openDialogDelete('<?= $userAdmin[0]['id']?>')" class="md-btn md-btn-success">Delete Account</a>
                                            <!--<span class="md-btn md-btn-danger" onclick="addChild()">Add +</span>-->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                <div class='tooltip' style='position: relative;display: inline-block;border-bottom: 1px dotted black;'>Do you want to subscribe to our email notifications?<span class='tooltiptext' style="bottom : -100%; left : 12%;width : 100%;">Getting regular email prompts about MMS updates will help to keep you abreast of events happening in church</span></div>
                                            </h3>
                                            <?php $emailSub = $this->data->fetch('member', array('id' => $userAdmin[0]['id']));?>
                                            <?php $adminDetail = $this->data->fetch('details'); ?>
                                            <span>No</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="switch">
                                              <input type="checkbox" <?php if($adminDetail[0]['emailSub'] == 0){?> disabled <?php } ?> <?php if($emailSub[0]['emailSub'] == 1){ ?>checked<?php }?> id="subscribe" name="subscribe">
                                              <span class="slider round"></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span>Yes</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </div>
<script>
    $(document).ready(function(){
        $('#subscribe').click(function(){
            if(this.checked){
                id = "<?= $userAdmin[0]['id']; ?>";
                swal({
                    title: "Are you sure?",
                    text: "Do you want to subscribe to our email notifications?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Subscribe!!!',
                    cancelButtonText: 'No!!!'
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            url: "<?= site_url('home') ?>/emailSub",
                            type: "POST",
                            data: {id:id, emailSub:1},
                            success: function(e){
                                swal(
                                  'Congratulation!',
                                  'You are subscribed to email notifications.',
                                  'success'
                                )
                                window.location.reload();
                            }
                        });
                    }
                });
            }else{
                id = "<?= $userAdmin[0]['id']; ?>";
                swal({
                    title: "Are you sure?",
                    text: "Do you want to unsubscribe from our email notifications?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Unsubscribe!!!',
                    cancelButtonText: 'No!!!'
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            url: "<?= site_url('home') ?>/emailSub",
                            type: "POST",
                            data: {id:id, emailSub:0},
                            success: function(e){
                                swal(
                                  'Congratulation!',
                                  'You are unsubscribed to email notifications.',
                                  'success'
                                )
                                window.location.reload();
                            }
                        });
                    }
                });
            }
        }); 
    });
</script>

