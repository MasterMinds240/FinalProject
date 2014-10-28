<?php
	// Includes
	include "phpBBHeader.php";
	
	// Send the login information through the auth.php file in PHPBB and
	// store the results as an array in the $_SESSION variable for authentication
	$_SESSION['loginStatus'] = $auth->login($_POST["username"], $_POST["password"], true, 1, 0);
	
	// Return the user to the index page
	header("Location: http://nova.it.rit.edu/~acd3267/240/phpBB3Test/" . HOME_DIR . "index.php");
?>