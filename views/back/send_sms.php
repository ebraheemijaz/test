<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Send SMS</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Send SMS</header>
                    <div class="panel-body">
                        SMS Remaining <?= $bucket[0]['qty'] ?>
                        <br/>
                        SMS Sent <?= $totalSent[0]['qty'] ?>
                        <br/>
                        <br/>
                        <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>

                        <?= form_open('admin/sendSMS',array("class"=>"form-horizontal")) ?>

                            <div class="form-group">
                                <div class="col-md-2">
                                    To
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="to" placeholder="Comma separates if multiple recipients and insert country code e.g. 44" required class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Message
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        <span id="remaining">160 characters remaining</span>
                                        <span id="messages">1 message(s)</span>
                                    </p>
                                    <textarea name="msg" required id="smsMsg" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2 ">
                                    <button class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script>
    var $remaining = $('#remaining'),
        $messages = $remaining.next();

    $('#smsMsg').keyup(function(){
        var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
    });

</script>