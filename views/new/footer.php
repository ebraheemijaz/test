<div id="advevver"></div>
<!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
        // $('#dt_Expert').DataTable({aaSorting: [[ 0, "desc" ]]});
        // $('#dt_default').DataTable({aaSorting: [[ 0, "asc" ]]});
        window.onload = detectmob;
        function detectmob() { 
         if(navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         || navigator.userAgent.match(/Windows Phone/i)
         ){
            $('.detect').css({'-ms-transform':'rotate(0deg)', '-webkit-transform':'rotate(0deg)','transform':'rotate(0deg)'});
            $('.detect8').css({'-ms-transform':'rotate(0deg)', '-webkit-transform':'rotate(0deg)','transform':'rotate(0deg)'});
            $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
            $('.detectHeader8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
            $('.detectChat').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
          }else if(navigator.userAgent.match(/Android/i)){
              $('.detect').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
              $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
              $('.detectHeader8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectChat').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
          }
         else if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
            $('.detect').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
            $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
            $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
            $('.detectHeader8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
            $('.detectChat').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
          }else{
              $('.detect').css({'-ms-transform':'rotate(00deg)', '-webkit-transform':'rotate(0deg)','transform':'rotate(0deg)'});
              $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
              $('.detectHeader8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectChat').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
          }
        }
        function validate(evt) {
      var theEvent = evt || window.event;
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode( key );
      var regex = /[0-9]|\./;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      }
    }
    </script>
<script src="<?= base_url('assets_new') ?>/assets/js/uikit_custom.min.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?= base_url('assets_new') ?>/assets/js/altair_admin_common.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/pages/page_contact_list.min.js"></script>
    <script src="<?= base_url('assets_new') ?>/assets/js/pages/page_chat.min.js"></script>
    <!--<script src="<?= base_url('assets_new') ?>/assets/js/lightbox-plus-jquery.min.js"></script>-->

<script>
    function openVideoa(strr){
        var url = "https://www.youtube.com/embed/"+strr+"?rel=0&amp;showinfo=0";
        var a = '<div class="uk-modal" id="newModalvid">' +
            '<div class="uk-modal-dialog">' +
            '<a href="" onclick="modalClose()" class="uk-modal-close uk-close"></a>' +
            '<iframe width="100%"  height="300px" src="'+url+'" frameborder="0" allowfullscreen></iframe>'+
            '</div>' +
            '</div>';

        $("#vid").html(a);
        var modal = UIkit.modal("#newModalvid",{keyboard: false , bgclose:false});
        modal.show();
    }
    
    function openVoiceNote(strr) {
        // alert(strr);
        var a = '<div class="uk-modal" id="newModalAud">' +
                '<div class="uk-modal-dialog" id="ukModalDialog">'+
                '<a href="" onclick="modalClose()" class="uk-modal-close uk-close"></a>'+
                '<audio preload="auto" src="'+strr+'" controls style="height: 54px!important;"></audio>'+
                '</div>'+
                '</div>';
            $('#vid').html(a);
            var modal = UIkit.modal("#newModalAud", {keyboard: false, bgclose: false});
            modal.show();
    }
    function modalClose(){
        console.log(1);
        $("#vid").html('');
    }
</script>
<script>
    function requestAdv(strr){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h1>Request Advert</h1>'+
        '<?= form_open_multipart('home/insert/advert/advert',array('class'=>"form-signin", 'onsubmit'=>"return validateForm()")); ?>'+
        '<div class="uk-width-medium-1-1"> ' +
            '<div class="md-card"> ' +
            '<div class="md-card-content"> ' +
            '<h3 class="heading_a uk-margin-bottom">Horizontal Banner</h3> ' +
            '<div class="uk-form-file md-btn md-btn-primary">' +
            'Select ' +
            '<input id="horizontal" onchange="horizontalImageSelected()" name="horizontal" required="required" accept="image/png, image/jpeg" type="file">' +
            '</div> ' +
            'File size should be (1024x400) <br> <span id="forHorizontalImangeName"></span>' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '<div class="uk-width-medium-1-1"> ' +
            '<div class="md-card"> ' +
            '<div class="md-card-content"> ' +
            '<h3 class="heading_a uk-margin-bottom">Vertical Banner</h3> ' +
            '<div class="uk-form-file md-btn md-btn-primary"> ' +
            'Select ' +
            '<input id="vertical" onchange="verticalImageSelected()" accept="image/png, image/jpeg" required="required" name="vertical"  type="file"> ' +
            '</div> ' +
            'File size should be (120x450) <br><span id="forVerticalImangeName"></span> ' +
            '</div>  ' +
            '</div> Note: Using the correct image sizes is essential to make your advert appear correctly on all responsive platforms and make sure you upload jpeg format files' +
            '</div> ' +
            '<p>Weeks</p> ' +
            '<select name="week" id="perWeekForAdv" onchange="getQuoteForAdvert()" class="md-input">'+
            '<?php for($i=1;$i<=52;$i++){ ?>'+
        '<option value="<?= $i ?>"><?= $i ?> Weeks</option>'+
        '<?php } ?>'+
        '</select> ' +
            '<br/> ' +
            '<p>Advert Cost : £ 1:00 /- per week</p> ' +
            '<p>Total Cost: £ <span id="advertquote">1:00</span>/-</p> ' +
            '<button type="submit" class="md-btn md-btn-info">Send Request</button>'+
        '<?= form_close(); ?>'+
        '</div>'+
        '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
</script>
<script>

    function validateForm(){
        var horizontal = $("#horizontal")[0].files[0].name;
        var vertical = $("#vertical")[0].files[0].name;

        if(horizontal){
            if(vertical){
                return true;
            }else{
                alert("Vertical Banner Can\'t be empty!");
                return false;
            }
        }else{
            alert("Horizontal Banner Can\'t be empty!");
            return false;
        }
    }
    function horizontalImageSelected(){
        var a = $("#horizontal")[0].files[0].name;
        $("#forHorizontalImangeName").html(a);
    }
    function verticalImageSelected(){
        var a = $("#vertical")[0].files[0].name;
        $("#forVerticalImangeName").html(a);
    }

</script>
<script>
    function deleteFromBuddiesModalFunc(strr,id){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h3>Are you sure you want to delete '+ strr +' from buddy list?</h3>' +
            '<span  onclick="deleteFromBuddies(' + id + ')" class="md-btn md-btn-primary addToBuddiesss">Yes</span>'+
            '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
            '</div>'+
            '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
    function AddToBuddiesModalFunc(strr,id){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h3>Are you sure you want to add '+ strr +' as a buddy?</h3>' +
            '<span  onclick="addToBuddies(' + id + ')" class="md-btn md-btn-primary addToBuddiesss" id="addYes">Yes</span>'+
            '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
            '</div>'+
            '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
    function AddProductAndServices(){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h3>Add Product & Services</h3>' +
            '<?= form_open_multipart('home/insert/business_imgs/manage_business',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>' +
            '<div class="login-wrap"> ' +
                '<div class="uk-grid" data-uk-grid-margin>' +
                    '<div class="uk-width-medium-1-2">' +
                        '<div class="uk-form-file md-btn md-btn-danger">' +
                            'Select Image' +
                            '<input class="form-file" type="file" id="file-select" name="img"/>' +
                        '</div>' +
                    '</div>' +
                    '<div class="uk-width-medium-1-1">' +
                        '<textarea class="md-input" placeholder="Description" name="desc"></textarea>' +
                    '</div>' +
                    '<div class="uk-width-medium-1-1">' +
                        '<br/><button class="md-btn md-btn-primary" type="submit">Add</button>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<br/>' +
            '</div>' +
            '<?= form_close(); ?>' +
            '</div>'+
            '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
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


<!-- page specific plugins -->
<script src="<?= base_url('assets_new') ?>/assets/js/pages/components_notifications.min.js"></script>
<script src="<?= base_url('assets_new') ?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets_new') ?>/bower_components/datatables-buttons/js/dataTables.buttons.js"></script>
<script src="<?= base_url('assets_new') ?>/assets/js/custom/datatables/buttons.uikit.js"></script>
<script src="<?= base_url('assets_new') ?>/bower_components/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url('assets_new') ?>/bower_components/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url('assets_new') ?>/bower_components/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url('assets_new') ?>/bower_components/datatables-buttons/js/buttons.colVis.js"></script>
<script src="<?= base_url('assets_new') ?>/bower_components/datatables-buttons/js/buttons.html5.js"></script>
<script src="<?= base_url('assets_new') ?>/bower_components/datatables-buttons/js/buttons.print.js"></script>
<script src="<?= base_url('assets_new') ?>/assets/js/custom/datatables/datatables.uikit.min.js"></script>
<script src="<?= base_url('assets_new') ?>/assets/js/pages/plugins_datatables.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="<?= base_url('assets_new') ?>/bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="<?= base_url('assets_new') ?>/bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="<?= base_url('assets_new') ?>/bower_components/chartist/dist/chartist.min.js"></script>
        <!-- maplace (google maps) -->
<!--        <script src="http://maps.google.com/maps/api/js"></script>-->
<!--        <script src="<?= base_url('assets_new') ?>/bower_components/maplace-js/dist/maplace.min.js"></script>-->
        <!-- peity (small charts) -->
        <script src="<?= base_url('assets_new') ?>/bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="<?= base_url('assets_new') ?>/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="<?= base_url('assets_new') ?>/bower_components/countUp.js/dist/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="<?= base_url('assets_new') ?>/bower_components/handlebars/handlebars.min.js"></script>
        <script src="<?= base_url('assets_new') ?>/assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="<?= base_url('assets_new') ?>/bower_components/clndr/clndr.min.js"></script>
        <script src="<?= base_url('assets_new') ?>/assets/js/pages/dashboard.min.js"></script>
        <script src="<?= base_url('assets_new') ?>/assets/js/pages/page_help.min.js"></script>
        <!-- EnjoyHint -->
        <script src="<?= base_url('assets_new') ?>/intro/intro.js"></script>


<!--        <script src="--><?//= base_url('assets_new') ?><!--/bower_components/handlebars/handlebars.min.js"></script>-->
<!--        <script src="--><?//= base_url('assets_new') ?><!--/assets/js/custom/handlebars_helpers.min.js"></script>-->

<script>
        $(function() {
//            if(isHighDensity()) {
//                $.getScript( "bower_components/dense/src/dense.js", function() {
//                    altair_helpers.retina_images();
//                })
//            }
            //if(Modernizr.touch) {
            //    FastClick.attach(document.body);
            //}
        });
        $window.load(function() {
            altair_helpers.ie_fix();
        });
    </script>
<div id="style_switcher">
    <div id="style_switcher_toggle"><i class="material-icons">&#xE8B8;</i></div>
    <div class="uk-margin-medium-bottom">
        <h4 class="heading_c uk-margin-bottom">Colors</h4>
        <ul class="switcher_app_themes" id="theme_switcher">
            <li class="app_style_default" data-app-theme=" ">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>

            <li class="switcher_theme_a" data-app-theme="app_theme_a">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>
            <li class="switcher_theme_b" data-app-theme="app_theme_b">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>
            <li class="switcher_theme_c" data-app-theme="app_theme_c">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>
            <li class="switcher_theme_d" data-app-theme="app_theme_d">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>
            <li class="switcher_theme_e" data-app-theme="app_theme_e">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>

            <li class="switcher_theme_g" data-app-theme="app_theme_g">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>
            <li class="switcher_theme_h active_theme" data-app-theme="app_theme_h">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>
            <li class="switcher_theme_i" data-app-theme="app_theme_i">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>
            <li class="switcher_theme_dark" data-app-theme="app_theme_dark">
                <span class="app_color_main"></span>
                <span class="app_color_accent"></span>
            </li>
        </ul>
    </div>
    <div class="uk-visible-large uk-margin-medium-bottom">
        <h4 class="heading_c">Sidebar</h4>
        <p>
            <input type="checkbox" name="style_sidebar_mini" id="style_sidebar_mini" data-md-icheck />
            <label for="style_sidebar_mini" class="inline-label">Mini Sidebar</label>
        </p>
        <p>
            <input type="checkbox" name="style_sidebar_slim" id="style_sidebar_slim" data-md-icheck />
            <label for="style_sidebar_slim" class="inline-label">Slim Sidebar</label>
        </p>
    </div>
    <div class="uk-visible-large uk-margin-medium-bottom">
        <h4 class="heading_c">Layout</h4>
        <p>
            <input type="checkbox" name="style_layout_boxed" id="style_layout_boxed" data-md-icheck />
            <label for="style_layout_boxed" class="inline-label">Boxed layout</label>
        </p>
    </div>
    <div class="uk-visible-large">
        <h4 class="heading_c">Main menu accordion</h4>
        <p>
            <input type="checkbox" name="accordion_mode_main_menu" id="accordion_mode_main_menu" data-md-icheck />
            <label for="accordion_mode_main_menu" class="inline-label">Accordion mode</label>
        </p>
    </div>
</div>
<script>
    $(function() {

        var a = localStorage.getItem("altair_theme");
        if(a == ''){
            localStorage.setItem("altair_theme","app_theme_h");
        }


        var $switcher = $('#style_switcher'),
            $switcher_toggle = $('#style_switcher_toggle'),
            $theme_switcher = $('#theme_switcher'),
            $mini_sidebar_toggle = $('#style_sidebar_mini'),
            $slim_sidebar_toggle = $('#style_sidebar_slim'),
            $boxed_layout_toggle = $('#style_layout_boxed'),
            $accordion_mode_toggle = $('#accordion_mode_main_menu'),
            $html = $('html'),
            $body = $('body');


        $switcher_toggle.click(function(e) {
            e.preventDefault();
            $switcher.toggleClass('switcher_active');
        });

        $theme_switcher.children('li').click(function(e) {
            e.preventDefault();
            var $this = $(this),
                this_theme = $this.attr('data-app-theme');

            $theme_switcher.children('li').removeClass('active_theme');
            $(this).addClass('active_theme');
            $html
                .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark')
                .addClass(this_theme);
            console.log(this_theme);
            if(this_theme == '') {
                localStorage.removeItem('altair_theme');
                $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
            } else {
                localStorage.setItem("altair_theme", this_theme);
                if(this_theme == 'app_theme_dark') {
                    $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.materialblack.min.css')
                } else {
                    $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
                }
            }

        });

        // hide style switcher
        $document.on('click keyup', function(e) {
            if( $switcher.hasClass('switcher_active') ) {
                if (
                    ( !$(e.target).closest($switcher).length )
                    || ( e.keyCode == 27 )
                ) {
                    $switcher.removeClass('switcher_active');
                }
            }
        });

        // get theme from local storage
        if(localStorage.getItem("altair_theme") !== null) {
            $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
        }


        // toggle mini sidebar

        // change input's state to checked if mini sidebar is active
        if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
            $mini_sidebar_toggle.iCheck('check');
        }

        $mini_sidebar_toggle
            .on('ifChecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.setItem("altair_sidebar_mini", '1');
                localStorage.removeItem('altair_sidebar_slim');
                location.reload(true);
            })
            .on('ifUnchecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.removeItem('altair_sidebar_mini');
                location.reload(true);
            });

        // toggle slim sidebar

        // change input's state to checked if mini sidebar is active
        if((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
            $slim_sidebar_toggle.iCheck('check');
        }

        $slim_sidebar_toggle
            .on('ifChecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.setItem("altair_sidebar_slim", '1');
                localStorage.removeItem('altair_sidebar_mini');
                location.reload(true);
            })
            .on('ifUnchecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.removeItem('altair_sidebar_slim');
                location.reload(true);
            });

        // toggle boxed layout

        if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
            $boxed_layout_toggle.iCheck('check');
            $body.addClass('boxed_layout');
            $(window).resize();
        }

        $boxed_layout_toggle
            .on('ifChecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.setItem("altair_layout", 'boxed');
                location.reload(true);
            })
            .on('ifUnchecked', function(event){
                $switcher.removeClass('switcher_active');
                localStorage.removeItem('altair_layout');
                location.reload(true);
            });

        // main menu accordion mode
        if($sidebar_main.hasClass('accordion_mode')) {
            $accordion_mode_toggle.iCheck('check');
        }

        $accordion_mode_toggle
            .on('ifChecked', function(){
                $sidebar_main.addClass('accordion_mode');
            })
            .on('ifUnchecked', function(){
                $sidebar_main.removeClass('accordion_mode');
            });


    });
</script>
<!--Edit Profile-->
<script src="<?= base_url('assets_new') ?>/assets/js/custom/uikit_fileinput.min.js"></script>
<script src="<?= base_url('assets_new') ?>/assets/js/pages/page_user_edit.min.js"></script>
<?php if(!empty($userAdmin)){ ?>
    <script>
        setInterval(function(){
            $.post("<?= site_url('home/ajax/online') ?>",{id:<?= $userAdmin[0]['id']; ?>},function(e){

            })
        },2000);
        
        setInterval(function(){
            $.post("<?= site_url('home/ajax/visiblity') ?>",{id:<?= $userAdmin[0]['id']; ?>},function(e){
                // alert(e);
                console.log(e);
            })
        },2000);
        
        setInterval(function(){
            $.post("<?= site_url('home/ajax/checkOnline') ?>", {id: <?= $userAdmin[0]['id'] ?>}, function(e){
                if(e == 'Absent'){
                    window.location.href= "<?= site_url('home/logout2') ?>";
                }
            });
        }, 2000);
        setInterval(function(){
            $.post("<?= site_url('home/ajax/updateIsDeleted') ?>", {id:<?= $userAdmin[0]['id']; ?>}, function(e){
                
            }); 
        }, 10000);
        setInterval(function(){
            $.post("<?= site_url('home/ajax/reminder') ?>",{id:<?= $userAdmin[0]['id']; ?>}, function(e){
                console.log(e);
                if(e != 'Time'){
                UIkit.notify({
                    message: e,
                    status : 'danger',
                    timeout: 5000,
                    pos : 'top-center'
                });
                }
            });
        },1000);
    </script>
    <?php if(empty($userAdmin[0]['gander']) OR empty($userAdmin[0]['biography']) OR empty($userAdmin[0]['lname'])){ ?>
        <script>
            UIkit.notify({
                message : 'Please Complete Your Profile Information <a href="<?= site_url('home/view/edit_profile') ?>">here</a>',
                status  : 'danger',
                timeout : 5000,
                pos     : 'top-center'
            });
            
        </script>
    <?php } ?>
<?php } ?>
<script>

    function businessPageEnterInf(){
        UIkit.notify({
            message : 'Hello! Please update your business details <a href="<?= site_url('home/view/edit_business') ?>">here</a>',
            status  : 'warning',
            timeout : 10000,
            pos     : 'top-center'
        });
    }

    $("[name=visiblity]").change(function(){
        UIkit.notify({
            message : 'Now click Save to finalise',
            status  : 'warning',
            timeout : 2000,
            pos     : 'top-center'
        });
    })
</script>

<script language="javascript" type="text/javascript">
    function limitText(limitField, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        }
    }
</script>
<?php
// $check = $this->session->userdata("userMember");
// $user_id = $check[0]['id'];
// $maxIdReminder = $this->data->myquery("SELECT max(id) as maxId FROM `reminders` WHERE `user_id`='$user_id'");
?>
<script>
    function addReminder(){
        var title = $("#clndr_event_title_control").val();
        var link = $("#clndr_event_link_control").val();
        var file = $("#clndr_event_image_control").val();
        var desc = $("#clndr_event_desc_control").val();
        var date = $("#clndr_event_date_control").val();
        var enddate = $("#clndr_event_end_date_control").val();
        var start = $("#clndr_event_start_control").val();
        var end = $("#clndr_event_end_control").val();
        // var reminder = $("#clndr_event_remind_control").val();
        $.post("<?= site_url('home/insert/reminders') ?>",{desc:title, link:link, date:date, end:end,start:start,endDate:enddate,image:file,eventDesc:desc},function(e){
            UIkit.notify({
                message : 'Your event has been added',
                status  : 'warning',
                timeout : 2000,
                pos     : 'top-center'
            });
            openNewModal();
            // window.location.reload();
        });
    }
    
    function setReminder(){
        // var id = "<?= $maxIdReminder[0]['maxId'] ?>";
        var reminder = $("#clndr_event_remind_control").val();
        $.post("<?= site_url('home/updateReminder') ?>", {reminder_event:reminder,isReminded:1}, function(e){
            console.log(e);
            UIkit.notify({
                message : 'Thanks to set the reminder successfully.',
                status  : 'warning',
                timeout : 0,
                pos     : 'top-center'
            });
            window.location.reload();
        });
    }
    
    function addMultiReminder(){
        var text= new Array();
        var title = $("#clndr_event_title_control").val();
        var link = $("#clndr_event_link_control").val();
        var file = $("#clndr_event_image_control").val();
        var desc = $("#clndr_event_desc_control").val();
        // $('input[name="clndr_event_date_control[]"]').each(function(){
        //   text.push($(this).val());
        // });
        alert($('#clndr_event_date_control1').size());
        var date = $('input[name="clndr_event_date_control[]"]').map(function(){
          return this.name + '=' + this.value;
        }).get().join('&');
        alert(date);
        // var enddate = $("#clndr_event_end_date_control").val();
        // var start = $("#clndr_event_start_control").val();
        // var end = $("#clndr_event_end_control").val();
        console.log(text);

        // $.post("<?= site_url('home/insert/reminders') ?>",{desc:title, link:link, date:date, end:end,start:start,endDate:enddate},function(e){
        //     $("#modal-example").show();
        //     UIkit.notify({
        //         message : 'Your event has been added',
        //         status  : 'warning',
        //         timeout : 2000,
        //         pos     : 'top-center'
        //     });
        //     // window.location.reload();
        // });
    }
    function deleteChildsConfirmationModal(src){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h3>Are you sure you want to delete the information</h3>' +
            '<a href="'+src+'"><span class="md-btn md-btn-primary">Yes</span></a> '+
            ' <span class="md-btn md-btn-danger uk-modal-close">No</span>'+
            '</div>'+
            '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
    function dltGroupConvoConfirmModal(){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h3>Are you sure you want to delete your conversation?</h3>' +
            '<span  onclick="deleteGroupConversation()" class="uk-modal-close md-btn md-btn-primary addToBuddiesss">Yes</span>'+
            '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
            '</div>'+
            '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
    function deleteConversationsConfirmationModal(){
        var sendersid = window.location.hash;
        if(sendersid){
            var a = '<div class="uk-modal" id="newModalAdv"> ' +
                '<div class="uk-modal-dialog"> ' +
                '<a href="" class="uk-modal-close uk-close"></a> ' +
                '<h3>Are you sure you want to delete your conversation?</h3>' +
                '<span  onclick="deleteConversation()" class="uk-modal-close md-btn md-btn-primary addToBuddiesss">Yes</span>'+
                '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
                '</div>'+
                '</div>';
        }else{
            var a = '<div class="uk-modal" id="newModalAdv"> ' +
                '<div class="uk-modal-dialog"> ' +
                '<a href="" class="uk-modal-close uk-close"></a> ' +
                '<h3>Are you sure you want to delete all chat messages with all buddies?</h3>' +
                '<span  onclick="deleteAllConversation()" class="uk-modal-close md-btn md-btn-primary addToBuddiesss">Yes</span>'+
                '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
                '</div>'+
                '</div>';
        }    
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
</script>
<script>
    var one = $("#oneDayEvent").html();
    var multi = $("#multiDayEvent").html();
    $("#multiDayEvent").html("");

    function changeEventTypee(a){
        if(a == 'one'){
            $("#oneDayEvent").html(one);
            $("#oneDayEvent").css('display', 'block');
            $("#multiDayEvent").css('display', 'none');
            $('#clndr_event_date_control').attr('required', 'required');
            $('#clndr_event_start_control').attr('required', 'required');
            $('#clndr_event_end_control').attr('required', 'required');
            $('#clndr_event_date_control1').removeAttr('required');
            $('#clndr_event_start_control1').removeAttr('required');
            $('#clndr_event_end_control1').removeAttr('required');
            // $("#clndr_new_event_submit").attr("onclick","addReminder()");
        }else{
            $("#oneDayEvent").css('display', 'none');
            $("#multiDayEvent").css('display', 'block');
            $("#multiDayEvent").html(multi);
            $('#clndr_event_date_control1').attr('required', 'required');
            $('#clndr_event_start_control1').attr('required', 'required');
            $('#clndr_event_end_control1').attr('required', 'required');
            $('#clndr_event_date_control').removeAttr('required');
            $('#clndr_event_start_control').removeAttr('required');
            $('#clndr_event_end_control').removeAttr('required');
            // $("#clndr_new_event_submit").attr("onclick", "addMultiReminder()");
        }
    }
</script>
</body>


</html>