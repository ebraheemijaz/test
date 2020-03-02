<style>
    .chosen-container {
        width: 100% !important;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Age Group Setting</a></li>
                </ul>
                <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Age Group</header>
                    <div class="panel-body">
                        <span onclick="openProfile()" class="btn btn-info">Create Age Group</span>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableLive" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td style="width: 20%;">Name</td>
                                    <td style="width: 20%;">Age Group</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ageGroup as $val){ ?>
                                    <tr>
                                        <td><?= date("d-M-Y", strtotime($val['createdAt']));?></td>
                                        <td style="width: 20%;"><?= ucfirst($val['name']) ?></td>
                                        <td style="width: 20%;"><?= $val['ageGroup'] ?></td>
                                        <td>
                                            <a onclick="deleteConff('<?= site_url('admin/delete/ageGroup/'.$val['id']."/same") ?>')" link="<?= site_url('admin/delete/live/'.$val['id']."/same") ?>"><i class="fa fa-trash"></i></a>
                                            /
                                            <a href="<?= site_url('admin/view/editAgeGroup/'.$val['id']."/same") ?>"><i class="fa fa-pencil"></i></a>
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
            <div id="vid"></div>
        </div>
    </section>
</section>
<script>
    function openProfile(){
        $("#newModal").modal("toggle");
    }
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
    $(function(){
        // $('#modalSubmit').click(function(e){
        //   e.preventDefault();
        // //   var member = $('.mem').val();
        // //   var title = $('#title').val();
        // //   var link = $('#link').val();
        // //   if(member !== null || member !== 'null'){
        // //       if(title !== 'undefined' || title !== ""){
        // //           if(link !== 'undefined' || link !== ""){
        // //               $('#actionForm').submit();
        // //           }else{
                      
        // //           }
        // //       }else{
                  
        // //       }
        // //   }else{
              
        // //   }
        //   $('#newModal').modal('hide');
        //   /*
        //   $.post('http://path/to/post', 
        //      $('#myForm').serialize(), 
        //      function(data, status, xhr){
        //       // do something here with response;
        //      });
        //   */
        // });
        $('#actionForm').submit(function(){
            $('#newModal').modal('hide');
        });
    });
</script>
<div style="" class="modal fade bs-example-modal-md in" id="newModal" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 style="text-align: center;font-weight: bold;" class="modal-title" id="mySmallModalLabel">
                    Create Age Group
                </h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/createAgeGroup'); ?>" class="form-signin" id="actionForm" method="post">
                    <span id="errMem"></span>
                    <br/>
                    <p>Name:</p>
                    <input type="text" required name="name" class="form-control" placeholder="Enter group name"/>
                    <p>Age Group:</p>
                    <input type="text" required name="ageGroup" class="form-control" placeholder="Enter age group i.e. 2 - 5"/>
                    <br/>
                    <button type="submit" id="modalSubmit" class="btn btn-danger">Create Age Group</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="conf"></div>

<script>
    $('.chosen-toggle').each(function(index) {
        $(this).on('click', function(){
            if($(this). prop("checked") == true){
                $(this).parent().find('option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
            }else{
                clearSelected();
                $('#mem').trigger("chosen:updated");
            }
        });
    });
    function clearSelected(){
        var elements = document.getElementById("mem").options;
        console.log(elements.length);
        for(var i = 0; i < elements.length; i++){
          if(elements[i].selected)
            elements[i].selected = false;
        }
      }
      
      function checkExpiryTime(){
          var linkType = $('#type').val();
          var expiryHours = $('#expiryHours').val();
          var expiryMinutes = $('#expiryMinutes').val();
          if(linkType == 'live'){
              if(expiryHours != 0 || expiryMinutes != 0){
                  return true;
              }else{
                  alert('Expiry Hours or Minutes required.');
                  return false;
              }
          }else{
              return true;
          }
      }
      
      $("input[type='radio']").change(function(){
            var type = $(this).val();
            if(type == 'live'){
                $('#type').val('live');
                $('#expiryHours').css('display', 'block');
                $('#expiryMinutes').css('display', 'block');
            }else{
                $('#type').val('nonLive');
                $('#expiryHours').css('display', 'none');
                $('#expiryMinutes').css('display', 'none');
            }
      });
</script>

