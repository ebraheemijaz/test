<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= site_url(); ?>/admin/view/live">Event Video</a></li>
                    <li><a href="">Edit Video</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Edit Event Video</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/update/'.$data[0]['id'].'/live/live',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                Minister Name
                                <input value="<?= $data[0]['minister'] ?>" type="text" class="form-control" name="minister" required placeholder="Enter Minister Name" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                Event Date
                                <!--<input name="startDate" value="<?= $reminderEvent[0]['date'] ?>" id="startDate" type="text" onfocus="(this.type='date')" placeholder="Enter Start Date" class="form-control" min="<?= date('Y-m-d')?>"/>-->
                                <input value="<?= $data[0]['dateOfEvent'] ?>" type="text" onfocus="(this.type='date')" required class="form-control" name="dateOfEvent" placeholder="Enter Event Date" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                Title
                                <input value="<?= $data[0]['title'] ?>" type="text" class="form-control" name="title" required placeholder="Enter Title" autofocus>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-12">
                                Youtube Live Link
                                <input type="text" value="<?= $data[0]['link'] ?>" class="form-control" name="link" required placeholder="Enter Youtube Link" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                Live Type
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" id="linkType1" value="<?= $data[0]['status'] ?>"/>
                                <div class="col-md-6">
                                    <input type="radio" required name="linkType" id="linkType" <?php if($data[0]['status'] == 'on'){echo 'checked';} ?> value="live"/><span>Live</span>
                                </div>
            
                                <div class="col-md-6">
                                    <input type="radio" required name="linkType" id="linkType" <?php if($data[0]['status'] == 'off'){echo 'checked';} ?> value="nonLive"/><span>Non-Live</span>
                                </div>
                            </div>
                            <div class="col-md-12">How long will the event go?</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="expiryHours" required id="expiryHours" class="form-control">
                                        <?php for($i=0;$i<=10;$i++){ ?>
                                            <option <?= ($data[0]['expiryHours'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?> Hour(s)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="expiryMinutes" required id="expiryMinutes" class="form-control">
                                        <?php for($i=0;$i<=60;$i++){ ?>
                                            <option <?= ($data[0]['expiryMinutes'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?> Minutes(s)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
                                <br/>
                                <button class="btn btn-lg btn-login btn-block" type="submit">Save</button>
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
        var linkType1 = $('#linkType1').val();
        if(linkType1 == 'on'){
                $('#type').val('live');
                $('#expiryHours').css('display', 'block');
                $('#expiryMinutes').css('display', 'block');
            }else{
                $('#type').val('nonLive');
                $('#expiryHours').css('display', 'none');
                $('#expiryMinutes').css('display', 'none');
            }
    });
    $("#type").change(function(){
        var a = $("#type").val();
        if(a == "hard"){}
    });
    $("input[type='radio']").change(function(){
            var type = $(this).val();
            if(type == 'live'){
                $('#type').val('live');
                $('#expiryHours').css('display', 'block');
                $('#expiryMinutes').css('display', 'block');
            }else{
                $('#type').val('nonLive');
                $('#expiryHours').css('display', 'none');
                $('#expiryMinutes').css('display', 'none');
            }
      });
</script>