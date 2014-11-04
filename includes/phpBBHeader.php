<?php
	/*
	This is the code required to begin PHPBB3's session management
	This code snippet will work from the root directory
	*/
	
	//Begin Session
	session_start();
	
	/*
	This section retrieves the URI of the current page and outputs a
	string which contains the appropriate number of parent directory commands
	to return to the home directory
	*/
	// Store strings separated with the "/" character in an array
	$URI_arr = explode("/", $_SERVER['REQUEST_URI']);
	$homeDir = "";
	// Iterate through the array starting at the home directory
	for($i=2; $i<sizeof($URI_arr)-1; $i++)
	{
		// Concatenate the parent directory command for each directory after home
		$homeDir .= "../";
	}
	// Define the HOME_DIR constant for later use
	define('HOME_DIR', $homeDir);
	
	// PHPBB3 Definitions
	define('IN_PHPBB', true);
	// Store the location of the PHPBB files
	$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : HOME_DIR . 'forums/';
	// Store the default file extension
	$phpEx = substr(strrchr(__FILE__, '.'), 1);
	// Call the common.php library from the phpBB3 directory
	include(HOME_DIR . "forums/common." . $phpEx);

	// Start PHPBB3 session management
	$user->session_begin();
	$auth->acl($user->data);
	$user->setup();
?>