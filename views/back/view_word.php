<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">View Word</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Word</header>
                    <div class="panel-body">
                        <form class="form-inline" role="form" action="<?= site_url('admin/search_live') ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="Search by Wordlog" style="font-size: 12px!important; width:200px!important;"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="submit">Search</button>
                            </div>
                        </form>
                        <br/>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                
                                <td width="15%">Date Posted</td>
                                <td width="15%">Date Preached</td>
                                <td width="10%">Preacher Name</td>
                                <td width="20%">Topic Preached</td>
                                <td width="35%">Description</td>
                                <td width="5%">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($words as $val){ ?>
                                <tr>
                                    
                                    <td><?= date('d-M-Y', strtotime($val['date_created'])); ?></td>
                                    <td><?= date('d-M-Y', strtotime($val['date_preached'])); ?></td>
                                    <td><?= $val['preacher_name'] ?></td>
                                    <td><?= $val['topic'] ?></td>
                                    <td><?= substr(strip_tags($val['message']),0,100); ?> <a href="#" data-target="#details<?= $val['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a> </td>
                                    <td>
                                        <a href="<?= site_url('admin/view/editWord/'.$val['id']); ?>"><i class="fa fa-pencil"></i></a> | <a onclick="deleteConff('<?= site_url('admin/delete/words/'.$val['id']."/same") ?>')" link="<?= site_url('admin/delete/words/'.$val['id']."/same") ?>"><i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!--<td colspan="6" align="right"><?= $this->pagination->create_links(); ?></td>-->
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
</script>
<div class="conf"></div>
<?php foreach($words as $val){ ?>
    <div class="modal fade in" id="details<?= $val['id'] ?>" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-backdrop fade in" style="height: 560px;"></div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                        Details
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?= $val['date_created'] ?></p>
                    <p><?= $val['preacher_name'] ?></p>
                    <p><?= $val['topic'] ?></p>
                    <p><?= $val['message']; ?></p>
                    <?php if($val['checkRadio'] == 'yes'){ ?>
                        <p><a href="<?= base_url().$val['uploadFile'] ?>">Download</a></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

