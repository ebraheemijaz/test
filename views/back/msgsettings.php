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
                    <header class="panel-heading">Registration Email Settings</header>
                    <div class="panel-body">
                        <br/>
                        <p>
                            <span style="font-weight: bold">Short Tags:</span>
                            <br/>
                            {username} = placeholder for user email
                            <br/>
                            {password} = placeholder for password
                            <br/>
                            {name} = placeholder for name
                        </p>
                        <?= form_open('admin/update/1/details/settings',array("class"=>"form-horizontal")) ?>
                            <div class="form-group ">
                                <div class="col-md-2">
                                    Registration Message
                                </div>
                                <div class="col-md-10">
                                    <textarea id="summernote" cols="30" name="msg" class="form-control" rows="4"><?= $detailsss[0]['msg'] ?></textarea>
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
