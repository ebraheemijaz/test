<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">My Books</h4>
            <?php require_once('advert_h.php'); ?>
        <!--</div>-->
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-12">
                <div class="md-card uk-margin-medium-bottom">
                    <div  class="md-card-content" data-step="1" data-intro="List of all the testimony comes here">
                        <div class="dt_colVis_buttons"></div>
                        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-step="2" data-intro="Date Added">#</th>
                                <th data-step="3" data-intro="Absentee Name">Title</th>
                                <th data-step="4">Description</th>
                                <th data-step="5">Image</th>
                                <th data-step="6">Read</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($myBooks)){ ?>
                                <?php $i=1; foreach($myBooks as $val){ ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $val['title'] ?></td>
                                            <td><a href="#my-id<?= $val['id'] ?>" data-uk-modal><span class="md-btn md-btn-primary">Read Content</span></a></td>
                                            <td><img src="<?= base_url("assets_f/img")."/".$val['image'] ?>" alt="" style="width:100px"/></td>
                                            <td><a href="<?= base_url("assets_f/img")."/".$val['file'] ?>" target="_blank">Download</a></td>
                                        </tr>
                                        <div id="my-id<?= $val['id'] ?>" class="uk-modal">
                                            <div class="uk-modal-dialog">
                                                <a href="" class="uk-modal-close uk-close"></a>
                                                <h1><?= $val['title'] ?></h1>
                                                <p style="">
                                                    <?= $val['desc'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php $i++; } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

