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
                        <p style="display: none;" id="memCountp"><span id="memCount"></span> Members will receive the SMS</p>

                        <?= form_open('admin/sendSMS/church',array("class"=>"form-horizontal")) ?>

                            <div class="form-group">
                                <div class="col-md-2">
                                    Business Group
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control" required name="to" id="">
                                        <option class="deltee" value="">Select</option>
                                        <?php foreach($businessGroup as $val){ ?>
                                            <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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

    function valueChanged()
    {
        if($('#scheduleCheck').is(":checked"))   
            $("#scheduleDateDiv").show();
        else
            $("#scheduleDateDiv").hide();
    }
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
    $("[name=to]").change(function(){
        var a = $("[name=to]").val();
        $("#memCountp").css("display","");
        $("[name=to] option[class='deltee']").remove();
        $.post("<?= site_url('admin/ajax/getSMSbusinessCount'); ?>",{id:a},function(e){
            $("#memCount").html(e);
        });
    });
</script>