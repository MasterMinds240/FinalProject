<?php
	// Includes
	include "../includes/phpBBHeader.php";
	
	// Send the login information through the auth.php file in PHPBB and
	// store the results as an array in the $_SESSION variable for authentication
	$_SESSION['loginStatus'] = $auth->login(request_var('username', ''), request_var('password', ''), true, 1, 0);
	
	// Return the user to the index page
	header("Location: http://nova.it.rit.edu/~MasterMinds/index.php");
?>