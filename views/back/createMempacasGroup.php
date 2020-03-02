<style>
    .chosen-choices{
        padding: 10px !important;
        border-radius: 5px;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Mempacas Group</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Add Group</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/insert/mempacasGroup/viewMempacasGroup',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                <strong>Group Name</strong><span style="color: red;">*</span><br/>
                                <input type="text" class="form-control" name="groupName" required="required" placeholder="Enter Group Name" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <strong>General In-charge</strong><span style="color: red;">*</span><br/>
                                <select name="generalInCharge[]" required multiple class="form-control chosen-select" placeholder="Select General In Charge" id="general">
                                    <?php $generalIn = $this->data->myquery('SELECT * FROM `member` WHERE `status` = "active" ORDER BY lname ASC'); ?>
                                    <?php foreach($generalIn as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <strong>Members</strong>
                                <div id="mem">
                                    <select name="membersName[]" required multiple placeholder="Select atleast one member" id="members" class="form-control chosen-select">
                                        
                                        <?php foreach($members as $val){?>
                                            <!--<option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>-->
                                        <?php 
                                        } ?>
                                    </select>
                                </div>
                                <div><small>Please Add atleast 1 member.</small></div>
                            </div>
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

<script>
    $('#general').on('change', function(){
        generals = $(this).val();
        $.post("<?= site_url('admin/selectMember'); ?>",{generalId:generals},function(a){
            console.log(a);
            $('#mem').html(a);
            $('.chosen-select').chosen({
                placeholder_text_multiple: 'Please select atleast 1 Member.'
            });
        });
    });
    
    $("#type").change(function(){
        var a = $("#type").val();
        if(a == "hard"){}
    });
    
    $(document).ready(function(){
        $('#general_chosen .search_field input').attr('placeholder', 'Testing'); 
    });
    
    function submitForm()
    {
        var general = $('#general :selected').length;
        if(general <= 10){
            return true;
        }else if(general <= 0){
            alert('Please select atleast one general in-charge.');
            return false;
        }else{
            alert('You have exceed the limit of general in-charge selection.');
            return false;
        }
    }
</script>