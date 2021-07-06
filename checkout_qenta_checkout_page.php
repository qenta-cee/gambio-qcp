<?php
/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
*/

require_once('includes/application_top.php');

$GLOBALS['breadcrumb']->add(NAVBAR_TITLE_1_CHECKOUT_SUCCESS);
$GLOBALS['breadcrumb']->add(NAVBAR_TITLE_2_CHECKOUT_SUCCESS);

// if the customer is not logged on, redirect them to the shopping cart page
if(isset($_SESSION['customer_id']) === false)
{
    xtc_redirect(xtc_href_link(FILENAME_SHOPPING_CART));
}

$smarty = new Smarty;
$smarty->assign('language', $_SESSION['language']);

$coo_lang_file_master = MainFactory::create_object('LanguageTextManager', array(), true);
$coo_lang_file_master->init_from_lang_file('lang/'.strtolower($_SESSION['language']).'/modules/payment/qcp.php');

$smarty->assign('QCP_SHOPPING_CART_TITLE', QCP_SHOPPING_CART_TITLE);
$smarty->assign('QCP_YOUR_DATA_TITLE', QCP_YOUR_DATA_TITLE);
$smarty->assign('QCP_PAYMENT_TITLE', QCP_PAYMENT_TITLE);
$smarty->assign('QCP_CONFIRMATION_TITLE', QCP_CONFIRMATION_TITLE);
if(isset($_GET['cancel']))
{
    $smarty->assign('CHECKOUT_TITLE', CHECKOUT_CANCEL_TITLE);
    $smarty->assign('CHECKOUT_HEADER', CHECKOUT_CANCEL_HEADER);
    $smarty->assign('CHECKOUT_CONTENT', CHECKOUT_CANCEL_CONTENT);
    $smarty->assign('SHOW_STEPS', false);
}
elseif(isset($_GET['failure']))
{
    $smarty->assign('CHECKOUT_TITLE', CHECKOUT_FAILURE_TITLE);
    $smarty->assign('CHECKOUT_HEADER', CHECKOUT_FAILURE_HEADER);
    $smarty->assign('CHECKOUT_CONTENT', CHECKOUT_FAILURE_CONTENT);
    $smarty->assign('SHOW_STEPS', false);
}
elseif (isset($_GET['pending'])) {
    $smarty->assign('CHECKOUT_TITLE', CHECKOUT_PENDING_TITLE);
    $smarty->assign('CHECKOUT_HEADER', CHECKOUT_PENDING_HEADER);
    $smarty->assign('CHECKOUT_CONTENT', CHECKOUT_PENDING_CONTENT);
    $smarty->assign('SHOW_STEPS', false);
}
elseif($_SESSION['qenta_checkout_page']['useIFrame'] == 'True')
{
    $iFrame = '<iframe name="' . MODULE_PAYMENT_QCP_WINDOW_NAME . '" src="cout_qenta_checkout_page_iframe.php?'.SID.'" width="100%" height="850" border="0" frameborder="0"></iframe>';
    $smarty->assign('FORM_ACTION', $iFrame);
    $smarty->assign('CHECKOUT_TITLE', $_SESSION['qenta_checkout_page']['translation']['title']);
    $smarty->assign('CHECKOUT_HEADER', $_SESSION['qenta_checkout_page']['translation']['header']);
    $smarty->assign('CHECKOUT_CONTENT', $_SESSION['qenta_checkout_page']['translation']['content']);
    $smarty->assign('IFRAME', true);
    $smarty->assign('SHOW_STEPS', true);
}
else
{
    $smarty->assign('FORM_ACTION', $_SESSION['qenta_checkout_page']['process_form']);
    $smarty->assign('FORM_END', '</form>'.$_SESSION['qenta_checkout_page']['process_js']);
    $smarty->assign('CHECKOUT_TITLE', $_SESSION['qenta_checkout_page']['translation']['title']);
    $smarty->assign('CHECKOUT_HEADER', $_SESSION['qenta_checkout_page']['translation']['header']);
    $smarty->assign('CHECKOUT_CONTENT', $_SESSION['qenta_checkout_page']['translation']['content']);
    $smarty->assign('SHOW_STEPS', true);
    $smarty->assign('IFRAME', false);
    $smarty->assign('GM_CART_ON_TOP', false);
}
$smarty->assign('BUTTON_CONTINUE', IMAGE_BUTTON_CONTINUE);
$smarty->assign('BUTTON_CANCEL', $_SESSION['qenta_checkout_page']['translation']['button_cancel']);
$smarty->assign('LIGHTBOX', gm_get_conf('GM_LIGHTBOX_CHECKOUT'));
$smarty->assign('tpl_path', 'templates/'.CURRENT_TEMPLATE.'/');
$smarty->caching = 0;
$t_main_content = $smarty->fetch(CURRENT_TEMPLATE.'/module/checkout_qenta_checkout_page.html');

$coo_layout_control = MainFactory::create_object('LayoutContentControl');
$coo_layout_control->set_data('GET', $_GET);
$coo_layout_control->set_data('POST', $_POST);
$coo_layout_control->set_('coo_breadcrumb', $GLOBALS['breadcrumb']);
$coo_layout_control->set_('coo_product', $GLOBALS['product']);
$coo_layout_control->set_('coo_xtc_price', $GLOBALS['xtPrice']);
$coo_layout_control->set_('c_path', $GLOBALS['cPath']);
$coo_layout_control->set_('main_content', $t_main_content);
$coo_layout_control->set_('request_type', $GLOBALS['request_type']);
$coo_layout_control->proceed();

$t_redirect_url = $coo_layout_control->get_redirect_url();
if(empty($t_redirect_url) === false)
{
    xtc_redirect($t_redirect_url);
}
else
{
    echo $coo_layout_control->get_response();
}
