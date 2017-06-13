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


class wcp_idl extends wcp_core {
    var $payment_type = 'IDL';
    var $logoFilename = 'ideal.jpg';
    var $defaultPaymethodOrder = 3;

	/**
	 * idl financial institutions
	 *
	 * @var array
	 */
	protected static $_idl_financial_institutions = Array(
		Array( 'id' => 'ABNAMROBANK', 'text' => 'ABN AMRO Bank'),
		Array( 'id' => 'ASNBANK', 'text' => 'ASN Bank'),
		Array( 'id' => 'BUNQ', 'text' => 'Bunq Bank'),
		Array( 'id' => 'INGBANK', 'text' => 'ING'),
		Array( 'id' => 'KNAB', 'text' => 'knab'),
		Array( 'id' => 'RABOBANK', 'text' => 'Rabobank'),
		Array( 'id' => 'SNSBANK', 'text' => 'SNS Bank'),
		Array( 'id' => 'REGIOBANK', 'text' => 'RegioBank'),
		Array( 'id' => 'TRIODOSBANK', 'text' => 'Triodos Bank'),
		Array( 'id' => 'VANLANSCHOT', 'text' => 'Van Lanschot Bankiers')
	);

    /// @brief initialize wirecard_checkout_page module
    function wcp_idl() {
        parent::init();
    }

	function selection() {
		$c = strtoupper($this->code);

		$t_wcp_financial_institution = self::$_idl_financial_institutions;
		if(trim($_SESSION['wcp_financial_institution']) != '')
		{
			$t_wcp_financial_institution = $_SESSION['wcp_financial_institution'];
		}
		$institution_field = xtc_draw_pull_down_menu("wcp_financial_institution", $t_wcp_financial_institution);
		$field = array('title' => MODULE_PAYMENT_WCP_IDL_FINANCIAL_INSTITUTION, 'field' => $institution_field);

		$fields = array();
		array_push($fields, $field);
		$selection = array('id' => $this->code,
		                   'module' => $this->title,
		                   'description' => $this->info,
		                   'fields' => $fields
		);

		return $selection;
	}

	function process_button() {
		global $_POST;

		$process_button_string = xtc_draw_hidden_field('wcp_financial_institution', $_POST['wcp_financial_institution']);
		return $process_button_string;
	}
}