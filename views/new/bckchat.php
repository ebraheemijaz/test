<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Chat With Buddies</h3>
        <div class="uk-width-large-8-10 uk-container-center">
            <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card md-card-single">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                    <i class="md-icon material-icons">&#xE3B7;</i>
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
                                <i class="md-icon  material-icons">&#xE5CD;</i>
                            </div>
                            <h3 class="md-card-toolbar-heading-text large">
                                <span class="uk-text-muted">Chat with</span> <a href="#">Benedict Emard</a>
                            </h3>
                        </div>
                        <div class="md-card-content padding-reset">
                            <div class="chat_box_wrapper">
                                <div class="chat_box touchscroll chat_box_colors_a" id="chat">
                                    <div class="chat_message_wrapper">
                                        <div class="chat_user_avatar">
                                            <img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/>
                                        </div>
                                        <ul class="chat_message">
                                            <li>
                                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, eum? </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat_message_wrapper chat_message_right">
                                        <div class="chat_user_avatar">
                                            <img class="md-user-image" src="assets/img/avatars/avatar_03_tn.png" alt=""/>
                                        </div>
                                        <ul class="chat_message">
                                            <li>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus distinctio dolor earum est hic id impedit ipsum minima mollitia natus nulla perspiciatis quae quasi, quis recusandae, saepe, sunt totam.
                                                    <span class="chat_message_time">13:34</span>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="chat_submit_box" id="chat_submit_box">
                                    <div class="uk-input-group">
                                        <input type="text" class="md-input" name="submit_message" id="submit_message" placeholder="Send message">
                                        <span class="uk-input-group-addon">
                                            <a href="#"><i class="material-icons md-24">&#xE163;</i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-3-10 uk-visible-large">
                    <div class="md-list-outside-wrapper">
                        <ul class="md-list md-list-addon md-list-outside" id="chat_user_list">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var sendersid = window.location.hash;
    setInterval(function(){
        var sendersid = window.location.hash;
        $.post("<?= site_url('home/member_chat/getRecepients'); ?>",{},function(e){
            console.debug(e);
            $("#chat_user_list").html(e);
        });
    },1000);
    function openMsg(id){
        window.location.href = "<?= site_url('home/view/chat_new#'); ?>"+id;
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
            $(".bs-example-modal-md").modal('toggle');
        })
    }
    var getMsgs1 = setInterval(function(){
        var sendersid = window.location.hash;
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