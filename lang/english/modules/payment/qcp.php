<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

define('CHECKOUT_CANCEL_TITLE', 'Payment was canceled');
define('CHECKOUT_CANCEL_HEADER', '');
define('CHECKOUT_CANCEL_CONTENT', 'Your Payment was canceled!');

define('CHECKOUT_FAILURE_TITLE', 'An error occured');
define('CHECKOUT_FAILURE_HEADER', '');
define('CHECKOUT_FAILURE_CONTENT', 'An error occured during your payment process');

define('CHECKOUT_PENDING_TITLE', 'The financial institution has not yet approved your payment');
define('CHECKOUT_PENDING_HEADER', '');
define('CHECKOUT_PENDING_CONTENT', 'Payment verification is pending, confirmation will be sent later.');

define('CHECKOUT_REDIRECT_TITLE', 'Redirect.');
define('CHECKOUT_REDIRECT_HEADER', '');
define('CHECKOUT_REDIRECT_CONTENT', 'You will be redirected soon.');

define('CHECKOUT_CONTINUE_BUTTON', 'CONTINUE');
define('CHECKOUT_CANCEL_BUTTON', 'CLOSE');

//Status change Mail Constants
define('CONFIRM_MAIL_SUBJECT', 'Your order ');
define('CONFIRM_MAIL_COMMENT_SUCCESS', 'Your payment has been successfull proceeded.');
define('CONFIRM_MAIL_COMMENT_CANCEL', 'You have canceled the payment process.');
define('CONFIRM_MAIL_COMMENT_FAILURE', 'An error occured during the payment process.');

define('QCP_SHOPPING_CART_TITLE', 'Cart');
define('QCP_YOUR_DATA_TITLE', 'Your data');
define('QCP_PAYMENT_TITLE', 'Shipping &amp; Payment');
define('QCP_CONFIRMATION_TITLE', 'Confirmation');

define('GM_CFG_LIVE', 'live mode');
define('GM_CFG_DEMO', 'demo mode');
define('GM_CFG_TEST', 'test mode');
define('GM_CFG_TEST3D', 'test3D mode');

define('MODULE_PAYMENT_QCP_DELETE_FAILURE_TITLE', 'Delete orders if payment fails');
define('MODULE_PAYMENT_QCP_DELETE_FAILURE_DESC', 'If enabled, pending orders will be deleted in the order list if payment fails. <strong>Note</strong> that this setting applies to all QENTA payment methods.');
define('MODULE_PAYMENT_QCP_DELETE_CANCEL_TITLE', 'Delete orders if payment is canceled');
define('MODULE_PAYMENT_QCP_DELETE_CANCEL_DESC', 'If enabled, pending orders will be deleted in the order list if payment is canceled. <strong>Note</strong> that this setting applies to all QENTA payment methods.');

define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_RECEIVER', 'Receiver');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_CONFIG_STRING', 'Configuration');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_DESC_TEXT', 'Description');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_RETURN_MAIL', 'Reply to');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_SUBMIT_BUTTON', 'Submit');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_BACK_BUTTON', 'Back');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_INVALID_MAIL', 'invalid mail address');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_MAIL_SENT', 'Configuration has been sent successfully');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_MAIL_NOT_SENT', 'Configuration has not been sent');

define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_LABEL', 'Submit configuration');
define('MODULE_PAYMENT_QCP_ORDER_DETAILS_TITLE', 'QCP payment details');
define('MODULE_PAYMENT_QCP_COMMUNICATION_ERROR', 'Connection problem to payment provider. Please try again.');

define('MODULE_PAYMENT_QCP_ANOTHER_ORDER', 'Another order has been created. Order number: %s.');
