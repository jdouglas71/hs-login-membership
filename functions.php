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
function addUser($v) 
{
	global $wpdb;
	global $hs_login_membership_email_notify;

    //Validate $v
    $errors = array();
    if(!is_array($v))
    {
        return array("Error processing data, please try again.");
    }

	$keys = "account_id, firstname, lastname, membernumber, email, password";
	$vals = "%d, %s, %s, %s, %s, %s";

    $sql = $wpdb->prepare( "INSERT INTO ".CSI_ACCOUNTS_TABLE." ($keys) values ($vals);",   
                           time(), //Use this value as the account id.                            
                           $v["firstname"],                                                          
                           $v["lastname"],                                                        
                           $v["membernumber"],                                                        
                           $v["username"],                                                        
                           $v["password"] );                                                        

    //Add the account to the database
    $result = $wpdb->query( $sql );

	//Send an email with a CSV file (http://stackoverflow.com/questions/5816421/send-csv-file-attached-to-the-email)
	$cr = "\n";                                                                                                    
    $csvdata = "First Name" . ',' . "Last Name"  . "Member Number". "," . "E-mail". "," . "Password" . $cr;
    $csvdata .= $v["firstname"] . ',' . $v["lastname"] . ',' . $v["membernumber"] . ',' . $v["username"] . ',' . $v["password"] . $cr;

    $thisfile = 'new_account.csv';

    $encoded = chunk_split(base64_encode($csvdata));

    // create the email and send it off

    $subject = "HealthSPORT Membership Creation";
    $from = "healthsport.com";
    $headers = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-Type: multipart/mixed;
        boundary="----=_NextPart_001_0011_1234ABCD.4321FDAC"' . "\n";

    $message = '

    This is a multi-part message in MIME format.

    ------=_NextPart_001_0011_1234ABCD.4321FDAC
    Content-Type: text/plain;
            charset="us-ascii"
    Content-Transfer-Encoding: 7bit

    Hello

	The attached CSV file contains a new account request from healthsport.com.

    Regards

    ------=_NextPart_001_0011_1234ABCD.4321FDAC
    Content-Type: application/octet-stream;  name="';

    $message .= "$thisfile";
    $message .= '"
    Content-Transfer-Encoding: base64
    Content-Disposition: attachment; filename="';
    $message .= "$thisfile";
    $message .= '"

    ';
    $message .= "$encoded";
    $message .= '

    ------=_NextPart_001_0011_1234ABCD.4321FDAC--

    ';

    // now send the email
    mail($hs_login_membership_email_notify, $subject, $message, $headers, "-f$from");

    return $errors;
}

/**
 * Get Accounts.
 */
function getAccounts()
{
    global $wpdb;

    $results = $wpdb->get_results( "SELECT * FROM ".CSI_ACCOUNTS_TABLE." order by account_id DESC;" ); 
    $accounts = array();

	foreach( $results as $account )
	{
		$accounts[] = $account;
	}

    return $accounts;
}
