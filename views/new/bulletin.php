<div id="page_content">
    <div id="page_content_inner">
        <form action="">
            <h4 class="heading_a uk-margin-bottom">Bulletin</h4>
            <div data-step="1" data-intro="To search bulletins" class="uk-grid">
                <div data-step="2" data-intro="Enter Starting Date" class="uk-width-medium-1-5">
                    <input class="md-input" name="from" type="text" placeholder="From" data-uk-datepicker="{format:'DD.MM.YYYY'}" id="contact_list_search"/>
                </div>
                <div data-step="3" data-intro="Enter Ending Date" class="uk-width-medium-1-5">
                    <input class="md-input" type="text" name="to" placeholder="To" data-uk-datepicker="{format:'DD.MM.YYYY'}" id="contact_list_search"/>
                </div>
                <button data-step="4" data-intro="Click Search" class="uk-button uk-button-default" type="submit">Search</button>
            </div>
        </form>


        <br/>
        <br/>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">

            <div class="uk-width-large-8-10">
                <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
                    <?php rsort($bulletin); ?>
                    <?php if(!empty($bulletin)){ ?>
                        <?php foreach($bulletin as $val){ ?>
                            <div data-product-name="<?= $val['title'] ?>">
                                <div class="md-card md-card-hover-img">
                                    <div class="md-card-head uk-text-center uk-position-relative">
                                        <a onclick="bigImg('<?= base_url(); ?>/<?= $val['image'] ?>');" data-uk-lightbox="{group:'user-photos1'}"><img class="md-card-head-img" src="<?= base_url() ?>/<?= $val['image'] ?>" style="width: 100%" alt=""/></a>
                                    </div>
                                    <div class="md-card-content">
                                        <h3 class="uk-margin-bottom">
                                            <?= substr(ucfirst($val['title']),0,15); ?><?= (strlen($val['title']) > 15) ? "..." : ""; ?>
                                        </h3>
                                        <!--<p><?/*= substr(strip_tags($val['text']),0,150); */?>...</p>-->
                                        <span style="font-weight: bold;"><?= date("d-M-Y",strtotime($val['date'])); ?></span>
                                        <br/>
                                        <a class="md-btn md-btn-success" href="<?= site_url('home/view/read_bulletin/'.$val['id']) ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php }else{ ?>
                        <div class="uk-width-medium-1-1">
                            <div class="md-card md-card-hover-img">
                                <div class="md-card-content">
                                    <h3 style="text-align: center;" class="uk-margin-bottom">
                                        No Data Found
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <?php require_once('advert_v.php'); ?>
        </div>
    </div>
</div>
<div class="conf"></div>
<script>
    function bigImg(url){
        alert(url);
        if(navigator.userAgent.match(/iPhone/i)){
            deg = '0deg';
        }else{
            deg = '90deg';
        }
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 250px !important;'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true' data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img src='"+url+"' style='height: auto; width: 300px; margin-top: 33px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
</script>
