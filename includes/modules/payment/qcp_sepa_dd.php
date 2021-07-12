<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/
require_once(dirname(__FILE__).'/qcp.php');

class qcp_sepa_dd extends qcp_core {
    var $payment_type = 'SEPA-DD';
    var $logoFilename = 'sepa_dd.png';
    var $defaultPaymethodOrder = 21;

    /// @brief initialize qenta_checkout_page module
    function qcp_sepa_dd() {
        parent::init();
    }
}