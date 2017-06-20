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

define('MODULE_PAYMENT_WCP_MAESTRO_TEXT_DESCRIPTION', 'Sie werden nach der Bestellung zur Bezahlung zu unserem Zahlungsdienstleister Wirecard weitergeleitet.');
define('MODULE_PAYMENT_WCP_MAESTRO_TEXT_TITLE', 'Maestro SecureCode');
define('MODULE_PAYMENT_WCP_MAESTRO_TEXT_INFO','');

define('MODULE_PAYMENT_WCP_MAESTRO_STATUS_TITLE', 'Aktiv');
define('MODULE_PAYMENT_WCP_MAESTRO_STATUS_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_PLUGIN_MODE_TITLE', 'Plug-In Modus');
define('MODULE_PAYMENT_WCP_MAESTRO_PLUGIN_MODE_DESC', 'Wechseln Sie zwischen Live, Demo oder Test Modus. <strong>Achtung</strong>: Es werden keine Transaktionen im Demo oder Test Modus verarbeitet!');

define('MODULE_PAYMENT_WCP_MAESTRO_PRESHARED_KEY_TITLE', 'Geheimer Schl&uuml;ssel (SECRET)');
define('MODULE_PAYMENT_WCP_MAESTRO_PRESHARED_KEY_DESC', 'Vorher vereinbarter geheimer Schl&uuml;ssel');

define('MODULE_PAYMENT_WCP_MAESTRO_CUSTOMER_ID_TITLE', 'Kundennummer');
define('MODULE_PAYMENT_WCP_MAESTRO_CUSTOMER_ID_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_LOGO_TITLE', 'Shop-Logo URL inkludieren');
define('MODULE_PAYMENT_WCP_MAESTRO_LOGO_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_SHOP_ID_TITLE', 'Shop ID');
define('MODULE_PAYMENT_WCP_MAESTRO_SHOP_ID_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_SERVICE_URL_TITLE', 'Service URL');
define('MODULE_PAYMENT_WCP_MAESTRO_SERVICE_URL_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_DUPLICATE_REQUEST_CHECK_TITLE', 'Aktiviere Duplicate-Request-Check');
define('MODULE_PAYMENT_WCP_MAESTRO_DUPLICATE_REQUEST_CHECK_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_STATEMENT_TITLE', 'Kunden Abrechnungstext Prefix');
define('MODULE_PAYMENT_WCP_MAESTRO_STATEMENT_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_DISPLAY_TEXT_TITLE', 'Anzeige Text');
define('MODULE_PAYMENT_WCP_MAESTRO_DISPLAY_TEXT_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_ORDER_DESCRIPTION_TITLE', 'Prefix f&uuml;r Bestellbeschreibung');
define('MODULE_PAYMENT_WCP_MAESTRO_ORDER_DESCRIPTION_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_USE_IFRAME_TITLE', 'IFrame verwenden?');
define('MODULE_PAYMENT_WCP_MAESTRO_USE_IFRAME_DESC', '');

define('MODULE_PAYMENT_WCP_MAESTRO_SORT_ORDER_TITLE', 'Anzeigeordnung');
define('MODULE_PAYMENT_WCP_MAESTRO_SORT_ORDER_DESC', 'Niederste an erster Stelle');

define('MODULE_PAYMENT_WCP_MAESTRO_ALLOWED_TITLE' , 'Erlaubte Zonen');
define('MODULE_PAYMENT_WCP_MAESTRO_ALLOWED_DESC' , 'Geben Sie erlaubte Zonen ein (e.g. AT,DE)');

define('MODULE_PAYMENT_WCP_MAESTRO_CHECKOUT_TITLE', 'Bezahlvorgang');
define('MODULE_PAYMENT_WCP_MAESTRO_CHECKOUT_HEADER', '');
define('MODULE_PAYMENT_WCP_MAESTRO_CHECKOUT_CONTENT', '<center>Sie werden zur Bezahlung weitergeleitet.</center>');

define('MODULE_PAYMENT_WCP_MAESTRO_REDIRECT_TIMEOUT_SECOUNDS', 2);
define('MODULE_PAYMENT_WCP_MAESTRO_DEVICE_DETECTION_TITLE', 'Automatische Geräteerkennung');
define('MODULE_PAYMENT_WCP_MAESTRO_DEVICE_DETECTION_DESC', 'Erkennen des Kundengeräts (Smartphone, Tablet, Desktop PC) zum Anzeigen einer optimierten Zahlseite.');

define('MODULE_PAYMENT_WCP_MAESTRO_ORDER_STATUS_ID_TITLE', 'Bestellstatus festlegen');
define('MODULE_PAYMENT_WCP_MAESTRO_ORDER_STATUS_ID_DESC', 'Bestellungen, die mit diesem Modul gemacht werden, auf diesen Status setzen');

define('MODULE_PAYMENT_WCP_MAESTRO_SEND_BASKET_TITLE', 'Warenkorbdaten des Konsumenten mitsenden');
define('MODULE_PAYMENT_WCP_MAESTRO_SEND_BASKET_DESC', 'Weiterleitung des Warenkorbs des Kunden an den Finanzdienstleister.');

define('MODULE_PAYMENT_WCP_MAESTRO_SEND_SHIPPING_DATA_TITLE', 'Versanddaten des Konsumenten mitsenden');
define('MODULE_PAYMENT_WCP_MAESTRO_SEND_SHIPPING_DATA_DESC', 'Weiterleitung der Versanddaten des Kunden an den Finanzdienstleister.');

define('MODULE_PAYMENT_WCP_MAESTRO_SEND_BILLING_DATA_TITLE', 'Verrechnungsdaten des Konsumenten mitsenden');
define('MODULE_PAYMENT_WCP_MAESTRO_SEND_BILLING_DATA_DESC', 'Weiterleitung der Rechnungsdaten des Kunden an den Finanzdienstleister.');
