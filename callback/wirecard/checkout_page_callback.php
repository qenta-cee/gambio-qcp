<?php
/**
 * Shop System Plugins - Terms of Use
 *
 * The plugins offered are provided free of charge by Wirecard Central Eastern
 * Europe GmbH
 * (abbreviated to Wirecard CEE) and are explicitly not part of the Wirecard
 * CEE range of products and services.
 *
 * They have been tested and approved for full functionality in the standard
 * configuration
 * (status on delivery) of the corresponding shop system. They are under
 * General Public License Version 2 (GPLv2) and can be used, developed and
 * passed on to third parties under the same terms.
 *
 * However, Wirecard CEE does not provide any guarantee or accept any liability
 * for any errors occurring when used in an enhanced, customized shop system
 * configuration.
 *
 * Operation in an enhanced, customized configuration is at your own risk and
 * requires a comprehensive test phase by the user of the plugin.
 *
 * Customers use the plugins at their own risk. Wirecard CEE does not guarantee
 * their full functionality neither does Wirecard CEE assume liability for any
 * disadvantages related to the use of the plugins. Additionally, Wirecard CEE
 * does not guarantee the full functionality for customized shop systems or
 * installed plugins of other vendors of plugins within the same shop system.
 *
 * Customers are responsible for testing the plugin's functionality before
 * starting productive operation.
 *
 * By installing the plugin into the shop system the customer agrees to these
 * terms of use. Please do not use the plugin if you do not agree to these
 * terms of use!
 *
 * @author    WirecardCEE
 * @copyright WirecardCEE
 * @license   GPLv2
 */

chdir('../../');

require_once('includes/modules/payment/wcp_top.php');
wcp_preserve_postparams();
require_once('includes/application_top.php');
wcp_preserve_postparams(true);
require_once('includes/modules/payment/wcp.php');

if(isset($_POST))
{
    $paymentState = '';
    $order_id = isset($_POST['order_id']) ? (int)$_POST['order_id'] : '';
    $q = xtc_db_query('SELECT response FROM ' . TABLE_PAYMENT_WCP . ' WHERE orders_id = "'.$order_id.'" LIMIT 1;');
    if($q->num_rows) {
        $dbEntry = $q->fetch_array();
        $paymentInformation = unserialize($dbEntry['response']);
        $paymentState = $paymentInformation['paymentState'];
        if(isset($_POST['paymentState'])) {
            $paymentState = $_POST['paymentState'];

            $orderStatusSuccess = 2;

            $c = strtoupper($_POST['paymentCode']);
            if(defined("MODULE_PAYMENT_{$c}_ORDER_STATUS_ID"))
                $orderStatusSuccess = constant("MODULE_PAYMENT_{$c}_ORDER_STATUS_ID");

            switch ($_POST['paymentState']) {
                case 'SUCCESS':
                    $order_status = $orderStatusSuccess;
                    break;

                case 'PENDING':
                    $order_status = MODULE_PAYMENT_WCP_ORDER_STATUS_PENDING;
                    break;

                default:
                    $order_status = MODULE_PAYMENT_WCP_ORDER_STATUS_FAILED;
            }

            $q = xtc_db_query(
                'UPDATE ' . TABLE_ORDERS . ' SET orders_status=\'' . xtc_db_input(
                    $order_status
                ) . '\' WHERE orders_id=\'' . $order_id . '\';'
            );
        }
    }
    //fallback update of order
    else {
		chdir('callback/wirecard/');
        include ('checkout_page_confirm.php');

        $q = xtc_db_query('SELECT SQL_NO_CACHE response FROM ' . TABLE_PAYMENT_WCP . ' WHERE orders_id = "'.$order_id.'" LIMIT 1;');
        if($q->num_rows) {
            $dbEntry = $q->fetch_array();
            $paymentInformation = unserialize($dbEntry['response']);
            $paymentState = $paymentInformation['paymentState'];
        }
        if (isset($_SESSION['wirecard_checkout_page_fingerprintinvalid'])) {
            $paymentState = $_SESSION['wirecard_checkout_page_fingerprintinvalid'];
        }
    }

    switch ($paymentState)
    {
        case 'SUCCESS':
            $_SESSION['cart']->reset(true);
            $link = xtc_href_link(FILENAME_CHECKOUT_SUCCESS, '', 'SSL');
            break;
        case 'PENDING':
            $_SESSION['cart']->reset(true);
            $link = xtc_href_link('checkout_wirecard_checkout_page.php', 'pending=1', 'SSL');
            break;
        case 'CANCEL':
            $link = xtc_href_link('checkout_wirecard_checkout_page.php', 'cancel=1', 'SSL');
            break;
        default:
            $link = xtc_href_link('checkout_wirecard_checkout_page.php', 'failure=1', 'SSL');
            unset($_SESSION['wirecard_checkout_page_fingerprintinvalid']);
            break;
    }
}

xtc_db_close();
?>
<html>
<head>
</head>
<body onLoad="window.parent.location.href = '<?php echo $link; ?>'">
</body>
</html>
