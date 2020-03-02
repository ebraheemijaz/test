<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Prepare Word Log</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Word Log</header>
                    <div class="panel-body">
                        <?= form_open('admin/update/'.$editWord[0]['id'].'/words/view_word',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;", "onSubmit"=>"document.getElementById('submit').disabled=true;")) ?>
                        <div class="login-wrap">
                            <div class="row"></div>

                            <div class="col-md-2">
                                <label for="">Preacher Name</label>
                            </div>
                            <div class="col-md-4">
                                <input name="preacher_name" required="required" value="<?= $editWord[0]['preacher_name'] ?>" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-2">
                                <label for="">Topic Preached</label>
                            </div>
                            <div class="col-md-4">
                                <input  name="topic" required="required" value="<?= $editWord[0]['topic'] ?>" class="form-control" type="text"/>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-2">
                                <label for="">Date Preached</label>
                            </div>
                            <div class="col-md-4">
                                <input name="date_preached" value="<?= date('Y-m-d', strtotime($editWord[0]['date_preached'])) ?>" required="required" class="form-control" type="date"/>
                            </div>
                            <div class="row"></div>
                            <br>
                            <div class="col-md-2">
                                Message
                            </div>
                            <div class="col-md-10">
<!--                                <div id="summernote"></div>-->
                                <textarea id="summernote" cols="30" required="required" name="message" class="form-control" rows="4"><?= $editWord[0]['message'] ?></textarea>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-lg-offset-2 col-lg-4 col-md-12">
                                <button class="btn btn-lg btn-login btn-block" type="submit" id="submit">Share With Members</button>
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