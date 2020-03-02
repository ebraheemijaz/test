
<div id="page_content">
    <div id="page_content_inner">
        <div class="uk-width-large-8-10 uk-container-center reset-print">
            <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card md-card-single main-print" id="invoice">
                        <div id="invoice_preview">
                            <div class="md-card-toolbar{{#if invoice.header}} hidden-print{{/if}}">
                                <div class="md-card-toolbar-actions hidden-print">
                                    <i class="md-icon material-icons" id="invoice_print">&#xE8ad;</i>
                                </div>
                                <h3 class="md-card-toolbar-heading-text large" id="invoice_name">
                                    Invoice {{invoice_number}}
                                </h3>
                            </div>
                            <div class="md-card-content invoice_content print_bg{{#if invoice.footer}} invoice_footer_active{{/if}}">
<!--                                {{#if invoice.header}}-->
<!--                                <div class="invoice_header md-bg-blue-grey-500">-->
<!--                                    <img src="assets/img/logo_light.png" alt="" height="30" width="140"/>-->
<!--                                    <img class="uk-float-right" src="assets/img/others/html5-css-javascript-logos.png" alt="" height="80" width="205"/>-->
<!--                                </div>-->
<!--                                {{/if}}-->
                                <div class="uk-margin-medium-bottom">
<!--                                    {{#if invoice.header}}-->
<!--                                    <h3 class="heading_a uk-margin-bottom"> Invoice {{invoice.invoice_number}} </h3>-->
<!--                                    {{/if}}-->
                                    <span class="uk-text-muted uk-text-small uk-text-italic">Date:</span> {{invoice.invoice_date}}
                                    <br/>
                                    <span class="uk-text-muted uk-text-small uk-text-italic">Due Date:</span> <span {{#if invoice.overdue}} class="uk-text-danger uk-text-bold"{{/if}}>{{invoice.invoice_due_date}}</span>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-small-3-5">
                                        <div class="uk-margin-bottom">
                                            <span class="uk-text-muted uk-text-small uk-text-italic">From:</span>
                                            <address>
                                                <p><strong>{{invoice.invoice_from_company}}</strong></p>
                                                <p>{{invoice.invoice_from_address_1}}</p>
                                                <p>{{invoice.invoice_from_address_2}}</p>
                                            </address>
                                        </div>
                                        <div class="uk-margin-medium-bottom">
                                            <span class="uk-text-muted uk-text-small uk-text-italic">To:</span>
                                            <address>
                                                <p><strong>{{invoice.invoice_to_company}}</strong></p>
                                                <p>{{invoice.invoice_to_address_1}}</p>
                                                <p>{{invoice.invoice_to_address_2}}</p>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="uk-width-small-2-5">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Total:</span>
                                        <p class="heading_b {{#if invoice.overdue}}uk-text-danger{{else}}uk-text-success{{/if}}">{{invoice.invoice_total_value}}</p>
                                        <p class="uk-text-small uk-text-muted uk-margin-top-remove">Incl. VAT -
                                            {{invoice.invoice_vat_value}}</p>
                                    </div>
                                </div>
                                <div class="uk-grid uk-margin-large-bottom">
                                    <div class="uk-width-1-1">
                                        <table class="uk-table">
                                            <thead>
                                            <tr class="uk-text-upper">
                                                <th>Description</th>
                                                <th>Rate</th>
                                                <th class="uk-text-center">Hours</th>
                                                <th class="uk-text-center">Vat</th>
                                                <th class="uk-text-center">Total</th>
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
                                                    {{ service_vat }}
                                                </td>
                                                <td class="uk-text-center">
                                                    {{ service_total }}
                                                </td>
                                            </tr>
                                            {{/each}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Payment to:</span>
                                        <p class="uk-margin-top-remove">
                                            {{{ invoice.invoice_payment_info }}}
                                        </p>
                                        <p class="uk-text-small">Please pay within {{ invoice.invoice_payment_due }} days</p>
                                    </div>
                                </div>
                                {{#if invoice.footer}}
                                <div class="invoice_footer">
                                    Veum, Tremblay and Runolfsson<span>&middot;</span>6423 Cassandre Circle
                                    Lauriannechester, DE 02122<br>
                                    </span>1-583-441-5071<span>&middot;</span>ohaag@grant.net            </div>
                                {{/if}}
                            </div>
                        </div>
                        <div id="invoice_form"></div>
                    </div>
                </div>
                <div class="uk-width-large-3-10 hidden-print uk-visible-large">
                    <div class="md-list-outside-wrapper">
                        <ul class="md-list md-list-outside invoices_list" id="invoices_list">
                            <li class="heading_list">February 2017</li>
                            <?php $i=1; foreach($offers as $val){ ?>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="<?= $val['id'] ?>">
                                        <span class="md-list-heading uk-text-truncate">Invoice <?= $val['id'] ?>/<?= date("Y",strtotime($val['date'])); ?><span class="uk-text-small uk-text-muted">(<?= date("d M",strtotime($val['date'])); ?>)</span></span>
                                        <span class="uk-text-small uk-text-muted"><?= $val['status'] ?></span>
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
<div class="md-fab-wrapper">
    <a class="md-fab md-fab-accent md-fab-wave-light" href="#" id="invoice_add">
        <i class="material-icons">&#xE145;</i>
    </a>
</div>

<div id="sidebar_secondary">
    <div class="sidebar_secondary_wrapper uk-margin-remove"></div>
</div>




<!--<script src="--><?//= base_url('assets_new') ?><!--/assets/js/pages/page_invoices.min.js"></script>-->
<script>
    $(function () {
        altair_invoices.init()
    });

</script>
