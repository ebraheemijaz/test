<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Add New Christ Convert</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Record New Christ Convert</header>
                    <div class="panel-body">
                        <?= form_open('admin/update/'.$data[0]['id'].'/lifetochrist/view_gave_life',array("class"=>"form-horizontal")) ?>
                        <div class="form-group">
                            <div class="col-md-2">
                                First Name :
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="fname" value="<?= $data[0]['fname'] ?>" placeholder="Enter First Name" required class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                Contact :
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="contact" value="<?= $data[0]['contact'] ?>" placeholder="Enter Contact" required class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                Email :
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="email" value="<?= $data[0]['email'] ?>" placeholder="Enter Email" required class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                Date :
                            </div>
                            <div class="col-md-10">
                                <input type="date" name="date" value="<?= date('Y-m-d', strtotime($data[0]['date'])); ?>"  required class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                Comment :
                            </div>
                            <div class="col-md-10">
                                <?php
                                    $comment = $this->data->fetch('christConvertComment', array('christConvert_id' => $data[0]['id']));
                                    if(date('Y-m-d') == date('Y-m-d', strtotime($comment[0]['createdAt'])) || date('Y-m-d') == date('Y-m-d', strtotime($comment[0]['updatedAt']))){
                                    ?>
                                    <div class="col-md-6">
                                        <label><?= date('d-M-Y', strtotime($data[0]['createdDate'])) ?></label>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="comment" required class="form-control" placeholder = "Enter Your Comment."><?= $data[0]['comment'] ?></textarea>
                                    </div>
                                    <?php
                                    }else{
                                        foreach($comment as $com){
                                        ?>
                                            <div class="col-md-6">
                                                <label><?= date('d-M-Y', strtotime($com['createdAt'])) ?></label>
                                            </div>
                                            <div class="col-md-6">
                                                <label><?= $com['reply_text'] ?></label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <textarea name="comment" required class="form-control" placeholder = "Enter Your Comment."><?= $data[0]['comment'] ?></textarea>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2 ">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
