<?php $check = $this->session->userdata('userMember'); ?>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Event Calendar<span><a href="<?= site_url('home');?>" class="uk-button uk-button-primary" style="float : right;">X</a></span></h3>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-12">
                <div class="md-card uk-margin-medium-bottom">
                    <div  class="md-card-content" data-step="1" data-intro="List of all the testimony comes here">
                        <!--<div class="dt_colVis_buttons">-->
                        <!--    <button data-step="3" data-intro="Click here to create new keeper network" class="md-btn md-btn-danger" data-uk-modal="{target:'#newModal'}">New Update</button>-->
                        <!--</div>-->
                        <!--<div style="text-align : center;">-->
                        <!--    <span style="text-align:center;"><h4>You're a KEEPER</h4></span>-->
                        <!--</div>-->
                        <!--<div style="text-align : center;">-->
                        <!--    <span style="text-align:center;"><h5>Please inform us of any member who has been absent lately from church</h5></span>-->
                        <!--</div>-->
                        <div class="dt_colVis_buttons"></div>
                        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-step="2" data-intro="Date Added">Event Start Date</th>
                                <th data-step="2" data-intro="Date Added">Event End Date</th>
                                <th data-step="3" data-intro="Absentee Name" style="width:200px; word-wrap: break-word;display: inline-block;">Title</th>
                                <th data-step="4">Status</th>
                                <!--<th data-step="5">Start Time</th>-->
                                <!--<th data-step="6">End Time</th>-->
                                <th data-step="7" style="width:200px; word-wrap: break-word;display: inline-block;">Event Link</th>
                                <th data-step="8">Image</th>
                                <th data-step="9" style="width:200px; word-wrap: break-word;display: inline-block;">Event Description</th>
                                <th data-step="10">Remind Me</th>
                                <th data-step="11">Reminder Time</th>
                                <th data-step="12"><span>Are you attending?</span></th>
                                <th data-step="13">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($calendar)){ ?>
                                <?php $i=1; foreach($calendar as $val){ ?>
                                        <tr style="<?php if($val['isDeleted'] == '0'){?>color : green;<?php }else{ ?>color : red;<?php } ?>">
                                            <td><?= date('d-m-Y', strtotime($val['date'])); ?></td>
                                            <td><?= date('d-m-Y', strtotime($val['endDate'])); ?></td>
                                            <td><?= wordwrap($val['desc'],30,"<br>\n"); ?></td>
                                            <td><?= $val['status'] ?></td>
                                            <!--<td><?= date('H:i:s',strtotime($val['start'])); ?></td>-->
                                            <!--<td><?= date('H:i:s', strtotime($val['end'])); ?></td>-->
                                            <td><a href="<?= $val['link'] ?>" target="_blank"><?= $val['link']; ?></a></td>
                                            <?php if($val['adminId'] == 1){?>
                                            <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/noImage.png"; ?>
                                            <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                            <?php if(empty($val['image'])){ $image = base_url('assets_f/img/business/noImage.png'); } ?>
                                            <?php }else{ ?>
                                            <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/noImage.png"; ?>
                                            <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                            <?php if(empty($val['image'])){ $image = base_url('assets_f/img/business/noImage.png'); } ?>
                                            <?php } ?>
                                            <td>
                                                <?php
                                                    $exif = exif_read_data($image);
                                                    // print_r($exif['Orientation']);
                                                ?>
                                                <a onclick="openBig('<?= $image; ?>', <?= $exif['Orientation'] ?>)">
                                                <img src="<?= $image ?>" width="200" height="200" 
                                                <?php 
                                                    if($exif['Orientation'] == 6){
                                                ?>class="example-image detect"
                                                <?php 
                                                    }else if($exif['Orientation'] == 8){
                                                ?> class="example-image detect8" 
                                                <?php  
                                                    }
                                                ?> alt=""/></a>
                                            </td>
                                            <td><?= substr(wordwrap($val['eventDesc'], 30, "<br>\n"), 0, 100); ?><br/><a href="<?= site_url()."home/viewCalendar/".$val['event_id']; ?>">Read More...</a></td>
                                            <td><?php if($val['isReminded'] == 1){echo 'Yes'; }else{echo 'No'; }?></td>
                                            <td><?php if($val['reminder_event'] == 60){echo "1 Hour Before";}elseif($val['reminder_event'] == 120){echo "2 Hours Before";}elseif($val['reminder_event'] == 500){echo "5 Hours Before";}elseif($val['reminder_event'] == 1440){echo "1 Day Before";}elseif($val['reminder_event'] == 2880){echo "2 Days Before";}elseif($val['reminder_event'] == 10080){echo "1 Week Before"; }else{ echo $val['reminder_event'].' Mins Before'; }; ?></td>
                                            <td>
                                                <?php if($val['adminId'] == 1){ ?>
                                                    <?php $eventAtten = $this->data->fetch('eventAttendance', array('user_id' => $check[0]['id'], 'event_id' => $val['event_id']));  ?>
                                                    <?php if($eventAtten[0]['eventAttending'] == 1){ echo 'Attending'; }else{ ?><a onclick="openSwal1(<?= $val['event_id']?>, '<?= $val['desc'];?>', '<?= $val['image']?>', '<?= date('d-m-Y', strtotime($val['date'])) ?>');"><i class="md-icon material-icons">alarm_add</i></a><?php } ?>
                                                <?php } if($val['adminId'] != 1){ ?> 
                                                    <span> -- </span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if($val['adminId'] == 1){ ?>
                                                    <a href="<?= site_url()."home/viewCalendar/".$val['event_id']; ?>"><i class="md-icon material-icons">visibility</i></a>
                                                <?php } if($val['adminId'] != 1){ ?>
                                                    <a href="<?= site_url()."home/viewCalendar/".$val['event_id']; ?>"><i class="md-icon material-icons">visibility</i></a>
                                                    | <a href="<?= site_url()."home/editCalEvent/".$val['event_id'] ?>"><i class="md-icon material-icons">edit</i></a>
                                                    | <a style="cursor: pointer" onclick="deleteC('<?= site_url('home/deleteEventNew') . "/" . $val['event_id']."/same" ?>')"><i class="md-icon material-icons">delete_forever</i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!--<?php require_once('advert_v.php'); ?>-->

        </div>
    </div>
</div>
<div class="confirmationModalOnD"></div>
<script>
    function viewDesc(desc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Desc More</h1>' +
            '</div>' +
            '<div class="uk-modal-footer">' +
            '<label>'+desc+'</label>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(".confirmationModalOnD").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }
    function deleteC(srcc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Do you want to delete?</h1>' +
            '</div>' +
            '<div class="uk-modal-footer">' +
            '<button class="md-btn md-btn-primary uk-modal-close">No</button>' +
            '<a href="'+srcc+'" class="md-btn md-btn-danger">Yes</a>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(".confirmationModalOnD").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }
    function openBig(srcc, ori){
        if(ori == 6){
            var a = '<div id="openBig" class="uk-modal"> ' +
            '<div class="uk-modal-dialog" style="width: 450px;">' +
            '<a href="" class="uk-modal-close uk-close"></a>' +
            '<div class="uk-modal-footer">' +
            '<img src="'+srcc+'" style="width: 400px; height: 400px; transform: rotate(90deg);"/>' +
            '</div>' +
            '</div>' +
            '</div>';
        }else if(ori == 8){
            var a = '<div id="openBig" class="uk-modal"> ' +
            '<div class="uk-modal-dialog" style="width: 450px;">' +
            '<a href="" class="uk-modal-close uk-close"></a>' +
            '<div class="uk-modal-footer">' +
            '<img src="'+srcc+'" style="width: 400px; height: 400px; transform: rotate(-90deg);"/>' +
            '</div>' +
            '</div>' +
            '</div>';
        }else{
            var a = '<div id="openBig" class="uk-modal"> ' +
            '<div class="uk-modal-dialog" style="width: 450px;">' +
            '<a href="" class="uk-modal-close uk-close"></a>' +
            '<div class="uk-modal-footer">' +
            '<img src="'+srcc+'" style="width: 400px; height: 400px;"/>' +
            '</div>' +
            '</div>' +
            '</div>';
        }
        // if(navigator.userAgent.match(/webOS/i)
        //  || navigator.userAgent.match(/iPhone/i)
        //  || navigator.userAgent.match(/iPad/i)
        //  || navigator.userAgent.match(/iPod/i)
        //  || navigator.userAgent.match(/BlackBerry/i)
        //  || navigator.userAgent.match(/Windows Phone/i)
        //  ){
        //      alert('helli');
        // var a = '<div id="openBig" class="uk-modal"> ' +
        //     '<div class="uk-modal-dialog" style="width: 450px;">' +
        //     '<a href="" class="uk-modal-close uk-close"></a>' +
        //     '<div class="uk-modal-footer">' +
        //     '<img src="'+srcc+'" style="width: 400px; height: 400px;"/>' +
        //     '</div>' +
        //     '</div>' +
        //     '</div>';
        //  }else if(navigator.userAgent.match(/Android/i)){
        //      alert('hello');
        //      var a = '<div id="openBig" class="uk-modal"> ' +
        //     '<div class="uk-modal-dialog" style="width: 450px;">' +
        //     '<a href="" class="uk-modal-close uk-close"></a>' +
        //     '<div class="uk-modal-footer">' +
        //     '<img src="'+srcc+'" style="width: 400px; height: 400px; transform: rotate(90deg);"/>' +
        //     '</div>' +
        //     '</div>' +
        //     '</div>';
        //  }else if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
        //      alert('hello1');
        //      var a = '<div id="openBig" class="uk-modal"> ' +
        //     '<div class="uk-modal-dialog" style="width: 450px;">' +
        //     '<a href="" class="uk-modal-close uk-close"></a>' +
        //     '<div class="uk-modal-footer">' +
        //     '<img src="'+srcc+'" style="width: 400px; height: 400px; transform: rotate(90deg);"/>' +
        //     '</div>' +
        //     '</div>' +
        //     '</div>';
        //  }else{
        //      alert('hello2');
        //      var a = '<div id="openBig" class="uk-modal"> ' +
        //     '<div class="uk-modal-dialog" style="width: 450px;">' +
        //     '<a href="" class="uk-modal-close uk-close"></a>' +
        //     '<div class="uk-modal-footer">' +
        //     '<img src="'+srcc+'" style="width: 400px; height: 400px;"/>' +
        //     '</div>' +
        //     '</div>' +
        //     '</div>';
        //  }
        $(".confirmationModalOnD").html(a);
        var modal = UIkit.modal("#openBig").show();
    }
</script>
<script>
    function changeNotifsStatus(id){
        $.post("<?= site_url('home/changeNotifsS'); ?>",{table:"p_request",id:id},function(e){
            console.log(e);
            window.location.reload();
        });
    }
</script>

<div id="newModal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h1>New Update</h1>
        <?= form_open("home/insert/keepersNetwork/keepersNetwork?id=1",array('class'=>"form-horizontal", "onSubmit"=>"document.getElementById('submit').disabled=true; document.getElementById('newModal').hide();")) ?>
        <div class="form-group" style="padding-bottom : 15px;">
            Does the absent member attend this church? No/Yes
        </div>
        <label class="switch" style="margin-left : 42%;">
          <input type="checkbox" checked id="slider">
          <span class="slider round"></span>
        </label>
        <div id="yesForm" style="display : block;">
        <div class="form-group" style="padding-bottom : 15px;">
            Absentee Name : 
            <input type="text" class="md-input" required name="absenteeName" id="absenteeName"/>
        </div>
        <div class="form-group" style="padding-bottom : 15px;">
            Absence Description:
            <select name="absenceDescription" id="absenceDescription" required id="" class="md-input">
                <option value="">Select</option>
                <option value="Out Of Town">Out Of Town</option>
                <option value="Unemployed">Unemployed</option>
                <option value="Pressure Of Work">Pressure Of Work</option>
                <option value="Bereaved">Bereaved</option>
                <option value="Sick">Sick</option>
                <option value="Discouraged">Discouraged</option>
                <option value="In Hospital">In Hospital</option>
                <option value="Dont Know">Don't Know</option>
                <option value="other">Other (Please Specify)</option>
            </select>
        </div>
        <div class="form-group" id="otherDesc" style="display : none;">
            Other Absence Descriotion:
            <input type="text" class="md-input" name="absenceDescriptionOther" id="absenceDescriptionOther" />
        </div>
        <div class="form-group" style="padding-bottom : 15px;">
            Absentee Contact No:
            <input type="text" required class="md-input" onkeypress='validate(event)' pattern="\d*" name="absenteeContactNo" id="absenteeContactNo" />
        </div>
        <div class="form-group" style="padding-bottom : 15px;">
            Absentee Contact Email:
            <input type="email" class="md-input" name="absenteeEmail" id="absenteeEmail"/>
        </div>
        <div class="form-group" style="padding-bottom : 15px;">
            Date Last Seen (If Known) :
            <input type="date" class="md-input" name="dateLastSeen" id="dateLastSeen" />
        </div>
        <div class="form-group">
            Comment:
            <textarea id="" cols="30" rows="4" name="comment" class="md-input"></textarea>
            <span id="textLe">0</span>/500
        </div>
        <div class="form-group">
            <input type="submit" id="submit" class="md-btn md-btn-success" value="Submit Update!"/>
        </div>
        </div>
        </form>
    </div>
</div>
<script>
    $("[name='priority']").change(function(){
        var a = $("[name='priority']").val();
        if(a == 'urgent'){
            $("[name='desc']").attr('placeholder',"Description and please include your contact number for our prayer team to contact you");
        }else{
            $("[name='desc']").attr('placeholder',"Description");
        }
    })
</script>
<script>
    $("#absenceDescription").change(function(){
       var a = $('#absenceDescription').val();
       if(a == 'other'){
           $('#otherDesc').css('display', 'block');
       }else{
           $('#otherDesc').css('display', 'none');
       }
    });
    $('#slider').click(function(){
       var check = $('#slider').is(':checked');
       if(check){
           $('#yesForm').css('display', 'block');
       }else{
           $('#newModal').hide();
           UIkit.notify({
            message : "Sorry we only allow update on our members",
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });
            setTimeout(function(){
               window.location.href = "<?php $_SERVER['HTTP_REFERER']; ?>"; 
            },1000);
           $('#yesForm').css('display', 'none');
       }
    });
    $("[name=comment]").keyup(function(){
        var a = $("[name=comment]").val();
        $("[name=comment]").val(a.substring(0,500));
        lenght = a.length;
        $("#textLe").html(lenght);
    });
</script>
<script>
    <?php if(isset($_GET['received'])){ ?>
    setTimeout(function(){
        UIkit.notify({
            message : 'Keepers Network Updated Successfully.',
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });
    },1000);
    <?php } ?>
</script>
