    <style>

        #msgs::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }
        #msgs::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }
        #msgs::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #D62929;
        }

        .chat-room .mid-side footer{
            /*width: 100%!important;*/
            height:100% !important;
            position:inherit;
        }
        .chat-txt{
            width:100%!important;
            margin-bottom: 10px;
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
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
        @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
        /*http://codepen.io/drehimself/pen/KdXwxR?utm_source=bypeople
        http://nicolasgallagher.com/pure-css-speech-bubbles/demo/*/

        *, *:before, *:after {
            box-sizing: border-box;
        }
        .chat .chat-history {
            padding: 30px 30px 20px;
            border-bottom: 2px solid white;
        }
        .chat .chat-history .message-data {
            margin-bottom: 15px;
        }
        .chat .chat-history .message-data-time {
            color: #a8aab1;
            padding-left: 6px;
        }
        .chat .chat-history .message {
            color: white;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 30px;
            width: 90%;
            position: relative;
        }
        .chat .chat-history .message:after {
            content: "";
            position: absolute;
            top: -15px;
            left: 20px;
            border-width: 0 15px 15px;
            border-style: solid;
            border-color: #CCDBDC transparent;
            display: block;
            width: 0;
        }
        .chat .chat-history .you-message {
            background: #CCDBDC;
            color:#000;
        }
        .chat .chat-history .me-message {
            background: #E9724C;
        }
        .chat .chat-history .me-message:after {
            border-color: #E9724C transparent;
            right: 20px;
            top: -15px;
            left: auto;
            bottom:auto;
        }
        .chat .chat-message {
            padding: 30px;
        }
        .chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
            font-size: 16px;
            color: gray;
            cursor: pointer;
        }

        .chat-ul li{
            list-style-type: none;

        }


        .align-left {
            text-align: left;
        }

        .align-right {
            text-align: right;
        }

        .float-right {
            float: right;
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }
        .you {
            color: #CCDBDC;
        }

        .me {
            color: #E9724C;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "Raleway",sans-serif;
            color: #003366;
        }

    </style>
    <!--main content start-->
    <section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Chat</a></li>
                </ul>
            </div>
        </div>
    <div class="chat-room">
    <aside class="mid-side">
        <div class="chat-room-head" style="background: #e9724c;">
            <h3 style="color:white;">Conversation</h3>
            <form action="#" class="pull-right position">
                <button type="button" onclick="deleteMsgs();" class="btn btn-success">Delete</button>
                <!--<button type="button" onclick="javascript:window.location.reload();" class="btn btn-danger">Cancel</button>-->
            </form>
        </div>
        <div id="msgs" style="height: 380px !important;overflow: overlay;">
            <div class="clearfix">
                <div class="chat">
                    <div class="chat-history">
                        <ul class="chat-ul">

                        </ul>
                    </div> <!-- end chat-history -->
                </div> <!-- end chat -->
            </div>
        </div>
        <footer>
            <div class="chat-txt">
                <textarea id="newMsg" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div class="btn-group">
                <button type="button" onclick="openAtt()" class="btn btn-white"><i class=" fa fa-money"></i> Send Offer</button>
            </div>
            <button type="button" onclick="openAtt2()" class="btn btn-white"><i class=" fa fa-paperclip"></i> Attachment</button>
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
    <div style="padding-right: 16px;" class="modal fade attachment in" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel">Upload Attachment</h4>
                </div>
                <div class="modal-body">
                    <form id="dataAttachment" method="post" enctype="multipart/form-data">
                        <input type="file" id="file-select" name="photos[]" multiple/>
                        <br/>
                        <button type="submit" id="upload-button">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openAtt(){
            $(".bs-example-modal-md").modal('toggle');
        }
        function openAtt2(){
            $(".attachment").modal('toggle');
        }
    </script>

    <!--main content end-->
    <script type="text/javascript">
        var attachm="";
        var sendersid = window.location.hash;
        function sendOffer(){
            var sendersid = window.location.hash;
            sendersid = sendersid.replace("#","");
            var amount = $("#amount").val();
            var expiry = $("#expiry").val();
            var desc = $("#desc").val();
            sendersid = sendersid.replace("#","");
            $.post('<?= site_url('home/sendOffer') ?>',{amount:amount,desc:desc,client_id:sendersid,expiry:expiry},function(e){
                //console.log(e);
                $(".bs-example-modal-md").modal('toggle');
            })
        }
        var getMsgs1 = setInterval(function(){
            var sendersid = window.location.hash;
            //$.post("<?= site_url('home/member_chat/getRecepients'); ?>",{},function(e){
            //   $(".chat-user").html(e);
            //});
            if(sendersid != ""){
                sendersid = sendersid.replace("#","");
                $.post("<?= site_url('home/member_chat/member_message_detail'); ?>", {id: sendersid}, function (e) {
                    $(".chat-ul").html(e);
                    console.log(e);
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
            if(sendersid != "" && msg != ""){
                $.post("<?= site_url('home/member_chat/sendMessage'); ?>",{att:attachm,msg:msg,id: sendersid},function(a){
                        $("#newMsg").val("");
                        attachm = "";
                        $('#msgs').animate({ scrollTop: 100000 }, 1000);
                    }
                )
            }
        }
        $("#dataAttachment").submit(function(){
            $("upload-button").attr("");
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "<?= site_url(); ?>/home/getAttachments",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    attachm = data;
                    console.log(data);
                    $(".attachment").modal('toggle');
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
        function deleteMsgs(){
            clearInterval(getMsgs1);
            var sendersid = window.location.hash;
            $.post("<?= site_url('home/member_chat/getRecepients'); ?>",{},function(e){
                $(".chat-user").html(e);
            });
            if(sendersid != ""){
                sendersid = sendersid.replace("#","");
                $.post("<?= site_url('home/member_chat/member_message_detail_delete'); ?>", {id: sendersid}, function (e) {
                    $("#msgs").html(e);
                });
            }
        }
    </script>