
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Tutors</a></li>
                </ul>
            </div>
        </div>
        <section class="panel">
            <header class="panel-heading">
                 Tutors
            </header>
            <div class="panel-body">
                <a href="create_tutor.php"><span class="btn btn-info">Add Tutors</span></a>
            </div>
        </section>
        <div class="directory-info-row">
            <div class="row">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <td>Reference</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Location</td>
                            <td>Joining</td>
                            <td>Contacts</td>
                            <td>Type</td>
                            <td>Gender</td>
                            <td>Status</td>
                            <td>Suspend</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tutors as $val){ ?>
                            <tr>
                                <td><?= $val['id'] ?></td>
                                <td><?= $val['name'] ?></td>
                                <td><?= $val['lname'] ?></td>
                                <td><?= $val['address'] ?></td>
                                <td><?= $val['joining'] ?></td>
                                <td><?= $val['contacts'] ?></td>
                                <td><?= $val['type'] ?></td>
                                <td><?= $val['gender'] ?></td>
                                <td><?= $val['status'] ?></td>
                                <?php $s = ($val['status'] == 'active') ? "suspend" : 'active' ; ?>
                                <td><a href="<?= site_url('super/status')."/".$val['id']."/".$s; ?>"><?= ucfirst($s); ?></a></td>
                                <td><a href="<?= site_url('super/status')."/".$val['id']."/delete"; ?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
