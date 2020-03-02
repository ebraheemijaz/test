<style>
    /*default*/
    .imageSettingLaptop {
        height: 6em;
        width: 59%;
        margin-left: 27.9%;
        margin-top: -117%;
    }
    
    .imageSettingTab {
        height: 5.6em;
        width: 78%;
        margin-left: 11%;
        margin-top: -67%;
    }
    
    .imageSettingMobile {
        height: 9.4em;
        width: 74%;
        margin-left: 13%;
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
<div id="page_content">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Add Advert</h4>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <?= form_open_multipart('home/insert/advert/advert',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                <div class="uk-width-medium-10-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content" data-step="1" data-intro="Your Advert Orders">
                        <div class="dt_colVis_buttons" data-step="2" data-intro="Click This To Adjust Visibility of columns"></div>
                        <div class="uk-grid uk-grid-medium">
                            <div class="uk-width-medium-1-6">Horizontal Banner : <br/><br/><br/><br/>Device Preview Outlook:</div>
                            <div class="uk-width-medium-2-3">
                                <input name="advert[]" value="<?= $data[0]['horizontal'] ?>" id="horizontal" onchange="horizontalPreview(this)" class="md-input" type="file"/>
                                <br/>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-width-medium-1-2">
                                        <img src="<?= base_url("assets_f")."/img/laptop.png" ?>" alt="" style="height: auto; width: 340px;" />
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="laptopH" class="imageSettingLaptop"/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <img src="<?= base_url("assets_f")."/img/tab.png" ?>" alt="" style="height: auto; width: 340px;" />
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="tabH" class="imageSettingTab"/>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-6">
                                <div>
                                    <img src="<?= base_url("assets_f")."/img/mobile.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="mobileH" class="imageSettingMobile"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid uk-grid-medium">
                            <div class="uk-width-medium-1-6">Vertical Banner : <br/><br/><br/><br/>Device Preview Outlook</div>
                            <div class="uk-width-medium-2-3">
                                <input name="advert[]" value="<?= $data[0]['vertical'] ?>" id="vertical" onchange="verticalPreview(this)" class="md-input" type="file"/>
                                <br/>
                                <div class="uk-width-medium-1-2">
                                    <img src="<?= base_url("assets_f")."/img/laptop.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="laptopV" class="imageSettingLaptop"/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <img src="<?= base_url("assets_f")."/img/tab.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="tabV" class="imageSettingTab"/>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-6">
                                <div>
                                    <img src="<?= base_url("assets_f")."/img/mobile.png" ?>" alt="" style="height: auto; width: 340px;" />
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="mobileV" class="imageSettingMobile"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid uk-grid-medium">
                            <div class="uk-width-medium-1-6">Weeks : </div>
                            <div class="uk-width-medium-5-6">
                                <select name="week" id="perWeekForAdv" onchange="getQuoteForAdvert()" class="md-input">
                                    <?php for($i=1; $i <= 52; $i++){ ?>
                                        <option <?= ($data[0]['week'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?> Weeks</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="uk-grid uk-grid-medium">
                            <div class="uk-width-medium-1-6">Advert Cost : </div>
                            <div class="uk-width-medium-5-6">
                                £ 1:00 /- per week
                            </div>
                        </div>
                        <div class="uk-grid uk-grid-medium">
                            <div class="uk-width-medium-1-6">Total Cost : </div>
                            <div class="uk-width-medium-5-6">
                                <span id="advertquote">1:00</span>/-
                            </div>
                        </div>
                        <div class="uk-grid uk-grid-medium">
                            <div class="uk-width-medium-1-3"></div>
                            <div class="uk-width-medium-1-3">
                                <button class="md-btn md-btn-primary md-btn-block md-btn-large" type="submit">Save!</button>
                            </div>
                            <div class="uk-width-medium-1-3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>

    </div>
</div>
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
