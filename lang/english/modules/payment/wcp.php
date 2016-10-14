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

define('CHECKOUT_CANCEL_TITLE', 'Payment was canceled');
define('CHECKOUT_CANCEL_HEADER', '');
define('CHECKOUT_CANCEL_CONTENT', 'Your Payment was canceled!');

define('CHECKOUT_FAILURE_TITLE', 'An error occured');
define('CHECKOUT_FAILURE_HEADER', '');
define('CHECKOUT_FAILURE_CONTENT', 'An error occured during your payment process');

define('CHECKOUT_REDIRECT_TITLE', 'Redirect.');
define('CHECKOUT_REDIRECT_HEADER', '');
define('CHECKOUT_REDIRECT_CONTENT', 'You will be redirected soon.');

//Status change Mail Constants
define('CONFIRM_MAIL_SUBJECT', 'Your order ');
define('CONFIRM_MAIL_COMMENT_SUCCESS', 'Your payment has been successfull proceeded.');
define('CONFIRM_MAIL_COMMENT_CANCEL', 'You have canceled the payment process.');
define('CONFIRM_MAIL_COMMENT_FAILURE', 'An error occured during the payment process.');

define('WCP_SHOPPING_CART_TITLE', 'Cart');
define('WCP_YOUR_DATA_TITLE', 'Your data');
define('WCP_PAYMENT_TITLE', 'Shipping &amp; Payment');
define('WCP_CONFIRMATION_TITLE', 'Confirmation');

define('GM_CFG_LIVE', 'live mode');
define('GM_CFG_DEMO', 'demo mode');
define('GM_CFG_TEST', 'test mode');
define('GM_CFG_TEST3D', 'test3D mode');

define('MODULE_PAYMENT_WCP_DELETE_FAILURE_TITLE', 'Delete orders if payment fails');
define('MODULE_PAYMENT_WCP_DELETE_FAILURE_DESC', 'If enabled, pending orders will be deleted in the order list if payment fails. <strong>Note</strong> that this setting applies to all Wirecard payment methods.');
define('MODULE_PAYMENT_WCP_DELETE_CANCEL_TITLE', 'Delete orders if payment is canceled');
define('MODULE_PAYMENT_WCP_DELETE_CANCEL_DESC', 'If enabled, pending orders will be deleted in the order list if payment is canceled. <strong>Note</strong> that this setting applies to all Wirecard payment methods.');

define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_RECEIVER', 'Receiver');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_CONFIG_STRING', 'Configuration');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_DESC_TEXT', 'Description');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_RETURN_MAIL', 'Reply to');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_SUBMIT_BUTTON', 'Submit');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_BACK_BUTTON', 'Back');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_INVALID_MAIL', 'invalid mail address');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_MAIL_SENT', 'Configuration has been sent successfully');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_MAIL_NOT_SENT', 'Configuration has not been sent');

define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_LABEL', 'Submit configuration');
define('MODULE_PAYMENT_WCP_ORDER_DETAILS_TITLE', 'WCP payment details');
define('MODULE_PAYMENT_WCP_COMMUNICATION_ERROR', 'Connection problem to payment provider. Please try again.');

define('MODULE_PAYMENT_WCP_ANOTHER_ORDER', 'Another order has been created. Order number: %s.');
