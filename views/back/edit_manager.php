<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Register An Admin</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Admin</header>
                    <div class="panel-body">
                        <?php

                        $access = array();
                        if($data[0]['access'] != NULL){
                            $access = json_decode($data[0]['access'],true);
                        }
                        ?>
                        <?= form_open_multipart('admin/update/'.$data[0]['id'].'/credentials/manage_admin',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                <label for="">Access</label>
                                <div class="row"></div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['members'])){ echo "checked"; } ?> value="yes" name="access[members]" type="checkbox"/> Member</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['live'])){ echo "checked"; } ?> value="yes" name="access[live]" type="checkbox"/> Live</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['wordlog'])){ echo "checked"; } ?> value="yes" name="access[wordlog]" type="checkbox"/> Word Log</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['codes'])){ echo "checked"; } ?> value="yes" name="access[codes]" type="checkbox"/> Codes</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['bulletin'])){ echo "checked"; } ?> value="yes" name="access[bulletin]" type="checkbox"/>News & Bulletin</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['advert'])){ echo "checked"; } ?> value="yes" name="access[advert]" type="checkbox"/>Adverts</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['attendance'])){ echo "checked"; } ?> value="yes" name="access[attendance]" type="checkbox"/>Attendance</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['reports'])){ echo "checked"; } ?> value="yes" name="access[reports]" type="checkbox"/>Reports</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['sendSMS'])){ echo "checked"; } ?> value="yes" name="access[sendSMS]" type="checkbox"/>Send SMS</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['sendEmail'])){ echo "checked"; } ?> value="yes" name="access[sendEmail]" type="checkbox"/>Send Email</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['books'])){ echo "checked"; } ?> value="yes" name="access[books]" type="checkbox"/> Book Store</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['donations'])){ echo "checked"; } ?> value="yes" name="access[donations]" type="checkbox"/> Donations</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['updates'])){ echo "checked"; } ?> value="yes" name="access[updates]" type="checkbox"/> Updates</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['reviews'])){ echo "checked"; } ?> value="yes" name="access[reviews]" type="checkbox"/> Reviews</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['messages'])){ echo "checked"; } ?> value="yes" name="access[messages]" type="checkbox"/> Message</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['groups'])){ echo "checked"; } ?> value="yes" name="access[groups]" type="checkbox"/> Group</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['pastors'])){ echo "checked"; } ?> value="yes" name="access[pastors]" type="checkbox"/> Pastors Diary </div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['notifications'])){ echo "checked"; } ?> value="yes" name="access[notifications]" type="checkbox"/> Notifications</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['settings'])){ echo "checked"; } ?> value="yes" name="access[settings]" type="checkbox"/> Settings</div>
                                <div class="col-md-3"><input <?php if(!empty($access) && isset($access['mempacas'])){ echo "checked"; } ?> value="yes" name="access[mempacas]" type="checkbox"/> Mempacas</div>
                                <br/>
                            </div>

                            <div class="row"></div>
                            <div class="col-md-6">
                                <br/>
                                <input type="text" class="form-control" name="name" value="<?= $data[0]['name'] ?>" placeholder="Enter Name" autofocus>
                            </div>
                            <div class="col-md-6">
                                <br/>
                                <input type="text" class="form-control" name="username" value="<?= $data[0]['username'] ?>" placeholder="Enter Username" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-6">
                                <input type="file" name="img" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="password" value="<?= $data[0]['password'] ?>" placeholder="Enter Password" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
                                <br/>
                                <button class="btn btn-lg btn-login btn-block" type="submit">Create</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
probation
