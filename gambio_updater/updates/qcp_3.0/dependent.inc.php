<?php
/* --------------------------------------------------------------
   dependent.inc.php 2014-07-15 gm
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2014 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

// add ADMIN ACCESS
$t_check = $this->table_column_exists('admin_access', 'qcp_config_export');
if($t_check == false)
{
	$t_query = "ALTER TABLE `admin_access` ADD `qcp_config_export` INT( 1 ) NOT NULL DEFAULT '0'";
	$t_success &= $this->query($t_query);

	$t_query = "UPDATE `admin_access` SET `qcp_config_export` = '1' WHERE `customers_id` = '1' OR `customers_id` = 'groups'";
	$t_success &= is_numeric($this->query($t_query));
}

//get installed paymethods
$query = "SELECT REPLACE(SUBSTR(configuration_key,16),'_STATUS','') as paymethod
            FROM configuration
            WHERE configuration_key LIKE 'MODULE_PAYMENT_QCP_%_STATUS'";
$result = $this->query($query);

//update installed paymethods
foreach($result as $paymentsInstalled) {
    $c = $paymentsInstalled['paymethod'];

    $query = "SELECT configuration_key, configuration_value FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_LOGO'";
    $result = $this->query($query);

    if(empty($result[0]['configuration_key'])) {

        //insert empty string. During the payment process the current Shop image will be autofilled and submitted.
        $logoUrl = '';

        $query = "UPDATE configuration
                SET configuration_key = 'MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_LOGO',
                    configuration_value = '".$logoUrl."',
                    last_modified = now(),
                    set_function = '".$logoUrl."'
                WHERE configuration_key = 'MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_LOGO_INCLUDE'";
        $this->query($query);
    }

    $query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_PLUGIN_MODE'";
    $result = $this->query($query);

    if(empty($result[0]['configuration_key'])) {
       $query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
                  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_PLUGIN_MODE', 'Live', 6, 1, 'gm_cfg_select_option(array(\'Live\', \'Demo\', \'Test\', \'Test3D\'), ', now())";
        $this->query($query);
    }

    $query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_DEVICE_DETECTION'";
    $result = $this->query($query);

    if(empty($result[0]['configuration_key'])) {
        $query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
                  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_DEVICE_DETECTION', 'False', 6, 13, 'gm_cfg_select_option(array(\'True\', \'False\'), ', now())";
        $this->query($query);
    }

	$query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_SEND_SHIPPING_DATA'";
	$result = $this->query($query);

	if(empty($result[0]['configuration_key'])) {
		$query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_SEND_SHIPPING_DATA', 'False', 6, 19, 'gm_cfg_select_option(array(\'True\', \'False\'), ', now())";
		$this->query($query);
	}

	$query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_SEND_BILLING_DATA'";
	$result = $this->query($query);

	if(empty($result[0]['configuration_key'])) {
		$query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_SEND_BILLING_DATA', 'False', 6, 20, 'gm_cfg_select_option(array(\'True\', \'False\'), ', now())";
		$this->query($query);
	}

	$query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_SEND_BASKET'";
	$result = $this->query($query);

	if(empty($result[0]['configuration_key'])) {
		$query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_SEND_BASKET', 'False', 6, 21, 'gm_cfg_select_option(array(\'True\', \'False\'), ', now())";
		$this->query($query);
	}

    if ($c === 'QCP_INVOICE' || $c === 'QCP_INSTALLMENT') {
	    $query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_SHIPPING'";
	    $result = $this->query($query);

	    if(empty($result[0]['configuration_key'])) {
		    $query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_SHIPPING', 'False', 6, 22, 'gm_cfg_select_option(array(\'True\', \'False\'), ', now())";
		    $this->query($query);
	    }
	    $query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_CURRENCIES'";
	    $result = $this->query($query);

	    if(empty($result[0]['configuration_key'])) {
		    $query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_CURRENCIES', '', 6, 23, '', now())";
		    $this->query($query);
	    }
	    $query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_TERMS'";
	    $result = $this->query($query);

	    if(empty($result[0]['configuration_key'])) {
		    $query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_TERMS', 'False', 6, 24, 'gm_cfg_select_option(array(\'True\', \'False\'), ', now())";
		    $this->query($query);
	    }
	    $query = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_MID'";
	    $result = $this->query($query);

	    if(empty($result[0]['configuration_key'])) {
		    $query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_MID', '', 6, 25, '', now())";
		    $this->query($query);
	    }
    }
	if($c === 'QCP_INVOICE') {
		$query  = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_PROVIDER'";
		$result = $this->query($query);

		if (empty($result[0]['configuration_key'])) {
			$query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_PROVIDER', 'payolution', 6, 26, 'gm_cfg_select_option(array(\'payolution\', \'RatePay\', \'QENTA\'), ', now())";
			$this->query($query);
		}
	}
	if($c === 'QCP_INSTALLMENT') {
		$query  = "SELECT configuration_key FROM configuration WHERE configuration_key = 'MODULE_PAYMENT_{$c}_PROVIDER'";
		$result = $this->query($query);

		if (empty($result[0]['configuration_key'])) {
			$query = "INSERT INTO configuration (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added)
				  VALUE ('MODULE_PAYMENT_{$paymentsInstalled['paymethod']}_PROVIDER', 'payolution', 6, 26, 'gm_cfg_select_option(array(\'payolution\', \'RatePay\'), ', now())";
			$this->query($query);
		}
	}

}
