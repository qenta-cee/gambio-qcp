<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

define('MODULE_PAYMENT_QCP_INSTALLMENT_TEXT_DESCRIPTION', 'Sie werden nach der Bestellung zur Bezahlung zu unserem Zahlungsdienstleister QENTA weitergeleitet.');
define('MODULE_PAYMENT_QCP_INSTALLMENT_TEXT_TITLE', 'Ratenzahlung');
define('MODULE_PAYMENT_QCP_INSTALLMENT_TEXT_INFO','');

define('MODULE_PAYMENT_QCP_INSTALLMENT_STATUS_TITLE', 'Aktiv');
define('MODULE_PAYMENT_QCP_INSTALLMENT_STATUS_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_PLUGIN_MODE_TITLE', 'Plug-In Modus');
define('MODULE_PAYMENT_QCP_INSTALLMENT_PLUGIN_MODE_DESC', 'Wechseln Sie zwischen Live, Demo oder Test Modus. <strong>Achtung</strong>: Es werden keine Transaktionen im Demo oder Test Modus verarbeitet!');

define('MODULE_PAYMENT_QCP_INSTALLMENT_PRESHARED_KEY_TITLE', 'Geheimer Schl&uuml;ssel (SECRET)');
define('MODULE_PAYMENT_QCP_INSTALLMENT_PRESHARED_KEY_DESC', 'Vorher vereinbarter geheimer Schl&uuml;ssel');

define('MODULE_PAYMENT_QCP_INSTALLMENT_CUSTOMER_ID_TITLE', 'Kundennummer');
define('MODULE_PAYMENT_QCP_INSTALLMENT_CUSTOMER_ID_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_LOGO_TITLE', 'Shop-Logo URL inkludieren');
define('MODULE_PAYMENT_QCP_INSTALLMENT_LOGO_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_SHOP_ID_TITLE', 'Shop ID');
define('MODULE_PAYMENT_QCP_INSTALLMENT_SHOP_ID_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_SERVICE_URL_TITLE', 'Service URL');
define('MODULE_PAYMENT_QCP_INSTALLMENT_SERVICE_URL_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_DUPLICATE_REQUEST_CHECK_TITLE', 'Aktiviere Duplicate-Request-Check');
define('MODULE_PAYMENT_QCP_INSTALLMENT_DUPLICATE_REQUEST_CHECK_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_STATEMENT_TITLE', 'Kunden Abrechnungstext Prefix');
define('MODULE_PAYMENT_QCP_INSTALLMENT_STATEMENT_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_DISPLAY_TEXT_TITLE', 'Anzeige Text');
define('MODULE_PAYMENT_QCP_INSTALLMENT_DISPLAY_TEXT_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_ORDER_DESCRIPTION_TITLE', 'Prefix f&uuml;r Bestellbeschreibung');
define('MODULE_PAYMENT_QCP_INSTALLMENT_ORDER_DESCRIPTION_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_USE_IFRAME_TITLE', 'IFrame verwenden?');
define('MODULE_PAYMENT_QCP_INSTALLMENT_USE_IFRAME_DESC', '');

define('MODULE_PAYMENT_QCP_INSTALLMENT_SORT_ORDER_TITLE', 'Anzeigeordnung');
define('MODULE_PAYMENT_QCP_INSTALLMENT_SORT_ORDER_DESC', 'Niederste an erster Stelle');

define('MODULE_PAYMENT_QCP_INSTALLMENT_ALLOWED_TITLE' , 'Erlaubte Zonen');
define('MODULE_PAYMENT_QCP_INSTALLMENT_ALLOWED_DESC' , 'Geben Sie erlaubte Zonen ein (e.g. AT,DE)');

define('MODULE_PAYMENT_QCP_INSTALLMENT_CHECKOUT_TITLE', 'Bezahlvorgang');
define('MODULE_PAYMENT_QCP_INSTALLMENT_CHECKOUT_HEADER', '');
define('MODULE_PAYMENT_QCP_INSTALLMENT_CHECKOUT_CONTENT', '<center>Sie werden zur Bezahlung weitergeleitet.</center>');

define('MODULE_PAYMENT_QCP_INSTALLMENT_MIN_AMOUNT_TITLE', 'Min. Bestellsumme');
define('MODULE_PAYMENT_QCP_INSTALLMENT_MIN_AMOUNT_DESC', 'Min. Bestellsumme f&uuml;r Ratenzahlung');

define('MODULE_PAYMENT_QCP_INSTALLMENT_MAX_AMOUNT_TITLE', 'Max. Bestellsumme');
define('MODULE_PAYMENT_QCP_INSTALLMENT_MAX_AMOUNT_DESC', 'Max. Bestellsumme f&uuml;r Ratenzahlung');

define('MODULE_PAYMENT_QCP_INSTALLMENT_REDIRECT_TIMEOUT_SECOUNDS', 2);
define('MODULE_PAYMENT_QCP_INSTALLMENT_DEVICE_DETECTION_TITLE', 'Automatische Geräteerkennung');
define('MODULE_PAYMENT_QCP_INSTALLMENT_DEVICE_DETECTION_DESC', 'Erkennen des Kundengeräts (Smartphone, Tablet, Desktop PC) zum Anzeigen einer optimierten Zahlseite.');

define('MODULE_PAYMENT_QCP_INSTALLMENT_ORDER_STATUS_ID_TITLE', 'Bestellstatus festlegen');
define('MODULE_PAYMENT_QCP_INSTALLMENT_ORDER_STATUS_ID_DESC', 'Bestellungen, die mit diesem Modul gemacht werden, auf diesen Status setzen');

define('MODULE_PAYMENT_QCP_INSTALLMENT_SEND_BASKET_TITLE', 'Warenkorbdaten des Konsumenten mitsenden');
define('MODULE_PAYMENT_QCP_INSTALLMENT_SEND_BASKET_DESC', 'Weiterleitung des Warenkorbs des Kunden an den Finanzdienstleister.');

define('MODULE_PAYMENT_QCP_INSTALLMENT_SEND_SHIPPING_DATA_TITLE', 'Versanddaten des Konsumenten mitsenden');
define('MODULE_PAYMENT_QCP_INSTALLMENT_SEND_SHIPPING_DATA_DESC', 'Weiterleitung der Versanddaten des Kunden an den Finanzdienstleister.');

define('MODULE_PAYMENT_QCP_INSTALLMENT_SEND_BILLING_DATA_TITLE', 'Verrechnungsdaten des Konsumenten mitsenden');
define('MODULE_PAYMENT_QCP_INSTALLMENT_SEND_BILLING_DATA_DESC', 'Weiterleitung der Rechnungsdaten des Kunden an den Finanzdienstleister.');
