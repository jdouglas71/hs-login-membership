<?php
/*
Plugin Name: HealthSPORT Membership
Plugin URI: http://www.douglasconsulting.net
Description: HealthSPORT Membership Plugin.
Version: 0.7 Beta
Author: Jason Douglas
Author URI: http://www.douglasconsulting.net
License: GPL
*/

//HealthSPORT Membership Config File
require_once(dirname(__FILE__)."/config.php");

/** HOOKS **/

/* This calls hs_login_membership_init() function when wordpress initializes. */
add_action('init', 'hs_login_membership_init');
add_action('wp_head', 'hs_login_membership_js_header' );

/* Runs when Plugin is activated. */
register_activation_hook( __FILE__, 'hs_login_membership_install' );

/* Runs on plugin deactivated. */
register_deactivation_hook( __FILE__, 'hs_login_membership_uninstall' );

/** Admin Stuff **/
add_action( 'admin_init', 'hs_login_membership_admin_init' );
add_action( 'admin_menu', 'hs_login_membership_admin_menu' );

/**
 * Add my style sheet to the admin page.
 */
function hs_login_membership_admin_init()
{
	wp_register_style( 'hs_login_membership_css', plugins_url('hs-login-membership.css', __FILE__) );
}

/**
 * Add our admin menu to the dashboard.
 */
function hs_login_membership_admin_menu()
{
	global $hs_icon_url;
	$page = add_menu_page( 'HealthSPORT Membership', 'HealthSPORT Membership', 'administrator', 'hs_login_membership', 'hs_login_membership_admin_page', $hs_icon_url);

	add_action( 'admin_print_styles-'.$page, 'hs_login_membership_admin_styles' );
}

/**
 * Enqueue the style sheet for the admin page.
 */
function hs_login_membership_admin_styles()
{
	wp_enqueue_style( 'hs_login_membership_css' );
}

/**
 * Show the admin page.
 */ 
function hs_login_membership_admin_page()
{
	include( 'hs-login-membership-admin.php' );
}

/** SHORTCODES **/
add_shortcode( 'hs_login_form', 'hs_login_form_shortcode' );
add_shortcode( 'hs_membership_form', 'hs_membership_form_shortcode' );

/** FUNCTIONS **/
/**
 * Installer function
 */
function hs_login_membership_install()
{
	global $wpdb;
	global $hs_login_membership_version;
	global $hs_login_membership_csi_url;
	global $hs_login_membership_show_number;
	global $hs_login_membership_email_notify;
	global $hs_login_membership_google_form;
	

    //Create the events table
    $sql = "CREATE TABLE ".CSI_ACCOUNTS_TABLE." (".             
           "account_id bigint NOT NULL DEFAULT '0', ".   
		   "firstname text NULL DEFAULT NULL, ".         
		   "lastname text NULL DEFAULT NULL, ".         
		   "membernumber text NULL DEFAULT NULL, ".         
		   "email text NULL DEFAULT NULL, ".         
           "password text NULL DEFAULT NULL, ".         
           "PRIMARY KEY (account_id)".                      
           ");";                                        

    $result = $wpdb->query( $sql );

	//add/update Options
	if( !add_option(HS_LOGIN_MEMBERSHIP_VERSION, $hs_login_membership_version) )
	{
		update_option(HS_LOGIN_MEMBERSHIP_VERSION, $hs_login_membership_version);
	}

	if( !add_option(HS_LOGIN_MEMBERSHIP_CSI_URL, $hs_login_membership_csi_url) )
	{
		update_option(HS_LOGIN_MEMBERSHIP_CSI_URL, $hs_login_membership_csi_url);
	}

	if( !add_option(HS_LOGIN_MEMBERSHIP_SHOW_NUMBER, $hs_login_membership_show_number) )
	{
		update_option(HS_LOGIN_MEMBERSHIP_SHOW_NUMBER, $hs_login_membership_show_number);
	}

	if( !add_option(HS_LOGIN_MEMBERSHIP_EMAIL_NOTIFY, $hs_login_membership_email_notify) )
	{
		update_option(HS_LOGIN_MEMBERSHIP_EMAIL_NOTIFY, $hs_login_membership_email_notify);
	}

	if( !add_option(HS_LOGIN_MEMBERSHIP_GOOGLE_FORM, $hs_login_membership_google_form) )
	{
		update_option(HS_LOGIN_MEMBERSHIP_GOOGLE_FORM, $hs_login_membership_email_google_form);
	}

}

/**
 * Uninstall Function.
 */
function hs_login_membership_uninstall()
{
	global $wpdb;

	//Drop the accounts table
	$result = $wpdb->query( "DROP TABLE ".CSI_ACCOUNTS_TABLE.";" );

	//Clear out options
	delete_option( HS_LOGIN_MEMBERSHIP_VERSION );
	delete_option( HS_LOGIN_MEMBERSHIP_CSI_URL );
	delete_option( HS_LOGIN_MEMBERSHIP_SHOW_NUMBER );
	delete_option( HS_LOGIN_MEMBERSHIP_EMAIL_NOTIFY );
	delete_option( HS_LOGIN_MEMBERSHIP_GOOGLE_FORM );
}

/**
 * Called on init of WordPress.
 */
function hs_login_membership_init()
{
	global $hs_login_membership_version;
	global $hs_login_membership_csi_url;
	global $hs_login_membership_show_number;
	global $hs_login_membership_email_notify;
	global $hs_login_membership_google_form;

	if( !is_admin() )
	{
		$hs_login_membership_version = get_option( HS_LOGIN_MEMBERSHIP_VERSION );
		$hs_login_membership_csi_url = get_option( HS_LOGIN_MEMBERSHIP_CSI_URL );
		$hs_login_membership_show_number = get_option( HS_LOGIN_MEMBERSHIP_SHOW_NUMBER );
		$hs_login_membership_email_notify = get_option( HS_LOGIN_MEMBERSHIP_EMAIL_NOTIFY );
		$hs_login_membership_google_form = get_option( HS_LOGIN_MEMBERSHIP_GOOGLE_FORM );
	}

	wp_register_style( 'hs_login_membership_css', plugins_url('hs-login-membership.css', __FILE__) );
}

/**
 * Login Form Template
 */
function hs_login_form_shortcode($atts, $content=null)
{
	//Extract atts

	wp_enqueue_style( 'hs_login_membership_css' );

	//$retval = "<link rel='stylesheet' href='".HS_LOGIN_MEMBERSHIP_CSS."' type='text/css' media='screen'/>".
	$retval = hs_login_form(); 

	return $retval;
}

/**
 * Membership Form Template
 */
function hs_membership_form_shortcode($atts, $content=null)
{
	//Extract atts

	wp_enqueue_style( 'hs_login_membership_css' );

	//$retval = "<link rel='stylesheet' href='".HS_LOGIN_MEMBERSHIP_CSS."' type='text/css' media='screen'/>".
	$retval = hs_membership_form(); 

	return $retval;
}

/**
 * Set up header for AJAX calls.
 */
function hs_login_membership_js_header()
{
	wp_print_scripts( array('sack') );
	?>
	<script type='text/javascript'>

		//Login User
		function hs_login_membership_login_user()
		{
			try
			{
				document.getElementById('hs_login').disabled = true;
				var submit_message = document.getElementById('hs_login_membership_submit_message');
                submit_message.className = "hs_login_membership_message";
				submit_message.innerHTML = "Logging in. Please wait...";

                var mysack = new sack("<?php echo HS_LOGIN_MEMBERSHIP_CALLBACK_DIR; ?>hs-login-membership-ajax.php");
                mysack.execute = 1;
                mysack.method = 'POST';

                //Set the variables
                mysack.setVar("action", "LoginUser");
                mysack.setVar("username", document.getElementById("hs_username").value);
                mysack.setVar("password", document.getElementById("hs_password").value);

                mysack.onError = function() { alert('An Error occurred. Please reload the page and try again.'); };
                mysack.runAJAX();
            }
            catch(err)
            {
                var txt = "There was an error on this page.\n\n";
                txt += "Error description: " + err.message + "\n\n";
                txt += "Click OK to continue.\n\n";
                alert(txt);
            }

            return true;
		}

        //Add user
        function hs_login_membership_add_user()
        {
            try
            {
                document.getElementById('hs_add_account').disabled = true;
                var submit_message = document.getElementById('hs_login_membership_submit_message');
                submit_message.className = "hs_login_membership_message";
                submit_message.innerHTML = "Submitting form. Please wait...";
    
                var mysack = new sack("<?php echo HS_LOGIN_MEMBERSHIP_CALLBACK_DIR; ?>hs-login-membership-ajax.php");
                mysack.execute = 1;
                mysack.method = 'POST';
        
                //Set the variables
                mysack.setVar("action", "AddUser");
                mysack.setVar("firstname", document.getElementById("hs_firstname").value);
                mysack.setVar("lastname", document.getElementById("hs_lastname").value);
                mysack.setVar("membernumber", document.getElementById("hs_membernumber").value);
                mysack.setVar("username", document.getElementById("hs_username").value);
                mysack.setVar("password", document.getElementById("hs_password").value);
                mysack.setVar("confirm_password", document.getElementById("hs_confirm_password").value);
        
                mysack.onError = function() { alert('An Error occurred. Please reload the page and try again.'); };
                mysack.runAJAX();
            }
            catch(err)
            {
                var txt = "There was an error on this page.\n\n";
                txt += "Error description: " + err.message + "\n\n";
                txt += "Click OK to continue.\n\n";
                alert(txt);
            }

            return true;
		}

		//Clear login form
		function hs_login_membership_clear_login_form()
		{       
			try
			{
				document.getElementById("hs_username").value = "";
				document.getElementById("hs_password").value = "";

				document.getElementById('hs_login').disabled = false;

				var submit_message = document.getElementById('hs_login_membership_submit_message');
				submit_message.className = 'hs_login_membership_message';
				submit_message.innerHTML = '';
			}
			catch(err)
			{
				var txt = "There was an error on this page.\n\n";
				txt += "Error description: " + err.message + "\n\n";
				txt += "Click OK to continue.\n\n";
				alert(txt);
			}
		}

		//Clear membership form
		function hs_login_membership_clear_membership_form()
		{
			try
			{
				document.getElementById("hs_firstname").value = "";
				document.getElementById("hs_lastname").value = "";
				document.getElementById("hs_membernumber").value = "";
				document.getElementById("hs_username").value = "";
				document.getElementById("hs_password").value = "";
				document.getElementById("hs_confirm_password").value = "";

				document.getElementById('hs_add_account').disabled = false;
				var submit_message = document.getElementById('hs_login_membership_submit_message');
				submit_message.className = 'hs_login_membership_message';
				submit_message.innerHTML = '';

			}
			catch(err)
			{
				var txt = "There was an error on this page.\n\n";
				txt += "Error description: " + err.message + "\n\n";
				txt += "Click OK to continue.\n\n";
				alert(txt);
			}
		}

	</script>
	<?php
}

?>
