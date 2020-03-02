<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.chosen-choices{
        padding: 10px !important;
        border-radius: 5px;
    }
    .chosen-container{
        width: 38% !important;
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
<link rel="stylesheet" href="<?= base_url('assets_f') ?>/chosen/chosen.css">
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Add Child </h3>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-12">
                <div class="md-card uk-margin-medium-bottom">
                    <div  class="md-card-content" data-step="1" data-intro="List of all the testimony comes here">
                        <div class="dt_colVis_buttons">
                            <button data-step="3" data-intro="Click here to create new keeper network" class="md-btn md-btn-danger" data-uk-modal="{target:'#newModal'}">Add Child / Grand Child</button>
                        </div>
                        <div class="dt_colVis_buttons"></div>
                        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-step="2" data-intro="Date Added">Date</th>
                                <th data-step="3" data-intro="Absentee Name">Class Name</th>
                                <th data-step="4">Teacher In Charge</th>
                                <th data-step="5">Students</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($teacherClass)){ ?>
                                <?php $i=1; foreach($teacherClass as $val){ ?>
                                        <tr>
                                            <td><?= date('d-m-Y h:i:s', strtotime($val['createdAt'])); ?></td>
                                            <td><?= $val['className']; ?></td>
                                            <td><?= $val['teacherName'] ?></td>
                                            <td><?php foreach(explode(',' ,$val['studentName']) as $valS){if($valS != ''){ echo $valS."<br/>";} } ?></td>
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
        <h1>Add Child</h1>
        <?= form_open("home/insert/addChild/addChild",array('class'=>"form-horizontal", "onSubmit"=>"document.getElementById('submit').disabled=true; document.getElementById('newModal').hide();")) ?>
        <div class="form-group" style="padding-bottom : 15px;">
            Add New Child To Class
        </div>
        <div id="yesForm" style="display : block;">
        <div class="form-group" style="padding-bottom : 15px;">
            Class Name : 
            <select name="className" id="className" required class="chosen-select md-input">
                <option value="">Select Class</option>
                <?php foreach($teacherClass as $class){ ?>
                    <option value="<?= $class['id'] ?>"><?= $class['className'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group" style="padding-bottom : 15px;">
            Child / Grand Child Name:
            <select name="childName[]" id="childName" multiple required id="" class="md-input chosen-select">
                <option value="">Select</option>
                <?php foreach($childrens as $child){ ?>
                    <option value="<?= $child['id'] ?>"><?= $child['fname']." ".$child['lname']." (".$child['relation'].") " ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" id="submit" class="md-btn md-btn-success" value="Add Child"/>
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
<script src="<?= base_url('assets_f') ?>/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url('assets_f') ?>/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
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
    var config = {
        // '.chosen-select'           : {placeholder:"Select Member"},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"75%"}
    }
    $(".chosen-select").chosen({
        placeholder_text_multiple: 'Members'
    });
</script>
