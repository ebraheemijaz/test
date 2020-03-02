<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jetnetix">
    <meta name="keyword" content="Tutor Management System">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets_f/logo.png">
    <title>Admin @ Church Membership Management - Login</title>
    <link href="<?= base_url('assets_f') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets_f') ?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets_f') ?>/css/style-responsive.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<style>
    input {
        font-size:24px !important;
    }
    .logooo{
        width: 200px !important;
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
    }
    .form-signin{
        margin: 15px auto 0!important;
    }
</style>
</head>
<body class="login-body">
<div class="container">
<!--    <div class="col-md-offset-1">-->
        <?php $logo = $this->data->fetch('details', array('id' => 1)); ?>
        <img src="<?= base_url() ?>/assets_f/<?= $logo[0]['logo'] ?>" class="logooo img-responsive" />
<!--    </div>-->
    <div class="row"></div>
<!--    <div class="col-md-6">-->
        <?= form_open("admin/dologin",array('class'=>'form-signin')) ?>
        <h2 class="form-signin-heading" style="background-color:#539ff5!important;font-weight:bold">Admin Portal <br/>Membership Management System</h2>
        <div class="login-wrap">
            <input name="username" type="text" class="form-control" placeholder="Enter Email" autofocus>
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span style="float:left;"><input type="checkbox"/> Remember Me</span>
            <label class="checkbox">
                <?php if(!empty($msg)){ ?><p><?= $msg; ?></p><?php } ?>
                <span class="pull-right" style="margin-bottom: 10px">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label>
            <br/>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            <br/>
            <p style="text-align : center">
            <a href="<?= base_url(); ?>/TERMS OF USE.pdf" target="_blank" class="uk-float-left" download>Terms of Use</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?= base_url(); ?>/PRIVACY POLICY.pdf" target="_blank" class="uk-float-right" download>Privacy Policy</a>
            </p>
        </div>
        <?= form_close(); ?>
<!--    </div>-->
<div class="row">
    
</div>
</div>

<br/>
<br/>
<br/>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
            </div>
            <?= form_open('admin/forgotPwd'); ?>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<footer>
    <p style="text-align: center;font-weight:bold;">
        <?= date("Y"); ?> © <a target="_blank" href="//mmsonline.website">Membership Management System</a>. All Rights Reserved.
    </p>
</footer>
<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= base_url('assets_f') ?>/js/jquery.js"></script>
<script src="<?= base_url('assets_f') ?>/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
       $('input').val('');
    });
</script>
</body>
</html>

