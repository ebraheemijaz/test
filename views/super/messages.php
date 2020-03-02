<section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Messages</a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <!--mail inbox start-->
            <div class="mail-box">
                <aside class="sm-side">
                    <div class="user-head">
                        <a href="javascript:;" class="inbox-avatar">
                            <img src="" style="width:50px" alt="">
                        </a>
                        <div class="user-name">
                            <h5><a href="#"><?= ucfirst($superAdmin[0]['username']) ?></a></h5>
                            <span><a href="#">Super Admin</a></span>
                        </div>

                    </div>
                    <ul class="inbox-nav inbox-divider">
                        <li class="active">
                            <a href="#"><i class="fa fa-inbox"></i> All <span class="label label-danger pull-right">2</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope-o"></i> Sent Message</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bookmark-o"></i> Unread</a>
                        </li>
                        <li>
                            <a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
                        </li>
                        <li>
                            <a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
                        </li>
                    </ul>
                </aside>
                <aside class="lg-side">
                    <div class="inbox-head">
                        <h3>Inbox</h3>
                    </div>
                    <div class="inbox-body">
                        <div class="mail-option">
                            <div class="btn-group">
                                <a class="btn mini tooltips" href="#" data-toggle="dropdown" data-placement="top" data-original-title="Refresh">
                                    <i class=" fa fa-refresh"></i>
                                </a>
                            </div>
                        </div>
                        <table class="table table-inbox table-hover">
                            <tbody id="msgs">
                            <tr class="unread">
                                <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                </td>
                                <td class="view-message  dont-show">Admin</td>
                                <td class="view-message "><a href="<?= site_url('home/view') ?>/message_detail/">Message</a></td>
                                <td class="view-message  inbox-small-cells"></td>
                                <td class="view-message  text-right">9:27 AM</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </aside>
            </div>
            <!--mail inbox end-->
        </section>
    </section>
<script>
    setInterval(function(){
        $.post("<?= site_url('super/ajax/getRecepients'); ?>",{},function(e){
            $("#msgs").html(e);
        })
    },1000);
</script>