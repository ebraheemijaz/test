<!DOCTYPE html><html lang="en"><head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <meta name="description" content="">    <meta name="author" content="Jetnetix">    <meta name="keyword" content="Tutor Management System">    <link rel="shortcut icon" href="img/favicon.html">    <title>Church Membership Management</title>    <link href="<?= base_url('assets_f') ?>/css/bootstrap.min.css" rel="stylesheet">    <link href="<?= base_url('assets_f') ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />    <link href="<?= base_url('assets_f') ?>/css/style.css" rel="stylesheet">    <link href="<?= base_url('assets_f') ?>/css/style-responsive.css" rel="stylesheet" />    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->    <!--[if lt IE 9]>    <script src="js/html5shiv.js"></script>    <script src="js/respond.min.js"></script>    <![endif]-->    <Style>        .logooo{            width: 15%;            margin-left: auto;            margin-right: auto;            margin-top: 50px;        }        .form-signin{            margin: 15px auto 0!important;        }        p{            /*font-weight:bold !important;*/            color:black !important;        }    </Style></head><body class="login-body"><div class="container">    <img src="<?= base_url() ?>/assets_f/logo.png" class="logooo img-responsive" />    <?= form_open("home/dologin",array('class'=>'form-signin',"style"=>"max-width: 100% !important;")) ?>    <h2 class="form-signin-heading">Thank you!</h2>    <div class="login-wrap clearfix" >        <?= $msg; ?>    </div>    <?= form_close(); ?></div><br/><br/><br/><footer>    <p style="text-align: center;font-weight:bold;">        <?= date("Y"); ?> © <a target="_blank" href="//mmsonline.website">Membership Management System</a>. All Rights Reserved.    </p></footer><!-- js placed at the end of the document so the pages load faster --><script src="<?= base_url('assets_f') ?>/js/jquery.js"></script><script src="<?= base_url('assets_f') ?>/js/bootstrap.min.js"></script></body></html>