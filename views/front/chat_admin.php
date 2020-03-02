    <style>
        #newMsg{

        }
        .chat-room .mid-side footer{
            width: 66.7%!important;
        }
        .chat-txt{
            width:100%!important;
            margin-bottom: 10px;
        }
        .chat-room .mid-side footer{
            height: 105px!important;
        }
        .chat-room footer input[type="file"]{
            margin: 6px 57px!important;
        }
        .em {
            position:relative;
            text-align:center;
        }
        .em a {
            text-decoration:none;
            color:white;
            display:block;
            background:red;
            font-family:'verdana';
            line-height:50px;
            border-radius:10px;
            transition:all 1s ease;
        }
        .em a:hover,.em a.active {
            background:orange;
        }
        #emobox {
            display:none;
            position:absolute;
            bottom:100%;
            height:50px;
            line-height:50px;
            white-space:nowrap;
        }
        #emobox input {
            displa:inline-block;
            margin:0 5px;
        }
        #emobox img{
            width: 30px;
            height: 30px;
        }
        #emobox table{
            background: WHITE;
            position: relative;
            bottom: 205px;
            border-radius: 20px;
        }
        #showhide_emobox{
            margin: 0 5px 0 0;
        }
    </style>
    <!--main content start-->
    <section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Chat</a></li>
<!--                    <li><a href="">Report Alert</a></li>-->
                </ul>
            </div>
        </div>
    <!-- page start-->
    <div class="chat-room">
    <aside class="left-side">
        <div class="user-head">
            <i class="fa fa-comments-o"></i>
            <h3>Admins</h3>
        </div>
        <ul class="chat-list">
            <li class="">
                <a class="lobby" href="">
                    <h4>
                        <i class="fa fa-list"></i>
                        Refresh
                    </h4>
                </a>
            </li>
        </ul>
        <ul class="chat-list chat-user userlisting">
            <li><a href='#'><i class='fa fa-circle text-success'></i><span>Loading</span></a></li>
        </ul>
    </aside>
    <aside class="mid-side">
        <div class="chat-room-head">
            <h3>Conversation</h3>
            <form action="#" class="pull-right position">
            </form>
        </div>
        <div id="msgs" style="height: 200px !important;overflow: auto;"></div>
        <footer style="width: 71.5% !important;">
            <div class="chat-txt">
                <textarea id="newMsg" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div class="btn-group">
<!--                <button type="button" onclick="openAtt()" class="btn btn-white"><i class=" fa fa-paperclip"></i></button>-->
            </div>
            <button onclick="sendMsg();" type="button" class="btn btn-danger">Send</button>
        </footer>
    </aside>
    </div>

    <!-- page end-->
    </section>
    </section>
    <div style="padding-right: 16px;" class="modal fade bs-example-modal-md in" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center" class="modal-title" id="mySmallModalLabel">Send Custom Offer</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <br/>
                        <input type="text" class="form-control" id="amount" placeholder="Enter Amount"/>
                        <br/>
                        <input type="text" class="form-control" id="expiry" placeholder="Enter Expiry (in days)"/>
                        <br/>
                        <textarea name="description" id="desc" cols="30" rows="4" class="form-control" placeholder="Enter Description"></textarea>
                        <br/>
                        <button type="button" onclick="sendOffer()">Send Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openAtt(){
            $(".bs-example-modal-md").modal('toggle');
        }
    </script>

    <!--main content end-->
    <script type="text/javascript">
        var sendersid = window.location.hash;
        function sendOffer(){
            var sendersid = window.location.hash;
            sendersid = sendersid.replace("#","");
            var amount = $("#amount").val();
            var expiry = $("#expiry").val();
            var desc = $("#desc").val();
//            var type = $("#type").val();
            sendersid = sendersid.replace("#","");
            $.post('<?= site_url('home/sendOffer') ?>',{amount:amount,desc:desc,client_id:sendersid,expiry:expiry},function(e){
                console.log(e);
                $(".bs-example-modal-md").modal('toggle');
            })
        }
        setInterval(function(){
            var sendersid = window.location.hash;
            $.post("<?= site_url('home/admin_chat/getRecepients'); ?>",{},function(e){
                $(".chat-user").html(e);
            });
            if(sendersid != ""){
                sendersid = sendersid.replace("#","");
                $.post("<?= site_url('home/admin_chat/member_message_detail'); ?>", {id: sendersid}, function (e) {
                    $("#msgs").html(e);
                    //$('#msgs').animate({ scrollTop: $("#msgs").height()+100 }, 50);
                });
            }
        },1000);
        function openMsg(id){
            window.location.hash = id;
        }
        function sendMsg(){
            var sendersid = window.location.hash;
            sendersid = sendersid.replace("#","");
            var msg = $("#newMsg").val();
            if(sendersid != ""){
                $.post("<?= site_url('home/admin_chat/sendMessage'); ?>",{msg:msg,id: sendersid},function(a){
                        $("#newMsg").val("");
                        //attachments = "";
                    }
                )
            }
        }
    </script>
