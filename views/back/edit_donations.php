<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Edit Donation</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Edit Donation</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/update/'.$data[0]['id'].'/donations/manage_donations',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Member Name</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="member" <?php if($data[0]['user_id'] != 0){ ?>required<?php } ?> class="form-control chosen-select" id="mem" style="pointer-events: none;">
                                        <option value="">Select Member</option>
                                        <?php
                                            foreach($members as $member){
                                            ?>
                                            <option value="<?= $member['id'] ?>"><?= $member['fname']." ".$member['lname'] ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="row"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Anonymous</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="checkbox" <?php if($data[0]['user_id'] == 0){ ?>checked<?php } ?> class="form-control" name="anonymous" id="anonymous"/>
                                </div>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Amount : </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" value="<?= $data[0]['amount'] ?>" required name="amount" min="1" class="form-control" style="float: right;font-size: 12px!important;height: 40px;"/><br/>
                                </div>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Mode Of Payment : </label>
                                </div>
                                <div class="col-md-8">
                                    <select name="modeOfPayment" required class="form-control">
                                        <option value="">Select Mode</option>
                                        <option <?php if($data[0]['modeOfPayment']=='Cash'){ ?>selected<?php } ?> value="Cash">Cash</option>
                                        <option <?php if($data[0]['modeOfPayment']=='Card'){ ?>selected<?php } ?> value="Card">Card</option>
                                        <option <?php if($data[0]['modeOfPayment']=='Cheque'){ ?>selected<?php } ?> value="Cheque">Cheque</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Purpose : </label>
                                </div>
                                <div class="col-md-8">
                                    <select style="height: 100%;" class="form-control" name="detail">
                                        <option value="">Select Purpose</option>
                                        <option <?php if($data[0]['detail']=='Offerings'){ ?>selected<?php } ?> value="Offerings">Offerings</option>
                                        <option <?php if($data[0]['detail']=='Tithe'){ ?>selected<?php } ?> value="Tithe">Tithe</option>
                                        <option <?php if($data[0]['detail']=='Food Bank'){ ?>selected<?php } ?> value="Food Bank">Food Bank</option>
                                        <option <?php if($data[0]['detail']=='Welfare'){ ?>selected<?php } ?> value="Welfare">Welfare</option>
                                        <option <?php if($data[0]['detail']=='Missionary'){ ?>selected<?php } ?> value="Missionary">Missionary</option>
                                        <option <?php if($data[0]['detail']=='Children'){ ?>selected<?php } ?> value="Children">Children</option>
                                        <option <?php if($data[0]['detail']=='Pledge'){ ?>selected<?php } ?> value="Pledge">Pledge</option>
                                        <option <?php if($data[0]['detail']=='Christmas Hamper'){ ?>selected<?php } ?> value="Christmas Hamper">Christmas Hamper</option>
                                        <option <?php if($data[0]['detail']=='Others'){ ?>selected<?php } ?> value="Others">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Additional Information : </label>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="purpose" cols="30" rows="4"><?= ucfirst($data[0]['purpose']) ?></textarea>
                                </div>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-lg-offset-2 col-lg-4 col-md-12">
                                <button class="btn btn-lg btn-login btn-block" type="submit">Save!</button>
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
    $(document).ready(function(){
        var userId = "<?= $data[0]['user_id'] ?>";
        if(userId){
            $('#mem_chosen').css('pointer-events', '');
        }else{
            $('#mem_chosen').css('pointer-events', 'none');
        }
    });
    function openCalendar(){
        $("#date").fadeToggle(1000);
    }
    $('#mem').change(function(){
        var member = $(this).val();
        if(member != ""){
            $('#anonymous').attr('disabled', true);
        }else{
            $('#anonymous').attr('disabled', false);
        }
    });
    
    $('#anonymous').change(function(){
        if(this.checked){
            $('#mem_chosen').css('pointer-events', 'none');
            $('#mem').prop('required',false);
        }else{
            $('#mem_chosen').css('pointer-events', '');
            $('#mem').prop('required',true);
        }
        
    });
    /**
     * member
     * bGroup
     * church
     */
    $("#member").click(function(){
        if($("#member").is(":checked")){
            $(".member").css("display","");
        }else{
            $(".member").css("display","none");
        }
    });

    $("#bGroup").click(function(){
        if($("#bGroup").is(":checked")){
            $(".bGroup").removeAttr("disabled");
        }else{
            $(".bGroup").attr("disabled","disabled");
        }
    });
    $("#church").click(function() {
        if($("#church").is(":checked")){
            $(".church").removeAttr("disabled");
        }else{
            $(".church").attr("disabled","disabled");
        }
    });

</script>