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

class wcp_poli extends wcp_core {
    var $payment_type = 'POLI';
    var $logoFilename = 'poli.jpg';
    var $customerStatementLength = 9;
    var $defaultPaymethodOrder = 13;

    /// @brief initialize wirecard_checkout_page module
    function wcp_poli() {
        parent::init();
    }

    function generate_customer_statement($index, $order_reference) {
        $statement = substr(trim(wcp_core::constant("MODULE_PAYMENT_{$index}_STATEMENT")), 0, $this->customerStatementLength);
        if(strlen($statement) > 0) {
            return $statement;
        }

        return substr(str_pad($order_reference, $this->customerStatementLength, '0', STR_PAD_LEFT), 0, $this->customerStatementLength);
    }
}