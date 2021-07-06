<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once(dirname(__FILE__).'/qcp.php');

class qcp_poli extends qcp_core {
    var $payment_type = 'POLI';
    var $logoFilename = 'poli.png';
    var $customerStatementLength = 9;
    var $defaultPaymethodOrder = 13;

    /// @brief initialize qenta_checkout_page module
    function qcp_poli() {
        parent::init();
    }

    function generate_customer_statement($index, $order_reference) {
        $statement = substr(trim(qcp_core::constant("MODULE_PAYMENT_{$index}_STATEMENT")), 0, $this->customerStatementLength);
        if(strlen($statement) > 0) {
            return $statement;
        }

        return substr(str_pad($order_reference, $this->customerStatementLength, '0', STR_PAD_LEFT), 0, $this->customerStatementLength);
    }
}