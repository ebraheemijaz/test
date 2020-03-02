
<div class="uk-width-large-2-10 uk-visible-large">
    <div class="md-carda uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom blink_me" style="cursor: pointer;"><a href="<?= site_url('home/view/add_advert') ?>" style="color: #f45942!important;">Advertisement</a></h3>
            <div class="uk-slidenav-position" data-uk-slider>
                <div class="uk-slider-container">
                    <?php $advert = $this->data->myquery("SELECT * FROM `advert` WHERE `user_id` = 0 and `vertical` != '' and approval = 1 ORDER BY id DESC"); ?>
                    <ul class="uk-slider uk-grid uk-grid-small uk-grid-width-medium-1-4 uk-grid-width-small-1-2">
                        <?php
                            foreach($advert as $ads){
                            ?>
                            <li class="uk-width-1-1" style="height:600px;background: url('<?= base_url('assets_f/img/business')."/".$ads['vertical']; ?>');background-size:100% 100%;"></li>
                            <?php
                            }
                        ?>
                        <!--<li class="uk-width-1-1" style="height:600px;background: url('<?= base_url('assets_f/img/ads/v/image1.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:600px;background: url('<?= base_url('assets_f/img/ads/v/image4.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:600px;background: url('<?= base_url('assets_f/img/ads/v/image6.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:600px;background: url('<?= base_url('assets_f/img/ads/v/image9.png'); ?>');background-size:100% 100%;"></li>-->
                        <!--<li class="uk-width-1-1" style="height:600px;background: url('<?= base_url('assets_b/ad1.jpg'); ?>');background-size:100% 100%;"></li>-->
                    </ul>
                </div>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 15px" class="uk-width-medium-1-1 uk-hidden-large">
    <div class="md-carda uk-margin-large-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom" style="cursor: pointer" onclick="requestAdv()">Advertisement</h3>
            <div class="uk-slidenav-position" data-uk-slider>
                <div class="uk-slider-container">
                    <?php $advert = $this->data->myquery("SELECT * FROM `advert` WHERE `user_id` = 0 and `horizontal` != '' and approval = 1 ORDER BY id DESC"); ?>
                    <ul class="uk-slider uk-grid uk-grid-small uk-grid-width-medium-1-4 uk-grid-width-small-1-2">
                        <?php
                            foreach($advert as $ads){
                            ?>
                            <li class="uk-width-1-1" style="height:400px;background: url('<?= base_url('assets_f/img/business')."/".$ads['horizontal']; ?>');background-size:100% 100%;"></li>
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
