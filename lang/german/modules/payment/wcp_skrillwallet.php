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

define('MODULE_PAYMENT_WCP_SKRILLWALLET_TEXT_DESCRIPTION', 'Sie werden nach der Bestellung zur Bezahlung zu unserem Zahlungsdienstleister Wirecard weitergeleitet.');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_TEXT_TITLE', 'Skrill Digital Wallet');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_TEXT_INFO','');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_STATUS_TITLE', 'Aktiv');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_STATUS_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_PLUGIN_MODE_TITLE', 'Plug-In Modus');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_PLUGIN_MODE_DESC', 'Wechseln Sie zwischen Live, Demo oder Test Modus. <strong>Achtung</strong>: Es werden keine Transaktionen im Demo oder Test Modus verarbeitet!');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_PRESHARED_KEY_TITLE', 'Geheimer Schl&uuml;ssel (SECRET)');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_PRESHARED_KEY_DESC', 'Vorher vereinbarter geheimer Schl&uuml;ssel');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_CUSTOMER_ID_TITLE', 'Kundennummer');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_CUSTOMER_ID_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_LOGO_TITLE', 'Shop-Logo URL inkludieren');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_LOGO_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_SHOP_ID_TITLE', 'Shop ID');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_SHOP_ID_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_SERVICE_URL_TITLE', 'Service URL');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_SERVICE_URL_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_DUPLICATE_REQUEST_CHECK_TITLE', 'Aktiviere Duplicate-Request-Check');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_DUPLICATE_REQUEST_CHECK_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_STATEMENT_TITLE', 'Kunden Abrechnungstext Prefix');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_STATEMENT_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_DISPLAY_TEXT_TITLE', 'Anzeige Text');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_DISPLAY_TEXT_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_ORDER_DESCRIPTION_TITLE', 'Prefix f&uuml;r Bestellbeschreibung');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_ORDER_DESCRIPTION_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_USE_IFRAME_TITLE', 'IFrame verwenden?');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_USE_IFRAME_DESC', '');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_SORT_ORDER_TITLE', 'Anzeigeordnung');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_SORT_ORDER_DESC', 'Niederste an erster Stelle');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_ALLOWED_TITLE' , 'Erlaubte Zonen');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_ALLOWED_DESC' , 'Geben Sie erlaubte Zonen ein (e.g. AT,DE)');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_CHECKOUT_TITLE', 'Bezahlvorgang');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_CHECKOUT_HEADER', '');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_CHECKOUT_CONTENT', '<center>Sie werden zur Bezahlung weitergeleitet.</center>');

define('MODULE_PAYMENT_WCP_SKRILLWALLET_REDIRECT_TIMEOUT_SECOUNDS', 2);
define('MODULE_PAYMENT_WCP_SKRILLWALLET_DEVICE_DETECTION_TITLE', 'automatische Geräteerkennung');
define('MODULE_PAYMENT_WCP_SKRILLWALLET_DEVICE_DETECTION_DESC', 'Erkennen des Kundengeräts (Smartphone, Tablet, Desktop PC) zum Anzeigen einer optimierten Zahlseite.');