<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url('admin'); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Calendar Events</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Calendar <span style="float : right;">
                    <a href="<?= site_url() ?>/admin/view/addCalendar"><i class="md-icon material-icons">event</i></a>
            <!--<i class="md-icon material-icons" id="invoice_print" onclick="window.print();">&#xE8ad;</i>-->
            <a href="<?php echo base_url(); ?>admin/save_calendar"><i class="md-icon material-icons">get_app</i></a>
        </span></header>
                    
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableUser" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Posted Date</td>
                                <td style="width:100px; word-wrap:break-word;">Title</td>
                                <td style="width: 20%;">Start Date</td>
                                <td style="width: 20%;">End Date</td>
                                <td>Username</td>
                                <td style="width:100px; word-wrap:break-word;">Event Link</td>
                                <td>Event Image</td>
                                <td style="width:100px; word-wrap:break-word;">Event Description</td>
                                <td>Remind Members</td>
                                <td>Reminder Time</td>
                                <td>Attendees</td>
                                <td style="width: 20%;">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($calendar as $val){ ?>
                                <tr style="<?php if($val['date'] == date('Y-m-d')){?>color:green;<?php }elseif(date('Y-m-d', strtotime($val['date'])) < date('Y-m-d')){ ?>color:red;<?php }else{ ?>color:black;<?php } ?>">
                                    <td><?= date('Y-m-d H:i:s', strtotime($val['createdAt'])); ?></td>
                                    <td style="width:100px; word-wrap: break-word;display: inline-block;"><?= ucfirst($val['desc']) ?></td>
                                    <td style="width: 20%;"><?= date('d-m-Y', strtotime($val['date'])) ?></td>
                                    <td style="width: 20%;"><?= date('d-m-Y', strtotime($val['endDate'])) ?></td>
                                    <td><?php if($val['adminId'] == 1){echo 'Admin'; }else{echo ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['fname'])." ".ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['lname']); }?></td>
                                    <td style="width:100px; word-wrap: break-word;display: inline-block;"><a href="<?= $val['link'] ?>" target="_blank"><?= $val['link'] ?></a></td>
                                    <?php $image = ($val['image'] != "") ? base_url('assets_f/img')."/".$val['image'] : base_url('assets_f/img/business')."/noImage.png"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image'])){ $image = base_url('assets_f/male.jpg'); } ?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            $ori = $exif['Orientation'];
                                        ?>
                                        <a onclick="openBig1('<?= $image; ?>', '<?= $ori ?>')">
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(90deg)" alt=""/> 
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-90deg)" alt=""/> 
                                        <?php  
                                            }else{
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" alt=""/> 
                                        <?php
                                            }
                                        ?></a>
                                    </td>
                                    <td style="width:200px; word-wrap: break-word;display: inline-block;"><?= substr($val['eventDesc'], 0, 100)?><br/><a href="<?= site_url(); ?>/admin/viewCalEvent/<?= $val['event_id'] ?>">Read More...</a></td>
                                    <td><?php if($val['isReminded'] == 1){echo 'Yes';}else{echo 'No';}?></td>
                                    <td><?php if($val['reminder_event'] == 60){echo "1 Hour Before";}elseif($val['reminder_event'] == 120){echo "2 Hours Before";}elseif($val['reminder_event'] == 500){echo "5 Hours Before";}elseif($val['reminder_event'] == 1440){echo "1 Day Before";}elseif($val['reminder_event'] == 2880){echo "2 Days Before";}elseif($val['reminder_event'] == 10080){echo "1 Week Before"; }else{ echo $val['reminder_event'].' Mins Before'; }; ?></td>
                                    <td><a href="<?= site_url(); ?>/admin/view/eventAttendee/<?php echo $val['event_id'] ?>/same">View</a></td>
                                    <td style="display: none;"></td>
                                    <td style="width: 20%;"><a href="<?= site_url(); ?>/admin/viewCalEvent/<?= $val['event_id'] ?>"><i class="fa fa-eye"></i></a> | <a href="<?= site_url(); ?>/admin/editCalEvent/<?= $val['event_id'] ?>"><i class="fa fa-pencil"></i></a> | <a style="cursor: pointer" onclick="deleteC('<?= site_url('home/deleteEventNewAdmin') . "/" . urlencode($val['event_id'])."/same" ?>')"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="row"></div>
                        <h5 style="font-weight: bold">Total Events: <?= count($calendar) ?></h5>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="conf"></div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="modal_clndr_new_event">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create new event</h4>
            </div>
            <form action="<?= base_url('admin') ?>/addFullCalendar" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-5">
                            <input id="member" name="membCheck" type="checkbox" checked/>
                            <label for="">Members</label>
                        </div>
                        <div class="col-xs-7 member">
                            <?php $members = $this->data->fetch('member', array('status' => 'active')); ?>
                            <select name="member[]" multiple="multiple" id="memb">
                                    <?php foreach($members as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                                    <?php } ?>
                            </select>
                            <br/>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-5">
                                    <input id="bGroup" name="bGroupCheck" type="checkbox"/>
                                    <label for="">Business Group</label>
                                </div>
                                <div class="col-md-7 bgroup" style="display:none;">
                                    <select name="bGroup" id="bgroup1" style="width: 100%;">
                                        <option value="">Select</option>
                                        <?php foreach($businessGroup as $val){ ?>
                                            <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="row"></div>
                        <div class="row">
                                <div class="col-md-5">
                                    <input id="church" name="churchCheck" type="checkbox"/>
                                    <label for="">Church Group</label>
                                </div>
                                <div class="col-md-7 church" style="display: none;">
                                    <select name="church" id="church1" style="width: 100%;">
                                        <option value="">Select</option>
                                        <?php foreach($churchgroup as $val){ ?>
                                            <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="title">Event title</label>
                            <input type="text" name="title" id="title" class="form-control" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="link">Event Link(Optional)</label>
                            <input type="text" name="link" id="link" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="image">Event Image(Optional)</label>
                            <input type="file" name="image" id="image"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="desc">Event Description</label>
                            <textarea name="desc" id="desc" placeholder="Enter event description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="title">Event Date</label>
                            <input type="datetime-local" name="eventDate" id="eventDate" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="starts-at">Starts at</label>
                            <input type="time" name="starts_at" id="starts-at" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="ends-at">Ends at</label>
                            <input type="time" name="ends_at" id="ends-at" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="reminder_event">Set Reminder</label>
                        <select id="reminder_event" name="reminder_event" class="form-control">
                            <option value="">Select</option>
                            <option value="15">15 Mins Before</option>
                            <option value="30">30 Mins Before</option>
                            <option value="45">45 Mins Before</option>
                            <option value="60">1 Hour Before</option>
                            <option value="120">2 Hours Before</option>
                            <option value="300">5 Hours Before</option>
                            <option value="1440">1 Day Before</option>
                            <option value="2880">2 Days Before</option>
                            <option value="10080">1 Week Before</option>
                        </select>
                    </div>
                </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
    function deleteC(srcc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Do you want to delete?</h1>' +
            '</div>' +
            '<div class="uk-modal-footer">' +
            '<button class="md-btn md-btn-primary uk-modal-close">No</button>' +
            '<a href="'+srcc+'" class="md-btn md-btn-danger">Yes</a>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(".conf").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }
    
    function openEditModal(srcc){
        $("#modal_clndr_new_event").modal("show");
    }
    
    function openBig1(srcc, ori){
            if(ori == 6){
                var a = '<div id="openBig" class="uk-modal"> ' +
                '<div class="uk-modal-dialog" style="width: 450px;">' +
                '<a href="" onclick="modalClose()" class="uk-modal-close uk-close"></a>' +
                '<div class="uk-modal-footer">' +
                '<img src="'+srcc+'" style="width: 400px; height: 400px; transform: rotate(90deg);"/>' +
                '</div>' +
                '</div>' +
                '</div>';
            }else if(ori == 8){
                var a = '<div id="openBig" class="uk-modal"> ' +
                '<div class="uk-modal-dialog" style="width: 450px;">' +
                '<a href="" onclick="modalClose()" class="uk-modal-close uk-close"></a>' +
                '<div class="uk-modal-footer">' +
                '<img src="'+srcc+'" style="width: 400px; height: 400px; transform: rotate(-90deg);"/>' +
                '</div>' +
                '</div>' +
                '</div>';
            }else{
                var a = '<div id="openBig" class="uk-modal"> ' +
                '<div class="uk-modal-dialog" style="width: 450px;">' +
                '<a href="" onclick="modalClose()" class="uk-modal-close uk-close"></a>' +
                '<div class="uk-modal-footer">' +
                '<img src="'+srcc+'" style="width: 400px; height: 400px;"/>' +
                '</div>' +
                '</div>' +
                '</div>';
            }
        $(".conf").html(a);
        var modal = UIkit.modal("#openBig").show();
    }
</script>    