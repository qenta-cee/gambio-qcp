<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

$c = htmlspecialchars($_GET['pm']);
$supportMails = "support@qenta.com";
$message = array('ERROR'=>'','OK'=>'');

require 'includes/application_top.php';

define('PAGE_URL', HTTP_SERVER.DIR_WS_ADMIN.basename(__FILE__));
define('PAGE_BACK_URL', HTTP_SERVER.DIR_WS_ADMIN.'modules.php?set=payment&module='.strtolower($c));
require_once ('../includes/modules/payment/qcp.php');
include(DIR_FS_CATALOG.'lang/'.$_SESSION['language'].'/modules/payment/qcp.php');



$q = "SELECT * FROM configuration where configuration_key LIKE 'MODULE_PAYMENT_".$c."%'";
$res = xtc_db_query($q);
$confDataString = '';

while ($row = xtc_db_fetch_array($res)) {
    if ($row['configuration_key'] != 'MODULE_PAYMENT_' . $c . '_PRESHARED_KEY') {
        $confDataString .= $row['configuration_key'] . " = " . $row['configuration_value'] . "\n\r";
    }
    else {
        $confDataString .= $row['configuration_key']." = ".str_pad('',strlen($row['configuration_value']),'X')."\n\r";
    }
}

if(isset($_POST['submit'])) {
    if(!empty($_POST['qcp_config_export_reply_to_mail']) && !filter_var($_POST['qcp_config_export_reply_to_mail'], FILTER_VALIDATE_EMAIL)) {
        $message['ERROR'] = qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_INVALID_MAIL");
    }
    $email = $confDataString."\n\r\n\r";
    $email .= htmlspecialchars($_POST['qcp_config_export_description_text'])."\n\r";

    $headers   = array();
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/plain; charset=iso-8859-1";
    $headers[] = 'From: '.STORE_NAME.' <'.EMAIL_SUPPORT_REPLY_ADDRESS.'>';

    if(!empty($_POST['qcp_config_export_reply_to_mail']))
        $headers[] = "Reply-To: ".$_POST['qcp_config_export_reply_to_mail'];
    else {
        $headers[] = "Reply-To: ".EMAIL_SUPPORT_REPLY_ADDRESS;
    }

    if(empty($message['ERROR'])) {
        if(mail($_POST['qcp_config_export_receiver'], 'QCP Config Export', $email, implode("\r\n", $headers))) {
            $message['OK'] = qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_MAIL_SENT");
            unset($_POST);
        }
        else {
            $message['ERROR'] = qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_MAIL_NOT_SENT");
        }
    }
}

    ?>
    <!doctype HTML>
    <html <?php echo HTML_PARAMS; ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['language_charset']; ?>">
        <title><?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_LABEL"); ?></title>
        <link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
    </head>
    <body>
    <!-- header //-->
    <?php require DIR_WS_INCLUDES . 'header.php'; ?>
    <!-- header_eof //-->

    <!-- body //-->
    <table width="100%" cellspacing="2" cellpadding="2" border="0">
        <tbody>
        <tr>
            <td class="columnLeft2" width="<?php echo BOX_WIDTH; ?>" valign="top">
                <table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">

                    <!-- left_navigation //-->
                    <?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
                    <!-- left_navigation_eof //-->

                </table>
            </td>

            <!-- body_text //-->
            <td class="boxCenter" width="100%" valign="top">
                    <span class="main">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:5px">
                        <tbody>
                        <tr class="dataTableHeadingRow">
                            <td class="dataTableHeadingContentText"
                                style="border-right: 0px"><?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_LABEL"); ?></td>
                        </tr>
                        </tbody>
                    </table>

                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border: 1px solid #dddddd">
                        <tbody>
                        <tr class="dataTableRow">
                            <td style="font-size: 12px; padding: 0px 10px 11px 10px; text-align: justify"
                                <?php if($message['ERROR']) {
                                    echo '<div style="color:#FF0000"><strong>'.$message['ERROR'].'</strong></div>';
                                } ?>
                                <?php if($message['OK']) {
                                    echo '<div style="color:#00FF00"><strong>'.$message['OK'].'</strong></div>';
                                } ?>
                                <?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_DESC"); ?>
                                <br>
                                <br>

                                <form method="post" action="<?php echo PAGE_URL; ?>?pm=<?php echo $c; ?>" name="qcp_config_export_form">
                                    <label
                                        for="qcp_config_export_receiver" style="display:block"><strong><?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_RECEIVER"); ?></strong></label>
                                    <select name="qcp_config_export_receiver">
                                        <?php foreach($supportMails as $mailAddress) {
                                            $selected = '';
                                            if(isset($_POST['qcp_config_export_receiver']) && $mailAddress == $_POST['qcp_config_export_receiver']) {
                                                $selected = ' selected="selected"';
                                            }
                                            echo '<option value="'.$mailAddress.'"'.$selected.'>'.$mailAddress.'</option>';
                                        } ?>
                                    </select>
                                    <br>
                                    <br>
                                    <label
                                        for="qcp_config_export_config_string" style="display:block"><strong><?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_CONFIG_STRING"); ?></strong></label>
                                    <textarea name="qcp_config_export_config_string"
                                              cols="80"
                                              rows="20"
                                              style="overflow: scroll; resize: none;"
                                              ><?php echo $confDataString; ?></textarea>
                                    <br>
                                    <br>
                                    <label
                                        for="qcp_config_export_description_text" style="display:block"><strong><?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_DESC_TEXT"); ?></strong></label>
                                    <textarea name="qcp_config_export_description_text"
                                              cols="80"
                                              rows="20"
                                              ><?php if(isset($_POST['qcp_config_export_description_text'])) echo $_POST['qcp_config_export_description_text']; ?></textarea>
                                    <br>
                                    <br>
                                    <label
                                        for="qcp_config_export_reply_to_mail" style="display:block"><strong><?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_RETURN_MAIL"); ?></strong></label>
                                    <input type="text"
                                           value="<?php if(isset($_POST['qcp_config_export_reply_to_mail'])) echo $_POST['qcp_config_export_reply_to_mail']; ?>"
                                           name="qcp_config_export_reply_to_mail"
                                            size="80">
                                    <br>
                                    <br>
                                    <input class="button" type="submit"
                                           value="<?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_SUBMIT_BUTTON"); ?>"
                                           onclick="this.blur();" name="submit" style="margin-left:1px">
                                    <a href="<?php echo PAGE_BACK_URL; ?>" class="button" style="float:left;margin-left:1px"><?php echo qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_BACK_BUTTON");?></a>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </span>
                <script>
                    $(function () {
                        $('input.countrycb').click(function () {
                            $('dl.countrydata', $(this).parent()).slideToggle($(this).prop('checked'));
                        });
                        $('dl.countrydata', $('input.countrycb:checked').parent()).show();
                    });
                </script>

                <!-- body_text_eof //-->

        </tr>
    </table>
    <!-- body_eof //-->

    <!-- footer //-->
    <?php require DIR_WS_INCLUDES . 'footer.php'; ?>
    <!-- footer_eof //-->
    </body>
    </html>
<?php


require DIR_WS_INCLUDES . 'application_bottom.php';

