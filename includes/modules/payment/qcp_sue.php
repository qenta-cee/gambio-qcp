<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once(dirname(__FILE__).'/qcp.php');

class qcp_sue extends qcp_core {
    var $payment_type = 'SOFORTUEBERWEISUNG';
    var $use_iframe_default = true;
    var $logoFilename = 'sue.png';
    var $defaultPaymethodOrder = 6;

    /// @brief initialize qenta_checkout_page module
    function qcp_sue() {
        parent::init();
    }
}