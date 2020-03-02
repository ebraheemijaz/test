<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Registered Admins</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Admins</header>
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
                                            <ul >
                                                <?php foreach($x as $xx=>$xs){ ?>
                                                    <li style="list-style: decimal !important;"><?= ucfirst($xx); ?></li>
                                                <?php }  ?>
                                            </ul>

                                        <?php } ?>
                                    </td>
                                    <td><?= $val['password'] ?></td>
                                    <td>
                                        <?php
                                        $url="#";
                                        if($userAdmin[0]['id'] != $val['id']){
                                            $url = site_url('admin/edit/'.$val['id']."/credentials/edit_manager");
                                            //site_url('admin/edit/'.$val['id']."/reminders/edit_reminder?date=".$_GET['date']);
                                        }
                                        ?>
                                        <a href="<?= $url; ?>"><i class="fa fa-pencil"></i></a>
                                        /
                                        <?php
                                        $url="#";
                                        if($userAdmin[0]['id'] != $val['id']){
                                            $url = site_url('admin/delete/credentials/'.$val['id']."/manage_admin");
                                        }
                                        ?>
                                        <a onclick="deleteConff('<?= $url; ?>')" style="cursor: pointer"><i class="fa fa-close"></i></a>
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
    <?php $i=1; foreach($members as $val){ ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?= $i ?>" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Name</td>
                                <td><?= $val['fname']." ".$val['lname'] ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?= $val['gander'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php $i++; } ?>


<div class="conf"></div>
<script>
    function openProfile(){
        $("#newModal").modal("toggle");
    }
    function deleteConff(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are You Sure? " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
</script>