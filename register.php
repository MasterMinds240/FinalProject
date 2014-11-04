<?php 
	include_once "includes/phpBBHeader.php";
	include_once "functions/buildRegister.php";
?>
<div id="registrationDiv">
	<form action="<?php echo HOME_DIR;?>functions/registration.php" method="post" id="registrationForm" name="register">
		<?php buildRegister(); ?>
	</form>
</div>