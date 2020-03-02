<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Edit Offers</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Edit Offers</header>
                    <div class="panel-body">
                        <?= form_open('admin/update/'.$data[0]['id'].'/offers/businessOffers',array("class"=>"form-horizontal")) ?>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Expiry Days
                                </div>
                                <div class="col-md-10">
                                    <select name="expiry" id="expiry" class="form-control">
                                        <?php for($i = 1; $i <= 365; $i++){ ?>
                                            <option <?= ($data[0]['expiry'] == $i)? "selected" : ""; ?> value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
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