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

class wcp_eps extends wcp_core {
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

    /// @brief initialize wirecard_checkout_page module
    function wcp_eps() {
        parent::init();
    }

	function selection() {
		$c = strtoupper($this->code);

		$t_wcp_financial_institution = self::$_eps_financial_institutions;
		if(trim($_SESSION['wcp_financial_institution']) != '')
		{
			$t_wcp_financial_institution = $_SESSION['wcp_financial_institution'];
		}
		$institution_field = xtc_draw_pull_down_menu("wcp_financial_institution", $t_wcp_financial_institution, '', 'class="form-control"');
		$field = array('title' => MODULE_PAYMENT_WCP_EPS_FINANCIAL_INSTITUTION, 'field' => $institution_field);

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