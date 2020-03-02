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
                    <a href="<?= site_url('admin/save_notification_pdf/groupActivity') ?>" id="pdfUrl"><i class="fa fa-file-pdf-o md-icon"></i></a>
        </span></header>
                    
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Enter from Date" onfocus="this.type='date'" class="form-control col-md-4" id="fromDate" name="fromDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Enter to Date" onfocus="this.type='date'" class="form-control col-md-4" id="toDate" name="toDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-4">
                                                <button type="button" id="search" class="btn btn-success">Search</button>
                                            </div>
                                            <div class="col-md-8" id="pdfDiv" style="display: none;">
                                                <a href="" id="pdfUrl2"><i class="fa fa-file-pdf-o md-icon"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ajaxResponse">
                                    <table id="myTableCGroup" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($groups as $val){ ?>
                                <tr>
                                    <td><?= ucfirst($val['name']) ?></td>
                                    <?php $status = ($val['status'] == 'verified') ? "not verified" : "verified"; ?>
                                    <td><a href="<?= site_url("admin/statusGroup1/".$val['id']."/".$status) ?>"><?= ucfirst($val['status']) ?></a></td>
                                    <td><?php $approved = $this->data->myquery("SELECT count(*) as approved FROM `membgroup` WHERE g_id = ".$val['id']." and status = 'approved'"); $pending = $this->data->myquery("SELECT count(*) as pending FROM `membgroup` WHERE g_id = ".$val['id']." and status = 'pending'"); ?><a data-toggle="modal" href="<?= site_url('admin/view_members') ?>/<?= $val['id'] ?>"><span style="<?php if($approved[0]['approved'] != 0 && $pending[0]['pending'] == 0){ echo "color: green;"; }else{ echo "color: red;"; } ?>">Check for Admittance</span></a><?php if($userAdmin[0]['id'] == 3){ ?> | <a onclick="deleteConff('<?= site_url('admin/memberDelete/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a><?php } ?></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                                </div>
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
    $('#search').click(function(){
        var toDate = $('#toDate').val();
        var fromDate = $('#fromDate').val();
        var d1 = new Date();
        var joiningDate = "";
        if(toDate >= fromDate){
            $.ajax({
                url: "<?= site_url('admin/notification') ?>/groupActivity",
                type: "POST",
                data: {toDate:toDate,fromDate:fromDate},
                success: function(e){
                    console.log(e);
                    if(e != null || e != "undefined" || e != ''){
                        $('#ajaxResponse').html(e);
                        newPdfUrl = "<?= site_url('admin/save_notification_pdf_basedon_date/groupActivity') ?>"+"/"+fromDate+"/"+toDate;
                        $('#pdfUrl').attr('href', newPdfUrl);
                        $('#pdfDiv').css('display', 'block');
                        $('#pdfUrl2').attr('href', newPdfUrl);
                        $('#myTableCGroup').DataTable({aaSorting: [[0, "desc"]]}).Draw();
                    }else{
                        alert('No Data Found.');
                    }
                }
            });
        }else{
            alert('To Date must be greater or equal to from date.');
        }
    });
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