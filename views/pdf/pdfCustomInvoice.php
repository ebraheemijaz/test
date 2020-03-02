<?php $check = $this->session->userdata('userAdmin'); ?>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jetnetix">
    <meta name="keyword" content="Tutor Management System">
    <link rel="shortcut icon" href="<?= base_url('assets_f') ?>/logo.png">
    <title>Offer Invoice</title>
    <script src="<?= base_url('assets_f') ?>/js/jquery.js"></script>
    <link href="<?= base_url('assets_f') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/multiple-select.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
    <!--<link href="<?= base_url('assets_new') ?>/assets/js/fullcalendar/fullcalendar.print.css" rel="stylesheet">-->
    <script src="<?= base_url('assets_new')?>/assets/js/fullcalendar/lib/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <link href="<?= base_url('assets_f') ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/css/owl.carousel.css" type="text/css">
    <link href="<?= base_url('assets_f') ?>/css/tasks.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_f') ?>/assets/fuelux/css/tree-style.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets_f') ?>/assets/jquery-multi-select/css/multi-select.css" />
    <link href="<?= base_url('assets_f') ?>/assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <!-- weather icons -->
        <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/chartist/dist/chartist.min.css">
    <!-- uikit -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/icons/flags/flags.min.css" media="all">
    <!-- style switcher -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/style_switcher.min.css" media="all">
    <!-- altair admin -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/main.min.css" media="all">
    <!-- themes -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/themes/themes_combined.min.css" media="all">
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/intl-tel/build/css/intlTelInput.css">
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/intl-tel/build/css/demo.css">
    <link href="<?= base_url('assets_f') ?>/css/slidebars.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style-responsive.css" rel="stylesheet" />
<!--    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>-->
<!--    <script src="--><?//= base_url('assets_f') ?><!--/js/bootstrap.min.js"></script>-->
<!--    <script src="js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="<?= base_url('assets_f/wysiwyg') ?>/dist/ui/trumbowyg.css">
    <link rel="stylesheet" href="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/colors/ui/trumbowyg.colors.css">
    <!-- Include the plugin's CSS and JS: -->
    <script type="text/javascript" src="<?= base_url('assets_f') ?>/multiselect/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/multiselect/bootstrap-multiselect.css" type="text/css"/>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tool tips and media queries -->
    <!--[if lt IE 9]>
    <script src="<?= base_url('assets_f') ?>/js/html5shiv.js"></script>
    <script src="<?= base_url('assets_f') ?>/js/respond.min.js"></script>
    <![endif]-->
    <Style>
        .form-horizontal .control-label {
            color: #000;
        }
        li.current_section > a > span {
            color: #ff4081
        }
        @media print {
            body * {
                /*visibility: hidden;*/
            }
            #section-to-print, #section-to-print * {
                /*visibility: visible;*/
            }
            #section-to-print {
                /*position: absolute;*/
                /*left: 0;*/
                /*top: 0;*/
            }
        }
        @media(min-width:992px) AND (max-width:1199px) {
            .visible-md {
                display: inline-block !important;
            }
        }
        @media(min-width:1200px){
            .visible-lg {
                display: inline-block !important;
            }
        }
        .panel-heading{
            font-size:20px;
            font-weight: bold;
        }
        thead>tr>td{
            font-size:16px;
            font-weight: bold;
        }
        .form-signin{
            margin-top:0px !important;
        }
        .form-signin > p{
            /*font-weight: bold;*/
            text-align:left !important;
            color:black;
        }
    </Style>
    <!--<script type="text/javascript">
        var idleTime = 0;
        $(document).ready(function () {
            var idleInterval = setInterval(timerIncrement, 60000);
            $(this).mousemove(function(e){
                idleTime = 0;
            });
            $(this).keypress(function(e){
                idleTime = 0;
            });
        });
        function timerIncrement() {
            idleTime = idleTime + 1;
            if (idleTime > 59) {
                window.location.href = "<?/*= site_url('admin/logout'); */?>";
            }
        }
    </script>-->
<!--    <link rel="stylesheet" href="--><?//= base_url('assets_f') ?><!--/chosen/docsupport/style.css">-->
<!--    <link rel="stylesheet" href="--><?//= base_url('assets_f') ?><!--/chosen/docsupport/prism.css">-->
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/chosen/chosen.css">
</head>
    <body style="text-align: left !important;">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">
                    <div id="print" class="md-card-content invoice_content print_bg">
        <div class="invoice_header md-bg-blue-grey-500">
            <h2 style="text-align: center">
                <?= $business[0]['title'] ?>
                <img class="uk-float-right" src="<?= base_url('assets_new') ?>/assets/img/logo_main.png" alt="" height="30" width="140"/>
            </h2>
        </div>
        <?php if(!empty($offers)){ ?>
        <?php $i = 1; foreach($offers as $val){ ?>
        <div class="uk-margin-medium-bottom">
            <span class="uk-text-muted uk-text-small uk-text-italic">Date:</span> <span><?= date('d-M-Y', strtotime($val['date']));?></span><br/>
            <br>
        </div>
        <div class="uk-width-small-6-10 uk-row-first">
            <div class="uk-margin-medium-bottom" style="float: right">
                <span class="uk-text-muted uk-text-small uk-text-italic"><?= ucfirst($_GET['type']) ?> From:</span><br/>
                <span><strong><?= $business[0]['title']; ?></strong></span>
            </div>
        </div>
            <div class="uk-width-small-6-10 uk-row-first">

                <div class="uk-margin-medium-bottom">
                <span class="uk-text-muted uk-text-small uk-text-italic"><?= ucfirst($_GET['type']) ?> To:</span>
                    <address>
                        <p><strong><?= $val['cust_name']; ?></strong></p>
                        <p><?= $val['cust_addr'] ?></p>
                    </address>
                    <span class="uk-text-muted uk-text-small uk-text-italic">Total:</span>
                <p class="heading_b uk-text-success">£ <?= $val['amount'] ?></p>
                </div>
            </div>
            <div class="uk-margin-medium-bottom">
            <div class="uk-width-1-1">
                <table class="uk-table">
                    <thead>
                    <tr class="uk-text-upper">
                        <th>Id</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th class="uk-text-center">DeadLine</th>
                        <th class="uk-text-center">total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="uk-table-middle">
                        <td>
                            <?= $i ?>
                        </td>
                        <td>
                            <span class="uk-text-large">Service</span><br>
                            <span class="uk-text-muted uk-text-small"><?= $val['desc']?></span>
                        </td>
                        
                        <td>
                            £ <?= $val['amount'] ?>
                        </td>
                        <td>
                            <?= $val['expiry']; ?>
                        </td>
                        <td>
                            £ <?= $val['amount']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><p class="heading_b uk-text-success">Offer <?= ucfirst($val['status']) ?></p></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="invoice_footer " style="margin-top: 40px">
            <p style="text-align: center">
                Powered by <a href="http://mmsonline.website">
                    Membership Management System
                </a>
            </p>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    function openProfile(){
        $("#newModal").modal("toggle");
    }
    function sendMsg(){
        var sendersid = window.location.hash;
        sendersid = sendersid.replace("#","");
        var msg = $("#submit_message").val();
        if(sendersid != ""){
            $.post("<?= site_url('home/admin_chat/sendMessage'); ?>",{att:attachm,msg:msg,id: sendersid},function(a){
                $("#submit_message").val("");
                attachm = "";
            });
        }
    }
    function deleteConff(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are You Sure? " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function firstFollowUp(id){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Enter First Follow Up " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url('admin/updateKN'); ?>' method='post' >"+
            "<input type='hidden' name='firstFollowUpAdmin' value='<?= $check[0]['id'] ?>'/>"+
            "<input type='hidden' name='keeperId' value='"+id+"' />"+
            "<textarea name='firstFollowUp' class='form-control' style='padding-bottom : 10px;' placeholder='Enter First Follow Up Comment'></textarea>"+
            "<br/>"+
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<button type='submit' class='btn btn-success'>Submit Comment</button> " +
            "</form>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function secondFollowUp(id){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Enter Second Follow Up " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url('admin/updateKNSecond'); ?>' method='post' >"+
            "<input type='hidden' name='secondFollowUpAdmin' value='<?= $check[0]['id'] ?>'/>"+
            "<input type='hidden' name='keeperId' value='"+id+"' />"+
            "<textarea name='secondFollowUp' class='form-control' style='padding-bottom : 10px;' placeholder='Enter Second Follow Up Comment'></textarea>"+
            "<br/>"+
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<button type='submit' class='btn btn-success'>Submit Comment</button> " +
            "</form>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function otherOpen(){
        var a = document.getElementById('absenceDescription').value;
        if(a == 'other'){
            document.getElementById('otherDesc').style.display = "block";
        }else{
            document.getElementById('otherDesc').style.display = "none";
        }
    }
    // $("#absenceDescription").change(function(){
    //     alert('hello');
    //   var a = $('#absenceDescription').val();
    //   if(a == 'other'){
    //       $('#otherDesc').css('display', 'block');
    //   }else{
    //       $('#otherDesc').css('display', 'none');
    //   }
    // });
</script>
</body>
</html>
