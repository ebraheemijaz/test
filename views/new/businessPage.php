<!--<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.min.css" media="all">-->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/uikit.almost-flat.min.css" media="all">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/flags.min.css" media="all">
<style>
    .uk-datepicker {
        width: 21% !important;
    }
    #donate {
        margin:4px;
       
        float:left;
    }
    
    #donate label {
        float:left;
        width:50px;
        margin:4px;
        background-color:#EFEFEF;
        border-radius:4px;
        border:1px solid #D0D0D0;
        overflow:auto;
           
    }
    
    #donate label span {
        text-align:center;
        font-size: 14px;
        padding:9px 0px;
        display:block;
    }
    
    #donate label input {
        position:absolute;
        top:-20px;
    }
    
    #donate input:checked + span {
        background-color:#404040;
        color:#F7F7F7;
    }
    
    #donate .yellow {
        background-color:#FFCC00;
        color:#333;
    }
    
    #donate .blue {
        background-color:#00BFFF;
        color:#333;
    }
    
    #donate .pink {
        background-color:#FF99FF;
        color:#333;
    }
    
    #donate .green {
        background-color:#A3D900;
        color:#333;
    }
    #donate .purple {
        background-color:#B399FF;
        color:#333;
    }

</style>
   <div id="page_content">
        <div id="page_content_inner">

            <h2 class="heading_b uk-margin-bottom">Business Page</h2>

            <div class="md-card uk-margin-large-bottom">
                <div class="md-card-content">
                    <form class="uk-form-stacked" id="wizard_advanced_form">
                        <div id="wizard_advanced" data-uk-observe>

                            <!-- first section -->
                            <h3 title="Business Information">Business Information</h3>
                            <section>
                                <h2 class="heading_a">
                                    Create Your Business Website
                                    <!--<span class="sub-heading">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>-->
                                </h2>
                                <hr class="md-hr"/>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Name Of Business<span class="req">*</span></label><br/>
                                        <input type="text" name="wizard_fullname" id="wizard_fullname" required class="md-input" value="Femi Adeko Business Page"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <input type="radio" name="logoType" id="uploadLogo" required value="uploadLogo">
                                        <label for="wizard_logo">Upload Logo</label><br/>
                                        <input type="file" name="logo" id="logo" class="md-input"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <input type="radio" name="logoType" id="systemLogo" required value="systemLogo">
                                        <label for="system_logo">Generate System Logo</label><br/>
                                        
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_about_us">About Us<span class="req">*</span></label><br/>
                                        <textarea class="md-input" name="aboutUs" id="aboutUs" placeholder="Tell your customer about your business." required cols="30" rows="4" maxlength="200"></textarea>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_who_we_are">Who We Are<span class="req">*</span></label><br/>
                                        <textarea class="md-input" name="whoWeAre" id="whoWeAre" placeholder="Tell your customer who you are." required cols="30" rows="4" maxlength="200"></textarea>
                                    </div>
                                </div>
                            </section>

                            <!-- second section -->
                            <h3 title="Product/Services & Gallery">Product/Services & Gallery</h3>
                            <section>
                                <h2 class="heading_a">
                                    Product / Services
                                </h2>
                                <hr class="md-hr"/>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2 parsley-row">
                                        <label for="sellingTag">Are you selling with a price tag?<span class="req">*</span></label><br/>
                                        <div id="donate">
                                            <label class="blue"><input type="radio" name="sellingTag"><span>Yes</span></label>
                                            <label class="green"><input type="radio" selected name="sellingTag"><span>No</span></label>
                                        </div>
                                    </div>
                                    <div id="currencyDiv" style="display: none;">
                                        <div class="uk-width-medium-1-5 parsley-row">
                                            <label for="currency">Select Currency : </label>
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <div class="parsley-row">
                                                <select name="currency" id="currency" style="font-size: 15px;">
                                                    <option value="">Select Currency</option>
                                                    <option value="GBP" style="font-size: 20px;">&#163; (GBP)</option>
                                                    <option value="USD">&#36; (USD)</option>
                                                    <option value="INR">&#8377; (INR)</option>
                                                    <option value="EURO">&#8352; (EURO)</option>
                                                    <option value="COLON">&#8353; (COLON)</option>
                                                    <option value="CRUZEIRO">&#8354; (CRUZEIRO)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <button onclick="AddProductAndServices1()" value="addProduct" class="md-btn md-btn-primary">+ Add Product</button>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <?php foreach($products as $val){ ?>
                                            <div class="col-md-3">
                                                <a href="<?= base_url("assets_f/img/business") ?>/<?= $val['img'] ?>" data-uk-lightbox="{group:'user-photo'}" title="<?= $val['desc'] ?>">
                                                    <img style="width: 100px" src="<?= base_url("assets_f/img/business") ?>/<?= $val['img'] ?>" alt=""/>
                                                </a>
                                                <br>
                                                <p><?= wordwrap($val['desc'], 15,"<br>\n"); ?></p>
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] != $v['user_id']){ ?>
                                                    <?php }else { ?>
                                                <a style="cursor: pointer" onclick="deleteC('<?= site_url('home/deleteimages/'.$val['id']) ?>')">Delete</a>
                                                <br/>
                                                <a style="cursor: pointer" onclick="editM('<?= $val['id'] ?>','<?= $val['desc']?>', '<?= $val['img'] ?>', '<?= $val['parent_id']?>')">Edit</a>
                                                <?php } ?>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                </div>
                                <hr class="md-hr"/>
                                <h2 class="heading_a">
                                    Gallery
                                </h2>
                                <hr class="md-hr"/>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <button onclick="AddGallery1()" value="addGallery" class="md-btn md-btn-success">+ Add Image</button>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <?php foreach($gallery as $val){ ?>
                                        <div class="col-md-3">
                                                <a href="<?= base_url("assets_f/img/business") ?>/<?= $val['img'] ?>" data-uk-lightbox="{group:'user-photo'}" title="<?= $val['desc'] ?>">
                                                    <img style="width: 100px" src="<?= base_url("assets_f/img/business") ?>/<?= $val['img'] ?>" alt=""/>
                                                </a>
                                                <br>
                                                <p><?= wordwrap($val['desc'], 15,"<br>\n"); ?></p>
                                                <?php if(!empty($userAdmin)){ ?>
                                                    <?php if($userAdmin[0]['id'] != $v['user_id']){ ?>
                                                    <?php }else { ?>
                                                <a style="cursor: pointer" onclick="deleteC('<?= site_url('home/deleteimages/'.$val['id']) ?>')">Delete</a>
                                                <br/>
                                                <a style="cursor: pointer" onclick="editM('<?= $val['id'] ?>','<?= $val['desc']?>', '<?= $val['img'] ?>', '<?= $val['parent_id']?>')">Edit</a>
                                                <?php } ?>
                                                <?php } ?>
                                            </div>
                                    <?php } ?>
                                </div>
                            </section>

                            <!-- third section -->
                            <h3 title="Select Banner">Select Banner</h3>
                            <section>
                                <h2 class="heading_a">
                                    Select Banner
                                </h2>
                                <hr class="md-hr"/>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="1"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="2"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="3"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="4"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="5"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="6"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="7"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="8"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="9"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <input type="checkbox" class="md-input" name="bannerImage[]" value="10"/>
                                    </div>
                                    <div class="uk-width-medium-1-5 parsley-row">
                                        <img src="http://4.bp.blogspot.com/-oxlezteeOII/TfiTImj4RlI/AAAAAAAAA1k/UAgctmU5VZo/s1600/Widescreen+Unique+And+Beautiful+Photography+%25284%2529.jpg" width="300" height="300"/>
                                    </div>
                                </div>
                            </section>
                            
                            <!-- Forth section -->
                            <h3 title="Contact Page & Theme Selection">Contact Page & Theme</h3>
                            <section>
                                <h2 class="heading_a">
                                    Contact Page & Theme
                                </h2>
                                <hr class="md-hr"/>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Business Email<span class="req">*</span></label><br/>
                                        <input type="email" name="businessEmail" id="businessEmail" required class="md-input"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Contact Number<span class="req">*</span></label><br/>
                                        <input type="text" name="contactNumber" id="contactNumber" required class="md-input"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Address (Optional)</label><br/>
                                        <!--<input type="email" name="businessEmail" id="businessEmail" required class="md-input"/>-->
                                    </div>
                                </div>
                                <hr class="md-hr"/>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Address Line 1</label><br/>
                                        <input type="text" name="address1" id="address1" class="md-input"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Address Line 2</label><br/>
                                        <input type="text" name="address2" id="address2" class="md-input"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Town</label><br/>
                                        <input type="text" name="town" id="town" class="md-input"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Postcode</label><br/>
                                        <input type="text" name="postcode" id="postcode" class="md-input"/>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="wizard_company_name">Country</label><br/>
                                        <input type="text" name="country" id="country" class="md-input"/>
                                    </div>
                                </div>
                                <div id="final"></div>
                            </section>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
        
        function AddProductAndServices1(){
            var a = '<div class="uk-modal" id="newModalAdv"> ' +
                '<div class="uk-modal-dialog"> ' +
                '<a href="" class="uk-modal-close uk-close"></a> ' +
                '<h3>Add Product & Services</h3>' +
                '<?= form_open_multipart('home/insert/business_imgs/manage_business',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>' +
                '<div class="login-wrap"> ' +
                    '<div class="uk-grid" data-uk-grid-margin>' +
                        '<div class="uk-width-medium-1-2">' +
                            '<div class="uk-form-file md-btn md-btn-danger">' +
                                'Select Image' +
                                '<input class="form-file" type="file" id="file-select" name="img"/>' +
                            '</div>' +
                        '</div>' +
                        '<div class="uk-width-medium-1-1">' +
                            '<textarea class="md-input" placeholder="Describe product not more than 200 characters." name="desc"></textarea>' +
                        '</div>' +
                        '<div class="uk-width-medium-1-2">' +
                            '<label for="actualPrice">Enter Actual Price</label><br/>'+
                            '<input type="text" class="md-input" name="actualPrice" placeholder="Enter Actual Price" id="actualPrice"/>'+
                        '</div>'+
                        '<div class="uk-width-medium-1-2">'+
                            '<label for="discountedPrice">Enter Discounted Price</label><br/>'+
                            '<input type="text" class="md-input" name="discountedPrice" placeholder="Enter Discounted Price" id="discountedPrice"/>'+
                        '</div>'+
                        '<div class="uk-width-medium-1-1">' +
                            '<br/><button class="md-btn md-btn-primary" type="submit">Add</button>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '<br/>' +
                '</div>' +
                '<?= form_close(); ?>' +
                '</div>'+
                '</div>';
            $("#advevver").html(a);
            var modal = UIkit.modal("#newModalAdv").show();
        }
        
        function AddGallery1(){
            var a = '<div class="uk-modal" id="newModalAdv"> ' +
                '<div class="uk-modal-dialog"> ' +
                '<a href="" class="uk-modal-close uk-close"></a> ' +
                '<h3>Add Product & Services</h3>' +
                '<?= form_open_multipart('home/insert/businessGallery/manage_business',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>' +
                '<div class="login-wrap"> ' +
                    '<div class="uk-grid" data-uk-grid-margin>' +
                        '<div class="uk-width-medium-1-2">' +
                            '<div class="uk-form-file md-btn md-btn-danger">' +
                                'Select Image' +
                                '<input class="form-file" type="file" id="file-select" name="img"/>' +
                            '</div>' +
                        '</div>' +
                        '<div class="uk-width-medium-1-1">' +
                            '<textarea class="md-input" placeholder="Describe product not more than 200 characters." name="desc"></textarea>' +
                        '</div>' +
                        '<div class="uk-width-medium-1-1">' +
                            '<br/><button class="md-btn md-btn-primary" type="submit">Add</button>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '<br/>' +
                '</div>' +
                '<?= form_close(); ?>' +
                '</div>'+
                '</div>';
            $("#advevver").html(a);
            var modal = UIkit.modal("#newModalAdv").show();
        }
    </script>

    <!-- common functions -->
    <script src="<?= base_url() ?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?= base_url() ?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?= base_url() ?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- parsley (validation) -->
    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    // load extra validators
    altair_forms.parsley_extra_validators();
    </script>
    <script src="<?= base_url() ?>assets/js/parsley.min.js"></script>
    <!-- jquery steps -->
    <script src="<?= base_url() ?>assets/js/wizard_steps.min.js"></script>

    <!--  forms wizard functions -->
    <script src="<?= base_url() ?>assets/js/forms_wizard.min.js"></script>
    
    <script>
        
        $(function() {
            // enable hires images
            altair_helpers.retina_images();
            // fastClick (touch devices)
            if(Modernizr.touch) {
                FastClick.attach(document.body);
            }
        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>

    <div id="style_switcher">
        <div id="style_switcher_toggle"><i class="material-icons">&#xE8B8;</i></div>
        <div class="uk-margin-medium-bottom">
            <h4 class="heading_c uk-margin-bottom">Colors</h4>
            <ul class="switcher_app_themes" id="theme_switcher">
                <li class="app_style_default active_theme" data-app-theme="">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_a" data-app-theme="app_theme_a">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_b" data-app-theme="app_theme_b">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_c" data-app-theme="app_theme_c">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_d" data-app-theme="app_theme_d">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_e" data-app-theme="app_theme_e">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_f" data-app-theme="app_theme_f">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_g" data-app-theme="app_theme_g">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_h" data-app-theme="app_theme_h">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_i" data-app-theme="app_theme_i">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
            </ul>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Sidebar</h4>
            <p>
                <input type="checkbox" name="style_sidebar_mini" id="style_sidebar_mini" data-md-icheck />
                <label for="style_sidebar_mini" class="inline-label">Mini Sidebar</label>
            </p>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Layout</h4>
            <p>
                <input type="checkbox" name="style_layout_boxed" id="style_layout_boxed" data-md-icheck />
                <label for="style_layout_boxed" class="inline-label">Boxed layout</label>
            </p>
        </div>
        <div class="uk-visible-large">
            <h4 class="heading_c">Main menu accordion</h4>
            <p>
                <input type="checkbox" name="accordion_mode_main_menu" id="accordion_mode_main_menu" data-md-icheck />
                <label for="accordion_mode_main_menu" class="inline-label">Accordion mode</label>
            </p>
        </div>
    </div>

    <script>
        $(function() {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $body = $('body');


            $switcher_toggle.click(function(e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function(e) {
                e.preventDefault();
                var $this = $(this),
                    this_theme = $this.attr('data-app-theme');

                $theme_switcher.children('li').removeClass('active_theme');
                $(this).addClass('active_theme');
                $body
                    .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i')
                    .addClass(this_theme);

                if(this_theme == '') {
                    localStorage.removeItem('altair_theme');
                } else {
                    localStorage.setItem("altair_theme", this_theme);
                }

            });

            // hide style switcher
            $document.on('click keyup', function(e) {
                if( $switcher.hasClass('switcher_active') ) {
                    if (
                        ( !$(e.target).closest($switcher).length )
                        || ( e.keyCode == 27 )
                    ) {
                        $switcher.removeClass('switcher_active');
                    }
                }
            });

            // get theme from local storage
            if(localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
            }


        // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });


        // toggle boxed layout

            if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            $boxed_layout_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

        // main menu accordion mode
            if($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function(){
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function(){
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
        
        $('.button_finish>a').on('click', function() {
            alert('Hello'); 
        });
    </script>
</body>
</html>