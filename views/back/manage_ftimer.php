<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Registered First Timers</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">First Timers</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableFtimer" class="table table-hover">
                            <thead>
                            <tr>
                                <td style="width : 15%;">Name</td>
                                <td style="width : 20%;">Profile Picture</td>
                                <td style="width : 5%;">Gender</td>
                                <td style="display:none;">Age</td>
                                <td style="display:none;">Marital Status</td>
                                <td style="display:none;">Job Status</td>
                                <td style="display:none;">Native Country</td>
                                <td style="display:none;">Hobbies</td>
                                <td style="display:none;">Postal Code</td>
                                <td style="width : 20%;">Date Joined</td>
                                <td style="display:none;">Job Status</td>
                                <td style="display:none;">Profession</td>
                                <td style="width : 15%;">1st Responder</td>
                                <td style="width : 15%;">2nd Responder</td>
                                <td style="width : 40%;">Days Left to deletion</td>
                                <td style="width: 30%;">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($fmembers as $val){ ?>
                                <tr>
                                    <td><?= ucfirst(strtolower($val['fname']))." ".ucfirst(strtolower($val['lname'])) ?></td>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
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
                                    <td style="width : 5%;"><?= $val['gander'] ?></td>
                                    <td style="display : none;"><?= $val['age_group'] ?></td>
                                    <td style="display : none;"><?= $val['maritalStatus'] ?></td>
                                    <td style="display : none;"><?= $val['employement'] ?></td>
                                    <td style="display : none;"><?= $val['nativeCountry'] ?></td>
                                    <td style="display : none;"><?= $val['hobbies']; ?></td>
                                    <td style="display : none;"><?= $val['poatalCode'] ?></td>
                                    <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                    <td style="display: none;"><?= ucfirst($val['employement']) ?></td>
                                    <?php
                                        $profession = $this->data->fetch('businessgroup', array('id' => $val['businessGroup']));
                                    ?>
                                    <td style="display: none;"><?= $profession[0]['name'] ?></td>
                                    <td>
                                        <?php $activationLink = site_url()."/admin/activationLink/".$val['id']; $firstRem = "Dear ".$val['fname']." , Thank you for visiting our church, may God almighty make you experience great grace. Due to GDPR compliance we would like you to click on this link ".$activationLink." to allow us keep your information, send you church updates, and also grant you access to our app. Shalom, Pastor Leke Sanusi."; ?>
                                        <a onclick="firstRem('<?= $firstRem ?>')">View</a>
                                    </td>
                                    <td>
                                        <?php
                                            $date1=date_create(date('Y-m-d'));
                                            $date2=date_create(date('Y-m-d', strtotime("+7 days", strtotime($val['dOfJoining']))));
                                            $diff=date_diff($date1,$date2);
                                            $totalDays = $diff->format('%R%a');
                                            // print_r($totalDays);
                                        ?>
                                        <?php $secondRem = "REMINDER MESSAGE! Dear ".$data['fname']." , Thank you for visiting our church, may God almighty make you experience great grace. Due to GDPR compliance we would like you to click on this link ".$activationLink." to allow us keep your information, send you church updates, and also grant you access to our app. Shalom, Pastor Leke Sanusi."; ?>
                                        <a onclick="secondRem('<?= $secondRem ?>', '<?= $totalDays ?>')">View</a>
                                    </td>
                                    <td>
                                        <?php 
                                            $date1=date_create(date('Y-m-d'));
                                            $date2=date_create(date('Y-m-d', strtotime("+90 days", strtotime($val['dOfJoining']))));
                                            $diff=date_diff($date1,$date2);
                                            $totalDays = $diff->format('%R%a');
                                            if($totalDays <= 0){
                                            ?>    
                                            
                                                <a onclick=deleteConff("<?= site_url('admin/delete/member') ?>/<?= $val['id'] ?>/same")><i class="fa fa-trash"></i></a>
                                            <?php    
                                            }else{
                                                echo $diff->format("%R%a days");
                                            }
                                            // $totalDays = $diff->format("%R%a days");
                                        ?>
                                    </td>
                                    <td><a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>" title="View"><i class="fa fa-eye"></i></a> | 
                                    <a onclick=moveEvent("<?= site_url('admin/moveMember') ?>/<?= $val['id'] ?>") title="Move to Members area"><i class="fa fa-arrows-alt"></i></a> | 
                                    <a onclick=deleteConff("<?= site_url('admin/delete/member') ?>/<?= $val['id'] ?>/same") title="Delete"><i class="fa fa-trash"></i></a></td>
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
    function moveEvent(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are you sure you want to move this first timer to the members area?" +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "<a href='"+link+"'><span class='btn btn-success'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function firstRem(link) {
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "First Reminder Message" +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<div class='row'>"+
                "<div class='col-md-12'>"+
                    "<label>"+link+"</label>"+
                "</div>"+
            "</div>"+
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function secondRem(link, days) {
        if(days >= 0){
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
                "<div class='modal-dialog modal-md' role='document'> " +
                "<div class='modal-content'> " +
                "<div class='modal-header'> " +
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
                "<span aria-hidden='true'>×</span> " +
                "</button> " +
                "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
                "Second Reminder Message" +
                "</h4> " +
                "</div> " +
                "<div class='modal-body'> " +
                "<div class='row'>"+
                    "<div class='col-md-12'>"+
                        "<label style='font-size: 20px; font-weight: bold;'>Status : "+days+" Left to go.</label>"+
                    "</div>"+
                "</div>"+
                "<div class='row'>"+
                    "<div class='col-md-12'>"+
                        "<label>"+link+"</label>"+
                    "</div>"+
                "</div>"+
                "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
                "</div> " +
                "</div> " +
                "</div> " +
                "</div>";
        }else{
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
                "<div class='modal-dialog modal-md' role='document'> " +
                "<div class='modal-content'> " +
                "<div class='modal-header'> " +
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
                "<span aria-hidden='true'>×</span> " +
                "</button> " +
                "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
                "Second Reminder Message" +
                "</h4> " +
                "</div> " +
                "<div class='modal-body'> " +
                "<div class='row'>"+
                    "<div class='col-md-12'>"+
                        "<label style='font-size: 20px; font-weight: bold;'>Status : Second Reminder Sent.</label>"+
                    "</div>"+
                "</div>"+
                "<div class='row'>"+
                    "<div class='col-md-12'>"+
                        "<label>"+link+"</label>"+
                    "</div>"+
                "</div>"+
                "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
                "</div> " +
                "</div> " +
                "</div> " +
                "</div>";
        }
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
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
</script>
</section>