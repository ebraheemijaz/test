
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Create Reminder</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Reminder</header>
                    <div class="panel-body">
                        <?= form_open('admin/insert/reminders/index',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <label>For:</label>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <input type="checkbox" class="">:Members
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="">:Pastors Diary
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="" checked>:Admin
                                </div>
                                <br/>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-6">
                                <label>Starting</label>
                                <div class="col-md-12">
                                    Date:<input type="date" name='starting[date]' class="form-control" value="<?= date("Y-m-d",strtotime($_GET['date'])) ?>" min="<?= date("Y-m-d") ?>" autofocus>
                                </div>
                            </div>
<!--                            <div class="row"></div>-->
                            <div class="col-md-6">
                                <label>Ending</label>
                                <div class="col-md-12">
                                    Date:<input type="date" name='ending[date]' class="form-control" value="<?= date("Y-m-d",strtotime($_GET['date'])) ?>" min="<?= date("Y-m-d") ?>" autofocus>
                                </div>
                            </div>
                            <div class="row"></div>
                            <label for="">Description</label>
                            <div class="col-md-12">
                                <textarea name="desc" id="" cols="30" rows="4" class="form-control" placeholder="Enter Reminder"></textarea>
                                <br/>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
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