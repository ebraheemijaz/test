<style>
    .chosen-choices{
        padding: 10px !important;
        border-radius: 5px;
    }
    .error {
        color: red;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Create Register</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Create Register</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/insert/attendanceClass/viewClasses',array("id" => "attendanceForm", "class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                <strong>Class Name</strong><span style="color: red;">*</span><br/>
                                <input type="text" class="form-control" name="className" id="className" required="required" placeholder="Enter Class Name" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <strong>Age Group</strong><span style="color: red;">*</span><br/>
                                <select name="ageGroup" required class="form-control chosen-select" placeholder="Select Age Group" id="general">
                                    <option value="">Select Age Group</option>
                                    <?= $ageGroup = $this->data->fetch('ageGroup'); ?>
                                    <?php foreach($ageGroup as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['ageGroup'] ?> Years</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br/>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <strong>Teacher-In-charge</strong><span style="color: red;">*</span><br/>
                                <select name="teacherInCharge[]" required multiple class="form-control chosen-select teachInCharge" placeholder="Select Teacher In Charge" id="teacher">
                                    <?php $generalIn = $this->data->myquery('SELECT * FROM `member` WHERE `status` = "active" ORDER BY lname ASC'); ?>
                                    <?php foreach($generalIn as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <strong>Chidrens</strong>
                                <div id="mem">
                                    <select name="childrens[]" id="childrens" required multiple placeholder="Select atleast one child" id="members" class="form-control chosen-select">
                                        <?= $children = $this->data->myquery("SELECT * FROM `children` WHERE NULLIF(fname, '') IS NOT NULL AND NULLIF(lname, '') IS NOT NULL AND classId IS NULL AND isAlotted = 0"); ?>
                                        <?php foreach($children as $val){?>
                                            <option value="<?= $val['id'] ?>"><?= $val['lname'] ?> <?= $val['fname'] ?> (<?= ucfirst($val['relation']) ?>)</option>
                                        <?php 
                                        } ?>
                                    </select>
                                </div>
                                <div><small style="color: red;">Please Add atleast 1 Child or Grand Child.</small></div>
                            </div>
                            <!--<br/>-->
                            <!--<div class="row">-->
                            <!--    <div class="col-md-12">-->
                            <!--        <strong id="childrenCount">0 Child Selected</strong>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="row"></div>
                            <br/>
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
                                <br/>
                                <button class="btn btn-lg btn-login btn-block" type="submit" onclick="return submitForm()">Create Group</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
<script>
    $('#attendanceForm').validate({
        rules: {
            className: "required",
            ageGroup: "required",
            teacherInCharge: "required",
            childrens: "required"
        },
        messages: {
            className: "Please enter class name",
            ageGroup: "Please enter age group",
            teacherInCharge: "Please select atleast one teacher-in-charge.",
            childrens: "Please select atleast one child and grand child."
        },
        ignore: ":hidden:not(select)",
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#general").chosen({
        placeholder_text_multiple: 'Select Teacher In Charge'
    });
</script>
<script>
    // $('#general').on('change', function(){
    //     generals = $(this).val();
    //     $.post("<?= site_url('admin/selectMember'); ?>",{generalId:generals},function(a){
    //         console.log(a);
    //         $('#mem').html(a);
    //         $('.chosen-select').chosen({
    //             placeholder_text_multiple: 'Please select atleast 1 Member.'
    //         });
    //     });
    // });
    
    $("#type").change(function(){
        var a = $("#type").val();
        if(a == "hard"){}
    });
    
    $(document).ready(function(){
        $('#general_chosen .search_field input').attr('placeholder', 'Testing'); 
    });
    
    function submitForm()
    {
        // alert('Here');
        var general = $('#general :selected').length;
        // alert(general);
        if(general <= 10){
            return true;
        }else if(general == 0){
            alert('Please select atleast one general in-charge.');
            return false;
        }else{
            alert('You have exceed the limit of general in-charge selection.');
            return false;
        }
    }
</script>