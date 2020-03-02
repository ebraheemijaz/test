<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Read Bulletin</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}" style="margin-left : 20%;">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content">
                        <?php $val = $bulletin[0];  ?>
                        <div class="uk-grid blog_article" data-uk-grid-margin>
                            <div class="uk-width-medium">
                                <div class="md-card">
                                    <div class="md-card-content large-padding">
                                        <div class="uk-article">

                                            <p style="text-align: center">
                                                <a style="float: left" <?php if($val['prev'] > 0){ ?> href="<?= site_url('admin/read_bulletin/'.$val['prev']) ?>" <?php } ?>><span class="menu_icon"><i  style="font-size:40px" class="material-icons">fast_rewind</i></span></a>
                                                <a href="<?= site_url('admin/view/view_bulletin') ?>"><span class="menu_icon"><i style="font-size:40px" class="material-icons">home</i></span></a>
                                                <a style="float:right" <?php if($val['next'] > 0){ ?> href="<?= site_url('admin/read_bulletin/'.$val['next']) ?>" <?php } ?>><span class="menu_icon"><i style="font-size:40px"  class="material-icons">fast_forward</i></span></a>
                                            </p>

                                            <h1 class="uk-article-title"><?= $val['title'] ?></h1>
                                            <p class="uk-article-meta">
                                                Posted on <?= date("d/M/Y",strtotime($val['date'])) ?>
                                            </p>
                                            <hr class="uk-article-divider">
                                            <p>
                                                <figure class="uk-thumbnail uk-thumbnail-large thumbnail_left">
                                                    <img src="<?= base_url() ?>/<?= $val['image'] ?>" alt="">
                                                    <figcaption class="uk-thumbnail-caption"><?= $val['title'] ?></figcaption>
                                                </figure>
                                                <?= $val['text']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
