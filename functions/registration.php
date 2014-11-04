<?php
	include "../includes/phpBBHeader.php";
	
	/*$cp = new custom_profile();
	$error = $cp_data = $cp_error = array();
	
	
	// validate and register the custom profile fields
	$cp->submit_cp_field('register', $user->get_iso_lang_id(), $cp_data, $error);

	//create an inactive user key to send to them...
	$user_actkey = gen_rand_string(10);
	$key_len = 54 - (strlen($server_url));
	$key_len = ($key_len < 6) ? 6 : $key_len;
	$user_actkey = substr($user_actkey, 0, $key_len);*/

	// set the user to inactive and the reason to "fully registered"
	$user_type = USER_NORMAL;

	// setup the user array for the new user
	$user_row = array(
		'username'              => request_var('username', ''),
		'user_password'         => request_var('password', '') == request_var('password_confirm', '') ? (phpbb_hash(request_var('password', ''))) : ($_SESSION['password_confirm'] = false),
		'user_email'            => request_var('email', ''),
		'group_id'              => 4,
		'user_type'             => $user_type,
		'user_regdate'          => time(),
	);

	// Register user...
	$user_id = user_add($user_row, $cp_data);

	// If creating the user failed, display an error
	if ($user_id === false)
	{
		trigger_error('NO_USER', E_USER_ERROR);
	}
				
	$template->assign_vars(array(
		// If there were any errors, display them, one on each newline.
		'ERROR'             => (sizeof($error)) ? implode('<br />', $error) : '',
	));
?>