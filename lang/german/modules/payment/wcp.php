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

define('CHECKOUT_CANCEL_TITLE', 'Bezahlung abgebrochen');
define('CHECKOUT_CANCEL_HEADER', '');
define('CHECKOUT_CANCEL_CONTENT', 'Sie haben Ihre Bezahlung abgebrochen!');

define('CHECKOUT_FAILURE_TITLE', 'Ein Fehler ist aufgetreten');
define('CHECKOUT_FAILURE_HEADER', '');
define('CHECKOUT_FAILURE_CONTENT', 'Ein Fehler ist bei der Bezahlung aufgetreten!');

//Status change Mail Constants
define('CONFIRM_MAIL_SUBJECT', 'Ihre Bestellung ');
define('CONFIRM_MAIL_COMMENT_SUCCESS', 'Die Zahlung wurde erfolgreich get&auml;tigt.');
define('CONFIRM_MAIL_COMMENT_CANCEL', 'Sie haben die Zahlung abgebrochen.');
define('CONFIRM_MAIL_COMMENT_FAILURE', 'Es ist ein Fehler w&auml;hrend des Bezahlvorganganges aufgetreten.');

define('WCP_SHOPPING_CART_TITLE', 'Warenkorb');
define('WCP_YOUR_DATA_TITLE', 'Ihre Daten');
define('WCP_PAYMENT_TITLE', 'Versand &amp; Bezahlung');
define('WCP_CONFIRMATION_TITLE', 'Best&auml;tigung');

define('GM_CFG_LIVE', 'Live Modus');
define('GM_CFG_DEMO', 'Demo Modus');
define('GM_CFG_TEST', 'Test Modus');
define('GM_CFG_TEST3D', 'Test3D Modus');

define('MODULE_PAYMENT_WCP_DELETE_FAILURE_TITLE', 'Bestellungen bei fehlgeschlagener Zahlung l&ouml;schen');
define('MODULE_PAYMENT_WCP_DELETE_FAILURE_DESC', 'Falls aktiviert, werden die Bestellungen bei fehlgeschlagener Zahlung gel&ouml;scht. <strong>Achtung:</strong> Diese Einstellung gilt für alle Wirecard-Zahlungsmittel.');
define('MODULE_PAYMENT_WCP_DELETE_CANCEL_TITLE', 'Bestellungen bei abgebrochener Zahlung l&ouml;schen');
define('MODULE_PAYMENT_WCP_DELETE_CANCEL_DESC', 'Falls aktiviert, werden die Bestellungen bei abgebrochener Zahlung gel&ouml;scht. <strong>Achtung:</strong> Diese Einstellung gilt für alle Wirecard-Zahlungsmittel.');

define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_RECEIVER', 'Empfänger');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_CONFIG_STRING', 'Konfiguration');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_DESC_TEXT', 'Beschreibung');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_RETURN_MAIL', 'R&uuml;ckantwort an E-Mail');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_SUBMIT_BUTTON', 'Senden');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_BACK_BUTTON', 'Zur&uuml;ck');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_INVALID_MAIL', 'E-Mail Addresse ungültig');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_MAIL_SENT', 'E-Mail versendet');
define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_MAIL_NOT_SENT', 'E-Mail nicht versendet');

define('MODULE_PAYMENT_WCP_EXPORT_CONFIG_LABEL', 'Konfiguration senden');
define('MODULE_PAYMENT_WCP_ORDER_DETAILS_TITLE', 'WCP Zahlungsdetails');
define('MODULE_PAYMENT_WCP_COMMUNICATION_ERROR', 'Kommunikationsfehler zum Zahlungsdienstleister. Bitte versuchen Sie es erneut.');

define('MODULE_PAYMENT_WCP_ANOTHER_ORDER', 'Es wurde eine weitere Bestellung generiert, Bestellnummer: %s.');
