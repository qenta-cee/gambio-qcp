<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once(dirname(__FILE__).'/qcp.php');

class qcp_eps extends qcp_core {
    var $payment_type = 'EPS';
    var $logoFilename = 'eps.png';
    var $defaultPaymethodOrder = 2;

	/**
	 * eps financial institutions
	 *
	 * @var array
	 */
	protected static $_eps_financial_institutions = Array(
		Array( 'id' => 'ARZ|AB', 'text' => 'Apothekerbank'),
		Array( 'id' => 'ARZ|AAB', 'text' => 'Austrian Anadi Bank AG'),
		Array( 'id' => 'ARZ|BAF', 'text' => '&Auml;rztebank'),
		Array( 'id' => 'BA-CA', 'text' => 'Bank Austria'),
		Array( 'id' => 'ARZ|BCS', 'text' => 'Bankhaus Carl Sp&auml;ngler & Co. AG'),
		Array( 'id' => 'ARZ|BSS', 'text' => 'Bankhaus Schelhammer & Schattera AG'),
		Array( 'id' => 'Bawag|BG', 'text' => 'BAWAG P.S.K. AG'),
		Array( 'id' => 'ARZ|BKS', 'text' => 'BKS Bank AG'),
		Array( 'id' => 'ARZ|BKB', 'text' => 'Br&uuml;ll Kallmus Bank AG'),
		Array( 'id' => 'ARZ|BTV', 'text' => 'BTV VIER L&Auml;NDER BANK'),
		Array( 'id' => 'ARZ|CBGG', 'text' => 'Capital Bank Grawe Gruppe AG'),
		Array( 'id' => 'ARZ|DB', 'text' => 'Dolomitenbank'),
		Array( 'id' => 'Bawag|EB', 'text' => 'Easybank AG'),
		Array( 'id' => 'Spardat|EBS', 'text' => 'Erste Bank und Sparkassen'),
		Array( 'id' => 'ARZ|HAA', 'text' => 'Hypo Alpe-Adria-Bank International AG'),
		Array( 'id' => 'ARZ|VLH', 'text' => 'Hypo Landesbank Vorarlberg'),
		Array( 'id' => 'ARZ|HI', 'text' => 'HYPO NOE Gruppe Bank AG'),
		Array( 'id' => 'ARZ|NLH', 'text' => 'HYPO NOE Landesbank AG'),
		Array( 'id' => 'Hypo-Racon|O', 'text' => 'Hypo Ober&ouml;sterreich'),
		Array( 'id' => 'Hypo-Racon|S', 'text' => 'Hypo Salzburg'),
		Array( 'id' => 'Hypo-Racon|St', 'text' => 'Hypo Steiermark'),
		Array( 'id' => 'ARZ|HTB', 'text' => 'Hypo Tirol Bank AG'),
		Array( 'id' => 'BB-Racon', 'text' => 'HYPO-BANK BURGENLAND Aktiengesellschaft'),
		Array( 'id' => 'ARZ|IB', 'text' => 'Immo-Bank'),
		Array( 'id' => 'ARZ|OB', 'text' => 'Oberbank AG'),
		Array( 'id' => 'Racon', 'text' => 'Raiffeisen Bankengruppe &Ouml;sterreich'),
		Array( 'id' => 'ARZ|SB', 'text' => 'Schoellerbank AG'),
		Array( 'id' => 'Bawag|SBW', 'text' => 'Sparda Bank Wien'),
		Array( 'id' => 'ARZ|SBA', 'text' => 'SPARDA-BANK AUSTRIA'),
        Array( 'id' => 'ARZ|VB', 'text' => 'Volksbank Gruppe'),
		Array( 'id' => 'ARZ|VKB', 'text' => 'Volkskreditbank AG'),
		Array( 'id' => 'ARZ|VRB', 'text' => 'VR-Bank Braunau')
	);

    /// @brief initialize qenta_checkout_page module
    function qcp_eps() {
        parent::init();
    }

	function selection() {
		$c = strtoupper($this->code);

		$t_qcp_financial_institution = self::$_eps_financial_institutions;
		if(trim($_SESSION['qcp_financial_institution']) != '')
		{
			$t_qcp_financial_institution = $_SESSION['qcp_financial_institution'];
		}
		$institution_field = xtc_draw_pull_down_menu("qcp_financial_institution", $t_qcp_financial_institution, '', 'class="form-control"');
		$field = array('title' => MODULE_PAYMENT_QCP_EPS_FINANCIAL_INSTITUTION, 'field' => $institution_field);

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

		$process_button_string = xtc_draw_hidden_field('qcp_financial_institution', $_POST['qcp_financial_institution']);
		return $process_button_string;
	}

}