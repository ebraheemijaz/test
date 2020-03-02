<style>
    .chosen-container {
        width: 100% !important;
    }
    
    .fontsize {
        font-size: 100%;
    }
    
    @media screen and (min-width: 1024px) and (max-width: 1280px) {
        .fontsize {
            font-size: 100%;
        }
    }
    
    @media screen and (min-width: 1281px) and (max-width: 1440px) {
        .fontsize {
            font-size: 80%;
        }
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Contact Us<span style="float : right;">
                        <!--<a  onClick="printDiv('ajaxResponse');"><i class="fa fa-print md-icon"></i></a>-->
                        <!--<a href="<?= site_url('admin/save_notification_pdf/testimonies') ?>" id="pdfUrl"><i class="fa fa-file-pdf-o md-icon"></i></a>-->
                        <!--<a onclick="openProfile()"><i class="md-icon material-icons" style="color: red;">add_box</i></a>-->
        </span></header>
                    <div class="panel-body">
                        <br/>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <!--<div class="row">-->
                                <!--    <div class="col-md-12">-->
                                <!--        <div class="col-md-4">-->
                                <!--            <input type="text" placeholder="Enter from date" onfocus="this.type='date'" class="form-control col-md-4" id="fromDate" name="fromDate"/>-->
                                <!--        </div>-->
                                <!--        <div class="col-md-4">-->
                                <!--            <input type="text" placeholder="Enter to date" onfocus="this.type='date'" class="form-control col-md-4" id="toDate" name="toDate"/>-->
                                <!--        </div>-->
                                <!--        <div class="col-md-4">-->
                                <!--            <div class="col-md-4">-->
                                <!--                <button type="button" id="search" class="btn btn-success">Search</button>-->
                                <!--            </div>-->
                                <!--            <div class="col-md-8" id="pdfDiv" style="display: none;">-->
                                <!--                <a href="" id="pdfUrl2"><i class="fa fa-file-pdf-o md-icon"></i></a>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div id="ajaxResponse">
                                    <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Date</td>
                                <td>Name</td>
                                <td width="20%">Description</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Reason</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($contactUs as $val){ if($val['contactDomain'] == base_url()){?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['createdAt'])); ?></td>
                                    <td><?= $val['contactName'] ?></td>
                                    <td style="word-wrap: break-word;"><?php if(strlen(strip_tags($val['desc'])) >= 100){ echo substr(strip_tags($val['desc']),0,100); ?><a data-toggle="modal" data-target="#myModal<?= $val['id'] ?>">...<span class="btn-primary">View More</span></a><?php }else{ echo strip_tags($val['desc']); } ?>
                                    <div id="myModal<?= $val['id'] ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Contact Description</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php $this->data->update(array('id' => $val['id']), 'contactUs', array('read' => 1)); ?>
                                                        <p><?= $val['desc'] ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div></td>
                                    <td><?php echo $val['contactPhoneNo']; ?></td>
                                    <td><?= $val['contactEmail'] ?></td>
                                    <td><?php if($val['contactReason'] == 'Others'){ echo $val['otherText']; }else{ echo $val['contactReason']; } ?></td>
                                    <td><a onclick="deleteConff('<?= site_url('admin/delete/contactUs/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php $i++; } } ?>
                            </tbody>
                        </table>
                                </div>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<div class="conf"></div>
<div style="" class="modal fade bs-example-modal-md in" id="newModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                    New Testimony
                </h4>
            </div>
            <div class="modal-body">
                <?php
                    $members = $this->data->myquery("SELECT * FROM `member` WHERE `status` = 'active' and `first_time` = 'no' ORDER BY lname ASC");
                ?>
                <form action="<?= site_url('admin/insert/testimonies/testimonies'); ?>" class="form-signin" id="actionForm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Member Name : </p>
                        </div>
                        <div class="col-md-8">
                            <select name="user_id" required class="form-control chosen-select" id="mem">
                                <option value="">Select Member</option>
                                <?php
                                    foreach($members as $member){
                                    ?>
                                    <option value="<?= $member['id'] ?>"><?= $member['fname']." ".$member['lname'] ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="float: left;">Anonymous</p>
                        </div>
                        <div class="col-md-8">
                            <input type="checkbox" class="form-control" name="anon" id="anonymous"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="float: left;">Subject</p>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="subject" id="subject"  style="float: right;font-size: 12px!important;height: 40px;"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="float: left;">Description</p>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="msg" id="desc"></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="float: left;">Testimony File 1</p>
                        </div>
                        <div class="col-md-8">
                            <input type="file" name="fileTesti[]" class="form-control"  style="float: right;font-size: 12px!important;height: 40px;" />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="float: left;">Testimony File 2</p>
                        </div>
                        <div class="col-md-8">
                            <input type="file" name="fileTesti[]" class="form-control"  style="float: right;font-size: 12px!important;height: 40px;" />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" id="modalSubmit" class="btn btn-danger">Submit</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
</div>
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
    $('#search').click(function(){
        var toDate = $('#toDate').val();
        var fromDate = $('#fromDate').val();
        var d1 = new Date();
        var joiningDate = "";
        if(toDate >= fromDate){
            $.ajax({
                url: "<?= site_url('admin/notification') ?>/testimonies",
                type: "POST",
                data: {toDate:toDate,fromDate:fromDate},
                success: function(e){
                    // console.log(e);
                    $('#ajaxResponse').html(e);
                    newPdfUrl = "<?= site_url('admin/save_notification_pdf_basedon_date/testimonies') ?>"+"/"+fromDate+"/"+toDate;
                    $('#pdfUrl').attr('href', newPdfUrl);
                    $('#pdfDiv').css('display', 'block');
                    $('#pdfUrl2').attr('href', newPdfUrl);
                    $('#myTable').DataTable({aaSorting: [[0, "desc"]]}).Draw();
                }
            });
        }else{
            alert('To Date must be greater or equal to from date.');
        }
    });
    function printDiv(divName) {
        var review = "<br/>Comment:</br>";
        review += $("textarea").val();
        $("#rev").html(review);
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
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
    
    function openProfile(){
        $("#newModal").modal("toggle");
    }

</script>
