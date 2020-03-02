<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Edit Send SMS</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Edit Send SMS</header>
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

                        <?= form_open('admin/editSendSMS/member/'.$data[0]['id'],array("class"=>"form-horizontal", "id" => "my-form")) ?>
                            <?php
                                $members = $this->data->myquery('SELECT * FROM `member` ORDER BY lname ASC');
                            ?>
                            <div class="form-group">
                                
                                <div class="col-md-2">
                                    <input type="checkbox" class="chosen-toggle select form-control col-md-3" id="selectAll" name="selectAll" style="width: 16% !important;">
                                    <p>Members</p>
                                </div>
                                <div class="col-md-10 member">
                                    <select name="member[]" required="true" multiple class="form-control chosen-select" id="mem">
                                        <option value="">[select option]</option>
                                        <?php foreach($members as $val){ ?>
                                            <option <?= ($data[0]['toId'] == $val['id']) ? "selected" : ""; ?> value="<?= $val['id'] ?>"><?= $val['lname'] ?> <?= $val['fname'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span id="errorMsg" style="color: red; display:none;">Please select atleast one member.</span>
                                    <br/>
                                </div>
                                <br/>
                            </div>
                            <div class="form-group">

                                <div class="col-md-2">
                                    <input type="checkbox" <?php if(!empty($data[0]['schedule'])){ ?> checked <?php } ?> class="form-control col-md-3" id="scheduleCheck" name="scheduleCheck" onchange="valueChanged()" style="width: 16% !important;">
                                    <p>Schedule SMS</p>
                                </div>
                                <div class="col-md-10" id="scheduleDateDiv" style="display: <?php if(!empty($data[0]['schedule'])){ ?> block <?php }else{ ?> none <?php } ?>;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="schedule" id="schedule" class="form-control">
                                                <option value="">Select Scheduling</option>
                                                <option <?= ($data[0]['schedule'] == 'once') ? "selected" : ""; ?> value="once">Only Once</option>
                                                <option <?= ($data[0]['schedule'] == 'daily') ? "selected" : ""; ?> value="daily">Daily</option>
                                                <option <?= ($data[0]['schedule'] == 'weekly') ? "selected" : ""; ?> value="weekly">Weekly</option>
                                                <option <?= ($data[0]['schedule'] == 'monthly') ? "selected" : ""; ?> value="monthly">Monthly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6"><input type="date" placeholder="Select Start Date" value="<?= date('Y-m-d', strtotime($data[0]['scheduleDate'])) ?>" onfocus="this.type='date'" class="form-control col-md-3" id="scheduleStartDate" name="scheduleStartDate"/></div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-6"><input type="date" placeholder="Select End Date" value="<?= date('Y-m-d', strtotime($data[0]['scheduleEndDate'])) ?>" onfocus="this.type='date'" class="form-control col-md-3" id="scheduleEndDate" name="scheduleEndDate" /></div>
                                        <div class="col-md-6"><input type="time" placeholder="Select Schedule Time" value="<?= $data[0]['scheduleTime'] ?>" onfocus="this.type='time'" class="form-control col-md-3" id="scheduleTime" name="scheduleTime" /></div>
                                    
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
                                    <textarea name="msg" required id="smsMsg" cols="30" rows="4" class="form-control"><?= $data[0]['msg'] ?></textarea>
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
    
    // $('.chosen-select').chosen();
    // $.validator.setDefaults({ ignore: ":hidden:not(select)" });
    
    // validation of chosen on change
    // if ($("select.chosen-select").length > 0) {
    //     $("select.chosen-select").each(function() {
    //         if ($(this).attr('required') !== undefined) {
    //             $(this).on("change", function() {
    //                 $(this).valid();
    //             });
    //         }
    //     });
    // }else{
    //     $('#errorMsg').css('display', 'block');
    // }
    
    // $("#my-form").validate({
    //     errorPlacement: function (error, element) {
    //         console.log("placement");
    //         if (element.is("select.chosen-select")) {
    //             console.log("placement for chosen");
    //             // placement for chosen
    //             element.next("div.chzn-container").append(error);
    //         } else {
    //             // standard placement
    //             error.insertAfter(element);
    //         }
    //     }
    // });
    
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