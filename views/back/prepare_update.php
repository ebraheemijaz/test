<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Prepare Update</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Update</header>
                    <div class="panel-body">
                        <?= form_open('admin/insert/group/manage_admin',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-2">
                                <input id="member" type="checkbox"/>
                                <label for="">Members</label>
                            </div>
                            <div class="col-md-10 member">
                                <select name="member" multiple class="form-control chosen-select" id="">
                                    <option value="all">All Church Member</option>
                                    <?php foreach($members as $val){ ?>
                                        <option value=""><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                                    <?php } ?>
                                </select>
                                <br/>
                            </div>
                            <br/>
                            <div class="row"></div>
                            <div class="col-md-2">
                                <input id="bGroup" checked type="checkbox"/>
                                <label for="">Business Group</label>
                            </div>
                            <div class="col-md-4">
                                <select name="type" multiple class="form-control bGroup chosen-business-group" id="">
                                    <option value="">All</option>
                                    <?php foreach($businessGroup as $val){ ?>
                                        <option value=""><?= $val['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input id="church" checked type="checkbox"/>
                                <label for="">Church Group</label>
                            </div>
                            <div class="col-md-4">
                                <select name="type" class="form-control church" id="">
                                    <option value="">All</option>
                                    <?php foreach($churchgroup as $val){ ?>
                                        <option value=""><?= $val['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-2">
                                Message
                            </div>
                            <div class="col-md-10">
<!--                                <div id="summernote"></div>-->
                                <textarea id="summernote" cols="30" name="desc" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-lg-offset-2 col-lg-4 col-md-12">
                                <button onclick="openCalendar()" class="btn btn-lg btn-login btn-block" type="button">Scheduled Release</button>
                                <input type="date" style="display:none;"  value="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" id="date"/>
                            </div>
                            <div class="col-lg-offset-2 col-lg-4 col-md-12">
                                <button class="btn btn-lg btn-login btn-block" type="submit">Immediate Release</button>
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