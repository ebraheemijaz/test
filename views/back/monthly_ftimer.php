<style>
    .dataTables_filter {
        display: none;
    } 
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Monthly First Timers</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Monthly First Timers</header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><input type='text' class='form-control' id='search' placeholder='Search For Monthly Member' name='search' style='font-size: 14px !important;'></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><button type='button' id='show' onclick="sendSMSAll('<?= date('m') ?>')" class='btn btn-success'>Send Message For <span id='monthShow'><?= date('F') ?></span> Members</button></div>
                            <div class="col-md-4"></div>
                        </div>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableMFtimer" class="table table-hover">
                            <thead>
                            <tr>
                                <td style="width : 20%;">Date Joined</td>
                                <td style="width : 20%;">Name</td>
                                <td style="width : 20%;">Picture</td>
                                <td style="width : 5%;">Gender</td>
                                <td style="width : 20%;">Last Message</td>
                                <td style="width : 20%;">Send Message</td>
                                <td style="width : 30%;">Action</td>
                            </tr>
                            </thead>
                            <tbody id="searchResult">
                            <?php $i=1; foreach($mfmembers as $val){ $sms = $this->data->myquery("SELECT * FROM `sms` WHERE toId in (".$val['id'].") ORDER BY date DESC"); ?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                    <td><?= ucfirst($val['fname'])." ".ucfirst($val['lname']) ?></td>
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
                                    <td>
                                        <a onclick="viewMessage('<?= $sms[0]['msg'] ?>', '<?= date('d-m-Y', strtotime($sms[0]['date'])) ?>')">View</a>
                                    </td>
                                    <td><a onclick="sendSMS(<?= $val['id'] ?>)"><i class="fa fa-space-shuttle fa-2x" aria-hidden="true"></i></a></td>
                                    <td><a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>"><i class="fa fa-eye"></i></a> View Profile
                                    <!--<a onclick=moveEvent("<?= site_url('admin/moveMember') ?>/<?= $val['id'] ?>")><i class="fa fa-arrows-alt"></i></a> | -->
                                    <!--<a onclick=deleteConff("<?= site_url('admin/delete/member') ?>/<?= $val['id'] ?>/same")><i class="fa fa-trash"></i></a></td>-->
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
    $('#search').on('blur', function(){
        var search = $(this).val(); 
        $.post("<?= site_url('admin/searchResult') ?>",{search:search},function(e){
            $('#searchResult').html(e);
            if(search == 'January' || search == 'january' || search == 'jan' || search == 'Jan' || search == '01'){
                searchKey = '01';
                key = 'January';
            }else if(search == 'February' || search == 'february' || search == 'feb' || search == 'Feb' || search == '02'){
                searchKey = '02';
                key = 'February';
            }else if(search == 'March' || search == 'march' || search == 'mar' || search == 'Mar' || search == '03'){
                searchKey = '03';
                key = 'March';
            }else if(search == 'April' || search == 'april' || search == 'apr' || search == 'Apr' || search == '04'){
                searchKey = '04';
                key = 'April';
            }else if(search == 'May' || search == 'may' || search == '05'){
                searchKey = '05';
                key = 'May';
            }else if(search == 'June' || search == 'june' || search == 'jun' || search == 'Jun' || search == '06'){
                searchKey = '06';
                key = 'June';
            }else if(search == 'July' || search == 'july' || search == 'jul' || search == 'Jul' || search == '07'){
                searchKey = '07';
                key = 'July';
            }else if(search == 'August' || search == 'august' || search == 'aug' || search == 'Aug' || search == '08'){
                searchKey = '08';
                key = 'August';
            }else if(search == 'September' || search == 'september' || search == 'sep' || search == 'Sep' || search == '09'){
                searchKey = '09';
                key = 'September';
            }else if(search == 'October' || search == 'october' || search == 'oct' || search == 'Oct' || search == '10'){
                searchKey = '10';
                key = 'October';
            }else if(search == 'November' || search == 'november' || search == 'nov' || search == 'Nov' || search == '11'){
                searchKey = '11';
                key = 'November';
            }else if(search == 'December' || search == 'december' || search == 'dec' || search == 'Dec' || search == '12'){
                searchKey = '12';
                key = 'December';
            }
            $("#show").attr("onclick","sendSMSAll('"+searchKey+"')");
            $('#monthShow').html(key);
        });
    });
    function sendSMSAll(month) {
        like = "'%"+month+"%'";
        // query = 'SELECT * FROM `member` WHERE `dOfJoining` LIKE '+like+' AND `firstTimerMemberFlag` = "1" AND status = "active" ORDER BY dOfJoining DESC';
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
            "<form action='<?= site_url() ?>/admin/sendSMSAll' method='post'>"+
                "<div class='row'>"+
                "</div>"+
                "<div class='row'>"+
                    "<div class='form-group'>"+
                        "<label class='col-md-4'>Compose Message</label>"+
                        "<input type='hidden' name='month' class='form-control col-md-6' id='month' value='"+month+"'>"+
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
    function sendSMS(id) {
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Send customised SMS" + 
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url() ?>/admin/sendSMS/member' method='post'>"+
                "<div class='row'>"+
                    "<div class='form-group'>"+
                        "<label class='col-md-4'>Compose Message</label>"+
                        "<input type='hidden' name='member[]' class='form-control col-md-6' value='"+id+"'>"+
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
    function viewMessage(link, date){
        // alert(date);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Follow up or Reminder Message" +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<div class='row'>"+
                "<div class='col-md-6'>"+
                    "<label>Date of Message : </label>"+
                "</div>"+
                "<div class='col-md-6'>"+
                    "<label><strong>"+date+"</strong></label>"+
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
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function moveEvent(link){
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are you sure you want to move this first timer? " +
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
    
    $('#sendSMSAll').on('click', function() {
        var month = $(this).val();
        $.post("<?= site_url('admin/sendSMSAll') ?>",{month:month},function(e){
            console.log(e);
            alert('SMS Send');
        });
    });
</script>
</section>