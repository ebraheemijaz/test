<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Report</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Generate Report</header>
                    <div class="panel-body">
                        <form action="">
                            <div class="col-md-6"><div class="form-group">
                                    <label class="col-md-2" for="">From</label>
                                    <input class="form-control" name="from" type="date"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2" for="">To</label>
                                    <input class="form-control" max="<?= date("Y-m-d") ?>" name="to" type="date"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary">Generate</button>
                            </div>
                        </form>
                        <div class="row"></div>
                        <?php if(isset($report) AND !empty($report)){ ?>
                            <hr/>
                            <div id="printReport">
                                <div class="col-xs-12">
                                    <h3 style="text-align: center;">Report</h3>
                                    <h4>From <?= $_GET['from']; ?></h4>
                                    <h4>To <?= $_GET['to']; ?></h4>
                                    <table class="table">
                                        <tr>
                                            <th>Donations :</th>
                                            <td><?= (!empty($report['donations'][0]['total'])) ? $report['donations'][0]['total'] : 0; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tithes :</th>
                                            <td><?= (!empty($report['tithes'][0]['total'])) ? $report['tithes'][0]['total'] : 0; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Offerings :</th>
                                            <td><?= (!empty($report['offerings'][0]['total'])) ? $report['offerings'][0]['total'] : 0; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Members Registered :</th>
                                            <td><?= (!empty($report['member'][0]['total'])) ? $report['lifeToChrist'][0]['total'] : 0; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gave Life To Christ :</th>
                                            <td><?= (!empty($report['lifeToChrist'][0]['total'])) ? $report['member'][0]['total'] : 0; ?></td>
                                        </tr>
                                        <tr>
                                            <th id="rev" colspan="2">
                                                <br/>
                                                Comments:
                                                <textarea class="form-control" cols="30" rows="4"></textarea>
                                            </th>
                                        </tr>
                                    </table>
                                    <div class="row"></div>
                                </div>

                            </div>
                            <button class="btn btn-danger" onClick="printDiv('printReport');" style="float:right">Print</button>
                        <?php } ?>


                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<script>
    function printDiv(divName) {
        var review = "<br/>Comment:</br>";
        review += $("textarea").val();
        $("#rev").html(review);
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
