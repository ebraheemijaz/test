<?php $check = $this->session->userdata('userMember'); ?>
<div id="page_content">
    <div id="page_content_inner">
        <div class="uk-width-large-8-10 uk-container-center reset-print">
            <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card md-card-single main-print" id="invoice">
                        <a href="<?= $_SERVER['HTTP_REFERER'];?>" class="uk-button uk-button-primary" style="float : right;">X</a>
                        <div data-step="1" data-intro="To Create Offer Please Go To Chat Area  <br/> And Click <i style='color:white' class='material-icons md-24'>&#xE563;</i> icon. "  id="invoice_preview">
                            <?php if(empty($offers)){ ?>
                                <h3 class="md-card-head-text uk-text-center">
                                    You Currently have no offer <?= (isset($_GET['type']) AND $_GET['type'] == 'sent') ? "sent. Go to chat area to send offers" : "received."; ?>
                                    <br>
                                </h3>
                            <?php } ?>
                        </div>
                        <div id="invoice_form"></div>
                    </div>
                </div>
                <div class="uk-width-large-3-10 hidden-print uk-visible-large" style="display: block!important;">
                    <div class="md-list-outside-wrapper">
                        <ul class="md-list md-list-outside invoices_list" id="invoices_list">
                            <li class="heading_list">Invoices</li>
                            <?php $i=1; foreach($offers as $val){ ?>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="<?= $val['id'] ?>">
                                        <span class="md-list-heading uk-text-truncate">Invoice #<?= $val['id'] ?>/<?= date("Y",strtotime($val['date'])); ?><span class="uk-text-small uk-text-muted">(<?= date("d M",strtotime($val['date'])); ?>)</span></span>
                                        <span class="uk-text-small uk-text-muted"><?= ucfirst($val['status']); ?></span>
                                        <?php
                                            $Date = date('Y-m-d', strtotime($val['date']));
                                            $expiry = $val['expiry'];
                                            $expiryDate = date('Y-m-d', strtotime($Date. ' + '.$expiry.' days'));
                                            $today = date('Y-m-d');
                                            if($expiryDate <= $today) {
                                                $exp = 1;
                                            }else{
                                                $exp = 0;
                                            }
                                        ?>
                                        <?php if(($val['status'] == 'rejected' && $val['user_id'] == $check[0]['id']) || ($exp && $val['user_id'] == $check[0]['id'])){ ?>
                                        <span style="float: right;cursor: pointer;font-size:20px" onclick="deleteThisInvoice('<?= site_url('home/deleteOffers/'.$val['id']) ?>')">&times;</span>
                                        <?php } ?>
                                    </a>
                                </li>
                            <?php $i++; } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="md-fab-wrapper">
    <a class="md-fab md-fab-accent md-fab-wave-light" href="#" id="invoice_add">
        <i class="material-icons">&#xE145;</i>
    </a>
</div>-->

<div id="sidebar_secondary">
    <div class="sidebar_secondary_wrapper uk-margin-remove"></div>
</div>

<script id="invoice_template" type="text/x-handlebars-template">
    <div class="md-card-toolbar{{#if invoice.header}} hidden-print{{/if}}">
        <div class="md-card-toolbar-actions hidden-print">
            <i class="md-icon material-icons" id="invoice_print">&#xE8ad;</i>
            <a href="<?= site_url('home/save_offer_sent')."/".$_GET['type']."/{{invoice.id}}" ?>"><i class="md-icon material-icons">get_app</i></a>
        </div>
        <h3 class="md-card-toolbar-heading-text large" id="invoice_name">
            Invoice #{{invoice.id}}
        </h3>
    </div>
    <div class="md-card-content invoice_content print_bg{{#if invoice.footer}} invoice_footer_active{{/if}}">

        <div class="invoice_header md-bg-blue-grey-500">

            <img src="<?= base_url('assets_f/img/business') ?>/<?= $business[0]['logo'] ?>" alt="" height="30" width="140"/>&nbsp;&nbsp; <?= $business[0]['title'] ?>
            <img class="uk-float-right" src="<?= base_url('assets_new') ?>/assets/img/logo_main.png" alt="" height="30" width="140"/>
        </div>
        <div class="uk-margin-medium-bottom">
            {{#if invoice.header}}
            <h3 class="heading_a uk-margin-bottom"> Invoice {{invoice.invoice_number}} </h3>
            {{/if}}
            <span class="uk-text-muted uk-text-small uk-text-italic">Date:</span> {{invoice.invoice_date}}
            <br/>
            <span class="uk-text-muted uk-text-small uk-text-italic">Due Date:</span> <span {{#if invoice.overdue}} class="uk-text-danger uk-text-bold"{{/if}}>{{invoice.invoice_due_date}}</span>
            <!--<div class="" style="float: right">
                <span class="">From:</span>
                <br>
                <span><strong>{{invoice.invoice_from_company}}</strong></span>
                <br>
                <span>{{invoice.invoice_from_address_1}}</span>
                <br>
                <span>{{invoice.invoice_from_address_2}}</span>
            </div>-->
        </div>
        <br>
        <br>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-small-6-10">
                <div class="uk-margin-medium-bottom">
                    <span class="uk-text-muted uk-text-small uk-text-italic">Received from:</span>
                    <address>
                        <p><strong>{{invoice.invoice_to_company}}</strong></p>
                        <p>{{invoice.invoice_to_address_1}}</p>
                        <p>{{invoice.invoice_to_address_2}}</p>
                    </address>
                </div>
            </div>
            <div class="uk-width-small-4-10">
                <span class="uk-text-muted uk-text-small uk-text-italic">Total:</span>
                <p class="heading_b {{#if invoice.overdue}}uk-text-danger{{else}}uk-text-success{{/if}}">{{invoice.invoice_total_value}}</p>
            </div>
        </div>
        <div class="uk-grid uk-margin-large-bottom">
            <div class="uk-width-1-1">
                <table class="uk-table">
                    <thead>
                    <tr class="uk-text-upper">
                        <th>Description</th>
                        <th>Rate</th>
                        <th class="uk-text-center">Duration</th>
                        <th class="uk-text-center">Total</th>
<!--                        <th class="uk-text-center">Status</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    {{#each invoice.invoice_services}}
                    <tr class="uk-table-middle">
                        <td>
                            <span class="uk-text-large">{{ service_name }}</span><br/>
                            <span class="uk-text-muted uk-text-small">{{ service_description }}</span>
                        </td>
                        <td>
                            {{ service_rate }}
                        </td>
                        <td class="uk-text-center">
                            {{ service_hours }}
                        </td>
                        <td class="uk-text-center">
                            {{ service_total }}
                        </td>
                        <!--<td class="uk-text-center">-->
                        <!--{{ service_status }}-->
                        <!--</td>-->
                    </tr>
                    {{/each}}

                    {{#if invoice.invoicebelongsto}}
                       <!-- <tr>
                            <td colspan="4">
                                {{#if invoice.ratingdone}}
                                    <span style="float: right" class="md-btn md-btn-primary">Review Received</span>
                                {{else}}
                                    <a target="_blank" href="<?= site_url('home/view/rating') ?>/{{invoice.id}}">
                                        <span style="float: right" class="md-btn md-btn-primary">Give Review</span>
                                    </a>
                                {{/if}}
                            </td>
                         </tr> -->
                        <tr>
                            {{#if invoice.invoice_status}}
                                {{#if invoice.invoice_reject}}
                                {{else}}
                                <td colspan="4">
                                    <h3 style="color : #d13636;">Offer Rejected.</h3>
                                </td>
                                {{/if}}
                            {{else}}
                                <td colspan="4"><h3 style="color : #82ba57;">Offer Accepted.</h3></td>
                            {{/if}}
                        </tr>
                    {{else}}
                        {{#if invoice.invoice_status}}
                            {{#if invoice.invoice_reject}}
                                <tr>
                                    <td colspan="4">
                                        <a href="<?= site_url('home/acceptOffer'); ?>/{{invoice.id}}/accepted"><span class="md-btn md-btn-primary">Accept</span></a>
                                        <a href="<?= site_url('home/acceptOffer'); ?>/{{invoice.id}}/rejected"><span class="md-btn md-btn-danger">Reject</span></a>
                                    </td>
                                </tr>
                            {{else}}
                                <tr>
                                    <td colspan="4"><h3  style="color : #d13636;">Offer Rejected.</h3></td>
                                </tr>
                            {{/if}}
                        {{else}}
                            <tr>
                                <td colspan="4"><h3 style="color : #82ba57;">Offer Accepeted.</h3></td>
                            </tr>
                        {{/if}}
                    {{/if}}

                    </tbody>
                </table>








            </div>
        </div>
    </div>
</script>


<script id="invoice_form_template_services" type="text/x-handlebars-template">
    {{#ifCond invoice_service_id '!==' 1}}
    <hr class="md-hr"/>
    {{/ifCond}}
    <div class="uk-grid" data-uk-grid-margin data-service-number="{{invoice_service_id}}">
        <div class="uk-width-medium-1-10 uk-text-center">
            <p class="uk-text-large">{{invoice_service_id}}.</p>
        </div>
        <div class="uk-width-medium-9-10">
            <div class="uk-grid uk-grid-small" data-uk-grid-margin>
                <div class="uk-width-medium-5-10">
                    <label for="inv_service_{{invoice_service_id}}">Service Name</label>
                    <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}" name="inv_service_id_{{invoice_service_id}}" />
                </div>
                <div class="uk-width-medium-1-10">
                    <label for="inv_service_{{invoice_service_id}}_rate">Rate</label>
                    <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_rate" name="inv_service_{{invoice_service_id}}_rate" />
                </div>
                <div class="uk-width-medium-1-10">
                    <label for="inv_service_{{invoice_service_id}}_hours">Deadline</label>
                    <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_hours" name="inv_service_{{invoice_service_id}}_hours" />
                </div>
                <div class="uk-width-medium-1-10">
                    <label for="inv_service_{{invoice_service_id}}_vat">VAT</label>
                    <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_vat" name="inv_service_{{invoice_service_id}}_vat" />
                </div>
                <div class="uk-width-medium-2-10">
                    <label for="inv_service_{{invoice_service_id}}_vat">Total</label>
                    <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_vat" name="inv_service_{{invoice_service_id}}_vat" readonly/>
                </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                    <label for="inv_service_{{invoice_service_id}}_desc">Description</label>
                    <textarea class="md-input" id="inv_service_{{invoice_service_id}}_desc" name="invoice_service_id_{{invoice_service_id}}_desc" cols="30" rows="2"></textarea>
                </div>
            </div>
        </div>
    </div>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };
    function saveIt(){

        // var doc = new jsPDF();
        // doc.fromHTML($('#invoice_preview').get(0), 10, 10, {'width': 280},function() {
        //     doc.save('invoice.pdf');
        // });
        var doc = new jsPDF();
        doc.addHTML($('#invoice_preview')[0], 5, 5, {
            'background': '#fff'
        }, function() {
            doc.save('invoiceOffer.pdf');
        });

        /*doc.addHTML($('#invoice_preview')[0], 10, 0, {
            'background': '#fff'
        }, function() {
            doc.save('invoice.pdf');
        });*/

    }

</script>

<!--<script src="--><?//= base_url('assets_new') ?><!--/assets/js/pages/page_invoices.min.js"></script>-->
<script>
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
                        window.print()
                    }, 300)
                }, {labels: {Ok: "print"}})
            })
        }, copy_list_sidebar: function () {
            $sidebar_secondary_toggle.addClass("uk-hidden-large");
            var i = $invoices_list_main.clone();
            i.attr("id", "invoices_list_sidebar"), $sidebar_secondary.find(".sidebar_secondary_wrapper").html(i).end()
        }
    };
</script>

    <script>
        function invoiceDate(id){
            <?php $i=1; foreach($offers as $val){ ?>
            if(id == <?= $val['id'] ?>){
                var a =  {
                    invoice: {
                        invoice_due_date_unix: "<?= strtotime(date("d-M-Y",strtotime("+".$val['expiry']." days",strtotime($val['date'])))); ?>",
                        now_date_unix: "<?= strtotime(date("d-M-Y")); ?>",
                        <?php if(isset($val['rating'])){ ?>
                           invoicebelongsto: 1, //sent
                        <?php }else{ ?>
                            invoicebelongsto: 0, //received
                        <?php } ?>

                        <?php if(isset($val['rating']) AND !empty($val['rating'])){ ?>
                            ratingdone: 1,
                        <?php }else{ ?>
                            ratingdone: 0,
                        <?php } ?>
                        invoice_status: <?= ($val['status'] == 'accepted') ? 0 : 1 ?>,
                        invoice_reject: <?= ($val['status'] == 'rejected') ? 0 : 1 ?>,
                        client_id: <?= $val['client_id'] ?>,
                        my_id: <?= $userAdmin[0]['id'] ?>,
                        user_id: <?= $val['user_id'] ?>,
                        id: "<?= $val['id'] . "/" . date("Y",strtotime($val['date'])) ?>",
                        invoice_number: Math.floor(200 * Math.random() + 1) + "/2015",
                        invoice_date: "<?= date("d-M-Y",strtotime($val['date'])); ?>",
                        invoice_due_date: "<?= date("d-M-Y",strtotime("+".$val['expiry']." days",strtotime($val['date']))); ?>",
                        invoice_from_company: "<?= $userAdmin[0]['fname'] ?> <?= $userAdmin[0]['lname'] ?>",
                        invoice_from_address_1: "<?= $userAdmin[0]['address'] ?>",
                        invoice_from_address_2: "",
                        invoice_to_company: "<?= $val['client'][0]['fname'].' '.$val['client'][0]['lname']; ?>",
                        invoice_to_address_1: "<?= $val['client'][0]['address'] ?>",
                        invoice_to_address_2: "<?= $val['client'][0]['address2'] ?>",
                        invoice_total_value: "£<?= $val['amount'] ?>",
                        invoice_vat_value: "£<?= $val['amount'] ?>",
                        invoice_services: [{
                            service_name: "Service",
                            service_description: "<?= $val['desc'] ?>",
                            service_rate: "£<?= $val['amount'] ?>",
                            service_status: "<?= ucfirst($val['status']) ?>",
                            service_hours: "<?= $val['expiry'].' days'; ?>",
                            service_vat: "23%",
                            service_total: "£<?= $val['amount'] ?>"
                        }],
                        invoice_payment_info: "BANK XYZ<br/>IBAN 123 123 123 123",
                        invoice_payment_due: "14",
                        header: 3 == <?= $val['id'] ?> || 7 == <?= $val['id'] ?>,
                        footer: 3 == <?= $val['id'] ?> || 7 == <?= $val['id'] ?>
                    }
                }
            }
            <?php } ?>

            return a;
        }
    </script>
<script>
    function deleteThisInvoice(srcc){
        var a = '<div id="confiormDelete" class="uk-modal"> ' +
            '<div class="uk-modal-dialog">' +
            '<div class="uk-modal-header">' +
            '<h1>Are you sure you want to delete?</h1>' +
            '</div>' +
            '<div class="uk-modal-footer">' +
            '<button class="md-btn md-btn-primary uk-modal-close">No</button>' +
            '<a href="'+srcc+'" class="md-btn md-btn-danger">Yes</a>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(".confirmationModalOnD").html(a);
        var modal = UIkit.modal("#confiormDelete").show();
    }
</script>
<div class="confirmationModalOnD"></div>
<?php
/**
 Dashboard
 Bible      ✓
 Live Event ✓
 Word Log   ✓
 Bulletin   ✓
 Testimony  ✓
 Prayer Request  ✓
 Donate  ✓
 Bookstore  ✓
 Search  ✓
 My Buddies  ✓
 Business Page  ✓
 Manage Offers  ✖
 Adverts  ✖
 Feedback ✖

 */
?>