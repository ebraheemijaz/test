<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Edit Bulletin</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Edit News & Bulletin</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/update/'.$data[0]['id'].'/bulletin/view_bulletin',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-2">
                                <label for="">Title</label>
                            </div>
                            <div class="col-md-8">
                                <input name="title" value="<?= $data[0]['title'] ?>" class="form-control" type="text"/>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-2">
                                <label for="">Thumbnail Image</label>
                            </div>
                            <div class="col-md-8">
                                <input  name="image" class="form-control" type="file"/>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-2">
                                Message
                            </div>
                            <div class="col-md-10">
                                <textarea id="summernote" cols="30" name="text" class="form-control" rows="4"><?= $data[0]['text'] ?></textarea>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-lg-offset-2 col-lg-4 col-md-12">
                                <button class="btn btn-lg btn-login btn-block" type="submit">Save!</button>
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

</script>