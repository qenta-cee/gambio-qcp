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

	'MODULE_PAYMENT_WCP_PBX_TEXT_DESCRIPTION' => 'Sie werden nach der Bestellung zur Bezahlung zu unserem Zahlungsdienstleister Wirecard weitergeleitet.',
	'MODULE_PAYMENT_WCP_PBX_TEXT_TITLE' => 'paybox',
	'MODULE_PAYMENT_WCP_PBX_TEXT_INFO','',

	'MODULE_PAYMENT_WCP_PBX_STATUS_TITLE' => 'Aktiv',
	'MODULE_PAYMENT_WCP_PBX_STATUS_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_PLUGIN_MODE_TITLE' => 'Plug-In Modus',
	'MODULE_PAYMENT_WCP_PBX_PLUGIN_MODE_DESC' => 'Wechseln Sie zwischen Live, Demo oder Test Modus. <strong>Achtung</strong>: Es werden keine Transaktionen im Demo oder Test Modus verarbeitet!',

	'MODULE_PAYMENT_WCP_PBX_PRESHARED_KEY_TITLE' => 'Geheimer Schl&uuml;ssel (SECRET)',
	'MODULE_PAYMENT_WCP_PBX_PRESHARED_KEY_DESC' => 'Vorher vereinbarter geheimer Schl&uuml;ssel',

	'MODULE_PAYMENT_WCP_PBX_CUSTOMER_ID_TITLE' => 'Kundennummer',
	'MODULE_PAYMENT_WCP_PBX_CUSTOMER_ID_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_LOGO_TITLE' => 'Shop-Logo URL inkludieren',
	'MODULE_PAYMENT_WCP_PBX_LOGO_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_SHOP_ID_TITLE' => 'Shop ID',
	'MODULE_PAYMENT_WCP_PBX_SHOP_ID_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_SERVICE_URL_TITLE' => 'Service URL',
	'MODULE_PAYMENT_WCP_PBX_SERVICE_URL_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_DUPLICATE_REQUEST_CHECK_TITLE' => 'Aktiviere Duplicate-Request-Check',
	'MODULE_PAYMENT_WCP_PBX_DUPLICATE_REQUEST_CHECK_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_STATEMENT_TITLE' => 'Kunden Abrechnungstext Prefix',
	'MODULE_PAYMENT_WCP_PBX_STATEMENT_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_DISPLAY_TEXT_TITLE' => 'Anzeige Text',
	'MODULE_PAYMENT_WCP_PBX_DISPLAY_TEXT_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_ORDER_DESCRIPTION_TITLE' => 'Prefix f&uuml;r Bestellbeschreibung',
	'MODULE_PAYMENT_WCP_PBX_ORDER_DESCRIPTION_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_USE_IFRAME_TITLE' => 'IFrame verwenden?',
	'MODULE_PAYMENT_WCP_PBX_USE_IFRAME_DESC' => '',

	'MODULE_PAYMENT_WCP_PBX_SORT_ORDER_TITLE' => 'Anzeigeordnung',
	'MODULE_PAYMENT_WCP_PBX_SORT_ORDER_DESC' => 'Niederste an erster Stelle',

	'MODULE_PAYMENT_WCP_PBX_ALLOWED_TITLE' , 'Erlaubte Zonen',
	'MODULE_PAYMENT_WCP_PBX_ALLOWED_DESC' , 'Geben Sie erlaubte Zonen ein (e.g. AT,DE)',

	'MODULE_PAYMENT_WCP_PBX_CHECKOUT_TITLE' => 'Bezahlvorgang',
	'MODULE_PAYMENT_WCP_PBX_CHECKOUT_HEADER' => '',
	'MODULE_PAYMENT_WCP_PBX_CHECKOUT_CONTENT' => '<center>Sie werden zur Bezahlung weitergeleitet.</center>',

	'MODULE_PAYMENT_WCP_PBX_REDIRECT_TIMEOUT_SECOUNDS' => 2,
	'MODULE_PAYMENT_WCP_PBX_DEVICE_DETECTION_TITLE' => 'automatische Geräteerkennung',
	'MODULE_PAYMENT_WCP_PBX_DEVICE_DETECTION_DESC' => 'Erkennen des Kundengeräts (Smartphone, Tablet, Desktop PC) zum Anzeigen einer optimierten Zahlseite.',

	'MODULE_PAYMENT_WCP_PBX_SEND_BASKET_TITLE' => 'Warenkorbdaten des Konsumenten mitsenden',
	'MODULE_PAYMENT_WCP_PBX_SEND_BASKET_DESC' => 'Weiterleitung des Warenkorbs des Kunden an den Finanzdienstleister.',

	'MODULE_PAYMENT_WCP_PBX_SEND_SHIPPING_DATA_TITLE' => 'Versanddaten des Konsumenten mitsenden',
	'MODULE_PAYMENT_WCP_PBX_SEND_SHIPPING_DATA_DESC' => 'Weiterleitung der Versanddaten des Kunden an den Finanzdienstleister.',

	'MODULE_PAYMENT_WCP_PBX_SEND_BILLING_DATA_TITLE' => 'Verrechnungsdaten des Konsumenten mitsenden',
	'MODULE_PAYMENT_WCP_PBX_SEND_BILLING_DATA_DESC' => 'Weiterleitung der Rechnungsdaten des Kunden an den Finanzdienstleister.',
);