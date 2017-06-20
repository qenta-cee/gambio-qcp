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

define('MODULE_PAYMENT_WCP_QUICK_TEXT_DESCRIPTION', 'You will be redirected to the Wirecard payment page when you place an order.');
define('MODULE_PAYMENT_WCP_QUICK_TEXT_TITLE', '@Quick');
define('MODULE_PAYMENT_WCP_QUICK_TEXT_INFO','');

define('MODULE_PAYMENT_WCP_QUICK_STATUS_TITLE', 'Active');
define('MODULE_PAYMENT_WCP_QUICK_STATUS_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_PLUGIN_MODE_TITLE', 'plugin mode');
define('MODULE_PAYMENT_WCP_QUICK_PLUGIN_MODE_DESC', 'Switch the plugin mode between live, demo or test. <strong>Attention</strong>: Be aware that there will no payment be processed in demo or test mode!');

define('MODULE_PAYMENT_WCP_QUICK_ORDER_STATUS_ID_TITLE', 'Order status');
define('MODULE_PAYMENT_WCP_QUICK_ORDER_STATUS_ID_DESC', 'Order status after successful payment with this module.');

define('MODULE_PAYMENT_WCP_QUICK_PRESHARED_KEY_TITLE', 'Secret');
define('MODULE_PAYMENT_WCP_QUICK_PRESHARED_KEY_DESC', 'Preshared secret key');

define('MODULE_PAYMENT_WCP_QUICK_CUSTOMER_ID_TITLE', 'Customer ID');
define('MODULE_PAYMENT_WCP_QUICK_CUSTOMER_ID_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_LOGO_TITLE', 'Include Shop-Logo URL');
define('MODULE_PAYMENT_WCP_QUICK_LOGO_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_SHOP_ID_TITLE', 'Shop ID');
define('MODULE_PAYMENT_WCP_QUICK_SHOP_ID_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_SERVICE_URL_TITLE', 'Service URL');
define('MODULE_PAYMENT_WCP_QUICK_SERVICE_URL_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_DUPLICATE_REQUEST_CHECK_TITLE', 'Activate Duplicate-Request-Check');
define('MODULE_PAYMENT_WCP_QUICK_DUPLICATE_REQUEST_CHECK_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_STATEMENT_TITLE', 'Customer Statement prefix');
define('MODULE_PAYMENT_WCP_QUICK_STATEMENT_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_DISPLAY_TEXT_TITLE', 'Display Text');
define('MODULE_PAYMENT_WCP_QUICK_DISPLAY_TEXT_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_ORDER_DESCRIPTION_TITLE', 'Order Description prefix');
define('MODULE_PAYMENT_WCP_QUICK_ORDER_DESCRIPTION_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_USE_IFRAME_TITLE', 'use iFrame?');
define('MODULE_PAYMENT_WCP_QUICK_USE_IFRAME_DESC', '');

define('MODULE_PAYMENT_WCP_QUICK_SORT_ORDER_TITLE', 'Sort order of display');
define('MODULE_PAYMENT_WCP_QUICK_SORT_ORDER_DESC', 'Lowest is displayed first');

define('MODULE_PAYMENT_WCP_QUICK_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_PAYMENT_WCP_QUICK_ALLOWED_DESC' , 'Insert Allowed Zones (e.g. AT,DE)');

define('MODULE_PAYMENT_WCP_QUICK_CHECKOUT_TITLE', 'Payment process');
define('MODULE_PAYMENT_WCP_QUICK_CHECKOUT_HEADER', '');
define('MODULE_PAYMENT_WCP_QUICK_CHECKOUT_CONTENT', '<center>You will be redirected.</center>');

define('MODULE_PAYMENT_WCP_QUICK_REDIRECT_TIMEOUT_SECOUNDS', 2);
define('MODULE_PAYMENT_WCP_QUICK_DEVICE_DETECTION_TITLE', 'automatic device detection');
define('MODULE_PAYMENT_WCP_QUICK_DEVICE_DETECTION_DESC', 'If activated, the buyers device will be auto detected to optimise payment page.');

define('MODULE_PAYMENT_WCP_QUICK_SEND_BASKET_TITLE', 'Forward basket data');
define('MODULE_PAYMENT_WCP_QUICK_SEND_BASKET_DESC', 'Forwarding basket data to the respective financial service provider.');

define('MODULE_PAYMENT_WCP_QUICK_SEND_SHIPPING_DATA_TITLE', 'Forward consumer shipping data');
define('MODULE_PAYMENT_WCP_QUICK_SEND_SHIPPING_DATA_DESC', 'Forwarding shipping data about your consumer to the respective financial service provider.');

define('MODULE_PAYMENT_WCP_QUICK_SEND_BILLING_DATA_TITLE', 'Forward consumer billing data');
define('MODULE_PAYMENT_WCP_QUICK_SEND_BILLING_DATA_DESC', 'Forwarding billing data about your consumer to the respective financial service provider.');