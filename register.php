<?php
session_start();
include 'php/server.php';
require 'php/db_connection.php';
require 'php/header.php';

?>
<!-- Create new table or change register form
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,

  `password` varchar(100) NOT NULL
) 
-->
<!-- Start of register form -->
	<div class="register_container animate_login_container">
		<section class="register">
			<h1>Register</h1>
				<form action="register.php" method="POST">
				<?php include 'php/errors.php'; ?>
						<input type="text" name="Vorname" placeholder="First Name" required="required" />
						<input type="text" name="Nachname" placeholder="Last Name" required="required" />
						<input type="text" name="Firma" placeholder="Company" required="required" />
						<input type="text" name="KundenNr" placeholder="Customer_ID" required="required" />
						<input type="password" name="password_1" placeholder="Password"  />
						<input type="password" name="password_2" placeholder="Confirm Password" />
						<button type="submit" class="btn btn-primary btn-block btn-large" name="reg_user">Sign me up!</button>	
						<a class="login_link" href="login.php"> Already have an account?</a>		
				</form>	
		</section>
	</div>
	<!-- End of register form -->
	
<?php
require 'php/footer.php';
?>