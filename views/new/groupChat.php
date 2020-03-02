<div id="page_content">
    <div id="page_content_inner">
        <!--<h3 class="heading_b uk-margin-bottom">Chat With Buddies</h3>-->
        <div class="uk-width-large-8-10 uk-container-center">
            <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                <div class="uk-width-medium-7-10">
                    <div class="md-card md-card-single">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <i class="md-icon material-icons" data-step="2" data-intro="Click to remove the conversation" onclick="dltGroupConvoConfirmModal();">delete</i>
                                <div class="md-card-dropdown"  data-uk-dropdown="{pos:'bottom-right'}">
                                    <i data-step="1" data-intro="Click to change the inbox theme" class="md-icon material-icons">&#xE3B7;</i>
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
                                <span class="uk-text-muted">Group Discussion</span>
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
                                        <textarea name="submit_message" cols="30" rows="3" id="submit_message" class="md-input"></textarea>
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
                        <h4>Joined Church Groups</h4>
                        <ul class="md-list md-list-addon md-list-outside" id="chat_user_list">

                        </ul>
                        <hr/>
                        <h4>Members of Selected Church Groups</h4>
                        <ul class="md-list md-list-addon md-list-outside" id="chat_member_list">
                            
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
<style>
    .activeChat{
        background-color: #979797;
        border-radius: 5px;
    }
</style>
<!--main content end-->
<script type="text/javascript">
    var attachm="";
    var sendersid = window.location.hash;
    var getingRecep = setInterval(function(){
        var sendersid = window.location.hash;
        sendersid = sendersid.replace("#","");
        //console.log(sendersid);
        $.post("<?= site_url('home/member_chat/getGroupsRecepients'); ?>",{active:sendersid},function(e){
            var previousMsgs = $("#chat_user_list").html();
            if( previousMsgs.replace(/(\r\n\s|\n|\r|\s)/gm,"") != e.replace(/(\r\n\s|\n|\r|\s)/gm,"") ){
                $("#chat_user_list").html(e);
            }
        });
    },1000);
    
    var gettingMemRecep = setInterval(function(){
       var sendersid = window.location.hash;
       sendersid = sendersid.replace("#", "");
       $.post("<?= site_url('home/member_chat/getMembRecepients'); ?>", {active:sendersid}, function(e){
          var previousMsgs = $("#chat_user_list").html();
          if( previousMsgs.replace(/(\r\n\s|\n|\r|\s)/gm,"") != e.replace(/(\r\n\s|\n|\r|\s)/gm,"") ){
                $("#chat_member_list").html(e);
            }
       });
    },1000);

    var getMsgs111 = setInterval(function(){
        var sendersid = window.location.hash;
        if(sendersid != ""){
            sendersid = sendersid.replace("#","");
            $.post("<?= site_url('home/member_chat/group_message_detail'); ?>", {id: sendersid}, function (e) {
                var previousMsgs = $(".chat_message_wrapper").html();
                if(previousMsgs.replace(/(\r\n\s|\n|\r|\s)/gm,"") != e.replace(/(\r\n\s|\n|\r|\s)/gm,"")){
                    $(".chat_message_wrapper").html(e);
                    $('#chat').animate({ scrollTop: $("#chat").height()+10000000 }, 50);
                }
                $("#chat_submit_box").css("display","");
                $("#chatUser").html($("#message-data-name").html());
            });
        }
    },1000);
    function openMsg(id) {
        window.location.hash = id;
        setTimeout(function(){
            if(typeof $("#runscript")[0] === undefined){

            }else{
                //eval(document.getElementById("runscript").innerHTML);
            }
        },1000);
    }
    function sendMsg(){
        var sendersid = window.location.hash;
        sendersid = sendersid.replace("#","");
        var msg = $("#submit_message").val();
        if(sendersid != "" && msg != ""){
            $.post("<?= site_url('home/member_chat/sendMessagetoGroup'); ?>",{att:attachm,msg:msg,id: sendersid},function(a){
                //console.log(a);
                $("#submit_message").val("");
                $('#chat').animate({ scrollTop: $("#chat").height()+10000 }, 50);
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
    function deleteGroupConversation(){
        var sendersid = window.location.hash;
        if(sendersid != ""){
            sendersid = sendersid.replace("#","");
            $.post("<?= site_url('home/member_chat/deleteGrpConversation'); ?>", {id: sendersid}, function (e) {
                console.log(e);
            });
        }
    }

    $("[type=file]").change(function(e){
        var a = $("#file-select")[0].files[0].name;
        $("#filname").html(a);
    })

</script>
