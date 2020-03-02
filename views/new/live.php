<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Event Videos</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content" data-step="1" data-intro="List of all  Live events">
                        <div class="dt_colVis_buttons"></div>
                        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <!--<th>#           </th>-->
                                <th>Date Of Event </th>
                                <th>Title       </th>
                                <th>Minister Name </th>
                                <th data-step="3" data-intro="Click on watch to be a part of event">Link     </th>
                                <th data-step="2" data-intro="Status of the event">Status   </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($live as $val){ ?>
                                <tr>
                                    <!--<td><?= $i; ?></td>-->
                                    <!--<td><?= $val['title'] ?></td>-->
                                    <td><?php if($val['dateOfEvent'] != '0000-00-00'){echo date("d-M-Y",strtotime($val['dateOfEvent']));}else{ echo date("d-M-Y",strtotime($val['date'])); } ?></td>
                                    <?php $code=$val['link']; $code = explode("?v=",$code); ?>
                                    <td><?php if(!empty($code) AND isset($code[1]) AND !empty($code[1])){ ?>
                                            <a style="cursor: pointer;text-decoration: underline" onclick="openVideoa('<?= $code[1]; ?>')"><?= $val['title'] ?></a>
                                        <?php }else{ ?>
                                            <?php $code=$val['link'];  ?>
                                            <?php $c = str_replace("https://youtu.be/","",$code) ?>
                                            <a style="cursor: pointer;text-decoration: underline" onclick="openVideoa('<?= $c; ?>')"><?= $val['title'] ?></a>
                                        <?php } ?></td>
                                    <td><?= ucfirst($val['minister']) ?></td>
                                    <td style="word-break: break-all;">
                                        <?php $code=$val['link']; $code = explode("?v=",$code); ?>
                                        <?php if(!empty($code) AND isset($code[1]) AND !empty($code[1])){ ?>
                                            <a style="cursor: pointer;text-decoration: underline" onclick="openVideoa('<?= $code[1]; ?>')">Watch</a>
                                        <?php }else{ ?>
                                            <?php $code=$val['link'];  ?>
                                            <?php $c = str_replace("https://youtu.be/","",$code) ?>
                                            <a style="cursor: pointer;text-decoration: underline" onclick="openVideoa('<?= $c; ?>')">Watch</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($val['status'] == 'on'){ ?>
                                            <span class="md-btn md-btn-success">On Air</span>
                                        <?php }else{ ?>
                                            <span class="md-btn md-btn-default disabled">Off Air</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
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

