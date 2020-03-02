<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Manage Codes</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">View Codes
                        <span style="float : right;">
                            <a onclick="uploadMember()" title="Generate Unused Codes"><i class="md-icon material-icons">get_app</i></a>
                        </span>
                    </header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableCode" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Created</td>
                                    <!--<td>Access URL</td>-->
                                    <td>URL & Code</td>
                                    <td>Status</td>
                                    <td>Used date</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($codes as $val){ ?>
                                    <tr>
                                        <td><?= $val['created'] ?></td>
                                        <!--<td><a href="<?= base_url() ?>">www.rccgvhl.mmsapp.org</a></td>-->
                                        <td><?= "Access Point: <a href='".base_url()."'>www.rccgvhl.mmsapp.org</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Validation Code: ". $val['code'] ?></td>
                                        <td><?= $val['status'] ?></td>
                                        <td>
                                            <?php
                                            if($val['status'] == "unused"){
                                                echo "Not Used";
                                            }else{
                                                echo $val['used'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a onclick="deleteConff('<?= site_url('admin/delete/code/'.$val['id']."/same") ?>')"><i class="fa fa-close"></i></a>
                                        </td>
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
</section>
<div class="conf"></div>
<script>
    function uploadMember(){
        var a = "<div class='modal fade' id='uploadMember' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> "+
                "<div class='modal-dialog modal-md' role='document'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                "<span aria-hidden='true'>x</span>"+
                "</button>"+
                "<h4 style='text-align: center; font-weight: bold;' class='modal-title' id='mySmallModalLabel'>"+
                "Generate Unused Codes"+
                "</h4>"+
                "</div>"+
                "<div class='modal-body'>"+
                "<form action='<?= site_url('admin/save_unused_code')?>' method='post' enctype='multipart/form-data'>"+
                "<select name='q' class='form-control' >"+
                    "<option value='10'>Number Of Codes</option>"+
                    "<option value='1'>1</option>"+
                    "<option value='10'>10</option>"+
                    "<option value='50'>50</option>"+
                    "<option value='100'>100</option>"+
                    "<option value='200'>200</option>"+
                    "<option value='500'>500</option>"+
                "</select>"+
                "<br/>"+
                "<br/>"+
                "<button type='submit' class='btn btn-success' value='Upload'>Generate PDF</button>"+
                "</form>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "</div>";
            $(".conf").html(a);
            $("#uploadMember").modal('toggle');
    }
    function deleteConff(link){
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