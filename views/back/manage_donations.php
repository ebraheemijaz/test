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
<?php
    $this->data->update(array('read' => 0), 'donations', array('read' => 1));
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Manage Donations</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> View Donations<span style="float : right;">
                        <a  onClick="printDiv('printReport');"><i class="fa fa-print md-icon"></i></a>
                        <a href="<?= site_url('admin/save_pdf_donation/donations') ?>" id="pdfUrl"><i class="fa fa-file-pdf-o md-icon"></i></a>
                        <a onclick="openProfile()"><i class="md-icon material-icons" style="color: red;">add_box</i></a>
        </span></header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Enter From Date" onfocus="(this.type='date')" class="form-control col-md-4" id="fromDate" name="fromDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Enter To Date" onfocus="(this.type='date')" class="form-control col-md-4" id="toDate" name="toDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-4">
                                                <button type="button" id="search" class="btn btn-success">Search</button>&nbsp;&nbsp;
                                            </div>
                                            <div class="col-md-8" id="pdfDiv" style="display: none;">
                                                <a href="<?= site_url('admin/save_pdf_donation/donations') ?>" id="pdfUrl2"><i class="fa fa-file-pdf-o md-icon"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <div id="printReport">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Date</td>
                                <td>Admin Name</td>
                                <td>Member Name</td>
                                <!--<td>Mobile</td>-->
                                <td>Purpose</td>
                                <td>Comments</td>
                                <td>Amount (£)</td>
                                <td>Mode of Payment</td>
                                <td>Gift Aid</td>
                                <td>Claimable Amount (£)</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody id="ajaxReplace">
                            <?php $total=0; foreach($donation as $val){?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                    <td><?php if($val['admin_id'] == 0){ echo 'N/A'; }else{ echo $this->data->fetch('credentials', array('id' => $val['admin_id']))[0]['name']; } ?></td>
                                    <td><?= $val['username']; ?></td>
                                    <!--<td><?= $val['mobile'] ?></td>-->
                                    <td><?= $val['detail'] ?></td>
                                    <td><?php if(!empty($val['purpose']) && strlen($val['purpose']) >= 100){ 
                                        ?> <?= substr(strip_tags($val['purpose']),0,100); ?> <a href="#" data-target="#details<?= $val['id'] ?>" data-toggle="modal">... <span class="btn-primary">readmore</span></a>  <?php 
                                        }else if(!empty($val['purpose']) && strlen($val['purpose']) < 100){ echo ucfirst($val['purpose']); }else{ echo "-"; }  ?></td>
                                    <td>£ <?= number_format((float)($val['amount']), 2, '.', ','); ?></td>
                                    <td><?= $val['modeOfPayment'] ?></td>
                                    <td><?php if($val['giftAid']){ echo 'Yes'; }else{echo 'No'; }?></td>
                                    <td><?php if($val['username'] != 'Anonymous'){ if($val['giftAid']){ ?><a href="<?= site_url('admin/save_gift_aid/')."/".$val['id']; ?>"><?php echo "£ ". (number_format((float)($val['amount'] * 0.25), 2, '.', '')); ?></a><?php }else{echo 0;}}else{ echo 0; } ?></td>
                                    <td><a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['userId'] ?>" title="View Member Information"><i class="fa fa-eye"></i></a> | 
                                    <?php if($val['admin_id'] == 0){ ?><a onclick="deleteConff('<?= site_url('admin/editGiftAid/'.$val['id']."/".$val['userId']."/".$val['giftAid']."/manage_donations") ?>')" title="Edit Gift Aid"><i class="fa fa-pencil"></i></a><?php }else{ ?><a href="<?= site_url('admin/edit/'.$val['id'].'/donations/edit_donations') ?>"><i class="fa fa-pencil"></i></a><?php } ?>
                                    <?php if($val['admin_id'] != 0){?> | <a onclick="deleteRequest('<?= site_url('admin/delete/donations/'.$val['id']."/same") ?>')" title="Delete Donations"><i class="fa fa-trash"></i></a> <?php } ?></td>
                                </tr>

                            <?php $total += $val['amount']; } ?>
                            </tbody>

                        </table>
                        </div>
                        </div>
                        <div class="row"></div>
                        <!--<h3 style="font-weight: bold" id="totalAmount">Total Donations: £ <?= number_format((float)($total), 2, '.', ','); ?></h3>-->
                        <h3 style="font-weight: bold" id="totalAmountMonth">Total Donations : £ <?= number_format((float)($total), 2, '.', ','); ?></h3>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <table id="myTableDonate" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td><a onclick="fetchBasedOnYear('<?= date('Y')-1 ?>')"><?= date('Y')-1 ?></a> | <a onclick="fetchBasedOnYear('<?= date('Y') ?>')"><?= date('Y') ?></a></td>
                                            <!--<td><a onclick="fetchBasedOnYear('<?= date('Y')+1 ?>')"><?= date('Y')+1 ?></a><br/></td>-->
                                            <!--<td><a onclick="fetchBasedOnYear('<?= date('Y')+2 ?>')"><?= date('Y')+2 ?></a><br/></td>-->
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <table id="myTableTotal" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>Jan</td>
                                            <td>Feb</td>
                                            <td>Mar</td>
                                            <td>Apr</td>
                                            <td>May</td>
                                            <td>Jun</td>
                                            <td>Jul</td>
                                            <td>Aug</td>
                                            <td>Sep</td>
                                            <td>Oct</td>
                                            <td>Nov</td>
                                            <td>Dec</td>
                                        </tr>
                                    </thead>
                                    <tbody id="totalDonation">
                                        <tr class="fontsize">
                                            <?php
                                                foreach($donationYear as $k => $don){
                                                    if($don[0]['total']){
                                                ?>
                                                <td <?php if($k+1 == date('m')){ ?> style="background-color: #5ff442;"<?php } ?>><?= "£ ".number_format((float)($don[0]['total']), 2, '.', ','); ?></td>
                                                <?php
                                                    }else{
                                                    ?>
                                                    <td>£ <?= number_format((float)(0), 2, '.', ','); ?></td>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </tr>
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
    <div class="conf"></div>
    <?php foreach($donation as $val){ ?>
    <div class="modal fade in" id="details<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Details
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $val['purpose'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</section>
<div id="advevver"></div>
<div style="" class="modal fade bs-example-modal-md in" id="newModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                    New Donation
                </h4>
            </div>
            <div class="modal-body">
                <?php
                    $members = $this->data->myquery("SELECT * FROM `member` WHERE `status` = 'active' and `first_time` = 'no' ORDER BY lname ASC");
                ?>
                <form action="<?= site_url('admin/insert/donations/manage_donations'); ?>" class="form-signin" id="actionForm" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Member Name : </p>
                        </div>
                        <div class="col-md-8">
                            <select name="member" required class="form-control chosen-select" id="mem">
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
                            <input type="checkbox" class="form-control" name="anonymous" id="anonymous"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="float: left;">Amount (£):</p>
                        </div>
                        <div class="col-md-8">
                            <input type="number" required name="amount" min="1" class="form-control" style="float: right;font-size: 12px!important;height: 40px;"/><br/>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Mode of Payment:</p>
                        </div>
                        <div class="col-md-8">
                            <select name="modeOfPayment" required class="form-control">
                                <option value="">Select Mode</option>
                                <option value="Cash">Cash</option>
                                <option value="Card">Card</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Purpose: </p>
                        </div>
                        <div class="col-md-8">
                            <select style="height: 100%;" class="form-control" name="detail">
                                <option value="Offerings">Offerings</option>
                                <option value="Tithe">Tithe</option>
                                <option value="Food Bank">Food Bank</option>
                                <option value="Welfare">Welfare</option>
                                <option value="Missionary">Missionary</option>
                                <option value="Children">Children</option>
                                <option value="Pledge">Pledge</option>
                                <option value="Christmas Hamper">Christmas Hamper</option>
                                <option value="Others">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Additional Information:</p>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="purpose" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" id="modalSubmit" class="btn btn-danger">Donate</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
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
    $('#mem').change(function(){
        var member = $(this).val();
        if(member != ""){
            $('#anonymous').attr('disabled', true);
        }else{
            $('#anonymous').attr('disabled', false);
        }
    });
    
    $('#anonymous').change(function(){
        if(this.checked){
            $('#mem_chosen').css('pointer-events', 'none');
            $('#mem').prop('required',false);
        }else{
            $('#mem_chosen').css('pointer-events', '');
            $('#mem').prop('required',true);
        }
        
    });
    function fetchBasedOnYear(year){
        var d = new Date();
        $.ajax({
            url: "<?= site_url('admin/fullYearDonation') ?>/donations",
            type: "POST",
            data: {year:year},
            success: function(e){
                var jsonData = JSON.parse(e);
                var yearListData = '';
                var totalAmount = 0;
                yearListData += "<tr>";
                $.each(jsonData.donationYear, function(i, val){
                    if(val[0].total){
                        amount = (val[0].total).toLocaleString('en-UK');
                        if(i == d.getMonth()){
                            yearListData += "<td style='background-color: #5ff442;'>£ "+parseFloat(amount).toFixed(2)+"</td>";
                            totalAmount += parseInt(amount);
                        }else{
                            yearListData += "<td>£ "+parseFloat(amount).toFixed(2)+"</td>";
                            totalAmount += parseInt(amount);
                        }
                    }else{
                        yearListData += "<td>£ "+parseFloat(0).toFixed(2)+"</td>";
                    } 
                });
                yearListData += "</tr>";
                $('#totalDonation').html(yearListData);
                // $('#totalAmount').html('Total Donations: £ '+totalAmount);
                $('#totalAmountMonth').html('Total Donations of '+year+ ': £ '+parseFloat(totalAmount).toFixed(2));
            }
        });
    }
    $('#search').click(function(){
        var toDate = $('#toDate').val();
        var fromDate = $('#fromDate').val();
        var d1 = new Date();
        if(toDate >= fromDate){
            $.ajax({
                url: "<?= site_url('admin/searchByDate') ?>/donations",
                type: "POST",
                data: {toDate:toDate,fromDate:fromDate},
                success: function(e){
                    var jsonData = JSON.parse(e);
                    var donationListData = '';
                    var totalAmount = 0;
                    // console.log(jsonData.donation);
                    if(jsonData.donation.length){
                        $.each(jsonData.donation, function(i, val){
                            var d = new Date(val.date);
                            var month = d.getMonth()+1;
                            var day = d.getDate();
                            var output = (day<10 ? '0' : '') + day + "-" 
                                        + (month<10 ? '0' : '') + month + '-'
                                        + d.getFullYear();
                            var url = "admin/editGiftAid/"+val.id+"/"+val.userId+"/"+val.giftAid+"/manage_donations";
                            var editUrl = "<?= site_url('"+url+"') ?>";
                            var deleteConf = "deleteConff('"+editUrl+"')";
                            var url2 = "admin/edit/"+val.id+"/donations/edit_donations";
                            var editUrlDummy = "<?= site_url('"+url2+"') ?>";
                            var editUrl1 = '<a onclick="'+deleteConf+'" title="Edit Gift Aid"><i class="fa fa-pencil"></i></a>';
                            var editUrl2 = '<a href="'+editUrlDummy+'"><i class="fa fa-pencil"></i></a>';
                            var deleteUrl = "admin/delete/donations/"+val.id+"/same";
                            var deleteComUrl = "<?= site_url('"+deleteUrl+"') ?>";
                            var deleteReq = "deleteRequest('"+deleteComUrl+"')";
                            var deleteComUrl1 = '<a onclick="'+deleteReq+'" title="Delete Donation"><i class="fa fa-trash"></i></a>';
                            var giftAidText = "";
                            if(val.giftAid){ giftAidText = 'Yes'; }else{ giftAidText = 'No';}
                            
                            var claimableAmountUrl = "<?= site_url('admin/save_gift_aid/')."/" ?>"+val.id;
                            var claimableAmount = '<a href="'+claimableAmountUrl+'">'+parseFloat((val.amount * 0.25)).toFixed(2)+'</a>';
                            if(val.username != 'Anonymous'){
                                claimable = claimableAmount;
                            }else{
                                claimable = 0;
                            }
                            donationListData += "<tr>";
                            donationListData += "<td>"+output+"</td>";
                            donationListData += "<td>"+val.adminName+"</td>";
                            donationListData += "<td>"+val.username+"</td>";
                            donationListData += "<td>"+val.detail+"</td>";
                            donationListData += "<td>"+val.purpose+"</td>";
                            donationListData += "<td> £ "+parseFloat((val.amount)).toFixed(2)+"</td>";
                            donationListData += "<td>"+val.modeOfPayment+"</td>";
                            donationListData += "<td>"+giftAidText+"</td>";
                            donationListData += "<td>£ "+claimable+"</td>";
                            donationListData += "<td><a href='<?= site_url('admin/view/edit_member') ?>/"+val.userId+"' title='View Member Information'><i class='fa fa-eye'></i></a>";
                            if(val.admin_id != 0){
                                donationListData += ' | '+editUrl2;
                                donationListData += ' | '+deleteComUrl1+'</td>';
                            }else{
                                donationListData += ' | '+editUrl1;
                                donationListData += '</td>';
                            }
                            donationListData += "</tr>";
                            totalAmount += parseInt(val.amount);
                        });
                    }else{
                        donationListData += "<tr>";
                        donationListData += "<td colspan='10' style='text-align: center;font-size: 16px;'><strong>"+jsonData.error+"</strong></td>";
                        donationListData += "</tr>";
                    }
                    $('#ajaxReplace').html(donationListData);
                    $('#totalAmountMonth').html('Total Donations in '+d1.getFullYear()+': £ '+parseFloat(totalAmount).toFixed(2));
                    newPdfUrl = "<?= site_url('admin/save_pdf_basedon_date/donations') ?>"+"/"+fromDate+"/"+toDate;
                    $('#pdfUrl').attr('href', newPdfUrl);
                    $('#pdfDiv').css('display', 'block');
                    $('#pdfUrl2').attr('href', newPdfUrl);
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
            "Are you sure you want to change your Gift Aid preference? " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>No</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function deleteRequest(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are you sure? " +
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