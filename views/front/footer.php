<style>
    .site-footer > .text-center > a{
        color: #c3c8ff !important;
    }
</style>
<footer class="site-footer">
    <div class="text-center" style="text-align: center;font-weight:bold;">
<!--        <p style="text-align: center;font-weight:bold;">-->
        <?= date("Y"); ?> © <a target="_blank" href="//mmsonline.website">Membership Management System</a>. All Rights Reserved.
<!--        </p>-->
    </div>
</footer>
</section>
<script src="<?= base_url('assets_f') ?>/js/slidebars.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets_f') ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
<script class="include" type="text/javascript" src="<?= base_url('assets_f') ?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= base_url('assets_f') ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?= base_url('assets_f') ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= base_url('assets_f') ?>/js/respond.min.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.js"></script>
<script src="<?= base_url('assets_f') ?>/js/dynamic_table_init.js"></script>
<script src="<?= base_url('assets_f') ?>/js/common-scripts.js"></script>
<script>
    $(".site-footer").css("margin-top",($(document).height() - $("body").height()));
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
   function openDonationModal(){
       $("#newModal").modal("toggle");
   }
    setInterval(function(){
        $.post("<?= site_url('home/ajax/online') ?>",{id:<?= $userAdmin[0]['id']; ?>},function(e){
            console.log(e);
        })
    },2000);
    $(function(){
        var current = location.pathname;
        $('#nav-accordion li a').each(function(){
            var $this = $(this);
            console.log($this);
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1){
                $this.addClass('active');
            }
        });
    })
</script>
    

</body>
</html>
