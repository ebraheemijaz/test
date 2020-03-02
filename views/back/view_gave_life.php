<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Lifes</a></li>
                </ul>
                <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Those who gave their lives to Christ</header>
                    <div class="panel-body">
                        <a href="<?= site_url('admin/view') ?>/add_lgtc"><span class="btn btn-primary">Add New</span></a>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Created Date</td>
                                    <td>Date Of Convert</td>
                                    <td>Full Name</td>
                                    <td>Admin Name</td>
                                    <td>Contact</td>
                                    <td>Email</td>
                                    <td>Comment</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($lifeToChrist as $val){ ?>
                                    <tr>
                                        <td><?= date('d-M-Y', strtotime($val['createdDate'])) ?></td>
                                        <td><?= date("d-M-Y",strtotime($val['date'])) ?></td>
                                        <td><?= $val['fname'] ?></td>
                                        <td><?= $this->data->fetch('credentials', array('id' => $val['admin_id']))[0]['name'] ?></td>
                                        <td><?= $val['contact'] ?></td>
                                        <td><?= $val['email'] ?></td>
                                        <td><?= wordwrap($val['comment'],15,"<br>\n"); ?></td>
                                        <td><a onclick="sendSMS('<?= $val['contact'] ?>', '<?= $val['id'] ?>', '<?= $val['fname'] ?>', '<?= $val['lname'] ?>')"><i class="fa fa-paper-plane"></i></a> | <a href="<?= site_url('admin/edit/'.$val['id'].'/lifetochrist/edit_christ_convert') ?>" title="Edit Christ Convert"><i class="fa fa-pencil"></i></a> | <a onclick="deleteConff('<?= site_url('admin/delete/lifetochrist/'.$val['id']."/same") ?>')" title="Delete Christ Convert"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                        </div>
                        </div>
                        <div class="row"></div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="conf"></div>
</section>
<script>
    function deleteConff(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are You Sure? " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function sendSMS(contact, id, fname) {
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Send customized SMS" + 
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url() ?>/admin/sendSMS/christconvert' method='post'>"+
                "<div class='row'>"+
                    "<div class='form-group'>"+
                        "<label class='col-md-4'>Compose Message</label>"+
                        "<input type='hidden' name='contact' class='form-control col-md-6' value='"+contact+"'>"+
                        "<input type='hidden' name='id' class='form-control col-md-6' value='"+id+"'>"+
                        "<input type='hidden' name='fname' class='form-control col-md-6' value='"+fname+"'>"+
                        "<textarea class='form-control' name='msg'></textarea>"+
                    "</div>"+
                "</div>"+
                "<div class='row'>"+
                    "<button type='submit' class='btn btn-success'><i class='fa fa-paper-plane'></i></button>"+
                "</div>"+
            "</form>"+
            // "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            // "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
</script>