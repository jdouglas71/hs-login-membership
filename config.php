<?php

global $wpdb;

/** Directories */
define('HS_LOGIN_MEMBERSHIP_DIR', dirname(__FILE__)."/");
define('HS_LOGIN_MEMBERSHIP_RELATIVE_DIR', "/wp-content/plugins/hs-login-membership/");
define('HS_LOGIN_MEMBERSHIP_CALLBACK_DIR', get_option("siteurl").HS_LOGIN_MEMBERSHIP_RELATIVE_DIR);
define('HS_LOGIN_MEMBERSHIP_CSS', HS_LOGIN_MEMBERSHIP_CALLBACK_DIR."hs-login-membership.css");
define('HS_LOGIN_MEMBERSHIP_PAGE', "add-account" );

/** Properties */
define('HS_LOGIN_MEMBERSHIP_VERSION', "hs_login_membership_version");
define('HS_LOGIN_MEMBERSHIP_CSI_URL', "hs_login_membership_csi_url");
define('HS_LOGIN_MEMBERSHIP_SHOW_NUMBER', "hs_login_membership_show_number" );
define('HS_LOGIN_MEMBERSHIP_EMAIL_NOTIFY', "hs_login_membership_email_notify" );
define('HS_LOGIN_MEMBERSHIP_GOOGLE_FORM', "hs_login_membership_google_form" );

/**Tables*/
define('CSI_ACCOUNTS_TABLE', $wpdb->prefix."csi_accounts");

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

global $hs_login_membership_show_number;
$hs_login_membership_show_number = 25;

global $hs_login_membership_email_notify;
$hs_login_membership_email_notify = "ttomlinson@healthsport.com";

global $hs_login_membership_google_form;
$hs_login_membership_google_form = "https://docs.google.com/spreadsheet/viewform?formkey=dGZLWU5PMHhHWGNuczZxOVRPdzBWQlE6MQ";

/** Scripts */
require_once(HS_LOGIN_MEMBERSHIP_DIR.'functions.php');

?>
