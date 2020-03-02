<style>
    textarea{
        font-size: 20px !important;
    }
    .row {
        margin-right: -15px;
        margin-left: -15px;
    }
    .row:before,
    .row:after{
        display: table;
        content: " ";
    }
    .row:after{
        clear: both;
    }
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
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">General Settings</header>
                    <div class="panel-body">
                        <br/>
                        <?= form_open_multipart('admin/update/1/details/settings',array("class"=>"form-horizontal")) ?>

                            <div class="form-group">
                                <div class="col-md-2">
                                    Worship Centre Name
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="name" value="<?= $detailsss[0]['name'] ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Email
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="email" value="<?= $detailsss[0]['email'] ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Phone Number
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="phone" value="<?= $detailsss[0]['phone'] ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Address
                                </div>
                                <div class="col-md-10">
                                    <textarea name="address" id="" cols="30" rows="3" class="form-control"><?= $detailsss[0]['address'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Youtube
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="youtube" class="form-control" value="<?= $detailsss[0]['youtube'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Instagram
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="instagram" class="form-control" value="<?= $detailsss[0]['instagram']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Facebook URL
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="facebook" class="form-control" value="<?= $detailsss[0]['facebook'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Twitter URL
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="twitter" class="form-control" value="<?= $detailsss[0]['twitter'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Main Site
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="mainSite" class="form-control" value="<?= $detailsss[0]['mainSite'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Allow Email Push Notifications to Members
                                </div>
                                <div class="col-md-10">
                                    <?php $emailSub = $this->data->fetch('details');?>
                                    <span>No</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="switch">
                                              <input type="checkbox" <?php if($emailSub[0]['emailSub'] == 1){ ?>checked<?php }?> id="subscribe">
                                              <span class="slider round"></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span>Yes</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Church Logo
                                </div>
                                <div class="col-md-10">
                                    <img width="200" height="200" src="<?php if(!empty($detailsss[0]['logo'])){ echo base_url('assets_f')."/".$detailsss[0]['logo']; }else{ ?>http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image<?php } ?>" id="blah" alt=""/>
                                    <input type="file" required name="image" id="logo" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2 ">
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script>
    $(document).ready(function(){
        $('#subscribe').click(function(){
            if(this.checked){
                swal({
                    title: "Are you sure?",
                    text: "Do you want to subscribe email notification?",
                    type: "question",
                    // showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Subscribe!!!',
                    // cancelButtonText: 'No!!!'
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            url: "<?= site_url('admin') ?>/emailSub",
                            type: "POST",
                            data: {emailSub:1},
                            success: function(e){
                                swal(
                                  'Congratulation!',
                                  'You are subscribed to email notification.',
                                  'success'
                                )
                                // window.location.reload();
                            }
                        });
                    }
                });
            }else{
                id = "<?= $userAdmin[0]['id']; ?>";
                swal({
                    title: "Are you sure?",
                    text: "Do you want to unsubscribe email notification?",
                    type: "question",
                    // showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Unsubscribe!!!',
                    // cancelButtonText: 'No!!!'
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            url: "<?= site_url('admin') ?>/emailSub",
                            type: "POST",
                            data: {emailSub:0},
                            success: function(e){
                                swal(
                                  'Congratulation!',
                                  'You are unsubscribed to email notification.',
                                  'success'
                                )
                                // window.location.reload();
                            }
                        });
                    }
                });
            }
        }); 
    });
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    img = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo").change(function(){
            console.log(1);
            readURL(this);
        });
</script>