<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Create Bulletin</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> Create News & Bulletin</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/insert/bulletin/view_bulletin',array("class"=>"form-signin","id" => "form","autocomplete"=>"off","style"=>"max-width: 100% !important;", "onSubmit"=>"document.getElementById('saveButton').disabled=true;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-2">
                                    <input type="checkbox" checked class="chosen-toggle select form-control col-md-3" id="selectAll" style="margin-bottom: -20px;">
                                    <label for="" style="margin-top: 20px;"><?php ?>All Members</label>
                            </div>
                            <div class="col-md-8">
                                <select name="member[]" multiple class="form-control chosen-select" id="mem">
                                    <?php $members = $this->data->myquery('SELECT * FROM `member` WHERE status = "active" ORDER BY lname DESC'); ?>
                                    <?php foreach($members as $val){ ?>
                                        <option selected value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-2">
                                <label for="">Title</label>
                            </div>
                            <div class="col-md-8">
                                <input name="title" class="form-control" required="required" type="text"/>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-2">
                                <label for="">Thumbnail Image</label>
                            </div>
                            <div class="col-md-8">
                                <input  name="image" class="form-control" required="required" type="file"/>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-2">
                                Message
                            </div>
                            <div class="col-md-10">
                                <textarea id="summernote" cols="30" name="text" class="form-control" required="required" rows="4"></textarea>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-lg-offset-2 col-lg-4 col-md-12">
                                <button class="btn btn-lg btn-login btn-block" id="saveButton" type="submit">Share With Members!</button>
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
    // $('#saveButton').click(function(){
    //     $('#form').submit();
    //     //alert('Form Submitted Successfully. Image is uploading so make time to close the window.');
    //     $('#saveButton').attr('disabled', true);
    // });
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