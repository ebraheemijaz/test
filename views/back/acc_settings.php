<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Account Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Account Settings</header>
                    <div class="panel-body">
                        <br/>
                        <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                        <?php } ?>
                        <div class="row"></div>
                        <br/>
                        <?= form_open('admin/accSettings',array("class"=>"form-horizontal")) ?>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Current Password
                                </div>
                                <div class="col-md-10">
                                    <input type="password" name="c_pwd" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    New Password
                                </div>
                                <div class="col-md-10">
                                    <input type="password" name="new_pwd" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Confirm Password
                                </div>
                                <div class="col-md-10">
                                    <input type="password" name="cf_pwd" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2 ">
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </section>
            </div>
            <div clas="col-lg-12">
                <span>You can use this section to change you old password to new password. We recommend you do this periodically. Thank you.</span>
            </div>
        </div>
    </section>
</section>