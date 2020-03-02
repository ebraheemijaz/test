<?php
$v = $business[0];
?>
    <div id="page_content">
        <div id="page_content_inner">
            <form action="<?= site_url('home/editbusiness'); ?>" class="uk-form-stacked" method="post" id="user_edit_form" enctype="multipart/form-data">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-1-1">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <?php $image = (empty($v['logo'])) ? base_url('assets_f/img/business/your-logo-here.png') : base_url('assets_f/img/business')."/".$v['logo'] ; ?>
                                        <img src="<?= $image ?>" alt="user avatar"/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="logo" id="user_edit_avatar_control">
                                        </span>
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                    </div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b">
                                        <span class="uk-text-truncate" id="user_edit_uname"><?= $v['title'] ?></span>
                                    </h2>
                                </div>
                                <div class="md-fab-wrapper">
                                    <div class="md-fab md-fab-toolbar md-fab-small md-fab-accent" style="width:68px;background:#7cb342;position:static;z-index:auto;right:auto;bottom:auto;box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);    border-radius: 4px;transition: all 280ms cubic-bezier(.4, 0, .2, 1);
    cursor: default;">
                                        <div style="visibility:visible;white-space:nowrap;padding:0 16px;overflow:hidden;box-sizing:border-box;display:block;">
                                            <button type="submit" id="user_edit_save" style="margin-left:0; height:48px;width:36px;padding:0;margin:0 0 0 8px;opacity:1;display:block;float:left;box-sizing:border-box;transition:opacity 280ms cubic-bezier(.4, 0, .2, 1);background:0 0;border:none;cursor:pointer;outline:0!important;">
                                                <i class="material-icons md-color-white" style="font-size: 24px;line-height:48px;height:inherit;font-family: 'Material Icons';font-weight: 400;font-style: normal;margin-left:-13px;display: inline-block;width: 1em;text-transform: none;letter-spacing: normal;-webkit-font-smoothing: antialiased;text-rendering: optimizeLegibility;-moz-osx-font-smoothing: grayscale;-webkit-font-feature-settings: 'liga';font-feature-settings: 'liga';vertical-align: -4px;
    color: rgba(0, 0, 0, .54);">&#xE161;</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_content">
                                <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                    <li class="uk-active"><a href="#">Basic</a></li>
                                </ul>
                                <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                General info
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Business Name</label>
                                                    <input class="md-input" type="text" name="title" maxlength="40" id="user_edit_uname_control"/>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Contact #</label>
                                                    <input class="md-input"
                                                           type="number" maxlength="15"
                                                           onKeyDown="limitText(this,15);"
                                                           onKeyUp="limitText(this,15);"
                                                           name="phone" value="<?= $v['phone'] ?>"/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Email </label>
                                                    <input class="md-input" type="text" name="email" value="<?= $v['email'] ?>"/>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label for="user_edit_uname_control">Website</label>
                                                    <input class="md-input" type="text" name="website" value="<?= $v['website'] ?>"/>
                                                </div>
                                            </div>

                                            <div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <label for="user_edit_personal_info_control">Address</label>
                                                    <textarea class="md-input" name="address" id="user_edit_personal_info_control" cols="30" rows="4"><?= $v['address'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <label for="user_edit_personal_info_control">Who We Are</label>
                                                    <textarea class="md-input" name='about' cols="30" rows="4"><?= $v['about'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <label for="user_edit_personal_info_control">About Us</label>
                                                    <textarea class="md-input" name='services' cols="30" rows="4"><?= $v['services'] ?></textarea>
                                                </div>
                                            </div>
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

