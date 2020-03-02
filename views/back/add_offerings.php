<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Add Offerings</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Record New Offering</header>
                    <div class="panel-body">
                        <?= form_open('admin/insert/offerings/view_offerings',array("class"=>"form-horizontal")) ?>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Amount (£) :
                                </div>
                                <div class="col-md-10">
                                    <input type="number" name="amount" placeholder="Enter Amount Received" required class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Date
                                </div>
                                <div class="col-md-10">
                                    <input type="date" name="date"  required class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2 ">
                                    <button class="btn btn-success">Save</button>
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