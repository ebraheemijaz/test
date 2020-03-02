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
                    <li><a href="">H.O.D. History</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Head Of Department</header>
                    <div class="panel-body">
                        <?php if(!empty($msg)){ ?>
                            <p style="text-align: center"><span class="alert alert-warning"><?= $msg ?></span></p>
                            <br/>
                            <br/>
                        <?php } ?>
                        <form class="form-inline" role="form" action="<?= site_url('admin/search_voice_note') ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="Search Based On Department Name" style="font-size: 12px!important; width:200px!important;"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="submit">Search</button>
                            </div>
                        </form>
                        <br/>
                        <span onclick="sendSMSAll()" class="btn btn-info" title="Send SMS to All">Send SMS to ALL<i class="fa fa-plus"></i></span>
                        <!--<span onclick="sendEmailAll()" class="btn btn-info">Send Email <i class="fa fa-plus"></i></span>-->
                        <br/>
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTableHOD" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>S.No.</td>
                                    <td style="width: 20%;">Name Of Member</td>
                                    <td style="width: 20%;">Department Name</td>
                                    <td>Department Position</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($hod as $val){ $memberHOD = $this->data->fetch('member', array('id' => $val['memberId']));?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td style="width: 20%;"><?= ucfirst($val['member']) ?></td>
                                        <td style="width: 20%;"><?= ucfirst($val['departmentName']) ?></td>
                                        <td style="width: 20%;"><?= ucfirst($val['departmentPosition']) ?></td>
                                        <td><a href="<?= site_url('admin/view/editHOD/'.$val['id']) ?>" title="Edit HOD"><i class="fa fa-pencil" title="Edit"></i></a> | 
                                        <a onclick="deleteConff('<?= site_url('admin/delete/HOD/'.$val['id'].'/same') ?>')" title="Delete HOD"><i class="fa fa-trash"></i></a> | 
                                        <a onclick="sendEmail(<?= $val['memberId'] ?>, '<?= $memberHOD[0]['fname'] ?>')" title="Send Email To HOD"><i class="fa fa-envelope-o"></i></a> | 
                                        <a data-target="#deleteConf<?= $val['id'] ?>" data-toggle="modal" href="#" title="Send SMS To HOD"><i class="fa fa-share"></i></a></td>
                                    </tr>
                                <?php $i++; } ?>
                                <!--<tr>-->
                                <!--    <td colspan="7" align="right"><?= $this->pagination->create_links(); ?></td>-->
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
    
    function sendEmail(id, fname) {
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Send customised Email" + 
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url() ?>/admin/sendEmail/member' method='post'>"+
                "<div class='row'>"+
                    "<div class='form-group'>"+
                        "<label class='col-md-4'>Compose Message</label>"+
                        "<input type='hidden' name='member[]' class='form-control col-md-6' value='"+id+"'>"+
                        "<textarea class='form-control' name='msg' cols='30' rows='6'>Dear "+fname+",\n\r</textarea>"+
                    "</div>"+
                "</div>"+
                "<div class='row'>"+
                    "<button type='submit' class='btn btn-success'><i class='fa fa-paper-plane'></i></button>"+
                "</div>"+
            "</form>"+
            // "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            // "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function sendSMS(id) {
        var a = "<div class='modal fade' id='deleteConf' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'> " +
            "<div class='modal-dialog modal-md' role='document'> " +
            "<div class='modal-content'> " +
            "<div class='modal-header'> " +
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'> " +
            "<span aria-hidden='true'>×</span> " +
            "</button> " +
            "<h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'> " +
            "Send customised SMS" + 
            "</h4> " +
            "</div> " +
            "<div class='modal-body'> " +
            "<form action='<?= site_url() ?>/admin/sendSMS/member' method='post'>"+
                "<div class='row'>"+
                    "<div class='form-group'>"+
                        "<label class='col-md-4'>Compose Message</label>"+
                        "<input type='hidden' name='member[]' class='form-control col-md-6' value='"+id+"'>"+
                        "<textarea class='form-control' name='msg'></textarea>"+
                        "<p>"+
                        '<span id="remaining">160 characters remaining</span>'+
                        '<span id="messages">1 message(s)</span>'+
                        "</p>"+
                    "</div>"+
                "</div>"+
                "<div class='row'>"+
                    "<button type='submit' class='btn btn-success'><i class='fa fa-paper-plane'></i></button>"+
                "</div>"+
            "</form>"+
            // "<button type='button' class='btn btn-info' data-dismiss='modal' aria-label='Close'>Cancel</button> " +
            // "<a href='"+link+"'><span class='btn btn-danger'>Delete</span></a>" +
            "</div> " +
            "</div> " +
            "</div> " +
            "</div>";
        $(".conf").html(a);
        $("#deleteConf").modal('toggle');
    }
    
    function sendSMSAll() {
        $("#sendAllSMS").modal("toggle");
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
        $('#actionForm').submit(function(){
            $('#newModal').modal('hide');
        });
    });
</script>
    <?php foreach($hod as $val){ ?>
        <div class='modal fade' id='deleteConf<?= $val['id'] ?>' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'>
            <div class='modal-dialog modal-md' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
            <h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'>
            Send customised SMS
            </h4>
            </div>
            <div class='modal-body'>
            <form action='<?= site_url() ?>/admin/sendSMS/member' method='post'>
                <div class='row'>
                    <div class='form-group'>
                        <label class='col-md-4'>Compose Message</label>
                        <input type='hidden' name='member[]' class='form-control col-md-6' value='"+id+"'>
                        <textarea class='form-control' id="msg" name='msg'></textarea>
                        <p>
                        <span id="remaining1">160 characters remaining</span>
                        <span id="messages1">1 message(s)</span>
                        </p>
                    </div>
                </div>
                <div class='row'>
                    <button type='submit' class='btn btn-success'><i class='fa fa-paper-plane'></i></button>
                </div>
            </form>
            </div>
            </div>
            </div>
            </div>
    <?php } ?>
    <div class='modal fade' id='sendAllSMS' role='dialog' tabindex='-1' aria-labelledby='mySmallModalLabel'>
            <div class='modal-dialog modal-md' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
            <h4 style='text-align: center;font-weight: bold;' class='modal-title' id='mySmallModalLabel'>
            Send customized SMS
            </h4>
            </div>
            <div class='modal-body'>
            <form action='<?= site_url() ?>/admin/sendSMSAllHOD' method='post'>
                <div class='row'>
                </div>
                <div class='row'>
                    <div class='form-group'>
                        <label class='col-md-6'>Compose Message To All H.O.D.</label>
                        <textarea class="form-control" id="message" name="msg"></textarea>
                        <p>
                        <span id="remaining">160 characters remaining</span>
                        <span id="messages">1 message(s)</span>
                        </p>
                    </div>
                </div>
                <div class='row'>
                    <button type='submit' class='btn btn-success'><i class='fa fa-paper-plane'></i></button>
                </div>
            </form>
            </div>
            </div>
            </div>
            </div>
<script>
    var $remaining = $('#remaining'),
        $messages = $remaining.next();
        
    $('#message').keyup(function(){
        var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
    });
    var $remaining1 = $('#remaining1'),
        $messages1 = $remaining1.next();
        
    $('#msg').keyup(function(){
        var chars1 = this.value.length,
            messages1 = Math.ceil(chars1 / 160),
            remaining1 = messages1 * 160 - (chars1 % (messages1 * 160) || messages1 * 160);

        $remaining1.text(remaining1 + ' characters remaining');
        $messages1.text(messages1 + ' message(s)');
    });
</script>
<div class="conf"></div>

<script>
    $(document).ready(function() {
        $('#myTableHOD').DataTable().order([[0, 'asc']]).draw();
    });
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

