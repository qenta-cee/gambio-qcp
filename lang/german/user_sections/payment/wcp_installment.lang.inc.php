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

	'MODULE_PAYMENT_WCP_INSTALLMENT_TEXT_DESCRIPTION' => 'Sie werden nach der Bestellung zur Bezahlung zu unserem Zahlungsdienstleister Wirecard weitergeleitet.',
	'MODULE_PAYMENT_WCP_INSTALLMENT_TEXT_TITLE' => 'Kauf auf Raten',
	'MODULE_PAYMENT_WCP_INSTALLMENT_TEXT_INFO','',

	'MODULE_PAYMENT_WCP_INSTALLMENT_STATUS_TITLE' => 'Aktiv',
	'MODULE_PAYMENT_WCP_INSTALLMENT_STATUS_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_PLUGIN_MODE_TITLE' => 'Plug-In Modus',
	'MODULE_PAYMENT_WCP_INSTALLMENT_PLUGIN_MODE_DESC' => 'Wechseln Sie zwischen Live, Demo oder Test Modus. <strong>Achtung</strong>: Es werden keine Transaktionen im Demo oder Test Modus verarbeitet!',

	'MODULE_PAYMENT_WCP_INSTALLMENT_PRESHARED_KEY_TITLE' => 'Geheimer Schl&uuml;ssel (SECRET)',
	'MODULE_PAYMENT_WCP_INSTALLMENT_PRESHARED_KEY_DESC' => 'Vorher vereinbarter geheimer Schl&uuml;ssel',

	'MODULE_PAYMENT_WCP_INSTALLMENT_CUSTOMER_ID_TITLE' => 'Kundennummer',
	'MODULE_PAYMENT_WCP_INSTALLMENT_CUSTOMER_ID_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_LOGO_TITLE' => 'Shop-Logo URL inkludieren',
	'MODULE_PAYMENT_WCP_INSTALLMENT_LOGO_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SHOP_ID_TITLE' => 'Shop ID',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SHOP_ID_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SERVICE_URL_TITLE' => 'Service URL',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SERVICE_URL_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_DUPLICATE_REQUEST_CHECK_TITLE' => 'Aktiviere Duplicate-Request-Check',
	'MODULE_PAYMENT_WCP_INSTALLMENT_DUPLICATE_REQUEST_CHECK_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_STATEMENT_TITLE' => 'Kunden Abrechnungstext Prefix',
	'MODULE_PAYMENT_WCP_INSTALLMENT_STATEMENT_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_DISPLAY_TEXT_TITLE' => 'Anzeige Text',
	'MODULE_PAYMENT_WCP_INSTALLMENT_DISPLAY_TEXT_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_ORDER_DESCRIPTION_TITLE' => 'Prefix f&uuml;r Bestellbeschreibung',
	'MODULE_PAYMENT_WCP_INSTALLMENT_ORDER_DESCRIPTION_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_USE_IFRAME_TITLE' => 'IFrame verwenden?',
	'MODULE_PAYMENT_WCP_INSTALLMENT_USE_IFRAME_DESC' => '',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SORT_ORDER_TITLE' => 'Anzeigeordnung',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SORT_ORDER_DESC' => 'Niederste an erster Stelle',

	'MODULE_PAYMENT_WCP_INSTALLMENT_ALLOWED_TITLE' , 'Erlaubte Zonen',
	'MODULE_PAYMENT_WCP_INSTALLMENT_ALLOWED_DESC' , 'Geben Sie erlaubte Zonen ein (e.g. AT,DE)',

	'MODULE_PAYMENT_WCP_INSTALLMENT_CHECKOUT_TITLE' => 'Bezahlvorgang',
	'MODULE_PAYMENT_WCP_INSTALLMENT_CHECKOUT_HEADER' => '',
	'MODULE_PAYMENT_WCP_INSTALLMENT_CHECKOUT_CONTENT' => '<center>Sie werden zur Bezahlung weitergeleitet.</center>',

	'MODULE_PAYMENT_WCP_INSTALLMENT_MIN_AMOUNT_TITLE' => 'Min. Bestellsumme',
	'MODULE_PAYMENT_WCP_INSTALLMENT_MIN_AMOUNT_DESC' => 'Min. Bestellsumme f&uuml;r Ratenzahlung',

	'MODULE_PAYMENT_WCP_INSTALLMENT_MAX_AMOUNT_TITLE' => 'Max. Bestellsumme',
	'MODULE_PAYMENT_WCP_INSTALLMENT_MAX_AMOUNT_DESC' => 'Max. Bestellsumme f&uuml;r Ratenzahlung',

	'MODULE_PAYMENT_WCP_INSTALLMENT_TERMS_TITLE' => 'Payolution Nutzungsbedingungen',
	'MODULE_PAYMENT_WCP_INSTALLMENT_TERMS_DESC' => 'Kunden müssen die Nutzungsbedingungen von payolution während des Bezahlprozesses akzeptieren.',

	'MODULE_PAYMENT_WCP_INSTALLMENT_MID_TITLE' => 'payolution mID',
	'MODULE_PAYMENT_WCP_INSTLALMENT_MID_DESC' => 'payolution-Händler-ID, Nicht base64 kodiert.',

	'MODULE_PAYMENT_WCP_INSTALLMENT_PROVIDER_TITLE' => 'Provider für Kauf auf Raten',
	'MODULE_PAYMENT_WCP_INSTALLMENT_PROVIDER_DESC' => 'Wählen Sie Ihren Provider für Kauf auf Raten aus.',

	'MODULE_PAYMENT_WCP_INSTALLMENT_CURRENCIES_TITLE' => 'Erlaubte Währungen',
	'MODULE_PAYMENT_WCP_INSTALLMENT_CURRENCIES_DESC' => 'Geben Sie erlaubte Währungen ein (e.g. EUR,CHF)',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SHIPPING_TITLE' => 'Rechnungs-/Versandadresse müssen übereinstimmen',

	'MODULE_PAYMENT_WCP_INSTALLMENT_CONSENT1' => 'Mit der Übermittlung jener Daten an payolution, die für die Abwicklung von Zahlungen mit Kauf auf Rechnung und die Identitäts- und Bonitätsprüfung erforderlich sind, bin ich einverstanden. Meine ',
	'MODULE_PAYMENT_WCP_INSTALLMENT_CONSENT2' => ' kann ich jederzeit mit Wirkung für die Zukunft widerrufen.',
	'MODULE_PAYMENT_WCP_INSTALLMENT_LINK' => 'Einwilligung',
	'MODULE_PAYMENT_WCP_INSTALLMENT_BIRTH' => 'Geburtsdatum',
	'MODULE_PAYMENT_WCP_INSTALLMENT_BIRTHDAY_ERROR' => 'Sie müssen mindestens 18 Jahre alt sein, um dieses Zahlungsmittel nutzen zu können.',
	'MODULE_PAYMENT_WCP_INSTALLMENT_EMPTY_BIRTHDAY_ERROR' => 'Bitte geben Sie ein gültiges Geburtsdatum an.',
	'MODULE_PAYMENT_WCP_INSTALLMENT_PAYOLUTION_ERROR' => 'Bitte akzeptieren Sie die payolution Konditionen.',

	'MODULE_PAYMENT_WCP_INSTALLMENT_REDIRECT_TIMEOUT_SECOUNDS' => 2,
	'MODULE_PAYMENT_WCP_INSTALLMENT_DEVICE_DETECTION_TITLE' => 'Automatische Geräteerkennung',
	'MODULE_PAYMENT_WCP_INSTALLMENT_DEVICE_DETECTION_DESC' => 'Erkennen des Kundengeräts (Smartphone, Tablet, Desktop PC) zum Anzeigen einer optimierten Zahlseite.',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SEND_BASKET_TITLE' => 'Warenkorbdaten des Konsumenten mitsenden',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SEND_BASKET_DESC' => 'Weiterleitung des Warenkorbs des Kunden an den Finanzdienstleister.',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SEND_SHIPPING_DATA_TITLE' => 'Versanddaten des Konsumenten mitsenden',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SEND_SHIPPING_DATA_DESC' => 'Weiterleitung der Versanddaten des Kunden an den Finanzdienstleister.',

	'MODULE_PAYMENT_WCP_INSTALLMENT_SEND_BILLING_DATA_TITLE' => 'Verrechnungsdaten des Konsumenten mitsenden',
	'MODULE_PAYMENT_WCP_INSTALLMENT_SEND_BILLING_DATA_DESC' => 'Weiterleitung der Rechnungsdaten des Kunden an den Finanzdienstleister.',
);