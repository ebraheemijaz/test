<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-signin-client_id" content="667428527963-u21s5caeb2ja69ej723ajc652lrfaev0.apps.googleusercontent.com">

    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?= base_url('assets_f/logo.png') ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= base_url('assets_f/logo.png') ?>" sizes="32x32">
    <title>Membership Management System - Login</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <!-- uikit -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/uikit/css/uikit.almost-flat.min.css"/>
    <!-- altair admin login page -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/login_page.min.css" />
</head>
<body class="login_page">
    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar" style="width:160px;height:160px;background-image: url(<?= base_url('assets_f/logo.png') ?>);background-size: 100% 100%">
                    </div>
                </div>
                <?= form_open("home/changePassword",array('class'=>'form-signin')) ?>
                    <div class="uk-form-row">
                        <label for="login_username">Enter Password</label>
                        <input class="md-input" type="password" id="login_username" required  autocomplete="off" name="password1" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_username">Enter Password Again</label>
                        <input class="md-input" type="password" id="login_password" required name="password2" />
                        <p id="errorrrr" style="text-align:center;"><?php if(!empty($msg)){ ?><?= $msg; ?><?php } ?></p>
                    </div>
                    <div class="uk-margin-medium-top">
                        <button id="loginHereButton" class="md-btn md-btn-primary md-btn-block md-btn-large">Change</button>
                    </div>

                    <div class="uk-margin-top">
                        <span class="icheck-inline"></span>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
        <!--<div class="uk-margin-top uk-text-center">
            <a id="signup_form_show" href="#">Create an account</a>
        </div>-->
    </div>
    <script src="<?= base_url('assets_new') ?>/assets/js/common.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/uikit_custom.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/altair_admin_common.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/pages/login.min.js"></script>
    <script>
//        $(window).load(function(){
//            setTimeout(function(){
//                $('#login_password').attr('type','password');
//            },500);
//        });
        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName('html')[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
        function forgotPwd(){
            altair_helpers.content_preloader_show('md');
            $("#errorForget").css("display","none");
            var email = $("#login_email_reset").val();
            if(email == ""){
                $("#errorForget").html("Please Insert Valid Email Address");
                altair_helpers.content_preloader_hide();
            }else{
                $.post("<?= site_url('home/forgotPwd'); ?>",{email:email},function(e){
                    altair_helpers.content_preloader_hide();
                    if(e == "error"){
                        e = "Email not registered";
                    }else if(e == "sent"){
                        e = "An email sent to your email address"
                    }else{
                        e = "An Error Occurred";
                    }
                    $("#errorForget").html(e);
                    $("#errorForget").css("display","");
                });
            }
        }
        function validateCode(){
            var c = $("#codec").val();
            $.post("<?= site_url('home/ajax/validCode'); ?>",{code:c},function(e){
                console.log(e);
                if(e == "Invalid"){
                    $("#errorCode").css("display","");
                    $("#errorCode").html("Code Invalid Or Already Used");
                }else{
                    $("#regField").css("display","");
                    $("#codeFieldDiv").css("display","none");
                    //$("#codec").attr("readonly","");
                    //$("#val").css("display","none");
                }
            });
        }
        function checkPasswd(){
            var p1 = $("#register_password").val();
            var p2 = $("#register_password_repeat").val();
            if(p1 != ''){
                if(p1 != p2){
                    $("#doreg").attr("type","button");
                    $("#doreg").html("Passwords Doesn't Match");
                }else{
                    $("#doreg").attr("type","submit");
                    $("#doreg").html("Create");
                }
            }else{
                $("#doreg").attr("type","button");
                $("#doreg").html("Password Empty");
            }
        }
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var email = profile.getEmail();
            $.post("<?= site_url('home/ajaxLogin') ?>",{email:email},function(e){
                if(e == 'True'){
                    window.location.href = "<?= site_url('home'); ?>";
                }else{
                    signOut();
                    $("#errorrrr").html(e);
                }
            });
        }
        function onSignUp(googleUser) {
            var code = $("#codec").val();
            var profile = googleUser.getBasicProfile();
            var name = profile.getName();
            var email = profile.getEmail();
            $.post("<?= site_url('home/ajaxRegister') ?>",{code:code,email:email,fname:name},function(e){
                if(e == 'True'){
                    window.location.href = "<?= site_url('home'); ?>";
                }else{
                    signOut();
                    window.location.href = "<?= site_url('home'); ?>";
                    //$("#errorrrr").html(e);
                }
            });
        }
        function signOut(){
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });
        }
    </script>
    <script>
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {
                //testAPI();
                console.log("Connected");
            } else {
                document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
            }
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1451990008166435',
                cookie     : true,  // enable cookies to allow the server to access
                xfbml      : true,  // parse social plugins on this page
                version    : 'v2.8' // use graph api version 2.8
            });
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        };
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function testAPI() {
            FB.login();
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=id,name,email', function(response) {
                if (typeof response.id !== 'undefined') {
                    var email = response.id;
                    if(typeof response.email != 'undefined'){
                        email = response.email;
                    }
                    $.post("<?= site_url('home/ajaxLogin') ?>",{email:email},function(e){
                        console.log(e);
                        if(e == 'True'){
                            window.location.href = "<?= site_url('home'); ?>";
                        }else{
                            signOut();
                            $("#errorrrr").html(e);
                        }
                    });
                }
            });
        }
        function testAPIreg() {
            FB.login();
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=id,name,email', function(response) {
                if (typeof response.id !== 'undefined') {
                    var email = response.id;
                    if(typeof response.email != 'undefined'){
                        email = response.email;
                    }
                    var code = $("#codec").val();
                    var name = response.name;

                    $.post("<?= site_url('home/ajaxRegister') ?>",{code:code,email:email,fname:name},function(e){
                        if(e == 'True'){
                            window.location.href = "<?= site_url('home'); ?>";
                        }else{
                            signOut();
                            window.location.href = "<?= site_url('home'); ?>";
                            //$("#errorrrr").html(e);
                        }
                    });
                }
            });
        }
    </script>
    <script>
        <?php if(isset($_COOKIE['mmsOnline1231'])){ ?>
        $("#loginHereButton").click();
        <?php } ?>
    </script>
</body>
</html>