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
        <h3 class="heading_b uk-margin-bottom">Mark Attendance </h3>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-12">
                <div class="md-card uk-margin-medium-bottom">
                    <div  class="md-card-content" data-step="1" data-intro="List of all the testimony comes here">
                        <!--<div class="dt_colVis_buttons">-->
                        <!--    <button data-step="3" data-intro="Click here to create new keeper network" class="md-btn md-btn-danger" data-uk-modal="{target:'#newModal'}">Mark Attendance</button>-->
                        <!--</div>-->
                        <div class="dt_colVis_buttons"></div>
                        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-step="2" data-intro="Date Added">Date</th>
                                <th>Student Name</th>
                                <th data-step="3" data-intro="Absentee Name">Dropped By</th>
                                <th data-step="4">Picked By</th>
                                <th data-step="4">Time In</th>
                                <th data-step="5">Time Out</th>
                                <th data-step="6">Teacher Remark</th>
                                <th data-step="7">Guardian Remark</th>
                                <th data-step="9"><span>Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($markAttend)){ ?>
                                <?php $i=1; foreach($markAttend as $val){ ?>
                                        <tr>
                                            <td><?= date('d-m-Y', strtotime($val['date'])); ?></td>
                                            <td><?php $studentRecord = $this->data->fetch('children', array('id' => $val['childId']))[0]; echo $studentRecord['fname']." ".$studentRecord['lname']; ?></td>
                                            <td><?= $val['droppedBy']?></td>
                                            <td><?= $val['pickedBy'] ?></td>
                                            <td><?= date('H:i:s', strtotime($val['inTime'])); ?></td>
                                            <td><?= date('H:i:s', strtotime($val['outTime'])); ?></td>
                                            <td><?= $val['teacherRemark']; ?></td>
                                            <td><?php if(!empty($val['guardianRemark'])){ echo $val['guardianRemark']; }else{ echo 'No Remark Yet'; } ?></td>
                                            <td><a style="cursor: pointer" onclick="deleteC('<?= site_url('home/markAttendanceLogout') . "/" . $val['childId']."/".$val['date']."/same" ?>')"><i class="material-icons">all_out</i></a></td>
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
    function deleteC(srcc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Do you want to Time Out?</h1>' +
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
