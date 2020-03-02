<?php
$v = $members[0];
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
                    <li><a href="<?= site_url(); ?>/admin/view/manage_users">Member List</a></li>
                    <li><a href="#">Member Profile</a></li>
                </ul>
                <ul>
                    <li style="text-align:right;"><a href="<?= site_url('admin/view/upd_member') ?>/<?= $v['id'] ?>" class="btn btn-success"><i class="fa fa-pencil"></i>Edit Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <aside class="profile-nav col-lg-12">
                <section class="panel">
                    <div class="user-heading round">
                            <?php $image = (empty($v['image'])) ? base_url('assets_f/img/business/male.jpg') : base_url('assets_f/img/business')."/".$v['image']; ?>
                            <!--<img src="<?= $image ?>" alt="">-->
                           <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <?php
                                        if($exif['Orientation'] == 6){
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '6');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(90deg);" /></a>
                                        <?php
                                        }else if($exif['Orientation'] == 8){
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '8');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-90deg);" /></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a onclick="bigImg('<?= $image ?>', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                        <?php
                                        }
                                        ?>
                        <h1 style="font-weight: 900"><?= ucfirst($v['fname']) ?> <?= ucfirst($v['lname']) ?></h1>
                        <p><?= $v['email'] ?></p>
                        <p>
                            <div class="rating">
                                <?php for($i=5;$i>=1;$i--){ ?>
                                    <?php if($i > $ratingAvg[0]['rating']){ ?>
                                        <span class="unfilled">☆</span>
                                    <?php }else{ ?>
                                        <span class="filled">☆</span>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </p>
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
                                        <td><?= $v['title'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>First Name :</th>
                                        <td><?= $v['fname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Name :</th>
                                        <td><?= $v['lname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Country of Origin :</th>
                                        <td><?= $v['nativeCountry'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>
                                            <?= $v['address'] ?>
                                            <br/>
                                            <?= $v['address2'] ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Town :</th>
                                        <td><?= $v['town'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Postal Code :</th>
                                        <td><?= $v['poatalCode'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Job Status : </th>
                                        <td><?= $v['employement']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Marital Status : </th>
                                        <td><?= $v['maritalStatus']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <th>Username : </th>
                                        <td><?= $v['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Age Group : </th>
                                        <td><?php if($v['age_group'] == 18){ echo '13 - 18'; }else if($v['age_group'] == 29){ echo '19 - 29'; }else if($v['age_group'] == 39){ echo '30 - 39'; }else if($v['age_group'] == 49){ echo '40 - 49'; }else if($v['age_group'] == 69){ echo '50 - 69'; }else if($v['age_group'] == 70){ echo 'Above 70'; }?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender :</th>
                                        <td><?= $v['gander'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date Of Birth :</th>
                                        <td><?= date("d / M",strtotime("2016/".$v['birth_month']."/".$v['birth_date'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Member Since : </th>
                                        <?php 
                                            if($v['member_since_month'] == 1){
                                                $mon = "Jan";
                                            }else if($v['member_since_month'] == 2){
                                                $mon = "Feb";
                                            }else if($v['member_since_month'] == 3){
                                                $mon = "Mar";
                                            }else if($v['member_since_month'] == 4){
                                                $mon = "Apr";
                                            }else if($v['member_since_month'] == 5){
                                                $mon = "May";
                                            }else if($v['member_since_month'] == 6){
                                                $mon = "Jun";
                                            }else if($v['member_since_month'] == 7){
                                                $mon = "Jul";
                                            }else if($v['member_since_month'] == 8){
                                                $mon = "Aug";
                                            }else if($v['member_since_month'] == 9){
                                                $mon = "Sep";
                                            }else if($v['member_since_month'] == 10){
                                                $mon = "Oct";
                                            }else if($v['member_since_month'] == 11){
                                                $mon = "Nov";
                                            }else if($v['member_since_month'] == 12){
                                                $mon = "Dec";
                                            }
                                        ?>
                                        <?php $memberDate = $mon." / ".(int)$v['member_since_year'];?>
                                        <td><?= $memberDate; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Hobbies :</th>
                                        <td><?= $v['hobbies'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Home #:</th>
                                        <td><?= $v['homeNo'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mobile :</th>
                                        <td><?= $v['mobileNo'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td><?= $v['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date Joined :</th>
                                        <td><?= date("d-M-Y",strtotime($v['dOfJoining'])); ?></td>
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
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                About Me
                                            </a>
                                            <?php if(!empty($userAdmin)){ ?>
                                                <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                    <a href="<?= site_url('home/view/edit_career'); ?>">
                                                        <i style="float: right;" class="fa fa-pencil"></i>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>

                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="">
                                        <div class="panel-body">
                                            <p>
                                                <?= $v['biography'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Profession
                                            </a>
                                            <?php if(!empty($userAdmin)){ ?>
                                                <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                    <a href="<?= site_url('home/view/edit_career'); ?>">
                                                        <i style="float: right;" class="fa fa-pencil"></i>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>

                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="">
                                        <div class="panel-body">
                                            <p>
                                                <?= $this->data->fetch('businessgroup', array('id'=>$v['businessGroup']))[0]['name']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Church Group
                                            </a>
                                            <?php if(!empty($userAdmin)){ ?>
                                                <?php if($userAdmin[0]['id'] == $v['id']){ ?>
                                                    <a href="<?= site_url('home/view/edit_career'); ?>">
                                                        <i style="float: right;" class="fa fa-pencil"></i>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>

                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="">
                                        <div class="panel-body">
                                                <?php
                                                    $churchGroups = $this->data->fetch('membgroup', array('user_id' => $v['id']));
                                                    echo "<ul>";
                                                    foreach($churchGroups as $chG){
                                                        echo "<li>".$this->data->fetch('churchgroup', array('id' => $chG['g_id']))[0]['name']."</li>";
                                                    }
                                                    echo "</ul>";
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#children">
                                                Children
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="children" class="">
                                        <div class="panel-body">
                                            <?php $child = $v['child']; ?>

                                            <?php if(!empty($child)){ ?>
                                                <?php for($i=0;$i<count($child);$i++){ ?>
                                                     <div class="bio-row">
                                                         <p>
                                                             <span> First Name </span>:
                                                             <?= $child[$i]['fname'] ?>
                                                         </p>
                                                     </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Last Name </span>:
                                                            <?= $child[$i]['lname'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Email </span>:
                                                            <?= $child[$i]['email'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Contact </span>:
                                                            <?= $child[$i]['mobile'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Birthday</span>:
                                                            <?= date("d / M",strtotime("2017/".$child[$i]['month']."/".$child[$i]['day'])); ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Gender </span>:
                                                            <?= $child[$i]['gender'] ?>
                                                        </p>
                                                    </div>

                                                    <div class="row"></div>
                                                    <hr/>
                                                <?php } ?>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#gchildren">
                                                Grand Children
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="gchildren" class="">
                                        <div class="panel-body">
                                            <?php $child = $v['grandChild']; ?>
                                            <?php if(!empty($child)){ ?>
                                                <?php for($i=0;$i<count($child);$i++){ ?>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> First Name </span>:
                                                            <?= $child[$i]['fname'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Last Name </span>:
                                                            <?= $child[$i]['lname'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Email </span>:
                                                            <?= $child[$i]['email'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Contact </span>:
                                                            <?= $child[$i]['mobile'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Birthday</span>:
                                                            <?= date("d / M",strtotime("2017/".$child[$i]['month']."/".$child[$i]['day'])); ?>
                                                        </p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p>
                                                            <span> Gender </span>:
                                                            <?= $child[$i]['gender'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="row"></div>
                                                    <hr/>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                Reviews
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="">
                                        <div class="panel-body">
                                            <?php if(!empty($rating)){ ?>
                                                <div class="col-md-12">
                                                    <?php foreach($rating as $val){ ?>

                                                        <div class="activity terques">
                                                            <span>
                                                                <i class="fa fa-star"></i>
                                                            </span>
                                                            <div class="activity-desk">
                                                                <div class="panel">
                                                                    <div class="panel-body">
                                                                        <div class="arrow"></div>
                                                                        <i class="fa fa-time"></i>
                                                                        <h4><?= $val['member'][0]['fname'] ?> <?= $val['member'][0]['lname'] ?></h4>
                                                                        <div class="rating" style="float:right !important;">
                                                                            <?php for($i=5;$i>=1;$i--){ ?>
                                                                                <?php $val['rating']; ?>
                                                                                <?php if($i > $val['rating']){ ?>
                                                                                    <span style="background: transparent;color:black;" class="unfilled">☆</span>
                                                                                <?php }else{ ?>
                                                                                    <span style="background: transparent;color:black;" class="filled">☆</span>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <p><?= $val['review'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                    <?php } ?>
                                                </div>
                                            <?php }else{ ?>
                                                <p>No Reviews Yet</p>
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
<div class="conf"></div>
<script>
    function bigImg(url, ori){
        if(navigator.userAgent.match(/iPhone/i)){
            deg = '0deg';
        }else{
            deg = '90deg';
        }
        if(ori == '6'){
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 300px !important;'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true'  data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img class='detect' src='"+url+"' style='transform: rotate("+deg+");height: auto; width: 300px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }else if(ori == '8'){
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 300px !important;'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true'  data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img class='detect8' src='"+url+"' style='transform: rotate(-90deg);height: auto; width: 300px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }else{
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 300px !important;'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close' style='margin-top: -17px;'> " +
            "<span aria-hidden='true' data-dismiss='modal' aria-label='Close'>×</span> " +
            "</button> " +
            "</div> " +
            "<div class='modal-body' style='height: auto;'> " +
            "<img src='"+url+"' style='height: auto; width: 300px;'/>"+
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        }
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
</script>
