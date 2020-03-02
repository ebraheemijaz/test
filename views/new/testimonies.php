<style>
    input[type=submit]:disabled,
    button:disabled {
    cursor: not-allowed;
    }
</style>
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Testimonies</h3>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div  class="md-card-content" data-step="1" data-intro="List of all the testimony comes here">
                        <div class="dt_colVis_buttons">
                            <button data-step="3" data-intro="Click here to share new testimony" class="md-btn md-btn-danger" data-uk-modal="{target:'#newModal'}">Share New</button>
                        </div>
                        <div class="dt_colVis_buttons"></div>
                        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <td data-step="2" data-intro="Date posted">Date</td>
                                <td data-step="3" data-intro="Subject">Subject</td>
                                <td data-step="4"  width="35%" data-intro="Messages and read more">Message</td>
                                <td data-step="5" data-intro="Names">Name</td>
                                <td data-step="6" data-intro="Approval">Approval status</td>
                                <td data-step="7" data-intro="file 1">Image 1</td>
                                <td data-step="7" data-intro="file 2">Image 2</td>
                                <td data-step="6" data-intro="All Actions">
                                    <span>Action</span>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($testimonies as $val){?>
                            <?php if($userAdmin[0]['id'] == $val['user_id'] || $val['approval'] == 1){ ?>
                                <tr>
                                    <?php if($val['status'] == "read"){ ?>

                                        <td class=""><?= date("d-M-Y",strtotime($val['date'])) ?></td>

                                        <td><?= wordwrap($val['subject'],30,"<br>\n"); ?></td>
                                        <td><a href="#my-id<?= $val['id'] ?>" data-uk-modal><span class="md-btn md-btn-primary">Read More</span></a></td>
                                        <td><?= $val['name']; ?></td>
                                        <?php
                                            if($val['approval'] == 0){
                                            ?>
                                            <td><span style="color : red;">Awaiting Admin Release</span></td>
                                            <?php
                                            }else{
                                            ?>
                                            <td><span style="color : blue;">Shared Amongst Members</span></td>
                                            <?php
                                            }
                                        ?>
                                            <?php $image = ($val['file1'] != "") ? base_url('assets_f/img/business')."/".$val['file1'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['file1']  ?>
                                    <?php if(empty($val['file1'])){ $image = base_url('assets_f/noimg.png'); }elseif(empty($val['file1']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                                        </td>
                                        <?php $image = ($val['file2'] != "") ? base_url('assets_f/img/business')."/".$val['file2'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['file2']  ?>
                                    <?php if(empty($val['file2'])){ $image = base_url('assets_f/noimg.png'); }elseif(empty($val['file2']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                                        </td>
                                        <td>
                                            <?php if($userAdmin[0]['id'] == $val['user_id']){ ?>
                                                <a onclick="deleteC('<?= site_url('home/deletet/'.$val['id']) ?>')" style="cursor: pointer">&times;</a>
                                            <?php }else{ ?>
                                                <a href="#">&oslash;</a>
                                            <?php } ?>
                                        </td>
                                    <?php }else{ ?>

                                        <td class=""><?= date("d-M-Y",strtotime($val['date'])) ?></td>
                                        <td><?= wordwrap($val['subject'],30,"<br>\n"); ?></td>
                                        <td><a href="#my-id<?= $val['id'] ?>" data-uk-modal><span class="md-btn md-btn-primary">Read More</span></a></td>
                                        <td><?= $val['name']; ?></td>
                                        <?php
                                            if($val['approval'] == 0){
                                            ?>
                                            <td><span style="color : red;">Awaiting Admin Release</span></td>
                                            <?php
                                            }else{
                                            ?>
                                            <td><span style="color: blue;">Shared Amongst Members</span></td>
                                            <?php
                                            }
                                        ?>
                                        <?php $image = ($val['file1'] != "") ? base_url('assets_f/img/business')."/".$val['file1'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['file1']  ?>
                                    <?php if(empty($val['file1'])){ $image = base_url('assets_f/noimg.png'); }elseif(empty($val['file1']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <th>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                                        </th>
                                        <?php $image = ($val['file2'] != "") ? base_url('assets_f/img/business')."/".$val['file2'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['file2']  ?>
                                    <?php if(empty($val['file2'])){ $image = base_url('assets_f/noimg.png'); }elseif(empty($val['file2']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <th>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                                        </th>
                                        <th>
                                            <?php if($userAdmin[0]['id'] == $val['user_id']){ ?>
                                                <a onclick="deleteC('<?= site_url('home/deletet/'.$val['id']) ?>')" style="cursor: pointer">&times</a>
                                            <?php }else{ ?>
                                                <a href="#">&oslash;</a>
                                            <?php } ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                                <div id="my-id<?= $val['id'] ?>" class="uk-modal">
                                    <div class="uk-modal-dialog">
                                        <a href="" class="uk-modal-close uk-close"></a>
                                        <h1><?= $val['subject'] ?></h1>
                                        <p>
                                            Date: <?= date("d-M-Y",strtotime($val['date'])) ?>
                                            <!--<span onclick="changeNotifsStatus(<?= $val['id']; ?>)" style="float:right;" class="md-btn md-btn-primary">Mark as <?= ($val['status'] == 'read')?"UNREAD":"READ" ?></span>-->
                                        </p>
                                        <p style="">
                                            <?= $val['msg'] ?>
                                        </p>
                                    </div>
                                </div>
                                <?php $i++; } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <?php require_once('advert_v.php'); ?>

        </div>
    </div>
</div>
<div class="confirmationModalOnD"></div>
<script>
    function changeNotifsStatus(id){
        $.post("<?= site_url('home/changeNotifsS'); ?>",{table:"testimonies",id:id},function(e){
            console.log(e);
            // window.location.reload();
        });
    }
</script>

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
<div id="newModal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h1>Testimonies</h1>
        <?= form_open_multipart("home/insert/testimonies/testimonies?id=1",array('class'=>"form-horizontal","id" => "actionForm","onSubmit"=>"document.getElementById('submit').disabled=true; document.getElementById('newModal').hide();")) ?>
        <div class="uk-form-row">
            <div class="uk-width-medium-1-1">
                <label>Subject</label>
                <input type="text" name="subject" maxlength="100" required="required" class="md-input" />
            </div>
        </div>
        <div class="uk-form-row">
            <div class="uk-width-medium-1-1">
                <input type="checkbox" data-md-icheck name="anon" value="true"> Treat as Anonymous:
            </div>
        </div>
        <div class="uk-form-row">
            <div class="uk-width-medium-1-1">
                <label>Description</label>
                <textarea id="" cols="30" maxlength="1000" rows="4" required="required" name="msg" class="md-input"></textarea>
            </div>
            <span id="textLe">0</span>/1000
        </div>
        <div class="uk-form-row" style="padding-bottom : 30px; padding-top : 10px;">
            <div class="uk-width-medium-1-1">
                <label style="margin-top : -30px">Testimony File 1</label>
                <input type="file" name="file1" class="md-input"/>
            </div>
        </div>
        <div class="uk-form-row" style="margin-top : 10px;">
            <div class="uk-width-medium-1-1">
                <label style="margin-top : -30px">Testimony File 2</label>
                <input type="file" name="file2" class="md-input"/>
            </div>
        </div>
        <div class="uk-form-row">
            <input type="submit" id="submit" class="md-btn md-btn-success"  value="Send Now!"/>
        </div>
        </form>
    </div>
</div>
<script>
    // $('#dt_other').dataTable();
    $("[name=msg]").keyup(function(){
        var a = $("[name=msg]").val();
        $("[name=msg]").val(a.substring(0,1000));
        lenght = a.length;
        $("#textLe").html(lenght);
    });
</script>
<script>
    <?php if(isset($_GET['received'])){ ?>
        setTimeout(function(){
            UIkit.notify({
                message : 'Testimony Received with Thanks – Your testimony shall be permanent',
                status  : 'danger',
                timeout : 2000,
                pos     : 'top-center'
            });
        },1000);
    <?php } ?>
</script>
