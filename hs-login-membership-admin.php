<?php 

   	//Vicinity Config File
   	require_once(dirname(__FILE__)."/config.php");

	global $hs_login_membership_csi_url;
	global $hs_login_membership_version;
	global $hs_login_membership_show_number;

	if($_POST['hs_login_membership_hidden'] == 'Y') 
	{
		//Form data sent
		$hs_login_membership_csi_url = $_POST['hs_login_membership_csi_url'];
		update_option('hs_login_membership_csi_url', $hs_login_membership_csi_url);

        if( is_numeric($_POST['hs_login_membership_show_number']) )
        {
            $hs_login_membership_show_number = $_POST['hs_login_membership_show_number'];
            update_option(HS_LOGIN_MEMBERSHIP_SHOW_NUMBER, $hs_login_membership_show_number);
            ?>
            <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
            <?php
        }
        else
        {
            ?>
            <div class="error"><p><strong><?php _e('Number of Accounts shown must be a number.' ); ?></strong></p></div>
            <?php
        }
	}       
	else 
	{
		//Normal page display
		$hs_login_membership_csi_url = get_option(HS_LOGIN_MEMBERSHIP_CSI_URL);
		$hs_login_membership_show_number = get_option(HS_LOGIN_MEMBERSHIP_SHOW_NUMBER);
	}
	
	
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'HealthSPORT Membership Options', 'hs_login_membership_trdom' ) . "</h2>"; ?>

<form name="hs_login_membership_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="hs_login_membership_hidden" value="Y">
	<p><?php _e("HealthSPORT Login URL: " ); ?><input type="text" name="hs_login_membership_csi_url" value="<?php echo $hs_login_membership_csi_url; ?>" size="128"></p>
    <p><?php _e("Number of requests displayed: " ); ?><input type="text" name="hs_login_membership_show_number" value="<?php echo $hs_login_membership_show_number; ?>" size="5"></p>
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'hs_login_membership_trdom' ) ?>" />
	</p>
</form>

<?php    echo "<h2>" . __( 'HealthSPORT Membership Requests', 'hs_login_membership_trdom' ) . "</h2>"; ?>
    <?php 
		  $accounts = getAccounts(); 
		  
		  foreach( $accounts as $account )
		  {
			  echo "<b>First Name:</b> ".$account->firstname. " <b>Last Name:</b> ".$account->lastname."<br />";
		  }
    ?>
	


</div>