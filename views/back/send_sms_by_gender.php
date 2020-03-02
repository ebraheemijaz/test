<?php 
    $male = $this->data->myquery("SELECT * FROM `member` WHERE status = 'active' and gander = 'male' and first_time = 'no'"); 
    $female = $this->data->myquery("SELECT * FROM `member` WHERE status = 'active' and gander = 'female' and first_time = 'no'"); 
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Send SMS</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Send SMS</header>
                    <div class="panel-body">
                        SMS Remaining <?= $bucket[0]['qty'] - (2*$totalSent[0]['qty']) ?>
                        <br/>
                        SMS Sent <?= 2 * $totalSent[0]['qty'] ?>
                        <br/>
                        <br/>
                        <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>

                        <?= form_open('admin/sendSMS/gender',array("class"=>"form-horizontal", "id" => "my-form")) ?>

                            <div class="form-group">

                                <div class="col-md-2">
                                    <p>Select Gender</p>
                                </div>
                                <div class="col-md-10 member">
                                    <select name="gender[]" required multiple class="form-control chosen-select" id="mem">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male : <?= count($male); ?></option>
                                        <option value="female">Female : <?= count($female); ?></option>
                                    </select>
                                    <br/>
                                </div>
                                <br/>
                            </div>
                            <div class="form-group">

                                <div class="col-md-2">
                                    <input type="checkbox" class="form-control col-md-3" id="scheduleCheck" name="scheduleCheck" onchange="valueChanged()" style="width: 16% !important;">
                                    <p>Schedule SMS</p>
                                </div>
                                <div class="col-md-10" id="scheduleDateDiv" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="schedule" id="schedule" class="form-control">
                                                <option value="">Select Scheduling</option>
                                                <option value="once">Only Once</option>
                                                <option value="daily">Daily</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="monthly">Monthly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6"><input type="text" placeholder="Select Start Date" onfocus="this.type='date'" class="form-control col-md-3" id="scheduleStartDate" name="scheduleStartDate"/></div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-6"><input type="text" placeholder="Select End Date" onfocus="this.type='date'" class="form-control col-md-3" id="scheduleEndDate" name="scheduleEndDate" /></div>
                                        <div class="col-md-6"><input type="text" placeholder="Select Schedule Time" onfocus="this.type='time'" class="form-control col-md-3" id="scheduleTime" name="scheduleTime" /></div>
                                    
                                    </div>
                                </div>
                                <br/>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Message
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        <span id="remaining">160 characters remaining</span>
                                        <span id="messages">1 message(s)</span>
                                    </p>
                                    <textarea name="msg" required id="smsMsg" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2 ">
                                    <button class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script>
    var $remaining = $('#remaining'),
        $messages = $remaining.next();

    $('#smsMsg').keyup(function(){
        var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
    });
    
    $('#schedule').on('change',function() {
        var schedule = $(this).val();
        if(schedule == 'once') {
            $('#scheduleEndDate').css('display', 'none');
        }else{
            $('#scheduleEndDate').css('display', 'block');
        }
    });
    
    if ($("select.chosen-select").length > 0) {
        $("select.chosen-select").each(function() {
            if ($(this).attr('required') !== undefined) {
                $(this).on("change", function() {
                    $(this).valid();
                });
            }
        });
    }else{
        $('#errorMsg').css('display', 'block');
    }
    
    $("#my-form").validate({
        errorPlacement: function (error, element) {
            console.log("placement");
            if (element.is("select.chosen-select")) {
                console.log("placement for chosen");
                // placement for chosen
                element.next("div.chzn-container").append(error);
            } else {
                // standard placement
                error.insertAfter(element);
            }
        }
    });
    
    function valueChanged()
    {
        if($('#scheduleCheck').is(":checked"))   
            $("#scheduleDateDiv").show();
        else
            $("#scheduleDateDiv").hide();
    }
    
    $('.chosen-toggle').each(function(index) {
        $(this).on('click', function(){
            if($(this). prop("checked") == true){
                $(this).parent().next().find('option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
            }else{
                clearSelected();
                $('#mem').trigger("chosen:updated");
            }
        });
    });
    function clearSelected(){
        var elements = document.getElementById("mem").options;
        console.log(elements.length);
        for(var i = 0; i < elements.length; i++){
          if(elements[i].selected)
            elements[i].selected = false;
        }
      }


</script>