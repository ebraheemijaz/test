<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= site_url(); ?>/admin/fetchCalendar">All Events</a></li>
                    <li><a href="">Edit Event</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Edit Calendar Event</header>
                    <div class="panel-body">
                        <?= form_open_multipart("admin/editFullCalendar/".$reminderEvent[0]['event_id'],array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;", "onSubmit"=>"document.getElementById('submit').disabled=true;")) ?>
                        <div class="login-wrap">
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="title">Event title</label>
                            <input type="text" value="<?= $reminderEvent[0]['desc'] ?>" name="title" id="title" class="form-control" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="link">Event Link(Optional)</label>
                            <input type="text" value="<?= $reminderEvent[0]['link'] ?>" name="link" id="link" class="form-control"/>
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
                            <textarea name="desc" id="desc" placeholder="Enter event description" class="form-control"><?= $reminderEvent[0]['eventDesc'] ?></textarea>
                        </div>
                    </div>
                    <div id="oneDayEvent">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <label class="col-xs-4" for="startDate">Start Date</label>
                                <input name="startDate" value="<?= $reminderEvent[0]['date'] ?>" id="startDate" type="text" onfocus="(this.type='date')" placeholder="Enter Start Date" class="form-control" min="<?= date('Y-m-d')?>"/>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label class="col-xs-4" for="endDate">End Date</label>
                                <input name="endDate" value="<?= $reminderEvent[0]['endDate'] ?>" id="endDate" type="text" onfocus="(this.type='date')" placeholder="Enter End Date" class="form-control" min="<?= date('Y-m-d') ?>"/>
                            </div>
                        </div>
                        <?php foreach($reminderDesc as $desc){ ?>
                            <div class='row'>
                                <div class='col-xs-12 col-md-4'>
                                    <label for='preacher' class='col-xs-4'>Name</label>
                                    <input type='text' value="<?= $desc['preacherBy'] ?>" name='preacher[]' class='form-control col-xs-8' id='preacher' placeholder='Enter Preacher Name'/>
                                </div>
                                <div class='col-xs-12 col-md-4'>
                                    <label for='startTime' class='col-xs-6'>Start Time</label>
                                    <input type='time' value="<?= $desc['startTime'] ?>" id='startTime' name='startTime[]' class='form-control'/>
                                </div>
                                <div class='col-xs-12 col-md-4'>
                                    <label for='endTime' class='col-xs-4'>End Time</label>
                                    <input type='time' value="<?= $desc['endTime'] ?>" name='endTime[]' id='endTime' class='form-control'/>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="child"></div>
                    <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="reminder_event">Set Reminder</label>
                        <select id="reminder_event" name="reminder_event" class="form-control">
                            <option value="">Select</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "15")? "selected" : ""; ?> value="15">15 Mins Before</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "30")? "selected" : ""; ?> value="30">30 Mins Before</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "45")? "selected" : ""; ?> value="45">45 Mins Before</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "60")? "selected" : ""; ?> value="60">1 Hour Before</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "120")? "selected" : ""; ?> value="120">2 Hours Before</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "300")? "selected" : ""; ?> value="300">5 Hours Before</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "1440")? "selected" : ""; ?> value="1440">1 Day Before</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "2880")? "selected" : ""; ?> value="2880">2 Days Before</option>
                            <option <?= ($reminderEvent[0]['reminder_event'] == "10080")? "selected" : ""; ?> value="10080">1 Week Before</option>
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
    // $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });
    
    $('#endDate').on('blur', function(){
        var startDate = new Date($('#startDate').val());
        var endDate = new Date($(this).val());
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
                                "<label for='preacher' class='col-xs-4'>Name</label>" +
                                "<input type='text' name='preacher[]' class='form-control col-xs-8' id='preacher' placeholder='Enter Preacher Name'/>" +
                            "</div>" +
                            "<div class='col-xs-12 col-md-4'>" +
                                "<label for='startTime' class='col-xs-6'>Start Time</label>" +
                                "<input type='time' id='startTime' name='startTime[]' class='form-control'/>" +
                            "</div>" +
                            "<div class='col-xs-12 col-md-4'>" +
                                "<label for='endTime' class='col-xs-4'>End Time</label>" +
                                "<input type='time' name='endTime[]' id='endTime' class='form-control'/>" +
                            "</div>" +
                        "</div>";
        }else{
            for(i = 0; i <= noOfDays; i++){
                values[i] = "<div class='row'></div>" +
                        "<div class='row'>"+
                            "<div class='col-xs-12 col-md-4'>" +
                                "<label for='preacher' class='col-xs-4'>Name</label>" +
                                "<input type='text' name='preacher[]' class='form-control col-xs-8' id='preacher' placeholder='Enter Preacher Name'/>" +
                            "</div>" +
                            "<div class='col-xs-12 col-md-4'>" +
                                "<label for='startTime' class='col-xs-6'>Start Time</label>" +
                                "<input type='time' id='startTime' name='startTime[]' class='form-control'/>" +
                            "</div>" +
                            "<div class='col-xs-12 col-md-4'>" +
                                "<label for='endTime' class='col-xs-4'>End Time</label>" +
                                "<input type='time' name='endTime[]' id='endTime' class='form-control'/>" +
                            "</div>" +
                        "</div>";
            }
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