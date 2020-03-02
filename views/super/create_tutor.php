<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="tutors.php">Tutors</a></li>
                    <li><a href="#">Create Tutor</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Create Tutor</header>
                    <div class="panel-body">
                        <?= form_open_multipart('super/insert/tutors/tutors', array('class' => 'form-horizontal')); ?>
                        <fieldset>
                            <legend style="padding : 0 0 5px 0;">Personal Info</legend>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor FirstName</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required placeholder="Enter First Name" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Last Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required placeholder="Enter Last Name" name="lname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Date Of Birth</label>

                                <div class="col-lg-10">
                                    <input type="date" class="form-control" required name="dob">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">
                                    Tutor Gender
                                </label>

                                <div class="col-lg-10">
                                    <select class="form-control" name="gender" id="">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend style="padding : 0 0 5px 0;">Contact Info</legend>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Address Line</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required id="inputEmail1"  placeholder="Enter tutor address" name="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Address Line 2</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required id="inputEmail1" placeholder="Enter tutor address" name="address2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Address Line 3</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required id="inputEmail1" placeholder="Enter tutor address" name="address3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Postcode</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="postal" placeholder="Enter tutor postcode" required placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Country</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="country" required placeholder="Enter tutor country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor City</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="city" required placeholder="Enter tutor city">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Email</label>

                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="email" required placeholder="Enter tutor email address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Telephone Contact</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="contacts" required placeholder="Enter tutor telephone # ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Mobile Contact</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="mobile" required placeholder="Enter tutor mobile #">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Subjects</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required id="inputEmail1" placeholder="Comma Separated Subjects (example: physics,math)" name="subjects">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Year Groups</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required id="inputEmail1" placeholder="Comma Separated Year Groups (example: KS1, KS2, KS3)" name="year_group">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Password</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="password" required placeholder="Enter Password for tutor">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend style="padding: 0 0 5px 0;">Documents</legend>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Upload Tutor Photograph</label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" name="profile_pic" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Biography</label>
                                <div class="col-lg-10">
                                    <textarea id="" cols="30" rows="4" name="bio" class="form-control" placeholder="Enter Tutor's Biography"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor DBS Record</label>
                                <div class="col-lg-10">
                                    <input type="text" name="dbs_record" class="form-control" required placeholder="Enter DBS expiry date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Upload DBS file</label>
                                <div class="col-lg-10">
                                    <input type="file" name="dbs_file" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='' class='col-lg-2 col-sm-2 control-label'>Tutor Qualifications</label>

                                <div class='col-lg-10'>
                                    <input type='text' class='form-control' name='qualification' placeholder='Enter tutor qualifications'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='' class='col-lg-2 col-sm-2 control-label'>Upload file</label>
                                <div class='col-lg-10'>
                                    <input type='file' class='form-control' placeholder=''>
                                </div>
                            </div>
                            <a onclick="addMoreQualification()">Add More</a>
                            <br/>
                            <br/>
                            <div id="qualifications"></div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">
                                    Tutor Nationality
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="nationality" required placeholder="Enter passport country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Passport Expiry</label>

                                <div class="col-lg-10">
                                    <input name="passport_expiry" type="text" class="form-control" required placeholder="Enter passport expiry">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Upload Passport file</label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Expertise</label>
                                <div class="col-lg-10">
                                    <table class="table table-border">
                                        <tr>
                                            <td><input name="tutor_expertise[]" value="primary" type="checkbox" id="primary"/></td>
                                            <td><label for="primary">Primary</label></td>
                                            <td><input name="tutor_expertise[]" value="secondary" type="checkbox" id="secondary"/></td>
                                            <td><label for="secondary">Secondary</label></td>
                                        </tr>
                                        <tr>
                                            <td><input name="tutor_expertise[]" value="secondary" type="checkbox" id="secondaty"/></td>
                                            <td><label for="secondaty">Secondary</label></td>
                                            <td><input name="tutor_expertise[]" value="a-level" type="checkbox" id="alevel"/></td>
                                            <td><label for="alevel">A-Level</label></td>
                                        </tr>
                                        <tr>
                                            <td><input name="tutor_expertise[]" value="university" type="checkbox" id="uni"/></td>
                                            <td><label for="uni">University</label></td>
                                            <td><input name="tutor_expertise[]" value="intermediate" type="checkbox" id="inter"/></td>
                                            <td><label for="inter">Intermediate</label></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-sm-2 control-label">Tutor Sector</label>
                                <div class="col-lg-10">
                                    <table>
                                        <tr>
                                            <td><input type="checkbox" id="schooling" name="sector[]" value="schooling"/>
                                            </td>
                                            <td><label for="schooling">School</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" id="private" name="sector[]" value="private"/></td>
                                            <td><label for="private">Private</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" id="g1" name="sector[]"
                                                       value="government-supplementry"/></td>
                                            <td><label for="g1">Government Supplementary</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" id="g2" name="sector[]"
                                                       value="government-alternative"/></td>
                                            <td><label for="g2">Government Alternative</label></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-danger">Create Tutor</button>
                                </div>
                            </div>
                        </fieldset>
                        <?= form_close(); ?>
                    </div>
                </section>

            </div>
        </div>
    </section>
</section>