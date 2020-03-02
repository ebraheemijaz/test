<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Registered Members</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Members</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Profile Picture</td>
                                <td>Date of Joining</td>
                                <td>Status</td>
                                <td>Details</td>
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
                                    <td><?= $val['dOfJoining'] ?></td>
                                    <?php $status = ($val['status'] == 'active') ? "suspend" : "active"; ?>
                                    <td><a href="<?= site_url("admin/statusMember/".$val['id']."/".$status) ?>"><?= ucfirst($val['status']) ?></a></td>
                                    <td><a data-toggle="modal" href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>">Click Here</a></td>
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