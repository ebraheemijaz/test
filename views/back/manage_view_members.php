<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Church Groups Activity</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Churches <span style="float : right;">
            <!--<i class="md-icon material-icons" id="invoice_print" onclick="window.print();">&#xE8ad;</i>-->
            <!--<a href="<?php echo base_url(); ?>admin/save_pdf"><i class="md-icon material-icons">get_app</i></a>-->
        </span></header>
                    
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableCGroup" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Status</td>
                                <!--<td>Action</td>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($groupMembers as $val){ ?>
                                <tr>
                                    <td><?= ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['fname'])." ".ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['lname']) ?></td>
                                    <?php $status = ($val['status'] == 'pending') ? "approved" : "pending"; ?>
                                    <td><a href="<?= site_url("admin/statusGroupApproval/".$val['id']."/".$status."/".$this->uri->segment(3)) ?>"><?= ucfirst($val['status']) ?></a></td>
                                    <!--<td><a data-toggle="modal" href="<?= site_url('admin/view_members') ?>/<?= $val['id'] ?>">View</a><?php if($userAdmin[0]['id'] == 3){ ?> | <a onclick="deleteConff('<?= site_url('admin/memberDelete/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a><?php } ?></td>-->
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="row"></div>
                        <!--<h5 style="font-weight: bold">Total Members: <?= count($members) ?></h5>-->
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="conf"></div>
</section>
    <?php $i=1; foreach($members as $val){ ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?= $i ?>" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Name</td>
                                <td><?= $val['fname']." ".$val['lname'] ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?= $val['gander'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php $i++; } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
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
    function saveIt(){

        var doc = new jsPDF();
        doc.addHTML($('#invoice_preview')[0], 5, 5, {
            'background': '#fff'
        }, function() {
            doc.save('member.pdf');
        });

    }
</script>    