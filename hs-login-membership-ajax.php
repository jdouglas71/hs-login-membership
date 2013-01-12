<?php

/** If Necessary, Load WordPress */
$wp_root = explode("wp-content",$_SERVER["SCRIPT_FILENAME"]);
$wp_root = $wp_root[0];
if($wp_root == $_SERVER["SCRIPT_FILENAME"]) 
{
    $wp_root = explode("index.php",$_SERVER["SCRIPT_FILENAME"]);
    $wp_root = $wp_root[0];
}

chdir($wp_root);

if(!function_exists("add_action")) 
{
	require_once(file_exists("wp-load.php")?"wp-load.php":"wp-config.php");
}
/** Load WordPress ends **/

//Vicinity Config File										 
require(dirname(__FILE__).'/config.php');

$response = "alert('".@$_POST["action"]."');";
$dataValues = $_POST;

hslogToFile( "testing" );

/** Validate **/

/** Process **/

switch(@$_POST["action"])
{
	case "LoginUser":
		$creds = array();
		$creds['user_login'] = $dataValues['username'];
		$creds['user_password'] = $dataValues['password'];
		$creds['remember'] = true;

		$response = "
			alert('Login Successful.');

			hs_login_membership_clear_login_form();
			";
		/**
		$user = wp_signon( $creds, false );
		if( is_wp_error($user) ) 
		{
			$response = "
				var messages = document.getElementById('hs_login_membership_messages');
				messages.className = 'hs_login_membership_message';
				messages.innerHTML = ".$user->get_error_message().";
				document.getElementById('hs_login_membership_submit').disabled = false;
				var submit_message = document.getElementById('hs_login_membership_submit_message');
				submit_message.className = '';
				submit_message.innerHTML = '&nbsp;';
				document.getElementById('hs_login_membership_messages').scrollIntoView();
				";

			$response = "alert('error logging in');";
		}
		else
		{
			wp_set_current_user( $user->ID, $dataValues['username'] );
			$response = "
				var messages = document.getElementById('hs_login_membership_messages');
				messages.className = 'hs_login_membership_message';
				messages.innerHTML = 'Login Successful.';
				document.getElementById('hs_login_membership_submit').disabled = false;
				var submit_message = document.getElementById('hs_login_membership_submit_message');
				submit_message.className = '';
				submit_message.innerHTML = '&nbsp;';
				document.getElementById('hs_login_membership_messages').scrollIntoView();
				hs_login_membership_clear_login_form();
				";
			$response = "alert('login successful.');";
		}
		do_action( 'set_current_user' );

		hslogToFile( $response );
		*/
		break;
	case "AddUser":
		//$userdata = array( 'user_login'->$dataValues['username'], 'user_pass'->$dataValues['password'] );
		//$user_id = wp_insert_user($userdata);

		$response = "
			alert('Membership added.');

			hs_login_membership_clear_membership_form();
			";

        $errors = validateUser($dataValues);

        if( count($errors) < 1 )
        {
            $userErrors = addUser($dataValues,true);
            if( count($userErrors) < 1 )
            {
                $response = "
                    var messages = document.getElementById('hs_login_membership_messages');
                    messages.className = 'hs_login_membership_message';
                    messages.innerHTML = 'The user has been added to the database.';
                    document.getElementById('hs_add_account').disabled = false;

                    var submit_message = document.getElementById('hs_login_membership_submit_message');
                    submit_message.className = '';
                    submit_message.innerHTML = '&nbsp;';
                    document.getElementById('hs_login_membership_messages').scrollIntoView();
                    hs_login_membership_clear_membership_form();
                    ";
            }
            else
            {
                $message = "";
                foreach($userErrors as $err)
                {
                    $message .= $err;
                }
    
                $response = "
                    var messages = document.getElementById('hs_login_membership_messages');
                    messages.className = 'hs_login_membership_error_message';
                    messages.innerHTML = '$message';
                    document.getElementById('hs_add_account').disabled = false;

                    var submit_message = document.getElementById('hs_login_membership_submit_message');
                    submit_message.className = 'hs_login_membership_error_message';
                    submit_message.innerHTML = 'Please fix the above errors and submit again.';
                    document.getElementById('hs_login_membership_messages').scrollIntoView();
                    ";
            }
        }
        else
        {
            $message = "";
            foreach($errors as $err)
            {
                $message .= $err;
            }

            $response = "
                var messages = document.getElementById('hs_login_membership_messages');
                messages.className = 'hs_login_membership_error_message';
                messages.innerHTML = '$message';
                document.getElementById('hs_add_account').disabled = false;

                var submit_message = document.getElementById('hs_login_membership_submit_message');
                submit_message.className = 'hs_login_membership_error_message';
                submit_message.innerHTML = 'Please fix the above errors and submit again.';
                document.getElementById('hs_login_membership_messages').scrollIntoView();
                ";
        }


		break;

	default:
}

die($response);

?>
