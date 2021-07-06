<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once(dirname(__FILE__).'/qcp.php');


class qcp_idl extends qcp_core {
    var $payment_type = 'IDL';
    var $logoFilename = 'idl.png';
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

    /// @brief initialize qenta_checkout_page module
    function qcp_idl() {
        parent::init();
    }

	function selection() {
		$c = strtoupper($this->code);

		$t_qcp_idl_financial_institution = self::$_idl_financial_institutions;
		if(trim($_SESSION['qcp_idl_financial_institution']) != '')
		{
			$t_qcp_idl_financial_institution = $_SESSION['qcp_idl_financial_institution'];
		}
		$institution_field = xtc_draw_pull_down_menu("qcp_idl_financial_institution", $t_qcp_idl_financial_institution, '', 'class="form-control"');
		$field = array('title' => MODULE_PAYMENT_QCP_IDL_FINANCIAL_INSTITUTION, 'field' => $institution_field);

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

		$process_button_string = xtc_draw_hidden_field('qcp_idl_financial_institution', $_POST['qcp_idl_financial_institution']);
		return $process_button_string;
	}
}