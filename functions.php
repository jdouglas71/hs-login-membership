<?php

//User functions
//require_once(ABSPATH . WPINC . '/registration.php');

/**
 * Login form
 */
function hs_login_form($width="100%")
{
	global $hs_login_membership_csi_url;

    $retval = "";

	//$retval .= "<div class='hs_main_div'>"; 
	$retval .= "<table class='hs_login_membership_main_table' width='100%' border='0' cellspacing='0' cellpadding='0'>";

	$retval .= "<tr><td style='vertical-align:top;'>";
	$retval .= "<div class='hs_login_div'>";
	$retval .= "<h2 class='hs_login_membership_header'>Registered Customers</h2>";
	$retval .= "<iframe frameborder='0' height='130' marginheight='1' marginwidth='1' scrolling='no' src='".$hs_login_membership_csi_url."' width='690' height='310'></iframe>";
	//$retval .= "<form id='hs-login-form' method='POST'>";
	//$retval .= "<table class='hs_login_membership_table' width='100%' border='0' cellspacing='0' cellpadding='0'>";
	//$retval .= "<tr><td id='hs_login_membership_messages' colspan='2'></td></tr>";
	//$retval .= "<tr><td>";	
	//$retval .= "<label for='hs_username' class='hs_login_membership_label'>E-mail Address</label>";
	//$retval .= "</td><td>";
	//$retval .= "<input type='text' autofocus='autofocus' id='hs_username' class='hs_login_membership_input'>";
	//$retval .= "</td></tr>";
	//$retval .= "<tr><td>";	
	//$retval .= "<label for='hs_password' class='hs_login_membership_label'>Password</label>";
	//$retval .= "</td><td>";
	//$retval .= "<input type='password' id='hs_password' class='hs_login_membership_input'>";
	//$retval .= "</td></tr>";
	//$retval .= "<tr><td></td><td style='text-align:left;'>";
	//$retval .= "<input type='submit' value='Login' class='hs_form_button' id='hs_login' onClick='hs_login_membership_login_user(); return false;'/>";
	//$retval .= "</td></tr>";
	//$retval .= "<tr><td id='hs_login_membership_submit_message' colspan='2'></td></tr>";
	//$retval .= "</table>";
	//$retval .= "</form>";
	//$retval .= "<a href='".wp_lostpassword_url()."' title='Lost Password'>Lost Password?</a>";
	$retval .= "</div>";
	$retval .= "</td>";

	$retval .= "<td style='vertical-align:top;'>";
	$retval .= "<div class='hs_membership_div'>";
	$retval .= "<h2 class='hs_login_membership_header'>Create an Account.</h2>";
	$retval .= "&nbsp;<br />";
	$retval .= "&nbsp;<br />";
	$retval .= "&nbsp;<br />";
	$retval .= "<input type='button' class='hs_form_button' onclick='location.href=\"".site_url(HS_LOGIN_MEMBERSHIP_PAGE)."\"' value='Create An Account'>";
	$retval .= "</div>";
	$retval .= "</td></tr>";

	$retval .= "</table>";
	//$retval .= "</div>";

    return $retval;
}

/**
 * Membership form
 */
function hs_membership_form($width="100%")
{
    $retval = "";

	$retval .= "<form id='hs-login-form' method='POST'>";
	$retval .= "<table class='hs_login_membership_table' width='100%' border='0' cellspacing='0' cellpadding='0'>";
	$retval .= "<tr><td id='hs_login_membership_messages' colspan='2'></td></tr>";


	$retval .= "<tr><td>";	
	$retval .= "<label for='hs_firstname' class='hs_login_membership_label'>First Name</label>";
	$retval .= "</td><td>";
	$retval .= "<input type='text' autofocus='autofocus' id='hs_firstname' class='hs_login_membership_input'>";
	$retval .= "</td></tr>";

	$retval .= "<tr><td>";	
	$retval .= "<label for='hs_lastname' class='hs_login_membership_label'>Last Name</label>";
	$retval .= "</td><td>";
	$retval .= "<input type='text' id='hs_lastname' class='hs_login_membership_input'>";
	$retval .= "</td></tr>";

	$retval .= "<tr><td>";	
	$retval .= "<label for='hs_membernumber' class='hs_login_membership_label'>Member Number</label>";
	$retval .= "</td><td>";
	$retval .= "<input type='text'id='hs_membernumber' class='hs_login_membership_input'>";
	$retval .= "</td></tr>";


	$retval .= "<tr><td>";	
	$retval .= "<label for='hs_username' class='hs_login_membership_label'>E-mail Address</label>";
	$retval .= "</td><td>";
	$retval .= "<input type='text' id='hs_username' class='hs_login_membership_input'>";
	$retval .= "</td></tr>";


	$retval .= "<tr><td>";	
	$retval .= "<label for='hs_password' class='hs_login_membership_label'>Password</label>";
	$retval .= "</td><td>";
	$retval .= "<input type='password' id='hs_password' class='hs_login_membership_input'>";
	$retval .= "</td></tr>";

	$retval .= "<tr><td>";	
	$retval .= "<label for='hs_confirm_password' class='hs_login_membership_label'>Confirm Password</label>";
	$retval .= "</td><td>";
	$retval .= "<input type='password' id='hs_confirm_password' class='hs_login_membership_input'>";
	$retval .= "</td></tr>";

	$retval .= "<tr><td></td><td style='text-align:left;'>";
	$retval .= "<input type='submit' value='Add Account' class='hs_form_button' id='hs_add_account' onClick='hs_login_membership_add_user(); return false;'/>";
	$retval .= "</td></tr>";
	$retval .= "<tr><td id='hs_login_membership_submit_message' colspan='2'></td></tr>";
	$retval .= "</table>";
	$retval .= "</form>";

    return $retval;
}

/**
 * Logging to file.                                       
 */
function hslogToFile($msg)
{ 
    // open file
    $fd = fopen(LOGFILE, "a");
    // append date/time to message
    $str = "[" . date("Y/m/d h:i:s", mktime()) . "] " . $msg; 
    // write string
    fwrite($fd, $str . "\n");
    // close file
    fclose($fd);
}

function hsvarDumpStr($var)
{
	ob_start();
	var_dump( $var );
	$out = ob_get_clean();
	return $out;
}

/**
 * Validate the User
 */
function validateUser($v) 
{
    //Validate $v
    $errors = array();
    if(!is_array($v))
    {
        return array("Error processing data, please try again.");
    }

    //Testing.
    //$errors[] = $v["username"] . "<br/>";
    //$errors[] = $v["password"] . "<br/>";
    //$errors[] = $v["confirm_password"] . "<br/>";
    //$errors[] = $v["display_name"] . "<br/>";
    //$errors[] = $v["email"] . "<br/>";

    //User name can't be empty
    if(empty($v["username"]))
    {
        $errors[] = "The user name cannot be blank.<br/>";
    }

    //Check for duplicate user name
    //elseif( username_exists( $v["username"] ) )
    //{
    //    $errors[] = "The username already exists in the system. Please choose another.<br/>";
    //}

    //Passwords
    //Password cannot be blank
    if(empty($v["password"]))
    {
        $errors[] = "Blank passwords are not allowed.<br/>";
    }
    elseif( (strncmp($v["password"],$v["confirm_password"],strlen($v["password"])) != 0) )
    {
        $errors[] = "The password fields do not match.<br/>";
    }

    return $errors;
}

/**
 * Add the User Account
 */
function addUser($v,$shouldLogin=true) 
{
    //Validate $v
    $errors = array();
    if(!is_array($v))
    {
        return array("Error processing data, please try again.");
    }

    //Testing.
    //$errors[] = "username: " . $v["username"] . "<br/>";
    //$errors[] = "password: " . $v["password"] . "<br/>";
    //$errors[] = "confirm password: " . $v["confirm_password"] . "<br/>";
    //$errors[] = "display name: " . $v["display_name"] . "<br/>";
    //$errors[] = "email: " . $v["cEmail"] . "<br/>";

    //Insert the user
	/*
    $user_id = wp_insert_user( array("user_login"=>$v["username"], 
                                     "user_pass"=>$v["password"]
                                     );
    if( is_wp_error($user_id) )
    {
        $errors[] = $user_id->get_error_message();
    }
    else
    {
        add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
        $message = "A new user account has been created for HealthSPORT."."\n";
        $message .= "Username: " . $v["user_name"] . "\n";
        $message .= "Email: " . $v["email"] . "\n";

        wp_mail( NOTIFIER, "User Account Created", $message );
        wp_mail( $v["cEmail"], "HealthSPORT Membership", $message );
         
        //if( $shouldLogin )
        //{
        //    $errors = loginUser($v);
        //}
    }
	*/
    return $errors;
}

