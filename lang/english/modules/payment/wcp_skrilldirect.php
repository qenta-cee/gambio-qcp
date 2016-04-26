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

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_TEXT_DESCRIPTION', 'You will be redirected to the Wirecard CEE payment page when you place an order.');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_TEXT_TITLE', 'Skrill Direct');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_TEXT_INFO','');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_STATUS_TITLE', 'Active');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_STATUS_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_PLUGIN_MODE_TITLE', 'plugin mode');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_PLUGIN_MODE_DESC', 'Switch the plugin mode between live, demo or test. <strong>Attention</strong>: Be aware that there will no payment be processed in demo or test mode!');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_PRESHARED_KEY_TITLE', 'Secret');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_PRESHARED_KEY_DESC', 'Preshared secret key');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_CUSTOMER_ID_TITLE', 'Customer ID');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_CUSTOMER_ID_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_LOGO_TITLE', 'Include Shop-Logo URL');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_LOGO_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_SHOP_ID_TITLE', 'Shop ID');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_SHOP_ID_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_SERVICE_URL_TITLE', 'Service URL');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_SERVICE_URL_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_DUPLICATE_REQUEST_CHECK_TITLE', 'Activate Duplicate-Request-Check');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_DUPLICATE_REQUEST_CHECK_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_STATEMENT_TITLE', 'Customer Statement prefix');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_STATEMENT_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_DISPLAY_TEXT_TITLE', 'Display Text');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_DISPLAY_TEXT_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_ORDER_DESCRIPTION_TITLE', 'Order Description prefix');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_ORDER_DESCRIPTION_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_USE_IFRAME_TITLE', 'use iFrame?');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_USE_IFRAME_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_SORT_ORDER_TITLE', 'Sort order of display');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_SORT_ORDER_DESC', 'Lowest is displayed first');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_ALLOWED_DESC' , 'Insert Allowed Zones (e.g. AT,DE)');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_CHECKOUT_TITLE', 'Payment process');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_CHECKOUT_HEADER', '');
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_CHECKOUT_CONTENT', '<center>You will be redirected.</center>');

define('MODULE_PAYMENT_WCP_SKRILLDIRECT_REDIRECT_TIMEOUT_SECOUNDS', 2);
define('MODULE_PAYMENT_WCP_SKRILLDIRECT_DEVICE_DETECTION_TITLE', 'automatic device detection');define('MODULE_PAYMENT_WCP_SKRILLDIRECT_DEVICE_DETECTION_DESC', 'If activated, the buyers device will be auto detected to optimise payment page.');