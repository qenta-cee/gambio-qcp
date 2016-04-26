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

Released under the GNU General Public License (Version 2)
[http://www.gnu.org/licenses/gpl-2.0.html]

 */

class Wcp_OrderExtender extends Wcp_OrderExtender_parent {

    function proceed() {
        $paymentInformation = array();

        include_once('../includes/modules/payment/wcp.php');

        if(is_array($this->v_output_buffer) == false)
        {
            $this->v_output_buffer = array();
        }

        $q = xtc_db_query('SELECT response FROM ' . TABLE_PAYMENT_WCP . ' WHERE orders_id = "'.xtc_db_input((int)$_GET['oID']).'" ORDER BY id DESC LIMIT 1;');
        if(xtc_db_num_rows($q)) {
            $dbEntry = xtc_db_fetch_array($q);
            $paymentInformation = unserialize($dbEntry['response']);
        }

        if(!is_array($paymentInformation)) return false;
        if(count($paymentInformation) <=0) return false;

        $coo_lang_file_master = MainFactory::create_object('LanguageTextManager', array(), true);
        $coo_lang_file_master->init_from_lang_file('lang/'.strtolower($_SESSION['language']).'/modules/payment/wcp.php');

        $coo_versioninfo = MainFactory::create_object('VersionInfo');
        $t_shop_versioninfo = $coo_versioninfo->get_shop_versioninfo();
        reset($t_shop_versioninfo);
        $version = filter_var(key($t_shop_versioninfo), FILTER_SANITIZE_NUMBER_INT);

        if (substr($version, 0, 2) < 25) {
            $output = '
            <table class="dataTableHeadingContent" width="100%" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>' . MODULE_PAYMENT_WCP_ORDER_DETAILS_TITLE . '</td>
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
            $this->v_output_buffer['below_history_heading'] = MODULE_PAYMENT_WCP_ORDER_DETAILS_TITLE;
            $this->addContent();
            parent::proceed();
        }
    }
}