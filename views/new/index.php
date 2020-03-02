<?php
$v = $userAdmin[0];
?>
<style>
    .uk-tooltip-small{
        width: 4000px !important;
    }
    input[type="date"]:before {
            content: attr(placeholder) !important;
            color: #aaa;
            margin-right: 0.5em;
          }
          input[type="date"]:focus:before,
          input[type="date"]:valid:before {
            content: "";
          }
</style>
    <div id="page_content">
        <div id="page_content_inner">
            <?php require_once('advert_h.php'); ?>
            <!-- circular charts -->
            <div class="uk-grid uk-grid-small" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
                <div class="uk-width-medium-1-1">
                    <?php
                    $todayMonth = date("n");
                    $todayDate = date("j");
                    if($todayDate == $v['birth_date'] && $todayMonth == $v["birth_month"]){ ?>
                        <?php if(!empty($userAdmin)){ ?>
                            <?php if($userAdmin[0]['id'] != $v['id']){
                                $name = $v['fname']." ".$v['lname'];
                                $msg = $name . " have their Happy Birthday Today!";
                            }else{
                                $msg = "Happy Birthday and we Wish you Long Life and Prosperity!";
                            }
                            ?>
                        <?php }else{ $name = $v['fname']." ".$v['lname'];$msg = "Its ".$name . "'s Happy Birthday Today!"; } ?>
                        <p style="text-align:center;font-weight: bold;font-size:18px; ">
                            <img style="width:50px" src="<?= base_url('birthday.png') ?>" alt="">
                            <?= $msg ?>
                            <?php if(empty($birthnotifdesktop)){ ?>
                                <span id="updateAgeGroupButton" style="font-size:14px;"><a href="<?= site_url('home/view/edit_profile?action=age') ?>">Click to update your age group</a></span>
                            <?php } ?>
                        </p>
                        <br>
                    <?php } ?>
                </div>
                <div class="uk-width-medium-4-10" >
                    <div>
                        <div data-step="6" data-intro="Profile Card" class="md-card">
                            <div style="background: 3 !important;" class="md-card-head md-bg-light-blue-600">
                                <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
                                    <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="<?= site_url('home/member') ?>/<?= $userAdmin[0]['id'] ?>">User profile</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="uk-text-center">
                                    <?php $image = $this->data->fetch('member', array('id' => $userAdmin[0]['id'])); ?>
                                    <?php $image = (empty($image[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$image[0]['image']; ?>
                                    <a href="<?= $image ?>" data-uk-lightbox="{group:'user-photos1'}">
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                                            <img class="md-card-head-avatar detect" src="<?= $image ?>" alt=""/>
                                            <?php
                                            }else if($exif['Orientation'] == 8){
                                                // $class = "md-card-head-avatar";
                                            ?>
                                            <img class="md-card-head-avatar detect8" src="<?= $image ?>" alt=""/>
                                            <?php
                                            }else{
                                            ?>
                                            <img class="md-card-head-avatar" src="<?= $image ?>" alt=""/>
                                            <?php
                                            }
                                        ?>
                                        
                                    </a>
                                </div>
                                <h3 class="md-card-head-text uk-text-center md-color-white">
                                    <?= $userAdmin[0]['fname']." ".$userAdmin[0]['lname'] ?>
                                    <span><?php echo wordwrap($userAdmin[0]['email'],5,"<br>\n"); ?></span>
                                    <span>Member Since : <?php 
                                    if($userAdmin[0]['member_since_month'] == 1){
                                        echo "Jan"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 2){
                                        echo "Feb"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 3){
                                        echo "Mar"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 4){
                                        echo "Apr"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 5){
                                        echo "May"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 6){
                                        echo "Jun"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 7){
                                        echo "Jul"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 8){
                                        echo "Aug"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 9){
                                        echo "Sept"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 10){
                                        echo "Oct"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 11){
                                        echo "Nov"." ".$userAdmin[0]['member_since_year'];
                                    }elseif($userAdmin[0]['member_since_month'] == 12){
                                        echo "Dec"." ".$userAdmin[0]['member_since_year'];
                                    } ?></span>
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading"><?= $userAdmin[0]['email'] ?></span>
                                            <span class="uk-text-small uk-text-muted">Email</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading"><?= $userAdmin[0]['homeNo'] ?></span>
                                            <span class="uk-text-small uk-text-muted">Phone</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon  material-icons">&#xE8A5;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading"><?= $userAdmin[0]['mobileNo'] ?></span>
                                            <span class="uk-text-small uk-text-muted">Mobile</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-6-10" >
                    <div class="md-card">
                        <div id="calendar"></div>
                        <div id="clndr_events"  data-step="7" data-intro="Calendar" class="clndr-wrapper">
                            <script>
                                // calendar events
                                clndrEvents = [
                                    <?php $i=1; foreach($reminders as $k=>$v){ ?>
                                    {
                                        id: "<?= $v['id']?>",
                                        date:"<?= $v['date'] ?>",
                                        endDate: "<?= $v['endDate'] ?>",
                                        diff: "<?= date_diff($v['endDate'], $v['date']) ?>",
                                        title:"<?= $v['title'] ?>",
                                        adminId: "<?= $v['adminId'] ?>",
                                        image:"<?= $v['image'] ?>",
                                        url:"<?= $v['event_id'] ?>",
                                        timeStart:"<?= $v['timeStart'] ?>",
                                        timeEnd:"<?= $v['timeEnd'] ?>"
                                    }
                                    <?php if($i != count($reminders)){ echo ","; } ?>
                                    <?php $i++; } ?>
                                ]
                            </script>
                            <script id="clndr_events_template" type="text/x-handlebars-template">
                                <div class="md-card-toolbar">
                                    <div class="md-card-toolbar-actions">
                                        <i data-step="8" data-intro="Create Event" class="md-icon clndr_add_event material-icons">&#xE145;</i>
                                        <i data-step="9" data-intro="GoTo Today Date" class="md-icon clndr_today material-icons">&#xE8DF;</i>
                                        <i data-step="10" data-intro="Previous Month" class="md-icon clndr_previous material-icons">&#xE408;</i>
                                        <i data-step="11" data-intro="Next Month" class="md-icon clndr_next material-icons uk-margin-remove">&#xE409;</i>
                                    </div>
                                    <h3 class="md-card-toolbar-heading-text">
                                        {{ month }} {{ year }}
                                    </h3>
                                </div>
                                <div class="clndr_days">
                                    <div class="clndr_days_names">
                                        {{#each daysOfTheWeek}}
                                        <div class="day-header">{{ this }}</div>
                                        {{/each}}
                                    </div>
                                    <div class="clndr_days_grid">
                                        {{#each days}}
                                        <div class="{{ this.classes }}" {{#if this.id }} id="{{ this.id }}" {{/if}}>
                                        <span>{{ this.day }}</span>
                                    </div>
                                    {{/each}}
                                </div>
                                </div>
                                <div class="clndr_events">
                                    <i class="material-icons clndr_events_close_button">&#xE5CD;</i>
                                    {{#each eventsThisMonth}}
                                    <div class="clndr_event" data-clndr-event="{{ dateFormat this.date format='YYYY-MM-DD' }}">
                                        <a href="<?php echo site_url('home/calendar'); ?>">
                                            <span class="clndr_event_title">{{ this.title }}</span>
                                            <span class="clndr_event_more_info">
                                                {{~dateFormat this.date format='DD-MMM-YY'}} - {{~dateFormat this.endDate format='DD-MMM-YY'}}
                                                {{~#ifCond this.timeStart '||' this.timeEnd}} ({{/ifCond}}
                                                {{~#if this.timeStart }} {{~this.timeStart~}} {{/if}}
                                                {{~#ifCond this.timeStart '&&' this.timeEnd}} - {{/ifCond}}
                                                {{~#if this.timeEnd }} {{~this.timeEnd~}} {{/if}}
                                                {{~#ifCond this.timeStart '||' this.timeEnd}}){{/ifCond~}}
                                            </span>
                                        </a>
                                    </div>
                                    {{/each}}
                                </div>
                            </script>
                        </div>
                        <div class="uk-modal" id="modal_clndr_new_event">
                            <div class="uk-modal-dialog">
                                <div class="uk-modal-header">
                                    <h3 class="uk-modal-title">New Event</h3>
                                </div>
                                <form action="<?= site_url('home/insert/reminders'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="uk-margin-bottom">
                                        <label for="clndr_event_title_control">Event Title</label>
                                        <input type="text" class="md-input" maxlength="160" name="clndr_event_title_control" required id="clndr_event_title_control" />
                                        <span id="count1">0</span> / 160
                                    </div>
                                    <div class="uk-margin-medium-bottom">
                                        <label for="clndr_event_link_control">Event Link (Optional)</label>
                                        <input type="text" class="md-input" maxlength="160" name="clndr_event_link_control" id="clndr_event_link_control" />
                                        <span id="count2">0</span> / 160
                                    </div>
                                    <div class="uk-margin-medium-bottom">
                                        <label for="clndr_event_image_control" style="top : -23px;">Event Image (Optional)</label>
                                        <input type="file" class="md-input" name="clndr_event_image_control" id="clndr_event_image_control" />
                                    </div>
                                    <div class="uk-margin-medium-bottom">
                                        <label for="clndr_event_desc_control">Event Description</label>
                                        <textarea id="clndr_event_desc_control" name="clndr_event_desc_control" class="md-input" maxlength="500"></textarea>
                                        <span id="count">0</span> / 500
                                    </div>
                                    <div id="oneDayEvent">
                                        <div class="uk-grid uk-grid-width-medium-1-2 uk-margin-large-bottom" data-uk-grid-margin>
                                            <div>
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <!--<label for="clndr_start_date_control">Start Date</label>-->
                                                    <input type="date" required="required" class="md-input" placeholder="Start Date" style="border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;" name="clndr_start_date_control" id="clndr_start_date_control" min="<?= date('Y-m-d') ?>">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <!--<label for="clndr_end_date_control">End Date</label>-->
                                                    <input type="date" required="required" class="md-input" placeholder="End Date" style="border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;" name="clndr_end_date_control" id="clndr_end_date_control" min="<?= date('Y-m-d') ?>">
                                                    <span style="color: red;display: none;" id="errorEndDate">End date must be greater then Start date.</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div id="timeAdd"></div>
                                    </div>
                                    <div id="child"></div>
                                    <div class="uk-margin-medium-bottom">
                                        <label for="" style="font-size:14px;margin-top : -40px;">Set Reminder</label>
                                        <select id="clndr_event_remind_control" name="clndr_event_remind_control" class="md-input">
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
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                        <button type="submit" class="md-btn md-btn-flat md-btn-flat-danger">Add Event</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div >
            </div>
            <div data-step="5" data-intro="Notifications Area" class="uk-grid uk-grid-small uk-grid-width-small-1-2 uk-grid-width-large-1-5 uk-grid-width-xlarge-1-5 uk-text-center" data-uk-grid-margin>
                <div style="margin-bottom: 10px;">
                    <?php 
                        $check = $this->session->userdata("userMember");
                        $colorChange = $this->data->fetch('reminders', array('user_id' => $check[0]['id'], 'isDeleted' => "0"));
                        if(count($colorChange) > 0){
                            $color = "#6ef442";
                        }else{
                            $color = "#9c27b0";
                        }
                    ?>
                    <div class="md-card md-card-hover md-card-overlay md-card-overlay">
                        <div class="md-card-content" id="canvas_1">
                            <a href="<?= site_url('home/calendar')?>">
                            <div class="epc_chart" data-percent="37" data-bar-color=<?= $color; ?>>
                                <span class="epc_chart_icon"><i class="material-icons">&#xE85D;</i></span>
                            </div>
                            </a>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <a href="<?= site_url('home/calendar')?>">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Calendar Logs
                                </h3>
                                </a>
                            </div>
                            <p>
                                Easy access to the information of all upcoming events by the church and events uploaded by you in your calendar area.
                            </p>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 10px;">
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <a href="<?= site_url('home/view/view_word') ?>">
                                <div class="epc_chart" data-percent="37" data-bar-color="#607d8b">
                                    <span class="epc_chart_icon"><i class="material-icons">&#xE865;</i></span>
                                </div>
                            </a>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <a href="<?= site_url('home/view/view_word') ?>">
                                    <h3>
                                        Word Log
                                    </h3>
                                </a>
                            </div>
                            This is your shortcut access to all the preachers’ text format messages in the church.
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 10px;">
                    <div class="md-card md-card-hover md-card-overlay md-card-overlay">
                        <div class="md-card-content" id="canvas_1">
                            <a href="<?= site_url('home/view/live'); ?>">
                            <div class="epc_chart" data-percent="37" data-bar-color="#9abcde">
                                <span class="epc_chart_icon"><i class="material-icons">&#xE04B;</i></span>
                            </div>
                            </a>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <a href="<?= site_url('home/view/live'); ?>">
                                <h3>
                                    Live Event
                                </h3>
                                </a>
                            </div>
                            <p>
                                Easy access to the information of all upcoming events by the church and events uploaded by you in your calendar area.
                            </p>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 10px;">
                    <div class="md-card md-card-hover md-card-overlay">
                        <a href="<?= site_url('home/view') ?>/chat">
                            <div class="md-card-content">
                                <div class="epc_chart" data-percent="76" data-bar-color="#03a9f4">
                                    <span class="epc_chart_icon"><i class="material-icons">&#xE0BE;</i></span>
                                </div>
                            </div>
                            <div class="md-card-overlay-content">
                                <div class="uk-clearfix md-card-overlay-header">
                                    <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                    <a href="<?= site_url('home/view') ?>/chat">
                                        <h3>
                                            New Messages
                                        </h3>
                                    </a>
                                </div>
                                Your easy access to new messages from your buddies and the admin.
                            </div>
                        </a>
                    </div>
                </div>
                <div style="margin-bottom: 10px;">
                    <div class="md-card md-card-hover md-card-overlay">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=received">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                            <span class="peity_conversions_large peity_data">5,3,9,6,5,9,7</span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <a href="<?= site_url('home/view/manage_offers') ?>?type=received">
                                    <h3>
                                        Orders To Do
                                    </h3>
                                </a>
                            </div>
                            This area shows the current orders you have to do for your customers.
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-2 uk-grid-small " data-uk-grid-margin>
                <div>
                    <div class="md-card" data-step="1" data-intro="Statistics of orders you received" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Total order you accepted">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=received">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Orders Accepted</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?= $acceptedOffers[0]['total'] ?></noscript></span></h2>
                        </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="md-card" data-step="2" data-intro="Statistics of Revenue you earned" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Total Money you made">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=received">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Revenue Received</span>
                            <h2 class="uk-margin-remove">£ <span class="countUpMe">0<noscript><?php $revenuea = 0; foreach($revenue as $val){ $revenuea += $val['amount']; } echo $revenuea; ?></noscript></span></h2>
                        </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="md-card" data-step="3" data-intro="Statistics of orders you received and completed" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Orders you have completed">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=received">
                        <div class="md-card-content">
                            <?php
                                $i = 0;
                                // print_r(json_encode($totalRevenue));
                                foreach($totalRevenue as $revenue1) {
                                    $Date = date('Y-m-d', strtotime($revenue1['date']));
                                    $expiry = $revenue1['expiry'];
                                    $expiryDate = date('Y-m-d', strtotime($Date. ' + '.$expiry.' days'));
                                    $today = date('Y-m-d');
                                    if($expiryDate <= $today) {
                                        $i++;
                                    }
                                }
                                $per = ($i / count($totalRevenue)) * 100;
                            ?>
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?= $per; ?></span></div>
                            <span class="uk-text-muted uk-text-small">Received Orders Completed</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?= $per; ?></span>%</h2>
                        </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="md-card" data-step="4" data-intro="Statistics of orders you received and completed" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Orders you have completed">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=received">
                        <div class="md-card-content">
                            <?php
                                $i = 0;
                                foreach($totalRevenue as $revenue1) {
                                    $Date = date('Y-m-d', strtotime($revenue1['date']));
                                    $expiry = $revenue1['expiry'];
                                    $expiryDate = date('Y-m-d', strtotime($Date. ' + '.$expiry.' days'));
                                    
                                    $today = date('Y-m-d');
                                    if($expiryDate <= $today) {
                                        $i++;
                                    }
                                }
                                $per = 100 - ($i / count($totalRevenue)) * 100;
                            ?>
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?= $per; ?></span></div>
                            <span class="uk-text-muted uk-text-small">Received Orders Inprogress</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?= $per; ?></span>%</h2>
                        </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="md-card" data-step="5" data-intro="Statistics of revenue you will earn when you complete your pending orders" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Amount waiting collection⁠⁠⁠⁠">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Upcoming Revenue</span>
                            <h2 class="uk-margin-remove">£ <span class="countUpMe">0<noscript><?php $revenuea = 0; foreach($upcomingrevenue as $val){ $revenuea += $val['amount']; } echo $revenuea; ?></noscript></span>&nbsp;<small style="font-size: 50%;"><a href="<?= site_url('home/view/manage_offers') ?>?type=received">View</a></small></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-2 uk-grid-small " data-uk-grid-margin>
                <div>
                    <div class="md-card" data-step="1" data-intro="Statistics of orders you received" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Total order you accepted">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=sent">
                            <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Orders Sent / <small>orders requiring action</small></span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?= $sentOffers[0]['total'] ?></noscript></span> / <span class="countUpMe">0<noscript><?= $sentActionOffers[0]['total'] ?></noscript></span></h2>
                        </div></a>
                    </div>
                </div>
                <div>
                    <div class="md-card" data-step="2" data-intro="Statistics of Revenue you earned" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Total Money you made">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=sent">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Revenue Sent <small>Accepted</small></span>
                            <h2 class="uk-margin-remove">£ <span class="countUpMe">0<noscript><?php $revenuea = 0; foreach($sentRevenue as $val){ $revenuea += $val['amount']; } echo $revenuea; ?></noscript></span></h2>
                        </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="md-card" data-step="3" data-intro="Statistics of orders you received and completed" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Orders you have completed">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=sent">
                        <div class="md-card-content">
                            <?php
                                $i = 0;
                                foreach($sentTotalRevenue as $revenue1) {
                                    $Date = date('Y-m-d', strtotime($revenue1['date']));
                                    $expiry = $revenue1['expiry'];
                                    $expiryDate = date('Y-m-d', strtotime($Date. ' + '.$expiry.' days'));
                                    
                                    $today = date('Y-m-d');
                                    if($expiryDate <= $today) {
                                        $i++;
                                    }
                                }
                                $per = ($i / count($sentTotalRevenue)) * 100;
                            ?>
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?= $per; ?></span></div>
                            <span class="uk-text-muted uk-text-small">Sent Orders <br/>Completed <small>Accepted</small></span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?= $per; ?></span>%</h2>
                        </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="md-card" data-step="4" data-intro="Statistics of orders you received and completed" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Orders you have completed">
                        <a href="<?= site_url('home/view/manage_offers') ?>?type=sent">
                        <div class="md-card-content">
                            <?php
                                $i = 0;
                                foreach($sentTotalRevenue as $revenue1) {
                                    $Date = date('Y-m-d', strtotime($revenue1['date']));
                                    $expiry = $revenue1['expiry'];
                                    $expiryDate = date('Y-m-d', strtotime($Date. ' + '.$expiry.' days'));
                                    
                                    $today = date('Y-m-d');
                                    if($expiryDate <= $today) {
                                        $i++;
                                    }
                                }
                                $per = 100 - ($i / count($sentTotalRevenue)) * 100;
                            ?>
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?= $per; ?></span></div>
                            <span class="uk-text-muted uk-text-small">Sent Orders <br/>Inprogress</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?= $per; ?></span>%</h2>
                        </div>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="md-card" data-step="5" data-intro="Statistics of revenue you will earn when you complete your pending orders" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Amount waiting collection⁠⁠⁠⁠">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Upcoming</span>
                            <h2 class="uk-margin-remove">£ <span class="countUpMe">0<noscript><?php $revenuea = 0; foreach($sentUpcomingrevenue as $val){ $revenuea += $val['amount']; } echo $revenuea; ?></noscript></span>&nbsp;<small style="font-size: 50%;"><a href="<?= site_url('home/view/manage_offers') ?>?type=sent">View</a></small></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-group-1" class="uk-modal">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Set Reminder</h2>
        </div>
        <div class="uk-modal-body">
            <select id="clndr_event_remind_control" class="md-input">
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
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-danger" onclick="setReminder()" id="clndr_new_event_submit">Set Reminder</button>
        </div>
    </div>
</div>
<script>
ci = 1;
    function addChild(){
        var child = "<div class='uk-grid uk-grid-width-medium-1-4 uk-margin-large-bottom' id='ChildField"+ci+"' data-uk-grid-margin>" +
                    "<div>" + 
                        "<div class='uk-input-group'>" + 
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-calendar'></i></span>" + 
                                "<label for='clndr_event_date_control1'>Event Date</label>" + 
                                    "<input style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' class='md-input' type='date' id='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]' name='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]' min='<?= date('Y-m-d') ?>'>" +
                                    // "<input style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' type='text' id='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]' name='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]' min='<?= date('Y-m-d') ?>'> + 
                        "</div>" + 
                    "</div>" +
                    "<div>" +
                        "<div class='uk-input-group'>" +
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-clock-o'></i></span>" +
                                "<label for='clndr_event_start_control1'>Event Start</label>" +
                                    "<input class='md-input' type='text' id='clndr_event_start_control1["+ci+"][<?= 'eventStart' ?>]' name='clndr_event_start_control1["+ci+"][<?= 'eventStart' ?>]' data-uk-timepicker>" +
                        "</div>" +
                    "</div>" +
                    "<div>" +
                        "<div class='uk-input-group'>" +
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-clock-o'></i></span>" +
                                "<label for='clndr_event_end_control1'>Event End</label>" +
                                    "<input class='md-input' type='text' id='clndr_event_end_control1["+ci+"][<?= 'eventEnd' ?>]' name='clndr_event_end_control1["+ci+"][<?= 'eventEnd' ?>]' data-uk-timepicker>" +
                        "</div>" +
                    "</div>" +
        "<hr/><div class='row'></div>";

        $("#child").prepend(child);
        ci++;
    }
    function removechild(id){
        $("#ChildField"+id).remove();
    }
</script>
<script>
    $(document).ready(function(){
        $('#clndr_end_date_control').on('blur', function(){
        var startDate = new Date($('#clndr_start_date_control').val());
        var endDate = new Date($(this).val());
        if(endDate >= startDate){
            var diff = 0,
                days = 1000 * 60 * 60 * 24,
                noOfDays = 0;
            diff = endDate - startDate;
            noOfDays = Math.floor(diff / days);
            var values = [];
            if(noOfDays == 0){
                values[0] = "<div class='row'></div>" +
                            "<div class='uk-grid uk-grid-width-medium-1-2 uk-margin-large-bottom' data-uk-grid-margin>"+
                                "<div>" +
                                    "<div class='uk-input-group'>" +
                                        "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-calendar'></i></span>" +
                                        "<label for='clndr_start_date_control'>Start Time</label>" +
                                        "<input type='time' required='required' placeholder='Enter Start Time' style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' name='startTime[]' id='startTime'>" +
                                    "</div>" +
                                "</div>" +
                                "<div>" +
                                    "<div class='uk-input-group'>" +
                                        "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-calendar'></i></span>" +
                                        "<label for='clndr_start_date_control'>End Time</label>" +
                                        "<input type='time' required='required' placeholder='Enter End Time' style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' name='endTime[]' id='endTime'>" +
                                    "</div>" +
                                "</div>" +
                            "</div>";
                            
            }else{
            for(i = 0; i <= noOfDays; i++){
                values[i] = "<div class='row'></div>" +
                        "<div class='uk-grid uk-grid-width-medium-1-2 uk-margin-large-bottom' data-uk-grid-margin>"+
                            "<div>" +
                                "<div class='uk-input-group'>" +
                                    "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-calendar'></i></span>" +
                                    "<label for='clndr_start_date_control'>Start Time</label>" +
                                    "<input type='time' required='required' placeholder='Enter Start Time' style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' name='startTime[]' id='startTime'>" +
                                "</div>" +
                            "</div>" +
                            "<div>" +
                                "<div class='uk-input-group'>" +
                                    "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-calendar'></i></span>" +
                                    "<label for='clndr_start_date_control'>End Time</label>" +
                                    "<input type='time' required='required' placeholder='Enter End Time' style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' name='endTime[]' id='endTime'>" +
                                "</div>" +
                            "</div>" +
                        "</div>";
            }
        }
        $('#errorEndDate').css('display', 'none');
        }else{
            $('#errorEndDate').css('display', 'block');
        }
        $('#timeAdd').html(values);
    });
        
        $("[name=clndr_event_desc_control]").keyup(function(){
            var a = $("[name=clndr_event_desc_control]").val();
            $("[name=clndr_event_desc_control]").val(a.substring(0,500));
            lenght = a.length;
            $("#count").html(lenght);
        });
        $("[name=clndr_event_title_control]").keyup(function(){
            var a = $("[name=clndr_event_title_control]").val();
            $("[name=clndr_event_title_control]").val(a.substring(0,500));
            lenght = a.length;
            $("#count1").html(lenght);
        });
        $("[name=clndr_event_link_control]").keyup(function(){
            var a = $("[name=clndr_event_link_control]").val();
            $("[name=clndr_event_link_control]").val(a.substring(0,500));
            lenght = a.length;
            $("#count2").html(lenght);
        });
    });
    <?php if(isset($_GET['received'])){ ?>
    setTimeout(function(){
        UIkit.notify({
            message : 'Event Added Successfully.',
            status  : 'success',
            timeout : 2000,
            pos     : 'top-center'
        });
    },1000);
    <?php } ?>
</script>
<script>
    <?php if(isset($msg) && !empty($msg)){ ?>
    setTimeout(function(){
        UIkit.notify({
            message : '<?= $msg ?>',
            status  : 'danger',
            timeout : 2000,
            pos     : 'top-center'
        });
    },1000);
    <?php } ?>
</script>
<div id="modal-group-2" class="uk-modal">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Do you want to set reminder?</h2>
        </div>
        <div class="uk-modal-body">
            <button type='button' class='uk-button uk-button-default uk-modal-close' data-dismiss='modal' aria-label='Close'>No</button> 
            <a onclick='openModal2()'><span class='md-btn md-btn-flat md-btn-flat-danger'>Yes</span></a>
        </div>
    </div>
</div>