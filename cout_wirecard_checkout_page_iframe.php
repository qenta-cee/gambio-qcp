<?php
/* --------------------------------------------------------------
  cout_wirecard_checkout_page_iframe.php 2014-07-17 gm
  Gambio GmbH
  http://www.gambio.de
  Copyright (c) 2014 Gambio GmbH
  Released under the GNU General Public License (Version 2)
  [http://www.gnu.org/licenses/gpl-2.0.html]
  --------------------------------------------------------------
 */
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

require_once('includes/application_top.php');

$smarty = new Smarty;
$smarty->assign('language', $_SESSION['language']);

$smarty->assign('FORM_ACTION', $_SESSION['wirecard_checkout_page']['process_form']);
$smarty->assign('BUTTON_CONTINUE', $_SESSION['wirecard_checkout_page']['translation']['button_continue']);
$smarty->assign('BUTTON_CANCEL', $_SESSION['wirecard_checkout_page']['translation']['button_cancel']);
$smarty->assign('FORM_END', '</form>'.$_SESSION['wirecard_checkout_page']['process_js']);
$smarty->assign('CHECKOUT_TITLE', $_SESSION['wirecard_checkout_page']['translation']['title']);
$smarty->assign('CHECKOUT_HEADER', $_SESSION['wirecard_checkout_page']['translation']['header']);
$smarty->assign('CHECKOUT_CONTENT', $_SESSION['wirecard_checkout_page']['translation']['content']);
$smarty->assign('tpl_path', CURRENT_TEMPLATE);
$smarty->caching = 0;
$t_main_content = $smarty->fetch(CURRENT_TEMPLATE.'/module/checkout_wirecard_checkout_page_iframe.html');


$coo_header_control = MainFactory::create_object('HeaderContentControl');
$coo_header_control->set_data('GET', $_GET);
$coo_header_control->set_data('POST', $_POST);
$coo_header_control->set_('coo_product', $GLOBALS['product']);
$coo_header_control->set_('c_path', $GLOBALS['cPath']);

$coo_header_control->proceed();

$t_redirect_url = $coo_header_control->get_redirect_url();
if(empty($t_redirect_url) == false)
{
    $this->set_redirect_url($t_redirect_url);
    return true;
}
else
{
    $t_head_content = $coo_header_control->get_response();
}

$coo_bottom_control = MainFactory::create_object('BottomContentControl');
$coo_bottom_control->set_data('GET', $_GET);
$coo_bottom_control->set_data('POST', $_POST);
$coo_bottom_control->set_('coo_product', $GLOBALS['product']);
$coo_bottom_control->set_('c_path', $GLOBALS['cPath']);

$coo_bottom_control->proceed();

$t_redirect_url = $coo_bottom_control->get_redirect_url();
if(empty($t_redirect_url) == false)
{
    $this->set_redirect_url($t_redirect_url);
    return true;
}
else
{
    $t_bottom_content = $coo_bottom_control->get_response();
}

echo $t_head_content;
echo $t_main_content;
echo $t_bottom_content;
