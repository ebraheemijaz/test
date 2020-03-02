<?php
$v = $userAdmin[0];
?>
<style>
    .row {
        margin-right: -15px;
        margin-left: -15px;
    }
    .row:before,
    .row:after{
        display: table;
        content: " ";
    }
    .row:after{
        clear: both;
    }

</style>
    <div id="page_content">
        <div id="page_content_inner">
            <?php require_once('advert_h.php'); ?>

            <form action="<?= site_url('home/editProfile/'.$v['id']); ?>"  onsubmit="return checkValueGroup()" class="uk-form-stacked" method="post" id="user_edit_form" enctype="multipart/form-data">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-7-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">

                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <?php $image = $this->data->fetch('member', array('id' => $userAdmin[0]['id'])); ?>
                                        <?php $image = (empty($image[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$image[0]['image'] ; ?>
                                        <?php
                                            $exif = exif_read_data($image);
                                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                                            <img src="<?= $image ?>" id="blah1" alt="user avatar" class="detect"/>
                                            <?php
                                            }else if($exif['Orientation'] == 8){
                                                // $class = "md-card-head-avatar";
                                            ?>
                                            <img src="<?= $image ?>" id="blah1" alt="" class="detect8"/>
                                            <?php
                                            }else{
                                            ?>
                                            <img src="<?= $image ?>" id="blah1" alt=""/>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-new"></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="image" id="user_edit_avatar_control">
                                        </span>
                                        <div class="btn-file fileinput-exists" onclick="deleteImageFrom('<?= $v['gander'] ?>', <?= $v['id'] ?>)" id="deleteExisting" style="display: block !important;"><i class="material-icons">&#xE5CD;</i></div>
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                        <button type="button" class="btn-file fileinput-exists" value="0" id="leftRotate" style="display: block !important;top: 87%; left: -23%;"><i class="material-icons">rotate_left</i></button>
                                        <button type="button" class="btn-file fileinput-exists" value="0" id="rightRotate" style="display: block !important;top: 87%; left: 79%;"><i class="material-icons">rotate_right</i></button>
                                    </div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b">
                                        <span class="uk-text-truncate" id="user_edit_uname" style="font-weight: bold;font-size:26px"><?= $v['fname']." ".$v['lname'] ?></span>
                                    </h2>
                                </div>

                                <div class="md-fab-wrapper">
                                    
                                </div>
                                <!--<div class="md-fab-wrapper">-->
                                <!--    <div class="md-fab md-fab-toolbar md-fab-small md-fab-accent md-fab-animated md-fab-active" style="width: 68px;">-->
                                <!--        <div class="md-fab-toolbar-actions">-->
                                <!--            <button type="submit" id="user_edit_save">-->
                                <!--                <i class="material-icons md-color-white">&#xE161;</i>-->
                                <!--            </button>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            <div class="user_content">
                                <?php if(!empty($msg)){ ?><script>
                                    swal('success', '<?= $msg?>', 'success');
                                </script></span></p><?php } ?>
                                <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                    <li class="uk-active"><a href="#">Basic</a></li>
                                    <li class="uk"><a href="#">Children</a></li>
                                    <li class="uk"><a href="#">Grand Children</a></li>
                                    <!--<li class="uk"><a href="#">Church Groups</a></li>-->
                                </ul>
                                <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                General info
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">

                                                    <label for="user_edit_uname_control">User name</label>
                                                    <input class="md-input" value="<?= $v['username'];?>" readonly type="text" name="username" id=""/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
<!--                                                    <label for="user_edit_uname_control">Sex</label>-->
                                                    <select id="select_demo_4" class="md-input" name="title">
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
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_fname_control">First Name</label>
                                                    <input class="md-input" value="<?= $v['fname'] ?>" type="text" id="user_edit_fname_control" name="fname"/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_lname_control">Last Name</label>
                                                    <input class="md-input" value="<?= $v['lname'] ?>" type="text" id="user_edit_lname_control" name="lname"/>
                                                </div>
                                            </div>
                                            <div class='uk-grid' data-uk-grid-margin>
                                                <div class='uk-width-medium-1-2'>
                                                    <label for='user_edit_uname_control'>Mobile #</label>
                                                    <input class="md-input" type="tel" maxlength="15"
                                                           onKeyDown="limitText(this,15);"
                                                           onKeyUp="limitText(this,15);" onkeypress='validate(event)'
                                                           name="mobileNo" value="<?= $v['mobileNo'] ?>"/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Home #</label>
                                                    <input class="md-input" type="tel" maxlength="15"
                                                           onKeyDown="limitText(this,15);" onkeypress='validate(event)'
                                                           onKeyUp="limitText(this,15);" name="homeNo" value="<?= $v['homeNo'] ?>"/>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_email_control">Email <span style="color: red;">*</span></label>
                                                    <input class="md-input" type="email" name="email" id="email" value="<?= $v['email'] ?>" required/>
                                                    <span class="error" id="emailError" style="color: red;"></span>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Hobbies <span style="color: red;">*</span></label>
                                                    <input class="md-input" type="text" name="hobbies" id="hobbies" value="<?= $v['hobbies'] ?>" required/>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>

                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <?php if($v['brest'] < 3){ ?>
                                                    <div class="uk-width-medium-1-3">
                                                        <label for="user_edit_uname_control">Birth Month</label>
                                                        <select id="select_demo_4" class="monthh md-input"  name="birth_month">
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
                                                    </div>
                                                    <div class="uk-width-medium-1-3">
                                                        <label for="user_edit_uname_control">Birth Day</label>
                                                        <select id="select_demo_4" class="birth_datee md-input" name="birth_date">
                                                            <?php for($i=1;$i<=31;$i++){ ?>
                                                                <option <?= ($v['birth_date'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                <?php } ?>
                                                <div class="uk-width-medium-1-3">
                                                    <label for="user_edit_uname_control">Age Group</label>
                                                    <select id="select_demo_4"  class="md-input" name="age_group">
                                                        <option <?= ($v['age_group'] == "9")? "selected" : ""; ?> value="9"> 0 - 9 </option>
                                                        <option <?= ($v['age_group'] == "18")? "selected" : ""; ?> value="18"> 10 - 18 </option>
                                                        <option <?= ($v['age_group'] == "29")? "selected" : ""; ?> value="29"> 19 - 29 </option>
                                                        <option <?= ($v['age_group'] == "39")? "selected" : ""; ?> value="39"> 30 - 39 </option>
                                                        <option <?= ($v['age_group'] == "40")? "selected" : ""; ?> value="49"> 40 - 49 </option>
                                                        <option <?= ($v['age_group'] == "69")? "selected" : ""; ?> value="69"> 50 - 69 </option>
                                                        <option <?= ($v['age_group'] == "70")? "selected" : ""; ?> value="70"> Above 70 </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-3">
                                                    <label for="user_edit_uname_control" style="top: -14px;">Country of birth</label>
                                                    <select id="select_demo_4" class="md-input" name="nativeCountry">
                                                    <?php if(!empty($v['nativeCountry'])){ ?>    
                                                    <option selected value='<?= $v['nativeCountry'] ?>'><?= $v['nativeCountry'] ?></option>
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
                                                </div>
                                                <div class="uk-width-medium-1-3"></div>
                                                <div class="uk-width-medium-1-3"></div>
                                            </div>
                                            <div class="uk-form-row">
                                                <span>Member of Church Since</span> <span style="color: red;">*</span>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <select name="member_since_month" id="member_since_month" class="md-input" required>
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
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <select name="member_since_year" class="md-input" id="member_since_year" required>
                                                            <option value="">Select Year</option>
                                                            <?php for($i=1980;$i<=date('Y');$i++){ ?>
                                                                <option <?= ($v['member_since_year'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <p style="font-weight: bold">Current Address</p>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Address Line 1 <span style="color: red;">*</span></label>
                                                    <input class="md-input" type="text" name="address" id="address" value="<?= $v['address'] ?>" required/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Address Line 2</label>
                                                    <input class="md-input" type="text" name="address2" value="<?= $v['address2'] ?>"/>
                                                </div>
                                                <div class="uk-width-medium-1-3">
                                                    <label for="user_edit_uname_control">Town <span style="color: red;">*</span></label>
                                                    <input class="md-input" type="text" name="town" id="town" value="<?= $v['town'] ?>" required/>
                                                </div>
                                                <div class="uk-width-medium-1-3">
                                                    <label for="user_edit_uname_control">Post Code <span style="color: red;">*</span></label>
                                                    <input class="md-input" type="text" name="poatalCode" id="poatalCode" required value="<?= $v['poatalCode'] ?>"/>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control" style="top: 0px;">Country of Residence</label>
                                                    <select id="select_demo_4" class="md-input" name="country">
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
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <select name="businessGroup" class="md-input" id="bgroup" required>
                                                        <option value="">Profession / Business Group <span style="color: red;">*</span></option>
                                                        <?php foreach($businessGroup as $val){ ?>
                                                            <option <?= ($val['id'] == $v['businessGroup']) ? "selected" : ""; ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <select name="employement" id="employ" class="md-input" required>
                                                        <option value="">Job Status <span style="color: red;">*</span></option>
                                                        <option <?= ($v['employement'] == "employed")? "selected" : ""; ?> value="employed">Employed</option>
                                                        <option <?= ($v['employement'] == "unemployed")? "selected" : ""; ?> value="unemployed">Unemployed</option>
                                                        <option <?= ($v['employement'] == "self employed")? "selected" : ""; ?> value="self employed">Self Employed</option>
                                                        <option <?= ($v['employement'] == "director")? "selected" : ""; ?> value="director">Director</option>
                                                        <option <?= ($v['employement'] == "student")? "selected" : ""; ?> value="student">Student</option>
                                                        <option <?= ($v['employement'] == "retired")? "selected" : ""; ?> value="retired">Retired</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <select name="maritalStatus" id="marital" class="md-input" required>
                                                        <option value="">Marital Status <span style="color: red;">*</span></option>
                                                        <option <?= ($v['maritalStatus'] == "single")? "selected" : ""; ?> value="single">Single</option>
                                                        <option <?= ($v['maritalStatus'] == "married")? "selected" : ""; ?> value="married">Married</option>
                                                        <option <?= ($v['maritalStatus'] == "divorced")? "selected" : ""; ?> value="divorced">Divorced</option>
                                                        <!--<option value="director">Director</option>-->
                                                        <!--<option value="student">Student</option>-->
                                                        <!--<option value="retired">Retired</option>-->
                                                    </select>
                                                </div>
                                            </div>
                                            <!--<div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <label for="user_edit_personal_info_control">Profession</label>
                                                    <textarea class="md-input" name="career" id="user_edit_personal_info_control" cols="30" rows="4"><?/*= $v['career'] */?></textarea>
                                                </div>
                                            </div>-->
                                            <div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <label for="user_edit_personal_info_control">About Me <span style="color: red;">*</span></label>
                                                    <textarea class="md-input" name="biography" id="biography" cols="30" rows="4" required><?= $v['biography'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin-top">
                                            <label for="user_edit_personal_info_control">Church Groups <span style="color: red;">*</span></label>
                                            <br/>
                                            <?php for($i=0;$i<5;$i++){ ?>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <select id="select_demo_4_<?= $i ?>" class="md-input" name="groups[<?= $i ?>]" <?php if($i == 0) {echo 'required'; }?>>
                                                            <option value="none">None</option>
                                                            <?php foreach($chrchgrps as $k=>$val){ ?>
                                                                <option <?= (isset($membGroup1[$i]) AND ($val['id'] == $membGroup1[$i])) ? "selected" : ""; ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php /*foreach($membGroup as $k=>$val){ */?><!--
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Group <?/*= $k + 1; */?></label>
                                                        <input class="md-input" readonly type="text" value="<?/*= $val['groupname'] */?>" />
                                                    </div>
                                                </div>
                                            --><?php /*} */?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                Enter your Child's details below
                                            </h3>
                                            <span class="md-btn md-btn-danger" onclick="addChild()">Add +</span>
                                            <div id="child">
                                            </div>
                                            <br/>
                                                <?php $ci = 0; ?>
                                                <?php foreach($v['child'] as $ch){ ?>
                                                        <div class="uk-grid" data-uk-grid-margin>
                                                            <div class="uk-width-medium-1-2">
                                                                <label for="user_edit_uname_control">First Name</label>
                                                                <input class="md-input" type="text"  id="user_edit_uname_control" name="child[<?= $ci ?>][<?= 'fname' ?>]" value="<?= $ch['fname'] ?>"/>
                                                            </div>
                                                            <div class="uk-width-medium-1-2">
                                                                <label for="user_edit_uname_control">Last Name</label>
                                                                <input class="md-input" type="text"  id="user_edit_uname_control" name="child[<?= $ci ?>][<?= 'lname' ?>]" value="<?= $ch['lname'] ?>"/>
                                                            </div>

                                                            <div class="uk-width-medium-1-2">
                                                                <label for="user_edit_uname_control">Month Of Birth</label>
                                                                <select name="child[<?= $ci ?>][month]" id="" class="md-input">
                                                                    <option <?= ($ch['month'] == '1') ? "selected" : ""; ?> value='1'>January</option>
                                                                    <option <?= ($ch['month'] == "2") ? "selected" : ""; ?> value='2'>February</option>
                                                                    <option <?= ($ch['month'] == '3 ')? "selected" : ""; ?> value='3'>March</option>
                                                                    <option <?= ($ch['month'] == "4")? "selected" : ""; ?> value='4'>April</option>
                                                                    <option <?= ($ch['month'] == "5")? "selected" : ""; ?> value='5'>May</option>
                                                                    <option <?= ($ch['month'] == "6")? "selected" : ""; ?> value='6'>June</option>
                                                                    <option <?= ($ch['month'] == "7")? "selected" : ""; ?> value='7'>July</option>
                                                                    <option <?= ($ch['month'] == "8")? "selected" : ""; ?> value='8'>August</option>
                                                                    <option <?= ($ch['month'] == "9")? "selected" : ""; ?> value='9'>September</option>
                                                                    <option <?= ($ch['month'] == "10")? "selected" : ""; ?> value='10'>October</option>
                                                                    <option <?= ($ch['month'] == "11")? "selected" : ""; ?> value='11'>November</option>
                                                                    <option <?= ($ch['month'] == "12")? "selected" : ""; ?> value='12'>December</option>
                                                                </select>
                                                            </div>
                                                            <div class="uk-width-medium-1-2">
                                                                <label for="user_edit_uname_control">Day Of Birth</label>
                                                                <select name="child[<?= $ci ?>][day]" id="" class="md-input">
                                                                    <?php for($i=1;$i<=31;$i++){ ?>
                                                                        <option <?= ($ch['day'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="uk-width-medium-1-2">
                                                                <label for="user_edit_age_group">Age Group</label>
                                                                <select id="select_demo_4"  class="md-input" name="child[<?= $ci; ?>][<?= 'age_group'?>]">
                                                                    <option value="">Select Age Group</option>
                                                                    <option <?= ($ch['age_group'] == "9")? "selected" : ""; ?> value="9"> 0 - 9 </option>
                                                                    <option <?= ($ch['age_group'] == "12")? "selected" : ""; ?> value="12"> 10 - 12 </option>
                                                                    <option <?= ($ch['age_group'] == "18")? "selected" : ""; ?> value="18"> 13 - 18 </option>
                                                                    <option <?= ($ch['age_group'] == "29")? "selected" : ""; ?> value="29"> 19 - 29 </option>
                                                                    <option <?= ($ch['age_group'] == "39")? "selected" : ""; ?> value="39"> 30 - 39 </option>
                                                                    <option <?= ($ch['age_group'] == "40")? "selected" : ""; ?> value="49"> 40 - 49 </option>
                                                                    <option <?= ($ch['age_group'] == "69")? "selected" : ""; ?> value="69"> 50 - 69 </option>
                                                                    <option <?= ($ch['age_group'] == "70")? "selected" : ""; ?> value="70"> Above 70 </option>
                                                                </select>
                                                            </div>
                                                            <div class="uk-width-medium-1-2">
                                                                <label for="user_edit_uname_control">Gender</label>
                                                                <select name="child[<?= $ci ?>][<?= 'gender' ?>]" class="md-input">
                                                                    <option <?= ($ch['gender'] == 'male')? "selected" : ""; ?> value="male">Male</option>
                                                                    <option <?= ($ch['gender'] == 'female')? "selected" : ""; ?> value="female">Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="uk-width-medium-1-2">
                                                                <label for="user_edit_uname_control">Email</label>
                                                                <input class="md-input" type="email"  id="user_edit_uname_control" name="child[<?= $ci ?>][<?= 'email' ?>]" value="<?= $ch['email'] ?>"/>
                                                            </div>
                                                            <div class="uk-width-medium-1-2">
                                                                <label for="user_edit_uname_control">Mobile</label>
                                                                <input class="md-input" type="text"  id="user_edit_uname_control" name="child[<?= $ci ?>][<?= 'mobile' ?>]" value="<?= $ch['mobile'] ?>"/>
                                                            </div>
                                                        </div>
                                                    <br>
                                                    <hr>
                                                    <br>
                                                <?php $ci++; } ?>
                                            <script> ci = <?= $ci; ?>; </script>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                Enter your Grand Child's details below
                                            </h3>
                                            <span class="md-btn md-btn-danger" onclick="addgrandChild()">Add +</span>
                                            <div id="grandChild">
                                            </div>
                                            <br/>

                                            <?php $ci = 0; ?>
                                            <?php foreach($v['grandChild'] as $ch){ ?>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">First Name</label>
                                                        <input class="md-input" type="text"  id="user_edit_uname_control" name="grandChild[<?= $ci ?>][<?= 'fname' ?>]" value="<?= $ch['fname'] ?>"/>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Last Name</label>
                                                        <input class="md-input" type="text"  id="user_edit_uname_control" name="grandChild[<?= $ci ?>][<?= 'lname' ?>]" value="<?= $ch['lname'] ?>"/>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Month Of Birth</label>
                                                        <select name="grandChild[<?= $ci ?>][month]" id="" class="md-input">
                                                            <option <?= ($ch['month'] == '1') ? "selected" : ""; ?> value='1'>January</option>
                                                            <option <?= ($ch['month'] == "2") ? "selected" : ""; ?> value='2'>February</option>
                                                            <option <?= ($ch['month'] == '3 ')? "selected" : ""; ?> value='3'>March</option>
                                                            <option <?= ($ch['month'] == "4")? "selected" : ""; ?> value='4'>April</option>
                                                            <option <?= ($ch['month'] == "5")? "selected" : ""; ?> value='5'>May</option>
                                                            <option <?= ($ch['month'] == "6")? "selected" : ""; ?> value='6'>June</option>
                                                            <option <?= ($ch['month'] == "7")? "selected" : ""; ?> value='7'>July</option>
                                                            <option <?= ($ch['month'] == "8")? "selected" : ""; ?> value='8'>August</option>
                                                            <option <?= ($ch['month'] == "9")? "selected" : ""; ?> value='9'>September</option>
                                                            <option <?= ($ch['month'] == "10")? "selected" : ""; ?> value='10'>October</option>
                                                            <option <?= ($ch['month'] == "11")? "selected" : ""; ?> value='11'>November</option>
                                                            <option <?= ($ch['month'] == "12")? "selected" : ""; ?> value='12'>December</option>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Day Of Birth</label>
                                                        <select name="grandChild[<?= $ci ?>][day]" id="" class="md-input">
                                                            <?php for($i=1;$i<=31;$i++){ ?>
                                                                <option <?= ($ch['day'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_age_group_control">Age Group</label>
                                                        <select name="grandChild[<?= $ci ?>][<?= 'age_group' ?>]" class="md-input">
                                                            <option value="">Select Age Group</option>
                                                            <option <?= ($ch['age_group'] == "9")? "selected" : ""; ?> value="9"> 0 - 9 </option>
                                                            <option <?= ($ch['age_group'] == "12")? "selected" : ""; ?> value="12"> 10 - 12 </option>
                                                            <option <?= ($ch['age_group'] == "18")? "selected" : ""; ?> value="18"> 13 - 18 </option>
                                                            <option <?= ($ch['age_group'] == "29")? "selected" : ""; ?> value="29"> 19 - 29 </option>
                                                            <option <?= ($ch['age_group'] == "39")? "selected" : ""; ?> value="39"> 30 - 39 </option>
                                                            <option <?= ($ch['age_group'] == "40")? "selected" : ""; ?> value="49"> 40 - 49 </option>
                                                            <option <?= ($ch['age_group'] == "69")? "selected" : ""; ?> value="69"> 50 - 69 </option>
                                                            <option <?= ($ch['age_group'] == "70")? "selected" : ""; ?> value="70"> Above 70 </option>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Gender</label>
                                                        <select name="grandChild[<?= $ci ?>][<?= 'gender' ?>]" class="md-input">
                                                            <option <?= ($ch['gender'] == 'male')? "selected" : ""; ?> value="male">Male</option>
                                                            <option <?= ($ch['gender'] == 'female')? "selected" : ""; ?> value="female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Email</label>
                                                        <input class="md-input" type="email"  id="user_edit_uname_control" name="grandChild[<?= $ci ?>][<?= 'email' ?>]" value="<?= $ch['email'] ?>"/>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Mobile</label>
                                                        <input class="md-input" type="text"  id="user_edit_uname_control" name="grandChild[<?= $ci ?>][<?= 'mobile' ?>]" value="<?= $ch['mobile'] ?>"/>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr>
                                                <br>
                                                <?php $ci++; } ?>
                                            <script> gci = <?= $ci; ?> </script>
                                        </div>
                                    </li>
                                </ul>
                                <!--<div class="md-fab md-fab-toolbar md-fab-small md-fab-accent" style="width:68px;background:#7cb342;position:static;z-index:auto;right:auto;bottom:auto;box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);    border-radius: 4px;transition: all 280ms cubic-bezier(.4, 0, .2, 1);-->
    <!--cursor: default;">-->
                                        <!--<div style="visibility:visible;white-space:nowrap;padding:0 16px;overflow:hidden;box-sizing:border-box;display:block;">-->
                                            <button type="submit" id="user_edit_save" class="md-btn md-btn-success">
                                                <span>Save</span>
                                            </button>
                                        <!--</div>-->
                                    <!--</div>-->
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-3-10">
                        <div class="md-card">
                            <div class="md-card-content">
                                <h3 class="heading_c uk-margin-medium-bottom">Other settings</h3>
                                <div class="uk-form-row">
                                    <input type="checkbox" <?php if($v['visiblity'] == 'online'){ echo "checked"; } ?> value="online" name="visiblity" data-switchery id="user_edit_active" />
                                    <label for="user_edit_active" class="inline-label">User Searchable</label>
                                </div>
                                <hr class="md-hr">
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

<script src="<?= base_url('assets_new') ?>/assets/js/custom/uikit_fileinput.min.js"></script>
<script>

    function removeGrand(id){
        $("#grandChildField"+id).remove();
    }
    
    function deleteImageFrom(gender, id){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h3>Are you sure you want to delete Image?</h3>' +
            '<span  onclick="deleteImage(' + id + ')" class="md-btn md-btn-primary addToBuddiesss">Yes</span>'+
            '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
            '</div>'+
            '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
    
    function deleteImage(id){
            UIkit.modal("#newModalAdv").hide();
            $.post("<?= site_url('home/ajax/deleteImage') ?>",{id:id},function(e){
                swal('success', 'Image Deleted Successfully.', 'success');
                window.location.reload();
            });
    }
    
    function addgrandChild(){
        console.log("["+gci+"]");
        var gchild = "<div id='grandChildField"+gci+"' style='padding: 15px 15px;border:1px #e8e8e8 solid'>" +
            "<a onclick='removeGrand("+ gci +")'>&times;</a> " +
            "<div class='row'></div> " +


            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>First Name</label> " +
            "<input type='text' class='md-input' name='grandChild["+gci+"][fname]'> " +
            "</div> " +

            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Last Name</label> " +
            "<input type='text' class='md-input' name='grandChild["+gci+"][lname]'> " +
            "</div> " +
            "</div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label>Birth Month</label>"+
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
            "<label>Birth Day</label>"+
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
            "<label class=''>Age Group</label>"+
            "<select class='md-input' id='' name='grandChild["+gci+"][age_group]'> "+
            "<option value=''>Select Age Group</option>"+
            "<option value='9'>0 - 9</option>"+
            "<option value='12'>10 - 12</option>"+
            "<option value='18'>13 - 18</option>"+
            "<option value='29'>19 - 29</option>"+
            "<option value='39'>30 - 39</option>"+
            "<option value='49'>40 - 49</option>"+
            "<option value='69'>50 - 69</option>"+
            "<option value='70'>Above 70</option>"+
            "</select>"+
            "</div>"+
            "</div>"+
            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +

            "<div class='radios'> " +
            "<label class='label_radio col-lg-6 col-sm-6' for='radio-01'> " +
            "<input name='grandChild["+gci+"][gender]' id='radio-01' value='male' type='radio' checked /> Male " +
            "</label> " +
            "<label class='label_radio col-lg-6 col-sm-6' for='radio-02'> " +
            "<input name='grandChild["+gci+"][gender]' id='radio-02' value='female' type='radio' /> Female " +
            "</label> " +
            "</div>" +

            "</div>" +
            "</div>" +


            "<div class='row'></div> <br/>" +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Grand Child Email</label> " +


            "<p><input onchange='gchildEmail("+gci+")' id='gchildEmail"+gci+"' type='checkbox'>Enter Grand Child Email or tick box to enter your own</p>" +
            "<input type='email' class='md-input' name='grandChild["+gci+"][email]' id='gchildEmailval"+gci+"' placeholder='Enter Email' > " +
            "</div> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Grand Child Mobile</label> " +


            "<p><input onchange='gchildMobilee("+gci+")' id='gchildMobilec"+gci+"' type='checkbox'>Enter Grand Child Mobile or tick box to enter your own</p>" +
            "<input type='tel' class='md-input' name='grandChild["+gci+"][mobile]' id='gchildMobileval"+gci+"' placeholder='Enter Mobile' > " +
            "</div> " +
            "</div> " +


            "</div>" +
            "<hr/><div class='row'></div>";
        $("#grandChild").prepend(gchild);
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
        var child = "<div id='ChildField"+ci+"' style='padding: 15px 15px;border:1px #e8e8e8 solid'> " +
            "<a onclick='removechild("+ ci +")'>&times;</a> " +
            "<div class='row'></div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>First Name </label> " +
            "<input type='text' class='md-input' name='child["+ci+"][fname]'> " +
            "</div> " +

            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Last Name </label> " +
            "<input type='text' class='md-input' name='child["+ci+"][lname]'> " +
            "</div> " +
            "</div> " +

            "<div class='uk-grid' data-uk-grid-margin> " +
            "<div class='uk-width-medium-1-2'>" +
            "<label for='user_edit_uname_control'>Birth Month</label> " +
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
        "<label for='user_edit_uname_control'>Birth Day</label> " +
        "<select class='md-input' id='childd"+ci+"' name='child["+ci+"][day]'> ";
        for(var i = 1; i<=31;i++){
            child += "<option value='"+i+"'>"+i+"</option>";
        }
        child += "</select>" +
        "</div> " +
        "</div>" +
        "<div class='row'></div> </br>" +
        "<div class='col-md-6'> "+
        "<label for='user_edit_age_group_control'>Age Group</label>" +
        "<select class='md-input' id='' name='child["+ci+"][age_group]'> "+
        "<option value=''>Select Age Group</option>"+
        "<option value='9'>0 - 9</option>"+
        "<option value='12'>10 - 12</option>"+
        "<option value='18'>13 - 18</option>"+
        "<option value='29'>19 - 29</option>"+
        "<option value='39'>30 - 39</option>"+
        "<option value='49'>40 - 49</option>"+
        "<option value='69'>50 - 69</option>"+
        "<option value='70'>Above 70</option>"+
        "</select>"+
        "</div>" +
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
        "<div class='row'></div> </br>" +
        "<div class='uk-grid' data-uk-grid-margin> " +
        "<div class='uk-width-medium-1-2'>" +
        "<label for='user_edit_uname_control'>Child Email</label> " +
        "<p><input onchange='cchildEmail("+ci+")' id='cchildEmail"+ci+"' type='checkbox'>Enter Child Email or tick box to enter your own</p>" +
        "<input type='email' class='md-input' name='child["+ci+"][email]' id='cchildEmailval"+ci+"' placeholder='Enter Email' > " +
        "</div> " +

        "<div class='uk-width-medium-1-2'>" +
        "<label for='user_edit_uname_control'>Child Mobile</label> " +
        "<p><input onchange='cchildMobilee("+ci+")' id='cchildMobilec"+ci+"' type='checkbox'>Enter Child Mobile or tick box to enter your own</p>" +
        "<input type='tel' class='md-input' name='child["+ci+"][mobile]' id='cchildMobileval"+ci+"' placeholder='Enter Mobile' > " +
        "</div> " +
        "</div> " +
        "</div> " +
        "</div>" +
        "<hr/><div class='row'></div>";

        $("#child").prepend(child);
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
    $(".monthh").change(function(){
        var a = "";
        var month = $(".monthh").val();console.log(month)

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
        //$(".birth_datee").html(a);
    });
    function checkValueGroup(){
        var first = $('#select_demo_4_0').val();
        var second = $('#select_demo_4_1').val();
        var third = $('#select_demo_4_2').val();
        var forth = $('#select_demo_4_3').val();
        var fifth = $('#select_demo_4_4').val();
        if(first == second && (first != 'none' || second != 'none')){
            alert('First and second Church Groups can\'t be same.');
            return false;
        }else if(first == third && (first != 'none' || third != 'none')){
            alert('First and third Church Groups can\'t be same.');
            return false;
        }else if(first == forth && (first != 'none' || forth != 'none')){
            alert('First and forth Church Groups can\'t be same.');
            return false;
        }else if(first == fifth && (first != 'none' || fifth != 'none')){
            alert('First and fifth Church Groups can\'t be same.');
            return false;
        }else if(second == third && (second != 'none' || third != 'none')){
            alert('Second and third Church Groups can\'t be same.');
            return false;
        }else if(second == forth && (second != 'none' || forth != 'none')){
            alert('Second and forth Church Groups can\'t be same.');
            return false;
        }else if(second == fifth && (second != 'none' || fifth != 'none')){
            alert('Second and fifth Church Groups can\'t be same.');
            return false;
        }else if(third == forth && (third != 'none' || forth != 'none')){
            alert('Third and forth Church Groups can\'t be same.');
            return false;
        }else if(third == fifth && (third != 'none' || fifth != 'none')){
            alert('Third and fifth Church Groups can\'t be same.');
            return false;
        }else if(forth == fifth && (forth != 'none' || fifth != 'none')){
            alert('Forth and fifth Church Groups can\'t be same.');
            return false;
        }else{
            return true;
        }
    }
$('#leftRotate').on('click', function(){
   var img = $('#blah');
    var degree = $(this).val();
    var right = $('#rightRotate').val();
    img.width = 200;
    img.height = 200;
    degree = parseInt(degree) + parseInt(90);
    if(degree >= 360){
        // alert('hello');
        $('#leftRotate').val('0');
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
    $('#leftRotate').val(degree);
    $('#rightRotate').val(degree);
});

$('#rightRotate').on('click', function(){
   var img = $('#blah');
    var degree = $(this).val();
    var right = $('#rightRotate').val();
    img.width = 200;
    img.height = 200;
    degree = parseInt(degree) - parseInt(90);
    if(degree >= 360){
        // alert('hello');
        $('#rightRotate').val('0');
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
    $('#rightRotate').val(degree);
    $('#leftRotate').val(degree);
});
$(document).ready(function(){
   $('.fileinput-preview').attr('id', 'blah'); 
});

$('#user_edit_save').on('click', function(){
    var email = $('#email').val();
    var hobbies = $('#hobbies').val();
    var member_since_month = $('#member_since_month').val();
    var member_since_year = $('#member_since_year').val();
    var address = $('#address').val();
    var town = $('#town').val();
    var poatalCode = $('#poatalCode').val();
    var bgroup = $('#bgroup').val();
    var employ = $('#employ').val();
    var marital = $('#marital').val();
    var biography = $('#biography').val();
    if(email != '' || email != null || email != undefined){
        if(hobbies != '' || hobbies != null || hobbies != undefined){
            if(member_since_month != '' || member_since_month != null || member_since_month != undefined){
                if(member_since_year != '' || member_since_year != null || member_since_year != undefined){
                    if(address != '' || address != null || address != undefined){
                        if(town != '' || town != null || town != undefined){
                            if(poatalCode != '' || poatalCode != null || poatalCode != undefined){
                                if(bgroup != '' || bgroup != null || bgroup != undefined){
                                    if(employ != '' || employ != null || employ != undefined){
                                        if(marital != '' || marital != null || marital != undefined){
                                            if(biography != '' || biography != null || biography != undefined){
                                                
                                                return true;
                                            }else{
                                                UIkit.notify({
                                                    message : 'About me is required.',
                                                    status  : 'warning',
                                                    timeout : 2000,
                                                    pos     : 'top-center'
                                                });
                                                return false;
                                            }
                                        }else{
                                            UIkit.notify({
                                                message : 'Marital Status is required.',
                                                status  : 'warning',
                                                timeout : 2000,
                                                pos     : 'top-center'
                                            });
                                            return false;
                                        }
                                    }else{
                                        UIkit.notify({
                                            message : 'Employement Status is required.',
                                            status  : 'warning',
                                            timeout : 2000,
                                            pos     : 'top-center'
                                        });
                                        return false;
                                    }
                                }else{
                                    UIkit.notify({
                                        message : 'Business Group is required.',
                                        status  : 'warning',
                                        timeout : 2000,
                                        pos     : 'top-center'
                                    });
                                    return false;
                                }
                            }else{
                                UIkit.notify({
                                    message : 'Post Code is required.',
                                    status  : 'warning',
                                    timeout : 2000,
                                    pos     : 'top-center'
                                });
                                return false;
                            }
                        }else{
                            UIkit.notify({
                                message : 'Town is required.',
                                status  : 'warning',
                                timeout : 2000,
                                pos     : 'top-center'
                            });
                            return false;
                        }
                    }else{
                        UIkit.notify({
                            message : 'Address is required.',
                            status  : 'warning',
                            timeout : 2000,
                            pos     : 'top-center'
                        });
                        return false;
                    }
                }else{
                    UIkit.notify({
                        message : 'Member since year is required.',
                        status  : 'warning',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                    return false;
                }
            }else{
                UIkit.notify({
                    message : 'Member since month is required.',
                    status  : 'warning',
                    timeout : 2000,
                    pos     : 'top-center'
                });
                return false;
            }
        }else{
           UIkit.notify({
                message : 'Hobbies are required.',
                status  : 'warning',
                timeout : 2000,
                pos     : 'top-center'
            }); 
            return false;
        }
    }else{
        UIkit.notify({
            message : 'Email address is required.',
            status  : 'warning',
            timeout : 2000,
            pos     : 'top-center'
        });
        return false;
    }
});
</script>
<script>
    <?php if(isset($_GET['action']) AND $_GET['action'] == 'age'){ ?>
        window.localStorage.setItem("member<?= $v['id']; ?>","true");
    <?php } ?>
</script>