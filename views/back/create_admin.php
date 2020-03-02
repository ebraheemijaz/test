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
                        <?= form_open_multipart('admin/insert/credentials/manage_admin',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                <label for="">Access</label>
                                <div class="row"></div>
                                <div class="col-md-3"><input value="yes" name="access[members]" type="checkbox"/> Member</div>
                                <div class="col-md-3"><input value="yes" name="access[live]" type="checkbox"/> Live</div>
                                <div class="col-md-3"><input value="yes" name="access[wordlog]" type="checkbox"/> Word Log</div>
                                <div class="col-md-3"><input value="yes" name="access[codes]" type="checkbox"/> Codes</div>
                                <div class="col-md-3"><input value="yes" name="access[bulletin]" type="checkbox"/>News & Bulletin</div>
                                <div class="col-md-3"><input value="yes" name="access[advert]" type="checkbox"/>Advert</div>
                                <div class="col-md-3"><input value="yes" name="access[attendance]" type="checkbox"/>Attendance</div>
                                <div class="col-md-3"><input value="yes" name="access[reports]" type="checkbox"/>Reports</div>
                                <div class="col-md-3"><input value="yes" name="access[sendSMS]" type="checkbox"/>Send SMS</div>
                                <div class="col-md-3"><input value="yes" name="access[sendEmail]" type="checkbox"/>Send Email</div>
                                <div class="col-md-3"><input value="yes" name="access[books]" type="checkbox"/> Book Store</div>
                                <div class="col-md-3"><input value="yes" name="access[donations]" type="checkbox"/> Donations</div>
                                <div class="col-md-3"><input value="yes" name="access[updates]" type="checkbox"/> Updates</div>
                                <div class="col-md-3"><input value="yes" name="access[reviews]" type="checkbox"/> Reviews</div>
                                <div class="col-md-3"><input value="yes" name="access[messages]" type="checkbox"/> Message</div>
                                <div class="col-md-3"><input value="yes" name="access[groups]" type="checkbox"/> Group</div>
                                <div class="col-md-3"><input value="yes" name="access[pastors]" type="checkbox"/> Pastors Diary </div>
                                <div class="col-md-3"><input value="yes" name="access[notifications]" type="checkbox"/> Notifications</div>
                                <div class="col-md-3"><input value="yes" name="access[settings]" type="checkbox"/> Settings</div>
                                <div class="col-md-3"><input value="yes" name="access[mempacas]" type="checkbox"> Mempacas</div>
                                <br/>
                            </div>

                            <div class="row"></div>
                            <div class="col-md-6">
                                <br/>
                                <input type="text" class="form-control" name="name" placeholder="Enter First Name" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <br/>
                                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-6">
                                <br/>
                                <input type="email" class="form-control" name="username" placeholder="Enter Email" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <br/>
                                <input type="tel" class="form-control" name="mobile" placeholder="Enter Mobile #" required autofocus>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-6">
                                <input type="file" name="img" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="password" placeholder="Enter Password" required autofocus>
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