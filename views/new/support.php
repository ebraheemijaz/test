<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Feedback</h3>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom" >
                    <div class="md-card-content">
                        <h3 class="heading_a">Get in touch with us!</h3>
                        <br/>
                        <form method="post" action="<?= site_url('home/ajaxSupport'); ?>">
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <label>Subject Matter</label>
                                    <input type="text" name="subject" required class="md-input" />
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <label>Description</label>
                                    <textarea required name="description" class="md-input"></textarea>
                                    <div> <span id="display_count">0</span>/500  </div>
                                    <script>
                                        $("[name=description]").on('keyup', function(){
                                            var words = this.value.match(/\S+/g).length;
                                            if(words > 500){
                                                var trimmed = $(this).val().split(/\s+/, 500).join(" ");
                                                $(this).val(trimmed + " ");
                                            }
                                            else{
                                                $('#display_count').text(words);
                                                //$('#word_left').text(200-words);
                                            }
                                        });


                                        /*$("[name=description]").keyup(function(){
                                            var a = $("[name=description]").val();
                                            $("[name=description]").val(a.substring(0,160));
                                            lenght = a.length;
                                            $("#textLe2").html(lenght);
                                        });*/
                                    </script>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <span class="uk-input-group-addona">
                                    <button type="submit" id="sendBtn" class="md-btn md-btn-danger">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php require_once("advert_v.php"); ?>
        </div>
    </div>
</div>
<script>
    function countWords(s){
        s = s.replace(/(^\s*)|(\s*$)/gi,"");//exclude  start and end white-space
        s = s.replace(/[ ]{2,}/gi," ");//2 or more space to 1
        s = s.replace(/\n /,"\n"); // exclude newline with a start spacing
        return s.split(' ').length;
    }
</script>
<script>
    function sendSupport(){
        var sub = $("[name=subject]").val();
        var msg = $("[name=description]").val();
        $('#sendBtn').attr('disabled', true);
        if(sub == "" || msg == ""){
            UIkit.notify({
                message : 'Please Complete the required information',
                status  : 'danger',
                timeout : 2000,
                pos     : 'top-center'
            });
        }else{
            $.post("<?= site_url('home/ajaxSupport') ?>",{subject:sub,message:msg},function(e){
                //console.log(e);
                $("[name=subject]").val("");
                $("[name=description]").val("");
                UIkit.notify({
                    message : 'Message Delivered – Thank You',
                    status  : 'danger',
                    timeout : 2000,
                    pos     : 'top-center'
                });
            });

        }
    }
    <?php if(isset($_GET['received'])){ ?>
    setTimeout(function(){
        UIkit.notify({
            message : 'Message Delivered - We will contact you shortly.',
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });
    },1000);
    <?php } ?>
</script>
