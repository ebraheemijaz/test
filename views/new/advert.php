<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Advert</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-medium-10-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content" data-step="1" data-intro="Your Advert Orders">
                        <div class="dt_colVis_buttons" data-step="2" data-intro="Click This To Adjust Visibility of columns"></div>
                        <table id="dt_colVis" class="uk-table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#                   </th>
                                    <th>Horizontal Banner   </th>
                                    <th>Vertical Banner     </th>
                                    <th>Requested On        </th>
                                    <th>Payment Status      </th>
                                    <th>Advert Starting Date</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($advert as $val){ ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><a target="_blank" href="<?= base_url("assets_f")."/img/business/".$val['horizontal'] ?>">See</a></td>
                                    <td><a target="_blank" href="<?= base_url("assets_f")."/img/business/".$val['vertical'] ?>">See</a></td>
                                    <td><?= $val['date'] ?></td>
                                    <td>
                                        <?php if($val['status'] == "unpaid"){ ?>
                                            <span class="md-btn md-btn-danger"><?= $val['status'] ?></span>
                                            <a href="<?= site_url('home/activateAdv/'.$val['id']); ?>"><span class="md-btn md-btn-info">Pay</span></a>
                                        <?php }else{ ?>
                                            <span class="md-btn md-btn-success"><?= $val['status'] ?></span>
                                        <?php } ?>
                                    </td>
                                    <td><?= $val['starting'] ?></td>
                                    <td><a href="<?= site_url('home/edit/'.$val['id']."/advert/edit_advert") ?>"><i class="md-icons material-icons">border_color</i></a> | 
                                    <a onclick="deleteC('<?= site_url('home/deleteAdvert') . "/" . $val['id']."/same" ?>')"><i class="md-icons material-icons">delete_forever</i></a></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<div class="confirmationModalOnD"></div>
<script>
    function deleteC(srcc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Do you want to delete?</h1>' +
            '</div>' +
            '<div class="uk-modal-footer">' +
            '<button class="md-btn md-btn-primary uk-modal-close">No</button>' +
            '<a href="'+srcc+'" class="md-btn md-btn-danger">Yes</a>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(".confirmationModalOnD").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }
</script>
