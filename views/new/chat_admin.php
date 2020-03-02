<div id="page_content" style="background: #424242;">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Chat With Admin</h3>
        <div class="uk-width-large-8-10 uk-container-center">
            <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                <div class="uk-width-medium-7-10">
                    <div class="md-card md-card-single">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                    <i class="md-icon material-icons" data-step="1" data-intro="Click to change the inbox theme">&#xE3B7;</i>
                                    <div class="uk-dropdown">
                                        <ul class="uk-nav" id="chat_colors">
                                            <li class="uk-nav-header">Message Colors</li>
                                            <li class="uk-active"><a href="#" data-chat-color="chat_box_colors_a">Grey/Green</a></li>
                                            <li><a href="#" data-chat-color="chat_box_colors_b">Blue/Dark Blue</a></li>
                                            <li><a href="#" data-chat-color="chat_box_colors_c">Orange/Light Gray</a></li>
                                            <li><a href="#" data-chat-color="chat_box_colors_d">Deep Purple/Light Grey</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text large">
                                <span class="uk-text-muted">Chat with Admin </span>
                                <a id="chatUser" href="javascript:void(0)"></a>
                            </h3>
                        </div>
                        <div class="md-card-content padding-reset">
                            <div class="chat_box_wrapper">
                                <div class="chat_box touchscroll chat_box_colors_a" style="height: 300px" id="chat">
                                    <div class="chat_message_wrapper">
                                        <p style="text-align:center;font-size:20px;">
                                            Click on chat to start a conversation
                                        </p>
                                    </div>
                                </div>
                                <div class="chat_submit_box" style="display:none;" id="chat_submit_box">
                                    <div class="uk-input-group">
                                        <input type="text" class="md-input" name="submit_message" id="submit_message" placeholder="Send message">

                                        <span class="uk-input-group-addon">
                                            <a href="#attachmentModal" data-uk-modal>
                                                <i class="material-icons md-24">&#xE226;</i>
                                            </a>
                                        </span>

                                        <span class="uk-input-group-addon">
                                            <a onclick="sendMsg()">
                                                <i class="material-icons md-24">&#xE163;</i>
                                            </a>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-3-10">
                    <div class="md-list-outside-wrapper">
                        <ul class="md-list md-list-addon md-list-outside" id="chat_user_list">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="attachmentModal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h1>Send Attachment</h1>

        <form id="dataAttachment" method="post" enctype="multipart/form-data">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-file md-btn md-btn-danger">
                        New File
                        <input class="form-file" type="file" id="file-select" name="photos[]" multiple/>
                    </div>
                    <span id="filname"></span>
                </div>
            </div>
            <br/>
            <button type="submit" class="md-btn md-btn-primary" id="upload-button">Upload</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    var attachm="";
    var sendersid = window.location.hash;
    setInterval(function(){
        var sendersid = window.location.hash;
        $.post("<?= site_url('home/admin_chat/getRecepients'); ?>",{},function(e){
            var previousMsgs = $("#chat_user_list").html();
            if(previousMsgs.replace(/(\r\n\s|\n|\r|\s)/gm,"") != e.replace(/(\r\n\s|\n|\r|\s)/gm,"")){
                $("#chat_user_list").html(e);
            }
        });
        if(sendersid != ""){
            sendersid = sendersid.replace("#","");
            $.post("<?= site_url('home/admin_chat/member_message_detail'); ?>", {id: sendersid}, function (e) {
                $("#chat_submit_box").css("display","");
                //$(".chat_message_wrapper").html(e);
                var previousMsgs = $(".chat_message_wrapper").html();
                if(previousMsgs.replace(/(\r\n\s|\n|\r|\s)/gm,"") != e.replace(/(\r\n\s|\n|\r|\s)/gm,"")){
                    $(".chat_message_wrapper").html(e);
                    $('#chat').animate({ scrollTop: $("#chat").height()+10000000 }, 50);
                }
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
        var msg = $("#submit_message").val();
        if(sendersid != "" && msg != ""){
            $("#submit_message").val("");
            $.post("<?= site_url('home/admin_chat/sendMessage'); ?>",{att:attachm,msg:msg,id: sendersid},function(a){
                $('#chat').animate({ scrollTop: $("#chat").height()+10000 }, 1000);
                attachm = "";
            });
        }
    }
    function sendMsg1(){
        var sendersid = window.location.hash;
        sendersid = sendersid.replace("#","");
        var msg = $("#submit_message").val();
        if(sendersid != ""){
            $.post("<?= site_url('home/admin_chat/sendMessage'); ?>",{att:attachm,msg:msg,id: sendersid},function(a){
                $("#submit_message").val("");
                attachm = "";
            });
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
                //console.log(data);
                //$(".attachment").modal('toggle');
                var modal = UIkit.modal("#attachmentModal");
                if ( modal.isActive() ) {
                    modal.hide();
                } else {
                    modal.show();
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });
    $("[type=file]").change(function(e){
        var a = $("#file-select")[0].files[0].name;
        $("#filname").html(a);
    })
</script>
