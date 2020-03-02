<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= site_url(); ?>/admin/view/live">Age Group</a></li>
                    <li><a href="">Edit Age Group</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Edit Age Group</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/update/'.$data[0]['id'].'/ageGroup/ageGroup',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                Name
                                <input value="<?= $data[0]['name'] ?>" type="text" class="form-control" name="name" required placeholder="Enter Group Name" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                Age Group
                                <!--<input name="startDate" value="<?= $reminderEvent[0]['date'] ?>" id="startDate" type="text" onfocus="(this.type='date')" placeholder="Enter Start Date" class="form-control" min="<?= date('Y-m-d')?>"/>-->
                                <input value="<?= $data[0]['ageGroup'] ?>" type="text" required class="form-control" name="ageGroup" placeholder="Enter Age Group 2 - 5" autofocus>
                            </div>
                            <div class="row"></div>
                            <br/>
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