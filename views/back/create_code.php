<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Generate Codes</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Generate Code</header>
                    <div class="panel-body">
                        <form action="" method="get" class="" style="max-width: 100% !important;">
                            <div class="login-wrap">
                             <div class="row"></div>
                            <div class="col-md-12">
                                <select name="q" class="form-control" >
                                    <option value="10">Number Of Codes</option>
                                    <option value="1">1</option>
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                </select>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
                                <br/>
                                <button class="btn btn-lg btn-info btn-block" type="submit">Create</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                            <?php if(!empty($codesNow   )){ ?>
                                <div class="row"></div>
                                <div class="col-md-12">
                                    <h3>Codes Generated And Saved</h3>
                                    <button type="button" onclick="printDiv('section-to-print')" class="btn btn-info">Print</button>

                                </div>
                                <div class="row"></div>
                                <br/>
                                <div id="section-to-print">
                                    <?php foreach($codesNow as $val){ ?>
                                        <input class="form-control" style="height: 50px;margin: 10px 0px;font-size: 20px!important;" type="text" readonly value="<?= "Access Point: www.rccgvhl.mmsapp.org   Validation Code: ". $val; ?>"/>
                                    <?php } ?>
                                </div>
                                <script>
                                    function printDiv(divName) {
                                        var printContents = document.getElementById(divName).innerHTML;
                                        var originalContents = document.body.innerHTML;
                                        document.body.innerHTML = printContents;
                                        window.print();
                                        document.body.innerHTML = originalContents;
                                    }
                                </script>
                            <?php } ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

