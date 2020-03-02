<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Word Log</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content" data-step="1" data-intro="List of all the word logs admin posted">
                        <div class="dt_colVis_buttons"></div>
                        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <td data-step="2" data-intro="Date posted">Date of Event</td>
                                <td data-step="3" data-intro="Preacher name who preached the word">Preacher Name</td>
                                <td data-step="4" data-intro="Topic which preacher preached">Topic Preached</td>
                                <td data-step="5" data-intro="Click on view to see word">Message</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($words as $val){ ?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['date_preached'])); ?></td>
                                    <td><a href="<?= site_url('home/view/word_detailed') ?>?id=<?= $val['id'] ?>"><?= $val['preacher_name'] ?></a></td>
                                    <td><?= $val['topic'] ?></td>
                                    <td><?php if($val['uploadFile'] == ''){ ?><a href="<?= site_url('home/view/word_detailed') ?>?id=<?= $val['id'] ?>">View</a><?php }else{ ?><a href="<?= base_url().$val['uploadFile'] ?>">View</a><?php } ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <?php require_once('advert_v.php'); ?>

            <div id="vid"></div>
        </div>
    </div>
</div>

