<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once('includes/application_top.php');

$smarty = new Smarty;
$smarty->assign('language', $_SESSION['language']);

$smarty->assign('FORM_ACTION', $_SESSION['qenta_checkout_page']['process_form']);
$smarty->assign('BUTTON_CONTINUE', IMAGE_BUTTON_CONTINUE);
$smarty->assign('BUTTON_CANCEL', $_SESSION['qenta_checkout_page']['translation']['button_cancel']);
$smarty->assign('FORM_END', '</form>'.$_SESSION['qenta_checkout_page']['process_js']);
$smarty->assign('CHECKOUT_TITLE', $_SESSION['qenta_checkout_page']['translation']['title']);
$smarty->assign('CHECKOUT_HEADER', $_SESSION['qenta_checkout_page']['translation']['header']);
$smarty->assign('CHECKOUT_CONTENT', $_SESSION['qenta_checkout_page']['translation']['content']);
$smarty->assign('tpl_path', CURRENT_TEMPLATE);
$smarty->caching = 0;
$t_main_content = $smarty->fetch(CURRENT_TEMPLATE.'/module/checkout_qenta_checkout_page_iframe.html');


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
