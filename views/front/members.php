<style>
    .media{
        height: 230px;
    }
    .media th.media td{
        font-size: 13px;
    }
    .dropdown-menu>li>a{
            padding: 0px 20px!important;
    }
</style>
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Members</a></li>
                </ul>
            </div>
        </div>
        <section class="panel">
            <header class="panel-heading">
                Search Member By <?= $type ?>
            </header>
            <div class="panel-body">
                <form class="form-horizontal search-result">
                    <div class="form-group">
                        <label class="col-lg-1 col-sm-1 control-label">Search</label>
                        <?php if($type == "name"){ ?>
                            <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="q"value="<?= (isset($_GET['q']) && !empty($_GET['q']))? $_GET['q'] : "" ; ?>" class="form-control input-xxlarge"/>
                                    <input type="hidden" value="<?= $type ?>" name="type">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn" type="submit">SEARCH</button>
                            </div>
                        <?php }elseif($type == "Business Group"){ ?>
                            <div class="col-lg-6 col-sm-6">
                                <select name="q" class="form-control input-xxlarge">
                                    <?php foreach($list as $val){ ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" value="<?= $_GET['type'] ?>" name="type">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn" type="submit">SEARCH</button>
                            </div>

                        <?php } ?>


                    </div>
                </form>
            </div>
        </section>
        <div class="directory-info-row">
            <div class="row">
                <?//php if(!isset($_GET['q']) && empty($_GET['q'])){ ?>
<!--                    <div class="col-md-12 col-sm-12">-->
<!--                        <div class="panel">-->
<!--                            <div class="panel-body">-->
<!--                                <div class="media">-->
<!--                                    <h2></h2>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                <?//php } ?>

                <?//php else{ ?>
                    <?php if(empty($results)){ ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="media">
                                        <h2 style="text-align: center">No members found in this group.</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <?php foreach($results as $k=>$v){ ?>
                            <?php if($v['id'] != $userAdmin[0]['id']){ ?>
                                <div class="col-md-12 col-sm-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="media">
                                                <a class="pull-left" href="<?= site_url('home/member')."/".$v['id'] ?>">
                                                    <?php $image = (empty($v['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$v['image'] ; ?>
                                                    <img style="width:120px;" class="thumb media-object" src="<?= $image; ?>" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <a href="<?= site_url('home/member')."/".$v['id'] ?>">
                                                        <h4><?= $v['fname'] ?> <?= $v['lname'] ?></h4>
                                                    </a>
                                                    <table>
                                                        <tr>
                                                            <th>Buddies</th>
                                                            <td>
                                                                <?php if(!empty($userAdmin)){ ?>
                                                                    <?php if($userAdmin[0]['id'] != $v['id']){ ?>
                                                                        <?php if(in_array($v['id'],$friends)){ ?>
                                                                            <span class="btn btn-primary">Already buddies</span>
                                                                        <?php }else{ ?>
                                                                            <span onclick="addToBuddies(<?= $v['id'] ?>)" id="addtoB" class="btn btn-danger">Add to Buddies</span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?//php } ?>
            </div>
        </div>
    </section>
</section>
<script>
    function addToBuddies(id){
        $.post("<?= site_url('home/ajax/addToBuddies') ?>",{id:id},function(e){
            if(e == "a"){
                $("#addtoB").html("Buddy");
                $("#addtoB").removeAttr("onclick");
                alertify.message("Added to buddies");
            }
        })
    }
</script>
