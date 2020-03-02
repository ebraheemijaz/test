<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">View Bulletin</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Manage Bulletin</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Date</td>
                                <td>Title</td>
                                <td>Thumbnail</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($bulletin as $val){ ?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['date'])) ?></td>
                                    <td><?= $val['title'] ?></td>
                                    <td><a onclick="bigImg('<?= base_url(); ?><?= $val['image'] ?>');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= base_url(); ?><?= $val['image'] ?>" alt="" style="width:150px"/></a></td>
                                    <td style="word-break: break-all"><?= strip_tags(substr($val['text'],0,100)); ?>...</td>
                                    <td>
                                        <a href="<?= site_url('admin/read_bulletin/'.$val['id']) ?>"><i class="fa fa-eye"></i></a>
                                        /
                                        <a href="<?= site_url('admin/edit/'.$val['id']."/bulletin/edit_bulletin") ?>"><i class="fa fa-pencil"></i></a>
                                        /
                                        <a onclick="deleteConff('<?= site_url('admin/delete/bulletin/'.$val['id']."/same") ?>')" link="<?= site_url('admin/delete/bulletin/'.$val['id']."/same") ?>"><i class="fa fa-close"></i></a>
                                    </td>
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
<div class="conf"></div>
<script>
    function bigImg(url){
        if(navigator.userAgent.match(/iPhone/i)){
            deg = '0deg';
        }else{
            deg = '90deg';
        }
            var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document' style='width: 250px !important;'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
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
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
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