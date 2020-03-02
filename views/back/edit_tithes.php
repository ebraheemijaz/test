<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Edit Tithes</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Update New Tithes</header>
                    <div class="panel-body">
                        <?= form_open('admin/update/'.$data[0]['id'].'/tithes/view_tithes',array("class"=>"form-horizontal")) ?>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Amount : 
                                </div>
                                <div class="col-md-10">
                                    <input type="number" name="amount" value="<?= $data[0]['amount'] ?>" placeholder="Enter Amount Received" required class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Date : 
                                </div>
                                <div class="col-md-10">
                                    <input type="date" name="date" value="<?= date('Y-m-d', strtotime($data[0]['date'])) ?>"  required class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    Remittance amount to the central office : 
                                </div>
                                <div class="col-md-10">
                                    <input type="number" name="remittance" value="<?= $data[0]['remittance'] ?>" class="form-control" placeholder="Enter (%)" min="1" max="100" />
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