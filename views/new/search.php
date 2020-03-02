<div id="page_content">
    <div id="page_content_inner">
        <?php require_once('advert_h.php'); ?>
        <h3 class="heading_b uk-margin-bottom">Search</h3>
        <p>(Public Information)</p>
        <div

            data-step="1"
            data-intro="Search Area"

            class="md-card uk-margin-medium-bottom" >
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-vertical-align">
                            <div class="uk-vertical-align-middle">
                                <ul id="contact_list_filter" class="uk-subnav uk-subnav-pill uk-margin-remove">
                                    <li class="uk-active" data-uk-filter=""><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label for="contact_list_search">Search... (min 2 char.)</label>
                        <input

                            data-step="2"
                            data-intro="Enter Member Name or Business Category"

                            class="md-input" type="text" id="contact_list_search"/>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="heading_b uk-text-center grid_no_results" style="display:none">No results found</h3>
        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-5 hierarchical_show" id="contact_list">
            <?php foreach($members as $key => $val){ ?>
                <?php if($val['id'] != $userAdmin[0]['id']){ ?>
                    <?php if($val['first_time'] == 'no'){ ?>
                        <div data-uk-filter="<?= str_replace(","," ",$val['bgrop']) ?>,<?= str_replace(","," ",strtolower($val['bgrop'])) ?>,<?= strtolower($val['fname'])." ".strtolower($val['lname']) ?>,<?= strtolower($val['fname']).",".strtolower($val['lname']) ?>,<?= strtolower($val['email']) ?>,<?= $val['fname'].",".$val['lname'] ?>,<?= $val['fname']." ".$val['lname'] ?>">
                            <div class="md-card md-card-hover">

                                <div class="user_heading">
                                    <div class="user_heading_menu hidden-print">
                                        <?php  if(in_array($val['id'],$friends)){ ?>
                                            <div data-step="1" data-intro="The user in your buddy list. Click to un friend" onclick="deleteFromBuddiesModalFunc('<?= $val['fname'] ?>',<?= $val['id'] ?>)" class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons">insert_emoticon</i></div>
                                            <div data-step="2" data-intro="Click Here to send a message" class="uk-display-inline-block">
                                                <a href="<?= site_url('home/view/chat#'.$val['id']); ?>"><i class="md-icon md-icon-light material-icons">chat</i></a>
                                            </div>
                                        <?php }else{ ?>
                                            <div data-step="1" data-intro="Click to add the user in your buddy list" onclick="AddToBuddiesModalFunc('<?= $val['fname'] ?>',<?= $val['id'] ?>)"  class="uk-display-inline-block addToBuddiesss" id="testing"><i id="addtoB" class="md-icon md-icon-light material-icons">supervisor_account</i></div>
                                        <?php } ?>
                                    </div>
                                    <div class="user_heading_avatar">
                                        <div class="thumbnail">
                                            <?php $image = (empty($val['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$val['image'] ; ?>
                                            <a href="<?= $image ?>" data-uk-lightbox="{group:'user-photos1'}">
                                                <?php
                                            $exif = exif_read_data($image);
                                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                                            <img src="<?= $image ?>" style="width: 100%;height: 100%" alt="user avatar" class="detect">
                                            <?php
                                            }else if($exif['Orientation'] == 8){
                                                // $class = "md-card-head-avatar";
                                            ?>
                                            <img src="<?= $image ?>" style="width: 100%;height: 100%" alt="user avatar" class="detect8">
                                            <?php
                                            }else{
                                            ?>
                                            <img src="<?= $image ?>" style="width: 100%;height: 100%" alt="user avatar">
                                            <?php
                                            }
                                        ?>
                                                
                                            </a>
                                            <h3 class="md-card-head-text uk-text-center">
                                                <a href="<?= site_url('home/member') ?>/<?= $val['id'] ?>">
                                                    <?= $val['fname']." ".$val['lname'] ?>
                                                </a>
                                                <span class="uk-text-truncate"><?= $val['bgrop'] ?></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>


                                <div class="md-card-head" style="height: 100%">
                                    <h3 class="md-card-head-text uk-text-center">
                                        <a href="<?= site_url('home/member') ?>/<?= $val['id'] ?>">
                                            <?= $val['fname']." ".$val['lname'] ?>
                                        </a>
                                        <span class="uk-text-truncate"><?= $val['bgrop'] ?></span>
                                    </h3>
                                </div>
                                <div class="md-card-content" style="padding:0 16px">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading">Info</span>
                                            <span class="uk-text-small uk-text-muted">
                                                <a href="<?= site_url('home/member') ?>/<?= $val['id'] ?>">
                                                    <span class="md-btn md-btn-primary">See More</span>
                                                </a>
                                                <?//= substr($val['career'],0,100) ?>
                                            </span>
                                                <hr/>
                                                <a target="_blank" href="<?= site_url('business/'.$val['id']); ?>">Business Page</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>

    </div>
    <script>
        <?php if(isset($_GET['q'])){ ?>
        setTimeout(function(){
            $("#contact_list_search").val("<?= $_GET['q'] ?>");
            $("#contact_list_search").keyup();
            $("#contact_list_search").focusin();
        },1000);
        <?php } ?>
    </script>

    <script>
        function addToBuddies(id){
            //alert(id);
            $(".addToBuddiesss").attr("disabled","disabled").css("cursor", "default").fadeTo(500,0.2);
            var modal = UIkit.modal("#newModalAdv").hide();
            // $(".addToBuddiesss").removeAttr("onclick");
            $('#testing').attr("onclick", "");
            $('#addtoB').attr("disabled", true);
            $.post("<?= site_url('home/ajax/addToBuddies') ?>",{id:id},function(e){
                //if(e == "a"){
                $("#addtoB").html("insert_emoticon");
                //alertify.message("Added to buddies");
                window.location.reload();
                //}
            })
        }
        function deleteFromBuddies(id){
            $(".addToBuddiesss").attr("disabled","disabled").css("cursor", "default").fadeTo(500,0.2);
            $.post("<?= site_url('home/ajax/deleteFromBuddies') ?>",{id:id},function(e){
                //console.log(e);
                //if(e == "a"){
                $("#addtoB").html("insert_emoticon");
                //alertify.message("Added to buddies");
                window.location.reload();
                //}
            })
        }
    </script>