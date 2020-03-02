<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Other Email Settings</header>
                    <div class="panel-body">
                        <br/>
                        <p>
                            <span style="font-weight: bold">Short Tags:</span><br/>
                            {name} = placeholder for name</br>
                            {preacherName} = Placeholder for Preacher Name</br>
                            {preachedTopic} = Placeholder for Preached Topic</br>
                            {ministerName} = Placeholder for Minister Name<br/>
                            {title} = Placeholder for Title<br/>
                            {author} = Placeholder for Author<br/>
                            {prayerDesc} = Placeholder for Prayer Description<br/>
                            {firstName} {lastName} = Placeholder for Firstname and Lastname<br/>
                            {phoneNo} = Placeholder for Phone Number<br/>
                            {email} = Placeholder for Email<br/>
                            {priority} = Placeholder for Priority<br/>
                        </p>
                        <?= form_open('admin/update/1/details/othermsg',array("class"=>"form-horizontal")) ?>
                            <div class="form-group ">
                                <div class="col-md-2">
                                    <strong>WordLog Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summernote" cols="30" name="wordMsg" class="form-control" rows="4"><?= $detailsss[0]['wordMsg'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-2">
                                    <strong>Live Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summernote4" cols="30" name="liveMsg" class="form-control" rows="4"><?= $detailsss[0]['liveMsg'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <strong>Voice Note Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summervoicenote" cols="30" name="voiceNote" class="form-control" rows="4"><?= $detailsss[0]['voiceNote'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <strong>News & Bulletin Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summernote1" cols="30" name="newsMsg" class="form-control" rows="4"><?= $detailsss[0]['newsMsg'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <strong>Bookstore Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summernote2" cols="30" name="bookstoreMsg" class="form-control" rows="4"><?= $detailsss[0]['bookstoreMsg'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <strong>Prayer Request Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summernote3" cols="30" name="pRequestMsg" class="form-control" rows="4"><?= $detailsss[0]['pRequestMsg'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <strong>Forgot Password Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summernote5" cols="30" name="forgotPassword" class="form-control" rows="4"><?= $detailsss[0]['forgotPassword'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <strong>Mempacas Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summernote6" cols="30" name="mempacasEmail" class="form-control" rows="4"><?= $detailsss[0]['mempacasEmail'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <strong>Attendance Email</strong>
                                </div>
                                <div class="col-md-10">
                                    <textarea id="attendanceEmail" cols="30" name="attendanceEmail" class="form-control" rows="4"><?= $detailsss[0]['attendanceEmail'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2 ">
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
