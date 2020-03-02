<div id="advevver"></div>
</section>
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>-->
<script src="<?= base_url('assets_b') ?>/sliderbar/slidebars.js"></script>
<script src="<?= base_url('assets_b') ?>/sliderbar/scripts.js"></script>
<!--<script src="<?/*= base_url('assets_f') */?>/js/slidebars.min.js"></script>-->
<!--<script type="text/javascript" src="<?= base_url('assets_f') ?>/js/jquery-ui-1.9.2.custom.min.js"></script>-->
<script src="<?= base_url('assets_f') ?>/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?= base_url('assets_f') ?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= base_url('assets_f') ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?= base_url('assets_f') ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= base_url('assets_f') ?>/js/respond.min.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url('assets_f') ?>/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<!--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>-->
<script type="text/javascript" src="<?= base_url('assets_f') ?>/assets/data-tables/DT_bootstrap.js"></script>
<script src="<?= base_url('assets_f') ?>/js/dynamic_table_init.js"></script>
<script src="<?= base_url('assets_f') ?>/js/common-scripts.js"></script>
<!--
https://code.jquery.com/jquery-3.3.1.js
-->
<script>
setInterval(function(){
        $.post("<?= site_url('admin/ajax/getUsers') ?>",{},function(e){
            $("#usrActivity").html(e);
        })
    },2000);
    //$(document).ready(function(){
        // var table = $('#myTable').dataTable({
        $('#myTable').DataTable({
            "processing": true,
            "serverSide": true,
            "aaSorting": [[ 0, "desc" ]],
            "deferRender": true,
            scrollY:        200,
            "columnDefs": [
                {
                    "target": [0, 3, 4],
                    "orderable": false
                }
            ]
            
        });
        $('#myTableMempacas').DataTable({aaSorting: [[0, "asc"]]});
        $('#myTableAdvert').DataTable({aaSorting: [[0, "asc"]]});
        $('#myTableLive').DataTable({aaSorting: [[2, "desc"]]});
        $('#myTableChatMember').DataTable({aaSorting: [[0, "asc"]]});
        $('#myTableSMS').DataTable({aaSorting: [[ 0, "desc" ]]});
        $('#myTableEmail').DataTable({aaSorting: [[ 1, "desc" ]]});
        $('#myTabl').DataTable();
        $('#myTable1').DataTable({aaSorting: [[ 0, "asc" ]]});
        $('#myTableHis').DataTable({aaSorting: [[4, "desc"]]});
        $('#myTableKN').DataTable({aaSorting: [[ 0, "desc" ]]});
        $('#myTableCode').DataTable({aaSorting: [[3, "asc"]]});
        $('#myTableBusiness').DataTable({aaSorting: [[ 0, "asc" ]]});
        $('#myTableCGroup').DataTable({aaSorting: [[0, "asc"]]});
        $('#myTableChurch').DataTable({aaSorting: [[ 0, "asc" ]]});
        $('#myTableFtimer').DataTable({aaSorting: [[9, "desc"]]});
        $('#myTableMFtimer').DataTable({aaSorting: [[0, "desc"]], bFilter: false});
        $('#myMempacas').DataTable({
            aaSorting: [[0, "asc"]],
            paging:   false,
            ordering: false,
            info:     false
        });
        $('#myTableUser').DataTable({
            aaSorting: [[0, "desc"]],
            "deferRender": true,
            'columns': [
                { 'searchable': false },
                { 'searchable': false },
                { 'searchable': false },
                null,
                { 'searchable': false },
                { 'searchable': false },
                { 'searchable': false },
                { 'searchable': false },
                { 'searchable': false },
            ]
        });
    window.onload = detectmob;
        function detectmob() { 
         if( navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         || navigator.userAgent.match(/Windows Phone/i)
         ){
            $('.detect').css({'-ms-transform':'rotate(0deg)', '-webkit-transform':'rotate(0deg)','transform':'rotate(0deg)'});
            $('.detect8').css({'-ms-transform':'rotate(0deg)', '-webkit-transform':'rotate(0deg)','transform':'rotate(0deg)'});
            $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
          }
          else if(navigator.userAgent.match(/Android/i)){
              $('.detect').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
              $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
          }
         else if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
            $('.detect').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
            $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
            $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
          }else{
              $('.detect').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
              $('.detect8').css({'-ms-transform':'rotate(270deg)', '-webkit-transform':'rotate(270deg)','transform':'rotate(270deg)'});
              $('.detectHeader').css({'-ms-transform':'rotate(90deg)', '-webkit-transform':'rotate(90deg)','transform':'rotate(90deg)'});
          }
        }
        
</script>
<script src="https://rawgit.com/RickStrahl/jquery-resizable/master/dist/jquery-resizable.min.js"></script>
<script src="<?= base_url('assets_f/wysiwyg') ?>/dist/trumbowyg.js"></script>
<script src="<?= base_url('assets_f/wysiwyg') ?>/dist/langs/fr.min.js"></script>
<script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/base64/trumbowyg.base64.js"></script>
<script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/colors/trumbowyg.colors.js"></script>
<script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/noembed/trumbowyg.noembed.js"></script>
<script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/pasteimage/trumbowyg.pasteimage.js"></script>
<script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/preformatted/trumbowyg.preformatted.js"></script>
<script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/upload/trumbowyg.upload.js"></script>
<script src="<?= base_url('assets_new') ?>/assets/js/uikit_custom.min.js"></script>
<script src="<?= base_url('assets_new') ?>/assets/js/custom/datatables/buttons.uikit.js"></script>
<script>
    var uploadOptions = {
        serverPath: 'https://api.imgur.com/3/image',
        fileFieldName: 'image',
        headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},
        urlPropertyName: 'data.link'
    };
    $('#summernote1').trumbowyg(
        {
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload', 'noembed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
                ],
                autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
    $('#summernote4').trumbowyg(
        {
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload', 'noembed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
                ],
                autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
    
    $('#summervoicenote').trumbowyg(
        {
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload', 'noembed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
                ],
                autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
    
    $('#summernote2').trumbowyg(
        {
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload', 'noembed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
                ],
                autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
    $('#summernote3').trumbowyg(
        {
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload', 'noembed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
                ],
                autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
    $('#summernote5').trumbowyg(
        {
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload', 'noembed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
                ],
                autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
    $('#summernote6').trumbowyg(
        {
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload', 'noembed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
                ],
                autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
    
    $('#attendanceEmail').trumbowyg(
        {
            btnsDef: {
                image: {
                    dropdown: ['insertImage', 'upload', 'noembed'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
                ],
                autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
    $('#summernote').trumbowyg(
        {
            btns: [
                ['viewHTML'],
                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['upload', 'noembed'],
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
            ],
            autogrow:true,
            plugins: {
                upload: uploadOptions,
                resizimg : {
                  minSize: 64,
                  step: 16,
                }
            }
        }
    );
</script>


<script src="<?= base_url('assets_f') ?>/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url('assets_f') ?>/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    function openVideoa(strr){
        //alert(strr);
        var url = "https://www.youtube.com/embed/"+strr+"?rel=0&amp;showinfo=0";
        
        var a = '<div class="uk-modal" id="newModalvid">' +
            '<div class="uk-modal-dialog">' +
            '<a href="" onclick="modalClose()" class="uk-modal-close uk-close"></a>' +
            '<iframe width="100%"  height="300px" src="'+url+'" frameborder="0" allowfullscreen></iframe>'+
            '</div>' +
            '</div>';
        
        $("#vid").html(a);
        var modal = UIkit.modal("#newModalvid",{keyboard: false , bgclose:false});
        modal.show();
    }
//     <audio controls>
  
//   <source src="horse.mp3" type="audio/mpeg">
// Your browser does not support the audio element.
// </audio>
    function openVoiceNote(strr) {
        // alert(strr);
        var a = '<div class="uk-modal" id="newModalAud">' +
                '<div class="uk-modal-dialog" id="ukModalDialog">'+
                '<a href="" onclick="modalClose()" class="uk-modal-close uk-close"></a>'+
                '<audio preload="auto" src="'+strr+'" controls style="height: 54px!important;width: 100%;"></audio>'+
                '</div>'+
                '</div>';
            $('#vid').html(a);
            var modal = UIkit.modal("#newModalAud", {keyboard: false, bgclose: false});
            modal.show();
    }
    var config = {
        // '.chosen-select'           : {placeholder:"Select Member"},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"75%"}
    }
    function modalClose(){
        console.log(1);
        $("#vid").html('');
    }
    $(".chosen-select").chosen({
        placeholder_text_multiple: 'Members'
    });
    
    $(".teachInCharge").chosen({
        placeholder_text_multiple: 'Teacher-In-Charge'
    });
    
    $("#general .chosen-select").chosen({
        placeholder_text_multiple: 'Select General In Charge'
    });
    
    $("#general .chosen-select").chosen({
        placeholder_text_multiple: 'Select General In Charge'
    });
    function deleteConversationsConfirmationModal(){
        var sendersid = window.location.hash;
        if(sendersid){
            var a = '<div class="uk-modal" id="newModalAdv"> ' +
                '<div class="uk-modal-dialog"> ' +
                '<a href="" class="uk-modal-close uk-close"></a> ' +
                '<h3>Are you sure you want to delete your conversation?</h3>' +
                '<span  onclick="deleteConversation()" class="uk-modal-close md-btn md-btn-primary addToBuddiesss">Yes</span>'+
                '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
                '</div>'+
                '</div>';
        }else{
            var a = '<div class="uk-modal" id="newModalAdv"> ' +
                '<div class="uk-modal-dialog"> ' +
                '<a href="" class="uk-modal-close uk-close"></a> ' +
                '<h3>Are you sure you want to delete all chat messages with all buddies?</h3>' +
                '<span  onclick="deleteAllConversation()" class="uk-modal-close md-btn md-btn-primary addToBuddiesss">Yes</span>'+
                '<span class="md-btn md-btn-danger uk-modal-close">No</span>'+
                '</div>'+
                '</div>';
        }    
        $("#advevver").html(a);
        var modal = UIkit.modal("#newModalAdv").show();
    }
</script>
<script src="<?= base_url('assets_f'); ?>/js/multiple-select.js"></script>
<!--<script src="http://www.technicalkeeda.com/js/javascripts/demo/jquery.lazyload.min.js"></script>-->
<!--<script>-->
<!--    $("img").lazyload({-->
<!--     effect : "fadeIn"-->
<!-- });-->
<!--</script>-->
<!--<script>-->
<!--    $('#memb').multipleSelect({-->
<!--        width: '100%'-->
<!--    });-->
<!--</script>-->
</body>
</html>
