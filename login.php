<?php
session_start();
include 'php/server.php';
require 'php/db_connection.php';


if (isset($_SESSION['loggedin'])) {
					header("Location: profile.php"); /* Redirect browser */

}
require 'php/header.php';
require 'scripts/Validator.js';
?>
<!-- LOGIN/REGISTER FORM -->
	<div class="login_container animate_login_container">
		<section class="login animate_login">
			<h1>Login</h1>
				<form action="php/test1.php" method="POST" onsubmit="return ValidateLogin()">
						<input id="KundenNr" class="input_btn" type="text" name="KundenNr" placeholder="KundenNr" required="required" />
						<input id="password" class="input_btn" type="password" name="password" placeholder="Password" />
						<button type="submit" class="btn btn-primary btn-block btn-large" name="login_user">Let me in.</button>		
						<a class="register_link" href="register.php"> No account yet? Sign up</a>
				</form>	
		</section>
	</div>
<?php
require 'php/footer.php';
?>