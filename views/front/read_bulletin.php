<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Bulletin</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <aside class="col-sm-12 col-xs-12 visible-sm visible-xs">
                <div>
                    <section class="panel">
                        <div class="panel-body">
                            <p><a onclick="admodal()" class="adHelp">Request advert</a></p>
                            <div class="custom1 owl-carousel">
                                <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/adh1.jpg" alt=""/></div>
                                <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/adh2.jpg" alt=""/></div>
                                <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/adh3.jpg" alt=""/></div>
                            </div>
                        </div>
                    </section>
                </div>
            </aside>
            <div class="row"></div>

            <div class="col-md-9">
                <section class="panel">
                    <header class="panel-heading">News & Bulletin</header>
                    <div class="panel-body">
                        <?php $val = $bulletin[0];  ?>
                            <div class="col-xs-12">
                                <p style="font-size:12px;text-align: right !important;"><?= date("d/M/Y",strtotime($val['date'])) ?></p>
                                <div class="col-xs-6">
                                    <img style="width:100%;border-radius: 10%" src="<?= base_url() ?>/<?= $val['image'] ?>" alt=""/>
                                </div>
                                <div class="row"></div>
                                <div class="col-xs-12">
                                    <h1><?= $val['title'] ?></h1>
                                    <p>
                                        <?= $val['text']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row"></div>
                            <hr/>
                    </div>
                </section>
            </div>
            <aside class="col-lg-3 col-md-3 visible-md visible-lg">
                <div style="height:500px;background: ">
                    <section class="panel">
                        <div class="panel-body">
                            <p><a onclick="admodal()" class="adHelp">Request advert</a></p>
                            <div class="custom1 owl-carousel">
                                <div><img style="width:100% !important" src="<?= base_url('assets_f') ?>/banner.gif" alt=""/></div>
                                <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/ad1.jpg" alt=""/></div>
                                <div><img style="width:100% !important" src="<?= base_url('assets_b') ?>/ad2.jpg" alt=""/></div>
                            </div>
                        </div>
                    </section>
                </div>
            </aside>
            <div style="" class="modal fade bs-example-modal-md in" id="advertModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 style="text-align: center" class="modal-title" id="mySmallModalLabel">Request An Advert</h4>
                        </div>
                        <div class="modal-body">
                            <?= form_open_multipart('home/insert/advert/advert',array('class'=>"form-signin")); ?>
                            <p>Upload Horizontal Banner</p>
                            <span>(600x160)</span>
                            <input type="file" name="horizontal" class="form-control"/>
                            <br/>
                            <p>Upload Vertical Banner</p>
                            <span>(160x600)</span>
                            <input type="file" name="vertical" class="form-control"/>
                            <br/>
                            <p>Weeks</p>
                            <select name="week" id="perWeek" class="form-control">
                                <?php for($i=1;$i<=52;$i++){ ?>
                                    <option value="<?= $i ?>"><?= $i ?> Weeks</option>
                                <?php } ?>
                            </select>
                            <br/>
                            <p>Advert Cost : £ 2.50/- per week</p>
                            <p>Total Cost: £ <span id="advertquote">2.50</span>/-</p>
                            <button type="submit" class="btn btn-info">Send Request</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function admodal(){
                    $("#advertModal").modal("toggle");
                }
                $("#perWeek").change(function(){
                    var week = $("#perWeek").val();
                    $.post("<?= site_url('home/ajax/advertCharges') ?>",{week:week},function(e){
                        $("#advertquote").html(e);
                    })

                });
                //                $(document).ready(function(){
                $('.custom1').owlCarousel({
                    animateOut: 'fadeOutDown',
                    animateIn: 'flipInX',
                    items:1,
                    margin:10,
                    stagePadding:10,
                    center:true,
                    smartSpeed:450,
                    loop:true,
                    mouseDrag:true,
                    touchDrag:true,
                    autoplay:true,
                    autoplayTimeout:3000,
                    autoplayHoverPause:true
                });
                //                })
            </script>
        </div>
    </section>
</section>