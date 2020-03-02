
<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Bible</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-carda uk-margin-medium-bottom">
                    <div class="md-card-content bible" data-step="1" data-intro="Here you can read Holy Bible">
                        <div class="dt_colVis_buttons"></div>
<!--                        <iframe src="https://www.bible.com/bible" frameborder="0" height="630" width="100%"></iframe>-->
                        <iframe src="//www.bible.com/en-GB/bible" frameborder="0" height="630" width="100%"></iframe>
                        <!--<embed src="<?php echo base_url('bible.pdf'); ?>" width="100%" height="630" />-->
                        <!--<biblia:bible layout="normal" resource="kjv1900" width="100%" height="2550px" shareButton="false" startingReference="Ge1.1"></biblia:bible>
                        <script src="//biblia.com/api/logos.biblia.js"></script>
                        <script>logos.biblia.init();</script>
                        <object data="https://www.bible.com/bible" width="600" height="400">
                            <embed src="https://www.bible.com/bible" width="600" height="400"> </embed>
                            Error: Embedded data could not be displayed.
                        </object>-->
                        <!-- Embedded Bible. https://biblia.com/plugins/embeddedbible -->
                        <!-- Embedded Bible. https://biblia.com/plugins/embeddedbible -->
<!--                        <biblia:bible layout="normal" resource="kjv1900" width="100%" height="600" resourcePicker="false" shareButton="false" startingReference="Ge1.1"></biblia:bible>-->
                        <!-- If you’re including multiple Biblia widgets, you only need this script tag once -->
<!--                        <script src="//biblia.com/api/logos.biblia.js"></script>-->
<!--                        <script>logos.biblia.init();</script>-->
                    </div>
                </div>

            </div>
            <?php require_once('advert_v.php'); ?>

            <div id="vid"></div>
        </div>
    </div>
</div>
<script>
    $("iframe").load(function(){
        var a = $("iframe")[0]
        console.log(a);
    });



</script>