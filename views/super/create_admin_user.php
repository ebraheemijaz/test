
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Settings Super Admin</a></li>
                        <li><a href="#">Create Admin User</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Settings
                        </header>
                        <div class="panel-body">
                            <p style="text-align: center;color:red;font-size: 14px"><?= (!empty($msg)) ? $msg : '' ; ?></p>
                            <?= form_open("super/insert/admins/create_admin_user",array("class"=>"form-horizontal","role"=>"form")) ?>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Admin Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" required name="name" class="form-control" id="" placeholder="Enter Admin's Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Admin Email</label>
                                    <div class="col-lg-10">
                                        <input type="text" required class="form-control" name="email" id="" placeholder="Enter Admin's Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Admin Password</label>
                                    <div class="col-lg-10">
                                        <input type="text" required name="password" class="form-control" id="" placeholder="Enter Admin's Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-danger">Create Admin</button>
                                    </div>
                                </div>
                            <?= form_close(); ?>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
