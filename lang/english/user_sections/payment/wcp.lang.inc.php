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

$t_language_text_section_content_array = array
(

	'CHECKOUT_CANCEL_TITLE' => 'Payment was canceled',
	'CHECKOUT_CANCEL_HEADER' => '',
	'CHECKOUT_CANCEL_CONTENT' => 'Your Payment was canceled!',

	'CHECKOUT_FAILURE_TITLE' => 'An error occured',
	'CHECKOUT_FAILURE_HEADER' => '',
	'CHECKOUT_FAILURE_CONTENT' => 'An error occured during your payment process',

	'CHECKOUT_REDIRECT_TITLE' => 'Redirect.',
	'CHECKOUT_REDIRECT_HEADER' => '',
	'CHECKOUT_REDIRECT_CONTENT' => 'You will be redirected soon.',

//Status change Mail Constants
	'CONFIRM_MAIL_SUBJECT' => 'Your order ',
	'CONFIRM_MAIL_COMMENT_SUCCESS' => 'Your payment has been successfull proceeded.',
	'CONFIRM_MAIL_COMMENT_CANCEL' => 'You have canceled the payment process.',
	'CONFIRM_MAIL_COMMENT_FAILURE' => 'An error occured during the payment process.',

	'WCP_SHOPPING_CART_TITLE' => 'Cart',
	'WCP_YOUR_DATA_TITLE' => 'Your data',
	'WCP_PAYMENT_TITLE' => 'Shipping &amp; Payment',
	'WCP_CONFIRMATION_TITLE' => 'Confirmation',

	'GM_CFG_LIVE' => 'live mode',
	'GM_CFG_DEMO' => 'demo mode',
	'GM_CFG_TEST' => 'test mode',

	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_RECEIVER' => 'Receiver',
	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_CONFIG_STRING' => 'Configuration',
	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_DESC_TEXT' => 'Description',
	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_RETURN_MAIL' => 'Reply to',
	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_SUBMIT_BUTTON' => 'Submit',
	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_BACK_BUTTON' => 'Back',
	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_INVALID_MAIL' => 'invalid mail address',
	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_MAIL_SENT' => 'Configuration has been sent successfully',
	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_MAIL_NOT_SENT' => 'Configuration has not been sent',

	'MODULE_PAYMENT_WCP_EXPORT_CONFIG_LABEL' => 'Submit configuration',
    'MODULE_PAYMENT_WCP_ORDER_DETAILS_TITLE' => 'WCP payment details',
    'MODULE_PAYMENT_WCP_COMMUNICATION_ERROR' => 'Connection problem to payment provider. Please try again.',

    'MODULE_PAYMENT_WCP_ANOTHER_ORDER' => 'Another order has been created. Order number: %s.'
);
