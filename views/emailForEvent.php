
<!DOCTYPE html>
<html lang="en">
<!-- Define Charset -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Responsive Meta Tag -->
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title>Email Template</title>
<!-- Responsive and Valid Styles -->
<style type="text/css">

    body{
        width: 100%;
        background-color: #F1F2F7;
        margin:0;
        padding:0;
        -webkit-font-smoothing: antialiased;
        font-family: arial;
    }

    html{
        width: 100%;
    }

    table{
        font-size: 14px;
        border: 0;
    }

    /* ----------- responsive ----------- */
    @media only screen and (max-width: 640px){

        /*------ top header ------ */
        .header-bg{width: 440px !important; height: 10px !important;}
        .main-header{line-height: 28px !important;}
        .main-subheader{line-height: 28px !important;}

        .container{width: 440px !important;}
        .container-middle{width: 420px !important;}
        .mainContent{width: 400px !important;}

        .main-image{width: 400px !important; height: auto !important;}
        .banner{width: 400px !important; height: auto !important;}
        /*------ sections ---------*/
        .section-item{width: 400px !important;}
        .section-img{width: 400px !important; height: auto !important;}
        /*------- prefooter ------*/
        .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}
        .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}
        /*------- footer ------*/
        .top-bottom-bg{width: 420px !important; height: auto !important;}

    }

    @media only screen and (max-width: 479px){

        /*------ top header ------ */
        .header-bg{width: 280px !important; height: 10px !important;}
        .top-header-left{width: 260px !important; text-align: center !important;}
        .top-header-right{width: 260px !important;}
        .main-header{line-height: 28px !important; text-align: center !important;}
        .main-subheader{line-height: 28px !important; text-align: center !important;}

        /*------- header ----------*/
        .logo{width: 260px !important;}
        .nav{width: 260px !important;}

        .container{width: 350px !important;}
        .container-middle{width: 260px !important;}
        .mainContent{width: 240px !important;}

        .main-image{width: 240px !important; height: auto !important;}
        .banner{width: 240px !important; height: auto !important;}
        /*------ sections ---------*/
        .section-item{width: 240px !important;}
        .section-img{width: 240px !important; height: auto !important;}
        /*------- prefooter ------*/
        .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}
        .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}
        /*------- footer ------*/
        .top-bottom-bg{width: 260px !important; height: auto !important;}

    }


</style>
<style type="text/css" charset="utf-8">

    /** reset styling **/

    .firebugResetStyles {

        z-index: 2147483646 !important;

        top: 0 !important;

        left: 0 !important;

        display: block !important;

        border: 0 none !important;

        margin: 0 !important;

        padding: 0 !important;

        outline: 0 !important;

        min-width: 0 !important;

        max-width: none !important;

        min-height: 0 !important;

        max-height: none !important;

        position: fixed !important;

        transform: rotate(0deg) !important;

        transform-origin: 50% 50% !important;

        border-radius: 0 !important;

        box-shadow: none !important;

        background: transparent none !important;

        pointer-events: none !important;

        white-space: normal !important;

    }



    .firebugBlockBackgroundColor {

        background-color: transparent !important;

    }



    .firebugResetStyles:before, .firebugResetStyles:after {

        content: "" !important;

    }

    /**actual styling to be modified by firebug theme**/

    .firebugCanvas {

        display: none !important;

    }



    /* ------------------------- */

    .firebugLayoutBox {

        width: auto !important;

        position: static !important;

    }



    .firebugLayoutBoxOffset {

        opacity: 0.8 !important;

        position: fixed !important;

    }



    .firebugLayoutLine {

        opacity: 0.4 !important;

        background-color: #000000 !important;

    }



    .firebugLayoutLineLeft, .firebugLayoutLineRight {

        width: 1px !important;

        height: 100% !important;

    }



    .firebugLayoutLineTop, .firebugLayoutLineBottom {

        width: 100% !important;

        height: 1px !important;

    }



    .firebugLayoutLineTop {

        margin-top: -1px !important;

        border-top: 1px solid #999999 !important;

    }



    .firebugLayoutLineRight {

        border-right: 1px solid #999999 !important;

    }



    .firebugLayoutLineBottom {

        border-bottom: 1px solid #999999 !important;

    }



    .firebugLayoutLineLeft {
        margin-left: -1px !important;
        border-left: 1px solid #999999 !important;
    }
    /* ----------------- */
    .firebugLayoutBoxParent {
        border-top: 0 none !important;
        border-right: 1px dashed #E00 !important;
        border-bottom: 1px dashed #E00 !important;
        border-left: 0 none !important;
        position: fixed !important;
        width: auto !important;
    }
    .firebugRuler{
        position: absolute !important;
    }
    .firebugRulerH {
        top: -15px !important;
        left: 0 !important;
        width: 100% !important;
        height: 14px !important;
        border-top: 1px solid #BBBBBB !important;
        border-right: 1px dashed #BBBBBB !important;
        border-bottom: 1px solid #000000 !important;
    }
    .firebugRulerV {
        top: 0 !important;
        left: -15px !important;
        width: 14px !important;
        height: 100% !important;
        border-left: 1px solid #BBBBBB !important;
        border-right: 1px solid #000000 !important;
        border-bottom: 1px dashed #BBBBBB !important;
    }
    .overflowRulerX > .firebugRulerV {
        left: 0 !important;
    }
    .overflowRulerY > .firebugRulerH {
        top: 0 !important;
    }
    /* --------------------------------- */
    .fbProxyElement {

        position: fixed !important;

        pointer-events: auto !important;

    }


    .btn-info {
        border-radius:7px;
        padding:10px;
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
    }
    .btn-info:focus,
    .btn-info.focus {
        color: #fff;
        background-color: #31b0d5;
        border-color: #1b6d85;
    }
    .btn-info:hover {
        color: #fff;
        background-color: #31b0d5;
        border-color: #269abc;
    }
    .btn-info:active,
    .btn-info.active,
    .open > .dropdown-toggle.btn-info {
        color: #fff;
        background-color: #31b0d5;
        border-color: #269abc;
    }
    .btn-info:active:hover,
    .btn-info.active:hover,
    .open > .dropdown-toggle.btn-info:hover,
    .btn-info:active:focus,
    .btn-info.active:focus,
    .open > .dropdown-toggle.btn-info:focus,
    .btn-info:active.focus,
    .btn-info.active.focus,
    .open > .dropdown-toggle.btn-info.focus {
        color: #fff;
        background-color: #269abc;
        border-color: #1b6d85;
    }
    .btn-info:active,
    .btn-info.active,
    .open > .dropdown-toggle.btn-info {
        background-image: none;
    }
    .btn-info.disabled:hover,
    .btn-info[disabled]:hover,
    fieldset[disabled] .btn-info:hover,
    .btn-info.disabled:focus,
    .btn-info[disabled]:focus,
    fieldset[disabled] .btn-info:focus,
    .btn-info.disabled.focus,
    .btn-info[disabled].focus,
    fieldset[disabled] .btn-info.focus {
        background-color: #5bc0de;
        border-color: #46b8da;
    }
    .btn-info .badge {
        color: #5bc0de;
        background-color: #fff;
    }

</style>

</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr><td height="30"></td></tr>
    <tr bgcolor="#F1F2F7">
        <td align="center" bgcolor="#F1F2F7" valign="top" width="100%">
            <!--  top header -->
            <table class="container" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                <tr bgcolor="7087A3"><td height="15"></td></tr>
                <tr bgcolor="7087A3">
                    <td align="center">
                        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tbody>
                            <tr>
                                <td>
                                    <table class="top-header-left" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                        <tbody>
                                        <tr>
                                            <td align="center">
                                                <table class="date" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                    <tr>
                                                        <td style="text-align:center!important;">
                                                            <span style="color:white;font-weight: bold;">Membership Management System</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="top-header-right" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td height="20" width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr bgcolor="7087A3">
                    <td height="10"></td>
                </tr>
                </tbody>
            </table>
            <!--  end top header  -->
            <!-- main content -->
            <table class="container" align="center"  border="0" cellpadding="0" cellspacing="0" style="width: 100%;" bgcolor="ffffff">
                <!--Header-->
                <tbody><tr ><td height="40"></td></tr>
                <tr>
                    <td>
                        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tbody><tr>
                                <td>
                                    <table class="logo" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                        <tbody><tr>
                                            <td align="center">
                                                <a href="" style="display: block;">
                                                    <img  style="display: block;" src="<?= base_url() ?>/assets_f/logo.png" alt="logo" width="155">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr><td height="40"></td></tr>
                <!-- end header -->
                <!-- main section -->
                <tr>
                    <td>
                        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">


                            <tr ><td height="7"></td></tr>

                            <tr ><td height="20"></td></tr>

                            <tr >
                                <td>
                                    <table class="mainContent" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                        <tbody>
                                        <tr>
                                            <td class="main-header" style="color: #484848; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                {{msg}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr ><td height="25"></td></tr>
                        </table>
                    </td>
                </tr>
                <!-- end main section -->
                </tbody>
            </table>
            <?php
                $churchDetail = $this->data->fetch('details');
            ?>
            <table class="container" border="0" cellpadding="0" cellspacing="0" style="background-color: #f2f2f2;width: 100%;">
                <tbody>
                    <tr>
                       <td align="center" valign="top" style="padding-top: 9px;padding-right: 9px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        <table align="center" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <tbody><tr>
                                <td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                            <?php if(!empty($churchDetail[0]['mainSite'])){ ?>
                                            <table align="left" class="mcnFollowStacked" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" border="0" cellspacing="0" cellpadding="0">
                                                 
                                                <tbody><tr>
                                                    <td align="center" class="mcnFollowIconContent" valign="top" style="padding-right: 10px;padding-bottom: 5px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a href="{mainSite}" target="_blank" style="word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img width="48" class="mcnFollowBlockIcon" style="width: 30px;display: block;max-width: 30px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" alt="HGTV" src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-96.png"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" class="mcnFollowTextContent" valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a style="text-align: center;color: #606060;line-height: 100%;font-family: Arial;font-size: 11px;font-weight: normal;text-decoration: none;word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" href="{mainSite}" target="_blank">RCCGVHL</a>
                                                    </td>
                                                </tr>
                                                
                                            </tbody></table>
                                            <?php } ?>
                                            <?php    if(!empty($churchDetail[0]['facebook'])) {
                                            ?>
                                            <table align="left" class="mcnFollowStacked" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" border="0" cellspacing="0" cellpadding="0">
                                                 
                                                <tbody>
                                                <tr>
                                                    <td align="center" class="mcnFollowIconContent" valign="top" style="padding-right: 10px;padding-bottom: 5px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a href="{facebook}" target="_blank" style="word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img width="48" class="mcnFollowBlockIcon" style="width: 30px;display: block;max-width: 30px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" alt="Facebook" src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-96.png"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" class="mcnFollowTextContent" valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a style="text-align: center;color: #606060;line-height: 100%;font-family: Arial;font-size: 11px;font-weight: normal;text-decoration: none;word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" href="{facebook}" target="_blank">Facebook</a>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                            </table>
                                            <?php }
                                                if(!empty($churchDetail[0]['youtube'])) {
                                            ?>
                                            <table align="left" class="mcnFollowStacked" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" border="0" cellspacing="0" cellpadding="0">
                                                 
                                                <tbody>
                                                <tr>
                                                    <td align="center" class="mcnFollowIconContent" valign="top" style="padding-right: 10px;padding-bottom: 5px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a href="{youtube}" target="_blank" style="word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img width="48" class="mcnFollowBlockIcon" style="width: 30px;display: block;max-width: 30px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" alt="Facebook" src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-youtube-96.png"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" class="mcnFollowTextContent" valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a style="text-align: center;color: #606060;line-height: 100%;font-family: Arial;font-size: 11px;font-weight: normal;text-decoration: none;word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" href="{youtube}" target="_blank">Youtube</a>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                            </table>
                                            <?php 
                                                }
                                                if(!empty($churchDetail[0]['instagram'])) {
                                            ?>
                                            <table align="left" class="mcnFollowStacked" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" border="0" cellspacing="0" cellpadding="0">
                                                 
                                                <tbody>
                                                <tr>
                                                    <td align="center" class="mcnFollowIconContent" valign="top" style="padding-right: 10px;padding-bottom: 5px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a href="{instagram}" target="_blank" style="word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img width="48" class="mcnFollowBlockIcon" style="width: 30px;display: block;max-width: 30px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" alt="Facebook" src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-instagram-96.png"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" class="mcnFollowTextContent" valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a style="text-align: center;color: #606060;line-height: 100%;font-family: Arial;font-size: 11px;font-weight: normal;text-decoration: none;word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" href="{instagram}" target="_blank">Instagram</a>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                            </table>
                                            <?php 
                                                }
                                                if(!empty($churchDetail[0]['twitter'])) {
                                            ?>
                                            <table align="left" class="mcnFollowStacked" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" border="0" cellspacing="0" cellpadding="0">
                                                 
                                                <tbody><tr>
                                                    <td align="center" class="mcnFollowIconContent" valign="top" style="padding-right: 10px;padding-bottom: 5px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a href="{twitter}" target="_blank" style="word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img width="48" class="mcnFollowBlockIcon" style="width: 30px;display: block;max-width: 30px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" alt="Twitter" src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-96.png"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" class="mcnFollowTextContent" valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a style="text-align: center;color: #606060;line-height: 100%;font-family: Arial;font-size: 11px;font-weight: normal;text-decoration: none;word-wrap: break-word;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" href="{twitter}" target="_blank">Twitter</a>
                                                    </td>
                                                </tr>
                                                
                                            </tbody></table>
                                            <?php 
                                                }
                                            ?>
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                    <!--[if mso]>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </tbody></table>
                    </td> 
                    </tr>
                    <tr>
                        <td align="center" class="main-header" style="line-height: 9px !important; color: #484848; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                            <small style="font-size: 11px;">
                                <?php $url = site_url()."/PRIVACY POLICY.pdf"; ?>
                                    To manage your email preferences or unsubscribe from the Membership Management System emails please <a href='{unsubscribe}' target='__blank'><strong>click here</strong></a>. We won't pass on your email address to anyone else: see our <a href='".$url."'>privacy policy</a>. Reproduced from an email sent by the Membership Management System, on behalf of RCCG VICTORY HOUSE LONDON, 5 CONGREVE STREET, SE17 1TJ. TEL: +44 207 252 7522.
                                    <!--To manage your email preferences or unsubscribe from the Membership Management System emails please <a href="{unsubscribe}" target="__blank"><strong>click here</strong></a>. We won't pass on your email address to anyone else: see our <a href="<?= $url; ?>">privacy policy</a>. Reproduced from an email sent by the Membership Management System, on behalf of BEZALEEL MMSONLINE, Kemp House, 152, City Road, London, EC1V 2NX, United Kingdom.-->
                            </small>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--end main Content -->
            <!-- footer -->
            <table class="container" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                <tr bgcolor="7087A3"><td height="15"></td></tr>
                <tr bgcolor="7087A3">
                    <td  style="color: #fff; font-size: 10px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;" align="center">
                        <span style="font-size : 12px;font-weight: bold">(c) <a style="color:black" href="http://mmsonline.website">MMSONLINE</a> <?php echo date('Y'); ?></span>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="7087A3" height="14"></td>
                </tr>
                </tbody>
            </table>
            <!-- end footer-->
        </td>
    </tr>

    <tr><td height="30"></td></tr>

    </tbody>
</table>


</body>
</html>