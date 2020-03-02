<?php $logo = $this->data->fetch('details', array('id' => 1)); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <style>
        *
        {
            margin:0;
            padding:0;
            font-family:Arial;
            font-size:10pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-family:Arial;
            font-size:10pt;
            margin:0;
            padding:0;
        }
         
        p
        {
            margin:0;
            padding:0;
        }
         
        #wrapper
        {
            width:180mm;
            margin:0 15mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }
         
        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: 149mm;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }
         
        #footer
        {   
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div id="wrapper">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="col-md-4"></div>
                 <div class="col-md-4"><img class="uk-float-left" src="<?= base_url('assets_f') ?>/<?= $logo[0]['logo'] ?>" alt="" height="100" width="140"/><span style="text-align: center; font-size: 20px; margin-right: 20px">Membership Management System</span></div>
                 <div class="col-md-4" style="text-align: center; font-size: 20px;"></div>
             </div>
         </div>
     </div>
    <p style="text-align:center; font-weight:bold; padding-top:5mm;">Members</p>
    <br />
    <?php 
        foreach($memberData as $val){
    ?>
    <table class="heading" style="width:100%;">
        <tr>
            <td style="width:80mm;">
                <h1 class="heading"><?= $val['fname']." ".$val['lname'] ?></h1>
                <h2 class="heading">
                    <?= $val['address'] ?><br />
                    <?= $val['address2'].", ".$val['poatalCode']?><br />
                    <?= $val['town'] ?> , <?= $val['country'] ?><br />
                     
                    E-mail : <?= $val['email'] ?><br />
                    Phone : +<?= $val['mobileNo'] ?>
                </h2>
            </td>
            <td rowspan="2" valign="top" align="right" style="padding:3mm;">
                <table>
                    <tr>
                        <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <td align="center" colspan="2">
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <?php
                                        if($exif['Orientation'] == 6){
                                        ?>
                                        <img src="<?= $image ?>" class="detect" rotate="90"/>
                                        <?php
                                        }else if($exif['Orientation'] == 8){
                                        ?>
                                        <img src="<?= $image ?>" class="detect8" rotate="-90"/>
                                        <?php
                                        }else{
                                        ?>
                                        <img src="<?= $image ?>" class="normal" />
                                        <?php
                                        }
                                        ?>
                                    </td>
                    </tr>
                    <tr><td>Total Login : </td><td><?= $val['count'] ?></td></tr>
                    <tr><td>Joining Date : </td><td><?= date('d-M-Y', strtotime($val['dOfJoining'])) ?></td></tr>
                    <tr><td>Marital Status : </td><td><?= ucfirst($val['maritalStatus']) ?></td></tr>
                    <tr><td>Employment Status : </td><td><?= ucfirst($val['employement']) ?></td></tr>
                    <tr><td>Age Group : </td><td><?php if($val['age_group'] == '18'){echo '13 - 18';}else if($val['age_group'] == '29'){echo '19 - 29';}else if($val['age_group'] == '39'){echo '30 - 39';}else if($val['age_group'] == '49'){echo '40 - 49';}else if($val['age_group'] == '69'){echo '50 - 69';}else if($val['age_group'] == '70'){echo 'Above 70';} ?></td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr><td>Native Country : </td><td><?= ucfirst($val['nativeCountry']) ?></td></tr>
                    <tr><td>Hobbies : </td><td><?= ucfirst($val['hobbies']) ?></td></tr>
                    <tr><td>Business Group : </td><td><?= ucfirst($val['businessGroup']) ?></td></tr>
                    <tr><td>Total Donation : </td><td><?= ucfirst($val['total']) ?></td></tr>
                    <tr><td>Gender : </td><td><?= ucfirst($val['gander']); ?></td></tr>
                </table>
            </td>    
        </tr>
    </table>
    <hr/>
    <?php } ?>     
         
    
     
    <br />
     
    </div>
     
    <htmlpagefooter name="footer">
        <hr />
        <div id="footer"> 
            <table>
                <tr><td>RCCG Victory House London UK</td></tr>
            </table>
        </div>
    </htmlpagefooter>
    <sethtmlpagefooter name="footer" value="on" />
     
</body>
</html>