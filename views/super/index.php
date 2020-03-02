<section id="main-content">
    <section class="wrapper">
        <div class="row state-overview">
            <div class="col-lg-4 col-sm-4">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?= count($jobs) ?>
                        </h1>
                        <p>Total Students</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section class="panel">
                    <div class="symbol red">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2">
                            <?= count($tutors) ?>
                        </h1>
                        <p>Total Tutors</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3">
                            <?= count($jobs) ?>
                        </h1>
                        <p>Total Jobs Posted</p>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body progress-panel">
                        <div class="task-progress">
                            <h1>Notice Board</h1>
                        </div>
                    </div>
                    <table id="myTable" class="table table-hover">
                        <thead>
                        <tr>
                            <td style="width:20px">ID</td>
                            <td>Subject</td>
                            <td>Message</td>
                            <td>Date</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($notice as $val){ ?>
                            <tr>
                                <td><?= $val['id'] ?></td>
                                <td><?= $val['subject'] ?></td>
                                <td><?= $val['text'] ?></td>
                                <td><?= $val['date'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </section>
</section>
