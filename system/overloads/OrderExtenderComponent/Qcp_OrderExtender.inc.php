<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

class Qcp_OrderExtender extends Qcp_OrderExtender_parent {

    function proceed() {
        parent::proceed();
        $paymentInformation = array();

        include_once('../includes/modules/payment/qcp.php');

        if(is_array($this->v_output_buffer) == false)
        {
            $this->v_output_buffer = array();
        }

        $q = xtc_db_query('SELECT response FROM ' . TABLE_PAYMENT_QCP . ' WHERE orders_id = "'.xtc_db_input((int)$_GET['oID']).'" ORDER BY id DESC LIMIT 1;');
        if(xtc_db_num_rows($q)) {
            $dbEntry = xtc_db_fetch_array($q);
            $paymentInformation = unserialize($dbEntry['response']);
        }

        if(!is_array($paymentInformation)) return false;
        if(count($paymentInformation) <=0) return false;

        $coo_lang_file_master = MainFactory::create_object('LanguageTextManager', array(), true);
        $coo_lang_file_master->init_from_lang_file('lang/'.strtolower($_SESSION['language']).'/modules/payment/qcp.php');

        $coo_versioninfo = MainFactory::create_object('VersionInfo');
        $t_shop_versioninfo = $coo_versioninfo->get_shop_versioninfo();
        reset($t_shop_versioninfo);
        $version = filter_var(key($t_shop_versioninfo), FILTER_SANITIZE_NUMBER_INT);

        if (substr($version, 0, 2) < 25) {
            $output = '
            <table class="dataTableHeadingContent" width="100%" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>' . MODULE_PAYMENT_QCP_ORDER_DETAILS_TITLE . '</td>
                    </tr>
                </tbody>
            </table>
            <table class="gm_border dataTableRow" width="100%" cellpadding="0" cellspacing="0">
                <tbody>';

            foreach ($paymentInformation as $k => $v) {
                $output .= "<tr><td class=\"smallText\" width=\"25%\">$k</td><td class=\"smallText\" style=\"word-break:break-all;word-wrap:break-word\">$v</td></tr>";
            }
            $output .= '
                </tbody>
            </table>';

            $this->v_output_buffer['below_withdrawal'] = '';
            $this->v_output_buffer['below_history'] = $output;
            $this->v_output_buffer['order_status'] = '';
            $this->v_output_buffer['buttons'] = '';
        } else {
            $output = '
            <table class="dataTableRow" width="100%" cellpadding="0" cellspacing="0">
                <tbody>';

            foreach($paymentInformation as $k=>$v) {
                $output.= "<tr><td width=\"25%\">$k</td><td style=\"word-break:break-all;word-wrap:break-word\">$v</td></tr>";
            }
            $output .= '
                </tbody>
            </table>';

            $this->v_output_buffer['below_history'] = $output;
            $this->v_output_buffer['below_history_heading'] = MODULE_PAYMENT_QCP_ORDER_DETAILS_TITLE;
            $this->addContent();
        }
    }
}