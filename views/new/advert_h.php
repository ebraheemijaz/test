<div class="uk-width-medium-1-1">
    <div class="md-carda uk-margin-small-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom blink_me" style="cursor: pointer"><a href="<?= site_url('home/view/add_advert') ?>" style="color: #f45942!important;">Advertisement</a></h3>
            <div class="uk-slidenav-position" data-uk-slider>
                <div class="uk-slider-container">
                    <?php $advert = $this->data->myquery("SELECT * FROM `advert` WHERE `user_id` = 0 and `horizontal` != '' and approval = 1 and now() < DATE_ADD(`starting`, INTERVAL week WEEK) ORDER BY id DESC"); ?>
                    <ul class="uk-slider uk-grid uk-grid-small uk-grid-width-medium-1-4 uk-grid-width-small-1-2">
                        <!--<li class="uk-width-1-1" style="height:400px;background: url('<?= base_url('assets_f/img/ads/h/image8.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:400px;background: url('<?= base_url('assets_f/img/ads/h/image7.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:400px;background: url('<?= base_url('assets_f/img/ads/h/image5.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:400px;background: url('<?= base_url('assets_f/img/ads/h/image3.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:400px;background: url('<?= base_url('assets_f/img/ads/h/image2.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:400px;background: url('<?= base_url('assets_f/img/ads/h/image11.png'); ?>');background-size:100% 100%;"></li>-->
                        <?php
                            foreach($advert as $ads){
                            ?>
                            <li <?php if($this->agent->is_mobile()){ ?>class="uk-width-1-1" <?php }else{ ?>class="uk-width-1-2"<?php } ?> style="height:400px;background: url('<?= base_url('assets_f/img/business')."/".$ads['horizontal']; ?>');background-size:100% 100%;"></li>
                            <?php
                            }
                        ?>
                    </ul>
                </div>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
            </div>
        </div>
    </div>
</div>