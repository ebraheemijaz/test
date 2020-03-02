<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Book Store</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Books in store</header>
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Updated</td>
                                    <td>Title</td>
                                    <td>Author</td>
                                    <td>Description</td>
                                    <td>Book</td>
                                    <td>Publication Year</td>
                                    <td>Price</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($books as $val){ ?>
                                    <tr>
                                        <td><?= date("d-M-Y",strtotime($val['updated'])); ?></td>
                                        <td><?= $val['title'] ?></td>
                                        <td><?= $val['author'] ?></td>
                                        <td>

                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?= $val['id'] ?>">Read More</button>
                                            <!-- Modal -->
                                            <div id="myModal<?= $val['id'] ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><?= $val['title'] ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Content : </strong></p>
                                                            <p><?= $val['desc'] ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <a data-toggle="modal" data-target="#myModal1<?= $val['id'] ?>">Read Book</a>
                                            <!-- Modal -->
                                            <div id="myModal1<?= $val['id'] ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><?= $val['title'] ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Title : </strong></p>
                                                            <p><?= $val['title'] ?></p>
                                                            <p><strong>Cover Image : </strong></p>
                                                            <p><img src="<?= base_url("assets_f/img")."/".$val['image'] ?>" style="width: 200px; height: 200px;"></p>
                                                            <p><strong>Author : </strong></p>
                                                            <p><?= $val['author'] ?></p>
                                                            <p><strong>Publication Year : </strong></p>
                                                            <p><?= $val['yop'] ?></p>
                                                            <p><strong>Content : </strong></p>
                                                            <!--<p><?= $val['desc'] ?></p>-->
                                                            <!--<p><iframe src="<?= base_url("assets_f/img")."/".$val['file'] ?>" style="width: 500px; height: 500px;"></iframe></p>-->
                                                            <p><object data="<?= base_url("assets_f/img")."/".$val['file'] ?>#view=Fit" width="100%" height="850">
                                                                <p>
                                                                    It appears your Web browser is not configured to display PDF files. No worries, just <a href="your_file.pdf">click here to download the PDF file.</a>
                                                                </p>
                                                            </object></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                        <!--<td><a href="<?= base_url('assets_f/img')."/".$val['file']; ?>" target="_blank">Read Book</a></td>-->
                                        <td><?= $val['yop'] ?></td>
                                        <td><?= ($val['price'] == 0) ? "Free" : "£ ".$val['price']; ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/edit/'.$val['id']."/books/edit_books") ?>"><i class="fa fa-pencil"></i></a>
                                            /
                                            <a onclick="deleteConff('<?= site_url('admin/delete/books/'.$val['id']."/same") ?>')"><i class="fa fa-close"></i></a>
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