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
<style>

    .rating {
        float:left;
        width:300px;
    }
    .rating span { float:right; position:relative; }
    .rating span input {
        position:absolute;
        top:0px;
        left:0px;
        opacity:0;
    }
    .rating span label {
        display:inline-block;
        width:30px;
        height:30px;
        text-align:center;
        color:#FFF;
        background:#ccc;
        font-size:30px;
        margin-right:2px;
        line-height:30px;
        border-radius:50%;
        -webkit-border-radius:50%;
    }
    .rating span:hover ~ span label,
    .rating span:hover label,
    .rating span.checked label,
    .rating span.checked ~ span label {
        background:#F90;
        color:#FFF;

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
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Date</td>
                                <td>Review No</td>
                                <td>Given By</td>
                                <td>Review</td>
                                <td>Invoice ID</td>
                                <td>Rating</td>
                                <td>Delete</td>
                                <td>Edit</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $x=1; foreach($reviews as $val){ ?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                    <td><?= $val['id'] ?></td>
                                    <td><?= $val['from'] ?></td>
                                    <td style="word-break: break-all"><?= $val['review'] ?></td>
                                    <td><?= $val['invoice_id'] ?></td>
                                    <td style="width: 200px;">
                                        <div class="rating">
                                            <?php for($i=5;$i>=1;$i--){ ?>
                                                <?php if($i > $val['rating']){ ?>
                                                    <span class="unfilled">☆</span>
                                                <?php }else{ ?>
                                                    <span class="filled">☆</span>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td><span style="cursor:pointer;" onclick="deleteConff('<?= site_url('admin/delete/reviews/'.$val['id']."/same") ?>')">Delete</span></td>
                                    <td><span style="cursor:pointer;" onclick="editReview(<?= $x ?>)">Edit</span></td>
                                </tr>
                            <?php $x++; } ?>
                            </tbody>

                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script>
    function editReview(id){
        //alert(1);
        $("#myModal"+id).modal("show");
    }
    $(document).ready(function(){
        $(".rating input:radio").attr("checked", false);
        $('.rating input').click(function () {
            $(".rating span").removeClass('checked');
            $(this).parent().addClass('checked');
        });

        $('input:radio').change(
            function(){
                var userRating = this.value;
                //alert(userRating);
            });
    });
</script>
<?php $i=1; foreach($reviews as $val){ ?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?= $i ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Review</h4>
                </div>
                <?= form_open('admin/update'."/".$val['id']."/reviews/manage_reviews"); ?>
                <div class="modal-body">
                    <p>Review</p>
                    <input type="hidden" name="id" value="<?= $val['id'] ?>"/>
                    <textarea class="form-control placeholder-no-fix" name="review" id="" cols="30" rows="4"><?= $val['review'] ?></textarea>
                </div>
                <div class="modal-body">
                    <h4>Rating:</h4>
                    <div class="rating">
                        <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                        <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                        <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                        <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                        <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                    </div>
                </div>
                <div class="row"></div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-success" type="submit">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php $i++; } ?>

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
