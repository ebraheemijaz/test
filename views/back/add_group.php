<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Assign a group</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Group</header>
                    <div class="panel-body">
                        <?= form_open('admin/insert/group/manage_admin',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <select name="type" class="form-control" id="">
                                    <option value="b">Select Group</option>
                                    <option value="b">Business Group</option>
                                    <option value="c">Church Group</option>
                                </select>
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

