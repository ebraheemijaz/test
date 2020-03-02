<section id="main-content">    <section class="wrapper">        <div class="row">            <div class="col-lg-12">                <ul class="breadcrumb">                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>                    <li><a href="">Prepare Update</a></li>                </ul>            </div>        </div>        <div class="row">            <div class="col-lg-12">                <section class="panel">                    <header class="panel-heading"> Update</header>                    <div class="panel-body">                        <?= form_open('home/insert/group/manage_admin',array("class"=>"form-signin","autocomplete"=>"off","style"=>"max-width: 100% !important;")) ?>                        <div class="login-wrap">                            <div class="row"></div>                            <br/>                            <div class="col-md-2">                                Message                            </div>                            <div class="col-md-10"><!--                                <div id="summernote"></div>-->                                <textarea id="summernote" cols="30" name="desc" class="form-control" rows="4"></textarea>                            </div>                            <div class="row"></div>                            <br/>                            <div class="col-lg-offset-2 col-lg-4 col-md-12">                                <button onclick="openCalendar()" class="btn btn-lg btn-login btn-block" type="button">Scheduled Release</button>                                <input type="date" style="display:none;"  value="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" id="date"/>                            </div>                            <div class="col-lg-offset-2 col-lg-4 col-md-12">                                <button class="btn btn-lg btn-login btn-block" type="submit">Immediate Release</button>                            </div>                        </div>                        <?= form_close(); ?>                    </div>                </section>            </div>        </div>    </section></section><script>    function openCalendar(){        $("#date").fadeToggle(1000);    }    /**     * member     * bGroup     * church     */    $("#member").click(function(){        if($("#member").is(":checked")){            $(".member").css("display","");        }else{            $(".member").css("display","none");        }    });    $("#bGroup").click(function(){        if($("#bGroup").is(":checked")){            $(".bGroup").removeAttr("disabled");        }else{            $(".bGroup").attr("disabled","disabled");        }    });    $("#church").click(function() {        if($("#church").is(":checked")){            $(".church").removeAttr("disabled");        }else{            $(".church").attr("disabled","disabled");        }    });</script><link rel="stylesheet" href="<?= base_url('assets_f/wysiwyg') ?>/dist/ui/trumbowyg.css"><link rel="stylesheet" href="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/colors/ui/trumbowyg.colors.css"><script src="<?= base_url('assets_f/wysiwyg') ?>/dist/trumbowyg.js"></script><script src="<?= base_url('assets_f/wysiwyg') ?>/dist/langs/fr.min.js"></script><script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/base64/trumbowyg.base64.js"></script><script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/colors/trumbowyg.colors.js"></script><script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/noembed/trumbowyg.noembed.js"></script><script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/pasteimage/trumbowyg.pasteimage.js"></script><script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/preformatted/trumbowyg.preformatted.js"></script><script src="<?= base_url('assets_f/wysiwyg') ?>/dist/plugins/upload/trumbowyg.upload.js"></script><script>    var uploadOptions = {        serverPath: 'https://api.imgur.com/3/image',        fileFieldName: 'image',        headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},        urlPropertyName: 'data.link'    };    $('#summernote').trumbowyg(        {            btns: [                ['viewHTML'],                ['p', 'blockquote', 'h1', 'h2', 'h3', 'h4'],                ['strong', 'em', 'underline', 'del'],                ['superscript', 'subscript'],                ['createLink', 'unlink'],                ['insertImage'],                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],                ['unorderedList', 'orderedList'],                ['horizontalRule'],                ['removeformat'],                ['upload', 'noembed'],                ['foreColor', 'backColor'],                ['preformatted'],                ['fullscreen']            ],            autogrow:true,            plugins: {                upload: uploadOptions            }        }    );</script><script type="text/javascript" src="<?= base_url('assets_f') ?>/multiselect/bootstrap-multiselect.js"></script><link rel="stylesheet" href="<?= base_url('assets_f') ?>/multiselect/bootstrap-multiselect.css" type="text/css"/><link rel="stylesheet" href="<?= base_url('assets_f') ?>/chosen/chosen.css"><script src="<?= base_url('assets_f') ?>/chosen/chosen.jquery.js" type="text/javascript"></script><script src="<?= base_url('assets_f') ?>/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script><script type="text/javascript">    var config = {        '.chosen-select'           : {},        '.chosen-select-deselect'  : {allow_single_deselect:true},        '.chosen-select-no-single' : {disable_search_threshold:10},        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},        '.chosen-select-width'     : {width:"95%"}    }    $(".chosen-select").chosen();</script>