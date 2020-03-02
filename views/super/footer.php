
</section>


<script src="<?= base_url('assets_f') ?>/js/jquery.js"></script>
<script src="<?= base_url('assets_f') ?>/js/slidebars.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets_f') ?>/js/jquery-ui-1.9.2.custom.min.js"></script>

<script src="<?= base_url('assets_f') ?>/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?= base_url('assets_f') ?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= base_url('assets_f') ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?= base_url('assets_f') ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= base_url('assets_f') ?>/js/respond.min.js" ></script>

<script type="text/javascript" language="javascript" src="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.js"></script>
<script src="<?= base_url('assets_f') ?>/js/dynamic_table_init.js"></script>

<script src="<?= base_url('assets_f') ?>/js/common-scripts.js"></script>
<script>
    function addMoreQualification(){
        var a = "<div class='form-group'> " +
            "<label for='' class='col-lg-2 col-sm-2 control-label'>Tutor Qualifications</label> " +
            "<div class='col-lg-10'> " +
            "<input type='text' class='form-control' name='qualification' placeholder='Enter tutor qualifications'> " +
            "</div> " +
            "</div> " +
            "<div class='form-group'> " +
            "<label for='' class='col-lg-2 col-sm-2 control-label'>Upload file</label> " +
            "<div class='col-lg-10'> " +
            "<input type='file' class='form-control' placeholder=''> " +
            "</div> " +
            "</div>";
        $("#qualifications").append(a);
    }
    function deleteTutorSuper(id){
        var link = "<?= site_url('super/status') ?>" + "/" + id + "/delete";
        var a = "<div class='modal fade bs-example-modal-sm in' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' style='display: block; padding-right: 17px;'>" +
            "<div class='modal-dialog modal-sm'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>" +
            "<span aria-hidden='true'>×</span>" +
            "</button>" +
            " <h4 class='modal-title' id='mySmallModalLabel'>Delete</h4> " +
            "</div> " +
            "<div class='modal-body clearfix'>" +
            " Are you sure you want to delete? </br></br>" +
            "<div style='float:right'>" +
            "<a href='"+ link +"'><span  class='btn btn-danger' style='margin-right:10px'>Yes</span></a>" +
            "<span data-dismiss='modal' class='btn btn-success'>No</span>" +
            "</div>" +
            "</div>" +
            " </div>" +
            " </div>" +
            " </div>";
        $("#deleteTutor").html(a);
        $(".modal").modal("show");
    }
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
</body>
</html>