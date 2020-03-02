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
                    <li><a href="">Event Video History</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Event Video</header>
                    <div class="panel-body">
                        <form class="form-inline" role="form" action="<?= site_url('admin/search_live') ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="Search by Video Title" style="font-size: 12px!important; width:200px!important;"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="submit">Search</button>
                            </div>
                        </form>
                        <br/>
                        <span onclick="openProfile()" class="btn btn-info">Go Live</span>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableLive" class="table table-hover">
                            <thead>
                                <tr>
                                    <td style="display: none;">Event Date</td>
                                    <td style="width: 20%;">Date Posted</td>
                                    <td style="width: 20%;">Event Date</td>
                                    <td>Minister</td>
                                    <td style="width: 30%;">Video Title</td>
                                    <td>Link</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($live as $val){ ?>
                                    <tr>
                                        <td style="display: none;"><?= date("d-M-Y H:i:s", strtotime($val['dateOfEvent']));?></td>
                                        <td style="width: 20%;"><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                        <td style="width: 20%;"><?php if($val['dateOfEvent'] != '0000-00-00'){echo date("d-M-Y",strtotime($val['dateOfEvent']));}else{ echo date("d-M-Y",strtotime($val['date'])); } ?></td>
                                        <td><?= $val['minister']; ?></td>
                                        <td style="width: 30%;"><?= $val['title'] ?></td>
                                        <?//= $val['link'] ?>
                                        <td style="word-break: break-all;">
                                        <?php $code=$val['link']; $code = explode("?v=",$code); ?>
                                        <?php if(!empty($code) AND isset($code[1]) AND !empty($code[1])){?>
                                            <a style="cursor: pointer;text-decoration: underline" class="btn btn-blue" onclick="openVideoa('<?= $code[1]; ?>')">Watch</a>
                                        <?php }else{ ?>
                                            <?php $code=$val['link']; ?>
                                            <?php $c = str_replace("https://youtu.be/","",$code) ?>
                                            <a style="cursor: pointer;text-decoration: underline" class="btn btn-blue" onclick="openVideoa('<?= $c; ?>')">Watch</a>
                                        <?php } ?>
                                    </td>
                                        <td>
                                            <?php $status = ($val['status'] == 'on') ? "off" : "on"; ?>
                                            <?php if($val['status'] == 'on'){ ?>
                                                <a><span class="btn btn-success">On Air</span></a>
                                            <?php }else{ ?>
                                                <a><span class="btn btn-danger">Off Air</span></a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a onclick="deleteConff('<?= site_url('admin/delete/live/'.$val['id']."/same") ?>')" link="<?= site_url('admin/delete/live/'.$val['id']."/same") ?>"><i class="fa fa-trash"></i></a>
                                            /
                                            <a href="<?= site_url('admin/view/editLive/'.$val['id']."/same") ?>"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <!--<tr>-->
                                <!--    <td colspan="8" align="right"><?= $this->pagination->create_links(); ?></td>-->
                                <!--</tr>-->
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
                    Go Live
                </h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/liveVideo'); ?>" class="form-signin" id="actionForm" method="post">
                    <input type="checkbox" checked class="chosen-toggle select form-control mem col-md-3" id="selectAll" style="margin-bottom: -20px;">
                    <label for="" style="margin-left: 40px;">All Members</label>
                    <select name="member[]" required multiple class="form-control chosen-select" id="mem">
                        <?php $members = $this->data->myquery('SELECT * FROM `member` WHERE status = "active" ORDER BY lname DESC'); ?>
                        <?php foreach($members as $val){ ?>
                            <option selected value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
                        <?php } ?>
                    </select>
                    <span id="errMem"></span>
                    <br/>
                    <p>Minister Name:</p>
                    <input type="text" required name="minister" class="form-control"/>
                    <p>Date Of Event:</p>
                    <input type="date" required name="dateOfEvent" class="form-control"/>
                    <p>Title</p>
                    <input type="text" required name="title" class="form-control"/>
                    <br/>
                    <p>YouTube Live Link</p>
                    <input type="text" name="link" required class="form-control"/>

                    <br/>
                    <p>Link Type</p>
                    <div class="col-md-6">
                        <input type="radio" required name="linkType" id="linkType" value="live"/><span>Live</span>
                    </div>

                    <div class="col-md-6">
                        <input type="radio" required name="linkType" id="linkType" value="nonLive"/><span>Non-Live</span>
                    </div>


                    <br/>
                    <p>How long will the event go?</p>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="expiryHours" required id="expiryHours" class="form-control">
                                <?php for($i=0;$i<=10;$i++){ ?>
                                    <option value="<?= $i ?>"><?= $i ?> Hour(s)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="expiryMinutes" required id="expiryMinutes" class="form-control">
                                <?php for($i=0;$i<=60;$i++){ ?>
                                    <option value="<?= $i ?>"><?= $i ?> Minutes(s)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br/>
                    <input type="hidden" id="type"/>
                    <button type="submit" id="modalSubmit" onclick="return checkExpiryTime()" class="btn btn-danger">Go Live And Share</button>
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

