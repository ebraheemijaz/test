
    <!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Jobs</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                 Jobs
            </header>
            <div class="panel-body">
                <a href="create_job.php"><span class="btn btn-info">Add Job</span></a>
            </div>
        </section>
        <div class="directory-info-row">
            <div class="row">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <td>Reference</td>
                            <td>Student</td>
                            <td>Postal</td>
                            <td>Location</td>
                            <td>Subjects</td>
                            <td>Year Group</td>
                            <td>Tutor</td>
                            <td>Client Type</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($jobs as $val){ ?>
                            <tr>
                                <td><?= $val['id'] ?></td>
                                <td><?= $val['student'] ?></td>
                                <td><?= $val['postal'] ?></td>
                                <td><?= $val['location'] ?></td>
                                <td><?= $val['subjects'] ?></td>
                                <td><?= $val['yeargroup'] ?></td>
                                <td><?= $val['tutor'] ?></td>
                                <td><?= $val['client_type'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
