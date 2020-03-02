<style>
    .trumbowyg-editor img{
        width: 400px !important;
        height: 400px !important;
    }
    .trumbowyg-modal-box input[type=file]{
        font-size: 14px !important;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Send Email</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Send Email</header>
                    <div class="panel-body">
                        <br/>
                        <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>

                        <?= form_open('admin/editSendEmail/member/'.$email[0]['id'],array("class"=>"form-horizontal", "id" => "my-form")) ?>

                            <div class="form-group">

                                <div class="col-md-2">
                                    <input type="checkbox" class="chosen-toggle select form-control col-md-3" id="selectAll" style="margin-bottom: -20px;">
                                <label for="" style="margin-left: 40px;">All Members</label>
                                </div>
                                <div class="col-md-10 member">
                                    <select name="member[]" required multiple class="form-control chosen-select col-md-9" id="mem">
                                        <?php foreach($members as $val){ ?>
                                            <option <?= ($email[0]['members'] == $val['id']) ? "selected" : ""; ?> value="<?= $val['id'] ?>"><?= $val['lname'] ?> <?= $val['fname'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <br/>
                                </div>
                                <br/>
                            </div>
                            <div class="form-group">

                                <div class="col-md-2">
                                    <input type="checkbox" <?php if(!empty($data[0]['schedule'])){ ?> checked <?php } ?> class="form-control col-md-3" id="scheduleCheck" name="scheduleCheck" onchange="valueChanged()" style="width: 16% !important;">
                                    <p>Schedule SMS</p>
                                </div>
                                <div class="col-md-10" id="scheduleDateDiv" style="display: <?php if(!empty($email[0]['schedule'])){ ?> block <?php }else{ ?> none <?php } ?>;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="schedule" id="schedule" class="form-control">
                                                <option value="">Select Scheduling</option>
                                                <option <?= ($email[0]['schedule'] == 'once') ? "selected" : ""; ?> value="once">Only Once</option>
                                                <option <?= ($email[0]['schedule'] == 'daily') ? "selected" : ""; ?> value="daily">Daily</option>
                                                <option <?= ($email[0]['schedule'] == 'weekly') ? "selected" : ""; ?> value="weekly">Weekly</option>
                                                <option <?= ($email[0]['schedule'] == 'monthly') ? "selected" : ""; ?> value="monthly">Monthly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6"><input type="date" placeholder="Select Start Date" value="<?= date('Y-m-d', strtotime($email[0]['scheduleDate'])) ?>" onfocus="this.type='date'" class="form-control col-md-3" id="scheduleStartDate" name="scheduleStartDate"/></div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-6"><input type="date" placeholder="Select End Date" value="<?= date('Y-m-d', strtotime($email[0]['scheduleEndDate'])) ?>" onfocus="this.type='date'" class="form-control col-md-3" id="scheduleEndDate" name="scheduleEndDate" /></div>
                                        <div class="col-md-6"><input type="time" placeholder="Select Schedule Time" value="<?= $email[0]['scheduleTime'] ?>" onfocus="this.type='time'" class="form-control col-md-3" id="scheduleTime" name="scheduleTime" /></div>
                                    
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
                                        <span id="remaining">5000 characters remaining</span>
                                        <span id="messages">1 message(s)</span>
                                    </p>
                                    <textarea name="msg" required id="summernote1" cols="30" rows="4" class="ck-editor form-control"><?= $email[0]['msg'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2 ">
                                    <button class="btn btn-success" onclick="validateCount()">Send</button>
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
            messages = Math.ceil(chars / 5000),
            remaining = messages * 5000 - (chars % (messages * 5000) || messages * 5000);

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
    });
    
    function valueChanged()
    {
        if($('#scheduleCheck').is(":checked"))   
            $("#scheduleDateDiv").show();
        else
            $("#scheduleDateDiv").hide();
    }
    
    $('#schedule').on('change',function() {
        var schedule = $(this).val();
        if(schedule == 'once') {
            $('#scheduleEndDate').css('display', 'none');
        }else{
            $('#scheduleEndDate').css('display', 'block');
        }
    });
    
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

    function validateCount()
    {
        var count = $('#mem option:selected').length;
        if(count == 0){
            alert('Please select atleast one member.');
            return false;
        }else{
            return true;
        }
    }
</script>