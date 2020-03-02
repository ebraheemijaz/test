
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Edit Reminder</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Reminder</header>
                    <div class="panel-body">
                        <?= form_open('admin/update/'.$data[0]['id'].'/reminders/index',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="row"></div>
                            <label for="">Description</label>
                            <div class="col-md-12">
                                <textarea name="desc" id="" cols="30" rows="4" class="form-control" placeholder="Enter Reminder"><?= $data[0]['desc'] ?></textarea>
                                <br/>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
                                <button class="btn btn-lg btn-login btn-block" type="submit">Update</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<!-- muhammad.ayaz1083@gmail.com -->
<!-- welcometoeme@gmail.com -->

