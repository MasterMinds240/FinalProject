<?php
	// Includes
	include "phpBBHeader.php";
	
	// Use PHPBB's built in session_kill() function to terminate the session
	$user->session_kill();
	// Remove all session variables
	session_unset(); 
	// Destroy the session 
	session_destroy();
	
	// Return the user to homepage
	header("Location: http://nova.it.rit.edu/~acd3267/240/phpBB3Test/" . HOME_DIR . "index.php");
?>