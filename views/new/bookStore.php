<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Book Store</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div  data-step="1" data-intro="Here is the list of all books available in book store" class="uk-width-large-8-10">
                <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
                    <?php $i = 1; foreach($books as $val){ ?>
                        <div  data-product-name="<?= $val['title'] ?>">
                            <div class="md-card md-card-hover-img">
                                <div class="md-card-head uk-text-center uk-position-relative">
                                    <img class="md-card-head-img" src="<?= base_url('assets_f/img') ?>/<?= $val['image'] ?>" alt=""/>
                                </div>
                                <div class="md-card-content">
                                    <h4 class="heading_c uk-margin-bottom">
                                        <?= substr(ucfirst($val['title']),0,10); ?>
                                        <?= (strlen($val['title']) > 10) ? "..." : ""; ?>
                                        <?//= $val['title'] ?>
                                    </h4>
                                    <p><?= ($val['price'] > 0) ? "£ ".sprintf("%.2f",$val['price'])."" : "Free"; ?></p>
                                    <a class="md-btn md-btn-success" href="<?= site_url('home/getBook')."/".$val['id'] ?>">Get</a>
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
                </div>
            </div>
            <?php require_once('advert_v.php') ?>
        </div>
    </div>
</div>

