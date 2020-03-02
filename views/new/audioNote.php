<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Voice Note</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-10-10">
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
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($audioNote as $val){ ?>
                                <tr>
                                    <!--<td><?= $i; ?></td>-->
                                    <!--<td><?= $val['title'] ?></td>-->
                                    <td><?php if($val['dateOfEvent'] != '0000-00-00'){echo date("d-M-Y",strtotime($val['dateOfEvent']));}else{ echo date("d-M-Y",strtotime($val['date'])); } ?></td>
                                    <?php $code=$val['link']; $code = explode("?v=",$code); ?>
                                    <td>
                                        <!--<audio id="player" src=""></audio>-->
                                        <a style="cursor: pointer;text-decoration: underline" onclick="openVoiceNote('<?= base_url('assets/voicenote/').'/'.$val['link'] ?>')"><?= $val['title'] ?></a>
                                    </td>
                                    <td><?= ucfirst($val['minister']) ?></td>
                                    <td style="word-break: break-all;">
                                        <a style="cursor: pointer;text-decoration: underline" onclick="openVoiceNote('<?= base_url('assets/voicenote/').'/'.$val['link'] ?>')">Listen</a>
                                        <!--<audio preload="auto" src="<?= base_url('assets/voicenote')."/".$val['link'] ?>" controls style="height: 54px!important;"></audio>-->
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div id="vid"></div>
        </div>
    </div>
</div>

