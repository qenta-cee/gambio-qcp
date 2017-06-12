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

	'MODULE_PAYMENT_WCP_INVOICE_TEXT_DESCRIPTION' => 'You will be redirected to the Wirecard CEE payment page when you place an order.',
	'MODULE_PAYMENT_WCP_INVOICE_TEXT_TITLE' => 'Invoice',
	'MODULE_PAYMENT_WCP_INVOICE_TEXT_INFO','',

	'MODULE_PAYMENT_WCP_INVOICE_STATUS_TITLE' => 'Active',
	'MODULE_PAYMENT_WCP_INVOICE_STATUS_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_PLUGIN_MODE_TITLE' => 'plugin mode',
	'MODULE_PAYMENT_WCP_INVOICE_PLUGIN_MODE_DESC' => 'Switch the plugin mode between live, demo or test. <strong>Attention</strong>: Be aware that there will no payment be processed in demo or test mode!',

	'MODULE_PAYMENT_WCP_INVOICE_PRESHARED_KEY_TITLE' => 'Secret',
	'MODULE_PAYMENT_WCP_INVOICE_PRESHARED_KEY_DESC' => 'Preshared secret key',

	'MODULE_PAYMENT_WCP_INVOICE_CUSTOMER_ID_TITLE' => 'Customer ID',
	'MODULE_PAYMENT_WCP_INVOICE_CUSTOMER_ID_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_LOGO_TITLE' => 'Include Shop-Logo URL',
	'MODULE_PAYMENT_WCP_INVOICE_LOGO_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_SHOP_ID_TITLE' => 'Shop ID',
	'MODULE_PAYMENT_WCP_INVOICE_SHOP_ID_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_SERVICE_URL_TITLE' => 'Service URL',
	'MODULE_PAYMENT_WCP_INVOICE_SERVICE_URL_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_DUPLICATE_REQUEST_CHECK_TITLE' => 'Activate Duplicate-Request-Check',
	'MODULE_PAYMENT_WCP_INVOICE_DUPLICATE_REQUEST_CHECK_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_STATEMENT_TITLE' => 'Customer Statement prefix',
	'MODULE_PAYMENT_WCP_INVOICE_STATEMENT_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_DISPLAY_TEXT_TITLE' => 'Display Text',
	'MODULE_PAYMENT_WCP_INVOICE_DISPLAY_TEXT_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_ORDER_DESCRIPTION_TITLE' => 'Order Description prefix',
	'MODULE_PAYMENT_WCP_INVOICE_ORDER_DESCRIPTION_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_USE_IFRAME_TITLE' => 'use iFrame?',
	'MODULE_PAYMENT_WCP_INVOICE_USE_IFRAME_DESC' => '',

	'MODULE_PAYMENT_WCP_INVOICE_SORT_ORDER_TITLE' => 'Sort order of display',
	'MODULE_PAYMENT_WCP_INVOICE_SORT_ORDER_DESC' => 'Lowest is displayed first',

	'MODULE_PAYMENT_WCP_INVOICE_ALLOWED_TITLE' , 'Allowed Zones',
	'MODULE_PAYMENT_WCP_INVOICE_ALLOWED_DESC' , 'Insert Allowed Zones (e.g. AT,DE)',

	'MODULE_PAYMENT_WCP_INVOICE_CHECKOUT_TITLE' => 'Payment process',
	'MODULE_PAYMENT_WCP_INVOICE_CHECKOUT_HEADER' => '',
	'MODULE_PAYMENT_WCP_INVOICE_CHECKOUT_CONTENT' => '<center>You will be redirected.</center>',


	'MODULE_PAYMENT_WCP_INVOICE_MIN_AMOUNT_TITLE' => 'min. Amount',
	'MODULE_PAYMENT_WCP_INVOICE_MIN_AMOUNT_DESC' => 'Invoice minimum Amount',

	'MODULE_PAYMENT_WCP_INVOICE_MAX_AMOUNT_TITLE' => 'max. Amount',
	'MODULE_PAYMENT_WCP_INVOICE_MAX_AMOUNT_DESC' => 'Invoice maximum',

	'MODULE_PAYMENT_WCP_INVOICE_TERMS_TITLE' => 'payolution terms',
	'MODULE_PAYMENT_WCP_INVOICE_TERMS_DESC' => 'Consumer must accept payolution terms during the checkout process.',

	'MODULE_PAYMENT_WCP_INVOICE_MID_TITLE' => 'payolution mID',
	'MODULE_PAYMENT_WCP_INVOICE_MID_DESC' => 'Your payolution merchant ID, non-base64-encoded.',

	'MODULE_PAYMENT_WCP_INVOICE_PROVIDER_TITLE' => 'Invoice provider',
	'MODULE_PAYMENT_WCP_INVOICE_PROVIDER_DESC' => 'Choose your invoice provider',

	'MODULE_PAYMENT_WCP_INVOICE_CONSENT1' => 'I agree that the data which are necessary for the liquidation of purchase on account and which are used to complete the identy and credit check are transmitted to payolution. My ',
	'MODULE_PAYMENT_WCP_INVOICE_CONSENT2' => ' can be revoked at any time with effect for the future.',
	'MODULE_PAYMENT_WCP_INVOICE_LINK' => 'consent',
	'MODULE_PAYMENT_WCP_INVOICE_BIRTH' => 'Birthday',
	'MODULE_PAYMENT_WCP_INVOICE_BIRTHDAY_ERROR' => 'You must be at least 18 years of age to use this payment method.',

	'MODULE_PAYMENT_WCP_INVOICE_REDIRECT_TIMEOUT_SECOUNDS' => 2,
	'MODULE_PAYMENT_WCP_INVOICE_DEVICE_DETECTION_TITLE' => 'automatic device detection',
	'MODULE_PAYMENT_WCP_INVOICE_DEVICE_DETECTION_DESC' => 'If activated, the buyers device will be auto detected to optimise payment page.',
);