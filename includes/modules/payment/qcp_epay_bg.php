<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once(dirname(__FILE__).'/qcp.php');

class qcp_epay_bg extends qcp_core {
    var $payment_type = 'EPAY_BG';
    var $logoFilename = 'epay_bg.png';
    var $defaultPaymethodOrder = 20;

    /// @brief initialize qenta_checkout_page module
    function qcp_epay_bg() {
        parent::init();
    }
}