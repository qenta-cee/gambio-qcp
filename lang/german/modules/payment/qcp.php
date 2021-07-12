<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

define('CHECKOUT_CANCEL_TITLE', 'Bezahlung abgebrochen');
define('CHECKOUT_CANCEL_HEADER', '');
define('CHECKOUT_CANCEL_CONTENT', 'Sie haben Ihre Bezahlung abgebrochen!');

define('CHECKOUT_FAILURE_TITLE', 'Ein Fehler ist aufgetreten');
define('CHECKOUT_FAILURE_HEADER', '');
define('CHECKOUT_FAILURE_CONTENT', 'Ein Fehler ist bei der Bezahlung aufgetreten!');

define('CHECKOUT_PENDING_TITLE', 'Ihre Zahlung wurde vom Finanzinstitut noch nicht best&auml;tigt');
define('CHECKOUT_PENDING_HEADER', '');
define('CHECKOUT_PENDING_CONTENT', 'Die Zahlungsbest&auml;tigung ist ausst&auml;ndig, sie wird sp&auml;ter zugesendet.');

define('CHECKOUT_CONTINUE_BUTTON', 'WEITER');
define('CHECKOUT_CANCEL_BUTTON', 'SCHLIEßEN');

//Status change Mail Constants
define('CONFIRM_MAIL_SUBJECT', 'Ihre Bestellung ');
define('CONFIRM_MAIL_COMMENT_SUCCESS', 'Die Zahlung wurde erfolgreich get&auml;tigt.');
define('CONFIRM_MAIL_COMMENT_CANCEL', 'Sie haben die Zahlung abgebrochen.');
define('CONFIRM_MAIL_COMMENT_FAILURE', 'Es ist ein Fehler w&auml;hrend des Bezahlvorganganges aufgetreten.');

define('QCP_SHOPPING_CART_TITLE', 'Warenkorb');
define('QCP_YOUR_DATA_TITLE', 'Ihre Daten');
define('QCP_PAYMENT_TITLE', 'Versand &amp; Bezahlung');
define('QCP_CONFIRMATION_TITLE', 'Best&auml;tigung');

define('GM_CFG_LIVE', 'Live Modus');
define('GM_CFG_DEMO', 'Demo Modus');
define('GM_CFG_TEST', 'Test Modus');
define('GM_CFG_TEST3D', 'Test3D Modus');

define('MODULE_PAYMENT_QCP_DELETE_FAILURE_TITLE', 'Bestellungen bei fehlgeschlagener Zahlung l&ouml;schen');
define('MODULE_PAYMENT_QCP_DELETE_FAILURE_DESC', 'Falls aktiviert, werden die Bestellungen bei fehlgeschlagener Zahlung gel&ouml;scht. <strong>Achtung:</strong> Diese Einstellung gilt für alle QENTA-Zahlungsmittel.');
define('MODULE_PAYMENT_QCP_DELETE_CANCEL_TITLE', 'Bestellungen bei abgebrochener Zahlung l&ouml;schen');
define('MODULE_PAYMENT_QCP_DELETE_CANCEL_DESC', 'Falls aktiviert, werden die Bestellungen bei abgebrochener Zahlung gel&ouml;scht. <strong>Achtung:</strong> Diese Einstellung gilt für alle QENTA-Zahlungsmittel.');

define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_RECEIVER', 'Empfänger');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_CONFIG_STRING', 'Konfiguration');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_DESC_TEXT', 'Beschreibung');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_RETURN_MAIL', 'R&uuml;ckantwort an E-Mail');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_SUBMIT_BUTTON', 'Senden');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_BACK_BUTTON', 'Zur&uuml;ck');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_INVALID_MAIL', 'E-Mail Addresse ungültig');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_MAIL_SENT', 'E-Mail versendet');
define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_MAIL_NOT_SENT', 'E-Mail nicht versendet');

define('MODULE_PAYMENT_QCP_EXPORT_CONFIG_LABEL', 'Konfiguration senden');
define('MODULE_PAYMENT_QCP_ORDER_DETAILS_TITLE', 'QCP Zahlungsdetails');
define('MODULE_PAYMENT_QCP_COMMUNICATION_ERROR', 'Kommunikationsfehler zum Zahlungsdienstleister. Bitte versuchen Sie es erneut.');

define('MODULE_PAYMENT_QCP_ANOTHER_ORDER', 'Es wurde eine weitere Bestellung generiert, Bestellnummer: %s.');
