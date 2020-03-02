<?php $logo = $this->data->fetch('details', array('id' => 1)); ?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" style="background: #444;"> <!--<![endif]-->
<head>
    <link rel="manifest" href="/manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  console.log(OneSignal);
  OneSignal.push(function() {
    OneSignal.init({
      appId: "5bd64a70-48b9-456e-ac3e-aef92697dd7a",
    });
  });
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-signin-client_id" content="667428527963-u21s5caeb2ja69ej723ajc652lrfaev0.apps.googleusercontent.com">

    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?= base_url('assets_f/'.$logo[0]['logo']) ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= base_url('assets_f/'.$logo[0]['logo']) ?>" sizes="32x32">
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/intl-tel/build/css/intlTelInput.css">
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/intl-tel/build/css/demo.css">
    <title>Membership Management System - Login</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <!-- uikit -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/bower_components/uikit/css/uikit.almost-flat.min.css"/>
    <!-- altair admin login page -->
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/login_page.min.css" />


<!--    <script src="https://ucarecdn.com/libs/widget/3.1.2/uploadcare.full.min.js" charset="utf-8"></script>-->
<!--    <script>-->
<!--        UPLOADCARE_PUBLIC_KEY = '2bf1b53f7fa658553ab0';-->
<!--    </script>-->
    <style>
        input[type='password'], input[type='text'], input[type='email'], input[type='tel']{
            background: white !important;
            border-radius: 5px !important;
        }
        label{
            font-weight: bold;
        }
        .heading_a{
            color:white !important;
        }
        .uk-close:after{
            color:white !important;
        }

        ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
            font-weight: normal;
        }
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
            font-weight: normal;
            opacity:  1;
        }
        ::-moz-placeholder { /* Mozilla Firefox 19+ */
            font-weight: normal;
            opacity:  1;
        }
        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            font-weight: normal;
        }
        ::-ms-input-placeholder { /* Microsoft Edge */
            font-weight: normal;
        }
        .field-icon {
          float: right;
          margin-left: -25px;
          margin-top: -25px;
          position: relative;
          z-index: 2;
        }
        #eye {
            position:absolute;
            bottom:2px;
            right:5px;
            width:24px;
            height:24px;
        }
        
        #input_container {
            position:relative;
            /*padding:0 0 0 20px;*/
            /*margin:0 20px;*/
            /*background:/#ddd;*/
            /*direction: rtl;*/
            /*width: 200px;*/
        }
        #login_password {
            height:auto;
            margin:0;
            padding-right: 30px;
            width: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body class="login_page">
    <div id="preloader"></div>
    <div class="login_page_wrapper">
        <div class="md-card1" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar" style="width:160px;height:160px;background-image: url(<?= base_url('assets_f/'.$logo[0]['logo']) ?>);background-size: 100% 100%">
                    </div>
                </div>
                <?= form_open("home/dologin",array("autocomplete"=>"off")) ?>
                    <div class="uk-form-row">
<!--                        <label for="login_username">Email Address</label>-->
                        <input placeholder="Email Address Or Username" class="md-input" type="text" id="login_username" value="<?= (isset($_COOKIE['mmsOnline1231'])) ? $_COOKIE['mmsOnline1231'] : ''; ?>" autocomplete="off" name="email" />
                    </div>
                    <div class="uk-form-row" id="passwordDiv" style="display: block;">
                        <div class="uk-inline" id="input_container">
                            <input class="md-input" placeholder="Password" type="password" id="login_password" value="<?= (isset($_COOKIE['mmsOnline1232'])) ? $_COOKIE['mmsOnline1232'] : ''; ?>" name="password" />
                            <input type="hidden" name="ipAddress" value="-" >
                            <input type="hidden" name="geo_country" value="-" >
                            <input type="hidden" name="country_code" value="-" >
                            <!--<a type="button" id="eye" class="uk-icon-eye" style="float: right;">-->
                                <div class="uk-icon-eye" id="eye" style="float: right";></div>
                            <!--</a>-->
                        </div>
                        <p id="errorrrr" style="text-align:center;color:white;"><?php if(!empty($msg)){ ?><?= $msg; ?><?php } ?></p>
                    </div>
                    <span id="errorEmailLogin" style="color: red;"></span>
                    <div class="uk-margin-medium-top">
                        <span class="icheck-inline">
                            <input type="checkbox" name="remember" value="1" id="login_page_stay_signed" data-md-icheck />
                            <label for="login_page_stay_signed"  class="inline-label" style="color:white">Stay signed in</label>
                        </span>
                        <button id="loginHereButton" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
                    </div>
                    <div class="uk-grid uk-grid-width-1-2 uk-grid-small uk-margin-top">

<!--                        <div><a href="#" onclick="testAPI();" class="md-btn md-btn-block md-btn-facebook" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Facebook"><i class="uk-icon-facebook uk-margin-remove"></i></a></div>-->
                        <div>
<!--                            <div onclick="gS();" class="md-btn md-btn-block md-btn-gplus" data-onsuccess="onSignIn" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Google+"><i class="uk-icon-google-plus uk-margin-remove"></i></div>-->
<!--                            <div id="testingGoogle"></div>-->
<!--                                <div style="" data-onsuccess="onSignIn" class="g-signin2" data-theme="dark"></div>-->
                            <script>

                                function gS(){
                                    $(".abcRioButtonContentWrapper").click();
                                }
                            </script>
                        </div>
                    </div>
                    <div class="uk-margin-top">
<!--                        <a href="#" id="login_help_show" class="uk-float-right">Having Trouble?</a>-->

                        <p style="text-align: center">
                            <span class="icheck-inline">
                                <a href="#" id="password_reset_show">Forgot Password?</a>
                            </span>
                        </p>
                        <p style="text-align: center">
                            <span  id="signup_form_show" href="#" class="icheck-inline">
                                <a href="" style="color: white; text-decoration: underline;">Create Account</a><br/><small style="font-size: 70%; text-decoration: none; color: white;"> (A validation code is required from the church office to sign up)</small>
                            </span>
                        </p>
                        <p style="text-align: center">
                            <span class="icheck-inline">
                                <a href="<?= base_url(); ?>/TERMS OF USE.pdf" target="_blank" class="uk-float-left" download>Terms of Use</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?= base_url(); ?>/PRIVACY POLICY.pdf" target="_blank" class="uk-float-right" download>Privacy Policy</a>
                            </span>
                        </p>
                        <p style="text-align: center">
                            <span class="icheck-inline">
                                <a data-step="3" data-intro="Click here to create new request" data-uk-modal="{target:'#newModal'}">Contact Us</a>
                            </span>
                        </p>

                    </div>
                <?= form_close() ?>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>

                <h2 class="heading_b uk-text-success" style="color:white !important;">Can't create my account?</h2>
                <p style="color:white">To become a member, ensure you have obtained a valid code from your local church administration office to create an account.The validation code is essential to begin your membership registration process.</p>
                <h2 class="heading_b uk-text-success" style="color:white !important;">Can't log in?</h2>
                <p style="color:white">Here is a quick information to get you back in to your account as quickly as possible. </p>
                <p style="color:white">First, try the easiest thing: if you remember your password but it isn’t working, make sure your Caps Lock is turned off, and your access email is spelt correctly, and then try again.</p>
                <p style="color:white">If your password still isn’t working, it’s time to reset your password.</p>
            </div>

            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <?= form_open('home/forgotPwd'); ?>
                    <div class="uk-form-row">
<!--                        <label for="login_email_reset">Your email address</label>-->
                        <input class="md-input" type="email" placeholder="Your Email Address" id="login_email_reset" name="email" />
                        <p style="text-align: center;display:none;color:white;" id="errorForget"></p>
                    </div>
                    <h4 id="successMsg" style="color: white; display:block; text-align: center;"></h4>
                    <div class="uk-margin-medium-top">
                        <button type="button" onclick="forgotPwd()" id="forgotPassword" class="md-btn md-btn-primary md-btn-block">Reset password</button>
                    </div>
                </form>

            </div>
            <div class="md-card-content large-padding" id="register_form" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
                <?= form_open_multipart('home/doRegister') ?>
                    <div class="uk-form-row" id="codeFieldDiv">
<!--                        <label for="register_username">Enter Validation Code</label>-->
                        <input class="md-input" placeholder="Enter Validation Code" type="text" id="codec" name="code" />
                        <p id="errorCode" style="text-align: center;color:white;"></p>
                        <button type="button" onclick="validateCode()" id="val" class="md-btn md-btn-info">Validate</button>
                        <p style="text-align: center">
                            <span  id="login_help_show" href="#" class="icheck-inline">
                                <a href="" class="uk-float-right">Having Trouble?</a>
                            </span>
                        </p>
                    </div>
                    <div id="regField" style="display: none;">
                        <!--<div class="uk-grid uk-grid-width-1-2 uk-grid-small uk-margin-top">-->
                            <!--<div><a href="#" onclick="testAPIreg();" class="md-btn md-btn-block md-btn-facebook" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Facebook"><i class="uk-icon-facebook uk-margin-remove"></i></a></div>-->
                            <!--<div class="g-signin2" data-onsuccess="onSignUp"></div>-->
                            <!--<div><a href="#" class="md-btn md-btn-block md-btn-gplus" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Google+"><i class="uk-icon-google-plus uk-margin-remove"></i></a></div>-->
                        <!--</div>-->
                        <!--<hr/>-->
                        <!--<p style="text-align: center !important; font-weight: bold">OR</p>-->
                        <!--<hr/>-->
                        <div class="uk-form-row">
                            <label for="register_username" style="color: #fff; font-size: 15px; font-weight: bold;">Title</label><span style="color: red;"> *</span><br/>
                            <select id="title" class="md-input" name="title" required>
                                <option value="">Select</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Elder">Elder</option>
                                <option value="Pastor">Pastor</option>
                                <option value="Prophet">Prophet</option>
                                <option value="Prophetess">Prophetess</option>
                                <option value="Reverend">Reverend</option>
                                <option value="Deacon">Deacon</option>
                                <option value="Deaconess">Deaconess</option>
                                <option value="Dr">Dr</option>
                                <option value="Professor">Professor</option>
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <label for="register_username" style="color: #fff; font-size: 15px; font-weight: bold;">First Name</label><span style="color: red;"> *</span><br/>
                            <input class="md-input" type="text" id="register_username" name="fname" required/>
                        </div>
                        <div class="uk-form-row">
                            <label for="register_username" style="color: #fff; font-size: 15px; font-weight: bold;">Last Name</label><span style="color: red;"> *</span><br/>
                            <input class="md-input" type="text" id="register_username" name="lname" required/>
                        </div>
                        <div class="uk-form-row">
                            <label for="register_username" style="color: #fff; font-size: 15px; font-weight: bold;">Email</label><span style="color: red;"> *</span><br/>
                            <input class="md-input" type="email" name="email" id="email" onkeyup="validateEmailSignup()" onblur="validateEmailSignup()" required/>
                            <p id="errorEmail" style="text-align: center; color: red;"></p>
                        </div>
                        <div class="uk-form-row">
                            <label for="register_username" style="color: #fff; font-size: 15px; font-weight: bold;">Mobile No</label><span style="color: red;"> *</span><br/>
                            <input class="md-input mobileNo" style="width: 160%;" type="tel" onblur="validateMobile()" onkeypress='validate(event)' pattern="\d*" id="mobileNo" placeholder="Put your mobile number without '0'" required/>
                            <input class="md-input mobileNo" type="hidden" id="phone1" name="mobileNo"/>
                            <p id="errorMobile" style="text-align: center; color : red;"></p>
                        </div>
                        <div class="uk-form-row">
                            <label for="register_username" style="color: #fff; font-size: 15px; font-weight: bold;">Gender</label><span style="color: red;"> *</span><br/>
                            <select id="gender" class="md-input" name="gander" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="uk-form-row">

                            <div id="file_upload-drop" class="uk-file-upload">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="blah" alt=""/>
                                <a class="uk-form-file md-btn">Select Profile Image<span style="color: red;"> *</span>
                                    <input id="file_upload-select123" type="file" required name="image">
                                </a>
                            </div>
                            <div class="uk-form-row">
                                <button type="button" class="btnRotate" value="0" id="left" onClick="rotateImageLeft();" style="float: left;background-color: transparent; border: transparent;"><img src="<?= base_url(); ?>assets_f/img/arrow/left.png" style="width: 28px;"/></button>
                                <button type="button" class="btnRotate" value="0" id="right" onClick="rotateImageRight();" style="float: right;background-color: transparent; border: transparent;"><img src="<?= base_url(); ?>assets_f/img/arrow/right.png" style="width: 28px;"/></button>
                            </div>
                            <div id="file_upload-progressbar" class="uk-progress uk-hidden">
                                <div class="uk-progress-bar" style="width:0">0%</div>
                            </div>
<!--                            <input type="file" accept="image/*" required name="image"/>-->
<!--                            <input type="hidden" role="uploadcare-uploader" data-images-only />-->
                        </div>

                        <div class="uk-form-row">
                            <label  style="color: #fff; font-size: 15px; font-weight: bold;">Birthday</label><span style="color: red;"> *</span><br/>
                            <div class="uk-grid" data-uk-grid-margin>
                                <!--<div class="uk-width-medium-1-3">-->
                                <!--    <select name="birth_year" class="md-input" id="birth_year" required>-->
                                <!--        <option value="">Select</option>-->
                                <!--        <?php for($i=(date('Y')-13);$i>=1970;$i--){ ?>-->
                                <!--            <option value="<?= $i ?>"><?= $i ?></option>-->
                                <!--        <?php } ?>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <div class="uk-width-medium-1-2">
                                    <select name="birth_month" id="month" class="md-input" required>
                                        <option value="">Select Month</option>
                                        <option value='1'>January</option>
                                        <option value='2'>February</option>
                                        <option value='3'>March</option>
                                        <option value='4'>April</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>August</option>
                                        <option value='9'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <select name="birth_date" class="md-input" id="birth_date" required>
                                        <option value="">Select Day</option>
                                        <?php for($i=1;$i<=31;$i++){ ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <label style="color: #fff; font-size: 15px; font-weight: bold;">Age Group</label><span style="color: red;"> *</span><br/>
                            <select name="age_group" class="md-input" required>
                                <option value="">Select Age Bracket</option>
                                <!--<option value="9"> 0 - 9 </option>-->
                                <option value="18"> 13 - 18 </option>
                                <option value="29"> 19 - 29 </option>
                                <option value="39"> 30 - 39 </option>
                                <option value="49"> 40 - 49 </option>
                                <option value="69"> 50 - 69 </option>
                                <option value="70">Above 70</option>
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <label style="color: #fff; font-size: 15px; font-weight: bold;">Member of Church Since</label><span style="color: red;"> *</span><br/>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <select name="member_since_month" id="member_since_month" class="md-input" required>
                                        <option value="">Select Month</option>
                                        <option value='1'>January</option>
                                        <option value='2'>February</option>
                                        <option value='3'>March</option>
                                        <option value='4'>April</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>August</option>
                                        <option value='9'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <select name="member_since_year" class="md-input" id="member_since_year" required>
                                        <option value="">Select Year</option>
                                        <?php for($i=1980;$i<=date('Y');$i++){ ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="uk-form-row">
                            <label style="color: #fff; font-size: 15px; font-weight: bold">Marital Status</label><span style="color: red;"> *</span><br/>
                            <select name="maritalStatus" id="marital" class="md-input" required>
                                <option value="">Marital Status <span style="color: red;">*</span></option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widow">Widow</option>
                                <option value="widower">Widower</option>
                                <!--<option value="director">Director</option>-->
                                <!--<option value="student">Student</option>-->
                                <!--<option value="retired">Retired</option>-->
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <label for="address" style="color: #fff; font-size: 15px; font-weight: bold">Address Line 1</label><span style="color: red;"> *</span><br/>
                            <input class="md-input" type="text" name="address" id="address" value="<?= $v['address'] ?>" required placeholder="Enter Address Line 1"/>
                        </div>
                        
                        <div class="uk-form-row">
                            <label for="address2" style="color: #fff; font-size: 15px; font-weight: bold;">Address Line 2</label><br/>
                            <input class="md-input" type="text" id="address2" name="address2" value="<?= $v['address2'] ?>" placeholder="Enter Address Line 2"/>
                        </div>
                        
                        <div class="uk-form-row">
                            <label style="color: #fff; font-size: 15px; font-weight: bold;">Town</label><span style="color: red;"> *</span><br/>
                            <input class="md-input" type="text" name="town" id="town" value="" placeholder="Enter Town" required/>
                        </div>
                        
                        <div class="uk-form-row">
                            <label style="color: #fff; font-size: 15px; font-weight: bold;">Postal Code</label><span style="color: red;"> *</span><br/>
                            <input class="md-input" type="text" name="poatalCode" id="poatalCode" value="" placeholder="Enter Postal Code" required/>
                        </div>
                        <h2 class="heading_a uk-margin-medium-bottom" style="color: #42f483!important;margin-top: 30px;">Optional Details (Child and Grand Child)</h2>
                        <div class="uk-form-row">
                            <h3 class="full_width_in_card heading_c" style="color: #fff; font-size: 15px; font-weight: bold;">
                                Enter your Child's details below
                            </h3>
                            <span class="md-btn md-btn-danger" onclick="addChild()">Add +</span>
                            <div id="child">
                            </div>
                            <br/>
                            <?php $ci = 0; ?>
                            <script> ci = <?= $ci; ?>; </script>
                        </div>
                        <div class="uk-form-row">
                            <h3 class="full_width_in_card heading_c" style="color: #fff; font-size: 15px; font-weight: bold;">
                                Enter your Grand Child's details below
                            </h3>
                            <span class="md-btn md-btn-danger" onclick="addgrandChild()">Add +</span>
                            <div id="grandChild">
                            </div>
                            <br/>
                            <?php $ci = 0; ?>
                            <script> gci = <?= $ci; ?> </script>
                        </div>
                        <div class="uk-form-row">
                            <label for="register_password" style="color: #fff; font-size: 15px; font-weight: bold;">Password</label><span style="color: red;"> *</span><br/>
                            <input class="md-input" type="password" onkeyup="checkPasswd()" required id="register_password" />
                        </div>
                        <div class="uk-form-row">
                            <label for="register_password_repeat" style="color: #fff; font-size: 15px; font-weight: bold;">Repeat Password</label><span style="color: red;"> *</span><br/>
                            <input class="md-input" type="password" onkeyup="checkPasswd()" required id="register_password_repeat" name="password" />
                            <label id="doreg1"></label>
                        </div>
                        <!--<div class="uk-form-row">-->
                        <!--    <label for="employeeStatus" style="color: #fff; font-size: 15px; font-weight: bold;">Employee Status</label>-->
                        <!--    <input type="checkbox" class="md-input" required name="worker" id="worker" value="worker"/> <label style="color: #fff;">Worker</label>-->
                        <!--    <input type="checkbox" class="md-input" required name="nonworker" id="nonworker" value="nonworker"/> <label style="color: #fff;">Non Worker</label>-->
                        <!--    <input type="checkbox" class="md-input" name="hod" id="hod" value="hod" /> <label style="color: #fff;">H.O.D.</label>-->
                        <!--</div>-->
                        <div class="uk-form-row">
                            <span class="icheck-inline">
                                <input type="checkbox" name="first_time" value="yes" id="login_page_stay_signed" data-md-icheck />
                                <label for="login_page_stay_signed"  class="inline-label" style="color: #fff; font-size: 15px; font-weight: bold;">Is this your first time in this church?</label>
                            </span>
                        </div>
                        <div class="uk-margin-medium-top">
                            <button type="button" id="doreg" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign Up</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        
        <div id="newModal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h1>Contact Us</h1>
        <?= form_open("home/contactUs",array('class'=>"form-horizontal", 'id' => 'contactUs', "onSubmit"=>"document.getElementById('submit').disabled=true; document.getElementById('newModal').hide();")) ?>
        <div class="form-group">
            Name:
            <input type="text" required name="contactName" id="contactName" class="md-input"/>
        </div>
        <br/>
        <div class="form-group">
            <!--Domain:-->
            <input type="hidden" name="contactDomain" id="contactDomain" class="md-input" value="<?= base_url() ?>"/>
        </div>
        <br/>
        <div class="form-group">
            Phone Number:
            <input type="text" required name="contactPhoneNo" id="contactPhoneNo" minlength="10" maxlength="12" class="md-input" />
        </div>
        <br/>
        <div class="form-group">
            Email:
            <input type="email" required name="contactEmail" id="contactEmail" class="md-input" />
        </div>
        <br/>
        <div class="form-group">
            Reason:
            <select name="contactReason" id="contactReason" class="md-input" required>
                <option value="">Select Reason <span style="color: red;">*</span></option>
                <option value="Request New Passcode.">Request New Passcode</option>
                <option value="Trouble with logging into my account.">Trouble with logging into my account</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <br/>
        <div class="form-group" id="otherTextDiv" style="display: none;">
            <input type="text" placeholder="Write other reason here" id="otherText" class="md-input"/>
        </div>
        <br/>
        <div class="form-group">
            Description:
            <textarea name="desc" id="desc" class="md-input" placeholder="Briefly describe what you want resolved" maxlength="300"></textarea>
        </div>
        <br/>
        <div class="form-group">
            <input type="submit" id="submit" class="md-btn md-btn-success" value="Request Now!"/>
            <button class="md-btn md-btn-danger uk-modal-close uk-close">Close</button>
        </div>
        </form>
    </div>
</div>
    </div>
    <footer>
    <p style="text-align: center;font-weight:bold;color:white;">
        <?= date("Y"); ?> © <a target="_blank" href="//mmsonline.website">Membership Management System</a>. All Rights Reserved.
    </p>
</footer>
    <script src="<?= base_url('assets_new') ?>/assets/js/common.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/uikit_custom.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/altair_admin_common.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/pages/login.min.js"></script>
    <script src="<?= base_url('assets_f') ?>/intl-tel/build/js/intlTelInput.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/pages/forms_file_upload.min.js"></script>
    <script>
    // $(function(){
    //     $('#contactUs').on('submit', function(){
    //         var phoneNo = $('#contactPhoneNo').val();
    //         var desc = $('#desc').val();
    //         if(phoneNo.length >= 10 || phoneNo.lenght <= 12){
    //             if(desc >= 10){
    //                 return true;
    //             }else{
    //                 alert('Description can\'t be morethan then 10.');
    //                 return false;
    //             }
    //         }else{
    //             alert('Phone number can\'t be less then 10 or more than 12 letters.');
    //             return false;
    //         }
    //     });
    // });
    //Code for Hide and show password
        $(window).load(
        function (){
            url = "https://api.ipdata.co/?api-key=b855ce41df7705ae2ffaedbd855ef278d65cf38ba3d6a31d5778b043"
            $.getJSON(url, function(data){
                var ipadreess, country_name, city 
                ipadreess = data.ip || "-"
                country_name = data.country_name || "-"
                city = data.city || "-"
                $('input[name=ipAddress]').val(ipadreess)
                $('input[name=geo_country]').val(country_name)
                $('input[name=country_code]').val(city)
                
            })
        })
        function show() {
            var p = document.getElementById('login_password');
            p.setAttribute('type', 'text');
        }
        
        $('#worker').click(function(){
            if($(this). prop("checked") == true){
                $('#nonworker').attr('disabled', true);
                $('#nonworker').attr('required', false);
            }else{
                $('#nonworker').attr('disabled', false);
                $('#nonworker').attr('required', true);
            }
        });
        
        $('#nonworker').click(function() {
            if($(this).prop('checked') == true) {
                $('#worker').attr('disabled', true);
                $('#hod').attr('disabled', true);
                $('#worker').attr('required', false);
                $('#hod').attr('required', false);
            }else{
                $('#worker').attr('disabled', false);
                $('#hod').attr('disabled', false);
                $('#worker').attr('required', true);
                $('#hod').attr('required', true);
            }
        });
        
        
        
        
        $('#contactReason').on('change', function(){
            $reason = $(this).val(); 
            if($reason == "Others"){
                $('#otherTextDiv').show();
                $('#otherText').attr('name', 'otherText');
            }else{
                $('#otherTextDiv').hide();
                $('#otherText').attr('name', '');
            }
        });
        function removechild(id){
            $("#ChildField"+id).remove();
        }
        
        function removeGrand(id){
            $("#grandChildField"+id).remove();
        }
        function addChild(){
        var parentAge = "<?= $v['age_group'] ?>";
        var child = "<div id='ChildField"+ci+"' style='padding: 15px 15px;border:1px #e8e8e8 solid'> " +
            "<a onclick='removechild("+ ci +")'>&times;</a> " +
            "<div class='row'></div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'  style='color: #fff; font-size: 15px; font-weight: bold;'>First Name </label> " +
            "<input type='text' class='md-input' name='child["+ci+"][fname]'> " +
            "</div> " +

            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Last Name </label> " +
            "<input type='text' class='md-input' name='child["+ci+"][lname]'> " +
            "</div> " +
            "</div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Birth Month</label> " +
            "<select class='md-input' onchange='childDay("+ci+")' id='childm"+ci+"' name='child["+ci+"][month]'> ";
        child += "<option value='1'>January</option> " +
        "<option value='2'>February</option> " +
        "<option value='3'>March</option> " +
        "<option value='4'>April</option> " +
        "<option value='5'>May</option> " +
        "<option value='6'>June</option> " +
        "<option value='7'>July</option> " +
        "<option value='8'>August</option> " +
        "<option value='9'>September</option> " +
        "<option value='10'>October</option> " +
        "<option value='11'>November</option> " +
        "<option value='12'>December</option>";
        child += "</select>" +
        "</div> " +
        "<div class='uk-width-medium-1-2'>" +
        "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Birth Day</label> " +
        "<select class='md-input' id='childd"+ci+"' name='child["+ci+"][day]'> ";
        for(var i = 1; i<=31;i++){
            child += "<option value='"+i+"'>"+i+"</option>";
        }
        child += "</select>" +
        "</div> " +
        "</div>" +
        "<div class='row'></div> </br>" +
        "<div class='col-md-6'> "+
        "<label for='user_edit_age_group_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Age Group</label>" +
        "<select class='md-input' id='' name='child["+ci+"][age_group]'> "+
        "<option value=''>Select Age Group</option>"+
        "<option value='9'>0 - 9</option>"+
        "<option value='12'>10 - 12</option>"+
        "<option value='18'>13 - 18</option>"+
        "<option value='29'>19 - 29</option>"+
        "<option value='39'>30 - 39</option>"+
        "<option value='49'>40 - 49</option>"+
        "<option value='69'>50 - 69</option>"+
        // "<option value='70'>Above 70</option>"+
        "</select>"+
        "</div>" +
        "<h3 class='full_width_in_card heading_c' style='color: #fff; font-size: 15px; font-weight: bold;'>"+
            "Gender"+
        "</h3>"+
        "<div class='col-md-6'> " +
        "<div class='radios'> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-01' style='color: #fff; font-size: 15px; font-weight: bold;'> " +
        "<input name='child["+ci+"][gender]' id='radio-01' value='male' type='radio' /> <span style='margin-left: -64%;'>Male</span> " +
        "</label> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-02' style='color: #fff; font-size: 15px; font-weight: bold;'> " +
        "<input name='child["+ci+"][gender]' id='radio-02' value='female' type='radio' /> <span style='margin-left: -64%;'>Female</span> " +
        "</label> " +
        "</div> " +
        "</div> " +
        "<div class='row'></div> </br>" +
        "<div class='uk-grid' data-uk-grid-margin> " +
        "<div class='uk-width-medium-1-2'>" +
        "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Child Email</label> " +
        "<p  style='color: #fff; font-size: 15px; font-weight: bold;'><input onchange='cchildEmail("+ci+")' id='cchildEmail"+ci+"' type='checkbox'><br/>Enter Child Email or tick box to enter your own</p>" +
        "<input type='email' class='md-input' name='child["+ci+"][email]' id='cchildEmailval"+ci+"' required placeholder='Enter Email' > " +
        "</div> " +

        "<div class='uk-width-medium-1-2'>" +
        "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Child Mobile</label> " +
        "<p><input onchange='cchildMobilee("+ci+")' id='cchildMobilec"+ci+"' type='checkbox'><span  style='color: #fff; font-size: 15px; font-weight: bold;'><br/>Enter Child Mobile or tick box to enter your own</span></p>" +
        "<input type='tel' class='md-input' name='child["+ci+"][mobile]' id='cchildMobileval"+ci+"' required placeholder='Enter Mobile' > " +
        "</div> " +
        "</div> " +
        "</div> " +
        "</div>" +
        "<hr/><div class='row'></div>";

        $("#child").prepend(child);
        ci++;
    }
    
        function addgrandChild(){
        console.log("["+gci+"]");
        var gchild = "<div id='grandChildField"+gci+"' style='padding: 15px 15px;border:1px #e8e8e8 solid'>" +
            "<a onclick='removeGrand("+ gci +")'>&times;</a> " +
            "<div class='row'></div> " +


            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>First Name</label> " +
            "<input type='text' class='md-input' name='grandChild["+gci+"][fname]'> " +
            "</div> " +

            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Last Name</label> " +
            "<input type='text' class='md-input' name='grandChild["+gci+"][lname]'> " +
            "</div> " +
            "</div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label style='color: #fff; font-size: 15px; font-weight: bold;'>Birth Month</label>"+
            "<select class='md-input' onchange='gchildDay("+gci+")' id='gchildm"+gci+"' name='grandChild["+gci+"][month]'> ";
            gchild += "<option value='1'>January</option> " +
            "<option value='2'>February</option> " +
            "<option value='3'>March</option> " +
            "<option value='4'>April</option> " +
            "<option value='5'>May</option> " +
            "<option value='6'>June</option> " +
            "<option value='7'>July</option> " +
            "<option value='8'>August</option> " +
            "<option value='9'>September</option> " +
            "<option value='10'>October</option> " +
            "<option value='11'>November</option> " +
            "<option value='12'>December</option>";
            gchild += "</select>" +
            "</div> " +

            "<div class='uk-width-medium-1-2'>" +
            "<label style='color: #fff; font-size: 15px; font-weight: bold;'>Birth Day</label>"+
            "<select class='md-input' id='gchildd"+gci+"' name='grandChild["+gci+"][day]'> ";
            for(var i = 1; i<=31;i++){
                gchild += "<option value='"+i+"'>"+i+"</option>";
            }
            gchild += "</select>" +
            "</div> " +
            "</div> " +

            "<div class='row'></div> <br/> " +
            "<div class='uk-grid' data-uk-grid-margin> "+
            "<div class='uk-width-medium-1-2'>"+
            "<label class='' style='color: #fff; font-size: 15px; font-weight: bold;'>Age Group</label>"+
            "<select class='md-input' id='' name='grandChild["+gci+"][age_group]'> "+
            "<option value='' style='color: #fff; font-size: 15px; font-weight: bold;'>Select Age Group</option>"+
            "<option value='9'>0 - 9</option>"+
            "<option value='12'>10 - 12</option>"+
            "<option value='18'>13 - 18</option>"+
            "<option value='29'>19 - 29</option>"+
            "<option value='39'>30 - 39</option>"+
            "<option value='49'>40 - 49</option>"+
            // "<option value='69'>50 - 69</option>"+
            // "<option value='70'>Above 70</option>"+
            "</select>"+
            "</div>"+
            "</div>"+
            "<h3 class='full_width_in_card heading_c' style='color: #fff; font-size: 15px; font-weight: bold;'>"+
                "Gender"+
            "</h3>"+
            // "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='col-md-6'>" +
            "<div class='radios'> " +
            "<label class='label_radio col-lg-6 col-sm-6' for='radio-01' style='color: #fff; font-size: 15px; font-weight: bold;'> " +
            "<input name='grandChild["+gci+"][gender]' id='radio-01' value='male' type='radio' /> <span style='margin-left: -64%;'>Male</span> " +
            "</label> " +
            "<label class='label_radio col-lg-6 col-sm-6' for='radio-02' style='color: #fff; font-size: 15px; font-weight: bold;'> " +
            "<input name='grandChild["+gci+"][gender]' id='radio-02' value='female' type='radio' /> <span style='margin-left: -64%;'>Female</span> " +
            "</label> " +
            // "</div>" +

            "</div>" +
            "</div>" +


            "<div class='row'></div> <br/>" +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Grand Child Email</label> " +


            "<p><input onchange='gchildEmail("+gci+")' id='gchildEmail"+gci+"' type='checkbox'><span  style='color: #fff; font-size: 15px; font-weight: bold;'><br/>Enter Grand Child Email or tick box to enter your own</span></p>" +
            "<input type='email' class='md-input' name='grandChild["+gci+"][email]' id='gchildEmailval"+gci+"' required placeholder='Enter Email' > " +
            "</div> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control' style='color: #fff; font-size: 15px; font-weight: bold;'>Grand Child Mobile</label> " +


            "<p><input onchange='gchildMobilee("+gci+")' id='gchildMobilec"+gci+"' type='checkbox'><span  style='color: #fff; font-size: 15px; font-weight: bold;'><br/>Enter Grand Child Mobile or tick box to enter your own</span></p>" +
            "<input type='tel' class='md-input' name='grandChild["+gci+"][mobile]' id='gchildMobileval"+gci+"' required placeholder='Enter Mobile' > " +
            "</div> " +
            "</div> " +


            "</div>" +
            "<hr/><div class='row'></div>";
        $("#grandChild").prepend(gchild);
        gci++;
    }
    
    function gchildEmail(i){
        if($('#gchildEmail'+i)[0].checked){
            var email = $("#email").val();
            $("#gchildEmailval"+i).val(email);
        }else{
            $("#gchildEmailval"+i).val("");
        }
    }
    function gchildMobilee(i){
        if($('#gchildMobilec'+i)[0].checked){
            var email = $("#phone1").val();
            $("#gchildMobileval"+i).val(email);
        }else{
            $("#gchildMobileval"+i).val("");
        }
    }

    function cchildEmail(i){
        if($('#cchildEmail'+i)[0].checked){
            var email = $("#email").val();
            $("#cchildEmailval"+i).val(email);
        }else{
            $("#cchildEmailval"+i).val('');
        }
    }
    function cchildMobilee(i){
        if($('#cchildMobilec'+i)[0].checked){
            var email = $("#phone1").val();
            $("#cchildMobileval"+i).val(email);
        }else{
            $('#cchildMobileval'+i).val('');
        }
    }
        
        function hide() {
            var p = document.getElementById('login_password');
            p.setAttribute('type', 'password');
        }
        
        var pwShown = 0;
        
        document.getElementById("eye").addEventListener("click", function () {
            if (pwShown == 0) {
                pwShown = 1;
                show();
                $('#eye').attr('class', 'uk-icon-eye-slash');
            } else {
                pwShown = 0;
                hide();
                $('#eye').attr('class', 'uk-icon-eye');
            }
        }, false);
    </script>
    <script>

        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName('html')[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
        function validateEmail(email) {
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
        }
        function forgotPwd(){
            altair_helpers.content_preloader_show('md');
            $('#forgotPassword').attr('disabled', true);
            $("#errorForget").css("display","none");
            var email = $("#login_email_reset").val();
            if(email == ""){
                $('#errorForget').css('display', 'block');
                $("#errorForget").html("Please Insert Valid Email Address");
                altair_helpers.content_preloader_hide();
            }else{
                var valid = validateEmail(email);
                if(!validateEmail(email)){
                    $('#errorForget').css('display', 'block');
                    $("#errorForget").html("Not a validate Email Address.");
                    altair_helpers.content_preloader_hide();
                }else{
                    $.post("<?= site_url('home/forgotPwd'); ?>",{email:email},function(e){
                        if(e == 'sent'){
                            altair_helpers.content_preloader_hide();
                            $('#successMsg').html('Password reset notification is sent to your email');
                            $('#successMsg').css('color', '#42f49b');
                            $('#forgotPassword').attr('disabled', false);
                        }
                        if(e == 'error'){
                            altair_helpers.content_preloader_hide();
                            $('#successMsg').html('Email ID is not present in our database.');
                            $('#successMsg').css('color', '#f45341');
                            $('#forgotPassword').attr('disabled', false);
                        }
                        // if(e == "error"){
                        //     e = "Email not registered";
                        // }else if(e == "sent"){
                        //     e = "Please Check your email to reset your password"
                        // }else{
                        //     e = "An Error Occurred";
                        // }
                        // $("#errorForget").html(e);
                        // $("#errorForget").css("display","");
                    });
                }
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
        
        function validateMobile(){
            var mobile = $("#phone1").val();
            if(mobile != ""){
                $.post("<?= site_url('home/ajax/validateMobile'); ?>", {mobile:mobile}, function(e){
                    if(e == "Valid"){
                        $("#errorMobile").css("display","");
                        $("#errorMobile").html("Mobile number is already used.");
                        return false;
                    }else if(e == "Invalid"){
                        $("#errorMobile").css("display","none");
                    }
                });
            }else{
                $("#errorMobile").css("display","");
                $("#errorMobile").html("Mobile number can't be blank.");
                return false;
            }
        }
        
        function validateEmailSignup()
        {
            var email = $("#email").val();
            if(email != "")
            {
                $.post("<?= site_url('home/ajax/validateEmail') ?>", {email:email}, function(e){
                    if(e == "Valid"){
                        $("#errorEmail").css("display", "");
                        $("#errorEmail").html("Email address is already used.");
                        return false;
                    }else if(e == "Invalid"){
                        $("#errorEmail").css("display", "none");
                    } 
                });
            }else
            {
                $("#errorEmail").css("display","");
                $("#errorEmail").html("Email Address Can't be blank.");
                return false;
            }
        }
        
        $('#login_username').on('blur', function(){
            var username = $('#login_username').val();
            if(username != "")
            {
                $.post("<?= site_url('home/ajax/checkUsername') ?>", {username:username}, function(e){
                    if(e == "Valid") {
                        $("#errorEmailLogin").css("display", "none");
                        // $("#passwordDiv").show();
                    }else if(e == "Invalid"){
                        $("#errorEmailLogin").css("display", "");
                        $("#errorEmailLogin").html("This username is not registered on our database, please sign up.");
                        // $("#passwordDiv").hide();
                    }
                });     
            }else
            {
                $("#errorEmailLogin").css("display", "");
                $("#errorEmailLogin").html("Email Address / Username Can't be blank.");
                // $("#passwordDiv").hide();
            }
        });
        
        function checkPasswd(){
            var p1 = $("#register_password").val();
            var p2 = $("#register_password_repeat").val();
            if(p1 != ''){
                if(p2 != ''){
                    if(p1 != p2){
                        $("#doreg").attr("type","button");
                        $('#doreg1').css('color', 'red');
                        $("#doreg1").html("Password Doesn't Match");
                    }else{
                        if(p1.length >= 6){
                            $("#doreg").attr("type","submit");
                            $('#doreg1').css('color', 'red');
                            $("#doreg1").html("Password Matched Successfully.");
                        }else{
                            $("#doreg").attr("type","button");
                            $('#doreg1').css('color', 'red');
                            $("#doreg1").html("Password Too Short");
                        }
    
                    }
                }
            }else{
                $("#doreg").attr("type","button");
                $('#doreg1').css('color', 'red');
                $("#doreg1").html("Password Empty");
            }
        }
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        function onSignIn(googleUser) {
console.log("Test");
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
            console.log("Signup");

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
        <?php if(isset($_COOKIE['mmsOnline1231']) AND empty($msg)){ ?>
            $("#loginHereButton").click();
        <?php } ?>
    </script>
    <script>
        setTimeout(function(){
            gapi.signin2.render('testingGoogle', {
                'scope': 'profile email',
                'width': 140,
                'height': 35,
                'longtitle': false,
                'onsuccess': onSignIn
            });
        },2000);
    </script>
    <script>
        function detectmob() { 
         if(navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         || navigator.userAgent.match(/Windows Phone/i)
         ){
            $('.detect').css({'-ms-transform':'rotate(0deg)', '-webkit-transform':'rotate(0deg)','transform':'rotate(0deg)'});
            $('.detect8').css({'-ms-transform':'rotate(0deg)', '-webkit-transform':'rotate(0deg)','transform':'rotate(0deg)'});
            $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
            $('.detectHeader8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
            $('.detectChat').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
          }else if(navigator.userAgent.match(/Android/i)){
              $('.detect').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
              $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
              $('.detectHeader8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectChat').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
          }
         else if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
            $('.detect').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
            $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
            $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
            $('.detectHeader8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
            $('.detectChat').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
          }else{
              $('.detect').css({'-ms-transform':'rotate(00deg)', '-webkit-transform':'rotate(0deg)','transform':'rotate(0deg)'});
              $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
              $('.detectHeader8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectChat').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
          }
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    img = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file_upload-select123").change(function(){
            console.log(1);
            readURL(this);
        });
        function validate(evt) {
          var theEvent = evt || window.event;
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode( key );
          var regex = /[0-9]|\./;
          if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
        }
    </script>
    <script>
    $("#mobileNo").intlTelInput({
        nationalMode: true,
        //   allowDropdown: false,
        //   autoHideDialCode: false,
        //   autoPlaceholder: "polite",
        //   dropdownContainer: "body",
        //   excludeCountries: ["us"],
        //   formatOnDisplay: false,
          // geoIpLookup: function(callback) {
          //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          //     var countryCode = (resp && resp.country) ? resp.country : "";
          //     callback(countryCode);
          //   });
          // },
          // hiddenInput: "full_number",
          // initialCountry: "auto",
          // nationalMode: false,
          // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
          // placeholderNumberType: "MOBILE",
          // preferredCountries: ['cn', 'jp'],
          // separateDialCode: true,
          initialCountry: "auto",
          geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              callback(countryCode);
            });
          },
          utilsScript: "<?= base_url('assets_f') ?>/intl-tel/build/js/utils.js"
        });
        $("#mobileNo").on("keyup change", function() {
          var intlNumber = $('#mobileNo').intlTelInput("getNumber");
          if (intlNumber) {
            $('#phone1').val(intlNumber);
          } else {
            $('#phone1').val();
          }
        });
        
        
</script>
<script>
function rotateImageLeft(){
    var img = document.getElementById('blah');
    var degree = document.getElementById('left').value;
    var right = document.getElementById('right').value;
    img.width = 200;
    img.height = 200;
    degree = parseInt(degree) + parseInt(90);
    if(degree >= 360){
        // alert('hello');
        $('#left').val('0');
    }
    $('#blah').animate({  transform: degree }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
    });
    document.getElementById('left').value = degree;
    $('#right').val(degree);
}
function rotateImageRight(){
    var img = document.getElementById('blah');
    var degree = document.getElementById('right').value;
    var right = document.getElementById('right').value;
    img.width = 200;
    img.height = 200;
    degree = parseInt(degree) - parseInt(90);
    if(degree >= 360){
        // alert('hello');
        $('#right').val('0');
    }
    $('#blah').animate({  transform: degree }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
    });
    document.getElementById('right').value = degree;
    $('#left').val(degree);
}
function rotateImage(degree) {
    var img = document.getElementById('blah');
    oldWidth = img.width;
    oldHeight = img.height;
        img.width = 200;
        img.height = 200;
	$('#blah').animate({  transform: (+degree) }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
    });
}

$('#title').on('change', function() {
    var title = $(this).val();
    // alert(title);
        if(title == 'Mr' || title == 'Prophet' || title == 'Reverend' || title == 'Deacon') {
            $('#gender').val('male');
        }else if(title == 'Mrs' || title == 'Miss' || title == 'Deaconess' || title == 'Prophetess') {
            $('#gender').val('female');
        }else {
            $('#gender').val('');
            // $('#radio-02-f').attr('checked', false);
        }
});

<?php if(isset($_GET['received'])){ ?>
    setTimeout(function(){
        UIkit.notify({
            message : 'Message Delivered - We will contact you shortly.',
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });
    },1000);
    <?php } ?>
</script>
</body>
</html>