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
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Manage Reviews</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Review</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>User No</td>
                                <td>Name</td>
                                <td>Gender</td>
                                <td>Picture</td>
                                <td>Average Rating</td>
                                <td>Details</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($members as $val){ ?>
                                <tr>
                                    <td><?= $val['id'] ?></td>
                                    <td><?= ucfirst($val['fname'])." ".ucfirst($val['lname']) ?></td>
                                    <td><?= ucfirst($val['gander']); ?></td>
                                    <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                                        <!--<img src="<?= base_url('assets_f/img/business') ?>/<?= $val['image'] ?>" style="width:100px" alt=""/>-->
                                    </td>
                                    <td>
                                        <div class="rating">
                                            <?php for($i=5;$i>=1;$i--){ ?>
                                                <?php if($i > $val['ratingAvg'][0]['rating']){ ?>
                                                    <span class="unfilled">☆</span>
                                                <?php }else{ ?>
                                                    <span class="filled">☆</span>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td><a href="<?= site_url('admin/view/view_reviews') ?>/<?= $val['id'] ?>">View</a></td>
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
</section>