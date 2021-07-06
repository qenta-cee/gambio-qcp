<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once(dirname(__FILE__).'/qcp.php');

class qcp_voucher extends qcp_core {
    var $payment_type = 'VOUCHER';
    var $logoFilename = 'voucher.png';
    var $defaultPaymethodOrder = 25;

    /// @brief initialize qenta_checkout_page module
    function qcp_voucher() {
        parent::init();
    }
}