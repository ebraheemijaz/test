
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url('admin'); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Topup History</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">SMS Topup History</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableHis" class="table table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Topup By</td>
                                <td>Topup Amount (£)</td>
                                <td>Payment Mode</td>
                                <td>SMS Block</td>
                                <td>Date</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($topupHistory as $val){ ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $this->data->fetch('credentials', array('id' => $val['topupBy']))[0]['name']; ?></td>
                                    <td><?= "£ ". number_format((float)($val['topupAmount']), 2, '.', ','); ?></td>
                                    <td><?= ucfirst($val['paymentMode']) ?></td>
                                    <td><?= $val['smsBlock']; ?></td>
                                    <td><?= date('d-M-Y, H:i:s', strtotime($val['createdAt'])); ?></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>

                        </table>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>