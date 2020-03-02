<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/main.min.css" media="all">
    <link rel="stylesheet" href="<?= base_url('assets_new') ?>/assets/css/themes/themes_combined.min.css" media="all">
</head>
<body class="login_page">
    <div class="login_page_wrapper" style="width:100% !important">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar" style="width:160px;height:160px;background-image: url(<?= base_url('assets_f/logo.png') ?>);background-size: 100% 100%">
                    </div>
                </div>
                <div class="md-card uk-margin-large-bottom">
                    <div class="md-card-content">
                        <form class="uk-form-stacked" id="wizard_advanced_form">
                            <div id="wizard_advanced">

                                <!-- first section -->
                                <h3>Personal information</h3>
                                <section>
                                    <h2 class="heading_a">
                                        Personal Information
                                        <span class="sub-heading">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                    </h2>
                                    <hr class="md-hr"/>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_fullname">Full Name<span class="req">*</span></label>
                                            <input type="text" name="wizard_fullname" id="wizard_fullname" required class="md-input" />
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <label for="wizard_address">Address<span class="req">*</span></label>
                                            <input type="text" name="wizard_address" id="wizard_address" required class="md-input" />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3 parsley-row">
                                            <label for="wizard_birth">Birth Date<span class="req">*</span></label>
                                            <input type="text" name="wizard_birth" id="wizard_birth" required class="md-input" data-parsley-date data-parsley-date-message="This value should be a valid date" data-uk-datepicker="{format:'MM.DD.YYYY'}" />
                                        </div>
                                        <div class="uk-width-medium-1-3 parsley-row">
                                            <select id="wizard_birth_place" name="wizard_birth_place" required>
                                                <option value="">Place of Birth</option>
                                                <option value="city_0">West Derekmouth</option>
                                                <option value="city_1">Marksmouth</option>
                                                <option value="city_2">Lake Earnest</option>
                                                <option value="city_3">Rociomouth</option>
                                                <option value="city_4">North Mozelleburgh</option>
                                                <option value="city_5">North Alexane</option>
                                                <option value="city_6">Kozeyfort</option>
                                                <option value="city_7">New Tryciamouth</option>
                                                <option value="city_8">North Shemar</option>
                                                <option value="city_9">South Mervin</option>
                                                <option value="city_10">East Miabury</option>
                                                <option value="city_11">Ashlyville</option>
                                                <option value="city_12">South Bethel</option>
                                                <option value="city_13">North Brendonton</option>
                                                <option value="city_14">Beryltown</option>
                                                <option value="city_15">Kossview</option>
                                                <option value="city_16">North Leilaniside</option>
                                                <option value="city_17">Port Vincenzo</option>
                                                <option value="city_18">North Hans</option>
                                                <option value="city_19">Port Corine</option>
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-3 parsley-row">
                                            <label class="uk-form-label">Marital Status<span class="req">*</span></label>
                                        <span class="icheck-inline">
                                            <input type="radio" name="wizard_status" id="wizard_status_married" required class="wizard-icheck" value="married" />
                                            <label for="wizard_status_married" class="inline-label">Married</label>
                                        </span>
                                        <span class="icheck-inline">
                                            <input type="radio" name="wizard_status" id="wizard_status_single" class="wizard-icheck" value="single" />
                                            <label for="wizard_status_single" class="inline-label">Single</label>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
                                        <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="material-icons">&#xE0CD;</i>
                                        </span>
                                            <label for="wizard_phone">Phone Number</label>
                                            <input type="text" class="md-input" name="wizard_phone" id="wizard_phone" />
                                        </div>
                                        <div class=" parsley-row">
                                            <div class="uk-input-group">
                                            <span class="uk-input-group-addon">
                                                <i class="material-icons">&#xE0BE;</i>
                                            </span>
                                                <label for="wizard_email">Email</label>
                                                <input type="text" class="md-input" name="wizard_email" id="wizard_email" required />
                                            </div>
                                        </div>
<!--                                        <div class="uk-input-group">-->
<!--                                        <span class="uk-input-group-addon">-->
<!--                                            <i class="uk-icon-skype"></i>-->
<!--                                        </span>-->
<!--                                            <label for="wizard_skype">Skype</label>-->
<!--                                            <input type="text" class="md-input" name="wizard_skype" id="wizard_skype" />-->
<!--                                        </div>-->
<!--                                        <div class="uk-input-group">-->
<!--                                        <span class="uk-input-group-addon">-->
<!--                                            <i class="uk-icon-twitter"></i>-->
<!--                                        </span>-->
<!--                                            <label for="wizard_twitter">Twitter</label>-->
<!--                                            <input type="text" class="md-input" name="wizard_twitter" id="wizard_twitter" />-->
<!--                                        </div>-->
                                    </div>
                                </section>

                                <!-- second section -->
                                <h3>Personal Interests</h3>
                                <section>
                                    <h2 class="heading_a">
                                        Personal Interests
                                        <span class="sub-heading">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                    </h2>
                                    <hr class="md-hr"/>
                                    <div class="uk-grid uk-grid-width-large-1-2 uk-grid-width-xlarge-1-4" data-uk-grid-margin>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_title_number">Hobbies<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_title_number" id="wizard_vehicle_title_number" required class="md-input" />
                                        </div>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_vin">VIN<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_vin" id="wizard_vehicle_vin" required class="md-input" />
                                        </div>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_plate_number">Current Plate Number<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_plate_number" id="wizard_vehicle_plate_number" required class="md-input" />
                                        </div>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_expiration">Expiration Date<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_expiration" id="wizard_vehicle_expiration" required class="md-input" data-parsley-americandate data-parsley-americandate-message="This value should be a valid date (MM.DD.YYYY)" data-uk-datepicker="{format:'MM.DD.YYYY'}" />
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-xlarge-1-6" data-uk-grid-margin>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_year">Registration Year</label>
                                            <input type="text" name="wizard_vehicle_year" id="wizard_vehicle_year" class="md-input" data-uk-datepicker="{format:'MM.YYYY'}" />
                                        </div>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_make">Make</label>
                                            <input type="text" name="wizard_vehicle_make" id="wizard_vehicle_make" class="md-input" />
                                        </div>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_model">Model<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_model" id="wizard_vehicle_model" required class="md-input" />
                                        </div>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_body">Body Type<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_body" id="wizard_vehicle_body" required class="md-input" />
                                        </div>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_axles">Axles</label>
                                            <input type="text" name="wizard_vehicle_axles" id="wizard_vehicle_axles" class="md-input" />
                                        </div>
                                        <div class="parsley-row">
                                            <label for="wizard_vehicle_fuel">Fuel<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_fuel" id="wizard_vehicle_fuel" required class="md-input" />
                                        </div>
                                    </div>
                                </section>

                                <!-- third section -->
                                <h3>Additional information</h3>
                                <section>
                                    <h2 class="heading_a">
                                        Additional information
                                        <span class="sub-heading">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                    </h2>
                                    <hr class="md-hr"/>
                                    <div class="uk-grid uk-margin-large-bottom" data-uk-grid-margin>
                                        <div class="uk-width-1-1">
                                            <label class="uk-form-label">Location Where Vehicle is Principally Garaged</label>
                                            <div class="uk-grid" data-uk-grid-margin="">
                                                <div class="uk-width-medium-2-10 parsley-row">
                                                <span class="icheck-inline uk-margin-top uk-margin-left">
                                                    <input type="radio" name="wizard_additional_location" id="wizard_status_location_city" class="wizard-icheck" value="City" />
                                                    <label for="wizard_status_location_city" class="inline-label">City</label>
                                                </span>
                                                </div>
                                                <div class="uk-width-medium-2-10 parsley-row">
                                                <span class="icheck-inline uk-margin-top uk-margin-left">
                                                    <input type="radio" name="wizard_additional_location" id="wizard_status_location_county" class="wizard-icheck" value="County" />
                                                    <label for="wizard_status_location_county" class="inline-label">County</label>
                                                </span>
                                                </div>
                                                <div class="uk-width-medium-3-10 parsley-row">
                                                    <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                       <input type="radio" name="wizard_additional_location" class="wizard-icheck" value="town" />
                                                    </span>
                                                        <label for="wizard_location_town">Town of</label>
                                                        <input type="text" class="md-input" name="wizard_location_town" id="wizard_location_town" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="uk-alert uk-alert-info">If you would like your registration renewals sent to an address other than your residence/business address, enter it below.</span>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-2-6 parsley-row">
                                            <label for="wizard_vehicle_registration_address">Registration Mailing Address</label>
                                            <input type="text" name="wizard_vehicle_registration_address" id="wizard_vehicle_registration_address" required class="md-input" />
                                        </div>
                                        <div class="uk-width-medium-1-6 parsley-row">
                                            <label for="wizard_vehicle_registration_city">City<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_registration_city" id="wizard_vehicle_registration_city" required class="md-input" />
                                        </div>
                                        <div class="uk-width-medium-1-6 parsley-row">
                                            <label for="wizard_vehicle_registration_state">State<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_registration_state" id="wizard_vehicle_registration_state" required class="md-input" />
                                        </div>
                                        <div class="uk-width-medium-1-6 parsley-row">
                                            <label for="wizard_vehicle_registration_zip">ZIP<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_registration_zip" id="wizard_vehicle_registration_zip" required class="md-input" />
                                        </div>
                                        <div class="uk-width-medium-1-6 parsley-row">
                                            <label for="wizard_vehicle_registration_code">Code<span class="req">*</span></label>
                                            <input type="text" name="wizard_vehicle_registration_code" id="wizard_vehicle_registration_code" required class="md-input" />
                                        </div>
                                    </div>
                                </section>

                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>

    </div>
    <script src="<?= base_url('assets_new') ?>/assets/js/common.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/uikit_custom.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/altair_admin_common.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/pages/login.min.js"></script>
    <!-- page specific plugins -->
    <!-- parsley (validation) -->
    <script>
        // load parsley config (altair_admin_common.js)
        altair_forms.parsley_validation_config();
        // load extra validators
        altair_forms.parsley_extra_validators();
    </script>
    <script src="<?= base_url('assets_new') ?>/bower_components/parsleyjs/dist/parsley.min.js"></script>
    <!-- jquery steps -->
    <script src="<?= base_url('assets_new') ?>/assets/js/custom/wizard_steps.min.js"></script>

    <!--  forms wizard functions -->
    <script src="<?= base_url('assets_new') ?>/assets/js/pages/forms_wizard.min.js"></script>

    <script>
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
    </script>
</body>
</html>