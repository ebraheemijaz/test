<?php
$v = $business[0];
// print_r($v);
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
                                    <a id="preview" target="_blank"><i class="md-icon material-icons md-icon-light">pageview</i></a>
                                </div>
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
                                        <img src="<?= $image ?>" alt="user avatar" id="logoOld"/>
                                    </a>
                                </div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate" id="test"><?= ucfirst($v['title']); ?></span>
                                    <span class="sub-heading"><?= $v['email'] ?></span>
                                </h2>

                            </div>
                            <?php if($v['user_id'] == $userAdmin[0]['id']){ ?>
                                <!--<a class="md-fab md-fab-small md-fab-accent hidden-print" href="<?= site_url('home/view/edit_business') ?>">-->
                                <!--    <i class="material-icons">&#xE150;</i>-->
                                <!--</a>-->
                            <?php } ?>
                        </div>
                            <div class="user_content">
                            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                                <li class="uk-active"><a href="#">Select Theme</a></li>
                                <li><a href="#">Business Information</a></li>
                                <li><a href="#">Product & Gallery</a></li>
                                <!--<li><a href="#">Our Services</a></li>-->
                                <li><a href="#">Select Banner</a></li>
                                <li><a href="#">Contact Page</a></li>
                            </ul>
                            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 1){ ?>checked<?php } ?> name="theme" id="theme1" value="1"/> Basic Theme
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/1/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/1.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 3){ ?>checked<?php } ?> name="theme" id="theme3" value="3"/> Accountant
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/3/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/3.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 4){ ?>checked<?php } ?> name="theme" id="theme4" value="4"/> Builder
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/4/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/4.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 5){ ?>checked<?php } ?> name="theme" id="theme5" value="5"/> Architect
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/5/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/5.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 6){ ?>checked<?php } ?> name="theme" id="theme6" value="6"/> Fashion
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/6/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/6.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 7){ ?>checked<?php } ?> name="theme" id="theme7" value="7"/> Renovation
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/7/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/7.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 8){ ?>checked<?php } ?> name="theme" id="theme8" value="8"/> Hair Cut
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/8/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/8.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 9){ ?>checked<?php } ?> name="theme" id="theme9" value="9"/> Business
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/9/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/9.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input type="radio" class="md-input" <?php if($v['selectedTheme'] == 10){ ?>checked<?php } ?> name="theme" id="theme10" value="10"/> Agriculture 
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <a href="<?= site_url('home/redirect/'.$v['user_id'].'/10/'.str_replace(" ", "-", $v['title'])) ?>" title="Click on the image to theme preview."><img src="<?= base_url('assets/themes/10.png') ?>"/></a>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <!--<a href="" data-uk-switcher-item="0" class="md-btn md-btn-success" style="float: left;">Prev</a>-->
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <a href="" data-uk-switcher-item="1" class="md-btn md-btn-success" style="float: right;">Next</a>
                                    </div>
                                </div>
                                </li>
                                <li>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <label for="businessName">Name Of Business<span class="req">*</span></label><br/>
                                            <input type="text" name="businessName" id="businessName" required class="md-input" value="<?= $v['title'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                    <div class="uk-width-medium-1-2 parsley-row">
                                        <input type="radio" name="logoType" <?php if($v['logoType'] == 'uploadLogo'){ ?>checked<?php }else{ ?><?php } ?> id="uploadLogo" required value="uploadLogo">
                                        <label for="wizard_logo">Upload Logo</label><br/>
                                        <input type="file" name="logo" id="logo" class="md-input"/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="user_heading_avatar">
                                            <div class="thumbnail">
                                                <img src="<?= $image ?>" alt="user avatar" id="logoNew"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="uk-grid">-->
                                <!--    <div class="uk-width-medium-1-1 parsley-row">-->
                                <!--        <input type="radio" name="logoType" <?php if($v['logoType'] == 'systemLogo'){ ?>checked<?php }else{ ?><?php } ?> id="systemLogo" required value="systemLogo">-->
                                <!--        <label for="system_logo">Generate System Logo</label><br/>-->
                                        
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_about_us">About Us<span class="req">*</span></label><br/>
                                        <textarea class="md-input" name="aboutUs" id="aboutUs" placeholder="Tell your customer about your business." required cols="30" rows="4" maxlength="200"><?= $v['services'] ?></textarea>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_who_we_are">Who We Are<span class="req">*</span></label><br/>
                                        <textarea class="md-input" name="whoWeAre" id="whoWeAre" placeholder="Tell your customer who you are." required cols="30" rows="4" maxlength="200"><?= $v['about'] ?></textarea>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <a href="" data-uk-switcher-item="0" class="md-btn md-btn-success" style="float: left;">Prev</a>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <a href="" data-uk-switcher-item="2" class="md-btn md-btn-success" style="float: right;">Next</a>
                                    </div>
                                </div>
                                </li>
                                <li id="product">
                                    <h2 class="heading_a">
                                    Product / Services
                                </h2>
                                <hr class="md-hr"/>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2 parsley-row">
                                        <label for="sellingTag">Are you selling with a price tag?<span class="req">*</span></label><br/>
                                        <div id="donate">
                                            <label class="blue"><input type="radio" <?php if($v['sellingTag'] == 'yes'){ echo 'checked'; } ?> value="yes" name="sellingTag"><span> Yes</span></label>
                                            <label class="green"><input type="radio" value="no" <?php if($v['sellingTag'] == 'no'){ echo 'checked'; } ?> name="sellingTag"><span> No</span></label>
                                        </div>
                                    </div>
                                    <div id="currencyDiv" style="<?php if($v['sellingTag'] == 'yes'){ ?>display: block;<?php }else{ ?>display: none;<?php } ?>" class="uk-width-medium-1-2">
                                        <div class="uk-width-medium-1-2 parsley-row">
                                            <label for="currency">Select Currency : </label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row">
                                                <select name="currency" id="currency" class="md-input" style="font-size: 15px;">
                                                    <option value="">Select Currency</option>
                                                    <option <?= ($v['currency'] == 'GBP') ? "selected" : ""; ?> value="GBP" style="font-size: 20px;">&#163; (GBP)</option>
                                                    <option <?= ($v['currency'] == 'USD') ? "selected" : ""; ?> value="USD">&#36; (USD)</option>
                                                    <option <?= ($v['currency'] == 'INR') ? "selected" : ""; ?> value="INR">&#8377; (INR)</option>
                                                    <option <?= ($v['currency'] == 'EURO') ? "selected" : ""; ?> value="EURO">&#8352; (EURO)</option>
                                                    <option <?= ($v['currency'] == 'COLON') ? "selected" : ""; ?> value="COLON">&#8353; (COLON)</option>
                                                    <option <?= ($v['currency'] == 'CRUZEIRO') ? "selected" : ""; ?> value="CRUZEIRO">&#8354; (CRUZEIRO)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $products = $this->data->fetch('productservices', array('parent_id' => $v['user_id'])); ?>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row" style="<?php if(count($products) >= 5){ ?>display: none;<?php }else{ ?>display: block;<?php } ?>">
                                        <button onclick="AddProductAndServices1()" id="addProduct" value="addProduct" class="md-btn md-btn-primary">+ Add Product</button>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <?php $i = 1; foreach($products as $val){ if($i <= 5){?>
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
                                        <?php }$i++; } ?>
                                </div>
                                <div class="uk-grid">
                                    <p style="<?php if(count($products) < 5){ echo 'display: none;'; } ?>"><strong>Add EXTRA 10 products For &#163; 5.99 one-off payment.</strong> <button class="md-btn md-btn-success">Pay Now</button> </p>
                                </div>
                                <hr class="md-hr"/>
                                <h2 class="heading_a">
                                    Gallery
                                </h2>
                                <hr class="md-hr"/>
                                <?php $gallery = $this->data->fetch('businessGallery', array('parent_id' => $v['user_id'])); ?>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row" style="<?php if(count($gallery) >= 10){ ?>display: none;<?php }else{ ?>display: block;<?php } ?>">
                                        <button onclick="AddGallery1()" value="addGallery" class="md-btn md-btn-success">+ Add Image</button>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <?php foreach($gallery as $val){ ?>
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
                                <div class="uk-grid">
                                    <p style="<?php if(count($gallery) < 10){ echo 'display: none;'; } ?>"><strong>Add EXTRA 10 products For &#163; 5.99 one-off payment.</strong> <button class="md-btn md-btn-success">Pay Now</button> </p>
                                </div>
                                <br/>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <a href="" data-uk-switcher-item="1" class="md-btn md-btn-success" style="float: left;">Prev</a>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <a href="" data-uk-switcher-item="3" class="md-btn md-btn-success" style="float: right;">Next</a>
                                    </div>
                                </div>
                                </li>
                                    <li>
                                        <?php $banners = explode(',', $v['banner']);?>
                                        <form method="post" action="" id="bannerForm">
                                        <h2 class="heading_a">
                                            Select Banner
                                        </h2>
                                        <hr class="md-hr"/>
                                        <?php $bannerImage = $this->data->fetch('bannerImages'); ?>
                                        
                                            <?php foreach($bannerImage as $img){ ?>
                                            <div class="uk-grid">
                                            <div class="uk-width-3-10 parsley-row">
                                                <input type="checkbox" class="md-input" <?php if(in_array($img['id'], $banners)){ ?>checked<?php } ?> name="bannerImage" value="<?= $img['id'] ?>"/>
                                            </div>
                                            <div class="uk-width-7-10 parsley-row">
                                                <img src="<?= base_url('assets_f/banners').'/'.$img['img'] ?>" width="700" height="300"/>
                                            </div>
                                            </div>
                                            <?php } ?>
                                        
                                        <div class="uk-grid">
                                            <div class="uk-width-medium-1-2">
                                                <a href="" data-uk-switcher-item="2" class="md-btn md-btn-success" style="float: left;">Prev</a>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <a onclick="bannerSubmit()" data-uk-switcher-item="4" class="md-btn md-btn-success" style="float: right;">Next</a>
                                            </div>
                                        </div>
                                        </form>
                                    </li>
                                    <li>
                                        <h2 class="heading_a">
                                        Contact Page & Theme
                                    </h2>
                                    <hr class="md-hr"/>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_company_name">Business Email<span class="req">*</span></label><br/>
                                            <input type="email" name="businessEmail" id="businessEmail" value="<?= $v['email'] ?>" required class="md-input"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_company_name">Contact Number<span class="req">*</span></label><br/>
                                            <input type="text" name="contactNumber" id="contactNumber" value="<?= $v['phone'] ?>" required class="md-input"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_company_name">Address (Optional)</label><br/>
                                            <!--<input type="email" name="businessEmail" id="businessEmail" required class="md-input"/>-->
                                        </div>
                                    </div>
                                    <hr class="md-hr"/>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_company_name">Address Line 1</label><br/>
                                            <input type="text" name="address1" id="address1" value="<?= $v['address'] ?>" class="md-input"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_company_name">Address Line 2</label><br/>
                                            <input type="text" name="address2" id="address2" value="<?= $v['addressLine2'] ?>" class="md-input"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_company_name">Town</label><br/>
                                            <input type="text" name="town" id="town" value="<?= $v['town'] ?>" class="md-input"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_company_name">Postcode</label><br/>
                                            <input type="text" name="postcode" id="postcode" value="<?= $v['postcode'] ?>" class="md-input"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_company_name">Country</label><br/>
                                            <input type="text" name="country" id="country" value="<?= $v['country'] ?>" class="md-input"/>
                                        </div>
                                    </div>
                                    <hr class="md-hr"/>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <a href="" data-uk-switcher-item="4" class="md-btn md-btn-success" style="float: left;">Prev</a>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <button type="button" id="finalButtonClick" class="md-btn md-btn-success" style="float: right;">Finish</button>
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
    
    function AddProductAndServices1(){
            var a = '<div class="uk-modal" id="newModalAdv"> ' +
                '<div class="uk-modal-dialog"> ' +
                '<a href="" class="uk-modal-close uk-close"></a> ' +
                '<h3>Add Product & Services</h3>' +
                '<?= form_open_multipart('home/insert/business_imgs/manage_business',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>' +
                '<div class="login-wrap"> ' +
                    '<div class="uk-grid" data-uk-grid-margin>' +
                        '<div class="uk-width-medium-1-2">' +
                            '<div class="uk-form-file md-btn md-btn-danger">' +
                                'Select Image' +
                                '<input class="form-file" type="file" id="file-select" name="img"/>' +
                            '</div>' +
                        '</div>' +
                        '<div class="uk-width-medium-1-1">' +
                            '<textarea class="md-input" placeholder="Describe product not more than 200 characters." name="desc"></textarea>' +
                        '</div>' +
                        '<div class="uk-width-medium-1-2">' +
                            '<label for="actualPrice">Enter Actual Price</label><br/>'+
                            '<input type="text" class="md-input" name="actualPrice" placeholder="Enter Actual Price" id="actualPrice"/>'+
                        '</div>'+
                        '<div class="uk-width-medium-1-2">'+
                            '<label for="discountedPrice">Enter Discounted Price</label><br/>'+
                            '<input type="text" class="md-input" name="discountedPrice" placeholder="Enter Discounted Price" id="discountedPrice"/>'+
                        '</div>'+
                        '<div class="uk-width-medium-1-1">' +
                            '<br/><button class="md-btn md-btn-primary" type="submit">Add</button>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '<br/>' +
                '</div>' +
                '<?= form_close(); ?>' +
                '</div>'+
                '</div>';
            $("#advevver").html(a);
            var modal = UIkit.modal("#newModalAdv").show();
        }
        
        function AddGallery1(){
            var a = '<div class="uk-modal" id="newModalAdv"> ' +
                '<div class="uk-modal-dialog"> ' +
                '<a href="" class="uk-modal-close uk-close"></a> ' +
                '<h3>Add Product & Services</h3>' +
                '<?= form_open_multipart('home/insert/businessGallery/manage_business',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>' +
                '<div class="login-wrap"> ' +
                    '<div class="uk-grid" data-uk-grid-margin>' +
                        '<div class="uk-width-medium-1-2">' +
                            '<div class="uk-form-file md-btn md-btn-danger">' +
                                'Select Image' +
                                '<input class="form-file" type="file" id="file-select" name="img"/>' +
                            '</div>' +
                        '</div>' +
                        '<div class="uk-width-medium-1-1">' +
                            '<textarea class="md-input" placeholder="Describe product not more than 200 characters." name="desc"></textarea>' +
                        '</div>' +
                        '<div class="uk-width-medium-1-1">' +
                            '<br/><button class="md-btn md-btn-primary" type="submit">Add</button>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '<br/>' +
                '</div>' +
                '<?= form_close(); ?>' +
                '</div>'+
                '</div>';
            $("#advevver").html(a);
            var modal = UIkit.modal("#newModalAdv").show();
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

<!-- New Code Added -->
<script>

    //Business Name On Blur
    $('#businessName').on('blur', function() {
        $businessName = $(this).val();
        // alert($businessName);
        if($businessName != '' || $businessName != null) {
            $.post('<?= site_url('home/businessWebsite/businessName') ?>',{businessName:$businessName},function(e){
                    $('#businessName').val(e);
            });
        }else{
            UIkit.notify({
                message : 'Business Name cant be blank.',
                status  : 'danger',
                timeout : 2000,
                pos     : 'top-center'
            });
        }
    });
    
    //Selling Tag Change
    $('input:radio[name=sellingTag]').change(function() {
        var sellingTag = $(this).val();
        if(sellingTag == 'yes') {
            $('#currencyDiv').show();
        }else{
            $('#currencyDiv').hide();
        }
    });
    
    $('input:radio[name=theme]').change(function() {
        var theme = $(this).val();
        var newUrl = "<?= site_url('home/redirect/'.$v['user_id'].'/"+theme+"/'.$v['title']) ?>";
        $('#preview').attr('href', newUrl);
        var formData = new FormData();
        formData.append('selectedTheme', theme);
        $.ajax({
            type: "POST",
            url: "<?= site_url('home/businessWebsite/themeSelect') ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if(data == 0){
                    UIkit.notify({
                        message : 'Theme updated Successfully.',
                        status  : 'danger',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                }
            }
        });
    });
    
    $('#currency').change(function() {
        var sellingTag = $('input:radio[name=sellingTag]').val();
        var currency = $(this).val();
        var formData = new FormData();
        formData.append('sellingTag', sellingTag);
        formData.append('currency', currency);
        $.ajax({
            type: "POST",
            url: "<?= site_url('home/businessWebsite/currency1') ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                var obj = $.parseJSON(data);
                if(obj.currency == 'yes'){
                    $('input:radio[name=sellingTag]').attr('checked', true);
                }
            }
        });
    });
    
    //About us on blur
    $('#aboutUs').on('blur', function() {
        var aboutUs = $(this).val();
            var formData = new FormData();
            formData.append('uploadedLogo', $('input[name="logo"]')[0].files[0]);
            formData.append('logoType', $('input:radio[name=logoType]').val());
            formData.append('aboutUs', aboutUs);
            $.ajax({
                type: "POST",
                url: "<?= site_url('home/businessWebsite/businessLogo') ?>",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var newImage = "<?= base_url() ?>assets_f/img/business/"+data;
                    $('#logoOld').attr('src', newImage);
                    $('#logoNew').attr('src', newImage);
                }
            });
    });
    
    //Who we are on blur
    $('#whoWeAre').on('blur', function() {
        var whoWeAre = $(this).val();
        var formData = new FormData();
        formData.append('whoWeAre', whoWeAre);
        $.ajax({
            type: "POST",
            url: "<?= site_url('home/businessWebsite/whoWeAre') ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#whoWeAre').val(data);
            }
        });
    });
    
    //On form submit
    function bannerSubmit() {
        var favorite = [];
            $.each($("input[name='bannerImage']:checked"), function(){            
                favorite.push($(this).val());
            });
            var formData = new FormData();
            formData.append('bannerImage', favorite.join(','));
            $.ajax({
                type: "POST",
                url: "<?= site_url('home/businessWebsite/bannerImages') ?>",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    
                }
            });
    }
    
    $('#finalButtonClick').on('click', function() {
         var formData = new FormData();
         formData.append('businessEmail', $('#businessEmail').val());
         formData.append('contactNumber', $('#contactNumber').val());
         formData.append('address1', $('#address1').val());
         formData.append('address2', $('#address2').val());
         formData.append('town', $('#town').val());
         formData.append('postcode', $('#postcode').val());
         formData.append('country', $('#country').val());
         formData.append('theme', $('input:radio[name=theme]').val());
         $.ajax({
             type: "POST",
             url: "<?= site_url('home/businessWebsite/otherFormData') ?>",
             data: formData,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data){
                 
             }
         });
    });
    
</script>
<!-- End Code Added -->

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