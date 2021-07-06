<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once(dirname(__FILE__).'/qcp.php');

class qcp_ccardmoto extends qcp_core {
    var $payment_type = 'CCARD-MOTO';
    var $logoFilename = 'ccardmoto.png';
    var $defaultPaymethodOrder = 1;

    /// @brief initialize qenta_checkout_page module
    function qcp_ccardmoto() {
        parent::init();
    }

    /**
     * @return bool
     */
    function _preCheck()
    {
        global $order, $customer, $currencies, $xtPrice;

        return ($_SESSION['customers_status']['customers_status_id'] == DEFAULT_CUSTOMERS_STATUS_ID_ADMIN);
    }
}