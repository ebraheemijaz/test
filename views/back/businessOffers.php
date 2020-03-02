<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Business Offers</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Offers Sent by Members</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td style="display: none;">ID</td>
                                <td>Date Sent</td>
                                <td>Sent By</td>
                                <td>Receiver</td>
                                <td>Accepted Date</td>
                                <td>Amount (£)</td>
                                <td>Expiry Date</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($offers as $val){ ?>
                                <tr>
                                    <td style="display: none;"><?= $val['id'] ?></td>
                                    <td><?= date('d-M-Y H:i:s a', strtotime($val['date'])) ?></td>
                                    <td><?= $val['sentBy'] ?></td>
                                    <td><?= $val['sentTo'] ?></td>
                                    <td><?php if($val['acceptedDate'] != '0000-00-00 00:00:00'){ echo date('d-M-Y H:i:s a', strtotime($val['acceptedDate'])); }else{ echo date('d-M-Y H:i:s a', strtotime($val['date'])); } ?></td>
                                    <td>£ <?= number_format((float)($val['amount']), 2, '.', ','); ?></td>
                                    <td><?php if($val['status'] == 'accepted'){ echo date('d-M-Y H:i:s a', strtotime($val['acceptedDate'] . '+ '.$val['expiry'].'days')); }else{ echo "-"; }?></td>
                                    <td><?php if($val['status'] == 'not accepted'){ echo 'Awaiting Acceptance'; }else{ echo $val['status']; } ?></td>
                                    <td><a href="<?= site_url('admin/edit/'.$val['id'].'/offers/edit_offers') ?>"><i class="fa fa-pencil"></i></a> | <a style="cursor:pointer" onclick="deleteConff('<?= site_url('admin/delete/live/'.$val['id']."/same") ?>')" link="<?= site_url('admin/delete/offers/'.$val['id']."/same") ?>"><i class="fa fa-close"></i></a></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<div class="conf"></div>
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
</script>