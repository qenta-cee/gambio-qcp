<?php
/**
Shop System Plugins - Terms of use

This terms of use regulates warranty and liability between Wirecard
Central Eastern Europe (subsequently referred to as WDCEE) and it's
contractual partners (subsequently referred to as customer or customers)
which are related to the use of plugins provided by WDCEE.

The Plugin is provided by WDCEE free of charge for it's customers and
must be used for the purpose of WDCEE's payment platform integration
only. It explicitly is not part of the general contract between WDCEE
and it's customer. The plugin has successfully been tested under
specific circumstances which are defined as the shopsystem's standard
configuration (vendor's delivery state). The Customer is responsible for
testing the plugin's functionality before putting it into production
enviroment.
The customer uses the plugin at own risk. WDCEE does not guarantee it's
full functionality neither does WDCEE assume liability for any
disadvantage related to the use of this plugin. By installing the plugin
into the shopsystem the customer agrees to the terms of use. Please do
not use this plugin if you do not agree to the terms of use!
*/

chdir('../../');
require('includes/application_top.php');
require('includes/modules/payment/wcp.php');

if(isset($_POST))
{
    $paymentState = '';
    $order_id = isset($_POST['order_id']) ? (int)$_POST['order_id'] : '';
    $q = xtc_db_query('SELECT response FROM ' . TABLE_PAYMENT_WCP . ' WHERE orders_id = "'.$order_id.'" LIMIT 1;');
    if(xtc_db_num_rows($q)) {
        $dbEntry = xtc_db_fetch_array($q);
        $paymentInformation = unserialize($dbEntry['response']);
        $paymentState = $paymentInformation['paymentState'];
    }
    //fallback update of order
    else {
		chdir('callback/wirecard/');
        include ('checkout_page_confirm.php');

        $q = xtc_db_query('SELECT response FROM ' . TABLE_PAYMENT_WCP . ' WHERE orders_id = "'.$order_id.'" LIMIT 1;');
        if(xtc_db_num_rows($q)) {
            $dbEntry = xtc_db_fetch_array($q);
            $paymentInformation = unserialize($dbEntry['response']);
            $paymentState = $paymentInformation['paymentState'];
        }
    }

    switch ($paymentState)
    {
        case 'SUCCESS':
        case 'PENDING':
            $_SESSION['cart']->reset(true);
            $link = xtc_href_link('checkout_wirecard_checkout_page.php', 'pending=1', 'SSL');
            break;
        case 'CANCEL':
            $link = xtc_href_link('checkout_wirecard_checkout_page.php', 'cancel=1', 'SSL');
            break;
        default:
            $link = xtc_href_link('checkout_wirecard_checkout_page.php', 'failure=1', 'SSL');
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
