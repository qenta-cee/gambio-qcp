<?php

/**
 * Shop System Plugins
 * - Terms of use can be found under
 * https://guides.qenta.com/shop_plugins:info
 * - License can be found under:
 * https://github.com/qenta-cee/gambio-qcp/blob/master/LICENSE
 */

define('TABLE_PAYMENT_QCP', 'payment_qenta_checkout_page');
define('INIT_SERVER_URL', 'https://api.qenta.com/page/init-server.php');
define('QCP_PLUGIN_VERSION', '3.0.0');
define('QCP_PLUGIN_NAME', 'GambioGX2_QCP');
define('MODULE_PAYMENT_QCP_WINDOW_NAME', 'qentaCheckoutPageIFrame');
define('COMPARE_SHOP_VERSION', 'v3.9');

defined('GM_HTTP_SERVER') or define('GM_HTTP_SERVER', HTTP_SERVER);

class qcp_core
{
    var $code, $title, $description, $enabled, $tmpOrders;
    var $process_cart_id;
    /// @note will be overwritten by child classes
    var $payment_type = 'SELECT';
    var $coo_product;
    var $coo_xtc_price;
    var $c_path = '';
    var $customerStatementLength = 23; //9 Präfix, 1x Leerzeichen, 1x "Id:", 10 OrderID

    var $customerIdDemoMode = 'D200001';
    var $customerIdTestMode = 'D200411';
    var $secretDemoMode = 'B8AKTPWBRMNBV455FG6M2DANE99WU2';
    var $secretTestMode = 'CHCSH7UGHVVX2P7EHDHSY4T2S4CGYK4QBE4M5YUUG2ND5BEZWNRZW5EJYVJQ';
    var $secretTest3DMode = 'DP4TMTPQQWFJW34647RM798E9A5X7E8ATP462Z4VGZK53YEJ3JWXS98B9P4F';
    var $shopIdTest3DMode = '3D';

    var $has_minmax_amount = false;

    /// @brief initialize qenta_checkout_page module
    function init()
    {
        include(DIR_FS_CATALOG . 'lang/' . $_SESSION['language'] . '/modules/payment/qcp.php');
        include(DIR_FS_CATALOG . 'release_info.php');

        // set secure cookie for 3 minutes, just like Paypal
        setcookie("XTCsid", $_COOKIE['XTCsid'], time() + 180, "/" . '; samesite=' . "None", $_SESSION['host'], true, false);

        $this->code         = get_class($this);
        $c                  = strtoupper($this->code);

        if (version_compare($gx_version, COMPARE_SHOP_VERSION, '>=')) {
            $this->logo_url     = DIR_WS_CATALOG . 'images/icons/payment/' . 'qcp_' . $this->logoFilename;
            $this->title        = ' ' . qcp_core::constant("MODULE_PAYMENT_{$c}_TEXT_TITLE");
        } else {
            $logoTag = ($this->logoFilename) ? '<img src="' . DIR_WS_CATALOG . 'images/icons/payment/' . 'qcp_' . $this->logoFilename . '" alt="' . $c . ' Logo"/>' : '';
            $this->title        = $logoTag . ' ' . qcp_core::constant("MODULE_PAYMENT_{$c}_TEXT_TITLE");
        }

        $this->description  = qcp_core::constant("MODULE_PAYMENT_{$c}_TEXT_DESCRIPTION");
        if (qcp_core::constant('DIR_WS_ADMIN') !== null) {
            $configExportUrl = GM_HTTP_SERVER . DIR_WS_ADMIN . 'qcp_config_export.php';
            if (strpos($_SERVER['REQUEST_URI'], 'admin/modules.php') !== false && $this->_isInstalled($c)) {
                $this->description .= '<a href="' . $configExportUrl . '?pm=' . $c . '" class="button" style="margin: auto; ">' . qcp_core::constant("MODULE_PAYMENT_QCP_EXPORT_CONFIG_LABEL") . '</a>';
            }
        }
        $this->info         = qcp_core::constant("MODULE_PAYMENT_{$c}_TEXT_INFO");

        $this->min_order    = qcp_core::constant("MODULE_PAYMENT_{$c}_MIN_ORDER");
        $this->sort_order   = qcp_core::constant("MODULE_PAYMENT_{$c}_SORT_ORDER");
        $this->enabled      = ((qcp_core::constant("MODULE_PAYMENT_{$c}_STATUS") == 'True') ? true : false);
    }

    function constant($name)
    {
        return (defined($name)) ? constant($name) : NULL;
    }

    /// @brief collect data and create a array with qenta checkout page infos
    function _isInstalled($c)
    {
        $result = xtc_db_query("SELECT count(*) FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'MODULE_PAYMENT_{$c}_STATUS'");
        $resultRow = $result->fetch_row();
        return $resultRow[0];
    }

    /// @brief nothing to do for update_status

    function update_status()
    {
        return true;
    }

    /// @brief decorate process button
    function process_button()
    {
        $config = $this->get_config_values();
        $customerId = $config[1];

        if (isset($_SESSION['qcp-consumerDeviceId'])) {
            $consumerDeviceId = $_SESSION['qcp-consumerDeviceId'];
        } else {
            $timestamp = microtime();
            $consumerDeviceId = md5($customerId . "_" . $timestamp);
            $_SESSION['qcp-consumerDeviceId'] = $consumerDeviceId;
        }

        $ratepay = "";

        return $ratepay;
    }

    /// @brief unset temp order id from session
    function before_process()
    {
        if (isset($_SESSION['tmp_oID'])) {
            $_SESSION['qenta_checkout_page']['tmp_oID'] = $_SESSION['tmp_oID'];
        }
        unset($_SESSION['tmp_oID']);
        $this->tmpOrders = true;
        return true;
    }

    /// @brief finalize payment after order is created
    function payment_action()
    {
        global $insert_id;
        $response = array();

        //add comment to temp order if payment is started again
        if ($_SESSION['qenta_checkout_page']['tmp_oID']) {
            xtc_db_query('INSERT INTO ' . TABLE_ORDERS_STATUS_HISTORY . '
                      (orders_id, date_added, customer_notified, comments)
                      VALUES
                      (' . (int)$_SESSION['qenta_checkout_page']['tmp_oID'] . ', NOW(), "0", "' . xtc_db_input(sprintf(MODULE_PAYMENT_QCP_ANOTHER_ORDER, $insert_id)) . '")');

            unset($_SESSION['qenta_checkout_page']['tmp_oID']);
        }

        include(DIR_FS_CATALOG . 'lang/' . $_SESSION['language'] . '/modules/payment/qcp.php');

        //perform init request and get redirect URL
        $content = http_build_query($this->get_order_post_variables_array());
        $header = "Host: api.qenta.com\r\n"
            . "User-Agent: " . $_SERVER["HTTP_USER_AGENT"] . "\r\n"
            . "Content-Type: application/x-www-form-urlencoded\r\n"
            . "Content-Length: " . strlen($content) . "\r\n"
            . "Connection: close\r\n";

        $options = array(
            'http' => array(
                'header'  => $header,
                'method'  => 'POST',
                'content' => $content,
            )
        );

        $context = stream_context_create($options);

        if (!$result = file_get_contents(INIT_SERVER_URL, false, $context)) {
            $response["message"] = qcp_core::constant("MODULE_PAYMENT_QCP_COMMUNICATION_ERROR");
        } else {
            parse_str($result, $response);
        }

        //redirect user
        if (isset($response["redirectUrl"])) {
            $c = strtoupper($this->code);
            $useIFrame = qcp_core::constant("MODULE_PAYMENT_{$c}_USE_IFRAME");

            if ($useIFrame == 'False') {
                header("Location: " . $response["redirectUrl"]);
            } else {
                $timeout = qcp_core::constant("MODULE_PAYMENT_{$c}_REDIRECT_TIMEOUT_SECOUNDS") * 1000;
                $disableTimeout = $timeout - 50;
                $reEnableTimeout = $timeout * 5;

                // redirect
                $process_form = '<form name="qcp_process_form" id="qcp_process_form" method="POST" action="' . ($response["redirectUrl"]) . '" >';

                $process_js = '<script type="text/javascript">
                            setTimeout("var element = document.getElementById(\"qcp_continue_button\");element.style.display = \'none\';",' . $disableTimeout . ');
                            setTimeout("document.qcp_process_form.submit();",' . $timeout . ');
                            setTimeout("var element = document.getElementById(\"qcp_continue_button\");element.style.display = \'block\';",' . $reEnableTimeout . ');
                       </script>';
                $translation = array(
                    'title'   => qcp_core::constant("MODULE_PAYMENT_{$c}_CHECKOUT_TITLE"),
                    'header'  => qcp_core::constant("MODULE_PAYMENT_{$c}_CHECKOUT_HEADER"),
                    'content' => qcp_core::constant("MODULE_PAYMENT_{$c}_CHECKOUT_CONTENT"),
                    'button_continue' => qcp_core::constant("CHECKOUT_CONTINUE_BUTTON"),
                    'button_cancel' => qcp_core::constant("CHECKOUT_CANCEL_BUTTON")
                );
                $_SESSION['qenta_checkout_page']['useIFrame'] = $useIFrame;
                $_SESSION['qenta_checkout_page']['process_form'] = $process_form;
                $_SESSION['qenta_checkout_page']['process_js'] = $process_js;
                $_SESSION['qenta_checkout_page']['translation'] = $translation;

                include('checkout_qenta_checkout_page.php');
                die();
            }
        } else {
            //finalize order
            $this->xtc_remove_order($_SESSION['tmp_oID'], true);
            unset($_SESSION['tmp_oID']);

            $_SESSION['qenta_checkout_page']['error'] = $response["message"];

            //redirect user and show error message
            xtc_redirect(xtc_href_link(FILENAME_CHECKOUT_PAYMENT, 'payment_error=' . $this->code . '&error=true', 'SSL'));
        }
    }

    /// @brief nothing to do
    function get_order_post_variables_array()
    {
        global $order, $xtPrice, $insert_id, $_POST;
        $c = strtoupper($this->code);

        require_once('qcp_mobile_detect.php');
        include(DIR_FS_CATALOG . 'release_info.php');
        $pluginVersion = base64_encode('Gambio;' . $gx_version . QCP_PLUGIN_NAME . ';' . QCP_PLUGIN_VERSION);

        // check language
        $result = xtc_db_query("SELECT code FROM languages WHERE languages_id = '" . (int)$_SESSION['languages_id'] . "'");
        list($lang_code) = $result->fetch_row();

        // set total price
        $total = $order->info['total'];

        if ($_SESSION['customers_status']['customers_status_show_price_tax'] == 0 && $_SESSION['customers_status']['customers_status_add_tax_ot'] == 1)
            $total = $total + $order->info['tax'];

        $consumerID = $_SESSION['customer_id'];
        $deliveryInformation = $order->delivery;
        $deliveryState = $this->getAddressState($deliveryInformation);

        $billingInformation  = $order->billing;
        $billingState = $this->getAddressState($billingInformation);

        $sql = 'SELECT customers_dob, customers_fax FROM ' . TABLE_CUSTOMERS . ' WHERE customers_id="' . (int)$consumerID . '" LIMIT 1;';
        $result = xtc_db_query($sql);
        $consumerInformation = $result->fetch_row();

        $customerService = StaticGXCoreLoader::getService('Customer');
        $customer = $customerService->getCustomerById(MainFactory::create('IdType', $consumerID));

        if ((isset($_POST['qcp_birthday_invoice'])) || (isset($_POST['qcp_birthday']))) {
            $customerBirthDate = (isset($_POST['qcp_birthday_invoice'])) ? $_POST['qcp_birthday_invoice'] : $_POST['qcp_birthday'];
        } else {
            $customerDateOfBirth = $customer->getDateOfBirth();
            $customerBirthDate = $customerDateOfBirth->format('Y-m-d');
        }

        $consumerBirthDate = (($customerBirthDate ==  '0000-00-00' || $customerBirthDate == '1000-01-01') ? '' : $customerBirthDate);

        $config = $this->get_config_values();
        $preshared_key = $config[0];
        $customerId = $config[1];
        $shopId = $config[2];

        $orderDescription = $billingInformation['firstname'] . ' ' . $billingInformation['lastname'] . ' - ' . $order->customer['email_address'];

        $customerStatement = $this->generate_customer_statement($c, $insert_id);
        $post_variables = array(
            'customerId'            => $customerId,
            'order_id'              => $insert_id,
            'amount'                => round($total, $xtPrice->get_decimal_places($_SESSION['currency'])),
            'currency'              => $_SESSION['currency'],
            'paymentType'           => $this->payment_type,
            'paymentCode'           => $this->code,
            'language'              => $lang_code,
            'confirmLanguage'       => $_SESSION['language'],
            'confirmLanguageId'     => $_SESSION['languages_id'],
            'orderDescription'      => $orderDescription,
            'customerStatement'     => trim($customerStatement),
            'orderReference'        => str_pad($insert_id, '10', '0', STR_PAD_LEFT),
            'displayText'           => qcp_core::constant("MODULE_PAYMENT_{$c}_DISPLAY_TEXT"),

            'successURL'            => xtc_href_link('callback/qenta/checkout_page_callback.php', '', 'SSL'),
            'cancelURL'             => xtc_href_link('callback/qenta/checkout_page_callback.php', 'cancel=1', 'SSL'),
            'pendingURL'            => xtc_href_link('callback/qenta/checkout_page_callback.php', 'pending=1', 'SSL'),
            'failureURL'            => xtc_href_link('callback/qenta/checkout_page_callback.php', 'failure=1', 'SSL'),
            'serviceURL'            => qcp_core::constant("MODULE_PAYMENT_{$c}_SERVICE_URL"),
            'confirmURL'            => xtc_href_link('callback/qenta/checkout_page_confirm.php', '', 'SSL', false),
            'windowName'            => MODULE_PAYMENT_QCP_WINDOW_NAME,
            'pluginVersion'         => $pluginVersion,
            'duplicateRequestCheck'        => 'Yes',
            'consumerIpAddress'            => $_SERVER['REMOTE_ADDR'],
            'consumerUserAgent'            => $_SERVER['HTTP_USER_AGENT'],
            'consumerMerchantCrmId' => md5($order->customer['email_address'])
        );

        if (isset($_SESSION['qcp-consumerDeviceId'])) {
            $post_variables['consumerDeviceId'] = $_SESSION['qcp-consumerDeviceId'];
            unset($_SESSION['qcp-consumerDeviceId']);
        }

        if (
            qcp_core::constant("MODULE_PAYMENT_{$c}_SEND_SHIPPING_DATA") === 'True' ||
            $this->payment_type == 'INVOICE' || $this->payment_type == 'INSTALLMENT'
        ) {
            if (!empty($deliveryInformation['firstname']))   $post_variables['consumerShippingFirstName'] = $deliveryInformation['firstname'];
            if (!empty($deliveryInformation['lastname']))    $post_variables['consumerShippingLastName'] = $deliveryInformation['lastname'];
            if (!empty($deliveryInformation['street_address'])) $post_variables['consumerShippingAddress1'] = $deliveryInformation['street_address'];
            if (!empty($deliveryInformation['suburb']))      $post_variables['consumerShippingAddress2'] = $deliveryInformation['suburb'];
            if (!empty($deliveryInformation['city']))        $post_variables['consumerShippingCity'] = $deliveryInformation['city'];
            if (!empty($deliveryInformation['postcode']))    $post_variables['consumerShippingZipCode'] = $deliveryInformation['postcode'];
            if (!empty($deliveryState))                      $post_variables['consumerShippingState'] = $deliveryState;
            if (!empty($deliveryInformation['country']['iso_code_2'])) $post_variables['consumerShippingCountry'] = $deliveryInformation['country']['iso_code_2'];
            if (!empty($order->customer['telephone']))       $post_variables['consumerShippingPhone'] = $order->customer['telephone'];
            if ($consumerInformation['customers_fax'] != '' && $consumerInformation['customers_fax'] != null) {
                $post_variables['consumerShippingFax'] = $consumerInformation['customers_fax'];
            }
        }
        if (
            qcp_core::constant("MODULE_PAYMENT_{$c}_SEND_BILLING_DATA") === 'True' ||
            $this->payment_type == 'INVOICE' || $this->payment_type == 'INSTALLMENT'
        ) {
            if (!empty($billingInformation['firstname']))    $post_variables['consumerBillingFirstName'] = $billingInformation['firstname'];
            if (!empty($billingInformation['lastname']))     $post_variables['consumerBillingLastName'] = $billingInformation['lastname'];
            if (!empty($billingInformation['street_address'])) $post_variables['consumerBillingAddress1'] = $billingInformation['street_address'];
            if (!empty($billingInformation['suburb']))       $post_variables['consumerBillingAddress2'] = $billingInformation['suburb'];
            if (!empty($billingInformation['city']))         $post_variables['consumerBillingCity'] = $billingInformation['city'];
            if (!empty($billingInformation['postcode']))     $post_variables['consumerBillingZipCode'] = $billingInformation['postcode'];
            if (!empty($billingState))                       $post_variables['consumerBillingState'] = $billingState;
            if (!empty($billingInformation['country']['iso_code_2'])) $post_variables['consumerBillingCountry'] = $billingInformation['country']['iso_code_2'];
            if (!empty($order->customer['telephone']))       $post_variables['consumerBillingPhone'] = $order->customer['telephone'];
            if ($consumerInformation['customers_fax'] != '' && $consumerInformation['customers_fax'] != null) {
                $post_variables['consumerBillingFax'] = $consumerInformation['customers_fax'];
            }
        }

        if (!empty($order->customer['email_address']))   $post_variables['consumerEmail'] = $order->customer['email_address'];
        if (isset($_POST['qcp_financial_institution']) && $this->payment_type == 'EPS')  $post_variables['financialInstitution'] = $_POST['qcp_financial_institution'];
        if (isset($_POST['qcp_idl_financial_institution']) && $this->payment_type == 'IDL')  $post_variables['financialInstitution'] = $_POST['qcp_idl_financial_institution'];


        if (!empty($consumerBirthDate)) {
            $post_variables['consumerBirthDate'] = $consumerBirthDate;
        }

        if (
            $this->constant("MODULE_PAYMENT_{$c}_SEND_BASKET") === 'True' ||
            ($this->payment_type == 'INVOICE' && "MODULE_PAYMENT_QCP_INVOICE_PROVIDER" != 'payolution') ||
            ($this->payment_type == 'INSTALLMENT' && "MODULE_PAYMENT_QCP_INVSTALLMENT_PROVIDER" != 'payolution')
        ) {
            $post_variables = array_merge($post_variables, $this->create_shopping_basket());
        }

        if ($this->payment_type == 'MASTERPASS') {
            $post_variables['shippingProfile'] = 'NO_SHIPPING';
        }

        // set shop id if isset
        if (constant("MODULE_PAYMENT_{$c}_SHOP_ID")) {
            $post_variables['shopId'] = qcp_core::constant("MODULE_PAYMENT_{$c}_SHOP_ID");
        } else if ($shopId != "") {
            $post_variables['shopId'] = $shopId;
        }

        // set layout if isset
        if (qcp_core::constant("MODULE_PAYMENT_{$c}_DEVICE_DETECTION") === 'True')
            $post_variables['layout'] = $this->_getClientDevice();

        // set shop logo if desired
        if (constant("MODULE_PAYMENT_{$c}_LOGO")) {
            qcp_core::constant("MODULE_PAYMENT_{$c}_LOGO");
            $post_variables['imageURL'] = qcp_core::constant("MODULE_PAYMENT_{$c}_LOGO");
        } else {
            require_once(DIR_FS_CATALOG . 'gm/classes/GMLogoManager.php');
            $gm_logo = new GMLogoManager("gm_logo_shop");
            $post_variables['imageURL'] = $gm_logo->logo_path . $gm_logo->logo_file;
        }
        // create fingerprint
        $requestFingerprintOrder = 'secret,';
        $tempArray = array('secret' => $preshared_key);
        foreach ($post_variables as $key => $value) {
            $requestFingerprintOrder .= $key . ',';
            $tempArray[(string)$key] = (string) $value;
        }
        $requestFingerprintOrder .= 'requestFingerprintOrder';
        $tempArray['requestFingerprintOrder'] = $requestFingerprintOrder;

        $hash = hash_init('sha512', HASH_HMAC, $preshared_key);
        foreach ($tempArray as $paramName => $paramValue) {
            hash_update($hash, $paramValue);
        }

        $requestfingerprint = hash_final($hash);

        $post_variables['requestFingerprintOrder'] = $requestFingerprintOrder;
        $post_variables['requestFingerprint']      = $requestfingerprint;

        return $post_variables;
    }

    function get_config_values()
    {
        $c = strtoupper($this->code);
        $shopId = "";

        switch (qcp_core::constant("MODULE_PAYMENT_{$c}_PLUGIN_MODE")) {
            case 'Demo':
                $preshared_key = $this->secretDemoMode;
                $customerId = $this->customerIdDemoMode;
                break;
            case 'Test':
                $preshared_key = $this->secretTestMode;
                $customerId = $this->customerIdTestMode;
                break;
            case 'Test3D':
                $preshared_key = $this->secretTest3DMode;
                $customerId = $this->customerIdTestMode;
                $shopId = $this->shopIdTest3DMode;
                break;
            case 'Live':
            default:
                $preshared_key = trim(qcp_core::constant("MODULE_PAYMENT_{$c}_PRESHARED_KEY"));
                $customerId = trim(qcp_core::constant("MODULE_PAYMENT_{$c}_CUSTOMER_ID"));
                break;
        }
        return array($preshared_key, $customerId, $shopId);
    }
    /**
     * Create shopping basket items including shipping
     *
     * @return array
     */
    function create_shopping_basket()
    {
        global $xtPrice, $order;
        $basket_prefix = 'basketItem';
        $basket = array();
        $count = 0;
        $tax = 0;
        foreach ($order->products as $product) {
            $count++;
            $tax_amount = $xtPrice->xtcGetTax($product['price'], $product['tax']);
            $tax += $tax_amount;
            $basket[$basket_prefix . $count . 'articleNumber'] = $product['id'];
            $basket[$basket_prefix . $count . 'unitGrossAmount'] = round($product['price'], $xtPrice->get_decimal_places($_SESSION['currency']));
            $basket[$basket_prefix . $count . 'unitNetAmount'] = round($product['price'] - $tax_amount, $xtPrice->get_decimal_places($_SESSION['currency']));
            $basket[$basket_prefix . $count . 'unitTaxAmount'] = round($tax_amount, $xtPrice->get_decimal_places($_SESSION['currency']));
            $basket[$basket_prefix . $count . 'unitTaxRate'] = $product['tax'];
            $basket[$basket_prefix . $count . 'description'] = $product['name'];
            $basket[$basket_prefix . $count . 'name'] = $product['name'];
            $basket[$basket_prefix . $count . 'quantity'] = $product['qty'];
        }

        if (isset($order->info['shipping_method'])) {
            $count++;
            $basket[$basket_prefix . $count . 'articleNumber'] = 'shipping';
            $basket[$basket_prefix . $count . 'unitGrossAmount'] =  round($order->info['shipping_cost'], $xtPrice->get_decimal_places($_SESSION['currency']));
            $basket[$basket_prefix . $count . 'unitNetAmount'] =  round($order->info['shipping_cost'], $xtPrice->get_decimal_places($_SESSION['currency']));
            $basket[$basket_prefix . $count . 'unitTaxRate'] = 0;
            $basket[$basket_prefix . $count . 'unitTaxAmount'] = 0;
            $basket[$basket_prefix . $count . 'name'] = $order->info['shipping_method'];
            $basket[$basket_prefix . $count . 'description'] = $order->info['shipping_method'];
            $basket[$basket_prefix . $count . 'quantity'] = 1;
        }
        $basket['basketItems'] = $count;

        return $basket;
    }

    /// @brief generate customer statement
    function generate_customer_statement($index, $order_reference)
    {
        $customerStatement = substr(trim(qcp_core::constant("MODULE_PAYMENT_{$index}_STATEMENT")), 0, 9)
            . ' Id:'
            . str_pad($order_reference, '10', '0', STR_PAD_LEFT);
        return substr($customerStatement, 0, $this->customerStatementLength);
    }

    /// @brief set info for order-payment-module selection
    function getAddressState($address)
    {
        if (!isset($address['state'])) return null;

        if (
            isset($address['country_iso_2'])
            && ($address['country_iso_2'] == 'US' || $address['country_iso_2'] == 'CA')
        ) {
            return $this->_getZoneCodeByName($address['state']);
        } else {
            return $address['state'];
        }
    }

    function _getZoneCodeByName($zoneName)
    {
        $sql = 'SELECT zone_code FROM ' . TABLE_ZONES . ' WHERE zone_name=\'' . xtc_db_input($zoneName) . '\' LIMIT 1;';
        $result = xtc_db_query($sql);
        $resultRow = $result->fetch_row();
        return $resultRow[0];
    }

    function _getClientDevice()
    {
        // require_once('qcp_mobile_detect.php');
        // $detect = new WirecardCEE_MobileDetect;
        // return ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'smartphone') : 'desktop');
        return 'desktop';
    }

    function after_process()
    {
        return true;
    }

    function selection()
    {
        include(DIR_FS_CATALOG . 'release_info.php');
        if (!$this->_preCheck()) {
            return false;
        }
        if (version_compare($gx_version, COMPARE_SHOP_VERSION, '>=')) {
            return array('id' => $this->code, 'module' => $this->title, 'description' => $this->info, 'logo_url' => $this->logo_url);
        } else {
            return array('id' => $this->code, 'module' => $this->title, 'description' => $this->info);
        }
    }

    /**
     * @return bool
     */
    function _preCheck()
    {
        return true;
    }

    /// @brief check module status
    function javascript_validation()
    {
        return false;
    }

    /// @brief install module
    function pre_confirmation_check()
    {
        return false;
    }

    function confirmation()
    {
        return false;
    }

    function get_error()
    {
        $return = false;
        if (isset($_SESSION['qenta_checkout_page']['error'])) {
            $return =  array(
                'title' => 'error',
                'error' => $_SESSION['qenta_checkout_page']['error']
            );
        }

        unset($_SESSION['qenta_checkout_page']['error']);

        return $return;
    }

    function check()
    {
        if (!isset($this->_check)) {
            $c = strtoupper($this->code);
            $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key='MODULE_PAYMENT_{$c}_STATUS'");
            $this->_check = xtc_db_num_rows($check_query);
        }
        return $this->_check;
    }

    function install()
    {
        $cg_id = 6; // represents module configuration by default
        $q = "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added)
              VALUES ";
        $s = 1; // represents sort-order at displayed configuration
        $serviceUrl = xtc_href_link('shop_content.php', 'coID=7', 'SSL');
        $selection = "'gm_cfg_select_option(array(\'True\', \'False\'), '";
        $useIframeDefault = ($this->use_iframe_default) ? 'True' : 'False';
        $pluginModes = "'gm_cfg_select_option(array(\'Live\', \'Demo\', \'Test\', \'Test3D\'), '";

        require(DIR_FS_CATALOG . 'gm/classes/GMLogoManager.php');
        $gm_logo = new GMLogoManager("gm_logo_shop");
        $imageURL = $gm_logo->logo_path . $gm_logo->logo_file;

        $c = strtoupper($this->code);


        $q .= "
            ('MODULE_PAYMENT_{$c}_STATUS',                  'True',       '$cg_id', '" . $s++ . "', $selection, now()),
            ('MODULE_PAYMENT_{$c}_PLUGIN_MODE',             'Demo',       '$cg_id', '" . $s++ . "', $pluginModes,now()),
            ('MODULE_PAYMENT_{$c}_PRESHARED_KEY',           '',           '$cg_id', '" . $s++ . "', '',         now()),
            ('MODULE_PAYMENT_{$c}_CUSTOMER_ID',             '',           '$cg_id', '" . $s++ . "', '',         now()),
            ('MODULE_PAYMENT_{$c}_LOGO',                    '" . $imageURL . "','$cg_id', '" . $s++ . "', '' ,  now()),
            ('MODULE_PAYMENT_{$c}_SHOP_ID',                 '',           '$cg_id', '" . $s++ . "', '',         now()),
            ('MODULE_PAYMENT_{$c}_SERVICE_URL',             '" . $serviceUrl . "','$cg_id', '" . $s++ . "', '', now()),
            ('MODULE_PAYMENT_{$c}_STATEMENT',               '',           '$cg_id', '" . $s++ . "', '',         now()),
            ('MODULE_PAYMENT_{$c}_DISPLAY_TEXT',            '',           '$cg_id', '" . $s++ . "', '',         now()),";

        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " ( configuration_key, configuration_value, configuration_group_id, sort_order, set_function, use_function, date_added) values ('MODULE_PAYMENT_{$c}_ORDER_STATUS_ID', '2',  '$cg_id', '" . $s++ . "', 'xtc_cfg_pull_down_order_statuses(', 'xtc_get_order_status_name', now())");

        $q .= "
            ('MODULE_PAYMENT_{$c}_SORT_ORDER',              '0',          '$cg_id', '" . $s++ . "', '',         now()),
            ('MODULE_PAYMENT_{$c}_ALLOWED',                 '',           '$cg_id', '" . $s++ . "', '',         now()),
            ('MODULE_PAYMENT_{$c}_USE_IFRAME',              '" . $useIframeDefault . "',      '$cg_id', '" . $s++ . "', $selection, now()),
            ('MODULE_PAYMENT_QCP_DELETE_FAILURE',           'True',       '$cg_id', '" . $s++ . "', $selection, now()),
            ('MODULE_PAYMENT_QCP_DELETE_CANCEL',            'True',       '$cg_id', '" . $s++ . "', $selection, now()),
            ('MODULE_PAYMENT_{$c}_DEVICE_DETECTION',        'False',      '$cg_id', '" . $s++ . "', $selection, now()),
            ('MODULE_PAYMENT_{$c}_SEND_SHIPPING_DATA',      'False',      '$cg_id', '" . $s++ . "', $selection, now()),
            ('MODULE_PAYMENT_{$c}_SEND_BILLING_DATA',       'False',      '$cg_id', '" . $s++ . "', $selection, now()),
            ('MODULE_PAYMENT_{$c}_SEND_BASKET',             'False',      '$cg_id', '" . $s++ . "', $selection, now())";

        if ($this->has_minmax_amount) {
            $q .= ",('MODULE_PAYMENT_{$c}_SHIPPING',        'False',      '$cg_id', '" . $s++ . "', $selection, now())";
            $q .= ",('MODULE_PAYMENT_{$c}_CURRENCIES',      '',           '$cg_id', '" . $s++ . "', '',         now())";
            $q .= ",('MODULE_PAYMENT_{$c}_MIN_AMOUNT',      '10',         '$cg_id', '" . $s++ . "', '',         now())";
            $q .= ",('MODULE_PAYMENT_{$c}_MAX_AMOUNT',      '3500',       '$cg_id', '" . $s++ . "', '',         now())";
            $q .= ",('MODULE_PAYMENT_{$c}_TERMS',           'True',       '$cg_id', '" . $s++ . "', $selection, now())";
            $q .= ",('MODULE_PAYMENT_{$c}_MID',             '',           '$cg_id', '" . $s++ . "', '',         now())";
        }

        if ($this->has_provider) {
            $q .= ",('MODULE_PAYMENT_{$c}_PROVIDER',        'payolution', '$cg_id', '" . $s++ . "', $this->has_provider, now())";
        }
        xtc_db_query($q);

        /// @TODO use for logging
        // create table for saving transaction data and logging
        $q = "CREATE TABLE IF NOT EXISTS " . TABLE_PAYMENT_QCP . "
          (id INT(11) NOT NULL AUTO_INCREMENT,
           orders_id INT(11) NOT NULL,
           response TEXT NOT NULL,
           created_at TIMESTAMP NOT NULL DEFAULT now(),
           PRIMARY KEY (id))";
        xtc_db_query($q);

        //add admin page qcp_config_export.php if not exists
        $q = "SELECT count(*) as 'exists'
                FROM information_schema.COLUMNS
                WHERE TABLE_SCHEMA = '" . DB_DATABASE . "'
                AND TABLE_NAME = 'admin_access'
                AND COLUMN_NAME = 'qcp_config_export'";
        $res = xtc_db_query($q);
        $colExists = xtc_db_fetch_array($res);

        if (!$colExists['exists']) {
            $q = "ALTER TABLE admin_access ADD qcp_config_export INT( 1 ) NOT NULL DEFAULT '0';";
            xtc_db_query($q);

            $q = "update admin_access set qcp_config_export = 1 WHERE customers_id = 1";
            xtc_db_query($q);
        }
    }

    /// @brief detects customer's device type (tablet, smartphone, desktop)

    function remove()
    {
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key IN ('" . implode("', '", $this->keys()) . "')");
    }

    /**
     * @brief define module configuration keys
     * MODULE_PAYMENT_MODULENAME_STATUS ... list of possible orde statuses
     * MODULE_PAYMENT_MODULENAME_STATUS ... activated true/false
     * MODULE_PAYMENT_MODULENAME_PRESHARED_KEY ... secret key
     * MODULE_PAYMENT_MODULENAME_CUSTOMER_ID ... QENTA CEE customer id
     * MODULE_PAYMENT_MODULENAME_STORE_LOGO_INCLUDE ... use shop logo
     * MODULE_PAYMENT_MODULENAME_SHOP_ID ... QENTA CEE shop id
     * MODULE_PAYMENT_MODULENAME_SERVICE_URL ... shop support-page url
     * MODULE_PAYMENT_MODULENAME_STATEMENT ... shop info statment
     * MODULE_PAYMENT_MODULENAME_DISPLAY_TEXT ... shop info text
     * MODULE_PAYMENT_MODULENAME_DELETE_FAILURE ... delete failed orders true/false
     * MODULE_PAYMENT_MODULENAME_DELETE_CANCEL ... delete failed orders true/false
     *
     * following are Gambio-Defaults:
     * MODULE_PAYMENT_MODULENAME_SORT_ORDER ... sort order at payment types selection
     * MODULE_PAYMENT_MODULENAME_ALLOWED ... allowed for which zones
     **/
    function keys()
    {
        $c = strtoupper($this->code);
        $keys =  array(
            "MODULE_PAYMENT_{$c}_ORDER_STATUS_ID",
            "MODULE_PAYMENT_{$c}_STATUS",
            "MODULE_PAYMENT_{$c}_PLUGIN_MODE",
            "MODULE_PAYMENT_{$c}_PRESHARED_KEY",
            "MODULE_PAYMENT_{$c}_CUSTOMER_ID",
            "MODULE_PAYMENT_{$c}_LOGO",
            "MODULE_PAYMENT_{$c}_SHOP_ID",
            "MODULE_PAYMENT_{$c}_SERVICE_URL",
            "MODULE_PAYMENT_{$c}_STATEMENT",
            "MODULE_PAYMENT_{$c}_DISPLAY_TEXT",
            "MODULE_PAYMENT_{$c}_SORT_ORDER",
            "MODULE_PAYMENT_{$c}_ALLOWED",
            'MODULE_PAYMENT_QCP_DELETE_FAILURE',
            'MODULE_PAYMENT_QCP_DELETE_CANCEL',
            "MODULE_PAYMENT_{$c}_USE_IFRAME",
            "MODULE_PAYMENT_{$c}_DEVICE_DETECTION",
            "MODULE_PAYMENT_{$c}_SEND_SHIPPING_DATA",
            "MODULE_PAYMENT_{$c}_SEND_BILLING_DATA",
            "MODULE_PAYMENT_{$c}_SEND_BASKET"
        );

        if ($this->has_minmax_amount) {
            $keys[] = "MODULE_PAYMENT_{$c}_SHIPPING";
            $keys[] = "MODULE_PAYMENT_{$c}_CURRENCIES";
            $keys[] = "MODULE_PAYMENT_{$c}_MIN_AMOUNT";
            $keys[] = "MODULE_PAYMENT_{$c}_MAX_AMOUNT";
            $keys[] = "MODULE_PAYMENT_{$c}_TERMS";
            $keys[] = "MODULE_PAYMENT_{$c}_MID";
        }
        if ($this->has_provider) {
            $keys[] = "MODULE_PAYMENT_{$c}_PROVIDER";
        }

        return $keys;
    }

    // from admin/includes/functions/general.php
    function xtc_remove_order($order_id, $restock = false, $canceled = false, $reshipp = false, $reactivateArticle = false)
    {
        require_once('includes/application_top.php');

        if ($restock == 'on' || $reshipp == 'on') {
            // BOF GM_MOD:
            $order_query = xtc_db_query("
									SELECT DISTINCT
										op.orders_products_id,
										op.products_id,
										op.products_quantity,
										opp.products_properties_combis_id,
										o.date_purchased
									FROM " . TABLE_ORDERS_PRODUCTS . " op
										LEFT JOIN " . TABLE_ORDERS . " o ON op.orders_id = o.orders_id
										LEFT JOIN orders_products_properties opp ON opp.orders_products_id = op.orders_products_id
									WHERE
										op.orders_id = '" . xtc_db_input($order_id) . "'
		");

            while ($order = xtc_db_fetch_array($order_query)) {
                if ($restock == 'on') {
                    /* BOF SPECIALS RESTOCK */
                    $t_query = xtc_db_query("
										SELECT
											specials_date_added
										AS
											date
										FROM " .
                        TABLE_SPECIALS . "
										WHERE
											specials_date_added < '" . $order['date_purchased'] . "'
										AND
											products_id			= '" . $order['products_id'] . "'
				");

                    if ((int)xtc_db_num_rows($t_query) > 0) {
                        xtc_db_query("
									UPDATE " .
                            TABLE_SPECIALS . "
									SET
										specials_quantity = specials_quantity + " . $order['products_quantity'] . "
									WHERE
										products_id = '" . $order['products_id'] . "'
					");
                    }
                    /* EOF SPECIALS RESTOCK */

                    // check if combis exists
                    $t_combis_query = xtc_db_query("
								SELECT
                                    products_properties_combis_id
                                FROM
									products_properties_combis
								WHERE
									products_id = '" . $order['products_id'] . "'
				");
                    $t_combis_array_length = xtc_db_num_rows($t_combis_query);

                    if ($t_combis_array_length > 0) {
                        $coo_combis_admin_control = MainFactory::create_object("PropertiesCombisAdminControl");
                        $t_use_combis_quantity = $coo_combis_admin_control->get_use_properties_combis_quantity($order['products_id']);
                    } else {
                        $t_use_combis_quantity = 0;
                    }

                    if ($t_combis_array_length == 0 || $t_use_combis_quantity == 1 || ($t_use_combis_quantity == 0 && STOCK_CHECK == 'true' && ATTRIBUTE_STOCK_CHECK != 'true')) {
                        xtc_db_query("
                                    UPDATE " .
                            TABLE_PRODUCTS . "
                                    SET
                                        products_quantity = products_quantity + " . $order['products_quantity'] . "
                                    WHERE
                                        products_id = '" . $order['products_id'] . "'
                    ");
                    }

                    xtc_db_query("
                                UPDATE " .
                        TABLE_PRODUCTS . "
                                SET
                                    products_ordered = products_ordered - " . $order['products_quantity'] . "
                                WHERE
                                    products_id = '" . $order['products_id'] . "'
                ");

                    if ($t_combis_array_length > 0 && (($t_use_combis_quantity == 0 && STOCK_CHECK == 'true' && ATTRIBUTE_STOCK_CHECK == 'true') || $t_use_combis_quantity == 2)) {
                        xtc_db_query("
                                    UPDATE
                                        products_properties_combis
                                    SET
                                        combi_quantity = combi_quantity + " . $order['products_quantity'] . "
                                    WHERE
                                        products_properties_combis_id = '" . $order['products_properties_combis_id'] . "' AND
                                        products_id = '" . $order['products_id'] . "'
                    ");
                    }


                    // BOF GM_MOD
                    if (ATTRIBUTE_STOCK_CHECK == 'true') {
                        $gm_get_orders_attributes = xtc_db_query("
															SELECT
																products_options,
																products_options_values
															FROM
																orders_products_attributes
															WHERE
																orders_id = '" . xtc_db_input($order_id) . "'
															AND
																orders_products_id = '" . $order['orders_products_id'] . "'
					");

                        while ($gm_orders_attributes = xtc_db_fetch_array($gm_get_orders_attributes)) {
                            $gm_get_attributes_id = xtc_db_query("
															SELECT
																pa.products_attributes_id
															FROM
																products_options_values pov,
																products_options po,
																products_attributes pa
															WHERE
																po.products_options_name = '" . $gm_orders_attributes['products_options'] . "'
																AND po.products_options_id = pa.options_id
																AND pov.products_options_values_id = pa.options_values_id
																AND pov.products_options_values_name = '" . $gm_orders_attributes['products_options_values'] . "'
																AND pa.products_id = '" . $order['products_id'] . "'
															LIMIT 1
						");

                            if (xtc_db_num_rows($gm_get_attributes_id) == 1) {
                                $gm_attributes_id = xtc_db_fetch_array($gm_get_attributes_id);

                                xtc_db_query("
											UPDATE
												products_attributes
											SET
												attributes_stock = attributes_stock + " . $order['products_quantity'] . "
											WHERE
												products_attributes_id = '" . $gm_attributes_id['products_attributes_id'] . "'
							");
                            }
                        }
                    }
                    if ($reactivateArticle == 'on') {
                        $t_reactivate_product = false;

                        // check if combis exists
                        $t_combis_query = xtc_db_query("
									SELECT
										products_properties_combis_id
									FROM
										products_properties_combis
									WHERE
										products_id = '" . $order['products_id'] . "'
					");
                        $t_combis_array_length = xtc_db_num_rows($t_combis_query);

                        if ($t_combis_array_length > 0) {
                            $coo_combis_admin_control = MainFactory::create_object("PropertiesCombisAdminControl");
                            $t_use_combis_quantity = $coo_combis_admin_control->get_use_properties_combis_quantity($order['products_id']);
                        } else {
                            $t_use_combis_quantity = 0;
                        }

                        // CHECK PRODUCT QUANTITY
                        if ($t_combis_array_length == 0 || $t_use_combis_quantity == 1 || ($t_use_combis_quantity == 0 && STOCK_CHECK == 'true' && ATTRIBUTE_STOCK_CHECK != 'true')) {
                            $coo_get_product = new GMDataObject('products', array('products_id' => $order['products_id']));
                            if ($coo_get_product->get_data_value('products_quantity') > 0 && $coo_get_product->get_data_value('products_status') == 0) {
                                $t_reactivate_product = true;
                            }
                        }

                        // CHECK COMBI QUANTITY
                        if ($t_combis_array_length > 0 && (($t_use_combis_quantity == 0 && STOCK_CHECK == 'true' && ATTRIBUTE_STOCK_CHECK == 'true') || $t_use_combis_quantity == 2)) {
                            $coo_properties_control = MainFactory::create_object('PropertiesControl');
                            $t_reactivate_product = $coo_properties_control->available_combi_exists($order['products_id']);
                        }

                        if ($t_reactivate_product) {
                            $coo_set_product = new GMDataObject('products');
                            $coo_set_product->set_keys(array('products_id' => $order['products_id']));
                            $coo_set_product->set_data_value('products_status', 1);
                            $coo_set_product->save_body_data();
                        }
                    }
                    // EOF GM_MOD
                }

                // BOF GM_MOD products_shippingtime:
                if ($reshipp == 'on') {
                    require(DIR_FS_CATALOG . 'gm/inc/set_shipping_status.php');
                    set_shipping_status($order['products_id'], $order['products_properties_combis_id']);
                }
                // BOF GM_MOD products_shippingtime:
            }
        }

        if (!$canceled) {
            xtc_db_query("DELETE from " . TABLE_ORDERS . " WHERE orders_id = '" . xtc_db_input($order_id) . "'");

            $t_orders_products_ids_sql = 'SELECT orders_products_id FROM ' . TABLE_ORDERS_PRODUCTS . ' WHERE orders_id = "' . xtc_db_input($order_id) . '"';
            $t_orders_products_ids_result = xtc_db_query($t_orders_products_ids_sql);
            while ($t_orders_products_ids_array = xtc_db_fetch_array($t_orders_products_ids_result)) {
                xtc_db_query("DELETE FROM orders_products_quantity_units WHERE orders_products_id = '" . (int)$t_orders_products_ids_array['orders_products_id'] . "'");
                xtc_db_query('DELETE FROM orders_products_properties WHERE orders_products_id = "' . (int)$t_orders_products_ids_array['orders_products_id'] . '"');
            }

            // DELETE from gm_gprint_orders_*, and gm_gprint_uploads
            $coo_gm_gprint_order_manager = MainFactory::create_object('GMGPrintOrderManager');
            $coo_gm_gprint_order_manager->delete_order((int)$order_id);

            xtc_db_query("DELETE FROM " . TABLE_ORDERS_PRODUCTS . " WHERE orders_id = '" . (int)$order_id . "'");
            xtc_db_query("DELETE FROM " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " WHERE orders_id = '" . (int)$order_id . "'");
            xtc_db_query("DELETE FROM " . TABLE_ORDERS_PRODUCTS_DOWNLOAD . " WHERE orders_id = '" . (int)$order_id . "'");
            xtc_db_query("DELETE FROM " . TABLE_ORDERS_STATUS_HISTORY . " WHERE orders_id = '" . (int)$order_id . "'");
            xtc_db_query("DELETE FROM " . TABLE_ORDERS_TOTAL . " WHERE orders_id = '" . (int)$order_id . "'");
            xtc_db_query("DELETE FROM banktransfer WHERE orders_id = '" . (int)$order_id . "'");
            xtc_db_query("DELETE FROM sepa WHERE orders_id = '" . (int)$order_id . "'");
            xtc_db_query("DELETE FROM orders_parcel_tracking_codes WHERE order_id = '" . (int)$order_id . "'");
            xtc_db_query("DELETE FROM orders_tax_sum_items WHERE order_id = '" . (int)$order_id . "'");
        }
    }
}

MainFactory::load_origin_class('qcp');
