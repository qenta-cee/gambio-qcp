<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

chdir('../../');

require_once('includes/modules/payment/qcp_top.php');
qcp_preserve_postparams();
require_once('includes/application_top.php');
qcp_preserve_postparams(true);
require_once('includes/modules/payment/qcp.php');


if(isset($_POST))
{
    $paymentState = '';
    $order_id = isset($_POST['order_id']) ? (int)$_POST['order_id'] : '';
    $q = xtc_db_query('SELECT response FROM ' . TABLE_PAYMENT_QCP . ' WHERE orders_id = "'.$order_id.'" LIMIT 1;');

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
                    $order_status = MODULE_PAYMENT_QCP_ORDER_STATUS_PENDING;
                    break;

                default:
                    $order_status = MODULE_PAYMENT_QCP_ORDER_STATUS_FAILED;
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
		chdir('callback/qenta/');
        include ('checkout_page_confirm.php');

        $q = xtc_db_query('SELECT SQL_NO_CACHE response FROM ' . TABLE_PAYMENT_QCP . ' WHERE orders_id = "'.$order_id.'" LIMIT 1;');
        if($q->num_rows) {
            $dbEntry = $q->fetch_array();
            $paymentInformation = unserialize($dbEntry['response']);
            $paymentState = $paymentInformation['paymentState'];
        }
        if (isset($_SESSION['qenta_checkout_page_fingerprintinvalid'])) {
            $paymentState = $_SESSION['qenta_checkout_page_fingerprintinvalid'];
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
            $link = xtc_href_link('checkout_qenta_checkout_page.php', 'pending=1', 'SSL');
            break;
        case 'CANCEL':
            $link = xtc_href_link('checkout_qenta_checkout_page.php', 'cancel=1', 'SSL');
            break;
        default:
            $link = xtc_href_link('checkout_qenta_checkout_page.php', 'failure=1', 'SSL');
            unset($_SESSION['qenta_checkout_page_fingerprintinvalid']);
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
