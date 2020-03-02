<?php 
    $val = $calendar[0];
?>
<?php $logo = $this->data->fetch('details', array('id' => 1)); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Details</title>
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
     
    <p style="text-align:center; font-weight:bold; padding-top:5mm;">Event</p>
    <br />
    <?php 
        $i = 1;
    ?>
    <table class="heading" style="width:100%;">
        <!--<tr><td align="center" colspan="2"><?= $i; ?></td></tr>-->
        <tr>
            <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <td align="center">
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <?php
                                        if($exif['Orientation'] == 6){
                                        ?>
                                        <img src="<?= $image ?>" class="detect" rotate="90" style="width: 100%; height: 300px;"/>
                                        <?php
                                        }else if($exif['Orientation'] == 8){
                                        ?>
                                        <img src="<?= $image ?>" class="detect8" rotate="-90"  style="width: 100%; height: 300px;"/>
                                        <?php
                                        }else{
                                        ?>
                                        <img src="<?= $image ?>" class="normal"  style="width: 100%; height: 300px;"/>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    </tr>
                                    <tr>
            <td valign="top" align="right" style="padding:3mm;">
                <table>
                    <tr>
                    </tr>
                    <tr><td>Title: </td><td><?= $val['desc'] ?></td><td>Link: </td><td><?= $val['link'] ?></td></tr>
                    <!--<tr></tr>-->
                    <tr><td>Start Date: </td><td><?= date('d-m-Y', strtotime($val['date'])) ?></td><td>End Date: </td><td><?= date('d-m-Y', strtotime($val['endDate'])) ?></td></tr>
                    <!--<tr></tr>-->
                    <tr><td>Event Description: </td><td><?= ucfirst($val['eventDesc']) ?></td><td>Remind Event: </td><td><?php if($val['isReminded']){echo 'Yes';}else{echo 'No';} ?></td></tr>
                    <!--<tr></tr>-->
                    <tr><td colspan="2">Reminder Time: </td><td colspan="2"><?php $minutes = $val['reminder_event']; $hours = floor($minutes / 60).' hours : '.($minutes -   floor($minutes / 60) * 60)." minutes"; echo $hours; ?></td></tr>
                    <!--<tr></tr>-->
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" valign="top" align="right" style="padding:3mm;">
                <h1 class="heading"><?= $val['fname']." ".$val['lname'] ?></h1>
                <h2 class="heading">
                    <table class="heading" style="width: 100%;">
                        <?php foreach($remDesc as $rem){ ?>
                            <tr>
                                <td>Date: </td><td><?= date('d-m-Y', strtotime($rem['date'])) ?></td><td>Start Time: </td><td><?= date('H:i:s', strtotime($rem['startTime'])) ?></td><td>End Time: </td><td><?= date('H:i:s', strtotime($rem['endTime'])) ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </h2>
            </td>
        </tr>
    </table>
    <hr style="color: #f44283;"/>
         
    
     
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