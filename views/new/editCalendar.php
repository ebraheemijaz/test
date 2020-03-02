<?php
$v = $userAdmin[0];
$reminder = $calendar[0];
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

</style>
    <div id="page_content">
        <div id="page_content_inner">
            <?php require_once('advert_h.php'); ?>

            <form action="<?= site_url('home/editCalendar/'.$reminder['event_id']); ?>" class="uk-form-stacked" method="post" id="user_edit_form" enctype="multipart/form-data">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">

                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <?php $image = (empty($reminder['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$reminder['image'] ; ?>
                                        <?php
                                            $exif = exif_read_data($image);
                                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                                            <img src="<?= $image ?>" id="blah1" alt="user avatar" class="detect"/>
                                            <?php
                                            }else if($exif['Orientation'] == 8){
                                                // $class = "md-card-head-avatar";
                                            ?>
                                            <img src="<?= $image ?>" id="blah1" alt="" class="detect8"/>
                                            <?php
                                            }else{
                                            ?>
                                            <img src="<?= $image ?>" id="blah1" alt=""/>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-new"></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="image" id="user_edit_avatar_control">
                                        </span>
                                        <!--<div class="btn-file fileinput-exists" onclick="deleteImageFrom('<?= $v['gander'] ?>', <?= $v['id'] ?>)" id="deleteExisting" style="display: block !important;"><i class="material-icons">&#xE5CD;</i></div>-->
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                        <!--<button type="button" class="btn-file fileinput-exists" value="0" id="leftRotate" style="display: block !important;top: 87%; left: -23%;"><i class="material-icons">rotate_left</i></button>-->
                                        <!--<button type="button" class="btn-file fileinput-exists" value="0" id="rightRotate" style="display: block !important;top: 87%; left: 79%;"><i class="material-icons">rotate_right</i></button>-->
                                    </div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b">
                                        <span class="uk-text-truncate" id="user_edit_uname" style="font-weight: bold;font-size:26px"><?= $reminder['desc'] ?></span>
                                    </h2>
                                </div>

                                <div class="md-fab-wrapper">
                                    
                                </div>
                            </div>
                            <div class="user_content">
                                <?php if(!empty($msg)){ ?><script>
                                    swal('success', '<?= $msg?>', 'success');
                                </script></span></p><?php } ?>
                                <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                    <li class="uk-active"><a href="#">Event Details</a></li>
                                    <li class="uk"><a href="#">Description</a></li>
                                    <!--<li class="uk"><a href="#">Grand Children</a></li>-->
                                    <!--<li class="uk"><a href="#">Church Groups</a></li>-->
                                </ul>
                                <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                General info
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">

                                                    <label for="user_edit_uname_control">Event Title</label>
                                                    <input class="md-input" value="<?= $reminder['desc'];?>" readonly type="text" name="desc" id=""/>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label for="user_edit_fname_control">Event Link (Optional)</label>
                                                    <input class="md-input" value="<?= $reminder['link'] ?>" type="text" id="user_edit_fname_control" name="link"/>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label for="description">Event Description</label>
                                                    <textarea class="md-input" name="eventDesc"><?= $reminder['eventDesc'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class='uk-grid' data-uk-grid-margin>
                                                <div class='uk-width-medium-1-2'>
                                                    <label for='user_edit_uname_control'>Start Date</label>
                                                    <input type="date" class="md-input" name="date" value="<?= $reminder['date'] ?>"/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">End Date</label>
                                                    <input type="date" class="md-input" name="endDate" value="<?= $reminder['endDate'] ?>"/>
                                                </div>
                                            </div>
                                    </li>
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                Event Complete Description
                                            </h3>
                                            <?php
                                            foreach($remDesc as $rem){
                                            ?>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label for="description">Date</label>
                                                    <input class="md-input" value="<?= $rem['date'] ?>" type="text" disabled id="user_edit_fname_control" name="link"/>
                                                </div>
                                            </div>
                                            <div class='uk-grid' data-uk-grid-margin>
                                                <div class='uk-width-medium-1-2'>
                                                    <label for='user_edit_uname_control'>Start Time</label>
                                                    <input type="time" class="md-input" name="startTime[]" value="<?= $rem['startTime'] ?>"/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">End Date</label>
                                                    <input type="time" class="md-input" name="endTime[]" value="<?= $rem['endTime'] ?>"/>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                Enter your Grand Child's details below
                                            </h3>
                                            <?php if($v['age_group'] >= 39){ ?><span class="md-btn md-btn-danger" onclick="addgrandChild()">Add +</span><?php } ?>
                                            <div id="grandChild">
                                            </div>
                                            <br/>

                                            <?php $ci = 0; ?>
                                            <?php foreach($v['grandChild'] as $ch){ ?>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">First Name</label>
                                                        <input class="md-input" type="text"  id="user_edit_uname_control" name="grandChild[<?= $ci ?>][<?= 'fname' ?>]" value="<?= $ch['fname'] ?>"/>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Last Name</label>
                                                        <input class="md-input" type="text"  id="user_edit_uname_control" name="grandChild[<?= $ci ?>][<?= 'lname' ?>]" value="<?= $ch['lname'] ?>"/>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Month Of Birth</label>
                                                        <select name="grandChild[<?= $ci ?>][month]" id="" class="md-input">
                                                            <option <?= ($ch['month'] == '1') ? "selected" : ""; ?> value='1'>January</option>
                                                            <option <?= ($ch['month'] == "2") ? "selected" : ""; ?> value='2'>February</option>
                                                            <option <?= ($ch['month'] == '3 ')? "selected" : ""; ?> value='3'>March</option>
                                                            <option <?= ($ch['month'] == "4")? "selected" : ""; ?> value='4'>April</option>
                                                            <option <?= ($ch['month'] == "5")? "selected" : ""; ?> value='5'>May</option>
                                                            <option <?= ($ch['month'] == "6")? "selected" : ""; ?> value='6'>June</option>
                                                            <option <?= ($ch['month'] == "7")? "selected" : ""; ?> value='7'>July</option>
                                                            <option <?= ($ch['month'] == "8")? "selected" : ""; ?> value='8'>August</option>
                                                            <option <?= ($ch['month'] == "9")? "selected" : ""; ?> value='9'>September</option>
                                                            <option <?= ($ch['month'] == "10")? "selected" : ""; ?> value='10'>October</option>
                                                            <option <?= ($ch['month'] == "11")? "selected" : ""; ?> value='11'>November</option>
                                                            <option <?= ($ch['month'] == "12")? "selected" : ""; ?> value='12'>December</option>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Day Of Birth</label>
                                                        <select name="grandChild[<?= $ci ?>][day]" id="" class="md-input">
                                                            <?php for($i=1;$i<=31;$i++){ ?>
                                                                <option <?= ($ch['day'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_age_group_control">Age Group</label>
                                                        <select name="grandChild[<?= $ci ?>][<?= 'age_group' ?>]" class="md-input">
                                                            <option value="">Select Age Group</option>
                                                            <?php if($v['age_group'] >= 39){ ?><option <?= ($ch['age_group'] == "9")? "selected" : ""; ?> value="9"> 0 - 9 </option><?php } ?>
                                                            <?php if($v['age_group'] >= 49){ ?><option <?= ($ch['age_group'] == "12")? "selected" : ""; ?> value="12"> 10 - 12 </option><?php } ?>
                                                            <?php if($v['age_group'] >= 69){ ?><option <?= ($ch['age_group'] == "18")? "selected" : ""; ?> value="18"> 13 - 18 </option><?php } ?>
                                                            <?php if($v['age_group'] >= 70){ ?><option <?= ($ch['age_group'] == "29")? "selected" : ""; ?> value="29"> 19 - 29 </option><?php } ?>
                                                            <?php if($v['age_group'] >= 70){ ?><option <?= ($ch['age_group'] == "39")? "selected" : ""; ?> value="39"> 30 - 39 </option><?php } ?>
                                                            <?php if($v['age_group'] >= 70){ ?><option <?= ($ch['age_group'] == "49")? "selected" : ""; ?> value="49"> 40 - 49 </option><?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Gender</label>
                                                        <select name="grandChild[<?= $ci ?>][<?= 'gender' ?>]" class="md-input">
                                                            <option <?= ($ch['gender'] == 'male')? "selected" : ""; ?> value="male">Male</option>
                                                            <option <?= ($ch['gender'] == 'female')? "selected" : ""; ?> value="female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Email</label>
                                                        <input class="md-input" type="email"  id="user_edit_uname_control" name="grandChild[<?= $ci ?>][<?= 'email' ?>]" value="<?= $ch['email'] ?>"/>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Mobile</label>
                                                        <input class="md-input" type="text"  id="user_edit_uname_control" name="grandChild[<?= $ci ?>][<?= 'mobile' ?>]" value="<?= $ch['mobile'] ?>"/>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr>
                                                <br>
                                                <?php $ci++; } ?>
                                            <script> gci = <?= $ci; ?> </script>
                                        </div>
                                    </li>
                                </ul>
                                <!--<div class="md-fab md-fab-toolbar md-fab-small md-fab-accent" style="width:68px;background:#7cb342;position:static;z-index:auto;right:auto;bottom:auto;box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);    border-radius: 4px;transition: all 280ms cubic-bezier(.4, 0, .2, 1);-->
    <!--cursor: default;">-->
                                        <!--<div style="visibility:visible;white-space:nowrap;padding:0 16px;overflow:hidden;box-sizing:border-box;display:block;">-->
                                            <button type="submit" id="user_edit_save" class="md-btn md-btn-success">
                                                <span>Save</span>
                                            </button>
                                        <!--</div>-->
                                    <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

<script src="<?= base_url('assets_new') ?>/assets/js/custom/uikit_fileinput.min.js"></script>
<script>

    function removeGrand(id){
        $("#grandChildField"+id).remove();
    }
    
    function deleteImageFrom(gender, id){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h3>Are you sure you want to delete Image?</h3>' +
            '<span  onclick="deleteImage(' + id + ')" class="md-btn md-btn-primary addToBuddiesss">Yes</span>'+
            '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
            '</div>'+
            '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
    
    function deleteImage(id){
            UIkit.modal("#newModalAdv").hide();
            $.post("<?= site_url('home/ajax/deleteImage') ?>",{id:id},function(e){
                swal('success', 'Image Deleted Successfully.', 'success');
                window.location.reload();
            });
    }
    
    function addgrandChild(){
        console.log("["+gci+"]");
        var gchild = "<div id='grandChildField"+gci+"' style='padding: 15px 15px;border:1px #e8e8e8 solid'>" +
            "<a onclick='removeGrand("+ gci +")'>&times;</a> " +
            "<div class='row'></div> " +


            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>First Name</label> " +
            "<input type='text' class='md-input' name='grandChild["+gci+"][fname]'> " +
            "</div> " +

            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Last Name</label> " +
            "<input type='text' class='md-input' name='grandChild["+gci+"][lname]'> " +
            "</div> " +
            "</div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label>Birth Month</label>"+
            "<select class='md-input' onchange='gchildDay("+gci+")' id='gchildm"+gci+"' name='grandChild["+gci+"][month]'> ";
            gchild += "<option value='1'>January</option> " +
            "<option value='2'>February</option> " +
            "<option value='3'>March</option> " +
            "<option value='4'>April</option> " +
            "<option value='5'>May</option> " +
            "<option value='6'>June</option> " +
            "<option value='7'>July</option> " +
            "<option value='8'>August</option> " +
            "<option value='9'>September</option> " +
            "<option value='10'>October</option> " +
            "<option value='11'>November</option> " +
            "<option value='12'>December</option>";
            gchild += "</select>" +
            "</div> " +

            "<div class='uk-width-medium-1-2'>" +
            "<label>Birth Day</label>"+
            "<select class='md-input' id='gchildd"+gci+"' name='grandChild["+gci+"][day]'> ";
            for(var i = 1; i<=31;i++){
                gchild += "<option value='"+i+"'>"+i+"</option>";
            }
            gchild += "</select>" +
            "</div> " +
            "</div> " +

            "<div class='row'></div> <br/> " +
            "<div class='uk-grid' data-uk-grid-margin> "+
            "<div class='uk-width-medium-1-2'>"+
            "<label class=''>Age Group</label>"+
            "<select class='md-input' id='' name='grandChild["+gci+"][age_group]'> "+
            "<option value=''>Select Age Group</option>"+
            "<?php if($v['age_group'] >= 39){ ?><option value='9'>0 - 9</option><?php } ?>"+
            "<?php if($v['age_group'] >= 49){ ?><option value='12'>10 - 12</option><?php } ?>"+
            "<?php if($v['age_group'] >= 69){ ?><option value='18'>13 - 18</option><?php } ?>"+
            "<?php if($v['age_group'] >= 70){ ?><option value='29'>19 - 29</option><?php } ?>"+
            "<?php if($v['age_group'] >= 70){ ?><option value='39'>30 - 39</option><?php } ?>"+
            "<?php if($v['age_group'] >= 70){ ?><option value='49'>40 - 49</option><?php } ?>"+
            // "<option value='69'>50 - 69</option>"+
            // "<option value='70'>Above 70</option>"+
            "</select>"+
            "</div>"+
            "</div>"+
            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +

            "<div class='radios'> " +
            "<label class='label_radio col-lg-6 col-sm-6' for='radio-01'> " +
            "<input name='grandChild["+gci+"][gender]' id='radio-01' value='male' type='radio' checked /> Male " +
            "</label> " +
            "<label class='label_radio col-lg-6 col-sm-6' for='radio-02'> " +
            "<input name='grandChild["+gci+"][gender]' id='radio-02' value='female' type='radio' /> Female " +
            "</label> " +
            "</div>" +

            "</div>" +
            "</div>" +


            "<div class='row'></div> <br/>" +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Grand Child Email</label> " +


            "<p><input onchange='gchildEmail("+gci+")' id='gchildEmail"+gci+"' type='checkbox'>Enter Grand Child Email or tick box to enter your own</p>" +
            "<input type='email' class='md-input' name='grandChild["+gci+"][email]' id='gchildEmailval"+gci+"' placeholder='Enter Email' > " +
            "</div> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Grand Child Mobile</label> " +


            "<p><input onchange='gchildMobilee("+gci+")' id='gchildMobilec"+gci+"' type='checkbox'>Enter Grand Child Mobile or tick box to enter your own</p>" +
            "<input type='tel' class='md-input' name='grandChild["+gci+"][mobile]' id='gchildMobileval"+gci+"' placeholder='Enter Mobile' > " +
            "</div> " +
            "</div> " +


            "</div>" +
            "<hr/><div class='row'></div>";
        $("#grandChild").prepend(gchild);
        gci++;
    }
    function gchildEmail(i){
        if($('#gchildEmail'+i)[0].checked){
            var email = "<?= $v['email'] ?>";
            $("#gchildEmailval"+i).val(email);
        }
    }
    function gchildMobilee(i){
        if($('#gchildMobilec'+i)[0].checked){
            var email = "<?= $v['mobileNo'] ?>";
            $("#gchildMobileval"+i).val(email);
        }
    }

    function cchildEmail(i){
        if($('#cchildEmail'+i)[0].checked){
            var email = "<?= $v['email'] ?>";
            $("#cchildEmailval"+i).val(email);
        }
    }
    function cchildMobilee(i){
        if($('#cchildMobilec'+i)[0].checked){
            var email = "<?= $v['mobileNo'] ?>";
            $("#cchildMobileval"+i).val(email);
        }
    }
    function removechild(id){
        $("#ChildField"+id).remove();
    }
    function addChild(){
        var parentAge = "<?= $v['age_group'] ?>";
        var child = "<div id='ChildField"+ci+"' style='padding: 15px 15px;border:1px #e8e8e8 solid'> " +
            "<a onclick='removechild("+ ci +")'>&times;</a> " +
            "<div class='row'></div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>First Name </label> " +
            "<input type='text' class='md-input' name='child["+ci+"][fname]'> " +
            "</div> " +

            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Last Name </label> " +
            "<input type='text' class='md-input' name='child["+ci+"][lname]'> " +
            "</div> " +
            "</div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Birth Month</label> " +
            "<select class='md-input' onchange='childDay("+ci+")' id='childm"+ci+"' name='child["+ci+"][month]'> ";
        child += "<option value='1'>January</option> " +
        "<option value='2'>February</option> " +
        "<option value='3'>March</option> " +
        "<option value='4'>April</option> " +
        "<option value='5'>May</option> " +
        "<option value='6'>June</option> " +
        "<option value='7'>July</option> " +
        "<option value='8'>August</option> " +
        "<option value='9'>September</option> " +
        "<option value='10'>October</option> " +
        "<option value='11'>November</option> " +
        "<option value='12'>December</option>";
        child += "</select>" +
        "</div> " +
        "<div class='uk-width-medium-1-2'>" +
        "<label for='user_edit_uname_control'>Birth Day</label> " +
        "<select class='md-input' id='childd"+ci+"' name='child["+ci+"][day]'> ";
        for(var i = 1; i<=31;i++){
            child += "<option value='"+i+"'>"+i+"</option>";
        }
        child += "</select>" +
        "</div> " +
        "</div>" +
        "<div class='row'></div> </br>" +
        "<div class='col-md-6'> "+
        "<label for='user_edit_age_group_control'>Age Group</label>" +
        "<select class='md-input' id='' name='child["+ci+"][age_group]'> "+
        "<option value=''>Select Age Group</option>"+
        "<?php if($v['age_group'] >= 18){ ?><option value='9'>0 - 9</option><?php } ?>"+
        "<?php if($v['age_group'] >= 29){ ?><option value='12'>10 - 12</option><?php } ?>"+
        "<?php if($v['age_group'] >= 39){ ?><option value='18'>13 - 18</option><?php } ?>"+
        "<?php if($v['age_group'] >= 49){ ?><option value='29'>19 - 29</option><?php } ?>"+
        "<?php if($v['age_group'] >= 69){ ?><option value='39'>30 - 39</option><?php } ?>"+
        "<?php if($v['age_group'] >= 70){ ?><option value='49'>40 - 49</option><?php } ?>"+
        "<?php if($v['age_group'] >= 70){ ?><option value='69'>50 - 69</option><?php } ?>"+
        // "<option value='70'>Above 70</option>"+
        "</select>"+
        "</div>" +
        "<div class='col-md-6'> " +
        "<div class='radios'> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-01'> " +
        "<input name='child["+ci+"][gender]' id='radio-01' value='male' type='radio' checked /> Male " +
        "</label> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-02'> " +
        "<input name='child["+ci+"][gender]' id='radio-02' value='female' type='radio' /> Female " +
        "</label> " +
        "</div> " +
        "</div> " +
        "<div class='row'></div> </br>" +
        "<div class='uk-grid' data-uk-grid-margin> " +
        "<div class='uk-width-medium-1-2'>" +
        "<label for='user_edit_uname_control'>Child Email</label> " +
        "<p><input onchange='cchildEmail("+ci+")' id='cchildEmail"+ci+"' type='checkbox'>Enter Child Email or tick box to enter your own</p>" +
        "<input type='email' class='md-input' name='child["+ci+"][email]' id='cchildEmailval"+ci+"' placeholder='Enter Email' > " +
        "</div> " +

        "<div class='uk-width-medium-1-2'>" +
        "<label for='user_edit_uname_control'>Child Mobile</label> " +
        "<p><input onchange='cchildMobilee("+ci+")' id='cchildMobilec"+ci+"' type='checkbox'>Enter Child Mobile or tick box to enter your own</p>" +
        "<input type='tel' class='md-input' name='child["+ci+"][mobile]' id='cchildMobileval"+ci+"' placeholder='Enter Mobile' > " +
        "</div> " +
        "</div> " +
        "</div> " +
        "</div>" +
        "<hr/><div class='row'></div>";

        $("#child").prepend(child);
        ci++;
    }
    function childDay(ci){
        var a = "";
        var month = $("#childm"+ci).val();
        var x = getMonthDays(month);
        for(var i = 1;i<=x;i++){
            a+="<option value='"+ i +"'>"+ i +"</option>";
        }
        $("#childd"+ci).html(a);
    }
    function gchildDay(ci){
        var a = "";
        var month = $("#gchildm"+ci).val();
        var x = getMonthDays(month);
        for(var i = 1;i<=x;i++){
            a+="<option value='"+ i +"'>"+ i +"</option>";
        }
        $("#gchildd"+ci).html(a);
    }
    function validate(evt) {
          var theEvent = evt || window.event;
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode( key );
          var regex = /[0-9]|\./;
          if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
        }
    function getMonthDays(month){
        if(month == 1){
            return 31;
        }else if(month == 2){
            return 28;
        }else if(month == 3){
            return 31;
        }else if(month == 4){
            return 30;
        }else if(month == 5){
            return 31;
        }else if(month == 6){
            return 30;
        }else if(month == 7){
            return 31;
        }else if(month == 8){
            return 31;
        }else if(month == 9){
            return 30;
        }else if(month == 10){
            return 31;
        }else if(month == 11){
            return 30;
        }else if(month == 12){
            return 31;
        }
    }
    $(".monthh").change(function(){
        var a = "";
        var month = $(".monthh").val();console.log(month)

        if(month == 1){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 2){
            for(var i = 1;i<=28;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 3){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 4){
            for(var i = 1;i<=30;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 5){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 6){
            for(var i = 1;i<=30;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 7){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 8){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 9){
            for(var i = 1;i<=30;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 10){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 11){
            for(var i = 1;i<=30;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 12){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }
        //$(".birth_datee").html(a);
    });
$('#leftRotate').on('click', function(){
   var img = $('#blah');
    var degree = $(this).val();
    var right = $('#rightRotate').val();
    img.width = 200;
    img.height = 200;
    degree = parseInt(degree) + parseInt(90);
    if(degree >= 360){
        // alert('hello');
        $('#leftRotate').val('0');
    }
    $('#blah').animate({  transform: degree }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
    });
    $('#leftRotate').val(degree);
    $('#rightRotate').val(degree);
});

$('#rightRotate').on('click', function(){
   var img = $('#blah');
    var degree = $(this).val();
    var right = $('#rightRotate').val();
    img.width = 200;
    img.height = 200;
    degree = parseInt(degree) - parseInt(90);
    if(degree >= 360){
        // alert('hello');
        $('#rightRotate').val('0');
    }
    $('#blah').animate({  transform: degree }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
    });
    $('#rightRotate').val(degree);
    $('#leftRotate').val(degree);
});
$(document).ready(function(){
   $('.fileinput-preview').attr('id', 'blah'); 
});

$('#user_edit_save').on('click', function(){
    var email = $('#email').val();
    var hobbies = $('#hobbies').val();
    var member_since_month = $('#member_since_month').val();
    var member_since_year = $('#member_since_year').val();
    var address = $('#address').val();
    var town = $('#town').val();
    var poatalCode = $('#poatalCode').val();
    var bgroup = $('#bgroup').val();
    var employ = $('#employ').val();
    var marital = $('#marital').val();
    var biography = $('#biography').val();
    if(email != '' || email != null || email != undefined){
        if(hobbies != '' || hobbies != null || hobbies != undefined){
            if(member_since_month != '' || member_since_month != null || member_since_month != undefined){
                if(member_since_year != '' || member_since_year != null || member_since_year != undefined){
                    if(address != '' || address != null || address != undefined){
                        if(town != '' || town != null || town != undefined){
                            if(poatalCode != '' || poatalCode != null || poatalCode != undefined){
                                if(bgroup != '' || bgroup != null || bgroup != undefined){
                                    if(employ != '' || employ != null || employ != undefined){
                                        if(marital != '' || marital != null || marital != undefined){
                                            if(biography != '' || biography != null || biography != undefined){
                                                return true;
                                            }else{
                                                UIkit.notify({
                                                    message : 'About me is required.',
                                                    status  : 'warning',
                                                    timeout : 2000,
                                                    pos     : 'top-center'
                                                });
                                                return false;
                                            }
                                        }else{
                                            UIkit.notify({
                                                message : 'Marital Status is required.',
                                                status  : 'warning',
                                                timeout : 2000,
                                                pos     : 'top-center'
                                            });
                                            return false;
                                        }
                                    }else{
                                        UIkit.notify({
                                            message : 'Employement Status is required.',
                                            status  : 'warning',
                                            timeout : 2000,
                                            pos     : 'top-center'
                                        });
                                        return false;
                                    }
                                }else{
                                    UIkit.notify({
                                        message : 'Business Group is required.',
                                        status  : 'warning',
                                        timeout : 2000,
                                        pos     : 'top-center'
                                    });
                                    return false;
                                }
                            }else{
                                UIkit.notify({
                                    message : 'Post Code is required.',
                                    status  : 'warning',
                                    timeout : 2000,
                                    pos     : 'top-center'
                                });
                                return false;
                            }
                        }else{
                            UIkit.notify({
                                message : 'Town is required.',
                                status  : 'warning',
                                timeout : 2000,
                                pos     : 'top-center'
                            });
                            return false;
                        }
                    }else{
                        UIkit.notify({
                            message : 'Address is required.',
                            status  : 'warning',
                            timeout : 2000,
                            pos     : 'top-center'
                        });
                        return false;
                    }
                }else{
                    UIkit.notify({
                        message : 'Member since year is required.',
                        status  : 'warning',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                    return false;
                }
            }else{
                UIkit.notify({
                    message : 'Member since month is required.',
                    status  : 'warning',
                    timeout : 2000,
                    pos     : 'top-center'
                });
                return false;
            }
        }else{
           UIkit.notify({
                message : 'Hobbies are required.',
                status  : 'warning',
                timeout : 2000,
                pos     : 'top-center'
            }); 
            return false;
        }
    }else{
        UIkit.notify({
            message : 'Email address is required.',
            status  : 'warning',
            timeout : 2000,
            pos     : 'top-center'
        });
        return false;
    }
});

function checkChildAge(){
    
}

</script>
<script>
    <?php if(isset($_GET['action']) AND $_GET['action'] == 'age'){ ?>
        window.localStorage.setItem("member<?= $v['id']; ?>","true");
    <?php } ?>
</script>