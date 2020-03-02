<style>
    input[type="date"]:before {
            content: attr(placeholder) !important;
            color: #aaa;
            margin-right: 0.5em;
          }
          input[type="date"]:focus:before,
          input[type="date"]:valid:before {
            content: "";
          }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= site_url(); ?>/admin/fetchCalendar">All Events</a></li>
                    <li><a href="">Add New Event</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Create Calendar Event</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/addFullCalendar',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;", "onSubmit"=>"document.getElementById('submit').disabled=true;")) ?>
                        <div class="login-wrap">
                            <div class="row">
                        <div class="col-xs-2">
                            <!--<input id="member" name="membCheck" type="checkbox" checked style="width: 20px;"/>-->
                            <input type="checkbox" name="membCheck" checked class="chosen-toggle select form-control mem" id="member" style="width: 20px;">
                            <label for="" >Members</label>
                            <!--<label for="">Members</label>-->
                        </div>
                        <div class="col-xs-10 member">
                            <?php $members = $this->data->fetch('member', array('status' => 'active')); ?>
                            <!--<input type="text" id="head" />-->
                            <select name="member[]" multiple="multiple" required id="mem" class="form-control chosen-select">
                                    <!--<option value="all">Select All</option>-->
                                    <?php $i= 0; foreach($members as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                                    <?php $i++; } ?>
                            </select>
                            <input type="hidden" id="totalMem" value="<?= $i; ?>"/>
                            <br/>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-2">
                                    <input id="bGroup" name="bGroupCheck" type="checkbox" class="form-control" style="width: 20px;"/>
                                    <label for="">Business Group</label>
                                </div>
                                <div class="col-md-10 bgroup" style="display:none;">
                                    <select name="bGroup" id="bgroup1" style="width: 100%;">
                                        <option value="">Select</option>
                                        <?php foreach($businessGroup as $val){ ?>
                                            <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="row"></div>
                        <div class="row">
                                <div class="col-md-2">
                                    <input id="church" name="churchCheck" class="form-control" type="checkbox" style="width: 20px;"/>
                                    <label for="">Church Group</label>
                                </div>
                                <div class="col-md-10 church" style="display: none;">
                                    <select name="church" id="church1" style="width: 100%;">
                                        <option value="">Select</option>
                                        <?php foreach($churchgroup as $val){ ?>
                                            <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="title">Event title</label>
                            <input type="text" name="title" id="title" class="form-control" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="link">Event Link(Optional)</label>
                            <input type="text" name="link" id="link" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="image">Event Image(Optional)</label>
                            <input type="file" name="image" id="image" class="form-control" style="font-size: 11px !important;"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="desc">Event Description (Additional Detail)</label>
                            <textarea name="desc" id="desc" placeholder="Enter event description" class="form-control"></textarea>
                        </div>
                    </div>
                    <!--<div class="row">-->
                    <!--    <div class="col-xs-6">-->
                    <!--        <p><input type="radio" checked onclick="changeEventTypee(this.value)" style="width: 20px;" name="eventType" value="one"><br/> <span>Is this event for one day?</span></p>-->
                    <!--    </div>-->
                    <!--    <div class="col-xs-6">-->
                    <!--        <p><input type="radio" onclick="changeEventTypee(this.value)" style="width: 20px;" name="eventType" value="multiple"><br/> <span>Is this event for more than one day?</span></p>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div id="oneDayEvent">
                        <!--<div class="bootstrap-iso">-->
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <label class="col-xs-4" for="startDate">Start Date</label>
                                <!--<input class="form-control" id="startDate" name="startDate" placeholder="Enter Start Date" type="date" min="<?= date('Y-m-d')?>"/>-->
                                <input name="startDate" id="startDate" required type="date" placeholder="Enter Start Date" class="form-control col-md-8 col-xs-12 col-lg-8" min="<?= date('Y-m-d')?>"/>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label class="col-xs-4" for="endDate">End Date</label>
                                <!--<input class="form-control" id="endDate" name="endDate" placeholder="Enter End Date" type="date" min="<?= date('Y-m-d')?>"/>-->
                                <input name="endDate" id="endDate" required type="date" placeholder="Enter End Date" class="form-control col-md-8 col-xs-12 col-lg-8" min="<?= date('Y-m-d') ?>"/>
                                <span style="color: red;display: none;" id="errorEndDate">End date must be greater then Start date.</span>
                            </div>
                        </div>
                        <!--</div>-->
                        <div id="timeAdd"></div>
                    </div>
                    <div id="child"></div>
                    <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="reminder_event">Set Reminder</label>
                        <select id="reminder_event" name="reminder_event" required class="form-control">
                            <option value="">Select</option>
                            <option value="15">15 Mins Before</option>
                            <option value="30">30 Mins Before</option>
                            <option value="45">45 Mins Before</option>
                            <option value="60">1 Hour Before</option>
                            <option value="120">2 Hours Before</option>
                            <option value="300">5 Hours Before</option>
                            <option value="1440">1 Day Before</option>
                            <option value="2880">2 Days Before</option>
                            <option value="10080">1 Week Before</option>
                        </select>
                    </div>
                </div>
                <div class="row"></div>
                <div class="row">
                                <div class="col-md-10 col-md-offset-2 ">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
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
    
    //Datepicker init
    // var date_input=$('input[name="startDate"]');
    // var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    //   var options={
    //     format: 'mm/dd/yyyy',
    //     container: container,
    //     todayHighlight: true,
    //     autoclose: true,
    //   };
    //   date_input.datepicker(options);
    // $('.dateP').datepicker({
    //     format: 'yyyy-mm-dd',
    //     todayHighlight: true,
    //     autoclose: true
    // });
    // $('#endDate').datepicker({
    //     format: 'yyyy-mm-dd',
    //     todayHighlight: true,
    //     autoclose: true
    // });
    
    // $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });
    $('#endDate').on('blur', function(){
        var startDate = new Date($('#startDate').val());
        var endDate = new Date($(this).val());
        if(endDate >= startDate){
            var diff = 0,
                days = 1000 * 60 * 60 * 24,
                noOfDays = 0;
            diff = endDate - startDate;
            noOfDays = Math.floor(diff / days);
            var values = [];
            if(noOfDays == 0){
                values[0] = "<div class='row'></div>" +
                            "<div class='row'>"+
                                "<div class='col-xs-12 col-md-4'>" +
                                    "<label for='preacher' class='col-xs-6'>Name</label>" +
                                    "<input type='text' name='preacher[]' required class='form-control col-xs-6' id='preacher' placeholder='Enter Preacher Name'/>" +
                                "</div>" +
                                "<div class='col-xs-12 col-md-4'>" +
                                    "<label for='startTime' class='col-xs-6'>Start Time</label>" +
                                    "<input type='time' id='startTime' name='startTime[]' required class='form-control col-xs-6'/>" +
                                "</div>" +
                                "<div class='col-xs-12 col-md-4'>" +
                                    "<label for='endTime' class='col-xs-6'>End Time</label>" +
                                    "<input type='time' name='endTime[]' required id='endTime' class='form-control col-xs-6'/>" +
                                "</div>" +
                            "</div>";
            }else{
                for(i = 0; i <= noOfDays; i++){
                    values[i] = "<div class='row'></div>" +
                            "<div class='row'>"+
                                "<div class='col-xs-12 col-md-4'>" +
                                    "<label for='preacher' class='col-xs-6'>Name</label>" +
                                    "<input type='text' name='preacher[]' required class='form-control col-xs-6' id='preacher' placeholder='Enter Preacher Name'/>" +
                                "</div>" +
                                "<div class='col-xs-12 col-md-4'>" +
                                    "<label for='startTime' class='col-xs-6'>Start Time</label>" +
                                    "<input type='time' id='startTime' required name='startTime[]' class='form-control col-xs-6'/>" +
                                "</div>" +
                                "<div class='col-xs-12 col-md-4'>" +
                                    "<label for='endTime' class='col-xs-6'>End Time</label>" +
                                    "<input type='time' name='endTime[]' required id='endTime' class='form-control col-xs-6'/>" +
                                "</div>" +
                            "</div>";
                }
            }
            $('#errorEndDate').css('display', 'none');
        }else{
            $('#errorEndDate').css('display', 'block');
            // $('#endDate').focus();
            values = '';
            return false;
        }
        $('#timeAdd').html(values);
    });
});
    <?php if(isset($_GET['received'])){ ?>
    setTimeout(function(){
        swal('Congratulation', 'Event Added Successfully', 'success');
    },1000);
    <?php } ?>
    function openCalendar(){
        $("#date").fadeToggle(1000);
    }
    /**
     * member
     * bGroup
     * church
     */
    $("#member").click(function(){
        if($("#member").is(":checked")){
            $(".member").css('display', '');
        }else{
            $(".member").css('display', 'none');
        }
    });
    
    $('#member').on('click', function(){
        if($(this). prop("checked") == true){
            $('#bGroup').attr('disabled', true);
            $('.bgroup').css('display', 'none');
            $('#church').attr('disabled', true);
            $('.church').css('display', 'none');
        }else{
            $('#bGroup').attr('disabled', false);
            $('.bgroup').css('display', 'none');
            $('#church').attr('disabled', false);
            $('.church').css('display', 'none');
        }
    });
    
    $("#bGroup").click(function(){
        if($("#bGroup").is(":checked")){
            $(".bgroup").css('display', '');
            $('#bgroup1').prop('required', true);
            $('#mem').removeAttr('required');
            $('#member').attr('disabled', true);
            $('#church').attr('disabled', true);
            $('.member').css('display', 'none');
            $('.church').css('display', 'none');
        }else{
            $(".bgroup").css('display', 'none');
            $('#member').attr('disabled', false);
            $('#bgroup1').prop('required', false);
            $('#mem').prop('required',true);
            $('#church').attr('disabled', false);
            $('.member').css('display', '');
            $('.church').css('display', 'none');
        }
    });
    
    $("#church").click(function() {
        if($("#church").is(":checked")){
            $(".church").css('display', '');
            $('#mem').removeAttr('required');
            $('#church1').prop('required', true);
            $('#member').attr('disabled', true);
            $('#bGroup').attr('disabled', true);
            $('.member').css('display', 'none');
            $('.bGroup').css('display', 'none');
        }else{
            $(".church").css('display', 'none');
            $('#member').attr('disabled', false);
            $('#mem').prop('required',true);
            $('#church1').prop('required', false);
            $('#bGroup').attr('disabled', false);
            $('.member').css('display', '');
            $('.bGroup').css('display', 'none');
        }
    });
    $('.chosen-toggle').each(function(index) {
        $(this).on('click', function(){
            console.log($(this).parent().next('div').find('option'));
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
<script>
    var one = $("#oneDayEvent").html();
    var multi = $("#multiDayEvent").html();
    $("#multiDayEvent").html("");

    function changeEventTypee(a){
        if(a == 'one'){
            $("#oneDayEvent").html(one);
            $("#oneDayEvent").css('display', 'block');
            $("#multiDayEvent").css('display', 'none');
            // $("#clndr_new_event_submit").attr("onclick","addReminder()");
        }else{
            $("#oneDayEvent").css('display', 'none');
            $("#multiDayEvent").css('display', 'block');
            $("#multiDayEvent").html(multi);
            // $("#clndr_new_event_submit").attr("onclick", "addMultiReminder()");
        }
    }
</script>
<script>
ci = 1;
    function addBuild(){
        // alert('hello');
        var child = "<div id='ChildField"+ci+"' data-uk-grid-margin>" +
                    "<div class='row'>" + 
                        "<div class='col-md-12'>" + 
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-calendar'></i></span>" + 
                                "<label for='clndr_event_date_control1'>Event Date</label>" +
                                "<input type='date' name='eventDate1["+ci+"][<?= 'eventDate' ?>]' id='eventDate1["+ci+"][<?= 'eventDate' ?>]' class='form-control'/>"+
                                // "<input style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' class='md-input' type='date' id='clndr_event_date_control1['"+ci+"'][<?= 'eventDate' ?>]' name='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]' min='<?= date('Y-m-d') ?>'>" +
                                    // "<input  style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' class='md-input' type='date' id='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]' name='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]'> + 
                        "</div>" + 
                    "</div>" +
                    "<div class='row'>" +
                        "<div class='col-md-12'>" +
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-clock-o'></i></span>" +
                                "<label for='clndr_event_start_control1'>Event Start</label>" +
                                    "<input type='time' name='starts_at1["+ci+"][<?= 'eventStart' ?>]' id='starts-at1["+ci+"][<?= 'eventStart' ?>]' class='form-control'/>" +
                        "</div>" +
                    "</div>" +
                    "<div class='row'>" +
                        "<div class='col-md-12'>" +
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-clock-o'></i></span>" +
                                "<label for='clndr_event_end_control1'>Event End</label>" +
                                    "<input type='time' name='ends_at1["+ci+"][<?= 'eventEnd' ?>]' id='ends-at1["+ci+"][<?= 'eventEnd' ?>]' class='form-control'/>" +
                        "</div>" +
                    "</div>" +
        "<hr/><div class='row'></div>";

        $("#child").prepend(child);
        ci++;
    };
    function removechild(id){
        $("#ChildField"+id).remove();
    }
    $('.chosen-toggle').each(function(index) {
        $(this).on('click', function(){
            if($(this). prop("checked") == true){
                $(this).parent().find('option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
            }else{
                clearSelected();
                $('#mem').trigger("chosen:updated");
            }
        });
    });
    function clearSelected(){
        var elements = document.getElementById("mem").options;
        // console.log(elements.length);
        for(var i = 0; i < elements.length; i++){
          if(elements[i].selected)
            elements[i].selected = false;
        }
      }
</script>