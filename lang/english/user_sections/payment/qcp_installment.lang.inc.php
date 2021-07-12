<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

$t_language_text_section_content_array = array
(

	'MODULE_PAYMENT_QCP_INSTALLMENT_TEXT_DESCRIPTION' => 'You will be redirected to the QENTA payment page when you place an order.',
	'MODULE_PAYMENT_QCP_INSTALLMENT_TEXT_TITLE' => 'Installment',
	'MODULE_PAYMENT_QCP_INSTALLMENT_TEXT_INFO','',

	'MODULE_PAYMENT_QCP_INSTALLMENT_STATUS_TITLE' => 'Active',
	'MODULE_PAYMENT_QCP_INSTALLMENT_STATUS_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_PLUGIN_MODE_TITLE' => 'plugin mode',
	'MODULE_PAYMENT_QCP_INSTALLMENT_PLUGIN_MODE_DESC' => 'Switch the plugin mode between live, demo or test. <strong>Attention</strong>: Be aware that there will no payment be processed in demo or test mode!',

	'MODULE_PAYMENT_QCP_INSTALLMENT_PRESHARED_KEY_TITLE' => 'Secret',
	'MODULE_PAYMENT_QCP_INSTALLMENT_PRESHARED_KEY_DESC' => 'Preshared secret key',

	'MODULE_PAYMENT_QCP_INSTALLMENT_CUSTOMER_ID_TITLE' => 'Customer ID',
	'MODULE_PAYMENT_QCP_INSTALLMENT_CUSTOMER_ID_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_LOGO_TITLE' => 'Include Shop-Logo URL',
	'MODULE_PAYMENT_QCP_INSTALLMENT_LOGO_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_SHOP_ID_TITLE' => 'Shop ID',
	'MODULE_PAYMENT_QCP_INSTALLMENT_SHOP_ID_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_SERVICE_URL_TITLE' => 'Service URL',
	'MODULE_PAYMENT_QCP_INSTALLMENT_SERVICE_URL_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_DUPLICATE_REQUEST_CHECK_TITLE' => 'Activate Duplicate-Request-Check',
	'MODULE_PAYMENT_QCP_INSTALLMENT_DUPLICATE_REQUEST_CHECK_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_STATEMENT_TITLE' => 'Customer Statement prefix',
	'MODULE_PAYMENT_QCP_INSTALLMENT_STATEMENT_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_DISPLAY_TEXT_TITLE' => 'Display Text',
	'MODULE_PAYMENT_QCP_INSTALLMENT_DISPLAY_TEXT_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_ORDER_DESCRIPTION_TITLE' => 'Order Description prefix',
	'MODULE_PAYMENT_QCP_INSTALLMENT_ORDER_DESCRIPTION_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_USE_IFRAME_TITLE' => 'use iFrame?',
	'MODULE_PAYMENT_QCP_INSTALLMENT_USE_IFRAME_DESC' => '',

	'MODULE_PAYMENT_QCP_INSTALLMENT_SORT_ORDER_TITLE' => 'Sort order of display',
	'MODULE_PAYMENT_QCP_INSTALLMENT_SORT_ORDER_DESC' => 'Lowest is displayed first',

	'MODULE_PAYMENT_QCP_INSTALLMENT_ALLOWED_TITLE' , 'Allowed Zones',
	'MODULE_PAYMENT_QCP_INSTALLMENT_ALLOWED_DESC' , 'Insert Allowed Zones (e.g. AT,DE)',

	'MODULE_PAYMENT_QCP_INSTALLMENT_CHECKOUT_TITLE' => 'Payment process',
	'MODULE_PAYMENT_QCP_INSTALLMENT_CHECKOUT_HEADER' => '',
	'MODULE_PAYMENT_QCP_INSTALLMENT_CHECKOUT_CONTENT' => '<center>You will be redirected.</center>',

	'MODULE_PAYMENT_QCP_INSTALLMENT_MIN_AMOUNT_TITLE' => 'min. Amount',
	'MODULE_PAYMENT_QCP_INSTALLMENT_MIN_AMOUNT_DESC' => 'Installment minimum Amount',

	'MODULE_PAYMENT_QCP_INSTALLMENT_MAX_AMOUNT_TITLE' => 'max. Amount',
	'MODULE_PAYMENT_QCP_INSTALLMENT_MAX_AMOUNT_DESC' => 'Installment maximum Amount',

	'MODULE_PAYMENT_QCP_INSTALLMENT_TERMS_TITLE' => 'payolution terms',
	'MODULE_PAYMENT_QCP_INSTALLMENT_TERMS_DESC' => 'Consumer must accept payolution terms during the checkout process.',

	'MODULE_PAYMENT_QCP_INSTALLMENT_MID_TITLE' => 'payolution mID',
	'MODULE_PAYMENT_QCP_INSTALLMENT_MID_DESC' => 'Your payolution merchant ID, non-base64-encoded.',

	'MODULE_PAYMENT_QCP_INSTALLMENT_PROVIDER_TITLE' => 'Invoice provider',
	'MODULE_PAYMENT_QCP_INSTALLMENT_PROVIDER_DESC' => 'Choose your installment provider',

	'MODULE_PAYMENT_QCP_INSTALLMENT_CURRENCIES_TITLE' => 'Allowed currencies',
	'MODULE_PAYMENT_QCP_INSTALLMENT_CURRENCIES_DESC' => 'Insert allowed currencies (e.g. EUR,CHF)',

	'MODULE_PAYMENT_QCP_INSTALLMENT_SHIPPING_TITLE' => 'Billing/shipping address must be identical',

	'MODULE_PAYMENT_QCP_INSTALLMENT_CONSENT1' => 'I agree that the data which are necessary for the liquidation of purchase on account and which are used to complete the identy and credit check are transmitted to payolution. My ',
	'MODULE_PAYMENT_QCP_INSTALLMENT_CONSENT2' => ' can be revoked at any time with effect for the future.',
	'MODULE_PAYMENT_QCP_INSTALLMENT_LINK' => 'consent',
	'MODULE_PAYMENT_QCP_INSTALLMENT_BIRTH' => 'Birthday',
	'MODULE_PAYMENT_QCP_INSTALLMENT_BIRTHDAY_ERROR' => 'You must be at least 18 years of age to use this payment method.',
	'MODULE_PAYMENT_QCP_INSTALLMENT_EMPTY_BIRTHDAY_ERROR' => 'Please enter a valid birthday date.',
	'MODULE_PAYMENT_QCP_INSTALLMENT_PAYOLUTION_ERROR' => 'Please accept the payolution terms.',

	'MODULE_PAYMENT_QCP_INSTALLMENT_REDIRECT_TIMEOUT_SECOUNDS' => 2,
	'MODULE_PAYMENT_QCP_INSTALLMENT_DEVICE_DETECTION_TITLE' => 'automatic device detection',
	'MODULE_PAYMENT_QCP_INSTALLMENT_DEVICE_DETECTION_DESC' => 'If activated, the buyers device will be auto detected to optimise payment page.',

	'MODULE_PAYMENT_QCP_INSTALLMENT_SEND_BASKET_TITLE' => 'Forward basket data',
	'MODULE_PAYMENT_QCP_INSTALLMENT_SEND_BASKET_DESC' => 'Forwarding basket data to the respective financial service provider.',

	'MODULE_PAYMENT_QCP_INSTALLMENT_SEND_SHIPPING_DATA_TITLE' => 'Forward consumer shipping data',
	'MODULE_PAYMENT_QCP_INSTALLMENT_SEND_SHIPPING_DATA_DESC' => 'Forwarding shipping data about your consumer to the respective financial service provider.',

	'MODULE_PAYMENT_QCP_INSTALLMENT_SEND_BILLING_DATA_TITLE' => 'Forward consumer billing data',
	'MODULE_PAYMENT_QCP_INSTALLMENT_SEND_BILLING_DATA_DESC' => 'Forwarding billing data about your consumer to the respective financial service provider.',
);
