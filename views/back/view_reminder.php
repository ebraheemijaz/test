<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">View and Schedule Reminder</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Reminder</header>
                    <div class="panel-body">
                        <a href="<?= site_url('admin/view/create_reminder') ?>?date=<?= $_GET['date'] ?>"><span class="btn btn-info">Add Reminder</span></a>
                        <br/>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Description</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; if(!empty($reminder)){ ?>
                                <?php foreach($reminder as $val){ ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $val['desc'] ?></td>
                                        <td>
                                            <?php if(date("Y-m-d") > date("Y-m-d",strtotime($_GET['date']))){ $val['status'] = "Past"; } ?>
                                            <?= ucfirst($val['status']); ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('admin/edit/'.$val['id']."/reminders/edit_reminder?date=".$_GET['date']) ?>"><i class="fa fa-pencil"></i></a>

                                            /
                                            <a href="<?= site_url('admin/delete/reminders/'.$val['id']."/same") ?>"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++; } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

