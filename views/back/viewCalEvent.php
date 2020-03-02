<?php
$v = $reminderEvent[0];
?>
<style>
    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
    }
    .rating > span {
        display: inline-block;
        position: relative;
    }
    .filled:before{
        content: "\2605";
        position: absolute;
    }
    .unfilled:before{
        /*content: "\2606";*/
        position: absolute;
    }
    .bio-row>p>span{
        font-weight: bold !important;
    }
    .accordion-toggle{
        font-size:16px !important;
        font-weight:bold !important;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= site_url(); ?>/admin/fetchCalendar">Event List</a></li>
                    <li><a href="#">Event View</a></li>
                </ul>
                <ul>
                    <li style="text-align:right;"><a href="<?= site_url('admin/editCalEvent') ?>/<?= $v['event_id'] ?>" class="btn btn-success"><i class="fa fa-pencil"></i>Edit Event</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <aside class="profile-nav col-lg-12">
                <section class="panel">
                    <div class="user-heading">
                        <a href="#">
                            <?php $image = (empty($v['image'])) ? base_url('assets_f/img/business/male.jpg') : base_url('assets_f/img/business')."/".$v['image']; ?>
                            <!--<img src="<?= $image ?>" alt="">-->
                            <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>"
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                        </a>
                        <h1 style="font-weight: 900"><?= ucfirst($v['desc']) ?></h1>
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-12">
                <section class="panel">
                    <div class="panel-body bio-graph-info">
                        <div class="row">
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <th>Title : </th>
                                        <td><?= $v['desc'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Start Date :</th>
                                        <td><?= $v['date'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>End Date :</th>
                                        <td><?= $v['endDate'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Reminder Time : </th>
                                        <td><?= $v['reminder_event'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <th>Event Link : </th>
                                        <td><?= $v['link'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Event Description :</th>
                                        <td><?= $v['eventDesc'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Remind Members :</th>
                                        <td><?php if($v['isReminded'] == 1){echo 'Yes';}else{echo 'No';} ?></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="panel-group m-bot20" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                Reminder Complete Description
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class=" in">
                                        <div class="panel-body">
                                            <?php foreach($reminderDesc as $desc){ ?>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-4">
                                                    <label>Preacher Name : </label>
                                                    <label><?= $desc['preacherBy'] ?></label>
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <label>Start Time : </label>
                                                    <label><?= $desc['startTime'] ?></label>
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <label>End Time : </label>
                                                    <label><?= $desc['endTime'] ?></label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </section>
</section>
