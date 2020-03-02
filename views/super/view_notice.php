
    <!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">View Notice Boards</a></li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                 Notice Boards
            </header>
            <div class="panel-body">
                <a href="create_notice.php"><span class="btn btn-info">Create Notice Board</span></a>
            </div>
        </section>
        <div class="directory-info-row">
            <div class="row">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <td style="width:20px">ID</td>
                            <td>Subject</td>
                            <td>Message</td>
                            <td>Date</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($notice as $val){ ?>
                            <tr>
                                <td><?= $val['id'] ?></td>
                                <td><?= $val['subject'] ?></td>
                                <td><?= $val['text'] ?></td>
                                <td><?= $val['date'] ?></td>
                                <td><a href="<?= site_url('super/delete')."/".$val['id'] ?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
