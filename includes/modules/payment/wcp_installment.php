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

require_once(dirname(__FILE__).'/wcp.php');

class wcp_installment extends wcp_core {
    var $payment_type = 'INSTALLMENT';
    var $logoFilename = 'installment.png';
    var $defaultPaymethodOrder = 24;

    var $has_minmax_amount = true;
	var $has_provider = "'gm_cfg_select_option(array(\'payolution\', \'RatePay\'), '";

    /// @brief initialize wirecard_checkout_page module
    function wcp_installment() {
        parent::init();
    }

    /**
     * @return bool
     */
	function _preCheck()
	{
		global $order, $customer, $currencies, $xtPrice;

		$c = strtoupper($this->code);
		$consumerID = xtc_session_is_registered('customer_id') ? $_SESSION['customer_id'] : "";

		$currency = $order->info['currency'];
		$total = $order->info['total'];
		$amount = round($xtPrice->xtcCalculateCurrEx($total,$currency), $xtPrice->get_decimal_places($currency));

		$customerService = StaticGXCoreLoader::getService('Customer');
		$customer = $customerService->getCustomerById(MainFactory::create('IdType', $consumerID));
		$customerDateOfBirth = $customer->getDateOfBirth();
		$customerBirthDate = $customerDateOfBirth->format('Y-m-d');
		$country_code = $order->billing['country']['iso_code_2'];

		$minAmountConf = wcp_core::constant("MODULE_PAYMENT_{$c}_MIN_AMOUNT")." ";
		$maxAmountConf = wcp_core::constant("MODULE_PAYMENT_{$c}_MAX_AMOUNT");
		$shippingConf = wcp_core::constant("MODULE_PAYMENT_{$c}_SHIPPING");
		$allowedZones = explode(",", wcp_core::constant("MODULE_PAYMENT_{$c}_ALLOWED"));
		$allowedCurrencies = explode(",", wcp_core::constant("MODULE_PAYMENT_{$c}_CURRENCIES"));

		if(!empty($minAmountConf) && $amount < $minAmountConf) {
			return false;
		}

		if(!empty($maxAmountConf) && $amount > ($maxAmountConf)) {
			return false;
		}

		if (( ! in_array($country_code, $allowedZones) && strlen(wcp_core::constant("MODULE_PAYMENT_{$c}_ALLOWED"))) ||
			( ! in_array($currency, $allowedCurrencies) && strlen(wcp_core::constant("MODULE_PAYMENT_{$c}_CURRENCIES"))) ||
			($shippingConf && ($order->delivery !== $order->billing))
		) {
			return false;
		}

		return $customerBirthDate;
	}

	function selection() {
		$c = strtoupper($this->code);

		$birthDate = $this->_preCheck();
		if(!$birthDate) {
			return false;
		}
		$t_wcp_birthday = $birthDate;
		if(trim($_SESSION['wcp_birthday']) != '')
		{
			$t_wcp_birthday = $_SESSION['wcp_birthday'];
		}

		$maxDate = (date('Y')-18)."-".date('m')."-".date('d');
		$birthday = '<input type="date" name="wcp_birthday" value="'.$t_wcp_birthday.'" max="'.$maxDate.'"  class="form-control" />';
		$birthDayField = array('title' => MODULE_PAYMENT_WCP_INSTALLMENT_BIRTH, 'field' => $birthday);
		$fields = array();
		array_push($fields, $birthDayField);

		$terms = wcp_core::constant("MODULE_PAYMENT_{$c}_TERMS");
		$mId = wcp_core::constant("MODULE_PAYMENT_{$c}_MID");
		$provider = wcp_core::constant("MODULE_PAYMENT_{$c}_PROVIDER");

		$t_wcp_payolutionterms = "";
		if(trim($_SESSION['wcp_payolutionterms']) != '')
		{
			$t_wcp_payolutionterms = $_SESSION['wcp_payolutionterms'];
		}

		$payolutionTerms = '<input type="checkbox" name="wcp_payolutionterms" value="'.$t_wcp_payolutionterms.'"/>&nbsp;<span>'.MODULE_PAYMENT_WCP_INSTALLMENT_CONSENT1;
		if (strlen($mId)) {
			$payolutionTerms .= '<a id="wcp-payolutionlink" href="https://payment.payolution.com/payolution-payment/infoport/dataprivacyconsent?mId='.$mId.'" target="_blank"><b>' . MODULE_PAYMENT_WCP_INSTALLMENT_LINK .'</b></a>';
		}else {
			$payolutionTerms .= MODULE_PAYMENT_WCP_INSTALLMENT_LINK;
		}
		$payolutionTerms .= MODULE_PAYMENT_WCP_INSTALLMENT_CONSENT2 . '</span>';

		if ($terms && $provider == 'payolution') {
			array_push($fields, array('title' => MODULE_PAYMENT_WCP_INSTALLMENT_TERMS_TITLE, 'field' => $payolutionTerms));
		}

		$selection = array('id' => $this->code,
		                   'module' => $this->title,
		                   'description' => $this->info,
		                   'fields' => $fields
		);

		return $selection;
	}

	function get_error() {
		$return = false;
		if(isset($_GET['error'])) {
			$return =  array('title' => 'error',
			                 'error' => stripslashes(urldecode($_GET['error'])));
		}
		return $return;
	}

	function process_button() {
		global $_POST;

		$process_button_string = xtc_draw_hidden_field('wcp_birthday', $_POST['wcp_birthday']);
		return $process_button_string;
	}

	function pre_confirmation_check() {
		$maxDate = (date('Y')-18)."-".date('m')."-".date('d');
		if($_POST['wcp_birthday'] > $maxDate) {
			$error = MODULE_PAYMENT_WCP_INSTALLMENT_BIRTHDAY_ERROR;
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&recheckok=' . false;
			xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}
		if($_POST['wcp_birthday'] == '1000-01-01') {
			$error = MODULE_PAYMENT_WCP_INSTALLMENT_EMPTY_BIRTHDAY_ERROR;
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&recheckok=' . false;
			xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}
		if(!isset($_POST['wcp_payolutionterms']) && MODULE_PAYMENT_WCP_INSTALLMENT_PROVIDER == 'payolution' && MODULE_PAYMENT_WCP_INSTALLMENT_TERMS) {
			$error = MODULE_PAYMENT_WCP_INSTALLMENT_PAYOLUTION_ERROR;
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&recheckok=' . false;
			xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}
	}

}