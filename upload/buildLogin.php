<?php
	// Includes
	include_once "phpBBHeader.php";
	// This function is used to build the login div
	function buildLogin()
	{
		echo "<div id='login'>
		<form action='".HOME_DIR."login.php' method='post' name='login'>
			Username: <input type='text' name='username'><br>
			Password: <input type='password' name='password'><br>
			<input type='submit' name='submitLogin' value='Login'>
		</form>
		</div>";
	}
	
	/*
	Here are the possible status_msg that PHPBB3 can return
	login.php stores this array in $_SESSION['loginStatus']
	
	
	LOGIN_ERROR_PASSWORD			Password problems
	NO_PASSWORD_SUPPLIED			Password was not supplied
	LOGIN_ERROR_USERNAME			Username problems
	LOGIN_ERROR_USERNAME			Incorrect username was specified
	LOGIN_ERROR_EXTERNAL_AUTH		External authentication has failed
	LOGIN_ERROR_ACTIVE				User is not active
	ACTIVE_ERROR					The specified username is inactive
	LOGIN_SUCCESS_CREATE_PROFILE	User authenticated, but not yet in phpBB. Create the user profile.
	LOGIN_SUCCESS					Successful login
	*/
	// No password is supplied
	if($_SESSION['loginStatus']['error_msg']=='NO_PASSWORD_SUPPLIED')
	{
		buildLogin();
		echo "Please type a password before attempting to login.";
	}
	// Catch all for login mistakes
	elseif($_SESSION['loginStatus']['status'] != 3 && isset($_SESSION['loginStatus']))
	{
		buildLogin();
		echo "There was a problem authenticating your username/password. Please try again.";
	}
	// If $_SESSION['loginStatus'] is null, build login without error message
	elseif(!isset($_SESSION['loginStatus']))
	{
		buildLogin();
	}
	// Or if user_id is the anonymous ID
	elseif ($user->data['user_id'] == '1')
	{
	   buildLogin();
	}
	// Otherwise, the user successfully logged in
	else
	{
	   echo "Thanks for logging in, " . $user->data['username_clean']
	   . "<form action='".HOME_DIR."logout.php' method='post' name='logout'>
	   <input type='submit' name='submitLogout' value='Logout'>
	   </form>";
	}
?>