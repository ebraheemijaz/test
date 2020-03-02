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
                    <li><a href="">Create H.O.D.</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Create H.O.D.</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/insert/HOD/viewHOD',array("id" => "attendanceForm", "class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                <strong>Member</strong><span style="color: red;">*</span><br/>
                                <select name="member" required class="form-control chosen-select teachInCharge" placeholder="Select Member" id="teacher">
                                    <?php $generalIn = $this->data->myquery('SELECT * FROM `member` WHERE `status` = "active" ORDER BY lname ASC'); ?>
                                    <?php foreach($generalIn as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <strong>Department Name</strong><span style="color: red;">*</span><br/>
                                <input type="text" class="form-control" name="departmentName" id="departmentName" required="required" placeholder="Enter Department Name" autofocus>
                            </div>
                            <br/>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <strong>Department Position</strong><span style="color: red;">*</span><br/>
                                <input type="text" class="form-control" name="departmentPosition" id="departmentPosition" required="required" placeholder="Enter Department Position" autofocus>
                            </div>
                            <br/>
                            <div class="row"></div>
                            <br/>
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
                                <br/>
                                <button class="btn btn-lg btn-login btn-block" type="submit" onclick="return submitForm()">Save</button>
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