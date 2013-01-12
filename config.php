<?php

global $wpdb;

/** Directories */
define('HS_LOGIN_MEMBERSHIP_DIR', dirname(__FILE__)."/");
define('HS_LOGIN_MEMBERSHIP_RELATIVE_DIR', "/wp-content/plugins/hs-login-membership/");
define('HS_LOGIN_MEMBERSHIP_CALLBACK_DIR', get_option("siteurl").HS_LOGIN_MEMBERSHIP_RELATIVE_DIR);
define('HS_LOGIN_MEMBERSHIP_CSS', HS_LOGIN_MEMBERSHIP_CALLBACK_DIR."hs-login-membership.css");
define('HS_LOGIN_MEMBERSHIP_PAGE', "add-account" );
define('HS_LOGIN_MEMBERSHIP_CSI_URL', "hs_login_membership_csi_url");

/** Logfile */
define('LOGFILE', HS_LOGIN_MEMBERSHIP_DIR.'HS_LOGIN_MEMBERSHIP.log');
/** WordPress Script Debug Flag */
define('SCRIPT_DEBUG', true );

/** Globals */
global $hs_login_membership_version;
$hs_login_membership_version = "0.7";

global $hs_login_membership_csi_url;
$hs_login_membership_csi_url = "http://qasrv1:12121/OLS45_Site2/LoginFrame.aspx";

global $hs_icon_url;
$hs_icon_url = "http://healthsport.com/favicon.ico";

/** Scripts */
require_once(HS_LOGIN_MEMBERSHIP_DIR.'functions.php');

?>
