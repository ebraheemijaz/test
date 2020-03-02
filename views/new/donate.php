<?php
$v = $userAdmin[0];
?>
<style>
    .row {
        margin-right: -15px;
        margin-left: -15px;
    }
    .row:before,
    .row:after{
        display: table;
        content: " ";
    }
    .row:after{
        clear: both;
    }
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .switch input {display:none;}
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
</style>
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Donations</h3>
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-uk-grid-match="{target:'.md-card'}">
            <div class="uk-width-large-8-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content">
                        <div class="dt_colVis_buttons">
                            <button data-step="1" data-intro="Click on this button to donate" class="md-btn md-btn-success" data-uk-modal="{target:'#newModal'}">Make a donation</button>
                            <div style="float: right;">
                                            <?php 
                                                $giftAid = $this->data->fetch('member', array('id' => $v['id'], 'status' => 'active'));
                                            ?>
                                            <!--<span>Disagree For Gift Aid</span>&nbsp;&nbsp;&nbsp;&nbsp;-->
                                            <label class="switch" style="margin-top: 14px; margin-left: 15px;">
                                              <input type="checkbox" <?php if($giftAid[0]['giftAid'] == 1){ ?>checked<?php }?> id="giftAid" name="giftAid">
                                              <span class="slider round"></span>
                                            </label>
                                            <br/>
                                            <span>Gift Aid</span>
                                        </div>
                        </div>
                        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Date        </th>
                                <th>Purpose     </th>
                                <th>Description </th>
                                <th>Amount      </th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if(!empty($donations)){ ?>
                                <?php $total=0; foreach($donations as $val){ ?>
                                    <tr>
                                        <td><?= $val['date'] ?>                 </td>
                                        <td><?= $val['detail'] ?>               </td>
                                        <td><?= $val['purpose'] ?>  </td>
                                        <td>£<?= $val['amount'] ?>              </td>
                                    </tr>
                                    <?php $total+=$val['amount']; } ?>
                                <tr>
                                    <td colspan="3">Total Donation</td>
                                    <td>£ <?= $total ?></td>
                                </tr>
                            <?php }else{ ?>
                                <tr>
                                    <th style="text-align: center;" colspan="4">
                                        You have not made any donation yet <a data-uk-modal="{target:'#newModal'}">Click here</a> to make a donation now.
                                    </th>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <?php require_once('advert_v.php'); ?>

        </div>
    </div>
</div>

<div id="newModal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h1>New Donation</h1>
        <?= form_open("home/paypalDonate",array("class"=>"form-horizontal")) ?>


        <div class="uk-form-row uk-grid" data-uk-grid-margin>
            <div class="uk-width-1-10" style="float:right;">
                <br>
                <i class="uk-icon-gbp"></i>
            </div>
            <div class="uk-width-9-10" style="padding: 5px">
                <label>Amount</label>
                <input type="number" name="amount" required value="1" min="1" class="md-input" />
            </div>
        </div>
        <div class="uk-form-row">
            <div class="uk-width-medium-1-1">
                <label for="">Purpose:</label>
                <select style="height: 100%;" class="md-input" name="detail">
                    <option value="Offerings">Offerings</option>
                    <option value="Tithe">Tithe</option>
                    <option value="Food Bank">Food Bank</option>
                    <option value="Welfare">Welfare</option>
                    <option value="Missionary">Missionary</option>
                    <option value="Children">Children</option>
                    <option value="Pledge">Pledge</option>
                    <option value="Christmas Hamper">Christmas Hamper</option>
                    <option value="Others">Other</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <div class="uk-width-medium-1-1">
                <label>Additional Information::</label>
                <textarea id="" cols="30" name="purpose" rows="4" class="md-input"></textarea>
            </div>
        </div>
        
        <div class="uk-form-row">
            <input type="submit" class="md-btn md-btn-success" value="Donate Now!"/>
        </div>
        </form>
    </div>
</div>
<script>
    $('#dt_default').dataTable( {
        "aaSorting": [[ 0, "asc" ]]
    } );
</script>
<script>
    $(document).ready(function(){
        $('#giftAid').click(function(){
            if(this.checked){
                id = "<?= $userAdmin[0]['id']; ?>";
                swal({
                    title: "Gift Aid Consent",
                    text: "By ticking the box, it’s confirms that you are a tax payer in this country (United Kingdom) and you give us the consent to claim back on your behalf from the government 25p on every £1 you donate to our charity. ",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            url: "<?= site_url('home') ?>/giftAid",
                            type: "POST",
                            data: {id:id, giftAid:1},
                            success: function(e){
                                swal(
                                  'Thank You',
                                  'We are glad to see you opted for the Gift Aid.',
                                  'success'
                                )
                                window.location.reload();
                            }
                        });
                    }else{
                        window.location.reload();
                    }
                });
            }else{
                id = "<?= $userAdmin[0]['id']; ?>";
                swal({
                    title: "Are you sure?",
                    text: "Are you sure you want to cancel your gift aid to our charity?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            url: "<?= site_url('home') ?>/giftAid",
                            type: "POST",
                            data: {id:id, giftAid:0},
                            success: function(e){
                                swal(
                                  'Thank You',
                                  'We will see you back again start gifting.',
                                  'success'
                                )
                                window.location.reload();
                            }
                        });
                    }else{
                        window.location.reload();
                    }
                });
            }
        }); 
    });
</script>
