<?php
	include "../includes/phpBBHeader.php";
	include HOME_DIR . "includes/db_config.php";
	
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
	
	$queryString = "SELECT max(user_id) FROM phpbb_users";
	$result = mysqli_query($conn, $queryString) or die(mysqli_error($conn));
	if($result)
	{
		$row = mysqli_fetch_row($result);
		$user_id = $row[0] + 1;
	}
	
	mysqli_free_result($result);
	
	// setup the user array for the new user
	$user_row = array(
		'user_id'				=> $user_id,
		'username'              => request_var('username', ''),
		'user_password'         => (request_var('new_password', '') == request_var('password_confirm', '') ? (phpbb_hash(request_var('password', ''))) : ($_SESSION['password_confirm'] = false)),
		'user_email'            => request_var('email', ''),
		'group_id'              => 4,
		'user_type'             => $user_type,
		'user_regdate'          => time(),
	);
	
	$queryString = "INSERT INTO phpbb_users(user_id, username, user_password, user_email, group_id, user_type, user_regdate) VALUES (";
	foreach($user_row as $value)
	{
		if(is_string($value))
		{
			$queryString .= "'" . $value . "',";
		}
		else
		{
			$queryString .= $value . ",";
		}
	}
	$queryString = rtrim($queryString, ",");
	$queryString .= ")";
	echo $queryString;
	$result = mysqli_query($conn, $queryString) or die(mysqli_error($conn));
	mysqli_close($conn);
?>