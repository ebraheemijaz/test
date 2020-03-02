<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Event Attendees</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"> Calendar <span style="float : right;">
            <a href="<?php echo base_url(); ?>admin/saveEventAttendee"><i class="md-icon material-icons">get_app</i></a>
        </span></header>
                    
                    <div class="panel-body">
                        <div style="width: 100%;">
                            <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <!--<td>S.No.</td>-->
                                <td>Title</td>
                                <td style="width: 20%;">Username</td>
                                <td>Attending</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($attendee as $val){ ?>
                                <tr style="<?php if($val['eventAttending'] == 1){ ?>color : green;<?php }else{ ?>color : red;<?php } ?>">
                                    <!--<td><?= $i; ?></td>-->
                                    <td><?= ucfirst($val['event_title']) ?></td>
                                    <td style="width: 20%;"><?= ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['fname'])." ".ucfirst($this->data->fetch('member', array('id' => $val['user_id']))[0]['lname']);?></td>
                                    <td><?php if($val['eventAttending'] == 1){echo 'Attending';}else{echo 'Not Attending'; }?></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="row"></div>
                        <h5 style="font-weight: bold">Total Members: <?= count($attendee) ?>&nbsp;&nbsp;&nbsp;&nbsp;Total Attending : <?= count($attending); ?>&nbsp;&nbsp;&nbsp;&nbsp;Total Not Attending : <?= count($attendee) - count($attending); ?></h5>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="conf"></div>
</section>
    <?php $i=1; foreach($members as $val){ ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?= $i ?>" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Name</td>
                                <td><?= $val['fname']." ".$val['lname'] ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?= $val['gander'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php $i++; } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
<script>
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
    function saveIt(){

        var doc = new jsPDF();
        doc.addHTML($('#invoice_preview')[0], 5, 5, {
            'background': '#fff'
        }, function() {
            doc.save('member.pdf');
        });

    }
    
    $(function () {
        altair_invoices.init()
    });
    var $invoice_card = $("#invoice"), $invoice_preview = $("#invoice_preview"), $invoice_form = $("#invoice_form"), $invoices_list_main = $("#invoices_list"), invoice_list_class = ".invoices_list", $invoice_add_btn = $("#invoice_add");
    altair_invoices = {
        init: function () {
            altair_invoices.copy_list_sidebar(),
                altair_invoices.add_new(),
                altair_invoices.open_invoice(),
                altair_invoices.print_invoice();
        },
        add_new: function () {
            if ($invoice_add_btn) {
                var i = function () {
                    var i = $("#invoice_form_template"), e = $invoice_card.height(), n = $invoice_card.find(".md-card-content").innerHeight(), t = i.html();
                    $(invoice_list_class).find(".md-list-item-active").removeClass("md-list-item-active"), $invoice_card.height(e), $invoice_form.hide().html(t).find(".md-card-content").innerHeight(n);
                    var o = function () {
                        var i = $("#invoice_form_template_services"), e = $invoice_form.find("#form_invoice_services"), n = i.html(), t = Handlebars.compile(n), o = e.children().length ? parseInt(e.children(".uk-grid:last").attr("data-service-number")) + 1 : 1, c = {invoice_service_id: o}, a = t(c);
                        e.append(a), altair_md.inputs(), altair_forms.textarea_autosize(), altair_uikit.reinitialize_grid_margin()
                    };
                    o(), $("#invoice_form_append_service_btn").on("click", function (i) {
                        i.preventDefault(), o()
                    }), altair_md.checkbox_radio()
                }, e = function () {
                    $invoice_card.css({height: ""}), $invoice_form.show(), $invoice_preview.html(""), setTimeout(function () {
                        altair_uikit.reinitialize_grid_margin()
                    }, 560)
                };
                $invoice_add_btn.on("click", function (n) {
                    n.preventDefault(), altair_md.card_show_hide($invoice_card, i, e, void 0)
                })
            }
        },
        open_invoice: function () {
            var i = function (i) {
                //console.log(e)
                var e = i, n = $("#invoice_template"), t = n.html(), o = Handlebars.compile(t), c = parseInt(e.attr("data-invoice-id")),
                    a = invoiceDate(c),
                    r = o(a);
                $invoice_preview.html(r), $invoice_form.html(""), $window.resize(), setTimeout(function () {
                    altair_uikit.reinitialize_grid_margin()
                }, 290)
            };
            $(invoice_list_class).on("click", "a", function (e) {
                //console.log(e);
                e.preventDefault(),
                    e.stopPropagation(),
                    altair_md.card_show_hide($invoice_card, void 0, i, $(this)),
                    $(this).closest("li").siblings("li").removeClass("md-list-item-active").end().addClass("md-list-item-active")
            }), $(invoice_list_class).find("a").length ? $(invoice_list_class).find("a").eq(0).click() : $invoice_add_btn.trigger("click")
        }, print_invoice: function () {
            $body.on("click", "#invoice_print", function (i) {
                i.preventDefault(), UIkit.modal.confirm("Do you want to print this invoice?", function () {
                    altair_main_sidebar.hide_sidebar(), setTimeout(function () {
                        window.print();
                        //console.log($('body').html());
//                        saveIt();
                    }, 300)
                }, {labels: {Ok: "print"}})
            })
        }, copy_list_sidebar: function () {
            $sidebar_secondary_toggle.addClass("uk-hidden-large");
            var i = $invoices_list_main.clone();
            i.attr("id", "invoices_list_sidebar"), $sidebar_secondary.find(".sidebar_secondary_wrapper").html(i).end()
        }
    };
    // $('#myTableUser').DataTable({
    //         'destroy'           : true,     // see http://datatables.net/manual/tech-notes/3#destroy - 2nd example
    //         'paging'            : false,
    //         'scrollCollapse'    : true,
    //         'scrollY'           : '65vh',
    //         'fixedHeader'       : true,
    //         'dom'               : 'frt',
    //         'columns'           : [         // see https://datatables.net/reference/option/columns.searchable
    //             { 'searchable': false },
    //             { 'searchable': false },
    //             null,   // product code 
    //             null,   // description 
    //             { 'searchable': false }
    //         ]
    //     }); 
</script>    