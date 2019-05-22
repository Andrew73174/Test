<?php
session_start();
require 'php/db_connection.php';


require 'php/header.php';

print_r($_SESSION['LAST_ACTIVITY']);
?>


	<!-- Start of impressum content -->
	<div class="wrapper_nolimit content_spacer">
		<article class="standard_layout">
			<br>
			ToyModelsGmbH 
			<br>
			Dominik Schneider
			<br>
			Altschauerberg 8
			<br>
			91448 Emskirchen
			<br><br>
			Postanschrift: 	Kurfuerstendamm 48, 18125 Rostock
			<br><br>
			Firmenleitung: 
			<br>
			Dominik Schneider 
			<br><br>
			Kontakt: 
			<br>
			0911 90909090 
			<br>
			DominikSchneider@dayrep.com
			<br>
		</article>
	</div>
	<!-- End of impressum content -->
	
<?php
require 'php/footer.php';
?>
