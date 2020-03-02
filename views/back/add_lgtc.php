<link rel="stylesheet" href="<?= base_url('assets_f') ?>/intl-tel/build/css/intlTelInput.css">
    <link rel="stylesheet" href="<?= base_url('assets_f') ?>/intl-tel/build/css/demo.css">
    <style>
        .intl-tel-input{
            width: 100%!important;
        }
        input{
            font-size: 14px!important;
        }
        .iti-flag{
            top: 17px!important;
        }
        .iti-arrow{
            top: 17px!important;
        }
    </style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Add New Christ Convert</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Record New Christ Convert</header>
                    <div class="panel-body">
                        <?= form_open('admin/insert/lifetochrist/view_gave_life',array("class"=>"form-horizontal")) ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        Full Name :
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="fname" placeholder="Enter Name" required class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        Contact :
                                    </div>
                                    <div class="col-md-9">
                                        <input type="tel" id="contact" placeholder="Put your mobile number without '0'" required class="form-control"/>
                                        <input class="md-input mobileNo" type="hidden" id="phone1" name="contact"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        Email :
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="email" placeholder="Enter Email" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        Date :
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="date" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        Comment :
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="comment" class="form-control" placeholder = "Enter Your Comment."></textarea>
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2 ">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script src="<?= base_url('assets_f') ?>/intl-tel/build/js/intlTelInput.js"></script>
<script>
    $("#contact").intlTelInput({
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
        $("#contact").on("keyup change", function() {
          var intlNumber = $('#contact').intlTelInput("getNumber");
          if (intlNumber) {
            $('#phone1').val(intlNumber);
          } else {
            $('#phone1').val();
          }
        });
</script>