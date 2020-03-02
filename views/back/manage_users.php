<?php
    if ($this->agent->is_browser())
{
        $agent = $this->agent->browser().' '.$this->agent->version();
}
elseif ($this->agent->is_robot())
{
        $agent = $this->agent->robot();
}
elseif ($this->agent->is_mobile())
{
        $agent = $this->agent->mobile();
}
else
{
        $agent = 'Unidentified User Agent';
}
?>
<style>
    .chosen-choices{
        padding: 10px !important;
        border-radius: 5px;
    }
    .chosen-container{
        width: 100% !important;
    }
    .checkwidth{
        margin-left: 15%;
    }
    @media only screen and (min-width: 300px) and (max-width: 600px) {
        .checkwidth{
            margin-left: -10%;
        }
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= site_url(); ?>/admin/view/manage_users">Registered Members</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Members <span style="float : right;">
                        <a onclick="uploadMember()" title="Bulk Members Upload"><i class="md-icon material-icons">cloud_upload</i></a>
                        <a href="<?= site_url('admin/view/create_users'); ?>" title="Create Member"><i class="md-icon material-icons">add_box</i></a>
                        <a onclick="fullDownload('<?php echo base_url(); ?>admin/save_pdf')" title="Download All Members Data"><i class="md-icon material-icons">get_app</i></a><!--  -->
                        <a onclick="fullExcelDownload('<?= site_url('admin/exportExcel') ?>')" title="Download All Members Data In Excel"><i class="md-icon fa fa-file-excel-o"></i></a><!-- <i class="md-icon material-icons">attach_file</i> -->
                        <a onclick="basicDownload('<?= site_url('admin/save_pdf_light') ?>')" title="Basic Download"><i class="md-icon fa fa-file-pdf-o"></i></a><!-- <i class="md-icon material-icons">cloud_download</i> -->
        </span></header>
                    
                    <div class="panel-body">
                        <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>
                        <form class="form-inline" role="form" action="<?= site_url('admin/search_member') ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="Search by member name" style="font-size: 12px!important; width:200px!important;"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="submit">Search</button>
                            </div>
                        </form>
                        <br/>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <input type="date" class="form-control col-md-4" id="fromDate" name="fromDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control col-md-4" id="toDate" name="toDate"/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-4">
                                                <button type="button" id="search" class="btn btn-success">Search</button>
                                            </div>
                                            <div class="col-md-8" id="pdfDiv" style="display: none;">
                                                <a href="" id="pdfUrl2"><i class="fa fa-file-excel-o md-icon"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ajaxResponse">
                                    <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td>Member Created Date</td>
                                        <td>Member Name</td>
                                        <td>Total Login</td>
                                        <td>Profile Picture</td>
                                        <td style="display:none;">Age</td>
                                        <td style="display:none;">Marital Status</td>
                                        <td style="display:none;">Job Status</td>
                                        <td style="display:none;">Native Country</td>
                                        <td style="display:none;">Hobbies</td>
                                        <td style="display:none;">Postal Code</td>
                                        <td>Profession</td>
                                        <td>Mempacas Group</td>
                                        <td>Date Joined</td>
                                        <td>Country Of Origin</td>
                                        <td>Total Donations</td>
                                        <td>Status</td>
                                        <td>Details</td>
                                    </tr>
                                    </thead>
                                    <tbody id="ajaxReplace">
                                    <?php $i=1; foreach($members as $val){ ?>
                                        <tr <?php if($val['firstTimerMemberFlag']){ ?> style="background-color: #42f4bf;" <?php } ?>>
                                            <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                            <td><?= ucfirst(strtolower($val['fname']))." ".ucfirst(strtolower($val['lname'])) ?></td>
                                            <td><?= $val['count'] ?></td>
                                            <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
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
                                            <!--<td><?= ucfirst($val['gander']); ?></td>-->
                                            <td style="display : none;"><?= $val['age_group'] ?></td>
                                            <td style="display : none;"><?= $val['maritalStatus'] ?></td>
                                            <td style="display : none;"><?= $val['employement'] ?></td>
                                            <td style="display : none;"><?= $val['nativeCountry'] ?></td>
                                            <td style="display : none;"><?= $val['hobbies']; ?></td>
                                            <td style="display : none;"><?= $val['poatalCode'] ?></td>
                                            <td><?= ucfirst($val['businessGroup']) ?></td>
                                            <td><?php if($val['mempacasGroup'] != null){echo $this->data->fetch('mempacasGroup', array('id' => $val['mempacasGroup']))[0]['groupName']; }else{ ?> <a href="#" data-toggle="modal" data-target="#assignGroup<?= $val['id'] ?>" >Assign A Group</a> <?php } ?></td>
                                            <td><?php
                                            if($val['member_since_month'] == 1){
                                                echo 'Jan'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 2){
                                                echo 'Feb'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 3){
                                                echo 'Mar'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 4){
                                                echo 'Apr'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 5){
                                                echo 'May'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 6){
                                                echo 'Jun'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 7){
                                                echo 'Jul'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 8){
                                                echo 'Aug'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 9){
                                                echo 'Sept'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 10){
                                                echo 'Oct'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 11){
                                                echo 'Nov'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 12){
                                                echo 'Dec'." ".$val['member_since_year'];
                                            }
                                            ?></td>
                                            <td><?= $val['nativeCountry'] ?></td>
                                            <td><?= $val['total'] ?></td>
                                            <?php $status = ($val['status'] == 'active') ? "suspend" : "active"; ?>
                                            <td><a onclick="statusChange('<?= site_url("admin/statusMember/".$val['id']."/".$status) ?>')"><?= ucfirst($val['status']) ?></a></td>
                                            <td><a data-toggle="modal" href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>">View</a>
                                                <?php if($userAdmin[0]['id'] == 3){ ?> | 
                                                <a onclick="deleteConff('<?= site_url('admin/memberDelete/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a><?php } ?>
                                                <?php if($val['firstTimerMemberFlag']){ ?>
                                                | <a onclick="makeMember('<?= site_url('admin/makeMember1/'.$val['id']) ?>')">Make Member</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                    <tr>
                                        <td colspan="17" align="right"><?= $this->pagination->create_links(); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                        </div>
                        </div>
                        <div class="row"></div>
                        <h5 style="font-weight: bold" id="totalMember">Total Members: <?= $this->Fetchdata->record_count() ?></h5>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="conf"></div>
    <div id="abc"></div>
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
    <?php
        foreach($members as $val){
        ?>
        <div class="modal fade in" id="assignGroup<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Assign Group
                    </h4>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('admin/addMempacasGroup/'.$val['id']); ?>" class="form-signin" id="actionForm" method="post">
                    <!--<input type="checkbox" checked class="chosen-toggle select form-control mem col-md-3" id="selectAll" style="margin-bottom: -20px;">-->
                    <label for="" style="margin-left: 40px;">All Groups</label>
                    <?php $group = $this->data->fetch('mempacasGroup'); ?>
                    <select name="group" required class="form-control chosen-select" id="group">
                        <?php foreach($group as $val){ ?>
                            <option value="<?= $val['id'] ?>"><?= $val['groupName'] ?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <br/>
                    <input type="hidden" id="requestId" name="requestId" value="<?= $val['id'] ?>"/>
                    <button type="submit" id="modalSubmit" class="btn btn-danger">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
        <?php
        }
    ?>
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
    $("img").lazyload({
	    effect : "fadeIn"
	});
    function basicDownload(link){
        //alert(link);
        // var redirect = $('#deleteConf').modal('toggle');
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Do you want to download only the Names and Phone Numbers of Members in PDF Format?" +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>No</button> " +
            "<a href='"+link+"' onclick='abcd();'><span class='btn btn-danger'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function fullDownload(link){
        //alert(link);
        // var redirect = $('#deleteConf').modal('toggle');
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are you sure you want to Download the Full data of all Members?" +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>No</button> " +
            "<a href='"+link+"' onclick='abcd();'><span class='btn btn-danger'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function fullExcelDownload(link){
        //alert(link);
        // var redirect = $('#deleteConf').modal('toggle');
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are you sure you want to Download the data of all Members in Excel?" +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>No</button> " +
            "<a href='"+link+"' onclick='abcd();'><span class='btn btn-danger'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function abcd(){
        $('#deleteConf').modal('hide');
    }
    function makeMember(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are You Sure you know this member is not first timer? " +
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
    
    function statusChange(link){
        //alert(link);
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Are You Sure you want to Suspend member? " +
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
    
    function uploadMember(){
        var a = "<div class='modal fade' id='uploadMember' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> "+
                "<div class='modal-dialog modal-md' role='document'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                "<span aria-hidden='true'>x</span>"+
                "</button>"+
                "<h4 style='text-align: center; font-weight: bold;' class='modal-title' id='mySmallModalLabel'>"+
                "Members Bulk Upload"+
                "</h4>"+
                "</div>"+
                "<div class='modal-body'>"+
                "<form action='<?= site_url('admin/uploadMemberDemo')?>' method='post' enctype='multipart/form-data'>"+
                "<input type='file' name='excelBulk' class='form-control'>"+
                "<br/>"+
                "<a href='<?= base_url() ?>assets_f/Sample File.xls'>Sample File</a>"+
                "</br>"+
                "<br/>"+
                "<button type='submit' class='btn btn-success' value='Upload'>Members Bulk Upload</button>"+
                "</form>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "</div>";
            $(".conf").html(a);
            $("#uploadMember").modal('toggle');
    }
    
    $('#abcd').click(function(){
        alert('hi'); 
    });
    
    //New Code Added For search
    $('#search').click(function(){
        var toDate = $('#toDate').val();
        var fromDate = $('#fromDate').val();
        var d1 = new Date();
        var joiningDate = "";
        if(toDate >= fromDate){
            $.ajax({
                url: "<?= site_url('admin/searchByDate') ?>/member",
                type: "POST",
                data: {toDate:toDate,fromDate:fromDate},
                success: function(e){
                    console.log(e);
                    $('#ajaxResponse').html(e);
                    newPdfUrl = "<?= site_url('admin/save_excel') ?>"+"/"+fromDate+"/"+toDate;
                    $('#pdfDiv').css('display', 'block');
                    $('#pdfUrl2').attr('href', newPdfUrl);
                    $('#myTableUser').DataTable({aaSorting: [[0, "desc"]]}).Draw();
                }
            });
        }else{
            alert('To Date must be greater or equal to from date.');
        }
    });
</script>    