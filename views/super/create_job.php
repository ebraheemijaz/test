<script src="http://maps.googleapis.com/maps/api/js?libraries=places" type="text/javascript"></script>

<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="jobs.php">Jobs</a></li>
                        <li><a href="#">Create Job</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Create Job
                        </header>
                        <div class="panel-body">
                            <?= form_open('super/insert/jobs/jobs',array('class'=>'form-horizontal','role'=>'form')); ?>
                            <fieldset>
                                <legend style="padding: 0 0 5px 0;">Primary Contact (Client):</legend>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Existing Client?</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="client">
                                            <option value="no">No</option>
                                            <?php foreach($clients as $client){ ?>
                                                <option value="<?= $client['id'] ?>"><?= $client['name'] ?> | <?= $client['email'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Name/Organisation</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="client[name]" id="client_name" required class="form-control" placeholder="Enter Client Name/Organisation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Contact Person</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="client[contact_person]" id="client_contact_person" class="form-control" placeholder="Enter Client Detail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Contact Address</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="client[address]" id="client_contact_address" class="form-control" placeholder="Enter Client Contact Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Postcode</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="client[postal]" id="client_postcode" class="form-control" placeholder="Enter Client Postcode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Country</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="client[country]" id="client_country">
                                            <option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option value='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Botswana'>Botswana</option><option value='Brazil'>Brazil</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Cameroon'>Cameroon</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Costa Rica'>Costa Rica</option><option value='Cote d&#039;Ivoire'>Cote d&#039;Ivoire</option><option value='Croatia'>Croatia</option><option value='Cuba'>Cuba</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Estonia'>Estonia</option><option value='Ethiopia'>Ethiopia</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='French Polynesia'>French Polynesia</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Ghana'>Ghana</option><option value='Greece'>Greece</option><option value='Grenada'>Grenada</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option><option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iran'>Iran</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Isle of Man'>Isle of Man</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libya'>Libya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macao'>Macao</option><option value='Macedonia'>Macedonia</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mexico'>Mexico</option><option value='Micronesia'>Micronesia</option><option value='Moldova'>Moldova</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montenegro'>Montenegro</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='North Korea'>North Korea</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Qatar'>Qatar</option><option value='Romania'>Romania</option><option value='Russia'>Russia</option><option value='Rwanda'>Rwanda</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome and Principe'>Sao Tome and Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Serbia'>Serbia</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Korea'>South Korea</option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='Sudan'>Sudan</option><option value='Suriname'>Suriname</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Syria'>Syria</option><option value='Taiwan'>Taiwan</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania'>Tanzania</option><option value='Thailand'>Thailand</option><option value='Timor-Leste'>Timor-Leste</option><option value='Togo'>Togo</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United Kingdom'>United Kingdom</option><option value='United States'>United States</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Yemen'>Yemen</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">County</label>
                                    <div class="col-lg-10">
                                        <input type="text"  class="form-control" placeholder="Enter Client County">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">City</label>
                                    <div class="col-lg-10">
                                        <input type="text"  class="form-control" placeholder="Enter Client City">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Client Ref:</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="client[client_ref]" id="client_ref" class="form-control" placeholder="Enter Client Reference">
                                    </div>
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Our Ref:</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="client[our_ref]" id="client_our_ref" class="form-control" placeholder="Enter Our Reference">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Contact Number</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="client[contact]" id="client_contact_number" class="form-control" placeholder="Enter Client Contact #">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Contact Email</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="client[email]" id="client_contact_email" class="form-control" placeholder="Enter Client Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label"><span onclick="add_row('clientss')"  style="cursor:pointer;"><strong>+ Add New Row</strong></span></label>
                                    <div class="col-lg-10">
                                    </div>
                                </div>
                                <div id="clientss"></div>
                            </fieldset>
                            <fieldset>
                                <legend style="padding: 0 0 5px 0;">Guardian</legend>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Same as above?</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" onchange="guardianAsAbove(this.value)" style="width:70px" id="">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row"></div>
                                <div id="guardian" style="display: none;">
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-sm-2 control-label">Carer/Parent Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="Enter Student's Guardian Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-sm-2 control-label">Contact Number</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="Enter Student's Guardian Contact Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-sm-2 control-label">Contact Email</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="Enter Student's Guardian Contact Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-sm-2 control-label">Contact Address</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="Enter Student's Guardian Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-sm-2 control-label">Post Code</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="Enter Student's Guardian Postal Code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-sm-2 control-label">Country</label>
                                        <div class="col-lg-10">
                                            <select class="form-control">
                                                <option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option value='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Botswana'>Botswana</option><option value='Brazil'>Brazil</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Cameroon'>Cameroon</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Costa Rica'>Costa Rica</option><option value='Cote d&#039;Ivoire'>Cote d&#039;Ivoire</option><option value='Croatia'>Croatia</option><option value='Cuba'>Cuba</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Estonia'>Estonia</option><option value='Ethiopia'>Ethiopia</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='French Polynesia'>French Polynesia</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Ghana'>Ghana</option><option value='Greece'>Greece</option><option value='Grenada'>Grenada</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option><option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iran'>Iran</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Isle of Man'>Isle of Man</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libya'>Libya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macao'>Macao</option><option value='Macedonia'>Macedonia</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mexico'>Mexico</option><option value='Micronesia'>Micronesia</option><option value='Moldova'>Moldova</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montenegro'>Montenegro</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='North Korea'>North Korea</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Qatar'>Qatar</option><option value='Romania'>Romania</option><option value='Russia'>Russia</option><option value='Rwanda'>Rwanda</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome and Principe'>Sao Tome and Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Serbia'>Serbia</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Korea'>South Korea</option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='Sudan'>Sudan</option><option value='Suriname'>Suriname</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Syria'>Syria</option><option value='Taiwan'>Taiwan</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania'>Tanzania</option><option value='Thailand'>Thailand</option><option value='Timor-Leste'>Timor-Leste</option><option value='Togo'>Togo</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United Kingdom'>United Kingdom</option><option value='United States'>United States</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Yemen'>Yemen</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--                                <div class="form-group">-->
                                    <!--                                    <label for="" class="col-lg-2 col-sm-2 control-label">Country</label>-->
                                    <!--                                    <div class="col-lg-10">-->
                                    <!--                                        <input type="text" class="form-control" placeholder="Enter Student's Guardian Country">-->
                                    <!--                                    </div>-->
                                    <!--                                </div>-->

                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-sm-2 control-label"></label>
                                        <div class="col-lg-10">
                                            Is the Tuition Address same as the Guardian Address?
                                            <select style="width:70px" id="">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-sm-2 control-label"><span onclick="add_row('guardianRows')"  style="cursor:pointer;"><strong>+ Add New Row</strong></span></label>
                                        <div class="col-lg-10">
                                        </div>
                                    </div>
                                    <div id="guardianRows"></div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend style="padding: 0 0 5px 0;">Student</legend>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Student Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="student" class="form-control" placeholder="Enter Student Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Student Age</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Enter Student Age">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Contact Person Relationship</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Enter Student's Relationship">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Starting Date</label>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" min="<?= date("Y-m-d") ?>" name="starting" id="inputEmail1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Ending Date</label>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" id="inputEmail1" min="<?= date("Y-m-d") ?>" name="ending" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Hours per Week</label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control" id="inputEmail1" placeholder="" name="hours">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Maximum Hours</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail1" name="max_hour" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Ideal time for tuition</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail1" name="ideal_time" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Postcode</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="postal" placeholder="Enter Postal Code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Location</label>
                                    <div class="col-lg-10">
                                        <input id="searchTextField" type="text" name="location" size="50" placeholder="Enter a location" class="form-control" autocomplete="on" runat="server" />
                                        <input disabled type="hidden" id="city2" name="" />
                                        <input disabled type="text" id="cityLat" name="latitude" />
                                        <input type="hidden" id="cityLat1" name="latitude" />
                                        <input type="hidden" id="cityLng1" name="longitude" />
                                        <input disabled type="text" id="cityLng" name="longitude" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Subjects</label>
                                    <div class="col-lg-10">
                                        <input type="" class="form-control" id="inputEmail1" name="subjects" placeholder="Comma seprate subjects (if more than one)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">School Type</label>
                                    <div class="col-lg-10">
                                        <table class="table table-border">
                                            <tr>
                                                <td><input value="primary" type="checkbox" id="primary"/></td>
                                                <td><label for="primary">Primary</label></td>
                                                <td><input value="secondary" type="checkbox" id="secondary"/></td>
                                                <td><label for="secondary">Secondary</label></td>
                                            </tr>
                                            <tr>
                                                <td><input value="secondary" type="checkbox" id="secondaty"/></td>
                                                <td><label for="secondaty">Secondary</label></td>
                                                <td><input value="a-level" type="checkbox" id="alevel"/></td>
                                                <td><label for="alevel">A-Level</label></td>
                                            </tr>
                                            <tr>
                                                <td><input value="university" type="checkbox" id="uni"/></td>
                                                <td><label for="uni">University</label></td>
                                                <td><input value="intermediate" type="checkbox" id="inter"/></td>
                                                <td><label for="inter">Intermediate</label></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Year Group</label>
                                    <div class="col-lg-10">
                                        <select name="yeargroup" class="form-control m-bot15">
                                            <option value="1">Year 1</option>
                                            <option value="2">Year 2</option>
                                            <option value="3">Year 3</option>
                                            <option value="4">Year 4</option>
                                            <option value="5">Year 5</option>
                                            <option value="6">Year 6</option>
                                            <option value="7">Year 7</option>
                                            <option value="8">Year 8</option>
                                            <option value="9">Year 9</option>
                                            <option value="10">Year 10</option>
                                            <option value="11">Year 11</option>
                                            <option value="12">Year 12</option>
                                            <option value="13">Year 13</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Client Type</label>
                                    <div class="col-lg-10">
                                        <select name="client_type" class="form-control m-bot15">
                                            <option name="private">Private</option>
                                            <option name="schooling">School</option>
                                            <optgroup label="Government">
                                                <option value="government | alternative">Alternative</option>
                                                <option value="government | supplementry">Supplementry</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Student Info</label>
                                    <div class="col-lg-10">
                                        <textarea name="student_info" id="" cols="30" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-2 col-sm-2 control-label">Additional Info</label>
                                    <div class="col-lg-10">
                                        <textarea name="additional_info" id="" cols="30" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div id="tutorsJobs"></div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit"  class="btn btn-danger" >Save</button>
                                        <button type="button" onclick="printThis()" class="btn btn-primary">Print</button>
                                    </div>
                                    <br/>
                                    <div class="col-lg-offset-2 col-lg-10">

                                    </div>
                                </div>
                            </fieldset>
                            <?= form_close(); ?>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

