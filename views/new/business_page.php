<?php
$v = $business[0];

?>
<style>
    .uk-modal-caption{
        color:black;
        font-weight: bold;
    }
</style>
    <div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-8-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_menu hidden-print">
                                <div class="uk-display-inline-block">
                                    <a onclick="report(<?= $v['id'] ?>)"><i class="md-icon material-icons md-icon-light">bug_report</i></a>
                                </div>
                                <div class="uk-display-inline-block" data-uk-dropdown="{pos:'left-top'}">
                                    <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a target="_blank" style="cursor:pointer;" class="btn" data-clipboard-text="<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>">Copy Link</a></li>
                                            <li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>">Facebook</a></li>
                                            <li><a target="_blank" href="https://twitter.com/share?url=<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>&amp;text=Membership Management System&amp;hashtags=MembershipManagementSystem">Twitter</a></li>
                                            <li><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>">LinkedIn</a></li>
                                            <!--<li><a target="_blank" href="http://reddit.com/submit?url=<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>&amp;title=Membership Management System">Reddit</a></li>-->
                                            <li><a target="_blank" href="http://www.stumbleupon.com/submit?url=<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>&amp;title=Membership Management System">Stumble Upon</a></li>
                                            <li><a target="_blank" href="http://www.tumblr.com/share/link?url=<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>&amp;title=Membership Management System">Tumblr</a></li>
                                            <li><a target="_blank" href="mailto:?Subject=Membership Management System&amp;Body=%20 <?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>">Email</a></li>
                                            <li><a target="_blank" href="https://plus.google.com/share?url=<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>">Google+</a></li>
                                            <li><a href="whatsapp://send?text=<?= base_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>">whatsapp</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--<div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>-->
                                <?php if($v['user_id'] == $userAdmin[0]['id']){ ?>
                                    <?php if($v['phone'] == '' OR $v['email'] == ''){ ?>
                                    <script>
                                        $(document).ready(function(){
                                            businessPageEnterInf();
                                        });

                                    </script>
                                    <?php } ?>
                                    <a href="#my-disclaimer" data-uk-modal><div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons">announcement</i></div></a>
                                    <div id="my-disclaimer" class="uk-modal">
                                        <div class="uk-modal-dialog">
                                            <a href="" class="uk-modal-close uk-close"></a>
                                            <h1><?= "Disclaimer"; ?></h1>
                                            <p  style="color:black !important;text-align:justify">
                                                MMS claims no responsibility for any of your contact information displayed here as this area is viewed by all
                                                members and the public at large. Edit and display what you are comfortable for the public to see
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="user_heading_avatar">
                                <div class="thumbnail">
                                    <?php $image = (empty($v['logo'])) ? base_url('assets_f/img/business/your-logo-here.png') : base_url('assets_f/img/business')."/".$v['logo'] ; ?>
                                    <a href="<?= $image ?>" data-uk-lightbox="{group:'user-photos1'}">
                                        <img src="<?= $image ?>" alt="user avatar"/>
                                    </a>
                                </div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate" id="test"><?= ucfirst($v['title']); ?></span>
                                    <span class="sub-heading"><?= $v['email'] ?></span>
                                </h2>

                            </div>
                            <?php if($v['user_id'] == $userAdmin[0]['id']){ ?>
                                <a class="md-fab md-fab-small md-fab-accent hidden-print" href="<?= site_url('home/view/edit_business/'.$userAdmin[0]['id']) ?>">
                                    <i class="material-icons">&#xE150;</i>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="user_content">
                            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                                <li class="uk-active"><a href="#">About Us</a></li>
                                <li><a href="#">Who We Are</a></li>
                                <!--<li><a href="#">Our Services</a></li>-->
                                <li><a href="#">Products & Services</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <?= $v['services']; ?>
                                </li>
                                <li>
                                    <h4 class="heading_c uk-margin-small-bottom">Who We Are</h4>
                                    <p>
                                        <?= $v['about'] ?>
                                    </p>
                                </li>
                                <!--<li>
                                    <h4 class="heading_c uk-margin-small-bottom">Our Services</h4>
                                    <p>
                                        <?/*= $v['services'] */?>
                                    </p>
                                </li>-->
                                <li>
                                    <h4 class="heading_c uk-margin-small-bottom">Products & Services</h4>
                                    <?php if(!empty($userAdmin)){ ?>
                                        <?php if($userAdmin[0]['id'] != $v['user_id']){ ?>
                                        <?php }else{ ?>
                                            <button onclick="AddProductAndServices()" class="md-btn md-btn-primary" type="submit">Add</button>
                                            <br>
                                            <br>
                                        <?php } ?>
                                    <?php } ?>
                                    <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                                        <?php foreach($products as $val){ ?>
                                            <div class="col-md-3">
                                                <a href="<?= base_url("assets_f/img/business") ?>/<?= $val['img'] ?>" data-uk-lightbox="{group:'user-photo'}" title="<?= $val['desc'] ?>">
                                                    <img style="width: 100px" src="<?= base_url("assets_f/img/business") ?>/<?= $val['img'] ?>" alt=""/>
                                                </a>
                                                <br>
                                                <p><?= wordwrap($val['desc'], 15,"<br>\n"); ?></p>
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] != $v['user_id']){ ?>
                                                    <?php }else { ?>
                                                <a style="cursor: pointer" onclick="deleteC('<?= site_url('home/deleteimages/'.$val['id']) ?>')">Delete</a>
                                                <br/>
                                                <a style="cursor: pointer" onclick="editM('<?= $val['id'] ?>','<?= $val['desc']?>', '<?= $val['img'] ?>', '<?= $val['parent_id']?>')">Edit</a>
                                                <?php } ?>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>


                                </li>
                                <li>
                                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $v['email'] ?></span>
                                                        <span class="uk-text-small uk-text-muted">Email</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $v['phone']; ?></span>
                                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">&#xE8A5;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="<?= $v['website']; ?>" target="_blank">Click Here</a></span>
                                                        <span class="uk-text-small uk-text-muted">Website</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon  material-icons">&#xE63D;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?= $v['address']; ?></span>
                                                        <span class="uk-text-small uk-text-muted">Address</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h4 class="heading_c uk-margin-small-bottom">Contact Us</h4>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label for="user_edit_uname_control">Name</label>
                                            <input class="md-input" type="text" id="user_edit_uname_control" name="name" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="user_edit_uname_control">Email</label>
                                            <input class="md-input" type="text" id="user_edit_uname_control" name="email" />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label for="user_edit_uname_control">Message</label>
                                            <textarea class="md-input" id="user_edit_uname_control" name="msg"></textarea>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <button onclick="sendemailBusiness()" class="md-btn md-btn-primary">Send</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <?php require_once('advert_v.php') ?>
            </div>
        </div>
    </div>
<script>
    function hideMenyeBaar(){
        console.log(1);
        $("#sidebar_main_toggle").click();
    }
    hideMenyeBaar();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>
<div class="confirmationModalOnD"></div>
<div class="confirmationModalOnE"></div>

<script>
    function editM(id, desc, img, parent_id){
        var a = '<div class="uk-modal" id="confirmEdit"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h3>Edit Product & Services</h3>' +
            '<form action="<?= site_url('home/editProduct')?>/'+id+'" method="post" accept-charset="utf-8" class="form-signin" autocomplete="off" style="max-width: 100% !important;" enctype="multipart/form-data">'+
            '<?= form_open_multipart('home/editProduct?id='+id+'&parent_id='+parent_id,array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>' +
            '<div class="login-wrap"> ' +
                '<div class="uk-grid" data-uk-grid-margin>' +
                    '<div class="uk-width-medium-1-2">' +
                        '<div class="uk-form-file md-btn md-btn-danger">' +
                            'Select Image' +
                            '<input class="form-file" type="file" id="file-select" name="img"/>' +
                        '</div>' +
                    '</div>' +
                    '<div class="uk-width-medium-1-1">' +
                        '<textarea class="md-input" placeholder="Description" name="desc">'+desc+'</textarea>' +
                    '</div>' +
                    '<div class="uk-width-medium-1-1">' +
                        '<br/><button class="md-btn md-btn-primary" type="submit">Edit</button>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<br/>' +
            '</div>' +
            '<?= form_close(); ?>' +
            '</div>'+
            '</div>';
        $(".confirmationModalOnE").html(a);
        var modal = UIkit.modal("#confirmEdit").show();
    }
    function deleteC(srcc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Are you sure?</h1>' +
            '</div>' +
            '<div class="uk-modal-footer">' +
            '<button class="md-btn md-btn-primary uk-modal-close">No</button>' +
            '<a href="'+srcc+'" class="md-btn md-btn-danger">Yes</a>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(".confirmationModalOnD").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }
    
    function report(id){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Report The Page</h1>' +
            '</div>' +
            '<div class="uk-modal-body">'+
            '<form action="<?= site_url()."/home/bugReport" ?>" method="post">'+
                '<input class="md-input" type="hidden" value="'+id+'" name="pageId" id="user_edit_uname_control">'+
            '<div class="uk-width-medium-1-1 uk-row-first">'+
                '<div class="md-input-wrapper md-input-filled">'+
                '<label for="user_edit_uname_control">Name Of Reporter</label>'+
                '<input class="md-input" type="text" name="name" id="user_edit_uname_control">'+
                '<span class="md-input-bar "></span>'+
                '</div>'+
            '</div>'+
            '<div class="uk-width-medium-1-1 uk-row-first">'+
                '<div class="md-input-wrapper md-input-filled">'+
                '<label for="user_edit_uname_control">Phone Number</label>'+
                '<input class="md-input" type="text" name="phone" id="user_edit_uname_control">'+
                '<span class="md-input-bar "></span>'+
                '</div>'+
            '</div>'+
            '<div class="uk-width-medium-1-1 uk-row-first">'+
                '<div class="md-input-wrapper md-input-filled">'+
                '<label for="user_edit_uname_control">Email</label>'+
                '<input class="md-input" type="text" name="email" id="user_edit_uname_control">'+
                '<span class="md-input-bar "></span>'+
                '</div>'+
            '</div>'+
            '<div class="uk-width-medium-1-1 uk-row-first">'+
                '<div class="md-input-wrapper md-input-filled">'+
                '<label for="user_edit_uname_control">Reason</label>'+
                '<input class="md-input" type="text" name="reason" id="user_edit_uname_control">'+
                '<span class="md-input-bar "></span>'+
                '</div>'+
            '</div>'+
            '<button class="md-btn md-btn-primary uk-modal-close">No</button>' +
            '<button class="md-btn md-btn-primary" type="submit" name="submit" id="user_edit_uname_control">Submit</button>'+
            '</div>'+
            '<div class="uk-modal-footer">' +
            '</form>'+
            '</div>' +
            '</div>' +
            '</div>';
        $(".confirmationModalOnD").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }

    var clipboard = new Clipboard('.btn');
    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);

        e.clearSelection();

        UIkit.notify({
            message : 'Copied',
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });

    });
    function copyToClipboard() {
        var $temp = $("<input>");
        $("body").append($temp);
        //console.log(window.location.href);
        //$temp.val("<?//= site_url('business/'.$userAdmin[0]['id']); ?>").select();
        $temp.val(window.location.href).select();
        document.execCommand("copy");
        $temp.remove();
        UIkit.notify({
            message : 'Copied',
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });
        //$("#test").click();
    }
//    function addImaage(){
//        $("#addImageModal").modal("toggle");
//    }
</script>

<script>
    function sendemailBusiness(){
        var name = $("[name=name]").val();
        var email = $("[name=email]").val();
        var msg = $("[name=msg]").val();
        var id = <?= $v['id'] ?> ;
        $.post('<?= site_url('home/sendEmailForBusinessPage') ?>',{name:name,email:email,message:msg,id:id},function(e){
            $("[name=name]").val('');
            $("[name=email]").val('');
            $("[name=msg]").val('');
            UIkit.notify({
                message : 'Message Sent!',
                status  : 'danger',
                timeout : 2000,
                pos     : 'top-center'
            });
        });
    }
</script>