<div id="page_content" style="background: #424242;">
    <div id="page_content_inner">
        <?php require_once('advert_h.php'); ?>

        <!--<h3 class="heading_b uk-margin-bottom">Chat With Buddies</h3>-->
        <div class="uk-width-small-8-10 uk-container-center">
            <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card md-card-single">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <i class="md-icon material-icons" data-step="2" data-intro="Click to remove the conversation" onclick="deleteConversationsConfirmationModal();">delete</i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                    <i class="md-icon material-icons" data-step="1" data-intro="Click to change inbox theme">&#xE3B7;</i>
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
<!--                                <i class="md-icon  material-icons">&#xE5CD;</i>-->
                            </div>
                            <h3 class="md-card-toolbar-heading-text large">
                                <span class="uk-text-muted">Chat with</span>
                                <a id="chatUser" href="<?= site_url('home/view/buddies') ?>">Your Buddies</a>
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
                                    <div class="uk-input-group" id="uk-input-group">
                                        <textarea name="submit_message" cols="30" rows="3" id="submit_message" class="md-input col-md-6"></textarea>
                                        <span class="uk-input-group-addon">
                                            <a href="#attachmentModal" data-uk-modal>
                                                <i class="material-icons md-24">&#xE226;</i>
                                            </a>
                                        </span>
                                        <span class="uk-input-group-addon">
                                            <a href="#newModal" data-uk-modal>
                                                <i class="material-icons md-24">&#xE563;</i>
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
                <div class="uk-width-large-3-10">
                    <div class="md-list-outside-wrapper">
                        <ul class="md-list md-list-addon md-list-outside" id="chat_user_list">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="newModal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h1>Send Business Offer</h1>
        <form>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <label for="user_edit_uname_control">Payment Method</label>
                    <input class="md-input" type="text" readonly value="Cash"/>
                </div>
                <div class="uk-width-medium-1-3">
                    <label for="user_edit_uname_control">Enter Amount (In £)</label>
                    <input class="md-input" type="number" min="0" required id="amount"/>
                </div>
                <div class="uk-width-medium-1-3">
                    <label for="user_edit_uname_control">Expiry (In Days)</label>
                    <input class="md-input" type="number" min="1" id="expiry"/>
                </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                    <textarea name="description" id="desc" cols="30" rows="4" class="md-input" placeholder="Enter Description"></textarea>
                </div>
            </div>
            <br/>
            <button type="button" class="md-btn md-btn-primary" onclick="sendOffer()">Send Offer</button>
        </form>
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
                    <br/>
                        <span>Please upload file upto 5MB only.</span>
                    <span id="filname"></span>
                </div>
            </div>
            <br/>
            <button type="submit" class="md-btn md-btn-primary" id="upload-button">Upload</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    var sendersid = window.location.hash;
    var getingRecep = setInterval(function(){
        var sendersid = window.location.hash;
        $.post("<?= site_url('home/member_chat/getRecepients'); ?>",{},function(e){
            var previousMsgs = $("#chat_user_list").html();
            if(previousMsgs.replace(/(\r\n\s|\n|\r|\s)/gm,"") != e.replace(/(\r\n\s|\n|\r|\s)/gm,"")){
                $("#chat_user_list").html(e);
            }
        });
    },1000);
    function openMsg(id){
        window.location.href = "<?= site_url('home/view/chat_new#'); ?>"+id;
    }
</script>
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
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
            var modal = UIkit.modal("#newModal");
            if ( modal.isActive() ) {
                modal.hide();
            } else {
                modal.show();
            }
        })
    }
    var getMsgs111 = setInterval(function(){
        var sendersid = window.location.hash;
        if(sendersid != ""){
            sendersid = sendersid.replace("#","");
            $.post("<?= site_url('home/member_chat/member_message_detail'); ?>", {id: sendersid}, function (e) {
                var previousMsgs = $(".chat_message_wrapper").html();
                if(previousMsgs.replace(/(\r\n\s|\n|\r|\s)/gm,"") != e.replace(/(\r\n\s|\n|\r|\s)/gm,"")){
                    $(".chat_message_wrapper").html(e);
                    $('#chat').animate({ scrollTop: $("#chat").height()+10000000 }, 1000);
                }
                $("#chat_submit_box").css("display","");
                console.log($("#message-data-name").html());
                $("#chatUser").html($("#message-data-name").html());
            });
        }
    },1000);
    $(document).ready(function(){
        var sendersid = window.location.hash;
        <?php 
            $check = $this->session->userdata('userMember');
            $recid = $check[0]['id'];
        ?>
        var recid = "<?= $recid; ?>";
        if(sendersid != ""){
            sendersid = sendersid.replace("#","");
            $.post("<?= site_url('home/member_chat/member_message_detail'); ?>", {id: sendersid, recid: recid}, function (e) {
                // console.log($(e).find('#message-data-name1'));
                
                var previousMsgs = $(".chat_message_wrapper").html();
                if(previousMsgs.replace(/(\r\n\s|\n|\r|\s)/gm,"") != e.replace(/(\r\n\s|\n|\r|\s)/gm,"")){
                    $(".chat_message_wrapper").html(e);
                    $('#chat').animate({ scrollTop: $("#chat").height()+10000000 }, 50);
                }
                $("#chat_submit_box").css("display","");
                $("#chatUser").html($("#message-data-name").html());
            });
        }
    });
    function openMsg(id){
        window.location.hash = id;
    }
    function sendMsg(){
        var sendersid = window.location.hash;
        sendersid = sendersid.replace("#","");
        var msg = $("#submit_message").val();
        if(sendersid != "" && msg != ""){
            $("#submit_message").val("");
            $.post("<?= site_url('home/member_chat/sendMessage'); ?>",{att:attachm,msg:msg,id: sendersid},function(a){
                console.log(a);
                $('#chat').animate({ scrollTop: $("#chat").height()+10000 }, 50);
                attachm = "";
            });
        }
    }
    function sendMsg1(){
        var sendersid = window.location.hash;
        sendersid = sendersid.replace("#","");
        var msg = $("#submit_message").val();
        if(sendersid != "" && attachm != ""){
            $("#submit_message").val("");
            $.post("<?= site_url('home/member_chat/sendMessage'); ?>",{att:attachm,msg:msg,id: sendersid},function(a){
                $('#chat').animate({ scrollTop: $("#chat").height()+10000 }, 50);
                attachm = "";
            });
        }
    }
    $("#dataAttachment").submit(function(){
        $("upload-button").attr("");
        var formData = new FormData($(this)[0]);
        var size = document.getElementById('file-select').files[0].size;
        if(size <= 5000000){
        $.ajax({
            url: "<?= site_url(); ?>/home/getAttachments",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                if(data){
                    attachm = data;
                    console.log(data);
                    sendMsg1();
                    //$(".attachment").modal('toggle');
                    var modal = UIkit.modal("#attachmentModal");
                    if ( modal.isActive() ) {
                        modal.hide();
                    } else {
                        modal.show();
                    }
                }else{
                    var modal = UIkit.modal("#attachmentModal");
                    modal.hide();
                    UIkit.notify({
                        message : 'File size is morethan 5MB.',
                        status  : 'danger',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
        }else{
            var modal = UIkit.modal("#attachmentModal");
            modal.hide();
            UIkit.notify({
                        message : 'File size is more than 5MB.',
                        status  : 'danger',
                        timeout : 2000,
                        pos     : 'top-center'
                    });
        }
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
    function deleteConversation(){
        var sendersid = window.location.hash;
        if(sendersid != ""){
            sendersid = sendersid.replace("#","");
            $.post("<?= site_url('home/member_chat/deleteConversation'); ?>", {id: sendersid}, function (e) {
                console.log(e);
            });
        }
    }
    function deleteAllConversation(){
            $.post("<?= site_url('home/member_chat/deleteAllConversation'); ?>", function (e) {
                console.log(e);
            });
    }
    $("[type=file]").change(function(e){
        var a = $("#file-select")[0].files[0].name;
        $("#filname").html(a);
    })
</script>
