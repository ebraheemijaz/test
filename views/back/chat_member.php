<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Chat With Members</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Members<span style="float : right;">
                        <a href="<?= site_url('admin/view/chat') ?>" title="View All Member Chat"><i class="md-icon material-icons">thumbs_up_down</i></a>
        </span></header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableChatMember" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Profile Picture</td>
                                <td>Status</td>
                                <td>Start Chat</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($members as $val){ ?>
                                <tr>
                                    <td><?= ucfirst($val['fname'])." ".ucfirst($val['lname']) ?></td>
                                    <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <td><?php
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
                                        ?> alt=""/></td>
                                    <td><?= ucfirst($val['visiblity']) ?></td>
                                    <td><a onclick="sendMsgg(<?= $val['id'] ?>)">Start Chat</a></td>
                                    <td><a href="<?= site_url('admin/view/chat')."#".$val['id'] ?>">Ongoing Chat</a></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<div class="modal fade bs-example-modal-sm" id="newModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="mySmallModalLabel">Send Message</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="col-sm-12">
                        <?= form_open("admin/sendPrivateMsg",array("class"=>"form-horizontal")) ?>
                        <div class="form-group">
                            <input type="hidden" min="1" value="1" id="receiverTo" name="id" class="form-control"/>
                        </div>
                        <div class="form-group">
                            Message:
                            <textarea id="" cols="30" name="msg" rows="4" required class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Send Now!"/>
                        </div>
                        </form>
                    </div>
                    <div class="row"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function sendMsgg(id){
        $("#newModal").modal();
        $("#receiverTo").val(id);
    }
</script>