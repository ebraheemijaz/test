<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Custom Invoice</h3>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom" >
                    <div class="md-card-content">
                        <br/>
                        <form>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <input type="text" class="md-input" id="cust_name" required placeholder="Enter Customer Name"/>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <textarea class="md-input" id="cust_addr" required placeholder="Enter Customer Address"></textarea>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <input type="number" min="0" class="md-input" required id="amount" placeholder="Enter Amount (in GBP)"/>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <input type="date" min="<?= date("Y-m-d") ?>" value="<?= date("Y-m-d") ?>" class="md-input" id="expiry" placeholder="Enter Expiry (in days e.g. Enter 2)"/>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <textarea name="description" id="desc" required cols="30" rows="4" class="md-input" placeholder="Enter Details"></textarea>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <div class="uk-width-medium-1-1">
                                    <label></label>
                                    <button class="md-btn md-btn-danger" type="button" onclick="sendOffer()">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php require_once("advert_v.php"); ?>
        </div>
    </div>
</div>


<script>
    function sendOffer(){
        var cust_name = $("#cust_name").val();
        var cust_addr = $("#cust_addr").val();
        var amount = $("#amount").val();
        var expiry = $("#expiry").val();
        var desc = $("#desc").val();
        $.post('<?= site_url('home/sendOffer2') ?>',{cust_name:cust_name,cust_addr:cust_addr,amount:amount,desc:desc,expiry:expiry},function(e){
            //console.log(e);
            window.location = "<?= site_url('home/view/view_invoices'); ?>";
        })
    }
</script>