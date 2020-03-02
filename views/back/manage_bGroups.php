<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Business Groups</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Business Groups</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableBusiness" class="table table-hover">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($businessGroup as $val){ ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $val['name'] ?></td>
                                    <?php $status = ($val['status'] == 'verified') ? "Unverified" : "Verified"; ?>
                                    <td><a href="<?= site_url('admin/statusgroup/'.$val['id']."/".$status."/businessgroup/manage_bGroups") ?>"><?= $val['status'] ?></a></td>
                                    <td>
                                        <a onclick="opentConf(<?= $val['id'] ?>)"><i class="fa fa-close"></i></a>
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
<script>
    function opentConf(id){
        var url = "<?= site_url('admin/delete/businessgroup/') ?>/"+id+"/same";
        var a = "<button data-dismiss='modal' class='btn btn-info' type='button'>" +
            "Cancel" +
            "</button>" +
            "<a href='"+url+"'>" +
            "<span class='btn btn-danger'>" +
            "Yes" +
            "</span>" +
            "</a>";
        $(".modal-footer").html(a);
        $("#myModal").modal("show");
    }
</script>
<div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='myModal' class='modal fade'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                <h4 class='modal-title'>Are you sure?</h4>
            </div>
            <div class='modal-body'>
                <p>Are you sure you want to delete it?</p>
            </div>
            <div class='modal-footer'>

            </div>
        </div>
    </div>
</div>