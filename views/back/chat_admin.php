<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Chat With Admin</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Admin(s)</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Username</td>
                                <td>Powers</td>
                                <td>Password</td>
                                <td>Chat</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($admin as $val){ ?>
                                <tr>
                                    <td><?= $val['name'] ?></td>
                                    <td><?= $val['username'] ?></td>
                                    <td>
                                        <?php if($val['access'] == NULL){ ?>
                                            <p>Super Admin</p>
                                        <?php }else{ ?>
                                            <?php $x = json_decode($val['access'],true); ?>
                                                <?php foreach($x as $xx=>$xs){ ?>
                                                    <?= ucfirst($xx)."</br>"; ?>
                                                <?php }  ?>
                                        <?php } ?>
                                    </td>
                                    <td><?= $val['password'] ?></td>
                                    <td>
                                        <?php
                                        $url="#";
                                        if($userAdmin[0]['id'] != $val['id']){
                                            $url = "onclick='sendMsgg(".$val['id'].")'";
                                        }
                                        ?>
                                        <a <?= $url; ?>><i class="fa fa-envelope"></i></a>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('admin/view/admin_chat')."#".$val['id'] ?>">Ongoing Chat</a>
                                    </td>
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
                        <?= form_open("admin/sendPrivateMsg_admin",array("class"=>"form-horizontal")) ?>
                        <div class="form-group">
                            <input type="hidden" min="1" value="1" id="receiverTo" name="id" class="form-control"/>
                        </div>
                        <div class="form-group">
                            Message:
                            <textarea id="" cols="30" name="msg" required rows="4" class="form-control"></textarea>
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