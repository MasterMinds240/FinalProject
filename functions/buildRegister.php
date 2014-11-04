<?php
	function buildRegister()
	{
		echo "<div class='panel'>
				<div class='inner'>

				<h2>Master Minds - User Registration</h2>
				<dl>
					<dt><label for='username'>Username:</label><br /><span>Length must be between 3 characters and 20 characters.</span></dt>
					<dd><input type='text' tabindex='1' name='username' size='25' id='user_input' class='registration_input' title='username' /></dd>
				</dl>
				<dl>
					<dt><label for='email'>Email Address:</label></dt>
					<dd><input type='email' tabindex='2' name='email' id='email' size='25' maxlength='100' class='registration_input' title='email' /></dd>
				</dl>
				<dl>
					<dt><label for='new_password'>Password:</label><br /><span>Must be between 6 and 100 characters.</span></dt>
					<dd><input type='password' tabindex='4' name='new_password' id='new_password' size='25' class='registration_input' title='new_password' /></dd>
				</dl>
				<dl>
					<dt><label for='password_confirm'>Confirm Password:</label></dt>
					<dd><input type='password'  tabindex='5' name='password_confirm' id='password_confirm' size='25' class='registration_input' title='confirm_password' /></dd>
				</dl>
				<dl>
					<dd><input type='submit' name='submit_registration' id='submit_registration' class='registration_button' value='Submit'></dd>
				</dl>
				</div>
			</div>";
	}
?>