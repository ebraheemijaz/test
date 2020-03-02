<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Prayer Requests</h3>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content">
                        <div class="dt_colVis_buttons">
                            <button data-step="3" data-intro="Click here to create new request" class="md-btn md-btn-success" data-uk-modal="{target:'#newModal'}">New Request</button>
                        </div>
                        <table data-step="1" data-intro="List of all the prayers you requested previously" id="dt_default" class="uk-table table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <td style="width: 90px">Date</td>
                                <td data-step="2" data-intro="Click on 'Read More' to read full">Description</td>
                                <td>Priority</td>
                                <td>Reply</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($p_request)){ ?>
                                <?php $i=1; foreach($p_request as $val){ ?>
                                    <?php if($val['statusss'] == "read"){ ?>
                                        <tr>
                                            <td><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                            <td style="word-break: break-all;">
                                                <?= substr(strip_tags($val['desc']),0,100); ?>    
                                                <a href="#my-id<?= $val['id'] ?>" data-uk-modal><span onclick="changeNotifsStatus(<?= $val['id']; ?>)">Read More</span></a>
                                            </td>
                                            <?php if($val['priority'] == 'urgent'){ $style = 'red'; }else{ $style = 'black'; } ?>
                                            <td style="color : <?php echo $style; ?>"><?= ucfirst($val['priority']) ?></td>
                                            <td><?= wordwrap(ucfirst($val['reply']),30,"<br/>\n"); ?></td>
                                            <td><a style="cursor: pointer" onclick="deleteC('<?= site_url('home/delete') . "/" . $val['id']."/same" ?>')">Delete</a></td>
                                        </tr>
                                    <?php }else{ ?>
                                        <tr>
                                            <th><?= date("d-M-Y",strtotime($val['date'])); ?></th>
                                            <td style="word-break: break-all;">
                                                <?= substr(strip_tags($val['desc']),0,100); ?>    
                                                <a href="#my-id<?= $val['id'] ?>" data-uk-modal><span onclick="changeNotifsStatus(<?= $val['id']; ?>)">Read More</span></a>
                                            </td>
                                            <th><?= ucfirst($val['priority']) ?></th>
                                            <td><?= wordwrap(ucfirst($val['reply']),30,"<br/>\n"); ?></td>
                                            <td><a style="cursor: pointer" onclick="deleteC('<?= site_url('home/delete') . "/" . $val['id']."/same" ?>')">Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                    <div id="my-id<?= $val['id'] ?>" class="uk-modal">
                                        <div class="uk-modal-dialog">
                                            <a href="" class="uk-modal-close uk-close"></a>
                                            <h1><?= "Prayer Request"; ?></h1>
                                            <p style="word-break: ">
                                                <?= $val['desc'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php $i++; } ?>
                            <?php }else{ ?>
                                <tr>
                                    <th style="text-align: center" colspan="5">No prayer request submitted</th>
                                </tr>
                            <?php } ?>
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
<script>
    function changeNotifsStatus(id){
        $.post("<?= site_url('home/changeNotifsS'); ?>",{table:"p_request",id:id},function(e){
            console.log(e);
            // window.location.reload();
        });
    }
</script>

<div id="newModal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h1>New Request</h1>
        <?= form_open("home/insert/p_request/prayerRequest?id=1",array('class'=>"form-horizontal", "onSubmit"=>"document.getElementById('submit').disabled=true; document.getElementById('newModal').hide();")) ?>
        <div class="form-group">
            Priority:
            <select name="priority" id="" class="md-input">
                <option value="normal">Normal</option>
                <option value="urgent">Urgent</option>
            </select>
        </div>
        <div class="form-group">
            Description:
            <textarea required id="" cols="30" rows="4" required="required" name="desc" class="md-input"></textarea>
            <span id="textLe">0</span>/500
        </div>
        <div class="form-group">
            <input type="submit" id="submit" class="md-btn md-btn-success" value="Request Now!"/>
        </div>
        </form>
    </div>
</div>
<script>
    $("[name='priority']").change(function(){
        var a = $("[name='priority']").val();
        if(a == 'urgent'){
            $("[name='desc']").attr('placeholder',"Description and please include your contact number for our prayer team to contact you");
        }else{
            $("[name='desc']").attr('placeholder',"Description");
        }
    })
</script>
<script>
    $("[name=desc]").keyup(function(){
        var a = $("[name=desc]").val();
        $("[name=desc]").val(a.substring(0,500));
        lenght = a.length;
        $("#textLe").html(lenght);
    });
</script>
<script>
    <?php if(isset($_GET['received'])){ ?>
    setTimeout(function(){
        UIkit.notify({
            message : 'Prayer Request Submitted – Your Joy shall be full IJMN',
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });
    },1000);
    <?php } ?>
</script>
