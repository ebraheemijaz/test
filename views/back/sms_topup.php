
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">History</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">SMS Toup</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable1" class="table table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>SMS Credit Block</td>
                                <td>Message Volume / Price Estimate</td>
                                <td>Total in GBP (£)</td>
                                <td>Discount (%)</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($smsTop as $val){ ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= ucfirst($val['smsCreditBlock']); ?></td>
                                    <td><?= $val['messageVolumeEstimate'] ?></td>
                                    <td><?= "£ ". number_format((float)($val['totalPrice']), 2, '.', ','); ?></td>
                                    <td><?= $val['discount']; ?></td>
                                    <td><a href="<?= site_url('admin/topup/'.$val['id']);?>" class="btn btn-success">Topup</a></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>

                        </table>
                        </div>
                            <div class="col-lg-12" style="color: red;">
                            Note: 2 credits will send 160 characters of text which implies 1 SMS. This means 2 credit = 1 SMS. For example, 100 Members will need 200 credits for them to get 1 SMS each.
                            <br/>
                            *please note that the price given for the SMS credits is subject to change at anytime.
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>