<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Tithes</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Tithes Received<span style="float : right;">
                        <a  onClick="printDiv('printReport');"><i class="fa fa-print md-icon"></i></a>
                        <a href="<?= site_url('admin/save_pdf_donation/tithes') ?>" id="pdfUrl"><i class="fa fa-file-pdf-o md-icon"></i></a>
                        <a href="<?= site_url('admin/view') ?>/add_tithes" title="Add Tithes"><i class="md-icon material-icons" style="color: red;">add_box</i></a>
        </span></header>
                    <div class="panel-body">
                        <!--<a href="<?= site_url('admin/view') ?>/add_tithes"><span class="btn btn-primary">Add New</span></a>-->
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
                                            <div class="col-md-4"><button type="button" id="search" class="btn btn-success">Search</button></div>
                                            <div class="col-md-8" id="pdfDiv" style="display: none;"><a href="<?= site_url('admin/save_pdf_donation/tithes') ?>" id="pdfUrl2"><i class="fa fa-file-pdf-o md-icon"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="printReport">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Date Posted</td>
                                    <td>Tithes Collection Date</td>
                                    <td>Admin Name</td>
                                    <td>Amount (£)</td>
                                    <td>Remittance amount (£)</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="ajaxReplace">
                                <?php $total = 0; foreach($tithes as $val){ ?>
                                    <tr>
                                        <td><?= date("d-M-Y", strtotime($val['dateCreated'])) ?></td>
                                        <td><?= date("d-M-Y",strtotime($val['date'])) ?></td>
                                        <td><?= ucfirst($val['name']) ?></td>
                                        <td>£ <?= number_format((float)($val['amount']), 2, '.', ','); ?></td>
                                        <td>£ <?= number_format((float)($val['amount'] * ($val['remittance'] / 100)), 2, '.', ','); ?></td>
                                        <td><a href="<?= site_url('admin/edit/'.$val['id'].'/tithes/edit_tithes') ?>" title="Edit Tithes"><i class="fa fa-pencil"></i></a> | <a onclick="deleteConff('<?= site_url('admin/delete/tithes/'.$val['id']."/same") ?>')" title="Delete Tithes"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                <?php $total += $val['amount']; } ?>
                            </tbody>

                        </table>
                        </div>
                        </div>
                        <div class="row"></div>
                        <!--<h3 style="font-weight: bold" id="totalAmount">Total Tithes: £ <?= number_format((float)($total), 2, '.', ','); ?></h3>-->
                        <h3 style="font-weight: bold" id="totalAmountMonth">Total Tithes of <?= date('Y') ?>: £ <?= number_format((float)($total), 2, '.', ','); ?></h3>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <table id="myTableDonate" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <!--<td><a onclick="fetchBasedOnYear('<?= date('Y')-1 ?>')"><?= date('Y')-1 ?></a><br/></td>-->
                                            <td><a onclick="fetchBasedOnYear('<?= date('Y') ?>')"><?= date('Y') ?></a><br/></td>
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
                                        <tr>
                                            <?php
                                                foreach($tithesYear as $k => $don){
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
</section>
<script>
    //New Code
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
    $('#search').click(function(){
        var toDate = $('#toDate').val();
        var fromDate = $('#fromDate').val();
        var d1 = new Date();
        if(toDate >= fromDate){
            $.ajax({
                url: "<?= site_url('admin/searchByDate') ?>/tithes",
                type: "POST",
                data: {toDate:toDate,fromDate:fromDate},
                success: function(e){
                    var jsonData = JSON.parse(e);
                    var donationListData = '';
                    var totalAmount = 0;
                    console.log(jsonData);
                    var formatter = new Intl.NumberFormat('en-US', {
                            style: 'currency',
                            currency: 'GBP',
                            minimumFractionDigits: 2,
                         });
                    if(jsonData.tithes.length){
                        $.each(jsonData.tithes, function(i, val){
                            //Date Of Offerings
                            var d = new Date(val.date);
                            var month = d.getMonth()+1;
                            var day = d.getDate();
                            var output = (day<10 ? '0' : '') + day + "-" 
                                        + (month<10 ? '0' : '') + month + '-'
                                        + d.getFullYear();
                            //Date Posted
                            var d = new Date(val.dateCreated);
                            var month = d.getMonth()+1;
                            var day = d.getDate();
                            var output1 = (day<10 ? '0' : '') + day + "-" 
                                        + (month<10 ? '0' : '') + month + '-'
                                        + d.getFullYear();
                            //Edit Url Create
                            //'admin/edit/'.$val['id'].'/offerings/edit_offerings'
                            var url = "admin/edit/"+val.id+"/tithes/edit_tithes";
                            var editUrl = "<?= site_url('"+url+"') ?>";
                            // var deleteConf = "deleteConff('"+editUrl+"')";
                            var editUrl1 = '<a href="'+editUrl+'" title="Edit Offerings"><i class="fa fa-pencil"></i></a>';
                            //Delete Url Create
                            var deleteUrl = "admin/delete/tithes/"+val.id+"/same";
                            var deleteComUrl = "<?= site_url('"+deleteUrl+"') ?>";
                            var deleteReq = "deleteConff('"+deleteComUrl+"')";
                            var deleteComUrl1 = '<a onclick="'+deleteReq+'" title="Delete Donation"><i class="fa fa-trash"></i></a>';
                            //Gift Aid and Claimable Amount Create
                            var giftAidText = "";
                            if(val.giftAid){ giftAidText = 'Yes'; }else{ giftAidText = 'No';}
                            var claimableAmountUrl = "<?= site_url('admin/save_gift_aid/')."/" ?>"+val.id;
                            var claimableAmount = '<a href="'+claimableAmountUrl+'">'+parseFloat((val.amount * 0.25)).toFixed(2)+'</a>';
                            donationListData += "<tr>";
                            donationListData += "<td>"+output1+"</td>";
                            donationListData += "<td>"+output+"</td>";
                            donationListData += "<td>"+val.name+"</td>";
                            donationListData += "<td>"+formatter.format(val.amount)+"</td>";
                            donationListData += "<td>"+formatter.format((val.amount * (val.remittance / 100)))+"</td>";
                            donationListData += "<td>";
                            donationListData += editUrl1;
                            if(val.admin_id != 0){
                                donationListData += ' | '+deleteComUrl1+'</td>';
                            }else{
                                donationListData += ' | '+deleteComUrl1+'</td>';
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
                    $('#totalAmountMonth').html('Total Donations in '+d1.getFullYear()+': '+formatter.format(totalAmount));
                    newPdfUrl = "<?= site_url('admin/save_pdf_basedon_date/tithes') ?>"+"/"+fromDate+"/"+toDate;
                    $('#pdfUrl').attr('href', newPdfUrl);
                    $('#pdfDiv').css('display', 'block');
                    $('#pdfUrl2').attr('href', newPdfUrl);
                }
            });
        }else{
            alert('To Date must be greater or equal to from date.');
        }
    });
    function fetchBasedOnYear(year){
        // alert(year);
        var d = new Date();
        $.ajax({
            url: "<?= site_url('admin/fullYearDonation') ?>/tithes",
            type: "POST",
            data: {year:year},
            success: function(e){
                // console.log(e);
                var jsonData = JSON.parse(e);
                var yearListData = '';
                var totalAmount = 0;
                yearListData += "<tr>";
                var formatter = new Intl.NumberFormat('en-US', {
                            style: 'currency',
                            currency: 'GBP',
                            minimumFractionDigits: 2,
                         });
                $.each(jsonData.tithesYear, function(i, val){
                    if(val[0].total){
                        amount = (val[0].total).toLocaleString('en-UK');
                        if(i == d.getMonth()){
                            yearListData += "<td style='background-color: #5ff442;'>"+formatter.format(amount)+"</td>";
                            totalAmount += parseInt(amount);
                        }else{
                            yearListData += "<td>"+formatter.format(amount)+"</td>";
                            totalAmount += parseInt(amount);
                        }
                    }else{
                        yearListData += "<td>£ "+parseFloat(0).toFixed(2)+"</td>";
                    } 
                });
                yearListData += "</tr>";
                $('#totalDonation').html(yearListData);
                // $('#totalAmount').html('Total Donations: £ '+totalAmount);
                $('#totalAmountMonth').html('Total Tithes of '+year+ ': '+formatter.format(totalAmount));
            }
        });
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
</script>