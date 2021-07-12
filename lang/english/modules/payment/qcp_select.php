<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

define('MODULE_PAYMENT_QCP_SELECT_TEXT_DESCRIPTION', 'You will be redirected to the QENTA payment page when you place an order.');
define('MODULE_PAYMENT_QCP_SELECT_TEXT_TITLE', 'Select');
define('MODULE_PAYMENT_QCP_SELECT_TEXT_INFO','');

define('MODULE_PAYMENT_QCP_SELECT_STATUS_TITLE', 'Active');
define('MODULE_PAYMENT_QCP_SELECT_STATUS_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_PLUGIN_MODE_TITLE', 'plugin mode');
define('MODULE_PAYMENT_QCP_SELECT_PLUGIN_MODE_DESC', 'Switch the plugin mode between live, demo or test. <strong>Attention</strong>: Be aware that there will no payment be processed in demo or test mode!');

define('MODULE_PAYMENT_QCP_SELECT_ORDER_STATUS_ID_TITLE', 'Order status');
define('MODULE_PAYMENT_QCP_SELECT_ORDER_STATUS_ID_DESC', 'Order status after successful payment with this module.');

define('MODULE_PAYMENT_QCP_SELECT_PRESHARED_KEY_TITLE', 'Secret');
define('MODULE_PAYMENT_QCP_SELECT_PRESHARED_KEY_DESC', 'Preshared secret key');

define('MODULE_PAYMENT_QCP_SELECT_CUSTOMER_ID_TITLE', 'Customer ID');
define('MODULE_PAYMENT_QCP_SELECT_CUSTOMER_ID_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_LOGO_TITLE', 'Include Shop-Logo URL');
define('MODULE_PAYMENT_QCP_SELECT_LOGO_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_SHOP_ID_TITLE', 'Shop ID');
define('MODULE_PAYMENT_QCP_SELECT_SHOP_ID_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_SERVICE_URL_TITLE', 'Service URL');
define('MODULE_PAYMENT_QCP_SELECT_SERVICE_URL_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_DUPLICATE_REQUEST_CHECK_TITLE', 'Activate Duplicate-Request-Check');
define('MODULE_PAYMENT_QCP_SELECT_DUPLICATE_REQUEST_CHECK_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_STATEMENT_TITLE', 'Customer Statement prefix');
define('MODULE_PAYMENT_QCP_SELECT_STATEMENT_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_DISPLAY_TEXT_TITLE', 'Display Text');
define('MODULE_PAYMENT_QCP_SELECT_DISPLAY_TEXT_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_ORDER_DESCRIPTION_TITLE', 'Order Description prefix');
define('MODULE_PAYMENT_QCP_SELECT_ORDER_DESCRIPTION_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_USE_IFRAME_TITLE', 'use iFrame?');
define('MODULE_PAYMENT_QCP_SELECT_USE_IFRAME_DESC', '');

define('MODULE_PAYMENT_QCP_SELECT_SORT_ORDER_TITLE', 'Sort order of display.');
define('MODULE_PAYMENT_QCP_SELECT_SORT_ORDER_DESC', 'Lowest is displayed first');

define('MODULE_PAYMENT_QCP_SELECT_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_PAYMENT_QCP_SELECT_ALLOWED_DESC' , 'Geben Sie <b>einzeln</b> die Zonen an, welche f&uuml;r dieses Modul erlaubt sein sollen. (z.B. AT,DE (wenn leer, werden alle Zonen erlaubt))');

define('MODULE_PAYMENT_QCP_SELECT_CHECKOUT_TITLE', 'Payment process');
define('MODULE_PAYMENT_QCP_SELECT_CHECKOUT_HEADER', '');
define('MODULE_PAYMENT_QCP_SELECT_CHECKOUT_CONTENT', '<center>You will be redirected.</center>');

define('MODULE_PAYMENT_QCP_SELECT_REDIRECT_TIMEOUT_SECOUNDS', 2);
define('MODULE_PAYMENT_QCP_SELECT_DEVICE_DETECTION_TITLE', 'automatic device detection');
define('MODULE_PAYMENT_QCP_SELECT_DEVICE_DETECTION_DESC', 'If activated, the buyers device will be auto detected to optimise payment page.');

define('MODULE_PAYMENT_QCP_SELECT_SEND_BASKET_TITLE', 'Forward basket data');
define('MODULE_PAYMENT_QCP_SELECT_SEND_BASKET_DESC', 'Forwarding basket data to the respective financial service provider.');

define('MODULE_PAYMENT_QCP_SELECT_SEND_SHIPPING_DATA_TITLE', 'Forward consumer shipping data');
define('MODULE_PAYMENT_QCP_SELECT_SEND_SHIPPING_DATA_DESC', 'Forwarding shipping data about your consumer to the respective financial service provider.');

define('MODULE_PAYMENT_QCP_SELECT_SEND_BILLING_DATA_TITLE', 'Forward consumer billing data');
define('MODULE_PAYMENT_QCP_SELECT_SEND_BILLING_DATA_DESC', 'Forwarding billing data about your consumer to the respective financial service provider.');