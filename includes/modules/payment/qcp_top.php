<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/
/**
 * This file must be include before loading application_top
 * You dont have any gambio features available
 */

/**
 * Hide some POST params from gambio (ugly hack)
 * If language and/or curreny are found by gambio (when including application_top), a 301 is generated.
 * This behaviour breaks the server2server confirm and the return POST requests.
 *
 * @param bool $restore
 */
function qcp_preserve_postparams($restore = false)
{
    static $preserved = [];

    $params = [
        'language',
        'currency'
    ];

    if (!isset($_POST)) {
        return;
    }

    if ($restore) {
        foreach ($preserved as $p => $v) {
            $_POST[$p] = $v;
        }
        return;
    }

    foreach ($params as $p) {
        if (isset($_POST[$p])) {
            $preserved[$p] = $_POST[$p];
            unset($_POST[$p]);
        }
    }
}
