<?php
session_start();
include 'php/server.php';
require 'php/db_connection.php';
require 'php/header.php';
require 'scripts/Validator.js';
?>
<!-- Start of register form -->
	<div class="register_container animate_login_container">
		<section class="register">
			<h1>Register</h1>
				<form action="register.php" method="POST" onsubmit="return ValidateRegister()" id="Register_form">
				<?php include 'php/errors.php'; ?>
						<input id="Vorname" class="input_btn" type="text" name="Vorname" placeholder="First Name" required="required" />
						<input id="Nachname" class="input_btn" type="text" name="Nachname" placeholder="Last Name" required="required" />
						<input id="Firma" class="input_btn" type="text" name="Firma" placeholder="Company" required="required" />				
						<input id="password1" class="input_btn" type="password" name="password_1" placeholder="Password"  />
						<input id="password2" class="input_btn" type="password" name="password_2" placeholder="Confirm Password" />
						<button type="submit" class="btn btn-primary btn-block btn-large" name="reg_user">Sign me up!</button>	
						<a class="login_link" href="login.php"> Already have an account?</a>		
				</form>	
		</section>
	</div>
	<!-- End of register form -->
<?php
require 'php/footer.php';
?>