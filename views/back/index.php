<style>
    .chosen-container {
        width: 100% !important;
    }
</style>
<style>
    .value p{
        font-size: 13px;
    }
    .gap{
        padding: 10px;
    }
    @media (max-width:1000px){
        .visible-lg{
            margin-top:0 ;
        }
    }
    .task-progress, .task-progress > h1{
        color:#39b5aa !important;
        font-size:19px !important;
        font-weight:bold !important;
    }
    body {
      margin-top: 40px;
      text-align: center;
      font-size: 14px;
      /*font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;*/
    
      }
    
    
     #calendar {
      width: 900px;
      margin: 0 auto;
      }
      
      .fc-myCustomButton-button{
          background-color: green!important;
          color:white!important;
      }
      
    .count {
        font-size: 36px;
    } 
    
    .value p {
        font-size: 13px;
    }
    
    .table {
    	display: table;   /* Allow the centering to work */
    	margin: 0 auto;
    }
    
    ul#horizontal-list {
    	min-width: 696px;
    	list-style: none;
    	padding-top: 20px;
    	}
    	ul#horizontal-list li {
    		display: inline;
    		text-decoration: none;
    	}
    
    @media screen and (max-width: 1089px) {
        .count {
            font-size: 20px;
        }
        .value p {
            font-size: 10px;
        }
    }  
</style>
<section id="main-content">
    <section class="wrapper ">
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-3">
                <section class="panel">
                    <div style="background:#e67e22;" class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count" style="font-size: 20px;">
                            <?php $total = $gender['male'][0]['total'] + $gender['female'][0]['total'] ; ?>
                            <?= $gender['male'][0]['total'] ?>
                            :
                            <?= $gender['female'][0]['total'] ?>
                        </h1>
                        <p style="font-size:12px;font-weight: bold">Male  :  Female</p>
                        <p>Total : <?= $total; ?></p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-3">
                <section class="panel">
                    <div style="background:#e74c3c;" class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?= $age_group[0][0]['total'] ?>
                        </h1>
                        <p>Age Group</p><p> ( 13 - 18 )</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-3">
                <section class="panel">
                    <div style="background:#e74c3c;" class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?= $age_group[1][0]['total'] ?>
                        </h1>
                        <p>Age Group </p><p> ( 19 - 29 )</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-3">
                <section class="panel">
                    <div style="background:#e74c3c;" class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?= $age_group[2][0]['total'] ?>
                        </h1>
                        <p>Age Group </p><p> ( 30 - 39 )</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-3">
                <section class="panel">
                    <div style="background:#e74c3c;" class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?= $age_group[3][0]['total'] ?>
                        </h1>
                        <p>Age Group </p><p> ( 40 - 49 )</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-3">
                <section class="panel">
                    <div style="background:#e74c3c;" class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?= $age_group[4][0]['total'] ?>
                        </h1>
                        <p>Age Group </p><p> ( 50 - 69 )</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-3">
                <section class="panel">
                    <div style="background:#e74c3c;" class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?= $age_group[5][0]['total'] ?>
                        </h1>
                        <p>Age Group </p><p> ( Above 70 )</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-3">
                <section class="panel">
                    <div style="background:#e74c3c;" class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <a href="<?= site_url('admin/view/topup_history');?>"><h1 class="count">
                            <?= $bucket[0]['qty'] - (2*$totalSent[0]['qty']) ?>
                        </h1>
                        <small>SMS Credit</small>
                        <p>Account Balance</p></a>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">

        </div>
            <div class="col-lg-7 col-md-12 " >
                <div class="responsive">
                    <section class="panel" id="calendheight">
                        <div class="panel-body progress-panel" style="padding-bottom : 50px;">
                            <div class="task-progress">
                                <h1>Calendar</h1>
                            </div>
                            <!--<span style="float:right;font-weight:bold;color:#e74c3c">-->
                            <!--    S - Schedule Message-->
                            <!--    <br/>-->
                            <!--    V - View or Set Reminder-->
                            <!--</span>-->
                        </div>
                        <div class="gap">
                                <div id='calendar' style="width: 100%;"></div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 " >
                <section class="panel" id="clockheight">
<!--                    <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Clock</header>-->
                    <div class="panel-body progress-panel">
                        <div class="task-progress">
                            <h1>Clock</h1>
                        </div>
                        <br/>
                        <hr/>
                        <div style="border:none !important;" class="clock" id="clock"></div>
                        <div class="row"></div>
                        <br>
                        <p style="font-size:20px;text-align: center;font-weight: bold">
                            <?= date("D d-M-Y") ?>
                        </p>
                    </div>
                </section>
            </div>
<!--        </div>-->
        <script>
            $(document).ready(function(){
                setInterval(function(){
                    var a = $("#calendheight").height();
                    $("#clockheight").height(a);
                },1000);
            })
        </script>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>Codes Generated</h1>
                            </div>
                        </div>
                        <div id="codesChart" width="400" height="200">

                        </div>
                        <p style="text-align: center;font-weight: bold">
                            <span style="margin-right: 20px">Used: <?= $codesused[0]['total'] ?> </span>
                            <span>Unused: <?= $codesunused[0]['total'] ?></span>
                        </p>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>Male/Female Ratio</h1>
                            </div>
                        </div>
                        <div id="myChart" width="400" height="200"></div>
                        <p style="text-align: center;font-weight: bold">
                            <span style="margin-right: 20px">Male: <?= $gender['male'][0]['total'] ?></span>
                            <span>Female: <?= $gender['female'][0]['total'] ?></span>
                        </p>

                    </section>
                </div>
                <div class="col-md-6">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>Age Group Pie Chart Demograph</h1>
                            </div>
                        </div>
                        <div id="myChart2" width="400" height="200"></div>

                    </section>
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>Gender Ratio for Children and Grandchildren</h1>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <tr align="center">
                                <th style="font-size: 12px;">Children (Male : Female)</th>
                                <th style="font-size: 12px;">Grand Children (Male : Female)</th>
                            </tr>
                            <tr align="center">
                                <td><?= $c_gender['male'][0]['total'] ?> : <?= $c_gender['female'][0]['total'] ?></td>
                                <td><?= $gc_gender['male'][0]['total'] ?> : <?= $gc_gender['female'][0]['total'] ?></td>
                            </tr>
                        </table>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>Table Showing the Title Records</h1>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <tr>
                                <th style="font-size:20px">Title</th>
                                <th style="font-size:20px">Total</th>
                            </tr>
                            <?php $members = $this->data->fetch('member', array('status' => 'active', 'first_time' => 'no')); ?>
                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Mr"){ $i+=1; } ?>
                            <?php } ?>
                            <tr>
                                <td>Mr</td>
                                <td><?= $i ?></td>
                            </tr>
                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Mrs"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Mrs</td>
                                    <td><?= $i ?></td>
                                </tr>
                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Miss"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Miss</td>
                                    <td><?= $i ?></td>
                                </tr>
                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Bishop"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Bishop</td>
                                    <td><?= $i ?></td>
                                </tr>

                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Pastor"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Pastor</td>
                                    <td><?= $i ?></td>
                                </tr>

                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Prophet"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Prophet</td>
                                    <td><?= $i ?></td>
                                </tr>

                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Prophetess"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Prophetess</td>
                                    <td><?= $i ?></td>
                                </tr>

                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Reverend"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Reverend</td>
                                    <td><?= $i ?></td>
                                </tr>

                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Deacon"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Deacon</td>
                                    <td><?= $i ?></td>
                                </tr>

                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Deaconess"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Deaconess</td>
                                    <td><?= $i ?></td>
                                </tr>

                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Dr"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Dr</td>
                                    <td><?= $i ?></td>
                                </tr>

                            <?php $i=0; foreach($members as $val){ ?>
                                <?php if($val['title'] == "Professor"){ $i+=1; } ?>
                            <?php } ?>
                                <tr>
                                    <td>Professor</td>
                                    <td><?= $i ?></td>
                                </tr>

                        </table>
                    </section>
                </div>
                <div class="row"></div>
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>Monthly System Monitor</h1>
                            </div>
                        </div>
                        <div id="testChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </section>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="table">
                                    <ul id="horizontal-list">
                                      <li class="btn btn-success"><a onclick="changeTestChart(2018)">2018</a></li>
                                      <li class="btn btn-success"><a onclick="changeTestChart(2019)">2019</a></li>
                                      <li class="btn btn-success"><a onclick="changeTestChart(2020)">2020</a></li>
                                    </ul>
                                  </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row"></div>
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>Donations Graph</h1>
                            </div>
                        </div>
                        <div id="myChart4" width="400" height="200"></div>
                    </section>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="table">
                            <ul id="horizontal-list">
                                <li class="btn btn-success"><a onclick="changeDonations(2018)">2018</a></li>
                                <li class="btn btn-success"><a onclick="changeDonations(2019)">2019</a></li>
                                <li class="btn btn-success"><a onclick="changeDonations(2020)">2020</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row"></div>
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                First Timer/New Registration Graph
                            </div>
                        </div>
                        <div id="ftimer" width="400" height="100"></div>
                    </section>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="table">
                            <ul id="horizontal-list">
                                <li class="btn btn-success"><a onclick="changeFTimer(2018)">2018</a></li>
                                <li class="btn btn-success"><a onclick="changeFTimer(2019)">2019</a></li>
                                <li class="btn btn-success"><a onclick="changeFTimer(2020)">2020</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row"></div>
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                Church Growth
                            </div>
                        </div>
                        <div id="myChart6" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </section>
                </div>
                <div class="row"></div>
                <div class="col-md-12 visible-lg visible-md">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>Member's Country of origin chart</h1>
                            </div>
                        </div>
                        <canvas id="myChart5" width="400" height="100"></canvas>
                    </section>
                </div>
                

                <div class="row"></div>
                <div class="">
                    <div class="col-md-6">
                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="task-progress">
                                    <h1>Members Activity</h1>
                                </div>
                            </div>
                            <div style="width: 100%">
                            <div class="table-responsive">
                            <table id="myTabl" class="table table-hover">
                                <tr>
                                    <td>Member</td>
                                    <!--<td>Last Login IP</td>-->
                                    <td>Last Login Location</td>
                                    <td>Status</td>
                                    <td>Last Activity</td>
                                </tr>
                                <tbody id="usrActivity">

                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div class="row"></div>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="task-progress">
                                    <h1>Notifications</h1>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Notification</td>
                                    <td>View</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($businessGroupnew as $k=>$val){ ?>
                                    <tr>
                                        <td><?= $k+1; ?></td>
                                        <td>A member added a new Business group <?= $val['name'] ?></td>
                                        <td><a href="<?= site_url('admin/view/edit_group/'.$val['id']."/businessgroup") ?>">Edit</a></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($churchgroupnew as $k=>$val){ ?>
                                    <tr>
                                        <td><?= $k+1; ?></td>
                                        <td>A member added a new Church group <?= $val['name'] ?></td>
                                        <td><a href="<?= site_url('admin/view/edit_group/'.$val['id']."/churchgroup") ?>">Edit</a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div class="row"></div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </section>
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
                        <div class="col-xs-3">
                            <!--<input id="member" name="membCheck" type="checkbox" checked style="width: 20px;"/>-->
                            <input type="checkbox" name="membCheck" class="chosen-toggle select form-control mem" id="member" style="width: 20px;">
                            <label for="">Members</label>
                            <!--<label for="">Members</label>-->
                        </div>
                        <div class="col-xs-9 member">
                            <?php $members = $this->data->fetch('member', array('status' => 'active')); ?>
                            <!--<input type="text" id="head" />-->
                            <select name="member[]" multiple="multiple" required id="mem" class="form-control chosen-select">
                                    <!--<option value="all">Select All</option>-->
                                    <?php $i= 0; foreach($members as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                                    <?php $i++; } ?>
                            </select>
                            <input type="hidden" id="totalMem" value="<?= $i; ?>"/>
                            <br/>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-3">
                                    <input id="bGroup" name="bGroupCheck" class="form-control" type="checkbox" style="width: 20px;"/>
                                    <label for="">Business Group</label>
                                </div>
                                <div class="col-md-9 bgroup" style="display:none;">
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
                                <div class="col-md-3">
                                    <input id="church" name="churchCheck" class="form-control" type="checkbox" style="width: 20px;"/>
                                    <label for="">Church Group</label>
                                </div>
                                <div class="col-md-9 church" style="display: none;">
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
                            <label class="col-xs-4" for="image" style="font-size: 11px !important;">Event Image(Optional)</label>
                            <input type="file" name="image" id="image" onblur="check()" class="form-control" style="font-size: 11px !important;"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="col-xs-4" for="desc">Event Description</label>
                            <textarea name="desc" id="desc" placeholder="Enter event description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p><input type="radio" checked onclick="changeEventTypee(this.value)" name="eventType" style="width: 20px;" value="one"><br/> <span>Is this event for one day?</span></p>
                        </div>
                        <div class="col-xs-6">
                            <p><input type="radio" onclick="changeEventTypee(this.value)" name="eventType" style="width: 20px;" value="multiple"><br/> <span>Is this event for more than one day?</span></p>
                        </div>
                    </div>
                    <div id="oneDayEvent">
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="col-xs-4" for="title">Event Date</label>
                                <input type="text" onfocus="(this.type='date')"  placeholder="Enter Event Date" name="eventDate" id="eventDate" class="form-control" min="<?= date('Y-m-d')?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="col-xs-4" for="starts-at">Starts at</label>
                                <input type="text" placeholder="Enter Start Time" onfocus="(this.type='time')" name="starts_at" id="starts-at" class="form-control"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="col-xs-4" for="ends-at">Ends at</label>
                                <input type="text" placeholder="Enter End Time" onfocus="(this.type='time')" name="ends_at" id="ends-at" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div id="multiDayEvent">
                        <?php $ci = 0; ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="col-xs-4" for="title">Event Date</label>
                                <input type="date" name="eventDate1[<?= $ci ?>][<?= 'eventDate' ?>]" id="eventDate1[<?= $ci ?>][<?= 'eventDate' ?>]" class="form-control" min="<?= date('Y-m-d')?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="col-xs-4" for="starts-at">Starts at</label>
                                <input type="time" name="starts_at1[<?= $ci ?>][<?= 'eventStart' ?>]" id="starts-at1[<?= $ci ?>][<?= 'eventStart' ?>]" class="form-control"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="col-xs-4" for="ends-at">Ends at</label>
                                <input type="time" name="ends_at1[<?= $ci ?>][<?= 'eventEnd' ?>]" id="ends-at1[<?= $ci ?>][<?= 'eventEnd' ?>]" class="form-control"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" onclick="addBuild()" class="btn btn-danger">Add Days</button>
                            </div>
                        </div>
                    </div>
                    <div id="child"></div>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-group-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="clndr_event_remind_control">Set Reminder</label>
                        <select id="clndr_event_remind_control" class="form-control">
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
                <button type="button" class="btn btn-primary" id="setReminder">Set Reminder</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $.post("<?= site_url('admin/calender') ?>",{},function(e){
        $(".timeTable").html(e);
    });
    // setInterval(function(){
    //     $.post("<?= site_url('admin/ajax/getUsers') ?>",{},function(e){
    //         $("#usrActivity").html(e);
    //     })
    // },2000);

</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--<script src="https://code.highcharts.com/highcharts.src.js"></script>-->
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>


<script>
    function changeTestChart(val) {
        $.ajax({
            url: "<?= site_url('admin/getMonthlyGraph') ?>",
            type: "POST",
            data: {year:val},
            async: false,
            success: function(data){
                // console.log(data);
                chartData = JSON.parse(data);
                // console.log(chartData);
                // alert(chartData.fMonths[11][0].amount);
                Highcharts.chart('testChart', {
                    chart: {
                        zoomType: 'xy'
                    },
                    title: {
                        text: ''
                    },
                    colors:["#1DABB8","#000"],
                    subtitle: {
                        text: 'Source: //mmsapp.org'
                    },
                    xAxis: [{
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        crosshair: true
                    }],
                    yAxis: [
                        {
                        labels: {
                            format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        title: {
                            text: 'Logged in',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        }
                    },
                        {
                        title: {
                            text: 'Registration',
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        labels: {
                            format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        opposite: true
                    }],
                    tooltip: {
                        shared: true
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'left',
                        x: 120,
                        verticalAlign: 'top',
                        y: 100,
                        floating: true,
                        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                    },
                    series: [{
                        name: 'New Registrations',
                        type: 'column',
                        yAxis: 1,
                        data: [ parseInt(chartData.fMonths[0][0].amount) + parseInt(chartData.rMonths[0][0].amount),
                            parseInt(chartData.fMonths[1][0].amount) + parseInt(chartData.rMonths[1][0].amount),
                            parseInt(chartData.fMonths[2][0].amount) + parseInt(chartData.rMonths[2][0].amount),
                            parseInt(chartData.fMonths[3][0].amount) + parseInt(chartData.rMonths[3][0].amount),
                            parseInt(chartData.fMonths[4][0].amount) + parseInt(chartData.rMonths[4][0].amount),
                            parseInt(chartData.fMonths[5][0].amount) + parseInt(chartData.rMonths[5][0].amount),
                            parseInt(chartData.fMonths[6][0].amount) + parseInt(chartData.rMonths[6][0].amount),
                            parseInt(chartData.fMonths[7][0].amount) + parseInt(chartData.rMonths[7][0].amount),
                            parseInt(chartData.fMonths[8][0].amount) + parseInt(chartData.rMonths[8][0].amount),
                            parseInt(chartData.fMonths[9][0].amount) + parseInt(chartData.rMonths[9][0].amount),
                            parseInt(chartData.fMonths[10][0].amount) + parseInt(chartData.rMonths[10][0].amount),
                            parseInt(chartData.fMonths[11][0].amount) + parseInt(chartData.rMonths[11][0].amount)
                        ],
                        tooltip: {
                            valueSuffix: ''
                        }
        
                    }, {
                        name: 'Login count',
                        type: 'spline',
                        data: [ parseInt(chartData.lcountMonths[0][0].count),
                            parseInt(chartData.lcountMonths[1][0].count),
                            parseInt(chartData.lcountMonths[2][0].count),
                            parseInt(chartData.lcountMonths[3][0].count),
                            parseInt(chartData.lcountMonths[4][0].count),
                            parseInt(chartData.lcountMonths[5][0].count),
                            parseInt(chartData.lcountMonths[6][0].count),
                            parseInt(chartData.lcountMonths[7][0].count),
                            parseInt(chartData.lcountMonths[8][0].count),
                            parseInt(chartData.lcountMonths[9][0].count),
                            parseInt(chartData.lcountMonths[10][0].count),
                            parseInt(chartData.lcountMonths[11][0].count)
                        ],
                        tooltip: {
                            valueSuffix: ''
                        }
                    }]
                });
                    }
                });
    }
    console.log("weeww")
    Highcharts.chart('myChart6', {
    chart: {
        type: 'column'
    },
    scrollbar: {
                        enabled: true
                    },
    title: {
        text: ''
    },
    subtitle: {
         text: 'Source: <a href="http://mmsapp.org">https://www.mmsapp.org</a>' 
    },
    xAxis: {
        type: 'category',
        title: {
            text: 'Years Of Registration'
        }
    },
    yAxis: {
                min: 0,
                title: {
                    text: 'Member Registrations'
                }
            },
    legend: {
        enabled: false
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true
            }
        }
    },
    
    series: [{
        name: 'Years',
        colorByPoint: true,
        data: [{
        //     name: '2000',
        //     y: <?= $cMonths[2000]['totalYear'][0]['totalYear'] ?>,
        //     drilldown: '2000'
        // },{
            name: '2001',
            y: <?= $cMonths[2001]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2001'
        },{
            name: '2002',
            y: <?= $cMonths[2002]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2002'
        },{
            name: '2003',
            y: <?= $cMonths[2003]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2003'
        },{
            name: '2004',
            y: <?= $cMonths[2004]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2004'
        },{
            name: '2005',
            y: <?= $cMonths[2005]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2005'
        },{
            name: '2006',
            y: <?= $cMonths[2006]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2006'
        },{
            name: '2007',
            y: <?= $cMonths[2007]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2007'
        },{
            name: '2008',
            y: <?= $cMonths[2008]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2008'
        }, {
            name: '2009',
            y: <?= $cMonths[2009]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2009'
        }, {
            name: '2010',
            y: <?= $cMonths[2010]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2010'
        },{
            name: '2011',
            y: <?= $cMonths[2011]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2011'
        },{
            name: '2012',
            y: <?= $cMonths[2012]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2012'
        },{
            name: '2013',
            y: <?= $cMonths[2013]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2013'
        },{
            name: '2014',
            y: <?= $cMonths[2014]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2014'
        },{
            name: '2015',
            y: <?= $cMonths[2015]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2015'
        },{
            name: '2016',
            y: <?= $cMonths[2016]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2016'
        },{
            name: '2017',
            y: <?= $cMonths[2017]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2017'
        },{
            name: '2018',
            y: <?= $cMonths[2018]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2018'
        },{
            name: '2019',
            y: <?= $cMonths[2019]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2019'
        },{
            name: '2020',
            y: <?= $cMonths[2020]['totalYear'][0]['totalYear'] ?>,
            drilldown: '2020'
        }]
    }],
    drilldown: {
        series: [{
        //     id: '2000',
        //     data: [
        //         ['Jan', <?= $cMonths[2000][0][0]['amount'] ?>],
        //         ['Feb', <?= $cMonths[2000][1][0]['amount'] ?>],
        //         ['Mar', <?= $cMonths[2000][2][0]['amount'] ?>],
        //         ['Apr', <?= $cMonths[2000][3][0]['amount'] ?>],
        //         ['May', <?= $cMonths[2000][4][0]['amount'] ?>],
        //         ['Jun', <?= $cMonths[2000][5][0]['amount'] ?>],
        //         ['Jul', <?= $cMonths[2000][6][0]['amount'] ?>],
        //         ['Aug', <?= $cMonths[2000][7][0]['amount'] ?>],
        //         ['Sept', <?= $cMonths[2000][8][0]['amount'] ?>],
        //         ['Oct', <?= $cMonths[2000][9][0]['amount'] ?>],
        //         ['Nov', <?= $cMonths[2000][10][0]['amount'] ?>],
        //         ['Dec', <?= $cMonths[2000][11][0]['amount'] ?>]
        //     ]
        // },{
            id: '2001',
            data: [
                ['Jan', <?= $cMonths[2001][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2001][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2001][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2001][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2001][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2001][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2001][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2001][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2001][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2001][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2001][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2001][11][0]['amount'] ?>]
            ]
        },{
            id: '2002',
            data: [
                ['Jan', <?= $cMonths[2002][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2002][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2002][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2002][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2002][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2002][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2002][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2002][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2002][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2002][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2002][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2002][11][0]['amount'] ?>]
            ]
        },{
            id: '2003',
            data: [
                ['Jan', <?= $cMonths[2003][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2003][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2003][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2003][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2003][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2003][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2003][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2003][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2003][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2003][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2003][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2003][11][0]['amount'] ?>]
            ]
        },{
            id: '2004',
            data: [
                ['Jan', <?= $cMonths[2004][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2004][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2004][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2004][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2004][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2004][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2004][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2004][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2004][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2004][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2004][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2004][11][0]['amount'] ?>]
            ]
        },{
            id: '2005',
            data: [
                ['Jan', <?= $cMonths[2005][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2005][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2005][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2005][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2005][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2005][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2005][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2005][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2005][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2005][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2005][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2005][11][0]['amount'] ?>]
            ]
        },{
            id: '2006',
            data: [
                ['Jan', <?= $cMonths[2006][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2006][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2006][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2006][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2006][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2006][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2006][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2006][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2006][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2006][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2006][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2006][11][0]['amount'] ?>]
            ]
        },{
            id: '2007',
            data: [
                ['Jan', <?= $cMonths[2007][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2007][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2007][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2007][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2007][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2007][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2007][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2007][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2007][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2007][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2007][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2007][11][0]['amount'] ?>]
            ]
        },{
            id: '2008',
            data: [
                ['Jan', <?= $cMonths[2008][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2008][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2008][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2008][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2008][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2008][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2008][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2008][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2008][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2008][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2008][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2008][11][0]['amount'] ?>]
            ]
        }, {
            id: '2009',
            data: [
                ['Jan', <?= $cMonths[2009][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2009][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2009][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2009][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2009][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2009][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2009][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2009][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2009][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2009][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2009][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2009][11][0]['amount'] ?>]
            ]
        },{
            id: '2010',
            data: [
                ['Jan', <?= $cMonths[2010][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2010][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2010][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2010][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2010][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2010][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2010][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2010][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2010][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2010][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2010][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2010][11][0]['amount'] ?>]
            ]
        },{
            id: '2011',
            data: [
                ['Jan', <?= $cMonths[2011][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2011][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2011][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2011][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2011][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2011][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2011][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2011][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2011][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2011][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2011][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2011][11][0]['amount'] ?>]
            ]
        },{
            id: '2012',
            data: [
                ['Jan', <?= $cMonths[2012][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2012][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2012][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2012][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2012][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2012][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2012][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2012][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2012][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2012][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2012][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2012][11][0]['amount'] ?>]
            ]
        },{
            id: '2013',
            data: [
                ['Jan', <?= $cMonths[2013][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2013][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2013][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2013][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2013][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2013][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2013][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2013][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2013][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2013][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2013][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2013][11][0]['amount'] ?>]
            ]
        },{
            id: '2014',
            data: [
                ['Jan', <?= $cMonths[2014][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2014][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2014][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2014][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2014][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2014][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2014][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2014][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2014][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2014][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2014][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2014][11][0]['amount'] ?>]
            ]
        },{
            id: '2015',
            data: [
                ['Jan', <?= $cMonths[2015][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2015][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2015][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2015][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2015][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2015][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2015][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2015][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2015][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2015][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2015][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2015][11][0]['amount'] ?>]
            ]
        },{
            id: '2016',
            data: [
                ['Jan', <?= $cMonths[2016][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2016][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2016][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2016][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2016][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2016][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2016][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2016][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2016][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2016][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2016][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2016][11][0]['amount'] ?>]
            ]
        },{
            id: '2017',
            data: [
                ['Jan', <?= $cMonths[2017][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2017][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2017][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2017][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2017][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2017][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2017][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2017][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2017][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2017][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2017][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2017][11][0]['amount'] ?>]
            ]
        },{
            id: '2018',
            data: [
                ['Jan', <?= $cMonths[2018][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2018][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2018][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2018][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2018][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2018][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2018][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2018][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2018][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2018][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2018][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2018][11][0]['amount'] ?>]
            ]
        },{
            id: '2019',
            data: [
                ['Jan', <?= $cMonths[2019][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2019][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2019][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2019][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2019][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2019][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2019][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2019][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2019][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2019][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2019][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2019][11][0]['amount'] ?>]
            ]
        },{
            id: '2020',
            data: [
                ['Jan', <?= $cMonths[2020][0][0]['amount'] ?>],
                ['Feb', <?= $cMonths[2020][1][0]['amount'] ?>],
                ['Mar', <?= $cMonths[2020][2][0]['amount'] ?>],
                ['Apr', <?= $cMonths[2020][3][0]['amount'] ?>],
                ['May', <?= $cMonths[2020][4][0]['amount'] ?>],
                ['Jun', <?= $cMonths[2020][5][0]['amount'] ?>],
                ['Jul', <?= $cMonths[2020][6][0]['amount'] ?>],
                ['Aug', <?= $cMonths[2020][7][0]['amount'] ?>],
                ['Sept', <?= $cMonths[2020][8][0]['amount'] ?>],
                ['Oct', <?= $cMonths[2020][9][0]['amount'] ?>],
                ['Nov', <?= $cMonths[2020][10][0]['amount'] ?>],
                ['Dec', <?= $cMonths[2020][11][0]['amount'] ?>]
            ]
        }]
    }
});
</script>

<script>
    //testChart
    var colors = Highcharts.getOptions().colors;

    //ftimer
    
    function changeFTimer(year) {
        $.ajax({
            url: "<?= site_url('admin/getFTimerGraph') ?>",
            type: "POST",
            data: {year: year},
            async: false,
            success: function(data) {
                chartData = JSON.parse(data);
                Highcharts.chart('ftimer', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: 'Source: <a href="https://mmsapp.org">https://www.mmsapp.org</a>'
                    },
                    xAxis: {
                        categories: [
                            'Jan',
                            'Feb',
                            'Mar',
                            'Apr',
                            'May',
                            'Jun',
                            'Jul',
                            'Aug',
                            'Sep',
                            'Oct',
                            'Nov',
                            'Dec'
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Registrations'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                name: 'New Registrations',
                data: [ parseInt(chartData.rMonths[0][0].amount),
                    parseInt(chartData.rMonths[1][0].amount),
                    parseInt(chartData.rMonths[2][0].amount),
                    parseInt(chartData.rMonths[3][0].amount),
                    parseInt(chartData.rMonths[4][0].amount),
                    parseInt(chartData.rMonths[5][0].amount),
                    parseInt(chartData.rMonths[6][0].amount),
                    parseInt(chartData.rMonths[7][0].amount),
                    parseInt(chartData.rMonths[8][0].amount),
                    parseInt(chartData.rMonths[9][0].amount),
                    parseInt(chartData.rMonths[10][0].amount),
                    parseInt(chartData.rMonths[11][0].amount)
                ]

            }, {
                name: 'First Timer Registrations',
                data:   [ parseInt(chartData.fMonths[0][0].amount),
                        parseInt(chartData.fMonths[1][0].amount),
                        parseInt(chartData.fMonths[2][0].amount),
                        parseInt(chartData.fMonths[3][0].amount),
                        parseInt(chartData.fMonths[4][0].amount),
                        parseInt(chartData.fMonths[5][0].amount),
                        parseInt(chartData.fMonths[6][0].amount),
                        parseInt(chartData.fMonths[7][0].amount),
                        parseInt(chartData.fMonths[8][0].amount),
                        parseInt(chartData.fMonths[9][0].amount),
                        parseInt(chartData.fMonths[10][0].amount),
                        parseInt(chartData.fMonths[11][0].amount)
                ]


            }
            ]
                });
            }
            
        });
    }
    
    $(function () {
        Highcharts.chart('ftimer', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Source: <a href="https://mmsapp.org">https://www.mmsapp.org</a>'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Registrations'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'New Registrations',
                data: [ <?= $rMonths[0][0]['amount'] ?>,
                    <?= $rMonths[1][0]['amount'] ?>,
                    <?= $rMonths[2][0]['amount'] ?>,
                    <?= $rMonths[3][0]['amount'] ?>,
                    <?= $rMonths[4][0]['amount'] ?>,
                    <?= $rMonths[5][0]['amount'] ?>,
                    <?= $rMonths[6][0]['amount'] ?>,
                    <?= $rMonths[7][0]['amount'] ?>,
                    <?= $rMonths[8][0]['amount'] ?>,
                    <?= $rMonths[9][0]['amount'] ?>,
                    <?= $rMonths[10][0]['amount'] ?>,
                    <?= $rMonths[11][0]['amount'] ?>
                ]

            }, {
                name: 'First Timer Registrations',
                data:   [ <?= $fMonths[0][0]['amount'] ?>,
                        <?= $fMonths[1][0]['amount'] ?>,
                        <?= $fMonths[2][0]['amount'] ?>,
                        <?= $fMonths[3][0]['amount'] ?>,
                        <?= $fMonths[4][0]['amount'] ?>,
                        <?= $fMonths[5][0]['amount'] ?>,
                        <?= $fMonths[6][0]['amount'] ?>,
                        <?= $fMonths[7][0]['amount'] ?>,
                        <?= $fMonths[8][0]['amount'] ?>,
                        <?= $fMonths[9][0]['amount'] ?>,
                        <?= $fMonths[10][0]['amount'] ?>,
                        <?= $fMonths[11][0]['amount'] ?>
                ]


            }
            ]
        });
        /*Highcharts.chart('ftimer', {
            chart: {
                type: 'column'
            },
            colors:["#0F3057"],
            title: {
                text: ''
            },
            subtitle: {
                text: 'Source: <a href="http://mmsapp.org">//mmsapp.org</a>'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: 0,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Registration (First timer)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Registration count: <b>{point.y:.f}</b>'
            },
            series: [{
                name: 'Registration',
                data: [
                    ['Jan', <?//= $fMonths[0][0]['amount'] ?>],
                    ['Feb', <?//= $fMonths[1][0]['amount'] ?>],
                    ['Mar', <?//= $fMonths[2][0]['amount'] ?>],
                    ['Apr', <?//= $fMonths[3][0]['amount'] ?>],
                    ['May', <?//= $fMonths[4][0]['amount'] ?>],
                    ['Jun', <?//= $fMonths[5][0]['amount'] ?>],
                    ['Jul', <?//= $fMonths[6][0]['amount'] ?>],
                    ['Aug', <?//= $fMonths[7][0]['amount'] ?>],
                    ['Sep', <?//= $fMonths[8][0]['amount'] ?>],
                    ['Oct', <?//= $fMonths[9][0]['amount'] ?>],
                    ['Nov', <?//= $fMonths[10][0]['amount'] ?>],
                    ['Dec', <?//= $fMonths[11][0]['amount'] ?>]
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });*/
    });
    $(function () {
        Highcharts.chart('testChart', {
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: ''
            },
            colors:["#1DABB8","#000"],
            subtitle: {
                text: 'Source: //mmsapp.org'
            },
            xAxis: [{
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                crosshair: true
            }],
            yAxis: [
                {
                labels: {
                    format: '{value}',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: 'Logged in',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            },
                {
                title: {
                    text: 'Registration',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value}',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 120,
                verticalAlign: 'top',
                y: 100,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                name: 'New Registrations',
                type: 'column',
                yAxis: 1,
                data: [ <?= $rMonths[0][0]['amount'] + $fMonths[0][0]['amount'] ?>,
                    <?= $rMonths[1][0]['amount'] + $fMonths[1][0]['amount'] ?>,
                    <?= $rMonths[2][0]['amount'] + $fMonths[2][0]['amount'] ?>,
                    <?= $rMonths[3][0]['amount'] + $fMonths[3][0]['amount'] ?>,
                    <?= $rMonths[4][0]['amount'] + $fMonths[4][0]['amount'] ?>,
                    <?= $rMonths[5][0]['amount'] + $fMonths[5][0]['amount'] ?>,
                    <?= $rMonths[6][0]['amount'] + $fMonths[6][0]['amount'] ?>,
                    <?= $rMonths[7][0]['amount'] + $fMonths[7][0]['amount'] ?>,
                    <?= $rMonths[8][0]['amount'] + $fMonths[8][0]['amount'] ?>,
                    <?= $rMonths[9][0]['amount'] + $fMonths[9][0]['amount'] ?>,
                    <?= $rMonths[10][0]['amount'] + $fMonths[10][0]['amount'] ?>,
                    <?= $rMonths[11][0]['amount'] + $fMonths[11][0]['amount'] ?>
                ],
                tooltip: {
                    valueSuffix: ''
                }

            }, {
                name: 'Login count',
                type: 'spline',
                data: [ <?= $lcountMonths[0][0]['count'] ?>,
                    <?= $lcountMonths[1][0]['count'] ?>,
                    <?= $lcountMonths[2][0]['count'] ?>,
                    <?= $lcountMonths[3][0]['count'] ?>,
                    <?= $lcountMonths[4][0]['count'] ?>,
                    <?= $lcountMonths[5][0]['count'] ?>,
                    <?= $lcountMonths[6][0]['count'] ?>,
                    <?= $lcountMonths[7][0]['count'] ?>,
                    <?= $lcountMonths[8][0]['count'] ?>,
                    <?= $lcountMonths[9][0]['count'] ?>,
                    <?= $lcountMonths[10][0]['count'] ?>,
                    <?= $lcountMonths[11][0]['count'] ?>
                ],
                tooltip: {
                    valueSuffix: ''
                }
            }]
        });
    });
    $(function () {
        // Highcharts.chart('myChart2', {
        //     chart: {
        //         plotBackgroundColor: null,
        //         plotBorderWidth: null,
        //         plotShadow: false,
        //         type: 'pie'
        //     },
        //     title: {
        //         text:''
        //     },
        //     colors:["#E3000E","#3D8EB9","#F04903","#1DABB8"],
        //     tooltip: {
        //         pointFormat: '{series.name}: <b>{point.y:f} ({point.percentage:.1f}%)</b>'
        //     },
        //     plotOptions: {
        //         pie: {
        //             allowPointSelect: true,
        //             cursor: 'pointer',
        //             dataLabels: {
        //                 enabled: true,
        //                 useHTML: true,
        //                 formatter: function () {
        //                     var point = this.point,
        //                         width = 50,
        //                         height = 50,
        //                         series = point.series,
        //                         center = series.center,               //center of the pie
        //                         startX = point.labelPos[4],           //connector X starts here
        //                         endX = point.labelPos[0] + 5,         //connector X ends here
        //                         left =  -(endX - startX + width / 2), //center label over right edge
        //                         startY = point.labelPos[5],           //connector Y starts here
        //                         endY = point.labelPos[1] - 5,         //connector Y ends here
        //                         top =  -(endY - startY + height / 2); //center label over right edge


        //                     // now move inside the slice:
        //                     left += (center[0] - startX)/2;
        //                     top += (center[1] - startY)/2;

        //                     if (point.id == 'razr') {
        //                         console.log(this);
        //                         return '<div><b>' + point.y + '</b></div><div style="width: ' + width + 'px; left:' + left + 'px;top:' + top + 'px; text-align: center; position: absolute"><b>sum is:<br/>' + point.summ + ' </b></div>';
        //                     } else return '<b>' + point.y + '<b>';
        //                 }
        //             },
        //             showInLegend: true
        //         }
        //     },
        //     series: [{
        //         name: 'Ratio',
        //         colorByPoint: true,
        //         data: [{
        //             name: '0 - 9',
        //             y: <?= $age_group_child[0][0]['total'] + $age_group_gChild[0][0]['total'] ?>,
        //             color:colors[1]
        //         }, {
        //             name: '10 - 12',
        //             y: <?= $age_group_child[1][0]['total'] + $age_group_gChild[1][0]['total'] ?>,
        //             color:colors[2]
        //         }, {
        //             name: '13 - 18',
        //             y: <?= $age_group[0][0]['total'] + $age_group_child[2][0]['total'] + $age_group_gChild[2][0]['total'] ?>,
        //             color: colors[3]
        //         }, {
        //             name: '19 - 29',
        //             y: <?= $age_group[1][0]['total'] + $age_group_child[3][0]['total'] + $age_group_gChild[3][0]['total'] ?>,
        //             color:colors[4]
        //         }, {
        //             name: '30 - 39',
        //             y: <?= $age_group[2][0]['total'] + $age_group_child[4][0]['total'] + $age_group_gChild[4][0]['total'] ?>,
        //             color:colors[5]
        //         }, {
        //             name: '40 - 49',
        //             y: <?= $age_group[3][0]['total'] + $age_group_child[5][0]['total'] + $age_group_gChild[5][0]['total'] ?>,
        //             color:colors[6]
        //         }, {
        //             name: '50 - 69',
        //             y: <?= $age_group[4][0]['total'] + $age_group_child[6][0]['total'] + $age_group_gChild[6][0]['total'] ?>,
        //             color:colors[7]
        //         }, {
        //             name: 'Above 70',
        //             y: <?= $age_group[5][0]['total'] + $age_group_child[7][0]['total'] + $age_group_gChild[7][0]['total'] ?>,
        //             color:colors[8]
        //         }
        //         ]
        //     }]
        // });
    });
    $(function () {
        // Radialize the colors
//        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
//            return {
//                radialGradient: {
//                    cx: 0.5,
//                    cy: 0.3,
//                    r: 0.7
//                },
//                stops: [
//                    [0, color],
//                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
//                ]
//            };
//        });
        // Highcharts.chart('myChart', {
        //     chart: {
        //         plotBackgroundColor: null,
        //         plotBorderWidth: null,
        //         plotShadow: false,
        //         type: 'pie'
        //     },

        //     title: {
        //         text: ''
        //     },
        //     tooltip: {
        //         pointFormat: '{series.name}: <b>{point.y:f} ({point.percentage:.1f}%)</b>'
        //     },
        //     plotOptions: {
        //         pie: {
        //             showInLegend: true,
        //             allowPointSelect: true,
        //             cursor: 'pointer',
        //             dataLabels: {
        //                 enabled: true,
        //                 useHTML: true,
        //                 formatter: function () {
        //                     var point = this.point,
        //                         width = 50,
        //                         height = 50,
        //                         series = point.series,
        //                         center = series.center,               //center of the pie
        //                         startX = point.labelPos[4],           //connector X starts here
        //                         endX = point.labelPos[0] + 5,         //connector X ends here
        //                         left =  -(endX - startX + width / 2), //center label over right edge
        //                         startY = point.labelPos[5],           //connector Y starts here
        //                         endY = point.labelPos[1] - 5,         //connector Y ends here
        //                         top =  -(endY - startY + height / 2); //center label over right edge


        //                     // now move inside the slice:
        //                     left += (center[0] - startX)/2;
        //                     top += (center[1] - startY)/2;

        //                     if (point.id == 'razr') {
        //                         console.log(this);
        //                         return '<div><b>' + point.y + '</b></div><div style="width: ' + width + 'px; left:' + left + 'px;top:' + top + 'px; text-align: center; position: absolute"><b>sum is:<br/>' + point.summ + ' </b></div>';
        //                     } else return '<b>' + point.y + '<b>';
        //                 }
        //             }
        //         }
        //     },
        //     series: [{
        //         name: 'Ratio',
        //         data: [
        //             {name: 'Male', y: <?= $gender['male'][0]['total'] ?>,color:colors[2]},
        //             {name: 'Female', y: <?= $gender['female'][0]['total'] ?>,color:colors[8]}
        //         ]
        //     }]
        // });
        Highcharts.chart('myChart2', {
          chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
          },
          title: {
            text: ''
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
              }
            }
          },
          series: [{
                name: 'Ratio',
                colorByPoint: true,
                data: [{
                    name: '0 - 9',
                    y: <?= $age_group_child[0][0]['total'] + $age_group_gChild[0][0]['total'] ?>,
                    color:colors[1]
                }, {
                    name: '10 - 12',
                    y: <?= $age_group_child[1][0]['total'] + $age_group_gChild[1][0]['total'] ?>,
                    color:colors[2]
                }, {
                    name: '13 - 18',
                    y: <?= $age_group[0][0]['total'] + $age_group_child[2][0]['total'] + $age_group_gChild[2][0]['total'] ?>,
                    color: colors[3]
                }, {
                    name: '19 - 29',
                    y: <?= $age_group[1][0]['total'] + $age_group_child[3][0]['total'] + $age_group_gChild[3][0]['total'] ?>,
                    color:colors[4]
                }, {
                    name: '30 - 39',
                    y: <?= $age_group[2][0]['total'] + $age_group_child[4][0]['total'] + $age_group_gChild[4][0]['total'] ?>,
                    color:colors[5]
                }, {
                    name: '40 - 49',
                    y: <?= $age_group[3][0]['total'] + $age_group_child[5][0]['total'] + $age_group_gChild[5][0]['total'] ?>,
                    color:colors[6]
                }, {
                    name: '50 - 69',
                    y: <?= $age_group[4][0]['total'] + $age_group_child[6][0]['total'] + $age_group_gChild[6][0]['total'] ?>,
                    color:colors[7]
                }, {
                    name: 'Above 70',
                    y: <?= $age_group[5][0]['total'] + $age_group_child[7][0]['total'] + $age_group_gChild[7][0]['total'] ?>,
                    color:colors[8]
                }
                ]
            }]
        });
        Highcharts.chart('myChart', {
          chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
          },
          title: {
            text: ''
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
              }
            }
          },
          series: [{
                name: 'Ratio',
                data: [
                    {name: 'Male', y: <?= $gender['male'][0]['total'] ?>,color:colors[2]},
                    {name: 'Female', y: <?= $gender['female'][0]['total'] ?>,color:colors[8]}
                ]
            }]
        });
        Highcharts.chart('codesChart', {
          chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
          },
          title: {
            text: ''
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
              }
            }
          },
          series: [{
                name: 'Ratio',
                data: [
                    {
                        name: 'Used', y: <?= $codesused[0]['total'] ?>,
                        color:"#00c558"
                    },
                    {
                        name: 'Unused', y: <?= $codesunused[0]['total'] ?>,
                        //color:"#00a1c5"
                        color:{radialGradient: { cx: 0.1, cy: 0.9, r: 0.5 },
                            stops: [
                                [0, '#003399'],
                                [1, '#3366AA']
                            ]}
                    }
                ]
            }]
        });
        // Highcharts.chart('codesChart', {
        //     chart: {
        //         plotBackgroundColor: null,
        //         plotBorderWidth: null,
        //         plotShadow: false,
        //         type: 'pie'
        //     },
        //     title: {
        //         text: ''
        //     },
        //     tooltip: {
        //         pointFormat: '{series.name}: <b>{point.y:f} ({point.percentage:.1f}%)</b>'
        //     },
        //     plotOptions: {
        //         pie: {
        //             allowPointSelect: true,
        //             cursor: 'pointer',
        //             dataLabels: {
        //                 enabled: true,
        //                 useHTML: true,
        //                 formatter: function () {
        //                     var point = this.point,
        //                         width = 50,
        //                         height = 50,
        //                         series = point.series,
        //                         center = series.center,               //center of the pie
        //                         startX = point.labelPos[4],           //connector X starts here
        //                         endX = point.labelPos[0] + 5,         //connector X ends here
        //                         left =  -(endX - startX + width / 2), //center label over right edge
        //                         startY = point.labelPos[5],           //connector Y starts here
        //                         endY = point.labelPos[1] - 5,         //connector Y ends here
        //                         top =  -(endY - startY + height / 2); //center label over right edge

        //                     // console.log(this.point);
        //                     // now move inside the slice:
        //                     left += (center[0] - startX)/2;
        //                     top += (center[1] - startY)/2;

        //                     if (point.id == 'razr') {
        //                         console.log(this);
        //                         return '<div><b>' + point.y + '</b></div><div style="width: ' + width + 'px; left:' + left + 'px;top:' + top + 'px; text-align: center; position: absolute"><b>sum is:<br/>' + point.summ + ' </b></div>';
        //                     } else return '<b>' + point.y + '<b>';
        //                 }
        //             },
        //             showInLegend:true
        //         }
        //     },
        //     series: [{
        //         name: 'Ratio',
        //         data: [
        //             {
        //                 name: 'Used', y: <?= $codesused[0]['total'] ?>,
        //                 color:"#00c558"
        //             },
        //             {
        //                 name: 'Unused', y: <?= $codesunused[0]['total'] ?>,
        //                 //color:"#00a1c5"
        //                 color:{radialGradient: { cx: 0.1, cy: 0.9, r: 0.5 },
        //                     stops: [
        //                         [0, '#003399'],
        //                         [1, '#3366AA']
        //                     ]}
        //             }
        //         ]
        //     }]
        // });
    });
    function changeDonations(year) {
        $.ajax({
            url: "<?= site_url('admin/getDonationGraph') ?>",
            type: "POST",
            data: {year: year},
            async: false,
            success: function(data) {
                chartData = JSON.parse(data);
                Highcharts.chart('myChart4', {
            chart: {
                type: 'column'
            },
            colors: ['#2ecc71'],
            title: {
                text: ''
            },
            subtitle: {
                text: 'Source: <a href="http://mmsapp.org">' +
                '//mmsapp.org</a>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                allowDecimals: false
//                ,
//                labels: {
//                    formatter: function () {
//                        return this.value; // clean, unformatted number for year
//                    }
//                }
            },
            yAxis: {
                title: {
                    text: 'Total Donations'
                },
                labels: {
                    formatter: function () {
                        return "£ " + this.value;
                    }
                }
            },
            tooltip: {
                pointFormat: '{series.name} produced :£ <b>{point.y:,.1f}</b>'
            },
            plotOptions: {
                area: {
                    //pointStart: <//?= date("Y")?>,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [
                {
                    name: 'Donations',
                    data: [
                        (chartData.dMonths[0][0].amount == "null") ? "null" : parseInt(chartData.dMonths[0][0].amount),
                        (chartData.dMonths[1][0].amount == "null") ? "null" : parseInt(chartData.dMonths[1][0].amount),
                        (chartData.dMonths[2][0].amount == "null") ? "null" : parseInt(chartData.dMonths[2][0].amount),
                        (chartData.dMonths[3][0].amount == "null") ? "null" : parseInt(chartData.dMonths[3][0].amount),
                        (chartData.dMonths[4][0].amount == "null") ? "null" : parseInt(chartData.dMonths[4][0].amount),
                        (chartData.dMonths[5][0].amount == "null") ? "null" : parseInt(chartData.dMonths[5][0].amount),
                        (chartData.dMonths[6][0].amount == "null") ? "null" : parseInt(chartData.dMonths[6][0].amount),
                        (chartData.dMonths[7][0].amount == "null") ? "null" : parseInt(chartData.dMonths[7][0].amount),
                        (chartData.dMonths[8][0].amount == "null") ? "null" : parseInt(chartData.dMonths[8][0].amount),
                        (chartData.dMonths[9][0].amount == "null") ? "null" : parseInt(chartData.dMonths[9][0].amount),
                        (chartData.dMonths[10][0].amount == "null") ? "null" : parseInt(chartData.dMonths[10][0].amount),
                        (chartData.dMonths[11][0].amount == "null") ? "null" : parseInt(chartData.dMonths[11][0].amount)
                    ]
                    // alert(data)
                }
            ]
        });
                
            }
        });
    }
    $(function () {
        Highcharts.chart('myChart4', {
            chart: {
                type: 'column'
            },
            colors: ['#2ecc71'],
            title: {
                text: ''
            },
            subtitle: {
                text: 'Source: <a href="http://mmsapp.org">' +
                '//mmsapp.org</a>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                allowDecimals: false
//                ,
//                labels: {
//                    formatter: function () {
//                        return this.value; // clean, unformatted number for year
//                    }
//                }
            },
            yAxis: {
                title: {
                    text: 'Total Donations'
                },
                labels: {
                    formatter: function () {
                        return "£ " + this.value;
                    }
                }
            },
            tooltip: {
                pointFormat: '{series.name} produced :£ <b>{point.y:,.1f}</b>'
            },
            plotOptions: {
                area: {
                    //pointStart: <//?= date("Y")?>,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [
                {
                    name: 'Donations',
                    data: [
                        <?php for($i=0;$i<12;$i++){ ?>
                        <?= ($dMonths[$i][0]['amount'] == NULL) ? "null" : $dMonths[$i][0]['amount']; ?><?= ($i<=11) ? "," : "" ; ?>
                        <?php } ?>
                    ]
                }
            ]
        });
    });
    $(document).ready(function(){
       $(".highcharts-credits").css("display","none");
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
<script>
    var ctx = document.getElementById("myChart5");
    var data = {
        labels: [
            <?php $i=1; foreach($countryOrigin as $k=>$v){ ?>
                "<?= ($v['nativeCountry'] == '') ? 'New Registered' : $v['nativeCountry'] ; ?>"
                <?php if($i < count($countryOrigin)){ echo ","; } ?>
            <?php $i++; } ?>
        ],
        datasets: [{
            label: "",
            backgroundColor: "#6dbb4a",
            borderWidth: 1,
            hoverBackgroundColor: "#6dbb4a",
            data: [
                <?php $i=1; foreach($countryOrigin as $k=>$v){ ?>
                    <?php echo $v['total'] ?>
                    <?php if($i < count($countryOrigin)){ echo ","; } ?>
                <?php $i++; } ?>
            ]
        }]
    };
    var myBarChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: data,
        options: {scales: {xAxes: [{stacked: true}], yAxes: [{stacked: true}]}}
    });
</script>
<!--<link rel="stylesheet" href="--><?//= base_url('assets_b/clock/example') ?><!--/css/demo.css"/>-->
<!--<script type="text/javascript" src="--><?//= base_url('assets_b/clock/example') ?><!--/js/clock-1.1.0.min.js"></script>-->
<script src="https://www.jqueryscript.net/demo/Customizable-Analog-Alarm-Clock-with-jQuery-Canvas-thooClock/js/jquery.thooClock.js"></script>
<!--<script src="--><?//= base_url('assets_b/clock/example') ?><!--/js/jquery.thooClock.js"></script>-->
<script>
    $('#clock').thooClock({
        /* OPTIONS and CALLBACKS HERE */
        size:300,
        dialColor:'#000000',
        dialBackgroundColor:'transparent',
        secondHandColor:'#F3A829',
        minuteHandColor:'#222222',
        hourHandColor:'#222222',
        alarmHandColor:'#FFFFFF',
        alarmHandTipColor:'#026729',
        hourCorrection:'+0',
        alarmCount:1,
        showNumerals:true
    });
    setInterval(function(){
        $('#clock canvas').css('margin-right','auto');
        $('#clock canvas').css('margin-left','auto');
        $('#clock canvas').css('display','block');
    },100);
//    var clock1 = $("#clock").clock({
//        theme: 't3'
//    });
$(document).ready(function() { 
        $('.default').css('width', '100%!important');
        var zone = "00:00";
        $.ajax({
            url: "<?= site_url('admin'); ?>/fullCalendar",
            type: "POST",
            async: false,
            success: function(s){
                console.log(s);
                json_events = s;
            }
        });
        
        var currentMousePos = {
            x: -1,
            y: -1
        };
        $(document).on("mousemove", function(event){
            currentMousePos.x = event.pageX;
            currentMousePos.y = event.pageY;
        });
        
        $('#calendar').fullCalendar({
            events: JSON.parse(json_events),
            utc: true,
            customButtons: {
                myCustomButton: {
                  text: 'View Event Log',
                  click: function() {
                    window.location.href="<?= site_url('admin/fetchCalendar') ?>"
                  }
                },
                addEvent: {
                    text: 'Add Event',
                    click: function() {
                        window.location.href="<?= site_url('admin/view/addCalendar') ?>"
                    }
                }
              },
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'myCustomButton, addEvent'
            },
            editable: true,
            eventLimit: true,
            displayEventTime: false,
            eventLimitText: "More Upcoming Event",
            views: {
              month: {
                  eventLimit: 2
              },
              agenda: {
                  eventLimit: 2
              }
            },
            droppable: true,
            slotDuration: '00:30:00',
            eventClick:function(event)
            {
                window.location.href = "<?= site_url('admin/fetchCalendar'); ?>";
            },
            selectable:true,
            selectHelper:true,
            selectLongPressDelay: 100,
            eventLongPressDelay: 100,
            longPressDelay: 100,
            select: function(start, end, allDay)
            {
                window.location.href = "<?= site_url('admin/view/addCalendar'); ?>";
            },
        });
        // $("#starts-at, #ends-at").datetimepicker();
        $('#save-event').on('click', function(){
                var title = $('#title').val();
                var link = $('#link').val();
                var image = $('#image').val();
                var desc = $('#desc').val();
                var eventDate = $('#eventDate').val();
                var startsAt = $('#starts-at').val();
                var endAt = $('#ends-at').val();
                if(title != ''){
                    if(desc != ''){
                        if(eventDate != ''){
                            if(startsAt != ''){
                                if(endAt != ''){
                                    $.ajax({
                                        url: "<?= base_url('admin') ?>/addFullCalendar",
                                        type: "POST",
                                        data: {title:title,link:link,image:image,desc:desc,eventDate:eventDate,startsAt:startsAt,endAt:endAt},
                                        success:function(e){
                                            $('#calendar').fullCalendar('refetchEvents');
                                            $(".modal").modal("hide");
                                            swal({
                                              title: 'Are you sure?',
                                              text: "Do you want to set reminder?",
                                              type: 'question',
                                              showCancelButton: true,
                                              confirmButtonColor: '#3085d6',
                                              cancelButtonColor: '#d33',
                                              confirmButtonText: 'Yes!',
                                              cancelButtonText: 'No, Then Enjoy!'
                                            }).then((result) => {
                                              if (result.value) {
                                                openNewModal();
                                              }
                                            });
                                        }
                                    });
                                }else{
                                    swal({
                                        title: 'Danger',
                                        text: 'End Time can\'t be empty!!!',
                                        type: 'error',
                                        // showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Fill!',
                                        // cancelButtonText: 'No, Then Enjoy!'
                                    }).then((result) => {
                                        if(result.value) {
                                            $('#ends-at').focus();
                                            return false;
                                        }
                                    });
                                }
                            }else{
                                swal({
                                    title: 'Danger',
                                    text: 'Start Time can\'t be empty!!!',
                                    type: 'error',
                                    // showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Fill!',
                                    // cancelButtonText: 'No, Then Enjoy!'
                                }).then((result) => {
                                    if(result.value) {
                                        $('#starts-at').focus();
                                        return false;
                                    }
                                });
                            }
                        }else{
                            swal({
                                title: 'Danger',
                                text: 'Event Date must be filled!!!',
                                type: 'error',
                                // showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Fill!',
                                // cancelButtonText: 'No, Then Enjoy!'
                            }).then((result) => {
                                if(result.value) {
                                    $('#eventDate').focus();
                                    return false;
                                }
                            });
                        }
                    }else{
                        swal({
                            title: 'Danger',
                            text: 'Event Description can\'t be empty!!!',
                            type: 'error',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Fill!',
                            // cancelButtonText: 'No, Then Enjoy!'
                        }).then((result) => {
                            if(result.value) {
                                $('#desc').focus();
                                return false;
                            }
                        });
                    }
                }else{
                    swal({
                        title: 'Danger',
                        text: 'Title can\'t be empty!!!',
                        type: 'error',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Fill!',
                        // cancelButtonText: 'No, Then Enjoy!'
                    }).then((result) => {
                        if(result.value) {
                            $('#title').focus();
                            return false;
                        }
                    });
                }
            });
        function openNewModal(){
            var modal1 = $('#modal_clndr_new_event').modal("hide");
            $('#modal-group-1').modal("show");
        }
        $('#setReminder').on('click', function(){
            var reminder = $("#clndr_event_remind_control").val();
            $.post("<?= site_url('admin/updateReminder') ?>", {reminder_event:reminder,isReminded:1}, function(e){
                console.log(e);
                swal({
                        title: 'Congratulation!',
                        text: 'Event Saved Successfully with Reminder.',
                        type: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Done!',
                        // cancelButtonText: 'No, Then Enjoy!'
                    }).then((result) => {
                        if(result.value) {
                            window.location.reload();
                        }else{
                            swal(
                                    'Congratualtion!',
                                    'Event Saved successfully without reminder.',
                                    'success'
                                );
                        }
                });
            });
        });
    });
    $("#member").click(function(){
        if($("#member").is(":checked")){
            $(".member").css('display', '');
        }else{
            $(".member").css('display', 'none');
        }
    });
    
    $('#member').on('click', function(){
        if($(this). prop("checked") == true){
            $('#bGroup').attr('disabled', true);
            $('.bgroup').css('display', 'none');
            $('#church').attr('disabled', true);
            $('.church').css('display', 'none');
        }else{
            $('#bGroup').attr('disabled', false);
            $('.bgroup').css('display', 'none');
            $('#church').attr('disabled', false);
            $('.church').css('display', 'none');
        }
    });
    
    $("#bGroup").click(function(){
        if($("#bGroup").is(":checked")){
            $(".bgroup").css('display', '');
            $('#bgroup1').prop('required', true);
            $('#mem').removeAttr('required');
            $('#member').attr('disabled', true);
            $('#church').attr('disabled', true);
            $('.member').css('display', 'none');
            $('.church').css('display', 'none');
        }else{
            $(".bgroup").css('display', 'none');
            $('#member').attr('disabled', false);
            $('#bgroup1').prop('required', false);
            $('#mem').prop('required',true);
            $('#church').attr('disabled', false);
            $('.member').css('display', '');
            $('.church').css('display', 'none');
        }
    });
    
    $("#church").click(function() {
        if($("#church").is(":checked")){
            $(".church").css('display', '');
            $('#mem').removeAttr('required');
            $('#church1').prop('required', true);
            $('#member').attr('disabled', true);
            $('#bGroup').attr('disabled', true);
            $('.member').css('display', 'none');
            $('.bGroup').css('display', 'none');
        }else{
            $(".church").css('display', 'none');
            $('#member').attr('disabled', false);
            $('#mem').prop('required',true);
            $('#church1').prop('required', false);
            $('#bGroup').attr('disabled', false);
            $('.member').css('display', '');
            $('.bGroup').css('display', 'none');
        }
    });
    $('.chosen-toggle').each(function(index) {
        $(this).on('click', function(){
            console.log($(this).parent().next('div').find('option'));
            if($(this). prop("checked") == true){
                $(this).parent().next().find('option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
            }else{
                clearSelected();
                $('#mem').trigger("chosen:updated");
            }
        });
    });
    function clearSelected(){
        var elements = document.getElementById("mem").options;
        console.log(elements.length);
        for(var i = 0; i < elements.length; i++){
          if(elements[i].selected)
            elements[i].selected = false;
        }
      }
    <?php if(isset($_GET['received'])){ ?>
    setTimeout(function(){
        swal('Congratulation', 'Event Added Successfully', 'success');
    },1000);
    <?php } ?>
</script>
<script>
    var one = $("#oneDayEvent").html();
    var multi = $("#multiDayEvent").html();
    $("#multiDayEvent").html("");

    function changeEventTypee(a){
        if(a == 'one'){
            $("#oneDayEvent").html(one);
            $("#oneDayEvent").css('display', 'block');
            $("#multiDayEvent").css('display', 'none');
            // $("#clndr_new_event_submit").attr("onclick","addReminder()");
        }else{
            $("#oneDayEvent").css('display', 'none');
            $("#multiDayEvent").css('display', 'block');
            $("#multiDayEvent").html(multi);
            // $("#clndr_new_event_submit").attr("onclick", "addMultiReminder()");
        }
    }
</script>
<script>
ci = 1;
    function addBuild(){
        // alert('hello');
        var child = "<div id='ChildField"+ci+"' data-uk-grid-margin>" +
                    "<div class='row'>" + 
                        "<div class='col-md-12'>" + 
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-calendar'></i></span>" + 
                                "<label for='clndr_event_date_control1'>Event Date</label>" +
                                "<input type='date' name='eventDate1["+ci+"][<?= 'eventDate' ?>]' id='eventDate1["+ci+"][<?= 'eventDate' ?>]' class='form-control'/>"+
                                // "<input style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' class='md-input' type='date' id='clndr_event_date_control1['"+ci+"'][<?= 'eventDate' ?>]' name='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]' min='<?= date('Y-m-d') ?>'>" +
                                    // "<input  style='border-radius:0; border-width:0 0 1px; border-style:solid; border-color: rgba(0,0,0,.12); font:400 12px/18px Roboto, sans-serif;box-shadow:inset 0 -1px 0 transparent;box-sizing:border-box;padding 12px 4px;width: 100%;display:block;' class='md-input' type='date' id='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]' name='clndr_event_date_control1["+ci+"][<?= 'eventDate' ?>]'> + 
                        "</div>" + 
                    "</div>" +
                    "<div class='row'>" +
                        "<div class='col-md-12'>" +
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-clock-o'></i></span>" +
                                "<label for='clndr_event_start_control1'>Event Start</label>" +
                                    "<input type='time' name='starts_at1["+ci+"][<?= 'eventStart' ?>]' id='starts-at1["+ci+"][<?= 'eventStart' ?>]' class='form-control'/>" +
                        "</div>" +
                    "</div>" +
                    "<div class='row'>" +
                        "<div class='col-md-12'>" +
                            "<span class='uk-input-group-addon'><i class='uk-input-group-icon uk-icon-clock-o'></i></span>" +
                                "<label for='clndr_event_end_control1'>Event End</label>" +
                                    "<input type='time' name='ends_at1["+ci+"][<?= 'eventEnd' ?>]' id='ends-at1["+ci+"][<?= 'eventEnd' ?>]' class='form-control'/>" +
                        "</div>" +
                    "</div>" +
        "<hr/><div class='row'></div>";

        $("#child").prepend(child);
        ci++;
    };
    function removechild(id){
        $("#ChildField"+id).remove();
    }
    $('.chosen-toggle').each(function(index) {
        $(this).on('click', function(){
            if($(this). prop("checked") == true){
                console.log($(this).parent().find('option').prop('selected', $(this).hasClass('select')).parent());
                $(this).parent().find('option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
            }else{
                clearSelected();
                $('#mem').trigger("chosen:updated");
            }
        });
    });
    function clearSelected(){
        var elements = document.getElementById("mem").options;
        console.log(elements.length);
        for(var i = 0; i < elements.length; i++){
          if(elements[i].selected)
            elements[i].selected = false;
        }
      }
</script>

<script type="text/javascript">
    function check(){
      var imgpath=document.getElementById('image');
      if (!imgpath.value==""){
        var img=imgpath.files[0].size;
        var imgsize=(img/1024)/1024; 
        if(imgsize >= 6){
            alert('Image size is greater than expected.');
            return false;
        }
        return true;
      }
    }
    setTimeout(function(){changeTestChart(2020)},5000)
    setTimeout(function(){changeTestChart(2020)},5000)
    
    setTimeout(function(){changeDonations(2020)},5000)
    setTimeout(function(){changeDonations(2020)},5000)
    
    setTimeout(function(){changeFTimer(2020)},5000)
    setTimeout(function(){changeFTimer(2020)},5000)

    
    
</script>

<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>