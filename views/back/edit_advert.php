<style>
    /*default*/
    .imageSettingLaptop {
        height: 5em;
        width: 59%;
        margin-left: 27.9%;
        margin-top: -118%;
    }
    
    .imageSettingTab {
        height: 4.4em;
        width: 78%;
        margin-left: 10.9%;
        margin-top: -69%;
    }
    
    .imageSettingMobile {
        height: 8.1em;
        width: 74%;
        margin-left: 12%;
        margin-top: -225%;
    }
    
    /*Screensize 360 x 640*/
    @media screen and (min-width: 360px) and (max-width: 411px){
        .imageSettingLaptop {
            height: 3.9em;
            width: 59%;
            margin-left: 27.9%;
            margin-top: -120%;
        }
        .imageSettingTab {
            height: 3.5em;
            width: 78%;
            margin-left: 10.9%;
            margin-top: -72%;
        }
        .imageSettingMobile {
            height: 14em;
            width: 74%;
            margin-left: 12%;
            margin-top: -218%;
        }
    }
    
    /*Screensize 640 x 360*/
    @media screen and (min-width: 412px) and (max-width: 768px) {
        .imageSettingLaptop {
            height: 6em;
            width: 33%;
            margin-left: 15.9%;
            margin-top: -65%;
        }
        .imageSettingTab {
            height: 5.4em;
            width: 43%;
            margin-left: 5.9%;
            margin-top: -38%;
        }
        .imageSettingMobile {
            height: 20.1em;
            width: 40%;
            margin-left: 7%;
            margin-top: -116%;
        }
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Edit Advert</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Edit Advert</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/update/'.$data[0]['id'].'/advert/advert',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-2">
                                <label for="">Horizontal Banner</label>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <label>Device Preview Outlook</label>
                            </div>
                            <div class="col-md-8">
                                <input name="advert[]" value="<?= $data[0]['horizontal'] ?>" id="horizontal" onchange="horizontalPreview(this)" class="form-control" type="file"/>
                                <br/>
                                <div class="col-md-6">
                                    <img src="<?= base_url("assets_f")."/img/laptop.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="<?= base_url("assets_f")."/img/business/".$data[0]['horizontal'] ?>" id="laptopH" class="imageSettingLaptop"/>
                                </div>
                                <div class="col-md-6">
                                    <img src="<?= base_url("assets_f")."/img/tab.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="<?= base_url("assets_f")."/img/business/".$data[0]['horizontal'] ?>" id="tabH" class="imageSettingTab"/>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-bottom: 20px;">
                                <div>
                                    <img src="<?= base_url("assets_f")."/img/mobile.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="<?= base_url("assets_f")."/img/business/".$data[0]['horizontal'] ?>" id="mobileH" class="imageSettingMobile"/>
                                </div>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-2">
                                <label for="">Vertical Banner</label>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <label>Devic Preview Outlook</label>
                            </div>
                            <div class="col-md-8">
                                <input  name="advert[]" id="vertical" onchange="verticalPreview(this)" value="<?= $data[0]['vertical'] ?>" class="form-control" type="file"/>
                                <br/>
                                <div class="col-md-6">
                                    <img src="<?= base_url("assets_f")."/img/laptop.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="<?= base_url("assets_f")."/img/business/".$data[0]['vertical'] ?>" id="laptopV" class="imageSettingLaptop"/>
                                </div>
                                <div class="col-md-6">
                                    <img src="<?= base_url("assets_f")."/img/tab.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="<?= base_url("assets_f")."/img/business/".$data[0]['vertical'] ?>" id="tabV" class="imageSettingTab"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img src="<?= base_url("assets_f")."/img/mobile.png" ?>" alt="" style="height: auto; width: 340px;" />
                                <img src="<?= base_url("assets_f")."/img/business/".$data[0]['vertical'] ?>" id="mobileV" class="imageSettingMobile"/>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-2">
                                Starting Date
                            </div>
                            <div class="col-md-10">
                                <input type="date" name="starting" value="<?echo(explode(' ',$data[0]['starting'])[0])?>" placeholder="Select Date">
                            </div>
                            <br/ >
                            <div class="col-md-2">
                                Weeks
                            </div>
                            <div class="col-md-10">
                                <select name="week" id="perWeekForAdv" onchange="getQuoteForAdvert()" class="form-control">
                                    <?php for($i=1; $i <= 52; $i++){ ?>
                                        <option <?= ($data[0]['week'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?> Weeks</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-2">
                                Advert Cost : 
                            </div>
                            <div class="col-md-10">
                                £ 1:00 /- per week
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-2">
                                Total Cost : 
                            </div>
                            <div class="col-md-10">
                                £ <span id="advertquote"><?= number_format(($data[0]['week']), 2, '.', ','); ?></span>/-
                            </div>
                            <br/>
                            <?php if($data[0]['member'] == 0){ ?>
                            <div class="col-md-2">
                                Payment : 
                            </div>
                            <div class="col-md-5">
                                <input type="radio" class="form-control" name="payment" value="paid" <?php if($data[0]['status'] == 'paid'){ echo 'checked'; } ?>/>&nbsp;&nbsp;Paid
                            </div>
                            <div class="col-md-5">
                                <input type="radio" class="form-control" name="payment" value="unpaid" <?php if($data[0]['status'] == 'unpaid'){ echo 'checked'; } ?> />&nbsp;&nbsp; Unpaid
                            </div>
                            <?php } ?>
                            <br/>
                            <br/>
                            <div class="col-md-2">
                                Approval : 
                            </div>
                            <div class="col-md-10">
                                <div class="col-md-4">
                                    <input type="radio" class="form-control" name="approval" value="1" <?php if($data[0]['approval'] == 1){ echo 'checked'; } ?>/>&nbsp;&nbsp;Approved
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" class="form-control" name="approval" value="0" <?php if($data[0]['approval'] == 0){ echo 'checked'; } ?>/>&nbsp;&nbsp;Not Approved
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" class="form-control" name="approval" value="2" <?php if($data[0]['approval'] == 2){ echo 'checked'; } ?>/>&nbsp;&nbsp;Concluded
                                </div>
                            </div>
                            <br/><br/>
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
    function horizontalPreview(input){
        // $('#blah1').css('display', 'block');
        readURL(input);
    }
    // $("#horizontal").on('click', function(){
    //         alert('1');
    //     });
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#laptopH').attr('src', e.target.result);
                    $('#tabH').attr('src', e.target.result);
                    $('#mobileH').attr('src', e.target.result);
                    img = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    function verticalPreview(input){
        // $('#blah2').css('display', 'block');
        readURL1(input);
    }
    function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#laptopV').attr('src', e.target.result);
                    $('#tabV').attr('src', e.target.result);
                    $('#mobileV').attr('src', e.target.result);
                    img = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script>
    function getQuoteForAdvert(){
        var week = $("#perWeekForAdv").val();
        //alert(week);
        $.post("<?= site_url('home/ajax/advertCharges') ?>",{week:week},function(e){
            //console.log(e);
            $("#advertquote").html(e);
        })
    }

</script>