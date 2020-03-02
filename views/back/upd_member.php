<?php
$v = $members[0];
?>
<style>
    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
    }
    .rating > span {
        display: inline-block;
        position: relative;
    }
    .filled:before{
        content: "\2605";
        position: absolute;
    }
    .unfilled:before{
        /*content: "\2606";*/
        position: absolute;
    }
</style>
<script>
    var ci = 0;
    var gci = 0;
</script>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Member Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <aside class="profile-nav col-lg-12">
                <section class="panel">
                    <div class="user-heading round">
                            <?php $image = (empty($v['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$v['image'] ; ?>
                            <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <?php
                                        if($exif['Orientation'] == 6){
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '6');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(90deg);" /></a>
                                        <?php
                                        }else if($exif['Orientation'] == 8){
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '8');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-90deg);" /></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                        <?php
                                        }
                                        ?>
                        <h1><?= $v['fname'] ?> <?= $v['lname'] ?></h1>
                        <p><?= $v['email'] ?></p>
                        <p></p>
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-12">
                <?= form_open_multipart('admin/editProfile/'.$v['id']); ?>
                <section class="panel">
                    <div class="panel-body bio-graph-info">
                        <div class="row">
                            <div class="bio-row col-md-6">
                                <p><span>Title </span>: <select name="title">
                                    <option value="">Select</option>
                                    <option <?= ($v['title'] == 'Mr') ? "selected" : ""; ?> value="Mr">Mr</option>
                                    <option <?= ($v['title'] == 'Mrs') ? "selected" : ""; ?> value="Mrs">Mrs</option>
                                    <option <?= ($v['title'] == 'Miss') ? "selected" : ""; ?> value="Miss">Miss</option>
                                    <option <?= ($v['title'] == 'Elder') ? "selected" : ""; ?> value="Elder">Elder</option>
                                    <option <?= ($v['title'] == 'Pastor') ? "selected" : ""; ?> value="Pastor">Pastor</option>
                                    <option <?= ($v['title'] == 'Prophet') ? "selected" : ""; ?> value="Prophet">Prophet</option>
                                    <option <?= ($v['title'] == 'Prophetess') ? "selected" : ""; ?> value="Prophetess">Prophetess</option>
                                    <option <?= ($v['title'] == 'Reverend') ? "selected" : ""; ?> value="Reverend">Reverend</option>
                                    <option <?= ($v['title'] == 'Deacon') ? "selected" : ""; ?> value="Deacon">Deacon</option>
                                    <option <?= ($v['title'] == 'Deaconess') ? "selected" : ""; ?> value="Deaconess">Deaconess</option>
                                    <option <?= ($v['title'] == 'Dr') ? "selected" : ""; ?> value="Dr">Dr</option>
                                    <option <?= ($v['title'] == 'Professor') ? "selected" : ""; ?> value="Professor">Professor</option>
                                </select></p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p><span>Username </span>: <input type="text" value="<?= $v['username'] ?>" disabled/></p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p><span>First Name </span>: <input name="fname" type="text" value="<?= $v['fname'] ?>"/></p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p><span>Last Name </span>: <input type="text" name="lname" value="<?= $v['lname'] ?>"/></p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p><span>Email </span>: <input type="text" name="email" value="<?= $v['email'] ?>" style="font-size: 13px !important;"/></p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Hobbies </span>: <input type="text" name="hobbies" value="<?= $v['hobbies'] ?>"/>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Birth Month : </span>
                                    <select name="birth_month">
                                        <option <?= ($v['birth_month'] == '1') ? "selected" : ""; ?> value='1'>January</option>
                                        <option <?= ($v['birth_month'] == "2") ? "selected" : ""; ?> value='2'>February</option>
                                        <option <?= ($v['birth_month'] == '3')? "selected" : ""; ?> value='3'>March</option>
                                        <option <?= ($v['birth_month'] == "4")? "selected" : ""; ?> value='4'>April</option>
                                        <option <?= ($v['birth_month'] == "5")? "selected" : ""; ?> value='5'>May</option>
                                        <option <?= ($v['birth_month'] == "6")? "selected" : ""; ?> value='6'>June</option>
                                        <option <?= ($v['birth_month'] == "7")? "selected" : ""; ?> value='7'>July</option>
                                        <option <?= ($v['birth_month'] == "8")? "selected" : ""; ?> value='8'>August</option>
                                        <option <?= ($v['birth_month'] == "9")? "selected" : ""; ?> value='9'>September</option>
                                        <option <?= ($v['birth_month'] == "10")? "selected" : ""; ?> value='10'>October</option>
                                        <option <?= ($v['birth_month'] == "11")? "selected" : ""; ?> value='11'>November</option>
                                        <option <?= ($v['birth_month'] == "12")? "selected" : ""; ?> value='12'>December</option>
                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Birth Date : </span>
                                    <select name="birth_date">
                                        <?php for($i=1;$i<=31;$i++){ ?>
                                            <option <?= ($v['birth_date'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Member Since Month : </span>
                                    <select name="member_since_month" required>
                                        <option <?= ($v['member_since_month'] == '1') ? "selected" : ""; ?> value='1'>January</option>
                                        <option <?= ($v['member_since_month'] == "2") ? "selected" : ""; ?> value='2'>February</option>
                                        <option <?= ($v['member_since_month'] == '3')? "selected" : ""; ?> value='3'>March</option>
                                        <option <?= ($v['member_since_month'] == "4")? "selected" : ""; ?> value='4'>April</option>
                                        <option <?= ($v['member_since_month'] == "5")? "selected" : ""; ?> value='5'>May</option>
                                        <option <?= ($v['member_since_month'] == "6")? "selected" : ""; ?> value='6'>June</option>
                                        <option <?= ($v['member_since_month'] == "7")? "selected" : ""; ?> value='7'>July</option>
                                        <option <?= ($v['member_since_month'] == "8")? "selected" : ""; ?> value='8'>August</option>
                                        <option <?= ($v['member_since_month'] == "9")? "selected" : ""; ?> value='9'>September</option>
                                        <option <?= ($v['member_since_month'] == "10")? "selected" : ""; ?> value='10'>October</option>
                                        <option <?= ($v['member_since_month'] == "11")? "selected" : ""; ?> value='11'>November</option>
                                        <option <?= ($v['member_since_month'] == "12")? "selected" : ""; ?> value='12'>December</option>
                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Member Since Year : </span>
                                    <select name="member_since_year" required>
                                        <option value="">Select Year</option>
                                            <?php for($i=1980;$i<=date('Y');$i++){ ?>
                                            <option <?= ($v['member_since_year'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Gender </span>: <?= ucfirst($v['gander']); ?>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Country of Origin </span>:
                                    <select name="nativeCountry">
                                        <option selected value='United Kingdom'>United Kingdom</option><option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option value='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Botswana'>Botswana</option><option value='Brazil'>Brazil</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Cameroon'>Cameroon</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Costa Rica'>Costa Rica</option><option value='Cote d&#039;Ivoire'>Cote d&#039;Ivoire</option><option value='Croatia'>Croatia</option><option value='Cuba'>Cuba</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Estonia'>Estonia</option><option value='Ethiopia'>Ethiopia</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='French Polynesia'>French Polynesia</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Ghana'>Ghana</option><option value='Greece'>Greece</option><option value='Grenada'>Grenada</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option><option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iran'>Iran</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Isle of Man'>Isle of Man</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libya'>Libya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macao'>Macao</option><option value='Macedonia'>Macedonia</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mexico'>Mexico</option><option value='Micronesia'>Micronesia</option><option value='Moldova'>Moldova</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montenegro'>Montenegro</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='North Korea'>North Korea</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Qatar'>Qatar</option><option value='Romania'>Romania</option><option value='Russia'>Russia</option><option value='Rwanda'>Rwanda</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome and Principe'>Sao Tome and Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Serbia'>Serbia</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Korea'>South Korea</option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='Sudan'>Sudan</option><option value='Suriname'>Suriname</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Syria'>Syria</option><option value='Taiwan'>Taiwan</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania'>Tanzania</option><option value='Thailand'>Thailand</option><option value='Timor-Leste'>Timor-Leste</option><option value='Togo'>Togo</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United States'>United States</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Yemen'>Yemen</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option>
                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Address </span>: <input type="text" name="address" value="<?= $v['address'] ?>"/>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Town </span>: <input type="text" name="town" value="<?= $v['town'] ?>"/>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Postal Code </span>: <input type="text" name="poatalCode" value="<?= $v['poatalCode'] ?>"/>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Country Of Residence : </span>
                                    <select name="country">
                                                        <?php if(!empty($v['country'])){ ?>
                                                        <option selected value='<?= $v['country'] ?>'><?= $v['country'] ?></option>
                                                        <?php }else{ ?>
                                                        <option selected value='United Kingdom'>United Kingdom</option>
                                                        <?php } ?>
                                                        <option value='Afghanistan'>Afghanistan</option>
                                                        <option value='Albania'>Albania</option>
                                                        <option value='Algeria'>Algeria</option>
                                                        <option value='Andorra'>Andorra</option>
                                                        <option value='Angola'>Angola</option>
                                                        <option value='Argentina'>Argentina</option>
                                                        <option value='Armenia'>Armenia</option>
                                                        <option value='Australia'>Australia</option>
                                                        <option value='Austria'>Austria</option>
                                                        <option value='Azerbaijan'>Azerbaijan</option>
                                                        <option value='Bahamas'>Bahamas</option>
                                                        <option value='Bahrain'>Bahrain</option>
                                                        <option value='Bangladesh'>Bangladesh</option>
                                                        <option value='Barbados'>Barbados</option>
                                                        <option value='Belarus'>Belarus</option>
                                                        <option value='Belgium'>Belgium</option>
                                                        <option value='Belize'>Belize</option>
                                                        <option value='Benin'>Benin</option>
                                                        <option value='Bermuda'>Bermuda</option>
                                                        <option value='Bhutan'>Bhutan</option>
                                                        <option value='Bolivia'>Bolivia</option>
                                                        <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina </option>
                                                        <option value='Botswana'>Botswana</option>
                                                        <option value='Brazil'>Brazil</option>
                                                        <option value='Brunei Darussalam'>Brunei Darussalam</option>
                                                        <option value='Bulgaria'>Bulgaria</option>
                                                        <option value='Burkina Faso'>Burkina Faso</option>
                                                        <option value='Burundi'>Burundi</option>
                                                        <option value='Cambodia'>Cambodia</option>
                                                        <option value='Cameroon'>Cameroon</option>
                                                        <option value='Canada'>Canada</option>
                                                        <option value='Cape Verde'>Cape Verde</option>
                                                        <option value='Chad'>Chad</option>
                                                        <option value='Chile'>Chile</option>
                                                        <option value='China'>China</option>
                                                        <option value='Colombia'>Colombia</option>
                                                        <option value='Comoros'>Comoros</option>
                                                        <option value='Congo'>Congo</option>
                                                        <option value='Costa Rica'>Costa Rica</option>
                                                        <option value='Cote d&#039;Ivoire'>Cote d&#039;Ivoire</option>
                                                        <option value='Croatia'>Croatia</option>
                                                        <option value='Cuba'>Cuba</option>
                                                        <option value='Cyprus'>Cyprus</option>
                                                        <option value='Czech Republic'>Czech Republic</option>
                                                        <option value='Denmark'>Denmark</option>
                                                        <option value='Djibouti'>Djibouti</option>
                                                        <option value='Dominica'>Dominica</option>
                                                        <option value='Dominican Republic'>Dominican Republic</option>
                                                        <option value='Ecuador'>Ecuador</option>
                                                        <option value='Egypt'>Egypt</option>
                                                        <option value='El Salvador'>El Salvador</option>
                                                        <option value='Equatorial Guinea'>Equatorial Guinea</option>
                                                        <option value='Eritrea'>Eritrea</option>
                                                        <option value='Estonia'>Estonia</option>
                                                        <option value='Ethiopia'>Ethiopia</option>
                                                        <option value='Fiji'>Fiji</option>
                                                        <option value='Finland'>Finland</option>
                                                        <option value='France'>France</option>
                                                        <option value='French Polynesia'>French Polynesia</option>
                                                        <option value='Gabon'>Gabon</option>
                                                        <option value='Gambia'>Gambia</option>
                                                        <option value='Georgia'>Georgia</option>
                                                        <option value='Germany'>Germany</option>
                                                        <option value='Ghana'>Ghana</option>
                                                        <option value='Greece'>Greece</option>
                                                        <option value='Grenada'>Grenada</option>
                                                        <option value='Guatemala'>Guatemala</option>
                                                        <option value='Guinea'>Guinea</option>
                                                        <option value='Guinea-Bissau'>Guinea-Bissau</option>
                                                        <option value='Guyana'>Guyana</option>
                                                        <option value='Haiti'>Haiti</option>
                                                        <option value='Honduras'>Honduras</option>
                                                        <option value='Hong Kong'>Hong Kong</option>
                                                        <option value='Hungary'>Hungary</option>
                                                        <option value='Iceland'>Iceland</option>
                                                        <option value='India'>India</option>
                                                        <option value='Indonesia'>Indonesia</option>
                                                        <option value='Iran'>Iran</option>
                                                        <option value='Iraq'>Iraq</option>
                                                        <option value='Ireland'>Ireland</option>
                                                        <option value='Isle of Man'>Isle of Man</option>
                                                        <option value='Israel'>Israel</option>
                                                        <option value='Italy'>Italy</option>
                                                        <option value='Jamaica'>Jamaica</option>
                                                        <option value='Japan'>Japan</option>
                                                        <option value='Jordan'>Jordan</option>
                                                        <option value='Kazakhstan'>Kazakhstan</option>
                                                        <option value='Kenya'>Kenya</option>
                                                        <option value='Kiribati'>Kiribati</option>
                                                        <option value='Kuwait'>Kuwait</option>
                                                        <option value='Kyrgyzstan'>Kyrgyzstan</option>
                                                        <option value='Laos'>Laos</option>
                                                        <option value='Latvia'>Latvia</option>
                                                        <option value='Lebanon'>Lebanon</option>
                                                        <option value='Lesotho'>Lesotho</option>
                                                        <option value='Liberia'>Liberia</option>
                                                        <option value='Libya'>Libya</option>
                                                        <option value='Liechtenstein'>Liechtenstein</option>
                                                        <option value='Lithuania'>Lithuania</option>
                                                        <option value='Luxembourg'>Luxembourg</option>
                                                        <option value='Macao'>Macao</option>
                                                        <option value='Macedonia'>Macedonia</option>
                                                        <option value='Madagascar'>Madagascar</option>
                                                        <option value='Malawi'>Malawi</option>
                                                        <option value='Malaysia'>Malaysia</option>
                                                        <option value='Maldives'>Maldives</option>
                                                        <option value='Mali'>Mali</option>
                                                        <option value='Malta'>Malta</option>
                                                        <option value='Marshall Islands'>Marshall Islands</option>
                                                        <option value='Mauritania'>Mauritania</option>
                                                        <option value='Mauritius'>Mauritius</option>
                                                        <option value='Mexico'>Mexico</option>
                                                        <option value='Micronesia'>Micronesia</option>
                                                        <option value='Moldova'>Moldova</option>
                                                        <option value='Monaco'>Monaco</option>
                                                        <option value='Mongolia'>Mongolia</option>
                                                        <option value='Montenegro'>Montenegro</option>
                                                        <option value='Morocco'>Morocco</option>
                                                        <option value='Mozambique'>Mozambique</option>
                                                        <option value='Myanmar'>Myanmar</option>
                                                        <option value='Namibia'>Namibia</option>
                                                        <option value='Nauru'>Nauru</option>
                                                        <option value='Nepal'>Nepal</option>
                                                        <option value='Netherlands'>Netherlands</option>
                                                        <option value='New Zealand'>New Zealand</option>
                                                        <option value='Nicaragua'>Nicaragua</option>
                                                        <option value='Niger'>Niger</option>
                                                        <option value='Nigeria'>Nigeria</option>
                                                        <option value='North Korea'>North Korea</option>
                                                        <option value='Norway'>Norway</option>
                                                        <option value='Oman'>Oman</option>
                                                        <option value='Pakistan'>Pakistan</option>
                                                        <option value='Palau'>Palau</option>
                                                        <option value='Panama'>Panama</option>
                                                        <option value='Papua New Guinea'>Papua New Guinea</option>
                                                        <option value='Paraguay'>Paraguay</option>
                                                        <option value='Peru'>Peru</option>
                                                        <option value='Philippines'>Philippines</option>
                                                        <option value='Poland'>Poland</option>
                                                        <option value='Portugal'>Portugal</option>
                                                        <option value='Qatar'>Qatar</option>
                                                        <option value='Romania'>Romania</option>
                                                        <option value='Russia'>Russia</option>
                                                        <option value='Rwanda'>Rwanda</option>
                                                        <option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
                                                        <option value='Saint Lucia'>Saint Lucia</option>
                                                        <option value='Samoa'>Samoa</option>
                                                        <option value='San Marino'>San Marino</option>
                                                        <option value='Sao Tome and Principe'>Sao Tome and Principe</option>
                                                        <option value='Saudi Arabia'>Saudi Arabia</option>
                                                        <option value='Senegal'>Senegal</option>
                                                        <option value='Serbia'>Serbia</option>
                                                        <option value='Seychelles'>Seychelles</option>
                                                        <option value='Sierra Leone'>Sierra Leone</option>
                                                        <option value='Singapore'>Singapore</option>
                                                        <option value='Slovakia'>Slovakia</option>
                                                        <option value='Slovenia'>Slovenia</option>
                                                        <option value='Solomon Islands'>Solomon Islands</option>
                                                        <option value='Somalia'>Somalia</option>
                                                        <option value='South Africa'>South Africa</option>
                                                        <option value='South Korea'>South Korea</option>
                                                        <option value='Spain'>Spain</option>
                                                        <option value='Sri Lanka'>Sri Lanka</option>
                                                        <option value='Sudan'>Sudan</option>
                                                        <option value='Suriname'>Suriname</option>
                                                        <option value='Swaziland'>Swaziland</option>
                                                        <option value='Sweden'>Sweden</option>
                                                        <option value='Switzerland'>Switzerland</option>
                                                        <option value='Syria'>Syria</option>
                                                        <option value='Taiwan'>Taiwan</option>
                                                        <option value='Tajikistan'>Tajikistan</option>
                                                        <option value='Tanzania'>Tanzania</option>
                                                        <option value='Thailand'>Thailand</option>
                                                        <option value='Timor-Leste'>Timor-Leste</option>
                                                        <option value='Togo'>Togo</option>
                                                        <option value='Tonga'>Tonga</option>
                                                        <option value='Trinidad and Tobago'>Trinidad and Tobago</option>
                                                        <option value='Tunisia'>Tunisia</option>
                                                        <option value='Turkey'>Turkey</option>
                                                        <option value='Turkmenistan'>Turkmenistan</option>
                                                        <option value='Tuvalu'>Tuvalu</option>
                                                        <option value='Uganda'>Uganda</option>
                                                        <option value='Ukraine'>Ukraine</option>
                                                        <option value='United Arab Emirates'>United Arab Emirates</option>
                                                        <option value='United Kingdom'>United Kingdom</option>
                                                        <option value='United States'>United States</option>
                                                        <option value='Uruguay'>Uruguay</option>
                                                        <option value='Uzbekistan'>Uzbekistan</option>
                                                        <option value='Vanuatu'>Vanuatu</option>
                                                        <option value='Venezuela'>Venezuela</option>
                                                        <option value='Viet Nam'>Viet Nam</option>
                                                        <option value='Yemen'>Yemen</option>
                                                        <option value='Zambia'>Zambia</option>
                                                        <option value='Zimbabwe'>Zimbabwe</option>
                                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Mobile # </span>: <input type="tel" name="mobileNo" value="<?= $v['mobileNo'] ?>"/>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Home # </span>: <input type="tel" name="homeNo" value="<?= $v['homeNo'] ?>"/>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Age Group #</span>: <select id="select_demo_4"  name="age_group">
                                                        <!--<option <?= ($v['age_group'] == "9")? "selected" : ""; ?> value="9"> 0 - 9 </option>-->
                                                        <option <?= ($v['age_group'] == "18")? "selected" : ""; ?> value="18"> 13 - 18 </option>
                                                        <option <?= ($v['age_group'] == "29")? "selected" : ""; ?> value="29"> 19 - 29 </option>
                                                        <option <?= ($v['age_group'] == "39")? "selected" : ""; ?> value="39"> 30 - 39 </option>
                                                        <option <?= ($v['age_group'] == "49")? "selected" : ""; ?> value="49"> 40 - 49 </option>
                                                        <option <?= ($v['age_group'] == "69")? "selected" : ""; ?> value="69"> 50 - 69 </option>
                                                        <option <?= ($v['age_group'] == "70")? "selected" : ""; ?> value="70"> Above 70 </option>
                                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Job Status # </span>: <select name="employement" id="employ">
                                                        <option value="">Job Status</option>
                                                        <option <?= ($v['employement'] == "employed")? "selected" : ""; ?> value="employed">Employed</option>
                                                        <option <?= ($v['employement'] == "unemployed")? "selected" : ""; ?> value="unemployed">Unemployed</option>
                                                        <option <?= ($v['employement'] == "self employed")? "selected" : ""; ?> value="self employed">Self Employed</option>
                                                        <option <?= ($v['employement'] == "director")? "selected" : ""; ?> value="director">Director</option>
                                                        <option <?= ($v['employement'] == "student")? "selected" : ""; ?> value="student">Student</option>
                                                        <option <?= ($v['employement'] == "retired")? "selected" : ""; ?> value="retired">Retired</option>
                                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Marital Status</span>: <select name="maritalStatus" id="marital">
                                                        <option value="">Marital Status</option>
                                                        <option <?= ($v['maritalStatus'] == "single")? "selected" : ""; ?> value="single">Single</option>
                                                        <option <?= ($v['maritalStatus'] == "married")? "selected" : ""; ?> value="married">Married</option>
                                                        <option <?= ($v['maritalStatus'] == "divorced")? "selected" : ""; ?> value="divorced">Divorced</option>
                                                        <option <?= ($v['maritalStatus'] == "widow")? "selected" : ""; ?> value="widow">Widow</option>
                                                        <option <?= ($v['maritalStatus'] == "widower")? "selected" : ""; ?> value="widower">Widower</option>
                                                        <!--<option value="director">Director</option>-->
                                                        <!--<option value="student">Student</option>-->
                                                        <!--<option value="retired">Retired</option>-->
                                                    </select>
                                </p>
                            </div>
                            <div class="bio-row col-md-6">
                                <p>
                                    <span>Profile Picture </span>: <input type="file" name="image"/>
                                </p>
                            </div>
                            <div class="row"></div>

                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group m-bot20" id="accordion">
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            About Me
                                        </a>
                                    </h4>
                                </div>
                                <div class="">
                                    <div class="panel-body">
                                        <textarea name="biography" id="" cols="30" rows="5" class="form-control"><?= $v['biography'] ?></textarea>

                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            Profession
                                        </a>
                                    </h4>
                                </div>
                                <div class="">
                                    <div class="panel-body">
                                        <select name="businessGroup" class="md-input" id="bgroup">
                                            <option value="">Profession / Business Group</option>
                                            <?php foreach($businessGroup as $val){ ?>
                                                <option <?= ($val['id'] == $v['businessGroup']) ? "selected" : ""; ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            Church Groups
                                        </a>
                                    </h4>
                                </div>
                                <div class="">
                                    <div class="panel-body">
                                        <label for="user_edit_personal_info_control">Church Groups</label>
                                            <br/>
                                            <?php for($i=0;$i<5;$i++){ ?>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <select id="select_demo_4" class="md-input" name="groups[<?= $i ?>]">
                                                            <option value="none">None</option>
                                                            <?php foreach($churchgroup as $k=>$val){ ?>
                                                                <option <?= (isset($membGroup1[$i]) AND ($val['id'] == $membGroup1[$i])) ? "selected" : ""; ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" href="#children">
                                            Children
                                        </a>
                                    </h4>
                                </div>
                                <div class="">
                                    <div class="panel-body">
                                        <?php $child = $v['child']; ?>
                                        <div id="child">
                                            <p>Enter your Child's details below</p>
                                            <span class="btn btn-info" onclick="addChild()">Add +</span>
                                        </div>
                                        <?php $i=0; if(!empty($child)){ ?>
                                            <?php for($i=0;$i<count($child);$i++){ ?>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> First Name </span>:
                                                        <input type="text" class="form-control" name="child[<?= $i ?>][fname]" value="<?= $child[$i]['fname'] ?>">
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Last Name </span>:
                                                        <input type="text" class="form-control" name="child[<?= $i ?>][lname]" value="<?= $child[$i]['lname'] ?>">
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Email </span>:
                                                        <input type="email" class="form-control" name="child[<?= $i ?>][email]" value="<?= $child[$i]['email'] ?>">
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Contact </span>:
                                                        <input type="tel" class="form-control" name="child[<?= $i ?>][mobile]" value="<?= $child[$i]['mobile'] ?>">
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Birth Month</span>:
                                                        <select name="child[<?= $i ?>][month]" id="" class="form-control">
                                                            <option <?= ($child[$i]['month'] == '1') ? "selected" : ""; ?> value='1'>January</option>
                                                            <option <?= ($child[$i]['month'] == "2") ? "selected" : ""; ?> value='2'>February</option>
                                                            <option <?= ($child[$i]['month'] == '3 ')? "selected" : ""; ?> value='3'>March</option>
                                                            <option <?= ($child[$i]['month'] == "4")? "selected" : ""; ?> value='4'>April</option>
                                                            <option <?= ($child[$i]['month'] == "5")? "selected" : ""; ?> value='5'>May</option>
                                                            <option <?= ($child[$i]['month'] == "6")? "selected" : ""; ?> value='6'>June</option>
                                                            <option <?= ($child[$i]['month'] == "7")? "selected" : ""; ?> value='7'>July</option>
                                                            <option <?= ($child[$i]['month'] == "8")? "selected" : ""; ?> value='8'>August</option>
                                                            <option <?= ($child[$i]['month'] == "9")? "selected" : ""; ?> value='9'>September</option>
                                                            <option <?= ($child[$i]['month'] == "10")? "selected" : ""; ?> value='10'>October</option>
                                                            <option <?= ($child[$i]['month'] == "11")? "selected" : ""; ?> value='11'>November</option>
                                                            <option <?= ($child[$i]['month'] == "12")? "selected" : ""; ?> value='12'>December</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Birth Day</span>:
                                                        <select name="child[<?= $i ?>][day]" id="" class="form-control">
                                                            <?php for($x = 1 ; $x < 31 ; $x++){ ?>
                                                                <option <?= ($child[$i]['day'] == $x) ? "selected" : ""; ?> value="<?= $x ?>"><?= $x ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Gender </span>:
                                                        <select name="child[<?= $i ?>][gender]" id="" class="form-control">
                                                            <option <?= ($child[$i]['gender'] == "male") ? "selected" : ""; ?> value="male">Male</option>
                                                            <option <?= ($child[$i]['gender'] == "female") ? "selected" : ""; ?> value="female">Female</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="row"></div>
                                                <hr/>
                                            <?php } ?>
                                        <?php } ?>
                                        <script> ci = <?= $i; ?>; </script>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" href="#children">
                                            Grand Children
                                        </a>
                                    </h4>
                                </div>
                                <div class="">
                                    <div class="panel-body">
                                        <?php $child = $v['grandChild']; ?>
                                        <div id="grandChild">
                                            <p>Enter your Grand Child's details below</p>
                                            <span class="btn btn-info" onclick="addgrandChild()">Add +</span>
                                        </div>
                                        <?php $i=0; if(!empty($child)){ ?>
                                            <?php for($i=0;$i<count($child);$i++){ ?>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> First Name </span>:
                                                        <input type="text" class="form-control" name="grandChild[<?= $i ?>][fname]" value="<?= $child[$i]['fname'] ?>">
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Last Name </span>:
                                                        <input type="text" class="form-control" name="grandChild[<?= $i ?>][lname]" value="<?= $child[$i]['lname'] ?>">
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Email </span>:
                                                        <input type="email" class="form-control" name="grandChild[<?= $i ?>][email]" value="<?= $child[$i]['email'] ?>">
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Contact </span>:
                                                        <input type="tel" class="form-control" name="grandChild[<?= $i ?>][mobile]" value="<?= $child[$i]['mobile'] ?>">
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Birth Month</span>:
                                                        <select name="grandChild[<?= $i ?>][month]" id="" class="form-control">
                                                            <option <?= ($child[$i]['month'] == '1') ? "selected" : ""; ?> value='1'>January</option>
                                                            <option <?= ($child[$i]['month'] == "2") ? "selected" : ""; ?> value='2'>February</option>
                                                            <option <?= ($child[$i]['month'] == '3 ')? "selected" : ""; ?> value='3'>March</option>
                                                            <option <?= ($child[$i]['month'] == "4")? "selected" : ""; ?> value='4'>April</option>
                                                            <option <?= ($child[$i]['month'] == "5")? "selected" : ""; ?> value='5'>May</option>
                                                            <option <?= ($child[$i]['month'] == "6")? "selected" : ""; ?> value='6'>June</option>
                                                            <option <?= ($child[$i]['month'] == "7")? "selected" : ""; ?> value='7'>July</option>
                                                            <option <?= ($child[$i]['month'] == "8")? "selected" : ""; ?> value='8'>August</option>
                                                            <option <?= ($child[$i]['month'] == "9")? "selected" : ""; ?> value='9'>September</option>
                                                            <option <?= ($child[$i]['month'] == "10")? "selected" : ""; ?> value='10'>October</option>
                                                            <option <?= ($child[$i]['month'] == "11")? "selected" : ""; ?> value='11'>November</option>
                                                            <option <?= ($child[$i]['month'] == "12")? "selected" : ""; ?> value='12'>December</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Birth Day</span>:
                                                        <select name="grandChild[<?= $i ?>][day]" id="" class="form-control">
                                                            <?php for($x = 1 ; $x < 31 ; $x++){ ?>
                                                                <option <?= ($child[$i]['day'] == $x) ? "selected" : ""; ?> value="<?= $x ?>"><?= $x ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p>
                                                        <span> Gender </span>:
                                                        <select name="grandChild[<?= $i ?>][gender]" id="" class="form-control">
                                                            <option <?= ($child[$i]['gender'] == "male") ? "selected" : ""; ?> value="male">Male</option>
                                                            <option <?= ($child[$i]['gender'] == "female") ? "selected" : ""; ?> value="female">Female</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="row"></div>
                                                <hr/>
                                                <div class="row"></div>
                                                <hr/>
                                            <?php } ?>
                                        <?php } ?>
                                        <script> gci = <?= $i; ?> </script>

                                        <button class="btn btn-success">Save</button>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </form>
            </aside>
        </div>
    </section>
</section>
<div class="conf"></div>
<script>
    function bigImg(url, ori){
        if(navigator.userAgent.match(/iPhone/i)){
            deg = '0deg';
        }else{
            deg = '90deg';
        }
        if(ori == '6'){
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 300px !important;'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true'  data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img class='detect' src='"+url+"' style='transform: rotate("+deg+");height: auto; width: 300px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }else if(ori == '8'){
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 300px !important;'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true'  data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img class='detect8' src='"+url+"' style='transform: rotate(-90deg);height: auto; width: 300px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }else{
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 300px !important;'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true' data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img src='"+url+"' style='height: auto; width: 300px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
</script>

<script>

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
        "<div class='col-md-6'> " +
        "<div class='radios'> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-01'> " +
        "<input name='grandChild["+gci+"][gender]' id='radio-01' value='male' type='radio' checked /> Male " +
        "</label> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-02'> " +
        "<input name='grandChild["+gci+"][gender]' id='radio-02' value='female' type='radio' /> Female " +
        "</label> " +
        "</div>" +
        "</div>" +
        "<div class='row'></div>" +
        "<div class='col-md-12'>" +
        "<div class='col-md-6'>" +
        "<p><input onchange='gchildEmail("+gci+")' id='gchildEmail"+gci+"' type='checkbox'>Enter Grand Child email or tick box to enter your own</p>" +
        "<input type='email' class='form-control' name='grandChild["+gci+"][email]' id='gchildEmailval"+gci+"' placeholder='Enter Email' > " +
        "</div>" +
        "<div class='col-md-6'> " +
        "<p><input onchange='gchildMobilee("+gci+")' id='gchildMobilec"+gci+"' type='checkbox'>Enter Grand Child Mobile or tick box to enter your own</p>" +
        "<input type='tel' class='form-control' name='grandChild["+gci+"][mobile]' id='gchildMobileval"+gci+"' placeholder='Enter Mobile Number' > " +
        "</div> " +
        "</div> " +
        "</div>" +
        "<hr/><div class='row'></div>";
        $("#grandChild").append(gchild);
        gci++;
    }
    function gchildEmail(i){
        if($('#gchildEmail'+i)[0].checked){
            var email = "<?= $v['email'] ?>";
            $("#gchildEmailval"+i).val(email);
        }
    }
    function gchildMobilee(i){
        if($('#gchildMobilec'+i)[0].checked){
            var email = "<?= $v['mobileNo'] ?>";
            $("#gchildMobileval"+i).val(email);
        }
    }
    function cchildEmail(i){
        if($('#cchildEmail'+i)[0].checked){
            var email = "<?= $v['email'] ?>";
            $("#cchildEmailval"+i).val(email);
        }
    }
    function cchildMobilee(i){
        if($('#cchildMobilec'+i)[0].checked){
            var email = "<?= $v['mobileNo'] ?>";
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
        "<div class='col-md-6'> " +
        "<div class='radios'> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-01'> " +
        "<input name='child["+ci+"][gender]' id='radio-01' value='male' type='radio' checked /> Male " +
        "</label> " +
        "<label class='label_radio col-lg-6 col-sm-6' for='radio-02'> " +
        "<input name='child["+ci+"][gender]' id='radio-02' value='female' type='radio' /> Female " +
        "</label> " +
        "</div> " +
        "</div> " +
        "<div class='row'></div> " +
        "<div class='col-md-12'> " +
        "<div class='col-md-6'> " +
        "<p><input onchange='cchildEmail("+ci+")' id='cchildEmail"+ci+"' type='checkbox'>Enter Child Number or tick box to enter your own</p>" +
        "<input type='email' class='form-control' name='child["+ci+"][mobile]' id='cchildEmailval"+ci+"' placeholder='Enter Mobile Number' > " +
        "</div> " +
        "<div class='col-md-6'> " +
        "<p><input onchange='cchildMobilee("+ci+")' id='cchildMobilec"+ci+"' type='checkbox'>Enter Child Email or tick box to enter your own</p>" +
        "<input type='tel' class='form-control' name='child["+ci+"][email]' id='cchildMobileval"+ci+"' placeholder='Enter Email' > " +
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
</script>