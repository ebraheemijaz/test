<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Attendance</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">View Attendance</header>
                    <div class="panel-body">
                        <a href="<?= site_url('admin/view') ?>/add_attendance"><span class="btn btn-primary">Record </span></a>
                        <!--<span onclick="window.print();" class="btn btn-success">Print </span>-->
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Date Posted</td>
                                    <td>Admin User</td>
                                    <td>Date Of Attendance</td>
                                    <td>Congregation Attendance</td>
                                    <td>Youth Church</td>
                                    <td>Children Church</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($attendance as $val){ ?>
                                    <tr>
                                        <td><?= date("d-M-Y",strtotime($val['post'])) ?></td>
                                        <td><?= $this->data->fetch('credentials', array('id' => $val['adminUser']))[0]['name'] ?></td>
                                        <td><?= date("d-M-Y",strtotime($val['date'])) ?></td>
                                        <td><?= $val['number'] ?></td>
                                        <td><?= $val['youthNumber'] ?></td>
                                        <td><?= $val['childrenNumber'] ?></td>
                                        <td><a href="<?= site_url('admin/view/edit_attendance') ?>/<?= $val['id'] ?>"><i class="fa fa-pencil"></i></a> | <a onclick="deleteConff('<?= site_url('admin/delete/attendance/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a></td>
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