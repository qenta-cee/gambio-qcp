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

	'MODULE_PAYMENT_WCP_INSTALLMENT_TEXT_DESCRIPTION' => 'You will be redirected to the Wirecard CEE payment page when you place an order.',
	'MODULE_PAYMENT_WCP_INSTALLMENT_TEXT_TITLE' => 'Installment',
	'MODULE_PAYMENT_WCP_INSTALLMENT_TEXT_INFO','',

	'MODULE_PAYMENT_WCP_INSTALLMENT_STATUS_TITLE' => 'Active',
	'MODULE_PAYMENT_WCP_INSTALLMENT_STATUS_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_PLUGIN_MODE_TITLE' => 'plugin mode',
	'MODULE_PAYMENT_WCP_INSTALLMENT_PLUGIN_MODE_DESC' => 'Switch the plugin mode between live, demo or test. <strong>Attention</strong>: Be aware that there will no payment be processed in demo or test mode!',

	'MODULE_PAYMENT_WCP_INSTALLMENT_PRESHARED_KEY_TITLE' => 'Secret',
	'MODULE_PAYMENT_WCP_INSTALLMENT_PRESHARED_KEY_DESC' => 'Preshared secret key',

	'MODULE_PAYMENT_WCP_INSTALLMENT_CUSTOMER_ID_TITLE' => 'Customer ID',
	'MODULE_PAYMENT_WCP_INSTALLMENT_CUSTOMER_ID_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_LOGO_TITLE' => 'Include Shop-Logo URL',
	'MODULE_PAYMENT_WCP_INSTALLMENT_LOGO_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SHOP_ID_TITLE' => 'Shop ID',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SHOP_ID_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SERVICE_URL_TITLE' => 'Service URL',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SERVICE_URL_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_DUPLICATE_REQUEST_CHECK_TITLE' => 'Activate Duplicate-Request-Check',
	'MODULE_PAYMENT_WCP_INSTALLMENT_DUPLICATE_REQUEST_CHECK_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_STATEMENT_TITLE' => 'Customer Statement prefix',
	'MODULE_PAYMENT_WCP_INSTALLMENT_STATEMENT_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_DISPLAY_TEXT_TITLE' => 'Display Text',
	'MODULE_PAYMENT_WCP_INSTALLMENT_DISPLAY_TEXT_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_ORDER_DESCRIPTION_TITLE' => 'Order Description prefix',
	'MODULE_PAYMENT_WCP_INSTALLMENT_ORDER_DESCRIPTION_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_USE_IFRAME_TITLE' => 'use iFrame?',
	'MODULE_PAYMENT_WCP_INSTALLMENT_USE_IFRAME_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SORT_ORDER_TITLE' => 'Sort order of display',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SORT_ORDER_DESC' => 'Lowest is displayed first',

	'MODULE_PAYMENT_WCP_INSTALLMENT_ALLOWED_TITLE' , 'Allowed Zones',
	'MODULE_PAYMENT_WCP_INSTALLMENT_ALLOWED_DESC' , 'Insert Allowed Zones (e.g. AT,DE)',

	'MODULE_PAYMENT_WCP_INSTALLMENT_CHECKOUT_TITLE' => 'Payment process',
	'MODULE_PAYMENT_WCP_INSTALLMENT_CHECKOUT_HEADER' => '',
	'MODULE_PAYMENT_WCP_INSTALLMENT_CHECKOUT_CONTENT' => '<center>You will be redirected.</center>',

	'MODULE_PAYMENT_WCP_INSTALLMENT_MIN_AMOUNT_TITLE' => 'min. Amount',
	'MODULE_PAYMENT_WCP_INSTALLMENT_MIN_AMOUNT_DESC' => 'Invoice minimum Amount',

	'MODULE_PAYMENT_WCP_INSTALLMENT_MAX_AMOUNT_TITLE' => 'max. Amount',
	'MODULE_PAYMENT_WCP_INSTALLMENT_MAX_AMOUNT_DESC' => 'Invoice maximum Amount',
	
	'MODULE_PAYMENT_WCP_INSTALLMENT_REDIRECT_TIMEOUT_SECOUNDS' => 2,
	'MODULE_PAYMENT_WCP_INSTALLMENT_DEVICE_DETECTION_TITLE' => 'automatic device detection',	'MODULE_PAYMENT_WCP_INSTALLMENT_DEVICE_DETECTION_DESC' => 'If activated, the buyers device will be auto detected to optimise payment page.',
);
