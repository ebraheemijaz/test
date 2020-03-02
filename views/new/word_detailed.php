<style>
    @media screen and (max-width: 375px){
        .checkBox{
             margin-left: -50px; 
             margin-right: -23px;
        }
        .large-padding{
            padding: 10px!important;
            font-size: 14px!important;
        }
    }
</style>
<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Word Details</h4>
        <div class="uk-grid uk-grid-medium checkBox" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content">
                        <h3>Preacher:<?= $wordsdetails[0]['preacher_name'] ?></h3>
                        <div class="uk-grid blog_article" data-uk-grid-margin>
                            <div class="uk-width-medium">
                                <div class="md-card">
                                    <div class="md-card-content large-padding">
                                        <div class="uk-article">
                                            <h1 class="uk-article-title"><?= $wordsdetails[0]['topic'] ?></h1>
                                            <p class="uk-article-meta">
                                                Posted on <?= date("d/M/Y",strtotime($wordsdetails[0]['date_created'])) ?>
                                            </p>
                                            <hr class="uk-article-divider">
                                            <p style="font-size: 14px!important;">
                                                <?= $wordsdetails[0]['message'] ?>
                                            </p>
                                            <?php if($wordsdetails[0]['checkRadio'] == 'yes'){ ?>
                                            <a href="<?= base_url().$wordsdetails[0]['uploadFile'] ?>">Download</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('advert_v.php'); ?>
        </div>
    </div>
</div>
