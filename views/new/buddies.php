<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Buddies</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                    <?php if(!empty($friends1)){ ?>
                        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
                            <?php foreach($friends1 as $val){?>
                            <?php if($val['id'] != $userAdmin[0]['id']){ ?>
                                <div data-uk-filter="<?= $val['bgrop'] ?>,<?= $val[0]['fname']." ".$val[0]['lname'] ?>,<?= $val[0]['email'] ?>">
                                    <div class="md-card md-card-hover">
                                        <div class="md-card-head">
                                            <div class="uk-text-center">
                                                <?php $image = (empty($val[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$val[0]['image'] ; ?>
                                                <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-card-head-avatar detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-card-head-avatar detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-card-head-avatar" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                                <!--<img class="md-card-head-avatar" src="<?= $image ?>" alt=""/>-->
                                            </div>
                                            <h3 class="md-card-head-text uk-text-center">
                                                <a href="<?= site_url('home/member') ?>/<?= $val['id'] ?>">
                                                    <?= $val[0]['fname']." ".$val[0]['lname'] ?>
                                                </a>
                                                <span class="uk-text-truncate"><?= $val[0]['bgrop'] ?></span>
                                            </h3>
                                        </div>
                                        <div class="md-card-content">
                                            <ul class="md-list">
                                                <li>
                                                    <div class="md-list-content">
                                                        <a href="<?= site_url('home/member') ?>/<?= $val[0]['id'] ?>">
                                                            <p class="md-btn md-btn-primary">View Profile</p>
                                                        </a>
                                                        <!--<span class="md-list-heading">Info</span>-->
                                                        <!--<span class="uk-text-small uk-text-muted">
                                                        <?/*= substr($val['career'],0,100) */?>
                                                    </span>-->
                                                        <br/>
                                                        <a  href="<?= site_url('home/view/chat#'.$val[0]['id']); ?>">Chat</a>
                                                        <hr/>
                                                        <a target="_blank" href="<?= site_url('business/'.$val[0]['id']); ?>">Business Page</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        </div>
                    <?php }else{ ?>
                        <h3 class="md-card-head-text uk-text-center">
                            You currently do not have any buddies
                            <br>
                            <br>
                            <a href="<?= site_url('home/view/search') ?>"><span class="md-btn md-btn-primary">Click here to add</span></a>
                        </h3>
                    <?php } ?>

            </div>
            <?php require_once('advert_v.php'); ?>
        </div>
    </div>
</div>