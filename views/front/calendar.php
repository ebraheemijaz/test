<section id="main-content">    <section class="wrapper">        <div class="row">            <div class="col-lg-12">                <ul class="breadcrumb">                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>                    <li><a href="">Calendar</a></li>                </ul>            </div>        </div>        <div class="row">            <div class="col-lg-7 col-lg-7 col-sm-12 col-xs-12">                <section class="panel">                    <header class="panel-heading">Calendar</header>                    <div class="panel-body progress-panel">                        <div class="task-progress">                        </div>                        <span style="float:right;">                            <!--S - Schedule Message-->                            <!--<br/>-->                            V - View or Set Reminder                        </span>                    </div>                    <div class="gap">                        <table></table>                        <div class="timeTable"></div>                    </div>                </section>            </div>            <div class="col-lg-5 col-md-5 visible-md visible-lg">                <section class="panel1">                    <header class="panel-heading">Clock</header>                    <div class="panel-body progress-panel">                        <div style="border:none !important;" class="clock" id="clock"></div>                    </div>                </section>            </div>        </div>    </section></section><link rel="stylesheet" href="<?= base_url('assets_b/clock/example') ?>/css/demo.css"/><script type="text/javascript" src="<?= base_url('assets_b/clock/example') ?>/js/clock-1.1.0.min.js"></script><script>    var clock1 = $("#clock").clock({        theme: 't1'    });    $.post("<?= site_url('home/calender') ?>",{},function(e){        $(".timeTable").html(e);    });</script>