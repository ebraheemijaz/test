<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="jobs.php">Notice</a></li>
                    <li><a href="#">Create Notice</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Create Notice Board Message
                    </header>
                    <div class="panel-body">
                        <?= form_open('super/insert/notice_board/view_notice', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                        <div class="form-group">
                            <label for="" class="col-lg-2 col-sm-2 control-label">Admins</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="admin_id" id="">
                                    <option value="">All</option>
                                    <?php foreach($admin as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['name'] ?> | <?= $val['email'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-lg-2 col-sm-2 control-label">Subjects</label>
                            <div class="col-lg-10">
                                <input type="" class="form-control" id="inputEmail1" name="subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-lg-2 col-sm-2 control-label">Message</label>
                            <div class="col-lg-10">
                                <textarea name="text" id="" class="form-control" cols="30" rows="10" name="text"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-danger">Create</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
