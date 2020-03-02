<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Member's Birthdays</a></li>
                </ul>
            </div>
        </div>
        <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Member's Birthday This Month</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                
                                <div id="ajaxResponse">
                                    <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td style="display: none;">Date</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Profile Picture</td>
                                <td>Date of birth</td>
                                <td>Age Group</td>
                                <td>Greetings Sent</td>
                                <td>Greetings</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($members as $val){ ?>
                                <?php if($val['birthdayToday'] == 'true'){ ?>
                                    <?php if(date("d/M", strtotime($val['birth_month']."/".$val['birth_date'])) == date("d/M")){ ?>
                                    <tr>
                                        <td style="display: none;"><?= $val['birth_date'] ?></td>
                                        <td><a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>"><?= ucfirst(strtolower($val['fname']))." ".ucfirst(strtolower($val['lname'])) ?></a></td>
                                        <td><?= $val['email'] ?></td>
                                        <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                        <!--<td><img src="<?= $image ?>" style="width:100px" alt=""/></td>-->
                                        <?php
                                                if ($this->agent->is_browser())
                                                {
                                                        // echo 'Desktop';
                                                        $agent = $this->agent->browser().' '.$this->agent->version();
                                                }
                                                elseif ($this->agent->is_robot())
                                                {
                                                        $agent = $this->agent->robot();
                                                }
                                                elseif ($this->agent->is_mobile())
                                                {
                                                        // echo 'Mobile';
                                                        $agent = $this->agent->mobile();
                                                }
                                                else
                                                {
                                                        $agent = 'Unidentified User Agent';
                                                }
                                            ?>
                                        <td>
                                        
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <?php
                                        if($this->agent->is_mobile()){
                                        if($exif['Orientation'] == 6){
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '6', '0');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(0deg);" /></a>
                                        <?php
                                        }else if($exif['Orientation'] == 8){
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '8', '0');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-0deg);" /></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '0', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                        <?php
                                        }
                                        }else if($this->agent->is_browser()){
                                                if($exif['Orientation'] == 6){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '6', '90');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(90deg);" /></a>
                                                <?php
                                                }else if($exif['Orientation'] == 8){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '8', '-90');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-90deg);" /></a>
                                                <?php
                                                }else{
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '0', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                                <?php
                                                }
                                                }
                                        ?>
                                    </td>
                                        <td><?= date("d / M",strtotime($val['birth_month']."/".$val['birth_date'])); ?></td>
                                        <td><?php if($val['age_group'] == '18'){echo '13 - 18'; }else if($val['age_group'] == '29'){ echo '19 - 29';}else if($val['age_group'] == '39'){ echo '30 - 39';}else if($val['age_group'] == '49'){ echo '40 - 49'; }else if($val['age_group'] == '69'){ echo '50 - 69'; }else{ echo 'Above 70'; } ?></td>
                                        <td><?php
                                            $birthDayMsg = $this->data->fetch('sms', array('toId' => ($val['id']), 'msg' => 'Birthday SMS.'));
                                            if(!empty($birthDayMsg)){
                                            ?>
                                            <a onclick="message('<?= $birthDayMsg[0]['bMsg'] ?>')"><?= $birthDayMsg[0]['msg']; ?></a>
                                            <?php
                                            }else{
                                                echo "No greeting sent.";
                                            }
                                        ?></td>
                                        <td><button data-toggle="modal" data-target="#myModal<?= $i ?>" type="button" class="btn btn-danger">Send New Greeting</button></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td style="display: none;"><?= $val['birth_date'] ?></td>
                                        <td><a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>"><?= ucfirst(strtolower($val['fname']))." ".ucfirst(strtolower($val['lname'])) ?></a></td>
                                        <td><?= $val['email'] ?></td>
                                        <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                        <!--<td><img src="<?= $image ?>" style="width:100px" alt=""/></td>-->
                                        <?php
                                                if ($this->agent->is_browser())
                                                {
                                                        // echo 'Desktop';
                                                        $agent = $this->agent->browser().' '.$this->agent->version();
                                                }
                                                elseif ($this->agent->is_robot())
                                                {
                                                        $agent = $this->agent->robot();
                                                }
                                                elseif ($this->agent->is_mobile())
                                                {
                                                        // echo 'Mobile';
                                                        $agent = $this->agent->mobile();
                                                }
                                                else
                                                {
                                                        $agent = 'Unidentified User Agent';
                                                }
                                            ?>
                                        <td>
                                        
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <?php
                                        if($this->agent->is_mobile()){
                                        if($exif['Orientation'] == 6){
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '6', '0');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(0deg);" /></a>
                                        <?php
                                        }else if($exif['Orientation'] == 8){
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '8', '0');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-0deg);" /></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '0', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                        <?php
                                        }
                                        }else if($this->agent->is_browser()){
                                                if($exif['Orientation'] == 6){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '6', '90');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(90deg);" /></a>
                                                <?php
                                                }else if($exif['Orientation'] == 8){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '8', '-90');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-90deg);" /></a>
                                                <?php
                                                }else{
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '0', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                                <?php
                                                }
                                                }
                                        ?>
                                    </td>
                                        <td><?= date("d / M",strtotime($val['birth_month']."/".$val['birth_date'])); ?></td>
                                        <td><?php if($val['age_group'] == '18'){echo '13 - 18'; }else if($val['age_group'] == '29'){ echo '19 - 29';}else if($val['age_group'] == '39'){ echo '30 - 39';}else if($val['age_group'] == '49'){ echo '40 - 49'; }else if($val['age_group'] == '69'){ echo '50 - 69'; }else{ echo 'Above 70'; } ?></td>
                                        <td><?php
                                            $birthDayMsg = $this->data->fetch('sms', array('toId' => ($val['id']), 'msg' => 'Birthday SMS.'));
                                            if(!empty($birthDayMsg)){
                                            ?>
                                            <a onclick="message('<?= $birthDayMsg[0]['bMsg'] ?>', '<?= $birthDayMsg[0]['date'] ?>')"><?= $birthDayMsg[0]['msg']; ?></a>
                                            <?php
                                            }else{
                                                echo "No greeting sent.";
                                            }
                                        ?></td>
                                        <td><button data-toggle="modal" data-target="#myModal<?= $i ?>" type="button" class="btn btn-danger">Send New Greeting</button></td>
                                    </tr>
                                <?php } ?>
                            <?php $i++; } ?>
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
    <?php $i=1; foreach($members as $val){ ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?= $i ?>" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('admin/sendBirthdayMsg'); ?>
                        <table class="table table-hover">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="hidden" name="mobile" value="<?= $val['mobileNo'] ?>">
                                    <?= $val['fname']." ".$val['lname'] ?></td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td><textarea name="msg" id="" cols="30" rows="4" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit" class="btn btn-primary">Send</button></td>
                            </tr>
                        </table>
                        <?= form_close(); ?>

                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    <?php $i++; } ?>
    <div class="conf"></div>
    <script>
        function bigImg(url, ori, degree){
        // alert(ori);
        // alert(degree);
        if(ori == '6'){
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 250px !important;'> " +
            "<div class='modal-content' style='background-color: transparent; width: 450px!important'> " +
            "<div class='modal-header' style='width: 80%;'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true'  data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img class='detect' src='"+url+"' style='transform: rotate("+degree+"deg);height: auto; width: 300px; margin-top: 63px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }else if(ori == '8'){
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 250px !important;'> " +
            "<div class='modal-content' style='background-color: transparent; width: 450px!important'> " +
            "<div class='modal-header' style='width: 80%;'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true'  data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img class='detect8' src='"+url+"' style='transform: rotate("+degree+"deg);height: auto; width: 300px; margin-top: 63px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }else{
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 250px !important;'> " +
            "<div class='modal-content' style='background-color: transparent; width: 450px!important'> " +
            "<div class='modal-header' style='width: 80%;'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true' data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img src='"+url+"' style='height: auto; width: 300px; margin-top: 33px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function message(link, date){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Birthday Message " +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<div>"+link+"</div>"+
            "<div>Sent Date : "+date+"</div>"+
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
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
                url: "<?= site_url('admin/notification') ?>/birthdays",
                type: "POST",
                data: {toDate:toDate,fromDate:fromDate},
                success: function(e){
                    // console.log(e);
                    $('#ajaxResponse').html(e);
                    newPdfUrl = "<?= site_url('admin/save_notification_pdf_basedon_date/birthdays') ?>"+"/"+fromDate+"/"+toDate;
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
    </script>
