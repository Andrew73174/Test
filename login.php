<?php
session_start();
include 'php/server.php';
require 'php/db_connection.php';
require 'php/header.php';

if (isset($_SESSION['loggedin'])) {

					echo'	<div class="login_container animate_login_container">
		<section class="login animate_login">
			<h1>Login</h1>
				<form action="php/sessiondestroyer.php" method="POST">
						<button type="submit" class="btn btn-primary btn-block btn-large" name="logoff_user">Log out!</button>		
						<a class="register_link" href="register.php"> No account yet? Sign up</a>			
				</form>	
		</section>
	</div>
<?php';
}
else{
echo'
<!-- LOGIN/REGISTER FORM -->
	<div class="login_container animate_login_container">
		<section class="login animate_login">
			<h1>Login</h1>
				<form action="php/sessionsetter.php" method="POST">
						<input class="input_btn" type="text" name="KundenNr" placeholder="KundenNr" required="required" />
						<input class="input_btn" type="password" name="password" placeholder="Password" required="required" />
						<button type="submit" class="btn btn-primary btn-block btn-large" name="login_user">Let me in.</button>		
						<a class="register_link" href="register.php"> No account yet? Sign up</a>			
				</form>	
		</section>
	</div>';
}
?>

<?php
require 'php/footer.php';
?>