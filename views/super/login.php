<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jetnetix">
    <meta name="keyword" content="Tutor Management System">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Tutor Management System - Login</title>

    <link href="<?= base_url('assets_f') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-body">
<div class="container">
        <?= form_open("home/dologin",array('class'=>'form-signin','autocomplete'=>'off')) ?>
        <h2 class="form-signin-heading">Admin Login</h2>
        <div class="login-wrap">
            <input name="email" type="text" class="form-control" placeholder="User ID" autofocus>
            <input name="password" type="password" class="form-control" placeholder="Password">
            <label class="checkbox">
                <?php if(!empty($msg)){ ?><p><?= $msg; ?></p><?php } ?>
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="">
                    Create an account
                </a>
            </div>

        </div>
    <?= form_close(); ?>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= base_url('assets_f') ?>/js/jquery.js"></script>
<script src="<?= base_url('assets_f') ?>/js/bootstrap.min.js"></script>
</body>
</html>
