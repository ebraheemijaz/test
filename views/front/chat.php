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
            height: 55px!important;
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
    <aside class="left-side" style="background: transparent">
        <div class="user-head" style="background: #e9724c;">
            <i class="fa fa-comments-o"></i>
            <h3>Buddies</h3>
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
            <li>
                <a href='#'>
                    <i class='fa fa-circle text-success'></i>
                    <span>Loading</span>
                </a>
            </li>
        </ul>
    </aside>
    </div>
    </section>
    </section>
    <script type="text/javascript">
        var sendersid = window.location.hash;
        var getMsgs1 = setInterval(function(){
            var sendersid = window.location.hash;
            $.post("<?= site_url('home/member_chat/getRecepients'); ?>",{},function(e){
                $(".chat-user").html(e);
            });
        },100);
        function openMsg(id){
            window.location.href = "<?= site_url('home/view/chat_new#'); ?>"+id;
        }
    </script>