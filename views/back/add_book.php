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
                    <header class="panel-heading">Add Book</header>
                    <div class="panel-body">
                        <?= form_open_multipart('admin/insert/books/bookstore',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>
                        <div class="login-wrap">
                            <div class="col-md-12">
                                Book Title
                                <input type="text" class="form-control" name="title" required="required" placeholder="Enter Title" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                Author Name
                                <input type="text" class="form-control" name="author" required="required" placeholder="Enter Author" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                Cover Image
                                <input type="file" class="form-control" required="required" name="img" >
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-12">
                                Year Of Publication
                                <input type="text" class="form-control" name="yop" placeholder="Enter Year Of Publication (e.g. 2017)" autofocus>
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                Price
                                <input type="number" class="form-control" name="price" placeholder="Enter Price (For FREE books enter “0”)." autofocus>
                            </div>
                            <div class="row"></div>
<!--                            <br/>-->
<!--                            <div class="col-md-12">-->
<!--                                Book Type-->
<!--                                <select class="form-control" name="type" id="type">-->
<!--                                    <!--<option value="hard">Hard Copy</option>-->
<!--                                    <option value="soft">Downloadable Copy</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="row"></div>-->
<!--                            <br/>-->
                            <div class="col-md-12">
                                Book
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="row"></div>
                            <br/>
                            <div class="col-md-12">
                                Book Details
                                <textarea name="desc" id="" cols="30" rows="4" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                            <div class="row"></div>
                            <div class="col-lg-offset-4 col-lg-4 col-md-12">
                                <br/>
                                <button class="btn btn-lg btn-login btn-block" type="submit">Add To Store</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<script>
    $("#type").change(function(){
        var a = $("#type").val();
        if(a == "hard"){}
    })
</script>