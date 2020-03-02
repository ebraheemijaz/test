
<section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Message Detail</a></li>
                    </ul>
                </div>
            </div>
            <div class="chat-room">
                <aside class="mid-side">
                    <div class="chat-room-head">
                        <h3>Super Admin</h3>
                    </div>
                    <div id="msgs">
                        <div class="group-rom">
                            <div class="first-part odd">Jonathan Smith</div>
                            <div class="second-part">Hello Anjelina are you there?</div>
                            <div class="third-part">12:30</div>
                        </div>
                        <div class="group-rom">
                            <div class="first-part">Anjelina Joe</div>
                            <div class="second-part">Yeap Smith. Please proceed</div>
                            <div class="third-part">12:31</div>
                        </div>
                        <div class="group-rom">
                            <div class="first-part">Anjelina Joe</div>
                            <div class="second-part">Yeap Smith. Please proceed</div>
                            <div class="third-part">12:31</div>
                        </div>
                    </div>
                    <footer>
                        <div class="chat-txt">
                            <input type="text" id="newMsg" class="form-control">
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-white"><i class="fa fa-meh-o"></i></button>
                            <button type="button" class="btn btn-white"><i class=" fa fa-paperclip"></i></button>
                        </div>
                        <button onclick="sendMsg();" class="btn btn-danger">Send</button>
                    </footer>
                </aside>
            </div>
        </section>
    </section>
    <script>
//        setInterval(function(){
//                $.post("<?//= site_url('super/ajax/getMessage'); ?>//",{},function(e){
//                $("#msgs").html(e);
//            })
//        },1000);
        function sendMsg(){
            var msg = $("#newMsg").val();
            $.post("<?= site_url('super/ajax/sendMessage'); ?>",{msg:msg},function(a){
                $("#newMsg").val(" ");
            })
        }
    </script>