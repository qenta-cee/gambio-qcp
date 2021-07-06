<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once(dirname(__FILE__).'/qcp.php');

class qcp_installment extends qcp_core {
    var $payment_type = 'INSTALLMENT';
    var $logoFilename = 'installment.png';
    var $defaultPaymethodOrder = 24;

    var $has_minmax_amount = true;
	var $has_provider = "'gm_cfg_select_option(array(\'payolution\', \'RatePay\'), '";

    /// @brief initialize qenta_checkout_page module
    function qcp_installment() {
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

		$minAmountConf = qcp_core::constant("MODULE_PAYMENT_{$c}_MIN_AMOUNT")." ";
		$maxAmountConf = qcp_core::constant("MODULE_PAYMENT_{$c}_MAX_AMOUNT");
		$shippingConf = qcp_core::constant("MODULE_PAYMENT_{$c}_SHIPPING");
		$allowedZones = explode(",", qcp_core::constant("MODULE_PAYMENT_{$c}_ALLOWED"));
		$allowedCurrencies = explode(",", qcp_core::constant("MODULE_PAYMENT_{$c}_CURRENCIES"));

		if(!empty($minAmountConf) && $amount < $minAmountConf) {
			return false;
		}

		if(!empty($maxAmountConf) && $amount > ($maxAmountConf)) {
			return false;
		}

		if (( ! in_array($country_code, $allowedZones) && strlen(qcp_core::constant("MODULE_PAYMENT_{$c}_ALLOWED"))) ||
			( ! in_array($currency, $allowedCurrencies) && strlen(qcp_core::constant("MODULE_PAYMENT_{$c}_CURRENCIES"))) ||
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
		$t_qcp_birthday = $birthDate;
		if(trim($_SESSION['qcp_birthday']) != '')
		{
			$t_qcp_birthday = $_SESSION['qcp_birthday'];
		}

		$maxDate = (date('Y')-18)."-".date('m')."-".date('d');
		$birthday = '<input type="date" name="qcp_birthday" value="'.$t_qcp_birthday.'" max="'.$maxDate.'"  class="form-control" />';
		$birthDayField = array('title' => MODULE_PAYMENT_QCP_INSTALLMENT_BIRTH, 'field' => $birthday);
		$fields = array();
		array_push($fields, $birthDayField);

		$terms = qcp_core::constant("MODULE_PAYMENT_{$c}_TERMS");
		$mId = qcp_core::constant("MODULE_PAYMENT_{$c}_MID");
		$provider = qcp_core::constant("MODULE_PAYMENT_{$c}_PROVIDER");

		$t_qcp_payolutionterms = "";
		if(trim($_SESSION['qcp_payolutionterms']) != '')
		{
			$t_qcp_payolutionterms = $_SESSION['qcp_payolutionterms'];
		}

		$payolutionTerms = '<input type="checkbox" name="qcp_payolutionterms" value="'.$t_qcp_payolutionterms.'"/>&nbsp;<span>'.MODULE_PAYMENT_QCP_INSTALLMENT_CONSENT1;
		if (strlen($mId)) {
			$payolutionTerms .= '<a id="qcp-payolutionlink" href="https://payment.payolution.com/payolution-payment/infoport/dataprivacyconsent?mId='.$mId.'" target="_blank"><b>' . MODULE_PAYMENT_QCP_INSTALLMENT_LINK .'</b></a>';
		}else {
			$payolutionTerms .= MODULE_PAYMENT_QCP_INSTALLMENT_LINK;
		}
		$payolutionTerms .= MODULE_PAYMENT_QCP_INSTALLMENT_CONSENT2 . '</span>';

		if ($terms && $provider == 'payolution') {
			array_push($fields, array('title' => MODULE_PAYMENT_QCP_INSTALLMENT_TERMS_TITLE, 'field' => $payolutionTerms));
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

		$process_button_string = xtc_draw_hidden_field('qcp_birthday', $_POST['qcp_birthday']);
		$config = $this->get_config_values();
		$customerId = $config[1];

		if(isset($_SESSION['qcp-consumerDeviceId'])) {
			$consumerDeviceId = $_SESSION['qcp-consumerDeviceId'];
		} else {
			$timestamp = microtime();
			$consumerDeviceId = md5($customerId . "_" . $timestamp);
			$_SESSION['qcp-consumerDeviceId'] = $consumerDeviceId;
		}

        if(qcp_core::constant("MODULE_PAYMENT_QCP_INSTALLMENT_PROVIDER") == "RatePay")
        {
            $ratepay = '<script language="JavaScript">var di = {t:"'.$consumerDeviceId.'",v:"WDWL",l:"Checkout"};</script>';
            $ratepay .= '<script type="text/javascript" src="//d.ratepay.com/'.$consumerDeviceId.'/di.js"></script>';
            $ratepay .= '<noscript><link rel="stylesheet" type="text/css" href="//d.ratepay.com/di.css?t='.$consumerDeviceId.'&v=WDWL&l=Checkout"></noscript>';
            $ratepay .= '<object type="application/x-shockwave-flash" data="//d.ratepay.com/WDWL/c.swf" width="0" height="0"><param name="movie" value="//d.ratepay.com/WDWL/c.swf" /><param name="flashvars" value="t='.$consumerDeviceId.'&v=WDWL"/><param name="AllowScriptAccess" value="always"/></object>';
            $process_button_string .= $ratepay;
        }

		return $process_button_string;
	}

	function pre_confirmation_check() {
		$maxDate = (date('Y')-18)."-".date('m')."-".date('d');
		if($_POST['qcp_birthday'] > $maxDate) {
			$error = MODULE_PAYMENT_QCP_INSTALLMENT_BIRTHDAY_ERROR;
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&recheckok=' . false;
			xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}
		if($_POST['qcp_birthday'] == '1000-01-01') {
			$error = MODULE_PAYMENT_QCP_INSTALLMENT_EMPTY_BIRTHDAY_ERROR;
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&recheckok=' . false;
			xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}
		if(!isset($_POST['qcp_payolutionterms']) && MODULE_PAYMENT_QCP_INSTALLMENT_PROVIDER == 'payolution' && MODULE_PAYMENT_QCP_INSTALLMENT_TERMS) {
			$error = MODULE_PAYMENT_QCP_INSTALLMENT_PAYOLUTION_ERROR;
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&recheckok=' . false;
			xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}
	}

}