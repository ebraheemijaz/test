    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Settings Super Admin</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Create Admin User
                        </header>
                        <div class="panel-body">
                            <a href="<?= site_url('super/view/create_admin_user') ?>" class="btn btn-success">Create Admin User</a>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <aside class="profile-info col-lg-12">
                    <section>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php $i=1; foreach($admin as $val){ ?>
                                    <div class="panel-group m-bot20" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Admin User #<?= $i; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <th>First Name</th>
                                                            <td><?= $val['name']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Last Name</th>
                                                            <td><?= $val['lname']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td><?= $val['email']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Joining Date</th>
                                                            <td><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <?php $status = ($val['status'] == "active") ? "suspended" : "active" ;  ?>
                                                            <td><?= ucfirst($val['status']) ?> <a href="<?= site_url("super/changeStatusAdmins")."/".$val['id']."/".$status ?>">Change</a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++; } ?>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </section>
    </section>