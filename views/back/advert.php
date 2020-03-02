<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href=""> Advert </a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Manage Advert <span style="float : right;">
                        <a href="<?= site_url('admin/view/add_advert') ?>" title="Create Advert"><i class="md-icon material-icons" style="color: red;">add_box</i></a>
        </span></header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <td style="display: none;">Date Posted</td>
                                    <td>Date Posted</td>
                                    <td>Member</td>
                                    <td>Horizontal</td>
                                    <td>Vertical</td>
                                    <td>No. Of Week</td>
                                    <td>Status</td>
                                    <td>Starting Date</td>
                                    <td>Ending Date</td>
                                    <td>Approval</td>
                                    <td width="15%">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($advert as $val){?>
                                    <tr>
                                        <td style="display: none;"><?= date('Y-m-d', strtotime($val['date'])); ?></td>
                                        <td><?= date('d-m-Y', strtotime($val['date'])); ?></td>
                                        <td><?php if($val['member'] != ''){ ?><a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['user_id'] ?>"><?= $val['member']; ?></a><?php }else{ echo 'Admin'; } ?></td>
                                        <td><a target="_blank" href="<?= base_url("assets_f")."/img/business/".$val['horizontal'] ?>">View</a></td>
                                        <td><a target="_blank" href="<?= base_url("assets_f")."/img/business/".$val['vertical'] ?>">View</a></td>
                                        <td><?= $val['week']." Weeks" ?></td>
                                        <td><?= $val['status'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($val['starting'])) ?></td>
                                        <td><?php $totalDates = $val['week'] * 7; ?><?= date('d-m-Y', strtotime($val['starting']. ' + '.$totalDates.' days')); ?></td>
                                        <td style="color: #1e88e5;"><?php if($val['approval'] == 0){echo 'Not Approved';}else if($val['approval'] == 1){echo 'Approved'; }else if($val['approval'] == 2){echo 'Concluded';} ?></td>
                                        <td><?php if($val['user_id'] == 0 || $val['user_id'] != 0){ ?><a href="<?= site_url('admin/edit/'.$val['id']."/advert/edit_advert") ?>"><i class="fa fa-pencil" title="Edit Advert"></i></a> | <?php } ?><a onclick="deleteConff('<?= site_url('admin/advertDelete/'.$val['id']."/same") ?>')"><i class="fa fa-trash" title="Delete Advert"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="row"></div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="conf"></div>
</section>
<div id="advevver"></div>
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
        $("#advevver").html(a);
        $("#deleteConf").modal('toggle');
    }
    function requestAdv(strr){
        var a = '<div class="uk-modal" id="newModalAdv"> ' +
            '<div class="uk-modal-dialog"> ' +
            '<a href="" class="uk-modal-close uk-close"></a> ' +
            '<h1>Request Advert</h1>'+
        '<?= form_open_multipart('admin/insert/advert/advert',array('class'=>"form-signin", 'onsubmit'=>"return validateForm()")); ?>'+
        '<div class="uk-width-medium-1-1"> ' +
            '<div class="md-card"> ' +
            '<div class="md-card-content"> ' +
            '<h3 class="heading_a uk-margin-bottom">Horizontal Banner</h3> ' +
            '<div class="uk-form-file md-btn md-btn-primary">' +
            'Select' +
            '<input id="horizontal" onchange="horizontalPreview(this)" name="advert[]" required="required" accept="image/png, image/jpeg" type="file">' +
            '</div> ' +
            '<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="blah1" alt="" style="display: none;width: 1024px; height: 400px;"/><br/>'+
            'File size should be (1024x400) <br> <span id="forHorizontalImangeName"></span>' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '<div class="uk-width-medium-1-1"> ' +
            '<div class="md-card"> ' +
            '<div class="md-card-content"> ' +
            '<h3 class="heading_a uk-margin-bottom">Vertical Banner</h3> ' +
            '<div class="uk-form-file md-btn md-btn-primary"> ' +
            'Select ' +
            '<input id="vertical" onchange="verticalPreview(this)" accept="image/png, image/jpeg" required="required" name="advert[]"  type="file"> ' +
            '</div> ' +
            '<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="blah2" alt="" style="display: none;width: 120px; height: 400px;"/><br/>'+
            'File size should be (120x450) <br><span id="forVerticalImangeName"></span> ' +
            '</div>  ' +
            '</div> Note: Using the correct image sizes is essential to make your advert appear correctly on all responsive platforms and make sure you upload jpeg format files' +
            '</div> ' +
            '<p>Weeks</p> ' +
            '<select name="week" id="perWeekForAdv" onchange="getQuoteForAdvert()" class="md-input">'+
            '<?php for($i=1;$i<=52;$i++){ ?>'+
            '<option value="<?= $i ?>"><?= $i ?> Weeks</option>'+
            '<?php } ?>'+
            '</select> ' +
            '<br/> ' +
            '<p>Advert Cost : £ 1:00 /- per week</p> ' +
            '<p>Total Cost: £ <span id="advertquote">1:00</span>/-</p> ' +
            '<button type="submit" class="md-btn md-btn-info">Send Request</button>'+
        '<?= form_close(); ?>'+
        '</div>'+
        '</div>';
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
    
    function statusChange(link, status){
        // alert(status);
        if(status == 1){
            // alert('If'+status);
            message = "Do you want to approve this ad to show to Members?";
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            message +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>No</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }else{
            // alert('else'+status);
            message = "Do you want to disapprove this ad to hide from Members?";
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            message +
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>No</button> " +
            "<a href='"+link+"'><span class='btn btn-danger'>Yes</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    function horizontalPreview(input){
        $('#blah1').css('display', 'block');
        readURL(input);
    }
    // $("#horizontal").on('click', function(){
    //         alert('1');
    //     });
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah1').attr('src', e.target.result);
                    img = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    function verticalPreview(input){
        $('#blah2').css('display', 'block');
        readURL1(input);
    }
    function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah2').attr('src', e.target.result);
                    img = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script>
    function getQuoteForAdvert(){
        var week = $("#perWeekForAdv").val();
        // alert(week);
        $.post("<?= site_url('home/ajax/advertCharges') ?>",{week:week},function(e){
            //console.log(e);
            $("#advertquote").html(e);
        })
    }

</script>
