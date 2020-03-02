<style>
    input[type="text"] input[type="password"] input[type="date"]{
        padding: 20px 10px !important;
        line-height: 28px !important;
        /*color:black !important;*/
    }

    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        font-size: 14px !important;
        /*color:black !important;*/
    }
    ::-moz-placeholder { /* Firefox 19+ */
        font-size: 14px !important;
        /*color:black !important;*/
    }
    :-ms-input-placeholder { /* IE 10+ */
        font-size: 14px !important;
    }
    :-moz-placeholder { /* Firefox 18- */
        font-size: 14px !important;
    }

    .logooo{
        width: 15%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
    }
    .form-signin{
        margin: 15px auto 0!important;
    }
    p{
        color:black !important;
        font-weight :500 !important;
        text-align:left !important;
    }
    .col-md-6{
        margin-top:10px !important;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= site_url(); ?>/admin/view/manage_users">Members List</a></li>
                    <li><a href="">Register Member</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Members</header>
                    <div class="panel-body">
                        <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>
                        <?= form_open_multipart('admin/doRegister',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <p>Enter your personal details below</p>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fname" id="fname" onblur="createUsername()" placeholder="First Name *" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lname" id="lname" onblur="createUsername()" placeholder="Last Name *" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <select name="title" id="title" class="form-control">
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
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" placeholder="Username *" id="uname" value="" readonly/>
                            </div>
                            <div class="col-md-6">
                                <div class="radios">
                                    <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
                                        <input  name="gander" id="radio-01-m" value="male" type="radio"  style='width: 20px'/><br/> Male
                                    </label>
                                    <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
                                        <input name="gander" id="radio-02-f" value="female" type="radio" style='width: 20px'/><br/> Female
                                    </label>
                                </div>
                            </div>
                            <div class="row"></div>
                            <!--<p>Select Your Personal Details</p>-->
                            <!--<div class="col-md-6">-->
                            <!--    <select name="churchGroup" id="churchG" onchange="churchGroupa()" class="form-control">-->
                            <!--        <option value="">Select Church Department</option>-->
                            <!--        <?php foreach($churchgroup as $val){ ?>-->
                            <!--            <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>-->
                            <!--        <?php } ?>-->
                            <!--        <option value="other">Others</option>-->
                            <!--    </select>-->
                            <!--</div>-->
                            <!--<div style="display: none" id="churchGroupField" class="col-md-6">-->
                            <!--    <input type="text" class="form-control" name="cGroupField" placeholder="Enter New Church Group"/>-->
                            <!--</div>-->
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="hobbies" placeholder="Hobbies">
                            </div>
                            <div class="col-md-6">
                                <select name="businessGroup" id="bgroup" onchange="businessGroupa()" class="form-control">
                                    <option value="">Profession</option>
                                    <?php foreach($businessGroup as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                    <?php } ?>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div style="display: none" id="bgroupField" class="col-md-6">
                                <input type="text" name="bgroupField" class="form-control" placeholder="Enter New Business Group"/>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-6">
                                <select name="employement" id="employ" onchange="employment()" class="form-control">
                                    <option value="">Job Status</option>
                                    <option value="employed">Employed</option>
                                    <option value="unemployed">Unemployed</option>
                                    <option value="self employed">Self Employed</option>
                                    <option value="director">Director</option>
                                    <option value="student">Student</option>
                                    <option value="retired">Retired</option>
                                </select>
                            </div>
                            <div style="display: none" id="employementField" class="col-md-6">
                                <input type="text" name="employementField" class="form-control" placeholder="Enter New Employement"/>
                            </div>
                            <div class="col-md-6">
                                <select name="maritalStatus" id="maritalStatus" class="form-control">
                                    <option value="">Marital Status</option>
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
                            <div class="row"></div>
                            <!--<div class="col-md-6">-->
                            <!--    <textarea name="career" id="" cols="30" rows="3" placeholder="Career" class="form-control"></textarea>-->
                            <!--</div>-->
                            <div class="col-md-12">
                                <textarea name="biography" id="" cols="30" rows="3" placeholder="About Me" class="form-control"></textarea>
                            </div>
                            <div class="row"></div>
                            <label>Church Groups</label>
                            <div class="col-md-12">
                                <?php for($i=0;$i<5;$i++){ ?>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <select id="select_demo_4" class="form-control" name="groups[<?= $i ?>]">
                                                            <option value="none">None</option>
                                                            <?php foreach($churchgroup as $k=>$val){ ?>
                                                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <p> Enter your date of birth</p>
                            <div class="col-md-4">
                                <p>Select Month</p>
                                <select name="birth_month" id="month" class="form-control">
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
                            <div class="col-md-4">
                                <p>Select Date</p>
                                <select name="birth_date" class="form-control" id="birth_date">
                                    <?php for($i=1;$i<=31;$i++){ ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <p>Select Age Group</p>
                                <select name="age_group" onchange="aageGroupp($(this).val())" class="form-control">
                                    <!--<option value="9"> 0 - 9 </option>-->
                                    <option value="18"> 13 - 18 </option>
                                    <option value="29"> 19 - 29 </option>
                                    <option value="39"> 30 - 39 </option>
                                    <option value="49"> 40 - 49 </option>
                                    <option value="69"> 50 - 69 </option>
                                    <option value="70">Above 70</option>
                                </select>
                                <!--<input type="date" class="form-control" id="dob" name="dOfBirth" required placeholder="Date of Birth *">-->
                            </div>
                            <div class="row"></div>
                            <p>Select Country Of Origin</p>
                            <div class="col-md-6">
                                <select class="form-control" name="nativeCountry">
                                    <option selected value='United Kingdom'>United Kingdom</option><option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option value='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Botswana'>Botswana</option><option value='Brazil'>Brazil</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Cameroon'>Cameroon</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Costa Rica'>Costa Rica</option><option value='Cote d&#039;Ivoire'>Cote d&#039;Ivoire</option><option value='Croatia'>Croatia</option><option value='Cuba'>Cuba</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Estonia'>Estonia</option><option value='Ethiopia'>Ethiopia</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='French Polynesia'>French Polynesia</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Ghana'>Ghana</option><option value='Greece'>Greece</option><option value='Grenada'>Grenada</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option><option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iran'>Iran</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Isle of Man'>Isle of Man</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libya'>Libya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macao'>Macao</option><option value='Macedonia'>Macedonia</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mexico'>Mexico</option><option value='Micronesia'>Micronesia</option><option value='Moldova'>Moldova</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montenegro'>Montenegro</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='North Korea'>North Korea</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Qatar'>Qatar</option><option value='Romania'>Romania</option><option value='Russia'>Russia</option><option value='Rwanda'>Rwanda</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome and Principe'>Sao Tome and Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Serbia'>Serbia</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Korea'>South Korea</option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='Sudan'>Sudan</option><option value='Suriname'>Suriname</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Syria'>Syria</option><option value='Taiwan'>Taiwan</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania'>Tanzania</option><option value='Thailand'>Thailand</option><option value='Timor-Leste'>Timor-Leste</option><option value='Togo'>Togo</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United States'>United States</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Yemen'>Yemen</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option>
                                </select>
                            </div>
                            <div class="row"></div>
                            <p>Enter your Correspondence Address</p>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" placeholder="Address: Line 1">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address2" placeholder="Address: Line 2" >
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="county" placeholder="County">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="town" placeholder="Town">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="poatalCode" required placeholder="Post Code">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="country">
                                    <option value="">Country</option>
                                    <option value='United Kingdom'>United Kingdom</option><option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option value='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Botswana'>Botswana</option><option value='Brazil'>Brazil</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Cameroon'>Cameroon</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Costa Rica'>Costa Rica</option><option value='Cote d&#039;Ivoire'>Cote d&#039;Ivoire</option><option value='Croatia'>Croatia</option><option value='Cuba'>Cuba</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Estonia'>Estonia</option><option value='Ethiopia'>Ethiopia</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='French Polynesia'>French Polynesia</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Ghana'>Ghana</option><option value='Greece'>Greece</option><option value='Grenada'>Grenada</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option><option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iran'>Iran</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Isle of Man'>Isle of Man</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libya'>Libya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macao'>Macao</option><option value='Macedonia'>Macedonia</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mexico'>Mexico</option><option value='Micronesia'>Micronesia</option><option value='Moldova'>Moldova</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montenegro'>Montenegro</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='North Korea'>North Korea</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Qatar'>Qatar</option><option value='Romania'>Romania</option><option value='Russia'>Russia</option><option value='Rwanda'>Rwanda</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome and Principe'>Sao Tome and Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Serbia'>Serbia</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Korea'>South Korea</option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='Sudan'>Sudan</option><option value='Suriname'>Suriname</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Syria'>Syria</option><option value='Taiwan'>Taiwan</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania'>Tanzania</option><option value='Thailand'>Thailand</option><option value='Timor-Leste'>Timor-Leste</option><option value='Togo'>Togo</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United States'>United States</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Yemen'>Yemen</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option>
                                </select>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" id="parenmobile" required name="mobileNo" placeholder="Enter country code then mobile e.g 447912444553">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="homeNo" placeholder="Home #">
                            </div>
                            <div class="col-md-1">
                                <p>Profile Pic</p>
                            </div>
                            <div class="col-md-5">
                                <input type="file" name="image" class="form-control">
                                <span style="color: red;">Note: Please don't use space in profile picture name.</span>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="parenEmail" placeholder="Email">
                            </div>
                            <div class="row"></div>
                            <div class="col-md-6">
                                <label>Member Since Month</label><br/>
                                <select name="member_since_month" id="member_since_month" class="form-control" required>
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
                            <div class="col-md-6">
                                <label>Member Since year</label><br/>
                                <select name="member_since_year" class="form-control" id="member_since_year" required>
                                        <option value="">Select Year</option>
                                        <?php for($i=1980;$i<=date('Y');$i++){ ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                            </div>

                            <div class="row"></div>
                            <div id="child" style="display: block;">
                                <p>Enter your Children details below</p>
                                <span class="btn btn-info" onclick="addChild()">Add +</span>
                            </div>
                            <div id="grandChild" style="display: block;">
                                <p>Enter your Grand Children details below</p>
                                <span class="btn btn-info" onclick="addgrandChild()">Add +</span>
                            </div>
                            <div class="radios">
                                <p><input type="checkbox" name="first_time" value="yes"> Select if you are a first timer</p>
                            </div>
                            <!--<div class="radios">-->
                            <!--    <p><input type="checkbox" id="agreeTerms" onclick="termsss()" value="agree this condition"> I agree to the Terms of Service and Privacy Policy</p>-->
                            <!--</div>-->
                            <!--<div class="g-recaptcha" data-sitekey="6Lc8Sw8UAAAAAC66iiHztjIZE72OgLqIopz9CAvG"></div>-->
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
                                <button class="btn btn-lg btn-login btn-block" id="doreg" type="submit">Create</button>
                            </div>
                            <div class="row"></div>
                            <!--<div style="text-align: center;" class="registration">-->
                            <!--    <span style="color:black;">Already Registered?</span>-->
                            <!--    <a class="" href="<?= site_url('home/logout') ?>">-->
                            <!--        Login-->
                            <!--    </a>-->
                            <!--</div>-->

                        </div>
                        <?= form_close(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<script>
    function checkPasswd(){
        var p1 = $("#password1").val();
        var p2 = $("#password2").val();
        if(p1 != p2){
            $("#doreg").attr("type","button");
            $("#doreg").html("Password Doesnt Match");
        }else{
            $("#doreg").attr("type","submit");
            $("#doreg").html("Create");

        }
    }
    var ci = 0;
    var gci = 0;
    function removeGrand(id){
        $("#grandChildField"+id).remove();
    }
    function addgrandChild(){
        var gchild = "<div id='grandChildField"+gci+"'> " +
            "<a onclick='removeGrand("+ gci +")'>&times;</a> " +
            "<div class='row'></div> " +
            "<div class='col-md-6'> " +
            "<input type='text' class='form-control' name='grandChild["+gci+"][fname]' placeholder='First Name' autofocus> " +
            "</div> " +
            "<div class='col-md-6'> " +
            "<input type='text' class='form-control' name='grandChild["+gci+"][lname]' placeholder='Last Name' autofocus> " +
            "</div> " +
            "<div class='col-md-6'> " +
            "<select class='form-control' onchange='gchildDay("+gci+")' id='gchildm"+gci+"' name='grandChild["+gci+"][month]'> ";
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
        "<div class='col-md-6'> " +
        "<select class='form-control' id='gchildd"+gci+"' name='grandChild["+gci+"][day]'> ";
        for(var i = 1; i<=31;i++){
            gchild += "<option value='"+i+"'>"+i+"</option>";
        }
        gchild += "</select>" +
        "</div> " +
        "<div class='row'></div> " +
        "<div class='col-md-6'>"+
        "<select class='form-control' id='gchilda"+gci+"' name='grandChild["+gci+"][age_group]'>"+
        "<option value=''>Select Age Group</option>"+
        "<option value='9'>0 - 9</option>"+
        "<option value='12'>10 - 12</option>"+
        "<option value='18'>13 - 18</option>"+
        "<option value='29'>20 - 29</option>"+
        "<option value='39'>30 - 39</option>"+
        "<option value='49'>40 - 49</option>"+
        "<option value='69'>50 - 69</option>"+
        "</select>"+
        "</div>"+
        "<div class='col-md-6'> " +
        "<div class='radios'> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-01'> " +
        "<input name='grandChild["+gci+"][gender]' id='radio-01' value='male' type='radio' checked style='width: 20px'/><br/> Male " +
        "</label> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-02'> " +
        "<input name='grandChild["+gci+"][gender]' id='radio-02' value='female' type='radio' style='width: 20px'/><br/> Female " +
        "</label> " +
        "</div>" +
        "</div>" +
        "<div class='row'></div>" +
        "<div class='col-md-12'>" +
        "<div class='col-md-6'>" +
        "<p><input onchange='gchildMobilee("+gci+")' id='gchildMobilec"+gci+"' type='checkbox'><br/>Enter Grand Child mobile or tick box to enter your own</p>" +
        "<input type='text' class='form-control' name='grandChild["+gci+"][mobile]' id='gchildMobileval"+gci+"' placeholder='Enter Mobile Number' > " +
        "</div>" +
        "<div class='col-md-6'> " +
        "<p><input onchange='gchildEmail("+gci+")' id='gchildEmail"+gci+"' type='checkbox'><br/>Enter Grand Child Email or tick box to enter your own</p>" +
        "<input type='text' class='form-control' name='grandChild["+gci+"][email]' id='gchildEmailval"+gci+"' placeholder='Enter Email' > " +
        "</div> " +
        "</div> " +
        "</div>" +
        "<hr/><div class='row'></div>";
        $("#grandChild").append(gchild);
        gci++;
    }
    function gchildEmail(i){
        if($('#gchildEmail'+i)[0].checked){
            var email = $("#parenEmail").val();
            $("#gchildEmailval"+i).val(email);
        }
    }
    function gchildMobilee(i){
        if($('#gchildMobilec'+i)[0].checked){
            var email = $("#parenmobile").val();
            $("#gchildMobileval"+i).val(email);
        }
    }
    function cchildEmail(i){
        if($('#cchildEmail'+i)[0].checked){
            var email = $("#parenEmail").val();
            $("#cchildEmailval"+i).val(email);
        }
    }
    function cchildMobilee(i){
        if($('#cchildMobilec'+i)[0].checked){
            var email = $("#parenmobile").val();
            $("#cchildMobileval"+i).val(email);
        }
    }
    function removechild(id){
        $("#ChildField"+id).remove();
    }
    function addChild(){
        var child = "<div id='ChildField"+ci+"'> " +
            "<a onclick='removechild("+ ci +")'>&times;</a> " +
            "<div class='row'></div> " +
            "<div class='col-md-6'> " +
            "<input type='text' class='form-control' name='child["+ci+"][fname]' placeholder='First Name' autofocus> " +
            "</div> " +
            "<div class='col-md-6'> " +
            "<input type='text' class='form-control' name='child["+ci+"][lname]' placeholder='Last Name' autofocus> " +
            "</div> " +
            "<div class='col-md-6'> " +
            "<select class='form-control' onchange='childDay("+ci+")' id='childm"+ci+"' name='child["+ci+"][month]'> ";
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
        "<div class='col-md-6'> " +
        "<select class='form-control' id='childd"+ci+"' name='child["+ci+"][day]'> ";
        for(var i = 1; i<=31;i++){
            child += "<option value='"+i+"'>"+i+"</option>";
        }
        child += "</select>" +
        "</div> " +
        "<div class='row'></div> " +
        "<div class='col-md-6'>"+
        "<select class='form-control' id='childa"+ci+"' name='child["+ci+"][age_group]'>"+
        "<option value=''>Select Age Group</option>"+
        "<option value='9'>0 - 9</option>"+
        "<option value='12'>10 - 12</option>"+
        "<option value='18'>13 - 18</option>"+
        "<option value='29'>20 - 29</option>"+
        "<option value='39'>30 - 39</option>"+
        "<option value='49'>40 - 49</option>"+
        "<option value='69'>50 - 69</option>"+
        "</select>"+
        "</div>"+
        "<div class='col-md-6'> " +
        "<div class='radios'> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-01'> " +
        "<input name='child["+ci+"][gender]' id='radio-01' value='male' type='radio' checked style='width: 20px'/><br/> Male " +
        "</label> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-02'> " +
        "<input name='child["+ci+"][gender]' id='radio-02' value='female' type='radio' style='width: 20px'/><br/> Female " +
        "</label> " +
        "</div> " +
        "</div> " +
        "<div class='row'></div> " +
        "<div class='col-md-12'> " +
        "<div class='col-md-6'> " +
        "<p><input onchange='cchildMobilee("+ci+")' id='cchildMobilec"+ci+"' type='checkbox'><br/>Enter Child Number or tick box to enter your own</p>" +
        "<input type='text' class='form-control' name='child["+ci+"][mobile]' id='cchildMobileval"+ci+"' placeholder='Enter Mobile Number' > " +
        "</div> " +
        "<div class='col-md-6'> " +
        "<p><input onchange='cchildEmail("+ci+")' id='cchildEmail"+ci+"' type='checkbox'><br/>Enter Child Email or tick box to enter your own</p>" +
        "<input type='text' class='form-control' name='child["+ci+"][email]' id='cchildEmailval"+ci+"' placeholder='Enter Email' > " +
        "</div> " +
        "</div> " +
        "</div>" +
        "<hr/><div class='row'></div>";
        $("#child").append(child);
        ci++;
    }
    function childDay(ci){
        var a = "";
        var month = $("#childm"+ci).val();
        var x = getMonthDays(month);
        for(var i = 1;i<=x;i++){
            a+="<option value='"+ i +"'>"+ i +"</option>";
        }
        $("#childd"+ci).html(a);
    }
    function gchildDay(ci){
        var a = "";
        var month = $("#gchildm"+ci).val();
        var x = getMonthDays(month);
        for(var i = 1;i<=x;i++){
            a+="<option value='"+ i +"'>"+ i +"</option>";
        }
        $("#gchildd"+ci).html(a);
    }
    function getMonthDays(month){
        if(month == 1){
            return 31;
        }else if(month == 2){
            return 28;
        }else if(month == 3){
            return 31;
        }else if(month == 4){
            return 30;
        }else if(month == 5){
            return 31;
        }else if(month == 6){
            return 30;
        }else if(month == 7){
            return 31;
        }else if(month == 8){
            return 31;
        }else if(month == 9){
            return 30;
        }else if(month == 10){
            return 31;
        }else if(month == 11){
            return 30;
        }else if(month == 12){
            return 31;
        }
    }
    $("#month").change(function(){
        var a = "";
        var month = $("#month").val();
        if(month == 1){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 2){
            for(var i = 1;i<=28;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 3){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 4){
            for(var i = 1;i<=30;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 5){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 6){
            for(var i = 1;i<=30;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 7){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 8){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 9){
            for(var i = 1;i<=30;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 10){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 11){
            for(var i = 1;i<=30;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }else if(month == 12){
            for(var i = 1;i<=31;i++){
                a+="<option value='"+ i +"'>"+ i +"</option>";
            }
        }
        $("#birth_date").html(a);
    });
    function aageGroupp(input){
        if(input >= '39'){
            $("#grandChild").css('display',"");
        }
        if(input >= '29'){
            $("#child").css('display',"");
        }else{
            $("#child").css('display',"none");
            $("#grandChild").css('display',"none");
        }
    }
    function businessGroupa(){
        var a = $("#bgroup").val();
        if(a == "other"){
            $("#bgroupField").css("display","");
        }else{
            $("#bgroupField").css("display","none");
        }
    }
    function employment(){
        var a = $("#employ").val();
        if(a == "other"){
            $("#employementField").css("display","");
        }else{
            $("#employementField").css("display","none");
        }
    }
    function churchGroupa(){
        var a = $("#churchG").val();
        if(a == "other"){
            $("#churchGroupField").css("display","");
        }else{
            $("#churchGroupField").css("display","none");
        }
    }
    
    function createUsername(){
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var username = fname.trim()+lname.trim();
        var username = username.replace(/\s/g,'');
        $('#uname').val(username.toLowerCase());
    }
    
    $('#title').on('change', function() {
        var title = $(this).val();
        if(title == 'Mr' || title == 'Prophet' || title == 'Reverend' || title == 'Deacon') {
            $('#radio-01-m').attr('checked', true);
        }else if(title == 'Mrs' || title == 'Miss' || title == 'Deaconess' || title == 'Prophetess') {
            $('#radio-02-f').attr('checked', true);
        }else {
            $('#radio-01-m').attr('checked', false);
            $('#radio-02-f').attr('checked', false);
        }
    });
    
    // function termsss(){
    //     if($('#agreeTerms')[0].checked){
    //         checkPasswd();
    //         $("#doreg").removeAttr("disabled");
    //     }else{
    //         $("#doreg").attr("disabled","disabled");
    //     }
    // }
</script>